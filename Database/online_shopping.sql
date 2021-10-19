-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 05:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `Cat_Des` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('M001', 'TEE', 'Tee of maverik.com'),
('M002', ' TROUSERS', 'trousers of marverik.com'),
('M003', 'JACKET', 'jacket of maverik.com'),
('M008', 'HOODIE1', 'HOODIE OF MAVERIK');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `CustName` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CusDate` int(11) NOT NULL,
  `CusMonth` int(11) NOT NULL,
  `CusYear` int(11) NOT NULL,
  `SSN` varchar(10) DEFAULT NULL,
  `ActiveCode` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `CustName`, `gender`, `Address`, `telephone`, `email`, `CusDate`, `CusMonth`, `CusYear`, `SSN`, `ActiveCode`, `state`) VALUES
('admin', '4297f44b13955235245b2497399d7a93', 'huy', 0, 'wdfg', '852582625582', 'dandsna@gmail.com', 13, 2, 1989, '', '', 1),
('hien123', '4297f44b13955235245b2497399d7a93', 'hien ', 0, 'Can Tho', '05333695522', 'hien@gmail.com', 18, 7, 2000, '', '', 0),
('huy123', '4297f44b13955235245b2497399d7a93', 'Thanh Huy', 0, 'Ca Mau', '078884871', 'huy123@gmail.com', 18, 1, 2001, '', '', 0),
('huyzz123', '4297f44b13955235245b2497399d7a93', 'Dang Thanh Huy', 0, 'Can Tho', '078884871', 'thanhhuy123@gmail.com', 9, 3, 2001, '', '', 0),
('test1', '4297f44b13955235245b2497399d7a93', 'thanh huy', 0, 'HCM', '07522368992', 'tesst@gmail.com', 14, 8, 1988, '', '', 0),
('test2', '4297f44b13955235245b2497399d7a93', 'c', 0, 'HCM', '033556622144', 'test2@gmail.com', 17, 7, 1998, '', '', 0),
('test3', '4297f44b13955235245b2497399d7a93', 'Duong qua', 1, 'HCM', '088877742236', 'test3@gmail.com', 18, 7, 1998, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(6) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `DeliveryDate` datetime NOT NULL,
  `Delivery_loca` varchar(200) NOT NULL,
  `Payment` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `DeliveryDate`, `Delivery_loca`, `Payment`, `username`) VALUES
('001', '2021-05-08 10:45:28', '2021-05-08 10:45:28', 'DONG NAI', 100000, 'huy123'),
('002', '2021-05-08 13:32:30', '2021-05-08 13:32:30', 'HCM', 870000, 'test1'),
('003', '2021-05-08 13:32:30', '2021-05-08 13:32:30', 'CAN THO', 900000, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `oldPrice` decimal(12,2) NOT NULL,
  `SmallDesc` varchar(1000) NOT NULL,
  `DetailDesc` text NOT NULL,
  `ProDate` datetime NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  `Pro_image` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `oldPrice`, `SmallDesc`, `DetailDesc`, `ProDate`, `Pro_qty`, `Pro_image`, `Cat_ID`) VALUES
('J001', 'Double Knees Work Pants ( Crea', 8000000, '0.00', 'Double Knees Work Pants ( Cream )', 'Double Knees Work Pants ( Cream )', '2021-05-08 12:52:02', 90, 'img_4981_853ee089ced94ad4b7d187c1a883ee9a_master.jpg', 'M002'),
('J002', 'Corduroy Pant ( Soft Cloud )', 600000, '0.00', 'Corduroy Pant ( Soft Cloud )', 'Corduroy Pant ( Soft Cloud )', '2021-05-08 16:37:14', 600, 'LV2.PNG', 'M002'),
('T001', 'Maverik tee', 580000, '0.00', 'tee maverik', 'tee maverik', '2021-05-08 12:48:12', 100, 'lv1.png', 'M001'),
('T02', 'Balen tee', 10000000, '0.00', 'balenciaga tee', 'balenciaga tee', '2021-05-08 12:49:21', 1000, 'balen.jpg', 'M001'),
('T03', 'FLAME T-SHIRT', 850000, '0.00', 'FLAME T-SHIRT', 'FLAME T-SHIRT', '2021-05-08 12:50:07', 500, 'balen2.jpg', 'M001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`Username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
