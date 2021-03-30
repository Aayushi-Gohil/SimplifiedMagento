<?php
namespace SimplifiedMagento\ExtAttribute\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{

	/*
	 * Attribute code for custom attribute
	 */
	const CUSTOM_ATTRIBUTE_CODE = 'custom_attr';

	/*
	 * @var EavSetup
	 */
	private $eavSetup;

	/*
	 * @var Config
	 */
	private $eavConfig;

	/*
	 * @param EavSetup $eavSetup
	 */
	public function __construct(EavSetup $eavSetup,Config $config)
	{
		$this->eavSetup = $eavSetup;
		$this->eavConfig = $config;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
			
		$this->eavSetup->addAttribute(
			AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
			self::CUSTOM_ATTRIBUTE_CODE,
			[
				'label' => 'Custom Attribute',
				'input' => 'text',
				'visible' => true,
				'required' => false,
				'position' => 150,
				'sort_order' => 150,
				'system' => false,
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'user_defined' => true,

			]
		);

		$customAttribute = $this->eavConfig->getAttribute(
			AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
			self::CUSTOM_ATTRIBUTE_CODE
		);

		$customAttribute->setData(
			'used_in_forms',
			['adminhtml_customer_address','customer_address_edit','customer_register_address']
		);

		$customAttribute->save();

		$setup->endSetup();
	}
}