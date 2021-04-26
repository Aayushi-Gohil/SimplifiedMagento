<?php
namespace TrainingAayushi\Sample\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const DATA_ID           = 'data_id';
    const DATA_TITLE        = 'data_title';
    const DATA_DESCRIPTION  = 'data_description';
    const GENDER            = 'gender';
    const USEFUL            = 'useful';
    const COLOR             = 'color';
    const CATEGORYPOST      = 'category_data';
    const CUSTGROUP         = 'customer_group_ids';
    const IS_ACTIVE         = 'is_active';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';


    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get Data Title
     *
     * @return string
     */
    public function getDataTitle();

    /**
     * Set Data Title
     *
     * @param $title
     * @return mixed
     */
    public function setDataTitle($title);

    /**
     * Get Data Description
     *
     * @return mixed
     */
    public function getDataDescription();

    /**
     * Set Data Description
     *
     * @param $description
     * @return mixed
     */
    public function setDataDescription($description);

    /**
     * Get is active
     *
     * @return bool|int
     */
    public function getIsActive();

    /**
     * Set is active
     *
     * @param $isActive
     * @return DataInterface
     */
    public function setIsActive($isActive);

     /**
     * Get is gender
     *
     * @return bool|int
     */
    public function getGender();

    /**
     * Set is gender
     *
     * @param $gender
     * @return DataInterface
     */
    public function setGender($gender);

    /**
     * Get is useful
     *
     * @return bool|int
     */
    public function getUseful();

    /**
     * Set is useful
     *
     * @param $useful
     * @return DataInterface
     */
    public function setUseful($useful);

    /**
     * Get Color
     *
     * @return string
     */
    public function getColor();

    /**
     * Set Color
     *
     * @param $color
     * @return mixed
     */
    public function setColor($color);

    /**
     * Get Custgroup
     *
     * @return string
     */
    public function getCustgroup();

    /**
     * Set Custgroup
     *
     * @param $custgroup
     * @return mixed
     */
    public function setCustgroup($custgroup);

    /**
     * Get Category
     *
     * @return string
     */
    public function getCategory();

    /**
     * Set Category
     *
     * @param $category
     * @return mixed
     */
    public function setCategory($category);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return DataInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * set updated at
     *
     * @param $updatedAt
     * @return DataInterface
     */
    public function setUpdatedAt($updatedAt);
}
