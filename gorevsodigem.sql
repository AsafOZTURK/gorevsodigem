-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Mar 2022, 13:07:08
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
-- Tablo için tablo yapısı `fikir`
--

CREATE TABLE `fikir` (
  `fikir_id` int(11) NOT NULL,
  `fikir_baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `fikir_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `fikir_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fikir_ekleyen` int(11) NOT NULL,
  `fikir_tur` enum('1','2','3','4','5','6','7','8','10') COLLATE utf8_turkish_ci NOT NULL,
  `fikir_rol` enum('1','2','3','4','5') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `fikir`
--

INSERT INTO `fikir` (`fikir_id`, `fikir_baslik`, `fikir_aciklama`, `fikir_tarih`, `fikir_ekleyen`, `fikir_tur`, `fikir_rol`) VALUES
(1, 'Fikir ekleme deneme 1', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur', '2022-02-24 23:43:09', 1, '1', '5'),
(2, 'Fikir ekleme deneme 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2022-02-24 23:43:56', 4, '3', '1'),
(3, 'Fikir ekleme deneme 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2022-02-24 23:44:17', 3, '5', '3'),
(4, 'Fikir ekleme deneme 4', 'BU DA SON DENEME OLSUN ', '2022-02-24 23:44:49', 2, '8', '4'),
(5, 'SON DENEME FİKİR EKLEMESİ', 'SON DENEME FİKİR EKLEMESİSON DENEME FİKİR EKLEMESİSON DENEME FİKİR EKLEMESİSON DENEME FİKİR EKLEMESİSON DENEME FİKİR EKLEMESİSON DENEME FİKİR EKLEMESİ', '2022-02-25 00:00:00', 1, '10', '5');

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
(1, 'Deneme görevi 1', 1, 2, '2022-02-23 23:18:06', '0000-00-00 00:00:00', '0', '3', '1'),
(2, 'Deneme görevi 2', 1, 1, '2022-02-23 23:18:45', '0000-00-00 00:00:00', '0', '5', '2'),
(3, 'Deneme görevi 3', 3, 1, '2022-02-23 23:38:17', '0000-00-00 00:00:00', '1', '4', '1'),
(4, 'Deneme görevi 4', 3, 1, '2022-02-23 23:38:29', '0000-00-00 00:00:00', '2', '1', '1'),
(5, 'Deneme görevi 5', 4, 3, '2022-02-24 10:18:52', '0000-00-00 00:00:00', '0', '2', '2');

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
-- Tablo için tablo yapısı `gunebaslabitir`
--

CREATE TABLE `gunebaslabitir` (
  `gunebaslabitir_id` int(11) NOT NULL,
  `gunebaslabitir_kisi` int(11) NOT NULL,
  `gunebaslabitir_metin` text COLLATE utf8_turkish_ci NOT NULL,
  `gunebaslabitir_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gunebaslabitir_durum` enum('basla','bitir') COLLATE utf8_turkish_ci DEFAULT 'bitir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gunebaslabitir`
--

INSERT INTO `gunebaslabitir` (`gunebaslabitir_id`, `gunebaslabitir_kisi`, `gunebaslabitir_metin`, `gunebaslabitir_zaman`, `gunebaslabitir_durum`) VALUES
(1, 1, 'güne başlama ilk denemesi 1', '2022-02-27 16:48:24', 'basla'),
(2, 1, 'günü bitirme ilk denemesi 1', '2022-02-27 17:02:54', 'bitir'),
(3, 1, 'GÜNE BAŞLAMA DENEME 2', '2022-02-27 17:40:04', 'basla'),
(4, 1, 'GÜNÜ BİTİRME DENEME 2', '2022-02-27 17:40:13', 'bitir'),
(5, 2, 'Güne başlama denemesi 3', '2022-02-27 17:43:06', 'basla'),
(6, 2, 'Güne bitirme denemesi 3', '2022-02-27 17:43:14', 'bitir'),
(7, 2, 'Güne bitirme denemesi 3', '2022-02-27 17:43:15', 'bitir'),
(8, 2, 'Güne başlama denemesi 4', '2022-02-27 17:43:46', 'basla'),
(9, 2, 'Günü bitirme denemesi 4', '2022-02-27 17:43:57', 'bitir'),
(10, 3, 'Güne başlama denemesi 5', '2022-02-27 17:44:46', 'basla'),
(11, 3, 'Günü bitirme denemesi 5', '2022-02-27 17:44:55', 'bitir'),
(12, 4, 'Güne başlama denemesi 6', '2022-02-27 17:45:15', 'basla'),
(13, 4, 'Günü bitirme denemesi 6', '2022-02-27 17:45:23', 'bitir'),
(14, 1, 'DENEME DENEME DENEME', '2022-02-27 18:29:29', 'basla'),
(15, 3, 'DENEME DENEME DENEME', '2022-02-27 18:31:35', 'basla'),
(16, 2, 'DENEME DENEME DENEME', '2022-02-27 18:31:50', 'basla'),
(17, 4, 'DENEME DENEME DENEME', '2022-02-27 18:32:23', 'basla'),
(18, 4, 'deneme deneme deneme', '2022-02-27 18:32:37', 'bitir');

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `olay`
--

CREATE TABLE `olay` (
  `olay_id` int(11) NOT NULL,
  `olay_olusturan` int(11) NOT NULL,
  `olay_metin` text COLLATE utf8_turkish_ci NOT NULL,
  `olay_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `olay`
--

INSERT INTO `olay` (`olay_id`, `olay_olusturan`, `olay_metin`, `olay_zaman`) VALUES
(0, 1, 'Manuel olay ekleme deneme 1', '2022-02-27 17:55:27'),
(0, 2, 'Manuel olay ekleme deneme  22222', '2022-02-27 17:55:43');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `fikir`
--
ALTER TABLE `fikir`
  ADD PRIMARY KEY (`fikir_id`),
  ADD KEY `fikir_ekleyen` (`fikir_ekleyen`);

--
-- Tablo için indeksler `gorev`
--
ALTER TABLE `gorev`
  ADD PRIMARY KEY (`gorev_id`),
  ADD KEY `gorev_veren` (`gorev_veren`),
  ADD KEY `gorev_gorevli` (`gorev_gorevli`);

--
-- Tablo için indeksler `gorevnotu`
--
ALTER TABLE `gorevnotu`
  ADD PRIMARY KEY (`gorevnotu_id`),
  ADD KEY `gorevnotu_gorev` (`gorevnotu_gorev`),
  ADD KEY `gorevnotu_ekleyen` (`gorevnotu_ekleyen`);

--
-- Tablo için indeksler `gunebaslabitir`
--
ALTER TABLE `gunebaslabitir`
  ADD PRIMARY KEY (`gunebaslabitir_id`),
  ADD KEY `gunebaslabitir_kisi` (`gunebaslabitir_kisi`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Tablo için indeksler `olay`
--
ALTER TABLE `olay`
  ADD KEY `olay_olusturan` (`olay_olusturan`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `fikir`
--
ALTER TABLE `fikir`
  MODIFY `fikir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Tablo için AUTO_INCREMENT değeri `gunebaslabitir`
--
ALTER TABLE `gunebaslabitir`
  MODIFY `gunebaslabitir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `fikir`
--
ALTER TABLE `fikir`
  ADD CONSTRAINT `fikir_ibfk_1` FOREIGN KEY (`fikir_ekleyen`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `gorev`
--
ALTER TABLE `gorev`
  ADD CONSTRAINT `gorev_ibfk_1` FOREIGN KEY (`gorev_veren`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `gorevnotu`
--
ALTER TABLE `gorevnotu`
  ADD CONSTRAINT `gorevnotu_ibfk_1` FOREIGN KEY (`gorevnotu_gorev`) REFERENCES `gorev` (`gorev_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gorevnotu_ibfk_2` FOREIGN KEY (`gorevnotu_ekleyen`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `gunebaslabitir`
--
ALTER TABLE `gunebaslabitir`
  ADD CONSTRAINT `gunebaslabitir_ibfk_1` FOREIGN KEY (`gunebaslabitir_kisi`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `olay`
--
ALTER TABLE `olay`
  ADD CONSTRAINT `olay_ibfk_1` FOREIGN KEY (`olay_olusturan`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
