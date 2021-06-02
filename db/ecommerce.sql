-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 07:09 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Alias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `Alias`) VALUES
(1, 'BOTTOM', 'bottom'),
(2, 'TOP', 'top'),
(3, 'SHOES', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Customer` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cart_total` float NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Customer`, `Address`, `Phone`, `Createtime`, `Cart_total`,`Description`) VALUES
(1, '3', '3243423424324', '0918190234', '2021-03-02 15:45:50', 0, ''),
(2, 'a', 'a', '0912123456', '2021-03-02 15:49:55', 0, ''),
(3, 'aaa', 'd', '0918190234', '2021-03-02 15:54:52', 0, ''),
(4, '1', 'a', '0912123456', '2021-03-02 15:59:48', 0, ''),
(5, 'a', 'd', '0912123456', '2021-03-02 20:07:18', 0, ''),
(6, 'aaa', 'a', '0912123456', '2021-03-04 12:13:39', 0, ''),
(7, 'a', 'b', '0912123456', '2021-03-04 12:17:36', 0, ''),
(8, 'a', 'd', '0912123456', '2021-03-04 12:18:28', 111091, ''),
(9, 'a', 'a', '0912123456', '2021-03-05 22:09:36', 12126, ''),
(10, 'moi rewrite', 'd', '0912123456', '2021-03-10 00:56:00', 1000000000, ''),
(11, 'aaa', 'a', '0912123456', '2021-03-10 02:42:47', 425000, ''),
(12, 'aaa', 'a', '0912123456', '2021-03-10 10:26:45', 1000000000, ''),
(13, '1', 'a', '0912123456', '2021-03-10 10:29:36', 1000000000, ''),
(14, 'd', 'd', '0912123456', '2021-03-10 14:32:39', 4000000000, ''),
(15, 'a', 'a', '0912123456', '2021-03-10 14:51:48', 20000, ''),
(16, 'a', 'a', '0912123456', '2021-03-10 21:37:37', 1000000000, ''),
(17, 'a', 'a', '0912123456', '2021-03-10 21:54:39', 10000, ''),
(18, 's', 'x', '0918190234', '2021-03-10 21:55:34', 60, ''),
(19, '1', 'd', '0918190234', '2021-03-10 21:59:17', 10000, ''),
(20, '1', 'a', '0918190234', '2021-03-10 22:00:54', 10000, ''),
(21, '1', 'a', '0912123456', '2021-03-10 22:01:19', 10000, ''),
(22, '1', 'a', '0912123456', '2021-03-10 22:02:31', 100000, ''),
(23, '1', 'd', '0912123456', '2021-03-10 22:07:29', 1000000000, ''),
(24, 'a', 'd', '0918190234', '2021-03-10 23:13:06', 135000, ''),
(25, 'moi nhat', 'moi nhat', '0912123456', '2021-03-10 23:18:09', 425000, ''),
(26, 'a', 'a', '0912123456', '2021-03-10 23:26:21', 560000, ''),
(27, 'a', 'd', '0918190234', '2021-03-17 16:43:20', 112800, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Id`, `OrderId`, `ProductId`, `Quantity`, `Price`) VALUES
(1, 1, 16, 1, 0),
(2, 2, 1, 1, 0),
(3, 3, 16, 1, 0),
(4, 3, 2, 1, 0),
(5, 3, 1, 1, 0),
(6, 4, 1, 1, 1200000),
(7, 5, 6, 1, 100000),
(8, 6, 14, 3, 150000),
(9, 6, 15, 1, 500000),
(10, 7, 16, 1, 111000),
(11, 7, 15, 1, 500000),
(12, 8, 16, 1, 111000),
(13, 8, 13, 1, 101),
(14, 9, 34, 1, 12900),
(15, 10, 20, 1, 1000000000),
(16, 11, 15, 1, 500000),
(17, 12, 20, 1, 1000000000),
(18, 13, 20, 1, 1000000000),
(19, 14, 20, 4, 1000000000),
(20, 15, 21, 2, 10000),
(21, 16, 20, 1, 1000000000),
(22, 16, 6, 1, 100),
(23, 17, 21, 1, 10000),
(24, 18, 29, 2, 30),
(25, 19, 21, 1, 10000),
(26, 20, 21, 1, 10000),
(27, 21, 21, 1, 10000),
(28, 22, 22, 1, 100000),
(29, 23, 20, 1, 1000000000),
(30, 24, 14, 1, 150000),
(31, 25, 15, 1, 500000),
(32, 26, 15, 1, 500000),
(33, 26, 14, 1, 150000),
(34, 27, 34, 1, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(550) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Color` varchar(250) DEFAULT NULL,
  `Material` varchar(250) DEFAULT NULL,
  `Size` varchar(20) NOT NULL,
  `Createdate` date DEFAULT NULL,
  `EditDate` date DEFAULT NULL,
  `isSaleOff` tinyint(1) DEFAULT NULL,
  `Percent_off` int(11) NOT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(260) NOT NULL,
  `Image4` varchar(260) NOT NULL,
  `Alias` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `CategoryId`, `SubCategoryId`, `Description`, `Price`, `Color`, `Material`, `Size`, `Createdate`, `EditDate`, `isSaleOff`, `Percent_off`, `Image1`, `Image2`, `Image3`, `Image4`, `Alias`) VALUES
(1, 'WARM COAT T1', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t1'),
(2, 'WARM COAT T2', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t2'),
(3, 'WARM COAT T3', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t3'),
(4, 'WARM COAT T4', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t4'),
(5, 'COTTON SHIRT C5', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t5'),
(6, 'COTTON SHIRT C6', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t6'),
(7, 'COTTON SHIRT C7', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t7'),
(8, 'COTTON SHIRT C8', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t8'),
(9, 'BERKIN T-SHIRT T9', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t9'),
(10, 'BERKIN T-SHIRT T10', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t10'),
(13, 'BERKIN T-SHIRT T13', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t13'),
(14, 'BERKIN T-SHIRT T14', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t14'),
(15, 'BERKIN T-SHIRT T15', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t15'),
(16, 'JEANS FIT J16', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j16'),
(17, 'JEANS FIT J17', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j17'),
(18, 'JEANS FIT J18', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j18'),
(19, 'JEANS FIT J19', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j19'),
(20, 'JEANS FIT J20', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j20'),
(21, 'JEANS FIT J21', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j21'),
(22, 'ACTIVE SHORT J22', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j22'),
(23, 'ACTIVE SHORT J23', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j23'),
(24, 'ACTIVE SHORT J24', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j24'),
(25, 'ACTIVE SHORT J25', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j25'),
(26, 'SPORT SHOES S26', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shoes.jpeg', 'shoes2.jpeg', 'shoes3.jpeg', 'shoes4.jpeg', 'sport-shoes-s26'),
(27, 'SPORT SHOES S27', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shoes.jpeg', 'shoes2.jpeg', 'shoes3.jpeg', 'shoes4.jpeg', 'sport-shoes-s27'),
(28, 'Áo phông', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'product128-ao-phong.jpg', 'product228-ao-phong.jpg', '', '', 'ao-phong'),
(29, 'Áo phông 03', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'product129-ao-phong-03.jpg', 'product229-ao-phong-03.jpg', '', '', 'ao-phong-03'),
(30, 'Áo phông 09', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'product130-ao-phong-09.jpg', NULL, '', '', ''),
(31, 'Áo phông 1', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'product131-ao-phong-1.jpg', NULL, '', '', ''),
(32, 'Áo phông 03', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 19, 'product132-ao-phong-03.jpg', NULL, '', '', ''),
(33, '12 Áo phông', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'product133-12-ao-phong.jpg', NULL, '', '', ''),
(34, 'Áo phông 12', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 6, 'product134-ao-phong-12.jpg', 'product234-ao-phong-12.jpg', '', '', 'ao-phong-12');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`Id`, `Name`, `CategoryId`, `Alias`) VALUES
(1, 'Shirt', 2, 'shirt'),
(2, 'T-Shirt', 2, 't-shirt'),
(3, 'Coat', 2, 'coat'),
(4, 'Jeans', 1, 'jeans'),
(5, 'Short', 1, 'short'),
(6, 'Shoes', 3, 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `CreateDate` date DEFAULT NULL,
  `Avatar` varchar(550) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Name`, `CreateDate`, `Avatar`, `Email`, `Phone`, `Address`) VALUES
(25, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', '2021-03-18', 'avatar_name25-.jpg', 'dongvuhtvn@gmail.com', '0945802194', 'hanoi'),
(26, 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'user', '2021-03-18', 'avatar_name26-user.png', 'user@user.com', '0945802194', 'hanoi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Product_Categories` (`CategoryId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Id_Category1` (`CategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Categories` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `FK_Id_Category1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
