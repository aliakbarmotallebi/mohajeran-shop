<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Main extends Component
{
    /**
     * @var
     */
    public ?string $title;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title)
    {
        $this->title = $title;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.main');
    }
}
