<?php

namespace TrainingAayushi\CustomerRestriction\Helper;

class Dataconfig extends \Magento\Framework\App\Helper\AbstractHelper 
{   
    const ADDRESS_FIELD = 'blockaddress/general/address';

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

    public function getBlockedAddress() 
    {
        return $this->scopeConfig->getValue(self::ADDRESS_FIELD,\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}