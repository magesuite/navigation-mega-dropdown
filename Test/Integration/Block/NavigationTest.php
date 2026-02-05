<?php

declare(strict_types=1);

namespace MageSuite\Navigation\Test\Integration\Plugin\Block\Navigation;

/**
 * @magentoAppArea frontend
 */
class NavigationTest extends \PHPUnit\Framework\TestCase
{
    protected const ROOT_CATEGORY_ID = 2;

    protected \Magento\Framework\App\ObjectManager $objectManager;
    protected \MageSuite\Navigation\Block\Navigation $navigation;
    protected \MageSuite\NavigationMegaDropdown\Helper\Configuration $configuration;

    public function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
        $this->navigation = $this->objectManager->get(\MageSuite\Navigation\Block\Navigation::class);
        $this->configuration = $this->objectManager->get(\MageSuite\NavigationMegaDropdown\Helper\Configuration::class);
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     * @magentoAppArea frontend
     * @magentoCache all disabled
     * @magentoDataFixture MageSuite_NavigationMegaDropdown::Test/Integration/_files/categories.php
     * @magentoConfigFixture current_store navigation/mega_dropdown/is_enabled 1
     */
    public function testItReturnsNavigationCorrectStructure(): void
    {
        $navigation = $this->navigation->getItems();
        $this->assertCount(2, $navigation);
        $allCategoriesItem = $navigation[0];
        $this->assertEquals(\MageSuite\NavigationMegaDropdown\Plugin\Block\Navigation\AddMegaDropdownNavigation::ALL_CATEGORIES_ITEM_IDENTIFIER, $allCategoriesItem->getIdentifier());
        $this->assertEquals($this->configuration->getAllCategoriesLabel(), $allCategoriesItem->getLabel());
        $this->assertEquals($navigation[1]->getLabel(), 'Third category');
        $subItems = $allCategoriesItem->getSubItems();
        $this->assertEquals($subItems[0]->getLabel(), 'First category');
    }
}
