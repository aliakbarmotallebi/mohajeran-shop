<?php namespace App\Uilits;

use App\Facades\WalletManager;
use App\Models\User;
use App\Models\Wallet;
use App\Uilities\Exceptions\WalletException;
use Illuminate\Support\Facades\DB;

class TransactionWalletProcessor {

    public function deposit(
        #[\SensitiveParameter] string $amount,
        #[\SensitiveParameter] User $user,
    ){
        DB::beginTransaction();
        try{

            $wallet = WalletManager::setAmount($amount)
                ->setType(Wallet::TYPE_DEPOSIT)
                ->setSummery(Wallet::SUMMERY[
                    'summery_increment'
                ])
                ->setUser($user)
                ->setStatus(Wallet::STATUS_REJECTED)
                ->createWalletTransactions();
                
            DB::commit();

            return $wallet;

        }catch (WalletException $e){
            DB::rollback();
        }

        return false;
    }
        
    

    public function withdraw(
        #[\SensitiveParameter] string $amount,
        #[\SensitiveParameter] User $user,
    ){
        DB::beginTransaction();

        try{
            $wallet = WalletManager::setAmount($amount)
                ->setType(Wallet::TYPE_WITHDRAW)
                ->setSummery(Wallet::SUMMERY[
                    'summery_payment_order'
                ])
                ->setUser($user)
                ->setStatus(Wallet::STATUS_COMPLETED)
                ->createWalletTransactions();

            DB::commit();

            return $wallet;

        }catch (WalletException $e){
            DB::rollback();
        }

        return false;
    }
}