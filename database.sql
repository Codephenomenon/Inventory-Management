/*
// Author: Daniel Clayton
// Run this script in phpMyAdmin to install Database for CMS project
// Creates a simple database for the CMS to use
// root user, no password, cms database connection
*/

CREATE DATABASE cms;

USE cms;

CREATE TABLE user_accounts (
  user_id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	pass VARCHAR(50) NOT NULL,
	PRIMARY KEY (user_id)
);

CREATE TABLE category (
  category_id INT NOT NULL AUTO_INCREMENT,
  category_name CHAR(50) NOT NULL,
  PRIMARY KEY (category_id)
);

CREATE TABLE inventory (
  item_id INT NOT NULL AUTO_INCREMENT,
  item_name VARCHAR(50) NOT NULL,
  item_description VARCHAR(200) NOT NULL,
  item_cost FLOAT,
  item_amount INT NOT NULL,
  item_img CHAR(100),
  item_category INT,
  FOREIGN KEY (item_category) REFERENCES category (category_id),
  PRIMARY KEY (item_id)
);
