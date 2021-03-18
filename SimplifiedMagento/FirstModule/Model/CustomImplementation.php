<?php
namespace SimplifiedMagento\FirstModule\Model;

use Magento\Catalog\Api\ProductRepositoryInterface;

class CustomImplementation implements ProductRepositoryInterface
{
    public function save(\Magento\Catalog\Api\Data\ProductInterface $product, $saveOptions = false)
    {

    }
}