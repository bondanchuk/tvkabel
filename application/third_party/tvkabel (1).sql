-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2018 pada 11.18
-- Versi server: 5.6.21
-- Versi PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvkabel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` enum('operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_kolektor`
--

CREATE TABLE `tmst_kolektor` (
  `id_kolektor` int(11) NOT NULL,
  `kolektor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_kolektor`
--

INSERT INTO `tmst_kolektor` (`id_kolektor`, `kolektor`) VALUES
(1, 'Bondan Chorisma'),
(2, 'x');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_marketing`
--

CREATE TABLE `tmst_marketing` (
  `id_marketing` int(11) NOT NULL,
  `marketing` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_marketing`
--

INSERT INTO `tmst_marketing` (`id_marketing`, `marketing`) VALUES
(4, 'BONDAN CHORISM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_pelanggan`
--

CREATE TABLE `tmst_pelanggan` (
  `no_registrasi` varchar(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `alamat2` text,
  `no_rumah` varchar(5) DEFAULT NULL,
  `keterangan_rumah` text,
  `keterangan_bangunan` text,
  `blok` varchar(5) DEFAULT NULL,
  `gang` varchar(30) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `kelurahan` varchar(40) DEFAULT NULL,
  `kecamatan` varchar(40) DEFAULT NULL,
  `keterangan_alamat` text,
  `telp_rumah` int(11) DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `type_bangunan` varchar(30) DEFAULT NULL,
  `id_kolektor` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_pelanggan`
--

INSERT INTO `tmst_pelanggan` (`no_registrasi`, `no_ktp`, `nama_lengkap`, `alamat`, `alamat2`, `no_rumah`, `keterangan_rumah`, `keterangan_bangunan`, `blok`, `gang`, `rt`, `rw`, `kelurahan`, `kecamatan`, `keterangan_alamat`, `telp_rumah`, `no_hp`, `type_bangunan`, `id_kolektor`, `status`, `jenis_pelanggan`) VALUES
('ID000001', '1234', 'BCHORISM', 'mutiara bintan', '', '18', '', '', 'A', '', 0, 0, '', '29122', '', 0, '08989747242', '', 1, 'Aktif', 1),
('ID000002', '21', '3213', '213213', NULL, '213', '23213', '213213', '21321', '23', 21321, 323, '213', '213', '', 0, '23213', '', 1, 'aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_pembayaran`
--

CREATE TABLE `tmst_pembayaran` (
  `jenis_pelanggan` int(11) NOT NULL,
  `iuran` int(11) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_pembayaran`
--

INSERT INTO `tmst_pembayaran` (`jenis_pelanggan`, `iuran`, `keterangan`) VALUES
(1, 60000, 'NON-PARALEL'),
(2, 71000, 'PARALEL 2TV'),
(3, 82000, 'PARALEL 3 TV'),
(4, 93000, 'PARALEL 4 TV'),
(5, 104000, 'PARALEL 5TV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_teknisi`
--

CREATE TABLE `tmst_teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `teknisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_teknisi`
--

INSERT INTO `tmst_teknisi` (`id_teknisi`, `teknisi`) VALUES
(1, 'BONDAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_mutasi`
--

CREATE TABLE `tran_mutasi` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(8) NOT NULL,
  `tanggal_mutasi` date NOT NULL,
  `alamat_mutasi` text NOT NULL,
  `id_teknisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_pelanggan`
--

CREATE TABLE `tran_pelanggan` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(8) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `id_marketing` int(11) NOT NULL,
  `jenis_pemasangan` enum('non-paralel','paralel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tran_pelanggan`
--

INSERT INTO `tran_pelanggan` (`id`, `no_registrasi`, `tanggal_daftar`, `id_teknisi`, `id_marketing`, `jenis_pemasangan`) VALUES
(12, 'ID000001', '2017-09-01', 1, 4, 'non-paralel'),
(16, 'ID000002', '2018-02-01', 1, 4, 'non-paralel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_pembayaran`
--

CREATE TABLE `tran_pembayaran` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(8) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bayar_bulan` date NOT NULL,
  `iuran` decimal(10,0) NOT NULL,
  `keterangan` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tran_pembayaran`
--

INSERT INTO `tran_pembayaran` (`id`, `no_registrasi`, `tanggal_bayar`, `bayar_bulan`, `iuran`, `keterangan`) VALUES
(2, 'ID000001', '2017-10-01', '2017-10-01', '71000', NULL),
(14, 'ID000001', '2018-01-21', '2018-01-21', '71000', NULL),
(15, 'ID000002', '2018-01-21', '2018-02-22', '71000', NULL),
(16, 'ID000001', '2018-01-21', '2018-03-20', '71000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_pemutusan`
--

CREATE TABLE `tran_pemutusan` (
  `id_pemutusan` int(11) NOT NULL,
  `no_registrasi` varchar(11) NOT NULL,
  `tanggal_putus` date NOT NULL,
  `jenis_pemutusan` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tran_status`
--

CREATE TABLE `tran_status` (
  `id` int(11) NOT NULL,
  `no_registrasi` varchar(11) NOT NULL,
  `tanggal_status` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `uraian` varchar(50) NOT NULL,
  `id_teknisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tran_status`
--

INSERT INTO `tran_status` (`id`, `no_registrasi`, `tanggal_status`, `status`, `uraian`, `id_teknisi`) VALUES
(1, 'ID000001', '2018-04-15', 'Putus Sementara', 'rumah kosong', 1),
(2, 'ID000001', '2018-04-15', 'Aktif', 'aktif kembali', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tmst_kolektor`
--
ALTER TABLE `tmst_kolektor`
  ADD PRIMARY KEY (`id_kolektor`);

--
-- Indeks untuk tabel `tmst_marketing`
--
ALTER TABLE `tmst_marketing`
  ADD PRIMARY KEY (`id_marketing`);

--
-- Indeks untuk tabel `tmst_pelanggan`
--
ALTER TABLE `tmst_pelanggan`
  ADD PRIMARY KEY (`no_registrasi`),
  ADD KEY `jenis_pelanggan` (`jenis_pelanggan`),
  ADD KEY `id_kolektor` (`id_kolektor`);

--
-- Indeks untuk tabel `tmst_pembayaran`
--
ALTER TABLE `tmst_pembayaran`
  ADD PRIMARY KEY (`jenis_pelanggan`);

--
-- Indeks untuk tabel `tmst_teknisi`
--
ALTER TABLE `tmst_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indeks untuk tabel `tran_mutasi`
--
ALTER TABLE `tran_mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_registrasi` (`no_registrasi`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indeks untuk tabel `tran_pelanggan`
--
ALTER TABLE `tran_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_registrasi` (`no_registrasi`),
  ADD KEY `id_teknisi` (`id_teknisi`),
  ADD KEY `id_marketing` (`id_marketing`);

--
-- Indeks untuk tabel `tran_pembayaran`
--
ALTER TABLE `tran_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- Indeks untuk tabel `tran_pemutusan`
--
ALTER TABLE `tran_pemutusan`
  ADD PRIMARY KEY (`id_pemutusan`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- Indeks untuk tabel `tran_status`
--
ALTER TABLE `tran_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teknisi` (`id_teknisi`),
  ADD KEY `no_registrasi` (`no_registrasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tmst_kolektor`
--
ALTER TABLE `tmst_kolektor`
  MODIFY `id_kolektor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tmst_marketing`
--
ALTER TABLE `tmst_marketing`
  MODIFY `id_marketing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tmst_teknisi`
--
ALTER TABLE `tmst_teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tran_mutasi`
--
ALTER TABLE `tran_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tran_pelanggan`
--
ALTER TABLE `tran_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tran_pembayaran`
--
ALTER TABLE `tran_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tran_pemutusan`
--
ALTER TABLE `tran_pemutusan`
  MODIFY `id_pemutusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tran_status`
--
ALTER TABLE `tran_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tmst_pelanggan`
--
ALTER TABLE `tmst_pelanggan`
  ADD CONSTRAINT `tmst_pelanggan_ibfk_1` FOREIGN KEY (`jenis_pelanggan`) REFERENCES `tmst_pembayaran` (`jenis_pelanggan`),
  ADD CONSTRAINT `tmst_pelanggan_ibfk_2` FOREIGN KEY (`id_kolektor`) REFERENCES `tmst_kolektor` (`id_kolektor`);

--
-- Ketidakleluasaan untuk tabel `tran_mutasi`
--
ALTER TABLE `tran_mutasi`
  ADD CONSTRAINT `tran_mutasi_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tmst_pelanggan` (`no_registrasi`),
  ADD CONSTRAINT `tran_mutasi_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `tmst_teknisi` (`id_teknisi`);

--
-- Ketidakleluasaan untuk tabel `tran_pelanggan`
--
ALTER TABLE `tran_pelanggan`
  ADD CONSTRAINT `tran_pelanggan_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tmst_pelanggan` (`no_registrasi`),
  ADD CONSTRAINT `tran_pelanggan_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `tmst_teknisi` (`id_teknisi`),
  ADD CONSTRAINT `tran_pelanggan_ibfk_3` FOREIGN KEY (`id_marketing`) REFERENCES `tmst_marketing` (`id_marketing`);

--
-- Ketidakleluasaan untuk tabel `tran_pembayaran`
--
ALTER TABLE `tran_pembayaran`
  ADD CONSTRAINT `tran_pembayaran_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tmst_pelanggan` (`no_registrasi`);

--
-- Ketidakleluasaan untuk tabel `tran_pemutusan`
--
ALTER TABLE `tran_pemutusan`
  ADD CONSTRAINT `tran_pemutusan_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tmst_pelanggan` (`no_registrasi`);

--
-- Ketidakleluasaan untuk tabel `tran_status`
--
ALTER TABLE `tran_status`
  ADD CONSTRAINT `tran_status_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tmst_pelanggan` (`no_registrasi`),
  ADD CONSTRAINT `tran_status_ibfk_2` FOREIGN KEY (`id_teknisi`) REFERENCES `tmst_teknisi` (`id_teknisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
