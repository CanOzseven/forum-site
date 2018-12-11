-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Mayıs 2012 saat 14:51:45
-- Sunucu sürümü: 5.5.8
-- PHP Sürümü: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `forum`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE IF NOT EXISTS `ayarlar` (
  `site_adi` varchar(300) NOT NULL,
  `site_url` varchar(300) NOT NULL,
  `site_aciklamasi` varchar(300) NOT NULL,
  `site_durum` int(11) NOT NULL,
  `site_tema` varchar(300) NOT NULL,
  `site_url_admin` varchar(300) NOT NULL,
  `site_uyeonay` int(11) NOT NULL,
  `site_katlimiti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_adi`, `site_url`, `site_aciklamasi`, `site_durum`, `site_tema`, `site_url_admin`, `site_uyeonay`, `site_katlimiti`) VALUES
('', 'http://localhost/forum', '', 1, 'v1', 'admin', 0, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(300) NOT NULL,
  `kategori_desc` varchar(300) NOT NULL,
  `kategori_key` varchar(300) NOT NULL,
  `kategori_tip` int(11) NOT NULL,
  `kategori_sira` int(11) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=17 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_desc`, `kategori_key`, `kategori_tip`, `kategori_sira`) VALUES
(1, 'Dersler', 'dersler', 'dersler', 0, 0),
(2, 'Css Dersleri', 'css', 'ders', 1, 0),
(3, 'Php Dersleri', 'php', 'php', 1, 3),
(4, 'jQuery Dersleri', 'jquery', 'jQuery', 1, 4),
(5, 'Diger', 'diger', 'diger', 0, 0),
(6, 'Maksat Muhabbet', 'muhabbet', 'muhabbet', 5, 1),
(7, 'Web siteleri', 'web site tanitim forumu', 'web', 5, 2),
(9, 'Spor Haberleri', 'Spor haberleri hakkinda hersey', '', 5, 0),
(10, 'Metem', 'Metem hakkinda hersey', '', 5, 6),
(11, 'Bilisim Teknolojileri', 'Bilisim hakkinda hersey', '', 0, 0),
(12, '12b', '12 bilisim', '', 11, 0),
(13, 'yazilim muhendislgi', 'yazilim muhendislgi', '', 11, 0),
(14, 'donanim', 'donanim', '', 11, 3),
(15, 'diger bolumler', 'diger bolumler', '', 0, 0),
(16, 'ogretmenlerimiz', 'ogretmenlerimiz hakkinda', '', 15, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

CREATE TABLE IF NOT EXISTS `konular` (
  `konu_id` int(11) NOT NULL AUTO_INCREMENT,
  `konu_baslik` varchar(300) NOT NULL,
  `konu_icerik` text NOT NULL,
  `konu_ekleyen` int(11) NOT NULL,
  `konu_tarih` varchar(300) NOT NULL,
  `konu_guncellenme` varchar(300) NOT NULL,
  `konu_tip` int(11) NOT NULL,
  `konu_kategori` int(11) NOT NULL,
  `konu_hit` int(11) NOT NULL,
  PRIMARY KEY (`konu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `konular`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_kadi` varchar(225) NOT NULL,
  `uye_sifre` varchar(225) NOT NULL,
  `uye_eposta` varchar(225) NOT NULL,
  `uye_imza` varchar(300) NOT NULL,
  `uye_adi` varchar(300) NOT NULL,
  `uye_soyadi` varchar(300) NOT NULL,
  `uye_sehir` varchar(300) NOT NULL,
  `uye_meslek` varchar(300) NOT NULL,
  `uye_rutbe` varchar(300) NOT NULL,
  `uye_onay` int(11) NOT NULL,
  `uye_tarih` varchar(300) NOT NULL,
  `uye_rut` int(11) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_kadi`, `uye_sifre`, `uye_eposta`, `uye_imza`, `uye_adi`, `uye_soyadi`, `uye_sehir`, `uye_meslek`, `uye_rutbe`, `uye_onay`, `uye_tarih`, `uye_rut`) VALUES
(4, 'admin', 'admin', 'sysrq.cs@w.cn', 'can ozseven', 'can', 'ozseven', 'adana', 'programci', 'Administator', 1, '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ekleyen` int(11) NOT NULL,
  `yorum_icerik` text NOT NULL,
  `yorum_tarih` varchar(300) NOT NULL,
  `yorum_konu_id` int(11) NOT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

--
-- Tablo döküm verisi `yorumlar`
--

