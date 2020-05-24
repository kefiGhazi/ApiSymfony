<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeleteSubscription
 * @package App\Controller
 */
final class DeleteSubscription extends AbstractController
{
    /**
     * @inheritDoc
     */
    public function processAction(): Response
    {
        // Get request
        $idSubscription = $this->request->getRequest()->get('id');

        // Get subscription if exist from DB
        $subscription = $this->em->getRepository(Subscription::class)->findOneById($idSubscription);

        // Response
        if ([] === $subscription) {
            return $this->response->build(['message' => 'No content with this identifier'], 404);
        }

        $response = $this->em->getRepository(Subscription::class)->removeSubscription(intval($idSubscription));

        return $this->response->build(
            null === $response ? ['message' => 'No content with this identifier'] : ['message' => 'success'],
            null === $response ? 404 : 200
        );
    }
}
