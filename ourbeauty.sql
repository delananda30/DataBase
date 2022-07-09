-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220707.a5d60f5698
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 04:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `foto_produk` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_pembeli`, `id_produk`, `judul`, `tanggal`, `foto_produk`, `isi`) VALUES
(1, 4, 52, 'REKOMENDASI WHITE SECRET SERIES, SKIN CARE NATURAL UNTUK MENCERAHKAN WAJAH', '2022-07-08', 'https://images.soco.id/292-Wardah-White-Secret-Cover-Beauty-Journal.jpg.jpg', 'Memiliki wajah yang cerah berseri sepertinya menjadi dambaan banyak wanita. Namun, lebih penting lagi jika kulit wajah sehat ternutrisi hingga lapisan yang lebih dalam sehingga bukan hanya cerah, namun lembab dan bercahaya. Kabar baiknya adalah tidak perlu perawatan hingga ke negeri seberang untuk bisa mempunyai kualitas kulit yang diinginkan karena hanya dengan skin care natural saja sebenarnya kulitmu bisa menjadi lebih cantik dan terawat, kok ladies. Kuncinya adalah menemukan skin care natural untuk mencerahkan wajah dengan kandungan bahan alami yang sudah terbukti aman digunakan untuk jangka panjang. Di samping itu, rutinitas pemakaian juga pastinya akan memengaruhi hasil penggunaan skin care natural terbaik yang dipilih sehingga alangkah baiknya jika kamu disiplin dalam mengaplikasikan beberapa produk rekomendasi skin care natural Wardah berikut ini.');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `username`, `password`) VALUES
(4, 'dela', 'dela123'),
(18, 'delas', 'delas');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `alamat_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `id_produk`, `alamat_produk`) VALUES
(51, 1, 'https://shopee.co.id/eminaofficial'),
(52, 1, 'https://shopee.co.id/wardahofficial'),
(53, 1, 'https://shopee.co.id/avoskinofficial');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `foto_produk`, `deskripsi`) VALUES
(51, 'emina', '0055a.webp', 'bright stuff'),
(52, 'Wardah', '0000b.webp', 'hydra rose'),
(53, 'avoskin', '0042c.webp', 'serum'),
(54, 'scarlett', '1011f.webp', 'serum'),
(55, 'lacoco', '1026k.jpg', 'mask'),
(56, 'somethinc', '1055l.webp', 'serum'),
(57, 'garnier', '1050l.jpg', 'cleansing water'),
(58, 'ponds', '1021m.jpg', 'serum'),
(59, 'citra', '1029m.webp', 'facial foam'),
(60, 'nivea', '1037n.jpg', 'deodorant');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `email`, `password`) VALUES
('dela', 'dela@gmail.com', 'dela123'),
('elisa', 'elisa@gmail.com', 'elisa123'),
('delaananda', 'delaananda@gmail.com', 'dela123'),
('delaanandas', 'delaanandas@gmail.com', 'delaanandas'),
('delaas', 'delaas@gmail.com', 'delaas'),
('delaanandasetyarini', 'delaanandasetyarini@gmail.com', 'delaanandasetyarini'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas'),
('delaas', 'delaas@gmail.com', 'delaas'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas'),
('delas', 'delas@gmail.com', 'delas');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `rating` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_produk`, `id_pembeli`, `rating`, `deskripsi`) VALUES
(106, 53, 4, 5, 'bagus banget'),
(107, 51, 4, 5, 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE `shopping` (
  `id_shopping` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `foto_produk` varchar(1000) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `link_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id_shopping`, `id_produk`, `foto_produk`, `harga_produk`, `deskripsi`, `link_produk`) VALUES
(51, 1, 'https://api.watsons.co.id/medias/zoom-front-15982.jpg?context=bWFzdGVyfGZyb250L3pvb218NDczNzN8aW1hZ2UvanBlZ3xmcm9udC96b29tL2gxMi9oY2QvOTA2Mjk4ODg3Mzc1OC5qcGd8NzE0ZDc5NDc0ZDdmZGMwZjE4OWNhNzYxZTIxMzRjNWE1YWU0MTg0NGE1MDM5OWM0OTI5MmRlZTZkNzgyNzhkZQ', 16000, 'Emina Bright Stuff Face Wash - Pembersih Wajah Foam Mencerahkan', 'https://shopee.co.id/Emina-Bright-Stuff-Face-Wash-Pembersih-Wajah-Foam-Mencerahkan-i.63983008.2202837872?sp_atk=745b4a59-a27d-42b7-a0c1-8780befcde59&xptdk=745b4a59-a27d-42b7-a0c1-8780befcde59'),
(52, 1, 'https://image.femaledaily.com/dyn/640/images/prod-pics/product_1610523403_white_secr_800x800.jpg', 40000, 'Wardah White Secret Night Cream', 'https://shopee.co.id/Wardah-White-Secret-Night-Cream-i.30736001.2792871008?sp_atk=59f4a9fe-c36e-43e6-aeae-000f5d76ca5c&xptdk=59f4a9fe-c36e-43e6-aeae-000f5d76ca5c'),
(58, 1, 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//82/MTA-4210326/pond-s_smg-jog-solo_-_pond-s_white_beauty_lightening_facial_foam_-50_g-_full03.jpg', 17000, 'Ponds Bright Beauty Facial Foam', 'https://shopee.co.id/Ponds-Bright-Beauty-Facial-Foam-i.119147007.5832446849?sp_atk=7b5b0cd3-5ea2-4976-9203-5aef375d6e83&xptdk=7b5b0cd3-5ea2-4976-9203-5aef375d6e83');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id_video` int(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `link_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id_video`, `id_produk`, `link_video`) VALUES
(51, 1, 'https://www.youtube.com/watch?v=6EhnYMlvZGg'),
(52, 1, 'https://www.youtube.com/watch?v=T54pAo4MYXw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `review_ibfk_1` (`id_pembeli`),
  ADD KEY `review_ibfk_2` (`id_produk`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id_shopping`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id_shopping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `berita_ibfk_4` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Constraints for table `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `shopping_ibfk_1` FOREIGN KEY (`id_shopping`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



