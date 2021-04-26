<?php
namespace TrainingAayushi\Sample\Controller\Index;
 
class Delete extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_request;
     protected $_dataFactory;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \TrainingAayushi\Sample\Model\DataFactory $dataFactory
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_request = $request;
          $this->_dataFactory = $dataFactory;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          $id = $this->_request->getParam('id');
          $data = $this->_dataFactory->create();
          $result = $data->setId($id);
          $result = $result->delete();
          return $this->_redirect('sample/index/index');
     }
}