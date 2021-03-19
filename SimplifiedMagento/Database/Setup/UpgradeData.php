<?php
namespace SimplifiedMagento\Database\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
// use Magento\Framework\DB\Ddl\Table;

class UpgradeData implements UpgradeDataInterface
{

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if (version_compare($context->getVersion(), '1.0.3', '<')) {
			$setup->getConnection()->insert(
				$setup->getTable('affiliate_member'),
				['name' => 'Ade','status' => true, 'address' => 'Dubai', 'phone_number' => '7567561771']
			);
		}
		$setup->endSetup();
	}
}