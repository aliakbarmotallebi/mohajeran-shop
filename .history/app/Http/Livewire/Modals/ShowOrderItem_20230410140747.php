<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class ShowOrderItem extends Modal
{
    protected $listeners = [
        'show' => 'showModal'
    ];

    public function showModal($data)
    {
        $this->show();
    }

    public function render()
    {
        return view('livewire.modals.show-order-item');
    }
}
