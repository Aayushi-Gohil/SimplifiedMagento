<?php

namespace SimplifiedMagento\ExtAttribute\Plugin\Customer;

use Magento\Framework\View\LayoutInterface;

/**
 *  AddressEditPlugin class
 */
class AddressEditPlugin 
{
	
	/*
	 * @var LayoutInterface
	 */ 
	private $layout;

	public function __construct(LayoutInterface $layout)
	{
		$this->layout = $layout;
	}

	/**
     * @param \Magento\Customer\Block\Address\Edit $edit
     * @param string $result
     * @return string
     */
	public function afterGetNameBlockHtml(\Magento\Customer\Block\Address\Edit $edit, $result)
	{
		// return $result .'<div clas="field field-name-lastname required">
		//   <label class="label" forname="lastname"><span>Custom Attribute</span></label>
		//   <div class="control"><input type="text" id="lastname" value="" title="Custom Attribute" class="input-text required-entry" data-validate="{required:true}" /></div>
		//   </div>';
		$customBlock = $this->layout->createBlock('SimplifiedMagento\ExtAttribute\Block\Customer\Address\Form\Edit\Custom',
			'simplifiedmagento_custom_attribute'
		);
		return $result . $customBlock->_toHtml();
	}
}