<?php
namespace SimplifiedMagento\FirstModule\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $storeManager;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Magento\Store\Model\StoreManagerInterface $storeManager)
	{
		$this->storeManager = $storeManager;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}

	public function sayName()
	{
		return __('<br>Aayushi Gohil');
	}

	/**
     * Get store identifier
     *
     * @return  int
     */
    public function getStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    
    /**
     * Get website identifier
     *
     * @return string|int|null
     */
    public function getWebsiteId()
    {
        return $this->storeManager->getStore()->getWebsiteId();
    }

    /**
     * Get Store code
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeManager->getStore()->getCode();
    }

     /**
     * Get Store name
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeManager->getStore()->getName();
    }
    
    /**
     * Get current url for store
     *
     * @param bool|string $fromStore Include/Exclude from_store parameter from URL
     * @return string     
     */
    public function getStoreUrl($fromStore = true)
    {
        return $this->storeManager->getStore()->getCurrentUrl($fromStore);
    }
    
    /**
     * Check if store is active
     *
     * @return boolean
     */
    public function isStoreActive()
    {
        return $this->storeManager->getStore()->isActive();
    }
}