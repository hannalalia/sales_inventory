-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 02:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `CategoryName`, `Description`) VALUES
(3, 'Accessories', 'as'),
(4, 'Laptops', 'some description'),
(12, 'Smartphones', 'asdasd'),
(20, 'IDk', '');

-- --------------------------------------------------------

--
-- Table structure for table `po_products`
--

CREATE TABLE `po_products` (
  `po_id` varchar(32) NOT NULL,
  `product_code` varchar(13) NOT NULL,
  `cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` float NOT NULL,
  `received` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_products`
--

INSERT INTO `po_products` (`po_id`, `product_code`, `cost`, `quantity`, `amount`, `received`) VALUES
('1680e6f200dc77a2939939ddef626981', 'asdfghjkla123', 123, 23, 2829, 23),
('4872bbc90f92e430cbc8c23a3caaf7ad', 'asdfghjkl1234', 456, 789, 359784, 0),
('4872bbc90f92e430cbc8c23a3caaf7ad', 'qwez123', 987, 5, 4935, 0),
('758b162d793180244b355ab7e8ac0744', 'asdfghjkl1234', 123, 45, 5535, 45),
('8fcc07805af0957a1864deb535d39f42', '12', 123, 12, 1476, 1),
('8fcc07805af0957a1864deb535d39f42', 'asdfghjkl1234', 120, 10, 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductCode` varchar(13) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Dimensions` varchar(255) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SellingPrice` float NOT NULL,
  `Stocks` int(11) NOT NULL,
  `Re-Order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductCode`, `ItemName`, `Description`, `Dimensions`, `CategoryId`, `SellingPrice`, `Stocks`, `Re-Order`) VALUES
('12', '123', 'asda', '12 x 121 x 12', 3, 12.3, 13, 20),
('asdfghjkl1234', 'Banana', 'qwq', '10 x 10 x 1', 4, 12.25, 56, 10),
('asdfghjkla123', 'Apples', 'qwqw', '12.5 x 3 x 5.7', 12, 12.4, 68, 24),
('qwez123', 'Grape', 'adsad', '2 x 2 x 2', 20, 23, 88, 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `purchase_order_id` varchar(32) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  `delivery_date` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `subtotal` float NOT NULL,
  `additional_cost` float DEFAULT NULL,
  `received_on` varchar(10) DEFAULT NULL,
  `actual_po_total` float DEFAULT NULL,
  `supplier_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`purchase_order_id`, `supplier_id`, `store_id`, `order_date`, `delivery_date`, `status`, `subtotal`, `additional_cost`, `received_on`, `actual_po_total`, `supplier_total`) VALUES
('1680e6f200dc77a2939939ddef626981', 31, 7, '2021-03-18', '2021-03-26', 'Closed', 7869, 100, '2021-03-15', 2929, 2929),
('4872bbc90f92e430cbc8c23a3caaf7ad', 24, 7, '2021-03-16', '2021-03-01', 'Pending', 364719, 2456, '', NULL, NULL),
('758b162d793180244b355ab7e8ac0744', 24, 7, '2021-03-16', '2021-03-15', 'Fully Received', 5535, 1200, '2021-03-15', NULL, NULL),
('8fcc07805af0957a1864deb535d39f42', 24, 9, '2021-03-20', '2021-03-20', 'Closed', 2676, 123, '2021-03-15', 366, 366);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`Id`, `Name`, `Address`, `ContactNumber`) VALUES
(7, 'Store 4', 'qweqw', '+630987654321'),
(8, 'Store 1', '', '+63'),
(9, 'asda', '', '+63');

-- --------------------------------------------------------

--
-- Table structure for table `stores_products`
--

CREATE TABLE `stores_products` (
  `StoreId` int(11) NOT NULL,
  `ProductCode` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Id` int(11) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(13) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Id`, `CompanyName`, `Address`, `ContactNumber`, `Email`) VALUES
(24, 'qwqewe', '                        asdas', '+639497365041', 'asdasd@asdasdasd.com'),
(31, 'helloworld', '            asdas', '+639497365041', 'asdasd@sdfsdf.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `po_products`
--
ALTER TABLE `po_products`
  ADD UNIQUE KEY `po_id` (`po_id`,`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductCode`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`purchase_order_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stores_products`
--
ALTER TABLE `stores_products`
  ADD KEY `StoreId` (`StoreId`),
  ADD KEY `ProductCode` (`ProductCode`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `po_products`
--
ALTER TABLE `po_products`
  ADD CONSTRAINT `po_products_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `purchase_orders` (`purchase_order_id`),
  ADD CONSTRAINT `po_products_ibfk_2` FOREIGN KEY (`product_code`) REFERENCES `products` (`ProductCode`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`);

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`Id`),
  ADD CONSTRAINT `purchase_orders_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`Id`);

--
-- Constraints for table `stores_products`
--
ALTER TABLE `stores_products`
  ADD CONSTRAINT `stores_products_ibfk_1` FOREIGN KEY (`StoreId`) REFERENCES `stores` (`Id`),
  ADD CONSTRAINT `stores_products_ibfk_2` FOREIGN KEY (`ProductCode`) REFERENCES `products` (`ProductCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
