-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 03:02 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_knn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$5VI/BFQadLoFMnEks3tK0eJvfMxuMSpVzOxPzWapLXIy9HZ7liuAm', 'Admin - Adi Cahyono');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_testing` bigint(20) UNSIGNED NOT NULL,
  `id_sampel_item` bigint(20) UNSIGNED NOT NULL,
  `id_variabel` bigint(20) UNSIGNED NOT NULL,
  `kuadrat` decimal(10,2) NOT NULL,
  `pengurangan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `id_testing`, `id_sampel_item`, `id_variabel`, `kuadrat`, `pengurangan`) VALUES
(7428, 573, 40, 26, '324.00', '18.00'),
(7429, 573, 41, 26, '144.00', '12.00'),
(7430, 573, 42, 26, '324.00', '18.00'),
(7431, 573, 43, 26, '121.00', '11.00'),
(7432, 573, 44, 26, '144.00', '12.00'),
(7433, 573, 45, 26, '484.00', '22.00'),
(7434, 573, 46, 26, '1024.00', '32.00'),
(7435, 573, 47, 26, '400.00', '20.00'),
(7436, 573, 48, 26, '4.00', '2.00'),
(7437, 573, 49, 26, '4.00', '2.00'),
(7438, 573, 50, 26, '4.00', '2.00'),
(7439, 573, 51, 26, '25.00', '5.00'),
(7440, 573, 52, 26, '484.00', '22.00'),
(7441, 573, 53, 26, '169.00', '13.00'),
(7442, 573, 54, 26, '100.00', '10.00'),
(7443, 574, 40, 27, '729.00', '27.00'),
(7444, 574, 41, 27, '529.00', '23.00'),
(7445, 574, 42, 27, '784.00', '28.00'),
(7446, 574, 43, 27, '361.00', '19.00'),
(7447, 574, 44, 27, '529.00', '23.00'),
(7448, 574, 45, 27, '3136.00', '56.00'),
(7449, 574, 46, 27, '841.00', '29.00'),
(7450, 574, 47, 27, '676.00', '26.00'),
(7451, 574, 48, 27, '625.00', '25.00'),
(7452, 574, 49, 27, '81.00', '9.00'),
(7453, 574, 50, 27, '0.00', '0.00'),
(7454, 574, 51, 27, '4.00', '2.00'),
(7455, 574, 52, 27, '361.00', '19.00'),
(7456, 574, 53, 27, '121.00', '11.00'),
(7457, 574, 54, 27, '169.00', '13.00'),
(7458, 575, 40, 38, '576.00', '24.00'),
(7459, 575, 41, 38, '361.00', '19.00'),
(7460, 575, 42, 38, '576.00', '24.00'),
(7461, 575, 43, 38, '625.00', '25.00'),
(7462, 575, 44, 38, '324.00', '18.00'),
(7463, 575, 45, 38, '841.00', '29.00'),
(7464, 575, 46, 38, '2916.00', '54.00'),
(7465, 575, 47, 38, '729.00', '27.00'),
(7466, 575, 48, 38, '361.00', '19.00'),
(7467, 575, 49, 38, '144.00', '12.00'),
(7468, 575, 50, 38, '0.00', '0.00'),
(7469, 575, 51, 38, '9.00', '3.00'),
(7470, 575, 52, 38, '484.00', '22.00'),
(7471, 575, 53, 38, '169.00', '13.00'),
(7472, 575, 54, 38, '81.00', '9.00'),
(7473, 576, 40, 39, '784.00', '28.00'),
(7474, 576, 41, 39, '484.00', '22.00'),
(7475, 576, 42, 39, '900.00', '30.00'),
(7476, 576, 43, 39, '441.00', '21.00'),
(7477, 576, 44, 39, '484.00', '22.00'),
(7478, 576, 45, 39, '576.00', '24.00'),
(7479, 576, 46, 39, '144.00', '12.00'),
(7480, 576, 47, 39, '729.00', '27.00'),
(7481, 576, 48, 39, '484.00', '22.00'),
(7482, 576, 49, 39, '9.00', '-3.00'),
(7483, 576, 50, 39, '0.00', '0.00'),
(7484, 576, 51, 39, '4.00', '2.00'),
(7485, 576, 52, 39, '625.00', '25.00'),
(7486, 576, 53, 39, '625.00', '25.00'),
(7487, 576, 54, 39, '25.00', '5.00'),
(7488, 577, 40, 40, '625.00', '25.00'),
(7489, 577, 41, 40, '441.00', '21.00'),
(7490, 577, 42, 40, '625.00', '25.00'),
(7491, 577, 43, 40, '484.00', '22.00'),
(7492, 577, 44, 40, '441.00', '21.00'),
(7493, 577, 45, 40, '729.00', '27.00'),
(7494, 577, 46, 40, '324.00', '18.00'),
(7495, 577, 47, 40, '961.00', '31.00'),
(7496, 577, 48, 40, '121.00', '11.00'),
(7497, 577, 49, 40, '256.00', '16.00'),
(7498, 577, 50, 40, '0.00', '0.00'),
(7499, 577, 51, 40, '16.00', '4.00'),
(7500, 577, 52, 40, '361.00', '19.00'),
(7501, 577, 53, 40, '225.00', '15.00'),
(7502, 577, 54, 40, '36.00', '6.00'),
(7503, 578, 40, 41, '529.00', '23.00'),
(7504, 578, 41, 41, '289.00', '17.00'),
(7505, 578, 42, 41, '529.00', '23.00'),
(7506, 578, 43, 41, '196.00', '14.00'),
(7507, 578, 44, 41, '289.00', '17.00'),
(7508, 578, 45, 41, '81.00', '9.00'),
(7509, 578, 46, 41, '484.00', '22.00'),
(7510, 578, 47, 41, '81.00', '9.00'),
(7511, 578, 48, 41, '25.00', '-5.00'),
(7512, 578, 49, 41, '9.00', '-3.00'),
(7513, 578, 50, 41, '0.00', '0.00'),
(7514, 578, 51, 41, '1.00', '1.00'),
(7515, 578, 52, 41, '289.00', '17.00'),
(7516, 578, 53, 41, '196.00', '14.00'),
(7517, 578, 54, 41, '64.00', '8.00'),
(7518, 579, 40, 42, '289.00', '17.00'),
(7519, 579, 41, 42, '289.00', '17.00'),
(7520, 579, 42, 42, '400.00', '20.00'),
(7521, 579, 43, 42, '225.00', '15.00'),
(7522, 579, 44, 42, '289.00', '17.00'),
(7523, 579, 45, 42, '1089.00', '33.00'),
(7524, 579, 46, 42, '64.00', '8.00'),
(7525, 579, 47, 42, '676.00', '26.00'),
(7526, 579, 48, 42, '36.00', '6.00'),
(7527, 579, 49, 42, '1.00', '1.00'),
(7528, 579, 50, 42, '0.00', '0.00'),
(7529, 579, 51, 42, '0.00', '0.00'),
(7530, 579, 52, 42, '225.00', '15.00'),
(7531, 579, 53, 42, '225.00', '15.00'),
(7532, 579, 54, 42, '4.00', '2.00'),
(7533, 580, 40, 43, '784.00', '28.00'),
(7534, 580, 41, 43, '400.00', '20.00'),
(7535, 580, 42, 43, '900.00', '30.00'),
(7536, 580, 43, 43, '400.00', '20.00'),
(7537, 580, 44, 43, '400.00', '20.00'),
(7538, 580, 45, 43, '1369.00', '37.00'),
(7539, 580, 46, 43, '3025.00', '55.00'),
(7540, 580, 47, 43, '1024.00', '32.00'),
(7541, 580, 48, 43, '225.00', '15.00'),
(7542, 580, 49, 43, '4.00', '-2.00'),
(7543, 580, 50, 43, '0.00', '0.00'),
(7544, 580, 51, 43, '36.00', '6.00'),
(7545, 580, 52, 43, '441.00', '21.00'),
(7546, 580, 53, 43, '361.00', '19.00'),
(7547, 580, 54, 43, '64.00', '8.00'),
(7548, 581, 40, 44, '1089.00', '33.00'),
(7549, 581, 41, 44, '1024.00', '32.00'),
(7550, 581, 42, 44, '1089.00', '33.00'),
(7551, 581, 43, 44, '841.00', '29.00'),
(7552, 581, 44, 44, '1024.00', '32.00'),
(7553, 581, 45, 44, '1369.00', '37.00'),
(7554, 581, 46, 44, '25.00', '5.00'),
(7555, 581, 47, 44, '625.00', '25.00'),
(7556, 581, 48, 44, '361.00', '19.00'),
(7557, 581, 49, 44, '81.00', '9.00'),
(7558, 581, 50, 44, '0.00', '0.00'),
(7559, 581, 51, 44, '36.00', '6.00'),
(7560, 581, 52, 44, '900.00', '30.00'),
(7561, 581, 53, 44, '484.00', '22.00'),
(7562, 581, 54, 44, '100.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sampel_item` bigint(20) UNSIGNED NOT NULL,
  `total_kuadrat` decimal(10,2) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `id_sampel_item`, `total_kuadrat`, `jarak`) VALUES
