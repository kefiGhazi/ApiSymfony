<?php
declare(strict_types=1);

namespace App\Presentation\Adapter;

use App\Entity\Subscription;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequestAdapter
 * @package App\Request\Presentation\Adapter
 */
final class RequestAdapter implements RequestAdapterInterface
{
    private SerializerInterface $jmsSerializer;

    /**
     * RequestAdapter constructor.
     * @param SerializerInterface $jmsSerializer
     */
    public function __construct(SerializerInterface $jmsSerializer)
    {
        $this->jmsSerializer = $jmsSerializer;
    }

    /**
     * @inheritDoc
     */
    public function buildCommandFromRequest(Request $request)
    {
        return $this->jmsSerializer->deserialize($request->getContent(), Subscription::class, 'json');
    }
}