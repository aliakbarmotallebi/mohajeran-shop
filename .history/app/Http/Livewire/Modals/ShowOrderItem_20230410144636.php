<?php

namespace App\Http\Livewire\Modals;


class ShowOrderItem extends Modal
{
    protected $listeners = [
        'show' => 'show'
    ];

    // public function showModal($data)
    // {
    //     $this->order = Order::find($this->data["id"]);
    //     dd($this->order);
    //     $this->show();
    // }

    public function render()
    {
        return view('livewire.modals.show-order-item');
    }
}