<?php

namespace SimplifiedMagento\ExtAttribute\Block\Customer\Address\Form\Edit;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Request\Http;

/**
 *  Custom class
 */
class Custom extends Template
{

	protected $request;
	/*
	 * @var AddressInterface
	 */ 
	private $address;

	/*
	 * @var AddressRepositoryInterface
	 */ 
	private $addressRepository;

	/*
	 * @var AddressInterfaceFactory
	 */ 
	private $addressFactory;

	/*
	 * @var Session
	 */ 
	private $session;

	public function __construct(Template\Context $context, AddressRepositoryInterface $addressRepository, AddressInterfaceFactory $addressFactory, Session $session, Http $request, array $data = [])
	{
		parent::__construct($context, $data);
		$this->addressRepository = $addressRepository;
		$this->addressFactory = $addressFactory;
		$this->session = $session;
		$this->request = $request;
	}

	protected function _prepareLayout()
	{
		// $addressId = $this->getRequest->getParam('id');
		if ($this->request->getParams()) {
			$params = $this->request->getParams();
	 		$addressId = $params['id']; 
			if ($addressId) {
				try{
					$this->address = $this->addressRepository->getById($addressId);
					if ($this->address->getCustomerId() != $this->session->getCustomerId()) {
						$this->address = null;
					}
				} catch(NoSuchEntityException $exception){
					$this->address = null;
				}

			}
			if (null === $this->address) {
				$this->address = $this->addressFactory->create();
			}
			
		}
		
		return parent::_prepareLayout();
		// return $this;
	}

	public function _toHtml()
	{
		$customWidgetBlock = $this->getLayout()->createBlock(
			'SimplifiedMagento\ExtAttribute\Block\Customer\Widget\Custom'
		);

		$customWidgetBlock->setAddress($this->address);

		return parent::_toHtml();
	}
}
