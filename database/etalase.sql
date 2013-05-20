-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2013 at 01:05 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etalase`
--

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE IF NOT EXISTS `iklan` (
  `id_iklan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL COMMENT 'tipe iklan, 1 dicari, 2 dijual, 3 disewakan, 4 jasa',
  `harga` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `p_utama` int(11) NOT NULL COMMENT 'berupa id, isinya menentukan apakah foto 1,2,3,4,5,atau6',
  `kondisi` int(11) NOT NULL COMMENT '1 = baru, 2 = bekas',
  `deskripsi` varchar(2000) NOT NULL,
  `status_nego` int(11) NOT NULL COMMENT '1 = boleh nego, 0 = tidak boleh nego',
  `photo1` varchar(1000) DEFAULT NULL,
  `photo2` varchar(1000) DEFAULT NULL,
  `photo3` varchar(1000) DEFAULT NULL,
  `photo4` varchar(1000) DEFAULT NULL,
  `photo5` varchar(1000) DEFAULT NULL,
  `photo6` varchar(1000) DEFAULT NULL,
  `waktu_tayang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_iklan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `id_user`, `id_kategori`, `judul`, `tipe`, `harga`, `id_provinsi`, `id_kota`, `p_utama`, `kondisi`, `deskripsi`, `status_nego`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `waktu_tayang`) VALUES
(1, 1, 1, 'Mobil Aku', '2', '30000000', 1, 1, 1, 1, 'Ini adalah punya saya', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2013-05-20 13:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Mobil'),
(2, 'Alat-alat Musik'),
(3, 'Anak dan Bayi'),
(4, 'Buku'),
(5, 'Elektronik Konsumen'),
(6, 'Fashion Pria'),
(7, 'Fashion Wanita'),
(8, 'Film'),
(9, 'Fotografi'),
(10, 'Games dan Consoles'),
(11, 'Handicrafts'),
(12, 'Handphone dan Gadget'),
(13, 'Handphone Aksesoris'),
(14, 'Hewan Piaraan dan Aksesoris'),
(15, 'Jam dan Periasan'),
(16, 'Jasa'),
(17, 'Kesehatan dan Kecantikan'),
(18, 'Koleksi'),
(19, 'Konstruksi dan Taman'),
(20, 'Libuaran dan Bepergian'),
(21, 'Lowongan Pekerjaan'),
(22, 'Makanan dan Minuman'),
(23, 'Mobil dan Aksesoris'),
(24, 'Mobil dan Onderdil'),
(25, 'Motor dan Sekuter'),
(26, 'Properti'),
(27, 'Komputer'),
(28, 'Perlengkapan Rumah'),
(29, 'TV dan Audio'),
(30, 'Sepeda dan Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=501 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'Aceh Barat Daya Kab.'),
(2, 1, 'Aceh Barat Kab.'),
(3, 1, 'Aceh Besar Kab.'),
(4, 1, 'Aceh Jaya Kab.'),
(5, 1, 'Aceh Selatan Kab.'),
(6, 1, 'Aceh Singkil Kab.'),
(7, 1, 'Aceh Tamiang Kab.'),
(8, 1, 'Aceh Tengah Kab.'),
(9, 1, 'Aceh Tenggara Kab.'),
(10, 1, 'Aceh Timur Kab.'),
(11, 1, 'Aceh Utara Kab.'),
(12, 1, 'Banda Aceh Kota'),
(13, 1, 'Bener Meriah Kab.'),
(14, 1, 'Bireuen Kab.'),
(15, 1, 'Gayo Lues Kab.'),
(16, 1, 'Langsa Kota'),
(17, 1, 'Lhokseumawe Kota'),
(18, 1, 'Nagan Raya Kab.'),
(19, 1, 'Pidie Jaya Kab.'),
(20, 1, 'Pidie Kab.'),
(21, 1, 'Sabang Kota'),
(22, 1, 'Simeulue Kab.'),
(23, 1, 'Subulussalam Kota'),
(24, 2, 'Badung Kab.'),
(25, 2, 'Bangli Kab.'),
(26, 2, 'Buleleng Kab.'),
(27, 2, 'Denpasar Kota'),
(28, 2, 'Gianyar Kab.'),
(29, 2, 'Jembrana Kab.'),
(30, 2, 'Karangasem Kab.'),
(31, 2, 'Klungkung Kab.'),
(32, 2, 'Tabanan Kab.'),
(33, 3, 'Bangka Barat Kab.'),
(34, 3, 'Bangka Kab.'),
(35, 3, 'Bangka Selatan Kab.'),
(36, 3, 'Bangka Tengah Kab.'),
(37, 3, 'Belitung Kab.'),
(38, 3, 'Belitung Timur Kab.'),
(39, 3, 'Pangkal Pinang Kota'),
(40, 4, 'Cilegon Kota'),
(41, 4, 'Lebak Kab.'),
(42, 4, 'Pandeglang Kab.'),
(43, 4, 'Pendeglang Kab.'),
(44, 4, 'Serang Kab.'),
(45, 4, 'Serang Kota'),
(46, 4, 'Tangerang Kab.'),
(47, 4, 'Tangerang Kota'),
(48, 4, 'Tangerang Selatan Kota'),
(49, 5, 'Bengkulu Kota'),
(50, 5, 'Bengkulu Selatan Kab.'),
(51, 5, 'Bengkulu Tengah Kab.'),
(52, 5, 'Bengkulu Utara Kab.'),
(53, 5, 'Kaur Kab.'),
(54, 5, 'Kepahiang Kab.'),
(55, 5, 'Lebong Kab.'),
(56, 5, 'Mukomuko Kab.'),
(57, 5, 'Rejang Lebong Kab.'),
(58, 5, 'Seluma Kab.'),
(59, 6, 'Boalemo Kab.'),
(60, 6, 'Bone Bolango Kab.'),
(61, 6, 'Gorontalo Kab.'),
(62, 6, 'Gorontalo Kota'),
(63, 6, 'Gorontalo Utara Kab.'),
(64, 6, 'Pohuwato Kab.'),
(65, 7, 'Jakarta Barat'),
(66, 7, 'Jakarta Pusat'),
(67, 7, 'Jakarta Selatan'),
(68, 7, 'Jakarta Timur'),
(69, 7, 'Jakarta Utara'),
(70, 7, 'Kepulauan Seribu'),
(71, 8, 'Batang Hari Kab.'),
(72, 8, 'Bungo Kab.'),
(73, 8, 'Jambi Kota'),
(74, 8, 'Kerinci Kab.'),
(75, 8, 'Merangin Kab.'),
(76, 8, 'Muaro Jambi Kab.'),
(77, 8, 'Sarolangun Kab.'),
(78, 8, 'Sungai Penuh Kota'),
(79, 8, 'Tanjung Jabung Barat Kab.'),
(80, 8, 'Tanjung Jabung Timur Kab.'),
(81, 8, 'Tebo Kab.'),
(82, 9, 'Bandung Barat Kab.'),
(83, 9, 'Bandung Kab.'),
(84, 9, 'Bandung Kota'),
(85, 9, 'Banjar Kota'),
(86, 9, 'Bekasi Kab.'),
(87, 9, 'Bekasi Kota'),
(88, 9, 'Bogor Kab.'),
(89, 9, 'Bogor Kota'),
(90, 9, 'Ciamis Kab.'),
(91, 9, 'Cianjur Kab.'),
(92, 9, 'Cimahi Kota'),
(93, 9, 'Cirebon Kab.'),
(94, 9, 'Cirebon Kota'),
(95, 9, 'Depok Kota'),
(96, 9, 'Garut Kab.'),
(97, 9, 'Indramayu Kab.'),
(98, 9, 'Karawang Kab.'),
(99, 9, 'Kerawang Kab.'),
(100, 9, 'Kuningan Kab.'),
(101, 9, 'Majalengka Kab.'),
(102, 9, 'Purwakarta Kab.'),
(103, 9, 'Subang Kab.'),
(104, 9, 'Sukabumi Kab.'),
(105, 9, 'Sukabumi Kota'),
(106, 9, 'Sumedang Kab.'),
(107, 9, 'Tasikmalaya Kab.'),
(108, 9, 'Tasikmalaya Kota'),
(109, 10, 'Banjarnegara Kab.'),
(110, 10, 'Banyumas Kab.'),
(111, 10, 'Batang Kab.'),
(112, 10, 'Blora Kab.'),
(113, 10, 'Boyolali Kab.'),
(114, 10, 'Brebes Kab.'),
(115, 10, 'Cilacap Kab.'),
(116, 10, 'Demak Kab.'),
(117, 10, 'Grobogan Kab.'),
(118, 10, 'Jepara Kab.'),
(119, 10, 'Karanganyar Kab.'),
(120, 10, 'Kebumen Kab.'),
(121, 10, 'Kendal Kab.'),
(122, 10, 'Klaten Kab.'),
(123, 10, 'Kudus Kab.'),
(124, 10, 'Magelang Kab.'),
(125, 10, 'Magelang Kota'),
(126, 10, 'Pati Kab.'),
(127, 10, 'Pekalongan Kab.'),
(128, 10, 'Pekalongan Kota'),
(129, 10, 'Pemalang Kab.'),
(130, 10, 'Purbalingga Kab.'),
(131, 10, 'Purworejo Kab.'),
(132, 10, 'Rembang Kab.'),
(133, 10, 'Salatiga Kota'),
(134, 10, 'Semarang Kab.'),
(135, 10, 'Semarang Kota'),
(136, 10, 'Sragen Kab.'),
(137, 10, 'Sukoharjo Kab.'),
(138, 10, 'Surakarta Kota'),
(139, 10, 'Tegal Kab.'),
(140, 10, 'Tegal Kota'),
(141, 10, 'Temanggung Kab.'),
(142, 10, 'Wonogiri Kab.'),
(143, 10, 'Wonosobo Kab.'),
(144, 11, 'Bangkalan  Kab.'),
(145, 11, 'Banyuwangi  Kab.'),
(146, 11, 'Batu Kota'),
(147, 11, 'Blitar Kab.'),
(148, 11, 'Blitar Kota'),
(149, 11, 'Bojonegoro Kab. '),
(150, 11, 'Bondowoso Kab. '),
(151, 11, 'Gresik Kab. '),
(152, 11, 'Jember Kab.'),
(153, 11, 'Jombang  Kab.'),
(154, 11, 'Kediri  Kab.'),
(155, 11, 'Kediri Kota'),
(156, 11, 'Lamongan  Kab.'),
(157, 11, 'Lumajang Kab. '),
(158, 11, 'Madiun Kab. '),
(159, 11, 'Madiun Kota'),
(160, 11, 'Magetan Kab. '),
(161, 11, 'Malang Kab.'),
(162, 11, 'Malang Kota'),
(163, 11, 'Mojokerto Kab. '),
(164, 11, 'Mojokerto Kota'),
(165, 11, 'Nganjuk Kab. '),
(166, 11, 'Ngawi Kab. '),
(167, 11, 'Pacitan Kab. '),
(168, 11, 'Pamekasan Kab. '),
(169, 11, 'Pasuruan Kab. '),
(170, 11, 'Pasuruan Kota'),
(171, 11, 'Ponorogo Kab. '),
(172, 11, 'Probolinggo Kab. '),
(173, 11, 'Probolinggo Kota'),
(174, 11, 'Sampang Kab. '),
(175, 11, 'Sidoarjo  Kab.'),
(176, 11, 'Situbondo Kab. '),
(177, 11, 'Sumenep Kab. '),
(178, 11, 'Surabaya Kota'),
(179, 11, 'Trenggalek Kab. '),
(180, 11, 'Tuban Kab.'),
(181, 11, 'Tulungagung Kab. '),
(182, 12, 'Bengkayang Kab.'),
(183, 12, 'Kapuas Hulu Kab.'),
(184, 12, 'Kayong Utara Kab.'),
(185, 12, 'Ketapang Kab.'),
(186, 12, 'Kubu Raya Kab.'),
(187, 12, 'Landak Kab.'),
(188, 12, 'Melawi Kab.'),
(189, 12, 'Pontianak Kab.'),
(190, 12, 'Pontianak Kota'),
(191, 12, 'Sambas Kab.'),
(192, 12, 'Sanggau Kab.'),
(193, 12, 'Sekadau Kab.'),
(194, 12, 'Singkawang Kota'),
(195, 12, 'Sintang Kab.'),
(196, 13, 'Balanngan Kab.'),
(197, 13, 'Banjar Kab.'),
(198, 13, 'Banjarbaru Kota'),
(199, 13, 'Banjarmasin Kota'),
(200, 13, 'Barito Kuala Kab.'),
(201, 13, 'Hulu Sungai Selatan Kab.'),
(202, 13, 'Hulu Sungai Tengah Kab.'),
(203, 13, 'Hulu Sungai Utara Kab.'),
(204, 13, 'Kotabaru Kab.'),
(205, 13, 'Tabalong Kab.'),
(206, 13, 'Tanah Bumbu Kab.'),
(207, 13, 'Tanah Laut Kab.'),
(208, 13, 'Tapin  Kab.'),
(209, 14, 'Barito Selatan Kab.'),
(210, 14, 'Barito Timur Kab.'),
(211, 14, 'Barito Utara Kab.'),
(212, 14, 'Gunung Mas Kab.'),
(213, 14, 'Kapuas Kab.'),
(214, 14, 'Katingan Kab.'),
(215, 14, 'Kotawaringin Barat Kab.'),
(216, 14, 'Kotawaringin Timur Kab.'),
(217, 14, 'Lamandau Kab.'),
(218, 14, 'Murung Raya Kab.'),
(219, 14, 'Palangkaraya Kota'),
(220, 14, 'Pulang Pisau Kab.'),
(221, 14, 'Seruyan Kab.'),
(222, 14, 'Sukamara Kab.'),
(223, 15, 'Balikpapan Kota'),
(224, 15, 'Berau Kab.'),
(225, 15, 'Bontang Kota'),
(226, 15, 'Bulungan Kab.'),
(227, 15, 'Kutai Barat Kab.'),
(228, 15, 'Kutai Kartanegara Kab.'),
(229, 15, 'Kutai Timur Kab.'),
(230, 15, 'Malinau Kab.'),
(231, 15, 'Nunukan Kab.'),
(232, 15, 'Paser Kab.'),
(233, 15, 'Penajam Paser Utara Kab.'),
(234, 15, 'Samarinda Kota'),
(235, 15, 'Tana Tidung Kab.'),
(236, 15, 'Tarakan Kota'),
(237, 16, 'Batam Kota'),
(238, 16, 'Bintan Kab.'),
(239, 16, 'Karimun Kab.'),
(240, 16, 'Kepulauan Anambas Kab.'),
(241, 16, 'Lingga Kab.'),
(242, 16, 'Natuna Kab.'),
(243, 16, 'Tanjung Pinang Kota'),
(244, 17, 'Bandar Lampung Kota'),
(245, 17, 'Lampung Barat Kab.'),
(246, 17, 'Lampung Selatan Kab.'),
(247, 17, 'Lampung Tengah Kab.'),
(248, 17, 'Lampung Timur Kab.'),
(249, 17, 'Lampung Utara Kab.'),
(250, 17, 'Mesuji Kab.'),
(251, 17, 'Metro Kota'),
(252, 17, 'Pesawaran Kab.'),
(253, 17, 'Pringsewu Kab.'),
(254, 17, 'Tanggamus Kab.'),
(255, 17, 'Tulang Bawang Barat Kab.'),
(256, 17, 'Tulang Bawang Kab.'),
(257, 17, 'Way Kanan Kab.'),
(258, 18, 'Ambon Kota'),
(259, 18, 'Buru Kab.'),
(260, 18, 'Buru Selatan Kab.'),
(261, 18, 'Kepulauan Aru Kab.'),
(262, 18, 'Maluku Barat Daya Kab.'),
(263, 18, 'Maluku Tengah Kab.'),
(264, 18, 'Maluku Tenggara Barat Kab.'),
(265, 18, 'Maluku Tenggara Kab.'),
(266, 18, 'Seram Bagian Barat Kab.'),
(267, 18, 'Seram Bagian Timur Kab.'),
(268, 18, 'Tual Kab.'),
(269, 19, 'Halmahera Barat Kab.'),
(270, 19, 'Halmahera Selatan Kab.'),
(271, 19, 'Halmahera Tengah Kab.'),
(272, 19, 'Halmahera Timur Kab.'),
(273, 19, 'Halmahera Utara Kab.'),
(274, 19, 'Kepuluan Sula Kab.'),
(275, 19, 'Pulau Morotai Kab.'),
(276, 19, 'Ternate Kota'),
(277, 19, 'Tidore Kepulauan Kota'),
(278, 20, 'Bima Kab.'),
(279, 20, 'Bima Kota'),
(280, 20, 'Dompu Kab.'),
(281, 20, 'Lombok Barat Kab.'),
(282, 20, 'Lombok Tengah Kab.'),
(283, 20, 'Lombok Timur Kab.'),
(284, 20, 'Lombok Utara Kab.'),
(285, 20, 'Mataram Kota'),
(286, 20, 'Sumbawa Barat Kab.'),
(287, 20, 'Sumbawa Kab.'),
(288, 21, 'Alor Kab.'),
(289, 21, 'Belu Kab.'),
(290, 21, 'Ende Kab.'),
(291, 21, 'Flores Timur Kab.'),
(292, 21, 'Kupang Kab.'),
(293, 21, 'Kupang Kota'),
(294, 21, 'Lembata Kab.'),
(295, 21, 'Manggarai  Kab.'),
(296, 21, 'Manggarai Barat Kab.'),
(297, 21, 'Manggarai Timur Kab.'),
(298, 21, 'Nagekeo Kab.'),
(299, 21, 'Ngada Kab.'),
(300, 21, 'Rote Ndao Kab.'),
(301, 21, 'Sabu Raijua Kab.'),
(302, 21, 'Sikka Kab.'),
(303, 21, 'Sumba Barat Daya Kab.'),
(304, 21, 'Sumba Barat Kab.'),
(305, 21, 'Sumba Tengah Kab.'),
(306, 21, 'Sumba Timur Kab.'),
(307, 21, 'Timor Tengah Selatan Kab.'),
(308, 21, 'Timor Tengah Utara Kab.'),
(309, 22, 'Asmat Kab.'),
(310, 22, 'Biak Numfor Kab.'),
(311, 22, 'Boven Digoel Kab.'),
(312, 22, 'Deiyai Kab.'),
(313, 22, 'Dogiyai Kab.'),
(314, 22, 'Intan Jaya Kab.'),
(315, 22, 'Jayapura Kab.'),
(316, 22, 'Jayapura Kota'),
(317, 22, 'Jayawijaya Kab.'),
(318, 22, 'Keerom Kab.'),
(319, 22, 'Lanny Jaya Kab.'),
(320, 22, 'Mamberamo Raya Kab.'),
(321, 22, 'Mamberamo Tengah Kab.'),
(322, 22, 'Mappi Kab.'),
(323, 22, 'Merauke Kab.'),
(324, 22, 'Mimika Kab.'),
(325, 22, 'Nabire Kab.'),
(326, 22, 'Nduga Kab.'),
(327, 22, 'Paniai Kab.'),
(328, 22, 'Pengunungan Bintang Kab.'),
(329, 22, 'Puncak Jaya Kab.'),
(330, 22, 'Puncak Kab.'),
(331, 22, 'Sarmi Kab.'),
(332, 22, 'Supiori Kab.'),
(333, 22, 'Tolikara Kab.'),
(334, 22, 'Waropen Kab.'),
(335, 22, 'Yahukimo Kab.'),
(336, 22, 'Yalimo Kab.'),
(337, 22, 'Yapen Waropen Kab.'),
(338, 23, 'Fakfak Kab.'),
(339, 23, 'Kaimana Kab.'),
(340, 23, 'Manokwari Kab.'),
(341, 23, 'Maybrat Kab.'),
(342, 23, 'Raja Ampat Kab.'),
(343, 23, 'Sorong Kab.'),
(344, 23, 'Sorong Kota'),
(345, 23, 'Sorong Selatan Kab.'),
(346, 23, 'Tambrauw Kab.'),
(347, 23, 'Teluk Bintuni Kab.'),
(348, 23, 'Teluk Wondama Kab.'),
(349, 24, 'Bengkalis Kab.'),
(350, 24, 'Dumai Kota'),
(351, 24, 'Indragiri Hilir Kab.'),
(352, 24, 'Indragiri Hulu Kab.'),
(353, 24, 'Kampar Kab.'),
(354, 24, 'Kepulauan Meranti Kab.'),
(355, 24, 'Kuantan Singingi Kab.'),
(356, 24, 'Pekanbaru Kota'),
(357, 24, 'Pelalawan Kab.'),
(358, 24, 'Rokan Hilir Kab.'),
(359, 24, 'Rokan Hulu Kab.'),
(360, 24, 'Siak Kab.'),
(361, 25, 'Majene'),
(362, 25, 'Mamasa'),
(363, 25, 'Mamuju'),
(364, 25, 'Mamuju Utara'),
(365, 25, 'Polewali Mandar'),
(366, 26, 'Bantaeng Kab.'),
(367, 26, 'Barru Kab.'),
(368, 26, 'Bone Kab.'),
(369, 26, 'Bulukumba Kab.'),
(370, 26, 'Enrekang Kab.'),
(371, 26, 'Gowa Kab.'),
(372, 26, 'Jenepronto Kab.'),
(373, 26, 'Kepulauan Selayar Kab.'),
(374, 26, 'Luwu Kab.'),
(375, 26, 'Luwu Timur Kab.'),
(376, 26, 'Luwu Utara Kab.'),
(377, 26, 'Makassar Kota'),
(378, 26, 'Maros Kab.'),
(379, 26, 'Palopo Kota'),
(380, 26, 'Pangkajene dan Kepulauan Kab.'),
(381, 26, 'Pare-Pare Kota'),
(382, 26, 'Pinrang Kab.'),
(383, 26, 'Sidenreng Rappang Kab.'),
(384, 26, 'Sinjai Kab.'),
(385, 26, 'Soppeng Kab.'),
(386, 26, 'Takalar Kab.'),
(387, 26, 'Tana Toraja Kab.'),
(388, 26, 'Toraja Utara Kab.'),
(389, 26, 'Wajo Kab.'),
(390, 27, 'Banggai Kab.'),
(391, 27, 'Banggai Kepulauan Kab.'),
(392, 27, 'Buol Kab.'),
(393, 27, 'Donggala Kab.'),
(394, 27, 'Morowali Kab.'),
(395, 27, 'Palu Kota'),
(396, 27, 'Parigi Moutong Kab.'),
(397, 27, 'Poso Kab.'),
(398, 27, 'Sigi Kab.'),
(399, 27, 'Tojo Una-una Kab.'),
(400, 27, 'Toli-Toli Kab.'),
(401, 28, 'Bau-Bau Kota'),
(402, 28, 'Bombana Kab.'),
(403, 28, 'Buton Kab.'),
(404, 28, 'Buton Utara Kab.'),
(405, 28, 'Kendari Kota'),
(406, 28, 'Kolaka Kab.'),
(407, 28, 'Kolaka Utara Kab.'),
(408, 28, 'Konawe Kab.'),
(409, 28, 'Konawe Selatan Kab.'),
(410, 28, 'Konawe Utara Kab.'),
(411, 28, 'Muna Kab.'),
(412, 28, 'Wakatobi Kab.'),
(413, 29, 'Bitung Kota'),
(414, 29, 'Bitung Kota'),
(415, 29, 'Bolaang Mongondow Kab.'),
(416, 29, 'Bolaang Mongondow Selatan Kab.'),
(417, 29, 'Bolaang Mongondow Timur Kab.'),
(418, 29, 'Bolaang Mongondow Utara Kab.'),
(419, 29, 'Kepulauan Sangihe Kab.'),
(420, 29, 'Kepulauan Siau Tagulandang Biaro Kab.'),
(421, 29, 'Kepulauan Talaud Kab.'),
(422, 29, 'Kotamobagu Kota'),
(423, 29, 'Manado Kota'),
(424, 29, 'Minahasa Kab.'),
(425, 29, 'Minahasa Selatan Kab.'),
(426, 29, 'Minahasa Tenggara Kab.'),
(427, 29, 'Minahasa Utara Kab.'),
(428, 29, 'Tomohon Kota'),
(429, 30, 'Agam Kab.'),
(430, 30, 'Bukittinggi Kota'),
(431, 30, 'Dharmasraya Kab.'),
(432, 30, 'Kepulauan Mentawai Kab.'),
(433, 30, 'Lima Puluh Kota Kab.'),
(434, 30, 'Padang Kota'),
(435, 30, 'Padang Panjang Kota'),
(436, 30, 'Padang Pariaman Kab.'),
(437, 30, 'Pariaman Kota'),
(438, 30, 'Pasaman Barat Kab.'),
(439, 30, 'Pasaman Kab.'),
(440, 30, 'Payakumbuh Kota'),
(441, 30, 'Pesisir Selatan Kab.'),
(442, 30, 'Sawahlunto Kota'),
(443, 30, 'Sijunjung Kab.'),
(444, 30, 'Solok Kab.'),
(445, 30, 'Solok Kota'),
(446, 30, 'Solok Selatan Kab.'),
(447, 30, 'Tanah Datar Kab.'),
(448, 31, 'Banyuasin Kab.'),
(449, 31, 'Empat Lawang Kab.'),
(450, 31, 'Lahat Kab.'),
(451, 31, 'Lubuklinggau Kota'),
(452, 31, 'Muara Enim Kab.'),
(453, 31, 'Musi Banyuasin Kab.'),
(454, 31, 'Musi Rawas Kab.'),
(455, 31, 'Ogan Ilir Kab.'),
(456, 31, 'Ogan Komering Ilir Kab.'),
(457, 31, 'Ogan Komering Ulu Kab.'),
(458, 31, 'Ogan Komering Ulu Selatan Kab.'),
(459, 31, 'Ogan Komering Ulu Timur Kab.'),
(460, 31, 'Pagar Alam Kota'),
(461, 31, 'Palembang Kota'),
(462, 31, 'Prabumulih Kota'),
(463, 32, 'Asahan Kab.'),
(464, 32, 'Batubara Kab.'),
(465, 32, 'Binjai Kota'),
(466, 32, 'Dairi Kab.'),
(467, 32, 'Deli Serdang Kab.'),
(468, 32, 'Gunung Sitoli Kota'),
(469, 32, 'Humbang Hasundutan Kab.'),
(470, 32, 'Karo Kab.'),
(471, 32, 'Labuhanbatu Kab.'),
(472, 32, 'Labuhanbatu Selatan Kab.'),
(473, 32, 'Labuhanbatu Utara Kab.'),
(474, 32, 'Langkat Kab.'),
(475, 32, 'Mandailing Natal Kab.'),
(476, 32, 'Medan Kota'),
(477, 32, 'Nias Barat Kab.'),
(478, 32, 'Nias Kab.'),
(479, 32, 'Nias Selatan Kab.'),
(480, 32, 'Nias Utara Kab.'),
(481, 32, 'Padang Lawas Kab.'),
(482, 32, 'Padang Lawas Utara Kab.'),
(483, 32, 'Padang Sidempuan Kota'),
(484, 32, 'Pakpak Bharat Kab.'),
(485, 32, 'Pematangsiantar Kota'),
(486, 32, 'Samosir Kab.'),
(487, 32, 'Serdang Bedagai Kab.'),
(488, 32, 'Sibolga Kota'),
(489, 32, 'Simalungun Kab.'),
(490, 32, 'Tanjung Balai Kota'),
(491, 32, 'Tapanuli Selatan Kab.'),
(492, 32, 'Tapanuli Tengah Kab.'),
(493, 32, 'Tapanuli Utara Kab.'),
(494, 32, 'Tebing Tinggi Kota'),
(495, 32, 'Toba Samosir Kab.'),
(496, 33, 'Bantul Kab.'),
(497, 33, 'Gunung Kidul Kab.'),
(498, 33, 'Kulon Progo Kab.'),
(499, 33, 'Sleman Kab.'),
(500, 33, 'Yogyakarta Kota');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `id_reset` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `random` varchar(1000) NOT NULL,
  `used` int(11) NOT NULL COMMENT '0 = belum dipake, 1 = sudah dipake, 2=timeout',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reset`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `password_reset`
