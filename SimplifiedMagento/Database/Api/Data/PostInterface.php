<?php
namespace SimplifiedMagento\Database\Api\Data;
 
interface PostInterface
{
     // const NAME = "name";
     const ID = "entity_id";
     // const STATUS = "status";
     /**
      * return int
      */
     public function getId();

     // /**
     //  * return string
     //  */
     // public function getName();

     // /**
     //  * return boolean
     //  */
     // public function getStatus();

     /**
      * @param int $id
      * @return \SimplifiedMagento\Database\Api\Data\PostInterface
      */
     public function setId($id);

     // /**
     //  * @param string $name
     //  * @return \SimplifiedMagento\Database\Api\Data\PostInterface
     //  */
     // public function setName($name);

     // /**
     //  * @param boolean $status
     //  * @return \SimplifiedMagento\Database\Api\Data\PostInterface
     //  */
     // public function setStatus($status);
}