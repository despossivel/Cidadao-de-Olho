CREATE DATABASE cidadaoDeOlho;

CREATE TABLE `cidadaoDeOlho`.`deputados` (
  `idDeputados` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `partido` VARCHAR(45) NULL,
  `tagLocalizacao` INT NULL,
  PRIMARY KEY (`idDeputados`));