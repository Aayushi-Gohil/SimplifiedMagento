<?php

namespace Dev\Blog\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Dev\Blog\Model\Blog', 'Dev\Blog\Model\ResourceModel\Blog');
    }
}