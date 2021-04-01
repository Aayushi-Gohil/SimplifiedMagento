<?php
namespace SimplifiedMagento\Database\Api\Data;
 
interface PostInterface
{
     // const NAME = "name";
     const POST_ID = "post_id";
     // const STATUS = "status";
     /**
      //* @return int
      */
     //public function getId();

     // /**
     //  * return string
     //  */
     // public function getName();

     // /**
     //  * return boolean
     //  */
     // public function getStatus();

     /**
      //* @param int $id
      * @return \SimplifiedMagento\Database\Api\Data\PostInterface
      */
     //public function setId($id);

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

    /**
     * Gets the ID for the order.
     *
     * @return int|null Order ID.
     */
    public function getPostId();

    /**
     * Sets entity ID.
     *
     * @param int $postId
     * @return $this
     */
    public function setPostId($postId);

    /**
     * Gets the ID for the order.
     *
    // * @return \SimplifiedMagento\Database\Api\Data\PostExtensionInterface
     */
    //public function getExtensionAttributes();

    /**
     * Sets entity ID.
     *
   //  * @param \SimplifiedMagento\Database\Api\Data\PostExtensionInterface $postExtensionInterface
     * @return $this
     */
    //public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\PostExtensionInterface $postExtensionInterface);
}