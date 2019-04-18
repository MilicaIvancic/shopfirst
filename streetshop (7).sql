-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 05:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streetshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `idCard` int(50) NOT NULL,
  `IdUser` int(50) NOT NULL,
  `StatusCard` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`idCard`, `IdUser`, `StatusCard`) VALUES
(11, 2, 1),
(15, 2, 1),
(16, 2, 1),
(17, 2, 1),
(18, 2, 1),
(19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(3) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` int(3) DEFAULT NULL,
  `imageCategory` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `name`, `subcategory`, `imageCategory`) VALUES
(1, 'clothes', NULL, 'clothes.jpg'),
(2, 'shoes', NULL, 'fe626de3-747a-46c9-bd4c-3095befaa7df.jpg'),
(3, 'accessories', NULL, 'Best-Mens-Style-Accessories-0.jpg'),
(4, 'T-shirt', 1, NULL),
(5, 'sweat suit', 1, NULL),
(6, 'sweatshirt', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `itemcard`
--

CREATE TABLE `itemcard` (
  `idItemcard` int(100) NOT NULL,
  `idCard` int(50) NOT NULL,
  `idProduct` int(50) NOT NULL,
  `sum` int(5) NOT NULL DEFAULT '1',
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itemcard`
--

INSERT INTO `itemcard` (`idItemcard`, `idCard`, `idProduct`, `sum`, `size`) VALUES
(2, 11, 16, 5, ''),
(3, 11, 8, 3, '4'),
(6, 11, 18, 4, '3'),
(14, 15, 4, 1, '4'),
(15, 15, 17, 1, '1'),
(16, 15, 18, 1, '4'),
(17, 16, 19, 3, '3'),
(18, 16, 5, 3, '2'),
(20, 18, 7, 1, '3'),
(21, 19, 41, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(5) NOT NULL,
  `href` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menuName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nadcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `href`, `menuName`, `nadcategory`) VALUES
(1, '', 'Home', NULL),
(2, 'shopAll', 'Shop', NULL),
(3, 'contact', 'Contact', NULL),
(4, 'loginForm', 'Login', NULL),
(5, 'logout', 'Logout', NULL),
(6, 'registerForm', 'Register', NULL),
(7, 'adminpanel', 'admin Panel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ouroffer`
--

CREATE TABLE `ouroffer` (
  `idOffer` int(2) NOT NULL,
  `class` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ouroffer`
--

INSERT INTO `ouroffer` (`idOffer`, `class`, `title`, `text`) VALUES
(1, 'icon-truck', 'Free Shipping', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.'),
(2, 'icon-refresh2', 'Free Returns', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.'),
(3, 'icon-help', 'Customer Support', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.');

-- --------------------------------------------------------

--
-- Table structure for table `price_article`
--

CREATE TABLE `price_article` (
  `idPriceArticle` int(50) NOT NULL,
  `datePrice` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idProduct` int(50) NOT NULL,
  `articlePrice` int(6) NOT NULL DEFAULT '50',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price_article`
--

INSERT INTO `price_article` (`idPriceArticle`, `datePrice`, `idProduct`, `articlePrice`, `active`) VALUES
(1, '2019-03-03 00:00:00', 5, 50, 1),
(2, '2019-03-03 00:00:00', 3, 36, 1),
(3, '2019-03-03 00:00:00', 4, 85, 1),
(4, '2019-03-03 00:00:00', 2, 60, 1),
(5, '2019-03-03 00:00:00', 1, 33, 1),
(6, '2019-03-03 00:00:00', 6, 8, 1),
(8, '2019-03-09 00:00:00', 7, 50, 1),
(9, '2019-03-09 00:00:00', 8, 30, 1),
(10, '2019-03-09 00:00:00', 9, 55, 1),
(11, '2019-03-09 00:00:00', 10, 44, 1),
(12, '2019-03-09 00:00:00', 10, 39, 0),
(13, '2019-03-09 00:00:00', 11, 46, 1),
(14, '2019-03-09 00:00:00', 12, 40, 1),
(15, '2019-03-09 00:00:00', 13, 50, 1),
(16, '2019-03-09 00:00:00', 14, 100, 1),
(17, '2019-03-09 00:00:00', 15, 120, 1),
(18, '2019-03-09 00:00:00', 16, 60, 1),
(19, '2019-03-09 00:00:00', 17, 35, 1),
(20, '2019-03-09 00:00:00', 18, 39, 1),
(21, '2019-03-09 00:00:00', 19, 55, 1),
(43, '2019-03-18 13:41:57', 41, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProduct` int(10) NOT NULL,
  `idCategory` int(3) NOT NULL,
  `nameProduct` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProduct`, `idCategory`, `nameProduct`, `image`, `alt`, `description`, `date`) VALUES
(1, 5, 'SRB swet suit', 'srbtrenerka.jpg', 'SRB swet suit', 'swet suit with Serbian coat of arms', '2019-02-08 00:00:00'),
(2, 5, 'soft swet suit', 'soft.jpg', 'soft swet suit', 'soft swet suit for your training', '2019-02-16 00:00:00'),
(3, 2, 'skaters', 'p55.jpg', 'skaters', 'black skaters', '2019-02-17 00:00:00'),
(4, 3, 'skull scarf', 'fantomka-skull-5425435200229-71779471077.jpg', 'skull scarf', 'skull scarf gangsta girl/men', '2019-02-27 00:00:00'),
(5, 4, 'Coll panda', 'TSGM0364 3-420x546.jpg', 'panda', 'T-shirt with panda who likes living ;)', '2019-03-30 00:00:00'),
(6, 4, 'T-shirt', '12223573_12_f.jpg', 'T-shirt', 'Love street ', '2019-02-20 00:00:00'),
(7, 3, 'Black Scarf', 'IMG_20170120_142719.jpg', 'Black Scarf', 'Soft black scarf for all ages ', '2019-03-05 00:00:00'),
(8, 3, 'Black colorful scarf', '8e2jzqNaKHv2.jpg', 'Black colorful scarf', 'Black colorful scarf for skiing, best type of cool material ', '2019-03-06 00:00:00'),
(9, 6, 'Alian swetsuit ', 'alian.jpg', 'Alian swetsuit ', 'Black/White Alian swetsuit, best for gamer rigrls or cool mens', '2019-03-07 00:00:00'),
(10, 6, 'I\'m sory sweatshirt', 'hip-hop-hoodie-rick-and-morty-sweatshirts.jpg', 'I\'m sory sweatshirt', 'I am soty, your opiton means very little to me ;) ', '2019-03-08 00:00:00'),
(11, 6, 'Black sweatshirt', 'Oath-Sweatshirt-Black_1024x.jpg', 'Black sweatshirt', 'Black sweatshirt so help me god ', '2019-03-06 00:00:00'),
(12, 6, 'Crazy sweatshirt', 'crazy.jpg', 'Crazy sweatshirt', 'Squanch Squanch Squanch Squanch Blood Blood Blod ', '2019-03-08 00:00:00'),
(13, 5, 'Silver sweatshirt', 'silver.jpg', 'Silver sweatshirt', 'Plaky, crazy, silver sweatshirt for all of you crazy people.', '2019-03-07 00:00:00'),
(14, 2, 'DND shoes updatw', '2m04eo.jpg', 'DND shoes', 'DND shoes white, DND coll price', '2019-03-07 00:00:00'),
(15, 2, 'Tantique black', '27938xDwu2391036331_582e1b5365539.jpeg', 'Tantique black', 'Tantique black read sintoky taky paky shoese', '2019-03-07 00:00:00'),
(16, 5, 'Army sweatsuit', 'donji_deo_maskirna_srbija.jpg', 'Army sweatsuit', 'SRB army sweatsuit, for aou contry people and sexy girls', '2019-03-07 00:00:00'),
(17, 4, 'PEACE shirt', '90404-ed3abd6e71e24dfcbb0a2165564ca66c.jpeg', 'PEACE shirt', 'PEACE shirt colorul shirt, for pice in all world. by me and be peasful ', '2019-03-07 00:00:00'),
(18, 4, 'Panda lovers', 'panda-tshirt-india1_large.jpg', 'Panda lovers', 'Panda lovers fol all of you who play with him in your free time. ', '2019-03-06 00:00:00'),
(19, 4, 'Black demon girl', 'zombie-panda-summer-dress-day-of-the-dead.jpg', 'Black demon girl', 'Black demon sexy girl for ans and girls who likes demon sexy girls ;)', '2019-03-08 00:00:00'),
(41, 3, 'Proba update', '1552913221dip-22101.jpg', 'Proba update', 'Addgf', '2019-03-18 13:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `idProductSize` int(10) NOT NULL,
  `idProduct` int(10) NOT NULL,
  `idSize` int(10) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`idProductSize`, `idProduct`, `idSize`, `amount`) VALUES
(1, 9, 1, 50),
(2, 9, 2, 50),
(3, 9, 3, 50),
(4, 9, 4, 50),
(5, 16, 4, 50),
(6, 16, 3, 50),
(7, 16, 2, 50),
(8, 16, 1, 50),
(9, 8, 1, 50),
(10, 8, 2, 50),
(11, 8, 4, 50),
(12, 8, 3, 50),
(13, 19, 1, 50),
(14, 19, 2, 50),
(15, 19, 3, 50),
(16, 19, 1, 50),
(17, 7, 1, 50),
(18, 7, 2, 50),
(19, 7, 3, 50),
(20, 7, 4, 50),
(21, 11, 4, 50),
(22, 11, 3, 50),
(23, 11, 2, 50),
(24, 11, 1, 50),
(25, 5, 4, 50),
(26, 5, 3, 50),
(27, 5, 2, 50),
(28, 5, 1, 50),
(29, 12, 4, 50),
(30, 12, 3, 50),
(31, 12, 2, 50),
(32, 12, 1, 50),
(33, 14, 5, 50),
(34, 14, 6, 50),
(35, 14, 7, 50),
(36, 14, 8, 50),
(37, 14, 9, 50),
(38, 14, 10, 50),
(39, 14, 11, 50),
(40, 14, 12, 50),
(41, 10, 4, 50),
(42, 10, 3, 50),
(43, 10, 2, 50),
(44, 10, 1, 50),
(45, 18, 1, 50),
(46, 18, 2, 50),
(47, 18, 3, 50),
(48, 18, 4, 50),
(49, 17, 4, 50),
(50, 17, 3, 50),
(51, 17, 2, 50),
(52, 17, 1, 50),
(53, 13, 4, 50),
(54, 13, 3, 50),
(55, 13, 2, 50),
(56, 13, 1, 50),
(57, 3, 5, 50),
(58, 3, 6, 50),
(59, 3, 7, 50),
(60, 3, 8, 50),
(61, 3, 9, 50),
(62, 3, 10, 50),
(63, 3, 11, 50),
(64, 3, 12, 50),
(65, 4, 4, 50),
(66, 4, 3, 50),
(67, 4, 2, 50),
(68, 4, 1, 50),
(69, 2, 4, 50),
(70, 2, 3, 50),
(71, 2, 2, 50),
(72, 2, 1, 50),
(73, 1, 4, 50),
(74, 1, 3, 50),
(75, 1, 2, 50),
(76, 1, 1, 50),
(77, 6, 4, 50),
(78, 6, 3, 50),
(79, 6, 2, 50),
(80, 6, 1, 50),
(81, 15, 5, 50),
(82, 15, 6, 50),
(83, 15, 7, 50),
(84, 15, 8, 50),
(85, 15, 9, 50),
(86, 15, 10, 50),
(125, 41, 1, 50),
(126, 41, 2, 50),
(127, 41, 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(2) NOT NULL,
  `nameRole` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `nameRole`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `idSize` int(5) NOT NULL,
  `nameSize` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mark` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`idSize`, `nameSize`, `mark`) VALUES
(1, 'Small', NULL),
(2, 'Medium', NULL),
(3, 'Large', NULL),
(4, 'Extra Large', NULL),
(5, '37', 1),
(6, '38', 1),
(7, '39', 1),
(8, '40', 1),
(9, '41', 1),
(10, '42', 1),
(11, '43', 1),
(12, '44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(50) NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(2) NOT NULL DEFAULT '2',
  `active` int(1) NOT NULL DEFAULT '0',
  `activationCode` varchar(66) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'adminInserted',
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobileFone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `userName`, `surname`, `email`, `password`, `idRole`, `active`, `activationCode`, `address`, `mobileFone`) VALUES
(2, 'Milica', 'Ivancic', 'milica.zajeganovic.ivancic@gmail.com', '504938a121efec5f4fbdbcc64ca5736e', 1, 1, '', 'Moja adresa 9/2 update 2', 658745896),
(3, 'Proba', 'Korisnik', 'korisnik@gmail.com', 'sifra1', 2, 0, 'adminInserted', 'Moja adresa 9/2', 685749253),
(10, 'Unet', 'Adminpanel', 'adminpanel@gmail.com', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 2, 0, 'adminInserted', 'Administrator adresa', 65879651),
(21, 'Aktivan', 'User', 'aktivanuser@gmail.com', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 2, 1, 'adminInserted', 'Moja adresa 8/9', 685749253),
(22, 'Mikaaa', 'Mikiccccc', 'mikaaaaamikicc@gmail.com', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 2, 0, 'adminInserted', 'Moja adresa 14', 685749253),
(27, 'Mikafwsg', 'Korisnik', 'korisnfsgafdsgafgik@gmail.com', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 2, 0, 'adminInserted', 'Moja adresa 9/2', 685749253),
(30, 'Aktiv', 'Korisnikdfsdfsdf', 'perasadasd@gmail.com', '20f9b79b7f3032c9e75d90f6c28efcc7', 2, 1, 'adminInserted', 'Moja adresa 9/2', 685749253),
(32, 'Probaffdsfsdf', 'Korisnikfsdf', 'pdfdsfsdfera@gmail.com', '35c9e86cf203d343a781ca677adb1583', 2, 0, 'adminInserted', 'Moja adresa 9/2gggg', 685749253);

-- --------------------------------------------------------

--
-- Table structure for table `useractivities`
--

CREATE TABLE `useractivities` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activiti` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `useractivities`
--

INSERT INTO `useractivities` (`id`, `email`, `name`, `activiti`) VALUES
(1, 'Mikafwsg', 'korisnfsgafdsgafgik@gmail.com', 'this user is registered, now'),
(2, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in'),
(3, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in'),
(4, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in'),
(5, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user create card'),
(6, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user add item to card'),
(7, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user update item to card'),
(8, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user add item to card'),
(9, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user finish his cart'),
(10, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied OUT '),
(11, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in'),
(12, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied OUT '),
(13, 'Probaffdsfsdf', 'pdfdsfsdfera@gmail.com', 'this user is registered, now'),
(14, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in'),
(15, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user create card'),
(16, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user add item to card'),
(17, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user finish his cart'),
(18, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied OUT '),
(19, 'Milica', 'milica.zajeganovic.ivancic@gmail.com', 'this user is logied in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`idCard`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `itemcard`
--
ALTER TABLE `itemcard`
  ADD PRIMARY KEY (`idItemcard`),
  ADD KEY `idCard` (`idCard`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `size` (`size`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `ouroffer`
--
ALTER TABLE `ouroffer`
  ADD PRIMARY KEY (`idOffer`);

--
-- Indexes for table `price_article`
--
ALTER TABLE `price_article`
  ADD PRIMARY KEY (`idPriceArticle`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`idProductSize`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idSize` (`idSize`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idSize`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `e-mail` (`email`),
  ADD KEY `idRole` (`idRole`);

--
-- Indexes for table `useractivities`
--
ALTER TABLE `useractivities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `idCard` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itemcard`
--
ALTER TABLE `itemcard`
  MODIFY `idItemcard` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ouroffer`
--
ALTER TABLE `ouroffer`
  MODIFY `idOffer` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price_article`
--
ALTER TABLE `price_article`
  MODIFY `idPriceArticle` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `productsize`
--
ALTER TABLE `productsize`
  MODIFY `idProductSize` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `idSize` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `useractivities`
--
ALTER TABLE `useractivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`subcategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE;

--
-- Constraints for table `itemcard`
--
ALTER TABLE `itemcard`
  ADD CONSTRAINT `itemcard_ibfk_1` FOREIGN KEY (`idCard`) REFERENCES `card` (`idCard`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemcard_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE;

--
-- Constraints for table `price_article`
--
ALTER TABLE `price_article`
  ADD CONSTRAINT `price_article_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE;

--
-- Constraints for table `productsize`
--
ALTER TABLE `productsize`
  ADD CONSTRAINT `productsize_ibfk_1` FOREIGN KEY (`idSize`) REFERENCES `size` (`idSize`) ON DELETE CASCADE,
  ADD CONSTRAINT `productsize_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
