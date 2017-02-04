<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

class GoogleAdapter extends AbstractAdapter
{
    public function toXml()
    {
        $namespace = 'http://base.google.com/ns/1.0';
        $array = $this->getSuccessCollection();
        $xml = new \SimpleXMLElement(sprintf('<feed xmlns="http://www.w3.org/2005/Atom" xmlns:g="%s"/>', $namespace));
        if (isset($this->config['title'])) {
            $xml->addChild('title', $this->addCDATA($this->config['title']));
        }
        if (isset($this->config['link'])) {
            $link = $xml->addChild('link');
            $link->addAttribute('rel', 'self');
            $link->addAttribute('href', $this->config['link']);
        }
        foreach ($array as $item) {
            $entry = $xml->addChild('entry');
            $entry->addChild('title', $this->addCDATA($item['title']), $namespace);
            $entry->addChild('id', $item['id'], $namespace);
            $entry->addChild('description', $this->addCDATA($item['description']), $namespace);
            $entry->addChild('link', $this->addCDATA($item['link']), $namespace);
            $entry->addChild('image_link', $this->addCDATA($item['image_link']), $namespace);
            $entry->addChild('brand', $this->addCDATA($item['brand']), $namespace);
            $entry->addChild('condition', $item['condition'], $namespace);
            $entry->addChild('availability', $item['availability'], $namespace);
            $entry->addChild('price', $item['price'], $namespace);
            $entry->addChild('product_type', $this->addCDATA($item['product_type']), $namespace);
            $entry->addChild('google_product_category', $this->addCDATA($item['google_product_category']), $namespace);
            $entry->addChild('custom_label_0', $this->addCDATA($item['custom_label_0']), $namespace);
            
//            $shipping = $entry->addChild('shipping');
//            $shipping->addChild('country', $item['shipping']['country']);
//            $shipping->addChild('service', $item['shipping']['service']);
//            $shipping->addChild('price', $item['shipping']['price']);
        }

        return $xml;
    }
}
