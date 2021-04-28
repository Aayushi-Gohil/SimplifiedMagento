<?php
namespace TrainingAayushi\CustomerRestriction\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use TrainingAayushi\CustomerRestriction\Model\IpFactory;
use Magento\Framework\Event\Observer as EventObserver;

class CustomerAuthenticated implements ObserverInterface
{
	public $remote;
	public $ipFactory;

	public function __construct(RemoteAddress $remote, IpFactory $ipFactory)
  	{
    	$this->remote = $remote;
    	$this->ipFactory = $ipFactory;
  	}

	public function execute(EventObserver $observer)
    {
		$ip = $this->remote->getRemoteAddress();

		$deny_ips = array(
		  	'::1',
		  	'::1/64',
		  	'83.76.27.9',
		  	'192.168.1.163'
		);

		$input = array('ip_address' => $ip);

		if ( (array_search($ip, $deny_ips))!== FALSE ) {
			$data = $this->ipFactory->create();
			$data->setData($input)->save();
			$resultRedirect->setUrl($this->url->getUrl('customer/account/login'));
		}
    }
}
