create database `shopping_list-basic`;
use `shopping_list-basic`;
CREATE TABLE `list` (
  `listing_id` int NOT NULL AUTO_INCREMENT,
  `listing_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`listing_id`)
);
-- create table users( user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, username VARCHAR(255), password VARCHAR(255) );
-- create table user_lists(relation_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, user_id INT, list_id INT);