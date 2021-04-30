<?php

namespace TrainingAayushi\Extendedcustomer\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Model\CustomerFactory;

class CustomerRegisterObserver implements ObserverInterface
{

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    protected $_customerFactory;

    function __construct(CustomerFactory $customerFactory)
    {
        $this->_customerFactory = $customerFactory;

    }


    public function execute(Observer $observer)
    {
        $customerData = $observer->getCustomer();
        if($_POST['father_name']) {
            $customer = $this->_customerFactory->create()->load($customerData->getId());
            $customer->setData('father_name', $_POST['father_name']);
            $customer->save();
        }
        if($_POST['mother_name']) {
            $customer = $this->_customerFactory->create()->load($customerData->getId());
            $customer->setData('mother_name', $_POST['mother_name']);
            $customer->save();
        }
    }
}