SET FOREIGN_KEY_CHECKS=0;
-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 03 2017 г., 05:57
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `welcome`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `is_answer` tinyint(1) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `object_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `title`, `note`, `is_answer`, `score`, `object_id`, `parent_id`, `is_publish`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'asdasd', 'asdasdasd', 0, 4, 6, 0, 1, 13, '2017-03-02 04:32:33', '2017-03-02 04:33:08'),
(7, 'asdasd', 'asdasdasd', 0, 2, 6, 0, 0, 13, '2017-03-02 04:33:57', '2017-03-02 05:08:24'),
(8, 'cndfk.', 'asdasd', 0, 5, 6, 0, 0, 13, '2017-03-02 04:34:37', '2017-03-02 04:34:37'),
(9, 'asdasd', 'asdasdasdasd', 0, 1, 6, 0, 0, 13, '2017-03-02 04:34:46', '2017-03-02 04:34:46'),
(10, '1231231', '123123', 0, 1, 6, 0, 1, 13, '2017-03-02 04:35:58', '2017-03-02 05:08:27'),
(11, 'sadfsdf', 'sdfsdf', 0, 3, 5, 0, 1, 13, '2017-03-02 10:24:07', '2017-03-02 10:24:49');

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `phone`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Company name', 'Astana. Abai 58', '346488', 'Hi from note', 9, '2017-02-21 06:44:01', '2017-02-21 06:44:01'),
(2, 'sampe_2', 'address', '4859656', 'sdfhgjshdgfsadf', 10, '2017-02-21 09:03:04', '2017-02-21 09:03:04'),
(3, 'asdfsdf', 'sdsdf', 'asdasd', 'assdasdasd', 11, '2017-02-21 09:34:28', '2017-02-21 09:34:28'),
(4, 'Company name 4', 'asdasd', '48', 'asdasdasdasd', 12, '2017-02-22 04:58:53', '2017-02-22 04:58:53'),
(5, 'asdasd', 'asdasd', '123123', '123123123', 13, '2017-02-23 05:35:49', '2017-02-23 05:35:49');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date_event` date DEFAULT NULL,
  `time_event` time DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `object_id`, `title`, `note`, `date_event`, `time_event`, `duration`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 6, 'Золотой фазан', 'фывфыв', '2017-04-15', '04:00:00', '50 минут', '/upload/logo/1488272574_Koala.jpg', 1, '2017-02-28 09:02:54', '2017-03-01 06:41:09'),
(4, 6, 'Заголовок', 'фывфывфыв', '2017-03-15', '16:20:00', '50минут', '/upload/logo/1488273494_Lighthouse.jpg', 1, '2017-02-28 09:18:14', '2017-02-28 09:55:07');

-- --------------------------------------------------------

--
-- Структура таблицы `mail_send`
--

CREATE TABLE `mail_send` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `to_email` varchar(255) DEFAULT NULL,
  `to_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_02_10_065110_create_comments_table', 0),
('2017_02_10_065110_create_company_table', 0),
('2017_02_10_065110_create_events_table', 0),
('2017_02_10_065110_create_moderators_table', 0),
('2017_02_10_065110_create_news_table', 0),
('2017_02_10_065110_create_object__reserve_table', 0),
('2017_02_10_065110_create_object_hash_tags_table', 0),
('2017_02_10_065110_create_object_locations_table', 0),
('2017_02_10_065110_create_object_slider_table', 0),
('2017_02_10_065110_create_object_special_data_table', 0),
('2017_02_10_065110_create_object_standart_data_table', 0),
('2017_02_10_065110_create_objetcs_table', 0),
('2017_02_10_065110_create_reserve_table', 0),
('2017_02_10_065110_create_sys_company_cats_table', 0),
('2017_02_10_065110_create_sys_company_role_table', 0),
('2017_02_10_065110_create_sys_directory_table', 0),
('2017_02_10_065110_create_sys_directory_names_table', 0),
('2017_02_10_065110_create_sys_filter_cats_table', 0),
('2017_02_10_065110_create_sys_filter_names_table', 0),
('2017_02_10_065110_create_sys_filter_role_table', 0),
('2017_02_10_065110_create_sys_filters_table', 0),
('2017_02_10_065110_create_sys_hash_tags_table', 0),
('2017_02_10_065110_create_sys_user_types_table', 0),
('2017_02_10_065110_create_tickets_table', 0),
('2017_02_10_065110_create_trans_lib_table', 0),
('2017_02_10_065110_create_users_table', 0),
('2017_02_10_065110_create_visitors_table', 0),
('2017_02_10_065116_add_foreign_keys_to_comments_table', 0),
('2017_02_10_065116_add_foreign_keys_to_company_table', 0),
('2017_02_10_065116_add_foreign_keys_to_events_table', 0),
('2017_02_10_065116_add_foreign_keys_to_moderators_table', 0),
('2017_02_10_065116_add_foreign_keys_to_news_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object__reserve_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object_hash_tags_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object_locations_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object_slider_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object_special_data_table', 0),
('2017_02_10_065116_add_foreign_keys_to_object_standart_data_table', 0),
('2017_02_10_065116_add_foreign_keys_to_objetcs_table', 0),
('2017_02_10_065116_add_foreign_keys_to_reserve_table', 0),
('2017_02_10_065116_add_foreign_keys_to_sys_company_role_table', 0),
('2017_02_10_065116_add_foreign_keys_to_sys_directory_names_table', 0),
('2017_02_10_065116_add_foreign_keys_to_sys_filter_cats_table', 0),
('2017_02_10_065116_add_foreign_keys_to_sys_filter_names_table', 0),
('2017_02_10_065116_add_foreign_keys_to_sys_filter_role_table', 0),
('2017_02_10_065116_add_foreign_keys_to_tickets_table', 0),
('2017_02_10_065116_add_foreign_keys_to_users_table', 0),
('2017_02_10_065116_add_foreign_keys_to_visitors_table', 0),
('2017_02_10_064424_create_users_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `moderators`
--

CREATE TABLE `moderators` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `note` text,
  `password` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moderators`
--

INSERT INTO `moderators` (`id`, `name`, `address`, `phone`, `mobile`, `note`, `password`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'пример 2111', 'фывфы', 'вфыв', NULL, 'фыв111', '346488', 7, '2017-02-10 11:14:50', '2017-02-10 11:36:22');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `image` varchar(255) DEFAULT NULL,
  `meta_key` text,
  `meta_desc` text,
  `object_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `note`, `image`, `meta_key`, `meta_desc`, `object_id`, `created_at`, `updated_at`) VALUES
(2, 'Новость 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/upload/logo/1487946770_Jellyfish.jpg', NULL, NULL, 4, '2017-02-24 14:32:50', '2017-02-24 14:32:50'),
(3, 'Весенние скидки в комплексе «Золотой Фазан»', 'Весенние скидки в комплексе «Золотой Фазан»\r\nВ Банно-гостевом комплексе «Золотой Фазан» готовятся встречать весну. Да не просто готовятся, а со скидками и подарками, которые недооценить невозможно:\r\n\r\nКорпоративы — скидка 15%;\r\nМальчишники и девичники — скидка 20%;\r\nДни рождения — скидка 20% (документы обязательны).\r\nПроводите с нами вечера и вас приятно удивят наши сюрпризы и подарки! ', '/upload/logo/1488011599_fazan-3531.jpg', NULL, NULL, 6, '2017-02-25 08:33:19', '2017-02-25 08:33:19');

-- --------------------------------------------------------

--
-- Структура таблицы `object_hash_tags`
--

CREATE TABLE `object_hash_tags` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_hash_tags`
--

