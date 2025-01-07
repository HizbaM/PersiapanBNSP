-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 08:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `semester` int NOT NULL,
  `ipk` int NOT NULL,
  `id` int NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `nama`, `email`, `hp`, `semester`, `ipk`, `id`, `status_pengajuan`, `filename`) VALUES
(8, 'Asep Atep Apep', 'asepatepapepganteng@gmail.com', '087998711237', 6, 3, 1, 'Belum Terverifikasi', '470685225_122158400660308663_6171368243761723392_n.jpg'),
(9, 'Tuyut Teruy', 'tuyutteruy@gmail.com', '081342516542', 3, 3, 2, 'Belum Terverifikasi', '470685225_122158400660308663_6171368243761723392_n.jpg'),
(10, 'Terew Werere', 'terewwerere@gmail.com', '087654444431', 4, 3, 2, 'Belum Terverifikasi', '471307396_122195380220231929_6510383626710920186_n.jpg'),
(11, 'Fufu Fafa', 'fufufafa@gmail.com', '087898886654', 4, 3, 1, 'Belum Terverifikasi', '471740606_594705146639427_2527073508805120983_n.jpg'),
(12, 'Dedi Marsudi', 'dedimarsudi@gmail.com', '087111424235', 8, 4, 1, 'Belum Terverifikasi', '470684443_1359448781707761_2403346167873898616_n.jpg'),
(13, 'Wwer', 'wwer@gmail.com', '087777554532', 8, 4, 2, 'Belum Terverifikasi', '472118276_628688462836003_7968172069454271989_n.jpg'),
(14, 'Kokom Momok', 'kokommomok@gmail.com', '089976545443', 7, 3, 1, 'Belum Terverifikasi', '472279979_1579881259558568_4218702026100436651_n.jpg'),
(15, 'Ratta Tarra', 'rattatarra@gmail.com', '087765543237', 4, 4, 2, 'Belum Terverifikasi', '471142416_1313764176462203_6992000857989848228_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_daftar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
