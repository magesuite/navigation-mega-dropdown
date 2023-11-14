<?php

namespace MageSuite\NavigationMegaDropdown\Plugin\Block\Navigation;

class AddMegaDropdownNavigation
{
    const ALL_CATEGORIES_ITEM_IDENTIFIER = 'all-categories';

    /**
     * @var \MageSuite\NavigationMegaDropdown\Helper\Configuration
     */
    protected $configuration;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var \Magento\Catalog\Api\CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var \MageSuite\Navigation\Model\Navigation\ItemFactory
     */
    protected $itemFactory;

    public function __construct(
        \MageSuite\NavigationMegaDropdown\Helper\Configuration $configuration,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \MageSuite\Navigation\Model\Navigation\ItemFactory $itemFactory
    ){
        $this->configuration = $configuration;
        $this->storeManager = $storeManager;
        $this->categoryRepository = $categoryRepository;
        $this->itemFactory = $itemFactory;
    }

    public function afterGetItems(\MageSuite\Navigation\Block\Navigation $subject, $result)
    {
        if(!$this->configuration->isEnabled()){
            return $result;
        }

        if($subject->getNavigationType() != \MageSuite\Navigation\Service\Navigation\Builder::TYPE_DESKTOP){
            return $result;
        }

        $items = [];

        $allCategoriesItem = $this->prepareAllCategoriesItem();
        $allCategoriesItem->setSubItems($result);

        $items[] = $allCategoriesItem;

        foreach($result as $item){
            if(!$item->isIncludedInMainBar()){
                continue;
            }

            $items[] = $item;
        }

        return $items;
    }

    protected function prepareAllCategoriesItem()
    {
        $rootCategoryId = $this->storeManager->getStore()->getRootCategoryId();
        $rootCategory = $this->categoryRepository->get($rootCategoryId);

        $allCategoriesItem = $this->itemFactory->create(['category' => $rootCategory]);

        $allCategoriesItem->setIdentifier(self::ALL_CATEGORIES_ITEM_IDENTIFIER);
        $allCategoriesItem->setLabel($this->configuration->getAllCategoriesLabel());

        return $allCategoriesItem;
    }
}
