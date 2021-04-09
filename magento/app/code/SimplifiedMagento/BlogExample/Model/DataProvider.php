<?php
namespace SimplifiedMagento\BlogExample\Model;
 
use SimplifiedMagento\BlogExample\Model\ResourceModel\Blog\CollectionFactory;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $loadedData;
    protected $collection;
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $blogCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blogCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $blog) {
           $this->loadedData[$blog->getId()]['blog'] = $blog->getData();
        }
        // return [];
        return $this->loadedData;
    }
}