<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

abstract class AbstractAdapter implements AdapterContract
{
    protected $config;
    protected $original;
    protected $processed;

    public function config(array $config)
    {
        $this->config = $config;

        return $this;
    }

    public function import(array $data)
    {
        $this->original = $data;
        $this->validation();

        return $this;
    }

    abstract protected function validation();
}
