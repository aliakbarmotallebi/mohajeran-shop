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
        'mobile' => ['except' => 1],
        'fullname' => ['except' => 1],
        'page'    => ['except' => 1]
    ];

    public function getUser()
    {
        $this->users = User::query();

        if ($this->mobile) {
            $this->users = $this->users->whereMobile($this->mobile);
        }

        if ($this->fullname) {
            $this->users = $this->users->where('name', 'like', '%'.$this->fullname.'%');
        }

        if ($this->status) {
            $this->users = $this->users->whereNull('erp_code');
        }

        $this->users = $this->users->latest()->paginate(20);
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
