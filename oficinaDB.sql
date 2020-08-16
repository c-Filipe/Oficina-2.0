-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Ago-2020 às 18:35
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
CREATE DATABASE IF NOT EXISTS `oficina` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `vendedor`, `cliente`, `dataDoc`, `hora`, `descricao`, `valor_total`) VALUES
(52, 'Cesar', 'Filipe', '2020-08-14', '2020-08-15 00:26:29', 'RevisÃ£o Completa De 20000 Km Da Moto Yamaha Factor 150', 'R$ 237,49'),
(53, 'Virgilio', 'Ianka', '2020-08-14', '2020-08-15 00:29:01', 'Troca De Ã³leo Do Carro Ford Ka', 'R$ 35,00'),
(59, 'Willian', 'Filipe', '2020-05-18', '2020-08-16 12:27:00', 'Troca de pastilhas de freio', 'R$60,00'),
(58, 'Willian', 'Marilda', '2020-04-23', '2020-08-14 17:17:00', 'Alinhamento e balanceamento ', 'R$120,00'),
(60, 'Cesar', 'Ianka', '2020-06-03', '2020-08-16 19:35:00', 'Bateria Automotiva 50 Amperes \r\n', 'R$130,90');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
