-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 09:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pm_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(8) NOT NULL,
  `nama_alternatif` varchar(64) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `keterangan`) VALUES
('A01', 'Bambang Sutejo', 'Pembina'),
('A02', 'Aziz Burhanudin', 'Pembina'),
('A03', 'Bobi Santoso', 'Pembina'),
('A04', 'Tretan Muslim', 'Pembina'),
('A05', 'Coki Pardede Sialagan', 'Pembina');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aspek`
--

CREATE TABLE `tb_aspek` (
  `kode_aspek` varchar(8) NOT NULL,
  `nama_aspek` varchar(64) DEFAULT NULL,
  `persen` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aspek`
--

INSERT INTO `tb_aspek` (`kode_aspek`, `nama_aspek`, `persen`) VALUES
('AI', 'Aspek Kapasistas Intelektual', 20),
('AII', 'Aspek Sikap Kerja', 30),
('AIII', 'Aspek Prilaku', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL,
  `kode_alternatif` varchar(8) NOT NULL,
  `total` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `kode_alternatif`, `total`, `ranking`) VALUES
(1, 'A01', 4.24, 4),
(2, 'A02', 4.43, 3),
(3, 'A03', 4.73, 1),
(4, 'A04', 4.56, 2),
(5, 'A05', 2.91, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(64) NOT NULL,
  `kode_aspek` varchar(8) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL,
  `factor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `kode_aspek`, `nilai_kriteria`, `factor`) VALUES
('AI1', 'Verbalisasi Ide', 'AI', 3, 'Core'),
('AI2', 'Sistematika Berfikir', 'AI', 4, 'Core'),
('AI3', 'Konsentrasi', 'AI', 4, 'Core'),
('AI4', 'Logika Praktis', 'AI', 3, 'Secondary'),
('AI5', 'Potensi Kecerdasan', 'AI', 3, 'Secondary'),
('AII1', 'Energi Psikis', 'AII', 3, 'Core'),
('AII2', 'Ketelitian dan Tangggung Jawab', 'AII', 3, 'Core'),
('AII3', 'Kehati-hatian', 'AII', 3, 'Secondary'),
('AII4', 'Dorongan Berprestasi', 'AII', 4, 'Secondary'),
('AIII1', 'Dominance (Kekuasaan)', 'AIII', 3, 'Core'),
('AIII2', 'Influences (Pengaruh)', 'AIII', 2, 'Core'),
('AIII3', 'Steadiness (Keteguhan Hati)', 'AIII', 3, 'Secondary'),
('AIII4', 'Compliance (Pemenuhan)', 'AIII', 4, 'Secondary');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(8) DEFAULT NULL,
  `kode_aspek` varchar(8) DEFAULT NULL,
  `kode_kriteria` varchar(8) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`ID`, `kode_alternatif`, `kode_aspek`, `kode_kriteria`, `nilai`) VALUES
(8, 'A01', 'AI', 'AI1', 2),
(9, 'A02', 'AI', 'AI1', 3),
(10, 'A03', 'AI', 'AI1', 2),
(11, 'A04', 'AI', 'AI1', 2),
(16, 'A01', 'AI', 'AI2', 2),
(17, 'A02', 'AI', 'AI2', 4),
(18, 'A03', 'AI', 'AI2', 3),
(19, 'A04', 'AI', 'AI2', 3),
(23, 'A01', 'AI', 'AI3', 3),
(24, 'A02', 'AI', 'AI3', 3),
(25, 'A03', 'AI', 'AI3', 4),
(26, 'A04', 'AI', 'AI3', 4),
(30, 'A01', 'AI', 'AI4', 2),
(31, 'A02', 'AI', 'AI4', 2),
(32, 'A03', 'AI', 'AI4', 3),
(33, 'A04', 'AI', 'AI4', 3),
(37, 'A01', 'AI', 'AI5', 3),
(38, 'A02', 'AI', 'AI5', 4),
(39, 'A03', 'AI', 'AI5', 2),
(40, 'A04', 'AI', 'AI5', 3),
(44, 'A01', 'AII', 'AII1', 3),
(45, 'A02', 'AII', 'AII1', 3),
(46, 'A03', 'AII', 'AII1', 2),
(47, 'A04', 'AII', 'AII1', 2),
(51, 'A01', 'AII', 'AII2', 2),
(52, 'A02', 'AII', 'AII2', 4),
(53, 'A03', 'AII', 'AII2', 3),
(54, 'A04', 'AII', 'AII2', 3),
(58, 'A01', 'AII', 'AII3', 2),
(59, 'A02', 'AII', 'AII3', 3),
(60, 'A03', 'AII', 'AII3', 3),
(61, 'A04', 'AII', 'AII3', 4),
(65, 'A01', 'AII', 'AII4', 3),
(66, 'A02', 'AII', 'AII4', 4),
(67, 'A03', 'AII', 'AII4', 3),
(68, 'A04', 'AII', 'AII4', 2),
(72, 'A01', 'AIII', 'AIII1', 2),
(73, 'A02', 'AIII', 'AIII1', 2),
(74, 'A03', 'AIII', 'AIII1', 3),
(75, 'A04', 'AIII', 'AIII1', 3),
(79, 'A01', 'AIII', 'AIII2', 2),
(80, 'A02', 'AIII', 'AIII2', 3),
(81, 'A03', 'AIII', 'AIII2', 2),
(82, 'A04', 'AIII', 'AIII2', 3),
(86, 'A01', 'AIII', 'AIII3', 3),
(87, 'A02', 'AIII', 'AIII3', 2),
(88, 'A03', 'AIII', 'AIII3', 3),
(89, 'A04', 'AIII', 'AIII3', 4),
(93, 'A01', 'AIII', 'AIII4', 2),
(94, 'A02', 'AIII', 'AIII4', 3),
(95, 'A03', 'AIII', 'AIII4', 4),
(96, 'A04', 'AIII', 'AIII4', 4),
(151, 'A05', 'AI', 'AI1', 1),
(152, 'A05', 'AI', 'AI2', 1),
(153, 'A05', 'AI', 'AI3', 1),
(154, 'A05', 'AI', 'AI4', 1),
(155, 'A05', 'AI', 'AI5', 1),
(156, 'A05', 'AII', 'AII1', 1),
(157, 'A05', 'AII', 'AII2', 1),
(158, 'A05', 'AII', 'AII3', 1),
(159, 'A05', 'AII', 'AII4', 1),
(160, 'A05', 'AIII', 'AIII1', 1),
(161, 'A05', 'AIII', 'AIII2', 1),
(162, 'A05', 'AIII', 'AIII3', 1),
(163, 'A05', 'AIII', 'AIII4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_aspek`
--
ALTER TABLE `tb_aspek`
  ADD PRIMARY KEY (`kode_aspek`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
