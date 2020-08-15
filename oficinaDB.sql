-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Ago-2020 às 00:32
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oficina`
--
CREATE DATABASE IF NOT EXISTS `oficina` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `oficina`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

DROP TABLE IF EXISTS `orcamento`;
CREATE TABLE IF NOT EXISTS `orcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor` varchar(100) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `dataDoc` date NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `descricao` text NOT NULL,
  `valor_total` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `vendedor`, `cliente`, `dataDoc`, `hora`, `descricao`, `valor_total`) VALUES
(52, 'CÃ©sar', 'Filipe', '2020-08-14', '2020-08-15 00:26:29', 'RevisÃ£o Completa De 20000 Km Da Moto Yamaha Factor 150', 'R$ 237,49'),
(53, 'VirgÃ­lio', 'Ianka', '2020-08-14', '2020-08-15 00:29:01', 'Troca De Ã³leo Do Carro Ford Ka', 'R$ 35,00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
