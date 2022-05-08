<?php

class Magefast_SitelinksSearchBox_Model_Observer
{
    /**
     * Add canonical tag for Homepage
     *
     * @param $observer
     */
    public function addCanonical($observer)
    {
        if (!Mage::helper('sitelinkssearchbox')->isEnabled()) {
            return;
        }

        $routeName = Mage::app()->getRequest()->getRouteName();
        $identifier = Mage::getSingleton('cms/page')->getIdentifier();

        /**
         * Check if homepage
         */
        if ($routeName == 'cms' && $identifier == 'home') {

            $layout = $observer->getLayout();

            if ($head_block = $layout->getBlock('head')) {

                if ($head_block->getItems()) {
                    foreach ($head_block->getItems() as $key => $value) {
                        if ($value['params'] == 'rel="canonical"') {
                            $rel_canonical[] = $value['name'];
                        }
                        if (isset($rel_canonical)) {
                            foreach ($rel_canonical as $rc) {
                                $head_block->removeItem('link_rel', $rc);
                            }
                        }
                    }
                }

                if (isset($rel_canonical)) {
                    foreach ($rel_canonical as $rc) {
                        $head_block->removeItem('link_rel', $rc);
                    }
                }

                $head_block->addItem('link_rel', Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB), 'rel="canonical"');
            }
        }
    }
}