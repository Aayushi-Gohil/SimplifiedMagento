<?php
namespace TrainingAayushi\CustomerRestriction\Model\ResourceModel\Ip;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     * @codingStandardsIgnoreStart
     */
    protected $_idFieldName = 'ip_id';

    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('TrainingAayushi\CustomerRestriction\Model\Ip', 'TrainingAayushi\CustomerRestriction\Model\ResourceModel\Ip');
    }
}
