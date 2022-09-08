-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2022 pada 15.26
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdanak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` char(30) NOT NULL DEFAULT '',
  `password` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id_user` int(4) NOT NULL,
  `nama` char(30) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `alamat` char(50) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id_user`, `nama`, `kelamin`, `alamat`, `kd_penyakit`, `noip`, `email`, `tanggal`) VALUES
(1, 'Iqra Raissa Fajriana', 'perempuan', 'Gg Amsar Cipedak Jagakarsa', 'S1', '1', 'iqraraissa2gmail.com', '2022-07-18 14:15:50'),
(2, 'raissa', 'perempuan', 'Gg Amsar Cipedak Jagakarsa', 'S2', '2', 'iqraraissa2gmail.com', '2022-08-22 14:58:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` char(10) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `kd_penyakit`, `nilai`) VALUES
('', 'P1', 0.25),
('', 'P1', 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G01', 'Demam'),
('G02', 'Pusing'),
('G03', 'Kekurangan Cairan'),
('G04', 'Tensi Darah Rendah'),
('G05', 'Tulang Gusi Luka'),
('G06', 'Nadi Terasa Lemah'),
('G07', 'Muntah'),
('G08', 'Nadi Lemah'),
('G09', 'Pendarahan Kulit'),
('G10', 'Telinga Berdarah'),
('G11', 'Schock'),
('G12', 'Nadi Tidak Teraba'),
('G13', 'Tekanan Drastis'),
('G14', 'Mata Berdarah'),
('G15', 'Bab Berdarah'),
('G16', 'Mimisan'),
('G17', 'Tangan dan kaki terasa basah'),
('G18', 'Dingin'),
('G19', 'Mual dan muntah'),
('G20', 'Nafsu makan menurun'),
('G21', 'Menggigau'),
('G22', 'Penurunan BB'),
('G58', 'Indurasi uji tuberkulin dengan kuantitas >=15 mm (toleransi 5 mm)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_cf_penyakit`
--

CREATE TABLE `nilai_cf_penyakit` (
  `idcf` int(3) NOT NULL,
  `certainty_term` varchar(30) NOT NULL,
  `nilai_mbmd` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_cf_penyakit`
--

INSERT INTO `nilai_cf_penyakit` (`idcf`, `certainty_term`, `nilai_mbmd`) VALUES
(1, 'Bukan', 0.2),
(2, 'Mungkin', 0.4),
(3, 'Kemungkinan Besar', 0.6),
(4, 'Hampir Pasti', 0.8),
(5, 'Pasti', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `usia` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `email` char(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `kelamin`, `usia`, `alamat`, `handphone`, `noip`, `email`, `tanggal`) VALUES
(150, 'aira', 'Laki-laki', '12', 'cianjur', '123', '::1', 'iqraraissa@gmail.com', '2022-08-22 14:53:20'),
(151, 'rara', 'Perempuan', '12', 'Amsar, Cipedak, Jagakarsa, Jakarta Selatan', '082246100800', '::1', 'iqraraissa@gmail.com', '2022-08-22 15:20:28'),
(147, 'Iqra Raissa Fajriana ', 'Perempuan', '12', 'Amsar, Cipedak, Jagakarsa, Jakarta Selatan', '082246100800', '::1', 'iqraraissa@gmail.com', '2022-08-22 14:03:11'),
(148, 'rara', 'Perempuan', '14', 'Amsar, Cipedak, Jagakarsa, Jakarta Selatan', '082246100800', '::1', 'iqraraissa@gmail.com', '2022-08-22 14:07:44'),
(149, 'rara raissa', 'Perempuan', '5', 'Amsar, Cipedak, Jagakarsa, Jakarta Selatan', '082246100800', '::1', 'iqraraissa@gmail.com', '2022-08-22 14:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit_solusi`
--

CREATE TABLE `penyakit_solusi` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` char(50) DEFAULT NULL,
  `jenis_penyakit` varchar(10) DEFAULT NULL,
  `definisi` text NOT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit_solusi`
--

INSERT INTO `penyakit_solusi` (`kd_penyakit`, `nama_penyakit`, `jenis_penyakit`, `definisi`, `solusi`) VALUES
('S1', 'Demam Berdarah Dangue (DBD)', 'DBD-DEN1', 'Demam, Pusing, Kekurangan Cairan', 'Sesuai dengan data medis anak anda mengalami penyakit DBD Derajat DEN-1, Kami menyarankan anak anda Minum banyak cairan\r\nIstirahat yang cukup Konsumsi makanan yang dapat menaikkan jumlah trombosit (seperti jus jambu biji merah) Minum obat penurun demam, seperti paracetamol dan membunuh nyamuk baik dengan insektisida maupun ovitrap, yakni bak perangkap yang ditutup kasa'),
('S2', 'Demam Berdarah Dangue (DBD)', 'DBD-DEN2', 'Tensi Rendah|Muntah|Tulang Gusi Luka|Dan Nadi Lemah\r\n', 'Sesuai dengan data medis anak anda mengalami penyakit DBD Derajat DEN-2\r\nUntuk membantu proses pemulihan, berikan makanan yang lunak dan kaya zat besi seperti daging sapi, sayuran hijau, kacang-kacangan, serta vitamin C untuk memperkuat daya tahan tubuh. Pastikan penderita juga cukup makan buah dan sayur agar tidak mengalami sembelit atau gangguan pencernaan.\r\n\r\nMemberikan banyak cairan pada anak untuk mencegah dehidrasi, baik dalam bentuk makanan atau minuman\r\n'),
('S3', 'Demam Berdarah Dangue (DBD)', 'DBD-DEN3', 'Terjadi Pendarahan Kulit | Gejala Pendarahan Gusi | Gejala Telinga Berdarah\r\n| Schok | Nadi Tidak Teraba | Tekanan Drastis | Mata Berdarah | BAB Berdarah | Mimisan | Tangan dan Kaki terasa basah\r\n', 'Sesuai dengan data medis anak anda mengalami penyakit DBD Derajat DEN-3.\r\nAnda harus menghubungi dokter bila mengalami berbagai gejala seperti yang telah disebutkan dengan memberikan cairan melalui infus, memonitor kecukupan cairan melalui pemeriksaan tekanan darah, jumlah air seni, dan pemeriksaan laboratorium setiap 6-12 jam. \r\n\r\nPada kondisi syok atau perdarahan, terkadang transfusi darah juga perlu dilakukan. DBD-DEN3 Sangatlah berbahaya karena dapat dikatakan virus yang paling ganas. 3M adalah cara yang mudah dilakukan dan tidak perlu biaya sangat erat hubungannya dengan kebiasaan hidup bersih dan rendahnya kesadaran masyarakat terhadap bahaya demam berdarah ini.\r\n\r\n'),
('S4', 'Demam Berdarah Dangue (DBD)', 'DBD-DEN4', 'Demam dengan badan terasa dingin | Mual dan Muntah |Nafsu Makan Turun | Menggigau | \r\ndan Penurunan BB\r\n', 'Sesuai dengan data medis anak anda mengalami penyakit DBD Derajat DEN-4 Kami menyarankan anak anda harus pergi ke fasilitas kesehatan terdekat dan tetap menjaga Lingkungan yang kondusif. Mengkonsumsi makanan yang bisa mempercepat penyembuhan DBD seperti Jambu biji, Daun Pepaya, Buah Kurma dan Buah Naga.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `kd_gejala`, `kd_penyakit`) VALUES
(367, 'G01', 'S1'),
(366, 'G58', 'P4'),
(365, 'G57', 'P4'),
(364, 'G55', 'P4'),
(363, 'G22', 'P4'),
(362, 'G21', 'P4'),
(361, 'G20', 'P4'),
(360, 'G19', 'P4'),
(359, 'G18', 'P4'),
(358, 'G17', 'P3'),
(357, 'G16', 'P3'),
(356, 'G15', 'P3'),
(355, 'G14', 'P3'),
(354, 'G13', 'P3'),
(353, 'G12', 'P3'),
(352, 'G11', 'P3'),
(351, 'G10', 'P3'),
(350, 'G09', 'P3'),
(349, 'G07', 'P2'),
(348, 'G06', 'P2'),
(345, 'G03', 'P1'),
(344, 'G02', 'P1'),
(343, 'G01', 'P1'),
(347, 'G05', 'P2'),
(346, 'G04', 'P2'),
(320, 'G01', 'NULL'),
(321, 'G02', 'NULL'),
(322, 'G03', 'NULL'),
(323, 'G04', 'NULL'),
(324, 'G05', 'NULL'),
(325, 'G06', 'NULL'),
(326, 'G07', 'NULL'),
(327, 'G08', 'NULL'),
(328, 'G09', 'NULL'),
(329, 'G10', 'NULL'),
(330, 'G11', 'NULL'),
(331, 'G12', 'NULL'),
(332, 'G13', 'NULL'),
(333, 'G14', 'NULL'),
(334, 'G15', 'NULL'),
(335, 'G16', 'NULL'),
(336, 'G17', 'NULL'),
(337, 'G18', 'NULL'),
(338, 'G19', 'NULL'),
(339, 'G20', 'NULL'),
(340, 'G55', 'NULL'),
(341, 'G57', 'NULL'),
(342, 'G58', 'NULL'),
(368, 'G02', 'S1'),
(369, 'G03', 'S1'),
(370, 'G04', 'S2'),
(371, 'G05', 'S2'),
(372, 'G06', 'S2'),
(373, 'G07', 'S2'),
(374, 'G09', 'S3'),
(375, 'G10', 'S3'),
(376, 'G11', 'S3'),
(377, 'G12', 'S3'),
(378, 'G13', 'S3'),
(379, 'G14', 'S3'),
(380, 'G15', 'S3'),
(381, 'G16', 'S3'),
(382, 'G17', 'S3'),
(383, 'G18', 'S4'),
(384, 'G19', 'S4'),
(385, 'G20', 'S4'),
(386, 'G21', 'S4'),
(387, 'G22', 'S4'),
(388, 'G58', 'S4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` int(3) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`noip`, `kd_gejala`, `bobot`) VALUES
(244, 'G09', 0),
(245, 'G10', 0),
(246, 'G11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `usia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `email` char(30) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `usia`, `alamat`, `handphone`, `noip`, `email`, `tanggal`) VALUES
(177, 'rara', 'Perempuan', '12', 'Amsar, Cipedak, Jagakarsa, Jakarta Selatan', '082246100800', '::1', 'iqraraissa@gmail.com', '2022-08-22 15:20:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `nilai_cf_penyakit`
--
ALTER TABLE `nilai_cf_penyakit`
  ADD PRIMARY KEY (`idcf`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `penyakit_solusi`
--
ALTER TABLE `penyakit_solusi`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indeks untuk tabel `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indeks untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`noip`);

--
-- Indeks untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai_cf_penyakit`
--
ALTER TABLE `nilai_cf_penyakit`
  MODIFY `idcf` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `noip` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT untuk tabel `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
