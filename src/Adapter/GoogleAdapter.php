<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

class GoogleAdapter extends AbstractAdapter
{
    protected function validation()
    {
        //@todo success prod, error prod
        $this->processed['success'] = $this->original;

        return $this;
    }

    public function toXml()
    {
        $array = $this->processed['success'];
        $xml = new \SimpleXMLElement('<feed xmlns="http://www.w3.org/2005/Atom" xmlns:g="http://base.google.com/ns/1.0"/>');
        if (isset($this->config['title'])) {
            $xml->addChild('title', $this->addCDATA($this->config['title']));
        }
        if (isset($this->config['link'])) {
            $link = $xml->addChild('link');
            $link->addAttribute('rel', 'self');
            $link->addAttribute('href', $this->addCDATA($this->config['link']));
        }
        foreach ($array as $item) {
            $entry = $xml->addChild('entry');
            $entry->addChild('g:title', $this->addCDATA($item['title']));
            $entry->addChild('g:id', $item['id']);
            $entry->addChild('g:description', $this->addCDATA($item['description']));
            $entry->addChild('g:link', $this->addCDATA($item['link']));
            $entry->addChild('g:image_link', $this->addCDATA($item['image_link']));
            $entry->addChild('g:brand', $this->addCDATA($item['brand']));
            $entry->addChild('g:condition', $item['condition']);
            $entry->addChild('g:availability', $item['availability']);
            $entry->addChild('g:price', $item['price']);
            $entry->addChild('g:product_type', $this->addCDATA($item['product_type']));
            $entry->addChild('g:google_product_category', $this->addCDATA($item['google_product_category']));
            $entry->addChild('g:custom_label_0', $this->addCDATA($item['custom_label_0']));
            
//            $shipping = $entry->addChild('shipping');
//            $shipping->addChild('country', $item['shipping']['country']);
//            $shipping->addChild('service', $item['shipping']['service']);
//            $shipping->addChild('price', $item['shipping']['price']);
        }

        return $xml;
    }
}
