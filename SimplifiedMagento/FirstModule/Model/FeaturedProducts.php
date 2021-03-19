<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Model\FeturedProducts\FeaturedCategory;
use SimplifiedMagento\FirstModule\Model\FeturedProducts\FeaturedSale;

/**
 * 
 */
class FeaturedProducts implements FeturedProductsInterface
{

	protected array $featuredProducts = [];
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

}