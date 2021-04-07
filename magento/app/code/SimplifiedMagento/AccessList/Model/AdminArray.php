<?php

namespace SimplifiedMagento\AccessList\Model;

use Magento\Framework\Option\ArrayInterface;

/**
 * 
 */
class AdminArray implements ArrayInterface
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function toOptionArray()
	{
		return [
			['value' => 0, 'label' => __('First')],
			['value' => 1, 'label' => __('Second')],
			['value' => 2, 'label' => __('Third')],
			['value' => 3, 'label' => __('Fourth')],
		];
	}
}