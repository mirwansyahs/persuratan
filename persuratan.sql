-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Sep 2022 pada 04.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `surat_jenis` enum('masuk','keluar') NOT NULL DEFAULT 'masuk',
  `judul_surat` varchar(255) DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `user_id`, `surat_jenis`, `judul_surat`, `file_surat`, `tanggal_surat`) VALUES
(6, 1, 'masuk', 'BA HTTHTPD', '367d1119b1f4e754b1d9f684df5c1637.docx', '2022-09-26'),
(7, 1, 'masuk', 'DATA', 'b524f03678b45b8d242d7556a13266ef.docx', '2022-09-26'),
(8, 1, 'masuk', 'Antara News', '266ab75adab796defdb05afd2bb80758.docx', '2022-09-26'),
(9, 1, 'masuk', 'Pemerintah Provinsi Nusa Tenggara Barat', '9debc94faf7109d78fef921090bb5a70.docx', '2022-09-26'),
(10, 1, 'masuk', 'PT. Hotel Syariah Indonesia', '916820f797f39e3c6856a0d4e5af750b.docx', '2022-09-26'),
(11, 1, 'masuk', 'Permohonan Surat Rekomendasi (IBTI)', 'beef78a8d9a67e8a32160167d1fa7c2a.docx', '2022-09-26'),
(12, 1, 'masuk', 'Rekomendasi Rumah Yatim', '4bae529889b58aec21a1ce14d58dff23.docx', '2022-09-26'),
(13, 1, 'masuk', 'Undian Radar Lombok', 'f28c957e2161c42661033679f9f7f650.docx', '2022-09-26'),
(14, 1, 'masuk', 'Yayasan Luni', '57285833affd68b2e592e58b4cea4f18.docx', '2022-09-26'),
(15, 1, 'masuk', 'Yayasan Luni Lombok', '9614eea52a2a30a46eb7d6886599fb84.docx', '2022-09-26'),
(16, 1, 'masuk', 'Wulan', 'dde923deb0d402d5165d594bfebab026.docx', '2022-09-26'),
(17, 1, 'keluar', 'Pengajuan Dana', '0c3d33796ce4eebfcc9225a0d148c25c.docx', '2022-09-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Administrator', 'mirwansyah1933@gmail.com', '48bccdb9a0c0675a9160313d5030ec5e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD CONSTRAINT `tbl_surat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
