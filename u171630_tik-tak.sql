-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 16 2024 г., 20:52
-- Версия сервера: 10.4.30-MariaDB-cll-lve-log
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u171630_tik-tak`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `textarea` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `surname`, `avatar`, `textarea`) VALUES
(1, 'Ольга', '', 'Anastasia.jpg', 'Часы Longines  стали для меня незаменимым аксессуаром. Они тонкие, легкие и очень элегантные. Получаю массу комплиментов!'),
(2, 'Екатерина', '', 'ekaterina.png', 'Я в восторге от своих часов Cartier. Они элегантные, стильные и очень удобные. Ношу их и на работу, и на вечеринки – всегда чувствую себя уверенно.'),
(3, 'Дмитрий', '', 'Andrey.jpg', 'Часы Rolex Datejust превзошли все мои ожидания. Они идеально сочетаются с деловым костюмом и привлекают внимание. Абсолютно стоящие своей цены!'),
(4, 'Анна', '', '', 'Я купила часы Omega и они просто великолепны! Качество на высшем уровне, а бриллианты на циферблате добавляют изящности. Ношу их с удовольствием каждый день!'),
(5, 'Александр', '', 'Alexander.jpg', 'Я в восторге от своих часов IWC Portugieser. Они идеально подходят для деловых встреч и выглядят очень стильно. Качество и точность на высшем уровне.'),
(6, '1828888-9', '1828888-9', 'Andrey.jpg', 'У вас плохой сайт. Не смог купить часы.');

-- --------------------------------------------------------

--
-- Структура таблицы `modern watches`
--

CREATE TABLE IF NOT EXISTS `modern watches` (
  `id` int(10) unsigned NOT NULL,
  `sale` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `oldprice` text NOT NULL,
  `newprice` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `modern watches`
--

INSERT INTO `modern watches` (`id`, `sale`, `image`, `sex`, `category`, `description`, `oldprice`, `newprice`) VALUES
(1, '', 'apple.png', 'Женские', 'Apple', 'Элегантные умные часы с поддержкой множества приложений и возможностью отслеживания фитнес-активности. Идеальны для современных женщин.', '', '35,990 '),
(2, '', 'casio.png', 'Мужские', 'Casio', 'Надежные и стильные часы с функцией мирового времени и водонепроницаемостью до 50 метров. Подходят для активного образа жизни.', '', '7,990 '),
(3, '', 'sumsung.png', 'Женские', 'Samsung', 'Смарт-часы с AMOLED-дисплеем и широкими возможностями настройки. Поддержка уведомлений и встроенный GPS.', '', '24,990 '),
(4, '', 'garmin.png', 'Мужские', 'Garmin', 'Спортивные часы с функциями мониторинга сердечного ритма и контроля уровня кислорода в крови. Водонепроницаемость до 100 метров.', '', '19,990 '),
(5, '', 'fibit.png', 'Женские', 'Fitbit', 'Стильные фитнес-часы с возможностью отслеживания сна и ежедневной активности. Легкие и удобные для повседневного ношения.', '', '12,990 '),
(6, '', 'huawei.png', 'Мужские', 'Huawei', 'Многофункциональные часы с длительным временем работы без подзарядки и поддержкой NFC-платежей. Идеальны для путешествий.', '', '17,990 '),
(7, '', 'suunto.png', 'Мужские', 'Suunto', 'Профессиональные часы для спорта и экстремальных условий. Встроенный компас и барометр для точных измерений.', '', '22,990 '),
(8, '', 'xiaomi.png', 'Женские', 'Xiaomi', 'Умные часы с тонким дизайном и функцией мониторинга стресса. Отличный выбор для деловых и активных женщин.', '', '8,990 '),
(9, '', 'polar.png', 'Мужские', 'Polar', 'Спортивные часы с возможностью подключения к смартфону и отслеживанием тренировок. Поддержка многих спортивных режимов.', '', '14,990 '),
(10, '', 'fossil.png', 'Мужские', ' Fossil', 'Стильные смарт-часы с классическим дизайном и функциями умного ассистента. Совместимы с Android и iOS.', '', '18,990');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sername` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `telefon`, `name`, `sername`) VALUES
(1, 'cooler', '123', '+79961350423', 'миша', 'кулагин'),
(2, 'cooler!', '123', '+79961350423', 'миша', 'кулагин'),
(3, 'cooler31', '123', '+79961350423', 'миша', 'кулагин'),
(4, 'cooler2024', '123', '79961350423', 'Михаил', 'Кулагин'),
(5, 'Apple', '010312', '7903237951', 'Наталья', 'Преснякова'),
(6, 'Qwerty', 'Qwerty', '89690458899', 'Егор', 'Пресняков'),
(7, '1828888-9', '1828888-9', '1828888-9', '1828888-9', '1828888-9');

