<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Security extends Component
{
    use LivewireAlert;

    public $mobile;

    public $password;

    protected $rules = [
        'mobile' => 'required|max:20',
        'password' => 'required|max:20',
    ];
    public function login()
    {
        $this->validate();

        if( auth()->attempt([
            'mobile' => $this->mobile,
            'password' => $this->password
            ])){
                return $this->redirect(route('dashboard.index'));
            }

        $this->alert('warning', 'نام کاربری یا گذرواژه اشتباه می باشد');
        return true;
    }

    public function render()
    {
        return view('auth._security');
    }
}
