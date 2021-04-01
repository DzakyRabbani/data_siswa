-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2020 pada 16.29
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `harga_barang` varchar(225) NOT NULL,
  `stok_barang` int(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_merek`, `id_distributor`, `tgl_masuk`, `harga_barang`, `stok_barang`, `keterangan`) VALUES
(3333, 'Kaos', 1111, 2222, '2020-11-13', 'Rp.50.000', 10, 'Kaos Distro'),
(3334, 'Celana', 1112, 2223, '2020-11-13', 'Rp.100.000', 5, 'Celana bahan chino'),
(3335, 'Topi', 1113, 2224, '2020-11-13', 'Rp.45.000', 4, 'Topi NW ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `no_telp`) VALUES
(2222, 'Dzaky', 'Bandung', 878859198),
(2223, 'Ervina', 'Jakarta', 878857831),
(2224, 'Shella', 'Bogor', 878847363);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_barang`
--

CREATE TABLE `tbl_laporan_barang` (
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_laporan_barang`
--

INSERT INTO `tbl_laporan_barang` (`id_barang`) VALUES
(3333),
(3334),
(3335);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan_transaksi`
--

CREATE TABLE `tbl_laporan_transaksi` (
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_laporan_transaksi`
--

INSERT INTO `tbl_laporan_transaksi` (`id_transaksi`) VALUES
(5555),
(5556),
(5557);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_merek`
--

CREATE TABLE `tbl_merek` (
  `id_merek` int(11) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_merek`
--

INSERT INTO `tbl_merek` (`id_merek`, `merek`, `created_at`) VALUES
(1111, 'Lorena', '2020-11-13 15:17:30'),
(1112, 'Hightbest', '2020-11-13 15:17:49'),
(1113, 'Superwaw', '2020-11-13 15:18:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah_beli` int(100) NOT NULL,
  `total_harga` varchar(225) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_barang`, `user_id`, `jumlah_beli`, `total_harga`, `tgl_beli`) VALUES
(5555, 3333, 1, 1, 'Rp.50.000', '2020-11-13'),
(5556, 3334, 2, 1, 'Rp.100.000', '2020-11-13'),
(5557, 3335, 3, 1, 'Rp.45.000', '2020-11-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `hak_akses`) VALUES
(1, 'Admin Point Of Sale', 'adminpointofsale', 'YWRtaW5wb2ludG9mc2FsZQ==', 'Admin'),
(2, 'Kasir Point Of Sale', 'kasirpointofsale', 'a2FzaXJwb2ludG9mc2FsZQ==', 'Kasir'),
(3, 'Manager Point Of Sale', 'managerpointofsale', 'bWFuYWdlcnBvaW50b2ZzYWxl', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `tbl_laporan_barang`
--
ALTER TABLE `tbl_laporan_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_laporan_transaksi`
--
ALTER TABLE `tbl_laporan_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
