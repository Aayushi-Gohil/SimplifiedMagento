<?php
namespace TrainingAayushi\CustomerRestriction\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use TrainingAayushi\CustomerRestriction\Model\IpFactory;
use Magento\Framework\Event\Observer as EventObserver;
use TrainingAayushi\CustomerRestriction\Helper\DataConfig;

class CustomerAuthenticated implements ObserverInterface
{
	public $remote;
	public $ipFactory;
	/**
     * @var Helper
     */
    protected $_helperData;

	public function __construct(RemoteAddress $remote, IpFactory $ipFactory, DataConfig $helperData)
  	{
    	$this->remote = $remote;
    	$this->ipFactory = $ipFactory;
    	$this->_helperData = $helperData;
  	}

	public function execute(EventObserver $observer)
    {
		$ip = $this->remote->getRemoteAddress();
		$deny_ips = array_map('trim', explode(' ', $this->_helperData->getBlockedAddress()));
		$input = array('ip_address' => $ip);
		if ( (array_search($ip, $deny_ips))!== FALSE ) {
			$data = $this->ipFactory->create();
			$data->setData($input)->save();
			$resultRedirect->setUrl($this->url->getUrl('customer/account/login'));
		}
    }
}
