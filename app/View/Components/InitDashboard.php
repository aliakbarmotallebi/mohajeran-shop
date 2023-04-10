<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\User;
use Illuminate\View\Component;
use Carbon\Carbon;

class InitDashboard extends Component
{
    public $users;
    public $products;
    public $last_fetch_product;
    public $last_fetch_user;

    public function __construct()
    {
        $this->users    = User::count();
        $this->products = Product::count();
        $this->last_fetch_user    = verta(settings('LAST_TIME_FETCH_CUSTOMERS'))->format('H:i:s m-d');
        $this->last_fetch_product = verta(settings('LAST_TIME_FETCH_PRODCUTS'))->format('H:i:s m-d');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.init-dashboard');
    }
}
