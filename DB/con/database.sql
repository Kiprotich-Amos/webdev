CREATE TABLE `PasswordTable`(
    userId INT NOT NULL AUTO_INCREMENT,
    PASSWORD VARCHAR(255) NOT NULL,
    CONSTRAINT PK_PasswordTable PRIMARY KEY(userId, PASSWORD)
);CREATE TABLE `UserDetails`(
    firstName VARCHAR(15),
    secondName VARCHAR(15),
    lastname VARCHAR(15),
    email VARCHAR(40) NOT NULL,
    idNumber VARCHAR(20),
    phoneNumber VARCHAR(11) DEFAULT NULL,
    county VARCHAR(29) DEFAULT NULL,
    consituency VARCHAR(40) DEFAULT NULL,
    countyWard VARCHAR(50) DEFAULT NULL,
    addressNumber VARCHAR(20) DEFAULT NULL,
    userId INT NOT NULL,
    PRIMARY KEY(userId ),
    UNIQUE KEY UC_User(idNumber, email, userId),
    CONSTRAINT FK_PasswordTable FOREIGN KEY(userId) REFERENCES PasswordTable(userId)
);
ALTER TABLE UserDetails
    idNumber VARCHAR(20) DEFAULT NULL,
