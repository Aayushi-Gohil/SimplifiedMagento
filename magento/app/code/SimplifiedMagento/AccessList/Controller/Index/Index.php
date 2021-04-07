<?php

namespace SimplifiedMagento\AccessList\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * 
 */
class Index extends Action
{
	
	private $scopeConfig;

	public function __construct(ScopeConfigInterface $scopeConfig, Context $context)
	{
		$this->scopeConfig = $scopeConfig;
		parent::__construct($context);
	}

	public function execute()
	{
		echo $this->scopeConfig->getValue('FirstSection/FirstGroup/Firstfield') . "<br>";
		var_dump($this->scopeConfig->getValue('FirstSection/FirstGroup/Secondfield')) . "<br>";
		var_dump($this->scopeConfig->getValue('FirstSection/FirstGroup/Thirdfield'));
	}
}