-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naubahar_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `terif`
--

CREATE TABLE `terif` (
  `id` int(11) NOT NULL,
  `January` varchar(11) NOT NULL,
  `February` varchar(11) NOT NULL,
  `March` varchar(11) NOT NULL,
  `April` varchar(11) NOT NULL,
  `May` varchar(11) NOT NULL,
  `June` varchar(11) NOT NULL,
  `July` varchar(11) NOT NULL,
  `August` varchar(11) NOT NULL,
  `September` varchar(11) NOT NULL,
  `October` varchar(11) NOT NULL,
  `November` varchar(11) NOT NULL,
  `December` varchar(11) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terif`
--

INSERT INTO `terif` (`id`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `test`) VALUES
(1, '10.45', '20', '30', '21.23', '22', '32', '40', '35', '45', '45', '47', '23.11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `terif`
--
ALTER TABLE `terif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `terif`
--
ALTER TABLE `terif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
