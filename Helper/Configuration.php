<?php

namespace MageSuite\NavigationMegaDropdown\Helper;

class Configuration extends \Magento\Framework\App\Helper\AbstractHelper
{
    const NAVIGATION_PATH = 'navigation/mega_dropdown';

    private $config;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigInterface
    ) {
        parent::__construct($context);

        $this->scopeConfig = $scopeConfigInterface;
    }

    public function isEnabled()
    {
        $config = $this->getConfig();

        return $config['is_enabled'] ? true : false;
    }

    public function getAllCategoriesLabel()
    {
        $config = $this->getConfig();

        return $config['all_categories_label'];
    }

    public function getThirdLevelLimit()
    {
        $config = $this->getConfig();

        return $config['third_level_limit'];
    }

    protected function getConfig()
    {
        if(!$this->config){
            $this->config = $this->scopeConfig->getValue(self::NAVIGATION_PATH, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        }

        return $this->config;
    }
}
