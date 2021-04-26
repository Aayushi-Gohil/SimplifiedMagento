<?php
namespace TrainingAayushi\Sample\Block;
 
class Edit extends \Magento\Framework\View\Element\Template
{
     protected $_pageFactory;
     protected $_coreRegistry;
     protected $_dataLoader;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\Registry $coreRegistry,
          \TrainingAayushi\Sample\Model\DataFactory $dataLoader,
          array $data = []
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_coreRegistry = $coreRegistry;
          $this->_dataLoader = $dataLoader;
          return parent::__construct($context,$data);
     }
 
     public function execute()
     {
          return $this->_pageFactory->create();
     }
 
     public function getEditRecord()
     {
          $id = $this->_coreRegistry->registry('editRecordId');
          $data = $this->_dataLoader->create();
          $result = $data->load($id);
          $result = $result->getData();
               return $result;
     }
}