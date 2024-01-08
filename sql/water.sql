-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 04:58 AM
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
  `ss_createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `method` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `quantity`, `price`, `total`, `ssid`, `ss_createdat`, `method`, `cid`) VALUES
(14, 3, '4', 10, 40, 0, '2024-01-08 03:42:50', 'cart', 0),
(15, 2, '2', 5, 10, 0, '2024-01-08 03:42:53', 'cart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `orderid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `order_total` int(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cfullname`, `username`, `password`, `caddress`, `cnumber`, `cemail`) VALUES
(1, 'iton iton', 'iton', '12', 'canaway', '123', 'iton@gmail.com'),
(2, 'gen gen', 'gen', '$2y$10$m.IAOWCudyH/KKwMiNR.0OM', '', '1232', ''),
(3, 'gengenn', 'gen', '$2y$10$pdUsM8JSFHxIERRwnz/InOS', '', '321', ''),
(4, 'jefferson', 'jeff', '$2y$10$Xbw0iru8trRz3UojnbGhkuL', '', '31231', ''),
(5, 'Jefferson M. Paque', 'Je', '$2y$10$ajXqZ2CHbLpfJyGGp81bnu1tCIWzXbnUX0S5JFpIxAsin/11ofV3G', '', '321', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `otime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `total` int(20) NOT NULL,
  `remarks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `psize`, `pprice`, `pdesciption`, `category`, `img`) VALUES
(1, 'Bottle 500ML', '500ML', 2, 'Quench your thirst with convenience in every sip.', 'refill', '../image/b500ml.png'),
(2, 'Bottle 1L', '1L', 5, 'A liter of pure refreshment, providing ample hydration for your daily needs.', 'refill', '../image/b1l.png'),
(3, 'Bottle 10L', '10L', 10, 'Satisfy your hydration needs with a generous 10 liters of pure and refreshing water, perfect for sharing or extended use.', 'refill', '../image/b10l.png'),
(4, 'Round Bottle 18.9L', '18.9L', 20, 'Experience hydration on a grand scale with an impressive 18.9 liters of pure, round-bottled refreshment—a convenient and substantial choice for lasting hydration.', 'refill', '../image/ground3.png');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_session`
--

CREATE TABLE `shopping_session` (
  `ssid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

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
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
