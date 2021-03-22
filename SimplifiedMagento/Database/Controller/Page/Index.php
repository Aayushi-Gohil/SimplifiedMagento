<?php
namespace SimplifiedMagento\Database\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember;

class Index extends Action
{
	protected $affiliateMemberFactory;

	public function __construct(Context $context, AffiliateMemberFactory $affiliateMemberFactory)
	{
		$this->affiliateMemberFactory = $affiliateMemberFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$affiliateMember = $this->affiliateMemberFactory->create();
		$member = $affiliateMember->load(1);
		var_dump($member);
		// var_dump($member->getData());
	}
}