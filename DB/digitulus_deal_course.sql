-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Dez-2015 às 13:43
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goarthacom`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `digitulus_deal_course`
--

CREATE TABLE IF NOT EXISTS `digitulus_deal_course` (
  `deal_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_course_opportunity_id` int(11) NOT NULL,
  `deal_course_user_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `neighbourhood` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lessons_per_week` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lesson_duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `finish_date` date NOT NULL,
  `currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `banking_fee_value` double(11,4) NOT NULL,
  `registration_fee_value` double(11,4) NOT NULL,
  `course_value` double(11,4) NOT NULL,
  `material_fee_value` double(11,4) NOT NULL,
  `others_value` double(11,4) NOT NULL,
  `accommodation_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meals` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accommodation_start_date` date NOT NULL,
  `accommodation_duration` int(11) NOT NULL,
  `accommodation_finish_date` date NOT NULL,
  `accommodation_fee_value` double(11,4) NOT NULL,
  `accommodation_value` double(11,4) NOT NULL,
  `required_insurance_value` double(11,4) NOT NULL,
  `airport_transfer_value` double(11,4) NOT NULL,
  `extra_nights` double(11,4) NOT NULL,
  PRIMARY KEY (`deal_course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
