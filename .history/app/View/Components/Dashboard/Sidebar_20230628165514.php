<?php

namespace App\View\Components\Dashboard;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $user;

    public $order;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = User::whereNull('erp_code')->count();
        $this->order = Order::whereDate('created_at', Carbon::today())->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar');
    }
}
