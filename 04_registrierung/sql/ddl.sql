-- DDL: Data Definition Language 

CREATE TABLE user 
(
    id INT AUTO_INCREMENT,
    vorname VARCHAR(100) NOT NULL,
    nachname VARCHAR(100) NOT NULL,
    email VARCHAR(320) NOT NULL,
    passwort VARCHAR(100) NOT NULL,
    geburtsdatum DATE NOT NULL,
    is_admin TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY (email)
);