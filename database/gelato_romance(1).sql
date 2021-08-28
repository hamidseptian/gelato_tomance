-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 12:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gelato_romance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jabatan`, `username`, `password`, `level`) VALUES
(1, 'Hamid Septian', 'Owner', 'admin', 'admin', 'Admin'),
(3, 'slknvo', 'vjsdbnj', '11', '1111', 'Admin'),
(4, 'jdsbvidhfb', 'iubsidubesiud', 'udbdsiubdiu', 'vsdkvj \'', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `nama_bahan_baku` varchar(25) NOT NULL,
  `peruntukan` varchar(25) NOT NULL,
  `id_topping` varchar(5) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `nama_bahan_baku`, `peruntukan`, `id_topping`, `keterangan`, `gambar`) VALUES
(6, 'Bunga', '', '', '', '210811065340.jpg'),
(7, 'Rokok se nyo', '', '', '', '210811070029.jpg'),
(9, 'Lilin', '', '', '', '210811070232.jpg'),
(10, 'Kertas siloven', '', '', '', '210813123030.jpg'),
(15, 'Rokok', 'Topping', '1', '', '210815051339.png'),
(16, 'KErtas', 'Hand Baquet', '', 'Merah', '210815052641.png'),
(17, 'Kertas', 'Hand Baquet', '', 'Hijau', '210815055232.png'),
(18, 'KErtas', 'Hand Baquet', '', 'Pink', '210815055243.jpg'),
(19, 'Kertas', 'Hand Baquet', '', 'Ungu', '210815055254.jpg'),
(20, 'Kertas ', 'Hand Baquet', '', 'Pinks', '210816123648.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cara_pesan`
--

