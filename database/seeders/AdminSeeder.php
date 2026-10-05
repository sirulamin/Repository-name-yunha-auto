<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@yunhaauto.com',
        ]);

        $isNew = !$admin->exists;

        $admin->fill([
            'name' => 'Admin Yunha Auto',
            'phone' => '081234567890',
        ]);

        $admin->role = 'admin';

        if ($isNew) {
            $password = getenv('ADMIN_INITIAL_PASSWORD') ?: ($_ENV['ADMIN_INITIAL_PASSWORD'] ?? null);

            if (!$password) {
                $password = Str::random(32);
                $this->command?->warn('ADMIN_INITIAL_PASSWORD tidak ditemukan. Password admin dibuat acak: ' . $password);
            }

            $admin->password = Hash::make($password);
        }

        $admin->save();
    }
}
