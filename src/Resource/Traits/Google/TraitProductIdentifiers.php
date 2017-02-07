<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitProductIdentifiers
{
    private function validBrand()
    {
        if (!isset($this->getRawData()['brand'])) {
            $this->getErrorMassageBag()->add('brand', 'Required, Your product’s brand name.');
        }
        if (isset($this->getRawData()['brand']) and mb_strlen($this->getRawData()['brand']) > 70) {
             $this->getErrorMassageBag()->add('brand', 'Max 70 characters');
        }

        return $this;
    }
}
