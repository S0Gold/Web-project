-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 11, 2020 at 03:53 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 27, '150gold', 'Andrei ', 'Miron', 'jesusmanevra@gmail.com', '$2y$10$3D5SFhuK29ico4Jr.Iw88OISwMdCaJLnHh4Yn9rdP7bDctZc3jv..'),
(3, 42, '50gold', 'Andrei', 'Obedeanu', 'obn.andr@gmail.com', '$2y$10$K2CZSD0ZYihg4i20XwYth.Hmi.TWXsugiWWnlQjnAGbW5xVnTcozG');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `description` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_seller` int(255) DEFAULT NULL,
  `id_buyer` int(11) NOT NULL,
  `min_price` int(255) NOT NULL,
  `current_price` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `description`, `id_seller`, `id_buyer`, `min_price`, `current_price`) VALUES
(53, 'VW_Golf_IV.jpg', '2020-05-28 01:25:02', '1', 'Golf IV Pacific /Euro4 / 1.9AXR /101cp/ 2004', 38, 39, 1800, 100),
(56, 'res_f9b419292ab57f84c62230096c23fe37_450x450_ojgk.jpg', '2020-05-28 01:38:21', '1', 'Aparat hibrid de barbierit si tuns barba Philips OneBlade QP2520/30, 3 piepteni, 1 lama suplimentara, Acumulatori, Negru/Verde', 41, 39, 123, 4),
(58, 'res_591f0b8a8ce1f67adcf42cfb35f273d7_450x450_b4lm.jpg', '2020-05-28 01:43:48', '1', 'Telefon mobil Samsung M20, 64GB, 4G, Charcoal Black Galaxy M20 este dotat cu un display uimitor de 6.3 inch, ecranul FHD + va ofera o experienta imersiva de vizionare. Baterie de 5000mAh si incarcare rapida\r\n\r\nDurata indelungata de utilizare cu bateria mas', 42, 0, 10000, 1),
(59, 'res_5cf4e8361a4c025705be95ea506aae35_450x450_b66a.jpg', '2020-05-28 01:46:32', '1', 'Masina de spalat rufe Samsung WW80M644OPW/LE, Quick Drive, AddWash, Eco Bubble, Motor Digital Inverter, Smart Control, 8kg, 1400 rpm, Clasa A+++, Alb+', 39, 38, 2222, 6),
(60, 'res_17b303edd3b2e00f4574d9530a930021_450x450_bi3p.jpg', '2020-05-28 01:47:33', '1', 'Aceasta trusa scule si acc.  3/8\", 12 p, (metric&inch), 128 piese cuprinde:\r\n- Antrenor 3/8”;\r\n- Prelungitor 75 mm;\r\n- Prelungitor 150 mm;\r\n- Chei tubulare pentru bujii: 5/8\", 13/16\"\r\n- Capete chei tubulare 3/8” x 12 laturi in inch: 1/4\", 5/16\", 3/8\", 7/16', 39, 38, 1400, 125),
(61, 'res_79c456b86324365c5079e57573580a7b_450x450_dbkh.jpeg', '2020-05-28 01:49:00', '1', 'Televizor LED Smart Samsung, 146 cm, 58RU7102, 4K Ultra HD', 39, 43, 12000, 8),
(62, 'res_0aaf3786f9812676ebed54e918fed25f_450x450_ab1f.jpg', '2020-05-28 01:55:11', '1', 'Masca faciala simpla este dispozitiv modelat, flexibil, care se pozitioneaza peste nas si gura pentru a asigura protectie respiratorie de baza. Impiedica purtatorul sa inhaleze praf, aburi si alte particule in suspensie, inclusiv bacteriile si virusi.', 38, 41, 98, 10),
(63, 'VW_Golf_IV.jpg', '2020-05-28 10:08:40', '1', 'TEST123', 43, 0, 1234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `licitatii`
--

DROP TABLE IF EXISTS `licitatii`;
CREATE TABLE IF NOT EXISTS `licitatii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anunt` int(11) NOT NULL,
  `id_buyer` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `licitatii`
--

INSERT INTO `licitatii` (`id`, `id_anunt`, `id_buyer`, `price`) VALUES
(24, 61, 43, 8),
(23, 59, 38, 6),
(22, 60, 38, 125),
(21, 60, 38, 123),
(20, 61, 38, 6),
(19, 53, 39, 100),
(18, 56, 39, 4),
(17, 53, 42, 88),
(16, 56, 42, 3),
(15, 53, 39, 77),
(14, 53, 39, 6),
(13, 53, 39, 3),
(25, 62, 41, 10);

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

DROP TABLE IF EXISTS `test1`;
CREATE TABLE IF NOT EXISTS `test1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(27, 'Andrei ', 'Miron', 'jesusmanevra@gmail.com', '150gold', '$2y$10$3D5SFhuK29ico4Jr.Iw88OISwMdCaJLnHh4Yn9rdP7bDctZc3jv..'),
(43, 'test', 'test1', 'test@gmail.com', 'test123', '$2y$10$lx58vO8tiz8Igi9HoycaTOUL7kLoqylShlCF0b8RdkM6PLbrgLTTK'),
(41, 'Razvan', 'Necula', 'razvannnn@yahoo.com', 'razvan', '$2y$10$fj8IntBxk9IdRH4NNRftiexHlQDZK5cbPWAx7QlDIa0UbP.CK/F1.'),
(39, 'Florin', 'Mitroi', 'florin.mitroi@yahoo.com', 'florin', '$2y$10$w0/Durr79sAPtLmSDH3.tuQneciTKu41wB4VSoaMHQr4Ug32Clc2C'),
(42, 'Andrei', 'Obedeanu', 'obn.andr@gmail.com', '50gold', '$2y$10$K2CZSD0ZYihg4i20XwYth.Hmi.TWXsugiWWnlQjnAGbW5xVnTcozG'),
(38, 'Marian', 'Popescu', 'marian.popescu@gmail.com', 'marian', '$2y$10$pFbQtwxmAuqpzVUmvKMeq..S35.q3M8XYWfFV3IKfoZqFIrFNhaSm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