(900, 40, '5729.00', 75.6902),
(901, 41, '3961.00', 62.9365),
(902, 42, '6127.00', 78.2752),
(903, 43, '3694.00', 60.7783),
(904, 44, '3924.00', 62.6418),
(905, 45, '9674.00', 98.3565),
(906, 46, '8847.00', 94.0585),
(907, 47, '5901.00', 76.818),
(908, 48, '2242.00', 47.3498),
(909, 49, '589.00', 24.2693),
(910, 50, '4.00', 2),
(911, 51, '131.00', 11.4455),
(912, 52, '4170.00', 64.5755),
(913, 53, '2575.00', 50.7445),
(914, 54, '643.00', 25.3574);

-- --------------------------------------------------------

--
-- Table structure for table `sampel`
--

CREATE TABLE `sampel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_variabel` bigint(20) UNSIGNED NOT NULL,
  `id_sampel_item` bigint(20) UNSIGNED NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampel`
--

INSERT INTO `sampel` (`id`, `id_variabel`, `id_sampel_item`, `nilai`) VALUES
(336, 26, 40, '79'),
(337, 27, 40, '69'),
(338, 38, 40, '70'),
(339, 39, 40, '66'),
(340, 40, 40, '68'),
(341, 41, 40, '66'),
(342, 42, 40, '71'),
(343, 43, 40, '67'),
(344, 44, 40, '66'),
(345, 45, 40, 'Lulus di bawah rata-rata'),
(346, 26, 41, '85'),
(347, 27, 41, '73'),
(348, 38, 41, '75'),
(349, 39, 41, '72'),
(350, 40, 41, '72'),
(351, 41, 41, '72'),
(352, 42, 41, '71'),
(353, 43, 41, '75'),
(354, 44, 41, '67'),
(355, 45, 41, 'Lulus di bawah rata-rata'),
(356, 26, 42, '79'),
(357, 27, 42, '68'),
(358, 38, 42, '70'),
(359, 39, 42, '64'),
(360, 40, 42, '68'),
(361, 41, 42, '66'),
(362, 42, 42, '68'),
(363, 43, 42, '65'),
(364, 44, 42, '66'),
(365, 45, 42, 'Lulus di bawah rata-rata'),
(366, 26, 43, '86'),
(367, 27, 43, '77'),
(368, 38, 43, '69'),
(369, 39, 43, '73'),
(370, 40, 43, '71'),
(371, 41, 43, '75'),
(372, 42, 43, '73'),
(373, 43, 43, '75'),
(374, 44, 43, '70'),
(375, 45, 43, 'Lulus di bawah rata-rata'),
(376, 26, 44, '85'),
(377, 27, 44, '73'),
(378, 38, 44, '76'),
(379, 39, 44, '72'),
(380, 40, 44, '72'),
(381, 41, 44, '72'),
(382, 42, 44, '71'),
(383, 43, 44, '75'),
(384, 44, 44, '67'),
(385, 45, 44, 'Lulus di bawah rata-rata'),
(386, 26, 45, '75'),
(387, 27, 45, '40'),
(388, 38, 45, '65'),
(389, 39, 45, '70'),
(390, 40, 45, '66'),
(391, 41, 45, '80'),
(392, 42, 45, '55'),
(393, 43, 45, '58'),
(394, 44, 45, '62'),
(395, 45, 45, 'Lulus di bawah rata-rata'),
(396, 26, 46, '65'),
(397, 27, 46, '67'),
(398, 38, 46, '40'),
(399, 39, 46, '82'),
(400, 40, 46, '75'),
(401, 41, 46, '67'),
(402, 42, 46, '80'),
(403, 43, 46, '40'),
(404, 44, 46, '94'),
(405, 45, 46, 'Lulus di bawah rata-rata'),
(406, 26, 47, '77'),
(407, 27, 47, '70'),
(408, 38, 47, '67'),
(409, 39, 47, '67'),
(410, 40, 47, '62'),
(411, 41, 47, '80'),
(412, 42, 47, '62'),
(413, 43, 47, '63'),
(414, 44, 47, '74'),
(415, 45, 47, 'Lulus di atas rata-rata'),
(416, 26, 48, '95'),
(417, 27, 48, '71'),
(418, 38, 48, '75'),
(419, 39, 48, '72'),
(420, 40, 48, '82'),
(421, 41, 48, '94'),
(422, 42, 48, '82'),
(423, 43, 48, '80'),
(424, 44, 48, '80'),
(425, 45, 48, 'Lulus di atas rata-rata'),
(426, 26, 49, '95'),
(427, 27, 49, '87'),
(428, 38, 49, '82'),
(429, 39, 49, '97'),
(430, 40, 49, '77'),
(431, 41, 49, '92'),
(432, 42, 49, '87'),
(433, 43, 49, '97'),
(434, 44, 49, '90'),
(435, 45, 49, 'Lulus di atas rata-rata'),
(436, 26, 50, '95'),
(437, 27, 50, '96'),
(438, 38, 50, '94'),
(439, 39, 50, '94'),
(440, 40, 50, '93'),
(441, 41, 50, '89'),
(442, 42, 50, '88'),
(443, 43, 50, '95'),
(444, 44, 50, '99'),
(445, 45, 50, 'Lulus di atas rata-rata'),
(446, 26, 51, '92'),
(447, 27, 51, '94'),
(448, 38, 51, '91'),
(449, 39, 51, '92'),
(450, 40, 51, '89'),
(451, 41, 51, '88'),
(452, 42, 51, '88'),
(453, 43, 51, '89'),
(454, 44, 51, '93'),
(455, 45, 51, 'Lulus di atas rata-rata'),
(456, 26, 52, '75'),
(457, 27, 52, '77'),
(458, 38, 52, '72'),
(459, 39, 52, '69'),
(460, 40, 52, '74'),
(461, 41, 52, '72'),
(462, 42, 52, '73'),
(463, 43, 52, '74'),
(464, 44, 52, '69'),
(465, 45, 52, 'Lulus di atas rata-rata'),
(466, 26, 53, '84'),
(467, 27, 53, '85'),
(468, 38, 53, '81'),
(469, 39, 53, '69'),
(470, 40, 53, '78'),
(471, 41, 53, '75'),
(472, 42, 53, '73'),
(473, 43, 53, '76'),
(474, 44, 53, '77'),
(475, 45, 53, 'Lulus di atas rata-rata'),
(476, 26, 54, '87'),
(477, 27, 54, '83'),
(478, 38, 54, '85'),
(479, 39, 54, '89'),
(480, 40, 54, '87'),
(481, 41, 54, '81'),
(482, 42, 54, '86'),
(483, 43, 54, '87'),
(484, 44, 54, '89'),
(485, 45, 54, 'Lulus di atas rata-rata');

-- --------------------------------------------------------

--
-- Table structure for table `sampel_item`
--

CREATE TABLE `sampel_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampel_item`
--

INSERT INTO `sampel_item` (`id`, `created_at`, `updated_at`) VALUES
(40, '2021-06-29 09:35:42', '2021-06-29 09:35:42'),
(41, '2021-06-29 09:36:34', '2021-06-29 09:36:34'),
(42, '2021-06-29 09:48:36', '2021-06-29 09:48:36'),
(43, '2021-06-29 09:51:52', '2021-06-29 09:51:52'),
(44, '2021-06-29 09:53:08', '2021-06-29 09:53:08'),
(45, '2021-06-29 09:55:49', '2021-06-29 09:55:49'),
(46, '2021-06-29 09:57:02', '2021-06-29 09:57:02'),
(47, '2021-06-29 10:01:03', '2021-06-29 10:01:03'),
(48, '2021-06-29 10:02:10', '2021-06-29 10:02:10'),
(49, '2021-06-29 10:07:32', '2021-06-29 10:07:32'),
(50, '2021-06-29 10:09:21', '2021-06-29 10:09:21'),
(51, '2021-06-29 10:11:39', '2021-06-29 10:11:39'),
(52, '2021-06-29 10:16:27', '2021-06-29 10:16:27'),
(53, '2021-06-29 10:17:36', '2021-06-29 10:17:36'),
(54, '2021-06-29 10:19:05', '2021-06-29 10:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `status_variabel`
--

CREATE TABLE `status_variabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_variabel`
--

INSERT INTO `status_variabel` (`id`, `nama`) VALUES
(1, 'Data'),
(2, 'Target');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_variabel` bigint(20) UNSIGNED NOT NULL,
  `nilai` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `id_variabel`, `nilai`) VALUES
