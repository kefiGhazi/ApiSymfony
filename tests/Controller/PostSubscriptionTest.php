<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Controller\PostSubscription;
use App\Entity\Subscription;
use App\Presentation\Adapter\RequestAdapterInterface;
use App\Presentation\Request\RequestHandlerInterface;
use App\Presentation\Response\ResponseHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Phake;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostSubscriptionTest
 * @package App\Tests\Controller
 */
final class PostSubscriptionTest extends TestCase
{
    public function testProcessAction(): void
    {
        $response = Phake::mock(ResponseHandlerInterface::class);
        $em = Phake::mock(EntityManagerInterface::class);
        $adapter = Phake::mock(RequestAdapterInterface::class);
        $request = Phake::mock(RequestHandlerInterface::class);
        $httpFoundationRequest = Phake::mock(Request::class);
        $subscription = Phake::mock(Subscription::class);

        Phake::when($request)->__call('getRequest', [])->thenReturn($httpFoundationRequest);
        Phake::when($adapter)->__call('buildCommandFromRequest', [])->thenReturn([$subscription]);
        Phake::when($em)->__call('persist', [$subscription])->thenDoNothing();
        $class = new PostSubscription($request, $adapter, $em, $response);
        $result = $class->processAction();
        static::assertIsObject($result);
    }
}
