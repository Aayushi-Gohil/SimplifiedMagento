<?php

namespace TrainingAayushi\OrderProcessing\Block\Adminhtml\Sales\Order\Creditmemo;

class Totals extends \Magento\Framework\View\Element\Template
{
    /**
     * Order invoice
     *
     * @var \Magento\Sales\Model\Order\Creditmemo|null
     */
    protected $_creditmemo = null;

    /**
     * @var \Magento\Framework\DataObject
     */
    protected $_source;

    /**
     * @var \TrainingAayushi\OrderProcessing\Helper\DataConfig
     */
    protected $_dataHelper;

    /**
     * OrderFee constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
         \TrainingAayushi\OrderProcessing\Helper\DataConfig $dataHelper,
        array $data = []
    ) {
        $this->_dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    /**
     * Get data (totals) source model
     *
     * @return \Magento\Framework\DataObject
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    public function getCreditmemo()
    {
        return $this->getParentBlock()->getCreditmemo();
    }
    /**
     * Initialize payment fee totals
     *
     * @return $this
     */
    public function initTotals()
    {
        $this->getParentBlock();
        $this->getCreditmemo();
        $this->getSource();


        if ($this->_dataHelper->getStatus() == 1) {
            $feeAmt = $this->_dataHelper->getFee();
            $extFee = ($feeAmt/100) * $this->getCreditmemo()->getBaseSubtotal();
            $fee = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'strong' => false,
                    'value' => $extFee,
                    'label' => __('Custom Fee'),
                ]
            );
             $this->getParentBlock()->addTotalBefore($fee, 'grand_total');
        }else{
             $fee = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'strong' => false,
                    'value' => 0,
                    'label' => __('Custom Fee'),
                ]
            );

             $this->getParentBlock()->addTotalBefore($fee, 'grand_total');
        }

        return $this;
    }
}
