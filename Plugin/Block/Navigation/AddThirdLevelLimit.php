<?php

namespace MageSuite\NavigationMegaDropdown\Plugin\Block\Navigation;

class AddThirdLevelLimit
{
    const ALL_CATEGORIES_ITEM_IDENTIFIER = 'all-categories';

    /**
     * @var \MageSuite\NavigationMegaDropdown\Helper\Configuration
     */
    protected $configuration;

    public function __construct(\MageSuite\NavigationMegaDropdown\Helper\Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function aroundGetData($subject, callable $proceed, $key = '', $index = null)
    {
        if($key != 'third_level_limit'){
            return $proceed($key, $index);
        }

        return $this->configuration->getThirdLevelLimit();
    }
}