(573, 26, '97.00'),
(574, 27, '96.00'),
(575, 38, '94.00'),
(576, 39, '94.00'),
(577, 40, '93.00'),
(578, 41, '89.00'),
(579, 42, '88.00'),
(580, 43, '95.00'),
(581, 44, '99.00');

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE `variabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_status_variabel` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`id`, `nama`, `id_status_variabel`, `keterangan`) VALUES
(26, 'PadBp', 1, 'Pendidikan agama dan Budi pekerti'),
(27, 'PPKn', 1, 'Pendidikan Pancasila dan Kewarganegaraan'),
(38, 'B Ind', 1, 'Bahasa Indonesia'),
(39, 'Mtk', 1, 'Matematika'),
(40, 'IPA', 1, 'Ilmu Pengetauan Alam'),
(41, 'IPS', 1, 'Ilmu Pengetauan Sosial'),
(42, 'SBdP', 1, 'Seni Budaya dan Prakarya'),
(43, 'PJOK', 1, 'Pendidikan Jasmani, Olahara dan Kesehatan'),
(44, 'B Ing', 1, 'Bahasa Inggris'),
(45, 'Keterangan Lulus', 2, 'Keterangan Lulus Ujian Sekolah');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hasil`
-- (See below for the actual view)
--
CREATE TABLE `view_hasil` (
`id` bigint(20) unsigned
,`id_sampel_item` bigint(20) unsigned
,`total_kuadrat` decimal(10,2)
,`jarak` float
,`a` bigint(20) unsigned
,`kategori` mediumtext
);

-- --------------------------------------------------------

--
-- Structure for view `view_hasil`
--
DROP TABLE IF EXISTS `view_hasil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hasil`  AS SELECT `hasil_akhir`.`id` AS `id`, `hasil_akhir`.`id_sampel_item` AS `id_sampel_item`, `hasil_akhir`.`total_kuadrat` AS `total_kuadrat`, `hasil_akhir`.`jarak` AS `jarak`, `hasil_akhir`.`id_sampel_item` AS `a`, (select group_concat(`sampel`.`nilai` separator ', ') from (`sampel` join `variabel` on(`sampel`.`id_variabel` = `variabel`.`id`)) where `sampel`.`id_sampel_item` = `a` and `variabel`.`id_status_variabel` = 2) AS `kategori` FROM `hasil_akhir` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_data_uji` (`id_testing`),
  ADD KEY `hasil_ibfk_1` (`id_sampel_item`),
  ADD KEY `id_variabel` (`id_variabel`);

