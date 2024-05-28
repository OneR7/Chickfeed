-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 06:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chickfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `waktu` time NOT NULL DEFAULT current_timestamp(),
  `id_peternak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `waktu`, `id_peternak`) VALUES
(34, '11:05:00', 1),
(35, '11:11:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontrol`
--

CREATE TABLE `kontrol` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_peternak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontrol`
--

INSERT INTO `kontrol` (`id`, `status`, `id_peternak`) VALUES
(1, 'OFF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peternak`
--

CREATE TABLE `peternak` (
  `id_peternak` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peternak`
--

INSERT INTO `peternak` (`id_peternak`, `username`, `password`) VALUES
(1, 'abdurrohman', '$2y$10$n9QBNPNbgQnL1dyiE6MrD.JRK//XQqQZ4FF09vMhvTELoFDR.0NCC'),
(2, 'ada', '321');

-- --------------------------------------------------------

--
-- Table structure for table `stok_pakan`
--

CREATE TABLE `stok_pakan` (
  `id_stok_pakan` int(11) NOT NULL,
  `stok_pakan` int(11) DEFAULT NULL,
  `id_peternak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_pakan`
--

INSERT INTO `stok_pakan` (`id_stok_pakan`, `stok_pakan`, `id_peternak`) VALUES
(2020, 0, 1),
(2149, 653, 1),
(2150, 655, 1),
(2151, 657, 1),
(2152, 660, 1),
(2153, 663, 1),
(2154, 667, 1),
(2155, 669, 1),
(2156, 672, 1),
(2157, 675, 1),
(2158, 678, 1),
(2159, 682, 1),
(2160, 685, 1),
(2161, 690, 1),
(2162, 693, 1),
(2163, 696, 1),
(2164, 698, 1),
(2165, 0, 1),
(2166, 0, 1),
(2167, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_peternak` (`id_peternak`);

--
-- Indexes for table `kontrol`
--
ALTER TABLE `kontrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kontrol_peternak` (`id_peternak`);

--
-- Indexes for table `peternak`
--
ALTER TABLE `peternak`
  ADD PRIMARY KEY (`id_peternak`);

--
-- Indexes for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  ADD PRIMARY KEY (`id_stok_pakan`),
  ADD KEY `fk_stok_pakan_peternak` (`id_peternak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kontrol`
--
ALTER TABLE `kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peternak`
--
ALTER TABLE `peternak`
  MODIFY `id_peternak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  MODIFY `id_stok_pakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2334;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_peternak` FOREIGN KEY (`id_peternak`) REFERENCES `peternak` (`id_peternak`);

--
-- Constraints for table `kontrol`
--
ALTER TABLE `kontrol`
  ADD CONSTRAINT `fk_kontrol_peternak` FOREIGN KEY (`id_peternak`) REFERENCES `peternak` (`id_peternak`);

--
-- Constraints for table `stok_pakan`
--
ALTER TABLE `stok_pakan`
  ADD CONSTRAINT `fk_stok_pakan_peternak` FOREIGN KEY (`id_peternak`) REFERENCES `peternak` (`id_peternak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
