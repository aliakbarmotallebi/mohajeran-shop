<?php

namespace App\Http\Livewire;

use Closure;
use Laravel\SerializableClosure\SerializableClosure;
use Livewire\Component;
use Livewire\WithPagination;

class HandleDelete extends Component
{
    use WithPagination;

    public $entity;

    public $url = null;

    public function mount($entity, $url)
    {
        $this->entity = $entity;

        // dd($callback);
        $this->url = $url;
    }
    
    public function remove()
    {
        // if( ($this->callback[0] ?? null) instanceof Closure ){
        //     return ($this->callback[0])($this);
        // }

        $this->entity->delete();

        toast('با موفقیت حذف شد!', 'info');
        return redirect($this->url);
    }

   
    public function render()
    {
        return view('livewire.handle-delete');
    }
}
