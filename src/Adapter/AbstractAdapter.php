<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

use ReflectionClass;
use Verybuy\Marketing\Product\Catalog\Exceptions\ConfigException;

abstract class AbstractAdapter implements AdapterContract
{
    protected $config;
    protected $import;
    protected $processed;

    public function __construct()
    {
        $this->processed = collect([
            'success' => collect(),
            'failure' => collect(),
        ]);
    }

    public function config(array $config)
    {
        if (!isset($config['title'])) {
            throw new ConfigException('config not set title');
        }
        if (!isset($config['link'])) {
            throw new ConfigException('config not set link');
        }
        $this->config = $config;

        return $this;
    }

    public function import(array $data)
    {
        $reflact = new ReflectionClass($this);
        $class = str_replace('Adapter', 'Resource', $reflact->getName());

        $this->import = collect($data)->map(function($resource) use($class) {
            return new $class($resource);
        });

        $this->validation();

        return $this;
    }

    public function addCDATA(string $string)
    {
        return "<![CDATA[{$string}]]>";
    }

    protected function getImportCollection()
    {
         return $this->import;
    }

    public function getSuccessCollection()
    {
         return $this->processed->get('success');
    }

    public function getFailureCollection()
    {
         return $this->processed->get('failure');
    }

    public function validation()
    {
        $this->getImportCollection()->each(function ($resource) {
            $resource->validate();
            if (!$resource->hasError()) {
                $this->getSuccessCollection()->push($resource);
            } else {
                $this->getFailureCollection()->push($resource);
            }
        });

        return $this;
    }
}
