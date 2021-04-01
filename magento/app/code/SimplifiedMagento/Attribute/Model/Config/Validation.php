<?php
namespace SimplifiedMagento\Attribute\Model\Config;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
  
class Validation extends AbstractBackend
{
	// /**
 //     * @param Product $object
 //     * @throws LocalizedException
 //     * @return bool
 //     */

 //   public function validate($object)
 //   {
 //   	var_dump("expression");die;
 //      // if($object->getData($this->getAttribute()->getAttributeCode()) < 10)
 //      //   throw new LocalizedException(__('Value must not be less than 10'));
 //      // return parent::validate($object);
 //   	  // $value = $object->getData($this->getAttribute()->getAttributeCode());
 //   	  if (($object->getAttributeSetId() == 10) && ($value == 'fur')) {
 //   	  	throw new LocalizedException(__('Value can not be fur'));
 //   	  }
 //   }

	/**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function afterLoad($object)
    {
        // your after load logic

        return parent::afterLoad($object);
    }

    /**
     * @param \Magento\Framework\DataObject $object
     *
     * @return $this
     */
    public function beforeSave($object)
    {
        $this->validateValue($object);

        return parent::beforeSave($object);
    }

     /**
     * Validate length
     *
     * @param \Magento\Framework\DataObject $object
     *
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function validateValue($object)
    {
        /** @var string $attributeCode */
        $attributeCode = $this->getAttribute()->getAttributeCode();
        /** @var int $value */
        $value = $object->getData($attributeCode);

        if ($this->getAttribute()->getIsRequired() && $value == 'fur') {
            throw new LocalizedException(
                __('Value can not be fur', $attributeCode, 'fur')
            );
        }

        return true;
    }


}