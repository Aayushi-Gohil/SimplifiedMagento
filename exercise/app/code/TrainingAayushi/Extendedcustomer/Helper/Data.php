<?php

namespace TrainingAayushi\Extendedcustomer\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $customerRepository;
    protected $customerSession;

    public function __construct(
	        Context $context,
	        CustomerRepositoryInterface $customerRepository,
	        Session $customerSession
        )
    {
        $this->customerRepository = $customerRepository;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function getFatherValue()
    {
        // $customerId  = $this->customerSession->getCustomer()->getId();
        $customer = $this->customerRepository->getById(1);
        return $customer->getCustomAttribute('father_name')->getValue();
    }

    public function getMotherValue()
    {
        // $customerId  = $this->customerSession->getCustomer()->getId();
        $customer = $this->customerRepository->getById(1);
        return $customer->getCustomAttribute('mother_name')->getValue();
    }
}