-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 10:46 PM
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
-- Database: `db_penyewaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
                             `no_plat` varchar(26) NOT NULL,
                             `tahun` varchar(11) NOT NULL,
                             `tarif` int(16) NOT NULL,
                             `status` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
                             `no_ktp` varchar(46) NOT NULL,
                             `nama` varchar(38) NOT NULL,
                             `alamat` varchar(78) NOT NULL,
                             `telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
                         `id_sopir` varchar(34) NOT NULL,
                         `nama` varchar(28) NOT NULL,
                         `alamat` varchar(78) NOT NULL,
                         `telepon` varchar(16) NOT NULL,
                         `sim` varchar(23) NOT NULL,
                         `tarif` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
                                  `id_type` int(21) NOT NULL,
                                  `type` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
                             `no_transaksi` int(21) NOT NULL,
                             `tanggal_pesan` date NOT NULL,
                             `tanggal_pinjam` date NOT NULL,
                             `tanggal_kembalian_rencana` date NOT NULL,
                             `jam_kembali_rencana` tinyint(4) NOT NULL,
                             `tanggal_kembali_realisasi` date NOT NULL,
                             `jam_kembali_realisasi` tinyint(4) NOT NULL,
                             `denda` int(11) NOT NULL,
                             `kilometer_pinjam` int(11) NOT NULL,
                             `kilometer_kembali` int(11) NOT NULL,
                             `bbm_pinjam` int(11) NOT NULL,
                             `bbm_kembali` int(11) NOT NULL,
                             `kondisi_mobil_pinjam` varchar(48) NOT NULL,
                             `kondisi_mobil_kembali` varchar(48) NOT NULL,
                             `kerusakan` varchar(255) NOT NULL,
                             `biaya_kerusakan` int(11) NOT NULL,
                             `biaya_bbm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
    ADD PRIMARY KEY (`no_plat`),
  ADD KEY `no_plat` (`no_plat`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
    ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
    ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
    MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;