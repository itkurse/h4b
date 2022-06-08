-- DDL: Data Definition Language

CREATE TABLE users 
(
    id INT AUTO_INCREMENT,
    email VARCHAR(300) NOT NULL,
    passwort VARCHAR(300) NOT NULL,
    vorname VARCHAR(100) NOT NULL,
    nachname VARCHAR(100) NOT NULL,
    is_admin INT(1) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY (email)
);