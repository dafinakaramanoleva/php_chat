CREATE DATABASE `chat_app`;

CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

CREATE TABLE IF NOT EXISTS `chat_users_rooms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` VARCHAR(30),
  `size` INT,
  `content` MEDIUMBLOB,
  `time` datetime NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`id`)
);

INSERT INTO `chat_rooms`(`name`) VALUES ('All Users');



