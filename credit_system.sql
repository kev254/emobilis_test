-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2024 at 02:22 PM
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
-- Database: `credit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `uom_code` varchar(10) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_transaction`
--

INSERT INTO `customer_transaction` (`id`, `customer_id`, `item_name`, `transaction_quantity`, `unit_price`, `uom_code`, `transaction_type`, `total_cost`, `created_by`, `created_at`) VALUES
(40, 33, 'Initial Credit', 1, 6000.00, 'None', '5', 6000.00, 'Admin', '2024-01-03 21:00:00'),
(41, 33, 'Break Pads', 4, 2500.00, 'Pieces', '1', 10000.00, 'Admin', '2024-01-03 21:00:00'),
(42, 33, 'Partial payment for Break Pads', 3, 2500.00, 'None', '3', 7500.00, 'Admin', '2024-01-03 21:00:00'),
(43, 33, 'Partial Goods Returned for Break Pads', 1, 2500.00, 'None', '4', 2500.00, 'Admin', '2024-01-03 21:00:00'),
(44, 33, 'Payment Received ', 1, 8000.00, 'None', '2', 8000.00, 'Admin', '2024-01-03 21:00:00'),
(45, 34, 'Initial Credit', 1, 5000.00, 'None', '5', 5000.00, 'Admin', '2024-01-03 21:00:00'),
(46, 34, 'Break pads', 5, 1000.00, 'pieces', '1', 5000.00, 'Admin', '2024-01-03 21:00:00'),
(47, 34, 'Partial Goods Returned for Break pads', 1, 1000.00, 'None', '4', 1000.00, 'Admin', '2024-01-03 21:00:00'),
(48, 34, 'Partial payment for Break pads', 2, 1000.00, 'None', '3', 2000.00, 'Admin', '2024-01-03 21:00:00'),
(49, 34, 'Payment Received ', 1, 8000.00, 'None', '2', 8000.00, 'Admin', '2024-01-03 21:00:00'),
(50, 35, 'Initial Credit', 1, 800.00, 'None', '5', 800.00, 'Admin', '2024-01-03 21:00:00'),
(51, 35, 'Drake Schroeder', 337, 523.00, 'Test', '1', 176251.00, 'Admin', '1998-05-11 21:00:00'),
(52, 35, 'Partial Goods Returned for Drake Schroeder', 200, 523.00, 'None', '4', 104600.00, 'Admin', '2024-01-03 21:00:00'),
(53, 35, 'Partial payment for Drake Schroeder', 300, 523.00, 'None', '3', 156900.00, 'Admin', '2024-01-03 21:00:00'),
(54, 35, 'Payment Received ', 1, 177051.00, 'None', '2', 177051.00, 'Admin', '2024-01-03 21:00:00'),
(55, 37, 'Initial Credit', 1, 0.00, 'None', '5', 0.00, 'Admin', '2024-01-30 21:00:00'),
(56, 36, 'Initial Credit', 1, 1.00, 'None', '5', 1.00, 'Admin', '2024-01-30 21:00:00'),
(57, 38, 'Initial Credit', 1, 3000.00, 'None', '5', 3000.00, 'Admin', '2024-01-30 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_customer`
--

CREATE TABLE `p_customer` (
  `id` int(11) NOT NULL,
  `store` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `points` int(10) NOT NULL DEFAULT 0,
  `paid` double(20,2) DEFAULT 0.00,
  `due` double(20,2) DEFAULT 0.00,
  `credit_limit` double NOT NULL,
  `wallet` double(22,2) DEFAULT 0.00,
  `address` text DEFAULT NULL,
  `customertype` varchar(20) NOT NULL,
  `customerstatus` varchar(20) NOT NULL DEFAULT '0',
  `img` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `chk` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_customer`
--

INSERT INTO `p_customer` (`id`, `store`, `name`, `email`, `phone`, `points`, `paid`, `due`, `credit_limit`, `wallet`, `address`, `customertype`, `customerstatus`, `img`, `date`, `chk`) VALUES
(34, 1, 'Kevin Okomba', 'okombakevin@gmail.com', '0702456478', 0, 0.00, 2000.00, 100000, 0.00, 'Kaimbu', 'Regular customer', 'Active', NULL, '2024-01-04', 0),
(36, 1, 'Quyn Finley', 'debobusuj@mailinator.com', '12', 0, 0.00, 1.00, 43, 0.00, 'Ut est quo non volup', 'Regular customer', 'Active', NULL, '2024-01-31', 0),
(39, 1, 'Suki Bradshaw', 'kezek@mailinator.com', '56', 0, 0.00, 0.00, 71, 0.00, 'Voluptas in consequa', 'Regular customer', 'Active', NULL, '2024-01-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transtype`
--

CREATE TABLE `transtype` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transtype`
--

INSERT INTO `transtype` (`id`, `name`, `code`, `created_at`) VALUES
(1, 'Sales return', 4, '2024-01-04 13:45:28'),
(2, 'Credit sales', 1, '2024-01-04 13:45:28'),
(3, 'Bulk payment ', 2, '2024-01-04 13:46:37'),
(4, 'Single Payment', 3, '2024-01-04 13:46:37'),
(5, 'Initial credit', 5, '2024-01-04 13:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `useremail`, `username`, `password`, `token`, `created_at`) VALUES
(1, 'admin@admin.com', 'Admin', '123456', '754bcf4b23f6b6f887e30182f22ac0b7bd577256d26e7e744546ac8403ee855a3aa236909dd98571731913e85f8dd1b1e7c9', '2022-01-31 17:53:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `p_customer`
--
ALTER TABLE `p_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transtype`
--
ALTER TABLE `transtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `p_customer`
--
ALTER TABLE `p_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transtype`
--
ALTER TABLE `transtype`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
