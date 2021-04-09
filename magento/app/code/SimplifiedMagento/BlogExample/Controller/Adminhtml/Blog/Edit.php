<?php
namespace SimplifiedMagento\BlogExample\Controller\Adminhtml\Blog;
use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
	// protected $resultPageFactory = false;
	protected $resultFactory;
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		// \Magento\Framework\View\Result\PageFactory $resultPageFactory
		\Magento\Framework\Controller\ResultFactory $resultFactory
	) {
		parent::__construct($context);
		// $this->resultPageFactory = $resultPageFactory;
		$this->resultFactory = $resultFactory;
	}
	public function execute()
	{
		//Call page factory to render layout and page content
		// $resultPage = $this->resultPageFactory->create();
		$resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
		//Set the menu which will be active for this page
		$resultPage->setActiveMenu('SimplifiedMagento_BlogExample::blog_manage');
		
		//Set the header title of grid
		$resultPage->getConfig()->getTitle()->prepend(__('Edit Blog'));
		//Add bread crumb
		$resultPage->addBreadcrumb(__('SimplifiedMagento'), __('BlogExample'));
		$resultPage->addBreadcrumb(__('Hello World'), __('Edit Blog'));
		// $resultPage->addContent(
  //           $resultPage->getLayout()->createBlock('SimplifiedMagento\BlogExample\Block\Adminhtml\Grid')
  //       );
		return $resultPage;
	}
	/*
	 * Check permission via ACL resource
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('SimplifiedMagento_BlogExample::blog_manage');
	}
}