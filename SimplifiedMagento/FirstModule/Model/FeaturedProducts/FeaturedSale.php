<?php

namespace SimplifiedMagento\FirstModule\Model\FeturedProducts;

// use SimplifiedMagento\FirstModule\Model\FeturedProducts\FeturedProductsInterface;

/**
 * 
 */
class FeaturedSale implements FeturedProductsInterface
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
			'sale_1',
			'sale_2',
			'sale_3',
			'sale_4',
			'sale_5'
		];	
	}
}