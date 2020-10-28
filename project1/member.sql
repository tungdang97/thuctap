-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 02:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `avatarname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `phone`, `email`, `birthday`, `sex`, `avatarname`) VALUES
(3, 'tung dang', '6e2b75f17398b1329474e2f9f7e31f6a', '2534454', 'tungdaihiep97@yahoo.com', '2020-10-08', 'Female', NULL),
(4, 'tung', 'bb7d4b236b564cf1ec27aa891331e0af', '543453', 'tung@gmail.com', '2020-10-09', '', NULL),
(5, 'tung dang hoang', 'c4ca4238a0b923820dcc509a6f75849b', '2534454', 'tungdang@gmail.com', '2020-10-02', 'Female', NULL),
(6, 'tungarsenal', 'c4ca4238a0b923820dcc509a6f75849b', '2534454', 'tungarsenal@gmail.com', '2020-10-02', 'Female', NULL),
(7, 'user4', 'c4ca4238a0b923820dcc509a6f75849b', '3523252345', 'user4@gmail.com', '2020-10-04', 'Male', ''),
(8, 'user5', 'c4ca4238a0b923820dcc509a6f75849b', '0543534532', 'user5@gmail.com', '2020-10-07', 'Male', '11768.jpg'),
(9, 'user3', 'c4ca4238a0b923820dcc509a6f75849b', '456346', 'user3@gmail.com', '2020-10-14', 'Male', '4.png'),
(10, 'user9', 'c4ca4238a0b923820dcc509a6f75849b', '34543532', 'user9@gmail.com', '2020-09-28', 'Male', 'ars.jpg'),
(11, 'user2', 'c4ca4238a0b923820dcc509a6f75849b', '564645657', 'user2@gmail.com', '2020-10-02', 'Male', '763861.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