CREATE TABLE `cara_pesan` (
  `id` int(11) NOT NULL,
  `cara_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cara_pesan`
--

INSERT INTO `cara_pesan` (`id`, `cara_pesan`) VALUES
(1, '<p>asdasf</p>\r\n\r\n<p>begini dan begiru</p>\r\n\r\n<p>dan lain lain</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact_person`
--

CREATE TABLE `contact_person` (
  `id_contact_person` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_person`
--

INSERT INTO `contact_person` (`id_contact_person`, `nama`, `alamat`, `nohp`, `email`) VALUES
(2, 'Udin aja', 'disini', '12543124353', '02121@fga.com');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `alamat_karyawan` varchar(200) NOT NULL,
  `nohp_karyawan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `nohp_karyawan`) VALUES
(4, 'Udin penyok', 'maransi city', '1234567890'),
(5, 'asdas', 'asdas', 'asdas'),
(6, 'asdas', 'asdas', 'asdas'),
(7, 'Giga Fista Reni', 'Solok City', '111111111111'),
(9, 'ascasascas', 'sacascsa', 'sacasc'),
(10, 'Revani', 'siteba', '00');

-- --------------------------------------------------------

--
-- Table structure for table `management_bahan_baku`
--

CREATE TABLE `management_bahan_baku` (
  `id_managemen` int(11) NOT NULL,
  `id_bahan_baku` varchar(5) NOT NULL,
  `nama_bahan_baku` varchar(25) NOT NULL,
  `qty` int(5) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management_bahan_baku`
--

INSERT INTO `management_bahan_baku` (`id_managemen`, `id_bahan_baku`, `nama_bahan_baku`, `qty`, `jenis`, `tgl_transaksi`) VALUES
(26, '6', 'Bunga', 20, 'Masuk', '2021-08-11'),
(27, '7', 'Rokok', 2, 'Masuk', '2021-08-11'),
(28, '8', 'Permen', 10, 'Masuk', '2021-08-11'),
(29, '6', 'Bunga', 20, 'Masuk', '2021-08-11'),
(30, '9', 'Lilin', 10, 'Masuk', '2021-08-11'),
(31, '7', 'Rokok se nyo', 66, 'Keluar', '2021-08-11'),
(32, '7', 'Rokok se nyo', 65, 'Masuk', '2021-08-11'),
(33, '7', 'Rokok se nyo', 6, 'Masuk', '2021-08-11'),
(34, '10', 'Kertas siloven', 20, 'Masuk', '2021-08-13'),
(35, '10', 'Kertas siloven', 5, 'Masuk', '2021-08-13'),
(36, '11', 'kertas', 200, 'Masuk', '2021-08-15'),
(37, '12', 'Benang', 2, 'Masuk', '2021-08-15'),
(38, '13', 'Bunga', 4, 'Masuk', '2021-08-15'),
(39, '14', 'Oreo', 8, 'Masuk', '2021-08-15'),
(40, '15', 'Rokok', 12, 'Masuk', '2021-08-15'),
(41, '16', 'KErtas', 12, 'Masuk', '2021-08-15'),
(42, '17', 'Kertas', 20, 'Masuk', '2021-08-15'),
(43, '18', 'KErtas', 9, 'Masuk', '2021-08-15'),
(44, '19', 'Kertas', 1, 'Masuk', '2021-08-15'),
(45, '20', 'Kertas ', 4, 'Masuk', '2021-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `nohp_pelanggan` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `username`, `password`) VALUES
(9, 'Hamid Septian', 'Disana', '081212121212', '11', '11'),
(15, 'reva', 'disini', '081212121212', '99', '99');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_bahan_baku`
--

CREATE TABLE `pemakaian_bahan_baku` (
  `id_pemakaian_bahan_baku` int(11) NOT NULL,
  `id_bahan_baku` varchar(5) NOT NULL,
  `banyak_pemakaian` varchar(5) NOT NULL,
  `id_ukuran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemakaian_bahan_baku`
--

INSERT INTO `pemakaian_bahan_baku` (`id_pemakaian_bahan_baku`, `id_bahan_baku`, `banyak_pemakaian`, `id_ukuran`) VALUES
(1, '16', '4', '11'),
(4, '17', '2', '13'),
(7, '17', '7', '12'),
(8, '18', '4', '12'),
(9, '19', '3', '12'),
(10, '16', '2', '14'),
(11, '18', '2', '14'),
(12, '20', '4', '14');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(4) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_ukuran` varchar(5) NOT NULL,
  `id_warna` varchar(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `tanggal_pengambilan` varchar(25) NOT NULL,
  `tanggal_pesan` varchar(20) NOT NULL,
  `waktu_pesan` varchar(10) NOT NULL,
  `metode_bayar` varchar(25) NOT NULL,
  `status_pesanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_produk`, `id_ukuran`, `id_warna`, `qty`, `tanggal_pengambilan`, `tanggal_pesan`, `waktu_pesan`, `metode_bayar`, `status_pesanan`) VALUES
(102, '9', '12', '13', 'Kuning', 1, '', '', '', '', 'Masuk Ke Keranjang'),
(103, '9', '12', '14', 'Pink', 1, '', '', '', '', 'Masuk Ke Keranjang'),
(105, '9', '12', '11', 'Red', 6, '', '', '', '', 'Masuk Ke Keranjang'),
(106, '9', '12', '11', 'asdsa', 3, '', '', '', '', 'Masuk Ke Keranjang'),
(107, '9', '12', '11', 'asdsa', 4, '', '', '', '', 'Masuk Ke Keranjang'),
(108, '15', '12', '11', '1', 2, '', '', '', '', 'Masuk Ke Keranjang');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(2) NOT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`) VALUES
(12, 'Hand Baquet', 'perpaduan antaran ini dan itu'),
(13, 'Snack Baquet', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `kode_bank` varchar(3) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nama_rekening` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `kode_bank`, `nama_bank`, `no_rekening`, `nama_rekening`) VALUES
(2, '222', 'Bank Nagari se', '1005-0213', 'Hamid');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `id_topping` int(11) NOT NULL,
  `nama_topping` varchar(25) NOT NULL,
  `harga` int(12) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`id_topping`, `nama_topping`, `harga`, `stok`) VALUES
(1, 'Rokok', 7000, 4),
(3, 'coklat', 12000, 33),
(4, 'gula', 20000, 3),
(5, 'Oreo', 1000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `topping_pesanan`
--

CREATE TABLE `topping_pesanan` (
  `id_topping_pesanan` int(11) NOT NULL,
  `id_pesanan` varchar(5) NOT NULL,
  `id_topping` varchar(5) NOT NULL,
  `nama_topping` varchar(25) NOT NULL,
  `banyak_topping` int(4) NOT NULL,
  `harga_topping` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topping_pesanan`
--

INSERT INTO `topping_pesanan` (`id_topping_pesanan`, `id_pesanan`, `id_topping`, `nama_topping`, `banyak_topping`, `harga_topping`) VALUES
(7, '100', '1', 'Rokok', 1, 7000),
(8, '100', '3', 'coklat', 2, 12000),
(11, '102', '3', 'coklat', 2, 12000),
(12, '102', '4', 'gula', 1, 20000),
(16, '106', '1', 'Rokok', 2, 7000),
(17, '106', '3', 'coklat', 1, 12000),
(18, '107', '1', 'Rokok', 2, 7000),
(32, '105', '4', 'gula', 5, 20000),
(33, '103', '1', 'Rokok', 1, 7000),
(34, '108', '3', 'coklat', 4, 12000),
(35, '108', '4', 'gula', 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_produk` varchar(25) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `biaya` int(12) NOT NULL,
  `gambar` text NOT NULL,
  `banyak_topping` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_produk`, `ukuran`, `biaya`, `gambar`, `banyak_topping`) VALUES
(11, '12', 'small', 20000, '210815054813.png', 9),
(12, '12', 'big', 200000, '210815055336.jpg', 2),
(13, '12', 'Bigg', 45000, '210815060314.jpg', 6),
(14, '12', 'big', 50000, '210816123819.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `id_produk` varchar(5) NOT NULL,
  `id_ukuran` varchar(5) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `id_produk`, `id_ukuran`, `warna`, `stok`) VALUES
(1, '12', '11', 'Red', 10),
(2, '12', '11', 'asdsa', 1),
(4, '12', '12', 'Hijau', 12),
(5, '12', '13', 'Kuning', 12),
(6, '12', '14', 'Pink', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `cara_pesan`
--
ALTER TABLE `cara_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`id_contact_person`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `management_bahan_baku`
--
ALTER TABLE `management_bahan_baku`
  ADD PRIMARY KEY (`id_managemen`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemakaian_bahan_baku`
--
ALTER TABLE `pemakaian_bahan_baku`
  ADD PRIMARY KEY (`id_pemakaian_bahan_baku`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id_topping`);

--
-- Indexes for table `topping_pesanan`
--
ALTER TABLE `topping_pesanan`
  ADD PRIMARY KEY (`id_topping_pesanan`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cara_pesan`
--
ALTER TABLE `cara_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `id_contact_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `management_bahan_baku`
--
ALTER TABLE `management_bahan_baku`
  MODIFY `id_managemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pemakaian_bahan_baku`
--
ALTER TABLE `pemakaian_bahan_baku`
  MODIFY `id_pemakaian_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `id_topping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topping_pesanan`
--
ALTER TABLE `topping_pesanan`
  MODIFY `id_topping_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
