<?php
namespace TrainingAayushi\OrderProcessing\Model\Total;

use TrainingAayushi\OrderProcessing\Helper\DataConfig;

class Fee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
   /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this
     */
    protected $quoteValidator = null; 

    /**
     * @var Helper
     */
    protected $_helperData;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator, DataConfig $helperData)
    {
        $this->quoteValidator = $quoteValidator;
        $this->_helperData = $helperData;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);
        $exist_amount = 0;  
        if ($this->_helperData->getStatus() == 1) {
            $feeAmt = $this->_helperData->getFee(); 
            $balance = ($feeAmt/100) * $quote->getSubtotal();
        }else{
            $feeAmt = 0; 
            $balance = ($feeAmt/100) - $exist_amount;
        }     
        $total->setTotalAmount('fee', $balance);
        $total->setBaseTotalAmount('fee', $balance);
        $total->setFee($balance);
        $total->setBaseFee($balance);
        $total->setBaseGrandTotal($total->getBaseGrandTotal() + $balance);
        return $this;
    } 

    protected function clearValues(Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);
    }
    
    /**
     * Assign subtotal amount and label to address object
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param Address\Total $total
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        if ($this->_helperData->getStatus() == 1) {
            $feeAmt = $this->_helperData->getFee(); 
            $extFee = ($feeAmt/100) * $quote->getSubtotal();
            return [
                'code' => 'fee',
                'title' => 'Custom Fee',
                'value' => $extFee
            ];
        }else{
            return [
                'code' => 'fee',
                'title' => 'Custom Fee',
                'value' => 0
             ];
        }
    }

    /**
     * Get Subtotal label
     *
     * @return \Magento\Framework\Phrase
     */
    public function getLabel()
    {
        return __('Custom Fee');
    }
}