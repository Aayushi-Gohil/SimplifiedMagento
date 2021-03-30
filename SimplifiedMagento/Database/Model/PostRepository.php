<?php
namespace SimplifiedMagento\Database\Model;

use SimplifiedMagento\Database\Api\PostRepositoryInterface;
use SimplifiedMagento\Database\Model\ResourceModel\Post\CollectionFactory;
use SimplifiedMagento\Database\Model\PostFactory;
 
class PostRepository implements PostRepositoryInterface
{
	private $collectionFactory;
	private $postFactory;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context, CollectionFactory $collectionFactory, PostFactory $postFactory)
	{
		parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
		$this->postFactory = $postFactory;
	}

	/**
     * @return \SimplifiedMagento\Database\Api\Data\PostInterface[]
     */
    public function getList()
    {
    	return $this->collectionFactory->create()->getItems();
    }

     /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\PostInterface
     */
    public function getPostById($id)
    {
    	$posts = $this->postFactory->create();
    	return $posts->load($id);
    }
}