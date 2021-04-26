<?php
namespace TrainingAayushi\Sample\Controller\Index;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_postFactory;
     protected $_filesystem;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \TrainingAayushi\Sample\Model\DataFactory $dataFactory,
          \Magento\Framework\Filesystem $filesystem
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_dataFactory = $dataFactory;
          $this->_filesystem = $filesystem;
          return parent::__construct($context);
     }
 
     public function execute()
     {
          if ($this->getRequest()->isPost()) {
               $input = $this->getRequest()->getPostValue();
               $data = $this->_dataFactory->create();
 
          if($input['editRecordId']){
                    $data->load($input['editRecordId']);
                    $data->addData($input);
                    $data->setId($input['editRecordId']);
                    $data->save();
          }else{
               $data->setData($input)->save();
          }
 
              return $this->_redirect('sample/index/index');
          }
     }
}