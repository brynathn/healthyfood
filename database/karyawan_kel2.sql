-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 07:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan_kel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `nik` int(8) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status_kerja` enum('Tetap','Tidak Tetap') NOT NULL,
  `position` varchar(10) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `responsibility` decimal(10,2) NOT NULL,
  `teamwork` decimal(10,2) NOT NULL,
  `management_time` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `grade` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`nik`, `foto`, `nama`, `status_kerja`, `position`, `tgl_penilaian`, `responsibility`, `teamwork`, `management_time`, `total`, `grade`) VALUES
(12345678, 'Kang Yeosang-65432b766df6b.png', 'Kang Yeosang', 'Tidak Tetap', 'Magang', '2023-11-02', 66.00, 45.00, 45.00, 51.30, 'C'),
(19486732, 'Huening Bahiyyih-6543308ec8d90.png', 'Huening Bahiyyih', 'Tidak Tetap', 'Produksi', '2023-11-02', 88.00, 78.00, 98.00, 89.00, 'A'),
(23784615, 'Choi Yena-65432ae85f0cb.png', 'Choi Yena', 'Tetap', 'Personalia', '2023-11-02', 35.00, 45.00, 35.00, 38.00, 'D'),
(27384956, 'Huh Yunjin-654332b73328f.png', 'Huh Yunjin', 'Tidak Tetap', 'Magang', '2023-11-02', 89.00, 91.00, 88.00, 89.20, 'A'),
(36512498, 'Kim Sunwoo-654330fa4a88a.png', 'Kim Sunwoo', 'Tidak Tetap', 'Marketing', '2023-11-02', 77.00, 76.00, 66.00, 72.30, 'B'),
(38569274, 'Na Jaemin-65432ba433232.png', 'Na Jaemin', 'Tidak Tetap', 'Magang', '2023-11-02', 55.00, 65.00, 45.00, 54.00, 'C'),
(40271586, 'Song Mingi-65432e85caa12.png', 'Song Mingi', 'Tetap', 'Produksi', '2023-11-02', 87.00, 98.00, 78.00, 86.70, 'A'),
(45981327, 'Kim Sejeong-65432b1f28ec1.png', 'Kim Sejeong', 'Tetap', 'Marketing', '2023-11-02', 45.00, 40.00, 35.00, 39.50, 'D'),
(54918273, 'Song Yuqi-65432f112728a.png', 'Song Yuqi', 'Tetap', 'Marketing', '2023-11-02', 88.00, 86.00, 83.00, 85.40, 'A'),
(57281934, 'Park Seonghwa-65432a2bcf993.png', 'Park Seonghwa', 'Tetap', 'Marketing', '2023-11-02', 55.00, 60.00, 57.00, 57.30, 'C'),
(63248719, 'Lee Jiheon-65432f91aa0ea.png', 'Lee Jiheon', 'Tetap', 'Produksi', '2023-11-02', 78.00, 88.00, 75.00, 79.80, 'B'),
(64827193, 'Jung Wooyoung-65432c0a3cd5c.png', 'Jung Wooyoung', 'Tidak Tetap', 'Magang', '2023-11-02', 34.00, 43.00, 41.00, 39.50, 'D'),
(69473821, 'Mark Lee-65432a4e90752.png', 'Mark Lee', 'Tetap', 'Penjualan', '2023-11-02', 67.00, 54.00, 44.00, 53.90, 'C'),
(73658914, 'Choi Yeonjun-65432d5d14bbb.png', 'Choi Yeonjun', 'Tetap', 'Penjualan', '2023-11-02', 95.00, 80.00, 88.00, 87.70, 'A'),
(75932468, 'Jang Wonyoung-65432c46a6572.png', 'Jang Wonyoung', 'Tidak Tetap', 'Magang', '2023-11-02', 43.00, 23.00, 40.00, 35.80, 'D'),
(81024579, 'Jeon Wonwoo-65432a9edb3f7.png', 'Jeon Wonwoo', 'Tetap', 'IT', '2023-11-02', 45.00, 56.00, 53.00, 51.50, 'C'),
(82734561, 'Shin Ryujin-6543300d1db60.png', 'Shin Ryujin', 'Tidak Tetap', 'Penjualan', '2023-11-02', 87.00, 77.00, 93.00, 86.40, 'A'),
(91827364, 'Lee Taeyong-65432eb1ea96a.png', 'Lee Taeyong', 'Tetap', 'Personalia', '2023-11-02', 87.00, 75.00, 78.00, 79.80, 'B'),
(92674153, 'Yoo Jimin-65432bc9336f9.png', 'Yoo Jimin', 'Tidak Tetap', 'Magang', '2023-11-02', 34.00, 35.00, 40.00, 36.70, 'D'),
(98652347, 'Kim Minjeong-6543316e9af7b.png', 'Kim Minjeong', 'Tidak Tetap', 'Magang', '2023-11-02', 87.00, 70.00, 70.00, 75.10, 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
