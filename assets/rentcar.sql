-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 06:06 AM
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
  `jenis_mobil` enum('Van','MiniBus','Family','MiniCar') NOT NULL,
  `warna_mobil` varchar(15) NOT NULL,
  `tahun_mobil` varchar(4) NOT NULL,
  `bahan_bakar` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id_mobil`, `id_cat`, `no_polisi`, `merk`, `jenis_mobil`, `warna_mobil`, `tahun_mobil`, `bahan_bakar`, `price`, `img`) VALUES
(1, 1, 'N 906 BK', 'Honda', 'Van', 'Abu', '2001', 'Bensin', '200000', 'messageImage_15243213320242.jpg');

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
(1, 'Van', 'MiniBus', '2018-06-06');

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
  `id_user` int(11) NOT NULL,
  `id_mobil` varchar(50) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `day` int(2) NOT NULL,
  `price` varchar(50) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `id_mobil`, `merk`, `day`, `price`, `date_order`) VALUES
(2, 1, '2', 'Avanzaa', 2, '400000', '2018-05-03'),
(12, 1, '2', 'xenia', 3, '500000', '2018-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `alamat`, `no_telp`, `email`, `birth`, `password`, `img`, `level`) VALUES
(1, 'ajeng', 'mataram', '087864866013', 'ajengkartini10@gmail.com', '2009-04-10', 'ajeng', 'a.jpg', 2),
(2, 'Nanda', 'Sukun', '087864866011', 'n@gmail.com', '1997-04-25', 'nanda', '1523622611580.jpg', 2);

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
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `gender`, `kodepos`, `email`, `no_telp`, `username`, `password`, `register_date`, `level_id`) VALUES
(1, 'Nurul Qofifa', 'Perempuan', '83128', 'fifa@gmail.com', '087864866018', 'fifa', '1c592211fcbbd461734b95a5f2053e61', '2018-07-10 00:00:00', 2),
(2, 'Fernanda', 'Laki-Laki', '83129', 'Nanda@gmail.com', '087864866019', 'Nanda', '859a37720c27b9f70e11b79bab9318fe', '2018-07-10 00:00:00', 3),
(3, 'Eka Dewi', 'Perempuan', '83110', 'paul1@gmail.com', '087864866010', 'Eka', '79ee82b17dfb837b1be94a6827fa395a', '2018-07-10 00:00:00', 3);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
