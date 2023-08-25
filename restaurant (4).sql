-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 07:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `cust_name` varchar(15) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cust_name`, `phone`) VALUES
(1, 'karan', 8765678767);

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `deletelog1` AFTER DELETE ON `customer` FOR EACH ROW INSERT INTO logs VALUES(null,OLD.customer_id,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlog1` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.customer_id,"INSERTED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `manager_id` int(2) NOT NULL,
  `manager_name` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`manager_id`, `manager_name`, `phone`) VALUES
(10, 'kiran', 8861307716),
(11, 'arun', 8765678870),
(12, 'aishwariya', 8765678767),
(14, 'channaraju', 9740440024);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(5) NOT NULL,
  `order_id` bigint(10) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `order_id`, `action`, `cdate`) VALUES
(1, 2, 'inserted', '2022-02-07 06:16:29'),
(2, 1, 'inserted', '2022-03-20 22:28:11'),
(3, 2, 'inserted', '2022-03-20 22:28:27'),
(4, 1, 'inserted', '2022-03-23 14:07:45'),
(5, 2, 'inserted', '2022-03-23 14:09:02'),
(6, 2, 'DELETED', '2022-03-24 18:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(2) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `cost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `cost`) VALUES
(11, 'pork fry', 200),
(12, 'pork dry', 110),
(13, 'pork masala', 150),
(14, 'pork chilly', 150);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(10) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `worker_id` int(2) NOT NULL,
  `item_id` int(2) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `worker_id`, `item_id`, `quantity`) VALUES
(1, 1, 11, 11, 4);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `insertlogs` AFTER INSERT ON `orders` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.order_id,'inserted',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `order_id` bigint(10) NOT NULL,
  `bill` bigint(10) NOT NULL,
  `payment_mode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`order_id`, `bill`, `payment_mode`) VALUES
(1, 1000, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `salary` int(5) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `name`, `address`, `salary`, `phone`) VALUES
(10, 'manjunath', 'nelamangala', 20000, 8765678767),
(11, 'rajesh', 'nelamangala', 15000, 8765678870);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `t` (`customer_id`),
  ADD KEY `t1` (`worker_id`),
  ADD KEY `t2` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `manager_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `t` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t1` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `t4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
