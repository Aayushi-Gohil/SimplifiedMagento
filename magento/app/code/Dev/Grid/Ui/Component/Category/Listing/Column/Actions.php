<?php

namespace Dev\Grid\Ui\Component\Category\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Url;
use Magento\Framework\UrlInterface;

class Actions extends Column
{

    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $_viewUrl;


    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Url $urlBuilder,
        UrlInterface $url,
        $viewUrl = '',
        array $components = [],
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_viewUrl    = $viewUrl;
        $this->url    = $url;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {   
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['entity_id'])) {
                    $item[$name]['view']   = [
                        'href'  => $this->_urlBuilder->getUrl($this->_viewUrl, ['id' => $item['entity_id']]),
                        'target' => '_blank',
                        'label' => __('View on Frontend')
                    ];
                    $item[$name]['edit']   = [
                        'href'  => $this->url->getUrl('dev_grid/index/edit', ['id' => $item['entity_id']]),
                        'target' => '_blank',
                        'label' => __('Edit')
                    ];
                    // $item[$name]['delete']   = [
                    //     'href'  => $this->url->getUrl('dev_grid/index/delete', ['id' => $item['entity_id']]),
                    //     'target' => '_blank',
                    //     'label' => __('Delete')
                    // ];
                }
            }
        }

        return $dataSource;
    }
}
