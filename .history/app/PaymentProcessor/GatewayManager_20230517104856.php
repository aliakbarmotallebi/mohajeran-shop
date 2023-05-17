<?php  namespace App\PaymentProcessor;

use App\PaymentProcessor\Exceptions\GatewayNotFoundException;
use App\PaymentProcessor\Gateways\AsanPardakhtGateway;
use App\PaymentProcessor\Interfaces\GatewayInterface;
use App\PaymentProcessor\Interfaces\PaymentableInterface;
use Illuminate\Http\Request;

class GatewayManager 
{    
    /**
     * @var mixed resnumber
     */
    protected Request $request;

    /**
     * @var GatewayInterface gateway
     */
    protected $deriver;

    /**
     * @var PaymentableInterface paymentable
     */
    protected PaymentableInterface $paymentable;
    
    /**
     * setGateway
     *
     * @param mixed gateway
     *
     * @return undefined
     */
    public function setDeriver($deriver): self
    {
        switch ($deriver) {
            case 'AsanPardakhat':
                $this->deriver = new AsanPardakhtGateway;
                break;
            default:
                throw new GatewayNotFoundException;
        }

        return $this;
    }

    
    /**
     * Get resnumber
     *
     * @return  mixed
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set resnumber
     *
     * @param  mixed  $request  resnumber
     *
     * @return  self
     */ 
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }


    /**
     * Get Gateway function
     *
     * @return GatewayInterface
     */
    public function getDeriver(): GatewayInterface
    {
        return $this->deriver;
    }


    /**
     * Get paymentable
     *
     * @return  PaymentableInterface
     */ 
    public function getPaymentable()
    {
        return $this->paymentable;
    }

    /**
     * Set paymentable
     *
     * @param  PaymentableInterface  $paymentable  paymentable
     *
     * @return  self
     */ 
    public function setPaymentable(PaymentableInterface $paymentable)
    {
        $this->paymentable = $paymentable;

        return $this;
    }


    public function createRequest()
    {
        if ( !($this->deriver instanceof GatewayInterface) ) {
            throw new GatewayNotFoundException;
        }
        
        return  $this->deriver->setPaymentable($this->paymentable);
    }

    public function createVerfiy()
    {
        if ( !($this->deriver instanceof GatewayInterface) ) {
            throw new GatewayNotFoundException;
        }

        return  $this->deriver->setRequest($this->request);
    }

}