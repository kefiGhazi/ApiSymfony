<?php
declare(strict_types=1);

namespace App\Presentation\Response;

use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseHandler.
 *
 * @package App\Presentation\Response
 */
final class ResponseHandler implements ResponseHandlerInterface
{
    private SerializerInterface $serializer;

    /**
     * ResponseHandler constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function build($content, int $status, ?array $headers = null): Response
    {
        $response = Response::create($this->serializer->serialize($content, 'json'), $status, (array)$headers);
        // Force response headers to have a Content-Type.
        $response->headers->set('Content-Type', Request::getMimeTypes('json'));
        return $response;
    }
}
