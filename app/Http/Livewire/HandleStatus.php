<?php

namespace App\Http\Livewire;

use App\Models\Contracts\StatusInterface;
use Livewire\Component;

class HandleStatus extends Component
{
    public $entity;

    public function mount(StatusInterface $entity)
    {
        $this->entity = $entity;
    }

    public function press()
    {
        $this->entity->press();
    }

    public function render()
    {
        return view('livewire.handle-status');
    }
}
