<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class DataCheckHistoryDetail extends Operation
{
    protected $check_id;

    function setCheckId($check_id)
    {
        $this->check_id = $check_id;
        return $check_id;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/dataCheckHistoryDetail?' . http_build_query([
                'seller_id' => $this->getSellerId(),
                'check_id' => $this->check_id
            ]);
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