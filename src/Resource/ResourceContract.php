<?php
namespace Verybuy\Marketing\Product\Catalog\Resource;

use Illuminate\Support\MessageBag;

abstract class ResourceContract implements ResourceInterface
{
    protected $raw;
    protected $errors;

    public function __construct(array $raw)
    {
        $this->setRawData($raw);
        $this->errors = new MessageBag;
    }

    protected function getErrorMassageBag()
    {
        return $this->errors;
    }

    public function hasError()
    {
        return !$this->getErrorMassageBag()->isEmpty();
    }

    protected function setRawData(array $raw)
    {
        $this->raw = $raw;

        return $this;
    }

    public function getRawData()
    {
        return $this->raw;
    }
}
