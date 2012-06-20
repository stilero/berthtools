CREATE TABLE IF NOT EXISTS `#__berthtool_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `longitude` double NOT NULL DEFAULT '0',
  `latitude` double NOT NULL DEFAULT '0',
  `loc_group_id` int(11) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `params` text,
  PRIMARY KEY (`id`)
);

