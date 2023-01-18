-- Adminer 4.8.1 MySQL 5.5.5-10.3.32-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `sae203_utilisateur`;
CREATE TABLE `sae203_utilisateur` (
  `idUser` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `prenomUser` text NOT NULL,
  `nomUser` text NOT NULL,
  `mailUser` text NOT NULL,
  `mdpUser` text NOT NULL,
  `admin` tinyint(1) NOT NULL COMMENT 'soit 1 ou 0',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sae203_utilisateur` (`idUser`, `prenomUser`, `nomUser`, `mailUser`, `mdpUser`, `admin`) VALUES
(1,	'Theo',	'Gueranger',	'theo.gueranger@gmail.com',	'Oui',	1);

-- 2022-05-18 09:24:48
