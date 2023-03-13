
CREATE TABLE IF NOT EXISTS `llx_c_entrepot_loc` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(16) NOT NULL,
  `label` varchar(128) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ctime` timestamp NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fk_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`rowid`),
  UNIQUE KEY `code` (`code`),
  KEY `f_parent` (`fk_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
