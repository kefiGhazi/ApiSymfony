<?php
declare(strict_types=1);

namespace App\Presentation\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestHandler
 * @package App\Presentation
 */
final class RequestHandler implements RequestHandlerInterface
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @param RequestStack $request
     */
    public function __construct(RequestStack $request)
    {
        /** @var Request $currentRequest */
        $currentRequest = $request->getCurrentRequest();
        $this->request = $currentRequest;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}