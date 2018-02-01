CREATE DATABASE epicerie;
USE epicerie;

CREATE TABLE type (

  idType  INT         NOT NULL AUTO_INCREMENT,
  nomType VARCHAR(40) NOT NULL,
  PRIMARY KEY (idType)
);

CREATE TABLE product (

  idProduct        INT          NOT NULL AUTO_INCREMENT,
  nomProduct       VARCHAR(100) NOT NULL,
  typeProduct      INT          NOT NULL,
  moisSemisProduct INT          NOT NULL,
  stockProduct     INT,
  PRIMARY KEY (idProduct),
  FOREIGN KEY (typeProduct) REFERENCES type (idType)
);

CREATE TABLE user (
  idUser       INT          NOT NULL AUTO_INCREMENT,
  loginUser    VARCHAR(100) NOT NULL,
  passwordUser VARCHAR(100) NOT NULL,
  PRIMARY KEY (idUser)
);

INSERT INTO user (loginUser, passwordUser) VALUES('toto', 'titi');
INSERT INTO type (nomType) VALUES ('Fruit');
INSERT INTO type (nomType) VALUES ('Legume');
INSERT INTO type (nomType) VALUES ('Fleur');

INSERT INTO product (nomProduct, typeProduct, moisSemisProduct, stockProduct) VALUES ('Carotte', 2, 3, 2);
INSERT INTO product (nomProduct, typeProduct, moisSemisProduct, stockProduct) VALUES ('Courgette', 2, 8, 6);
INSERT INTO product (nomProduct, typeProduct, moisSemisProduct, stockProduct) VALUES ('Fraise', 1, 5, 10);
INSERT INTO product (nomProduct, typeProduct, moisSemisProduct, stockProduct) VALUES ('Rose', 3, 6, 20);