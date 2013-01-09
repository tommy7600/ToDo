-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 09 Sty 2013, 07:29
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
  `name` varchar(45) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'0',
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `lvl` int(11) DEFAULT NULL,
  `scope` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_contents`
--

DROP TABLE IF EXISTS `note_contents`;
CREATE TABLE IF NOT EXISTS `note_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2000) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_planned_ended` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_noteContents`
--

DROP TABLE IF EXISTS `note_noteContents`;
CREATE TABLE IF NOT EXISTS `note_noteContents` (
  `note_id` int(11) NOT NULL,
  `noteContent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `note_noteStatuses`
--

DROP TABLE IF EXISTS `note_noteStatuses`;
CREATE TABLE IF NOT EXISTS `note_noteStatuses` (
  `note_id` int(11) NOT NULL,
  `noteStatus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 1),
(2, 2);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `isActive`) VALUES
(1, 'badzi89@gmail.com', 'badzi', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 8, 1357710747, b'1'),
(2, 'admin@admin', 'admin', '532818abbe45dd9514016cd3ea7138847e7a1afef1c2b569ffddadda00aab0fb', 0, NULL, b'1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `created`, `expires`) VALUES
(1, 1, '', '5f87805b70754be0d52d4e4d13d9fc6f7f61c011', 1357645679, 1357745678),
(2, 1, '', '5c7024ce550ec2404f195f03ddccef285ddd4baa', 1357645814, 1357745814),
(3, 1, '', '24e7154804011a897c286083d824bbeadfc856c2', 1357645892, 1357745892),
(4, 1, '', '914b81c1b806b84eceaf3f760615cf887a34af9b', 1357646267, 1357746267),
(5, 1, '', '3fda977ed303923b82f47107823d5494fe78fa30', 1357651043, 1357751043),
(6, 1, '', 'c69c155ce912eff04e46c44480221c20aec4ca3b', 1357651530, 1357751530);

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
