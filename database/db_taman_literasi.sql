-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2021 at 02:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_taman_literasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ms_kategori`
--

CREATE TABLE `ms_kategori` (
  `id` int(2) NOT NULL,
  `kategori` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_kategori`
--

INSERT INTO `ms_kategori` (`id`, `kategori`) VALUES
(1, 'Article'),
(2, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `nama_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `upload_by` int(6) NOT NULL,
  `upload_at` date NOT NULL,
  `last_update` date DEFAULT NULL,
  `foto_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `id_kategori`, `nama_artikel`, `isi_artikel`, `upload_by`, `upload_at`, `last_update`, `foto_artikel`) VALUES
(1, 1, 'Tim Gabungan Kepung Lokasi Harimau Lepas Sinka Zoo yang Masih Berkeliaran', '<p><strong style=\"font-weight: bold; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Jakarta</strong><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">&nbsp;-&nbsp;</span></p><p style=\"margin-bottom: 16px; display: inline; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Satu dari dua harimau Sinka Zoo<a href=\"https://www.detik.com/tag/sinka-zoo\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(33, 64, 154); transition: all 0.3s ease-in-out 0s;\">&nbsp;</a>yang lepas dilumpuhkan petugas gabungan hingga mati. Satu lagi masih diburu. Petugas saat ini sudah mengepung sekitar lokasi lepasnya harimau tersebut.</p><p style=\"margin-top: 16px; margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Untuk saat ini tim gabungan dari BKSDA Kota Singkawang, Sintang, dan provinsi, Kodim 1202 Singkawang, dan Polres Singkawang telah berada di lokasi sekitar tempat lepasnya dua harimau tersebut sejak kemarin sore,\" kata Dandim 1202/Skw Letkol (Inf) Condro Edi Wibowo saat dihubungi, Sabtu (6/2/2021).</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Saat ini sedang melaksanakan penanganan dan pencarian,\" sambungnya.<span style=\"font-size: 1rem;\">Letkol Condro Edi Wibowo mengatakan tim gabungan ini terdiri atas Kodim 1202 Singkawang, Polres Singkawang, hingga pihak</span><span style=\"font-size: 1rem;\">&nbsp;</span><a href=\"https://www.detik.com/tag/bksda-kalbar\" style=\"background: rgb(255, 255, 255); font-size: 1rem; color: rgb(33, 64, 154); transition: all 0.3s ease-in-out 0s;\">BKSDA Kalbar</a><span style=\"font-size: 1rem;\">. Dia mengimbau warga, khususnya di sekitar lokasi, meningkatkan kewaspadaan tapi tetap tenang dan tidak panik.</span></p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Kepala BKSDA Kalimantan Barat Sadtata Noor Adirahmanta juga sudah melaporkan penanganan dua harimau Sinka Zoo yang lepas ini kepada Menteri LHK Siti Nurbaya pagi tadi.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Dalam mengatasi kejadian ini, BKSDA Kalimantan Barat telah melakukan berbagai upaya, antara lain berkoordinasi dengan berbagai pihak, antara lain pihak pengelolaan Sinka Zoo Singkawang, pemda Singkawang, kepolisian, dan TNI,\" ujarnya.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">BKSDA Kalbar juga telah menurunkan Tim Wildlife Rescue Unit, yang di dalamnya tergabung dokter hewan, baik dari BKSDA Kalbar, Dinas Pangan, Peternakan, dan Kesehatan Hewan, maupun dari Yayasan Penyelamatan Orangutan Sintang.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Saat ini tim gabungan bersama TNI-Polri dan pihak terkait dalam posisi&nbsp;<em>stand by</em>&nbsp;sambil mencari alternatif penanganan terbaik bagi keselamatan masyarakat sekitar dan kedua harimau di lokasi kejadian termasuk upaya-upaya penyelamatan serta mengantisipasi hal-hal yang tidak diinginkan,\" ujarnya.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Melalui media sosial, BKSDA Kalbar sudah memberikan imbauan kepada masyarakat sekitar untuk sementara tidak beraktivitas di luar rumah, selalu waspada dan berhati-hati, serta melaporkan jika ada informasi dan perkembangan terkait lepasnya dua harimau ini ke&nbsp;<em>call center</em>,\" sambungnya.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Informasi terakhir, satu dari dua harimau yang lepas sudah dilumpuhkan petugas dan dalam keadaan mati. Satu lagi masih diburu oleh petugas gabungan.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Ada dua harimau yang lepas. Satu yang berwarna cokelat sudah berhasil dilumpuhkan dalam keadaan mati. Masih satu lagi yang warna putih sedang dicari oleh tim gabungan. Kalau yang sudah mati ditemukan di sekitar kebun binatang,\" kata Kabid Humas Polda Kalbar Kombes Donny Charles Go saat dimintai konfirmasi, Sabtu (6/2).</p>', 1, '2021-02-06', '2021-02-07', '16073_Article_060221132815.jpg'),
(2, 1, 'Semarang Dikepung Banjir!', '<p><strong style=\"font-weight: bold; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Semarang</strong><span style=\"font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">&nbsp;-&nbsp;</span></p><p style=\"margin-bottom: 16px; display: inline; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Hujan deras sejak semalam menyebabkan&nbsp;<a href=\"https://www.detik.com/tag/banjir-di-semarang\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(33, 64, 154); transition: all 0.3s ease-in-out 0s;\">banjir di Semarang</a>, Jawa Tengah hari ini. Bandara Ahmad Yani dan Stasiun Tawang Semarang ditutup gegara&nbsp;<a href=\"https://www.detik.com/tag/banjir\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(33, 64, 154); transition: all 0.3s ease-in-out 0s;\">banjir</a>.</p><p style=\"margin-top: 16px; margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Menindaklanjuti NOTAM Nomor:B0179/21 NOTAMR B0177/21 perihal RWY 13/31 tutup, Bandara Internasional Jenderal Ahmad Yani tidak beroperasi sementara diperpanjang sampai dengan pukul 11.00 WIB dan hujan berhenti serta cuaca dalam keadaan baik,\" kata Stakeholder Relation Manager Bandara Ahmad Yani, Heri Trisno Wibowo, lewat pesan singkat kepada wartawan, Sabtu (6/2/2021).</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Sebelumnya Trisno menjelaskan penutupan operasional Bandara Ahmad Yani Semarang disebabkan genangan air di sekitar runway dan cuaca buruk. Heri menjelaskan petugas telah membersihkan area bandara termasuk terminal hingga saat ini.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Hingga siang tadi tercatat ada delapan penerbangan yang terdampak. Tujuh di antaranya delay dan satu penerbangan dialihkan ke Surabaya.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Berikut ini daftar penerbangan terdampak hingga siang tadi:</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">1. Garuda Indonesia GA 232 Jakarta-Semarang (Dialihkan ke Surabaya)<br>2. Batik Air ID 6362 Jakarta-Semarang (Delay)<br>3. Batik Air ID 6350 Jakarta-Semarang (Delay)<br>4. Nam Air IN 195 JPangkalan Bun-Semarang (Delay)<br>5. Wings Air IW 1806 Semarang-Pangkalan Bun (Delay)<br>6. Garuda Indonesia GA 235 Semarang-Jakarta (Delay)<br>7. Batik Air ID 7369 Semarang-Jakarta (Delay)<br>8. Nam Air IN 196 Semarang-Pangkalan Bun (Delay)</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Tak hanya bandara, banjir juga merendam Stasiun Tawang Semarang. Akibatnya sejumlah perjalanan kereta api (KA) di Semarang, Jawa Tengah, terganggu akibat banjir.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Curah hujan sejak kemarin malam tak kunjung reda dan mengakibatkan Stasiun Tawang, Poncol dan Jalur KA lintas Utara sebagian terendam air,\" kata Humas PT KAI Daop IV Semarang, Krisbiantoro dalam keterangan tertulisnya, siang tadi.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Ia menjelaskan Stasiun Tawang Semarang seluruhnya terendam banjir. Banjir juga merendam jalan raya di depan stasiun. Kedalaman air di hall Stasiun Tawang mencapai 70 cm, mengakibatkan fasilitas penumpang juga mengalami gangguan.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">\"Kami PT KAI Daop 4 Semarang mohon maaf yang sebesar-besarnya atas terganggunya sejumlah perjalanan KA di wilayah Daop 4 Semarang,\" pungkasnya.</p><p style=\"margin-bottom: 16px; font-family: Helvetica, Helvetica-FF, Arial, Tahoma, sans-serif;\">Sedangkan laporan pada pagi tadi,&nbsp;<a href=\"https://www.detik.com/tag/banjir-di-semarang\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(33, 64, 154); transition: all 0.3s ease-in-out 0s;\">banjir di Semarang</a>&nbsp;juga merendam jalur Pantura. Jalur Pantura di daerah Mangkang terendam banjir hingga hingga lutut orang dewasa pada tadi pagi. Sehingga hanya kendaraan besar seperti truk yang berani melintas.</p>', 1, '2021-02-06', NULL, '12238_Article_060221141407.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_episode`
--

CREATE TABLE `tb_episode` (
  `ide` int(11) NOT NULL,
  `id_novel` int(11) NOT NULL,
  `judul_episode` text NOT NULL,
  `isi_episode` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_episode`
--

INSERT INTO `tb_episode` (`ide`, `id_novel`, `judul_episode`, `isi_episode`, `tanggal`, `episode`) VALUES
(1, 1, 'Ini Episode 1', '<p>Suatu Hari.............................................................</p><p>nunggu ya, kan nggak ada isinya ini awkwkwk</p><p>orang cuma ngetest :v</p>', '2021-02-12 20:30:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum`
--

CREATE TABLE `tb_forum` (
  `idi` int(11) NOT NULL,
  `id_user` int(6) NOT NULL,
  `chat` text NOT NULL,
  `chat_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_forum`
--

INSERT INTO `tb_forum` (`idi`, `id_user`, `chat`, `chat_time`) VALUES
(1, 1, 'Halo', '2021-02-11 21:45:23'),
(2, 2, 'haloo', '2021-02-11 21:45:23'),
(3, 2, 'haloo', '2021-02-11 21:45:24'),
(4, 2, 'tes', '2021-02-11 21:45:53'),
(5, 1, 'Hai Juga', '2021-02-11 22:16:57'),
(6, 2, 'halo halo halo halo bandung ibukota periangan sudah lama tak berjumpa dengan kau', '2021-02-11 22:17:40'),
(7, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam quisquam consequatur vel modi illo saepe, cupiditate explicabo nostrum incidunt, ex itaque dicta enim recusandae consequuntur officia? Voluptatibus harum fugit commodi!', '2021-01-11 22:17:40'),
(8, 2, 'sekarang telah menjadi lautan api mari bung rebut kembali', '2021-01-11 22:25:41'),
(9, 1, 'Halo', '2021-02-11 22:28:03'),
(10, 2, 'haloo', '2021-02-11 22:28:14'),
(11, 2, 'tes tes', '2021-02-11 22:30:49'),
(12, 2, 'halo halo bandung', '2021-02-11 22:32:36'),
(13, 2, 'ibukota periangan', '2021-02-11 22:34:03'),
(14, 1, 'Halo', '2021-02-11 22:35:10'),
(15, 1, 'Halo', '2021-02-11 22:42:30'),
(16, 2, 'holaa', '2021-02-11 22:42:41'),
(17, 1, 'Halo Juga', '2021-02-11 22:43:09'),
(18, 1, 'Tes', '2021-02-11 22:43:36'),
(19, 1, 'Halo', '2021-02-11 22:43:59'),
(20, 2, 'holaaa', '2021-02-11 22:44:12'),
(21, 1, 'Halo', '2021-02-11 23:02:22'),
(22, 2, 'tes', '2021-02-11 23:08:37'),
(23, 1, 'Halo', '2021-02-11 23:10:48'),
(24, 1, 'Testing', '2021-02-12 21:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_detail` int(6) NOT NULL,
  `isi_chat` text NOT NULL,
  `id_user` int(6) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `id_kategori`, `id_detail`, `isi_chat`, `id_user`, `tanggal`) VALUES
(1, 1, 2, 'Bagus Sih', 1, '2021-02-11 19:41:18'),
(2, 1, 2, 'halo', 2, '2021-02-11 20:13:11'),
(3, 1, 2, 'Hallo juga', 1, '2021-02-11 20:16:05'),
(4, 1, 2, 'wah di bales dong', 2, '2021-02-11 20:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_novel`
--

CREATE TABLE `tb_novel` (
  `id` int(6) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `nama_novel` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `author` int(6) NOT NULL,
  `published_at` date NOT NULL,
  `last_update` date DEFAULT NULL,
  `foto_novel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_novel`
--

INSERT INTO `tb_novel` (`id`, `id_kategori`, `nama_novel`, `sinopsis`, `author`, `published_at`, `last_update`, `foto_novel`) VALUES
(1, 2, 'Test Judul', '<p>ini Synopsis lo entah tapi isinya apaan</p>', 1, '2021-02-12', NULL, '909_Novel_120221093127.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `g_id` varchar(225) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `g_id`, `img`) VALUES
(1, 'Muhammad Andika Dayu', 'dikapolk@gmail.com', '106994141781989695650', 'https://lh3.googleusercontent.com/a-/AOh14Ghn4u3pot0gQtshP31WREfkpGpdYm4rf6mEmL0peg=s96-c'),
(2, 'rangers blue', 'rangersblue86@gmail.com', '117986653446735370153', 'https://lh3.googleusercontent.com/-4lqxCqWPQAU/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnNrl22o_KOwgHdfIrGBbA0NxenJQ/s96-c/photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_episode`
--
ALTER TABLE `tb_episode`
  ADD PRIMARY KEY (`ide`);

--
-- Indexes for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`idi`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_novel`
--
ALTER TABLE `tb_novel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_episode`
--
ALTER TABLE `tb_episode`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `idi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_novel`
--
ALTER TABLE `tb_novel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
