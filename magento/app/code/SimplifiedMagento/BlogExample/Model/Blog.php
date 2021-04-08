<?php
namespace SimplifiedMagento\BlogExample\Model;
class Blog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'blog';

	protected $_cacheTag = 'blog';

	protected $_eventPrefix = 'blog';

	protected function _construct()
	{
		$this->_init('SimplifiedMagento\BlogExample\Model\ResourceModel\Blog');
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
}