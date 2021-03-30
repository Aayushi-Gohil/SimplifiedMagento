<?php
namespace  SimplifiedMagento\Database\Block;
 
// use Magento\Framework\App\Filesystem\DirectoryList;
 
class Index extends \Magento\Framework\View\Element\Template
{
     protected $_postFactory;
     protected $postCollectionFactory;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \SimplifiedMagento\Database\Model\PostFactory $postFactory,
          \SimplifiedMagento\Database\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory
     )
     {
          parent::__construct($context);
          $this->_postFactory = $postFactory;
          $this->postCollectionFactory = $postCollectionFactory;
     }
 
     public function getResult()
     {
          // $post = $this->_postFactory->create();
          // $collection = $post->getCollection();
          // return $collection;
          $collection = $this->postCollectionFactory->create() 
               ->addFieldToSelect('*')
               ->addFieldToFilter('status',
                    ['in' => '1']
               );
          return $collection;

     }
}