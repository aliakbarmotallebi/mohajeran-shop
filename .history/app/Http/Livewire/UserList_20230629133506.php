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

    public $status;

    protected $queryString = [
        'mobile' => ['except' => 1],
        'fullname' => ['except' => 1],
        'status' => ['except' => 1],
        'page'    => ['except' => 1]
    ];

    protected $listeners = [
        'getUser' => 'getUsersList',
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

        if ($this->status == 1) {
            $this->users = $this->users->whereNull('erp_code');
        }

        $this->users = $this->users->latest()->paginate(20);
    }

    public function exec(User $user)
    {
        dispatch((new SendNewUserDataToHoloo($user)));
        $this->getUser();
    }

    public function setRoleVendor(User $user)
    {
        $user->role = 'Vendor';
        $user->save();
        $this->getUser();
    }

    public function setRoleCustomer(User $user)
    {
        $user->role = 'Admin';
        $user->save();
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
