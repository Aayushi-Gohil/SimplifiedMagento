<?php

namespace SimplifiedMagento\FirstModule\Model\FeturedProducts;

// use SimplifiedMagento\FirstModule\Model\FeturedProducts\FeaturedCategory;

/**
 * 
 */
class FeaturedCategory implements FeturedProductsInterface
{

	protected array $featuredProducts = [];
	
	function __construct()
	{
		$this->loadFeaturedProducts();
	}

	public function getFeaturedProducts() : array
	{
		return $this->featuredProducts;
	}

	public function count() : int
	{
		return count($this->featuredProducts);
	}

	public function loadFeaturedProducts() : void
	{
		$this->featuredProducts = [
			'product_1',
			'product_2',
			'product_3',
			'product_4',
			'product_5',
			'product_6'
		];	
	}
}