<?php
namespace TrainingAayushi\Sample\Block;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Index extends \Magento\Framework\View\Element\Template
{
     protected $_filesystem;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \TrainingAayushi\Sample\Model\DataFactory $dataFactory
          )
     {
          parent::__construct($context);
          $this->_dataFactory = $dataFactory;
     }
 
     public function getResult()
     {
          $data = $this->_dataFactory->create();
          $collection = $data->getCollection();
          return $collection;
     }
}
