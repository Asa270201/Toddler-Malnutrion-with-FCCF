-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spforwardcf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass`, `nama`) VALUES
(1, 'admin', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode`, `nama_gejala`) VALUES
(25, 'G01', 'Mata Kering'),
(26, 'G02', 'Sulit Melihat di Malam Hari'),
(27, 'G03', 'Kulit Kering'),
(28, 'G04', 'Kuku Rapuh'),
(29, 'G05', 'Ulkus Kornea (Luka Pada Mata)'),
(30, 'G06', 'Bintik Putih Pada Mata'),
(31, 'G07', 'Mudah Lelah'),
(32, 'G08', 'Nyeri Tulang dan Otot'),
(33, 'G10', 'Kelemahan Pada Otot'),
(34, 'G11', 'Pertumbuhan Tulang Terhambat'),
(35, 'G12', 'Kulit Mudah Memar'),
(36, 'G13', 'Proses Penyembuhan Luka Lama'),
(37, 'G14', 'Gusi Berdarah atau Sariawan'),
(38, 'G15', 'Rambut Kering dan Rontok'),
(39, 'G16', 'Kulit Pucat'),
(40, 'G17', 'Atropic Pada Lidah'),
(41, 'G18', 'Angular Cheilitis'),
(42, 'G19', 'Tangan dan Kaki Dingin'),
(43, 'G20', 'Nafas Cepat Yang Tidak Normal'),
(44, 'G21', 'Masalah Pada Gigi'),
(45, 'G22', 'Anemia'),
(46, 'G23', 'Gangguan Neurologis'),
(47, 'G24', 'Gangguan Pencernaan'),
(48, 'G09', 'Tulang Bengkok');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `kode`, `nama`) VALUES
(12, 'P01', 'Kekurangan Vitamin A'),
(13, 'P02', 'Kekurangan Vitamin D'),
(14, 'P03', 'Kekurangan Vitamin C'),
(15, 'P04', 'Kekurangan Zat Besi'),
(16, 'P05', 'Kekurangan Kalsium'),
(17, 'P06', 'Kekurangan Vitamin B');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `persentase` float NOT NULL,
  `kerusakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `id_pasien`, `persentase`, `kerusakan`) VALUES
(96, 9, 90.94, 'Kekurangan Kalsium'),
(97, 10, 91.29, 'Kekurangan Kalsium'),
(98, 11, 91.86, 'Kekurangan Vitamin A'),
(99, 12, 91.29, 'Kekurangan Vitamin B'),
(100, 13, 91.29, 'Kekurangan Vitamin C'),
(101, 14, 90.24, 'Kekurangan Kalsium'),
(102, 15, 91.29, 'Kekurangan Vitamin B'),
(103, 16, 91.43, 'Kekurangan Zat Besi'),
(104, 17, 91.86, 'Kekurangan Vitamin A'),
(105, 18, 91.43, 'Kekurangan Zat Besi'),
(106, 19, 91.86, 'Kekurangan Vitamin A'),
(107, 8, 85.09, 'Kekurangan Vitamin A'),
(108, 8, 85.09, 'Kekurangan Vitamin A'),
(109, 8, 85.09, 'Kekurangan Vitamin A'),
(110, 8, 85.09, 'Kekurangan Vitamin A'),
(111, 8, 85.09, 'Kekurangan Vitamin A'),
(112, 8, 85.09, 'Kekurangan Vitamin A'),
(113, 8, 85.09, 'Kekurangan Vitamin A'),
(114, 8, 85.09, 'Kekurangan Vitamin A'),
(115, 8, 85.09, 'Kekurangan Vitamin A'),
(116, 8, 85.09, 'Kekurangan Vitamin A'),
(117, 8, 85.09, 'Kekurangan Vitamin A'),
(118, 8, 85.09, 'Kekurangan Vitamin A'),
(119, 8, 85.09, 'Kekurangan Vitamin A'),
(120, 8, 85.09, 'Kekurangan Vitamin A'),
(121, 8, 85.09, 'Kekurangan Vitamin A'),
(122, 8, 85.09, 'Kekurangan Vitamin A'),
(123, 8, 85.09, 'Kekurangan Vitamin A'),
(124, 8, 85.09, 'Kekurangan Vitamin A'),
(125, 8, 85.09, 'Kekurangan Vitamin A'),
(126, 8, 90, 'Kekurangan Vitamin A'),
(127, 8, 85.09, 'Kekurangan Vitamin A'),
(128, 8, 85.09, 'Kekurangan Vitamin A'),
(129, 8, 85.09, 'Kekurangan Vitamin A'),
(130, 8, 85.09, 'Kekurangan Vitamin A'),
(131, 8, 85.09, 'Kekurangan Vitamin A'),
(132, 8, 85.09, 'Kekurangan Vitamin A'),
(133, 8, 85.09, 'Kekurangan Vitamin A'),
(134, 8, 85.09, 'Kekurangan Vitamin A'),
(135, 8, 85.09, 'Kekurangan Vitamin A'),
(136, 8, 85.09, 'Kekurangan Vitamin A'),
(137, 8, 85.09, 'Kekurangan Vitamin A'),
(138, 8, 85.09, 'Kekurangan Vitamin A'),
(139, 8, 85.09, 'Kekurangan Vitamin A'),
(140, 8, 0, 'Tidak Terdiagnosa'),
(141, 8, 89.6, 'Kekurangan Vitamin A'),
(142, 8, 90.94, 'Kekurangan Kalsium'),
(143, 8, 90.94, 'Kekurangan Kalsium'),
(144, 8, 90.94, 'Kekurangan Kalsium'),
(145, 31, 82.83, 'Kekurangan Vitamin A'),
(146, 31, 82.24, 'Kekurangan Vitamin D'),
(147, 9, 88.05, 'Kekurangan Vitamin A'),
(148, 9, 86.88, 'Kekurangan Vitamin D'),
(149, 9, 84.24, 'Kekurangan Vitamin A'),
(150, 9, 84.24, 'Kekurangan Vitamin A'),
(151, 9, 84.24, 'Kekurangan Vitamin A'),
(152, 9, 86.78, 'Kekurangan Vitamin A'),
(153, 9, 86.78, 'Kekurangan Vitamin A'),
(154, 9, 86.78, 'Kekurangan Vitamin A'),
(155, 9, 86.78, 'Kekurangan Vitamin A'),
(156, 9, 86.78, 'Kekurangan Vitamin A'),
(157, 9, 86.78, 'Kekurangan Vitamin A'),
(158, 9, 86.78, 'Kekurangan Vitamin A'),
(159, 9, 86.78, 'Kekurangan Vitamin A'),
(160, 9, 86.78, 'Kekurangan Vitamin A'),
(161, 9, 86.78, 'Kekurangan Vitamin A'),
(162, 9, 86.78, 'Kekurangan Vitamin A'),
(163, 9, 86.78, 'Kekurangan Vitamin A'),
(164, 9, 86.78, 'Kekurangan Vitamin A'),
(165, 9, 86.78, 'Kekurangan Vitamin A'),
(166, 9, 86.78, 'Kekurangan Vitamin A'),
(167, 9, 86.78, 'Kekurangan Vitamin A'),
(168, 9, 86.78, 'Kekurangan Vitamin A'),
(169, 9, 86.78, 'Kekurangan Vitamin A'),
(170, 9, 86.78, 'Kekurangan Vitamin A'),
(171, 9, 86.78, 'Kekurangan Vitamin A'),
(172, 9, 86.78, 'Kekurangan Vitamin A'),
(173, 9, 86.78, 'Kekurangan Vitamin A'),
(174, 9, 86.78, 'Kekurangan Vitamin A'),
(175, 9, 86.78, 'Kekurangan Vitamin A'),
(176, 9, 86.78, 'Kekurangan Vitamin A'),
(177, 9, 86.78, 'Kekurangan Vitamin A'),
(178, 9, 86.78, 'Kekurangan Vitamin A'),
(179, 9, 86.78, 'Kekurangan Vitamin A'),
(180, 9, 86.78, 'Kekurangan Vitamin A'),
(181, 9, 86.78, 'Kekurangan Vitamin A'),
(182, 9, 86.78, 'Kekurangan Vitamin A'),
(183, 9, 86.78, 'Kekurangan Vitamin A'),
(184, 9, 86.78, 'Kekurangan Vitamin A'),
(185, 9, 86.78, 'Kekurangan Vitamin A'),
(186, 9, 86.78, 'Kekurangan Vitamin A'),
(187, 9, 86.78, 'Kekurangan Vitamin A'),
(188, 9, 86.78, 'Kekurangan Vitamin A'),
(189, 9, 86.78, 'Kekurangan Vitamin A'),
(190, 9, 86.78, 'Kekurangan Vitamin A'),
(191, 9, 86.78, 'Kekurangan Vitamin A'),
(192, 9, 86.78, 'Kekurangan Vitamin A'),
(193, 9, 86.78, 'Kekurangan Vitamin A'),
(194, 9, 86.78, 'Kekurangan Vitamin A'),
(195, 9, 86.78, 'Kekurangan Vitamin A'),
(196, 9, 86.78, 'Kekurangan Vitamin A'),
(197, 9, 86.78, 'Kekurangan Vitamin A'),
(198, 9, 86.78, 'Kekurangan Vitamin A'),
(199, 9, 86.78, 'Kekurangan Vitamin A'),
(200, 9, 86.78, 'Kekurangan Vitamin A'),
(201, 9, 86.78, 'Kekurangan Vitamin A'),
(202, 9, 86.78, 'Kekurangan Vitamin A'),
(203, 9, 86.78, 'Kekurangan Vitamin A'),
(204, 9, 86.78, 'Kekurangan Vitamin A'),
(205, 9, 86.78, 'Kekurangan Vitamin A'),
(206, 9, 86.78, 'Kekurangan Vitamin A'),
(207, 9, 86.78, 'Kekurangan Vitamin A'),
(208, 9, 86.78, 'Kekurangan Vitamin A'),
(209, 9, 86.78, 'Kekurangan Vitamin A'),
(210, 9, 86.78, 'Kekurangan Vitamin A'),
(211, 9, 86.78, 'Kekurangan Vitamin A'),
(212, 9, 86.78, 'Kekurangan Vitamin A'),
(213, 9, 86.78, 'Kekurangan Vitamin A'),
(214, 9, 86.78, 'Kekurangan Vitamin A'),
(215, 9, 86.78, 'Kekurangan Vitamin A'),
(216, 9, 86.78, 'Kekurangan Vitamin A'),
(217, 9, 86.78, 'Kekurangan Vitamin A'),
(218, 9, 86.78, 'Kekurangan Vitamin A'),
(219, 9, 86.78, 'Kekurangan Vitamin A'),
(220, 9, 86.78, 'Kekurangan Vitamin A'),
(221, 9, 86.78, 'Kekurangan Vitamin A'),
(222, 8, 82.24, 'Kekurangan Vitamin D'),
(223, 8, 82.24, 'Kekurangan Vitamin D'),
(224, 8, 82.24, 'Kekurangan Vitamin D'),
(225, 9, 86.78, 'Kekurangan Vitamin A'),
(226, 9, 86.78, 'Kekurangan Vitamin A'),
(227, 9, 86.78, 'Kekurangan Vitamin A'),
(228, 9, 0, 'Tidak Terdiagnosa'),
(229, 9, 85.09, 'Kekurangan Vitamin A'),
(230, 9, 0, 'Tidak Terdiagnosa'),
(231, 9, 0, 'Tidak Terdiagnosa'),
(232, 9, 0, 'Tidak Terdiagnosa'),
(233, 9, 0, 'Tidak Terdiagnosa'),
(234, 9, 0, 'Tidak Terdiagnosa'),
(235, 9, 0, 'Tidak Terdiagnosa'),
(236, 9, 0, 'Tidak Terdiagnosa'),
(237, 9, 0, 'Tidak Terdiagnosa'),
(238, 9, 0, 'Tidak Terdiagnosa'),
(239, 9, 0, 'Tidak Terdiagnosa'),
(240, 9, 0, 'Tidak Terdiagnosa'),
(241, 9, 0, 'Tidak Terdiagnosa'),
(242, 9, 0, 'Tidak Terdiagnosa'),
(243, 9, 0, 'Tidak Terdiagnosa'),
(244, 9, 0, 'Tidak Terdiagnosa'),
(245, 9, 0, 'Tidak Terdiagnosa'),
(246, 9, 0, 'Tidak Terdiagnosa'),
(247, 9, 0, 'Tidak Terdiagnosa'),
(248, 9, 78.31, 'Kekurangan Vitamin A'),
(249, 9, 78.31, 'Kekurangan Vitamin A'),
(250, 9, 0, 'Tidak Terdiagnosa'),
(251, 9, 0, 'Tidak Terdiagnosa'),
(252, 9, 81.7, 'Kekurangan Vitamin A'),
(253, 9, 81.7, 'Kekurangan Vitamin A'),
(254, 9, 81.7, 'Kekurangan Vitamin A'),
(255, 9, 81.7, 'Kekurangan Vitamin A'),
(256, 9, 81.7, 'Kekurangan Vitamin A'),
(257, 9, 81.7, 'Kekurangan Vitamin A'),
(258, 9, 81.7, 'Kekurangan Vitamin A'),
(259, 9, 81.7, 'Kekurangan Vitamin A'),
(260, 9, 81.7, 'Kekurangan Vitamin A'),
(261, 9, 81.7, 'Kekurangan Vitamin A'),
(262, 9, 81.7, 'Kekurangan Vitamin A'),
(263, 9, 81.7, 'Kekurangan Vitamin A'),
(264, 9, 81.7, 'Kekurangan Vitamin A'),
(265, 9, 81.7, 'Kekurangan Vitamin A'),
(266, 9, 81.7, 'Kekurangan Vitamin A'),
(267, 9, 81.7, 'Kekurangan Vitamin A'),
(268, 9, 81.7, 'Kekurangan Vitamin A'),
(269, 9, 81.7, 'Kekurangan Vitamin A'),
(270, 9, 81.7, 'Kekurangan Vitamin A'),
(271, 9, 81.7, 'Kekurangan Vitamin A'),
(272, 9, 81.7, 'Kekurangan Vitamin A'),
(273, 9, 81.7, 'Kekurangan Vitamin A'),
(274, 9, 81.7, 'Kekurangan Vitamin A'),
(275, 9, 81.7, 'Kekurangan Vitamin A'),
(276, 9, 81.7, 'Kekurangan Vitamin A'),
(277, 9, 81.7, 'Kekurangan Vitamin A'),
(278, 9, 81.7, 'Kekurangan Vitamin A'),
(279, 9, 81.7, 'Kekurangan Vitamin A');

-- --------------------------------------------------------

--
-- Table structure for table `nilaipakar`
--

CREATE TABLE `nilaipakar` (
  `id_nilai` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nilaipakar`
