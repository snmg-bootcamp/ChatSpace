CREATE DATABASE datasave;
USE datasave;
CREATE TABLE member
(
	id INT NOT NULL AUTO_INCREMENT,
	account varchar(20) NOT NULL,
	password varchar(20) NOT NULL,
	name varchar(20) NOT NULL,
	registerTime datetime NOT NULL ,
	status INT NOT NULL,
	PRIMARY KEY (ID)
);

