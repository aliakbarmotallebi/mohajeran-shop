<?php namespace App\Uilits;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Container\Container;

class WalletProcessor {
       
    protected $container;

    protected $model;

     /**
     * @var int amout
     */
    protected int $amount;
    
    /**
     * @var User user
     */
    protected User $user;
    
    /**
     * @var string summery
     */
    protected ?string $summery;

        
    /**
     * @var string message
     */
    protected ?string $message = null;
    
    /**
     * @var mixed status
     */
    private $status;
    
    /**
     * @var mixed type
     */    
    /**
     * @var mixed type
     */
    private $type;


    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeModel();
    }

    protected function makeModel()
    {
        $this->model = $this->container->make($this->model());
    }

    public function model()
    {
        return Wallet::class;
    }

    /**
     * Get amout
     *
     * @return  int
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set amout
     *
     * @param  int  $amount  amout
     *
     * @return  self
     */ 
    public function setAmount(int $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get user
     *
     * @return  User
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param  User  $user  user
     *
     * @return  self
     */ 
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get summery
     *
     * @return  string
     */ 
    public function getSummery()
    {
        return $this->summery;
    }

    /**
     * Set summery
     *
     * @param  string  $summery  summery
     *
     * @return  self
     */ 
    public function setSummery(string $summery)
    {
        $this->summery = $summery;

        if(array_key_exists($summery, $this->model()::SUMMERY)){
            $this->summery = $this->model()::SUMMERY[$summery];
        }

        return $this;
    }

    /**
     * Get status
     *
     * @return  mixed
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param  mixed  $status  status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $this->model::STATUS_REJECTED;

        if($this->model::STATUS_COMPLETED == $status) {
            $this->status = $status;
        }

        return $this;
    }

    /**
     * Get type
     *
     * @return  mixed
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param  mixed  $type  type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $this->model::TYPE_WITHDRAW;

        if($this->model::TYPE_DEPOSIT == $type) {
            $this->type = $type;
        }
 
        return $this;
    }

    /**
     * Get message
     *
     * @return  string
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param  string  $message  message
     *
     * @return  self
     */ 
    public function setMessage(?string $message)
    {
        $this->message = $message;

        return $this;
    }


     
    public function createWalletTransactions()
    {
        if($this->getAmount() <= 0 || is_null($this->getAmount())){
            throw new \Exception('Amount ziro');
        }

        if( !($this->getUser() instanceof User) ){
            throw new \Exception('User not exist');
        }

        if( !$this->isAllowWithdraw() ){
            throw new \Exception('not isAllowWithdraw');
        }

        return  $this->model->create([
            'amount'   => $this->getAmount(),
            'type'     => $this->getType(),
            'status'     => $this->getStatus(),
            'summery'  => $this->getSummery(),
            'message_form_admin' => $this->getMessage(),
            'user_id'  => $this->getUser()->id
         ]);
    }

    private function isAllowWithdraw(): bool
    {
        if( $this->getType() == $this->model::TYPE_WITHDRAW ){
            return (bool)($this->getUser()->balance() >= $this->getAmount());
        }

        return true;
    }
   
}