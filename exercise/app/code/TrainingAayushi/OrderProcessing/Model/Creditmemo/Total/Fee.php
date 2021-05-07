<?php

namespace TrainingAayushi\OrderProcessing\Model\Creditmemo\Total;

use Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal;
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
     * @param \Magento\Sales\Model\Order\Creditmemo $creditmemo
     * @return $this
     */
    public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo)
    {
        $creditmemo->setFee(0);
        $creditmemo->setBaseFee(0);

        $exist_amount = 0;  
        if ($this->_helperData->getStatus() == 1) {
            $feeAmt = $this->_helperData->getFee(); 
            $balance = ($feeAmt/100) * $creditmemo->getSubtotal();
        }else{
            $feeAmt = 0; 
            $balance = ($feeAmt/100) - $exist_amount;
        }

        $amount = $creditmemo->getOrder()->getFee();
        $creditmemo->setFee($balance);

        $amount = $creditmemo->getOrder()->getBaseFee();
        $creditmemo->setBaseFee($balance);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $balance);
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $balance);

        return $this;
    }
}
