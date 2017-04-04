<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

use Verybuy\Marketing\Product\Catalog\Helpers\ExSimpleXMLElement;
use League\Csv\Writer;

class FacebookAdapter extends AbstractAdapter
{
    public function toXml()
    {
        $namespace = AdapterContract::XML_NAMESPACE;
        $collection = $this->getSuccessCollection();

        $xml = new ExSimpleXMLElement(sprintf('<feed xmlns="http://www.w3.org/2005/Atom" xmlns:g="%s"/>', $namespace));
        $xml->addChildCData('title', $this->config['title']);
        $link = $xml->addChild('link');
        $link->addAttribute('rel', 'self');
        $link->addAttribute('href', $this->config['link']);
        $collection->each(function ($item) use ($xml, $namespace) {
            $rawData = $item->getRawData();
            $entry = $xml->addChild('entry');
            $entry->addChildCData('title', $rawData['title'], $namespace);
            $entry->addChild('id', $rawData['id'], $namespace);
            $entry->addChildCData('description', $rawData['description'], $namespace);
            $entry->addChildCData('link', $rawData['link'], $namespace);
            $entry->addChildCData('image_link', $rawData['image_link'], $namespace);
            $entry->addChildCData('brand', $rawData['brand'], $namespace);
            $entry->addChild('condition', $rawData['condition'], $namespace);
            $entry->addChild('availability', $rawData['availability'], $namespace);
            $entry->addChild('price', $rawData['price'], $namespace);
            $entry->addChildCData('product_type', $rawData['product_type'], $namespace);
            $entry->addChildCData('google_product_category', $rawData['google_product_category'], $namespace);
            $entry->addChildCData('custom_label_0', $rawData['custom_label_0'], $namespace);
            $entry->addChildCData('custom_label_1', $rawData['custom_label_1'], $namespace);
            $entry->addChildCData('custom_label_2', $rawData['custom_label_2'], $namespace);
            $entry->addChildCData('custom_label_3', $rawData['custom_label_3'], $namespace);
            $entry->addChildCData('custom_label_4', $rawData['custom_label_4'], $namespace);
//            $shipping = $entry->addChild('shipping');
//            $shipping->addChild('country', $rawData['shipping']['country']);
//            $shipping->addChild('service', $rawData['shipping']['service']);
//            $shipping->addChild('price', $rawData['shipping']['price']);
        });

        return $xml;
    }

    public function getCsvHeader()
    {
        $header = ['id', 'title', 'description', 'brand', 'link', 'image_link', 'condition', 'availability', 'price', 'product_type', 'google_product_category', 'custom_label_0', 'custom_label_1', 'custom_label_2', 'custom_label_3', 'custom_label_4'];
        return $header;
    }

    public function saveCsv($filePath = '', $header = true)
    {
        $csv = Writer::createFromPath($filePath, 'a');
        if($header) {
            $csv->insertOne($this->getCsvHeader());
        }
        $collection = $this->getSuccessCollection();
        $collection->each(function ($item) use ($csv) {
            $rawData = $item->getRawData();
            $csv->insertOne($rawData);
        });

        return $csv;
    }
}
