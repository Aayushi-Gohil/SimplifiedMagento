<?php

namespace Dev\Blog\Model;

class Blog extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Dev\Blog\Model\ResourceModel\Blog');
    }
}