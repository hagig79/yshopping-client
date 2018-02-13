<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class StCategoryList extends Operation
{
    protected $page_key;

    function setPageKey($page_key)
    {
        $this->page_key = $page_key;
        return $this;
    }

    function getUrl()
    {
        $params = [
            'seller_id' => $this->getSellerId(),
        ];
        if ($this->page_key) {
            $params['page_key'] = $this->page_key;
        }
        return $this->getBaseUrl() . '/stCategoryList?' . http_build_query($params);
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