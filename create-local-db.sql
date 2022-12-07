ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'cicle';

CREATE DATABASE migranpassword;
USE migranpassword;
CREATE TABLE passwords (
                       password varchar(20) NOT NULL,
                       ip varchar(15) NOT NULL,
                       date datetime NOT NULL,
                       PRIMARY KEY (password)
);