<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoverageCheck;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        $totalPackages = Package::count();
        $totalPendingOrders = Order::where('status', 'pending')->count();
        $totalPendingCoverage = CoverageCheck::where('status', 'pending')->count();
        $recentOrders = Order::with('package')->latest()->limit(5)->get();
        $recentCoverageChecks = CoverageCheck::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalPackages',
            'totalPendingOrders',
            'totalPendingCoverage',
            'recentOrders',
            'recentCoverageChecks'
        ));
    }
}
