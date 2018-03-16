<?php

namespace AppBundle\Controller;

use AppBundle\EventListener\CustomerDeliveriesQueryHandler;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Event\CustomerDeliveriesQuery;


class DefaultController extends Controller
{
    /**
     * @Route("/users/{user_id}/deliveries", name="homepage")
     */
    public function userDeliveries($user_id)
    {



        if ($user_id){
            $customerDeliveriesQuery = new CustomerDeliveriesQuery($user_id);
            $eventDispatcher = $this->container->get('event_dispatcher');
            dump($customerDeliveriesQuery);
            $eventDispatcher->dispatch(CustomerDeliveriesQuery::NAME, $customerDeliveriesQuery);

            dump($customerDeliveriesQuery);

            //$customerDeliveriesQueryHandler = $this->container->get('app.customer_deliveries_query_handler');

            //$deliveries = $customerDeliveriesQueryHandler->onCustomerDeliveriesQuery($user_id);

/*
            $userDeliveries = [];
            foreach ($deliveries->getUserDeliveries() as $delivery) {
                array_push($userDeliveries, $delivery->getDescription());
            }
*/

        }
/*
        return $this->json(array(
            'userId' => $deliveries->getUserId(),
            'deliveries' => $userDeliveries
            ));
*/exit;

    }
}
