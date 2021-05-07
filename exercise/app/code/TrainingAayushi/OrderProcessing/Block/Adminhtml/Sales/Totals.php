<?php

namespace TrainingAayushi\OrderProcessing\Block\Adminhtml\Sales;

class Totals extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \TrainingAayushi\OrderProcessing\Helper\DataConfig
     */
    protected $_dataHelper;
   

    /**
     * @var \Magento\Directory\Model\Currency
     */
    protected $_currency;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \TrainingAayushi\OrderProcessing\Helper\DataConfig $dataHelper,
        \Magento\Directory\Model\Currency $currency,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_dataHelper = $dataHelper;
        $this->_currency = $currency;
    }

    /**
     * Retrieve current order model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->getParentBlock()->getOrder();
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    /**
     * @return string
     */
    public function getCurrencySymbol()
    {
        return $this->_currency->getCurrencySymbol();
    }

    /**
     *
     *
     * @return $this
     */
    public function initTotals()
    {
        $this->getParentBlock();
        $this->getOrder();
        $this->getSource();

        if ($this->_dataHelper->getStatus() == 1) {
            $feeAmt = $this->_dataHelper->getFee();
            $extFee = ($feeAmt/100) * $this->getOrder()->getSubtotal();
            $total = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'value' => $extFee,
                    'label' => __('Custom Fee'),
                ]
            );
        }else{
            $total = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'value' => 0,
                    'label' => __('Custom Fee'),
                ]
            );
        }

        $this->getParentBlock()->addTotalBefore($total, 'grand_total');

        return $this;
    }
}