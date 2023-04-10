<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;

    protected $listeners = [
        'show' => 'show',
    ];

    public function show()
    {
        $this->show = !$this->show;
    }

    public function render()
    {
        return view('livewire.modals.modal');
    }
}
