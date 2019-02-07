-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29 Jan 2019 pada 05.29
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku_togamedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_cover` text NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `tahun`, `id_kategori`, `harga`, `foto_cover`, `penerbit`, `penulis`, `stok`) VALUES
(0, 'Giat UN2018', 10000, 13, 10000, 'buku2.png', 'erlangga', 'Patrik', 5),
(63, 'Giat UN2018', 10000, 0, 10000, 'product11.png', '123', '123', 100),
(64, 'Giat UN2018', 10000, 0, 10000, 'port01.jpg', 'erlangga', 'pak rw', 100),
(68, 'Belajar Bersama1', 2017, 11, 20000, 'buku3.png', 'erlangga', 'Arif D ', 0),
(69, 'Web Programming', 2019, 17, 200000, 'buku4.jpg', 'erlangga', 'Fahmi', 8),
(70, 'Basisdata ', 2016, 17, 20000, 'buku5.jpg', 'erlangga', 'Briantya', 98),
(71, 'Matahari Bulan', 2018, 16, 200000, 'buku1.png', 'Togamas', 'Bagus P', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bahasa Indonesia'),
(11, 'Ipa'),
(12, 'Bahasa Inggris'),
(13, 'Matematika'),
(14, 'Bahasa Jepang'),
(16, 'Novel'),
(17, 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_transaksi`, `id_buku`, `jumlah`) VALUES
(155, 77, 68, 2),
(157, 77, 69, 2),
(158, 77, 70, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `nama_pembeli`, `total`, `tanggal_beli`, `status`, `bukti`) VALUES
(15, 1, 'Toriq', 200222, '2019-01-09', 'Lunas', '-'),
(17, 1, 'Toldo', 200222, '2019-01-19', 'Lunas', '-'),
(18, 1, 'yan', 200222, '2018-05-09', 'Lunas', '-'),
(74, 3, 'Suherman', 40000, '2018-05-09', '', ''),
(77, 3, 'Bramantyo', 500000, '2018-05-09', '', ''),
(79, 1, 'David', 200222, '2018-05-09', 'Lunas', '-'),
(80, 3, 'Bramantyo', 500000, '2019-01-01', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Andre', 'yuda', 'yuda123', 'Admin'),
(3, 'Kasir Ku', 'kasir', 'kasir', 'kasir'),
(4, 'Adam', 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
