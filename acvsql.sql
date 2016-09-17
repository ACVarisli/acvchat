-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Haz 2016, 21:11:09
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `acvsql`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeayar`
--

CREATE TABLE IF NOT EXISTS `uyeayar` (
  `uyeadi` varchar(255) NOT NULL,
  `buttonreq` int(11) NOT NULL,
  `showeditor` int(11) NOT NULL,
  `showdate` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `uyeayar`
--

INSERT INTO `uyeayar` (`uyeadi`, `buttonreq`, `showeditor`, `showdate`, `id`) VALUES
('ACV', 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeadi` varchar(225) NOT NULL,
  `uyesifre` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `admin` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  `ipadress` int(225) NOT NULL,
  `sonetkinlik` int(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `uyeadi`, `uyesifre`, `email`, `admin`, `ban`, `ipadress`, `sonetkinlik`) VALUES
(1, 'ACV', '6266932', 'acvprod2014@outlook.com', 1, 0, 0, 1467212549),
(4, 'Miko007', '123456', 'qwdw', 0, 0, 0, 1467212222),
(6, 'HazretiYasuo123', '123456', 'dwqldw', 0, 0, 0, 1466331509),
(7, 'TestUser', '123456', 'qwdwqdw', 0, 0, 0, 1466331513),
(8, 'DahaDahaTestUse', '123456', 'wqd', 0, 0, 0, 1466331588),
(9, 'Delaredo', '123456', 'qwdwq', 0, 0, 0, 1466331507),
(10, 'Allame', '123456', 'wqdwq', 0, 0, 0, 1466331507),
(11, 'LastUser', '123456', 'dwqdwq', 0, 1, 0, 1466331506);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
