<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with([
            'user',
            'car.brand',
            'car.images'
        ])->latest()->get();

        return view('admin.wishlist.index', compact('wishlists'));
    }
}
