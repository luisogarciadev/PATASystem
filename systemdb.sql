DROP DATABASE IF EXISTS patasystem;
CREATE DATABASE patasystem;
USE patasystem;

CREATE TABLE species(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name VARCHAR(50)
);

CREATE TABLE status(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name VARCHAR(50)
);

CREATE TABLE person(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    personName VARCHAR(200),
    phone BIGINT NOT NULL,
	address VARCHAR(200),
    email VARCHAR(200),
    active VARCHAR(1)
);

CREATE TABLE animal(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	turn INT,
	petName VARCHAR(200),
	idSpecies INT,
	gender VARCHAR(20),
	sick VARCHAR(200),
	ticks VARCHAR(1),
	fleas VARCHAR(1),
	nervous VARCHAR(1),
	aggressive VARCHAR(1),
	photo VARCHAR(200),
	weight DECIMAL(3,3),
	campaignDate DATE,
    isCertEng VARCHAR(1),
    active VARCHAR(1),
    idStatus INT,
    UNIQUE (turn),
	FOREIGN KEY (idSpecies) REFERENCES species(id),
    FOREIGN KEY (idStatus) REFERENCES status(id)
);

CREATE TABLE animalStatus(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    idAnimal INT,
    idStatus INT,
    time DATETIME,
    FOREIGN KEY (idAnimal) REFERENCES animal(id),
    FOREIGN KEY (idStatus) REFERENCES status(id)
);

CREATE TABLE personAnimal(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    idPerson INT,
    idAnimal INT,
    FOREIGN KEY (idPerson) REFERENCES person(id),
    FOREIGN KEY (idAnimal) REFERENCES animal(id)
);

CREATE TABLE recovery(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	idAnimal INT NOT NULL,
	entryTime DATETIME,
	exitTime DATETIME,
	FOREIGN KEY (idAnimal) REFERENCES animal(id)
);

INSERT INTO species(name) VALUES('Canino'),('Felino'),('Otro');
INSERT INTO status(name) VALUES('Preregistro'), ('Pesas'), ('Registro'), ('Cirugía'), ('Recuperacion');