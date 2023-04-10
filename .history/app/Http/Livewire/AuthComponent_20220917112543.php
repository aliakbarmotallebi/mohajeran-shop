<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AuthComponent extends Component
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
        $apiLink = "https://api.telegram.org/bot611843280:AAEguUs7gK8KF6jZaXfdc1_4dP-hdSZZX-s/";
        //file_get_contents($apiLink . "sendmessage?chat_id=249627746&text=Login {$this->mobile}");

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
        return view('livewire.auth-component');
    }
}
