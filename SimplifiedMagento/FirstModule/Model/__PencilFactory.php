<?php
namespace SimplifiedMagento\FirstModule\Model;

class PencilFactory
{
	private $objectManagerInterface;

	public function __construct(\Magento\Framework\ObjectManagerInterface $objectManagerInterface)
	{
		$this->objectManagerInterface = $objectManagerInterface;
	}

	public function create(array $data)
	{
		return $this->objectManagerInterface->create('SimplifiedMagento\FirstModule\Api\PencilInterface',$data);
	}

}