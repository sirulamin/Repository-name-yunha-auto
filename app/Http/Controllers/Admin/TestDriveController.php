<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestDrive;
use Illuminate\Http\Request;

class TestDriveController extends Controller
{
    public function index()
    {
        $testDrives = TestDrive::with(['user', 'car.brand'])
            ->latest()
            ->get();

        return view('admin.test-drive.index', compact('testDrives'));
    }

    public function update(Request $request, TestDrive $testDrive)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,approved,completed,cancelled'],
        ]);

        $testDrive->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Status test drive berhasil diperbarui.');
    }
}
