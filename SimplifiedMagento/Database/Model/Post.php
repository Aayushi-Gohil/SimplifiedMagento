<?php
namespace SimplifiedMagento\Database\Model;

use SimplifiedMagento\Database\Api\Data\PostInterface;
 
// class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, PostInterface
class Post extends \Magento\Framework\Model\AbstractExtensibleModel implements \Magento\Framework\DataObject\IdentityInterface, PostInterface
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

        public function getPostId()
        {
                return $this->getData(PostInterface::POST_ID);
        }

        public function setPostId($id)
        {
                $this->setData(PostInterface::POST_ID,$id);
        }

        /**
        * Gets the ID for the order.
        *
        //* @return \SimplifiedMagento\Database\Api\Data\PostExtensionInterface
        */
        // public function getExtensionAttributes()
        // {
        //         return $this->_getExtensionAttributes();
        // }

        /**
         * Sets entity ID.
         *
        // * @param \SimplifiedMagento\Database\Api\Data\PostExtensionInterface $postExtensionInterface
         * @return $this
        */
        // public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\PostExtensionInterface $postExtensionInterface)
        // {
        //         return $this->_setExtensionAttributes($postExtensionInterface);
        // }
}