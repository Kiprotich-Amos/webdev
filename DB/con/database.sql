CREATE DATABASE testroot;


CREATE TABLE UserDetails (
	firstName 	VARCHAR(15),
	secondName 	VARCHAR(15),
	lastname	VARCHAR(15),
	idNumber VARCHAR(20) NOT NULL,
	email	VARCHAR(40),
	phoneNumber VARCHAR(11),
	county 	VARCHAR(29),
	consituency VARCHAR(40),
	countyWard VARCHAR(50),
	addressNumber VARCHAR(20),
	CONSTRAINT PK_UserDetails PRIMARY KEY (idNumber,email),
	CONSTRAINT UC_User  UNIQUE(idNumber,email)
);

CREATE TABLE PasswordTable(
	password VARCHAR(30),
	idNumber VARCHAR(15),
	CONSTRAINT FK_PasswordTable FOREIGN KEY (idNumber)
    REFERENCES UserDetails(idNumber)
);