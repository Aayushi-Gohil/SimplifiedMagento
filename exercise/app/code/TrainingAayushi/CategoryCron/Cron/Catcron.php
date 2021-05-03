<?php

namespace TrainingAayushi\CategoryCron\Cron;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Catcron
{

	protected $productLinkFactory;

     /**
     * @var \Magento\Catalog\Api\CategoryLinkRepositoryInterface
     */
    protected $categoryLinkRepository;


     /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

     /**
     * @var \Magento\Catalog\Model\CategoryFactory
     */
    protected $categoryFactory;

    public function __construct( 
      \Magento\Catalog\Api\Data\CategoryProductLinkInterfaceFactory 
      $productLinkFactory, CollectionFactory $productCollectionFactory
      , \Magento\Catalog\Model\CategoryFactory $categoryFactory
  	)
    {
        $this->productLinkFactory = $productLinkFactory;
        $this->categoryFactory = $categoryFactory;
        $this->_productCollectionFactory = $productCollectionFactory;  
    }

    public function getCategoryLinkManagement($sku, $categoryId)
    {
        $categoryProductLink = $this->productLinkFactory->create();
        $categoryProductLink->setSku($sku);
        $categoryProductLink->setCategoryId($categoryId);
        $categoryProductLink->setPosition(0);
        $this->getCategoryLinkRepository()->save($categoryProductLink);
        return true;
    }

    public function assignProduct()
   {
	    $collection = $this->getProductCollection();
	    foreach($collection as $item){
		    $sku = $item->getData('sku');
		    $categoryId = $this->getCategoryId();
		    $this->getCategoryLinkManagement($sku, $categoryId);
		}
   }

    private function getCategoryLinkRepository()
    {
        if (null === $this->categoryLinkRepository) {
            $this->categoryLinkRepository = \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Magento\Catalog\Api\CategoryLinkRepositoryInterface::class);
        }
        return $this->categoryLinkRepository;
    }

    // getproductcollection

	public function getProductCollection()
	{
		$Ids = array(6);
   		$collection = $this->_productCollectionFactory->create();
		$collection->addAttributeToSelect('sku');  
		$collection->addFieldToFilter('created_at', array(
		    'from'     => strtotime('-3 day', time()),
		    'to'       => time(),
		    'datetime' => true
		));
		return $collection;
	}

	public function getCategoryId()
	{
		$categoryId = 5; 
		$category = $this->categoryFactory->create()->load($categoryId);
		$categoryProducts = $category->getProductCollection()->addAttributeToSelect('*');
		$product_count = $categoryProducts->count();
		if ($product_count < 2) {
			return $categoryId;
		}else{
			$categoryId = 6;
			return $categoryId;
		}
	}


	public function execute()
	{
		$this->assignProduct();
	}
}
