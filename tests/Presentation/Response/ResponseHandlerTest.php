<?php
declare(strict_types=1);

namespace App\Tests\Presentation\Response;

use App\Presentation\Response\ResponseHandler;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class ResponseHandlerTest
 * @package App\Tests\Presentation\Response
 */
final class ResponseHandlerTest extends TestCase
{
    public function testBuild(): void
    {
        $serializer = \Phake::mock(SerializerInterface::class);
        $class = new ResponseHandler($serializer);
        $content = ['message' => 'success'];
        $response = $class->build($content, 200);
        static::assertEquals(200, $response->getStatusCode());
    }
}
