<?php

namespace SimplifiedMagento\FirstModule\Model\FeturedProducts;

interface FeturedProductsInterface{

	public function getFeaturedProducts() : array;

	public function count() : int;

}