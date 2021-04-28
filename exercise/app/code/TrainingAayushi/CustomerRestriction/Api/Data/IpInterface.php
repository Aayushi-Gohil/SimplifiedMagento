<?php
namespace TrainingAayushi\CustomerRestriction\Api\Data;
 
interface IpInterface
{
     const ID = "ip_id";
     const Address = "ip_address";
     const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Gets the ID for the order.
     *
     * @return int|null Order ID.
     */
    public function getIpId();

    /**
     * Sets entity ID.
     *
     * @param int $ipId
     * @return $this
     */
    public function setIpId($ipId);

     /**
     * Get IpAddress
     *
     * @return string
     */
    public function getIpAddress();

    /**
     * Set IpAddress
     *
     * @param $ipAddress
     * @return mixed
     */
    public function setIpAddress($ipAddress);

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