<?php

namespace MageSuite\NavigationMegaDropdown\Model\Navigation;

class Item extends \MageSuite\Navigation\Model\Navigation\Item
{
    /**
     * @return boolean
     */
    public function isIncludedInMainBar()
    {
        return $this->category->getIncludeInMainBar() ? true : false;
    }
}
