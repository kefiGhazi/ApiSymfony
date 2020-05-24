<?php
declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 * @package App\Tests\Entity
 */
final class ContactTest extends TestCase
{
    public function testContact(): void
    {
        $class = new Contact();
        $class->setName('testName');
        $class->setFirstName('testFirstName');
        static::assertSame('testName', $class->getName());
        static::assertSame('testFirstName', $class->getFirstName());
    }
}