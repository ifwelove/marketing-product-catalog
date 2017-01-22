<?php

namespace Tests\Marketing\Product\Catalog;

use Verybuy\Marketing\Product\Catalog\Adapter\FacebookAdapter;
use Verybuy\Marketing\Product\Catalog\Adapter\GoogleAdapter;
use Verybuy\Marketing\Product\Catalog\Factory\MarketingFactory;
use Verybuy\Marketing\Product\Catalog\Adapter\AdapterContract;

class MarketingFactoryTest extends AbstractTestCase
{
    public function testCreateAdapters()
    {
        $this->assertTrue(MarketingFactory::create(AdapterContract::GOOGLE) instanceof GoogleAdapter);
        $this->assertTrue(MarketingFactory::create(AdapterContract::FACEBOOK) instanceof FacebookAdapter);
    }

    public function testCreateUndefinedAdapterException()
    {
        // @todo assert factory throw exception
    }
}
