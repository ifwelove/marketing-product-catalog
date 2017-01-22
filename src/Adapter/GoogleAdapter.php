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
            $xml->addChild('title', $this->config['title']);
        }
        if (isset($this->config['link'])) {
            $link = $xml->addChild('link');
            $link->addAttribute('rel', 'self');
            $link->addAttribute('href', $this->config['link']);
        }
        foreach ($array as $item) {
            $entry = $xml->addChild('entry');
            $entry->addChild('title', $item['title']);
            $entry->addChild('id', $item['id']);
            $entry->addChild('description', $item['description']);
            $entry->addChild('link', $item['link']);
            $entry->addChild('image_link', $item['image_link']);
            $entry->addChild('brand', $item['brand']);
            $entry->addChild('condition', $item['condition']);
            $entry->addChild('availability', $item['availability']);
            $entry->addChild('price', $item['price']);
            $entry->addChild('google_product_category', $item['google_product_category']);
            $shipping = $entry->addChild('shipping');
            $shipping->addChild('country', $item['shipping']['country']);
            $shipping->addChild('service', $item['shipping']['service']);
            $shipping->addChild('price', $item['shipping']['price']);
        }

        return $xml;
    }
}
