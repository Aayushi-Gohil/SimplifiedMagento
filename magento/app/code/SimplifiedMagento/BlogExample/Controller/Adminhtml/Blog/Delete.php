<?php
namespace SimplifiedMagento\BlogExample\Controller\Adminhtml\Blog;
class Delete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	public function execute()
	{
		//Call page factory to render layout and page content
		$resultPage = $this->resultPageFactory->create();
		//Set the menu which will be active for this page
		$resultPage->setActiveMenu('SimplifiedMagento_BlogExample::blog_manage');
		
		//Set the header title of grid
		$resultPage->getConfig()->getTitle()->prepend(__('Delete Blog'));
		//Add bread crumb
		$resultPage->addBreadcrumb(__('SimplifiedMagento'), __('Mageplaza'));
		$resultPage->addBreadcrumb(__('Hello World'), __('Delete Blog'));
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