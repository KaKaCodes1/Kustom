-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 10:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kustomupdate`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE `business_profile` (
  `b_ID` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `b_name` varchar(40) NOT NULL,
  `p_email` varchar(40) NOT NULL,
  `b_email` varchar(40) NOT NULL,
  `b_description` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_profile`
--

INSERT INTO `business_profile` (`b_ID`, `fname`, `lname`, `b_name`, `p_email`, `b_email`, `b_description`, `address`, `password`) VALUES
(0, 'Debbie', 'Kamau', 'Debbie\'s Delight', 'DebbieK@gmail.com', 'ddelight2020@gmail.com', 'shop for pastries                                      ', '', '$2y$10$ZlxQjnU8pkpO2XTrHFMXx.hDOawutGpsghQVkNppbu4QvfkGnPPJS'),
(1, 'Sharon', 'Natasha', 'Hooked by Shana', 'SharonShi@gmail.com', 'hooked@shana.com', 'Store for Crotchet', '1234', '12345678'),
(9, 'king', 'drew', 'KingGoods', 'kd@gmail.com', 'kinggood@gmail.com', 'good stuff                             ', '', '$2y$10$DAN3y2HJUOuUI7RKguAGAu4pcqm9dsrn63HQosaifXALfmCQlywCi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` int(11) UNSIGNED NOT NULL,
  `item_ID` int(11) NOT NULL,
  `item_ID2` int(10) UNSIGNED NOT NULL,
  `c_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE `customer_profile` (
  `c_ID` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `p_address` text NOT NULL,
  `phone` int(10) NOT NULL,
  `password` text NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`c_ID`, `fname`, `lname`, `email`, `p_address`, `phone`, `password`, `join_date`) VALUES
(1, 'king', 'drew', 'kd@gmail.com', '', 0, '$2y$10$Ls8pyFjB76h1XA9N899tWOT4XvVCOLp.v/vdxi/OUfjoYa64McnK6', '2024-04-07 14:55:44'),
(4, 'ken', 'just', 'justken@gmail.com', '', 0, '$2y$10$x7h09r2C9sdbfD2IJVCWF.ZTHTGPlXpAsAnqkc5Il.u3yOKKywqES', '2024-04-07 17:49:56'),
(5, 'Hamisi', 'Juma', 'hamisi@gmail.com', '', 0, '$2y$10$QYO0mOZc/7QBSqI3rcEuv.AaUD84NynTvMckWwT1lodOcC1sEKYNC', '2024-04-07 17:50:46'),
(6, 'Debbie', 'Kamau', 'DebbieK@gmail.com', '', 0, '$2y$10$VFvUai6.0BUyoPVvRU6u0O3AcN8aXaTjTcTGMfqh11HBSvYKRCgGu', '2024-04-07 21:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `debbie`
--

CREATE TABLE `debbie` (
  `item_ID` int(10) UNSIGNED NOT NULL,
  `c_ID` int(11) NOT NULL,
  `b_ID` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `flavour` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debbie`
--

INSERT INTO `debbie` (`item_ID`, `c_ID`, `b_ID`, `item_name`, `flavour`, `quantity`, `price`, `totalPrice`) VALUES
(8, 4, 0, 'Doughnuts', 'Chocolate', 2, 150, 300),
(9, 4, 0, 'Doughnuts', 'Chocolate', 2, 150, 300),
(10, 4, 0, 'Doughnuts', 'Chocolate', 2, 150, 300),
(11, 4, 0, 'Doughnuts', 'Chocolate', 2, 150, 300),
(12, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(13, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(14, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(15, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(16, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(17, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(18, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400),
(19, 4, 0, 'Cupcakes', 'Chocolate', 7, 200, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_ID` int(11) NOT NULL,
  `cart_ID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shana`
--

CREATE TABLE `shana` (
  `item_ID` int(11) NOT NULL,
  `c_ID` int(11) NOT NULL,
  `b_ID` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_size` text NOT NULL,
  `colour` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shana`
--

INSERT INTO `shana` (`item_ID`, `c_ID`, `b_ID`, `item_name`, `item_size`, `colour`, `quantity`, `price`, `totalPrice`) VALUES
(27, 4, 1, 'Ruffle Hat & Top', 'small', 'RED', 5, 1450, 7250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD PRIMARY KEY (`b_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD KEY `c_ID` (`c_ID`),
  ADD KEY `item_ID` (`item_ID`),
  ADD KEY `item_ID2` (`item_ID2`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`c_ID`);

--
-- Indexes for table `debbie`
--
ALTER TABLE `debbie`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `c_ID` (`c_ID`),
  ADD KEY `b_ID` (`b_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_ID`),
  ADD KEY `cart_ID` (`cart_ID`);

--
-- Indexes for table `shana`
--
ALTER TABLE `shana`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `b_ID` (`b_ID`),
  ADD KEY `c_ID` (`c_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_profile`
--
ALTER TABLE `business_profile`
  MODIFY `b_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
  MODIFY `c_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `debbie`
--
ALTER TABLE `debbie`
  MODIFY `item_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shana`
--
ALTER TABLE `shana`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `customer_profile` (`c_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `shana` (`item_ID`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`item_ID2`) REFERENCES `debbie` (`item_ID`);

--
-- Constraints for table `debbie`
--
ALTER TABLE `debbie`
  ADD CONSTRAINT `debbie_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `customer_profile` (`c_ID`),
  ADD CONSTRAINT `debbie_ibfk_2` FOREIGN KEY (`b_ID`) REFERENCES `business_profile` (`b_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `cart` (`cart_ID`);

--
-- Constraints for table `shana`
--
ALTER TABLE `shana`
  ADD CONSTRAINT `shana_ibfk_1` FOREIGN KEY (`b_ID`) REFERENCES `business_profile` (`b_ID`),
  ADD CONSTRAINT `shana_ibfk_2` FOREIGN KEY (`c_ID`) REFERENCES `customer_profile` (`c_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
