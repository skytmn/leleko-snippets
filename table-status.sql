CREATE TABLE IF NOT EXISTS `modx_leleko_cdb_cartridges_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartno` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;
