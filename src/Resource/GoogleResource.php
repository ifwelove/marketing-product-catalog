<?php
namespace Verybuy\Marketing\Product\Catalog\Resource;

class GoogleResource extends ResourceContract
{
    private function validProductType()
    {
        $this->getRawData()['product_type'];
        
        return $this;
    }

    private function validPrice()
    {
        if ($this->getRawData()['price'] < 100) {
            // $this->getErrorMassageBag()->add('price', 'price has to gratter than 100.');
            // $this->getErrorMassageBag()->add('price', 'price has to gratter than 50.');
            // dump($this->getErrorMassageBag()->get('price', 'aaaa :message'));
        }

        return $this;
    }

    public function validate()
    {
        $this->validProductType();
        $this->validPrice();
    }
}
