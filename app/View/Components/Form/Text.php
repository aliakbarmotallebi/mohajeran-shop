<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Text extends Component
{
	
	public ?string $name;

    public ?string $label;

    public ?string $type;

    public ?string $placeholder;

    public ?string $value;
	
	public bool $required = false;
 
    public bool $readonly = false;
	
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
		$label = '', $name = '',
        $placeholder = '', $value = '',
        $type = 'text', $required = false,
        $readonly = false
	)
    {
        $this->label = $label;

        $this->name = $name;

        $this->placeholder = $placeholder;

        $this->required = $required;

        $this->value    = $value;

        $this->readonly = $readonly;

        $this->type     = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text');
    }
}
