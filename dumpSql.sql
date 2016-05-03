-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2016 г., 00:15
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autor`
--

INSERT INTO `autor` (`id`, `name`, `surname`) VALUES
(1, 'Борис', 'Акунин'),
(2, 'Владимир', 'Шитов'),
(3, 'Корней', 'Чуковский'),
(4, 'Хилл', 'Мюррей'),
(5, 'Д.', 'Стеффанс'),
(6, 'Александр', 'Пушкин'),
(7, 'Уильям', 'Шекспир'),
(8, 'Анна', 'Ахматова'),
(9, 'Аллан', 'По Эдгар'),
(10, 'Иоганн', 'Гете');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_publish` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `photo`, `date_publish`) VALUES
(1, 'АЛМАЗНАЯ КОЛЕСНИЦА', 'Chitat-knigu-Akunin-Boris-Almaznaya-kolesnitsa-Tom-2-49776.jpg', '2015-04-07'),
(2, 'Азазель', 'Chitat-knigu-Akunin-Boris-Azazel-49703.jpg', '2012-05-14'),
(3, 'Один на льдине', 'Chitat-knigu-Shitov-Vladimir-Odin-na-ldine-32776.jpg', '2012-05-06'),
(4, 'Сказки Корнея Чуковского', 'Chitat-knigu-Chukovskiy-Korney-Skazki-Korneya-Chukovskogo-v-.jpg', '2012-05-15'),
(5, 'С++', '', '2014-05-04'),
(6, 'С++. Сборник рецептов', '', '2014-04-07'),
(7, 'Евгений Онегин', 'Chitat-knigu-Pushkin-Aleksandr-Evgeniy-Onegin-11393.jpg', '2013-05-14'),
(8, 'Ромео и Джульетта', 'Chitat-knigu-Shekspir-Uilyam-Romeo-i-Dzhuletta-32344.jpg', '2013-05-13'),
(9, 'Анна Ахматова. Стихотворения', 'Chitat-knigu-Akhmatova-Anna-Anna-Akhmatova-Stikhotvoreniya-16803.jpg', '2010-05-18'),
(10, 'Аннабель-Ли', 'Chitat-knigu-Po-Edgar-Allan-Annabel-Li-perevod-Zhabotinskogo.jpg', '2012-05-14'),
(11, 'Фауст', '', '2010-02-16');

-- --------------------------------------------------------

--
-- Структура таблицы `book2autor`
--

CREATE TABLE `book2autor` (
  `id_book` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book2autor`
--

INSERT INTO `book2autor` (`id_book`, `id_autor`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `book2category`
--

CREATE TABLE `book2category` (
  `id_book` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book2category`
--

INSERT INTO `book2category` (`id_book`, `id_category`) VALUES
(1, 10),
(2, 10),
(3, 11),
(4, 13),
(6, 15),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(5, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `book2publisher`
--

CREATE TABLE `book2publisher` (
  `id_book` int(11) NOT NULL,
  `id_publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book2publisher`
--

INSERT INTO `book2publisher` (`id_book`, `id_publisher`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(6, 2),
(7, 2),
(8, 1),
(9, 2),
(10, 3),
(11, 3),
(5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `id_parent`) VALUES
(1, 'Детективы', NULL),
(2, 'Детские', NULL),
(3, 'Компьютеры и интернет', NULL),
(4, 'Поэзия', NULL),
(5, 'Приключения', NULL),
(6, 'Религия', NULL),
(7, 'Современная лмтература', NULL),
(8, 'Фантастика', NULL),
(9, 'Иронические детективы', 1),
(10, 'Исторические детективы', 1),
(11, 'Шпионские детективы', 1),
(12, 'Детские стихи', 2),
(13, 'Сказки', 2),
(14, 'Базы данных', 3),
(15, 'Программирование', 3),
(16, 'Операционные системы', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `address`, `phone`) VALUES
(1, 'ТМ Питер', 'Санкт-Петербург, ул первая 1/1', '2312321312'),
(2, 'Москва', 'Москва, ул. Вторая 22', '324536254'),
(3, 'Киев', 'Киев, ул. Третья 33', '43346324326');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
