-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 09:46 AM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Id`, `BrandName`, `Description`) VALUES
(3, 'idk', 'asda');

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
(24, 'zcx qwqw', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `po_history`
--

CREATE TABLE `po_history` (
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
-- Dumping data for table `po_history`
--

INSERT INTO `po_history` (`purchase_order_id`, `supplier_id`, `store_id`, `order_date`, `delivery_date`, `status`, `subtotal`, `additional_cost`, `received_on`, `actual_po_total`, `supplier_total`) VALUES
('758b162d793180244b355ab7e8ac0744', 24, 7, '2021-03-16', '2021-03-15', 'Closed', 5535, 1200, '2021-03-25', 6735, 6737),
('4872bbc90f92e430cbc8c23a3caaf7ad', 24, 7, '2021-03-16', '2021-03-01', 'Closed', 364719, 2456, '2021-03-25', 2456, 2456),
('a79b73c4deaff7bb27e6015a27f3e886', 24, 7, '2021-03-27', '2021-03-27', 'Closed', 246, 100, '2021-03-27', 223, 366),
('679cfa181e073996ddabd755bd63edbb', 35, 12, '2021-03-20', '2021-03-20', 'Closed', 24, 100, '2021-03-27', 112, 366),
('01537d8d03222f266f5b7007a83b6a60', 36, 16, '2021-03-27', '2021-03-27', 'Closed', 14808, 1200, '2021-03-27', 1200, 2929),
('42fdf606014675afac84c5d325da1359', 37, 16, '2021-03-24', '2021-03-28', 'Closed', 27600, 1000, '2021-03-27', 10600, 10600);

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
  `Re-Order` int(11) NOT NULL,
  `BrandId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductCode`, `ItemName`, `Description`, `Dimensions`, `CategoryId`, `SellingPrice`, `Stocks`, `Re-Order`, `BrandId`) VALUES
('asdfghjkla123', 'Apple', '', NULL, 24, 25000, 18, 100, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `RoleName`) VALUES
(3, 'Cashier'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stock_adjustments`
--

CREATE TABLE `stock_adjustments` (
  `Ref_Id` varchar(32) NOT NULL,
  `ProductCode` varchar(32) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `StockCount` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `EmployeeName` varchar(255) DEFAULT NULL,
  `Status` varchar(8) NOT NULL,
  `StockAfter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_adjustments`
--

INSERT INTO `stock_adjustments` (`Ref_Id`, `ProductCode`, `Reason`, `StockCount`, `Date`, `EmployeeName`, `Status`, `StockAfter`) VALUES
('c8cfcabcd7c8af83c3a83652ce146c71', 'asdfghjkla123', 'Defective', -15, '2021-03-26 01:45:54', NULL, '', 53),
('903c0ffb25fb4590744c326b05824cc6', '12', 'IDk', -7, '2021-03-27 19:14:35', NULL, '', 19),
('d94b711fc1e171923eb01c980f2362b6', 'asdfghjkla123', '', 2, '2021-03-27 19:46:13', NULL, '', 5),
('27e45d84d3f62681101a03bc4e4b3437', 'asdfghjkla123', 'asas', 4, '2021-03-28 00:13:20', NULL, '', 6),
('65f0689b5afca048a646692fcb32433a', 'asdfghjkla123', 'asas', 3, '2021-03-28 00:14:47', NULL, '', 9),
('63fef374540779c5c6940cd578b851df', 'asdfghjkla123', 'asas', 1, '2021-03-28 00:15:51', NULL, '', 10);

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
(16, 'Store 1', '', '+63');

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
(37, 'helloworld', 'asas', '+639497365042', 'asdasd@asdasdasd.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email`, `role_id`) VALUES
('admin', 'admin123', 'John', 'Doe', 'john_doe@gmail.com', 3),
('cashier', 'cashier123', 'Jane', 'Doe', 'jane_doe@yahoo.com', 4),
('cashier', 'cashier123', 'Jane', 'Doe', 'jane_doe@yahoo.com', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Id`);

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
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `products_ibfk_2` (`BrandId`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`purchase_order_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`BrandId`) REFERENCES `brands` (`Id`);

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
