<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Modal extends Component
{
    public ?string $title;

    public ?bool $isVisible = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $isVisible = false)
    {
        $this->title = $title;

        $this->isVisible = $isVisible;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partial.modal');
    }
}
