-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 05:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_registrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `asrama` enum('A','B','C','D','E','F','') NOT NULL,
  `pend_pagi` enum('MI','MTs','MA','KEMENAG','MTI') NOT NULL,
  `pend_sore` enum('SD','SMP','SMA','SMK','PT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `tgl_lahir`, `alamat`, `asrama`, `pend_pagi`, `pend_sore`) VALUES
(1, 'Putri Ratna F', '2001-06-08', 'Probolinggo', 'A', 'MI', 'PT'),
(18, 'Irda Andini', '2000-10-08', 'Kalimantan', 'A', 'MTI', 'PT'),
(19, 'Layla Dewi Shinta', '1999-06-01', 'Banyuwangi', 'B', 'MA', 'PT'),
(21, 'Siti Holisah Anjari', '2001-01-01', 'Bondowoso', 'C', 'MTs', 'SMA'),
(22, 'Nurul Aini', '2003-04-12', 'Sampang', 'E', 'MI', 'SMP'),
(23, 'Maulidina Wahyu', '2001-07-03', 'Jawa Tengah', 'D', 'MI', 'SMK'),
(24, 'Vina Malikhatul Aeni', '2002-07-16', 'Jawa Tengah', 'A', 'MI', 'SMA'),
(25, 'Wita Handikayana', '2002-04-12', 'Sumenep', 'A', 'MTs', 'PT'),
(26, 'Irfaatun', '1999-09-12', 'Kangean', 'E', 'MA', 'PT'),
(27, 'Luluul Mukarromah', '2002-05-23', 'Sumenep', 'A', 'MTs', 'SMK'),
(28, 'Lisa Novia', '2003-08-17', 'Jember', 'D', 'MTs', 'SMA'),
(29, 'Eny Itsnainy', '2003-09-29', 'Bangkalan', 'A', 'MTs', 'SMA'),
(30, 'Fadhilatul Jannah', '2002-06-23', 'Situbondo', 'A', 'MTs', 'SMA'),
(31, 'Eka Mailani Safirna', '2000-07-12', 'Bangkalan', 'B', 'MTI', 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asrama`
--

CREATE TABLE `tb_asrama` (
  `kd_asrama` int(11) NOT NULL,
  `asrama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_asrama`
--

INSERT INTO `tb_asrama` (`kd_asrama`, `asrama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(7, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pp`
--

CREATE TABLE `tb_pp` (
  `kd_pp` int(11) NOT NULL,
  `pp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pp`
--

INSERT INTO `tb_pp` (`kd_pp`, `pp`) VALUES
(1, 'MI'),
(2, 'MTs'),
(3, 'MA'),
(4, 'KEMENAG'),
(5, 'MTI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ps`
--

CREATE TABLE `tb_ps` (
  `kd_ps` int(11) NOT NULL,
  `ps` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ps`
--

INSERT INTO `tb_ps` (`kd_ps`, `ps`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'SMK'),
(5, 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$bAxRIuXdEUx6RRBH27CU8uCwTybA8KLO/ShHNMCJh1/Njp.VDImQK'),
(2, 'rf', '$2y$10$y7XL0KPEFbgnuR7wE7oMc.yOVX7THKHVhhdGt1e9Mk1I0UzdAc9a2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_asrama`
--
ALTER TABLE `tb_asrama`
  ADD PRIMARY KEY (`kd_asrama`);

--
-- Indexes for table `tb_pp`
--
ALTER TABLE `tb_pp`
  ADD PRIMARY KEY (`kd_pp`);

--
-- Indexes for table `tb_ps`
--
ALTER TABLE `tb_ps`
  ADD PRIMARY KEY (`kd_ps`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_asrama`
--
ALTER TABLE `tb_asrama`
  MODIFY `kd_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pp`
--
ALTER TABLE `tb_pp`
  MODIFY `kd_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_ps`
--
ALTER TABLE `tb_ps`
  MODIFY `kd_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
