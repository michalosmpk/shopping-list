-- basic version
-- create database `shopping_list-basic`;
-- use `shopping_list-basic`;
-- CREATE TABLE `list` (
--   `listing_id` int NOT NULL AUTO_INCREMENT,
--   `listing_name` varchar(255) DEFAULT NULL,
--   PRIMARY KEY (`listing_id`)
-- );
-- create table users( user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, username VARCHAR(255), password VARCHAR(255) );
-- create table user_lists(relation_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, user_id INT, list_id INT);
-- end of basic version

DROP DATABASE IF EXISTS `shopping-list`;

CREATE DATABASE `shopping-list`;
use `shopping-list`;
CREATE TABLE `users` (
	`user_id` int NOT NULL AUTO_INCREMENT,
	`email` varchar(64) DEFAULT NULL,
	`password` varchar(64) DEFAULT NULL,
	PRIMARY KEY (`user_id`)
);
CREATE TABLE `lists` (
	`list_id` int NOT NULL AUTO_INCREMENT,
	`list_name` varchar(64) DEFAULT NULL,
	PRIMARY KEY (`list_id`)
);
CREATE TABLE `privileges` (
	`privilege_id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`list_id` int NOT NULL,
	PRIMARY KEY (`privilege_id`),
	FOREIGN KEY (`user_id`) REFERENCES users (`user_id`),
	FOREIGN KEY (`list_id`) REFERENCES lists (`list_id`) 
);
CREATE TABLE `records` (
	`record_id` int NOT NULL AUTO_INCREMENT,
	`list_id` int NOT NULL,
	`text` varchar(64) NOT NULL,
	PRIMARY KEY (`record_id`),
	FOREIGN KEY (`list_id`) REFERENCES lists (`list_id`)
);
CREATE TABLE `browsers` (
	`browser_id` varchar(10) NOT NULL,
	PRIMARY KEY (`browser_id`)
);
CREATE TABLE `logged_in` (
	`relation_id` int NOT NULL AUTO_INCREMENT,  
	`browser_id` varchar(10) NOT NULL,
	`user_id` int NOT NULL,
	PRIMARY KEY (`relation_id`),
	FOREIGN KEY (`browser_id`) REFERENCES browsers (`browser_id`)
);

INSERT INTO `users` (`email`, `password`) VALUES ('admin@gmail.com', '$2y$10$LHYm037lykUiNDV9UpUGt.zqhxqv2ZTa6KY0qR8ViMqjWMTrprN5a');
INSERT INTO `browsers` (`browser_id`) VALUES ('0123456789');
-- INSERT INTO `logged_in` (`browser_id`, `user_id`) VALUES ('9827495696', '1');