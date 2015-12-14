-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2015 г., 09:28
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yiitest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishing_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_author_publishing_idx` (`publishing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `publishing_id`, `name`) VALUES
(4, 1, 'Иванов'),
(5, 1, 'Петров'),
(6, 2, 'Фердыщенко'),
(7, 3, 'Козлодоев'),
(8, 3, 'Туш');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(4) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_book_author1_idx` (`author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `author_id`, `name`, `date`, `category_id`) VALUES
(3, 4, 'Вторая книга первого автора', '2015', 30),
(4, 5, 'Название книги 2', '2015', 29),
(6, 6, 'Название книги 4', '2015', 23),
(7, 4, 'Книга Иванова', '2014', 27),
(8, 8, 'Тушкованное программирование', '2013', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `lft`, `rgt`, `level`, `name`) VALUES
(1, 1, 20, 1, 'Каталог'),
(2, 14, 19, 2, 'Программирование'),
(4, 2, 13, 2, 'История'),
(23, 15, 16, 3, 'PHP'),
(24, 3, 4, 3, 'Мировая'),
(26, 5, 12, 3, 'Средних веков'),
(27, 17, 18, 3, 'C++'),
(28, 6, 11, 4, 'Страны'),
(29, 7, 8, 5, 'Россия'),
(30, 9, 10, 5, 'Украина');

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `name`, `visible`) VALUES
(1, 'PostOnPage', '4', 'Количество постов на странице', 1),
(5, 'imgPath', '/images/uploads', 'Папка для загрузки картинок', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_picture_book1_idx` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`id`, `book_id`, `image`) VALUES
(3, 4, '/images/uploads/2015/12/030308-1530-jquery1.gif'),
(4, 6, '/images/uploads/2015/12/logo-uralvagonzavod_gray.png'),
(5, 4, '/images/uploads/2015/12/main2.jpg'),
(32, 7, '/images/uploads/2015/12/I0zmc_vnrqA.jpg'),
(33, 7, '/images/uploads/2015/12/alphabet_morze.jpg'),
(34, 6, '/images/uploads/2015/12/alphabet_morze.jpg'),
(35, 8, '/images/uploads/2015/12/38329.jpg'),
(41, 7, '/images/uploads/2015/12/092616-spn_5472210309110_1394591222.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `publishing`
--

CREATE TABLE IF NOT EXISTS `publishing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `publishing`
--

INSERT INTO `publishing` (`id`, `name`, `address`, `phone`) VALUES
(1, 'Издатель 1', 'adress1', '0954766667'),
(2, 'Издатель 2', 'adress2', '322223322'),
(3, 'Издатель 3', 'address 3', '3333'),
(4, 'Очень длинный издатель', '----------', '5555555555555'),
(5, 'Издатель 5', '55', '5555555555'),
(6, 'Издатель 6', '66666', '66666666666');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `fk_author_publishing` FOREIGN KEY (`publishing_id`) REFERENCES `publishing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_author1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_picture_book1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
