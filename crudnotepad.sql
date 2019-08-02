-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2019 às 03:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crudnotepad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(32) NOT NULL,
  `userEmail` varchar(64) NOT NULL,
  `userPassword` varchar(72) NOT NULL,
  `userPermission` tinyint(1) NOT NULL DEFAULT '0',
  `dateRegister` varchar(12) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`, `userPermission`, `dateRegister`) VALUES
(2, 'Juanzito', 'juan@gmail.com', '$2y$10$oSifv04EVhv3g452uIRt1.0kiUB1WRPp9mgBSj52DvmU.hmLad.pu', 0, '25/07/2019'),
(4, 'aurora', 'aurora@gmail.com', '$2y$10$H04B6KgDzSGtVs25DKBIBOKZHFTm/0la9etMJC0DftRGn0sof.7P6', 1, '30/07/2019'),
(5, 'LBardo', 'asdgwqer@gmail.com', '$2y$10$54uchMh4RhvOwFbjxv31.uQtE/yZEbUFtZbQQshpDFkBajNxpPZ.i', 1, '31/07/2019');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
