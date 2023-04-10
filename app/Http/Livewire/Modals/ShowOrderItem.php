<?php

namespace App\Http\Livewire\Modals;

use App\Models\Order;
use App\Models\OrderItem;

class ShowOrderItem extends Modal
{
    public $data;
    
    private $items = null;

    private $order = null;

    protected $listeners = [
        'show' => 'showModal'
    ];

    public function showModal($id)
    {
        $this->order = Order::find($id);
        $this->items = $this->order->items;

        $this->show();
    }

    public function remove(OrderItem $item)
    {
        $item->delete();
        $this->emit('getOrders');
    }

    public function render()
    {
        return view('livewire.modals.show-order-item', [
            'items' => $this->items,
            'order' => $this->order
        ]);
    }
}
