-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2017 at 07:15 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transaktor`
--

-- --------------------------------------------------------

--
-- Table structure for table `isplata`
--

CREATE TABLE IF NOT EXISTS `isplata` (
  `korisnik` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nazivIsplate` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `iznos` decimal(7,2) DEFAULT NULL,
  `vrijemeIsplate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `isplata`
--

INSERT INTO `isplata` (`korisnik`, `nazivIsplate`, `iznos`, `vrijemeIsplate`) VALUES
('matko', 'karta za vlak', '39.80', '2014-06-01 19:00:00'),
('matko', 'karta za vlak', '39.80', '2014-06-01 19:00:00'),
('matko', 'lizalica', '1.50', '2014-06-02 11:34:23'),
('matko', 'platio sobu za 6. mjesec', '200.00', '2014-06-02 14:00:26'),
('matko', 'sladoled', '6.00', '2014-06-02 18:00:26'),
('matko', 'piva', '10.00', '2014-06-03 15:00:26'),
('matko', 'piva', '10.00', '2014-06-03 15:30:46'),
('matko', 'vecera', '8.85', '2014-06-03 19:30:46'),
('matko', 'rucak', '6.50', '2014-06-04 12:10:46'),
('matko', 'piva', '10.00', '2014-06-04 16:10:46'),
('matko', 'vecera', '9.50', '2014-06-04 19:10:46'),
('matko', 'party na Vrapcu', '20.00', '2014-06-04 19:10:46'),
('matko', 'dorucak', '6.05', '2014-06-05 07:10:46'),
('matko', 'sladoled', '2.00', '2014-06-05 12:10:46'),
('matko', 'poklon za rodjendan', '40.00', '2014-06-06 17:10:46'),
('matko', 'vecera', '10.00', '2014-06-06 19:17:46'),
('matko', 'rucak', '10.00', '2014-06-07 12:17:46'),
('matko', 'piva', '10.00', '2014-06-07 14:17:46'),
('matko', 'pizza', '20.00', '2014-06-08 22:17:46'),
('matko', 'rucak', '6.92', '2014-06-10 12:40:11'),
('matko', 'majburger', '5.43', '2014-06-10 17:35:20'),
('matko', 'sladoled', '2.00', '2014-06-10 17:35:55'),
('matko', 'sendvic kulen', '10.00', '2014-06-11 01:13:18'),
('matko', 'piva', '10.00', '2014-06-11 01:13:24'),
('matko', 'rucak', '6.50', '2014-06-11 16:10:34'),
('matko', '?evapi', '30.00', '2015-05-23 12:33:34'),
('matko', 'kino', '25.00', '2015-05-23 13:19:16'),
('matko', 'pivo', '15.00', '2015-05-23 19:58:09'),
('matko', 'karta za vlak - Bjelovar', '40.00', '2015-06-02 16:50:31'),
('popusimi', 'kurve', '500.00', '2015-06-10 20:49:00'),
('popusimi', 'promjena spola', '20000.00', '2015-06-10 20:54:10'),
('matko', 'karta za vlak - Bjelovar', '40.00', '2015-06-14 12:43:49'),
('matko', 'slovenija gorivo', '40.00', '2015-06-14 12:44:00'),
('matko', 'cestarina', '10.00', '2015-06-14 12:44:12'),
('matko', 'pizza - oro goro', '10.00', '2015-06-14 12:44:30'),
('matko', 'slovenske pive', '50.00', '2015-06-14 12:44:38'),
('matko', 'kebab', '25.00', '2017-01-31 19:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `ime` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lozinka` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `vrijemeRegistracije` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ime`, `lozinka`, `vrijemeRegistracije`) VALUES
('matko', '7cb6e3cfe8d89ce9a0f745e25e9a9cde', '2014-06-10 00:51:45'),
('branko', 'd41c0e80c44173dcf7575745bdddb704', '2015-02-23 14:57:04'),
('raks', '15d9e5d0e76d6e0a71bce2ada26e0d2a', '2015-06-09 20:37:43'),
('raksozi', 'e10adc3949ba59abbe56e057f20f883e', '2015-06-09 20:38:39'),
('popusimi', '2733b097c7b6e4238d41415d968d4ee2', '2015-06-10 20:45:57'),
('ggg', 'ba248c985ace94863880921d8900c53f', '2015-06-19 21:56:18'),
('ddd', '77963b7a931377ad4ab5ad6a9cd718aa', '2015-06-19 22:24:10'),
('ggg', 'ba248c985ace94863880921d8900c53f', '2015-06-20 16:05:10'),
('yyy', 'f0a4058fd33489695d53df156b77c724', '2015-06-20 17:39:28'),
('pizda', 'f27f6f1c7c5cbf4e3e192e0a47b85300', '2015-06-20 19:12:36'),
('maja', '0cc45c9b2fc35c72a5fae9a682d630e3', '2017-01-31 19:43:50'),
('ivan', '2c42e5cf1cdbafea04ed267018ef1511', '2017-01-31 19:46:02'),
('ana', '276b6c4692e78d4799c12ada515bc3e4', '2017-01-31 19:48:03'),
('hrvoje', '46b9ab5aa12ee38d44f3475488395634', '2017-01-31 19:50:57'),
('hrvoje', '46b9ab5aa12ee38d44f3475488395634', '2017-01-31 19:57:44'),
('hrvoje', '46b9ab5aa12ee38d44f3475488395634', '2017-01-31 20:31:54'),
('hrvoje', '52f1b862315103f949249a80ba785224', '2017-02-01 19:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `uplata`
--

CREATE TABLE IF NOT EXISTS `uplata` (
  `korisnik` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nazivUplate` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `iznos` decimal(7,2) DEFAULT NULL,
  `vrijemeUplate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `uplata`
--

INSERT INTO `uplata` (`korisnik`, `nazivUplate`, `iznos`, `vrijemeUplate`) VALUES
('matko', 'starci uplatili', '300.00', '2014-06-01 15:00:00'),
('matko', 'starci uplatili', '300.00', '2014-06-09 15:00:00'),
('matko', 'posudio ', '1.00', '2014-06-11 16:10:22'),
('matko', 'naplacen dug', '10.00', '2015-05-23 19:55:59'),
('matko', 'prabaka dala', '100.00', '2015-06-02 16:49:13'),
('matko', 'tata dao', '100.00', '2015-06-02 16:50:44'),
('matko', 'baka dala', '100.00', '2015-06-07 15:29:13'),
('branko', 'proba1', '50.00', '2015-06-20 14:37:28'),
('branko', 'proba2', '6.00', '2015-06-20 14:37:38'),
('ggg', 'proba', '46.00', '2015-06-20 18:07:40'),
('matko', 'PlaÄ‡a', '50.00', '2017-01-31 19:07:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
