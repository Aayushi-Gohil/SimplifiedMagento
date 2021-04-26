<?php
namespace TrainingAayushi\Sample\Model;

use Magento\Framework\Model\AbstractModel;
use TrainingAayushi\Sample\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'trainingaayushi_sample_data';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('TrainingAayushi\Sample\Model\ResourceModel\Data');
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
     * Get title
     *
     * @return string
     */
    public function getDataTitle()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set title
     *
     * @param $title
     * @return $this
     */
    public function setDataTitle($title)
    {
        return $this->setData(DataInterface::DATA_TITLE, $title);
    }

    /**
     * Get data description
     *
     * @return string
     */
    public function getDataDescription()
    {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set data description
     *
     * @param $description
     * @return $this
     */
    public function setDataDescription($description)
    {
        return $this->setData(DataInterface::DATA_DESCRIPTION, $description);
    }

    /**
     * Get is active
     *
     * @return bool|int
     */
    public function getIsActive()
    {
        return $this->getData(DataInterface::IS_ACTIVE);
    }

    /**
     * Set is active
     *
     * @param $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        return $this->setData(DataInterface::IS_ACTIVE, $isActive);
    }

    /**
     * Get gender
     *
     * @return bool|int
     */
    public function getGender()
    {
        return $this->getData(DataInterface::GENDER);
    }

    /**
     * Set gender
     *
     * @param $gender
     * @return $this
     */
    public function setGender($gender)
    {
        return $this->setData(DataInterface::GENDER, $gender);
    }

    /**
     * Get is useful
     *
     * @return bool|int
     */
    public function getUseful()
    {
        return $this->getData(DataInterface::USEFUL);
    }

    /**
     * Set is useful
     *
     * @param $useful
     * @return DataInterface
     */
    public function setUseful($useful)
    {
        return $this->setData(DataInterface::USEFUL, $useful);
    }

    /**
     * Get Color
     *
     * @return string
     */
    public function getColor()
    {
         return $this->getData(DataInterface::COLOR);
    }

    /**
     * Set Color
     *
     * @param $color
     * @return mixed
     */
    public function setColor($color)
    {
        return $this->setData(DataInterface::COLOR, $color);
    }

    /**
     * Get Category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->getData(DataInterface::CATEGORYPOST);
    }

    /**
     * Set Category
     *
     * @param $category
     * @return mixed
     */
    public function setCategory($category)
    {
        return $this->setData(DataInterface::CATEGORYPOST, $category);
    }

    /**
     * Get Custgroup
     *
     * @return string
     */
    public function getCustgroup()
    {
        return $this->getData(DataInterface::CUSTGROUP);
    }

    /**
     * Set Custgroup
     *
     * @param $custgroup
     * @return mixed
     */
    public function setCustgroup($custgroup)
    {
        return $this->setData(DataInterface::CUSTGROUP, $custgroup);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(DataInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(DataInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(DataInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     *
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(DataInterface::UPDATED_AT, $updatedAt);
    }
}
