<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class UploadItemImagePack extends Operation
{
    protected $filepath;
    protected $postname;

    function setFilePath($filepath)
    {
        $this->filepath = $filepath;
        return $this;
    }

    function setPostName($postname)
    {
        $this->postname = $postname;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/uploadItemImagePack?seller_id=' . $this->getSellerId();
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
        if ($this->postname) {
            $postname = $this->postname;
        } else {
            $postname = strtolower(basename($this->filepath));
        }
        return [
            'file' => new \CURLFile($this->filepath, "application/octet-stream", $postname)
        ];
    }
}