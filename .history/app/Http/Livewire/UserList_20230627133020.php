<?php

namespace App\Http\Livewire;

use App\Jobs\SendNewUserDataToHoloo;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class UserList extends Component
{
    use WithPagination;

    protected $users;

    public $mobile;

    public $fullname;

    protected $queryString = [
        'mobile',
        'fullname',
        'page'    => ['except' => 1],
        'perPage' => ['except' => ''],
    ];

    public function getUser()
    {
        $this->users = User::query();

        if ($this->mobile) {
            return collect();
        }

        if ($this->fullname) {
            return collect();
        }

        $this->users = User::latest()->paginate(20);
    }

    public function exec(User $user)
    {
        dispatch((new SendNewUserDataToHoloo($user)));
        $this->getUser();
    }

    public function render()
    {
        $this->getUser();
        return view('livewire.user-list', [
            'users' => $this->users
        ]);
    }
}
