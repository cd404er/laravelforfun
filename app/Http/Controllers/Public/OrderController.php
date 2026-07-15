<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the registration/subscription order form.
     */
    public function showForm(Request $request): View
    {
        $packages = Package::where('is_active', true)->get();
        $selectedPackageId = $request->query('package_id');

        return view('public.orders.create', compact('packages', 'selectedPackageId'));
    }

    /**
     * Submit subscription order.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string'],
            'package_id' => ['required', 'exists:packages,id'],
            'notes' => ['nullable', 'string'],
            'g-recaptcha-response' => app()->runningUnitTests() ? ['nullable'] : ['required', new \App\Rules\Recaptcha],
        ]);

        $package = Package::findOrFail($validated['package_id']);

        // Simpan ke database agar admin bisa memantau riwayat pesanan
        Order::create([
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'],
            'address' => $validated['address'],
            'package_id' => $validated['package_id'],
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        $waNumber = '6285946408664';
        $message = "Halo Sales MyRepublic, saya ingin mendaftar langganan WiFi baru.\n\n"
            . "*Paket Pilihan*: " . $package->name . " (" . $package->speed_mbps . " Mbps)\n"
            . "*Harga*: Rp " . number_format($package->price, 0, ',', '.') . "/bulan\n\n"
            . "*Nama Pelanggan*: " . $validated['customer_name'] . "\n"
            . "*No. HP/WA*: " . $validated['customer_phone'] . "\n"
            . "*Email*: " . $validated['customer_email'] . "\n"
            . "*Alamat Lengkap*: " . $validated['address'] . "\n"
            . "*Catatan*: " . ($validated['notes'] ?? '-');

        $waUrl = "https://wa.me/{$waNumber}?text=" . urlencode($message);

        return redirect()->away($waUrl);
    }

    /**
     * Show the success order page.
     */
    public function success(): View
    {
        return view('public.orders.success');
    }
}
