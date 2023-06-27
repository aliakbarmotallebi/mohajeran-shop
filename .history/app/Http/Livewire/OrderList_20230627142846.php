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

    public $mobile;
    
    public $mobile;

    public $fullname;

    public $status;

    protected $queryString = [
        'id' => ['except' => 1],
        'mobile' => ['except' => 1],
        'fullname' => ['except' => 1],
        'status' => ['except' => 1],
        'page'    => ['except' => 1]
    ];

    protected $listeners = [
        'getOrders' => 'getOrdersList',
    ];

    public function mount()
    {
        $this->getOrdersList();
    }

    public function getOrdersList()
    {
        $this->orders = Order::latest()->paginate(20);
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
