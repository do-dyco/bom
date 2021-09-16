-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 16.24
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` varchar(25) NOT NULL,
  `id_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `stock`, `id_satuan`) VALUES
(1, '001', 'Karet', '10', '6'),
(2, '002', 'Besi', '10', '7'),
(3, '003', 'Cat', '-95', '6'),
(4, '005', 'Lem', '10', '4'),
(5, '006', 'Tali', '5', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_formula`
--

CREATE TABLE `detail_formula` (
  `id_detail_formula` int(11) NOT NULL,
  `id_formula` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jumlah_barang` float NOT NULL,
  `id_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_formula`
--

INSERT INTO `detail_formula` (`id_detail_formula`, `id_formula`, `id_barang`, `jumlah_barang`, `id_satuan`) VALUES
(1, '3', '1', 1, '6'),
(2, '3', '2', 3, '7'),
(3, '2', '3', 1, '6'),
(4, '4', '1', 2, '1'),
(5, '4', '5', 1, '1'),
(6, '4', '3', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formula`
--

CREATE TABLE `formula` (
  `id_formula` int(11) NOT NULL,
  `nama_formula` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `formula`
--

INSERT INTO `formula` (`id_formula`, `nama_formula`) VALUES
(1, 'Sil'),
(2, 'Standar'),
(3, 'Karet Stang'),
(4, 'Sepatu Nike');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_produksi`
--

CREATE TABLE `hasil_produksi` (
  `id_hasil_produksi` int(11) NOT NULL,
  `id_produksi` varchar(25) NOT NULL,
  `tgl_cek` date NOT NULL,
  `reject` varchar(25) NOT NULL,
  `result` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_produksi`
--

INSERT INTO `hasil_produksi` (`id_hasil_produksi`, `id_produksi`, `tgl_cek`, `reject`, `result`) VALUES
(1, '1', '2020-10-19', '10', '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kirim_produk`
--

CREATE TABLE `kirim_produk` (
  `id_kirim_produk` int(11) NOT NULL,
  `id_produksi` varchar(20) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `jumlah_kirim` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `kode_produksi` varchar(20) NOT NULL,
  `id_formula` varchar(20) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `qty_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `kode_produksi`, `id_formula`, `tanggal_produksi`, `qty_produksi`) VALUES
(1, '001', '3', '2020-09-03', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Box'),
(3, 'Rim'),
(4, 'Kodi'),
(5, 'Lusin'),
(6, 'Kg'),
(7, 'Meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_produk`
--

CREATE TABLE `stock_produk` (
  `id_stock_produk` int(11) NOT NULL,
  `id_produksi` varchar(20) NOT NULL,
  `jumlah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock_produk`
--

INSERT INTO `stock_produk` (`id_stock_produk`, `id_produksi`, `jumlah`) VALUES
(1, '1', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', '1'),
(2, ' Dody', 'dody', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2'),
(5, 'Joko Susanto', 'leader', 'd8578edf8458ce06fbc5bb76a58c5ca4', '3'),
(6, 'Heri', 'gudang', 'd8578edf8458ce06fbc5bb76a58c5ca4', '4');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_formula`
--
ALTER TABLE `detail_formula`
  ADD PRIMARY KEY (`id_detail_formula`);

--
-- Indeks untuk tabel `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id_formula`);

--
-- Indeks untuk tabel `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD PRIMARY KEY (`id_hasil_produksi`);

--
-- Indeks untuk tabel `kirim_produk`
--
ALTER TABLE `kirim_produk`
  ADD PRIMARY KEY (`id_kirim_produk`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `stock_produk`
--
ALTER TABLE `stock_produk`
  ADD PRIMARY KEY (`id_stock_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_formula`
--
ALTER TABLE `detail_formula`
  MODIFY `id_detail_formula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `formula`
--
ALTER TABLE `formula`
  MODIFY `id_formula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  MODIFY `id_hasil_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kirim_produk`
--
ALTER TABLE `kirim_produk`
  MODIFY `id_kirim_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `stock_produk`
--
ALTER TABLE `stock_produk`
  MODIFY `id_stock_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
