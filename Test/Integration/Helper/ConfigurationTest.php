<?php

namespace MageSuite\NavigationMegaDropdown\Test\Integration\Helper;

class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \MageSuite\NavigationMegaDropdown\Helper\Configuration
     */
    private $configuration;

    public function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->configuration = $this->objectManager->get(\MageSuite\NavigationMegaDropdown\Helper\Configuration::class);
    }

    public function testItReturnCategoryLabel()
    {
        $this->assertEquals('All Categories', $this->configuration->getAllCategoriesLabel());
    }

    public function testItReturnThirdLevelLimit()
    {
        $this->assertEquals('99', $this->configuration->getThirdLevelLimit());
    }
}
