<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Model\FeaturedProducts\FeaturedCategory;
use SimplifiedMagento\FirstModule\Model\FeaturedProducts\FeaturedSale;
use SimplifiedMagento\FirstModule\Model\FeaturedProducts\FeturedProductsInterface;

/**
 * 
 */
class FeaturedProducts implements FeturedProductsInterface
{

	protected $featuredProducts = [];
	protected $featuredSale;
	protected $featuredCategory;
	
	function __construct(FeaturedCategory $featuredCategory, FeaturedSale $featuredSale)
	{
		$this->featuredSale = $featuredSale;
		$this->featuredCategory = $featuredCategory;
	}

	public function getFeaturedProducts() : array
	{
		if ($this->featuredCategory->count() < 6) {
			return $this->featuredSale->getFeaturedProducts();
		}
		return $this->featuredCategory->getFeaturedProducts();
	}

	public function count() : int
	{
		
	}
}