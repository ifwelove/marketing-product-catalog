<?php
namespace Verybuy\Marketing\Product\Catalog\Resource\Traits\Google;

trait TraitBasicProductData
{
    private function validId()
    {
        if (!isset($this->getRawData()['id'])) {
            $this->getErrorMassageBag()->add('id', 'Required, Your product’s unique identifier.');
        }
        if (isset($this->getRawData()['id']) and mb_strlen($this->getRawData()['id']) > 50) {
            $this->getErrorMassageBag()->add('id', 'Max 50 characters.');
        }

        return $this;
    }

    private function validTitle()
    {
        if (!isset($this->getRawData()['title'])) {
            $this->getErrorMassageBag()->add('title', 'Required, Your product’s name.');
        }
        if (isset($this->getRawData()['title']) and mb_strlen($this->getRawData()['title']) > 150) {
            $this->getErrorMassageBag()->add('title', 'Max 150 characters.');
        }

        return $this;
    }
    
    private function validDescription()
    {
        if (!isset($this->getRawData()['description'])) {
            $this->getErrorMassageBag()->add('description', 'Required, Your product’s description.');
        }
        if (isset($this->getRawData()['description']) and mb_strlen($this->getRawData()['description']) > 5000) {
            $this->getErrorMassageBag()->add('description', 'Max 5000 characters.');
        }

        return $this;
    }

    private function validImageLink()
    {
        if (!isset($this->getRawData()['image_link'])) {
            $this->getErrorMassageBag()->add('image_link', 'Required, The URL of your product’s main image.');
        }
        if (isset($this->getRawData()['image_link']) and mb_strlen($this->getRawData()['product_type']) > 2000) {
             $this->getErrorMassageBag()->add('image_link', 'Max 2000 characters');
        }

        return $this;
    }

    private function validLink()
    {
        if (!isset($this->getRawData()['link'])) {
            $this->getErrorMassageBag()->add('link', 'Required, Your product’s landing page.');
        }
        if (isset($this->getRawData()['link']) and mb_strlen($this->getRawData()['link']) > 2000) {
             $this->getErrorMassageBag()->add('link', 'Max 2000 characters');
        }

        return $this;
    }
}
