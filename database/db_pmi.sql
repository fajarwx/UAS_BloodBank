-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 06:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_darah`
--

CREATE TABLE `stock_darah` (
  `id_stock` int(11) NOT NULL,
  `jenis_darah` varchar(2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_darah`
--

INSERT INTO `stock_darah` (`id_stock`, `jenis_darah`, `stock`) VALUES
(1, 'A', 25),
(2, 'B', 17),
(3, 'AB', 2),
(4, 'O', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIK` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `gambar` varchar(64) NOT NULL,
  `request` int(11) DEFAULT NULL,
  `tgl_donor` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIK`, `nama_user`, `username`, `password`, `alamat`, `goldar`, `email`, `level`, `gambar`, `request`, `tgl_donor`) VALUES
(0, 'admin', 'admin', 'admin', '', '', '', 'admin', '', NULL, NULL),
(2147483647, 'Fajar Tri Yulianto', 'jrwx', 'jrwx', 'wonorejo', 'O', 'ftyulianto@gmail.com', 'user', '1024px-Circle-icons-profile.svg.png', 20, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_darah`
--
ALTER TABLE `stock_darah`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
