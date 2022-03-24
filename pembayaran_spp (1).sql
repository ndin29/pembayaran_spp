-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 08:52 AM
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
-- Database: `pembayaran_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Administrator'),
(2, 'andin', '1234', ''),
(3, 'nabila', '', ''),
(4, 'nera', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(11) NOT NULL,
  `namaguru` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'Pak Mulyawan'),
(2, 'Pak Darma'),
(4, 'Bu dayu Cempaka'),
(6, 'Pak Warma'),
(7, 'Bu Murni');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `namasiswa` varchar(40) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tahunajaran` varchar(20) NOT NULL,
  `biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(2, '0173', 'Nabila Putri Hermawan', 'XI MM', '2019/2020', 490000),
(5, '0168', 'Amanda Ayu', 'XI RPL', '2019/2020', 490000),
(6, '0192', 'Neraa', 'XI RPL', '2019/2020', 490000),
(7, '0149', 'Andin Mariyana Indah Sari', 'XI RPL', '2019/2020', 490000),
(8, '0157', 'Dayu Indah', 'XI RPL', '2019/2020', 490000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `jatuhtempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nobayar` varchar(10) NOT NULL,
  `tglbayar` date NOT NULL,
  `jumlah` int(20) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `idadmin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `nobayar`, `tglbayar`, `jumlah`, `ket`, `idadmin`) VALUES
