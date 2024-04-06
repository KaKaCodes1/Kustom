-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 10:40 AM
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
(1, 'Sharon', 'Natasha', 'Hooked by Shana', 'SharonShi@gmail.com', 'hooked@shana.com', 'Store for Crotchet', '1234', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_ID` int(11) UNSIGNED NOT NULL,
  `item_ID` int(11) NOT NULL,
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
  `email` date NOT NULL,
  `p_address` text NOT NULL,
  `password` text NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debbie`
--

CREATE TABLE `debbie` (
  `item_ID` int(10) UNSIGNED NOT NULL,
  `b_ID` int(10) UNSIGNED NOT NULL,
  `item_name` text NOT NULL,
  `flavour` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `debbie`
--

INSERT INTO `debbie` (`item_ID`, `b_ID`, `item_name`, `flavour`, `quantity`, `price`, `totalPrice`) VALUES
(1, 0, 'Doughnuts', 'Chocolate', 4, 150, 0),
(2, 0, 'Birthday Cakes', 'Strawberry', 1, 1000, 1000),
(3, 0, 'Croissants', 'Strawberry', 3, 250, 750),
(4, 0, 'Croissants', 'Strawberry', 3, 250, 750),
(5, 0, 'Fruit Pies', 'Vanilla', 9, 500, 4500);

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

INSERT INTO `shana` (`item_ID`, `b_ID`, `item_name`, `item_size`, `colour`, `quantity`, `price`, `totalPrice`) VALUES
(4, 1, 'Cardigans', 'large', 'RED', 7, 1000, 7000),
(5, 1, 'Classy Blanket', 'large', 'white', 2, 700, 1400),
(6, 1, 'Mini Bag', 'XL', 'white', 7, 400, 2800),
(7, 1, 'Teddy bear', 'large', 'white', 2, 450, 900);

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
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
  ADD PRIMARY KEY (`c_ID`);

--
-- Indexes for table `debbie`
--
ALTER TABLE `debbie`
  ADD PRIMARY KEY (`item_ID`);

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
  ADD KEY `b_ID` (`b_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_profile`
--
ALTER TABLE `business_profile`
  MODIFY `b_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
  MODIFY `c_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debbie`
--
ALTER TABLE `debbie`
  MODIFY `item_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shana`
--
ALTER TABLE `shana`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `customer_profile` (`c_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `shana` (`item_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `cart` (`cart_ID`);

--
-- Constraints for table `shana`
--
ALTER TABLE `shana`
  ADD CONSTRAINT `shana_ibfk_1` FOREIGN KEY (`b_ID`) REFERENCES `business_profile` (`b_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
