-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2023 pada 04.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_guru`
--

CREATE TABLE `tbl_m_guru` (
  `id_guru` int(25) NOT NULL,
  `nip_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `create_by_tmg` int(255) NOT NULL,
  `create_date_tmg` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmg` int(255) DEFAULT NULL,
  `updated_date_tmg` timestamp NULL DEFAULT NULL,
  `telpon_guru` varchar(15) NOT NULL,
  `pengampu_mapel` varchar(255) NOT NULL,
  `kode_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_jadwal`
--

CREATE TABLE `tbl_m_jadwal` (
  `id_jadwal` int(25) NOT NULL,
  `hari_tmj` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_kelas` int(25) NOT NULL,
  `id_ruangan` int(25) NOT NULL,
  `id_guru` int(25) NOT NULL,
  `id_mapel` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_kelas`
--

CREATE TABLE `tbl_m_kelas` (
  `id_kelas` int(25) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_by_tmk` int(255) NOT NULL,
  `created_date_tmk` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmk` int(255) DEFAULT NULL,
  `updated_date_tmk` timestamp NULL DEFAULT NULL,
  `jumlah_siswa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_mapel`
--

CREATE TABLE `tbl_m_mapel` (
  `id_mapel` int(25) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `created_by_tmm` int(255) NOT NULL,
  `created_date_tmm` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmm` int(255) DEFAULT NULL,
  `updated_date_tmm` timestamp NULL DEFAULT NULL,
  `jurusan` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_ruangan`
--

CREATE TABLE `tbl_m_ruangan` (
  `id_ruangan` int(25) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `created_by_tmr` int(255) NOT NULL,
  `created_date_tmr` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmr` int(255) DEFAULT NULL,
  `updated_date_tmr` timestamp NULL DEFAULT NULL,
  `kapasitas_ruangan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `id_m_user` int(25) NOT NULL,
  `name_m_user` varchar(255) NOT NULL,
  `email_m_user` varchar(255) NOT NULL,
  `password_m_user` varchar(255) NOT NULL,
  `role_m_user` enum('super_admin','kepala_lab','staff_lab') NOT NULL,
  `created_by_m_user` int(255) NOT NULL,
  `created_date_m_user` timestamp NULL DEFAULT current_timestamp(),
  `updated_by_m_user` int(255) DEFAULT NULL,
  `updated_date_m_user` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_m_guru`
--
ALTER TABLE `tbl_m_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_m_jadwal`
--
ALTER TABLE `tbl_m_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `tbl_m_kelas`
--
ALTER TABLE `tbl_m_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_m_mapel`
--
ALTER TABLE `tbl_m_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_m_ruangan`
--
ALTER TABLE `tbl_m_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`id_m_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_m_guru`
--
ALTER TABLE `tbl_m_guru`
  MODIFY `id_guru` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_jadwal`
--
ALTER TABLE `tbl_m_jadwal`
  MODIFY `id_jadwal` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_kelas`
--
ALTER TABLE `tbl_m_kelas`
  MODIFY `id_kelas` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_mapel`
--
ALTER TABLE `tbl_m_mapel`
  MODIFY `id_mapel` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_ruangan`
--
ALTER TABLE `tbl_m_ruangan`
  MODIFY `id_ruangan` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `id_m_user` int(25) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_m_jadwal`
--
ALTER TABLE `tbl_m_jadwal`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_m_guru` (`id_guru`),
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_m_kelas` (`id_kelas`),
  ADD CONSTRAINT `id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_m_mapel` (`id_mapel`),
  ADD CONSTRAINT `id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_m_ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
