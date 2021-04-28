<?php
namespace TrainingAayushi\CustomerRestriction\Model;

use Magento\Framework\Model\AbstractModel;
use TrainingAayushi\CustomerRestriction\Api\Data\IpInterface;

class Ip extends AbstractModel implements IpInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'trainingaayushi_ip_data';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('TrainingAayushi\CustomerRestriction\Model\ResourceModel\Ip');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Gets the ID for the order.
     *
     * @return int|null Order ID.
     */
    public function getIpId()
    {
        return $this->getData(IpInterface::ID);
    }

    /**
     * Sets entity ID.
     *
     * @param int $ipId
     * @return $this
     */
    public function setIpId($ipId)
    {
        return $this->setData(IpInterface::ID, $ipAddress);
    }

   /**
     * Get IpAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getData(IpInterface::Address);
    }

     /**
     * Set IpAddress
     *
     * @param $ipAddress
     * @return mixed
     */
    public function setIpAddress($ipAddress)
    {
        return $this->setData(IpInterface::Address, $ipAddress);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(IpInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(IpInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(IpInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     *
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(IpInterface::UPDATED_AT, $updatedAt);
    }
}
