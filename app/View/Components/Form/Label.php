<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Label extends Component
{
	
    public ?string $label = NULL;

    public ?string $name  = NULL;

    public bool $required = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label    = NULL,
        $name     = NULL,
        $required = false
    ) {
        $this->label    = $label;
        $this->name     = $name;
        $this->required = $required;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.label');
    }
}
