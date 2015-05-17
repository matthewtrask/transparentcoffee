# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38-0ubuntu0.12.04.1)
# Database: scotchbox
# Generation Time: 2015-05-17 20:04:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ttc_vendor_approved
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ttc_vendor_approved`;

CREATE TABLE `ttc_vendor_approved` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of vendor registrering for TTC site',
  `vendor_email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email of vendor applying for TTC site',
  `vender_phone` varchar(255) NOT NULL DEFAULT '' COMMENT 'Phone number of vendor applying for TTC site',
  `roaster_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the coffee roaster',
  `roaster_image` blob NOT NULL COMMENT 'Coffee roaster image',
  `coffee_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the coffee produced',
  `coffee_rp_price` varchar(255) NOT NULL DEFAULT '' COMMENT 'Coffee retail price',
  `coffee_rp_currency` varchar(255) NOT NULL DEFAULT '' COMMENT 'Coffee price currency',
  `coffee_rp_size` varchar(255) NOT NULL DEFAULT '' COMMENT 'Size of the coffee bag for purchase',
  `grower_farm_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the grower',
  `grower_farm_location` varchar(255) NOT NULL DEFAULT '' COMMENT 'Location of the grower',
  `grower_farm_global_loc` int(11) NOT NULL COMMENT 'Global region of where the farm is. Will be a dropdown. 1 = North America & The Caribbean, 2 = Central America, 3 = South America, 4 = Africa & Middle East, 5 = Oceania, 6 = Other',
  `coffee_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'Description of the coffee. 140 character limit',
  `coffee_website` varchar(255) NOT NULL DEFAULT '' COMMENT 'Website for the coffee roaster',
  `fob_paid` varchar(255) NOT NULL DEFAULT '' COMMENT 'Price paid to grower',
  `fob_upload` blob NOT NULL COMMENT 'Image of the receipt paid to farmers from roaster',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ttc_vendor_pending
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ttc_vendor_pending`;

CREATE TABLE `ttc_vendor_pending` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of vendor registrering for TTC site',
  `vendor_email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email of vendor applying for TTC site',
  `vender_phone` varchar(255) NOT NULL DEFAULT '' COMMENT 'Phone number of vendor applying for TTC site',
  `roaster_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the coffee roaster',
  `roaster_image` blob NOT NULL COMMENT 'Coffee roaster image',
  `coffee_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the coffee produced',
  `coffee_rp_price` varchar(255) NOT NULL DEFAULT '' COMMENT 'Coffee retail price',
  `coffee_rp_currency` varchar(255) NOT NULL DEFAULT '' COMMENT 'Coffee price currency',
  `coffee_rp_size` varchar(255) NOT NULL DEFAULT '' COMMENT 'Size of the coffee bag for purchase',
  `grower_farm_name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name of the grower',
  `grower_farm_location` varchar(255) NOT NULL DEFAULT '' COMMENT 'Location of the grower',
  `grower_farm_global_loc` int(11) NOT NULL COMMENT 'Global region of where the farm is. Will be a dropdown. 1 = North America & The Caribbean, 2 = Central America, 3 = South America, 4 = Africa & Middle East, 5 = Oceania, 6 = Other',
  `coffee_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'Description of the coffee. 140 character limit',
  `coffee_website` varchar(255) NOT NULL DEFAULT '' COMMENT 'Website for the coffee roaster',
  `fob_paid` varchar(255) NOT NULL DEFAULT '' COMMENT 'Price paid to grower',
  `fob_upload` blob NOT NULL COMMENT 'Image of the receipt paid to farmers from roaster',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
