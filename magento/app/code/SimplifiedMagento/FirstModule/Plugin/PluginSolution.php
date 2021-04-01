<?php
namespace SimplifiedMagento\FirstModule\Plugin;

class PluginSolution 
{

    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
	{
		return "Before Plugin " . $name;
	}

	public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
	{
		return $result . " After Plugin";
	}

	public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed)
	{
		echo "before proceed <br>";
		$name = $proceed();
		echo $name;
		echo "after proceed <br>";
		return $name;
	}

	public function aroundGetIdBySku(\Magento\Catalog\Model\Product $subject, callable $proceed, $sku)
	{
		echo "before proceed <br>";
		$id = $proceed($sku);
		echo $id;
		echo "after proceed <br>";
		return $id;
	}

}