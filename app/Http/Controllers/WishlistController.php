<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with(['car.brand', 'car.images'])
            ->where('user_id', auth()->id())
            ->get();

        return view('customer.wishlist.index', compact('wishlists'));
    }

    public function toggle(Car $car)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('car_id', $car->id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();

            return redirect()
                ->route('wishlist.index')
                ->with('success', 'Mobil dihapus dari wishlist.');
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
        ]);

        return redirect()
            ->route('wishlist.index')
            ->with('success', 'Mobil ditambahkan ke wishlist.');
    }
}