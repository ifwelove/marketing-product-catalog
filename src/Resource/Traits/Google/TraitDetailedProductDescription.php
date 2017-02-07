<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitDetailedProductDescription
{
    private function validCondition()
    {
        $conds = [
            'new', 'refurbished ', 'used '
        ];
        if (!isset($this->getRawData()['condition'])) {
            $this->getErrorMassageBag()->add('condition', 'Required, Your product\'s condition.');
        }
        if (isset($this->getRawData()['condition']) and !in_array($this->getRawData()['condition'], $conds)) {
             $this->getErrorMassageBag()->add('condition', 'value not in Supported values.');
        }

        return $this;
    }
}
