<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class DataCheckHistorySummary extends Operation
{
    protected $file_type;
    protected $start;
    protected $results;

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

    function setFileType($file_type)
    {
        $this->file_type = $file_type;
        return $this;
    }

    function getUrl()
    {
        $params = ['seller_id' => $this->getSellerId()];
        if ($this->file_type) {
            $params['file_type'] = $this->file_type;
        }
        if ($this->start) {
            $params['start'] = $this->start;
        }
        if ($this->results) {
            $params['results'] = $this->results;
        }
        return $this->getBaseUrl() . '/dataCheckHistorySummary?' . http_build_query($params);
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