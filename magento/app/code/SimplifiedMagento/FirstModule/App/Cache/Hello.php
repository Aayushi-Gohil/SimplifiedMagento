<?php
namespace SimplifiedMagento\FirstModule\App\Cache;

use Magento\Framework\Cache\Frontend\Decorator\TagScope;
use Magento\Framework\Config\CacheInterface;
use Magento\Framework\App\Cache\Type\FrontendPool;

class Hello extends TagScope implements CacheInterface
{
	const TYPE_IDENTIFIER = 'hello';

	const CACHE_TAG = 'HELLO';

	public function __construct(FrontendPool $frontendpool)
	{
		parent::__construct($frontendpool->get(self::TYPE_IDENTIFIER),self::CACHE_TAG);
	}
}