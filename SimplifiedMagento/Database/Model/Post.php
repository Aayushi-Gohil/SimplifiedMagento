<?php
namespace SimplifiedMagento\Database\Model;

use SimplifiedMagento\Database\Api\Data\PostInterface;
 
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, PostInterface
{

        const CACHE_TAG = 'simplifiedMagento_database_post';

        protected $_cacheTag = 'simplifiedMagento_database_post';

        protected $_eventPrefix = 'simplifiedMagento_database_post';

        protected function _construct()
        {
                $this->_init('SimplifiedMagento\Database\Model\ResourceModel\Post');
        }
 
        public function getIdentities()
        {
                return [self::CACHE_TAG . '_' . $this->getId()];
        }
 
        public function getDefaultValues()
        {
                $values = [];
 
                return $values;
        }

        public function getId()
        {
                return $this->getData(PostInterface::ID);
        }

        public function setId($id)
        {
                $this->setData(PostInterface::ID,$id);
        }
}