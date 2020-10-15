-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 12:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisteminfolks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `passwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `passwd`) VALUES
('admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hit`
--

CREATE TABLE `hit` (
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hit`
--

INSERT INTO `hit` (`total`) VALUES
(1324);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` varchar(20) NOT NULL,
  `nilai` float(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai`) VALUES
('29251', 98.00),
('29252', 80.00),
('29253', 75.00),
('29271', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `umur` int(5) DEFAULT NULL,
  `asalsmk` varchar(30) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `passwd`, `bidang`, `umur`, `asalsmk`, `kelas`) VALUES
('29251', 'Alim Tegar Wicaksono', 'alim', 'Desain Web', 17, 'SMKN 2 Yogyakarta', 'XII'),
('29252', 'Amilia Umil Makarim', 'alim', 'Desain Web', 18, 'SMKN 2 Yogyakarta', 'XII'),
('29253', 'Ananda Erditya Utama', 'ananda', 'Desain Web', 17, 'SMKN 2 Yogyakarta', 'X'),
('29271', 'Edi Gunawan', 'edi', 'Desain Web', 17, 'SMKN 2 Yogyakarta', 'XII');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