INSERT INTO `object_hash_tags` (`id`, `object_id`, `note`) VALUES
(2, 4, 'Привет, пока что то новое, ололока'),
(3, 5, NULL),
(4, 6, NULL),
(6, 8, NULL),
(7, 9, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `object_locations`
--

CREATE TABLE `object_locations` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_locations`
--

INSERT INTO `object_locations` (`id`, `object_id`, `lng`, `lat`) VALUES
(1, 4, '49.79884485', '73.09774160'),
(2, 6, '51.16741736', '71.44100460'),
(3, 5, '51.16245254', '71.45302090');

-- --------------------------------------------------------

--
-- Структура таблицы `object_reserve`
--

CREATE TABLE `object_reserve` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `total_count` varchar(255) DEFAULT NULL,
  `free_count` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_reserve`
--

INSERT INTO `object_reserve` (`id`, `object_id`, `total_count`, `free_count`) VALUES
(3, 4, NULL, NULL),
(4, 5, NULL, NULL),
(5, 6, NULL, NULL),
(7, 8, NULL, NULL),
(8, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `object_score`
--

CREATE TABLE `object_score` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `score_avg` float DEFAULT '0',
  `score_sum` int(11) DEFAULT NULL,
  `score_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_score`
--

INSERT INTO `object_score` (`id`, `object_id`, `score_avg`, `score_sum`, `score_count`) VALUES
(1, 4, NULL, NULL, NULL),
(2, 5, 3, 3, 1),
(3, 6, 2.6, 13, 5),
(5, 8, NULL, NULL, NULL),
(6, 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `object_slider`
--

CREATE TABLE `object_slider` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_slider`
--

INSERT INTO `object_slider` (`id`, `object_id`, `image`) VALUES
(1, 4, '/upload/logo/1487928364_Penguins.jpg'),
(2, 4, '/upload/logo/1487928364_Tulips.jpg'),
(3, 4, '/upload/logo/1487928364_Penguins.jpg'),
(4, 6, '/upload/logo/1488011523_fazan-3445.jpg'),
(5, 6, '/upload/logo/1488011523_fazan-3449.jpg'),
(6, 6, '/upload/logo/1488011523_fazan-3458.jpg'),
(7, 6, '/upload/logo/1488011523_fazan-3465.jpg'),
(8, 4, '/upload/logo/1488186955_Koala.jpg'),
(9, 4, '/upload/logo/1488186955_Penguins.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `object_special_data`
--

CREATE TABLE `object_special_data` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `filter_key` varchar(255) DEFAULT NULL,
  `filter_name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_text` tinyint(1) DEFAULT '0',
  `sort_index` int(11) DEFAULT '0',
  `show_filter` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_special_data`
--

INSERT INTO `object_special_data` (`id`, `object_id`, `filter_id`, `filter_key`, `filter_name`, `role_id`, `is_text`, `sort_index`, `show_filter`) VALUES
(94, 4, 15, 'svobodnie', 'Свободные места', 4, 1, 0, 1),
(95, 4, 13, 'for_event', 'Подходит для', 4, 1, 0, 1),
(96, 4, 3, 'kitchen', 'Кухня', 4, 1, 50, 0),
(97, 4, 12, 'for_smoke', 'Для курящих', 4, 1, 100, 0),
(98, 4, 11, 'for_children', 'Для детей', 4, 1, 150, 0),
(99, 4, 10, 'total_place', 'Всего мест', 4, 0, 200, 1),
(100, 4, 9, 'music', 'Музыка', 4, 1, 250, 0),
(101, 4, 8, 'parking', 'Парковка', 4, 1, 300, 0),
(102, 4, 7, 'web_site', 'Cсылка на сайт', 4, 1, 350, 0),
(103, 4, 4, 'middle_check', 'Средний счет на человека', 4, 0, 450, 0),
(104, 4, 5, 'payment_type', 'Cпособы оплаты', 4, 1, 500, 0),
(105, 4, 6, 'special', 'Oсобенности ', 4, 1, 550, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `object_special_data_val`
--

CREATE TABLE `object_special_data_val` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `val_int` int(11) DEFAULT NULL,
  `val_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_special_data_val`
--

INSERT INTO `object_special_data_val` (`id`, `parent_id`, `val_int`, `val_text`) VALUES
(99, 94, 30, 'Нет'),
(100, 95, 20, 'Свидания'),
(101, 95, 21, 'Похорон'),
(102, 96, 4, 'Казахская'),
(103, 97, 19, 'Не подходит'),
(104, 98, 17, 'Не подходит'),
(105, 99, 213123, '213123'),
(106, 100, 15, 'Нет'),
(107, 101, 12, 'Есть'),
(108, 102, NULL, '123123'),
(109, 103, 15000, '15000'),
(110, 104, 10, 'Виза'),
(111, 105, NULL, 'Oсобенности ');

-- --------------------------------------------------------

--
-- Структура таблицы `object_standart_data`
--

CREATE TABLE `object_standart_data` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` text,
  `logo` varchar(255) DEFAULT NULL,
  `begin_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `begin_price` int(11) DEFAULT '0',
  `end_price` int(11) DEFAULT '0',
  `slogan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `object_standart_data`
--

INSERT INTO `object_standart_data` (`id`, `object_id`, `address`, `phone`, `note`, `logo`, `begin_time`, `end_time`, `begin_price`, `end_price`, `slogan`) VALUES
(4, 4, 'Address 48', '346488', '123123123', '/upload/logo/1488186954_Lighthouse.jpg', NULL, NULL, 0, 0, 'Слоган 2'),
(5, 5, 'Address', '346488', 'description', NULL, NULL, NULL, 0, 0, NULL),
(6, 6, 'Алмалы 45', '+77789998741', 'описание', '/upload/logo/1488011523_Bez-nazvaniya.jpg', NULL, NULL, 0, 0, 'Банно-гостевой комплекс'),
(8, 8, 'Байтерек', '45789', 'описание байтерека', NULL, NULL, NULL, 0, 0, NULL),
(9, 9, 'asdasd', '123123', '123123123', NULL, NULL, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `objetcs`
--

CREATE TABLE `objetcs` (
  `id` int(11) NOT NULL,
  `sort_index` int(11) DEFAULT '0',
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `view_total` int(11) DEFAULT NULL,
  `view_add` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_open` tinyint(1) DEFAULT '0',
  `is_vip` tinyint(1) DEFAULT '0',
  `is_special` tinyint(1) DEFAULT '0',
  `is_reserve` tinyint(1) DEFAULT '0',
  `taxi_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `objetcs`
--

INSERT INTO `objetcs` (`id`, `sort_index`, `role_id`, `name`, `view_total`, `view_add`, `city_id`, `user_id`, `company_id`, `is_active`, `is_open`, `is_vip`, `is_special`, `is_reserve`, `taxi_id`, `updated_at`, `created_at`) VALUES
(4, 350, 4, 'Название заведения:', 150, 150, 17, 13, 5, 1, 0, 0, 1, 0, NULL, '2017-03-01 06:40:52', '2017-02-24 04:43:15'),
(5, 200, 6, 'It just company name', 37, 0, 17, 13, 5, 1, 1, 0, 1, 0, NULL, '2017-03-02 10:43:28', '2017-02-24 04:58:12'),
(6, 500, 8, 'Золотой Фазан', 66, 0, 16, 13, 5, 1, 0, 0, 1, 1, NULL, '2017-03-02 09:51:54', '2017-02-24 05:36:41'),
(8, 0, 28, 'Байтерек', 2, 0, 16, 13, 5, 0, 0, 0, 0, 0, 1, '2017-03-02 05:03:28', '2017-02-27 12:27:20'),
(9, 0, 20, 'asdasd', 0, 0, 18, 13, 5, 0, 0, 0, 0, 0, NULL, '2017-02-27 12:34:07', '2017-02-27 12:34:07');

-- --------------------------------------------------------

--
-- Структура таблицы `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` text,
  `enter_date` date DEFAULT NULL,
  `enter_time` time DEFAULT NULL,
  `is_accept` tinyint(1) DEFAULT '0',
  `created_unix` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reserve`
--

INSERT INTO `reserve` (`id`, `object_id`, `name`, `phone`, `email`, `note`, `enter_date`, `enter_time`, `is_accept`, `created_unix`, `created_at`, `updated_at`) VALUES
(1, 6, 'Murat Berzhikeev', '346488', 'hmurich@mail.ru', 'asdasdas asd asd asd asd asd ', '1991-01-14', '18:00:00', 1, 1488447795, '2017-03-02 09:43:15', '2017-03-02 09:44:58'),
(2, 6, 'Jolavaev Imangali', '546888', 'jole@mail.ru', 'asdasdasd', '2017-03-17', '17:00:00', 1, 1488448121, '2017-03-02 09:48:41', '2017-03-02 09:49:05');

-- --------------------------------------------------------

--
-- Структура таблицы `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `name`) VALUES
(2, 'facebook', '11111111'),
(3, 'twitter', '222222222222'),
(4, 'email', 'admin@mail.ru'),
(5, 'title', 'asdasdasdasd'),
(6, 'max_image', '2'),
(7, 'instagramm', '3333333333333');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_company_cats`
--

CREATE TABLE `sys_company_cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_company_cats`
--

INSERT INTO `sys_company_cats` (`id`, `name`) VALUES
(2, 'Еда'),
(3, 'Отдых'),
(4, 'Развлечения'),
(5, 'Красота и здоровье'),
(6, 'Достопремичательности');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_company_role`
--

CREATE TABLE `sys_company_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_reserve` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_company_role`
--

INSERT INTO `sys_company_role` (`id`, `name`, `is_reserve`) VALUES
(2, 'Ресторан', 0),
(3, 'Кафе', 0),
(4, 'Кофейня', 0),
(5, 'Бар/Паб', 0),
(6, 'Караоке', 0),
(7, 'Доставка еды', 0),
(8, 'Гостиницы/Отели', 1),
(9, 'Санатории', 0),
(10, 'Зоны отдыха', 0),
(11, 'Гостевые дома', 0),
(12, 'Сауны', 0),
(13, 'Ночные клубы', 0),
(14, 'Кинотеатры', 0),
(15, 'Пейнтбол', 0),
(16, 'Сауны', 0),
(17, 'Бассейн', 0),
(18, 'Бильярд', 0),
(19, 'Теннис', 0),
(20, 'Салоны красоты', 0),
(21, 'Парикмахеркие', 0),
(22, 'СПА', 0),
(23, 'Массаж,', 0),
(24, 'Санатории', 0),
(25, 'Спортзаллы', 0),
(26, 'Фитнес', 0),
(27, 'Йога', 0),
(28, 'Достопримечательность', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_company_role_cat`
--

CREATE TABLE `sys_company_role_cat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_company_role_cat`
--

INSERT INTO `sys_company_role_cat` (`id`, `cat_id`, `role_id`) VALUES
(4, 2, 3),
(5, 2, 2),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 3, 8),
(11, 3, 9),
(12, 3, 10),
(13, 3, 11),
(14, 3, 12),
(15, 4, 13),
(16, 4, 14),
(17, 4, 3),
(18, 4, 4),
(19, 4, 15),
(20, 4, 16),
(21, 4, 17),
(22, 4, 18),
(23, 4, 19),
(24, 5, 20),
(25, 5, 21),
(26, 5, 22),
(27, 5, 23),
(28, 5, 24),
(29, 5, 25),
(30, 5, 26),
(31, 5, 27),
(32, 6, 28);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_directory`
--

CREATE TABLE `sys_directory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `can_delete` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_directory`
--

INSERT INTO `sys_directory` (`id`, `name`, `can_delete`, `created_at`, `updated_at`) VALUES
(1, 'Языки', 0, '2017-02-13 06:25:53', '2017-02-13 06:25:53'),
(2, 'Города', 0, '2017-02-13 06:26:00', '2017-02-13 06:26:00'),
(3, 'Темы тикетов', 0, '2017-02-13 06:26:18', '2017-02-13 06:26:18'),
(6, 'Статусы тикетов', 0, '2017-02-13 06:54:19', '2017-02-13 06:54:19');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_directory_names`
--

CREATE TABLE `sys_directory_names` (
  `id` int(11) NOT NULL,
  `sys_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `directory_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_directory_names`
--

INSERT INTO `sys_directory_names` (`id`, `sys_name`, `name`, `directory_id`, `created_at`, `updated_at`) VALUES
(1, 'ru', 'Русский', 1, '2017-02-13 06:44:34', '2017-02-27 05:20:50'),
(3, 'kz', 'Казахский', 1, '2017-02-13 06:46:45', '2017-02-27 05:20:56'),
(4, NULL, 'Создан', 6, '2017-02-13 06:54:53', '2017-02-13 06:54:53'),
(5, NULL, 'В обработке', 6, '2017-02-13 06:55:01', '2017-02-13 06:55:01'),
(6, NULL, 'Обработан', 6, '2017-02-13 06:55:16', '2017-02-13 06:55:16'),
(7, NULL, 'В архиве', 6, '2017-02-13 06:55:20', '2017-02-13 06:55:20'),
(8, NULL, 'Запрос на получение новой роли', 3, '2017-02-13 09:17:36', '2017-02-22 04:44:36'),
(9, 'new_event', 'Запрос на получение нового события', 3, '2017-02-13 09:17:47', '2017-02-28 06:34:51'),
(10, NULL, 'фывфыв', 3, '2017-02-13 09:17:50', '2017-02-13 09:17:50'),
(11, 'ch', 'Китайский', 1, '2017-02-13 10:14:50', '2017-02-27 05:21:05'),
(12, 'en', 'Английский', 1, '2017-02-13 10:15:02', '2017-02-27 05:21:13'),
(15, 'ct3', 'Каталонский', 1, '2017-02-14 11:02:22', '2017-02-27 05:21:22'),
(16, '51.14345176, 71.44592914', 'Астана', 2, '2017-02-17 10:33:34', '2017-02-27 08:35:02'),
(17, '49.8064, 73.0855', 'Караганда', 2, '2017-02-17 10:33:42', '2017-02-27 08:52:16'),
(18, '43.2383,76.9455', 'Алматы', 2, '2017-02-17 10:33:48', '2017-02-27 08:53:10'),
(19, NULL, 'проблтомемы с аккану', 3, '2017-02-24 14:42:12', '2017-02-24 14:42:12');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_filters`
--

CREATE TABLE `sys_filters` (
  `id` int(11) NOT NULL,
  `spec_key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `is_many` tinyint(1) NOT NULL DEFAULT '0',
  `is_fixed` int(11) NOT NULL DEFAULT '0',
  `sort_index` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_filters`
--

INSERT INTO `sys_filters` (`id`, `spec_key`, `name`, `type_id`, `is_many`, `is_fixed`, `sort_index`) VALUES
(3, 'kitchen', 'Кухня', 1, 0, 1, 5000),
(4, 'middle_check', 'Средний счет на человека', 2, 0, 0, 100),
(5, 'payment_type', 'Cпособы оплаты', 1, 0, 1, 150),
(6, 'special', 'Oсобенности ', 1, 0, 0, 200),
(7, 'web_site', 'Cсылка на сайт', 1, 0, 0, 250),
(8, 'parking', 'Парковка', 1, 0, 1, 300),
(9, 'music', 'Музыка', 1, 0, 1, 350),
(10, 'total_place', 'Всего мест', 2, 0, 0, 400),
(11, 'for_children', 'Для детей', 1, 0, 1, 450),
(12, 'for_smoke', 'Для курящих', 1, 0, 1, 500),
(13, 'for_event', 'Подходит для', 1, 1, 1, 550),
(14, 'massage', 'Массаж', 1, 0, 1, 1500),
(15, 'svobodnie', 'Свободные места', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_filter_cats`
--

CREATE TABLE `sys_filter_cats` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_filter_cats`
--

INSERT INTO `sys_filter_cats` (`id`, `filter_id`, `cat_id`) VALUES
(4, 3, 2),
(5, 13, 2),
(6, 4, 2),
(7, 6, 2),
(8, 15, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_filter_names`
--

CREATE TABLE `sys_filter_names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `filter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_filter_names`
--

INSERT INTO `sys_filter_names` (`id`, `name`, `filter_id`) VALUES
(4, 'Казахская', 3),
(5, 'Китайская', 3),
(6, 'Паназиатская', 3),
(7, 'Японская', 3),
(8, 'Наличными', 5),
(10, 'Виза', 5),
(11, 'Мастер карт', 5),
(12, 'Есть', 8),
(13, 'Нет', 8),
(14, 'Есть', 9),
(15, 'Нет', 9),
(16, 'Подходит', 11),
(17, 'Не подходит', 11),
(18, 'Подходит', 12),
(19, 'Не подходит', 12),
(20, 'Свидания', 13),
(21, 'Похорон', 13),
(22, 'Свадеб', 13),
(23, 'Мальшичник', 13),
(24, 'Девишник', 13),
(25, 'День рождения', 13),
(26, 'Корпоратив', 13),
(27, 'Есть', 14),
(28, 'Нету', 14),
(29, 'Есть', 15),
(30, 'Нет', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_filter_role`
--

CREATE TABLE `sys_filter_role` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `sort_index` int(11) DEFAULT '0',
  `show_filter` tinyint(4) DEFAULT '0',
  `in_filter` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_filter_role`
--

INSERT INTO `sys_filter_role` (`id`, `filter_id`, `role_id`, `sort_index`, `show_filter`, `in_filter`) VALUES
(7, 3, 4, 50, 0, 0),
(8, 4, 4, 450, 0, 0),
(9, 5, 4, 500, 0, 0),
(10, 6, 4, 550, 0, 0),
(11, 7, 4, 350, 0, 0),
(12, 8, 4, 300, 0, 0),
(13, 9, 4, 250, 0, 0),
(14, 10, 4, 200, 1, 0),
(15, 11, 4, 150, 0, 0),
(16, 12, 4, 100, 0, 0),
(17, 13, 4, 0, 1, 0),
(18, 14, 12, 0, 0, 0),
(19, 15, 2, 0, 1, 0),
(21, 15, 4, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sys_hash_tags`
--

CREATE TABLE `sys_hash_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_hash_tags`
--

INSERT INTO `sys_hash_tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ghbdtn', '2017-02-13 09:12:39', '2017-02-13 09:12:39'),
(2, 'asdfsdf', '2017-02-13 09:12:43', '2017-02-13 09:12:43'),
(3, 'helllo', '2017-02-13 12:53:02', '0000-00-00 00:00:00'),
(4, ' asdasd', '2017-02-13 12:53:02', '0000-00-00 00:00:00'),
(5, ' asdasd', '2017-02-13 12:53:02', '0000-00-00 00:00:00'),
(6, ' new_soft', '2017-02-13 12:53:48', '2017-02-13 12:53:48'),
(7, 'Привет', '2017-02-28 05:06:33', '2017-02-28 05:06:33'),
(8, ' пока', '2017-02-28 05:06:33', '2017-02-28 05:06:33'),
(9, ' фывафыва', '2017-02-28 05:06:33', '2017-02-28 05:06:33'),
(10, ' пока что то новое', '2017-02-28 05:08:58', '2017-02-28 05:08:58'),
(11, ' ололока', '2017-02-28 10:22:05', '2017-02-28 10:22:05');

-- --------------------------------------------------------

--
-- Структура таблицы `sys_user_types`
--

CREATE TABLE `sys_user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sys_user_types`
--

INSERT INTO `sys_user_types` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'moderators'),
(3, 'company'),
(4, 'visitors');

-- --------------------------------------------------------

--
-- Структура таблицы `taxi`
--

CREATE TABLE `taxi` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `taxi`
--

INSERT INTO `taxi` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Name', '8702498248484484as8d4a4s222', '2017-03-02 04:55:07', '2017-03-02 04:55:13');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `status_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `note`, `status_id`, `cat_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Привет это проевепка', 'фывфыв', 6, 9, 7, '2017-02-13 00:00:00', '2017-02-22 00:00:00'),
(2, 'Привет это проевепка', 'фывфыв', 7, 9, 7, '2017-02-13 00:00:00', '2017-02-13 10:12:34'),
(3, 'Запрос на получение новой роли', 'Запрос на получение роли \"фывфыв\"', 5, 8, 12, '2017-02-22 11:15:45', '2017-02-22 11:17:07'),
(4, 'Запрос на получение новой роли', 'Запрос на получение роли \"Example role translator\"', 6, 8, 13, '2017-02-23 05:36:15', '2017-02-23 10:13:39'),
(5, 'Запрос на получение новой роли', 'Запрос на получение роли \"Example role translator\"', 5, 8, 13, '2017-02-23 09:18:31', '2017-02-24 14:43:07'),
(6, 'Запрос на получение новой роли', 'Запрос на получение роли \"фывфывввв\"', 4, 8, 13, '2017-02-23 09:21:13', '2017-02-23 09:21:13'),
(7, 'Запрос на получение новой роли', 'Запрос на получение роли \"Example role translator\"', 4, 8, 13, '2017-02-23 09:24:42', '2017-02-23 09:24:42'),
(8, 'asdasd', 'sadasdasd', 4, 8, 13, '2017-02-23 10:10:25', '2017-02-23 10:10:25'),
(9, 'asdasdasd', 'dasdasd', 4, 10, 13, '2017-02-23 10:10:33', '2017-02-23 10:10:33'),
(10, 'Запрос на получение новой роли', 'Запрос на получение роли \"Кофейня\"', 4, 8, 13, '2017-02-24 04:43:15', '2017-02-24 04:43:15'),
(11, 'Запрос на получение новой роли', 'Запрос на получение роли \"Караоке\"', 4, 8, 13, '2017-02-24 04:58:12', '2017-02-24 04:58:12'),
(12, 'Запрос на получение новой роли', 'Запрос на получение роли \"Гостиницы/Отели\"', 4, 8, 13, '2017-02-24 05:36:41', '2017-02-24 05:36:41'),
(13, 'Запрос на получение новой роли', 'Запрос на получение роли \"Сауны\"', 4, 8, 13, '2017-02-24 14:35:33', '2017-02-24 14:35:33'),
(14, 'рпоорпро', 'лрглорлор', 4, 19, 13, '2017-02-24 14:42:23', '2017-02-24 14:42:23'),
(15, 'Сауна', 'Хочу добавить сауну', 6, 8, 13, '2017-02-25 08:25:29', '2017-02-25 08:26:20'),
(16, 'Запрос на получение новой роли', 'Запрос на получение роли \"Достопримечательность\"', 4, 8, 13, '2017-02-27 12:27:20', '2017-02-27 12:27:20'),
(17, 'Запрос на получение новой роли', 'Запрос на получение роли \"Салоны красоты\"', 4, 8, 13, '2017-02-27 12:34:07', '2017-02-27 12:34:07'),
(19, 'Запрос на получение нового события', 'Запрос на получение нового события ', 4, 9, 13, '2017-02-28 08:34:25', '2017-02-28 08:34:25'),
(24, 'Запрос на получение нового события', 'Запрос на получение нового события ', 4, 9, 13, '2017-02-28 08:41:18', '2017-02-28 08:41:18'),
(25, 'Запрос на получение нового события', 'Запрос на получение нового события ', 4, 9, 13, '2017-02-28 09:01:35', '2017-02-28 09:01:35'),
(26, 'Запрос на получение нового события', 'Запрос на получение нового события ', 4, 9, 13, '2017-02-28 09:02:54', '2017-02-28 09:02:54'),
(27, 'Запрос на получение нового события', 'Запрос на получение нового события ', 5, 9, 13, '2017-02-28 09:18:14', '2017-03-01 11:55:57');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_answer`
--

CREATE TABLE `ticket_answer` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `note` text,
  `after_status_id` int(11) DEFAULT NULL,
  `before_status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket_answer`
--

INSERT INTO `ticket_answer` (`id`, `ticket_id`, `note`, `after_status_id`, `before_status_id`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 2, 'аывывапывап', 5, 4, 4, '2017-02-13 10:11:05', '2017-02-13 10:11:05'),
(2, 2, 'фывфыв', 5, 5, 4, '2017-02-13 10:11:28', '2017-02-13 10:11:28'),
(3, 2, 'ыфвфывфыв', 5, 5, 4, '2017-02-13 10:12:12', '2017-02-13 10:12:12'),
(4, 2, 'ролдрод', 7, 5, 4, '2017-02-13 10:12:34', '2017-02-13 10:12:34'),
(5, 3, 'Ваш запрос принят в обработку', 5, 4, 4, '2017-02-22 11:17:07', '2017-02-22 11:17:07'),
(6, 4, 'Ваш заказ в обработке', 5, 4, 4, '2017-02-23 05:37:21', '2017-02-23 05:37:21'),
(7, 4, 'asdasdasdasdasd asd asd a sd asd asd', 6, 5, 4, '2017-02-23 10:13:39', '2017-02-23 10:13:39'),
(8, 5, 'ваш заказ в обратике. Закончим в ближайщие 2 часа\r\n', 5, 4, 4, '2017-02-24 14:43:07', '2017-02-24 14:43:07'),
(9, 15, 'ваш запрос принят', 6, 4, 4, '2017-02-25 08:26:20', '2017-02-25 08:26:20'),
(10, 27, 'asdasdasd', 5, 4, 4, '2017-03-01 11:55:57', '2017-03-01 11:55:57'),
(11, 27, 'asdasd', 5, 5, 4, '2017-03-01 11:56:09', '2017-03-01 11:56:09'),
(12, 26, 'sdfsdf', 4, 4, 4, '2017-03-01 11:56:50', '2017-03-01 11:56:50'),
(13, 6, 'dfsdgfdfg', 4, 4, 7, '2017-03-01 12:46:37', '2017-03-01 12:46:37');

-- --------------------------------------------------------

--
-- Структура таблицы `trans_keys`
--

CREATE TABLE `trans_keys` (
  `id` int(11) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trans_keys`
--

INSERT INTO `trans_keys` (`id`, `key`, `name`) VALUES
(36, 'sys_directory_name_1', 'Русский'),
(37, 'sys_directory_name_3', 'Казахский'),
(38, 'sys_directory_name_4', 'Создан'),
(39, 'sys_directory_name_5', 'В обработке'),
(40, 'sys_directory_name_6', 'Обработан'),
(41, 'sys_directory_name_7', 'В архиве'),
(42, 'sys_directory_name_8', 'Регистрация'),
(43, 'sys_directory_name_9', 'Роли'),
(44, 'sys_directory_name_10', 'фывфыв'),
(45, 'sys_directory_name_11', 'Китайский'),
(46, 'sys_directory_name_12', 'Английский'),
(47, 'sys_directory_name_15', 'Каталонский'),
(48, 'sys_directory_name_16', 'Астана'),
(49, 'sys_directory_name_17', 'Караганда'),
(50, 'sys_directory_name_18', 'Алматы'),
(51, 'sys_directory_1', 'Языки'),
(52, 'sys_directory_2', 'Города'),
(53, 'sys_directory_3', 'Темы тикетов'),
(54, 'sys_directory_6', 'Статусы тикетов'),
(55, 'sys_company_cat_2', 'Еда'),
(56, 'sys_company_cat_3', 'Отдых'),
(57, 'sys_company_cat_4', 'Развлечения'),
(58, 'sys_company_cat_5', 'Красота и здоровье'),
(59, 'sys_company_cat_6', 'Достопремичательности'),
(60, 'sys_company_role_2', 'фывфывввв'),
(61, 'sys_company_role_3', 'фывфыв'),
(62, 'sys_company_role_4', 'Example role translator'),
(63, 'sys_company_role_5', 'Бар/Паб'),
(64, 'sys_company_role_6', 'Караоке'),
(65, 'sys_company_role_7', 'Доставка еды'),
(66, 'sys_company_role_8', 'Гостиницы/Отели'),
(67, 'sys_company_role_9', 'Санатории'),
(68, 'sys_company_role_10', 'Зоны отдыха'),
(69, 'sys_company_role_11', 'Гостевые дома'),
(70, 'sys_company_role_12', 'Сауны'),
(71, 'sys_company_role_13', 'Ночные клубы'),
(72, 'sys_company_role_14', 'Кинотеатры'),
(73, 'sys_company_role_15', 'Пейнтбол'),
(74, 'sys_company_role_16', 'Сауны'),
(75, 'sys_company_role_17', 'Бассейн'),
(76, 'sys_company_role_18', 'Бильярд'),
(77, 'sys_company_role_19', 'Теннис'),
(78, 'sys_company_role_20', 'Салоны красоты'),
(79, 'sys_company_role_21', 'Парикмахеркие'),
(80, 'sys_company_role_22', 'СПА'),
(81, 'sys_company_role_23', 'Массаж,'),
(82, 'sys_company_role_24', 'Санатории'),
(83, 'sys_company_role_25', 'Спортзаллы'),
(84, 'sys_company_role_26', 'Фитнес'),
(85, 'sys_company_role_27', 'Йога'),
(86, 'sys_company_role_28', 'Достопримечательность'),
(87, 'sys_directory_name_19', 'проблтомемы с аккану'),
(88, 'new_el', 'tezsadasdasd');

-- --------------------------------------------------------

--
-- Структура таблицы `trans_lib`
--

CREATE TABLE `trans_lib` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `key_id` int(11) DEFAULT NULL,
  `trans_name` text,
  `is_have` tinyint(1) DEFAULT '0',
  `key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trans_lib`
--

INSERT INTO `trans_lib` (`id`, `lang_id`, `key_id`, `trans_name`, `is_have`, `key`) VALUES
(174, 1, 36, NULL, 0, 'sys_directory_name_1'),
(175, 3, 36, NULL, 0, 'sys_directory_name_1'),
(176, 11, 36, NULL, 0, 'sys_directory_name_1'),
(177, 12, 36, NULL, 0, 'sys_directory_name_1'),
(178, 15, 36, NULL, 0, 'sys_directory_name_1'),
(179, 1, 37, NULL, 0, 'sys_directory_name_3'),
(180, 3, 37, NULL, 0, 'sys_directory_name_3'),
(181, 11, 37, NULL, 0, 'sys_directory_name_3'),
(182, 12, 37, NULL, 0, 'sys_directory_name_3'),
(183, 15, 37, NULL, 0, 'sys_directory_name_3'),
(184, 1, 38, NULL, 0, 'sys_directory_name_4'),
(185, 3, 38, NULL, 0, 'sys_directory_name_4'),
(186, 11, 38, NULL, 0, 'sys_directory_name_4'),
(187, 12, 38, NULL, 0, 'sys_directory_name_4'),
(188, 15, 38, NULL, 0, 'sys_directory_name_4'),
(189, 1, 39, NULL, 0, 'sys_directory_name_5'),
(190, 3, 39, NULL, 0, 'sys_directory_name_5'),
(191, 11, 39, NULL, 0, 'sys_directory_name_5'),
(192, 12, 39, NULL, 0, 'sys_directory_name_5'),
(193, 15, 39, NULL, 0, 'sys_directory_name_5'),
(194, 1, 40, NULL, 0, 'sys_directory_name_6'),
(195, 3, 40, NULL, 0, 'sys_directory_name_6'),
(196, 11, 40, NULL, 0, 'sys_directory_name_6'),
(197, 12, 40, NULL, 0, 'sys_directory_name_6'),
(198, 15, 40, NULL, 0, 'sys_directory_name_6'),
(199, 1, 41, NULL, 0, 'sys_directory_name_7'),
(200, 3, 41, NULL, 0, 'sys_directory_name_7'),
(201, 11, 41, NULL, 0, 'sys_directory_name_7'),
(202, 12, 41, NULL, 0, 'sys_directory_name_7'),
(203, 15, 41, NULL, 0, 'sys_directory_name_7'),
(204, 1, 42, NULL, 0, 'sys_directory_name_8'),
(205, 3, 42, NULL, 0, 'sys_directory_name_8'),
(206, 11, 42, NULL, 0, 'sys_directory_name_8'),
(207, 12, 42, NULL, 0, 'sys_directory_name_8'),
(208, 15, 42, NULL, 0, 'sys_directory_name_8'),
(209, 1, 43, NULL, 0, 'sys_directory_name_9'),
(210, 3, 43, NULL, 0, 'sys_directory_name_9'),
(211, 11, 43, NULL, 0, 'sys_directory_name_9'),
(212, 12, 43, NULL, 0, 'sys_directory_name_9'),
(213, 15, 43, NULL, 0, 'sys_directory_name_9'),
(214, 1, 44, NULL, 0, 'sys_directory_name_10'),
(215, 3, 44, NULL, 0, 'sys_directory_name_10'),
(216, 11, 44, NULL, 0, 'sys_directory_name_10'),
(217, 12, 44, NULL, 0, 'sys_directory_name_10'),
(218, 15, 44, NULL, 0, 'sys_directory_name_10'),
(219, 1, 45, NULL, 0, 'sys_directory_name_11'),
(220, 3, 45, NULL, 0, 'sys_directory_name_11'),
(221, 11, 45, NULL, 0, 'sys_directory_name_11'),
(222, 12, 45, NULL, 0, 'sys_directory_name_11'),
(223, 15, 45, NULL, 0, 'sys_directory_name_11'),
(224, 1, 46, NULL, 0, 'sys_directory_name_12'),
(225, 3, 46, NULL, 0, 'sys_directory_name_12'),
(226, 11, 46, NULL, 0, 'sys_directory_name_12'),
(227, 12, 46, NULL, 0, 'sys_directory_name_12'),
(228, 15, 46, NULL, 0, 'sys_directory_name_12'),
(229, 1, 47, NULL, 0, 'sys_directory_name_15'),
(230, 3, 47, NULL, 0, 'sys_directory_name_15'),
(231, 11, 47, NULL, 0, 'sys_directory_name_15'),
(232, 12, 47, NULL, 0, 'sys_directory_name_15'),
(233, 15, 47, NULL, 0, 'sys_directory_name_15'),
(234, 1, 48, NULL, 0, 'sys_directory_name_16'),
(235, 3, 48, NULL, 0, 'sys_directory_name_16'),
(236, 11, 48, NULL, 0, 'sys_directory_name_16'),
(237, 12, 48, NULL, 0, 'sys_directory_name_16'),
(238, 15, 48, NULL, 0, 'sys_directory_name_16'),
(239, 1, 49, NULL, 0, 'sys_directory_name_17'),
(240, 3, 49, NULL, 0, 'sys_directory_name_17'),
(241, 11, 49, NULL, 0, 'sys_directory_name_17'),
(242, 12, 49, NULL, 0, 'sys_directory_name_17'),
(243, 15, 49, NULL, 0, 'sys_directory_name_17'),
(244, 1, 50, NULL, 0, 'sys_directory_name_18'),
(245, 3, 50, NULL, 0, 'sys_directory_name_18'),
(246, 11, 50, NULL, 0, 'sys_directory_name_18'),
(247, 12, 50, NULL, 0, 'sys_directory_name_18'),
(248, 15, 50, NULL, 0, 'sys_directory_name_18'),
(249, 1, 51, NULL, 0, 'sys_directory_1'),
(250, 3, 51, NULL, 0, 'sys_directory_1'),
(251, 11, 51, NULL, 0, 'sys_directory_1'),
(252, 12, 51, NULL, 0, 'sys_directory_1'),
(253, 15, 51, NULL, 0, 'sys_directory_1'),
(254, 1, 52, NULL, 0, 'sys_directory_2'),
(255, 3, 52, NULL, 0, 'sys_directory_2'),
(256, 11, 52, NULL, 0, 'sys_directory_2'),
(257, 12, 52, NULL, 0, 'sys_directory_2'),
(258, 15, 52, NULL, 0, 'sys_directory_2'),
(259, 1, 53, NULL, 0, 'sys_directory_3'),
(260, 3, 53, NULL, 0, 'sys_directory_3'),
(261, 11, 53, NULL, 0, 'sys_directory_3'),
(262, 12, 53, NULL, 0, 'sys_directory_3'),
(263, 15, 53, NULL, 0, 'sys_directory_3'),
(264, 1, 54, NULL, 0, 'sys_directory_6'),
(265, 3, 54, NULL, 0, 'sys_directory_6'),
(266, 11, 54, NULL, 0, 'sys_directory_6'),
(267, 12, 54, NULL, 0, 'sys_directory_6'),
(268, 15, 54, NULL, 0, 'sys_directory_6'),
(269, 1, 55, NULL, 0, 'sys_company_cat_2'),
(270, 3, 55, 'Тамак', 1, 'sys_company_cat_2'),
(271, 11, 55, NULL, 0, 'sys_company_cat_2'),
(272, 12, 55, 'Food', 1, 'sys_company_cat_2'),
(273, 15, 55, NULL, 0, 'sys_company_cat_2'),
(274, 1, 56, NULL, 0, 'sys_company_cat_3'),
(275, 3, 56, 'Демалыс', 1, 'sys_company_cat_3'),
(276, 11, 56, NULL, 0, 'sys_company_cat_3'),
(277, 12, 56, 'Recreation', 1, 'sys_company_cat_3'),
(278, 15, 56, NULL, 0, 'sys_company_cat_3'),
(279, 1, 57, NULL, 0, 'sys_company_cat_4'),
(280, 3, 57, 'Бостандык', 1, 'sys_company_cat_4'),
(281, 11, 57, NULL, 0, 'sys_company_cat_4'),
(282, 12, 57, 'Party time', 1, 'sys_company_cat_4'),
(283, 15, 57, NULL, 0, 'sys_company_cat_4'),
(284, 1, 58, NULL, 0, 'sys_company_cat_5'),
(285, 3, 58, NULL, 0, 'sys_company_cat_5'),
(286, 11, 58, NULL, 0, 'sys_company_cat_5'),
(287, 12, 58, 'Beaty', 1, 'sys_company_cat_5'),
(288, 15, 58, NULL, 0, 'sys_company_cat_5'),
(289, 1, 59, NULL, 0, 'sys_company_cat_6'),
(290, 3, 59, NULL, 0, 'sys_company_cat_6'),
(291, 11, 59, NULL, 0, 'sys_company_cat_6'),
(292, 12, 59, NULL, 0, 'sys_company_cat_6'),
(293, 15, 59, NULL, 0, 'sys_company_cat_6'),
(294, 1, 60, NULL, 0, 'sys_company_role_2'),
(295, 3, 60, NULL, 0, 'sys_company_role_2'),
(296, 11, 60, NULL, 0, 'sys_company_role_2'),
(297, 12, 60, NULL, 0, 'sys_company_role_2'),
(298, 15, 60, NULL, 0, 'sys_company_role_2'),
(299, 1, 61, NULL, 0, 'sys_company_role_3'),
(300, 3, 61, NULL, 0, 'sys_company_role_3'),
(301, 11, 61, NULL, 0, 'sys_company_role_3'),
(302, 12, 61, NULL, 0, 'sys_company_role_3'),
(303, 15, 61, NULL, 0, 'sys_company_role_3'),
(304, 1, 62, NULL, 0, 'sys_company_role_4'),
(305, 3, 62, NULL, 0, 'sys_company_role_4'),
(306, 11, 62, NULL, 0, 'sys_company_role_4'),
(307, 12, 62, NULL, 0, 'sys_company_role_4'),
(308, 15, 62, NULL, 0, 'sys_company_role_4'),
(309, 1, 63, NULL, 0, 'sys_company_role_5'),
(310, 3, 63, NULL, 0, 'sys_company_role_5'),
(311, 11, 63, NULL, 0, 'sys_company_role_5'),
(312, 12, 63, NULL, 0, 'sys_company_role_5'),
(313, 15, 63, NULL, 0, 'sys_company_role_5'),
(314, 1, 64, NULL, 0, 'sys_company_role_6'),
(315, 3, 64, NULL, 0, 'sys_company_role_6'),
(316, 11, 64, NULL, 0, 'sys_company_role_6'),
(317, 12, 64, NULL, 0, 'sys_company_role_6'),
(318, 15, 64, NULL, 0, 'sys_company_role_6'),
(319, 1, 65, NULL, 0, 'sys_company_role_7'),
(320, 3, 65, NULL, 0, 'sys_company_role_7'),
(321, 11, 65, NULL, 0, 'sys_company_role_7'),
(322, 12, 65, NULL, 0, 'sys_company_role_7'),
(323, 15, 65, NULL, 0, 'sys_company_role_7'),
(324, 1, 66, NULL, 0, 'sys_company_role_8'),
(325, 3, 66, NULL, 0, 'sys_company_role_8'),
(326, 11, 66, NULL, 0, 'sys_company_role_8'),
(327, 12, 66, NULL, 0, 'sys_company_role_8'),
(328, 15, 66, NULL, 0, 'sys_company_role_8'),
(329, 1, 67, NULL, 0, 'sys_company_role_9'),
(330, 3, 67, NULL, 0, 'sys_company_role_9'),
(331, 11, 67, NULL, 0, 'sys_company_role_9'),
(332, 12, 67, NULL, 0, 'sys_company_role_9'),
(333, 15, 67, NULL, 0, 'sys_company_role_9'),
(334, 1, 68, NULL, 0, 'sys_company_role_10'),
(335, 3, 68, NULL, 0, 'sys_company_role_10'),
(336, 11, 68, NULL, 0, 'sys_company_role_10'),
(337, 12, 68, NULL, 0, 'sys_company_role_10'),
(338, 15, 68, NULL, 0, 'sys_company_role_10'),
(339, 1, 69, NULL, 0, 'sys_company_role_11'),
(340, 3, 69, NULL, 0, 'sys_company_role_11'),
(341, 11, 69, NULL, 0, 'sys_company_role_11'),
(342, 12, 69, NULL, 0, 'sys_company_role_11'),
(343, 15, 69, NULL, 0, 'sys_company_role_11'),
(344, 1, 70, NULL, 0, 'sys_company_role_12'),
(345, 3, 70, NULL, 0, 'sys_company_role_12'),
(346, 11, 70, NULL, 0, 'sys_company_role_12'),
(347, 12, 70, NULL, 0, 'sys_company_role_12'),
(348, 15, 70, NULL, 0, 'sys_company_role_12'),
(349, 1, 71, NULL, 0, 'sys_company_role_13'),
(350, 3, 71, NULL, 0, 'sys_company_role_13'),
(351, 11, 71, NULL, 0, 'sys_company_role_13'),
(352, 12, 71, NULL, 0, 'sys_company_role_13'),
(353, 15, 71, NULL, 0, 'sys_company_role_13'),
(354, 1, 72, NULL, 0, 'sys_company_role_14'),
(355, 3, 72, NULL, 0, 'sys_company_role_14'),
(356, 11, 72, NULL, 0, 'sys_company_role_14'),
(357, 12, 72, NULL, 0, 'sys_company_role_14'),
(358, 15, 72, NULL, 0, 'sys_company_role_14'),
(359, 1, 73, NULL, 0, 'sys_company_role_15'),
(360, 3, 73, NULL, 0, 'sys_company_role_15'),
(361, 11, 73, NULL, 0, 'sys_company_role_15'),
(362, 12, 73, NULL, 0, 'sys_company_role_15'),
(363, 15, 73, NULL, 0, 'sys_company_role_15'),
(364, 1, 74, NULL, 0, 'sys_company_role_16'),
(365, 3, 74, NULL, 0, 'sys_company_role_16'),
(366, 11, 74, NULL, 0, 'sys_company_role_16'),
(367, 12, 74, NULL, 0, 'sys_company_role_16'),
(368, 15, 74, NULL, 0, 'sys_company_role_16'),
(369, 1, 75, NULL, 0, 'sys_company_role_17'),
(370, 3, 75, NULL, 0, 'sys_company_role_17'),
(371, 11, 75, NULL, 0, 'sys_company_role_17'),
(372, 12, 75, NULL, 0, 'sys_company_role_17'),
(373, 15, 75, NULL, 0, 'sys_company_role_17'),
(374, 1, 76, NULL, 0, 'sys_company_role_18'),
(375, 3, 76, NULL, 0, 'sys_company_role_18'),
(376, 11, 76, NULL, 0, 'sys_company_role_18'),
(377, 12, 76, NULL, 0, 'sys_company_role_18'),
(378, 15, 76, NULL, 0, 'sys_company_role_18'),
(379, 1, 77, NULL, 0, 'sys_company_role_19'),
(380, 3, 77, NULL, 0, 'sys_company_role_19'),
(381, 11, 77, NULL, 0, 'sys_company_role_19'),
(382, 12, 77, NULL, 0, 'sys_company_role_19'),
(383, 15, 77, NULL, 0, 'sys_company_role_19'),
(384, 1, 78, NULL, 0, 'sys_company_role_20'),
(385, 3, 78, NULL, 0, 'sys_company_role_20'),
(386, 11, 78, NULL, 0, 'sys_company_role_20'),
(387, 12, 78, NULL, 0, 'sys_company_role_20'),
(388, 15, 78, NULL, 0, 'sys_company_role_20'),
(389, 1, 79, NULL, 0, 'sys_company_role_21'),
(390, 3, 79, NULL, 0, 'sys_company_role_21'),
(391, 11, 79, NULL, 0, 'sys_company_role_21'),
(392, 12, 79, NULL, 0, 'sys_company_role_21'),
(393, 15, 79, NULL, 0, 'sys_company_role_21'),
(394, 1, 80, NULL, 0, 'sys_company_role_22'),
(395, 3, 80, NULL, 0, 'sys_company_role_22'),
(396, 11, 80, NULL, 0, 'sys_company_role_22'),
(397, 12, 80, NULL, 0, 'sys_company_role_22'),
(398, 15, 80, NULL, 0, 'sys_company_role_22'),
(399, 1, 81, NULL, 0, 'sys_company_role_23'),
(400, 3, 81, NULL, 0, 'sys_company_role_23'),
(401, 11, 81, NULL, 0, 'sys_company_role_23'),
(402, 12, 81, NULL, 0, 'sys_company_role_23'),
(403, 15, 81, NULL, 0, 'sys_company_role_23'),
(404, 1, 82, NULL, 0, 'sys_company_role_24'),
(405, 3, 82, NULL, 0, 'sys_company_role_24'),
(406, 11, 82, NULL, 0, 'sys_company_role_24'),
(407, 12, 82, NULL, 0, 'sys_company_role_24'),
(408, 15, 82, NULL, 0, 'sys_company_role_24'),
(409, 1, 83, NULL, 0, 'sys_company_role_25'),
(410, 3, 83, NULL, 0, 'sys_company_role_25'),
(411, 11, 83, NULL, 0, 'sys_company_role_25'),
(412, 12, 83, NULL, 0, 'sys_company_role_25'),
(413, 15, 83, NULL, 0, 'sys_company_role_25'),
(414, 1, 84, NULL, 0, 'sys_company_role_26'),
(415, 3, 84, NULL, 0, 'sys_company_role_26'),
(416, 11, 84, NULL, 0, 'sys_company_role_26'),
(417, 12, 84, NULL, 0, 'sys_company_role_26'),
(418, 15, 84, NULL, 0, 'sys_company_role_26'),
(419, 1, 85, NULL, 0, 'sys_company_role_27'),
(420, 3, 85, NULL, 0, 'sys_company_role_27'),
(421, 11, 85, NULL, 0, 'sys_company_role_27'),
(422, 12, 85, NULL, 0, 'sys_company_role_27'),
(423, 15, 85, NULL, 0, 'sys_company_role_27'),
(424, 1, 86, NULL, 0, 'sys_company_role_28'),
(425, 3, 86, NULL, 0, 'sys_company_role_28'),
(426, 11, 86, NULL, 0, 'sys_company_role_28'),
(427, 12, 86, NULL, 0, 'sys_company_role_28'),
(428, 15, 86, NULL, 0, 'sys_company_role_28'),
(429, 1, 87, NULL, 0, 'sys_directory_name_19'),
(430, 3, 87, NULL, 0, 'sys_directory_name_19'),
(431, 11, 87, NULL, 0, 'sys_directory_name_19'),
(432, 12, 87, NULL, 0, 'sys_directory_name_19'),
(433, 15, 87, NULL, 0, 'sys_directory_name_19'),
(434, 1, 88, NULL, 0, 'new_el'),
(435, 3, 88, NULL, 0, 'new_el'),
(436, 11, 88, NULL, 0, 'new_el'),
(437, 12, 88, NULL, 0, 'new_el'),
(438, 15, 88, NULL, 0, 'new_el');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `can_enter` tinyint(4) DEFAULT '1',
  `land_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `type_id`, `can_enter`, `land_id`, `created_at`, `updated_at`, `remember_token`) VALUES
(4, 'admin@mail.ru', NULL, '$2y$10$BzCtael6.W2tf.vzOm7RGeNduPP9OI68Pi9vFxFRPoO5hvnTvD7mW', 1, 1, NULL, '2017-02-10 09:59:58', '2017-02-21 06:07:27', 'ObsoItIZb1fSuGcDJP2qvS7u6q2GwWRGVcviYt8UntCj7Exy5vJB5k66mi7O'),
(5, 'hmurich@mail.ru', NULL, '$2y$10$wNL7PN3npnJuEcd/EH.bn.Tg3Nd9/87mXGeLEfdutRbrClSNV1TFi', 1, 1, NULL, '2017-02-10 10:00:24', '2017-02-10 10:00:24', ''),
(7, 'moderator@mail.ru', NULL, '$2y$10$1VwDUiFfY95q3DN2HGKNiOhIRccsm1usfLSsiIGyaHwwo1M1iIq0e', 2, 1, NULL, '2017-02-10 11:14:50', '2017-02-10 11:37:29', 'CYaUdceoFvB5FrJPqCUrWntjL7CkyFxfWaA6px7PbR0T85kxKCtkFBZbwCyT'),
(9, 'company_1@mail.ru', 'company_1', '$2y$10$m1xSJ3rnbCOnlpn/WPgszueIH6JbjCnu5O76VVjnZfgAIIz2.Alg6', 3, 1, NULL, '2017-02-21 06:44:01', '2017-02-21 12:50:30', 'IvSGmCBz07rR9sxCB6GItObdI6E6pwUf8o6lGqoBDiDRIOncGaEGEiYcZQ1Y'),
(10, 'sampe_2@mail.ru', 'sampe_2', '$2y$10$58QFZAPcBWemtli2x/yXyOLebH/FKsAsGqHkw3vzsDgoxY0WObQtu', 3, 1, NULL, '2017-02-21 09:03:04', '2017-02-21 09:36:53', '72Dp0AzjrxPbqZCTPBN0z4Uf3ezaP1njk7nxt25CVe275LQBcJEuiiZH46HI'),
(11, 'sample_3@mail.ru', 'sample_3', '$2y$10$Rjq13HwtRPX/tuDj6Q8...WnszZ5vdXOajAJ8v6mnybfCYVoSHXxO', 3, 1, NULL, '2017-02-21 09:34:28', '2017-02-22 04:57:12', 'SMAzSRgKR0CqfbSlT2CsOls515A1ugRL34TlbMnxTNFzJxzbBguHFC8KJZRa'),
(12, 'hmurich@gmail.com', 'sample_4', '$2y$10$GO8JZfIU0i1ljvTebxB7AetuF1cTZQqpSqS8DNsTYy3LUAqP/LqX6', 3, 1, NULL, '2017-02-22 04:58:53', '2017-02-23 05:35:07', 'szhPBk7Dp5OM2OxBpk32lB4hUug0rzsR8uryLiVwbQbk4OXP39KbSjK4Vk18'),
(13, 'ltewumcu@emltmp.com', 'sample_5', '$2y$10$VPQgWMW9ZqfM6xIRbeU/J.ddokJ3vwiMESTgJsaGkv8aU31WCmBZK', 3, 1, NULL, '2017-02-23 05:35:49', '2017-02-23 05:36:03', 'nKKSNsLuMrvnSeLDGx5ECru5r3jV4v5Xv2g8Kkh4A5avKLAoPfeUodfgLIJ7'),
(14, NULL, NULL, NULL, 4, 1, NULL, '2017-03-01 19:39:16', '2017-03-01 19:39:16', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_forgot_pass`
--

CREATE TABLE `user_forgot_pass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `confirm_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `external_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `email`, `from`, `external_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Бержикеев', NULL, 'mailru', '3162907311033225391', 14, '2017-03-01 19:39:16', '2017-03-01 19:39:16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_comments_user_id2` (`user_id`),
  ADD KEY `FK_comments_object_id` (`object_id`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_company_user_id` (`user_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_events_object_id` (`object_id`);

--
-- Индексы таблицы `mail_send`
--
ALTER TABLE `mail_send`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_moderators_user_id` (`user_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_news_object_id` (`object_id`);

--
-- Индексы таблицы `object_hash_tags`
--
ALTER TABLE `object_hash_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_company_hash_company_id` (`object_id`);

--
-- Индексы таблицы `object_locations`
--
ALTER TABLE `object_locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_company_locations_company_i` (`object_id`);

--
-- Индексы таблицы `object_reserve`
--
ALTER TABLE `object_reserve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_company_reserve_company_id` (`object_id`);

--
-- Индексы таблицы `object_score`
--
ALTER TABLE `object_score`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_object_score_object_id` (`object_id`);

--
-- Индексы таблицы `object_slider`
--
ALTER TABLE `object_slider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_object_slider_object_id` (`object_id`);

--
-- Индексы таблицы `object_special_data`
--
ALTER TABLE `object_special_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_company_special_data_compan` (`object_id`),
  ADD KEY `FK_object_special_data_role_id` (`role_id`),
  ADD KEY `FK_object_special_data_filter_` (`filter_id`);

--
-- Индексы таблицы `object_special_data_val`
--
ALTER TABLE `object_special_data_val`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_object_special_data_val_par` (`parent_id`);

--
-- Индексы таблицы `object_standart_data`
--
ALTER TABLE `object_standart_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_company_standart_data_compa` (`object_id`);

--
-- Индексы таблицы `objetcs`
--
ALTER TABLE `objetcs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_objetcs_user_id` (`user_id`),
  ADD KEY `FK_objetcs_company_id` (`company_id`),
  ADD KEY `FK_objetcs_role_id` (`role_id`),
  ADD KEY `FK_objetcs_city_id` (`city_id`),
  ADD KEY `FK_objetcs_taxi_id` (`taxi_id`);

--
-- Индексы таблицы `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_reserve_object_id` (`object_id`);

--
-- Индексы таблицы `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_site_settings_setting_id` (`key`);

--
-- Индексы таблицы `sys_company_cats`
--
ALTER TABLE `sys_company_cats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `sys_company_role`
--
ALTER TABLE `sys_company_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `sys_company_role_cat`
--
ALTER TABLE `sys_company_role_cat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_sys_company_role_cat_cat_id` (`cat_id`),
  ADD KEY `FK_sys_company_role_cat_role_i` (`role_id`);

--
-- Индексы таблицы `sys_directory`
--
ALTER TABLE `sys_directory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_sys_directory_names_directo` (`directory_id`);

--
-- Индексы таблицы `sys_filters`
--
ALTER TABLE `sys_filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `spec_key` (`spec_key`);

--
-- Индексы таблицы `sys_filter_cats`
--
ALTER TABLE `sys_filter_cats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_sys_filter_cats_filter_id` (`filter_id`),
  ADD KEY `FK_sys_filter_cats_cat_id` (`cat_id`);

--
-- Индексы таблицы `sys_filter_names`
--
ALTER TABLE `sys_filter_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_sys_filter_names_filter_id` (`filter_id`);

--
-- Индексы таблицы `sys_filter_role`
--
ALTER TABLE `sys_filter_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sys_filter_role_filter_id` (`filter_id`),
  ADD KEY `FK_sys_filter_role_role_id` (`role_id`);

--
-- Индексы таблицы `sys_hash_tags`
--
ALTER TABLE `sys_hash_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `sys_user_types`
--
ALTER TABLE `sys_user_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_tickets_user_id2` (`user_id`),
  ADD KEY `FK_tickets_cat_id` (`cat_id`),
  ADD KEY `FK_tickets_status_id` (`status_id`);

--
-- Индексы таблицы `ticket_answer`
--
ALTER TABLE `ticket_answer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_ticket_answer_ticket_id` (`ticket_id`),
  ADD KEY `FK_ticket_answer_user_id` (`user_id`),
  ADD KEY `FK_ticket_answer_after_status_` (`after_status_id`),
  ADD KEY `FK_ticket_answer_before_status` (`before_status_id`);

--
-- Индексы таблицы `trans_keys`
--
ALTER TABLE `trans_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Индексы таблицы `trans_lib`
--
ALTER TABLE `trans_lib`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_trans_lib_lang_id` (`lang_id`),
  ADD KEY `FK_trans_lib_key_id` (`key_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_users_type_id` (`type_id`),
  ADD KEY `FK_users_land_id` (`land_id`);

--
-- Индексы таблицы `user_forgot_pass`
--
ALTER TABLE `user_forgot_pass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_forgot_pass_user_id` (`user_id`);

--
-- Индексы таблицы `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_visitors_user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `mail_send`
--
ALTER TABLE `mail_send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `object_hash_tags`
--
ALTER TABLE `object_hash_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `object_locations`
--
ALTER TABLE `object_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `object_reserve`
--
ALTER TABLE `object_reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `object_score`
--
ALTER TABLE `object_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `object_slider`
--
ALTER TABLE `object_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `object_special_data`
--
ALTER TABLE `object_special_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT для таблицы `object_special_data_val`
--
ALTER TABLE `object_special_data_val`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT для таблицы `object_standart_data`
--
ALTER TABLE `object_standart_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `objetcs`
--
ALTER TABLE `objetcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `sys_company_cats`
--
ALTER TABLE `sys_company_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `sys_company_role`
--
ALTER TABLE `sys_company_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `sys_company_role_cat`
--
ALTER TABLE `sys_company_role_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `sys_directory`
--
ALTER TABLE `sys_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `sys_filters`
--
ALTER TABLE `sys_filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `sys_filter_cats`
--
ALTER TABLE `sys_filter_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `sys_filter_names`
--
ALTER TABLE `sys_filter_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `sys_filter_role`
--
ALTER TABLE `sys_filter_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `sys_hash_tags`
--
ALTER TABLE `sys_hash_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `sys_user_types`
--
ALTER TABLE `sys_user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `taxi`
--
ALTER TABLE `taxi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `ticket_answer`
--
ALTER TABLE `ticket_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `trans_keys`
--
ALTER TABLE `trans_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT для таблицы `trans_lib`
--
ALTER TABLE `trans_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `user_forgot_pass`
--
ALTER TABLE `user_forgot_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comments_user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_company_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_events_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `FK_moderators_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_hash_tags`
--
ALTER TABLE `object_hash_tags`
  ADD CONSTRAINT `FK_company_hash_company_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_locations`
--
ALTER TABLE `object_locations`
  ADD CONSTRAINT `FK_company_locations_company_i` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_reserve`
--
ALTER TABLE `object_reserve`
  ADD CONSTRAINT `FK_company_reserve_company_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_score`
--
ALTER TABLE `object_score`
  ADD CONSTRAINT `FK_object_score_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_slider`
--
ALTER TABLE `object_slider`
  ADD CONSTRAINT `FK_object_slider_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_special_data`
--
ALTER TABLE `object_special_data`
  ADD CONSTRAINT `FK_company_special_data_compan` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_object_special_data_filter_` FOREIGN KEY (`filter_id`) REFERENCES `sys_filters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_object_special_data_role_id` FOREIGN KEY (`role_id`) REFERENCES `sys_company_role` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_special_data_val`
--
ALTER TABLE `object_special_data_val`
  ADD CONSTRAINT `FK_object_special_data_val_par` FOREIGN KEY (`parent_id`) REFERENCES `object_special_data` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `object_standart_data`
--
ALTER TABLE `object_standart_data`
  ADD CONSTRAINT `FK_company_standart_data_compa` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `objetcs`
--
ALTER TABLE `objetcs`
  ADD CONSTRAINT `FK_objetcs_city_id` FOREIGN KEY (`city_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_objetcs_company_id` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_objetcs_role_id` FOREIGN KEY (`role_id`) REFERENCES `sys_company_role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_objetcs_taxi_id` FOREIGN KEY (`taxi_id`) REFERENCES `taxi` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_objetcs_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `FK_reserve_object_id` FOREIGN KEY (`object_id`) REFERENCES `objetcs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sys_company_role_cat`
--
ALTER TABLE `sys_company_role_cat`
  ADD CONSTRAINT `FK_sys_company_role_cat_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `sys_company_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_sys_company_role_cat_role_i` FOREIGN KEY (`role_id`) REFERENCES `sys_company_role` (`id`) ON DELETE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sys_directory_names`
--
ALTER TABLE `sys_directory_names`
  ADD CONSTRAINT `FK_sys_directory_names_directo` FOREIGN KEY (`directory_id`) REFERENCES `sys_directory` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sys_filter_cats`
--
ALTER TABLE `sys_filter_cats`
  ADD CONSTRAINT `FK_sys_filter_cats_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `sys_company_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_sys_filter_cats_filter_id` FOREIGN KEY (`filter_id`) REFERENCES `sys_filters` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sys_filter_names`
--
ALTER TABLE `sys_filter_names`
  ADD CONSTRAINT `FK_sys_filter_names_filter_id` FOREIGN KEY (`filter_id`) REFERENCES `sys_filters` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sys_filter_role`
--
ALTER TABLE `sys_filter_role`
  ADD CONSTRAINT `FK_sys_filter_role_filter_id` FOREIGN KEY (`filter_id`) REFERENCES `sys_filters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_sys_filter_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `sys_company_role` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FK_tickets_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tickets_status_id` FOREIGN KEY (`status_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tickets_user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ticket_answer`
--
ALTER TABLE `ticket_answer`
  ADD CONSTRAINT `FK_ticket_answer_after_status_` FOREIGN KEY (`after_status_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ticket_answer_before_status` FOREIGN KEY (`before_status_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ticket_answer_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ticket_answer_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trans_lib`
--
ALTER TABLE `trans_lib`
  ADD CONSTRAINT `FK_trans_lib_key_id` FOREIGN KEY (`key_id`) REFERENCES `trans_keys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_trans_lib_lang_id` FOREIGN KEY (`lang_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_land_id` FOREIGN KEY (`land_id`) REFERENCES `sys_directory_names` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_users_type_id` FOREIGN KEY (`type_id`) REFERENCES `sys_user_types` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_forgot_pass`
--
ALTER TABLE `user_forgot_pass`
  ADD CONSTRAINT `FK_user_forgot_pass_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `FK_visitors_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
