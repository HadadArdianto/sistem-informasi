-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 04:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengelolaan_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailkas_keluar`
--

CREATE TABLE `detailkas_keluar` (
  `kode_kk` int(11) NOT NULL,
  `kode_pegawai` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kode_header` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailkas_masuk`
--

CREATE TABLE `detailkas_masuk` (
  `kode_km` int(11) NOT NULL,
  `kode_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `kode_header` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_tindakan` int(11) NOT NULL,
  `harga_tindakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kode_dokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `sip` varchar(255) NOT NULL,
  `tempatlahir_dokter` varchar(255) NOT NULL,
  `tanggallahir_dokter` date NOT NULL,
  `alamat_dokter` varchar(255) NOT NULL,
  `telepon_dokter` varchar(15) NOT NULL,
  `id_kategori_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dokter`, `nama_dokter`, `sip`, `tempatlahir_dokter`, `tanggallahir_dokter`, `alamat_dokter`, `telepon_dokter`, `id_kategori_dokter`) VALUES
('DKR0001', 'Agung Perdana', '123456', 'Yogyakarta', '2023-05-01', 'jl.cindelaras depok sleman', '08657890456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_kas`
--

CREATE TABLE `header_kas` (
  `kode_header` int(11) NOT NULL,
  `kode_rekening` int(11) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `kode_km` int(11) NOT NULL,
  `kode_kk` int(11) NOT NULL,
  `kode_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rekening`
--

CREATE TABLE `jenis_rekening` (
  `kode_rekening` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_dokter`
--

CREATE TABLE `kategori_dokter` (
  `id_kategori_dokter` int(11) NOT NULL,
  `kategori_dokter` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_dokter`
--

INSERT INTO `kategori_dokter` (`id_kategori_dokter`, `kategori_dokter`) VALUES
(1, 'Dokter Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pasien`
--

CREATE TABLE `kategori_pasien` (
  `id_kategori_pasien` int(11) NOT NULL,
  `kategori_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pasien`
--

INSERT INTO `kategori_pasien` (`id_kategori_pasien`, `kategori_pasien`) VALUES
(1, 'Rawat Inap');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pasien` varchar(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempatlahir_pasien` varchar(255) NOT NULL,
  `tanggallahir_pasien` date DEFAULT NULL,
  `alamat_pasien` varchar(255) NOT NULL,
  `telepon_pasien` varchar(15) NOT NULL,
  `id_kategori_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pasien`, `nama_pasien`, `jenis_kelamin`, `tempatlahir_pasien`, `tanggallahir_pasien`, `alamat_pasien`, `telepon_pasien`, `id_kategori_pasien`) VALUES
('PSN0001', 'Agung Perdana', 'L', 'Yogyakarta', '2023-05-03', 'jl.cindelaras depok sleman', '08657890456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kode_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `kode_tindakan` int(11) NOT NULL,
  `nama_tindakan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_username` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_username`, `username`, `password`, `level`) VALUES
(1, 'adminweb', '$2y$10$rEZJY8pbrwqUbLU5Gcbjhuvq0uMHVse364aifoJfvHzeI6BIuQgci', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailkas_keluar`
--
ALTER TABLE `detailkas_keluar`
  ADD PRIMARY KEY (`kode_kk`);

--
-- Indexes for table `detailkas_masuk`
--
ALTER TABLE `detailkas_masuk`
  ADD PRIMARY KEY (`kode_km`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `header_kas`
--
ALTER TABLE `header_kas`
  ADD PRIMARY KEY (`kode_header`);

--
-- Indexes for table `jenis_rekening`
--
ALTER TABLE `jenis_rekening`
  ADD PRIMARY KEY (`kode_rekening`);

--
-- Indexes for table `kategori_dokter`
--
ALTER TABLE `kategori_dokter`
  ADD PRIMARY KEY (`id_kategori_dokter`);

--
-- Indexes for table `kategori_pasien`
--
ALTER TABLE `kategori_pasien`
  ADD PRIMARY KEY (`id_kategori_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kode_tindakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_dokter`
--
ALTER TABLE `kategori_dokter`
  MODIFY `id_kategori_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_pasien`
--
ALTER TABLE `kategori_pasien`
  MODIFY `id_kategori_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_username` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
