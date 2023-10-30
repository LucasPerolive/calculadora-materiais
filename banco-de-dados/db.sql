CREATE DATABASE calculadora_materiais;
USE calculadora_materiais;

CREATE USER 'aplicacao'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON *.* TO 'aplicacao'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE TABLE cliente(
id INT NOT NULL AUTO_INCREMENT,
nome CHAR(60) NOT NULL,
email CHAR(60) NOT NULL,
endereco CHAR(60) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE valores(
id INT NOT NULL AUTO_INCREMENT,
idCliente INT NOT NULL,
valorTotal DECIMAL(6,2) NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY(idCliente) REFERENCES cliente(id)
);
