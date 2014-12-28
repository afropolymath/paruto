#
# Table structure for table 'stories'
#

CREATE TABLE IF NOT EXISTS `stories`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(20) DEFAULT NULL,
  `headline` TEXT NOT NULL,
  `state` VARCHAR(20) NOT NULL,
  `story` TEXT DEFAULT NULL,
  `image` MEDIUMBLOB DEFAULT NULL,
  `media` TEXT DEFAULT NULL
  `anonymous` INT(11) NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `created_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `date_modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `status` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# TODO: Convert to YAML file structure. Implemented generally for all models