<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CoverageCheck;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    /**
     * Show the coverage check form.
     */
    public function showForm(): View
    {
        return view('public.coverage.check');
    }

    /**
     * Process the coverage check request.
     */
    public function check(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'g-recaptcha-response' => app()->runningUnitTests() ? ['nullable'] : ['required', new \App\Rules\Recaptcha],
        ]);

        CoverageCheck::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'is_covered' => null, // Pending manual inspection
            'status' => 'pending',
        ]);

        $waNumber = '6285946408664';
        $message = "Halo Sales MyRepublic, saya ingin mengajukan cek area jangkauan WiFi.\n\n"
            . "*Nama*: " . $validated['name'] . "\n"
            . "*No. HP*: " . $validated['phone'] . "\n"
            . "*Alamat*: " . $validated['address'];

        if (! empty($validated['latitude']) && ! empty($validated['longitude'])) {
            $message .= "\n*Lokasi Google Maps*: https://www.google.com/maps?q=" . $validated['latitude'] . "," . $validated['longitude'];
        }

        $waUrl = "https://wa.me/{$waNumber}?text=" . urlencode($message);

        return redirect()->away($waUrl);
    }
}
