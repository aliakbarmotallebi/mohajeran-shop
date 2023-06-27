<?php

namespace App\Http\Livewire\Modals;

use App\Facades\WalletManager;
use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;

class WalletBalanceDashboard extends Modal
{
    public $amount;

    public $summery;

    public $message;

    public $type;
    
    public $user_id; 

    protected $listeners = [
        'show' => 'showModal'
    ];

    public function showModal($user_id)
    {
        $this->show();

        $this->user_id = $user_id;
    }

    protected $rules = [
        'amount' => 'required|numeric|min:10',
        'message' => 'sometimes',
        'type' => 'required|in:TYPE_DEPOSIT,TYPE_WITHDRAW',
    ];

    public function toast($meassge = 'message', $status = 'error')
    {
        $this->dispatchBrowserEvent('swal', [
            'toast' => true,
            'icon' => $status,
            'title' => $meassge,
            'animation' => false,
            'position' => 'bottom',
            'showConfirmButton' => false,
            'timer' => 7000,
            'timerProgressBar' => true,
        ]);
    }

    public function save()
    {
        $items = $this->validate();

        $user = User::find($this->user_id);

        $wallet = WalletManager::setAmount($this->amount)
            ->setType($this->type)
            ->setSummery($this->getSummeryTransactionStatus())
            ->setMessage($this->message)
            ->setUser($user)
            ->setStatus('STATUS_COMPLETED')
            ->createWalletTransactions();

        $this->toast('مشکل در انجام تراکنش' , 'error');

        if($wallet instanceof Wallet){
            $this->toast('با موفقیت تغییرات انجام شد' , 'success');
        }
        
        return redirect()->to('dashboard/users');

    }

    private function getSummeryTransactionStatus()
    {
        switch ($this->type) {
            case "TYPE_DEPOSIT":
              return('summery_increment_form_admin');
            case "TYPE_WITHDRAW":
              return('summery_decrement_form_admin');
        }
    }

    public function render()
    {
        return view('dashboard.users._wallet-balance-dashboard-modal');
    }
}