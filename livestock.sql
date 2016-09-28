/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.5.16 : Database - livestock
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `livestock`;

USE `livestock`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `livestock` */

DROP TABLE IF EXISTS `livestock`;

CREATE TABLE `livestock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_no` varchar(222) DEFAULT NULL,
  `origin` varchar(222) DEFAULT NULL,
  `describ` text,
  `sex` varchar(22) DEFAULT NULL,
  `age` varchar(222) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `admin` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `livestock` */

insert  into `livestock`(`id`,`tag_no`,`origin`,`describ`,`sex`,`age`,`status`,`admin`,`date`,`type`) values (1,'78367238732','hjsdkjsd','hjsfkjsd','female','34','1','0','2016-02-17 10:22:22','Cow'),(2,'123','Accra-Achimota','This is the one we talked about','Male','21','Eat','shandonjoe@gmail.com','2016-02-18 12:18:05','Cow');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(222) DEFAULT NULL,
  `password` varchar(222) DEFAULT NULL,
  `name` varchar(222) DEFAULT NULL,
  `email` varchar(222) DEFAULT NULL,
  `telephone` int(20) DEFAULT NULL,
  `loginID` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user`,`password`,`name`,`email`,`telephone`,`loginID`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','Admin','admin',0,'admin'),(4,'user','ee11cbb19052e40b07aac0ca060c23ee','Emmanuel Gamor','gamoremmanuel94@gmail.com',277131592,'user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
