<?php

class Magefast_SitelinksSearchBox_Block_Sitelinkssearchbox extends Mage_Core_Block_Template
{
    /**
     * Get Search action url
     *
     * @return string
     */
    public function getSearchActionUrl()
    {
        $settingsValue = Mage::helper('sitelinkssearchbox')->getSearchActionUrl();

        if ($settingsValue != '') {
            return $settingsValue;
        }

        $catalogsearch = Mage::helper('catalogsearch');

        return $catalogsearch->getResultUrl() . '?' . $catalogsearch->getQueryParamName() . '={search_term_string}';
    }
}
