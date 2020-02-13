-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Feb 13. 12:00
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `turrsite`
--
CREATE DATABASE IF NOT EXISTS `turrsite` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `turrsite`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `commentdate` datetime NOT NULL,
  `comment` text COLLATE utf8_hungarian_ci NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`ID`, `userID`, `commentdate`, `comment`, `postID`) VALUES
(1, 12, '2020-01-20 00:00:00', 'teszt ', 0),
(2, 19, '2020-01-20 00:00:00', 'HELP', 0),
(3, 20, '2020-01-20 00:00:00', 'Eredmenyek.com', 0),
(4, 20, '2020-01-20 00:00:00', 'mento', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `whoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `eventdate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `event` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `filedate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `file` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `groupname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `groupdate` datetime NOT NULL,
  `ownerID` int(11) NOT NULL,
  `userID` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `groups`
--

INSERT INTO `groups` (`ID`, `groupname`, `groupdate`, `ownerID`, `userID`) VALUES
(1, 'teszt1', '2020-01-20 00:00:00', 10, '11;10;15;'),
(2, 'tesztkettedik', '2020-01-20 00:00:00', 12, '12;11;20;'),
(3, 'java', '2020-01-20 00:00:00', 14, '20;11;16;18;17;10;');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `interest`
--

CREATE TABLE `interest` (
  `ID` int(11) NOT NULL,
  `interestname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `interest`
--

INSERT INTO `interest` (`ID`, `interestname`) VALUES
(1, 'zene'),
(2, 'foci'),
(3, 'tanc'),
(4, 'kosarlabda'),
(5, 'tenisz'),
(6, 'uszas'),
(7, 'pingpong'),
(8, 'biciklizes'),
(9, 'golf'),
(10, 'horgaszat'),
(11, 'roplabda'),
(12, 'floorball'),
(13, 'bowling'),
(14, 'amerikai foci'),
(15, 'snowboard'),
(16, 'kuzdosportok'),
(17, 'lovaglas'),
(18, 'ijaszat'),
(19, 'darts'),
(20, 'esport'),
(21, 'egyeb');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `mesdate` datetime NOT NULL,
  `IDmessages` int(11) NOT NULL,
  `sendtoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `omnumbers`
--

CREATE TABLE `omnumbers` (
  `ID` int(11) NOT NULL,
  `om` varchar(11) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `omnumbers`
--

INSERT INTO `omnumbers` (`ID`, `om`) VALUES
(5, '00000000001'),
(6, '00000000002'),
(7, '00000000003'),
(8, '00000000004'),
(9, '00000000005'),
(10, '00000000006'),
(11, '00000000007'),
(12, '00000000008'),
(13, '00000000009'),
(14, '00000000010'),
(15, '00000000011');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `polls`
--

CREATE TABLE `polls` (
  `ID` int(11) NOT NULL,
  `pollsstarter` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `date` datetime NOT NULL,
  `userID` text COLLATE utf8_hungarian_ci NOT NULL,
  `votesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postdate` datetime NOT NULL,
  `post` text COLLATE utf8_hungarian_ci NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`ID`, `userID`, `postdate`, `post`, `groupID`) VALUES
(1, 10, '2020-01-20 00:00:00', 'Posta ', 0),
(2, 11, '2020-01-20 00:00:00', 'második post', 0),
(3, 13, '2020-01-20 00:00:00', '3.post', 0),
(4, 16, '2020-01-20 12:59:59', 'A pontosság a fő ', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `reg` datetime NOT NULL,
  `last` datetime NOT NULL,
  `avatar` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `omID` int(11) NOT NULL,
  `gender` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`ID`, `fullname`, `email`, `password`, `reg`, `last`, `avatar`, `status`, `omID`, `gender`) VALUES
(10, 'teszt1', 'teszt1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-15 00:00:00', '2020-02-13 11:39:47', '', 0, 1, 'ferfi'),
(12, 'teszt2', 'teszt2@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-15 00:00:00', '2020-01-15 00:00:00', '', 1, 2, 'no'),
(13, 'teszt3', 'teszt3@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-15 00:00:00', '2020-01-15 00:00:00', '', 1, 3, 'no'),
(14, 'teszt4', 'teszt4@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-15 00:00:00', '2020-01-15 00:00:00', '', 1, 0, 'ferfi'),
(15, 'teszt5', 'teszt5@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'ferfi'),
(16, 'teszt6', 'teszt6@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'no'),
(17, 'teszt7', 'teszt7@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'no'),
(18, 'teszt8', 'teszt8@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'no'),
(19, 'teszt9', 'teszt9@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'ferfi'),
(20, 'teszt10', 'teszt10@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'ferfi'),
(21, 'teszt11', 'teszt11@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2020-01-16 00:00:00', '2020-01-16 00:00:00', '', 0, 0, 'ferfi');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `votes`
--

CREATE TABLE `votes` (
  `ID` int(11) NOT NULL,
  `content` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- A tábla indexei `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `whoID` (`whoID`),
  ADD KEY `userID` (`userID`);

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- A tábla indexei `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- A tábla indexei `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ownerID` (`ownerID`);

--
-- A tábla indexei `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `IDmessages` (`IDmessages`),
  ADD KEY `sendtoID` (`sendtoID`);

--
-- A tábla indexei `omnumbers`
--
ALTER TABLE `omnumbers`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`(255)),
  ADD KEY `votesID` (`votesID`);

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `groupID` (`groupID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `omID` (`omID`);

--
-- A tábla indexei `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `interest`
--
ALTER TABLE `interest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `omnumbers`
--
ALTER TABLE `omnumbers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `polls`
--
ALTER TABLE `polls`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `votes`
--
ALTER TABLE `votes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`whoID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sendtoID`) REFERENCES `users` (`ID`);

--
-- Megkötések a táblához `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `polls` (`votesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
