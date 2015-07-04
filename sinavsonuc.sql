-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Tem 2015, 22:58:00
-- Sunucu sürümü: 5.5.38-0ubuntu0.14.04.1
-- PHP Sürümü: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sinavsonuc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ayar` varchar(200) NOT NULL,
  `deger` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `ayar`, `deger`) VALUES
(2, 'footer', 'Developed by <b>AAslan</b> © 2015'),
(3, 'title', 'Diploma Sorgula');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diploma`
--

CREATE TABLE IF NOT EXISTS `diploma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tc` varchar(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `ana` varchar(20) NOT NULL,
  `baba` varchar(20) NOT NULL,
  `dyeri` varchar(20) NOT NULL,
  `dtarihi` varchar(20) NOT NULL,
  `oadi` varchar(100) NOT NULL,
  `omuduru` varchar(100) NOT NULL,
  `mtarih` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
