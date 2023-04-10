<?php

namespace App\Http\Livewire\Modals;

use App\Models\Order;
use Livewire\Component;

class ShowOrderItem extends Modal
{
    public Order $order;

    protected $listeners = [
        'show' => 'showModal'
    ];

    public function showModal($data)
    {
        $this->order = Order::find($this->data["id"]);
        $this->show();
    }

    public function render()
    {
        return view('livewire.modals.show-order-item');
    }
}
