-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2019 pada 04.33
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
-- Database: `db_agenda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(10) NOT NULL,
  `acara` varchar(255) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `dispo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id`, `tgl`, `jam`, `acara`, `tempat`, `dispo`) VALUES
(14, '2019-09-02', '13.00', 'Nyumbang Pendamping Desa', 'Desa Karangrejo', 'Semua Staf Kec. Gajah'),
(15, '2019-09-02', '13.00', 'Penyusunan LK', 'BPKPAD', 'Kasubag Keu'),
(16, '2019-09-02', '12.00', 'Kegiatan Pramuka', 'Lap. Desa Gajah', 'Camat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_identitas`
--

INSERT INTO `tb_identitas` (`id`, `nama`, `alamat`, `telp`) VALUES
(1, 'Kecamatan Gajah', 'Jl. Raya Gajah No. 45 Demak', '(0291) 685250');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_news`
--

INSERT INTO `tb_news` (`id`, `news`) VALUES
(1, 'Mari saling menghormati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `user`, `pass`, `nama`, `opd`, `alamat`, `telp`) VALUES
(2, 'ngadmin', '$2y$10$A3X6MaSUcXM4jTMITibGF.Nnh5N3v4thYQWvAmrn67Oe1MnWkiobm', 'Arissatur Rohman', 'Kecamatan Gajah', 'Jl. Raya Gajah No. 45 Demak', '(0291) 685250');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
