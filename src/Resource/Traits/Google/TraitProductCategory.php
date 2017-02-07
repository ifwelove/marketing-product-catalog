<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitProductCategory
{
    private function validProductType()
    {
        if (isset($this->getRawData()['product_type']) and mb_strlen($this->getRawData()['product_type']) > 750) {
            $this->getErrorMassageBag()->add('product_type', 'Max 750 alphanumeric character.');
        }

        return $this;
    }

    private function validGoogleProductCategory()
    {
        if (!isset($this->getRawData()['google_product_category'])) {
            $this->getErrorMassageBag()->add('google_product_category', 'Required, Google-defined product category for your product.');
        }

        return $this;
    }
}
