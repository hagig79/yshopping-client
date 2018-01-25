<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class DeleteItem extends Operation
{

    protected $item_code;

    function setItemCode(array $item_code)
    {
        $this->item_code = $item_code;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/deleteItem';
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
            'item_code' => implode(',', $this->item_code)
        ]);
    }
}