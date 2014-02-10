<?php

class KL_CLClean_Model_Cron {

    public function cleanChangeLogTables()
    {
        /**
         * Fetch a collection of current state
         */
        $collection = Mage::getModel('enterprise_mview/metadata')->getCollection();

        /**
         * Database write connection
         */
        $writeConnection = Mage::getSingleton('core/resource')->getConnection('core_write');

        /**
         * Loop the collection
         */
        foreach ($collection as $metaData) {

            /**
             * Clean using Magento standard
             */
            $model = Mage::getModel('enterprise_mview/action_changelog_clear', array(
                    'connection' => $writeConnection,
                    'metadata' => $metaData
                ));

            $model->execute();

        }

    }

}