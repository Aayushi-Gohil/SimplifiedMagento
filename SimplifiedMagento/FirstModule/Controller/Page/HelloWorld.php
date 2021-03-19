<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SimplifiedMagento\FirstModule\Controller\Page;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Action\Context;
// use SimplifiedMagento\FirstModule\NotMagento\PencilInterface;
use SimplifiedMagento\FirstModule\Api\PencilInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use SimplifiedMagento\FirstModule\Model\PencilFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Request\Http;
use SimplifiedMagento\FirstModule\Model\HeavyService;

class HelloWorld extends \Magento\Framework\App\Action\Action
{
	protected $pencilInterface;
	protected $productRepository;
	protected $pencilFactory;
	protected $productFactory;
	protected $http;
	protected $heavyService;

	public function __construct(Context $context, ProductFactory $productFactory,PencilInterface $pencilInterface, PencilFactory $pencilFactory, ProductRepositoryInterface $productRepository, Http $http, HeavyService $heavyService)
	{
		$this->pencilInterface = $pencilInterface;
		$this->pencilFactory = $pencilFactory;
		$this->productRepository = $productRepository;
		$this->productFactory = $productFactory;
		$this->http = $http;
		$this->heavyService = $heavyService;
		parent::__construct($context);
	}

	public function execute()
	{
		echo "Hello World <br/> ";

		echo "<h3>Dependency Injection Example with Argument Type</h3>";
		echo $this->pencilInterface->getPencilType();

		echo "<h3>Dependency Injection Another Example</h3>";
		echo get_class($this->productRepository);

		echo "<h3>Object Manager</h3>";
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$pencil = $objectManager->create('SimplifiedMagento\FirstModule\Model\Pencil');
		echo "<pre>";var_dump($pencil);echo "</pre>";

		echo "<h3>Factory Class</h3>";
		$pencilf = $this->pencilFactory->create(array("name" => 'Aayushi',"school" => 'Maharani High School'));
		echo "<pre>";var_dump($pencilf);echo "</pre>";

		echo "<h3>Student Class Argument Type Number & String</h3>";
		$objectManagerStudent = \Magento\Framework\App\ObjectManager::getInstance();
		$student = $objectManagerStudent->create('SimplifiedMagento\FirstModule\Model\Student');
		echo "<pre>";var_dump($student);echo "</pre>";

		echo "<h3>Book Example Virtual Type</h3>";
		$objectManagerBook = \Magento\Framework\App\ObjectManager::getInstance();
		$book = $objectManagerBook->create('SimplifiedMagento\FirstModule\Model\Book');
		echo "<pre>";var_dump($book);echo "</pre>";

		echo "<h3>Before Plugin</h3>";
		$product = $this->productFactory->create()->load(1);
		$product->setName("Iphone 6");
		$productName = $product->getName();
		echo "<pre>";var_dump($productName);echo "</pre>";
		$productSku = $product->getIdBySku('Flexible Bottle');
		echo "<pre>";var_dump($productSku);echo "</pre>";

		echo "<h3>Proxies</h3>";
		$id = $this->http->getParam('id',1);
		if ($id == 1) {
			$this->heavyService->printHeavyServiceMessage();
		} else{
			echo "Heavy Service not used";
		}
	}
}