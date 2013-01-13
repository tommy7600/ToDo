-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Sty 2013, 16:01
-- Wersja serwera: 5.5.24-0ubuntu0.12.04.1
-- Wersja PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_content_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `scope` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `note_content_id` (`note_content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Zrzut danych tabeli `notes`
--

INSERT INTO `notes` (`id`, `note_content_id`, `name`, `status_id`, `parent_id`, `lft`, `rgt`, `lvl`, `scope`) VALUES
(39, 1, 'root', 1, NULL, 0, 25, 1, 0),
(40, 1, 'test1', 1, 39, 1, 2, 2, 0),
(41, 1, 'test2', 1, 39, 3, 10, 2, 0),
(42, 1, 'test3', 1, 39, 11, 12, 2, 0),
(43, 1, 'kamil', 1, 39, 13, 20, 2, 0),
(44, 1, 'kamil2', 1, 39, 21, 22, 2, 0),
(45, 1, 'kamilA', 1, 43, 14, 15, 3, 0),
(46, 1, 'kamilB', 1, 43, 16, 19, 3, 0),
(47, 1, 'kamilC', 1, 46, 17, 18, 4, 0),
(48, 1, 'note', 1, 41, 4, 7, 3, 0),
(49, 1, 'rootNote', 1, 39, 23, 24, 2, 0),
(50, 1, 'note111', 1, 48, 5, 6, 4, 0),
(51, 1, 'test', 1, 41, 8, 9, 3, 0),
(52, 1, 'Hello', NULL, NULL, 1, 2, 1, 1),
(53, 1, 'Hello', NULL, NULL, 1, 2, 1, 2),
(54, 1, 'Hello', NULL, NULL, 1, 4, 1, 3),
(55, 1, 'dsfgdasgfsd', 1, 54, 2, 3, 2, 3),
(56, 1, 'Hello', NULL, NULL, 1, 2, 1, 4),
(57, 1, 'Hello', NULL, NULL, 1, 2, 1, 5),
(58, 1, 'Hello', NULL, NULL, 1, 28, 1, 6),
(59, 1, 'zxczvzxcbv', 1, 58, 2, 5, 2, 6),
(60, 1, 'dafhdgfsh', 1, 58, 6, 13, 2, 6),
(61, 1, 'cdvfhdfasghdaesyh', 1, 60, 7, 10, 3, 6),
(62, 1, 'agfdfag', 1, 59, 3, 4, 3, 6),
(63, 1, 'asgafdhgdsfh', 1, 61, 8, 9, 4, 6),
(64, 4, 'Kamil', 1, 58, 14, 15, 2, 6),
(65, 5, 'Tomek', 2, 60, 11, 12, 3, 6),
(66, 6, 'aaa', 2, 58, 16, 17, 2, 6),
(68, 0, 'Kamil', 1, NULL, 1, 2, 1, 7),
(69, 0, 'Kamil', 1, NULL, 1, 2, 1, 8),
(70, 0, 'Kamil', 1, NULL, 1, 2, 1, 9),
(71, 0, 'Kamil', 1, NULL, 1, 2, 1, 10),
(72, 0, 'Kamil', 1, NULL, 1, 2, 1, 11),
(73, 0, 'Kamil', 1, NULL, 1, 2, 1, 12),
(74, 0, 'Kamil', 1, NULL, 1, 2, 1, 13),
(75, 0, 'Kamil', 1, NULL, 1, 2, 1, 14),
(76, 0, 'Kamil', 1, NULL, 1, 2, 1, 15),
(77, 17, 'adfhdfaghdfag', 3, 58, 18, 19, 2, 6),
(78, 18, 'CXVSxczbvXZCCbv', 2, 58, 20, 21, 2, 6),
(79, 0, 'Hello', NULL, NULL, 1, 2, 1, 16),
(80, 0, 'Hello', NULL, NULL, 1, 8, 1, 17),
(81, 19, 'adfasdgasg', 1, 80, 2, 3, 2, 17),
(82, 20, 'asdfasdfasdgfhtwq12422135', 1, 80, 4, 5, 2, 17),
(83, 21, 'Nie masz dostepu', 1, 80, 6, 7, 2, 17),
(84, 22, 'TEST', 1, 58, 22, 25, 2, 6),
(85, 23, 'PHP', 2, 84, 23, 24, 3, 6),
(86, 24, 'tttew', 1, 58, 26, 27, 2, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_contents`
--

DROP TABLE IF EXISTS `note_contents`;
CREATE TABLE IF NOT EXISTS `note_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2000) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_planned_ended` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `note_contents`
--

INSERT INTO `note_contents` (`id`, `content`, `date_created`, `date_start`, `date_planned_ended`, `date_ended`) VALUES
(1, 'content1', '2009-12-20', '2009-12-20', '2009-12-25', '2009-12-30'),
(2, 'content2', '2010-12-20', '2010-12-20', '2010-12-25', '2010-12-30'),
(3, 'content3', '2011-12-20', '2011-12-20', '2011-12-25', '2011-12-30'),
(4, 'aqeghdaefghzad', '2013-01-11', '2013-01-11', '2013-01-30', '2013-01-11'),
(5, 'sdaghdshdvsh', '2013-01-11', '2013-01-12', '2013-01-25', NULL),
(6, 'asgdfahdfahdfa', '2013-01-11', '2013-01-21', '2013-01-24', NULL),
(17, 'asdgfdfasgdfasgas', '2013-01-11', '2013-01-30', '2013-01-31', NULL),
(18, 'ZXVZXVXCZV', '2013-01-11', '2013-01-18', '2013-01-24', NULL),
(19, '<b>DFGADSGADFSG SFBGADSFG<sup>FFDSFASDFbadbasdva</sup></b>', '2013-01-11', '2013-01-30', '2013-01-30', '2013-01-11'),
(20, '<span style="font-weight: normal; font-style: normal;">asdgasgas </span><i>asdgfasgadg<u>asdfasdfasf<b>adsfsadgfadsgadsdg<sup>asdgfweatfaw</sup></b></u></i>', '2013-01-11', '2013-01-31', '2013-02-10', '2013-02-11'),
(21, 'asdfadsgfasdgf', '2013-01-16', '2013-01-16', '2013-01-16', NULL),
(22, 'asfafaa', '2013-01-12', '2013-01-21', '2013-01-23', '2013-01-12'),
(23, 'asfa<br>', '2013-01-13', '2013-01-30', '2013-01-31', NULL),
(24, 'twtw', '2013-01-13', '2013-01-14', '2013-01-15', '2013-01-13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_noteContents`
--

DROP TABLE IF EXISTS `note_noteContents`;
CREATE TABLE IF NOT EXISTS `note_noteContents` (
  `note_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `note_noteContents`
--

INSERT INTO `note_noteContents` (`note_id`, `content_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_statuses`
--

DROP TABLE IF EXISTS `note_statuses`;
CREATE TABLE IF NOT EXISTS `note_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `note_statuses`
--

INSERT INTO `note_statuses` (`id`, `name`, `description`) VALUES
(1, 'Completed', 'Note completed'),
(2, 'In Progress', 'During progress'),
(3, 'Not Started', 'Ready to start'),
(4, 'Rejected', 'Note deleted');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(12, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(3, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'0',
  `root_note_id` int(11) DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `isActive`, `root_note_id`, `scope`) VALUES
(1, 'badzi89@gmail.com', 'badzi', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 31, 1357891704, b'1', 41, NULL),
(3, 'test@admin.pl', 'admin', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 25, 1358007855, b'1', NULL, NULL),
(4, 'test@test.pl', 'user', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 0, NULL, b'0', NULL, NULL),
(5, 'test2@test.pl', 'test255', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 0, NULL, b'0', NULL, NULL),
(7, 'test32@test.pl', 'Test3254', 'bdfc57e340018be1e06bee792735274234b718ba885d70d8ffd484a7cffde58d', 0, NULL, b'0', NULL, NULL),
(8, 'aaa@afafaf.pl', 'ydsfgsdg', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 0, NULL, b'0', NULL, NULL),
(9, 'badzi89@o2.com', 'badzi1', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 2, 1357739225, b'0', NULL, NULL),
(10, 'kamil.badura.89@gmail.com', 'badzi89', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357739233, b'1', NULL, NULL),
(12, 'teeqweqst2@ys.pl', 'wqeqweqw', '3246ec10c50eaaaa07b736aab28d603b9093b3d621611e84e681a96ec3a98678', 0, NULL, b'0', NULL, NULL),
(14, 'tomek@tomek.pl', 'tomek', 'b22361eee34fa8d3ef4d3ea6b89ef89c68bfea8c849da3cc801023f2cd0e2839', 0, NULL, b'0', NULL, NULL),
(15, 'test1@test.pl', 'badzia', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 0, NULL, b'1', 56, NULL),
(16, 'badzi89@o2.pl', 'badzi2', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357812911, b'1', 54, NULL),
(17, 'testbadzi@test.pl', 'badzi3', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357814498, b'1', 57, NULL),
(18, 'test1234@test.pl', 'badzi4', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 16, 1358086233, b'1', 58, 6),
(19, 'badzi899@gmail.com', 'badzi5', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357918440, b'1', 80, 17),
(20, 'badzi89a@gmail.com', 'badzi6', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357918434, b'0', NULL, NULL),
(21, 'badzia89@gmail.com', 'badzi7', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 1, 1357918138, b'1', 79, 16),
(22, 'tommy7600@gmail.com', 'tommy', 'b22361eee34fa8d3ef4d3ea6b89ef89c68bfea8c849da3cc801023f2cd0e2839', 0, NULL, b'0', NULL, NULL),
(23, 'kamilw8500@gmail.com', 'testw', 'b22361eee34fa8d3ef4d3ea6b89ef89c68bfea8c849da3cc801023f2cd0e2839', 0, NULL, b'0', NULL, NULL),
(24, 'lorenc.tomasz@gmail.com', 'fafaf', 'b22361eee34fa8d3ef4d3ea6b89ef89c68bfea8c849da3cc801023f2cd0e2839', 0, NULL, b'0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_notes`
--

DROP TABLE IF EXISTS `user_notes`;
CREATE TABLE IF NOT EXISTS `user_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `user_notes`
--

INSERT INTO `user_notes` (`id`, `user_id`, `note_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 18, 78),
(6, 19, 80),
(7, 19, 82),
(8, 19, 81),
(9, 18, 84),
(10, 18, 85),
(11, 18, 86);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `created`, `expires`) VALUES
(1, 1, '', '5f87805b70754be0d52d4e4d13d9fc6f7f61c011', 1357645679, 1357745678),
(2, 1, '', '5c7024ce550ec2404f195f03ddccef285ddd4baa', 1357645814, 1357745814),
(3, 1, '', '24e7154804011a897c286083d824bbeadfc856c2', 1357645892, 1357745892),
(4, 1, '', '914b81c1b806b84eceaf3f760615cf887a34af9b', 1357646267, 1357746267),
(5, 1, '', '3fda977ed303923b82f47107823d5494fe78fa30', 1357651043, 1357751043),
(6, 1, '', 'c69c155ce912eff04e46c44480221c20aec4ca3b', 1357651530, 1357751530),
(8, 9, '', '42f77012f26dfbbd5a188f8ab3cca0b5f1770b5d', 1357738838, 1357838838),
(10, 14, '', 'f2a624d8138d08c5f3ff2fdcc0f2b93d2d9796de', 1357807349, 1357907349),
(16, 20, '', '97657cb58c4b143d136951cad5e69e87509f57a6', 1357918030, 1358018030),
(18, 22, '', '23afb43390fa9b6633f3ae94cc47687ff7b4858d', 1358085787, 1358185787),
(19, 23, '', 'f320da8ad6126c21c4db66f090a75cddc0152280', 1358085856, 1358185856),
(20, 24, '', 'f9386355c4c7c437a200d649c89a3a040411380e', 1358086031, 1358186031);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
