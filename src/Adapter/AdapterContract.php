<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

interface AdapterContract
{
    const FACEBOOK = 'facebook';
    const GOOGLE = 'google';
    const XML_NAMESPACE = 'http://base.google.com/ns/1.0';

    public function config(array $config);
    public function import(array $data);
    public function validation();
    public function toXml();
    public function saveCsv($filePath, $header);
}
