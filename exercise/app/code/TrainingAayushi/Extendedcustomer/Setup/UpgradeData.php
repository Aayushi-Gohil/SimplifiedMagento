<?php

namespace TrainingAayushi\Extendedcustomer\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class UpgradeData implements UpgradeDataInterface
{
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
	{
		$this->eavSetupFactory = $eavSetupFactory;
		$this->eavConfig       = $eavConfig;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'father_name',
			[
				'type'         => 'varchar',
				'label'        => 'Father’s Name',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0,
			]
		);
		$sampleAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'father_name');

		$sampleAttribute->setData(
			'used_in_forms',
			[
				'adminhtml_customer',
                'customer_account_edit',
                'adminhtml_checkout',
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address',
			]

		);
		$sampleAttribute->save();

		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,
			'mother_name',
			[
				'type'         => 'varchar',
				'label'        => 'Mother’s Name',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0,
			]
		);
		$sampleAttributeMother = $this->eavConfig->getAttribute(Customer::ENTITY, 'mother_name');

		$sampleAttributeMother->setData(
			'used_in_forms',
			[
				'adminhtml_customer',
                'customer_account_edit',
                'adminhtml_checkout',
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address',
			]

		);
		$sampleAttributeMother->save();
	}
}
