-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2020 г., 06:54
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Смартфоны'),
(2, 'Планшеты'),
(3, 'Ноутбуки'),
(4, 'ПК'),
(5, 'Аудиотехника'),
(6, 'Телевизоры'),
(7, 'Игры и приставки'),
(8, 'Уценка'),
(9, 'Пылесосы');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_name` varchar(16) DEFAULT NULL,
  `text` text,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `user_name`, `text`, `product_id`) VALUES
(1, 'Вася', 'Хороший телевизор. Доволен, как слон.', 4),
(2, 'Дмитрий', 'Данный телевизор приобретался исключительно для игр в связке с Playstation 4 PRO. Картинку выдаёт отличную, цвета сочные, всё смотрится просто отлично.', 4),
(3, 'Алексей', 'Купил уже второй такой - матери, сериалы смотреть. За эти деньги - вне конкуренции.', 2),
(4, 'Илья', 'Алюминиевый корпус и выглядит отлично, и чувствуется в руке здорово - сразу видно что нормальное устройство, а не просто какая-то дешёвка. Скорость работы приятно радует, ничего не подвисает и не лагает, в игрушки я как-то и не играю, а на всё остальное производительности устройства хватает с хорошим запасом. Смело рекомендую к покупке, вещица вполне себе нормальная и разочарований от покупки нет.', 3),
(9, 'Лёха', 'Отличный пылесос, мне подошел по все параметрам - рекомендую! Не пожалеете', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `short_description`, `description`, `price`, `category_id`) VALUES
(1, 'Тест', 'no-photo.jpg', 'Краткое описание товара', 'Подробное описание товара', 100, 8),
(2, 'Смартфон 1', 'smartphone_001.jpg', 'Краткое описание 1', 'Описание 1', 200, 1),
(3, 'Смартфон 2', 'smartphone_002.jpg', 'Краткое описание 2', 'Описание 2', 300, 1),
(4, 'Телевизор LG 49LJ540V', 'tv-lg.jpg', '49\" (124 см) LED-телевизор LG 49LJ540V черный', 'LED-телевизор LG 49LJ540V с экраном в 49\", разрешение которого составляет 1920х1080. Такой экран обеспечит яркое, чёткое, реалистичное изображение и даст возможность получить максимум удовольствия от просмотра фильмов и телепередач. Телевизор оборудован аналоговым и цифровым тюнером. Вам не придётся приобретать дополнительное оборудование, чтобы смотреть передачи цифрового ТВ. В телевизоре присутствует технология Virtual Surround Plus, которая обеспечит Вам мощный и реалистичный объёмный звук. Технология Smart TV открывает телевизору доступ в интернет. Вы сможете смотреть видео с онлайн-ресурсов, пользоваться разнообразными приложениями. Разъёмы HDMI и USB позволят легко подключить к телевизору USB-накопители, проигрыватели дисков различного типа, а также другие устройства, чтобы воспроизводить видеоконтент на большом ярком экране.', 38999, 6),
(7, 'Пылесос', '20036974b5.jpg', 'Мощный мотор автоматически выключается при перегреве. Как только он остынет, то продолжит свою работу. ', 'Пылесос с контейнером Tefal Compact Power TW3731RA предназначен для проведения сухой уборки. Прибор укомплектован четырьмя разными насадками, которые помогут быстро и эффективно очистить ламинат, паркет, кафель, ковёр с коротким или длинным ворсом, мягкие диван и кресла, а также труднодоступные места, например, углы, от пыли и мусора', 6990, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `groups_id` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `email`, `phone`, `description`, `groups_id`) VALUES
(1, 'admin', '123', 'Alex', 'Syomin', 'info@mail.ru', '+71234567890', 'The site administrator', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`) VALUES
(1, 'Administrators'),
(2, 'Users');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
