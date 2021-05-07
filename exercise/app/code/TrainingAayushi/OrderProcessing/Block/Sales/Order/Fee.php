<?php
namespace TrainingAayushi\OrderProcessing\Block\Sales\Order;

use TrainingAayushi\OrderProcessing\Helper\DataConfig;

class Fee extends \Magento\Framework\View\Element\Template
{
    /**
     * Tax configuration model
     *
     * @var \Magento\Tax\Model\Config
     */
    protected $_config;

    /**
     * @var Order
     */
    protected $_order;

    /**
     * @var Helper
     */
    protected $_helperData;

    /**
     * @var \Magento\Framework\DataObject
     */
    protected $_source;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Tax\Model\Config $taxConfig
     * @param DataConfig $helperData
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Tax\Model\Config $taxConfig,
        DataConfig $helperData,
        array $data = []
    ) {
        $this->_config = $taxConfig;
        $this->_helperData = $helperData;
        parent::__construct($context, $data);
    }

    /**
     * Check if we nedd display full tax total info
     *
     * @return bool
     */
    public function displayFullSummary()
    {
        return true;
    }

    /**
     * Get data (totals) source model
     *
     * @return \Magento\Framework\DataObject
     */
    public function getSource()
    {
        return $this->_source;
    } 
    public function getStore()
    {
        return $this->_order->getStore();
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @return array
     */
    public function getLabelProperties()
    {
        return $this->getParentBlock()->getLabelProperties();
    }

    /**
     * @return array
     */
    public function getValueProperties()
    {
        return $this->getParentBlock()->getValueProperties();
    }

    /**
     * Initialize all order totals relates with tax
     *
     * @return \Magento\Tax\Block\Sales\Order\Tax
     */
     public function initTotals()
    {

        $parent = $this->getParentBlock();
        $this->_order = $parent->getOrder();        
        $this->_source = $parent->getSource();

        $store = $this->getStore();

        if ($this->_helperData->getStatus() == 1) {
            $feeAmt = $this->_helperData->getFee();
            $extFee = ($feeAmt/100) * $this->_order->getBaseSubtotal();
            $fee = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'strong' => false,
                    'value' => $extFee,
                    'label' => __('Custom Fee'),
                ]
            );
        }else{
            $fee = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'strong' => false,
                    'value' => 0,
                    'label' => __('Custom Fee'),
                ]
            );
        }
        
        $parent->addTotal($fee, 'fee');

        return $this;
    }

}