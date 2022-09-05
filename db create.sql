CREATE DATABASE db;
CREATE USER 'php_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON db . * TO 'php_user'@'localhost';
FLUSH PRIVILEGES;
USE db;
CREATE TABLE posts (
    id            int PRIMARY KEY,
    userId        int,           
    title         varchar(100),           
    body          varchar(1000)          
);

CREATE TABLE comments (
    id            int PRIMARY KEY,
    postId        int,           
    name          varchar(100),
	email  		  varchar(100),
    body          varchar(1000)          
);