<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

interface AdapterContract
{
    const FACEBOOK = 'facebook';
    const GOOGLE = 'google';

    public function config(array $config);
    public function import(array $data);
    public function toXml();
}
