<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

class GoogleAdapter extends AbstractAdapter
{
    public function toXml()
    {
        $namespace = AdapterContract::XML_NAMESPACE;
        $collection = $this->getSuccessCollection();

        $xml = new \SimpleXMLElement(sprintf('<feed xmlns="http://www.w3.org/2005/Atom" xmlns:g="%s"/>', $namespace));
        $xml->addChild('title', $this->addCDATA($this->config['title']));
        $link = $xml->addChild('link');
        $link->addAttribute('rel', 'self');
        $link->addAttribute('href', $this->config['link']);
        $collection->each(function ($item) use ($xml, $namespace) {
            $rawData = $item->getRawData();
            $entry = $xml->addChild('entry');
            $entry->addChild('title', $this->addCDATA($rawData['title']), $namespace);
            $entry->addChild('id', $rawData['id'], $namespace);
            $entry->addChild('description', $this->addCDATA($rawData['description']), $namespace);
            $entry->addChild('link', $this->addCDATA($rawData['link']), $namespace);
            $entry->addChild('image_link', $this->addCDATA($rawData['image_link']), $namespace);
            $entry->addChild('brand', $this->addCDATA($rawData['brand']), $namespace);
            $entry->addChild('condition', $rawData['condition'], $namespace);
            $entry->addChild('availability', $rawData['availability'], $namespace);
            $entry->addChild('price', $rawData['price'], $namespace);
            $entry->addChild('product_type', $this->addCDATA($rawData['product_type']), $namespace);
            $entry->addChild('google_product_category', $this->addCDATA($rawData['google_product_category']), $namespace);
            $entry->addChild('custom_label_0', $this->addCDATA($rawData['custom_label_0']), $namespace);
//            $shipping = $entry->addChild('shipping');
//            $shipping->addChild('country', $rawData['shipping']['country']);
//            $shipping->addChild('service', $rawData['shipping']['service']);
//            $shipping->addChild('price', $rawData['shipping']['price']);
        });

        return $xml;
    }
}
