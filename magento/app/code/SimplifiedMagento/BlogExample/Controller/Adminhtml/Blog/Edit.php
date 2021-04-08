<?php
namespace SimplifiedMagento\BlogExample\Controller\Adminhtml\Blog;


class Edit extends \Magento\Backend\App\Action
{	
	/** @var \Magento\Framework\View\Result\PageFactory  */
	protected $resultPageFactory;
	public function __construct(
	     \Magento\Framework\App\Action\Context $context,
	     \Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
	     $this->resultPageFactory = $resultPageFactory;
	     parent::__construct($context);
	}
	/**
	* Load the page defined in view/adminhtml/layout/samplenewpage_sampleform_index.xml
	*
	* @return \Magento\Framework\View\Result\Page
	*/
	public function execute()
	{
	    $resultPage = $this->resultPageFactory->create();
		//Set the menu which will be active for this page
		$resultPage->setActiveMenu('SimplifiedMagento_BlogExample::blog_manage');
		
		//Set the header title of grid
		$resultPage->getConfig()->getTitle()->prepend(__('Edit Blog'));
		//Add bread crumb
		$resultPage->addBreadcrumb(__('SimplifiedMagento'), __('BlogExample'));
		$resultPage->addBreadcrumb(__('Hello World'), __('Edit Blog'));
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