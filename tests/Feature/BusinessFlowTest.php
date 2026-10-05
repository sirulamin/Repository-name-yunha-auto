<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\TestDrive;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BusinessFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_cannot_access_admin_area(): void
    {
        $customer = User::factory()->create(['role' => 'customer']);

        $this->actingAs($customer)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_access_admin_area(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk();
    }

    public function test_customer_cannot_view_another_customers_reservation(): void
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $otherCustomer = User::factory()->create(['role' => 'customer']);
        $brand = Brand::create(['name' => 'Test Brand']);
        $car = Car::create([
            'brand_id' => $brand->id,
            'name' => 'Test Car',
            'year' => now()->year,
            'price' => 300000000,
            'mileage' => 10000,
            'transmission' => 'Automatic',
            'fuel' => 'Bensin',
            'color' => 'Black',
            'condition' => 'Bekas',
            'status' => 'Available',
        ]);
        $reservation = Reservation::create([
            'user_id' => $otherCustomer->id,
            'car_id' => $car->id,
            'reservation_code' => 'YUNHA-TEST01',
            'phone' => '081234567890',
            'dp_percent' => 20,
            'dp_amount' => 60000000,
            'status' => 'Pending',
        ]);

        $this->actingAs($customer)
            ->get(route('reservation.show', $reservation))
            ->assertForbidden();
    }

    public function test_test_drive_is_created_with_database_status(): void
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $brand = Brand::create(['name' => 'Test Brand']);
        $car = Car::create([
            'brand_id' => $brand->id,
            'name' => 'Test Car',
            'year' => now()->year,
            'price' => 300000000,
            'mileage' => 10000,
            'transmission' => 'Automatic',
            'fuel' => 'Bensin',
            'color' => 'Black',
            'condition' => 'Bekas',
            'status' => 'Available',
        ]);

        $this->actingAs($customer)
            ->post(route('test-drive.store', $car), [
                'date' => now()->addDay()->format('Y-m-d'),
                'time' => '10:00',
                'phone' => '081234567890',
                'notes' => 'Test',
            ])
            ->assertRedirect(route('test-drive.index'));

        $this->assertDatabaseHas('test_drives', [
            'user_id' => $customer->id,
            'car_id' => $car->id,
            'status' => 'pending',
        ]);
    }

    public function test_customer_payment_starts_as_pending(): void
    {
        $customer = User::factory()->create(['role' => 'customer']);
        $brand = Brand::create(['name' => 'Test Brand']);
        $car = Car::create([
            'brand_id' => $brand->id,
            'name' => 'Test Car',
            'year' => now()->year,
            'price' => 300000000,
            'mileage' => 10000,
            'transmission' => 'Automatic',
            'fuel' => 'Bensin',
            'color' => 'Black',
            'condition' => 'Bekas',
            'status' => 'Booked',
        ]);
        $reservation = Reservation::create([
            'user_id' => $customer->id,
            'car_id' => $car->id,
            'reservation_code' => 'YUNHA-TEST02',
            'phone' => '081234567890',
            'dp_percent' => 20,
            'dp_amount' => 60000000,
            'status' => 'Confirmed',
        ]);

        $this->actingAs($customer)
            ->post(route('payment.store', $reservation), [
                'method' => 'Bank Transfer',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('payments', [
            'reservation_id' => $reservation->id,
            'status' => 'Pending',
        ]);
    }
}
