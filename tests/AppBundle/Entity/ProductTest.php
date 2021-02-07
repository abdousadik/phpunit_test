<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testcomputeTVAProductTypeFood()
    {
        $product = new Product('nom', Product::FOOD_PRODUCT, 10);
        $result = $product->computeTVA();

        $this->assertSame(0.55,$result);
    }

    public function testcomputeTVAProductOtherType()
    {
        $product = new Product('nom', 'other', 10);
        $result = $product->computeTVA();

        $this->assertSame(1.96,$result);
    }

    public function testNegativePriceComputeTVA()
    {
        $product = new Product('nom', 'other', -1);

        $this->expectException('LogicException');
        
        $product->computeTVA();
    }
}