(1, 2, '2019-10-10', 'Oktober 2019', '1910300003', '2019-10-30', 490000, 'Lunas', 0),
(2, 2, '2019-11-10', 'November 2019', '1910300002', '2019-10-30', 490000, 'Lunas', 0),
(3, 2, '2019-12-10', 'Desember 2019', '1910300001', '2019-10-30', 490000, 'Lunas', 0),
(4, 2, '2020-01-10', 'Januari 2020', '1911020002', '2019-11-02', 490000, 'Lunas', 0),
(5, 2, '2020-02-10', 'februari 2020', '1911060002', '2019-11-06', 490000, 'Lunas', 0),
(6, 2, '2020-03-10', 'Maret 2020', '1911110001', '2019-11-11', 490000, 'Lunas', 0),
(7, 2, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(8, 2, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(9, 2, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(10, 2, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(11, 2, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(12, 2, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(13, 3, '2019-10-10', 'Oktober 2019', '', '0000-00-00', 490000, '', 0),
(14, 3, '2019-11-10', 'November 2019', '', '0000-00-00', 490000, '', 0),
(15, 3, '2019-12-10', 'Desember 2019', '', '0000-00-00', 490000, '', 0),
(16, 3, '2020-01-10', 'Januari 2020', '', '0000-00-00', 490000, '', 0),
(17, 3, '2020-02-10', 'februari 2020', '', '0000-00-00', 490000, '', 0),
(18, 3, '2020-03-10', 'Maret 2020', '', '0000-00-00', 490000, '', 0),
(19, 3, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(20, 3, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(21, 3, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(22, 3, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(23, 3, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(24, 3, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(25, 4, '2019-10-10', 'Oktober 2019', '', '0000-00-00', 490000, '', 0),
(26, 4, '2019-11-10', 'November 2019', '', '0000-00-00', 490000, '', 0),
(27, 4, '2019-12-10', 'Desember 2019', '', '0000-00-00', 490000, '', 0),
(28, 4, '2020-01-10', 'Januari 2020', '', '0000-00-00', 490000, '', 0),
(29, 4, '2020-02-10', 'februari 2020', '', '0000-00-00', 490000, '', 0),
(30, 4, '2020-03-10', 'Maret 2020', '', '0000-00-00', 490000, '', 0),
(31, 4, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(32, 4, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(33, 4, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(34, 4, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(35, 4, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(36, 4, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(37, 5, '2019-10-10', 'Oktober 2019', '1910300004', '2019-10-30', 490000, 'Lunas', 0),
(38, 5, '2019-11-10', 'November 2019', '1910300005', '2019-10-30', 490000, 'Lunas', 0),
(39, 5, '2019-12-10', 'Desember 2019', '', '0000-00-00', 490000, '', 0),
(40, 5, '2020-01-10', 'Januari 2020', '', '0000-00-00', 490000, '', 0),
(41, 5, '2020-02-10', 'februari 2020', '', '0000-00-00', 490000, '', 0),
(42, 5, '2020-03-10', 'Maret 2020', '', '0000-00-00', 490000, '', 0),
(43, 5, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(44, 5, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(45, 5, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(46, 5, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(47, 5, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(48, 5, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(49, 6, '2019-10-10', 'Oktober 2019', '1910300006', '2019-10-30', 490000, 'Lunas', 0),
(50, 6, '2019-11-10', 'November 2019', '', '0000-00-00', 490000, '', 0),
(51, 6, '2019-12-10', 'Desember 2019', '', '0000-00-00', 490000, '', 0),
(52, 6, '2020-01-10', 'Januari 2020', '', '0000-00-00', 490000, '', 0),
(53, 6, '2020-02-10', 'februari 2020', '', '0000-00-00', 490000, '', 0),
(54, 6, '2020-03-10', 'Maret 2020', '', '0000-00-00', 490000, '', 0),
(55, 6, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(56, 6, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(57, 6, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(58, 6, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(59, 6, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(60, 6, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(61, 7, '2019-10-10', 'Oktober 2019', '1910300007', '2019-10-30', 490000, 'Lunas', 0),
(62, 7, '2019-11-10', 'November 2019', '1910310001', '2019-10-31', 490000, 'Lunas', 0),
(63, 7, '2019-12-10', 'Desember 2019', '1910310002', '2019-10-31', 490000, 'Lunas', 0),
(64, 7, '2020-01-10', 'Januari 2020', '1911020001', '2019-11-02', 490000, 'Lunas', 0),
(65, 7, '2020-02-10', 'februari 2020', '1911030001', '2019-11-03', 490000, 'Lunas', 0),
(66, 7, '2020-03-10', 'Maret 2020', '1911060001', '2019-11-06', 490000, 'Lunas', 0),
(67, 7, '2020-04-10', 'April 2020', '1911110002', '2019-11-11', 490000, 'Lunas', 0),
(68, 7, '2020-05-10', 'Mei 2020', '1911110003', '2019-11-11', 490000, 'Lunas', 0),
(69, 7, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(70, 7, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(71, 7, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(72, 7, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0),
(73, 8, '2019-10-10', 'Oktober 2019', '1911040001', '2019-11-04', 490000, 'Lunas', 0),
(74, 8, '2019-11-10', 'November 2019', '1911040002', '2019-11-04', 490000, 'Lunas', 0),
(75, 8, '2019-12-10', 'Desember 2019', '', '0000-00-00', 490000, '', 0),
(76, 8, '2020-01-10', 'Januari 2020', '', '0000-00-00', 490000, '', 0),
(77, 8, '2020-02-10', 'februari 2020', '', '0000-00-00', 490000, '', 0),
(78, 8, '2020-03-10', 'Maret 2020', '', '0000-00-00', 490000, '', 0),
(79, 8, '2020-04-10', 'April 2020', '', '0000-00-00', 490000, '', 0),
(80, 8, '2020-05-10', 'Mei 2020', '', '0000-00-00', 490000, '', 0),
(81, 8, '2020-06-10', 'Juni 2020', '', '0000-00-00', 490000, '', 0),
(82, 8, '2020-07-10', 'Juli 2020', '', '0000-00-00', 490000, '', 0),
(83, 8, '2020-08-10', 'Agustus 2020', '', '0000-00-00', 490000, '', 0),
(84, 8, '2020-09-10', 'September 2020', '', '0000-00-00', 490000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `idguru` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`idguru`, `kelas`) VALUES
(1, 'VII RPL'),
(3, 'X MM'),
(4, 'XI RPL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
