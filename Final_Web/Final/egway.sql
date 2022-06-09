-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 11:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egway`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus_bookings`
--

CREATE TABLE `bus_bookings` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus_company`
--

CREATE TABLE `bus_company` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus_manger`
--

CREATE TABLE `bus_manger` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus_trips`
--

CREATE TABLE `bus_trips` (
  `id` int(11) NOT NULL,
  `from_location` varchar(64) NOT NULL,
  `to_location` varchar(64) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `complaint` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`) VALUES
(0, 'image-5-789017940.png', 'testr'),
(0, 'computer-1185569_1920.jpg', 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`, `date_created`) VALUES
(41, 'x', 5, '2020-07-23 09:32:53'),
(42, '2c1a5b38f732137c372e16da9abbb2c9dfdeb1d3', 5, '2020-07-23 10:00:11'),
(45, '96ee5e2b2ea66e030ead52f8d049c1401ec4885b', 5, '2020-07-23 10:58:46'),
(47, 'a727f801915bd76049ff76315fd0434450fbb2fe', 6, '2022-06-09 22:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens_manger`
--

CREATE TABLE `login_tokens_manger` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tokens_manger`
--

INSERT INTO `login_tokens_manger` (`id`, `token`, `user_id`, `date_created`) VALUES
(1, '85ef13c2693101539f4d584e29bed9a061c7f32d7c6552af224efaa706577748', 3, '2020-07-23 09:56:28'),
(2, '8f4e535571197d3a37f6faccaaf9d778e2604f0b', 3, '2020-07-23 09:57:05'),
(3, 'ee52596cf754cb8621bafed365c16f38057568f9', 3, '2020-07-23 09:59:54'),
(4, '531fb7867209d753d5013fb719c1f27578dce135', 3, '2020-07-23 10:02:47'),
(5, '6e8562ed3df89767cb1a402f6842e839bd4fd3ed', 3, '2020-07-23 10:03:09'),
(6, 'b664166f8b1b6bc0a2745ce0367b1e2ba57c170d', 3, '2020-07-23 10:04:20'),
(7, '1b383606867ca6ac4afbc4cc1d0624944fac31f7', 3, '2020-07-23 10:04:44'),
(8, '90a95e54ac281feed06bf82f77897c31e2d50d4b', 3, '2020-07-23 10:04:51'),
(9, 'a75a4860ca7a887971b6a7fc08da3dbf23f48599', 3, '2020-07-23 10:05:23'),
(10, '3e1da465eee3556c4a88fdf0fd213861a56eae88', 3, '2020-07-23 10:05:31'),
(11, '4632992dac136150813b3c60fb4f28f8a657fba5', 3, '2020-07-23 10:05:45'),
(12, '07f69b58bd95e6e8c2644ba995dfa9f2652c2449', 3, '2020-07-23 10:06:38'),
(13, '638e90f33f1d4e725a66785598f8ca00df3dc5f8', 3, '2020-07-23 10:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_location` int(11) NOT NULL,
  `unit_address` text NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `beds_bed` int(11) NOT NULL,
  `livingrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `area` varchar(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_location`, `unit_address`, `bedrooms`, `beds_bed`, `livingrooms`, `bathrooms`, `area`, `price`, `company_id`) VALUES
(18, 'Great airfares for your flight from Cairo to Frankfurt', 19, 'Frankfurt', 5, 4, 2, 2, '120', '900', 6),
(19, 'Great airfares for your flight from Dubai to Cairo', 20, 'Dubai ', 6, 8, 4, 2, '214', '1900', 6);

-- --------------------------------------------------------

--
-- Table structure for table `units_bookings`
--

