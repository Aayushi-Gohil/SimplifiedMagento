<?php
namespace SimplifiedMagento\Database\Model\ResourceModel\Post;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
        /**
         * Define resource model
         *
         * @return void
         */
        protected function _construct()
        {
                $this->_init('SimplifiedMagento\Database\Model\Post', 'SimplifiedMagento\Database\Model\ResourceModel\Post');
        }
}