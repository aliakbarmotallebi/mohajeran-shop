<?php

namespace App\Http\Livewire;

use App\Jobs\SendNewUserOrderToHoloo;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderList extends Component
{
    use WithPagination;

    protected $orders;

    protected $listeners = [
        'getOrders' => 'getOrdersList',
    ];

    public function mount()
    {
        $this->getOrdersList();
    }

    public function getOrdersList()
    {
        $this->orders = Order::latest()
        ->paginate(20);
        // orderBy(DB::raw('erp_code IS NOT NULL, erp_code'), 'DESC')
    }

    public function exec(Order $order)
    {
        dispatch((new SendNewUserOrderToHoloo($order)));
        $this->emit('getOrders');
    }

    public function render()
    {
        $this->getOrdersList();

        return view('livewire.order-list', [
            'orders' => $this->orders
        ]);
    }
}
