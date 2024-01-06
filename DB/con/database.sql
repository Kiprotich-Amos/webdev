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
);CREATE TABLE `ProductDetails` (
    productId INT NOT NULL AUTO_INCREMENT,
    productName VARCHAR(50),
    productImage VARCHAR(100),
    productQuantity VARCHAR(80),
    productBrand VARCHAR(255),
    productDescription VARCHAR(255),
    userId INT NOT NULL,
    PRIMARY KEY (productId),
    UNIQUE KEY UC_User (userId),
    CONSTRAINT FK_UserDetails FOREIGN KEY (userId) REFERENCES UserDetails(userId)
);CREATE TABLE `Price` (
    priceId INT NOT NULL AUTO_INCREMENT,
    priceDiscount VARCHAR(14),
    priceVAT VARCHAR(14),
    productPrice DOUBLE,
    productId INT NOT NULL,
    PRIMARY KEY (priceId),
    UNIQUE KEY UC_Prod (priceId),
    CONSTRAINT FK_ProductDetails FOREIGN KEY (productId) REFERENCES ProductDetails(productId)
);CREATE TABLE `OrderDetails`(
    orderId INT NOT NULL AUTO_INCREMENT,
    productId INT NOT NULL,
    priceId INT NOT NULL,
    quantity VARCHAR(80),
    userId INT NOT NULL,
    PRIMARY KEY(orderId),
    UNIQUE KEY UC_Price(priceId),
    CONSTRAINT FK_Price FOREIGN KEY (priceId) REFERENCES Price(priceId)
);