-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 10:19 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `price` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `ssid` int(11) NOT NULL,
  `car_createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `method` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `quantity`, `price`, `total`, `ssid`, `car_createdat`, `method`, `cid`) VALUES
(1, 3, '1', 10, 10, 0, '2024-01-10 20:17:55', 'cart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cfullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `caddress` varchar(25) NOT NULL,
  `cnumber` varchar(12) NOT NULL,
  `cemail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cfullname`, `username`, `password`, `caddress`, `cnumber`, `cemail`) VALUES
(1, 'iton iton', 'iton', '12', 'canaway', '123', 'iton@gmail.com'),
(2, 'gen gen', 'gen', '$2y$10$m.IAOWCudyH/KKwMiNR.0OM', '', '1232', ''),
(3, 'gengenn', 'gen', '$2y$10$pdUsM8JSFHxIERRwnz/InOS', '', '321', ''),
(4, 'jefferson', 'jeff', '$2y$10$Xbw0iru8trRz3UojnbGhkuL', '', '31231', ''),
(5, 'Jefferson M. Paque', 'Je', '$2y$10$ajXqZ2CHbLpfJyGGp81bnu1tCIWzXbnUX0S5JFpIxAsin/11ofV3G', '', '321', ''),
(6, '32', '1', '$2y$10$/S3oBQiOg3qnMHDYZf8lxeuob7aV8Q4F7VsaXU35RRhredBmIPu5i', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `cid`, `status`, `order_date`) VALUES
(12, 1, 'cancelled', '2024-01-10 12:27:25'),
(13, 1, 'cancelled', '2024-01-10 12:27:24'),
(14, 1, 'cancelled', '2024-01-10 12:27:22'),
(15, 1, 'cancelled', '2024-01-10 12:05:50'),
(16, 1, 'cancelled', '2024-01-10 12:27:21'),
(17, 1, 'completed', '2024-01-10 20:55:03'),
(18, 1, 'completed', '2024-01-10 20:55:13'),
(19, 1, 'cancelled', '2024-01-10 20:55:30'),
(20, 1, 'completed', '2024-01-10 20:58:18'),
(21, 1, 'completed', '2024-01-10 21:01:03'),
(22, 1, 'pending', '2024-01-10 12:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `orderid`, `pid`, `quantity`, `price`, `total`) VALUES
(25, 9, 2, 1, 5, 5),
(26, 9, 3, 1, 10, 10),
(27, 10, 2, 1, 5, 5),
(28, 10, 3, 1, 10, 10),
(29, 11, 2, 1, 5, 5),
(30, 11, 3, 1, 10, 10),
(31, 12, 2, 3, 5, 15),
(32, 13, 2, 1, 5, 5),
(33, 13, 3, 1, 10, 10),
(34, 14, 2, 5, 5, 25),
(35, 15, 4, 5, 20, 100),
(36, 16, 2, 3, 5, 15),
(37, 16, 3, 1, 10, 10),
(38, 16, 4, 1, 20, 20),
(39, 21, 2, 1, 5, 5),
(40, 21, 1, 1, 2, 2),
(41, 22, 2, 1, 5, 5),
(42, 22, 3, 1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_amount` int(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_method` varchar(50) NOT NULL,
  `payment_referenceno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_amount`, `payment_status`, `payment_date`, `payment_method`, `payment_referenceno`) VALUES
(1, 21, 0, 'completed', '2024-01-10 21:01:03', '', ''),
(2, 22, 15, 'pending', '2024-01-10 12:50:01', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `psize` varchar(11) NOT NULL,
  `pprice` int(20) NOT NULL,
  `pdesciption` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `psize`, `pprice`, `pdesciption`, `category`, `img`) VALUES
(1, 'Bottle 500ML', '500ML', 2, 'Quench your thirst with convenience in every sip.', 'refill', '../image/b500ml.png'),
(2, 'Bottle 1L', '1L', 5, 'A liter of pure refreshment, providing ample hydration for your daily needs.', 'refill', '../image/b1l.png'),
(3, 'Bottle 10L', '10L', 10, 'Satisfy your hydration needs with a generous 10 liters of pure and refreshing water.', 'refill', '../image/b10l.png'),
(4, 'Round Bottle 18.9L', '18.9L', 20, 'Experience hydration on a grand scale with an impressive 18.9 liters of pure.', 'refill', '../image/ground3.png');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_session`
--

CREATE TABLE `shopping_session` (
  `ssid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
