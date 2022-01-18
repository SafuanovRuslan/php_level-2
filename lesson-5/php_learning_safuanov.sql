-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 18 2022 г., 12:25
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_learning_safuanov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(12) NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `source` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `source`) VALUES
(1, 'iPhone 13', 1200, 'img/iphone.jfif'),
(2, 'iPhone 14', 1399, 'img/iphone.jfif'),
(3, 'iPhone 15', 2199, 'img/iphone.jfif'),
(4, 'iPhone 13 mini', 999, 'img/iphone.jfif'),
(5, 'iPhone 14 mini', 1099, 'img/iphone.jfif'),
(6, 'iPad 3', 1499, 'img/iphone.jfif'),
(7, 'iPad 4', 1599, 'img/iphone.jfif');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `source` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `source`, `title`, `description`, `size`) VALUES
(1, 'galaxy_1.jpg', 'Black hole', 'Black holes are very dangerous', 999),
(2, 'galaxy_2.jpg', 'Morn', 'Morn is a red planet', 100),
(3, 'galaxy_3.jpg', 'Earth', 'It is our Earth', 250),
(4, 'galaxy_4.jpg', 'Space', 'I am like space', 10000),
(5, 'galaxy_5.jpg', 'Gase gigant', 'It is have some rings', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed_pages` text COLLATE utf8mb4_unicode_ci,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `viewed_pages`, `isAdmin`) VALUES
(1, 'admin', 'admin', 'King', 'Artur', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
