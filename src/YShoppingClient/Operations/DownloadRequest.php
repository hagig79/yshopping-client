<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class DownloadRequest extends Operation
{

    protected $type;

    function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/downloadRequest';
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
        return http_build_query([
            'seller_id' => $this->getSellerId(),
            'type' => $this->type
        ]);
    }
}