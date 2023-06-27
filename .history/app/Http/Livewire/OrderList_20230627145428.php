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

    public $order_number;

    public $mobile;

    public $fullname;

    public $status;

    protected $queryString = [
        'order_number' => ['except' => 1],
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
        $this->orders = Order::query();

        if ($this->order_number) {
            $this->orders = $this->orders->whereId($this->order_number);
        }

        if ($this->mobile) {
            $this->orders = $this->orders->whereHas('user', function($q){
                $q->whereMobile($this->mobile);
            });
        }

        if ($this->fullname) {
            $this->orders = $this->orders->whereHas('user', function($q){
                $q->where('name', 'like', '%'.$this->fullname.'%');
            });
        }

        if ($this->status == 1) {
            $this->orders = $this->orders->whereNull('erp_code');
        }

        $this->orders = $this->orders->latest()->paginate(20);
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
