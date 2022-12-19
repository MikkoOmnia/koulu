-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03.10.2022 klo 09:53
-- Palvelimen versio: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpushop`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `orders`
--

INSERT INTO `orders` (`id`, `user`, `price`, `date`) VALUES
(1, 0, 0, '2022-09-28 00:01:45'),
(2, 0, 0, '2022-09-28 00:02:07'),
(3, 0, 0, '2022-09-28 00:02:23'),
(4, 0, 0, '2022-09-28 00:05:26'),
(5, 0, 0, '2022-09-28 00:06:44'),
(6, 0, 0, '2022-09-28 00:06:47'),
(7, 0, 0, '2022-09-28 00:07:23'),
(8, 0, 0, '2022-09-28 00:07:24'),
(9, 0, 1368800, '2022-09-28 00:08:38'),
(10, 0, 1200, '2022-09-28 11:59:18'),
(11, 10, 1200, '2022-09-28 11:59:47'),
(12, 10, 1200, '2022-09-28 12:00:03'),
(13, 10, 1200, '2022-09-28 12:00:53'),
(14, 10, 19700, '2022-09-28 12:05:02'),
(15, 11, 400, '2022-09-29 12:10:51'),
(16, 12, 1400, '2022-09-29 12:12:40');

-- --------------------------------------------------------

--
-- Rakenne taululle `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `solved` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `support`
--

INSERT INTO `support` (`id`, `name`, `email`, `type`, `info`, `date`, `solved`) VALUES
(1, 'mikko', '800027924@omnia.fi', 'Bug report', 'viaka', '2022-09-19 12:07:30', 'false'),
(2, 'jarmo', 'jarmo@gmail.com', 'Other', 'apua', '2022-09-19 12:08:01', 'false'),
(3, '', '', 'Bug report', '', '2022-09-19 12:08:19', 'false');

-- --------------------------------------------------------

--
-- Rakenne taululle `tuotteet`
--

CREATE TABLE `tuotteet` (
  `code` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tuotteet`
--

INSERT INTO `tuotteet` (`code`, `name`, `category`, `price`, `image`) VALUES
(1000, 'Nvidia RTX 3090', 'nvidia', 1200, 'rtx3090.png'),
(1001, 'Nvidia RTX 3090ti', 'nvidia', 1400, 'rtx3090ti.jpg'),
(1002, 'Nvidia RTX 3060', 'Nvidia', 400, 'rtx3060.jfif'),
(1003, 'Radeon XT 6900 XT 16GB GDDR6', 'AMD', 900, 'lataus (2).jfif'),
(1005, 'GIGABYTE AMD Radeon RX 6600', 'AMD', 200, 'shopping.webp');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `address`, `type`) VALUES
(1, 'email', 'few', 'mikko', 'mikko', 'normal'),
(5, '', '', '', '', 'normal'),
(9, 'datastream', 'stockman', '', '', 'normal'),
(10, 'mikko@email.com', 'mikko123', 'Mikko Varis', 'maria jotunin tie', 'admin'),
(11, 'datamatapata', 'datamatapata', '', '', 'normal'),
(12, 'email@gmail.com', 'kissa123', '', '', 'normal'),
(27, 'fataratakata', 'fataratakata', '', '', 'normal'),
(28, 'fataratakata1', 'fataratakata1', '', '', 'normal'),
(29, 'mikkovaris1', 'mikkovaris1', '', '', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuotteet`
--
ALTER TABLE `tuotteet`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tuotteet`
--
ALTER TABLE `tuotteet`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
