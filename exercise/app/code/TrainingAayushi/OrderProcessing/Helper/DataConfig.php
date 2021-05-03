<?php

namespace TrainingAayushi\OrderProcessing\Helper;

class Dataconfig extends \Magento\Framework\App\Helper\AbstractHelper 
{   
    const FEE_FIELD = 'orderprocessing/general/fee';
    const STATUS_FIELD = 'orderprocessing/general/status';

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

    public function getStatus() 
    {
        return $this->scopeConfig->getValue(self::STATUS_FIELD,\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getFee() 
    {
        return $this->scopeConfig->getValue(self::FEE_FIELD,\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}