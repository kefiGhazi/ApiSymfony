<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Subscription;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class GetSubscription
 * @package App\Controller
 */
final class GetSubscription extends AbstractController
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
        return $this->response->build(
            [] === $subscription ? ['message' => 'No content with this identifier.'] : $subscription,
            [] === $subscription ? 204 : 200
        );
    }
}
