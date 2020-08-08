-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 07, 2020 at 03:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(128) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `item_id` int(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `item_id`) VALUES
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 7),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 10),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

DROP TABLE IF EXISTS `item_info`;
CREATE TABLE IF NOT EXISTS `item_info` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `description` varchar(512) COLLATE utf8_general_mysql500_ci NOT NULL,
  `category` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `price` int(9) NOT NULL,
  `available` int(9) NOT NULL,
  `image` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `company` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`ID`, `title`, `description`, `category`, `price`, `available`, `image`, `company`) VALUES
(1, 'MSI H110M PRO-VH PLUS INTEL H1', 'The PRO Series motherboards fit in any PC. Quality you can trust with top performance and clever business solutions are key aspects of these motherboards. Make your life easier and boost your business with the super stable, reliable and long-lasting PRO Series motherboards.<ul style=\"margin-left: 10px;\"><li>Supports 6th Gen Intel® Core™ / Pentium® / Celeron® processors</li><li>Supports DDR4-2133 Memory</li><li>DDR4 Boost: Give your DDR4 memory a performance boost</li><li>USB 3.1 Gen1 + SATA 6Gb/s</li></ul>', 'Motherboard', 599, 10, 'img/motherboard.jpg', 'GIGABYTE'),
(3, 'NVIDIA RTX 2080', 'Speed: 2.4Ghx<br>\r\nDDR4<br>\r\nStorage: 6GB<br>', 'GPU', 500, 92, 'img/latest-item-1.jpg', 'NVIDIA'),
(4, 'MSI 2080ti', 'Customized MSI 2080ti 8GB RAM RGB', 'GPU', 500, 12, 'img/latest-item-2.jpg', 'NVIDIA'),
(5, 'RAM 16GB', 'Crucial 4 GB (1 x 4 GB) CT51264BD160BJ.8FED', 'RAM', 550, 9, 'img/latest-item-3.jpg', 'Crucial'),
(6, 'RAM 8GB', 'Corsair Dominator Platinum RGB 32GB DDR4-3200MHz', 'RAM', 400, 13, 'img/latest-item-4.jpg', 'Corsair'),
(7, 'RAM 16GB', 'G.Skill TridentZ RGB 16GB DDR4-2400MHz', 'RAM', 500, 11, 'img/latest-item-5.jpg', 'TridentZ'),
(8, 'SSD 500GB', 'FireCuda 510. Some solid read/write speeds.', 'STORAGE', 550, 11, 'img/latest-item-6.jpg', 'FireCuba'),
(9, 'PC Case', 'White, Elequoent and Transpaernt PC Case.', 'Case', 300, 100, 'img/latest-item-7.jpg', 'PC CAse'),
(10, 'ASUS Monitor', 'ASUS ROG Monitor For Gaming', 'Monitor', 200, 10, 'img/latest-item-8.jpg', 'ASUS'),
(11, 'Intel Core i Series', 'Strong processor', 'Processor', 5000, 12, 'img/pp/1.png', 'INTEL'),
(12, 'RGB Keyboard', 'Colourfull keyboard', 'Other', 2000, 9, 'img/pp/2.png', 'ASUS'),
(13, 'Noise Cancellation Headphones', 'Good song quality', 'Other', 1000, 13, 'img/pp/3.png', 'Corsair'),
(14, 'Mouse Pad', 'Smooth and soft', 'Other', 500, 12, 'img/pp/4.png', 'TridentZ'),
(15, 'HDMI Cable', 'Strong Cable', 'Other', 1000, 11, 'img/pp/5.png', 'Samsung'),
(16, 'Pre-Built PC', 'Full PC', 'Other', 50000, 10, 'img/pp/6.gif', 'HP'),
(17, 'Corsair Fans', 'Colourfull fans', 'Other', 1000, 5, 'img/pp/7.png', 'Corsair'),
(18, 'RGB Corsair Fans', 'Colourfull fans', 'Other', 1500, 10, 'img/pp/8.png', 'Corsair'),
(19, 'ARGB Fans', 'Colourfull fans', 'Other', 200, 15, 'img/pp/9.png', 'Corsair'),
(20, 'Snowblind White LEDs', 'Colourfull LEDs', 'Other', 200, 15, 'img/pp/10.png', 'ASUS'),
(21, 'No Sound Mouse Pad', 'Smooth and soft', 'Other', 200, 15, 'img/pp/11.png', 'GIGABYTE'),
(33, 'iBUYPOWER USB Extension', 'Strong and fast', 'Other', 200, 15, 'img/pp/12.png', 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `email` varchar(128) COLLATE utf8_general_mysql500_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_general_mysql500_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_general_mysql500_ci NOT NULL,
  `address` varchar(512) COLLATE utf8_general_mysql500_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `zip` varchar(8) COLLATE utf8_general_mysql500_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`email`, `first_name`, `last_name`, `phone`, `gender`, `password`, `address`, `city`, `zip`, `country`) VALUES
('waleed3072@gmail.com', 'Waleed', 'Butt', '923485157334', 'M', 'Dw1r6eCcFDAH7G', 'sdklf;ksjdhfkdshfkjshdkjfhskdjhf', 'Islamabad', '44000', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `email` varchar(128) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `item_id` int(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`email`, `item_id`) VALUES
('waleed3072@gmail.com', 3),
('waleed3072@gmail.com', 4),
('waleed3072@gmail.com', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
