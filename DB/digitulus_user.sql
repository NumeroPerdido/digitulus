-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/12/2015 às 14:40
-- Versão do servidor: 5.5.46-0ubuntu0.14.04.2
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `goarthacom`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `digitulus_user`
--

CREATE TABLE IF NOT EXISTS `digitulus_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `validated` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '3',
  `last_active` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Fazendo dump de dados para tabela `digitulus_user`
--

INSERT INTO `digitulus_user` (`user_id`, `username`, `password`, `email`, `user_key`, `validated`, `group_id`, `last_active`) VALUES
(1, 'Pablo Freitas', '0425bdfb7df6c8d4e95d2801c6593274', 'ti01@grupoartha.com', '0', '1', 1, '0000-00-00'),
(2, 'Henrique Faria', '8660de3c6724b17035f336e71a84964f', 'henrique@grupoartha.com', '0', '1', 1, '0000-00-00'),
(3, 'Brenner Fagundes', '8660de3c6724b17035f336e71a84964f', 'ti04@grupoartha.com', '0', '1', 1, '0000-00-00'),
(4, 'Izabela Costa', '845c20dd517d176ca0c52a546c7bd4f0', 'documentacao@grupoartha.com', '0', '1', 2, '0000-00-00'),
(5, 'Rivane Lanza Halabi', 'ebd5e12433fe282f03d45ee7667029b1', 'rivane@grupoartha.com', '0', '1', 5, '0000-00-00'),
(6, 'Joyce Castro', '34fc8f6f47e9fa0efe810550951d29b0', 'joyce@grupoartha.com', '0', '1', 7, '0000-00-00'),
(7, 'Octavio Davis', '020164202ca23cca053a9dece07bfeeb', 'octavio@grupoartha.com', '0', '1', 7, '0000-00-00'),
(8, 'Tatiana Lanza Halabi', '8660de3c6724b17035f336e71a84964f', 'tatiana@grupoartha.com', '0', '1', 1, '0000-00-00'),
(10, 'Matheus Triginelli', 'b925ecab4a69a7120022fb21da9bd216', 'matheus@arthatravel.com', '', '0', 7, '0000-00-00'),
(11, 'Alexandre Bueno', '558b1e7fbdb40098b15312fe9e73420d', 'alexandre@grupoartha.com', '565def339dce2', '1', 1, '0000-00-00'),
(12, 'Diana Gomes', '756a704d17229027919c7f439f2583bf', 'diana@grupoartha.com', '', '0', 7, '0000-00-00'),
(13, 'Marina Wanner', 'd956ad6ff7646c7869c0041a61e42386', 'registrar@grupoartha.com', '', '0', 4, '0000-00-00'),
(14, 'Marco Aurélio', '5dd2fd37f29a463e65d78ac70ebc212e', 'marco@grupoartha.com', '', '0', 7, '0000-00-00'),
(15, 'Heitor Abiatá', '0b64d32baded044376391eea4ebf974f', 'heitor@grupoartha.com', '', '0', 7, '0000-00-00'),
(17, 'Adilene Mendes', '107e2e835d0b611be3de580e98fde60e', 'adilene@grupoartha.com', '', '0', 3, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
