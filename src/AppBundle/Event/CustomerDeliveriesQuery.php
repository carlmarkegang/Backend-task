<?php
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use AppBundle\Entity\User;

final class CustomerDeliveriesQuery extends Event
{
    const NAME = 'customer_delivery_query';

    private $userId;
    private $deliveries;


    public function __construct(User $user)
    {
        $this->userId = $user->getId();
        $this->deliveries = $user->getDeliveries();
    }

   public function getUserId()
    {
        return $this->userId;
    }

    public function getDeliveries()
    {
        return $this->deliveries;
    }

}