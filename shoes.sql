-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2016 at 09:39 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--
CREATE DATABASE IF NOT EXISTS `shoes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shoes`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `name` varchar(255) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`name`, `id`) VALUES
('Nike', 1),
('Saucony', 2),
('Reebok', 3),
('Clarks', 4),
('Manolo Blahnik', 5),
('Jimmy Choo', 6),
('Christian Louboutin', 7),
('Birkenstock', 8),
('UGG', 9),
('Crocs', 10),
('Keds', 11),
('Adidas', 12),
('Cole Haan', 13),
('Dr. Martens', 14),
('Moon Boot', 15);

-- --------------------------------------------------------

--
-- Table structure for table `brands_stores`
--

CREATE TABLE `brands_stores` (
  `store_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands_stores`
--

INSERT INTO `brands_stores` (`store_id`, `brand_id`, `id`) VALUES
(1, 1, 1),
(1, 4, 2),
(1, 6, 3),
(1, 8, 4),
(1, 9, 5),
(1, 13, 6),
(1, 15, 7),
(2, 4, 8),
(2, 8, 9),
(2, 10, 10),
(2, 12, 11),
(3, 3, 12),
(3, 7, 13),
(3, 11, 14),
(3, 12, 15),
(3, 13, 16),
(3, 14, 17),
(3, 15, 18),
(4, 4, 19),
(4, 10, 20),
(5, 5, 21),
(5, 6, 22),
(5, 7, 23),
(6, 1, 24),
(6, 2, 25),
(6, 3, 26),
(6, 11, 27),
(6, 12, 28),
(7, 2, 29),
(7, 5, 30),
(7, 9, 31),
(7, 11, 32),
(7, 12, 33),
(7, 13, 34),
(7, 14, 35),
(7, 15, 36);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `name` varchar(255) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`name`, `id`) VALUES
('Fred''s Footwear', 1),
('Lila''s Loafers', 2),
('Sally''s Shoes', 3),
('Cathy''s Clogs', 4),
('Helena''s Heels', 5),
('Sam''s Sneakers', 6),
('Walkwell''s', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `brands_stores`
--
ALTER TABLE `brands_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `brands_stores`
--
ALTER TABLE `brands_stores`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
