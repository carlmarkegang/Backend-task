<?php
namespace AppBundle\EventListener;

use AppBundle\Event\CustomerDeliveriesQuery;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\EntityManagerInterface;

class CustomerDeliveriesQueryHandler
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function onCustomerDeliveriesQuery(CustomerDeliveriesQuery $customerDeliveriesQuery)
    {

        /* @var User $user */
        $user = $this->em->getRepository(User::class)->find($customerDeliveriesQuery->getUserId());

        if(!$user)
            throw new NotFoundHttpException('user not found');

        $customerDeliveriesQuery->setDeliveries($user->getDeliveries());


    }
}