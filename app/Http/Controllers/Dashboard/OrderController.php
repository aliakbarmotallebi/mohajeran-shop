<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('dashboard.orders.index');
    }

    public function show(Order $order)
    {
        return view(
            'dashboard.orders.show',
            compact('order')
        );
    }
}
