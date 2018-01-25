<?php
namespace Rrrz\YShoppingClient\Operations;

use Rrrz\YShoppingClient\Operation;

class CategorySearch extends Operation
{
    private $categoryId;

    function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    function getCategoryId()
    {
        return $this->categoryId;
    }

    function getUrl()
    {
        return $this->getBaseUrl() . '/categorySearch?' . http_build_query(array(
                'appid' => $this->getAppid(),
                'category_id' => $this->categoryId
            ));
    }

    function getMethod()
    {
        return Operation::METHOD_GET;
    }

    function needsAuth()
    {
        return false;
    }
}
