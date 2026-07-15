<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $query = Order::with('package')->latest();

        if ($status) {
            $query->where('status', $status);
        }

        $orders = $query->paginate(15);

        return view('admin.orders.index', compact('orders', 'status'));
    }

    /**
     * Display the specified order details.
     */
    public function show(Order $order): View
    {
        $order->load('package');

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the status of the specified order.
     */
    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,survey_scheduled,installed,cancelled'],
            'notes' => ['nullable', 'string'],
        ]);

        $order->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $order->notes,
        ]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
