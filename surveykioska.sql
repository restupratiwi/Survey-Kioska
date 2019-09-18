-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 12:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveykioska`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(2, 'fasilitas'),
(4, 'kioska navigasi'),
(5, 'navigasi ar'),
(3, 'peminjaman'),
(10, 'singkat'),
(1, 'umum'),
(6, 'vr tour');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `q10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_survey`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`) VALUES
(5, 5, 100, 25, 75, 0, 75, 0, 100, 0, 100, 0),
(6, 6, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(7, 7, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(8, 8, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0),
(9, 9, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0),
(10, 10, 75, 25, 75, 25, 75, 25, 75, 25, 75, 25),
(11, 11, 25, 75, 25, 75, 25, 75, 25, 75, 25, 75),
(12, 12, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100),
(13, 13, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100),
(14, 14, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(15, 15, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(16, 16, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(17, 17, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(18, 18, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(19, 19, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(20, 20, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50),
(21, 21, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(22, 22, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(23, 23, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75),
(24, 24, 75, 75, 75, 75, 75, 75, 75, 75, 75, 75);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_mesin` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `id_kategori`, `id_mesin`, `waktu`) VALUES
(5, 2, 1, '2019-09-14 00:31:57'),
(6, 10, 1, '2019-09-14 00:56:35'),
(7, 10, 1, '2019-09-14 00:56:35'),
(8, 1, 1, '2019-09-14 00:56:55'),
(9, 1, 1, '2019-09-14 00:57:09'),
(10, 1, 1, '2019-09-14 00:57:26'),
(11, 1, 1, '2019-09-14 00:57:36'),
(12, 1, 1, '2019-09-14 00:57:47'),
(13, 1, 1, '2019-09-14 01:01:41'),
(14, 1, 1, '2019-09-14 03:56:27'),
(15, 2, 1, '2019-09-14 03:59:13'),
(16, 2, 1, '2019-09-14 03:59:13'),
(17, 2, 1, '2019-09-14 03:59:14'),
(18, 2, 1, '2019-09-14 03:59:14'),
(19, 2, 1, '2019-09-14 03:59:15'),
(20, 2, 1, '2019-09-14 03:59:15'),
(21, 10, 1, '2019-09-14 04:21:37'),
(22, 10, 1, '2019-09-14 04:21:37'),
(23, 10, 1, '2019-09-14 04:43:09'),
(24, 10, 1, '2019-09-14 04:43:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD UNIQUE KEY `id_survey_2` (`id_survey`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_mesin` (`id_mesin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `fk_survey` FOREIGN KEY (`id_survey`) REFERENCES `survey` (`id_survey`);

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
