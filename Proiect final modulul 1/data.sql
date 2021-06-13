CREATE DATABASE calculator_greutati;

USE calculator_greutati;

CREATE TABLE useri(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	gen INT NOT NULL,
    greutate_actuala FLOAT NOT NULL,
	inaltime INT NOT NULL,
	varsta INT NOT NULL
);

SELECT * FROM useri;