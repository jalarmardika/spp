-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2023 pada 06.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Juli'),
(2, 'Agustus'),
(3, 'September'),
(4, 'Oktober'),
(5, 'November'),
(6, 'Desember'),
(7, 'Januari'),
(8, 'Februari'),
(9, 'Maret'),
(10, 'April'),
(11, 'Mei'),
(12, 'Juni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulanan`
--

CREATE TABLE `bulanan` (
  `id_bulanan` bigint(20) NOT NULL,
  `id_periode` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `biaya` bigint(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulanan`
--

INSERT INTO `bulanan` (`id_bulanan`, `id_periode`, `id_kelas`, `nis`, `id_bulan`, `biaya`, `status`, `tgl_bayar`, `id_petugas`) VALUES
(1, 1, 1, '08625', 1, 200000, 'Lunas', '2023-08-26', 1),
(2, 1, 1, '08625', 2, 200000, 'Lunas', '2023-08-26', 1),
(3, 1, 1, '08625', 3, 200000, 'Lunas', '2023-08-27', 1),
(4, 1, 1, '08625', 4, 200000, 'Lunas', '2023-08-27', 1),
(5, 1, 1, '08625', 5, 200000, 'Lunas', '2023-08-27', 1),
(6, 1, 1, '08625', 6, 200000, 'Lunas', '2023-08-27', 1),
(7, 1, 1, '08625', 7, 200000, 'Lunas', '2023-08-27', 1),
(8, 1, 1, '08625', 8, 200000, 'Lunas', '2023-08-27', 1),
(9, 1, 1, '08625', 9, 200000, 'Lunas', '2023-08-27', 1),
(10, 1, 1, '08625', 10, 200000, 'Lunas', '2023-08-27', 1),
(11, 1, 1, '08625', 11, 200000, 'Lunas', '2023-08-27', 1),
(12, 1, 1, '08625', 12, 200000, 'Lunas', '2023-08-27', 1),
(13, 1, 1, '08652', 1, 200000, 'Lunas', '2023-08-26', 1),
(14, 1, 1, '08652', 2, 200000, 'Lunas', '2023-08-27', 1),
(15, 1, 1, '08652', 3, 200000, 'Lunas', '2023-08-27', 1),
(16, 1, 1, '08652', 4, 200000, 'Lunas', '2023-08-27', 1),
(17, 1, 1, '08652', 5, 200000, 'Lunas', '2023-08-27', 1),
(18, 1, 1, '08652', 6, 200000, 'Lunas', '2023-08-27', 1),
(19, 1, 1, '08652', 7, 200000, 'Lunas', '2023-08-27', 1),
(20, 1, 1, '08652', 8, 200000, 'Lunas', '2023-08-27', 1),
(21, 1, 1, '08652', 9, 200000, 'Lunas', '2023-08-27', 1),
(22, 1, 1, '08652', 10, 200000, 'Lunas', '2023-08-27', 1),
(23, 1, 1, '08652', 11, 200000, 'Lunas', '2023-08-27', 1),
(24, 1, 1, '08652', 12, 200000, 'Lunas', '2023-08-27', 1),
(25, 1, 1, '04563', 1, 0, 'Lunas', '0000-00-00', NULL),
(26, 1, 1, '04563', 2, 0, 'Lunas', '0000-00-00', NULL),
(27, 1, 1, '04563', 3, 0, 'Lunas', '0000-00-00', NULL),
(28, 1, 1, '04563', 4, 200000, 'Lunas', '2023-08-26', 1),
(29, 1, 1, '04563', 5, 200000, 'Lunas', '2023-08-26', 1),
(30, 1, 1, '04563', 6, 200000, 'Lunas', '2023-08-26', 1),
(31, 1, 1, '04563', 7, 200000, 'Lunas', '2023-08-27', 1),
(32, 1, 1, '04563', 8, 200000, 'Lunas', '2023-08-27', 1),
(33, 1, 1, '04563', 9, 200000, 'Lunas', '2023-08-27', 1),
(34, 1, 1, '04563', 10, 200000, 'Lunas', '2023-08-27', 1),
(35, 1, 1, '04563', 11, 200000, 'Lunas', '2023-08-27', 1),
(36, 1, 1, '04563', 12, 200000, 'Lunas', '2023-08-27', 1),
(37, 1, 1, '09636', 1, 0, 'Lunas', '0000-00-00', NULL),
(38, 1, 1, '09636', 2, 0, 'Lunas', '0000-00-00', NULL),
(39, 1, 1, '09636', 3, 0, 'Lunas', '0000-00-00', NULL),
(40, 1, 1, '09636', 4, 200000, 'Lunas', '2023-08-26', 1),
(41, 1, 1, '09636', 5, 200000, 'Lunas', '2023-08-26', 1),
(42, 1, 1, '09636', 6, 200000, 'Lunas', '2023-08-27', 1),
(43, 1, 1, '09636', 7, 200000, 'Lunas', '2023-08-27', 1),
(44, 1, 1, '09636', 8, 200000, 'Lunas', '2023-08-27', 1),
(45, 1, 1, '09636', 9, 200000, 'Lunas', '2023-08-27', 1),
(46, 1, 1, '09636', 10, 200000, 'Lunas', '2023-08-27', 1),
(47, 1, 1, '09636', 11, 200000, 'Lunas', '2023-08-27', 1),
(48, 1, 1, '09636', 12, 200000, 'Lunas', '2023-08-27', 1),
(49, 1, 2, '12785', 1, 300000, 'Lunas', '2023-08-27', 1),
(50, 1, 2, '12785', 2, 200000, 'Lunas', '2023-08-27', 1),
(51, 1, 2, '12785', 3, 200000, 'Lunas', '2023-08-27', 1),
(52, 1, 2, '12785', 4, 200000, 'Lunas', '2023-08-27', 1),
(53, 1, 2, '12785', 5, 200000, 'Lunas', '2023-08-27', 1),
(54, 1, 2, '12785', 6, 200000, 'Lunas', '2023-08-27', 1),
(55, 1, 2, '12785', 7, 200000, 'Lunas', '2023-08-27', 1),
(56, 1, 2, '12785', 8, 200000, 'Lunas', '2023-08-27', 1),
(57, 1, 2, '12785', 9, 200000, 'Lunas', '2023-08-27', 1),
(58, 1, 2, '12785', 10, 200000, 'Lunas', '2023-08-27', 1),
(59, 1, 2, '12785', 11, 200000, 'Belum Bayar', '0000-00-00', NULL),
(60, 1, 2, '12785', 12, 200000, 'Belum Bayar', '0000-00-00', NULL),
(61, 1, 2, '15683', 1, 300000, 'Lunas', '2023-08-27', 1),
(62, 1, 2, '15683', 2, 200000, 'Lunas', '2023-08-27', 1),
(63, 1, 2, '15683', 3, 200000, 'Lunas', '2023-08-27', 1),
(64, 1, 2, '15683', 4, 200000, 'Lunas', '2023-08-27', 1),
(65, 1, 2, '15683', 5, 200000, 'Lunas', '2023-08-27', 1),
(66, 1, 2, '15683', 6, 200000, 'Lunas', '2023-08-27', 1),
(67, 1, 2, '15683', 7, 200000, 'Lunas', '2023-08-27', 1),
(68, 1, 2, '15683', 8, 200000, 'Lunas', '2023-08-27', 1),
(69, 1, 2, '15683', 9, 200000, 'Lunas', '2023-08-27', 1),
(70, 1, 2, '15683', 10, 200000, 'Lunas', '2023-08-27', 1),
(71, 1, 2, '15683', 11, 200000, 'Lunas', '2023-08-27', 1),
(72, 1, 2, '15683', 12, 200000, 'Lunas', '2023-08-27', 1),
(73, 1, 2, '16354', 1, 300000, 'Lunas', '2023-08-27', 1),
(74, 1, 2, '16354', 2, 200000, 'Lunas', '2023-08-27', 1),
(75, 1, 2, '16354', 3, 200000, 'Lunas', '2023-08-27', 1),
(76, 1, 2, '16354', 4, 200000, 'Lunas', '2023-08-27', 1),
(77, 1, 2, '16354', 5, 200000, 'Lunas', '2023-08-27', 1),
(78, 1, 2, '16354', 6, 200000, 'Lunas', '2023-08-27', 1),
(79, 1, 2, '16354', 7, 200000, 'Lunas', '2023-08-27', 1),
(80, 1, 2, '16354', 8, 200000, 'Lunas', '2023-08-27', 1),
(81, 1, 2, '16354', 9, 200000, 'Lunas', '2023-08-27', 1),
(82, 1, 2, '16354', 10, 200000, 'Lunas', '2023-08-27', 1),
(83, 1, 2, '16354', 11, 200000, 'Lunas', '2023-08-27', 1),
(84, 1, 2, '16354', 12, 200000, 'Belum Bayar', '0000-00-00', NULL),
(85, 1, 2, '17843', 1, 300000, 'Lunas', '2023-08-27', 1),
(86, 1, 2, '17843', 2, 200000, 'Lunas', '2023-08-27', 1),
(87, 1, 2, '17843', 3, 200000, 'Lunas', '2023-08-27', 1),
(88, 1, 2, '17843', 4, 200000, 'Lunas', '2023-08-27', 1),
(89, 1, 2, '17843', 5, 200000, 'Lunas', '2023-08-27', 1),
(90, 1, 2, '17843', 6, 200000, 'Lunas', '2023-08-27', 1),
(91, 1, 2, '17843', 7, 200000, 'Lunas', '2023-08-27', 1),
(92, 1, 2, '17843', 8, 200000, 'Lunas', '2023-08-27', 1),
(93, 1, 2, '17843', 9, 200000, 'Lunas', '2023-08-27', 1),
(94, 1, 2, '17843', 10, 200000, 'Lunas', '2023-08-27', 1),
(95, 1, 2, '17843', 11, 200000, 'Lunas', '2023-08-27', 1),
(96, 1, 2, '17843', 12, 200000, 'Lunas', '2023-08-27', 1),
(97, 1, 4, '23608', 1, 250000, 'Lunas', '2023-08-27', 1),
(98, 1, 4, '23608', 2, 250000, 'Lunas', '2023-08-27', 1),
(99, 1, 4, '23608', 3, 250000, 'Lunas', '2023-08-27', 1),
(100, 1, 4, '23608', 4, 250000, 'Lunas', '2023-08-27', 1),
(101, 1, 4, '23608', 5, 250000, 'Lunas', '2023-08-27', 1),
(102, 1, 4, '23608', 6, 250000, 'Lunas', '2023-08-27', 1),
(103, 1, 4, '23608', 7, 200000, 'Lunas', '2023-08-27', 1),
(104, 1, 4, '23608', 8, 200000, 'Lunas', '2023-08-27', 1),
(105, 1, 4, '23608', 9, 200000, 'Lunas', '2023-08-27', 1),
(106, 1, 4, '23608', 10, 200000, 'Belum Bayar', '0000-00-00', NULL),
(107, 1, 4, '23608', 11, 200000, 'Belum Bayar', '0000-00-00', NULL),
(108, 1, 4, '23608', 12, 200000, 'Belum Bayar', '0000-00-00', NULL),
(109, 1, 4, '24056', 1, 250000, 'Lunas', '2023-08-27', 1),
(110, 1, 4, '24056', 2, 250000, 'Lunas', '2023-08-27', 1),
(111, 1, 4, '24056', 3, 250000, 'Lunas', '2023-08-27', 1),
(112, 1, 4, '24056', 4, 250000, 'Lunas', '2023-08-27', 1),
(113, 1, 4, '24056', 5, 250000, 'Lunas', '2023-08-27', 1),
(114, 1, 4, '24056', 6, 250000, 'Lunas', '2023-08-27', 1),
(115, 1, 4, '24056', 7, 200000, 'Lunas', '2023-08-27', 1),
(116, 1, 4, '24056', 8, 200000, 'Lunas', '2023-08-27', 1),
(117, 1, 4, '24056', 9, 200000, 'Lunas', '2023-08-27', 1),
(118, 1, 4, '24056', 10, 200000, 'Lunas', '2023-08-27', 1),
(119, 1, 4, '24056', 11, 200000, 'Lunas', '2023-08-27', 1),
(120, 1, 4, '24056', 12, 200000, 'Lunas', '2023-08-27', 1),
(121, 1, 4, '25630', 1, 250000, 'Lunas', '2023-08-27', 1),
(122, 1, 4, '25630', 2, 250000, 'Lunas', '2023-08-27', 1),
(123, 1, 4, '25630', 3, 250000, 'Lunas', '2023-08-27', 1),
(124, 1, 4, '25630', 4, 250000, 'Lunas', '2023-08-27', 1),
(125, 1, 4, '25630', 5, 250000, 'Lunas', '2023-08-27', 1),
(126, 1, 4, '25630', 6, 250000, 'Lunas', '2023-08-27', 1),
(127, 1, 4, '25630', 7, 200000, 'Lunas', '2023-08-27', 1),
(128, 1, 4, '25630', 8, 200000, 'Belum Bayar', '0000-00-00', NULL),
(129, 1, 4, '25630', 9, 200000, 'Belum Bayar', '0000-00-00', NULL),
(130, 1, 4, '25630', 10, 200000, 'Belum Bayar', '0000-00-00', NULL),
(131, 1, 4, '25630', 11, 200000, 'Belum Bayar', '0000-00-00', NULL),
(132, 1, 4, '25630', 12, 200000, 'Belum Bayar', '0000-00-00', NULL),
(133, 1, 4, '29861', 1, 250000, 'Lunas', '2023-08-27', 1),
(134, 1, 4, '29861', 2, 250000, 'Lunas', '2023-08-27', 1),
(135, 1, 4, '29861', 3, 250000, 'Lunas', '2023-08-27', 1),
(136, 1, 4, '29861', 4, 250000, 'Lunas', '2023-08-27', 1),
(137, 1, 4, '29861', 5, 250000, 'Lunas', '2023-08-27', 1),
(138, 1, 4, '29861', 6, 250000, 'Lunas', '2023-08-27', 1),
(139, 1, 4, '29861', 7, 200000, 'Lunas', '2023-08-27', 1),
(140, 1, 4, '29861', 8, 200000, 'Lunas', '2023-08-27', 1),
(141, 1, 4, '29861', 9, 200000, 'Lunas', '2023-08-27', 1),
(142, 1, 4, '29861', 10, 200000, 'Lunas', '2023-08-27', 1),
(143, 1, 4, '29861', 11, 200000, 'Lunas', '2023-08-27', 1),
(144, 1, 4, '29861', 12, 200000, 'Lunas', '2023-08-27', 1),
(145, 4, 1, '30981', 1, 0, 'Lunas', '0000-00-00', NULL),
(146, 4, 1, '30981', 2, 0, 'Lunas', '0000-00-00', NULL),
(147, 4, 1, '30981', 3, 0, 'Lunas', '0000-00-00', NULL),
(148, 4, 1, '30981', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(149, 4, 1, '30981', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(150, 4, 1, '30981', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(151, 4, 1, '30981', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(152, 4, 1, '30981', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(153, 4, 1, '30981', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(154, 4, 1, '30981', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(155, 4, 1, '30981', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(156, 4, 1, '30981', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(157, 4, 1, '33096', 1, 0, 'Lunas', '0000-00-00', NULL),
(158, 4, 1, '33096', 2, 0, 'Lunas', '0000-00-00', NULL),
(159, 4, 1, '33096', 3, 0, 'Lunas', '0000-00-00', NULL),
(160, 4, 1, '33096', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(161, 4, 1, '33096', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(162, 4, 1, '33096', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(163, 4, 1, '33096', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(164, 4, 1, '33096', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(165, 4, 1, '33096', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(166, 4, 1, '33096', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(167, 4, 1, '33096', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(168, 4, 1, '33096', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(169, 4, 1, '36740', 1, 0, 'Lunas', '0000-00-00', NULL),
(170, 4, 1, '36740', 2, 0, 'Lunas', '0000-00-00', NULL),
(171, 4, 1, '36740', 3, 0, 'Lunas', '0000-00-00', NULL),
(172, 4, 1, '36740', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(173, 4, 1, '36740', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(174, 4, 1, '36740', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(175, 4, 1, '36740', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(176, 4, 1, '36740', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(177, 4, 1, '36740', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(178, 4, 1, '36740', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(179, 4, 1, '36740', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(180, 4, 1, '36740', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(181, 4, 1, '37650', 1, 0, 'Lunas', '0000-00-00', NULL),
(182, 4, 1, '37650', 2, 0, 'Lunas', '0000-00-00', NULL),
(183, 4, 1, '37650', 3, 0, 'Lunas', '0000-00-00', NULL),
(184, 4, 1, '37650', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(185, 4, 1, '37650', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(186, 4, 1, '37650', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(187, 4, 1, '37650', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(188, 4, 1, '37650', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(189, 4, 1, '37650', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(190, 4, 1, '37650', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(191, 4, 1, '37650', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(192, 4, 1, '37650', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(193, 4, 2, '04563', 1, 300000, 'Lunas', '2023-08-29', 1),
(194, 4, 2, '04563', 2, 300000, 'Lunas', '2023-08-29', 1),
(195, 4, 2, '04563', 3, 300000, 'Lunas', '2023-08-29', 1),
(196, 4, 2, '04563', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(197, 4, 2, '04563', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(198, 4, 2, '04563', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(199, 4, 2, '04563', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(200, 4, 2, '04563', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(201, 4, 2, '04563', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(202, 4, 2, '04563', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(203, 4, 2, '04563', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(204, 4, 2, '04563', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(205, 4, 2, '08625', 1, 300000, 'Lunas', '2023-08-29', 3),
(206, 4, 2, '08625', 2, 300000, 'Lunas', '2023-08-29', 3),
(207, 4, 2, '08625', 3, 300000, 'Lunas', '2023-08-29', 3),
(208, 4, 2, '08625', 4, 300000, 'Lunas', '2023-08-29', 3),
(209, 4, 2, '08625', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(210, 4, 2, '08625', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(211, 4, 2, '08625', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(212, 4, 2, '08625', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(213, 4, 2, '08625', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(214, 4, 2, '08625', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(215, 4, 2, '08625', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(216, 4, 2, '08625', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(217, 4, 2, '08652', 1, 300000, 'Lunas', '2023-08-29', 5),
(218, 4, 2, '08652', 2, 300000, 'Lunas', '2023-08-29', 3),
(219, 4, 2, '08652', 3, 300000, 'Belum Bayar', '0000-00-00', NULL),
(220, 4, 2, '08652', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(221, 4, 2, '08652', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(222, 4, 2, '08652', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(223, 4, 2, '08652', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(224, 4, 2, '08652', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(225, 4, 2, '08652', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(226, 4, 2, '08652', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(227, 4, 2, '08652', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(228, 4, 2, '08652', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(229, 4, 2, '09636', 1, 300000, 'Lunas', '2023-08-29', 3),
(230, 4, 2, '09636', 2, 300000, 'Lunas', '2023-08-29', 3),
(231, 4, 2, '09636', 3, 300000, 'Lunas', '2023-08-29', 3),
(232, 4, 2, '09636', 4, 300000, 'Lunas', '2023-08-29', 3),
(233, 4, 2, '09636', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(234, 4, 2, '09636', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(235, 4, 2, '09636', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(236, 4, 2, '09636', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(237, 4, 2, '09636', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(238, 4, 2, '09636', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(239, 4, 2, '09636', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(240, 4, 2, '09636', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(241, 4, 4, '12785', 1, 300000, 'Lunas', '2023-08-29', 5),
(242, 4, 4, '12785', 2, 300000, 'Lunas', '2023-08-29', 1),
(243, 4, 4, '12785', 3, 300000, 'Belum Bayar', '0000-00-00', NULL),
(244, 4, 4, '12785', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(245, 4, 4, '12785', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(246, 4, 4, '12785', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(247, 4, 4, '12785', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(248, 4, 4, '12785', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(249, 4, 4, '12785', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(250, 4, 4, '12785', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(251, 4, 4, '12785', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(252, 4, 4, '12785', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(253, 4, 4, '15683', 1, 300000, 'Lunas', '2023-08-29', 3),
(254, 4, 4, '15683', 2, 300000, 'Belum Bayar', '0000-00-00', NULL),
(255, 4, 4, '15683', 3, 300000, 'Belum Bayar', '0000-00-00', NULL),
(256, 4, 4, '15683', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(257, 4, 4, '15683', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(258, 4, 4, '15683', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(259, 4, 4, '15683', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(260, 4, 4, '15683', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(261, 4, 4, '15683', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(262, 4, 4, '15683', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(263, 4, 4, '15683', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(264, 4, 4, '15683', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(265, 4, 4, '16354', 1, 300000, 'Lunas', '2023-08-29', 5),
(266, 4, 4, '16354', 2, 300000, 'Lunas', '2023-08-29', 5),
(267, 4, 4, '16354', 3, 300000, 'Belum Bayar', '0000-00-00', NULL),
(268, 4, 4, '16354', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(269, 4, 4, '16354', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(270, 4, 4, '16354', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(271, 4, 4, '16354', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(272, 4, 4, '16354', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(273, 4, 4, '16354', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(274, 4, 4, '16354', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(275, 4, 4, '16354', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(276, 4, 4, '16354', 12, 300000, 'Belum Bayar', '0000-00-00', NULL),
(277, 4, 4, '17843', 1, 300000, 'Belum Bayar', '0000-00-00', NULL),
(278, 4, 4, '17843', 2, 300000, 'Belum Bayar', '0000-00-00', NULL),
(279, 4, 4, '17843', 3, 300000, 'Belum Bayar', '0000-00-00', NULL),
(280, 4, 4, '17843', 4, 300000, 'Belum Bayar', '0000-00-00', NULL),
(281, 4, 4, '17843', 5, 300000, 'Belum Bayar', '0000-00-00', NULL),
(282, 4, 4, '17843', 6, 300000, 'Belum Bayar', '0000-00-00', NULL),
(283, 4, 4, '17843', 7, 300000, 'Belum Bayar', '0000-00-00', NULL),
(284, 4, 4, '17843', 8, 300000, 'Belum Bayar', '0000-00-00', NULL),
(285, 4, 4, '17843', 9, 300000, 'Belum Bayar', '0000-00-00', NULL),
(286, 4, 4, '17843', 10, 300000, 'Belum Bayar', '0000-00-00', NULL),
(287, 4, 4, '17843', 11, 300000, 'Belum Bayar', '0000-00-00', NULL),
(288, 4, 4, '17843', 12, 300000, 'Belum Bayar', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(4, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` bigint(20) NOT NULL,
  `awal` int(11) NOT NULL,
  `akhir` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `awal`, `akhir`) VALUES
(1, 2022, 2023),
(4, 2023, 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '089-448-247-3545', 'Admin'),
(3, 'Abdul Mujib', '289dff07669d7a23de0ef88d2f7129e7', '089-548-871-220', 'Petugas'),
(5, 'Zulkifli Hasan', 'fc3f318fba8b3c1502bece62a27712df', '089 871 652 111', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` bigint(20) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Komputer & Jaringan'),
(4, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `id_kelas` bigint(20) DEFAULT NULL,
  `id_prodi` bigint(20) NOT NULL,
  `alamat` text NOT NULL,
  `lulus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `password`, `jk`, `id_kelas`, `id_prodi`, `alamat`, `lulus`) VALUES
('04563', 'Jalar Mardika', 'f0783370ce4988a97dcb63a977eb6747', 'Laki-laki', 2, 1, 'Jl. Soponyono No. 1 Ds. Kedungsuren 04/05 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('08625', 'Aestu Witular', '9f10bc9f0a6db6aba3d00064de707045', 'Perempuan', 2, 2, 'Jl. Soponyono No. 1 Ds. Kedungsuren 04/05 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('08652', 'Muhammad Surya Mukti', '9870707091e577de88930ce558347125', 'Laki-laki', 2, 4, 'Jl. Kedungsuren No. 100 Ds. Kedungsuren 01/04 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('09636', 'Dwi Lestari Agustina', '7aa2602c588c05a93baf10128861aeb9', 'Perempuan', 2, 1, 'Jl. Darupono No. 34 Ds. Darupono 04/05 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('12785', 'Galuh Prasetyo', '7e67f82b2528050191537b600c15f48e', 'Laki-laki', 4, 2, 'Jl. Sidomakmur No. 101 Ds. Sidomakmur 04/05 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('15683', 'Eka Saputri', '79ee82b17dfb837b1be94a6827fa395a', 'Perempuan', 4, 1, 'Jl. Podorejo No. 11 Ds. Podorejo 04/05 Kec. Ngaliyan Kab. Semarang', 0),
('16354', 'Egy Maulana Hasan', '6a73901588db3d2eac37156006ceb546', 'Laki-laki', 4, 1, 'Perumahan Kaliwungu Indah Ds. Magelung 02/03 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('17843', 'Putri Fadilah', '4093fed663717c843bea100d17fb67c8', 'Perempuan', 4, 4, 'Jl. Darupono No. 17 Ds. Darupono 04/01 Kec. Kaliwungu Selatan Kab. Kendal', 0),
('23608', 'Ayu Puspita Sari', '29c65f781a1068a41f735e1b092546de', 'Perempuan', NULL, 1, 'Jl. Darupono No. 02 Ds. Darupono 08/05 Kec. Kaliwungu Selatan Kab. Kendal', 1),
('24056', 'Eko Cahyo Prakoso', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'Laki-laki', NULL, 1, 'Jl. Melati No. 14 Ds. Sidomakmur 07/01 Kec. Kaliwungu Selatan Kab. Kendal', 1),
('25630', 'Agus Hamdani', 'fdf169558242ee051cca1479770ebac3', 'Laki-laki', NULL, 2, 'Jl. Darupono No. 10 Ds. Darupono 03/05 Kec. Kaliwungu Selatan Kab. Kendal', 1),
('29861', 'Tutuk Safitri', '69f9a77e8510aa3434723eecfb718c54', 'Perempuan', NULL, 4, 'Jl. Kedungsuren No. 1 Ds. Kedungsuren 02/01 Kec. Kaliwungu Selatan Kab. Kendal', 1),
('30981', 'Fitriyani', '534a0b7aa872ad1340d0071cbfa38697', 'Perempuan', 1, 4, 'Perumahan Griya Sentosa Ds. Protomulyo Kec. Kaliwungu Selatan Kab. Kendal', 0),
('33096', 'Muhammad Agus', 'fdf169558242ee051cca1479770ebac3', 'Laki-laki', 1, 1, 'Jl. Kaliancar No. 21 Ds. Podorejo 03/05 Kec. Ngaliyan Kab. Semarang', 0),
('36740', 'Heri Setiawan', '6812af90c6a1bbec134e323d7e70587b', 'Laki-laki', 1, 2, 'Puri Delta Asri 7 Ds. Magelung Kec. Kaliwungu Selatan Kab. Kendal', 0),
('37650', 'Yuda Putra Ramadhan', 'ac9053a8bd7632586c3eb663a6cf15e4', 'Laki-laki', 1, 1, 'Jl. Soponyono No. 1 Ds. Kedungsuren 04/05 Kec. Kaliwungu Selatan Kab. Kendal', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`id_bulanan`),
  ADD KEY `fk_periode_bulanan` (`id_periode`),
  ADD KEY `fk_kelas_bulanan` (`id_kelas`),
  ADD KEY `fk_bulan_bulanan` (`id_bulan`),
  ADD KEY `fk_petugas_bulanan` (`id_petugas`),
  ADD KEY `fk_siswa_bulanan` (`nis`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_kelas_siswa` (`id_kelas`),
  ADD KEY `fk_prodi_siswa` (`id_prodi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  MODIFY `id_bulanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  ADD CONSTRAINT `fk_bulan_bulanan` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `fk_kelas_bulanan` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_periode_bulanan` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`),
  ADD CONSTRAINT `fk_petugas_bulanan` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `fk_siswa_bulanan` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas_siswa` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_prodi_siswa` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
