<?php
namespace SimplifiedMagento\BlogExample\Block\Adminhtml;

class Blog extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_blog';
		$this->_blockGroup = 'SimplifiedMagento_BlogExample';
		$this->_headerText = __('Manage Blogs');
		$this->_addButtonLabel = __('Create New Blog');
		parent::_construct();
	}
}