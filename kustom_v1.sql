-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 09:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kustom_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE `business_profile` (
  `b_ID` int(10) UNSIGNED NOT NULL,
  `b_name` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `b_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_profile`
--

INSERT INTO `business_profile` (`b_ID`, `b_name`, `address`, `phone`, `b_description`) VALUES
(1, 'Hooked By Shana', '0100-0111', '123456', 'Crochet');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` int(10) UNSIGNED NOT NULL,
  `Cust_ID` int(10) UNSIGNED NOT NULL,
  `p_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `Cust_ID` int(11) UNSIGNED NOT NULL,
  `fname` varchar(20) NOT NULL,
  `llname` varchar(20) NOT NULL,
  `Address` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `payment_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_ID` int(10) UNSIGNED NOT NULL,
  `Cust_ID` int(10) UNSIGNED NOT NULL,
  `t_amount` float UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `odetail_ID` int(10) UNSIGNED NOT NULL,
  `o_ID` int(10) UNSIGNED NOT NULL,
  `p_ID` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_ID` int(11) UNSIGNED NOT NULL,
  `b_ID` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) UNSIGNED NOT NULL,
  `password` char(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `a_type` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `email`, `reg_date`, `a_type`) VALUES
(1, '12345', 'someting@example.com', '2024-03-22', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD KEY `b_ID` (`b_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `p_ID` (`p_ID`),
  ADD KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_ID`),
  ADD KEY `Cust_ID` (`Cust_ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`odetail_ID`),
  ADD KEY `o_ID` (`o_ID`),
  ADD KEY `p_ID` (`p_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_ID`),
  ADD KEY `b_ID` (`b_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `odetail_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD CONSTRAINT `business_profile_ibfk_1` FOREIGN KEY (`b_ID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_ID`) REFERENCES `products` (`p_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Cust_ID`) REFERENCES `customer_profile` (`Cust_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD CONSTRAINT `customer_profile_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer_profile` (`Cust_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`o_ID`) REFERENCES `orders` (`o_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`p_ID`) REFERENCES `products` (`p_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`b_ID`) REFERENCES `business_profile` (`b_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
