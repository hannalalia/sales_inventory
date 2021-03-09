-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 11:40 AM
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
('071a83d1615bde7929f6cd2ac0734c9b', 'asdfghjkla123', 12, 23, 276, 23),
('1b5f3ee2d82dbb16b48c19e3ca7a17d2', 'asdfghjkla123', 12, 2, 24, 0),
('3365d7149ac4d4cb7875401dd43df05d', 'asdfghjkla123', 12, 2, 24, 2),
('4a22e0548fd533d8f708ad67dd0da06e', 'asdfghjkl1234', 12, 20, 240, 10),
('4a22e0548fd533d8f708ad67dd0da06e', 'qwez123', 13, 23, 299, 23),
('6219bf73bb3dfe05356eea7ab6101860', 'asdfghjkla123', 12, 2, 24, 0),
('75da9f5d4978cdc519c0755ad9dcc3c4', 'asdfghjkla123', 12, 2, 24, 2),
('869bc901580cba9a31b5a2051ea12fa9', 'asdfghjkl1234', 13, 56, 728, 56),
('8d2f9154b980d8cda1224bc18d8cb8e3', 'asdfghjkla123', 3, 22, 66, 0),
('a5dc0e4890e2a802d3ccb552f1c90054', 'asdfghjkla123', 2, 23, 46, 0),
('a6cef7135060016dd3a9e1ccec2515bb', 'asdfghjkl1234', 12, 45, 540, 45),
('b1c764d4bd2073f2e8c44ea51b9aee23', 'asdfghjkla123', 12, 2, 24, 0),
('e4fc99330735bef11c94a9d121095795', 'asdfghjkla123', 12, 23, 276, 0);

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
  `Stocks` int(11) NOT NULL,
  `Re-Order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductCode`, `ItemName`, `Description`, `Dimensions`, `CategoryId`, `Stocks`, `Re-Order`) VALUES
('asdfghjkl1234', 'Banana', 'qwq', '10 x 10 x 1', 4, 10, 10),
('asdfghjkla123', 'Apples', 'Hi', '0 x 0 x 0', 3, 23, 23),
('qwez123', 'Grape', 'adsad', '2 x 2 x 2', 20, 53, 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `purchase_order_id` varchar(32) NOT NULL,
  `product_code` varchar(13) DEFAULT NULL,
  `quantity` float NOT NULL,
  `purchase_cost` float NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  `delivery_date` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`purchase_order_id`, `product_code`, `quantity`, `purchase_cost`, `supplier_id`, `store_id`, `order_date`, `delivery_date`, `status`, `subtotal`) VALUES
('071a83d1615bde7929f6cd2ac0734c9b', NULL, 0, 0, 24, 4, '', '', 'Fully Received', 276),
('1b5f3ee2d82dbb16b48c19e3ca7a17d2', NULL, 0, 0, 24, 4, '2021-03-19', '2021-03-19', 'Pending', 24),
('3365d7149ac4d4cb7875401dd43df05d', NULL, 0, 0, 24, 4, '2021-03-19', '2021-03-26', 'Fully Received', 24),
('4a22e0548fd533d8f708ad67dd0da06e', NULL, 0, 0, 24, 4, '', '', 'Partially Received', 539),
('6219bf73bb3dfe05356eea7ab6101860', NULL, 0, 0, 24, 4, '2021-03-12', '2021-03-11', 'Pending', 24),
('75da9f5d4978cdc519c0755ad9dcc3c4', NULL, 0, 0, 24, 4, '2021-04-02', '2021-03-12', 'Fully Received', 24),
('869bc901580cba9a31b5a2051ea12fa9', NULL, 0, 0, 24, 4, '', '', 'Fully Received', 968),
('8d2f9154b980d8cda1224bc18d8cb8e3', NULL, 0, 0, 24, 4, '2021-03-16', '2021-03-20', 'Pending', 66),
('a5dc0e4890e2a802d3ccb552f1c90054', NULL, 0, 0, 31, 6, '2021-03-20', '2021-03-18', 'Pending', 46),
('a6cef7135060016dd3a9e1ccec2515bb', NULL, 0, 0, 24, 4, '2021-03-20', '2021-03-20', 'Fully Received', 1000),
('b1c764d4bd2073f2e8c44ea51b9aee23', NULL, 0, 0, 24, 4, '2021-03-20', '', 'Pending', 24),
('e4fc99330735bef11c94a9d121095795', NULL, 0, 0, 24, 4, '2021-03-12', '2021-03-25', 'Pending', 276);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`Id`, `Name`, `Address`) VALUES
(4, 'Store 1', 'asda            '),
(5, 'Store 2', '            '),
(6, 'Store 3', ' ads');

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
  ADD PRIMARY KEY (`purchase_order_id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `stores_products`
--
ALTER TABLE `stores_products`
  ADD CONSTRAINT `stores_products_ibfk_1` FOREIGN KEY (`StoreId`) REFERENCES `stores` (`Id`),
  ADD CONSTRAINT `stores_products_ibfk_2` FOREIGN KEY (`ProductCode`) REFERENCES `products` (`ProductCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
