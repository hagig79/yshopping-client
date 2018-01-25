<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class DownloadSubmit extends Operation
{

    protected $type;

    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . "/downloadSubmit?seller_id=" . $this->getSellerId() . '&type=' . $this->type;
    }

    function getMethod()
    {
        return Operation::METHOD_GET;
    }

    function needsAuth()
    {
        return true;
    }
}