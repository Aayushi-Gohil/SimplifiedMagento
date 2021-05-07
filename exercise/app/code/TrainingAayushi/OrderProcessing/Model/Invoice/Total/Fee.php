<?php

namespace TrainingAayushi\OrderProcessing\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;
use TrainingAayushi\OrderProcessing\Helper\DataConfig;

class Fee extends AbstractTotal
{
     /**
     * @var Helper
     */
    protected $_helperData;

    public function __construct( DataConfig $helperData)
    {
        $this->_helperData = $helperData;
    }

    /**
     * @param \Magento\Sales\Model\Order\Invoice $invoice
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Invoice $invoice)
    {
        $invoice->setFee(0);
        $invoice->setBaseFee(0);

        $exist_amount = 0;  
        if ($this->_helperData->getStatus() == 1) {
            $feeAmt = $this->_helperData->getFee(); 
            $balance = ($feeAmt/100) * $invoice->getSubtotal();
        }else{
            $feeAmt = 0; 
            $balance = ($feeAmt/100) - $exist_amount;
        }

        $amount = $invoice->getOrder()->getFee();
        $invoice->setFee($balance);
        $amount = $invoice->getOrder()->getBaseFee();
        $invoice->setBaseFee($balance);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $balance);
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $balance);

        return $this;
    }
}
