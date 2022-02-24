-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Şub 2022, 12:11:48
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gorevsodigem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorev`
--

CREATE TABLE `gorev` (
  `gorev_id` int(11) NOT NULL,
  `gorev_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `gorev_veren` int(11) NOT NULL,
  `gorev_gorevli` int(11) NOT NULL,
  `gorev_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gorev_bitistarih` datetime NOT NULL,
  `gorev_durum` set('0','1','2') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `gorev_boyut` enum('1','2','3','4','5') COLLATE utf8_turkish_ci NOT NULL,
  `gorev_gizlilik` enum('1','2') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gorev`
--

INSERT INTO `gorev` (`gorev_id`, `gorev_detay`, `gorev_veren`, `gorev_gorevli`, `gorev_tarih`, `gorev_bitistarih`, `gorev_durum`, `gorev_boyut`, `gorev_gizlilik`) VALUES
(1, 'Deneme görevi 1', 1, 2, '2022-02-23 23:18:06', '0000-00-00 00:00:00', '1', '3', '1'),
(2, 'Deneme görevi 2', 1, 1, '2022-02-23 23:18:45', '0000-00-00 00:00:00', '2', '5', '2'),
(3, 'Deneme görevi 3', 3, 1, '2022-02-23 23:38:17', '0000-00-00 00:00:00', '1', '4', '1'),
(4, 'Deneme görevi 4', 3, 1, '2022-02-23 23:38:29', '0000-00-00 00:00:00', '0', '1', '1'),
(5, 'Deneme görevi 5', 4, 3, '2022-02-24 10:18:52', '0000-00-00 00:00:00', '0', '2', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorevnotu`
--

CREATE TABLE `gorevnotu` (
  `gorevnotu_id` int(11) NOT NULL,
  `gorevnotu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `gorevnotu_gorev` int(11) NOT NULL,
  `gorevnotu_ekleyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gorevnotu`
--

INSERT INTO `gorevnotu` (`gorevnotu_id`, `gorevnotu_detay`, `gorevnotu_gorev`, `gorevnotu_ekleyen`) VALUES
(2, 'Görev notu ekleme deneme 1', 5, 1),
(3, 'Görev notu ekleme deneme 2', 5, 2),
(4, 'Görev notu ekleme deneme 3', 2, 2),
(5, 'Görev notu ekleme deneme 4', 1, 2),
(6, 'Görev notu ekleme deneme 5', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_parola` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_parola`) VALUES
(1, 'Mehmet Asaf', 'ÖZTÜRK', 'mehmetasafozturk@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Lal ', 'Okyar', 'lalokyar@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Aslı', 'Orhan', 'asliorhan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(4, 'Alper', 'Bıçaklar', 'alperbicaklar@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gorev`
--
ALTER TABLE `gorev`
  ADD PRIMARY KEY (`gorev_id`);

--
-- Tablo için indeksler `gorevnotu`
--
ALTER TABLE `gorevnotu`
  ADD PRIMARY KEY (`gorevnotu_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gorev`
--
ALTER TABLE `gorev`
  MODIFY `gorev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `gorevnotu`
--
ALTER TABLE `gorevnotu`
  MODIFY `gorevnotu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
