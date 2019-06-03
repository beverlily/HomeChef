-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 02:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homechef`
--

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `id` int(11) NOT NULL,
  `user_id` int(225) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `image` varchar(225) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `address_radius` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`id`, `user_id`, `bio`, `image`, `rating`, `address_radius`) VALUES
(2, 10, 'Chef Bev', '563114.jpg', 0, 10),
(5, 21, 'Chef viccy', '574059.jpg', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `purchase_time` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `chef_id` int(11) DEFAULT NULL,
  `total_price` float NOT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `address`, `purchase_time`, `user_id`, `chef_id`, `total_price`, `comments`) VALUES
(47, '10', NULL, 22, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `available_now` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `chef_id`, `title`, `description`, `image`, `price`, `available_now`) VALUES
(3, 2, 'Pasta', 'Pasta!', '318470.jpg', 10, 1),
(5, 5, 'Salad', 'Salad', '831839.jpg', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(24, 47, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` varchar(350) NOT NULL,
  `IsChef` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `IsChef`) VALUES
(1, 'Jenna', 'Bess', 'jennab@test.com', '$2y$10$KapY46OEq1Sp7PHFVQiSceTvAypAugmaU6pslmhdkovFn3dyyCdf6', '30 Roehampton Ave, #3203', 0),
(2, 'Jenna', 'Greenberg', 'Jennabg16', '$2y$10$7wFTxvWYsDtUnrN/xb5DfOGMRUjd0nRNE1xbsac3pvpUuT/hgFdM2', '30 Roehampton Ave, #3203', 0),
(10, 'Beverly', 'Li', 'beverly.li@live.com', '$2y$10$2.xtti8cxB/0kGjJPQHlk.Uojz7e1uo4okc/BxX2wIvXep6p6kHfu', '116 Shaftsbury Ave', 1),
(21, 'victor', 'li', 'vi@live.com', '$2y$10$KRFS2CuW1A/8PQLYwE4zaeXhJmRFdYhkuKMCQz4x7HgnJ2mULoHPG', '116 Shaftsbury Ave', 1),
(22, 'Beverly', 'li', 'vvi@live.com', '$2y$10$JC3u0kmufro2cg0eLoWVCeOrNyqyXX2WHWEHKG.S65uvkbfRIHxpG', '10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_id` (`chef_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chef_id` (`chef_id`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_orders`
--
ALTER TABLE `products_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chefs`
--
ALTER TABLE `chefs`
  ADD CONSTRAINT `chefs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `chef_id` FOREIGN KEY (`chef_id`) REFERENCES `chefs` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`chef_id`) REFERENCES `chefs` (`id`);

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
