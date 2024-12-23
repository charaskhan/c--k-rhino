<?php
/**
 * Created by PhpStorm.
 * User: grent
 * Date: 5/25/2019
 * Time: 4:24 PM
 */

class Customer extends User
{
    private $subscription;
    /**
     * Customer constructor.
     */
    public function __construct($id)
    {
        parent::__construct($id);
        $this->subscription=[];
    }

    /**
     * @return mixed
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @param mixed $subscription
     */
    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;
    }

}