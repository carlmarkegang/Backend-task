<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use AppBundle\Entity\User;
use AppBundle\Entity\Delivery;

class CustomerDeliveriesQuery extends Event
{
    const NAME = 'customer_delivery_query';

    private $userId;
    private $deliveries;


    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->deliveries = null;
    }

   public function getUserId()
    {
        return $this->userId;
    }

    public function getUserDeliveries()
    {
        return $this->deliveries;
    }

    public function setDeliveries($deliveries)
    {
        $this->deliveries = $deliveries;
    }

}