-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Máj 05. 18:50
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `beadando`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abc` ()  NO SQL
(SELECT * FROM mysql.user WHERE 0)
UNION
(SELECT * FROM mysql.user WHERE 0)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1619540283);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `race`
--

CREATE TABLE `race` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `place` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL,
  `max_member` int(11) NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- A tábla adatainak kiíratása `race`
--

INSERT INTO `race` (`id`, `name`, `place`, `date`, `max_member`, `description`) VALUES
(1, 'teszt verseny', 'Sehol sincs utca sehány szám', '2021-04-28 18:50:00', 1000, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `race_member`
--

CREATE TABLE `race_member` (
  `id` int(11) NOT NULL,
  `race` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- A tábla adatainak kiíratása `race_member`
--

INSERT INTO `race_member` (`id`, `race`, `name`, `phone`, `age`) VALUES
(1, 1, 'adwawd', '+36201234567', 10),
(2, 1, 'teszt elemér', '+3620123456', 12);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_bin NOT NULL,
  `full_name` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_bin NOT NULL,
  `authKey` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `accessToken` varchar(256) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `username`, `authKey`, `accessToken`) VALUES
(1, 'asd@asd.hu', 'e54ee7e285fbb0275279143abc4c554e5314e7b417ecac83a5984a964facbaad68866a2841c3e83ddf125a2985566261c4014f9f960ec60253aebcda9513a9b4', 'Teszt Elemér', '', '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- A tábla indexei `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `race_member`
--
ALTER TABLE `race_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race` (`race`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `race`
--
ALTER TABLE `race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `race_member`
--
ALTER TABLE `race_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
