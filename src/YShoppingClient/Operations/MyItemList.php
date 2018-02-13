<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class MyItemList extends Operation
{
    protected $stcat_key;
    protected $start;
    protected $results;

    function setStcatKey($stcat_key)
    {
        $this->stcat_key = $stcat_key;
        return $this;
    }

    function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    function setResults($results)
    {
        $this->results = $results;
        return $this;
    }

    function getUrl()
    {
        $params = [
            'seller_id' => $this->getSellerId(),
            'stcat_key' => $this->stcat_key
        ];
        if ($this->start) {
            $params['start'] = $this->start;
        }
        if ($this->results) {
            $params['results'] = $this->results;
        }
        return $this->getBaseUrl() . '/myItemList?' . http_build_query($params);
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