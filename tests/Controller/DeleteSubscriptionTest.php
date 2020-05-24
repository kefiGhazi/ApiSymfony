<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Controller\DeleteSubscription;
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
 * Class DeleteSubscriptionTest
 * @package App\Tests\Controller
 */
final class DeleteSubscriptionTest extends TestCase
{
    public function testProcessActionWithWrongId(): void
    {
        $response = Phake::mock(ResponseHandlerInterface::class);
        $em = Phake::mock(EntityManagerInterface::class);
        $adapter = Phake::mock(RequestAdapterInterface::class);
        $request = Phake::mock(RequestHandlerInterface::class);
        $httpFoundationRequest = Phake::mock(Request::class);
        $objectRepository = Phake::mock(SubscriptionRepository::class);
        $httpFoundationResponse = Phake::mock(Response::class);

        Phake::when($httpFoundationRequest)->__call('get', ['id'])->thenReturn('1');
        Phake::when($request)->__call('getRequest', [])->thenReturn($httpFoundationRequest);
        Phake::when($objectRepository)->__call('findOneById', ['1'])->thenReturn([]);
        Phake::when($em)->__call('getRepository', [Subscription::class])->thenReturn($objectRepository);
        Phake::when($response)->__call('build', [Phake::anyParameters()])->thenReturn($httpFoundationResponse);
        Phake::when($httpFoundationResponse)->__call('getStatusCode', [])->thenReturn(404);

        $class = new DeleteSubscription($request, $adapter, $em, $response);
        $result = $class->processAction();
        static::assertEquals(404, $result->getStatusCode());
    }

    public function testProcessActionWithWrightId(): void
    {
        $response = Phake::mock(ResponseHandlerInterface::class);
        $em = Phake::mock(EntityManagerInterface::class);
        $adapter = Phake::mock(RequestAdapterInterface::class);
        $request = Phake::mock(RequestHandlerInterface::class);
        $httpFoundationRequest = Phake::mock(Request::class);
        $objectRepository = Phake::mock(SubscriptionRepository::class);
        $httpFoundationResponse = Phake::mock(Response::class);
        $subscription = ['test' => 'test'];
        Phake::when($httpFoundationRequest)->__call('get', ['id'])->thenReturn('1');
        Phake::when($request)->__call('getRequest', [])->thenReturn($httpFoundationRequest);
        Phake::when($objectRepository)->__call('findOneById', ['1'])->thenReturn($subscription);
        Phake::when($em)->__call('getRepository', [Subscription::class])->thenReturn($objectRepository);
        Phake::when($response)->__call('build', [Phake::anyParameters()])->thenReturn($httpFoundationResponse);
        Phake::when($httpFoundationResponse)->__call('getStatusCode', [])->thenReturn(200);

        $class = new DeleteSubscription($request, $adapter, $em, $response);
        $result = $class->processAction();
        static::assertEquals(200, $result->getStatusCode());
    }
}
