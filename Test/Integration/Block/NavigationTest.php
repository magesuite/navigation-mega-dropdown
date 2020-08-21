<?php

namespace MageSuite\Navigation\Test\Integration\Plugin\Block\Navigation;

/**
 * @magentoAppArea frontend
 */
class NavigationTest extends \PHPUnit\Framework\TestCase
{
    const ROOT_CATEGORY_ID = 2;

    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \MageSuite\Navigation\Block\Navigation
     */
    protected $navigation;

    /**
     * @var \MageSuite\NavigationMegaDropdown\Helper\Configuration
     */
    protected $configuration;


    public function setUp(): void
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();
        $this->navigation = $this->objectManager->get(\MageSuite\Navigation\Block\Navigation::class);
        $this->configuration = $this->objectManager->get(\MageSuite\NavigationMegaDropdown\Helper\Configuration::class);
    }

    public static function loadCategories()
    {
        require __DIR__ . '/../_files/categories.php';

        $cache = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->create(\Magento\Framework\App\CacheInterface::class);

        $cache->remove(\MageSuite\Category\Model\ResourceModel\Category::CACHE_TAG);
    }

    /**
     * @magentoAppIsolation enabled
     * @magentoDbIsolation enabled
     * @magentoAppArea frontend
     * @magentoCache all disabled
     * @magentoDataFixture loadCategories
     * @magentoConfigFixture current_store navigation/mega_dropdown/is_enabled 1
     */
    public function testItReturnsNavigationCorrectStructure()
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
