-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 01:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id_mobil` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `warna_mobil` varchar(15) NOT NULL,
  `tahun_mobil` varchar(4) NOT NULL,
  `bahan_bakar` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id_mobil`, `id_cat`, `no_polisi`, `merk`, `warna_mobil`, `tahun_mobil`, `bahan_bakar`, `price`, `img`) VALUES
(1, 1, 'N 906 BK', 'Honda', 'Abu', '2001', 'Bensin', '200000', 'messageImage_15243213320242.jpg'),
(2, 1, 'DR 2252 CI', 'Daihatsu', 'Biru', '2001', 'Premium', '200000', 'messageImage_15243210870592.jpg'),
(3, 2, 'N 6298 BBB', 'Avanza', 'Hitam', '2010', 'Premium', '200000', 'IMG_1532338617.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `cat_mobil` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `cat_mobil`, `description`, `date_created`) VALUES
(1, 'Van', 'MiniBus', '2018-06-06'),
(2, 'Mini Bus', 'Max 7 Orang', '2018-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `price` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `username`, `alamat`, `no_telp`, `email`, `umur`, `gender`, `price`, `foto`) VALUES
(1, 'Ajeng', 'Mataram', '087864866013', 'ajengkartini1010@gmail.com', '21', 'Perempuan', '200000', 'a.jpg'),
(2, 'Abdul', 'Mataram', '087864866011', 'aa@gmail.com', '21', 'Laki-Laki', '250000', 'IMG-20180211-WA0021.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `keterangan`) VALUES
(1, 'Admin'),
(2, 'Golden Member'),
(3, 'Silver Member');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `no_telp`, `alamat`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '087865651234', 'Malang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `day` int(2) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `user_id`, `id_mobil`, `id_driver`, `day`, `foto_bukti`, `tanggal_kembali`, `status`, `date_order`) VALUES
(21, 5, 1, 1, 3, '', '0000-00-00', 'Selesai', '2018-07-21'),
(24, 5, 1, 2, 5, '', '0000-00-00', 'Selesai', '2018-07-21'),
(25, 5, 1, 1, 1, '', '0000-00-00', 'Terbayar', '2018-07-22'),
(26, 7, 1, 1, 3, '', '0000-00-00', 'Terbayar', '2018-07-22'),
(27, 5, 3, 2, 10, '', '0000-00-00', 'Terbayar', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `foto_bukti` varchar(255) NOT NULL,
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_order`, `foto_bukti`, `tanggal_pembayaran`) VALUES
(1, 21, 'IMG_1532178483.jpg', '2018-07-21'),
(2, 24, 'IMG_1532178784.jpg', '2018-07-21'),
(3, 25, 'IMG_1532225096.jpg', '2018-07-22'),
(4, 26, 'IMG_1532227057.jpg', '2018-07-22'),
(5, 27, 'IMG_1532342333.jpg', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL,
  `level_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `gender`, `kodepos`, `email`, `no_telp`, `username`, `password`, `register_date`, `level_id`, `img`) VALUES
(1, 'Ajeng M Kartini', 'Perempuan', '83124', 'ajengkartini@yahoo.com', '087864866013', 'Ajeng', '43317d3fd0d3344a7152250b9fd0dc2f', '2018-07-22 00:00:00', 1, '15280311618942.jpg'),
(5, 'Nurul Qofifa', 'Perempuan', '83125', 'anyenk.scoriiy@gmail.com', '087864866011', 'Fifa', '1c592211fcbbd461734b95a5f2053e61', '2018-07-21 00:00:00', 2, '14615598835161.jpg'),
(7, 'Fernanda Lampah W', 'Laki-Laki', '65112', 'paul@gmail.com', '123456789012', 'mendol', '068b46e5425f789f63bbe6593215349f', '2018-07-22 00:00:00', 3, 'IMG_20170812_180922.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `fk_cate` (`id_cat`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `car` (`id_mobil`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
