-- create database `shopping_list-basic`;
-- use `shopping_list-basic`;
-- CREATE TABLE `list` (
--   `listing_id` int NOT NULL AUTO_INCREMENT,
--   `listing_name` varchar(255) DEFAULT NULL,
--   PRIMARY KEY (`listing_id`)
-- );
-- create table users( user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, username VARCHAR(255), password VARCHAR(255) );
-- create table user_lists(relation_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, user_id INT, list_id INT);

CREATE DATABASE `shopping-list`;
use `shopping-list`;
CREATE TABLE `users` (
	`user_id` int NOT NULL AUTO_INCREMENT,
	`username` varchar(64) DEFAULT NULL,
	`password` varchar(64) DEFAULT NULL,
	`email` varchar(64) DEFAULT NULL,
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
	FOREIGN KEY (`user_id`) REFERENCES users (`user_id`) ,
	FOREIGN KEY (`list_id`) REFERENCES lists (`list_id`) 
);
CREATE TABLE `records` (
	`record_id` int NOT NULL AUTO_INCREMENT,
	`list_id` int NOT NULL,
	`text` varchar(64) NOT NULL,
	PRIMARY KEY (`record_id`),
	FOREIGN KEY (`list_id`) REFERENCES lists (`list_id`)
);