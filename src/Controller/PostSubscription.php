<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PostSubscription
 * @package App\Controller
 */
final class PostSubscription extends AbstractController
{

    /**
     * @inheritDoc
     */
    public function processAction(): Response
    {
        /** @var Subscription $subscription */
        $subscription = $this->adapter->buildCommandFromRequest($this->request->getRequest());

        $this->em->persist($subscription);
        $this->em->flush();;
        return $this->response->build(['message' => 'success'], 201);
    }
}
