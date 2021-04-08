-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2021 г., 13:46
-- Версия сервера: 5.7.24
-- Версия PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_address`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `house_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apartment_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `user_id`, `postcode`, `country`, `city`, `street`, `house_number`, `apartment_number`) VALUES
(1, 'Unicorn', 5557, 'Ukraine', 'Zhytomir', 'World', '73', '7'),
(2, 'Unicorn', 12, 'Румыния', 'Pilcy', 'Power', '45', '14'),
(3, 'Iriska', 7775843, 'Canada', 'Vancouver', 'Kakayato', '106b', 'c==3'),
(4, 'Admiral', 5568412, 'USA', 'Denver', 'Roud', '85', '39');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1617623621),
('m130524_201442_init', 1617623624),
('m190124_110200_add_verification_token_column_to_user_table', 1617623625);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `sex`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Unicorn', 'Apach', 'Axe', 1, 'mWylIj5ZQ9cNu_iwq5nsAqqYVC_nZWiA', '$2y$13$U49r.0fN1ru4XfP../2sNeW.9NJRk5Vz3n6MxUrgrE8h7vbWRUp7y', NULL, 'Unicorn@gmail.com', 10, 1617888167, 1617888607, 'rNwoX8il3IKhHTCNUDv23O9LR_UoI9Jp_1617888167'),
(2, 'Iriska', 'Nastya', 'Zhelud', 2, 'Xh0WK_xVx--0VhYsDwMt7UspSwV8Fmhp', '$2y$13$emyodc.zNodOSV8K4u9oPuH72RGh1wgV84c2XTg7jdxgBbgidxj7.', NULL, 'Iriska@gmail.com', 10, 1617888815, 1617888815, 'BsqPkZWvlmqxg8i5jclFt2jP5YznV8yQ_1617888815'),
(3, 'Admiral', 'Tom', 'Cat', 1, '9CoEOeEVn2LqzBc130G8bG08mfVvT2CL', '$2y$13$5RE1sesMbQFhhYYjcemtgue2hXRakH93N4ECx8cLcwVGXRCl2X2ua', NULL, 'Admiral@gmail.com', 10, 1617888981, 1617888981, 'XYN8sj-gXAm7b9ywtqOPqNfgXjYhgAOY_1617888981');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
