<?php
namespace Verybuy\Marketing\Product\Catalog\Resource;

use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitBasicProductData as BasicProductData;
use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitPriceAndAvailability as PriceAndAvailability;
use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitProductCategory as ProductCategory;
use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitProductIdentifiers as ProductIdentifiers;
use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitDetailedProductDescription as DetailedProductDescription;
use Verybuy\Marketing\Product\Catalog\Resource\Traits\Google\TraitCustomLabel as CustomLabel;

class GoogleResource extends ResourceContract
{
    use BasicProductData,
        PriceAndAvailability,
        ProductCategory,
        ProductIdentifiers,
        DetailedProductDescription,
        CustomLabel;

    public function validate()
    {
        $this->validId();
        $this->validTitle();
        $this->validProductType();
        $this->validPrice();
        $this->validLink();
        $this->validImageLink();
        $this->validAvailability();
        $this->validDescription();
        $this->validGoogleProductCategory();
        $this->validCondition();
        $this->validAdult();
        $this->validBrand();
        $this->validCustomLabel();
    }
}