CREATE TABLE `units_bookings` (
  `id` int(11) NOT NULL,
  `arrival_time` date NOT NULL,
  `leave_time` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units_company`
--

CREATE TABLE `units_company` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_company`
--

INSERT INTO `units_company` (`id`, `name`) VALUES
(1, 'Gazef'),
(2, 'GAD Travel'),
(3, 'Agazat Club'),
(4, 'Travista'),
(5, 'TravelYalla'),
(6, 'Travco Holidays'),
(7, 'Maxim Tours'),
(8, 'Excel Travel'),
(9, 'Sky Egypt Tours'),
(10, 'Travel Choice'),
(11, 'Sky Egypt Tours'),
(12, 'شخصي'),
(13, 'شركة اخري');

-- --------------------------------------------------------

--
-- Table structure for table `units_image`
--

CREATE TABLE `units_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_image`
--

INSERT INTO `units_image` (`id`, `image`, `unit_id`) VALUES
(25, 'uploads/Great-airfares-for-your-flight-from-Cairo-to-Frankfurt-1.png', 18),
(26, 'uploads/Great-airfares-for-your-flight-from-Cairo-to-Frankfurt-2.png', 18),
(27, 'uploads/Great-airfares-for-your-flight-from-Cairo-to-Frankfurt-3.png', 18),
(28, 'uploads/Great-airfares-for-your-flight-from-Dubai-to-Cairo-1.png', 19),
(29, 'uploads/Great-airfares-for-your-flight-from-Dubai-to-Cairo-2.png', 19),
(30, 'uploads/Great-airfares-for-your-flight-from-Dubai-to-Cairo-3.png', 19);

-- --------------------------------------------------------

--
-- Table structure for table `units_locations`
--

CREATE TABLE `units_locations` (
  `id` int(11) NOT NULL,
  `location` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_locations`
--

INSERT INTO `units_locations` (`id`, `location`) VALUES
(19, 'Frankfurt'),
(20, 'Dubai');

-- --------------------------------------------------------

--
-- Table structure for table `units_manger`
--

CREATE TABLE `units_manger` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units_manger`
--

INSERT INTO `units_manger` (`id`, `name`, `email`, `phone`, `password`, `company_id`) VALUES
(2, 'xTrimy', 'mohamed.ashraf881999@gmail.com', '01156052920', '$2y$10$OEuMXuU0c1V7qkyl4hO.EOklslVnRzsFKGlGP4juuj.OXy9HHanUi', 13),
(3, 'Mohamed Ashraf', 'nawafyoutub@gmail.com', '01156052920', '$2y$10$pN5YoLdrldd6C47tM2z4BePYjd2lJxAgUMDB99.WxYvX5ZHWB/zSK', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(4, 'xTrimy', 'Mohamed1812470@miuegypt.edu.eg', '01156052920', '$2y$10$Z1dbHZxD8t0jedRLJMMrAuPfQ4S4WJ1FAtbOtv34dV60nrd6eyi8W'),
(5, 'Mohamed Ashraf', 'mohamed.ashraf881999@2gmail.com', '011560529202', '$2y$10$hm94XOFLTTd3a2AKBrKzvuk/xmYtswPV/vGnKWnm31AP4lvcbWy5K'),
(6, 'Abdelrahman Sayed', 'abdelrahman3aysh@gmail.com', '01158999135', '$2y$10$Gn2zJR6yqt9I52li8ftXFu8GH3nqCbSFpsRvOxbmS8bW71hBdb7tK');

-- --------------------------------------------------------

--
-- Table structure for table `users_image`
--

CREATE TABLE `users_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `bus_bookings`
--
ALTER TABLE `bus_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `bus_company`
--
ALTER TABLE `bus_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_manger`
--
ALTER TABLE `bus_manger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `bus_trips`
--
ALTER TABLE `bus_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login_tokens_manger`
--
ALTER TABLE `login_tokens_manger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_country` (`unit_location`),
  ADD KEY `units_ibfk_1` (`company_id`);

--
-- Indexes for table `units_bookings`
--
ALTER TABLE `units_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `units_company`
--
ALTER TABLE `units_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units_image`
--
ALTER TABLE `units_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `units_locations`
--
ALTER TABLE `units_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units_manger`
--
ALTER TABLE `units_manger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_image`
--
ALTER TABLE `users_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_bookings`
--
ALTER TABLE `bus_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_company`
--
ALTER TABLE `bus_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_manger`
--
ALTER TABLE `bus_manger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_trips`
--
ALTER TABLE `bus_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `login_tokens_manger`
--
ALTER TABLE `login_tokens_manger`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `units_bookings`
--
ALTER TABLE `units_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units_company`
--
ALTER TABLE `units_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `units_image`
--
ALTER TABLE `units_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `units_locations`
--
ALTER TABLE `units_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `units_manger`
--
ALTER TABLE `units_manger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_image`
--
ALTER TABLE `users_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `bus_company` (`id`);

--
-- Constraints for table `bus_bookings`
--
ALTER TABLE `bus_bookings`
  ADD CONSTRAINT `bus_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bus_bookings_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `bus_trips` (`id`);

--
-- Constraints for table `bus_manger`
--
ALTER TABLE `bus_manger`
  ADD CONSTRAINT `bus_manger_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `bus_company` (`id`);

--
-- Constraints for table `bus_trips`
--
ALTER TABLE `bus_trips`
  ADD CONSTRAINT `bus_trips_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `units_bookings`
--
ALTER TABLE `units_bookings`
  ADD CONSTRAINT `units_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `units_bookings_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `units_image`
--
ALTER TABLE `units_image`
  ADD CONSTRAINT `units_image_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `units_manger`
--
ALTER TABLE `units_manger`
  ADD CONSTRAINT `units_manger_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `units_company` (`id`);

--
-- Constraints for table `users_image`
--
ALTER TABLE `users_image`
  ADD CONSTRAINT `users_image_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
