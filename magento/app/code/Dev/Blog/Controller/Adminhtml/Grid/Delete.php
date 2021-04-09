<?php

namespace Dev\Blog\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

/**
 * Delete Controller
 */
class Delete extends \Magento\Backend\App\Action
{

    /**
     * @var \Dev\Blog\Model\BlogFactory
     */
    protected $blogFactory;

    /**
     * @param Context                    $context
     * @param \Dev\Blog\Model\BlogFactory $blogFactory
     */
    public function __construct(
        Context $context,
        \Dev\Blog\Model\BlogFactory $blogFactory
    ) {
        parent::__construct($context);
        $this->blogFactory = $blogFactory;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dev_Blog::view');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->blogFactory->create();
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The post has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/index', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a post to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}