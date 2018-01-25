<?php

namespace Rrrz\YShoppingClient;

abstract class Operation
{
    const METHOD_GET = 1;
    const METHOD_POST = 2;

    protected $appid;
    protected $seller_id;

    function setAppid($appid)
    {
        $this->appid = $appid;
    }

    function getAppid()
    {
        return $this->appid;
    }

    function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;
        return $this;
    }

    function getSellerId()
    {
        return $this->seller_id;
    }

    function getBaseUrl()
    {
        if (!$this->seller_id || !preg_match('/^snbx-/', $this->seller_id)) {
            return 'https://shopping.yahooapis.jp/ShoppingWebService/V1';
        } else {
            return 'https://test.circus.shopping.yahooapis.jp/ShoppingWebService/V1';
        }
    }

    function getParams()
    {
        return null;
    }

    abstract function getUrl();
    abstract function getMethod();
    abstract function needsAuth();
}