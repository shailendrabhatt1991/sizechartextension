<?php

$installer = $this;

$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS {$this->getTable('extensionsmall_sizechart/sizechart')};
CREATE TABLE {$this->getTable('extensionsmall_sizechart/sizechart')} (
  `sizechart_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `sizes` varchar(255) NULL default NULL,
  `bust` varchar(255) NULL default NULL,
  `waist` varchar(255) NULL default NULL,
  `hip` varchar(255) NULL default NULL,
  `length` varchar(255) NULL default NULL,
  `lengthbottom` varchar(255) NULL default NULL,
  `shoulder` varchar(255) NULL default NULL,
  `Categories` varchar(255) NULL default NULL,
  PRIMARY KEY (`sizechart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$this->addAttribute('catalog_product', 'size_chart', array(
    'group'         => 'General',
    'input'         => 'text',
    'type'          => 'text',
    'label'         => 'Size Chart',
    'backend'       => '',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
));

$installer->endSetup();