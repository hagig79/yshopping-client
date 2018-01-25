<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class UploadItemFile extends Operation
{
    protected $filepath;
    protected $type;

    function setFilePath($file)
    {
        $this->filepath = $file;
        return $this;
    }

    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/uploadItemFile?'.http_build_query([
            'seller_id' => $this->getSellerId()
            ]);
    }

    function getMethod()
    {
        return Operation::METHOD_POST;
    }

    function needsAuth()
    {
        return true;
    }

    function getParams()
    {
        return [
            'file' => new \CURLFile($this->filepath, "text/csv"),
            'type' => $this->type,
        ];
    }
}