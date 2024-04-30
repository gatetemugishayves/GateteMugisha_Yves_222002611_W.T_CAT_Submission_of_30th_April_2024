-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 10:45 PM
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
-- Database: `online_restaurant_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`) VALUES
(1, 'John Doe', 'john@example.com', '123-456-7890'),
(2, 'Jane Smith', 'jane@example.com', '987-654-3210'),
(3, 'mnb', 'xfg', '0987654321'),
(4, 'lkj', 'jkl', '0987654321'),
(5, 'yui', 'iuy', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `description`, `price`) VALUES
(1, 'Cheeseburger', 'Juicy beef patty with cheese, lettuce, and tomato', 8.99),
(2, 'Margherita Pizza', 'Classic pizza with tomato sauce, mozzarella, and basil', 10.99),
(3, 'mnb', 'juice,fanta', 500.00),
(4, 'mnb', 'hjsdkfh,xncnb', 300.00),
(5, 'mnbv', 'mnb', 2000.00),
(6, 'mn', 'cfg,mnb', 2000.00),
(7, 'gh', 'jhgfgvhb', 9000.00),
(8, 'cvb', 'mnbg', 2000.00),
(9, NULL, 'saltly bread', 1234.00),
(10, NULL, 'Sugar Cake', 10000.00),
(11, NULL, 'Sugar Cake', 10000.00),
(12, NULL, 'Sugar Cake', 10000.00),
(13, 'good', 'good', 7800.00),
(14, 'Rice', 'salty', 7800.00),
(90, 'banana', 'good', 890.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_amount`, `order_date`) VALUES
(1, 1, 25.97, '2024-02-08 23:22:48'),
(2, 2, 19.98, '2024-02-08 23:22:48'),
(3, 1, 50.40, '2024-02-08 08:00:00'),
(4, NULL, 890.00, '2024-04-07 21:00:00'),
(5, 2, 12300.00, '2024-04-03 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `item_id`, `quantity`) VALUES
(1, 1, 2, 5),
(2, 1, 2, 1),
(3, 2, 2, 2),
(4, 2, 2, 890);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `role`, `email`, `phone`) VALUES
(1, 'Michael Johnson', 'Chef', 'michael@example.com', '555-123-4567'),
(2, 'Emily Brown', 'Waiter', 'emily@example.com', '555-987-6543'),
(3, 'mnb', 'cleaner', 'zxcd', '0987654321'),
(4, 'mnb', 'fgh', 'mki', '0987654321'),
(5, 'cvb', 'mko', 'okm', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'yves', 'mugisha', 'yvesgm', 'yvesgm@gmail.com', '0987654321', '$2y$10$MMji6b4t9jf3aZNfy3HHHO3z9hgX.FmsmQCE3RznYcs.zqj4aPEqa', '2024-04-30 14:23:25', '098', 0),
(2, 'jelly', 'uwase', 'jeu', 'jeu@gmail.com', '0987654320', '$2y$10$hTkSRDUhFskAuOtZ0f2G4OxJMKAwEu9LBdX80DF5Arz3JSK0sSNAS', '2024-04-30 14:28:19', '890', 0),
(3, 'Aliana', 'mugisha', 'muali', 'muali@gmail.com', '0987654329', '$2y$10$zCghwjkOioL4YU1TqfpYY.q1I6ncl6V/BHS3U798qzIhLB2b8ezKu', '2024-04-30 14:29:39', '087', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
