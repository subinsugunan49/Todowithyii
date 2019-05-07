/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.32-MariaDB : Database - todoappdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`todoappdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `todoappdb`;

/*Table structure for table `authassignment` */

DROP TABLE IF EXISTS `authassignment`;

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authassignment` */

insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('admin','1',NULL,'N;');

/*Table structure for table `authitem` */

DROP TABLE IF EXISTS `authitem`;

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authitem` */

insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('admin',2,'Administrator',NULL,'N;'),('Taskdetails.*',1,NULL,NULL,'N;'),('Taskgroup.*',1,NULL,NULL,'N;'),('Taskgroup.Index',0,NULL,NULL,'N;');

/*Table structure for table `authitemchild` */

DROP TABLE IF EXISTS `authitemchild`;

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `authitemchild` */

insert  into `authitemchild`(`parent`,`child`) values ('admin','Taskdetails.*'),('admin','Taskgroup.*'),('admin','Taskgroup.Index');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` enum('published','deleted','pending') DEFAULT 'published',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`status`) values (1,'Home','published'),(2,'Work','published'),(3,'Travel','published'),(4,'Personal','published');

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;

/*Data for the table `profiles` */

insert  into `profiles`(`user_id`,`lastname`,`firstname`) values (1,'Admin','Administrator'),(158,'Rao','Tanveer'),(159,'Hayat','Tanveer'),(160,'test4@gmail.com','test4@gmail.com'),(161,'testfinal11@gmail.com','testfinal11@gmail.com'),(162,'pornimakp87@gmail.com','Test'),(163,'testthroughteam@gmail.com','testthroughteam@gmail.com'),(164,'ssss@gmail.com','ssss@gmail.com'),(166,'test','subin'),(167,'Junais','Aslam '),(170,'lalu','linu'),(173,'Lalu','Linu'),(174,'Lalu','Linu'),(175,'Madani','Pauline'),(176,'Chacko','John'),(177,'B. Dolovac','Jasna'),(178,'van der Loo','Philipe'),(179,'sugunan','subin'),(187,'nicha','NIshad'),(189,'Al Jaser','Bassem'),(190,'Al Jaser','Bassem'),(191,'El Haber','Hanan'),(193,'Khatib','Islam'),(194,'Pinto','Joan'),(196,'Khan','Nabil'),(197,'Sinno','Riad'),(198,'Ladki','Lynn'),(199,'Naal','Nada'),(200,'Ayoub','Nour'),(201,'Sinno','Rami '),(202,'El Kotob','Rana'),(203,'El Hajj','Talal'),(204,'El Hajj','Talal'),(205,'El Hajj','Talal'),(206,'El Hajj','Talal'),(207,'Masri','Tarek'),(208,'Bou Assal','Yves'),(209,'Mabsout','Mohamad Ziad'),(211,'rak','ali'),(213,'subinsss@element8me.com','subinsss@element8me.com'),(214,'Khaled ','Omar '),(215,'Shadeed','Yazid');

/*Table structure for table `rights` */

DROP TABLE IF EXISTS `rights`;

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rights` */

/*Table structure for table `taskdetails` */

DROP TABLE IF EXISTS `taskdetails`;

CREATE TABLE `taskdetails` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_group_id` int(20) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `remarks` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_on` date DEFAULT NULL,
  `status` enum('completed','pending','progressing') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `Task With Task Group` (`task_group_id`),
  CONSTRAINT `Task With Task Group` FOREIGN KEY (`task_group_id`) REFERENCES `taskgroup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `taskdetails` */

insert  into `taskdetails`(`id`,`task_group_id`,`title`,`remarks`,`created_on`,`completed_on`,`status`) values (12,6,'Use MVC Structure','','2019-04-29 00:20:49',NULL,'pending'),(13,6,'Database Design and Schema','','2019-04-29 00:21:36',NULL,'pending'),(14,6,'Create Controller Model','','2019-04-29 00:22:09',NULL,'pending'),(15,6,'Server Side Validate','','2019-04-29 00:22:55',NULL,'pending'),(16,6,'Client Side Form Validation','','2019-04-29 00:23:09',NULL,'pending'),(17,6,'Add ,Delete ,Task Group','','2019-04-29 00:23:46','0000-00-00','pending'),(18,6,'Add ,Delete,Status Change Task','Create All the operation in Task','2019-04-29 00:24:35','2019-05-07','completed');

/*Table structure for table `taskgroup` */

DROP TABLE IF EXISTS `taskgroup`;

CREATE TABLE `taskgroup` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(20) unsigned DEFAULT NULL,
  `created_by` int(20) unsigned NOT NULL,
  `taskgroupname` varchar(200) NOT NULL,
  `description` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remind_on` datetime DEFAULT NULL,
  `status` enum('completed','pending','deleted') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `TaskGroup with Category` (`category_id`),
  KEY `Task Group with User` (`created_by`),
  CONSTRAINT `Task Group with User` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `TaskGroup with Category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `taskgroup` */

insert  into `taskgroup`(`id`,`category_id`,`created_by`,`taskgroupname`,`description`,`created_on`,`remind_on`,`status`) values (6,2,1,'Test Module Check List','Creation of multiple to-do lists each with a set of tasks which are validated','2019-04-29 00:20:12',NULL,'pending');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `activkey` varchar(128) DEFAULT '',
  `create_at` date DEFAULT NULL,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(20) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`username`,`user_type`,`password`,`email`,`activkey`,`create_at`,`lastvisit_at`,`superuser`,`status`) values (1,'Propeller','Digital','tabitha.alexander@mindera.com','Admin','tabitha.alexander@mindera.com','subinsugunan49@gmail.com','5af95e2886dbb','2017-01-16','0000-00-00 00:00:00',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
