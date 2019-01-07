# Host: localhost  (Version 5.6.35)
# Date: 2019-01-07 20:13:30
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "activestaff"
#

DROP TABLE IF EXISTS `activestaff`;
CREATE TABLE `activestaff` (
  `StaffID` smallint(6) NOT NULL AUTO_INCREMENT,
  `NRIC` bigint(12) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `line1` varchar(255) NOT NULL DEFAULT '',
  `line2` varchar(255) DEFAULT NULL,
  `line3` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL DEFAULT '',
  `zip` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT '',
  `planet` varchar(255) NOT NULL DEFAULT '',
  `galaxy` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '0',
  `mobile2` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `bankName` varchar(255) DEFAULT NULL,
  `bankDetail` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) NOT NULL DEFAULT '' COMMENT 'Staff Position',
  `active` int(1) NOT NULL DEFAULT '1',
  `hash` varchar(255) DEFAULT NULL COMMENT 'generate during enroll for validation',
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='active staff';

#
# Data for table "activestaff"
#


#
# Structure for table "attendance"
#

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `NRIC` bigint(12) NOT NULL,
  `dates` varchar(255) NOT NULL DEFAULT '',
  `start` varchar(255) NOT NULL DEFAULT '',
  `end` varchar(255) DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL COMMENT 'calculate total hour but not in spec so later la',
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NRIC`,`dates`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "attendance"
#


#
# Structure for table "login"
#

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `lastLogin` varchar(255) DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hash` varchar(255) DEFAULT NULL COMMENT 'generated hash for reset password',
  `code` varchar(255) DEFAULT NULL COMMENT '6 digit code',
  `resettime` varchar(255) DEFAULT NULL COMMENT 'Reset Request UNIX Time',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "login"
#

INSERT INTO `login` VALUES (1,'admin','$2y$10$MwYLvz8vdnQzFyujkRbXteNXA4fCF0FAN5GvuexUk5I98RZKghbtO','','youremail@example.com','33087035311f835d9e80f68ac14ae93e47b8855e','541831','1538699855');
