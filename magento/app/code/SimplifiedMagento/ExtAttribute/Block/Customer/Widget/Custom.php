<?php
namespace SimplifiedMagento\ExtAttribute\Block\Customer\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * 
 */
class Custom extends Template
{
	/*
	 * @var AddressMetadataInterface
	 */ 
	private $addressMetadata;

	public function __construct(Template\Context $context, AddressMetadataInterface $addressMetadata, array $data = [])
	{
		parent::__construct($context,$data);
		$this->addressMetadata = $addressMetadata;
		// $this->setTemplate('widget/custom.html');
	}
	
	protected function _construct()
	{
		parent::_construct();
		$this->setTemplate('widget/custom.html');
	}

	public function isRequired()
	{
		return $this->getAttribute()->isRequired() ? $this->getAttribute()->isRequired() : false;
	}

	public function getFieldId()
	{
		return 'custom_attr';
	}

	public function getFieldLabel()
	{
		return $this->getAttribute() ? $this->getAttribute()->getFrontendLabel() : __('Custom');
	}


	public function getFieldName()
	{
		return 'custom_attr';
	}

	/* 
	 * @return string|null
	 */
	public function getValue()
	{
		$address = $this->getAddress();
		if ($address instanceof AddressInterface) {
			return $address->getCustomAttribute('custom_attr') ? $address->getCustomAttribute('custom_attr')->getValue() : null;
		}
		return null;
	}

	public function getAttribute()
	{
		try{
			$attribute = $this->addressMetadata->getAttributeMetadata('custom_attr');
		} catch(NoSuchEntityException $exception) {
			return null;
		}

		return $attribute[0];
	}
}