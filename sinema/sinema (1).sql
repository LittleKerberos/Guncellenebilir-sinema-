-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Haz 2022, 13:52:51
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sinema`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_github` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_pinterest` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_linkedin` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_renk` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_renk2` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_renk3` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_renk4` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_font` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_size` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_sticky` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_sticky2` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_github`, `ayar_pinterest`, `ayar_linkedin`, `ayar_google`, `ayar_renk`, `ayar_renk2`, `ayar_renk3`, `ayar_renk4`, `ayar_font`, `ayar_size`, `ayar_durum`, `ayar_sticky`, `ayar_sticky2`) VALUES
(1, 'image/oomb2.png', 'OOMBMaximum', 'https://www.youtube.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://www.github.com', 'https://www.youtube.com', 'https://www.linkedin.com', 'Google Plus', '#ff4d00', '#ffffff', '#ffffff', '#050000', 'Arial', '12px', '0', '#ff0000', '#ffffff');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE `filmler` (
  `film_id` int(11) NOT NULL,
  `film_ad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `film_resim` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `film_tür` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`film_id`, `film_ad`, `film_resim`, `film_tür`) VALUES
(1, 'The Matrix Resurrections', 'https://media.cinemaximum.com.tr/255//Files/POSTER/TR_MTRX4_VERT__NTL_MA_N_ALT_2764x4096.jpg', '<p>Matrix Resurrections, The Matrix serisinin d&ouml;rd&uuml;nc&uuml; filmidir. 22 Aralık 2021 tarihinde vizyona girmesi planlanan film, &ouml;nceki &uuml;&ccedil; filmi y&ouml;neten Wachowski kardeşlerden biri olan Lana Wachowski tarafından yazıldı ve y&'),
(2, 'Kesişme: İyi ki Varsın Eren', 'https://media.cinemaximum.com.tr/255//files/movie_posters/HO00004926_637753559781400275_kesisme-iyi-ki-varsin-eren.png', '<p>Kesişme: İyi ki Varsın Eren, 1 Ocak 2022 tarihinde vizyona giren, yapımcılığını TRT ve Dijital Sanatlar&#39;ın yaptığı, senaryosunu Mert Dikmen, Alper Uyar ve &Ouml;zer Feyzioğlu&#39;nun kaleme aldığı, y&ouml;netmenliğini &Ouml;zer Feyzioğlu&#39;nun &u'),
(3, 'Örümcek-Adam: Eve Dönüş Yok', 'https://media.cinemaximum.com.tr/255//Files/POSTER/SpiderManNoWayHome_Poster_Main_y.jpg', '<p>&Ouml;r&uuml;mcek-Adam: Eve D&ouml;n&uuml;ş Yok, Columbia Pictures ve Marvel Studios tarafından ortaklaşa &uuml;retilen ve Sony Pictures tarafından dağıtılan, Marvel Comics karakteri &Ouml;r&uuml;mcek Adam &ccedil;izgi romanlarından uyarlanan ABD s&uum'),
(4, 'Dayı: Bir Adamın Hikayesi', 'https://media.cinemaximum.com.tr/255//Files/POSTER/dayi.jpg', '<p>Dayı: Bir Adamın Hikayesi, 10 Aralık 2021 tarihinde vizyona giren, senaryosunu Uğur Bayraktar ve Serkan &Ouml;zt&uuml;rk&#39;&uuml;n kaleme aldığı, y&ouml;netmenliği Uğur Bayraktar&#39;ın yaptığı, Ufuk Bayraktar&#39;ın başrol&uuml;nde yer aldığı aksiyo'),
(6, 'Matrix', 'https://media.cinemaximum.com.tr/255//Files/POSTER/TR_MTRX4_VERT__NTL_MA_N_ALT_2764x4096.jpg', '<p>Matrix Resurrections, The Matrix serisinin d&ouml;rd&uuml;nc&uuml; filmidir. 22 Aralık 2021 tarihinde vizyona girmesi planlanan film, &ouml;nceki &uuml;&ccedil; filmi y&ouml;neten Wachowski kardeşlerden biri olan Lana Wachowski tarafından yazıldı ve y&');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_icerik` varchar(5000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda_sıra` int(100) NOT NULL,
  `hakkimizda_durum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_icerik`, `hakkimizda_sıra`, `hakkimizda_durum`) VALUES
