-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 07:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `role`) VALUES
('Tosin', 'Amoko', 'amokotosin', 'tosin@agl.net', 'tosin1234', 'student'),
('christianah', 'ogunbayo', 'christtybabe', 'christy@test.com', 'oluwachristty', 'student'),
('Dave', 'Awotimayin', 'davskiddo', 'davetimayin@yahoo.com', 'oluwadave1234', 'teacher'),
('Oludare', 'Aduramimo', 'dreywandowski', 'tech1.los@aglconsulting.net', 'damilare', 'student'),
('Emmanuel', 'Aduramimo', 'emmy_jasper', 'emmy@gmail.com', 'emma1234', 'student'),
('oluwaseun', 'shukurah', 'mhiz_pretty', 'shukslawal@test.com', 'oluwaseun1234', 'teacher'),
('Precious', 'Shekemi', 'precioussheke', 'sheemi@gmail.com', 'kkkkkkkkkk', 'student'),
('Theopillus', 'Sawyerr', 'sawyerr_ehis', 'theo1@yahoo.com', 'theopilus1234', 'student'),
('Wale', 'Shittu', 'waleshittu', 'shittu4u@test.com', 'olawale1234', 'teacher');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