--
-- Indexes for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sampel_item` (`id_sampel_item`);

--
-- Indexes for table `sampel`
--
ALTER TABLE `sampel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_variabel` (`id_variabel`),
  ADD KEY `id_sampel_item` (`id_sampel_item`);

--
-- Indexes for table `sampel_item`
--
ALTER TABLE `sampel_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_variabel`
--
ALTER TABLE `status_variabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_variabel` (`id_variabel`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status_variabel` (`id_status_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7563;

--
-- AUTO_INCREMENT for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915;

--
-- AUTO_INCREMENT for table `sampel`
--
ALTER TABLE `sampel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `sampel_item`
--
ALTER TABLE `sampel_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `status_variabel`
--
ALTER TABLE `status_variabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_sampel_item`) REFERENCES `sampel_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`id_testing`) REFERENCES `testing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_3` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD CONSTRAINT `hasil_akhir_ibfk_1` FOREIGN KEY (`id_sampel_item`) REFERENCES `sampel_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sampel`
--
ALTER TABLE `sampel`
  ADD CONSTRAINT `sampel_ibfk_1` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampel_ibfk_2` FOREIGN KEY (`id_sampel_item`) REFERENCES `sampel_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `testing_ibfk_1` FOREIGN KEY (`id_variabel`) REFERENCES `variabel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variabel`
--
ALTER TABLE `variabel`
  ADD CONSTRAINT `variabel_ibfk_1` FOREIGN KEY (`id_status_variabel`) REFERENCES `status_variabel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
