-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2020 г., 00:11
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auto-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto_model`
--

CREATE TABLE `auto_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `brand_id` int(11) NOT NULL COMMENT 'Автопроизводитель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `auto_model`
--

INSERT INTO `auto_model` (`id`, `name`, `brand_id`) VALUES
(1, 'Camry', 2),
(2, 'Corolla', 2),
(3, 'ES', 1),
(4, 'GX', 1),
(7, 'A3', 5),
(8, 'A4', 5),
(9, '3', 4),
(10, '4', 4),
(11, 'A-Class', 3),
(12, 'C-Class', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Название'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Lexus'),
(2, 'Toyota'),
(3, 'Mercedes-Benz'),
(4, 'BMW'),
(5, 'Audi');

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `auto_model_id` int(11) NOT NULL,
  `engine_type_id` int(11) NOT NULL,
  `drive_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `photo`, `auto_model_id`, `engine_type_id`, `drive_unit_id`) VALUES
(1, '/uploads/2786497.jpg', 1, 1, 1),
(2, '/uploads/Toyota-Corolla-Hybrid.jpg', 2, 3, 1),
(3, '/uploads/Toyota-Corolla-2020-Brasil (7).jpg', 2, 1, 1),
(4, '/uploads/day-exterior-4_1H9.png', 3, 1, 1),
(5, '/uploads/regnum_picture_1478086463418930_normal.jpg', 3, 2, 1),
(6, '/uploads/b_202207.jpg', 4, 1, 3),
(7, '/uploads/audi_a3_686281.jpg', 7, 1, 1),
(8, '/uploads/1459976108_a161810_medium.jpg', 7, 1, 3),
(9, '/uploads/11922_tmb940.jpg', 8, 1, 1),
(10, '/uploads/Audi-A4-On-Location-Venice-01-1200x698.jpg', 8, 1, 3),
(11, '/uploads/Audi-A4-9.jpg', 8, 2, 1),
(12, '/uploads/allrad-nach-bedarf.jpg', 8, 2, 3),
(14, '/uploads/BMW-3-Series-2016.jpg', 9, 1, 2),
(15, '/uploads/BMW-3-series-F30-2880x1920.jpg', 9, 1, 3),
(16, '/uploads/bmw-3-series-edrive-wallpaper-hd-38963-2332892.jpg', 9, 2, 2),
(17, '/uploads/1464792667_2017-bmw-3-series-gt-38.jpg', 9, 2, 3),
(18, '/uploads/P90267019_highRes_the-new-bmw-4-series.jpg', 10, 2, 3),
(19, '/uploads/2015-bmw-m3-sedanm4-coupe-start-up-exhaust-test-drive-and-in-intended-for-2015-bmw-m3.jpg', 10, 1, 2),
(20, '/uploads/bmw-21367.jpg', 10, 1, 3),
(21, '/uploads/1538441032_mercedes-benz-a-class_sedan-2019-1600-01.jpg', 11, 1, 1),
(22, '/uploads/1400x936.jpg', 11, 1, 3),
(23, '/uploads/d79e285a98c979057fb64c6f8e20bfa4.jpg', 12, 3, 3),
(24, '/uploads/foto-Mercedes-C-Class-Coupe-2016.jpg', 12, 1, 2),
(25, '/uploads/schmidt-revolution-mercedes-benz-c-class-w205-01.jpg', 12, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `drive_unit`
--

CREATE TABLE `drive_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `drive_unit`
--

INSERT INTO `drive_unit` (`id`, `name`) VALUES
(1, 'Передний'),
(2, 'Задний'),
(3, 'Полный');

-- --------------------------------------------------------

--
-- Структура таблицы `engine_type`
--

CREATE TABLE `engine_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `engine_type`
--

INSERT INTO `engine_type` (`id`, `name`) VALUES
(1, 'Бензин'),
(2, 'Дизель'),
(3, 'Гибрид');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1596974014),
('m200809_104420_create_brand_table', 1596974016),
('m200809_104527_create_auto_model_table', 1596974018),
('m200809_114749_create_engine_type_table', 1596974018),
('m200809_114853_create_drive_unit_table', 1596974019),
('m200809_114923_create_car_table', 1596974023);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto_model`
--
ALTER TABLE `auto_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_brand_index` (`brand_id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_model` (`auto_model_id`),
  ADD KEY `car_engine_type` (`engine_type_id`),
  ADD KEY `car_drive_unit` (`drive_unit_id`);

--
-- Индексы таблицы `drive_unit`
--
ALTER TABLE `drive_unit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `engine_type`
--
ALTER TABLE `engine_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto_model`
--
ALTER TABLE `auto_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `drive_unit`
--
ALTER TABLE `drive_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `engine_type`
--
ALTER TABLE `engine_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auto_model`
--
ALTER TABLE `auto_model`
  ADD CONSTRAINT `model_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_drive_unit` FOREIGN KEY (`drive_unit_id`) REFERENCES `drive_unit` (`id`),
  ADD CONSTRAINT `car_engine_type` FOREIGN KEY (`engine_type_id`) REFERENCES `engine_type` (`id`),
  ADD CONSTRAINT `car_model` FOREIGN KEY (`auto_model_id`) REFERENCES `auto_model` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