(1, '<p><strong>OOMBCINEMA GROUP</strong></p>\r\n\r\n<p>OOMB Cinema Group; 2001 yılında teknoloji ve konforu, beklentilerin &uuml;zerinde hizmet anlayışı ile birleştirerek, T&uuml;rkiye&rsquo;de farklı ve kendine &ouml;zg&uuml; bir sinema deneyimi yaratma felsefesiyle kurulmuştur.</p>\r\n\r\n<p>Sunmuş olduğu hizmet ve teknolojik yenilikler ile 2013 yılında d&uuml;nyanın en b&uuml;y&uuml;k sinema birliği olan UNIC (International Union of Cinemas) tarafından &ldquo;Uluslararası Yılın Sinema Grubu&rdquo; &ouml;d&uuml;l&uuml;ne layık g&ouml;r&uuml;len OOMB Cinema Group, 36 şehirde 97 sinema işletmesi ve&nbsp;848 salon sayısı ile T&uuml;rkiye&rsquo;nin en b&uuml;y&uuml;k sinema zinciridir.</p>\r\n\r\n<p>Sinema teknolojilerindeki gelişmeleri her zaman yakından takip eden ve bu yenilikleri T&uuml;rk izleyicisi ile ilk &ouml;nce buluşturan OOMB , misafirlerinin sinema deneyimini en &uuml;st seviyeye &ccedil;ıkartmayı ama&ccedil;lamaktadır. Bu tutku ile OOMB , T&uuml;rkiye&rsquo;de dijital d&ouml;n&uuml;ş&uuml;m&uuml;n&uuml; tamamlayan, yani t&uuml;m g&ouml;r&uuml;nt&uuml; ve ses sistemlerini dijitalleştiren ilk sinema zinciri olmuştur.</p>\r\n\r\n<p>T&uuml;rkiye&rsquo;deki t&uuml;m IMAX salonlarını b&uuml;nyesinde bulunduran OOMB Cinema Group aynı zamanda Kasım 2015&rsquo;te 4DX teknolojisini de T&uuml;rk sinema izleyicisi ile buluşturup bu konuda da bir ilke imza atmıştır.</p>\r\n\r\n<p>OOMB Cinema Group, sinema işletmeciliği faaliyetlerine ek olarak b&uuml;nyesinde bulunan Mars Media ile sinema reklam sekt&ouml;r&uuml;nde, Mars Dağıtım ile de film dağıtım sekt&ouml;r&uuml;nde faaliyet g&ouml;stermektedir.</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(147, '2019-05-04 15:00:00', 'https://www.erpilic.com.tr/NDC/Admin/Images/adminlogo.png', '', '', 'oobm@hotmail.com', '', '12345678', 'OOMB ADMİN', '', '', '', '', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` varchar(2000) COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(11) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_renk` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_renk`) VALUES
(7, 'Anasayfa', '', '#home', 0, '1', '0'),
(8, 'Filmler', '', '#films', 1, '1', '0'),
(9, 'Hakkımızda', '', '#features', 2, '1', '0'),
(12, 'İletişim', '', '#contact', 3, '1', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_resim`, `slider_sira`, `slider_durum`) VALUES
(2, 'ogrenci.jpg', 1, 1),
(8, 'matrix.jpg', 2, 1),
(9, 'spider.jpg', 3, 1),
(17, 'ogrenci.jpg', 4, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `filmler`
--
ALTER TABLE `filmler`
  ADD PRIMARY KEY (`film_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `filmler`
--
ALTER TABLE `filmler`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
