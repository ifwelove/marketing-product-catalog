<?php
namespace Verybuy\Marketing\Product\Catalog\Resource;

interface ResourceInterface
{
    public function validate();
    public function hasError();
}