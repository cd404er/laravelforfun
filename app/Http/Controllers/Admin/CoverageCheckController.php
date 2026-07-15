<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoverageCheck;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CoverageCheckController extends Controller
{
    /**
     * Display a listing of coverage check requests.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $query = CoverageCheck::latest();

        if ($status) {
            $query->where('status', $status);
        }

        $checks = $query->paginate(15);

        return view('admin.coverage.index', compact('checks', 'status'));
    }

    /**
     * Update coverage checking result and status.
     */
    public function updateStatus(Request $request, CoverageCheck $check): RedirectResponse
    {
        $validated = $request->validate([
            'is_covered' => ['required', 'boolean'],
            'status' => ['required', 'string', 'in:pending,processed'],
        ]);

        $check->update([
            'is_covered' => $validated['is_covered'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.coverage-checks.index')
            ->with('success', 'Status cek area berhasil diperbarui.');
    }
}
