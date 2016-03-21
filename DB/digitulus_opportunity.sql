-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/01/2016 às 10:48
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=184 ;

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
(106, 14, 'Intercâmbio para a Austrália', 'Intercâmbio Austrália, cidade de Brisbane. Escola Shafston, 13 semanas de curso, com 2 semanas de férias no meio e 4 semanas de férias no final do curso. ', 'Vendido', 141, '', '2015-12-11', '', 0.0000, '0000-00-00'),
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
(118, 12, 'Diploma ou Advanced Diploma no Canadá em Programação de Games/ Ciência da Computação', 'Quer Advanced Diploma na área de TI em Toronto (ou na província de Ontário)\r\n- Programação de Games\r\n- Ciência da Computação\r\nPrecisa de inglês antes (5 meses) - disse ter feito um teste e ficou no nível Intermediário 3\r\nFormou no Ensino Médio ano passado\r\n', 'Contatar', 168, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(119, 6, 'Topdeck e passagem aérea ', '', 'Vendido', 179, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(120, 15, 'Compra de Papel Moeda em Peso Argentino', 'Compra de 1000 pesos argentinos em espécie.', 'Vendido', 85, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(121, 10, 'Pacote ski nos Estados Unidos', '', 'Vendido', 211, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(122, 13, 'Seguro Saúde para Familia Europa', '', 'Vendido', 166, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(123, 8, 'High School Inglaterra + Curso de Alemão', 'High School no Exterior, preferencialmente Inglaterra e/ou Alemanha', 'Vendido', 270, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(124, 8, 'Curso de Inglês no Canadá', '', 'Vendido', 206, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(125, 8, 'High School Estados Unidos', 'Cliente com 17 anos\r\nA Soraya Aparecida Batilieri que é cunhada da Bruna, irmã da Lara, filha do tio Amir, veio aqui, ela é mãe da Bárbara e mais duas meninas lindas. Ela é novinha, nem parece que tem uma filha de 17 anos. A Bárbara, filha dela estuda no 1 ano do 2 grau, tomou uma bomba, estuda no Sagrada Família, ela faz 17 anos em outubro, a mãe gostaria de um programa que a filha pudesse também trabalhar, aí expliquei sobre o Au Pair e outros programas que combinam estudo e trabalho e também dos custos, pensei em ser uma boa opção ela ir em agosto de 2016 no High School público dos Estados Unidos, ela pode trabalhar e vai fazer a completa imersão e se ela se esforçar pode voltar formada', 'Aguardar', 47, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(126, 8, 'High School Inglaterra', '', 'Vendido', 266, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(127, 8, 'Curso de Inglês em Vancouver, Canadá', '', 'Vendido', 239, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(128, 2, 'Curso de Especialização nos Estados Unidos', 'Cliente indicada pela Tatiana, interessada em um curso na área de finanças ou engenharia.', 'Vendido', 289, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(129, 14, 'Curso de Espanhol, curta duração', 'Curso de Espanhol, 4 semanas em Barcelona', 'Vendido', 291, '', '2015-12-18', '', 0.0000, '0000-00-00'),
(130, 12, 'Curso de Pós Graduação nos Estados Unidos, Canadá ou Austrália', 'Irá formar em Direito na Milton campos fim deste ano (2015).\r\nTem 27 anos.\r\nQuer um curso de pós graduação: tem preferência por Estados Unidos, Canadá e Austrália. Prefere na área de Direito de família ou autoral.\r\nTati indicou Itália, Alemanha e França.\r\n\r\n', 'Venda Futura', 86, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(131, 8, 'Curso de Inglês na Inglaterra', '', 'Vendido', 341, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(132, 8, 'Viagem à Índia', '', 'Transferido', 342, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(133, 8, 'Curso de Inglês na Austrália', '', 'Vendido', 170, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(134, 8, 'Curso de Inglês na Inglaterra', '', 'Vendido', 165, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(135, 8, 'Curso de Inglês na Inglaterra', '', 'Vendido', 171, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(136, 8, 'High School Canadá', 'Cliente interessada em High School Canadá, particularmente na Delta', 'Vendido', 343, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(137, 8, 'College no Canadá', 'Pensou em Greystone em Toronto, em curso de 6 mil reais.\r\nJá trabalho na Disneylândia, fez Comércio Exterior tem inglês muito bom, quer trabalhar e fazer também um curso bom', 'Transferido', 48, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(138, 8, 'Curso de Inglês no Exterior', 'Ele é formado em jornalismo e também em direito, trabalho num escritório de advocacia e tem prazo para falar inglês', 'Transferido', 49, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(139, 8, 'Curso de Inglês em Cork, Irlanda', 'Chegou a emitir a boleto do PagSeguro do curso de Cork mas não pagou, disse que tinha de verificar o calendário na escola', 'Venda Futura', 345, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(140, 8, 'Curso de Inglês em VanWest Kelowna', '', 'Venda Futura', 50, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(141, 8, 'Curso Certificate na UCLA', 'UCLA Certificate\r\nFormou em Arquitetura, 2009, viajou a San Martin no verão\r\n', 'Aguardar', 51, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(142, 8, 'Curso de Inglês nos Estados Unidos', '"Gostaria de trabalhar por seis meses no EUA para aperfeiçoar meu inglês. 1 EMAIL\r\nVocês possuem algum programa? ESTADOS UNIDOS - Vou fazer 30. Meu nível é básico, estou fazendo curso de inglês particular e ele me falou que passo para intermediário antes da viagem. Quero ir em fevereiro. Me falaram que você pode trabalhar na escola para conseguir o social security e depois ir  trabalhar em outro lugar. Isso procede?"\r\n', 'Não Vendido', 52, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(143, 12, '1 mês de Inglês intensivo em Palo Alto ', 'Quer estudar 4 ou 5 semanas em Palo Alto (EUA). Os pais tem uma amiga morando lá e ela ficaria hospedada na casa desta amiga. ', 'Não Vendido', 346, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(144, 8, 'High School', 'Veio olhar High School para o filho Matheus Freitas Barcellos, 15 anos, 10/02/2000, estuda no Santa Doroteia, faz o 1 ano e estudou no Magum até ano passado, quer ir em agosto de 2016. Ele está na dúvida, mas tem perfil para o publico americano – gosta de esportes', 'Contatar', 53, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(145, 12, '4 meses de Inglês no Georgian College', 'Quer estudar 4 meses de Inglês no Georgian College em Barrie, Canadá.  \r\nTem interesse no Certificate de Aviation Management depois do Inglês.', 'Vendido', 194, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(146, 12, 'Quer imigrar pra Austrália ou Canada', 'Teve interesse num programa de estudo e trabalho no Canadá (promocional). É formada há 4 anos em Engenharia Química, mas não atua na área. Tem 28/29 anos. ', 'Não Vendido', 354, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(147, 8, 'High School', '', 'Aguardar', 359, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(148, 6, 'Estudar Escola UBC - Vancouver', '', 'Vendido', 360, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(149, 0, 'Informações sobre intercâmbio para Brisbane', 'Quer ir junto com o Gustavo Mirai, que vai para Shafston em Junho de 2016 até Janeiro de 2017. A mãe (Sandra Vidotti) que entrou em contato. ', 'Contatar', 363, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(150, 12, 'Solicitou informações sobre o Intercâmbio do Gustavo Mirai (Shafston-7 meses)', 'Quer o mesmo intercâmbio do Gustavo Mirai, em Brisbane na Austrália. São 30 semanas (22 de curso mais 8 de férias). Escola: Shafston.', 'Contatar', 363, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(151, 12, 'Certificate ou Diploma', 'Solicitou opções de cursos no Canadá e Estados Unidos. ', 'Vendido', 48, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(152, 12, '4 meses de Inglês no EUA, Canadá ou Austrália', 'Era cliente da Tati e eu continuei o atendimento.', 'Não Vendido', 49, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(153, 12, '1 mês intensivo de Inglês Canadá ou Cape Town (Africa do Sul)', 'Quer viajar em Junho ou Agosto\r\nInglês intensivo \r\nEle não tem inglês, mas vai fazer aula particular até a data de viajar.\r\n', 'Contatar', 365, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(154, 12, 'Diploma no Canadá em biomedicina ou enfermagem', 'Tem 17 anos\r\nNível de Inglês: intermediário\r\nDanilo (pai): 31 3681-2579 / 31 9-9737-9230\r\nE-mail: danilogea@hotmail.com', 'Contatar', 366, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(155, 6, 'Quer fazer intercâmbio de 02 meses em San Francisco - Estados Unidos', 'Irá visitar a filha que mora em San Jose e quer fazer um curso na cidade mais próxima que é San Francisco. Já possui o visto americano de turista', 'Contatar', 385, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(156, 13, 'Pagamento Final Curso e Venda de Seguro', 'Cliente ligou e pediu para quitar o curso e orçar seguro para a família', 'Vendido', 55, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(157, 0, 'Curso de Inglês  Australia ou NZ', 'Chegou com a idéia de ir pra Nova Zelândia. Em reunião comigo e com a Tati ficou definido Australia (Brisbane), na Shafston, por 6 meses em média.', 'Vendido', 200, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(158, 6, 'High School - ALEMANHA', 'High School - ALEMANHA\r\n\r\ntem 15 anos - pretende ir em Agosto de 2016 e estará com 16 anos de idade na época \r\nestuda no Santo Antônio ', 'Contatar', 424, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(159, 12, 'Estudar Inglês na NZ ou Australia 6 meses', 'Gustavo chegou com ideia de ir pra Nova Zelandia, mas em conversa com ele e com o pai (Frazao), Tati sugeriu que Australia (Brisbane) seria mais indicado.', 'Vendido', 200, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(160, 12, 'Gostaria de migrar ou trabalhar no Canada ou Australia', 'Engenheiro Civil recém formado em busca de oportunidade de trabalho no Canada ou Australia.', 'Não Vendido', 425, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(161, 12, 'Curso na área de dança', 'Lara é formada em dança e gostaria de uma especialização na area de Contato e Improvisação em algum país de língua inglesa e que tivesse oportunidade de trabalho e/ou migrar.', 'Aguardar', 109, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(162, 12, 'High School 3 meses ', 'Gostaria de receber informações a respeito dos programas e orçamentos para intercâmbio high school de aproximadamente 3 meses na Califórnia ou Toronto. Tem interesse em viajar em 2017.', 'Contatar', 427, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(163, 12, '4 semanas de inglês no Canada', 'Orçamento para um intercambio no Canadá. \r\nPeríodo: começando o curso dia 26/09/2016 a 22/10/2015\r\n2 pessoas\r\nCurso de inglês 30 horas semanais\r\nAcomodação em residencia estudantil - 4 semanas - (com fácil acesso a metro, pode ser quarto junto e ver a diferença entre quarto com e sem banheiro)\r\nPassagem aerea (se possível com tarifa de estudante).\r\nCidade: Vancouver ou Toronto.\r\nVamos ficar uma semana passeando no Canadá então pode colocar a passagem de volta para o dia 30/10.', 'Contatar', 428, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(164, 12, 'Quer viajar para China 3 semanas em Outubro', 'Quer viajar pela G Adventures com o marido, por no máximo 21 dias. Tem interesse nas principais cidades (Beijing, Xi''an, Shanghai e Hong Kong) e na rota da seda.', 'Aguardar', 429, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(165, 12, '4 ou 5 semanas de Inglês na Europa ', 'Viu um programa de Intercâmbio para adultos maduros em Malta no programa da Ana Maria Braga e se interessou. Quer um curso de até 40 dias, e poder fazer turismo nos finais de semana. Se interessa por Malta. Não quer Londres nem lugar com muitos brasileiros. Preferencia por cursos 40+ porém ela é jovem e animada. ', 'Contatar', 430, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(166, 12, 'Inglês-College em Boston, por 6 meses, começando em Abril', 'Quer um curso de Inglês de 6 meses nos EUA, em local próximo a Nashua ou Windham. Gostaria de poder trabalhar (por isso College). Tem lugar para ficar na casa do primo que mora lá.', 'Contatar', 52, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(167, 12, 'College ou pós grad em Toronto', 'Áreas de interesse: finanças ou arquitetura. É formada em Contabilidade.  Já mora em Toronto e que fazer um College ou pós para  tentar residência.', 'Contatar', 431, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(168, 12, '1 ou 2 meses de Inglês no Canada', 'Quer fazer 1 ou 2 meses de Inglês no Canada com a esposa.  Inglês Geral (para ele) e preaparatório para o IELTS (para ela). Precisa que os cursos sejam em horarios alternados pois irão levar um filho pequeno. ', 'Aguardar', 432, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(169, 12, 'Quer fazer Medicina na UCLA', 'Quer cursar uma faculdade de medicina nos Estados Unidos, mais especificamente em Los Angeles. A universidade que mais gostou foi a UCLA.', 'Contatar', 433, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(170, 12, 'Curso na área de Eng. Civil (UCLA)', 'Quer migrar pro Canadá, porém a esposa não gosta da ideia. Já iniciou um processo migratório pro Canada e ficou de nos enviar o processo para analisarmos. Decidiu então avaliar a opção de tirar um ano sabático nos EUA. Quer aproveitar para fazer um curso. Ele é eng. civil e a esposa é arquiteta. Irão levar 2 filhos.', 'Aguardar', 434, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(171, 12, 'High School Austrália', 'A cliente tem 16 anos e cursa o 2º ano do Ensino Médio em 2016. É estudante do Colégio Santo Agostinho e estudo inglês desde os 5 anos. Tem interesse em fazer intercâmbio para um país cuja língua oficial seja essa, de preferência, Austrália', 'Aguardar', 435, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(172, 12, 'High School Canadá', 'High School 5 meses no Canadá.', 'Vendido', 351, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(173, 12, 'Mini High School Queensland', '3,5 meses de High School na Australia', 'Vendido', 350, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(174, 12, 'curso na area de engenharia civil (certificado, diploma, pós) ou Business', 'Inicio em Setembro 2016.', 'Aguardar', 436, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(175, 13, 'Extensão de Curso e Seguro', 'Extensão de Curso 2 Semanas e Seguro 5 Semanas', 'Vendido', 171, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(176, 13, 'Extensão de Curso e Seguro', 'Extensão de Curso 1 Semana, mais 5 Semanas de Seguro', 'Vendido', 165, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(177, 12, 'Curso de Inglês na Austrália', 'Tati iniciou o atendimento e depois me passou. Tati indicou a Shafston em Brisbane, com 5 meses de curso (7 de visto). Cliente deseja embarcar em Agosto. \r\nNome da Mae: Ana Paula', 'Aguardar', 437, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(178, 12, 'Curso de Inglês', 'Quer muito is pros EU (NY, Califórnia) mas queria poder trabalhar. pediu orçamento de 1 mês sem trabalhar, e considerou Australia 3,5 meses para poder trabalhar.', 'Aguardar', 438, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(179, 6, 'INTERCÂMBIO IRLANDA', 'FOI ENCAMINHADO ORÇAMENTO DA IRLANDA PARA ANO ACADÊMICO\r\n', 'Contatar', 439, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(180, 5, 'Seguro Saúde para ela e marido', '', 'Vendido', 440, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(181, 12, 'Curso de Inglês Geral 1 ano', 'Queria ir estudar inglês no Canadá e trabalhar, por um ano, ele e a namorada. Os 2 possuem inglês básico.', 'Aguardar', 442, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(182, 12, 'Solicitou informações sobre o Intercâmbio do Gustavo Mirai (Shafston-7 meses)', 'É amigo do Gustavo Mirai que está indo pra Shafston em Julho e do Carlos Augusto que também está olhando. Solicitou o mesmo orçamento dos amigos.', 'Aguardar', 443, '', '0000-00-00', '', 0.0000, '0000-00-00'),
(183, 12, 'High School Canada ou Nova Zelândia 6 meses', 'Mãe Maria Flavia: 99661-1824\r\nMaria Luiza é mais urbana. Queria ir pro Canadá mas está considerando Nova Zelândia.', 'Contatar', 444, '', '0000-00-00', '', 0.0000, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
