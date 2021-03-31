<?php
namespace SimplifiedMagento\BrandExample\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class CustomerAttributePatcher implements DataPatchInterface {

    private $moduleDataSetup;
    protected $customerSetupFactory;
    private $eavSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->attributeSetFactory = $attributeSetFactory;
        $this->customerSetupFactory = $customerSetupFactory;
    }
    public static function getDependencies()
    {
        return [];
    }
    public function getAliases()
    {
        return [];
    }
    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'mobile',
            [
                'type' => 'varchar',
                'label' => 'Mobile',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'input' => 'text',
                'required' => false,
                'sort_order' => 120,
                'position' => 120,
                'visible' => true,
                'user_defined' => true,
                'system' => false,
                'searchable' => true,
                'is_used_in_grid'   => true,
                'is_visible_in_grid' => true,
                'visible_in_advanced_search' => true,
                'is_searchable_in_grid' => true
            ]
        );
        $attribute = $customerSetup->getEavConfig()->getAttribute(
            Customer::ENTITY,
            'mobile'
        );

        $attribute->addData(
            [
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => ['adminhtml_customer'],
            ]
        );

        $attribute->save();
    }
}