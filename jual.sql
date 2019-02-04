-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Feb 2019 pada 06.06
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jual`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `stok` int(15) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `nama_barang`, `jenis_barang`, `stok`, `foto`, `harga`) VALUES
(53, 38, 'adfasdf', 'adsfasd', 11, '5f3c6357a6cd43ea385f9c7483d3e3572.jpg', 22),
(54, 46, 'Enjoy', 'Playboy HAGO', 1, 'IMG_9734.JPG', 10000000),
(57, 53, 'vanessa angel', 'second', 12, '.jpeg', 80000000),
(58, 53, 'hafizin', 'bencong HAGO', 12, 'IMG_9713.JPG', 12),
(59, 53, 'afda', '123', 3123, 'IMG_9709.JPG', 1),
(60, 46, 'agfaf', 'adfa', 3424, 'IMG_97131.JPG', 24332),
(61, 55, '23rws', 'ad', 1, 'IMG_9710.JPG', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` int(11) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `nama_user`, `id_barang`, `nama_barang`, `harga`) VALUES
(1, 0, 0, 53, 'adff', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL,
  `group` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `group`, `nama_user`, `alamat_user`, `no_hp`, `username`, `password`, `foto`) VALUES
(38, 1, 'huda', 'abiantubuh', '98', '123', '123', '2015-02-25_13_03_49-1.jpg'),
(46, 2, 'bengko', '1', '345', 'bengko', 'bengko', '20150502_131355.jpg'),
(53, 2, 'tegar', 'jontlat', '070970', 'tegar', 'tegar', '028_Choi_Byul.jpg'),
(54, 1, 'Qomarul Huda', 'abiantubuh', '085285358251', 'qomarul', 'qomarul', '1408af114d9b9a3068b681b50e4370ef.jpg'),
(55, 2, 'suek', 'hjakhfdk', '242', '123456', '123456', 'IMG_9703.JPG'),
(56, 2, 'coes', 'dghjsdg', '56357', 'cooes', 'cooes', 'IMG_97031.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`,`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`,`id_barang`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
