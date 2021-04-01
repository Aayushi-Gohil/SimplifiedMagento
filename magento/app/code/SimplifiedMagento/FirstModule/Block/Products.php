<?php
namespace SimplifiedMagento\FirstModule\Block;
// class Products extends \Magento\Framework\View\Element\Template
// {    
  
//     protected $productCollectionFactory;
//     // protected $productVisibility;
//     // protected $productStatus;

//     public function __construct(
//         \Magento\Framework\View\Element\Template\Context $context,        
//         \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
//         // \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
//         // \Magento\Catalog\Model\Product\Visibility $productVisibility,
//         array $data = []
//     )
//     {
//         parent::__construct($context, $data);
//         $this->productCollectionFactory = $productCollectionFactory;
//         $this->productStatus = $productStatus;
//         $this->productVisibility = $productVisibility;
       
//     }
//     public function getProductCollection()
//     {
//         // $collection = $this->productCollectionFactory->create();
//         // $collection->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()]);
//         // $collection->setVisibility($this->productVisibility->getVisibleInSiteIds());
//         // return $collection;
//         // $collection = $this->productCollectionFactory->create() 
//         //        ->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()])
//         //        ->setVisibility($this->productVisibility->getVisibleInSiteIds());
//         //   return $collection;
//         var_dump("expression");die;
//     }
// }
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SortOrderBuilder;

class Products extends \Magento\Framework\View\Element\Template
{
    protected $searchCriteriaBuilder;
    protected $filterBuilder;
    protected $productRepository;
    // protected $filterGroupBuilder;
     
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        ProductRepository $productRepository,
        // FilterGroupBuilder $filterGroupBuilder,
        // SortOrderBuilder $sortOrderBuilder,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->productRepository = $productRepository;
        // $this->filterGroupBuilder = $filterGroupBuilder;
        // $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function getProducts()
    {
       //  $filter_sku = $this->filterBuilder
       //      ->setField('sku')
       //      ->setConditionType('like')
       //      ->setValue('%Practice%')
       //      ->create();


         
       //  $filter_name = $this->filterBuilder
       //      ->setField('name')
       //      ->setConditionType('like')
       //      ->setValue('%Practice%')
       //      ->create();
         
       //  $filter_store = $this->filterBuilder
       //      ->setField("store")
       //      ->setValue('1')
       //      ->setConditionType("eq")
       //      ->create();

       //  $filter_group_1 = $this->filterGroupBuilder
       //      ->addFilter($filter_sku)
       //      ->addFilter($filter_name)
       //      ->create();
 
       //  $filter_group_2 = $this->filterGroupBuilder
       //      ->addFilter($filter_store)
       //      ->create();

       //  $searchCriteria = $this->searchCriteriaBuilder
       //      ->setFilterGroups([$filter_group_1, $filter_group_2])
       //      ->create();

       // //use Magento\Framework\Api\SortOrder;
       //  // $filters[] = $this->filterBuilder->setField('store')
       //  //     ->setValue(1)
       //  //     ->create();

       //  // Add another field filter
       //  // $filters[] = $this->filterBuilder->setField('another_field')
       //  //     ->setValue($value)
       //  //     ->create();

       //      var_dump($this->productRepository->getList($searchCriteria));die;

       //  $searchResults = $this->productRepository->getList($searchCriteria);
 
       //  $products = $searchResults->getItems();

       //  return $products;

        // $fieldName = 'Name'



        // $searchCriteria = $this->searchCriteriaBuilder->addFilter($fieldName, $fieldValue, $filterType)->create();
        // $products = $this->productRepository->getList($searchCriteria);
        // return $products->getItems();

        $filters[] = $this->filterBuilder
            ->setField('name')
            ->setConditionType('like')
            ->setValue('%Practice%')
            ->create();
        $this->searchCriteriaBuilder->addFilters($filters);

        $searchCriteria = $this->searchCriteriaBuilder->create();
        
        var_dump($searchCriteria);die;
        $searchResults = $this->productRepository->getList($searchCriteria);
        return $searchResults->getItems();
    }

}