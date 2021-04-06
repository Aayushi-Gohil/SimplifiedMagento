<?php
namespace SimplifiedMagento\FirstModule\Block;
use \Magento\Catalog\Api\ProductRepositoryInterface;
class HelloWorld extends \Magento\Framework\View\Element\Template
{
	protected $product;

	public function __construct(ProductRepositoryInterface $product, \Magento\Framework\View\Element\Template\Context $context,array $data = [])
	{
		$this->product = $product;
		parent::__construct($context,$data);
	}

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

	public function getProductName()
	{
		$product = $this->product->get('Wine Carrier');
		return $product->getName();
	}
}