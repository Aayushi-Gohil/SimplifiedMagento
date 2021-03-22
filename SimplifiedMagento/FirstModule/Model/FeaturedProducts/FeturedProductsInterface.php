<?php

namespace SimplifiedMagento\FirstModule\Model\FeaturedProducts;

interface FeturedProductsInterface{

	public function getFeaturedProducts() : array;

	public function count() : int;

}