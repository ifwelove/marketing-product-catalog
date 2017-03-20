<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitCustomLabel
{
    private function validCustomLabel()
    {
        if (isset($this->getRawData()['custom_label_0']) and mb_strlen($this->getRawData()['custom_label_0']) > 100) {
             $this->getErrorMassageBag()->add('custom_label_0', 'Max 100 characters');
        }
        if (isset($this->getRawData()['custom_label_1']) and mb_strlen($this->getRawData()['custom_label_1']) > 100) {
             $this->getErrorMassageBag()->add('custom_label_1', 'Max 100 characters');
        }
        if (isset($this->getRawData()['custom_label_2']) and mb_strlen($this->getRawData()['custom_label_2']) > 100) {
             $this->getErrorMassageBag()->add('custom_label_2', 'Max 100 characters');
        }
        if (isset($this->getRawData()['custom_label_3']) and mb_strlen($this->getRawData()['custom_label_3']) > 100) {
             $this->getErrorMassageBag()->add('custom_label_3', 'Max 100 characters');
        }
        if (isset($this->getRawData()['custom_label_4']) and mb_strlen($this->getRawData()['custom_label_4']) > 100) {
             $this->getErrorMassageBag()->add('custom_label_4', 'Max 100 characters');
        }

        return $this;
    }
}
