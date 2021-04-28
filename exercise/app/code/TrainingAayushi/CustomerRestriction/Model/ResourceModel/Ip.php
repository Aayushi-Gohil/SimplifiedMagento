<?php
namespace TrainingAayushi\CustomerRestriction\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Ip extends AbstractDb
{
    /**
     * Data constructor.
     *
     * @param Context $context
     * 
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Resource initialisation
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('blocked_ip', 'ip_id');
    }

}
