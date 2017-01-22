<?php

namespace Verybuy\Marketing\Product\Catalog\Factory;

use InvalidArgumentException;
use Verybuy\Marketing\Product\Catalog\Adapter\AdapterContract;
use Verybuy\Marketing\Product\Catalog\Adapter\FacebookAdapter;
use Verybuy\Marketing\Product\Catalog\Adapter\GoogleAdapter;

class MarketingFactory
{
    public static function create($adapter = null)
    {
        switch ($adapter) {
            case (AdapterContract::FACEBOOK):
                return new FacebookAdapter();
            case (AdapterContract::GOOGLE):
                return new GoogleAdapter();
            default:
                throw new InvalidArgumentException('Undefined adapter.');
        }
    }
}
