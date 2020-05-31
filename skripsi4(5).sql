-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 08:17 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi4`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE IF NOT EXISTS `kerusakan` (
  `kdkerusakan` varchar(4) NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `kdklkerusakan` varchar(4) NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`kdkerusakan`, `kerusakan`, `kdklkerusakan`, `mb`) VALUES
('L001', 'Lampu Sorot Bus Meredup', 'K001', 0.7),
('L002', 'Lampu Depan / Belakang Mati', 'K001', 0.8),
('L003', 'Lampu Sein Tidak Berkedip', 'K001', 0.8),
('L004', 'Pedal Gas Terasa Berat Untuk Berakselerasi', 'K002', 0.9),
('L005', 'Setir Terasa Berat', 'K003', 0.9),
('L006', 'Setir Goyang Atau Tidak Stabil', 'K003', 0.9),
('L007', 'Setir Mengeluarkan Bunyi', 'K003', 0.8),
('L008', 'Kaki - Kaki Mobil Bunyi Saat Berjalan', 'K004', 0.7),
('L009', 'Guncangan Mobil Keras', 'K004', 0.7),
('L010', 'Speedometer Mati', 'K005', 0.6),
('L011', 'Jarum Speedometer Bergerak Tidak Stabil', 'K005', 0.6),
('L012', 'Pedal Rem Terasa Keras', 'K006', 0.9),
('L013', 'Rem Tidak Pakem', 'K006', 0.9),
('L014', 'Rem Blong', 'K006', 0.9),
('L015', 'Rem Berdecit', 'K006', 0.6),
('L016', 'Rem Tidak Balik Ketika Injakan Pedal Rem Dilepas', 'K006', 0.8),
('L017', 'Ban Ada Benjolan', 'K007', 0.8),
('L018', 'Ban Gundul Tidak Merata', 'K007', 0.8),
('L019', 'Ban Retak - Retak', 'K007', 0.8),
('L020', 'Retak', 'K008', 0.8),
('L021', 'Pecah', 'K008', 0.8),
('L022', 'Baret', 'K008', 0.7),
('L023', 'Jamuran', 'K008', 0.8),
('L024', 'Listrik Tidak Stabil', 'K009', 0.8),
('L025', 'Klakson Tidak Ada Suara', 'K010', 0.7),
('L026', 'Klakson Suara Lemah', 'K010', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `klkerusakan`
--

CREATE TABLE IF NOT EXISTS `klkerusakan` (
  `kdklkerusakan` varchar(4) NOT NULL,
  `namaklkerusakan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klkerusakan`
--

INSERT INTO `klkerusakan` (`kdklkerusakan`, `namaklkerusakan`) VALUES
('K001', 'Lampu Dan Daya Pancar'),
('K002', 'Emisi Gas Tabung'),
('K003', 'Sistem Kemudi'),
('K004', 'Kaki Mobil'),
('K005', 'Speedometer'),
('K006', 'Sistem Pengereman'),
('K007', 'Ban Mobil'),
('K008', 'Kaca Mobil'),
('K009', 'Tidak Modifikasi'),
('K010', 'Klakson');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `penyebab`
--

CREATE TABLE IF NOT EXISTS `penyebab` (
  `kdpenyebab` varchar(4) NOT NULL,
  `penyebab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyebab`
--

INSERT INTO `penyebab` (`kdpenyebab`, `penyebab`) VALUES
('P001', 'Kabel Rusak'),
('P002', 'Soket Lampu Karatan / Kotor / Kendor'),
('P003', 'Bohlam Lampu Rusak / Mati'),
('P004', 'Soket Lampu Meleleh'),
('P005', 'Aki Lemah / Tegangan Listrik Tidak Stabil'),
('P006', 'Mika Lampu Kusam'),
('P007', 'Sekring Putus'),
('P008', 'Switch Meleleh'),
('P009', 'Saklar Rusak'),
('P010', 'Flasher Sein Mati'),
('P011', 'Rellay Rusak'),
('P012', 'Catalytic Converter Mampet'),
('P013', 'Minyak Dipedal Gas Kurang'),
('P014', 'Tekanan Angin Tidak Layak'),
('P015', 'Power Steering Rusak'),
('P016', 'Steering Belt Rusak'),
('P017', 'Cairan Power Steering Rendah'),
('P018', 'Roda Tidak Selaras'),
('P019', 'Cross Joint Propeler Shaft Macet'),
('P020', 'Kondisi Velg Yang Penyok'),
('P021', 'Bearing Pecah'),
('P022', 'Rak Kemudi Rusak'),
('P023', 'Stabilizer Bar Lemah'),
('P024', 'CV Joint Rusak'),
('P025', 'Tie Rod Lemah'),
('P026', 'Rack End'),
('P027', 'Karet Bushing Arm'),
('P028', 'Shockbreaker Rusak'),
('P029', 'Peer Terlalu Tebal'),
('P030', 'Vehicle Speed Sensor'),
('P031', 'Panel Speedometer Rusak'),
('P032', 'Masalah Pada Sistem Kelistrikan'),
('P033', 'Selang Vacum Bocor'),
('P034', 'Peer Rem Tidak Berfungsi'),
('P035', 'Canvas Rem Tipis'),
('P036', 'Master Hidrolik Rem Bagian Atas Bocor'),
('P037', 'Selang Saluran Minyak Rem Mampet'),
('P038', 'Minyak Rem Abis'),
('P039', 'Master Silinder Rusak'),
('P040', 'Piston Rem Pecah'),
('P041', 'Rak Rem Rusak'),
('P042', 'Cakram / Tromol Rem Sudah Tidak Rata'),
('P043', 'Terkena Benda Tajam'),
('P044', 'Benang Ban Pecah Didalam'),
('P045', 'Suspensi Lemah'),
('P046', 'Velg Tidak Sesuai'),
('P047', 'Ban Sudah Kadaluarsa'),
('P048', 'Terlalu Panas'),
('P049', 'Kipas Kaca Keras'),
('P050', 'Air Yang Kotor / Berkarat'),
('P051', 'Menambahkan Banyak Lampu'),
('P052', 'Menambahkan Banyak Salon'),
('P053', 'Menambahkan Banyak AC'),
('P054', 'Klakson Rusak'),
('P055', 'Angin Klakson Bocor'),
('P056', 'Saklar Berkarat'),
('P057', 'Peer Tidak Berfungsi'),
('P058', 'Piston Rem Tidak Berfungsi');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE IF NOT EXISTS `relasi` (
  `kdrelasi` varchar(4) NOT NULL,
  `kdkerusakan` varchar(4) NOT NULL,
  `kdpenyebab` varchar(4) NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`kdrelasi`, `kdkerusakan`, `kdpenyebab`, `mb`) VALUES
('R001', 'L001', 'P002', 0.6),
('R002', 'L001', 'P003', 0.65),
('R003', 'L001', 'P005', 0.7),
('R004', 'L001', 'P006', 0.7),
('R005', 'L002', 'P001', 0.7),
('R006', 'L002', 'P003', 1),
('R007', 'L002', 'P007', 1),
('R008', 'L002', 'P005', 0.7),
('R009', 'L002', 'P008', 1),
('R010', 'L002', 'P002', 0.8),
('R011', 'L002', 'P009', 1),
('R012', 'L002', 'P011', 0.8),
('R013', 'L003', 'P003', 1),
('R014', 'L003', 'P007', 1),
('R015', 'L003', 'P001', 0.7),
('R016', 'L003', 'P011', 1),
('R017', 'L004', 'P012', 0.6),
('R018', 'L004', 'P013', 0.75),
('R019', 'L005', 'P014', 0.8),
('R020', 'L005', 'P015', 0.9),
('R021', 'L005', 'P016', 0.6),
('R022', 'L005', 'P017', 0.7),
('R023', 'L005', 'P018', 0.65),
('R024', 'L006', 'P019', 0.6),
('R025', 'L006', 'P020', 0.8),
('R026', 'L006', 'P018', 0.6),
('R027', 'L006', 'P021', 0.7),
('R028', 'L007', 'P022', 0.7),
('R029', 'L007', 'P023', 0.7),
('R030', 'L007', 'P024', 0.6),
('R031', 'L007', 'P025', 0.6),
('R032', 'L007', 'P018', 0.7),
('R033', 'L007', 'P017', 0.8),
('R034', 'L008', 'P026', 0.6),
('R035', 'L008', 'P027', 0.5),
('R036', 'L008', 'P021', 0.8),
('R037', 'L009', 'P028', 0.7),
('R038', 'L009', 'P029', 0.8),
('R039', 'L009', 'P034', 0.8),
('R040', 'L010', 'P030', 0.6),
('R041', 'L010', 'P031', 0.5),
('R042', 'L010', 'P032', 0.6),
('R043', 'L010', 'P001', 0.6),
('R044', 'L011', 'P032', 0.6),
('R045', 'L012', 'P033', 0.8),
('R046', 'L012', 'P034', 0.8),
('R047', 'L013', 'P033', 0.8),
('R048', 'L013', 'P035', 0.7),
('R049', 'L013', 'P036', 0.7),
('R050', 'L013', 'P037', 0.7),
('R051', 'L013', 'P038', 0.7),
('R052', 'L014', 'P036', 0.8),
('R053', 'L014', 'P039', 0.7),
('R054', 'L014', 'P038', 0.6),
('R055', 'L014', 'P040', 0.7),
('R056', 'L014', 'P057', 0.8),
('R057', 'L015', 'P041', 0.6),
('R058', 'L015', 'P035', 0.6),
('R059', 'L015', 'P042', 0.6),
('R060', 'L016', 'P034', 0.7),
('R061', 'L017', 'P014', 0.7),
('R062', 'L017', 'P043', 0.7),
('R063', 'L017', 'P044', 0.7),
('R064', 'L018', 'P045', 0.8),
('R065', 'L018', 'P046', 0.7),
('R066', 'L018', 'P014', 0.6),
('R067', 'L019', 'P047', 0.7),
('R068', 'L020', 'P043', 0.9),
('R069', 'L020', 'P048', 0.6),
('R070', 'L021', 'P043', 0.9),
('R071', 'L022', 'P043', 0.8),
('R072', 'L022', 'P049', 0.7),
('R073', 'L023', 'P050', 0.8),
('R074', 'L024', 'P051', 0.7),
('R075', 'L024', 'P052', 0.7),
('R076', 'L024', 'P053', 0.6),
('R077', 'L025', 'P054', 0.6),
('R078', 'L025', 'P007', 0.6),
('R079', 'L025', 'P011', 0.7),
('R080', 'L025', 'P009', 0.7),
('R081', 'L026', 'P055', 0.6),
('R082', 'L026', 'P056', 0.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`kdkerusakan`);

--
-- Indexes for table `klkerusakan`
--
ALTER TABLE `klkerusakan`
  ADD PRIMARY KEY (`kdklkerusakan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `penyebab`
--
ALTER TABLE `penyebab`
  ADD PRIMARY KEY (`kdpenyebab`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`kdrelasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
