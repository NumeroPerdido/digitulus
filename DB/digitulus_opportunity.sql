-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/12/2015 às 12:57
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
-- Estrutura para tabela `digitulus_opportunity`
--

CREATE TABLE IF NOT EXISTS `digitulus_opportunity` (
  `opportunity_id` int(11) NOT NULL AUTO_INCREMENT,
  `opportunity_user_id` int(11) NOT NULL,
  `opportunity_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_description` text COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_client_id` int(11) NOT NULL,
  `opportunity_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_deal_date` date NOT NULL,
  `opportunity_currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `opportunity_total_value` double(11,4) NOT NULL,
  `opportunity_total_inflow_date` date NOT NULL,
  PRIMARY KEY (`opportunity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=123 ;

--
-- Fazendo dump de dados para tabela `digitulus_opportunity`
--

INSERT INTO `digitulus_opportunity` (`opportunity_id`, `opportunity_user_id`, `opportunity_title`, `opportunity_description`, `opportunity_status`, `opportunity_client_id`, `opportunity_notes`, `opportunity_deal_date`, `opportunity_currency_code`, `opportunity_total_value`, `opportunity_total_inflow_date`) VALUES
(37, 6, 'Passagem para Bruxelas', '', 'Vendido', 62, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(38, 6, 'Passagem para Tailândia', '', 'Vendido', 64, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(39, 6, 'Passagem Indonésia', '', 'Aguardar', 67, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(40, 6, 'Intercâmbio para o filho', '', 'Aguardar', 66, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(41, 6, 'Seguro Saúde para a filha', '', 'Vendido', 69, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(42, 6, 'Seguro Saúde', '', 'Vendido', 77, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(43, 6, 'Seguro Saúde', '', 'Aguardar', 84, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(44, 6, 'Intercâmbio para a Austrália', '', 'Vendido', 88, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(45, 6, 'Passagem e Seguro para o filho que quer ir para a Espanha no final do ano', '', 'Aguardar', 97, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(46, 6, 'Passagem de Portugal para o Brasil', '', 'Aguardar', 102, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(47, 6, 'Passagem para o Canadá', '', 'Vendido', 100, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(49, 6, 'Passagem trecho doméstico de Miami para Orlando', '', 'Não Vendido', 104, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(50, 6, 'Passagem Aérea para Madrid', '', 'Vendido', 96, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(51, 6, 'Au Pair na Austrália', '', 'Aguardar', 106, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(52, 6, 'Estudo e trabalho na Austrália', '', 'Aguardar', 108, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(53, 6, 'Seguro Saúde e de Viagens', '', 'Vendido', 112, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(54, 6, 'Seguro Saúde e de Viagens', '', 'Vendido', 138, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(55, 6, 'Seguro Saúde e de Viagens', '', 'Vendido', 115, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(56, 6, 'Passagem Aérea para Amsterdam', '', 'Aguardar', 121, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(57, 6, 'Passagem Aérea para Lisboa', '', 'Aguardar', 125, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(58, 6, 'Passagem Aérea para Brisbane', '', 'Aguardar', 144, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(59, 6, 'Cruzeiro para 2016', '', 'Vendido', 134, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(60, 6, 'Escolas em Montreal', '', 'Aguardar', 136, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(61, 6, 'Informações de visto para o Reino Unido', '', 'Aguardar', 142, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(62, 6, 'College para a esposa Mariana em Boca Raton ou Fort Lauderdale', '', 'Aguardar', 150, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(63, 6, 'Seguro Saúde', '', 'Aguardar', 149, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(64, 6, 'Seguro Saúde para a filha de 15 anos que vai para a Alemanha ficar durante 5 semanas', '', 'Aguardar', 152, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(65, 6, 'Intercâmbio de 1 mês para Inglaterra, África do Sul ou Nova Zelândia', '', 'Aguardar', 45, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(66, 6, 'Seguro Saúde para a filha Gabriela que vai para Grécia ficar 1 mês', '', 'Vendido', 161, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(67, 14, 'High School Canadá', '', 'Venda Futura', 63, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(68, 14, 'Curso de Inglês Geral na Cidade do Cabo de 4 semanas', '', 'Vendido', 65, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(69, 14, 'Turismo em Toronto, Canadá', '', 'Vendido', 68, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(70, 14, 'Curso de Alemão para o filho', '', 'Não Vendido', 72, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(71, 14, 'Passagem e Seguro Saúde para a Filha', '', 'Não Vendido', 78, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(72, 14, 'Curso de Inglês Geral 24 semanas Austrália ou Irlanda', '', 'Aguardar', 76, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(73, 14, 'Curso de Inglês Geral 4 semanas em Malta', '', 'Não Vendido', 79, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(74, 14, 'Curso de Inglês em San Francisco, Estados Unidos', '', 'Aguardar', 81, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(75, 14, 'Curso de Francês 4 semanas na França', '', 'Aguardar', 80, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(76, 14, 'Curso de Inglês na Austrália por 6 meses', '', 'Aguardar', 82, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(77, 14, 'Programa de Estudo e Trabalho', '', 'Venda Futura', 83, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(78, 14, 'Curso de 3 semanas na Academias Latinas', '', 'Vendido', 85, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(79, 14, 'Curso de Inglês na Irlanda de 24 semanas', '', 'Aguardar', 87, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(80, 14, 'Curso de Inglês na Irlanda de 24 semanas', '', 'Aguardar', 89, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(81, 14, 'Curso de 6 semanas em Londres, Inglaterra', '', 'Aguardar', 90, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(82, 14, 'Curso de Inglês 24 semanas Austrália ou Irlanda', '', 'Venda Futura', 91, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(83, 14, 'Curso de Francês 4 semanas na França', '', 'Aguardar', 93, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(84, 14, 'Trabalho e Estudo no Canadá', '', 'Aguardar', 95, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(85, 14, 'Programa de Estudo e Trabalho', '', 'Aguardar', 94, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(86, 14, 'Trabalho e Estudo no Canadá', '', 'Aguardar', 98, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(87, 14, 'Pacote turístico para Holanda e Bélgica para 6 ou 8 pessoas', '', 'Aguardar', 99, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(88, 14, 'Seguro Saúde para a mãe', '', 'Não Vendido', 105, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(89, 14, 'Study and Fun para filha e sobrinha', '', 'Aguardar', 107, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(90, 14, 'Trabalho e Estudo no Canadá', '', 'Aguardar', 109, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(91, 14, 'High School Austrália', '', 'Aguardar', 111, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(92, 14, 'Curso de Inglês Geral e Inglês para Advogados', '', 'Aguardar', 110, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(93, 14, 'Curso de Inglês Geral na Austrália', '', 'Aguardar', 114, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(94, 14, 'Curso de Inglês Geral na África do Sul', '', 'Aguardar', 116, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(95, 14, 'Intercâmbio para o filho', '', 'Aguardar', 117, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(96, 14, 'Seguro Saúde e de Viagens', '', 'Não Vendido', 119, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(97, 14, 'Seguro Saúde e de Viagens', '', 'Não Vendido', 120, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(98, 14, 'Curso de Inglês de 24 semanas', '', 'Aguardar', 122, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(99, 14, 'Seguro Saúde e de Viagens', '', 'Aguardar', 126, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(100, 14, 'Curso + Estágio Remunerado', '', 'Aguardar', 129, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(101, 14, 'Curso de Inglês de 24 semanas em Melbourne', '', 'Aguardar', 132, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(102, 14, 'Curso de Inglês na Irlanda por 24 semanas', '', 'Aguardar', 133, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(103, 14, 'College no Canadá', '', 'Não Vendido', 130, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(104, 14, 'Curso de Inglês na Irlanda ou Austrália', '', 'Não Vendido', 135, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(105, 14, 'Seguro Saúde e de Viagens', '', 'Aguardar', 139, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(106, 14, 'Intercâmbio para a Austrália', '', 'Aguardar', 141, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(107, 14, 'Curso de Inglês em Vancouver, Canadá', '', 'Aguardar', 143, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(108, 14, 'Curso na Austrália por 24 semanas', '', 'Aguardar', 148, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(109, 14, 'Seguro Saúde para 24 dias', '', 'Aguardar', 156, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(110, 14, 'Viagem aos Estados Unidos por 3 meses', '', 'Transferido', 155, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(111, 14, 'Acomodação em Brisbane', '', 'Aguardar', 144, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(112, 14, 'Curso na Austrália ou Irlanda por 6 meses', '', 'Vendido', 158, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(113, 15, 'Carga de Cartão Pré-Pago', '', 'Vendido', 162, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(114, 15, 'Recarga de Cartão VTM', '', 'Vendido', 163, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(115, 15, 'Recarga de Cartão VTM', '', 'Vendido', 164, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(116, 15, 'Recarga de Cartão VTM', '', 'Vendido', 165, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(117, 15, 'Compra de papel moeda e VTM.', '', 'Vendido', 166, '', '2015-12-17', '', 0.0000, '0000-00-00'),
(118, 12, 'Diploma ou Advanced Diploma no Canadá em Programação de Games', '"Quer Advanced Diploma na área de TI em Toronto\r\n- Programação de Games\r\n- Ciência da Computação\r\nPrecisa de inglês antes (5 meses) - disse ter feito um teste e ficou no nível Intermediário 3\r\nFormou no Ensino Médio ano passado"\r\n', 'Aguardar', 168, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(119, 6, 'Topdeck e passagem aérea ', '', 'Vendido', 179, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(120, 15, 'Compra de Papel Moeda em Peso Argentino', 'Compra de 1000 pesos argentinos em espécie.', 'Vendido', 85, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(121, 10, 'Pacote ski nos Estados Unidos', '', 'Vendido', 211, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(122, 13, 'Seguro Saúde para Familia Europa', '', 'Vendido', 166, '', '0000-00-00', '', 0.0000, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
