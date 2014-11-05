CREATE DATABASE datasave;
USE datasave;
CREATE TABLE member
(
	ID INT NOT NULL AUTO_INCREMENT,
	account varchar(20) NOT NULL,
	password varchar(20) NOT NULL,
	name varchar(20) NOT NULL,
	RegisterTime datetime NOT NULL DEFAULT NOW(),
	PRIMARY KEY (ID)
);

