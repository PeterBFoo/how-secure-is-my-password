DROP DATABASE IF EXISTS ;

CREATE DATABASE howsecureismypasswd;

USE howsecureismypasswd;

DROP TABLE IF EXISTS passwords;

CREATE TABLE passwords (
                       password varchar(20) NOT NULL,
                       ip varchar(15) NOT NULL,
                       date datetime NOT NULL,
                       PRIMARY KEY (password)
);