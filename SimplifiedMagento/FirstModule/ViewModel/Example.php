<?php
namespace SimplifiedMagento\FirstModule\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use SimplifiedMagento\FirstModule\Model\FeaturedProducts;


class Example implements ArgumentInterface
{

	/**
	 * @var FeaturedProducts
	 */
	protected $featuredProducts;


	public function __construct(FeaturedProducts $featuredProducts)
	{
		$this->featuredProducts = $featuredProducts;
	}

    public function getFeaturedProducts() : array
	{
		// return "Red Pencil";
		return $this->featuredProducts->getFeaturedProducts();
	}
}