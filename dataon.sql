/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - dataon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dataon` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

/*Table structure for table `jns_kain` */

DROP TABLE IF EXISTS `jns_kain`;

CREATE TABLE `jns_kain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `jns_kain` */

insert  into `jns_kain`(`id`,`nm_jenis`) values 
(1,'STB'),
(2,'NTB');

/*Table structure for table `kain` */

DROP TABLE IF EXISTS `kain`;

CREATE TABLE `kain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) DEFAULT NULL,
  `nm_kain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kain` */

insert  into `kain`(`id`,`id_jenis`,`nm_kain`) values 
(1,1,'Sutra'),
(2,2,'Katun');

/*Table structure for table `kualitas_kain` */

DROP TABLE IF EXISTS `kualitas_kain`;

CREATE TABLE `kualitas_kain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kain` int(11) DEFAULT NULL,
  `id_kualitas` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kualitas_kain` */

insert  into `kualitas_kain`(`id`,`id_kain`,`id_kualitas`,`harga`) values 
(1,1,1,10000000.00),
(2,1,2,9000000.00),
(3,1,3,8000000.00),
(4,2,1,10000000.00),
(5,2,2,10000000.00),
(6,2,3,10000000.00);

/*Table structure for table `master_kualitas` */

DROP TABLE IF EXISTS `master_kualitas`;

CREATE TABLE `master_kualitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kualitas` varchar(255) DEFAULT NULL,
  `detail_kualitas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `master_kualitas` */

insert  into `master_kualitas`(`id`,`nm_kualitas`,`detail_kualitas`) values 
(1,'1','Sangat Bagus'),
(2,'2','Bagus'),
(3,'3','Cukup Bagus');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
