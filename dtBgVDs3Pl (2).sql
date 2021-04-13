-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 12, 2021 at 05:24 PM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtBgVDs3Pl`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(20) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `VAT_number` int(11) NOT NULL,
  `type_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `country`, `VAT_number`, `type_id`) VALUES
(2, 'All\'Antico Vinaio', 'Italy', 15619848, 1),
(3, 'Fang Fang', 'Germany', 8941654, 2),
(4, 'Mr Robot', 'USA', 8841212, 2),
(5, 'Westworld Inc', 'USA', 5565778, 1),
(6, 'Mangiapepe', 'Italy', 99811874, 1),
(7, 'IKEA', 'Sweden', 77784147, 2),
(8, 'Hacker Co', 'Hackistan', 666666666, 2),
(9, 'Blackumrella', 'Belguim', 8009009, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(320) NOT NULL,
  `company_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `company_id`) VALUES
(4, 'Charlotte', 'Aux fraises lol', 'ostreiculture@imfucked.com', 7),
(6, 'Adriano', 'Lepasplusbo', 'adrien@pasitalien.com', 8),
(8, 'TARIQ', 'SELAWI', 'selawi@gmail.com', 9),
(9, 'Ibrahim', 'Selawi', 'ibrahim@gmail.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(20) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `company_id` int(50) NOT NULL,
  `employee_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_number`, `invoice_date`, `company_id`, `employee_id`) VALUES
(1, 1278155, '2019-09-29', 2, 6),
(2, 1224545, '2020-10-21', 4, 6),
(3, 4758864, '2018-09-11', 7, 1),
(19, 1001009, '2005-03-11', 2, 4),
(20, 1001009, '2004-03-25', 9, 6),
(21, 10022009, '2006-03-25', 2, 4),
(26, 8011108, '2014-03-25', 4, 8),
(28, 82260016, '2013-03-25', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `function` set('manager','admin','user','') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `function`) VALUES
(1, 'Jean-Christian', '1234', 'manager'),
(2, 'admin', '1234', 'admin'),
(3, 'user', '1234', 'user'),
(4, 'tariq', '$2y$10$Sa1GEy9sgqXlPpVcaFW1DORuZlPm9gBcm1ygNcK1pOs3gHmfH5ffu', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_company`
--

CREATE TABLE `type_of_company` (
  `type_id` int(20) NOT NULL,
  `company_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_company`
--

INSERT INTO `type_of_company` (`type_id`, `company_type`) VALUES
(1, 'Client'),
(2, 'Provider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `company_id_2` (`company_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `type_of_company`
--
ALTER TABLE `type_of_company`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_of_company`
--
ALTER TABLE `type_of_company`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_of_company` (`type_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
