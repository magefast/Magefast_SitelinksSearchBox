<?php

class Magefast_SitelinksSearchBox_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Is enabled or Not
     *
     * @return bool
     */
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag('sitelinkssearchbox/settings/enabled');
    }

    /**
     * Get search action url
     *
     * @return mixed
     */
    public function getSearchActionUrl()
    {
        return Mage::getStoreConfig('sitelinkssearchbox/settings/searchaction');
    }
}