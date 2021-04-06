<?php
namespace SimplifiedMagento\FirstModule\ViewModel;
use \Magento\Framework\View\Element\Block\ArgumentInterface;
class HelloView implements ArgumentInterface
{
	// public function __construct(\Magento\Framework\View\Element\Template\Context $context,array $data = [])
	// {
	// 	parent::__construct($context,$data);
	// }

	public function getHelloWorld()
	{
		return __('Hello World');
	}

	public function helloArray()
	{
		$array = [
			"Good",
			"Very Good",
			"Excellent"
		];
		return $array;
	}
}