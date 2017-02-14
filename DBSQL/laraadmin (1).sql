-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 01:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `b_time_from` text,
  `b_time_to` text,
  `created_at` varchar(11) DEFAULT NULL,
  `updated_at` varchar(11) DEFAULT NULL,
  `b_from` text,
  `b_to` text,
  `is_round_trip` text,
  `v_type` text,
  `b_price` text,
  `b_status` text,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `c_id`, `b_time_from`, `b_time_to`, `created_at`, `updated_at`, `b_from`, `b_to`, `is_round_trip`, `v_type`, `b_price`, `b_status`, `remarks`) VALUES
(1, 1, '2017-02-12T00:12', '2017-02-13T10:10', '1486879738', '1486980314', 'A/42 Parmeshwar Bunglows\r\nJashodanagar', 'A/42 Parmeshwar Bunglows\r\nJashodanagar', 'No', 'family car', '7', 'Completed', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_name` text,
  `c_mobile` text,
  `c_address` text,
  `created_at` text,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_mobile`, `c_address`, `created_at`, `updated_at`) VALUES
(1, 'kalpit', '1234567890', 'A/42 Parmeshwar Bunglows\r\nJashodanagar', '1486879684', '1486879684');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `d_id` int(11) NOT NULL,
  `d_name` text,
  `d_licence_number` text,
  `d_mobile` text,
  `d_address` text,
  `created_at` text,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `d_name`, `d_licence_number`, `d_mobile`, `d_address`, `created_at`, `updated_at`) VALUES
(1, 'kalpit', 'kzdkfsgbgb448745468', '78945613', 'cjzsidjbvsvssiljddfdufj', '1486965115', '1486965115');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2017_02_06_123444_create_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `t_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `v_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `b_to_b_vendor` text,
  `v_start_meter` text,
  `v_end_meter` text,
  `filled_fuel` int(11) DEFAULT NULL,
  `fuel_at_trip` int(11) DEFAULT NULL,
  `fuel_remaining` int(11) DEFAULT NULL,
  `v_fuel_avg` int(11) DEFAULT NULL,
  `payment_from_customer` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`t_id`, `b_id`, `v_id`, `d_id`, `b_to_b_vendor`, `v_start_meter`, `v_end_meter`, `filled_fuel`, `fuel_at_trip`, `fuel_remaining`, `v_fuel_avg`, `payment_from_customer`) VALUES
(1, 1, 4, 1, NULL, '1254', '125478', 1, 20, 1, NULL, '2700');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chris Sevilleja', 'admin', 'admin@scotch.io', '$2y$10$QACgFtgBRDt9/huO4YRpxO6hlG636uOikR615P2m5vV97MrllTzfm', NULL, '2017-02-06 07:12:50', '2017-02-06 07:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `v_model` text,
  `v_company` text,
  `v_type` text,
  `v_luggage` text,
  `v_max_passenger` text,
  `last_meter` text,
  `v_number` text,
  `created_at` text,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `v_model`, `v_company`, `v_type`, `v_luggage`, `v_max_passenger`, `last_meter`, `v_number`, `created_at`, `updated_at`) VALUES
(4, 'innova', 'Toyota', 'family car', NULL, '8', NULL, 'gj1 abc 1234', NULL, NULL),
(5, 'innova', 'Toyota', 'family car', NULL, '9', NULL, 'gj1 abc 1234', NULL, '1486652518'),
(6, 'innova', 'Toyota', 'family car', NULL, '8', NULL, 'gj1 abc 1234', '1486619868', '1486619868'),
(7, 'innova', 'Toyota', 'family car', NULL, '5', NULL, 'gj1 abc 1234', '1486908506', '1486908506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
