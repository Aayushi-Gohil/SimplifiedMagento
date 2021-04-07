<?php

namespace SimplifiedMagento\AccessList\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * 
 */
class Status extends Column
{
	
	public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
	{
		parent::__construct($context,$uiComponentFactory,$components,$data);
	}

	public function prepareDataSource(arra $dataSource)
	{
		if (isset($dataSource['data']['items'])) {
			foreach ($dataSource['data']['items'] as &$item) {
				if ($item['status'] == 1) {
					$item['status'] = 'yes';
				}else{
					$item['status'] = 'no';
				}
			}
		}
		return parent::prepareDataSource($dataSource);
	}
}