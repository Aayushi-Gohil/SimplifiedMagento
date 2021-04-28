<?php
namespace TrainingAayushi\CustomerRestriction\Controller\Adminhtml\Ip;

use TrainingAayushi\CustomerRestriction\Controller\Adminhtml\Ip;

class Index extends Ip
{
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
