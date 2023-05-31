-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2023 г., 19:51
-- Версия сервера: 10.7.5-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forgot`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `lName` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `profile_picture`, `email`, `password`) VALUES
(20, 'asd', 'asdasd', '', 'sgor16531@gmail.comaasas', '1'),
(22, 'asd', 'asd', '', 'sgor16531@gmail.comsadasd', '1'),
(24, 'dsadsad', 'asd', '', 'sgor16531@gmail.comsaffsafasfsaf', '1'),
(25, 'dsadsad', 'asd', '', 'sgor16531@gmail.comgsa', '1'),
(26, 'vardan', 'ghukasyan', '', 'dog123@gmail.com', '1'),
(27, 'vrdo', 'ghukas', '', 'shun123@gmailc.om', '1'),
(29, 'gororor', 'kgagkaog', '', 'sgor16531@gmail.comasdas', '1'),
(30, 'sasad', 'sadsa', '', 'dasdas', '1'),
(31, 'tigran', 'arzaqancyan', '', 'gor_sargsyan_2021@inbox.ru', '1'),
(32, 'aaa', 'aaa', '', 'gor_sargsyan_2021@inbox.y', 'aaa'),
(33, 'asdasdsa', 'dasd', '', 'asdasfsaf@dasas', 'aaa'),
(34, 'goro', 'goroo', '', 'sagasgsa@dasd', 'aaa'),
(36, 'qwewqr', 'wqrqwr', '', 'wqrqw@esad', '8tivemuzum'),
(37, 'qwewqr', 'wqrqwr', '', 'wqrqw@esad', '8tivemuzum'),
(38, 'asdas', 'asdsa', '', 'asdas@saf', '8hatnish'),
(39, 'asas', 'dasdas', '', 'sgor16531@gmail.comasda', '8888888888'),
(41, 'Tyom', 'Avagyan', '', 'artemavagan90@gmail.com', 'aaaaaaaa'),
(42, 'tyomik', 'sadsads', '', 'fsafsaf@safsa', 'tyomik99'),
(46, 'sadasd', 'dsadasd', '', 'sadsada@sdadsa', 'gorogoro'),
(47, 'sadasd', 'dsadasd', '', 'sadsada@sdadsad', 'gorogoro'),
(48, 'caxikner', 'getapic', '', 'afsafsa@fgadgsd', 'aaaaaaaa'),
(49, 'roman', 'barcr avto', 'default.png', 'araratbetterthannewyork@inbox.ru', 'mrzpo777'),
(50, 'karen', 'cicak', 'Array', 'arartyanmasiv@inbox.ru', 'tyomik777'),
(51, 'asdasd', 'asdad', '1', 'asdas@safasf', '88888888'),
(52, 'asdasd', 'asdad', '1', 'asdas@safasfjj', '88888888'),
(53, 'agsga', 'agggag', '', 'saghsago@fasg', 'gorogoro'),
(54, 'asdad', 'faagags', '', 'gagkaogj@fodjg', 'gorogoro'),
(55, 'narek', 'flowers', 'profile_picture_55.png', 'sgor16531@gmail.com', 'gorogoro'),
(56, 'fhkhkf', 'gjekeht', '', 'gadgagd@ghdh', 'gorogoro');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
