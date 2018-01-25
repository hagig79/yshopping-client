<?php

namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class EditItem extends Operation
{
    protected $item_code;
    protected $path;
    protected $name;
    protected $price;
    protected $caption;
    protected $explanation;
    protected $ship_weight;
    protected $product_category;

    function setItemCode($item_code)
    {
        $this->item_code = $item_code;
        return $this;
    }

    function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    function setExplanation($explanation)
    {
        $this->explanation = $explanation;
        return $this;
    }

    function setShipWeight($weight)
    {
        $this->ship_weight = $weight;
        return $this;
    }

    function setProductCategory($pcategory)
    {
        $this->product_category = $pcategory;
        return $this;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/editItem';
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
        $params = [
            'seller_id' => $this->getSellerId(),
            'item_code' => $this->item_code,
            'path' => $this->path,
            'name' => $this->name,
            'price' => $this->price
        ];
        if (isset($this->caption)) {
            $params['caption'] = $this->caption;
        }
        if (isset($this->explanation)) {
            $params['explanation'] = $this->explanation;
        }
        if (isset($this->ship_weight)) {
            $params['ship_weight'] = $this->ship_weight;
        }
        if (isset($this->product_category)) {
            $params['product_category'] = $this->product_category;
        }
        return http_build_query($params);
    }
}