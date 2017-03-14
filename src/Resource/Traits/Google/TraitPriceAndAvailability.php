<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitPriceAndAvailability
{
    private function validPrice()
    {
        if (!isset($this->getRawData()['price'])) {
            $this->getErrorMassageBag()->add('price', 'Required, Your product’s price.');
        }
        if (isset($this->getRawData()['price']) and $this->getRawData()['price'] <= 0) {
             $this->getErrorMassageBag()->add('price', 'price must be greater than 0.');
        }

        return $this;
    }

    private function validAvailability()
    {
        $conds = [
            'in stock', 'out of stock', 'preorder'
        ];
        if (!isset($this->getRawData()['availability'])) {
            $this->getErrorMassageBag()->add('availability', 'Required, Your product\'s availability.');
        }
        if (isset($this->getRawData()['availability']) and !in_array($this->getRawData()['availability'], $conds)) {
             $this->getErrorMassageBag()->add('availability', 'value not in Supported values.');
        }

        return $this;
    }
}
