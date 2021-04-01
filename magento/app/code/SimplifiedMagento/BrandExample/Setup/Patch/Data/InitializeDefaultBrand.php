<?php

namespace SimplifiedMagento\BrandExample\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 *  InitializeDefaultBrand
 */
class InitializeDefaultBrand implements DataPatchInterface
{
	
	/**
	 * @var ModuleDataSetupInterface
	 */

	private $moduleDataSetup;

	public function __construct(ModuleDataSetupInterface $moduleDataSetup)
	{
		$this->moduleDataSetup = $moduleDataSetup;
	}

	public static function getDependencies()
	{
		return [
			// \Magento\Store\Setup\Patch\Schema\InitializeStoreAndWebsite::class
		];
	}

	public function getAliases()
	{
		return [
			// \SimplifiedMagento\BrandExample\Setup\Patch\Data\CreateDefaultBrands::class
		];
	}

	public function apply()
	{
		$brands = [
			['id' => 1, 'name' => 'Nike', 'description' => 'Something Cool'],
			['id' => 2, 'name' => 'Puma', 'description' => 'Something not quite as Cool'],
			['id' => 3, 'name' => 'Aadidas', 'description' => 'To cool to care'],
		];

		$records = array_map(function ($brand) {
			return array_merge($brand, ['is_enabled' => 1]);
		}, $brands);

		$this->moduleDataSetup->getConnection()->insertMultiple('brand_example', $records);

		return $this;
	}
}