--


-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Aceh D.I.'),
(2, 'Bali'),
(3, 'Bangka Belitung'),
(4, 'Banten'),
(5, 'Bengkulu'),
(6, 'Gorontalo'),
(7, 'Jakarta D.K.I.'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kepulauan Riau'),
(17, 'Lampung'),
(18, 'Maluku'),
(19, 'Maluku Utara'),
(20, 'Nusa Tenggara Barat'),
(21, 'Nusa Tenggara Timur'),
(22, 'Papua'),
(23, 'Papua Barat'),
(24, 'Riau'),
(25, 'Sulawesi Barat'),
(26, 'Sulawesi Selatan'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Tenggara'),
(29, 'Sulawesi Utara'),
(30, 'Sumatra Barat'),
(31, 'Sumatra Selatan'),
(32, 'Sumatra Utara'),
(33, 'Yogyakarta D.I.');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE IF NOT EXISTS `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sub_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sub_kategori`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabkota` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `yahoo` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `pin_bb` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tgl_gabung` date NOT NULL,
  `status_dipercaya` varchar(255) NOT NULL,
  `tampilkan_no_tlp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `nama_depan`, `nama_belakang`, `provinsi`, `kabkota`, `email`, `fb`, `yahoo`, `twitter`, `bio`, `tlp`, `pin_bb`, `kode_pos`, `photo`, `tgl_gabung`, `status_dipercaya`, `tampilkan_no_tlp`) VALUES
(1, 'giri', '123', '0', '', '', '', '', 'oberon4mine@yahoo.com', '', '', '', '', '', '', '', '', '0000-00-00', '', '');
