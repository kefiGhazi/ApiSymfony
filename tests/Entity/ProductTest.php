<?php
declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package App\Tests\Entity
 */
final class ProductTest extends TestCase
{
    public function testProduct(): void
    {
        $class = new Product();
        $class->setLabel('labelTest');
        static::assertSame('labelTest', $class->getLabel());
    }
}
