-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 01:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinventariskantor_kampusmerdeka`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `satuan` varchar(45) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `kategori_id` int(11) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `harga`, `satuan`, `jumlah`, `keterangan`, `kategori_id`, `foto`) VALUES
(19, 'B3115', 'Laser Jet Printer', 3000000, 'Unit', 12, 'Ini adalah mesin printer super hebat--', 11, 'banner1.jpg'),
(21, 'B9601', 'Pensil 2B', 2000, 'Pcs', 11, '', 13, ''),
(22, 'B5580', 'HDMI 5cm', 55000, 'Pcs', 12, '', 14, '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` char(5) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `no_telp` varchar(45) NOT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `gender`, `no_telp`, `alamat`, `foto`) VALUES
(3, 'K0000', 'Sebastian Agung', 'L', '086958674012', 'Rahasia', ''),
(4, 'K0002', 'Yahudina Mariam', 'P', '08695867555', 'ss', ''),
(5, 'K5321', 'Opik Hidayat', 'L', '089774553712', 'Kampung Sawah Jabon Mekar', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(10, 'Laptop'),
(11, 'Printer'),
(12, 'Alat Presentasi'),
(13, 'Alat Tulis'),
(14, 'Kabel'),
(15, 'UPS'),
(16, 'PC'),
(17, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `karyawan_id`, `barang_id`, `kode`, `tgl_peminjaman`, `tgl_pengembalian`, `keterangan`, `petugas_id`) VALUES
(9, 4, 22, 'PJ529', '2022-10-01', '2022-10-06', 'tidak ada', 45);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` int(11) NOT NULL,
  `no` char(10) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `no`, `tgl_pengadaan`, `jenis`, `keterangan`, `supplier_id`, `petugas_id`) VALUES
(1, 'peng000001', '2022-11-10', 'pembelian', NULL, 2, 45),
(2, 'peng000002', '2022-11-02', 'pembelian', NULL, 6, 45),
(3, 'peng000003', '2022-11-19', 'pembelian', NULL, 5, 50),
(4, 'peng000004', '2022-11-18', 'pembelian', NULL, 2, 51);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_unit`
--

CREATE TABLE `pengadaan_unit` (
  `id` int(11) NOT NULL,
  `pengadaan_id` int(11) NOT NULL,
  `no_pengadaan` char(5) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengadaan_unit`
--

INSERT INTO `pengadaan_unit` (`id`, `pengadaan_id`, `no_pengadaan`, `jenis`, `keterangan`, `barang_id`, `deskripsi_barang`, `harga`, `jumlah`) VALUES
(1, 1, 'PU011', 'Pembelian', 'h', 21, 'Pensill', 65000, 10),
(16, 4, 'PU519', 'Lainnya', 'Untuk stok', 21, '2b Tebal', 2500, 31),
(17, 2, 'PU523', 'Pembelian', '', 19, '', 4000000, 10),
(18, 3, 'PU765', 'Pembelian', '', 22, '', 20000, 54);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nip` char(5) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nip`, `nama`, `gender`, `no_telp`, `alamat`, `username`, `email`, `password`, `role`, `foto`) VALUES
(34, 'P0000', 'Admin', 'L', '0', '', 'Super_Admin21', 'admin@siinka.com', '8dc14fe946641b9c39fbb507243f307a3fd907f3', 'admin', ''),
(35, 'P0001', 'Muh. Ismail', 'L', '089998887321', NULL, 'muhismail', 'muhismail@gmail.com', 'e7e63b34ae0bc79d6c985fc1da230fcf71010431', 'staff', NULL),
(45, 'PG559', 'Ferda Nisaaa', 'P', '088995588421', 's', 'ferda.nisa', 'nisa@gmail.com', '81d96a87af50b2e8ca82c3972c441385e3823a03', 'staff', ''),
(49, 'PG517', 'Ammar Mubarock', 'L', '0854944832712', 'we', 'amar.m', 'amar.m@gmail.com', '7a93aa26d0a9344cbc080914b7cde53e149e19af', 'admin', ''),
(50, 'PG934', 'Kasir Aman', 'L', '089448855731', 'h', 'amandonk', 'amandonk@gmail.com', 'f2bc6555baf823e385c1f18d384388320c999c3c', 'staff', ''),
(51, 'PG329', 'Cyntia Agustiana', 'P', '082121009384', '', 'cyntia', 'cyntia@gmail.com', 'df20f15972cf945ba0f22e7f80cfede11e24fe4c', 'staff', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `no_telp`, `alamat`) VALUES
(1, 'SP000', 'Benua Interline, PT', '089988472231', 'Jl. Lenteng Agung'),
(2, 'SP002', 'CV. Gwahira Sumber Niaga', '08546214237543', 'Jakarta Selatan'),
(3, 'SP003', 'CV. Bimantrana Selaras', '02194857342', 'Kota Bogor'),
(4, 'SP004', 'PT Nalindo Surya Digital', '082197804322', 'Tanggerang selatan'),
(5, 'SP005', 'PT Sumber Data', '089774332202', 'Papua'),
(6, 'SP006', 'PT Enka Komputer', '089009322211', 'Jati Luhur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_barang_kategori_idx` (`kategori_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`),
  ADD UNIQUE KEY `no_telp_UNIQUE` (`no_telp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_karyawan_has_barang_barang1_idx` (`barang_id`),
  ADD KEY `fk_karyawan_has_barang_karyawan1_idx` (`karyawan_id`),
  ADD KEY `fk_peminjaman_petugas1_idx` (`petugas_id`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_UNIQUE` (`no`),
  ADD KEY `fk_pengadaan_supplier1_idx` (`supplier_id`),
  ADD KEY `fk_pengadaan_petugas1_idx` (`petugas_id`);

--
-- Indexes for table `pengadaan_unit`
--
ALTER TABLE `pengadaan_unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pengadaan_UNIQUE` (`no_pengadaan`),
  ADD KEY `fk_barang_has_pengadaan_pengadaan1_idx` (`pengadaan_id`),
  ADD KEY `fk_barang_has_pengadaan_barang1_idx` (`barang_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`),
  ADD UNIQUE KEY `no_telp_UNIQUE` (`no_telp`),
  ADD UNIQUE KEY `usename_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD UNIQUE KEY `no_telp_UNIQUE` (`no_telp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengadaan_unit`
--
ALTER TABLE `pengadaan_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_karyawan_has_barang_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_karyawan_has_barang_karyawan1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `fk_pengadaan_petugas1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengadaan_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pengadaan_unit`
--
ALTER TABLE `pengadaan_unit`
  ADD CONSTRAINT `fk_barang_has_pengadaan_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_has_pengadaan_pengadaan1` FOREIGN KEY (`pengadaan_id`) REFERENCES `pengadaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
