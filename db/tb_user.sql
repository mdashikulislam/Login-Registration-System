-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2018 at 09:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(6, 'md ashik', 'ashiksumon', 'ashik713832@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'ashikul', 'ashikul', 'ashik@gmail.com', '124578'),
(8, 'md kabir', 'kabir', 'kabir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'jamiur', 'jamiur', 'jam1122@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'samir', 'samir', 'samir12@gmail.com', '654321'),
(14, 'jahangir', 'jahangir', 'jahangir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'md ashikul islam', 'ashik', 'ashik12@gmail.com', '123456'),
(16, 'hghxjhzgjh', 'jkhxcjkjkzh', 'djhjksdhgk@gmail.com', '123456'),
(17, 'asjkdhaskjd', 'jsdhfsdgf', 'djkfhgsydgf@gmail.com', '12121212'),
(18, 'sumon', 'sumon', 'sumon@gmail.com', '123456'),
(19, 'md ashik', 'md ashik', 'ashik4455@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
