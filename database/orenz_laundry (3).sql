-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2020 pada 15.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orenz_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` tinytext,
  `no_hp` varchar(12) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `no_hp`, `no_telp`, `logo`, `username`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('ADM000000000001', 'lita', 'Jember', '082335949731', NULL, NULL, 'lita', '202cb962ac59075b964b07152d234b70', NULL, '2020-04-24 03:26:57', NULL, '2020-04-24 03:26:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('BRG000000000001', 'Selimut Sedang', 'Aktif', NULL, '2020-04-21 13:59:00', NULL, '2020-04-21 14:37:13'),
('BRG000000000002', 'Selimut Kecil', 'Aktif', NULL, '2020-04-21 13:59:19', NULL, '2020-04-21 13:59:25'),
('BRG000000000003', 'Tas Ransel', 'Aktif', NULL, '2020-04-29 20:44:35', NULL, '2020-04-29 20:44:35'),
('BRG000000000004', 'Bed Cover', 'Aktif', NULL, '2020-04-29 20:45:10', NULL, '2020-04-29 20:45:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_paket` varchar(15) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `durasi_paket`
--

CREATE TABLE `durasi_paket` (
  `id_durasi` varchar(15) NOT NULL,
  `durasi_paket` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `durasi_paket`
--

INSERT INTO `durasi_paket` (`id_durasi`, `durasi_paket`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('DRS000000000001', '3 Hari', 'Aktif', NULL, '2020-04-29 20:30:32', NULL, '2020-04-29 20:30:32'),
('DRS000000000002', '2 Hari', 'Aktif', NULL, '2020-04-29 20:30:58', NULL, '2020-04-29 20:30:58'),
('DRS000000000003', '1 Hari', 'Aktif', NULL, '2020-04-29 20:31:25', NULL, '2020-04-29 20:31:25'),
('DRS000000000004', '1/2 Hari', 'Aktif', NULL, '2020-04-29 20:36:33', NULL, '2020-04-29 20:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_paket`
--

CREATE TABLE `isi_paket` (
  `id_isi_paket` varchar(15) NOT NULL,
  `nama_isi_paket` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isi_paket`
--

INSERT INTO `isi_paket` (`id_isi_paket`, `nama_isi_paket`, `keterangan`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('IPT000000000001', 'Cuci Kering Setrika (CKS)', 'Cuci kering pakaian beserta setrika di lakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:00:37', NULL, '2020-04-29 20:00:37'),
('IPT000000000002', 'Cuci Kering (CK)', 'Cuci kering pakaian tanpa setrika dilakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:01:35', NULL, '2020-04-29 20:01:35'),
('IPT000000000003', 'Setrika (S)', 'Setrika pakaian yang telah dicuci dilakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:02:45', NULL, '2020-04-29 20:02:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_jenis_paket` varchar(15) NOT NULL,
  `nama_jenis_paket` varchar(50) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_jenis_paket`, `nama_jenis_paket`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('JPK000000000001', 'Reguler', 'admin', '2020-04-29 20:22:32', NULL, '2020-04-29 20:22:32'),
('JPK000000000002', 'Ekspress', 'admin', '2020-04-29 20:24:38', NULL, '2020-04-29 20:24:38'),
('JPK000000000003', 'Satuan', 'admin', '2020-04-29 20:24:50', NULL, '2020-04-29 20:24:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(15) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `id_jenis_paket` varchar(15) NOT NULL,
  `id_isi_paket` varchar(15) NOT NULL,
  `id_durasi` varchar(15) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_barang`, `id_jenis_paket`, `id_isi_paket`, `id_durasi`, `nama_paket`, `harga`, `status`, `gambar`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('PKT000000000001', 'BRG000000000001', 'JPK000000000001', 'IPT000000000001', 'DRS000000000001', 'R CKS 3 Hari', 5000, 'Aktif', NULL, NULL, '2020-04-29 20:42:14', NULL, '2020-04-29 20:42:14'),
('PKT000000000002', 'BRG000000000002', 'JPK000000000001', 'IPT000000000002', 'DRS000000000001', 'R CK 3 Hari', 4000, 'Aktif', NULL, NULL, '2020-04-29 20:42:46', NULL, '2020-04-29 20:42:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `subjek_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` varchar(15) NOT NULL,
  `judul_promo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `syarat_ketentuan` text NOT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `awal` datetime NOT NULL,
  `akhir` datetime NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `judul_promo`, `deskripsi`, `syarat_ketentuan`, `gambar`, `jumlah`, `awal`, `akhir`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('PRM000000000001', 'Promo Ramadhan', 'Promo selama bulan ramadhan bisa kamu nikmati', '<p>1. Promo berlaku selama bulan ramadhan</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler</p>\r\n', '91bf01d2bca158874237064e431c2953.png', 25, '2020-04-21 00:00:00', '2020-05-27 00:00:00', 'Draft', 'admin', '2020-04-28 10:18:37', 'admin', '2020-04-28 10:23:04'),
('PRM000000000002', 'Promo Grand Opening', 'Promo ini berlaku dalam rangka grand opening orenz laundry', '<p>1. Promo berlaku selama 18 hari</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler, ekspres dan satuan</p>\r\n', 'b7c9b25ff69a120d1b918306acf965e6.png', 15, '2020-03-13 00:00:00', '2020-03-31 00:00:00', 'Aktif', 'admin', '2020-04-28 10:26:30', NULL, '2020-04-28 10:26:30'),
('PRM000000000003', 'Event Tahun Baru', 'Promo ini berlaku selama natal-tahun baru', '<p>1. Promo berlaku selama 20 hari</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler, ekspres dan satuan</p>\r\n', '6a13cc337de198d890af4a8d72ca350c.jpg', 20, '2019-12-25 00:00:00', '2020-01-15 00:00:00', 'Draft', 'admin', '2020-04-28 10:29:01', NULL, '2020-04-28 10:29:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_promo` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_antar` datetime NOT NULL,
  `tgl_jemput` datetime NOT NULL,
  `status` varchar(25) NOT NULL,
  `catatan` tinytext,
  `notif_admin` varchar(1) NOT NULL DEFAULT '0',
  `notif_user` varchar(1) NOT NULL DEFAULT '0',
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` tinytext,
  `jenis_kelamin` enum('Laki Laki','Perempuan') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `no_hp`, `email`, `username`, `password`, `photo`, `status`, `token`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('USR000000000001', 'Adi', 'Sumbersari', 'Laki Laki', '2015-07-13', '089987776890', 'adi123@gmail.com', 'adi', 'adi123', NULL, 'Aktif', '', NULL, '2020-04-29 20:48:23', NULL, '2020-04-29 20:48:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `durasi_paket`
--
ALTER TABLE `durasi_paket`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indeks untuk tabel `isi_paket`
--
ALTER TABLE `isi_paket`
  ADD PRIMARY KEY (`id_isi_paket`);

--
-- Indeks untuk tabel `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_jenis_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_jenis_paket` (`id_jenis_paket`),
  ADD KEY `id_isi_paket` (`id_isi_paket`),
  ADD KEY `id_durasi` (`id_durasi`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_promo` (`id_promo`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_isi_paket`) REFERENCES `isi_paket` (`id_isi_paket`),
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_durasi`) REFERENCES `durasi_paket` (`id_durasi`),
  ADD CONSTRAINT `paket_ibfk_3` FOREIGN KEY (`id_jenis_paket`) REFERENCES `jenis_paket` (`id_jenis_paket`),
  ADD CONSTRAINT `paket_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
