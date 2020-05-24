<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Controller\PutSubscription;
use App\Entity\Subscription;
use App\Presentation\Adapter\RequestAdapterInterface;
use App\Presentation\Request\RequestHandlerInterface;
use App\Presentation\Response\ResponseHandlerInterface;
use App\Repository\SubscriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Phake;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PutSubscriptionTest
 * @package App\Tests\Controller
 */
final class PutSubscriptionTest extends TestCase
{
    public function testProcessAction(): void
    {
        $response = Phake::mock(ResponseHandlerInterface::class);
        $em = Phake::mock(EntityManagerInterface::class);
        $adapter = Phake::mock(RequestAdapterInterface::class);
        $request = Phake::mock(RequestHandlerInterface::class);
        $httpFoundationRequest = Phake::mock(Request::class);
        $subscription = Phake::mock(Subscription::class);
        $httpFoundationResponse = Phake::mock(Response::class);

        Phake::when($httpFoundationRequest)->__call('get', ['id'])->thenReturn('1');
        Phake::when($request)->__call('getRequest', [])->thenReturn($httpFoundationRequest);
        Phake::when($adapter)->__call('buildCommandFromRequest', [$httpFoundationRequest])->thenReturn($subscription);
        Phake::when($subscription)->__call('getId', [])->thenReturn(2);
        Phake::when($response)->__call('build', [Phake::anyParameters()])->thenReturn($httpFoundationResponse);
        Phake::when($httpFoundationResponse)->__call('getStatusCode', [])->thenReturn(409);

        $class = new PutSubscription($request, $adapter, $em, $response);
        $result = $class->processAction();
        static::assertEquals(409, $result->getStatusCode());
    }

    public function testProcessActionWithSameValue(): void
    {
        $response = Phake::mock(ResponseHandlerInterface::class);
        $em = Phake::mock(EntityManagerInterface::class);
        $adapter = Phake::mock(RequestAdapterInterface::class);
        $request = Phake::mock(RequestHandlerInterface::class);
        $httpFoundationRequest = Phake::mock(Request::class);
        $subscription = Phake::mock(Subscription::class);
        $httpFoundationResponse = Phake::mock(Response::class);
        $objectRepository = Phake::mock(SubscriptionRepository::class);

        Phake::when($httpFoundationRequest)->__call('get', ['id'])->thenReturn('1');
        Phake::when($request)->__call('getRequest', [])->thenReturn($httpFoundationRequest);
        Phake::when($adapter)->__call('buildCommandFromRequest', [$httpFoundationRequest])->thenReturn($subscription);
        Phake::when($subscription)->__call('getId', [])->thenReturn(1);
        Phake::when($response)->__call('build', [Phake::anyParameters()])->thenReturn($httpFoundationResponse);
        Phake::when($httpFoundationResponse)->__call('getStatusCode', [])->thenReturn(409);
        Phake::when($em)->__call('getRepository', [Subscription::class])->thenReturn($objectRepository);

        $class = new PutSubscription($request, $adapter, $em, $response);
        $result = $class->processAction();
        static::assertEquals(409, $result->getStatusCode());
    }
}