--

INSERT INTO `nilaipakar` (`id_nilai`, `id_kerusakan`, `id_gejala`, `mb`) VALUES
(2, 2, 4, 0.8),
(3, 2, 5, 0.4),
(4, 2, 6, 0.6),
(5, 3, 7, 0.4),
(6, 3, 8, 0.8),
(7, 3, 9, 0.6),
(8, 3, 11, 0.8),
(9, 3, 15, 0.4),
(10, 4, 6, 0.4),
(11, 4, 8, 0.8),
(12, 4, 20, 0.6),
(13, 4, 12, 0.4),
(14, 4, 10, 0.8),
(15, 5, 20, 0.6),
(16, 5, 13, 0.6),
(17, 5, 22, 0.6),
(18, 6, 14, 1),
(19, 6, 23, 0.6),
(20, 7, 8, 0.4),
(21, 7, 7, 0.6),
(22, 7, 15, 0.6),
(23, 8, 9, 0.4),
(24, 8, 12, 0.6),
(25, 8, 16, 1),
(26, 9, 9, 0.6),
(27, 9, 17, 0.6),
(28, 9, 18, 0.4),
(29, 9, 10, 0.6),
(30, 10, 19, 0.8),
(31, 10, 20, 0.6),
(32, 11, 5, 0.6),
(33, 11, 12, 0.4),
(34, 11, 22, 0.8),
(35, 11, 24, 0.8),
(36, 12, 25, 0.8),
(37, 12, 26, 0.8),
(38, 12, 27, 0.4),
(39, 12, 28, 0.2),
(40, 12, 29, 0.8),
(41, 12, 30, 0.6),
(42, 13, 31, 0.2),
(43, 13, 32, 0.4),
(44, 13, 48, 0.8),
(45, 13, 33, 0.6),
(46, 13, 34, 0.6),
(47, 14, 35, 0.8),
(48, 14, 36, 0.8),
(49, 14, 37, 0.6),
(50, 14, 38, 0.2),
(51, 14, 27, 0.4),
(52, 15, 39, 0.4),
(53, 15, 40, 0.6),
(54, 15, 41, 0.6),
(55, 15, 42, 0.6),
(56, 15, 43, 0.8),
(57, 15, 38, 0.2),
(58, 16, 28, 0.2),
(59, 16, 32, 0.4),
(60, 16, 44, 0.8),
(61, 16, 48, 0.8),
(62, 16, 34, 0.6),
(63, 17, 39, 0.4),
(64, 17, 31, 0.2),
(65, 17, 45, 0.8),
(66, 17, 46, 0.8),
(67, 17, 47, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `usia` varchar(3) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `username`, `pass`, `nama`, `jk`, `usia`, `hp`, `email`, `alamat`) VALUES
(8, 'user', 'user', 'user saja', 'Perempuan', '24', '2554', 'user@gmail.com', 'jambi'),
(9, 'Asa', 'ASa', 'Asa Kece', 'Laki-laki', '23', '0999767655', 'asaa@gmail.com', 'Padang'),
(10, 'Nabihan', 'Nabihan', 'Nabihan', 'Laki-laki', '4', '1501081903190', 'nabihan@gmail.com', 'Tanjung Batu'),
(11, 'Syakila', 'Syakila', 'Syakila Helia PutriÂ ', 'Perempuan', '3', '1501082211190', 'syakila@gmail.com', 'Pidung'),
(12, 'Gebi', 'Gebi', 'Gebi Khalwat ZunayraÂ ', 'Perempuan', '1', '1501305012219', 'gebi@gmail.com', 'Pidung'),
(13, 'Kayrah', 'Kayrah', 'Kayrah Al-FariqÂ ', 'Perempuan', '4', '1501082201190', 'kayrah@gmail.com', 'Jujun'),
(14, 'Nurkolbi', 'Nurkolbi', 'Nurkolbi HabiballahÂ ', 'Laki-laki', '4', '1501300812184', 'nur@gmail.com', 'Koto Dian'),
(15, 'Bagas', 'Bagas', 'Bagas Zul Syafiq AliÂ ', 'Laki-laki', '3', '1501081312190', 'bagas@gmail.com', 'Telago'),
(16, 'Hanifa', 'Hanifa', 'Hanifa Azzahra', 'Perempuan', '4', '1501080209190', 'hanifa@gmail.com', 'Koto Tuo'),
(17, 'Alfarezi', 'Alfarezi', 'AlfareziÂ ', 'Laki-laki', '4', '1501302012185', 'afarezi@gmail.com', 'Lempur Danau'),
(18, 'Ramadhani', 'Ramadhani', 'Nur RamadhaniÂ ', 'Perempuan', '4', '1501083005190', 'nur@gmail.com', 'Koto Baru'),
(19, 'Habib', 'Habib', 'M. Habib', 'Laki-laki', '4', '1501082706190', 'Habib@gmail.com', 'Koto Baru');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id_penanganan` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id_penanganan`, `kode`, `penanganan`) VALUES
(13, 'S01', 'Konsumsi Makanan Kaya Vitamin A: Pastikan balita mendapatkan cukup makanan yang mengandung vitamin A, seperti hati, telur, susu dan produk susu, wortel, ubi jalar, bayam, brokoli, paprika merah, dan buah-buahan seperti mangga, aprikot, dan papaya.  Promosi ASI: Jika mungkin, berikan ASI eksklusif kepada bayi selama enam bulan pertama kehidupannya. ASI mengandung jumlah vitamin A yang cukup dan mudah diserap oleh tubuh.  Pemberian Makanan Pendamping ASI (MP-ASI): Ketika bayi mencapai usia enam bulan, mulailah memberikan makanan pendamping ASI yang kaya akan vitamin A, seperti puree sayuran dan buah-buahan yang sehat.  Suplementasi Vitamin A: Di beberapa daerah di mana kekurangan vitamin A merupakan masalah kesehatan masyarakat yang serius, program pemberian suplemen vitamin A kepada anak-anak dapat dilakukan sesuai pedoman kesehatan setempat. Pengolahan Makanan yang Tepat: Beberapa makanan mengandung beta-karoten, yang kemudian diubah menjadi vitamin A oleh tubuh. Makanan yang mengandung beta-karoten harus dimasak atau diproses dengan cara yang tepat untuk memaksimalkan penyerapannya, seperti memasak wortel atau bayam dengan sedikit minyak, karena vitamin A adalah lemak larut.  Perhatikan Kesehatan Mata: Memastikan balita terlindungi dari penyakit mata yang dapat mempengaruhi kesehatan mata dan penglihatan mereka, seperti infeksi, yang dapat menyebabkan kerusakan kornea dan memperburuk kekurangan vitamin A.  Pendidikan Kesehatan Masyarakat: Edukasi kepada masyarakat tentang pentingnya konsumsi makanan yang sehat dan bergizi, serta peran vitamin A dalam menjaga kesehatan, dapat membantu mencegah kekurangan vitamin A.'),
(14, 'S02', 'Paparan Matahari: Paparan sinar matahari merupakan cara alami tubuh untuk menghasilkan vitamin D. Pastikan balita mendapatkan cukup paparan sinar matahari setiap hari, terutama pada pagi hari atau sore hari ketika sinar matahari tidak terlalu kuat. Jumlah waktu yang diperlukan dapat bervariasi tergantung pada lokasi geografis, musim, dan jenis kulit balita.  Konsumsi Makanan yang Kaya Vitamin D: Pastikan balita mendapatkan cukup asupan makanan yang mengandung vitamin D, seperti ikan berlemak (misalnya salmon, tuna, dan mackerel), telur, produk susu yang diperkaya dengan vitamin D, dan sereal yang diperkaya. Namun, makanan ini mungkin tidak menyediakan jumlah vitamin D yang cukup secara optimal, sehingga paparan sinar matahari tetap penting.  Suplementasi: Jika balita memiliki risiko tinggi kekurangan vitamin D, misalnya jika mereka memiliki pola makan yang terbatas atau tidak mendapatkan cukup paparan sinar matahari, dokter dapat merekomendasikan suplemen vitamin D. Pastikan untuk mengikuti petunjuk dosis yang diberikan oleh dokter atau ahli gizi.  Perhatikan Risiko Khusus: Beberapa faktor risiko, seperti kulit yang gelap, tinggal di daerah dengan tingkat sinar matahari yang rendah, atau memiliki kondisi medis tertentu yang dapat mengganggu penyerapan vitamin D, dapat meningkatkan risiko kekurangan vitamin D pada balita. Perhatikan faktor-faktor ini dan tindak lanjuti sesuai kebutuhan.  Perhatikan Kesehatan Kulit: Meskipun penting untuk mendapatkan paparan sinar matahari yang cukup, tetapi penting juga untuk melindungi kulit balita dari paparan sinar matahari berlebihan yang dapat menyebabkan sunburn atau kerusakan kulit. Gunakan tabir surya dengan SPF yang sesuai dan pakaian pelindung saat terkena sinar matahari secara langsung.  Pemeriksaan Rutin: Selalu konsultasikan dengan dokter atau ahli gizi tentang kebutuhan nutrisi balita Anda. Melakukan pemeriksaan rutin dapat membantu mengidentifikasi risiko kekurangan vitamin D dan memberikan saran yang tepat mengenai tindakan pencegahan yang harus diambil.'),
(15, 'S03', 'Konsumsi Makanan Kaya Vitamin C: Pastikan balita mendapatkan cukup makanan yang mengandung vitamin C dalam diet mereka. Buah-buahan seperti jeruk, stroberi, kiwi, mangga, dan nanas, serta sayuran seperti paprika, brokoli, kubis, dan bayam adalah sumber yang baik dari vitamin C.  Mengonsumsi Makanan Segar: Makanan segar memiliki kandungan vitamin C yang lebih tinggi daripada makanan yang telah diproses atau dimasak dalam waktu yang lama. Upayakan untuk memberikan makanan segar dan seimbang dalam diet balita.  Pemberian Makanan Pendamping ASI (MP-ASI): Saat memperkenalkan makanan pendamping ASI, pastikan untuk menyertakan makanan yang mengandung vitamin C dalam menu balita.  Menghindari Pemrosesan yang Berlebihan: Jika memungkinkan, hindari memroses makanan terlalu lama atau terlalu banyak, karena ini dapat mengurangi kandungan vitamin C dalam makanan. Lebih baik memilih cara memasak yang mempertahankan sebanyak mungkin nutrisi.  Edukasi Gizi: Berikan pemahaman kepada orang tua atau pengasuh balita tentang pentingnya asupan makanan yang sehat dan bergizi, termasuk makanan yang mengandung vitamin C, serta cara memasak yang mempertahankan nutrisi.  Suplementasi: Dalam beberapa kasus, dokter atau ahli gizi dapat merekomendasikan suplemen vitamin C, terutama jika balita memiliki risiko tinggi terhadap kekurangan vitamin C atau jika asupan makanannya tidak mencukupi kebutuhan nutrisinya.  Perhatikan Asupan Makanan Balita: Pastikan balita mendapatkan berbagai macam makanan sehat dan bergizi setiap hari, termasuk sumber vitamin C, untuk memastikan kebutuhan gizinya terpenuhi.  Pemantauan Kesehatan Balita: Melakukan pemeriksaan kesehatan secara berkala oleh dokter atau ahli gizi dapat membantu mengidentifikasi kemungkinan kekurangan vitamin C atau masalah gizi lainnya pada balita.'),
(16, 'S04', 'Pemberian Makanan yang Kaya Zat Besi: Pastikan balita mendapatkan cukup makanan yang mengandung zat besi dalam diet mereka. Makanan yang mengandung zat besi heme (dapat diserap dengan lebih baik oleh tubuh) meliputi daging merah, unggas, dan ikan. Sedangkan sumber zat besi non-heme (dapat diserap dengan kurang baik oleh tubuh) termasuk sayuran hijau, kacang-kacangan, biji-bijian, dan sereal yang diperkaya.  Pemberian Makanan Pendamping ASI (MP-ASI): Saat memperkenalkan makanan pendamping ASI, pastikan untuk menyertakan makanan yang kaya zat besi dalam menu balita. Ini bisa berupa bubur sereal yang diperkaya, puree bayam, atau makanan lain yang mengandung zat besi.  Perhatikan Kombinasi Makanan: Kombinasikan makanan yang mengandung zat besi dengan makanan yang mengandung vitamin C, karena vitamin C dapat meningkatkan penyerapan zat besi dalam tubuh. Misalnya, berikan buah-buahan segar atau jus jeruk bersama dengan makanan yang mengandung zat besi.  Hindari Susu sebagai Minuman Utama: Jika balita mengonsumsi terlalu banyak susu, ini dapat mengganggu penyerapan zat besi karena kalsium dalam susu bersaing dengan zat besi untuk penyerapan dalam tubuh. Pastikan bahwa asupan susu balita tidak menghalangi asupan zat besi dari sumber makanan lainnya.  Pemantauan Kesehatan: Melakukan pemeriksaan kesehatan secara berkala oleh dokter atau ahli gizi dapat membantu mengidentifikasi risiko kekurangan zat besi dan memberikan saran tentang perawatan yang diperlukan.  Suplementasi: Dalam beberapa kasus, dokter atau ahli gizi dapat merekomendasikan suplemen zat besi untuk balita, terutama jika mereka berisiko tinggi mengalami kekurangan zat besi atau jika asupan makanan mereka tidak mencukupi kebutuhan nutrisinya.'),
(17, 'S05', 'Konsumsi Makanan Kaya Kalsium: Pastikan balita mendapatkan cukup makanan yang mengandung kalsium dalam diet mereka. Makanan kaya kalsium meliputi susu dan produk susu rendah lemak seperti yogurt dan keju, sayuran hijau seperti brokoli, bayam, dan kale, ikan seperti salmon dan sardine (dengan tulang), serta sereal, jus, atau makanan yang diperkaya dengan kalsium.  Pemberian Makanan Pendamping ASI (MP-ASI): Ketika memperkenalkan makanan pendamping ASI, pastikan untuk menyertakan makanan yang kaya kalsium dalam menu balita.  Perhatikan Kombinasi Makanan: Gabungkan makanan yang kaya kalsium dengan makanan yang mengandung vitamin D dan magnesium, karena kedua nutrisi ini membantu penyerapan kalsium. Contohnya, berikan ikan salmon bersama dengan sayuran hijau, atau tambahkan irisan keju pada roti gandum.  Mengonsumsi Makanan yang Dapat Meningkatkan Penyerapan Kalsium: Beberapa makanan seperti yogurt mengandung probiotik yang dapat meningkatkan penyerapan kalsium. Jadi, makanan semacam ini bisa dimasukkan ke dalam diet balita.  Hindari Konsumsi Berlebihan Protein: Konsumsi protein dalam jumlah berlebihan dapat meningkatkan pengeluaran kalsium dalam urin. Pastikan asupan protein balita dalam batas yang disarankan.  Paparan Matahari: Paparan sinar matahari secara teratur membantu tubuh menghasilkan vitamin D, yang diperlukan untuk penyerapan kalsium. Pastikan balita mendapatkan cukup paparan sinar matahari secara aman setiap hari.  Aktivitas Fisik yang Teratur: Latihan dan aktivitas fisik yang teratur membantu pembentukan tulang yang kuat. Ajak balita bermain di luar ruangan dan berpartisipasi dalam kegiatan yang melibatkan gerakan tubuh.'),
(18, 'S06', 'Konsumsi Makanan yang Kaya Asam Folat: Pastikan balita mendapatkan cukup makanan yang mengandung asam folat dalam diet mereka. Makanan kaya asam folat meliputi sayuran hijau tua (seperti bayam dan brokoli), buah jeruk, kacang-kacangan, biji-bijian, dan produk-produk gandum yang diperkaya.  Konsumsi Makanan yang Kaya Vitamin B12: Pastikan balita mendapatkan cukup makanan yang mengandung vitamin B12 dalam diet mereka. Makanan kaya vitamin B12 meliputi daging merah, unggas, ikan, produk susu, telur, dan produk-produk hewani lainnya.  Pemberian Suplemen: Jika balita mengonsumsi diet vegetarian atau vegan, atau memiliki kondisi medis yang mengganggu penyerapan vitamin B12, dokter atau ahli gizi mungkin merekomendasikan suplemen vitamin B12.  Pantau Kesehatan: Lakukan pemeriksaan kesehatan secara berkala oleh dokter atau ahli gizi untuk memastikan bahwa asupan vitamin B9 dan B12 balita mencukupi kebutuhan nutrisi mereka. Pengolahan Makanan yang Tepat: Hindari memasak makanan dengan cara yang berlebihan atau menggunakan metode yang mengurangi kandungan vitamin B12, seperti penggorengan dalam waktu yang lama.');

-- --------------------------------------------------------

--
-- Table structure for table `rule_penanganan`
--

CREATE TABLE `rule_penanganan` (
  `id_rule` int(11) NOT NULL,
  `kode_kerusakan` varchar(20) NOT NULL,
  `kode_penanganan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rule_penanganan`
--

INSERT INTO `rule_penanganan` (`id_rule`, `kode_kerusakan`, `kode_penanganan`) VALUES
(15, 'P01', 'S01'),
(16, 'P02', 'S02'),
(17, 'P03', 'S03'),
(18, 'P04', 'S04'),
(20, 'P05', 'S05'),
(21, 'P06', 'S06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`,`id_pasien`);

--
-- Indexes for table `nilaipakar`
--
ALTER TABLE `nilaipakar`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id_penanganan`);

--
-- Indexes for table `rule_penanganan`
--
ALTER TABLE `rule_penanganan`
  ADD PRIMARY KEY (`id_rule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `nilaipakar`
--
ALTER TABLE `nilaipakar`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id_penanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rule_penanganan`
--
ALTER TABLE `rule_penanganan`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
