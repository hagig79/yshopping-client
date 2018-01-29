<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class GetItem extends Operation
{
    protected $item_code;

    function setItemCode($item_code)
    {
        $this->item_code = $item_code;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/getItem?' . http_build_query([
                'seller_id' => $this->getSellerId(),
                'item_code' => $this->item_code
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