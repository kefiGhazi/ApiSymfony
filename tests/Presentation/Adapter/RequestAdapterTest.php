<?php
declare(strict_types=1);

namespace App\Tests\Presentation\Adapter;

use App\Entity\Subscription;
use App\Entity\SubscriptionInterface;
use App\Presentation\Adapter\RequestAdapter;
use JMS\Serializer\SerializerInterface;
use Phake;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequestAdapterTest
 * @package App\Tests\Presentation\Adapter
 */
final class RequestAdapterTest extends TestCase
{
    public function testBuildCommandFromRequest():void
    {
        $request = Phake::mock(Request::class);
        $jmsSerializer = Phake::mock(SerializerInterface::class);
        $subscription = Phake::mock(SubscriptionInterface::class);
        $content = "[
            'id' => 1 ,
            'begin_date' => '2020-10-10',
            'end_date' => '2020-10-10',
            'contact' => ['name' => 'testName', 'first_name' => 'testFirstName'],
            'product' => ['label' => 'labelTest']
            ]";
        Phake::when($request)->__call('getContent', [])->thenReturn($content);
        Phake::when($jmsSerializer)->__call('deserialize', [$content, Subscription::class, 'json'])
            ->thenReturn($subscription);
        $class = new RequestAdapter($jmsSerializer);
        $response = $class->buildCommandFromRequest($request);
        static::assertIsObject($response);
        //static::assertObjectHasAttribute($response);
    }
}
