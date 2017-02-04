<?php

namespace Verybuy\Marketing\Product\Catalog\Adapter;

use ReflectionClass;

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
