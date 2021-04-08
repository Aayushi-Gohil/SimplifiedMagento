<?php
namespace SimplifiedMagento\BlogExample\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'blog_id';
	protected $_eventPrefix = 'blog_collection';
	protected $_eventObject = 'blog_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('SimplifiedMagento\BlogExample\Model\Blog', 'SimplifiedMagento\BlogExample\Model\ResourceModel\Blog');
	}

}