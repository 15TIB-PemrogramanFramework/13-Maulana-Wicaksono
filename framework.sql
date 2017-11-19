-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 05:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`, `nama_admin`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `adposi`
--

CREATE TABLE IF NOT EXISTS `adposi` (
  `kode_adopsi` int(11) NOT NULL AUTO_INCREMENT,
  `username_member` varchar(100) NOT NULL,
  `kode_hewan` int(11) NOT NULL,
  `jenis_hewan` varchar(100) NOT NULL,
  `status_adopsi` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_adopsi`),
  KEY `adposi_ibfk_1` (`username_member`),
  KEY `adposi_ibfk_2` (`kode_hewan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `hewan`
--

CREATE TABLE IF NOT EXISTS `hewan` (
  `kode_hewan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_hewan` varchar(100) NOT NULL,
  `umur_hewan` varchar(100) NOT NULL,
  `gambar_hewan` varchar(100) NOT NULL,
  `status_hewan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_hewan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hewan`
--

INSERT INTO `hewan` (`kode_hewan`, `jenis_hewan`, `umur_hewan`, `gambar_hewan`, `status_hewan`) VALUES
(16, 'Alaskan Malamute', '8 Bulan', '1510845400.jpg', 'Not Adopted'),
(17, 'Sugar Glider', '5 Bulan', '1510845460.jpg', 'Not Adopted'),
(18, 'Alaskan Malamute', '10 Bulan', '1510845814.jpg', 'Not Adopted');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `username_member` varchar(100) NOT NULL,
  `password_member` varchar(100) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat_member` varchar(100) NOT NULL,
  `noHP_member` varchar(100) NOT NULL,
  PRIMARY KEY (`username_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username_member`, `password_member`, `nama_member`, `alamat_member`, `noHP_member`) VALUES
('imung', 'imung', 'imung', 'pekanbaru', '1111'),
('member', 'pass', 'asdasd', 'pekanbaru', '08111111'),
('sayang', 'sayang', 'sayang', 'kamboja', '0811111111');

-- --------------------------------------------------------

--
-- Table structure for table `pelayan`
--

CREATE TABLE IF NOT EXISTS `pelayan` (
  `id_pelayan` varchar(6) NOT NULL,
  `nama_pelayan` varchar(100) NOT NULL,
  `umur_pelayan` int(11) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelayan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayan`
--

INSERT INTO `pelayan` (`id_pelayan`, `nama_pelayan`, `umur_pelayan`, `spesialisasi`) VALUES
('1', 'Surti', 25, 'Grooming Bulu'),
('2', 'Yosi', 26, 'Grooming Full'),
('3', 'Kiko', 19, 'Grooming Kuku'),
('4', 'Caca', 21, 'Health Care');

-- --------------------------------------------------------

--
-- Table structure for table `titip`
--

CREATE TABLE IF NOT EXISTS `titip` (
  `kode_titip` int(11) NOT NULL AUTO_INCREMENT,
  `username_member` varchar(100) NOT NULL,
  `id_pelayan` varchar(6) NOT NULL,
  `jenis_hewan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_titip`),
  KEY `username_member` (`username_member`),
  KEY `id_pelayan` (`id_pelayan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `titip`
--

INSERT INTO `titip` (`kode_titip`, `username_member`, `id_pelayan`, `jenis_hewan`, `status`) VALUES
(5, 'member', '1', 'bb', 'Completed');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adposi`
--
ALTER TABLE `adposi`
  ADD CONSTRAINT `adposi_ibfk_1` FOREIGN KEY (`username_member`) REFERENCES `member` (`username_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adposi_ibfk_2` FOREIGN KEY (`kode_hewan`) REFERENCES `hewan` (`kode_hewan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titip`
--
ALTER TABLE `titip`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`username_member`) REFERENCES `member` (`username_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelayan` FOREIGN KEY (`id_pelayan`) REFERENCES `pelayan` (`id_pelayan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
