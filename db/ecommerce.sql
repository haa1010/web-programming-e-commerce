-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2021 at 01:08 PM
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
  `username` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Cart_total` float NOT NULL,
  `Description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `username`, `Address`, `Phone`, `Cart_total`, `Description`) VALUES
(1, '3', 'Ha Noi', '0918190234', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Size` varchar(5) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Alias` varchar(200) NOT NULL,
  `Quantity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `CategoryId`, `SubCategoryId`, `Description`, `Price`, `Color`, `Material`, `Size`, `Createdate`, `EditDate`, `isSaleOff`, `Percent_off`, `Image1`, `Image2`, `Image3`, `Image4`, `Alias`, `Quantity`) VALUES
(1, 'WARM COAT T1', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t1', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(2, 'WARM COAT T2', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 550000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t2', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(3, 'WARM COAT T3', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 650000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t3', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(4, 'WARM COAT T4', 2, 3, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 455000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'coat.jpeg', 'coat2.jpeg', 'coat3.jpeg', 'coat4.jpeg', 'warm-coat-t4', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(5, 'COTTON SHIRT C5', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 1450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t5', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(6, 'COTTON SHIRT C6', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 650000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t6', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(7, 'COTTON SHIRT C7', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t7', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(8, 'COTTON SHIRT C8', 2, 1, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 490000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shirt.jpeg', 'shirt2.jpeg', 'shirt3.jpeg', 'shirt4.jpeg', 'cotton-shirt-t8', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(9, 'BERKIN T-SHIRT T9', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 750000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t9', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(10, 'BERKIN T-SHIRT T10', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t10', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(13, 'BERKIN T-SHIRT T13', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 550000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t13', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(14, 'BERKIN T-SHIRT T14', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 700000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t14', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(15, 'BERKIN T-SHIRT T15', 2, 2, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 't-shirt.jpeg', 't-shirt2.jpeg', 't-shirt3.jpeg', 't-shirt4.jpeg', 'berkin-t-shirt-t15', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(16, 'JEANS FIT J16', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j16', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(17, 'JEANS FIT J17', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j17', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(18, 'JEANS FIT J18', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 400000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j18', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(19, 'JEANS FIT J19', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 350000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j19', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(20, 'JEANS FIT J20', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j20', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(21, 'JEANS FIT J21', 1, 4, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 750000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'jeans.jpeg', 'jeans2.jpeg', 'jeans3.jpeg', 'jeans4.jpeg', 'jeans-fit-j21', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(22, 'ACTIVE SHORT J22', 1, 5, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 1450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j22', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(23, 'ACTIVE SHORT J23', 1, 5, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 1150000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j23', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(24, 'ACTIVE SHORT J24', 1, 5, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j24', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(25, 'ACTIVE SHORT J25', 1, 5, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 400000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'short.jpeg', 'short2.jpeg', 'short3.jpeg', 'short4.jpeg', 'active-short-j25', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(26, 'SPORT SHOES S26', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 1450000, 'Black', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 0, 0, 'shoes.jpeg', 'shoes2.jpeg', 'shoes3.jpeg', 'shoes4.jpeg', 'sport-shoes-s26', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]'),
(27, 'SPORT SHOES S27', 3, 6, 'Feels smooth to the touch and provides comfortable coverage.</br>AIRism with quick-drying and Cool-Touch features.</br>AIRism that maintains a cool and comfortable feel.</br>The longer length flatters the waist.</br>The loose, tape-sewn V-neck accentuates the collarbone.</br>The tops length easily matches with leggings.', 2450000, 'Black, White', '78% Polyester, 16% Lyocell, 6% Spandex', 'M, L, XL', '2021-05-25', '2021-05-26', 1, 40, 'shoes.jpeg', 'shoes2.jpeg', 'shoes3.jpeg', 'shoes4.jpeg', 'sport-shoes-s27', '[ { \"color\": \"White\", \"size\": \"L\", \"qty\": \"100\" }, { \"color\": \"Black\", \"size\": \"M\", \"qty\": \"150\" }, { \"color\": \"Black\", \"size\": \"L\", \"qty\": \"150\" } ]');

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
  `Password` varchar(50) DEFAULT NULL
  -- `Avatar` varchar(100) NOT NULL,
  -- `Email` varchar(100) NOT NULL,
  -- `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`) VALUES
(27, 'hangtt', '1');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
