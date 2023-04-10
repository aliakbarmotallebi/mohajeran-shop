<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderReporter extends Component
{
    public function render()
    {
        $countOrderCompleted = Order::whereStatus('Completed')->count();
        $countOrderPending   = Order::whereStatus('Pending')->count();
        $countOrderTotalCompleted = Order::whereStatus('Completed')->sum('total_price');
        $countOrderTotalPending   = Order::whereStatus('Pending')->sum('total_price');
        $countOrders         = Order::count();
        return view('livewire.order-reporter', compact(
            'countOrderCompleted',
            'countOrderPending',
            'countOrders',
            'countOrderTotalCompleted',
            'countOrderTotalPending'
        ));
    }
}
