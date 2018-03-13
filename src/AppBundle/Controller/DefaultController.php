<?php

namespace AppBundle\Controller;

use AppBundle\EventListener\CustomerDeliveriesQueryHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/users/{user_id}/deliveries", name="homepage")
     */
    public function userDeliveries($user_id)
    {
        if ($user_id){
            $user = $this->getDoctrine()->getRepository(User::class)->find($user_id);
            $customerDeliveriesQueryHandler = new CustomerDeliveriesQueryHandler();
            $deliveries = $customerDeliveriesQueryHandler->onCustomerDeliveriesQuery($user);
        }

        return $this->json(array('userDeliveries' => $deliveries));

        #dump($deliveries);

        return $this->render('index.html.twig', array(
            'username' => $deliveries,
        ));
    }
}
