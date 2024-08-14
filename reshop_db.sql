-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 09:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(35, 15, 'School Bag(Sky BLue)', '799.00', 'featured/22.jpg', 4),
(40, 16, 'Watch(Marble)', '1359.00', 'featured/13.jpg', 1),
(41, 16, 'Shirt(Pink)', '999.00', 'featured/16.jpg', 4),
(42, 16, 'Cap(Grey)', '299.00', 'featured/15.jpg', 4),
(43, 16, 'Cap(Simpsons)', '699.00', 'featured/18.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'T-shirt(Navy)', '999.00', 'shop/1.jpg'),
(2, 'Laptop Bag(Blue)', '1299.00', 'featured/3.jpg'),
(3, 'Beanie(Pink)', '359.00', 'featured/4.jpg'),
(4, 'Beanie(Grey)', '359.00', 'featured/5.jpg'),
(5, 'Hoodie(Maroon)', '1699.00', 'featured/6.jpg'),
(6, 'Canvas Shoes(Blue)', '1099.00', 'featured/7.jpg'),
(7, 'Hoodie(Indigo)', '1699.00', 'featured/8.jpg'),
(8, 'Backpack(Green)', '1799.00', 'featured/9.jpg'),
(9, 'Watch(Kodex)', '959.00', 'featured/10.jpg'),
(10, 'Hat(Teal)', '599.00', 'featured/11.jpg'),
(11, 'Sneakers(White)', '1299.00', 'featured/12.jpg'),
(12, 'Watch(Marble)', '1359.00', 'featured/13.jpg'),
(13, 'Ankle Boots(Brown)', '1800.00', 'featured/14.jpg'),
(14, 'Cap(Grey)', '299.00', 'featured/15.jpg'),
(15, 'Shirt(Pink)', '999.00', 'featured/16.jpg'),
(16, 'Jacket(Adventurer)', '1359.00', 'featured/17.jpg'),
(17, 'Cap(Simpsons)', '699.00', 'featured/18.jpg'),
(18, 'Hoodie(Black)', '999.00', 'featured/19.jpg'),
(19, 'School Bag(Sky BLue)', '799.00', 'featured/22.jpg'),
(20, 'Winter Coat(Matte Black)', '1999.00', 'featured/21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `uname`, `email`, `password`) VALUES
(11, 'tin', 'tin12', 'tin123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'Bishop', 'bishop123', 'Bishop123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 'John', 'john12', 'john123@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'Sam', 'sam123', 'sam123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
