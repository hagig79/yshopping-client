<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class ReservePublish extends Operation
{

    function getUrl()
    {
        return $this->getBaseUrl() . '/reservePublish';
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
            'mode' => 1
        ]);
    }
}