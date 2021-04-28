<?php
namespace TrainingAayushi\CustomerRestriction\Api;

use TrainingAayushi\CustomerRestriction\Api\Data\IpInterface;
 
interface IpRepositoryInterface
{
    /**
     * @param IpInterface $ip
     * @return mixed
     */
    public function save(IpInterface $ip);
}