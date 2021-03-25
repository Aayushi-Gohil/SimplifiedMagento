<?php
namespace SimplifiedMagento\Database\Model;

use SimplifiedMagento\Database\Api\PostRepositoryInterface;
use SimplifiedMagento\Database\Model\ResourceModel\Post\CollectionFactory;
 
class PostRepository implements PostRepositoryInterface
{
	private $collectionFactory;

	public function __construct(CollectionFactory $collectionFactory)
	{
		$this->collectionFactory = $collectionFactory;
	}

	 /**
     * @return \SimplifiedMagento\Database\Api\Data\PostInterface[]
     */
    public function getList()
    {
    	return $this->collectionFactory->create()->getItems();
    }
}