-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2024 pada 09.41
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mda-web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `photo`, `id_user`) VALUES
(10, '1771022308020008', 'Alfito Dhiyu Priawan', 'Laki-laki', '2002-08-23', '082321712002', 'alfitodhiyu5@gmail.com', 'Jln. Zainul Arifin Gg. Pensiunan', 'photo-admin-2002-08-23-652f92f5db.jpg', 477);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` int(10) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `dusun`, `desa`, `kecamatan`, `kabupaten`) VALUES
(81, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(82, 'TRINI', 'TRINI', 'Kec. Gamping', 'Sleman'),
(83, 'Gedongan', 'Sinduadi', 'Kec. Gamping', 'Sleman'),
(84, 'KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(85, 'NUSUPAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(86, 'Ngawen', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(87, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(88, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(89, 'PUNDONG 1', 'TIRTOADI', 'Kec. Mlati', 'Sleman'),
(90, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(91, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(92, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(93, 'Baturan', 'Baturan', 'Kec. Gamping', 'Sleman'),
(94, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(95, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(96, 'MURANGAN VVI', 'triharjo', 'Kec. Mlati', 'Sleman'),
(97, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(98, 'NITIPURAN', 'NGESTI HARJO', 'Kec. Kasihan', 'Sleman'),
(99, '-', 'SENDANGADI', 'Kec. Mlati', 'Sleman'),
(100, 'Pogung Dalangan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(101, '-', '-', 'Kec. Gamping', 'Sleman'),
(102, 'GAMPING KIDUL', 'AMBARKETAWANG', 'Kec. Gamping', 'Sleman'),
(103, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(104, 'NGANTI', 'SENDANGADI', 'Kec. Mlati', 'Sleman'),
(105, 'TUGURAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(106, 'GETAS GANDEKAN', 'TLOGOADI', 'Kec. Mlati', 'Sleman'),
(107, 'Kutu Asem', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(108, 'SALAKAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(109, '-', '-', 'Kec. Gamping', 'Sleman'),
(110, 'POGUNG REJO', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(111, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(112, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(113, '-', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(114, '-', 'SIDOMOYO', 'Kec. Godean', 'Sleman'),
(115, 'JANTURAN  ', 'WARUNGBOTO', 'Kec. Umbulharjo', 'Sleman'),
(116, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(117, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(118, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(119, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(120, '-', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(121, '-', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(122, 'JETIS', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(123, '-', 'MLATI', 'Kec. Mlati', 'Sleman'),
(124, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(125, 'Mulyorejo', 'Kupang', 'Kupang', 'Sleman'),
(126, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(127, 'KANCILAN JABAN', 'SINDUHARJO', 'Kec. Gamping', 'Sleman'),
(128, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(129, '-', '-', 'Kec. Gamping', 'Sleman'),
(130, 'Desa Sukomulyo', 'Sukomulyo', 'Kec. Kaliwungu Selatan', 'Sleman'),
(131, 'KAINGAN PONOWAREN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(132, 'GEDONGAN', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(133, 'TRIHANGGO', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(134, 'Trini', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(135, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(136, 'BLUNYAHREJO', 'KARANGWARU', 'Kec. Tegalrejo', 'Sleman'),
(137, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(138, 'PUNDONG 2', 'TIRTOADI', 'Kec. Mlati', 'Sleman'),
(139, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(140, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(141, 'Biru', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(142, 'PATRAN TEGAL', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(143, 'TUGURAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(144, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(145, 'Tegalsari', 'Tegaltirto', 'Kec. Berbah', 'Sleman'),
(146, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(147, 'BRAGASAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(148, 'JONGKE TENGAH', 'SENDANGADI', 'Kec. Mlati', 'Sleman'),
(149, '-', 'Nogotirto', 'Kec. Gamping', 'Sleman'),
(150, 'SALAKAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(151, 'KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(152, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(153, '-', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(154, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(155, 'KUTU RADEN', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(156, 'Biru', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(157, 'DONOKITRI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(158, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(159, '-', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(160, 'NUSUPAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(161, '-', 'Tihanggo', 'Kec. Gamping', 'Sleman'),
(162, 'Kwarasan', 'Nogotirto', 'Kec. Gamping', 'Sleman'),
(163, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(164, 'TRINI', 'GAMPING', 'Kec. Mlati', 'Sleman'),
(165, 'KRONGGAHAN I', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(166, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(167, 'RAJEK NGEMPLAK', 'TIRTOADI', 'Kec. Gamping', 'Sleman'),
(168, 'DONOKITRI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(169, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(170, 'Mayangan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(171, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(172, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(173, 'NGENTAK GEDE BEDOG', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(174, 'GEDONGAN', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(175, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(176, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(177, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(178, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(179, 'BEDOG', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(180, 'BATURAN LOR', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(181, 'Trihanggo', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(182, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(183, 'KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(184, 'GAMPING KIDUL', 'AMBARKETAWANG', 'Kec. Gamping', 'Sleman'),
(185, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(186, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(187, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(188, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(189, 'Jambon', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(190, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(191, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(192, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(193, 'Jambon', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(194, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(195, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(196, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(197, 'Karang Tengah', 'Nogotirto', 'Kec. Gamping', 'Sleman'),
(198, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(199, 'Ngawen', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(200, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(201, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(202, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(203, '-', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(204, 'BRAGASAN MAYANGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(205, 'Karangbajang', 'Tlogoadi', 'Kec. Mlati', 'Sleman'),
(206, 'Trini', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(207, 'Paingan', 'Maguwoharjo', 'Kec. Depok', 'Sleman'),
(208, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(209, 'KUTU ASEM', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(210, 'Donokitri', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(211, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(212, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(213, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(214, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(215, 'Mayangan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(216, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(217, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(218, 'Kutu Raden', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(219, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(220, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(221, 'Donokitri', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(222, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(223, 'Kutu Asem', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(224, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(225, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(226, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(227, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(228, 'Bragasan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(229, 'Kutu Asem', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(230, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(231, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(232, 'Bragasan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(233, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(234, 'Baturan Kidul', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(235, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(236, 'Kutu Raden', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(237, 'Baturan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(238, 'Gabahan', 'Sumberadi', 'Kec. Mlati', 'Sleman'),
(239, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(240, 'Duwet', 'Sendangadi', 'Kec. Mlati', 'Sleman'),
(241, 'Biru', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(242, 'Salakan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(243, 'Kragilan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(244, 'Biru', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(245, 'MAYANGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(247, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(248, 'PERUM GRIYA ARGA PERMAI KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(249, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(250, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(251, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(252, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(253, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(254, 'NGAGLIK', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(255, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(256, 'BATURAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(257, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(258, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(259, 'GEDONGAN', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(260, 'TUGURAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(261, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(262, '-', 'Ulee Patta', 'Kec. Jaya Baru', 'Sleman'),
(263, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(264, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(265, 'DONOKITRI MAYANGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(266, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(267, 'KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(268, 'KARANG TENGAH', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(269, 'NANDAN', 'SARIHARJO', 'Kec. Ngaglik', 'Sleman'),
(270, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(271, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(272, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(273, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(274, 'MAYANGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(275, 'KEDON BEDOG', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(276, 'SALAKAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(277, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(278, 'JETIS', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(279, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(280, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(281, 'NGAWEN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(282, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(283, 'DONOKITRI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(284, 'JOMBOR LOR', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(285, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(286, 'TRINI', 'SINDUADI', 'Kec. Gamping', 'Sleman'),
(287, 'Ngluwak', 'Jatikuwung', 'Kec. Jatipuro', 'Karanganyar'),
(288, 'BRAGASAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(289, 'JONGKE TENGAH', 'SENDANGADI', 'Kec. Mlati', 'Sleman'),
(290, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(291, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(292, 'TRINI', 'SINDUADI', 'Kec. Gamping', 'Sleman'),
(293, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(294, 'Ling Mendut II', 'Mendut', 'Kec. Magelang Tengah', 'Magelang'),
(295, 'MULUNGAN WETAN', 'SENDANGADI', 'Kec. Mlati', 'Sleman'),
(296, 'Karang Bajang', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(297, 'Modinan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(298, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(299, 'BRAGASAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(300, 'Dlanggon', 'Blanceran', 'Kec. Karanganom', 'Sleman'),
(301, 'BRAGASAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(302, 'PATRAN', 'BANYURADEN', 'Kec. Gamping', 'Sleman'),
(303, 'Jambon', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(304, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(305, 'Tuguran', 'Nogotirto', 'Kec. Gamping', 'Sleman'),
(306, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(307, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(308, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(309, '-', 'CIPAYUNG', 'Kec. Cipayung', 'Jakarta Timur'),
(310, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(311, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(312, 'TRINI', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(313, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(314, 'PANGGUNGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(315, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(316, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(317, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(318, 'Tambak', 'Ngestiharjo', 'Kec. Kasihan', 'Sleman'),
(319, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(320, 'BRAGASAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(321, 'JETIS', 'SINDUADI', 'Kec. Mlati', 'Sleman'),
(322, 'JAMBON', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(323, 'Jetis', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(324, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(325, '-', 'CONDONGCATUR', 'Kec. Depok', 'Sleman'),
(326, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(327, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(328, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(329, 'DONOKITRI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(330, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(331, '-', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(332, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(333, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(334, 'TRINI', 'sinduadi', 'Kec. Mlati', 'Sleman'),
(335, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(336, 'Gedongan', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(337, 'BEDOG', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(338, 'Trini', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(339, 'Baturan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(340, 'KWARASAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(341, '-', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(342, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(343, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(344, 'TRINI', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(345, 'Biru', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(346, 'Mayangan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(347, 'TRINI', 'SINDUADI', 'Kec. Gamping', 'Sleman'),
(348, 'TUGURAN', 'NOGOTIRTO', 'Kec. Gamping', 'Sleman'),
(349, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(350, 'Trini', 'Sinduadi', 'Kec. Mlati', 'Sleman'),
(351, '-', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(352, 'BRAGASAN MAYANGAN', 'TRIHANGGO', 'Kec. Gamping', 'Sleman'),
(353, 'BATURAN', 'TRIHANGGO', 'Kec. Tegalrejo', 'Yogyakarta'),
(354, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(355, 'Baturan', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(356, 'Trini', 'Sinduadi', 'Kec. Gamping', 'Sleman'),
(357, 'Trini', 'Trihanggo', 'Kec. Gamping', 'Sleman'),
(358, 'TRINI', 'TRIHANGG0', 'Kec. Gamping', 'Sleman'),
(361, 'Jl.Zainul Arifin Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(362, 'Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(363, 'Jl. Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(364, 'Jl.Danau', 'Bengkulu', 'Singaran Pati', 'Panorama'),
(365, 'Jl. Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(366, 'Jl. Zainul Arifin No. 59', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(367, 'Jl.Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(368, 'Jl. Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(369, 'JL. Zainul Arifin Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(370, 'Jl.Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(371, 'Jl. Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(372, 'Jl. Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(373, 'Jl.. Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(374, 'Jl.garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(375, 'Jl.Al Muhajirin Gang .Almukaromah', 'Bengkulu', 'Singaran Pati', 'Dusun Besar'),
(376, 'Jl.Zainul Arifin Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(377, 'Jl.Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(378, 'Jl.Zainul Arifin Gang Setia', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(379, 'Jl. Al Mukaromah 1', 'Bengkulu', 'Singaran Pati', 'Dusun Besar'),
(380, 'Jl.Z. Arifin No.28Jl.Z. Arifin No.28', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(381, 'Jl. Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(382, 'Jl.garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(383, 'Asrama Kompi B Yonif 144', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(384, 'Jl.Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(385, 'Jl.Zainul Arifin No.27', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(386, 'Jl.Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(387, 'Jl.Danau', 'Bengkulu', 'Singaran Pati', 'Panorama'),
(388, 'Jl. Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(389, 'Jl. Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(390, 'Jl. Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(391, 'Jl. Danau', 'Bengkulu', 'Singaran Pati', 'Panorama'),
(392, 'Grand Kopri Bentiring Blok B No.018', 'Bengkulu', 'Muara Bangka Hulu', 'Bentiring '),
(393, 'JL.Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(394, 'Jl.Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(395, 'Jl. Pariwisata', 'Bengkulu', 'Singaran Pati', 'Timur Indah'),
(396, 'Jl.Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(397, 'Jl.Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(398, 'Jl.Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(399, 'Jl.Zainul Arifin Gang. Setia', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(400, 'Jl.Garuda II Asrama Korem', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(401, 'Jl.Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(402, 'Jl. Muhajirin 17', 'Bengkulu', 'Singaran Pati', 'Dusun Besar'),
(403, 'Jl.Z.Arifin Gang Garuda II', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(404, 'Jl.Zainul Arifin Gang Setia', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(405, 'Jl. Zainul Arifin Gang Setia', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(406, 'Jl. Zainul Arifim Gang Garuda II No.40', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(407, 'Jl.Garuda III Gang Setia', 'Bengkulu', 'Singaran Pati', 'Padang Nangka'),
(408, 'Jl.Zainul Arifin', 'Bengkulu', 'Singaran Pati', 'Padang Nangka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsipnilai`
--

