<?php

namespace TrainingAayushi\OrderProcessing\Block\Adminhtml\Sales\Order\Invoice;

class Totals extends \Magento\Framework\View\Element\Template
{

    /**
     * @var \TrainingAayushi\OrderProcessing\Helper\DataConfig
     */
    protected $_dataHelper;

    /**
     * Order invoice
     *
     * @var \Magento\Sales\Model\Order\Invoice|null
     */
    protected $_invoice = null;

    /**
     * @var \Magento\Framework\DataObject
     */
    protected $_source;

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

    public function getInvoice()
    {
        return $this->getParentBlock()->getInvoice();
    }
    /**
     * Initialize payment fee totals
     *
     * @return $this
     */
    public function initTotals()
    {
        $this->getParentBlock();
        $this->getInvoice();
        $this->getSource();

        if ($this->_dataHelper->getStatus() == 1) {
            $feeAmt = $this->_dataHelper->getFee();
            $extFee = ($feeAmt/100) * $this->getInvoice()->getBaseSubtotal();
            $total = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'value' => $extFee,
                    'label' => __('Custom Fee'),
                ]
            );
            $this->getParentBlock()->addTotalBefore($total, 'grand_total');
        }else{
            $total = new \Magento\Framework\DataObject(
                [
                    'code' => 'fee',
                    'value' => 0,
                    'label' => __('Custom Fee'),
                ]
            );
            $this->getParentBlock()->addTotalBefore($total, 'grand_total');
        }

        return $this;
    }
}