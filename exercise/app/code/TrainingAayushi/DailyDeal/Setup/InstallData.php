<?php

namespace TrainingAayushi\DailyDeal\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();

		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'deal_date',
			[
				'group' => 'Content',
				'type' => 'datetime',
				'backend' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'searchable' => false,
				'used_in_product_listing' => true,
				'label' => 'Deal Date',
				'input' => 'datetime',
				'is_used_in_grid' => true
			]
		);

		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'deal_status',
			[
				'group' => 'Content',
				'type' => 'int',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'backend' => '',
				'visible' => true,
				'required' => false,
				'searchable' => false,
				'used_in_product_listing' => true,
				'source' => 'TrainingAayushi\DailyDeal\Model\Config\Source\YesNo',
				'label' => 'Deal Status',
				'input' => 'select',
				'is_used_in_grid' => true,
				'user_defined' => true,
			]
		);

		$setup->endSetup();
	}
}