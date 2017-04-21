-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 19 Mai 2016 à 11:34
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1-log
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `reunion_island`
--
CREATE DATABASE IF NOT EXISTS `reunion_island` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reunion_island`;

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--

DROP TABLE IF EXISTS `hiking`;
CREATE TABLE IF NOT EXISTS `hiking` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`difficulty` enum('très facile','facile','moyen','difficile','très difficile') NOT NULL,
	`distance` int(11) NOT NULL COMMENT 'in km',
	`duration` time NOT NULL,
	`height_difference` int(6) NOT NULL COMMENT 'in m',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `hiking`(`name`,`difficulty`,`distance`,`duration`,`height_difference`)
VALUES ('Le sommet du Piton Béthoune par le tour du bonnet de Prêtre', 'très difficile', 5.7, '04:00:00', 650),
('Le sentier des Sources entre Cilaos et Bras sec', 'facile', 5.9, '01:15:00', 300),
('De Bras Sec au Bras de Cilaos par Palmiste Rouge', 'moyen', 16.5, '05:30:00', 1000),
('La grande cascade du Bras Rouge depuis le pont sur la route RD242', 'moyen', 1.5, '01:30:00', 240),
('L\'îlet Sopurces et la Ravine Bananes depuis l\'îlet à Cordes', 'difficile', 6.4, '05:00:00', 450);