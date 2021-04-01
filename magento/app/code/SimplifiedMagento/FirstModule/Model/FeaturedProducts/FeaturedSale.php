<?php

namespace SimplifiedMagento\FirstModule\Model\FeaturedProducts;

use SimplifiedMagento\FirstModule\Model\FeaturedProducts\FeturedProductsInterface;

/**
 * 
 */
class FeaturedSale implements FeturedProductsInterface
{

	protected $featuredProducts = [];
	
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