CREATE TABLE `tb_arsipnilai` (
  `id_arsip` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nilai` float NOT NULL,
  `id_kd` int(10) DEFAULT NULL,
  `id_datasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datasiswa`
--

CREATE TABLE `tb_datasiswa` (
  `id_datasiswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_datasiswa`
--

INSERT INTO `tb_datasiswa` (`id_datasiswa`, `id_siswa`, `id_kelas`, `tahun_ajaran`) VALUES
(320, 356, 41, '2023/2024'),
(321, 351, 41, '2023/2024'),
(322, 366, 42, '2023/2024'),
(323, 365, 42, '2023/2024'),
(324, 354, 42, '2023/2024'),
(325, 369, 42, '2023/2024'),
(326, 359, 42, '2023/2024'),
(342, 357, 44, '2023/2024'),
(343, 358, 44, '2023/2024'),
(344, 363, 44, '2023/2024'),
(345, 361, 44, '2023/2024'),
(346, 352, 44, '2023/2024'),
(347, 371, 44, '2023/2024'),
(348, 360, 44, '2023/2024'),
(349, 353, 44, '2023/2024'),
(350, 364, 44, '2023/2024'),
(351, 372, 44, '2023/2024'),
(352, 381, 42, '2023/2024'),
(353, 377, 42, '2023/2024'),
(354, 375, 42, '2023/2024'),
(355, 379, 42, '2023/2024'),
(356, 380, 42, '2023/2024'),
(357, 378, 42, '2023/2024'),
(358, 376, 42, '2023/2024'),
(359, 374, 44, '2023/2024'),
(360, 373, 44, '2023/2024'),
(361, 382, 42, '2023/2024'),
(362, 387, 41, '2023/2024'),
(363, 393, 41, '2023/2024'),
(364, 391, 41, '2023/2024'),
(365, 390, 41, '2023/2024'),
(366, 395, 41, '2023/2024'),
(367, 384, 41, '2023/2024'),
(368, 392, 41, '2023/2024'),
(369, 383, 41, '2023/2024'),
(370, 385, 41, '2023/2024'),
(371, 389, 41, '2023/2024'),
(372, 386, 41, '2023/2024'),
(373, 388, 41, '2023/2024'),
(374, 394, 41, '2023/2024'),
(375, 396, 41, '2023/2024'),
(376, 397, 41, '2023/2024'),
(377, 398, 41, '2023/2024'),
(378, 367, 43, '2023/2024'),
(379, 368, 43, '2023/2024'),
(380, 370, 43, '2023/2024'),
(381, 355, 43, '2023/2024'),
(382, 362, 43, '2023/2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `photo`, `id_user`) VALUES
(89, '1771025505540004', 'Dra. Hj. Nurhayati Roni', 'Perempuan', '1954-05-15', '081273140684', 'nurhayatironi@gmail.com', 'JL. Zainul Arifin No. 44', 'photo-guru-1954-05-15-af249bd783.jpeg', 423),
(90, '1771025608790008', 'Fatna Sari', 'Perempuan', '1979-08-16', '085268353060', 'fatnasari@gmail.com', 'JL. Zainul Arifin Gg. Pensiunan', 'photo-guru-1979-08-16-3cc1d90c62.jpeg', 424),
(91, '1771020507760011', 'Supra', 'Laki-laki', '1976-07-05', '081279323358', 'supra221@yahoo.com', 'JL. Zainul Arifin Gg. Keluarga', 'photo-guru-1976-07-05-c16a065976.jpeg', 426),
(92, '1771025505700010', 'Susi Darmawansi', 'Perempuan', '1969-05-18', '085788289100', 'susidarmawansi@gmail.com', 'JL. Zainul Arifin Gg. Garuda', 'photo-guru-1969-05-18-f4b8e3d308.jpeg', 427);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kd`
--

CREATE TABLE `tb_kd` (
  `id_kd` int(10) NOT NULL,
  `nama_kd` varchar(50) NOT NULL,
  `jenis_penilaian` enum('UTS','UAS') NOT NULL,
  `id_mapel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kd`
--

INSERT INTO `tb_kd` (`id_kd`, `nama_kd`, `jenis_penilaian`, `id_mapel`) VALUES
(605, '', '', 122),
(606, '', '', 122),
(661, 'Memahami Hadist', 'UTS', 121),
(662, 'Memahami Hadist', 'UAS', 121),
(669, 'Menghapal Al-Qur\'an', 'UTS', 121),
(670, 'Menghapal Al-Qur\'an', 'UAS', 121),
(671, 'Membaca Al-Qur\'an dengan Tajwid', 'UTS', 121),
(672, 'Membaca Al-Qur\'an dengan Tajwid', 'UAS', 121),
(677, 'Menguasai Konsep-Konsep Aqidah dan Akhlak', 'UTS', 122),
(678, 'Menguasai Konsep-Konsep Aqidah dan Akhlak', 'UAS', 122),
(679, 'Menguasai Prinsip-Prinsip Aqidah dan Akhlak', 'UTS', 122),
(680, 'Menguasai Prinsip-Prinsip Aqidah dan Akhlak', 'UAS', 122),
(681, 'Memahami tata cara sholat', 'UTS', 123),
(682, 'Memahami tata cara sholat', 'UAS', 123),
(683, 'Memahami Syarat sah puasa', 'UTS', 123),
(684, 'Memahami Syarat sah puasa', 'UAS', 123),
(685, 'Memahami dzikir dan doa', 'UTS', 123),
(686, 'Memahami dzikir dan doa', 'UAS', 123),
(687, 'Memahami Sejarah Awal Islam', 'UTS', 124),
(688, 'Memahami Sejarah Awal Islam', 'UAS', 124),
(689, 'Menguasai Perkembangan Ilmu Pengetahuan dan Perada', 'UTS', 124),
(690, 'Menguasai Perkembangan Ilmu Pengetahuan dan Perada', 'UAS', 124),
(691, 'Memahami Kisah Nabi Muhammad SAW', 'UTS', 124),
(692, 'Memahami Kisah Nabi Muhammad SAW', 'UAS', 124),
(693, 'Memahami kosakata bahasa arab', 'UTS', 125),
(694, 'Memahami kosakata bahasa arab', 'UAS', 125),
(695, 'Menghafal Ayat-Ayat Al-Qur\'an', 'UTS', 127),
(696, 'Menghafal Ayat-Ayat Al-Qur\'an', 'UAS', 127),
(697, 'Memahami Ayat-Ayat Al-Qur\'an', 'UTS', 127),
(698, 'Memahami Ayat-Ayat Al-Qur\'an', 'UAS', 127),
(699, 'Menerapkan Tajwid dalam Membaca Al-Qur\'an', 'UTS', 127),
(700, 'Menerapkan Tajwid dalam Membaca Al-Qur\'an', 'UAS', 127),
(701, 'Praktek Sholat', 'UTS', 126),
(702, 'Praktek Sholat', 'UAS', 126),
(705, 'memahami hukum bacaan idzhar', 'UTS', 128),
(706, 'memahami hukum bacaan idzhar', 'UAS', 128),
(707, 'memahami hukum bacaan idgham', 'UTS', 128),
(708, 'memahami hukum bacaan idgham', 'UAS', 128),
(709, 'memahami hukum bacaan iqlab', 'UTS', 128),
(710, 'memahami hukum bacaan iqlab', 'UAS', 128),
(711, 'memahami hukum bacaan ikhfa\'', 'UTS', 128),
(712, 'memahami hukum bacaan ikhfa\'', 'UAS', 128),
(713, 'memahami hukum bacaan idzhar', 'UTS', 128),
(714, 'memahami hukum bacaan idzhar', 'UAS', 128),
(715, 'memahami hukum bacaan idgham', 'UTS', 128),
(716, 'memahami hukum bacaan idgham', 'UAS', 128),
(717, 'memahami hukum bacaan iqlab', 'UTS', 128),
(718, 'memahami hukum bacaan iqlab', 'UAS', 128),
(719, 'memahami hukum bacaan ikhfa\'', 'UTS', 128),
(720, 'memahami hukum bacaan ikhfa\'', 'UAS', 128),
(721, 'Memahami huruf hijaiyah', 'UTS', 129),
(722, 'Memahami huruf hijaiyah', 'UAS', 129),
(723, 'memahami tanda baca pada huruf hijaiyah', 'UTS', 129),
(724, 'memahami tanda baca pada huruf hijaiyah', 'UAS', 129),
(725, 'Memahami Thaharah', 'UTS', 132),
(726, 'Memahami Thaharah', 'UAS', 132),
(727, 'Memahami berwudhu', 'UTS', 132),
(728, 'Memahami berwudhu', 'UAS', 132),
(729, 'Menguasai lafadz adzan dan iqamah', 'UTS', 132),
(730, 'Menguasai lafadz adzan dan iqamah', 'UAS', 132);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `wali_kelas`) VALUES
(41, 'Kelas I', 'Fatna Sari'),
(42, 'Kelas II', 'Supra'),
(43, 'Kelas III', 'Dra. Hj. Nurhayati Roni'),
(44, 'Kelas IV', 'Susi Darmawansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `level` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`id_mapel`, `nama_mapel`, `level`) VALUES
(121, 'Al-Qur\'an Hadist', '3'),
(122, 'Aqidah Akhlak', '1'),
(123, 'Ibadah Syariah', '1'),
(124, 'Tarikh Islam', '1'),
(125, 'Bahasa Arab', '2'),
(126, 'Praktek Ibadah', '1'),
(127, 'Tahfidz Qur\'an', '2'),
(128, 'Al - Qur\'an Tajwid', '2'),
(129, 'Iqra', '1'),
(132, 'Fiqih ', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nilai` float NOT NULL,
  `id_kd` int(10) NOT NULL,
  `id_datasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `jenis`, `nilai`, `id_kd`, `id_datasiswa`) VALUES
(2527, 'UTS', 78, 721, 320),
(2528, 'UTS', 87, 721, 321),
(2529, 'UTS', 77, 721, 362),
(2530, 'UTS', 76, 721, 363),
(2531, 'UTS', 80, 721, 364),
(2532, 'UTS', 88, 721, 365),
(2533, 'UTS', 82, 721, 366),
(2534, 'UTS', 83, 721, 367),
(2535, 'UTS', 89, 721, 368),
(2536, 'UTS', 90, 721, 369),
(2537, 'UTS', 92, 721, 370),
(2538, 'UTS', 81, 721, 371),
(2539, 'UTS', 80, 721, 372),
(2540, 'UTS', 83, 721, 373),
(2541, 'UTS', 84, 721, 374),
(2542, 'UTS', 85, 721, 375),
(2543, 'UTS', 85, 721, 376),
(2544, 'UTS', 80, 721, 377),
(2545, 'UTS', 80, 723, 320),
(2546, 'UTS', 89, 723, 321),
(2547, 'UTS', 78, 723, 362),
(2548, 'UTS', 85, 723, 363),
(2549, 'UTS', 84, 723, 364),
(2550, 'UTS', 87, 723, 365),
(2551, 'UTS', 88, 723, 366),
(2552, 'UTS', 83, 723, 367),
(2553, 'UTS', 85, 723, 368),
(2554, 'UTS', 82, 723, 369),
(2555, 'UTS', 80, 723, 370),
(2556, 'UTS', 80, 723, 371),
(2557, 'UTS', 80, 723, 372),
(2558, 'UTS', 92, 723, 373),
(2559, 'UTS', 81, 723, 374),
(2560, 'UTS', 83, 723, 375),
(2561, 'UTS', 92, 723, 376),
(2562, 'UTS', 80, 723, 377);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orangtua`
--

CREATE TABLE `tb_orangtua` (
  `id_orangtua` int(10) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_alamat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `no_hp`, `id_alamat`) VALUES
(91, 'SUPRIYATIN', 'SMP / sederajat', 'Lainnya', 'SARDI', 'SMP / sederajat', 'Karyawan Swasta', '082112192770', 81),
(92, 'MUDIYEM', 'SMP / sederajat', 'Lainnya', 'SUMEDI', 'SMP / sederajat', 'Buruh', '085232116656', 82),
(93, 'Heruningsih', 'SMA / sederajat', 'Tidak bekerja', 'Subardi', 'SMA / sederajat', 'Buruh', '083145248127', 83),
(94, 'SARYATI', 'SMA / sederajat', 'Buruh', 'AKIT MARIYANTO', 'SMA / sederajat', 'Buruh', '085641869729', 84),
(95, 'APRILLIANITA', 'Tidak sekolah', 'Tidak bekerja', 'SUDARMAN', 'SMA / sederajat', '-', '081393514518', 85),
(96, 'WINARSIH', 'SMA / sederajat', 'Wiraswasta', 'DIN SUWAJI', 'SMA / sederajat', 'Wiraswasta', '085876075200', 86),
(97, 'WARYANI', 'SMP / sederajat', 'Lainnya', 'NUR MUHAMAD CAHYA WRD', 'SMP / sederajat', 'Buruh', '081227942907', 87),
(98, 'SAPTARIA NUR AINI', 'SMP / sederajat', 'Lainnya', 'EDI PURWANTO', 'SMP / sederajat', 'Karyawan Swasta', '089634056409', 88),
(99, 'APSARI NUR PRASETYANI', 'SMA / sederajat', 'Buruh', 'PARINDI', 'SMP / sederajat', 'Buruh', '089688054289', 89),
(100, 'ASTRI CAHYANINGRUM', 'SMP / sederajat', 'Lainnya', 'MARYONO', 'SMP / sederajat', 'Karyawan Swasta', '085743664010', 90),
(101, 'ETIK HANDAYANI', 'SMP / sederajat', 'Lainnya', 'TAUFIK HIDAYAT', 'D4', 'Wiraswasta', '082242345480', 91),
(102, 'SUBEKTI', 'SMA / sederajat', 'Lainnya', 'SUNARTO', 'SMA / sederajat', 'Karyawan Swasta', '08995425035', 92),
(103, 'Isna Mutamimatus Solihah', 'D3', 'PNS/TNI/Polri', 'Nur Edi Prabha Susila Yahya', 'S2', 'Wiraswasta', '085227644719', 93),
(104, '\"DIANA EKAWATI S.Sos', 'S1', 'Tidak bekerja', 'FIRDAUS AFFANDI S.TP', 'S1', 'Wiraswasta', '0895358671328', 94),
(105, 'RIANINGSIH', 'SMA / sederajat', 'Tidak bekerja', 'DWIYONO', 'SMA / sederajat', 'Wiraswasta', '08976897983', 95),
(106, 'NOVERINA DEVY KUMALADEWI', 'D1', 'Karyawan Swasta', 'GUSTAV IRLANGGA', 'SMA / sederajat', 'Karyawan Swasta', '085643910109', 96),
(107, 'SRI PURWANTI', 'SMP / sederajat', 'Lainnya', 'ARI HERYANTO', 'SMP / sederajat', 'Wiraswasta', '085727075997', 97),
(108, 'SARIYANTI', 'SMP / sederajat', 'Pedagang Kecil', 'SUGIYANTO', 'SD / sederajat', '-', '085943531692', 98),
(109, 'ANGGRAENIKENNASTITI', 'S1', 'Karyawan Swasta', 'DANANG SIGIT WAHYUDI', 'S1', 'Karyawan Swasta', '082241824150', 99),
(110, 'ANI SUPRIYATIN', 'SMA / sederajat', 'Tidak bekerja', 'WAHYU AGUNG PRIYANTO', 'SMA / sederajat', 'PNS/TNI/Polri', '087839526440', 100),
(111, 'MARIA ULFA', '-', 'Tidak bekerja', '-', '-', '-', '085764004394', 101),
(112, 'ISNIATI ROSIDAH SP', 'S1', 'Karyawan Swasta', 'YUDHI PRAMARDIYANTO', 'SMP / sederajat', 'Wiraswasta', '081225771453', 102),
(113, 'DEFE WINDI SEPTIKAWATI BAYU PUJI ASTUTI', 'SMA / sederajat', 'Wiraswasta', 'SUWARTO', 'SMP / sederajat', 'Buruh', '0895620617722', 103),
(114, 'EKA SUPARNIANINGSIH', 'SMA / sederajat', 'Karyawan Swasta', 'NUGROHO WIBOWO RAHARJO', 'SMA / sederajat', 'Karyawan Swasta', '085325959791', 104),
(115, 'INTAN KUSNULNINGTYAS', 'SMP / sederajat', 'Lainnya', 'SUHARYONO', 'SMP / sederajat', 'Wiraswasta', '089676071515', 105),
(116, 'FITRI PUJI ASTUTI', 'SMP / sederajat', 'Lainnya', 'PURNOMO', 'SMP / sederajat', 'Karyawan Swasta', '083824096848', 106),
(117, 'BADRIYAH', 'SMA / sederajat', 'Wirausaha', 'MARYONO', 'SMA / sederajat', 'Karyawan Swasta', '087839001741', 107),
(118, 'TITA APRIYANI', 'SMA / sederajat', 'Tidak bekerja', 'SUSANTO BUDI PRASETYO', 'SMA / sederajat', 'Karyawan Swasta', '089530259865', 108),
(119, 'TRI WAHYUNINGSIH', '-', 'Tidak bekerja', '-', '-', '-', '088227303872', 109),
(120, 'RARAS RINUKTI', 'SMP / sederajat', 'Lainnya', 'ROY ISKANDAR', 'SMP / sederajat', 'Karyawan Swasta', '089669167478', 110),
(121, 'NGATRIYANI', 'SMP / sederajat', 'Lainnya', 'SISWANTO', 'SMP / sederajat', 'Buruh', '085712069448', 111),
(122, 'CATUR WULANDARI', 'SMP / sederajat', 'Lainnya', 'YULI ANTORO', 'SMP / sederajat', 'Wiraswasta', '083869719459', 112),
(123, 'LIA KARTIKA SARI', 'SMA / sederajat', 'Buruh', 'RIAU KIRYAWAN', 'SMA / sederajat', 'Buruh', '089652528850', 113),
(124, 'DANIK LEVINAWATI', 'SMA / sederajat', 'Lainnya', 'MARONI', 'SMP / sederajat', 'Karyawan Swasta', '089652952285', 114),
(125, 'VIVI  SYAFRIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'DIMAS  KUSKHOLIS', 'SMA / sederajat', 'Wiraswasta', '08993642299', 115),
(126, 'SOFIAH', 'SD / sederajat', 'Lainnya', 'PARIDI', 'SMP / sederajat', 'Karyawan Swasta', '081380427159', 116),
(127, 'RETNO SUMIRIH', 'SMA / sederajat', 'Wiraswasta', 'SAJAR BUDI', 'SMA / sederajat', 'Wiraswasta', '081328352007', 117),
(128, 'NINDA PARAMITA SARI', 'SMA / sederajat', 'Karyawan Swasta', 'TONTON PRIHANTONO', 'SMP / sederajat', 'Karyawan Swasta', '08998715754', 118),
(129, 'IVA AMIYATI', 'SMA / sederajat', 'Lainnya', 'MUHAMMAD AMRI MARUF.', 'SMP / sederajat', 'Karyawan Swasta', '085786744559', 119),
(130, 'Istiyarsih Kurniawati', 'SMA / sederajat', 'Karyawan Swasta', 'Heri Pujiantoro ', 'SMA / sederajat', 'Karyawan Swasta', '081329188882', 120),
(131, 'ITA ERNAWATI', 'SMA / sederajat', 'Tidak bekerja', 'KUSTIONO', 'SMA / sederajat', 'Karyawan Swasta', '089681687243', 121),
(132, 'ESTI PURWANNGSIH', 'SMA / sederajat', 'Tidak bekerja', 'YUTANTO KAREBET', 'SMA / sederajat', 'Karyawan Swasta', '08822109507', 122),
(133, 'AHSANUL FIKRIA SEPTIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'RIFAN TRIANTO', 'SMP / sederajat', 'Karyawan Swasta', '085786762809', 123),
(134, 'YUMANAH', 'Tidak sekolah', 'Tidak bekerja', 'DARWIS SAMSURI', 'SMA / sederajat', 'Buruh', '085727507768', 124),
(135, 'ENDANG SRI TULISNINGSIH', 'SMA / sederajat', 'Tidak bekerja', 'SRIYANA', 'SMA / sederajat', 'Karyawan Swasta', '089668072688', 125),
(136, 'SARYANTI', 'S1', 'Tidak bekerja', 'SAMONO', 'SMP / sederajat', 'Buruh', '087739861964', 126),
(137, 'ROSA RENY YETY PURNAMA', 'SMA / sederajat', 'Lainnya', 'ARWAN SANTOSA', 'SMA / sederajat', 'Wiraswasta', '0895421959237', 127),
(138, 'SRI PURNAMI', 'D2', 'Karyawan Swasta', 'Dhany Asfanudin Anwar', 'S1', 'Wiraswasta', '085712018278', 128),
(139, 'LISA PUSPITASARI', '-', 'Tidak bekerja', '-', '-', '-', '085643968978', 129),
(140, 'Siti Khalimah', 'S1', 'Tidak bekerja', 'Dhona Tunggaul Wicakso', 'S1', 'Wiraswasta', '085878989511', 130),
(141, 'SUSANA', 'SMP / sederajat', 'Wiraswasta', 'BUDI SUSANTO', 'SMP / sederajat', 'Karyawan Swasta', '08990665734', 131),
(142, 'ANIS ASMOROWATI', 'SMP / sederajat', 'Lainnya', 'SUDIYANTO', 'SMP / sederajat', 'Wiraswasta', '085742450585', 132),
(143, 'BETTY SULISTIANI', 'SMA / sederajat', 'Karyawan Swasta', 'IMAM SYARONI', 'SMP / sederajat', 'Karyawan Swasta', '089508264839', 133),
(144, 'Eka Mudhalifah', 'SMA / sederajat', 'Tidak bekerja', 'Agus Sumarsono', 'SMA / sederajat', 'Karyawan Swasta', '089637480022', 134),
(145, 'RITA KURNIASIH\', S. E', 'S1', 'Karyawan Swasta', 'SANTOSO BUDI', 'D3', 'PNS/TNI/Polri', '089515203700', 135),
(146, 'LINDA CRISTIANI SIMA', 'SMP / sederajat', 'Tidak bekerja', 'EDY SULISTYANTO', 'SMA / sederajat', 'PNS/TNI/Polri', '082223809998', 136),
(147, 'NIKEN UTAMI', 'S1', 'Wiraswasta', 'HERY YUDIASTOMO', 'D3', 'Wiraswasta', '088802758479', 137),
(148, 'SITI RAHMIATUN', 'S1', 'Tidak bekerja', 'MARJONO SAPUTRO', 'SMA / sederajat', 'Buruh', '089662165590', 138),
(149, 'SUMARGUSTINI', 'SD / sederajat', 'Lainnya', 'NDOKO', 'SD / sederajat', 'Pedagang Kecil', '08985241803', 139),
(150, 'TRIMO PARYATI', 'SD / sederajat', 'Tidak bekerja', 'RATIMAN', 'SMA / sederajat', 'Karyawan Swasta', '081229259844', 140),
(151, 'Luluk Emi Uryanti', 'D3', 'PNS/TNI/Polri', 'Suharsono', 'D3', 'PNS/TNI/Polri', '087839903311', 141),
(152, 'FAJAR RIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'SUDARMAJI', 'SMA / sederajat', 'Karyawan Swasta', '087745403713', 142),
(153, 'MIA SILVIA ANGGUN NOVITA', 'SMA / sederajat', 'Wiraswasta', 'HERDHIKA SASONGKO PAMBUDIYARTO', 'SMA / sederajat', 'Wiraswasta', '087838219494', 143),
(154, 'TRI UTAMI', 'SMA / sederajat', 'Lainnya', 'NUR HARTANTO', 'SMA / sederajat', 'Karyawan Swasta', '0859138904184', 144),
(155, 'SELIAWATI', 'S1', 'Tidak bekerja', 'TRI SETYO RAHARJO', 'S1', 'Wiraswasta', '085102688673', 145),
(156, 'SUSWANTI', 'SMA / sederajat', 'Buruh', 'SUHARNO', 'SMA / sederajat', 'Karyawan Swasta', '089505861987', 146),
(157, 'TITIK SUMARTINI', 'SMA / sederajat', 'Wiraswasta', 'CAHYONO SIGIT ABDULLAH', 'SMA / sederajat', 'Karyawan Swasta', '087820001211', 147),
(158, 'HERLIN ROKHAYATI', 'SMA / sederajat', 'Tidak bekerja', 'SUKIYATO', 'SMA / sederajat', 'Wiraswasta', '085799342248', 148),
(159, 'Ana Atika Wahyu Widowati', 'SMA / sederajat', 'Tidak bekerja', 'Edi Nugroho', 'SMA / sederajat', 'Wiraswasta', '081328259170', 149),
(160, 'ANNISA HASANAH', 'D3', 'Lainnya', 'HARYONO', 'SMA / sederajat', 'Karyawan Swasta', '085959154543', 150),
(161, 'SUKILAH', 'Putus SD', 'Karyawan Swasta', 'ISROI', 'SMP / sederajat', 'Karyawan Swasta', '0895379215905', 151),
(162, 'BUDI ISTI WIJAYANTI', 'D3', 'PNS/TNI/Polri', 'SUMARYANTO', 'SMA / sederajat', 'Wiraswasta', '08983685091', 152),
(163, 'IQNAUL MASFUFAH', 'SMA / sederajat', 'Tidak bekerja', 'RIWOLO', 'SMA / sederajat', 'Karyawan Swasta', '088806737230', 153),
(164, 'FAJAR MUSTIKA SARI', 'SMA / sederajat', 'Buruh', 'SIGIT MARZUKI ZAKARIA', 'SMA / sederajat', 'Buruh', '089644072567', 154),
(165, 'SITI USMIYATI', 'SD / sederajat', 'Tidak bekerja', 'SUYATMAN', 'SMA / sederajat', 'Karyawan Swasta', '081328281148', 155),
(166, 'Ratna Fitria Damayanti', 'SMA / sederajat', 'Lainnya', 'Nugroho', 'SD / sederajat', 'Wiraswasta', '085870060974', 156),
(167, 'SUPRAPTI', 'SMP / sederajat', 'Tidak bekerja', 'HARDI', 'SD / sederajat', 'Wiraswasta', '088232433743', 157),
(168, 'KAELIN', 'SMA / sederajat', 'Lainnya', 'RIDWAN KUSPRIHATIN', 'SMA / sederajat', 'Karyawan Swasta', '087843219466', 158),
(169, 'ERNA SRI REJEKISARI', '-', 'Wiraswasta', '-', '-', '-', '085327465366', 159),
(170, 'ISWANTI', 'SMP / sederajat', 'Tidak bekerja', 'RUBIYADI', 'SMP / sederajat', 'Karyawan Swasta', '087791248408', 160),
(171, 'Diah Pintarti', 'S1', 'Karyawan Swasta', 'Dwi Suharyanto', 'S1', 'PNS/TNI/Polri', '081392239800', 161),
(172, 'Lilik', 'S1', 'Karyawan Swasta', 'Nanang Sularso', 'SMA / sederajat', 'Karyawan Swasta', '085292071651', 162),
(173, 'NUNUNG HARYATI', '-', 'Tidak bekerja', '-', '-', '-', '081804061124', 163),
(174, 'SRI RAHAYU', 'S1', 'Karyawan Swasta', 'PRIYANTORO', 'SMA / sederajat', 'PNS/TNI/Polri', '081802735116', 164),
(175, 'PENI LESTARI', 'SMP / sederajat', 'Tidak bekerja', 'EKA WIBAWA', 'SMA / sederajat', 'Wiraswasta', '081802679067', 165),
(176, 'ROHMI NUR ALIFAH', 'SMP / sederajat', 'Lainnya', 'TRIYANTO', 'SMA / sederajat', 'Karyawan Swasta', '089519973242', 166),
(177, 'HARTINI', 'SMA / sederajat', 'Tidak bekerja', 'SUPRIADI', 'SMA / sederajat', 'Wiraswasta', '085878991117', 167),
(178, 'SRI LESTARI', 'SMA / sederajat', 'Tidak bekerja', 'HARJONO', 'SMA / sederajat', 'Buruh', '083159577231', 168),
(179, 'ROSIDA', 'SMP / sederajat', 'Tidak bekerja', 'BARTONO', 'SMP / sederajat', 'Buruh', '089509743060', 169),
(180, 'Tri Setyorini', 'SMA / sederajat', 'Tidak bekerja', 'Seno Setia Budi', 'SMA / sederajat', 'Karyawan Swasta', '087838415669', 170),
(181, 'SARIYANTI', '-', 'Tidak bekerja', 'WAHYUDI', '-', '-', '085943531692', 171),
(182, 'Sri Faridatun Rahayuningtyas', 'SMP / sederajat', 'Tidak bekerja', 'Sasminto Nugroho', 'SMP / sederajat', 'Buruh', '088216595092', 172),
(183, 'ARI SULISTIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'JENDRO KALISNA', 'SMA / sederajat', 'Karyawan Swasta', '08995232810', 173),
(184, 'SUNDARI', 'SMA / sederajat', 'Sudah Meninggal', 'SUSANTO', 'SMA / sederajat', 'Buruh', '087738916015', 174),
(185, 'SRI LESTARI', 'SMA / sederajat', 'Lainnya', 'TEGUH PRIYONO', 'SMA / sederajat', 'Buruh', '08987070711', 175),
(186, 'Annisa Puspita', '-', 'Tidak bekerja', 'Sigit Panji Saputro', 'SMA / sederajat', 'Wiraswasta', '08985100501', 176),
(187, 'SUMARNI', 'SD / sederajat', 'Buruh', 'HARYANTO', 'SMA / sederajat', 'Buruh', '08979543678', 177),
(188, 'SITI ZUISTI', 'SMP / sederajat', 'Lainnya', 'ARIEP BUDI WIBOWO', 'SMP / sederajat', 'Buruh', '0', 178),
(189, 'SUPRIYATMI', 'SMP / sederajat', 'Tidak bekerja', 'AMBAR PRIHATIN', 'SMP / sederajat', 'Wiraswasta', '089652654226', 179),
(190, 'ERAWATI AGUSTINA', 'SMA / sederajat', 'Karyawan Swasta', 'EKO RUDIANTO', 'SMA / sederajat', 'Buruh', '0895414395605', 180),
(191, 'Anis Solikhah', 'S1', 'Karyawan Swasta', 'Imam Sumarlan', 'S1', 'Karyawan Swasta', '088216411611', 181),
(192, 'Sutilah', 'SMA / sederajat', 'Wiraswasta', 'Maryanto', 'SMA / sederajat', 'Wiraswasta', '089629674433', 182),
(193, 'DEVI OCVITARINI', 'D3', 'Tidak bekerja', 'BAMBANG SETIADI', 'S1', 'Karyawan Swasta', '081476602181', 183),
(194, 'ISNIATI ROSIDAH SP', 'S1', 'Tidak bekerja', 'YUDHI PRAMARDIYANTO', 'SMA / sederajat', 'Wiraswasta', '081567648963', 184),
(195, 'Heruningsih', 'SMA / sederajat', 'Tidak bekerja', 'Subardi', 'SMA / sederajat', 'Buruh', '083145248127', 185),
(196, 'NURI NUR CAHYANTI', 'SMA / sederajat', 'Tidak bekerja', 'KRISWANTO', 'SMA / sederajat', 'Karyawan Swasta', '08986696441', 186),
(197, 'Indri Wahyuni', 'SMA / sederajat', 'Wiraswasta', 'Heru Yulianto', 'SMA / sederajat', 'Karyawan Swasta', '081227957261', 187),
(198, 'SUMARJIEM', 'SMP / sederajat', 'Tidak bekerja', 'SUMARNO', 'SD / sederajat', 'Buruh', '089613907051', 188),
(199, 'MARGA SARI BUDI UTAMI', 'SMA / sederajat', 'Karyawan Swasta', 'MATIAS KURNIAWAN', 'SMA / sederajat', 'Karyawan Swasta', '082242814228', 189),
(200, 'Dewi Reknawangsi', 'S1', 'Tidak bekerja', 'Lilik Kiswanto', '-', 'Karyawan Swasta', '0895380144480', 190),
(201, 'SRI PURNAMI', 'D2', 'Karyawan Swasta', 'DHANY ASFANUDIN ANWAR', 'S1', 'Wiraswasta', '08571018278', 191),
(202, 'Puji Astuti', 'SMA / sederajat', 'Tidak bekerja', 'Abdul Salim', 'SMP / sederajat', 'Buruh', '081904728293', 192),
(203, 'Sulistiani', 'SMA / sederajat', 'Tidak bekerja', 'Fajar Fakhrudin', 'SMA / sederajat', 'Buruh', '081310304627', 193),
(204, 'ANI NUR KHASANAH', 'SMA / sederajat', 'Karyawan Swasta', 'RIO ASEP SUPRIYONO', 'SMA / sederajat', 'Buruh', '087878735175', 194),
(205, 'Suwarni', 'SMA / sederajat', 'Tidak bekerja', 'Rudianto', 'SMA / sederajat', 'Wiraswasta', '0895359010947', 195),
(206, 'Diana Siswanti', '-', 'Tidak bekerja', 'Ngadimun', 'SMA / sederajat', 'PNS/TNI/Polri', '081328203388', 196),
(207, 'Ira Marta Radite', 'D3', 'Tidak bekerja', 'Riasman Hardy', 'S1', 'Wiraswasta', '087739017597', 197),
(208, 'TRI LUMIYATI', 'S1', 'Tidak bekerja', 'PRIYANTO', 'SD / sederajat', 'Buruh', '0895362515363', 198),
(209, 'Ninien Kurniawati', 'S1', 'Wiraswasta', 'Moh Umar', 'SMA / sederajat', 'Wiraswasta', '089592803901', 199),
(210, 'Mirna Novilata', 'SMA / sederajat', 'Karyawan Swasta', 'Sugeng Riadi', 'SMP / sederajat', 'Buruh', '089654503144', 200),
(211, 'Novia Ristantri', 'SMP / sederajat', 'Karyawan Swasta', 'Sulardi', 'SD / sederajat', 'Karyawan Swasta', '089502803901', 201),
(212, 'NOVITA AKHIRYANTI', 'S1', 'Tidak bekerja', 'NOVIE SUJATMIKO', 'D3', 'Karyawan Swasta', '082243596450', 202),
(213, 'Salfi Indriawati', 'SMP / sederajat', 'Tidak bekerja', 'Dwianto Febriansyah', 'SMA / sederajat', 'Buruh', '08978805188', 203),
(214, 'LASMINI', 'SMA / sederajat', 'Buruh', '-', 'Tidak sekolah', '-', '085866518488', 204),
(215, 'Krismiatun', 'SMA / sederajat', 'Pedagang Kecil', 'Didik Dwi Rahmanto', 'SMA / sederajat', 'Karyawan Swasta', '082119328080', 205),
(216, 'Nenny Lestari', 'SMA / sederajat', 'Tidak bekerja', 'Ispambudi', 'SMA / sederajat', 'Buruh', '089528886388', 206),
(217, 'Barlin Yuwarinten', 'SMA / sederajat', 'Tidak bekerja', 'Aris Setiawan', 'SMA / sederajat', 'Karyawan Swasta', '08562865633', 207),
(218, 'MERISTA SUJARWO', 'SMA / sederajat', 'Karyawan Swasta', '-', 'Tidak sekolah', 'Tidak bekerja', '089666798408', 208),
(219, 'ANIK RISTIYANA', 'SMP / sederajat', 'Tidak bekerja', 'ARIYANTO', 'D3', 'Karyawan Swasta', '08543093034', 209),
(220, 'WARDANI TRI SETITI', 'SMA / sederajat', 'Tidak bekerja', 'SUGIYONO', 'SMA / sederajat', 'Karyawan Swasta', '08985494316', 210),
(221, 'INDRIATI', 'SMA / sederajat', 'Karyawan Swasta', 'ISROK', 'SMA / sederajat', 'Karyawan Swasta', '087738340182', 211),
(222, 'Widya Astuti', 'SMA / sederajat', 'Karyawan Swasta', 'Sugiarto', 'SMA / sederajat', 'Karyawan Swasta', '0895364201279', 212),
(223, 'FERIDA', 'SMA / sederajat', 'Karyawan Swasta', 'AGUS WIDAYADI', 'SMA / sederajat', 'Wiraswasta', '087839396319', 213),
(224, 'SULISTYA RAHAYU', 'SMA / sederajat', 'Karyawan Swasta', '-', 'Tidak sekolah', '-', '0895389744462', 214),
(225, 'ANIF SUMIYATI AHLI MADYA', 'D3', 'Tidak bekerja', 'JOKO WIJAYA AHLIMADYA', 'D3', 'Buruh', '085101841933', 215),
(226, 'AFIYANI', 'SD / sederajat', 'Tidak bekerja', 'SRIYADI', 'SD / sederajat', 'Buruh', '085641416840', 216),
(227, 'YUNIATI NINGSIH', 'SMA / sederajat', 'Tidak bekerja', 'MARWANTO', 'SMA / sederajat', 'PNS/TNI/Polri', '089620883824', 217),
(228, 'DESI RESTUNINGSIH', '-', 'Karyawan Swasta', 'AGUS YOGASMANA', 'SMA / sederajat', 'Karyawan Swasta', '081615524807', 218),
(229, 'ERNA ENDRAYANI', 'SMA / sederajat', 'Tidak bekerja', 'SUPARDIYANTO', 'SMA / sederajat', 'Karyawan Swasta', '089668879646', 219),
(230, 'SUPRIYATIN', 'SMA / sederajat', 'Tidak bekerja', 'SARDI', 'SMA / sederajat', 'Karyawan Swasta', '082112192770', 220),
(231, 'FITRI PUJI ASTUTI', 'SMA / sederajat', 'Karyawan Swasta', 'PURNOMO', 'SMP / sederajat', 'Karyawan Swasta', '083824096848', 221),
(232, 'GIARMI', 'SMA / sederajat', 'Tidak bekerja', 'AGUNG SUWARTANA', 'SMA / sederajat', 'Karyawan Swasta', '0895391150383', 222),
(233, 'MAROTIN INAYATI', 'S1', 'Karyawan Swasta', 'ARYO PANDJI', 'S1', 'Karyawan Swasta', '082243800707', 223),
(234, 'DEFE WINDI SEFTIKAWATI BAYU PUJIASTUTI', 'SMA / sederajat', 'Tidak bekerja', 'SUWARTO', 'SMP / sederajat', 'Buruh', '0895620617722', 224),
(235, 'ARIYANTI', 'SMA / sederajat', 'Karyawan Swasta', 'HERU NURHADI PRIYONO', 'SMA / sederajat', 'Wirausaha', '089527130510', 225),
(236, 'SOFIAH', 'SD / sederajat', 'Tidak bekerja', 'PARIDI', 'SMP / sederajat', 'Buruh', '081380427159', 226),
(237, 'TRI ASTUTI', 'SMA / sederajat', 'Tidak bekerja', 'DEDY YUWONO', 'SMA / sederajat', 'PNS/TNI/Polri', '081229201798', 227),
(238, 'ANININGSIH', 'SMA / sederajat', 'Buruh', 'ADIYANTO ASRI WIBOWO', 'SMA / sederajat', 'Karyawan Swasta', '0895639520104', 228),
(239, 'BADRIYAH', 'SMA / sederajat', 'Tidak bekerja', 'MARYONO', 'SMA / sederajat', 'Karyawan Swasta', '081391113522', 229),
(240, 'BUDININGSIH', 'SMP / sederajat', 'Tidak bekerja', 'EKO PURWANTO', 'SMP / sederajat', 'Karyawan Swasta', '08983681268', 230),
(241, 'LILIS ELIYATI', 'S1', 'Tidak bekerja', 'YANUAR PUTRANTO', 'S1', 'Karyawan Swasta', '081227425767', 231),
(242, 'SUKINEM', 'SMP / sederajat', 'Tidak bekerja', 'SUMARDI', 'SMA / sederajat', 'Buruh', '088239282553', 232),
(243, 'SUMARSILAH', 'SMA / sederajat', 'Karyawan Swasta', 'SURONO', 'SMA / sederajat', 'Karyawan Swasta', '08895391206937', 233),
(244, 'ESEM NURHAYATI', 'SD / sederajat', 'Buruh', 'WINANTO', 'SMA / sederajat', 'Karyawan Swasta', '081215514884', 234),
(245, 'WENTI NUR ANISA', 'D1', 'Tidak bekerja', 'DJAROT SETYO NUGROHO', 'D1', 'Karyawan Swasta', '0895422305560', 235),
(246, 'SUGINEM', 'SMA / sederajat', 'Tidak bekerja', 'SLAMET SODIKIN', 'SMA / sederajat', 'Buruh', '085799950534', 236),
(247, 'MARSINI', 'SMP / sederajat', 'Tidak bekerja', 'TEGUH PRIYADI', 'SMP / sederajat', 'Buruh', '087839167560', 237),
(248, 'DWI NURYANTI', 'S1', 'Tidak bekerja', 'WIDIYANTO', 'SMA / sederajat', 'Karyawan Swasta', '085801991546', 238),
(249, 'TRI HANDAYANI', 'SMA / sederajat', 'Tidak bekerja', 'RUSDIYONO', 'SMP / sederajat', 'Karyawan Swasta', '082241927141', 239),
(250, 'TANTRI WIJAYANTI', 'S1', 'Tidak bekerja', 'SAPTO NUGROHO', 'SMA / sederajat', 'Wiraswasta', '088221181568', 240),
(251, 'ATIK RATNAWATI', 'SMA / sederajat', 'Tidak bekerja', 'SURANTO', 'SMA / sederajat', 'Wiraswasta', '08993408504', 241),
(252, 'SRI MULYANI', 'SMA / sederajat', 'Tidak bekerja', 'JOJO WARDIYONO', 'SMA / sederajat', 'Wiraswasta', '083877372979', 242),
(253, 'PARYANI', 'SMP / sederajat', 'Pedagang Kecil', 'SLAMET ROMADON', 'SD / sederajat', '-', '081228964632', 243),
(254, 'LULUK EMI URYANTI', 'D3', 'PNS/TNI/Polri', 'SUHARSONO', 'D3', 'PNS/TNI/Polri', '087839903311', 244),
(255, 'SUMIRAH', 'SMA / sederajat', 'Tidak bekerja', 'YULIANTO', 'SMA / sederajat', 'Wiraswasta', '0818277015', 245),
(257, 'SALFI INDRIAWATI', 'SMA / sederajat', 'Tidak bekerja', 'DWIANTO PEBRIANSYAH', 'SMA / sederajat', 'Buruh', '08978805188', 247),
(258, 'SUYATNI', 'S1', 'Tidak bekerja', 'FATCHURRAHMAN FIRDAUS', 'S1', 'Karyawan Swasta', '081772871771', 248),
(259, 'DWI ASTUTININGSIH', 'SMA / sederajat', 'Buruh', 'DEPIN HERIYANTO', 'SMA / sederajat', 'Karyawan Swasta', '081931781556', 249),
(260, 'FAHMIANI FITRIA ANZALA', 'SMA / sederajat', 'Tidak bekerja', 'ARIF PIYANI', 'SMP / sederajat', 'Buruh', '081229851210', 250),
(261, 'DWI RATNAWATI ARTININGSIH', 'D2', 'Tidak bekerja', 'RATNO SUBAGYO', 'SMA / sederajat', 'Pedagang Kecil', '087839635158', 251),
(262, 'SRI PURWANTI', 'SMA / sederajat', 'Tidak bekerja', 'ARI HERYANTO', 'SMA / sederajat', 'Karyawan Swasta', '085727075997', 252),
(263, 'WARYANI', 'SMA / sederajat', 'Tidak bekerja', 'NUR MUHAMAD CAHYA WRD', 'SMA / sederajat', 'Wiraswasta', '081227942907', 253),
(264, 'SRI NINGSIH', 'SMA / sederajat', 'Karyawan Swasta', 'BAMBANG BAGUS EDI SURAHMAN', 'SMA / sederajat', 'Wiraswasta', '08122778717', 254),
(265, 'YUNITA RAHMAWATI', 'SMA / sederajat', 'Tidak bekerja', 'ASRIANSYAH', 'D3', 'Wiraswasta', '082135524554', 255),
(266, 'SUHARNI', 'SMA / sederajat', 'Buruh', 'SUWANDI', '-', 'Sudah Meninggal', '083104298889', 256),
(267, 'SUATMI', 'SD / sederajat', 'Pedagang Kecil', 'SUTRISNO', 'SMP / sederajat', 'Wiraswasta', '082328020841', 257),
(268, 'TITIN SUMARNI', 'SMA / sederajat', 'Buruh', 'SUWAIBAN SLAMET', '-', 'Sudah Meninggal', '08995891714', 258),
(269, 'WURBININGSIH', 'SMA / sederajat', 'Karyawan Swasta', 'SARYANTO', 'SMA / sederajat', 'Karyawan Swasta', '081382463181', 259),
(270, 'SRI SUVIATI', 'SMA / sederajat', 'Lainnya', 'ISWANTO', 'SMA / sederajat', 'Sudah Meninggal', '087838178498', 260),
(271, 'ANITA FITRIANI RAHMAH', 'D3', 'Tidak bekerja', 'SUHARYANTO', 'SMA / sederajat', 'Wiraswasta', '081568417050', 261),
(272, 'Siska Wulandari', 'S1', 'PNS/TNI/Polri', 'Roby Saputra', 'S1', 'PNS/TNI/Polri', '081263301709', 262),
(273, 'TRI SAKTI SETIYO PRATIWI', 'SMA / sederajat', 'Tidak bekerja', 'WAKHID ARIFIN WIBOWO', 'SMA / sederajat', 'Karyawan Swasta', '081578557491', 263),
(274, 'Tutik Ratnaningsih', 'SMA / sederajat', 'Tidak bekerja', 'Warindi', 'SMA / sederajat', 'PNS/TNI/Polri', '085600234539', 264),
(275, 'SUPRAPTIYAH', 'SMP / sederajat', 'Karyawan Swasta', 'BUDI SANTOSA', 'SMA / sederajat', 'Karyawan Swasta', '087738454406', 265),
(276, 'SULISTIANI', 'SMA / sederajat', 'Tidak bekerja', 'FAJAR FAKHRUDIN', 'SMP / sederajat', 'Wiraswasta', '085328777363', 266),
(277, 'ARIF YUSIDA', 'S1', 'Tidak bekerja', 'MARYONO', 'SMA / sederajat', 'Wiraswasta', '081804050737', 267),
(278, 'ERNA SRI REJEKISARI', 'D3', 'Karyawan Swasta', 'M.SALIM SAMSUDIN', 'SMA / sederajat', 'Karyawan Swasta', '082326100035', 268),
(279, 'INDRI WAHYUNI', 'SMA / sederajat', 'Wiraswasta', 'HERU YULIANTO', 'SMA / sederajat', 'Wiraswasta', '081227957261', 269),
(280, 'SUPRIHATIN', 'SD / sederajat', 'Tidak bekerja', 'SLAMET WIDODO', 'SMP / sederajat', 'Buruh', '085743656911', 270),
(281, 'Wariyah', 'SMP / sederajat', 'Tidak bekerja', 'Warikin', 'SMA / sederajat', 'Buruh', '083820850356', 271),
(282, 'RIBUT INDRI LESTARI', 'SMA / sederajat', 'Tidak bekerja', 'CICIK RIYA DIANTO', 'SMA / sederajat', 'Buruh', '089509743800', 272),
(283, 'MARDIYYAH TAJUN SIMANJUNTAK', 'SMA / sederajat', 'Wirausaha', 'HERUTOMO', 'SMA / sederajat', 'Wirausaha', '081290953080', 273),
(284, 'SUHARTATI', 'SMA / sederajat', 'Karyawan Swasta', 'NUR HADI SANTOSO', 'SMA / sederajat', 'Karyawan Swasta', '082226749797', 274),
(285, 'HENRY HARYANTI', 'SMA / sederajat', 'Lainnya', 'SAMSUL ARIFIN', 'SMA / sederajat', 'Wiraswasta', '085771728284', 275),
(286, 'TITA APRIYANI', 'SMA / sederajat', 'Karyawan Swasta', 'SUSANTO BUDI PRASETYO', 'SMA / sederajat', 'Karyawan Swasta', '085742241715', 276),
(287, 'VITRI KRISTANTI', 'SMA / sederajat', 'Karyawan Swasta', 'SUMARSONO', 'SMA / sederajat', 'Tidak bekerja', '081578229447', 277),
(288, 'SUMARNI', '-', 'Buruh', 'BUSTAMI', '-', '-', '085325982465', 278),
(289, 'KASMIYATI', 'SMA / sederajat', 'Sudah Meninggal', 'DIDIK SANTOSA', 'SMA / sederajat', 'Buruh', '088298034374', 279),
(290, 'MUSRINGAH', 'SMP / sederajat', 'Karyawan Swasta', 'AGUS SETIYADI', 'SMA / sederajat', 'Karyawan Swasta', '0895423489713', 280),
(291, 'AKHIRIAWATI', 'SMA / sederajat', 'Tidak bekerja', 'HERU TRIHATMOKO', 'SMA / sederajat', 'Karyawan Swasta', '087738370404', 281),
(292, 'EKA MUDHALIFAH', 'SMA / sederajat', 'Tidak bekerja', 'AGUS SUMARSONO', 'SMA / sederajat', 'Karyawan Swasta', '089637480022', 282),
(293, 'TITIK TUHANAH', 'SMA / sederajat', 'Lainnya', 'SARNO EKO PURNOMO', 'SMA / sederajat', 'Buruh', '088806273732', 283),
(294, 'FATIMATU ZAHRO', 'S1', 'Tidak bekerja', 'IRIN HIDAYAT', 'S1', 'Karyawan Swasta', '08979591850', 284),
(295, 'NOFIYANTI', '-', 'Tidak bekerja', 'SUTIKNO', 'SMP / sederajat', 'Buruh', '08998985570', 285),
(296, 'HENI KUSWANDARI', 'SMA / sederajat', 'Lainnya', 'TRIANTO', 'SMA / sederajat', 'Karyawan Swasta', '085747222616', 286),
(297, 'MULYANI', 'SMA / sederajat', 'Tidak bekerja', 'SUWANDO AGUS SANTOSO', 'SMA / sederajat', 'Karyawan Swasta', '081328012921', 287),
(298, 'EKO WIJIYARTI', 'SMA / sederajat', 'Pedagang Besar', 'SUPARWANTO', 'SMA / sederajat', 'Wiraswasta', '081391652488', 288),
(299, 'HERLIN ROKHAYATI', 'SMA / sederajat', 'Tidak bekerja', 'SUKIYATO', 'SMA / sederajat', 'Wiraswasta', '085799342248', 289),
(300, 'AYU TYAS DYAH UTAMI', 'SMP / sederajat', 'Wirausaha', 'ERWIN FADILLAH', 'SMP / sederajat', 'Wirausaha', '082227528881', 290),
(301, 'RIZTY NOORANISYA', 'SMP / sederajat', 'Karyawan Swasta', 'ALI MUCHLIKA SUBAGYA', 'SMP / sederajat', 'Karyawan Swasta', '089607778280', 291),
(302, 'SRI PURWANTI', 'SMP / sederajat', 'Lainnya', 'SUDADI', 'SD / sederajat', 'Buruh', '0895378208220', 292),
(303, 'PONIATI', 'SD / sederajat', 'Tidak bekerja', 'YUNARTO', 'SMA / sederajat', 'Buruh', '0895601984447', 293),
(304, 'NINIEN KURNIAWATI', 'SMA / sederajat', 'Tidak bekerja', 'MOH UMAR', 'SMA / sederajat', 'Wiraswasta', '089502803901', 294),
(305, 'CHANDRA ANGGRAENI', 'SMA / sederajat', 'Tidak bekerja', 'WIWI PRABOWO', 'SMA / sederajat', 'Wiraswasta', '081289997750', 295),
(306, 'Leni Ambarwati', 'SMA / sederajat', 'Tidak bekerja', 'Wisnu Nugroho', 'SMA / sederajat', 'PNS/TNI/Polri', '082136038706', 296),
(307, 'RIRIN IKA PRAMITA SARI', 'SMP / sederajat', 'Wiraswasta', 'MUTHOYIB', 'SD / sederajat', 'Wiraswasta', '0895363113613', 297),
(308, 'MURWANSIH', 'SMA / sederajat', 'Lainnya', 'GOLAR ISHANTOERO', 'SMA / sederajat', 'Karyawan Swasta', '083840536436', 298),
(309, 'PURI ARYANI', '-', 'Wiraswasta', 'HERI SULISTIONO', '-', 'Wiraswasta', '088233099938', 299),
(310, 'MUKINI', 'SMA / sederajat', 'Tidak bekerja', 'RIYANTO PRASETYANA', 'SMA / sederajat', 'Karyawan Swasta', '085727081353', 300),
(311, 'YUSTIKA GILANG MAHARANI', 'SMA / sederajat', 'Tidak bekerja', 'ELIAS ARIOTOMO', 'SMA / sederajat', 'PNS/TNI/Polri', '085601191525', 301),
(312, 'MARJIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'RUDI GUSMAN', 'SMA / sederajat', 'Karyawan Swasta', '087888964055', 302),
(313, 'Sulistiani', 'SMA / sederajat', 'Tidak bekerja', 'Fajar Fakhrudin', 'SMP / sederajat', 'Buruh', '085328777363', 303),
(314, 'SRI ERMAYANTI', 'SMP / sederajat', 'Lainnya', 'ANANG SUWARTO', 'SMP / sederajat', 'Buruh', '089527125241', 304),
(315, 'ARY PUSPITASARY', 'SMA / sederajat', 'Tidak bekerja', 'YUDHI KARMANA', 'SMA / sederajat', 'Wiraswasta', '081327777001', 305),
(316, 'BRIGITTA PETRASARI NUGRAHANINGSIH SPD', 'S1', 'Tidak bekerja', 'DIDIK ARIFIN', 'SMA / sederajat', 'Karyawan Swasta', '082243331224', 306),
(317, 'WAGINI', 'SMP / sederajat', 'Tidak bekerja', 'KOMARI', 'SMA / sederajat', 'Karyawan Swasta', '085743209196', 307),
(318, 'ATIK RATNAWATI', '-', 'Tidak bekerja', '-', '-', '-', ' 08993408504', 308),
(319, 'ERNI LESTARI', 'S1', 'Wirausaha', 'HIDAYAT KURNIAWAN', 'D3', 'Karyawan Swasta', '081281207589', 309),
(320, 'Sri Rahayu', 'SMA / sederajat', 'Tidak bekerja', 'Agus Santoso', 'SMA / sederajat', 'Pedagang Kecil', '085883630068', 310),
(321, 'DWI WAHYUNI', 'SMA / sederajat', 'Buruh', 'HANAFI ROSIDI', 'SMA / sederajat', 'Buruh', '0895413527790', 311),
(322, 'SIAM MANDASARI', 'D3', 'Tidak bekerja', 'ARI WIBOWO', 'SMP / sederajat', 'Karyawan Swasta', '088213247576', 312),
(323, 'IKA WIDARYATI', 'SMP / sederajat', 'Tidak bekerja', 'SAPTO HARIYONO', 'SMP / sederajat', 'Wiraswasta', '082322672544', 313),
(324, 'VENI  NURCAHYANI', 'SMP / sederajat', 'Buruh', 'DWI  ARIYANTO', 'SMP / sederajat', 'Wiraswasta', '085328912228', 314),
(325, 'DYAH AYU KUSUMANINGRUM', 'S1', 'Tidak bekerja', 'IDRIS IHWANUDIN', 'S1', 'Karyawan Swasta', '083840529008', 315),
(326, 'ENDRI YANI', 'SMP / sederajat', 'Tidak bekerja', 'SUDARTO', 'SMA / sederajat', 'Karyawan Swasta', '083830334076', 316),
(327, 'RATI TELASIH', 'SMA / sederajat', 'Karyawan Swasta', 'FARIZ TYAN ISKANDAR', 'SMA / sederajat', 'Tidak bekerja', '081238880670', 317),
(328, 'Rosalinda', 'D1', 'Tidak bekerja', 'Imam Fahrurrozi', 'SMA / sederajat', 'Karyawan Swasta', ' 08562550178', 318),
(329, 'NUR SAFUROH', 'SMA / sederajat', 'Tidak bekerja', 'EDY SUSANTO', 'SMA / sederajat', 'Karyawan Swasta', '088980571604', 319),
(330, 'PURNA RIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'BACHRUDIN JAMAL', 'SMA / sederajat', 'Karyawan Swasta', '081343718402', 320),
(331, 'WARDANI', 'SMA / sederajat', 'Lainnya', 'ACHMAD HAKIM FUADI', 'SMA / sederajat', 'Wiraswasta', '085228988376', 321),
(332, 'PARSUNI', 'SMA / sederajat', 'Lainnya', 'TRI HARTANTO', 'SD / sederajat', 'Buruh', '0895418580802', 322),
(333, 'Andri Aningsih', 'SMA / sederajat', 'Tidak bekerja', 'Tega Untara', 'SMP / sederajat', 'Buruh', '089631585616', 323),
(334, 'SAYEKTI WAHYUNI', 'SMA / sederajat', 'Tidak bekerja', 'DANA SUSANTO', 'SMA / sederajat', 'Karyawan Swasta', '08993474060', 324),
(335, 'MARDJANI', 'SMA / sederajat', 'Tidak bekerja', 'SUBARDI', 'SMP / sederajat', 'Karyawan Swasta', '081804288475', 325),
(336, 'HESTI ANA', 'SMP / sederajat', 'Lainnya', 'EKO WANTORO', 'SMA / sederajat', 'Buruh', '08994101497', 326),
(337, 'DEWIYANA', 'SMA / sederajat', 'Tidak bekerja', 'INDRO PURNOMO', 'SMA / sederajat', 'PNS/TNI/Polri', '081334963035', 327),
(338, 'RATMI', 'SD / sederajat', 'Buruh', 'JUMARI', 'SMA / sederajat', 'Buruh', '089652565186', 328),
(339, 'SUYANTI', 'SD / sederajat', 'Buruh', 'PONIRAN', 'SD / sederajat', 'Buruh', '083154583068', 329),
(340, 'SISWI ARTININGSIH', 'S1', 'Karyawan Swasta', 'ALM HERU WAHYUDI', 'S1', 'Sudah Meninggal', '081213954245', 330),
(341, 'Luluk Emi Uryanti', 'D3', 'PNS/TNI/Polri', 'Suharsono', 'D3', 'PNS/TNI/Polri', '087839903311', 331),
(342, 'SUWAINTEN', 'SMA / sederajat', 'Karyawan Swasta', 'NURHADI', 'SMA / sederajat', 'Karyawan Swasta', '085747336183', 332),
(343, 'WIDAYANTI', 'SMP / sederajat', 'Lainnya', 'RAHMAD SUDARTO', 'SMA / sederajat', 'Karyawan Swasta', '081903471239', 333),
(344, 'PARINI', 'SD / sederajat', 'Lainnya', 'SUTRISNO', 'SD / sederajat', 'Buruh', '089652386714', 334),
(345, 'SARJIYATI', 'SMP / sederajat', 'Tidak bekerja', 'SAHRONI', 'SMP / sederajat', 'Buruh', '089673309790', 335),
(346, 'Erlina Yuli Kurniawati', 'SMA / sederajat', 'Tidak bekerja', 'Nunung Agung Saputra', 'SMA / sederajat', 'Karyawan Swasta', '085803386183', 336),
(347, 'JUMIYANTI', 'SMA / sederajat', 'Tidak bekerja', 'RAJIYO', 'SMP / sederajat', 'Buruh', '083840369120', 337),
(348, 'Nenny Lestari', 'SMA / sederajat', 'Tidak bekerja', 'Ispambudi', 'SMA / sederajat', 'Buruh', '089528886388', 338),
(349, 'Veronika Yulianingsih', 'SMA / sederajat', 'Tidak bekerja', 'Priyo Handoko', 'SMA / sederajat', 'Karyawan Swasta', '089523569944', 339),
(350, 'SULISTYANI', 'SMA / sederajat', 'Karyawan Swasta', 'SIRRAHTURAHMAN KOTO ONO', 'SMA / sederajat', 'Karyawan Swasta', '081802298585', 340),
(351, 'SARJIYEM', 'SMA / sederajat', 'Tidak bekerja', 'WIJADMADI', 'Tidak sekolah', 'Wirausaha', '082135288596', 341),
(352, 'Tyas Norjannah Roslin', 'SMA / sederajat', 'Karyawan Swasta', 'Nikho Herbawono', 'SMA / sederajat', 'Karyawan Swasta', '081392402969', 342),
(353, 'RETNO INDRASARI', 'Tidak sekolah', 'Lainnya', 'ANGGORO AGUS NURCAHYO', 'Tidak sekolah', '-', '087749553540', 343),
(354, 'ENI VINDAH YUNANGSIH', 'SMA / sederajat', 'Tidak bekerja', 'YULIANTO', 'SMA / sederajat', 'Karyawan Swasta', '085101858781', 344),
(355, 'Denok Nafingatun', 'SMA / sederajat', 'Tidak bekerja', 'Sumanto', 'SMA / sederajat', 'Wiraswasta', '0895354972060', 345),
(356, 'Siti Asiyah', 'SMA / sederajat', 'Karyawan Swasta', '-', 'Tidak sekolah', '-', '083867981222', 346),
(357, 'SUNDARI', 'S1', 'Tidak bekerja', 'DANANG ARIWIBOWO', 'S1', 'Wiraswasta', '081225098350', 347),
(358, 'WIKA NENNY HASTIWI SE', 'S1', 'Karyawan Swasta', 'PURJOKO DWI SAPTO SH', 'S1', 'Karyawan Swasta', '081393278984', 348),
(359, 'Didah Wahdah Suroya', 'S1', 'Tidak bekerja', 'Choirul Amri', 'S2', 'PNS/TNI/Polri', ' 08157977901', 349),
(360, 'Indah Jumiyati', 'SMA / sederajat', 'Karyawan Swasta', 'Heriyanta', 'SMA / sederajat', 'Karyawan Swasta', '089653548021', 350),
(361, 'Ika Retno Pujiastuti A.Md.', 'Tidak sekolah', 'Karyawan Swasta', 'Setyo Pramon o S.E', 'S1', 'Karyawan Swasta', '08156856323', 351),
(362, 'LASMINI', 'Tidak sekolah', 'Tidak bekerja', '-', 'Tidak sekolah', '-', '085866518488', 352),
(363, 'TUNAS WIDYAWATI', 'D3', 'PNS/TNI/Polri', 'WASUL NURI', 'S1', 'Lainnya', '085647064506', 353),
(364, 'Susana', 'SMA / sederajat', 'Lainnya', 'Sayogi Purnomo', 'SMA / sederajat', 'Karyawan Swasta', '081804339917', 354),
(365, 'Dwi Endah Sekaratri', 'D3', 'Tidak bekerja', 'Santosa Budi Artana', 'S1', 'Wiraswasta', '085228723706', 355),
(366, 'Indarti', 'SMA / sederajat', 'Tidak bekerja', 'Aris Purwanto', 'S1', 'PNS/TNI/Polri', '0895359012974', 356),
(367, 'Dian Wahyuni', 'SMA / sederajat', 'Tidak bekerja', 'Wahyudin', 'SD / sederajat', 'Buruh', '087738476969', 357),
(368, 'RINI SABARYATI', 'SMP / sederajat', 'Tidak bekerja', 'ABDULLAH SANUSI', 'SMA / sederajat', 'Wiraswasta', '081325713587', 358),
(371, 'Nyayu Aisyah Mursalina', 'S1', 'IRT', 'Dian Saputra', 'SMA/SEDERAJAT', 'TNI', '085399858687', 361),
(372, 'LILA YUNISA', 'SMA/SEDERAJAT', 'IRT', 'Rudi Herianto', 'SMA/SEDERAJAT', 'TNI', '082388787845', 362),
(373, 'ERLINA', 'S1', 'IRT', 'Toni Irawan', 'SMA/SEDERAJAT', 'TNI', '081243676534', 363),
(374, 'NIA AGUSTIN', 'SMA/SEDERAJAT', 'IRT', 'Edi wahyudi', 'SMA/SEDERAJAT', 'Sopir', '0812777273', 364),
(375, 'MELDA SUSANTI', 'S1', 'IRT', 'Ilham', 'SMA/SEDERAJAT', 'Wiraswasta', '08537878643', 365),
(376, 'TRI APRILLIA', 'S1', 'IRT', 'Ahmad Bukhori', 'SMA/SEDERAJAT', 'TNI', '08537878763', 366),
(377, 'MASKIRAH', 'SMA/SEDERAJAT', 'IRT', 'Anton Ansori', 'SMA/SEDERAJAT', 'Wiraswasta', '08587678943', 367),
(378, 'SRI WILIANI', 'SMA/SEDERAJAT', 'IRT', 'Heri Purwanto', 'SMA/SEDERAJAT', 'TNI', '089687878734', 368),
(379, 'EMILIA CONTESA', 'SMA/SEDERAJAT', 'IRT', 'Heri.S', 'SMA/SEDERAJAT', 'TNI', '08977767234', 369),
(380, 'ROHANI', 'SMA/SEDERAJAT', 'IRT', 'Didit Maryanto', 'SMA/SEDERAJAT', 'Wiraswasta', '08237765574', 370),
(381, 'RIZA NOVITA', 'SMA/SEDERAJAT', 'IRT', 'Muhammad Kodri', 'SMA/SEDERAJAT', 'TNI', '08528764895', 371),
(382, 'AFRA WITA', 'SMA/SEDERAJAT', 'IRT', 'Lilik Yulianto', 'S1', 'Swasta', '08977654374', 372),
(383, 'ELLI ERNAWATI', 'SMA/SEDERAJAT', 'IRT', 'Dariyanto', 'SMA/SEDERAJAT', 'Wiraswasta', '089765468832', 373),
(384, 'NUR AIDA,AMK', 'D3', 'IRT', 'Andi Irawan', 'SMA/SEDERAJAT', 'TNI', '08976656382', 374),
(385, 'SRI YULIANA', 'SMA/SEDERAJAT', 'IRT', 'Salju Admi', 'SMA/SEDERAJAT', 'Wiraswasta', '0897655373', 375),
(386, 'EMI KURNIATI', 'SMA/SEDERAJAT', 'IRT', 'Leri Siswanto', 'SMA/SEDERAJAT', 'TNI', '08876554738', 376),
(387, 'NURMALA', 'S1', 'IRT', 'Anton Septiawan', 'SMA/SEDERAJAT', 'TNI', '08128474585', 377),
(388, 'YOSIE YUNIARTI', 'S1', 'Wiraswasta', 'Robi Suhendra', 'SMA/SEDERAJAT', 'Wiraswasta', '0852887646', 378),
(389, 'LILI SARI OKTARIANI', 'SMA/SEDERAJAT', 'IRT', 'Fransisco', 'SMA/SEDERAJAT', 'Wiraswasta', '08787653723', 379),
(390, 'YETNAWATI', 'SMA/SEDERAJAT', 'IRT', 'Buyung Iksan', 'SMA/SEDERAJAT', 'Wiraswasta', '0897654378', 380),
(391, 'SITI FATIMAH', 'D3', 'Bidan', 'Jefri Andrizal', 'S1', 'Wiraswasta', '0813887594', 381),
(392, 'NINI HARTINI', 'SMA/SEDERAJAT', 'IRT', 'Jupri', 'SMA/SEDERAJAT', 'Wiraswasta', '08788765763', 382),
(393, 'ARINI WULANDARI', 'SMA/SEDERAJAT', 'IRT', 'Dedi Susanto', 'SMA/SEDERAJAT', 'TNI', '08129987466', 383),
(394, 'MASKIRAH', 'SMA/SEDERAJAT', 'IRT', 'Anton Ansori', 'SMA/SEDERAJAT', 'Wiraswasta', '08738876637', 384),
(395, 'WIWIN SUHARNI', 'SMA/SEDERAJAT', 'IRT', 'Agus Ciptadi', 'SMA/SEDERAJAT', 'Wiraswasta', '08987675647', 385),
(396, 'MEGAWATY BR. TAMBA', 'SMA/SEDERAJAT', 'IRT', 'Irdan', 'SMA/SEDERAJAT', 'Wiraswasta', '081553738821', 386),
(397, 'NI KETUT SARTIKA DEWI', 'SMA/SEDERAJAT', 'IRT', 'Doni Sagita', 'SMA/SEDERAJAT', 'Wiraswasta', '089988776556', 387),
(398, 'RUPI KARTINI', 'SMA/SEDERAJAT', 'IRT', 'Sutrisna', 'SMA/SEDERAJAT', 'Wiraswasta', '08126656378', 388),
(399, 'SITI PATIMA', 'D3', 'Bidan', 'Jefri Andrizal', 'S1', 'Wiraswasta', '082388847493', 389),
(400, 'RUPI KARTINI', 'SMA/SEDERAJAT', 'IRT', 'Sutriansi', 'SMA/SEDERAJAT', 'Wiraswasta', '082174748485', 390),
(401, 'NI KETUT SARTIKA DEWI', 'SMA/SEDERAJAT', 'IRT', 'Doni Sagita', 'SMA/SEDERAJAT', 'Wiraswasta', '08219983943', 391),
(402, 'YUYUN LUKITA SARI', 'D3', 'Swasta', 'Salman Dahri', 'SMA/SEDERAJAT', 'TNI', '08218776537', 392),
(403, 'MEGAWATY BR. TAMBA', 'S1', 'Wiraswasta', 'Irdan', 'SMA/SEDERAJAT', 'Wiraswasta', '08527773787', 393),
(404, 'Rika Melisa', 'SMA/SEDERAJAT', 'IRT', 'Perizal', 'SMP/SEDERAJAT', 'Buruh', '085266880355', 394),
(405, 'Hermika Iin Susanti', 'S1', 'Wiraswasta', 'Marwan Supriyadi Wijaya', 'SMP/SEDERAJAT', 'Wiraswasta', '085809189014', 395),
(406, 'Erna Gusvianti', 'S1', 'IRT', 'Indra Junaidi', 'SMA/SEDERAJAT', 'TNI', '08128776635', 396),
(407, 'Vitry Kaikan Doe', 'SMA/SEDERAJAT', 'IRT', 'Ade Koraya', 'SMP/SEDERAJAT', 'Wiraswasta', '08127746473', 397),
(408, 'Rohani', 'SMA/SEDERAJAT', 'IRT', 'Didit Maryanto', 'SMA/SEDERAJAT', 'TNI', '085376110116', 398),
(409, 'Mike Elinsyah', 'D3', 'IRT', 'Ika Regustian', 'S1', 'Swasta', '085264441608', 399),
(410, 'Sri Astutyawati Ningsih', 'SMA/SEDERAJAT', 'IRT', 'Harli Novriansyah', 'SMA/SEDERAJAT', 'TNI', '082176344498', 400),
(411, 'Meri Yanti', 'SMA/SEDERAJAT', 'IRT', 'Novian Effendi', 'SMA/SEDERAJAT', 'Buruh', '089633140527', 401),
(412, 'Evi Ernaini', 'SMA/SEDERAJAT', 'IRT', 'Dodi Irawan', 'SMA/SEDERAJAT', 'Buruh', '089620943240', 402),
(413, 'Evi', 'SMA/SEDERAJAT', 'IRT', 'Sudarto', 'SMA/SEDERAJAT', 'Wiraswasta', '08217766387', 403),
(414, 'Wenniarti', 'SMA/SEDERAJAT', 'IRT', 'Agus Wantoro SB', 'SMA/SEDERAJAT', 'Wiraswasta', '089776656788', 404),
(415, 'Tri Murti', 'SMA/SEDERAJAT', 'IRT', 'Agung Prasetiyo', 'SMA/SEDERAJAT', 'Wiraswasta', '082288778399', 405),
(416, 'Fenti Mandasari', 'SMA/SEDERAJAT', 'IRT', 'Septo Jauhari Imam Setiadi', 'SMA/SEDERAJAT', 'Wiraswasta', '081379544490', 406),
(417, 'Septi Yanti', 'SMA/SEDERAJAT', 'IRT', 'Rhio Andrian. Z', 'SMA/SEDERAJAT', 'Swasta', '081277667849', 407),
(418, 'Siti patima', 'D3', 'Bidan', 'Jefri Andrizal', 'SMA/SEDERAJAT', 'Wiraswasta', '082388777499', 408);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(10) NOT NULL,
  `jabatan` enum('Kepala MDA Asy - Syifa','Sekretaris','Bendahara','Guru') NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `jabatan`, `id_mapel`, `id_guru`, `id_kelas`, `id_tahun`) VALUES
(124, 'Sekretaris', 129, 90, 41, 25),
(125, 'Sekretaris', 122, 90, 41, 25),
(126, 'Sekretaris', 123, 90, 41, 25),
(127, 'Sekretaris', 124, 90, 41, 25),
(128, 'Sekretaris', 126, 90, 41, 25),
(130, 'Bendahara', 121, 91, 42, 25),
(131, 'Bendahara', 127, 91, 42, 25),
(132, 'Bendahara', 128, 91, 42, 25),
(134, 'Bendahara', 125, 91, 42, 25),
(136, 'Kepala MDA Asy - Syifa', 121, 89, 43, 25),
(137, 'Kepala MDA Asy - Syifa', 125, 89, 43, 25),
(138, 'Kepala MDA Asy - Syifa', 127, 89, 43, 25),
(139, 'Kepala MDA Asy - Syifa', 128, 89, 43, 25),
(141, 'Kepala MDA Asy - Syifa', 123, 89, 43, 25),
(143, 'Guru', 121, 92, 44, 25),
(144, 'Guru', 125, 92, 44, 25),
(145, 'Guru', 126, 92, 44, 25),
(147, 'Guru', 128, 92, 44, 25),
(148, 'Guru', 123, 92, 44, 25),
(149, 'Guru', 127, 92, 44, 25),
(154, 'Bendahara', 124, 91, 42, 25),
(155, 'Bendahara', 132, 91, 42, 25),
(156, 'Sekretaris', 132, 90, 41, 25),
(157, 'Kepala MDA Asy - Syifa', 127, 89, 43, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_orangtua` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `nama`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `photo`, `id_orangtua`, `id_user`) VALUES
(351, '3173', '3173787411', 'MUMAHMMAD ABIDZAR FAIZAN', '2017-11-30', 'islam', 'Laki-laki', 'photo-siswa-2017-11-30-243ae977b5.jpeg', 371, 429),
(352, '0138', '0138896896', 'ALIKA ZAHIRA', '2013-11-14', 'islam', 'Perempuan', NULL, 372, 430),
(353, '0149', '0149045680', 'ABIZAR', '2014-08-28', 'islam', 'Laki-laki', 'photo-siswa-2014-08-28-c08fcbaa4a.jpeg', 373, 431),
(354, '3142', '3142975011', 'FAYYADH WAHYUDI', '2014-12-04', 'islam', 'Perempuan', NULL, 374, 432),
(355, '3144', '3144203750', 'FATHAN AL-MAISAN AZFAR', '2014-12-30', 'islam', 'Laki-laki', 'photo-siswa-2014-12-30-6017c5f2dd.jpg', 375, 433),
(356, '3151', '3151488184', 'MUHAMMAD ALFIAN RIZQIE MUTHA', '2015-08-02', 'islam', 'Laki-laki', 'photo-siswa-2015-08-02-a9d1c1a66d.jpeg', 376, 434),
(357, '0113', '0113856314', 'AQILLA SYAHRI RAMADHAN', '2011-08-31', 'islam', 'Perempuan', NULL, 377, 435),
(358, '0125', '0125532611', 'ATIKA ERYNA', '2012-01-05', 'islam', 'Perempuan', NULL, 378, 436),
(359, '3158', '3158301254', 'HACHILA SHABITA RAYITAKASI', '2015-05-21', 'islam', 'Perempuan', NULL, 379, 437),
(360, '0143', '0143061601', 'ARYA AZHAR HANINDITO', '2014-02-22', 'islam', 'Laki-laki', 'photo-siswa-2014-02-22-60e05d5606.jpg', 380, 438),
(361, '0137', '0137813348', 'MUHAMMAD FAIS FATHULLAH', '2013-05-03', 'islam', 'Laki-laki', 'photo-siswa-2013-05-03-e569b079da.jpg', 381, 439),
(362, '3152', '3152226433', 'MUHAMMAD BAGAS PRATAMA WILY', '2015-01-11', 'islam', 'Laki-laki', 'photo-siswa-2015-01-11-022edcd6fc.jpg', 382, 440),
(363, '0132', '0132104352', 'PUTRI KHAIRIAH LATIFAH', '2013-01-03', 'islam', 'Perempuan', 'photo-siswa-2013-01-03-fe9e564ed7.jpg', 383, 441),
(364, '3146', '3146498977', 'SYAFIA ALMA ZAVIERA', '2014-05-05', 'islam', 'Perempuan', 'photo-siswa-2014-05-05-87ad5c812b.jpg', 384, 442),
(365, '0137', '0137189047', 'AHMAD GIBRAN ALIM', '2015-08-13', 'islam', 'Laki-laki', NULL, 385, 443),
(366, '0000', '0000000000', 'MUHAMMAD VILLAZIE VARGAZ', '2011-10-16', 'islam', 'Laki-laki', 'photo-siswa-2011-10-16-a66fc01a73.jpeg', 386, 444),
(367, '0158', '0158996065', 'ALISHA ZAAFARANI ZAFIRAH', '2015-05-26', 'islam', 'Perempuan', 'photo-siswa-2015-05-26-6319e08af7.jpeg', 387, 445),
(368, '0159', '0159507674', 'KURNIA ADAM ALFATIH', '2015-08-01', 'islam', 'Laki-laki', 'photo-siswa-2015-08-01-c11f94f7f7.jpeg', 388, 446),
(369, '3142', '3142695767', 'ANGGARA PRASETIO', '2014-01-21', 'islam', 'Laki-laki', NULL, 389, 447),
(370, '3140', '3140680780', 'MUHAMMAD ABIDZAR AL-GHIFARI', '2014-10-16', 'islam', 'Laki-laki', 'photo-siswa-2014-10-16-4f2e8e8a8e.jpeg', 390, 448),
(371, '0139', '0139259241', 'AQILA PUTRI ARSI', '2013-06-01', 'islam', 'Perempuan', 'photo-siswa-2013-06-01-18eb65f92a.jpeg', 391, 449),
(372, '0145', '0145775739', 'JULIA DWI ANGGRAINI', '2014-07-11', 'islam', 'Perempuan', 'photo-siswa-2014-07-11-8ee5899bf0.jpg', 392, 450),
(373, '3148', '3148179207', 'AIRIN TIFANI', '2014-02-13', 'islam', 'Perempuan', NULL, 393, 451),
(374, '0106', '0106890792', 'ENQI MUHAMMAD AKBAR', '2010-01-27', 'islam', 'Laki-laki', NULL, 394, 452),
(375, '0134', '0134995062', 'INGGRID MULIA CIPTADI', '2013-08-25', 'islam', 'Laki-laki', NULL, 395, 453),
(376, '3169', '3169803309', 'JIHAN MAKAILA FAKHIRAH', '2016-01-05', 'islam', 'Perempuan', 'photo-siswa-2016-01-05-b455e941a5.jpeg', 396, 454),
(377, '0132', '0132673811', 'ROHIM AL-MALIK', '2013-01-19', 'islam', 'Perempuan', 'photo-siswa-2013-01-19-94d63cdd6d.jpg', 397, 455),
(378, '3163', '3163042715', 'OSCAR ADRIAN SAKTI', '2013-05-31', 'islam', 'Laki-laki', 'photo-siswa-2013-05-31-c9956edd51.jpeg', 398, 456),
(379, '0139', '0139259241', 'ANDARA DWI RAMADHANI', '2015-06-22', 'islam', 'Perempuan', 'photo-siswa-2015-06-22-fc5609314d.jpeg', 399, 457),
(380, '0149', '0149945030', 'DEXAN ANTONIOSAKTI', '2014-06-05', 'islam', 'Laki-laki', 'photo-siswa-2014-06-05-464412221d.jpeg', 400, 458),
(381, '0113', '0113301700', 'RAHMAN AL-AZIZ', '2011-09-08', 'islam', 'Laki-laki', 'photo-siswa-2011-09-08-9175c79de2.jpeg', 401, 459),
(382, '0143', '0143783513', 'FIORENZA ADARA YUTAMA', '2014-11-25', 'islam', 'Perempuan', 'photo-siswa-2014-11-25-46aaba7846.jpeg', 402, 460),
(383, '3164', '3164192940', 'ZIDAN AHMAD HAMZAH', '2017-12-05', 'islam', 'Laki-laki', 'photo-siswa-2017-12-05-4140c6fade.jpeg', 403, 461),
(384, '3163', '3163643283', 'REFLI', '2016-09-14', 'islam', 'Laki-laki', 'photo-siswa-2016-09-14-73e02c7cf3.jpeg', 404, 462),
(385, '3168', '3168128544', 'MUHAMMAD RAMDANI', '2016-06-30', 'islam', 'Laki-laki', 'photo-siswa-2016-06-30-8139732e4b.jpeg', 405, 463),
(386, '3174', '3174485783', 'AZIM KINGDRA MAHESA', '2017-05-19', 'islam', 'Laki-laki', 'photo-siswa-2017-05-19-7873d4784f.jpeg', 406, 464),
(387, '3144', '3144309686', 'GHEA DEVITA LESTARIE', '2014-12-08', 'islam', 'Perempuan', 'photo-siswa-2014-12-08-ecda663023.jpeg', 407, 465),
(388, '3175', '3175249345', 'RENDRA ADITYA SAPUTRA', '2017-08-04', 'islam', 'Laki-laki', 'photo-siswa-2017-08-04-0a881a01f3.jpeg', 408, 466),
(389, '3173', '3173665575', 'KHAIRA MECHA REGUSTIAN', '2017-04-08', 'islam', 'Perempuan', 'photo-siswa-2017-04-08-240376a244.jpeg', 409, 467),
(390, '3158', '3158891661', 'JUAN PRAHASTA', '2015-11-05', 'islam', 'Laki-laki', 'photo-siswa-2015-11-05-0bcb80b75f.jpeg', 410, 468),
(391, '3154', '3154292218', 'AFIQAH DZAKYRA EFFENDI', '2015-12-23', 'islam', 'Perempuan', NULL, 411, 469),
(392, '3163', '3163580369', 'CIKAL SAHLENTU', '2016-05-24', 'islam', 'Laki-laki', 'photo-siswa-2016-05-24-952df3097f.jpeg', 412, 470),
(393, '3146', '3146434852', 'DANU TIRTA', '2014-04-14', 'islam', 'Laki-laki', 'photo-siswa-2014-04-14-47cddd2bf7.jpeg', 413, 471),
(394, '3179', '3179174405', 'ABQARI RAJAB RUNAKO', '2017-04-10', 'islam', 'Laki-laki', 'photo-siswa-2017-04-10-3bdcf1ead7.jpeg', 414, 472),
(395, '3161', '3161355427', 'ADARA SHAKILA PRASETYA', '2016-06-11', 'islam', 'Perempuan', 'photo-siswa-2016-06-11-25bf5660c4.jpeg', 415, 473),
(396, '1111', '1111111111', 'RAESHA KINANZI SALSABILLA', '2017-09-26', 'islam', 'Perempuan', 'photo-siswa-2017-09-26-6ce072af79.jpeg', 416, 474),
(397, '2222', '2222222222', 'MAURA ZIA ANDRIAN', '2017-09-30', 'islam', 'Perempuan', 'photo-siswa-2017-09-30-cb2fe15e85.jpeg', 417, 475),
(398, '3333', '3333333333', 'ALIYAH FAIZAH', '2018-02-04', 'islam', 'Perempuan', 'photo-siswa-2018-02-04-fbde76133a.jpeg', 418, 476);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `id_tahun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `shared` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahunajaran`
--

INSERT INTO `tb_tahunajaran` (`id_tahun`, `nama`, `semester`, `shared`, `status`) VALUES
(18, '2020/2021', 'Ganjil', '1', '0'),
(19, '2020/2021', 'Genap', '1', '0'),
(20, '2021/2022', 'Ganjil', '1', '0'),
(21, '2021/2022', 'Genap', '1', '0'),
(22, '2022/2023', 'Ganjil', '1', '0'),
(23, '2022/2023', 'Genap', '1', '0'),
(24, '2023/2024', 'Ganjil', '1', '0'),
(25, '2023/2024', 'Genap', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','siswa','guru','wali kelas') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(423, 'nurhayatironi@gmail.com', 'f28adde4dead082f95e57f48846af29a', 'wali kelas', '1'),
(424, 'fatnasari@gmail.com', 'dcf52f84dbf511ee4a0abcfc18093ee4', 'wali kelas', '1'),
(426, 'supra221@yahoo.com', '5bbb32f9ee5ef9928ba11794f43a43e2', 'wali kelas', '1'),
(427, 'susidarmawansi@gmail.com', '88837410d95838ac2473d8398a4ae4c7', 'wali kelas', '1'),
(429, '3173', '30c29f65f3a8b197733b45a63c61041f', 'siswa', '1'),
(430, '0138', '15a9fdb942b9fbf8831908c6712dd6b6', 'siswa', '1'),
(431, '0149', 'a9af9f9c209d465422928ff5f3577d3d', 'siswa', '1'),
(432, '3142', 'f02bcc25b0ea001d6a53a10e84d96e27', 'siswa', '1'),
(433, '3144', 'f02bcc25b0ea001d6a53a10e84d96e27', 'siswa', '1'),
(434, '3151', 'ac7c32ae29356453030f9b1180335a03', 'siswa', '1'),
(435, '0113', '691c75ebd54a93d397d001bf9a28f6b5', 'siswa', '1'),
(436, '0125', 'e7d9117f3ceaa7e7196359c64838f9c0', 'siswa', '1'),
(437, '3158', '3e6125073d8b5940efe4f8bd6b1ae515', 'siswa', '1'),
(438, '0143', 'ac6fb3ffbf46cb78f6dcf1669a5e7dc6', 'siswa', '1'),
(439, '0137', '26ff1e63e58bf77930c081ea9d6181ae', 'siswa', '1'),
(440, '3152', '40aec7b131a2e5ef61cb8c7056281997', 'siswa', '1'),
(441, '0132', '033c6ef715871f57a63c924e34be834c', 'siswa', '1'),
(442, '3146', 'fa2635d3a3aef541e70d05bca4888f4a', 'siswa', '1'),
(443, '0137', 'ac7c32ae29356453030f9b1180335a03', 'siswa', '1'),
(444, '0000', 'c5433e915c5f181ec0076dae35c7cef5', 'siswa', '1'),
(445, '0158', '3e6125073d8b5940efe4f8bd6b1ae515', 'siswa', '1'),
(446, '0159', 'ac7c32ae29356453030f9b1180335a03', 'siswa', '1'),
(447, '3142', 'd4e716ac5a1d490f28d5ecacb2c20107', 'siswa', '1'),
(448, '3140', 'ad5068846058c1036f27f967abbb1284', 'siswa', '1'),
(449, '0139', '929a5e9ccaa4447e0687e042362c0df2', 'siswa', '1'),
(450, '0145', 'd424810d442618eddc16282c99c43a30', 'siswa', '1'),
(451, '3148', 'ac6fb3ffbf46cb78f6dcf1669a5e7dc6', 'siswa', '1'),
(452, '0106', '8d1b25d27f93ccf74fea45bc2bb0e5aa', 'siswa', '1'),
(453, '0134', '189bd3e43fd87804928e1de8c4cbda0f', 'siswa', '1'),
(454, '3169', '4666e66fe94fa4c02eef0e3849836ed8', 'siswa', '1'),
(455, '0132', '033c6ef715871f57a63c924e34be834c', 'siswa', '1'),
(456, '3163', '26ff1e63e58bf77930c081ea9d6181ae', 'siswa', '1'),
(457, '0139', 'e9415403f76ec03230c30bacfe6ba55d', 'siswa', '1'),
(458, '0149', 'a5c52552262873a7f3af21b065397017', 'siswa', '1'),
(459, '0113', '897e0a3cb9c449c57d7c8a556b97c1ac', 'siswa', '1'),
(460, '0143', '1c5d78fc34c33df8f7c4af48ddb98618', 'siswa', '1'),
(461, '3164', 'd9a0c6628d8a1ec7916e5b1b2911dc5d', 'siswa', '1'),
(462, '3163', '62cabdfd5def8e7dc6fe898a223e9862', 'siswa', '1'),
(463, '3168', 'edce20f6f2381bb45b372d2e37106c38', 'siswa', '1'),
(464, '3174', 'c79c98bff14e875afbccd1f9348ab21d', 'siswa', '1'),
(465, '3144', 'f02bcc25b0ea001d6a53a10e84d96e27', 'siswa', '1'),
(466, '3175', '59818732820aa507022d078552df496f', 'siswa', '1'),
(467, '3173', 'db8c375cb441837909256408190f8f05', 'siswa', '1'),
(468, '3158', '9b55381ce36fcee5d313fe5b6b28a022', 'siswa', '1'),
(469, '3154', '21d8f4e662816f8cb42c92e2c5884a64', 'siswa', '1'),
(470, '3163', '4411b11cbd5afd65a2a54f2a03f733b0', 'siswa', '1'),
(471, '3146', '11977ac65d72b11b76fc1c52ad39549f', 'siswa', '1'),
(472, '3179', 'db8c375cb441837909256408190f8f05', 'siswa', '1'),
(473, '3161', 'edce20f6f2381bb45b372d2e37106c38', 'siswa', '1'),
(474, '1111', 'de01b0fe4c9d48a95a4898320ccec449', 'siswa', '1'),
(475, '2222', 'de01b0fe4c9d48a95a4898320ccec449', 'siswa', '1'),
(476, '3333', 'a5c4b221a1d516920a6f1240a43837a9', 'siswa', '1'),
(477, 'alfito', '3b393640f9a2a7f0d1115e5d473b5e8b', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `tb_admin_FK` (`id_user`);

--
-- Indeks untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  ADD PRIMARY KEY (`id_arsip`),
  ADD KEY `tb_arsipnilai_FK` (`id_kd`),
  ADD KEY `tb_arsipnilai_FK_1` (`id_datasiswa`);

--
-- Indeks untuk tabel `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  ADD PRIMARY KEY (`id_datasiswa`),
  ADD KEY `tb_datasiswa_FK` (`id_kelas`),
  ADD KEY `tb_datasiswa_FK_1` (`id_siswa`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `tb_guru_FK` (`id_user`);

--
-- Indeks untuk tabel `tb_kd`
--
ALTER TABLE `tb_kd`
  ADD PRIMARY KEY (`id_kd`),
  ADD KEY `tb_tema_FK` (`id_mapel`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tb_nilai_FK_1` (`id_kd`),
  ADD KEY `tb_nilai_FK` (`id_datasiswa`);

--
-- Indeks untuk tabel `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD PRIMARY KEY (`id_orangtua`),
  ADD KEY `tb_orangtua_FK` (`id_alamat`);

--
-- Indeks untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `tb_pengajar_FK` (`id_guru`),
  ADD KEY `tb_pengajar_FK_1` (`id_kelas`),
  ADD KEY `tb_pengajar_FK_2` (`id_mapel`),
  ADD KEY `tb_pengajar_FK_3` (`id_tahun`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `tb_siswa_FK` (`id_orangtua`),
  ADD KEY `tb_siswa_FK_2` (`id_user`);

--
-- Indeks untuk tabel `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT untuk tabel `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT untuk tabel `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  MODIFY `id_datasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `tb_kd`
--
ALTER TABLE `tb_kd`
  MODIFY `id_kd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2563;

--
-- AUTO_INCREMENT untuk tabel `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT untuk tabel `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  ADD CONSTRAINT `tb_arsipnilai_FK` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_arsipnilai_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  ADD CONSTRAINT `tb_datasiswa_FK` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_datasiswa_FK_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kd`
--
ALTER TABLE `tb_kd`
  ADD CONSTRAINT `tb_tema_FK` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_FK` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_FK_1` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD CONSTRAINT `tb_orangtua_FK` FOREIGN KEY (`id_alamat`) REFERENCES `tb_alamat` (`id_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD CONSTRAINT `tb_pengajar_FK` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_2` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_FK` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_FK_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
