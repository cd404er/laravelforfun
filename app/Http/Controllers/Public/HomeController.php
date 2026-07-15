<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the landing/homepage.
     */
    public function index(): View
    {
        $packages = Package::where('is_active', true)->get();

        return view('public.home', compact('packages'));
    }

    /**
     * Display the list of packages.
     */
    public function packages(): View
    {
        $packages = Package::where('is_active', true)->get();

        return view('public.packages.index', compact('packages'));
    }

    /**
     * Display a specific package detail.
     */
    public function packageDetail(string $slug): View
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('public.packages.show', compact('package'));
    }
}
