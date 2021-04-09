<?php

namespace Dev\Blog\Block\Adminhtml\Grid\Edit;

/**
 * Admin blog left menu
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_record');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Blog Information'));
    }
}