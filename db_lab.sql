-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2023 at 04:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `tbl_m_guru`
--

CREATE TABLE `tbl_m_guru` (
  `id_guru` int(25) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nip_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(225) NOT NULL,
  `no_telp_guru` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `pengampu_mapel` varchar(255) NOT NULL,
  `create_by_tmg` int(255) NOT NULL,
  `create_date_tmg` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmg` int(255) DEFAULT NULL,
  `updated_date_tmg` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_guru`
--

INSERT INTO `tbl_m_guru` (`id_guru`, `kode_guru`, `nip_guru`, `nama_guru`, `no_telp_guru`, `jenis_kelamin`, `pengampu_mapel`, `create_by_tmg`, `create_date_tmg`, `updated_by_tmg`, `updated_date_tmg`) VALUES
(1, 'SIM', '454545454', 'Agus', '0812', 'Laki-Laki', 'Simdig', 1, '2023-12-06 17:25:59', NULL, NULL),
(2, 'wew', '121212', 'fafa', '12121', 'Laki-Laki', 'dada', 1, '2023-12-06 17:46:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_kelas`
--

CREATE TABLE `tbl_m_kelas` (
  `id_kelas` int(25) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jumlah_siswa` int(255) NOT NULL,
  `created_by_tmk` int(225) NOT NULL,
  `created_date_tmk` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmk` int(255) DEFAULT NULL,
  `updated_date_tmk` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_kelas`
--

INSERT INTO `tbl_m_kelas` (`id_kelas`, `nama_kelas`, `jumlah_siswa`, `created_by_tmk`, `created_date_tmk`, `updated_by_tmk`, `updated_date_tmk`) VALUES
(1, 'kakdsa', 1223, 1, '2023-12-07 12:15:59', NULL, '2023-12-07 12:32:51'),
(3, 'tes', 123, 1, '2023-12-07 13:02:06', NULL, '2023-12-07 15:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_mapel`
--

CREATE TABLE `tbl_m_mapel` (
  `id_mapel` int(25) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `guru_pengampu` varchar(255) NOT NULL,
  `created_by_tmm` int(255) NOT NULL,
  `created_date_tmm` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmm` int(11) DEFAULT NULL,
  `updated_date_tmm` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_mapel`
--

INSERT INTO `tbl_m_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `jurusan`, `periode`, `guru_pengampu`, `created_by_tmm`, `created_date_tmm`, `updated_by_tmm`, `updated_date_tmm`) VALUES
(5, 'SIM', 'tes', 'if', '1222', 'Agus', 1, '2023-12-07 15:29:46', NULL, NULL),
(6, 'SGK', 'TES', 'PSGD', '323232', 'fafa', 1, '2023-12-07 15:45:56', NULL, NULL),
(7, 'SIM', '12212', 'PSGD', '1222', 'Agus', 1, '2023-12-07 15:53:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_ruangan`
--

CREATE TABLE `tbl_m_ruangan` (
  `id_ruangan` int(25) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `kapasitas_ruangan` int(255) NOT NULL,
  `created_by_tmr` int(225) NOT NULL,
  `created_date_tmr` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_tmr` int(255) DEFAULT NULL,
  `updated_date_tmr` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_ruangan`
--

INSERT INTO `tbl_m_ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas_ruangan`, `created_by_tmr`, `created_date_tmr`, `updated_by_tmr`, `updated_date_tmr`) VALUES
(7, 'tes', 12, 1, '2023-12-07 15:39:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `id_m_user` int(25) NOT NULL,
  `name_m_user` varchar(255) NOT NULL,
  `email_m_user` varchar(255) NOT NULL,
  `password_m_user` varchar(225) NOT NULL,
  `role_m_user` enum('super_admin','kepala_lab','staff_lab') NOT NULL,
  `created_by_m_user` int(255) NOT NULL,
  `created_date_m_user` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by_m_user` int(255) DEFAULT NULL,
  `updated_date_m_user` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_m_user`
--

INSERT INTO `tbl_m_user` (`id_m_user`, `name_m_user`, `email_m_user`, `password_m_user`, `role_m_user`, `created_by_m_user`, `created_date_m_user`, `updated_by_m_user`, `updated_date_m_user`) VALUES
(1, 'Super Admin', 'superadmin@sipelantis.com', '$2a$12$P/T0eMfqWe35zqR3ofVzf.FhQ.tDaCQdVoEQT7Ms2AcVmmHiCqSji', 'super_admin', 1, '2023-12-06 17:21:59', NULL, NULL),
(2, 'Staff Sipelantis', 'staff@sipelantis.com', '$2a$12$DKDmcoAhefzWA7fFxJCqmeC05Vx1kEfKUjWxD9Hf2K.ijKAfHTqxm', 'staff_lab', 1, '2023-12-06 17:22:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_jadwal`
--

CREATE TABLE `tbl_t_jadwal` (
  `id_jadwal` int(25) NOT NULL,
  `hari_ttj` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_guru` int(25) NOT NULL,
  `id_mapel` int(25) NOT NULL,
  `id_ruangan` int(25) NOT NULL,
  `id_kelas` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_m_guru`
--
ALTER TABLE `tbl_m_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_m_kelas`
--
ALTER TABLE `tbl_m_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_m_mapel`
--
ALTER TABLE `tbl_m_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_m_ruangan`
--
ALTER TABLE `tbl_m_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`id_m_user`);

--
-- Indexes for table `tbl_t_jadwal`
--
ALTER TABLE `tbl_t_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_m_guru`
--
ALTER TABLE `tbl_m_guru`
  MODIFY `id_guru` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_m_kelas`
--
ALTER TABLE `tbl_m_kelas`
  MODIFY `id_kelas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_m_mapel`
--
ALTER TABLE `tbl_m_mapel`
  MODIFY `id_mapel` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_m_ruangan`
--
ALTER TABLE `tbl_m_ruangan`
  MODIFY `id_ruangan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `id_m_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_t_jadwal`
--
ALTER TABLE `tbl_t_jadwal`
  MODIFY `id_jadwal` int(25) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_t_jadwal`
--
ALTER TABLE `tbl_t_jadwal`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `tbl_m_guru` (`id_guru`),
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_m_kelas` (`id_kelas`),
  ADD CONSTRAINT `id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_m_mapel` (`id_mapel`),
  ADD CONSTRAINT `id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_m_ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
