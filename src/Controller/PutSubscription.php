<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PutSubscription
 * @package App\Controller
 */
final class PutSubscription extends AbstractController
{
    private const CONFLICT_MESSAGE = 'The request could not be completed due to a conflict with the current resource.';

    /**
     * @inheritDoc
     */
    public function processAction(): Response
    {
        // Get request
        $idSubscription = $this->request->getRequest()->get('id');
        $subscription = $this->adapter->buildCommandFromRequest($this->request->getRequest());

        if (intval($idSubscription) !== $subscription->getId()) {
            return $this->response->build(
                self::CONFLICT_MESSAGE,
                409
            );
        }

        // update Subscription
        $response = $this->em->getRepository(Subscription::class)->updateSubscription($subscription);

        // Response
        return $this->response->build(
            null === $response ? ['message' => self::CONFLICT_MESSAGE] : ['message' => 'success'],
            null === $response ? 409 : 200
        );
    }
}