-- --------------------------------------------------------

--
-- Структура таблицы `vintage watch`
--

CREATE TABLE IF NOT EXISTS `vintage watch` (
  `id` int(10) unsigned NOT NULL,
  `sale` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `oldprice` text NOT NULL,
  `newprice` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `vintage watch`
--

INSERT INTO `vintage watch` (`id`, `sale`, `image`, `sex`, `category`, `description`, `oldprice`, `newprice`) VALUES
(11, '', 'rolex.png', 'Мужские', 'Rolex', 'Престижные часы Rolex Datejust с корпусом из нержавеющей стали и золотым ободком, элегантный циферблат со светящимися метками и автоматическим механизмом.', '', '750,000 '),
(12, '', 'omega.png', 'Женские', 'Omega', 'Утонченные часы Omega De Ville с серебристым циферблатом, украшенным бриллиантами, и кожаным ремешком. Идеальный аксессуар для любого случая.', '', '320,000 '),
(13, '', 'tagheure.png', 'Мужские', 'Tag Heuer', 'Спортивные и стильные часы Tag Heuer Carrera с черным циферблатом и хронографом. Прочный стальной корпус и кожаный ремешок.', '', '275,000 '),
(14, '', 'longines.webp', 'Женские', 'Longines', 'Элегантные часы Longines La Grande Classique с белым циферблатом, украшенным золотыми метками, и тонким золотым браслетом.', '', '145,000 '),
(15, '', 'patek.png', 'Мужские', 'Patek Philippe', 'Роскошные часы Patek Philippe Calatrava с гильошированным циферблатом и ручным заводом. Классический кожаный ремешок.', '', '1,100,000 '),
(16, '', 'cartier.png', 'Женские', 'Cartier', 'Изящные часы Cartier Tank Francaise с римскими цифрами и синими стрелками, в корпусе из нержавеющей стали и с кожаным ремешком.', '', '480,000 '),
(17, '', 'breitling.png', 'Мужские', 'Breitling', 'Надежные часы Breitling Navitimer с черным циферблатом и авиационным хронографом, стальной корпус и металлический браслет.', '', '380,000 '),
(18, '', 'chopard.png', 'Женские', 'Chopard', 'Роскошные часы Chopard Happy Diamonds с плавающими бриллиантами внутри циферблата, золотой корпус и белый кожаный ремешок.', '', '600,000 '),
(19, '', 'orkina.png', 'Мужские', 'ORKINA', 'Часы ORKINA с белым циферблатом и голубыми стрелками, автоматический механизм и кожаный ремешок. Идеальны для деловых встреч.', '', '520,000 '),
(20, '', 'tissot.png', 'Женские', 'Tissot', 'Стильные часы Tissot Le Locle с перламутровым циферблатом и бриллиантовыми метками, стальной корпус и браслет.', '', '95,000 ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modern watches`
--
ALTER TABLE `modern watches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vintage watch`
--
ALTER TABLE `vintage watch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `modern watches`
--
ALTER TABLE `modern watches`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `vintage watch`
--
ALTER TABLE `vintage watch`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
