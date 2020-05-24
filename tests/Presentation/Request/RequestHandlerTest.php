<?php
declare(strict_types=1);

namespace App\Tests\Presentation;

use App\Presentation\Request\RequestHandler;
use Phake;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestHandlerTest
 * @package App\Tests\Presentation
 */
final class RequestHandlerTest extends TestCase
{
    public function testGetRequest(): void
    {
        $request = Phake::mock(RequestStack::class);
        $currentRequest =  Phake::mock(Request::class);
        Phake::when($request)->__call('getCurrentRequest', [])->thenReturn($currentRequest);
        $class = new RequestHandler($request);
        static::assertSame(null, $class->getRequest()->request);
    }
}
