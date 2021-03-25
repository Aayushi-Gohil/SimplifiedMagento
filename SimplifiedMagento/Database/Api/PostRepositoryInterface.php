<?php
namespace SimplifiedMagento\Database\Api;
 
interface PostRepositoryInterface
{
    /**
     * @return \SimplifiedMagento\Database\Api\Data\PostInterface[]
     */
    public function getList();

}