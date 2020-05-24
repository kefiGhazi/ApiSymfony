<?php
declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Subscription;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionTest
 * @package App\Tests\Entity
 */
final class SubscriptionTest extends TestCase
{
    public function testSubscription(): void
    {
        $class = new Subscription();

        $class->setBeginDate('2020-10-10');
        $class->setEndDate('2020-10-10');
        $class->setContact(new Contact());
        $class->setProduct(new Product());

        static::assertSame('2020-10-10', $class->getBeginDate()->format('Y-m-d'));
        static::assertSame('2020-10-10', $class->getEndDate()->format('Y-m-d'));
        static::assertObjectHasAttribute('name', $class->getContact());
        static::assertObjectHasAttribute('label', $class->getProduct());
    }
}
