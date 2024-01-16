-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bad_habitscreate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bad_habits`
--

CREATE TABLE `bad_habits` (
  `id` int(3) NOT NULL,
  `Nama_artikel` varchar(50) NOT NULL,
  `ukuran_kaos` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bad_habits`
--

INSERT INTO `bad_habits` (`id`, `Nama_artikel`, `ukuran_kaos`, `harga`) VALUES
(2, 'skullroses', 'M', '123000'),
(3, 'za', 'm', '123000'),
(4, 'za', 'm', '123000'),
(5, 'za', 'm', '123000'),
(6, 'korerk', 'm', '123000'),
(7, 'as', 's', 'a'),
(8, 'as', 's', 'a'),
(9, 'za', 'm', '123000'),
(10, 'za', 'm', '123000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bad_habits`
--
ALTER TABLE `bad_habits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bad_habits`
--
ALTER TABLE `bad_habits`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
