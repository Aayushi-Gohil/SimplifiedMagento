<?php

namespace TrainingAayushi\Extendedcustomer\Helper;

class Dataconfig extends \Magento\Framework\App\Helper\AbstractHelper 
{   
    const FATHER_FIELD = 'extendedcustomer/general/father_name';
    const MOTHER_FIELD = 'extendedcustomer/general/mother_name';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context   $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ){
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function getMother() 
    {
        return $this->scopeConfig->getValue(self::MOTHER_FIELD,\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getFather() 
    {
        return $this->scopeConfig->getValue(self::FATHER_FIELD,\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}