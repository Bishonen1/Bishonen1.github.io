-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 07 2018 г., 16:48
-- Версия сервера: 5.7.14-7-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `host1568985_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_bonus_list`
--

CREATE TABLE `db_bonus_list` (
  `id` int(11) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_chat`
--

CREATE TABLE `db_chat` (
  `id` int(11) NOT NULL,
  `to` varchar(10) NOT NULL,
  `user` char(10) NOT NULL,
  `comment` text CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `time` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_chat_ban`
--

CREATE TABLE `db_chat_ban` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `time_uban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_chat_online`
--

CREATE TABLE `db_chat_online` (
  `user` char(10) NOT NULL,
  `time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition`
--

CREATE TABLE `db_competition` (
  `id` int(11) NOT NULL,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competitioninv`
--

CREATE TABLE `db_competitioninv` (
  `id` int(11) NOT NULL,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `4m` double NOT NULL DEFAULT '0',
  `5m` double NOT NULL DEFAULT '0',
  `6m` double NOT NULL DEFAULT '0',
  `7m` double NOT NULL DEFAULT '0',
  `8m` double NOT NULL DEFAULT '0',
  `9m` double NOT NULL DEFAULT '0',
  `10m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `user_4` varchar(10) NOT NULL,
  `user_5` varchar(10) NOT NULL,
  `user_6` varchar(10) NOT NULL,
  `user_7` varchar(10) NOT NULL,
  `user_8` varchar(10) NOT NULL,
  `user_9` varchar(10) NOT NULL,
  `user_10` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition_users`
--

CREATE TABLE `db_competition_users` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition_usersinv`
--

CREATE TABLE `db_competition_usersinv` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_conabrul`
--

CREATE TABLE `db_conabrul` (
  `id` int(11) NOT NULL,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_conabrul`
--

INSERT INTO `db_conabrul` (`id`, `rules`, `about`, `contacts`) VALUES
(1, '<div class=\"faq\">\r\n<div class=\"faq_question\"><span><strong>Общие положения.</strong></span></div>\r\n<div class=\"faq_answer\">\r\n<p><span>1.</span>&nbsp;Регистрируясь в проекте вы соглашайтесь с этими правилами.<br /><span>2.</span>&nbsp;Принимать участие в проекте НУ ПОГОДИ! могут только лица, достигшие гражданской дееспособности по законодательству страны своей резиденции. Все последствия неисполнения данного условия возлагаются на участника.<br /><span>3.</span>&nbsp;Администрация игры не несёт ответственности за возможный взлом Вашего аккаунта, так как разработчиками игры приняты все меры по защите личных данных пользователей, вероятность утечки данных равна нулю.<br /><span>4.</span>&nbsp;Администрация гарантирует защиту личных данных пользователей, а так же выплату&nbsp;<strong>минимум 120% резерва</strong>&nbsp;проекта.<br /><span>5.</span>&nbsp;Администрация гарантирует оказание своевременной технической помощи в максимальный срок 24 часа(сутки).<br /><span>6.</span>&nbsp;Администрация гарантирует выплаты в полном объеме(за исключением комиссии платежных агрегаторов), а так же отсутствие каких либо ограничений на выплату заработанных денег в проекте.</p>\r\n<p><strong>Запрещено.</strong></p>\r\n</div>\r\n</div>\r\n<div class=\"faq\">\r\n<div class=\"faq_answer\">\r\n<p><span>1.</span>&nbsp;Размещать любую коммерческую рекламу, коммерческие предложения, агитационные материалы, распространять спам, сообщения-цепочки (сообщения, требующие их передачи одному или нескольким пользователям), схемы финансовых пирамид или призывы в них участвовать, любую другую навязчивую информацию.<br /><span>2.</span>&nbsp;Использовать ошибки, недоработки, уязвимости сайта для получения преимуществ в проекте и улучшения характеристик или для получения денежных средств других участников проекта.<br /><span>3.</span>&nbsp;Совершать действия противоречащие общепринятым моральным нормам.<br /><span>4.</span>&nbsp;Создавать более 1-го аккаунта.<br /><span>5.</span>&nbsp;Использовать автоматические средства для улучшения характеристик, например сборщики бонусов.<br /><span>6.</span>&nbsp;Попрошайничать.<br /><span>7.</span>&nbsp;Использовать в имени (Логине) или в имени (Псевдониме) Пользователя любые слова или словосочетания (выполненные на любом языке мира, в любой транслитерации, независимо от регистра (строчные или заглавные буквы), независимо от дизайна и шрифта), которые вводят в заблуждение (или могут ввести в заблуждение) других пользователей Сайта относительно наличия у данного Пользователя возможностей (полномочий и прав) по управлению (модерации) Сайтом (или отдельными разделами или функциями или содержимым Сайта). Например, запрещены логины и псевдонимы Пользователей такие как: &laquo;Администратор&raquo;, &laquo;Модератор&raquo;, &laquo;Гейм Мастер&raquo;, &laquo;МегаAdmin&raquo;, &laquo;Super Admin&raquo; и любые иные слова или словосочетания, являющиеся производными от перечисленных слов, а также любые иные слова или словосочетания, описание которых приведено в настоящем пункте ПС.</p>\r\n</div>\r\n</div>\r\n<p><span><strong>Последнее редактирование правил проекта 01.01.2016.</strong></span></p>', '<p><strong> <span style=\"color: #00aed2; font-family: cyrillichover; font-size: 15pt; text-shadow: #000 0 1px 1px;\"><strong><span style=\"color: red;\">Действующие Акции Проекта:</span> </strong></span></strong></p>\r\n<table border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\" valign=\"center\">\r\n<div><img src=\"img/chel.png\" alt=\"\" width=\"150\" height=\"250\" /></div>\r\n</td>\r\n<td valign=\"top\">\r\n<div class=\"bko\"><span style=\"color: #ffc400; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong>Сразу после регистрации<span style=\"color: red;\"> +50 рублей</span> в подарок!<br /></strong></span><br /> <span style=\"color: #00aed2; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong><span style=\"color: red;\">АКЦИЯ:</span> При каждом пополнении свыше 100 руб.<br /> + 10% в подарок!<br /></strong></span> <span style=\"color: #00aed2; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong><span style=\"color: red;\">АКЦИЯ:</span> При каждом пополнении свыше 1000 руб. + 15% в подарок!</strong></span><br /> <span style=\"color: #00aed2; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong><span style=\"color: red;\">АКЦИЯ:</span> При каждом пополнении свыше 5000 руб. + 20% в подарок!</strong></span><br /> <span style=\"color: #00aed2; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong><span style=\"color: red;\">АКЦИЯ:</span> При каждом пополнении свыше 10000 руб. + 25% в подарок!<br /></strong></span> <span style=\"color: #5cd216; font-family: cyrillichover; margin-top: 10px; font-size: 14pt; text-shadow: #000 0 1px 1px;\"><strong>Реферальная программа<span style=\"color: red;\"> 10%</span> на вывод!<br /></strong></span></div>\r\n</td>\r\n<td valign=\"top\">&nbsp;</td>\r\n<td align=\"center\" valign=\"center\">\r\n<div><img src=\"img/chiksa.png\" alt=\"\" width=\"170\" height=\"250\" /></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr />\r\n<p><br /><strong> <span style=\"color: #ff6600; font-family: cyrillichover; font-size: 15pt; text-shadow: #000 0 1px 1px;\"><strong>Модельный ряд Аттракционов: </strong></span></strong></p>\r\n<script src=\"https://yourjavascript.com/21139232152/bxslider.min.js\" type=\"text/javascript\"></script>\r\n<div id=\"slider_cont\">\r\n<div id=\"slider1\">\r\n<div><!----><!----> \r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<!----><!---->\r\n<td align=\"center\">\r\n<div class=\"fr-block3\">\r\n<div class=\"fr-te-gr-title\"><span style=\"color: #000000;\"><strong>1) Батут Детский</strong></span></div>\r\n<div><img src=\"img/fruit/batut.png\" alt=\"\" /></div>\r\n<!--\r\n<div id=\"example3\" style=\" display: none; \" _mce_style=\"display: none;\">-->\r\n<div class=\"fr-te-gr\"><strong>Цена:</strong> <span style=\"color: #000000;\">Ставим цену <img src=\"img/fruit/serebro.png\" alt=\"\" width=\"15\" height=\"15\" /></span></div>\r\n<div class=\"fr-te-gr\"><strong>Прибыли: </strong><span style=\"color: #000000;\">Ставим прибыль <img src=\"img/fruit/zoloto.png\" alt=\"\" width=\"15\" height=\"15\" /> в час</span></div>\r\n</div>\r\n<!--</div>\r\n--></td>\r\n<!----><!----> <!----><!---->\r\n<td align=\"center\">\r\n<div class=\"fr-block3\">\r\n<div class=\"fr-te-gr-title\"><span style=\"color: #000000;\"><strong>2) Карусель Лошадки</strong></span></div>\r\n<div><img src=\"img/fruit/karusel1.png\" alt=\"\" /></div>\r\n<!--\r\n<div id=\"example4\" style=\" display: none; \" _mce_style=\"display: none;\">-->\r\n<div class=\"fr-te-gr\"><strong>Цена:</strong> <span style=\"color: #000000;\">Ставим цену <img src=\"img/fruit/serebro.png\" alt=\"\" width=\"15\" height=\"15\" /></span></div>\r\n<div class=\"fr-te-gr\"><strong>Прибыли: </strong><span style=\"color: #000000;\">Ставим прибыль <img src=\"img/fruit/zoloto.png\" alt=\"\" width=\"15\" height=\"15\" /> в час</span></div>\r\n</div>\r\n<!--</div>\r\n--></td>\r\n<!----><!----> <!----><!---->\r\n<td align=\"center\">\r\n<div class=\"fr-block3\">\r\n<div class=\"fr-te-gr-title\"><span style=\"color: #000000;\"><strong>3) Карусель Самолетик</strong></span></div>\r\n<div><img src=\"img/fruit/karusel2.png\" alt=\"\" /></div>\r\n<!--\r\n<div id=\"example4\" style=\" display: none; \" _mce_style=\"display: none;\">-->\r\n<div class=\"fr-te-gr\"><strong>Цена:</strong> <span style=\"color: #000000;\">Ставим цену <img src=\"img/fruit/serebro.png\" alt=\"\" width=\"15\" height=\"15\" /></span></div>\r\n<div class=\"fr-te-gr\"><strong>Прибыли: </strong><span style=\"color: #000000;\">Ставим прибыль <img src=\"img/fruit/zoloto.png\" alt=\"\" width=\"15\" height=\"15\" /> в час</span></div>\r\n</div>\r\n<!--</div>\r\n--></td>\r\n<!----><!----> <!----><!---->\r\n<td align=\"center\">\r\n<div class=\"fr-block3\">\r\n<div class=\"fr-te-gr-title\"><span style=\"color: #000000;\"><strong>4) Карусель Вертушка</strong></span></div>\r\n<div><img src=\"img/fruit/karusel3.png\" alt=\"\" /></div>\r\n<!--\r\n<div id=\"example4\" style=\" display: none; \" _mce_style=\"display: none;\">-->\r\n<div class=\"fr-te-gr\"><strong>Цена:</strong> <span style=\"color: #000000;\">Ставим цену <img src=\"img/fruit/serebro.png\" alt=\"\" width=\"15\" height=\"15\" /></span></div>\r\n<div class=\"fr-te-gr\"><strong>Прибыли: </strong><span style=\"color: #000000;\">Ставим прибыль <img src=\"img/fruit/zoloto.png\" alt=\"\" width=\"15\" height=\"15\" /> в час</span></div>\r\n</div>\r\n<!--</div>\r\n--></td>\r\n<!----><!---->\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div><!----><!----> \r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<!----><!---->\r\n<td align=\"center\">\r\n<div class=\"fr-block3\">\r\n<div class=\"fr-te-gr-title\"><span style=\"color: #000000;\"><strong>5) Ларек Журнал</strong></span></div>\r\n<div><img src=\"img/fruit/larek.png\" alt=\"\" /></div>\r\n<!--\r\n<div id=\"example3\" style=\" display: none; \" _mce_style=\"display: none;\">-->\r\n<div class=\"fr-te-gr\"><strong>Цена:</strong> <span style=\"color: #000000;\">Ставим цену <img src=\"img/fruit/serebro.png\" alt=\"\" width=\"15\" height=\"15\" /></span></div>\r\n<div class=\"fr-te-gr\"><strong>Прибыли: </strong><span style=\"color: #000000;\">Ставим прибыль <img src=\"img/fruit/zoloto.png\" alt=\"\" width=\"15\" height=\"15\" /> в час</span></div>\r\n</div>\r\n<!--</div>\r\n--></td>\r\n<!----><!---->\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '<p style=\"text-align: center;\"><strong>Если у Вас возникла какая-либо проблема, связанная</strong></p>\r\n<p style=\"text-align: center;\"><strong>с нашим&nbsp;проектом, напишите нам на почту&nbsp;<span style=\"text-decoration: underline; color: #ff0000;\">support@ваш сайт.ру</span></strong></p>\r\n<p style=\"text-align: center;\"><strong>Обязательно пишите нам с почты, которая &nbsp;является&nbsp;Вашим</strong></p>\r\n<p style=\"text-align: center;\"><strong>логином на проекте.&nbsp;</strong></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `db_config`
--

CREATE TABLE `db_config` (
  `id` int(11) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `ser_per_wmz` int(11) NOT NULL DEFAULT '3300',
  `ser_per_wme` int(11) NOT NULL DEFAULT '4200',
  `percent_swap` int(11) NOT NULL DEFAULT '0',
  `percent_sell` int(2) NOT NULL DEFAULT '10',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `a_in_h` int(11) NOT NULL DEFAULT '0',
  `b_in_h` int(11) NOT NULL DEFAULT '0',
  `c_in_h` int(11) NOT NULL DEFAULT '0',
  `d_in_h` int(11) NOT NULL DEFAULT '0',
  `e_in_h` int(11) NOT NULL DEFAULT '0',
  `f_in_h` int(11) NOT NULL DEFAULT '0',
  `g_in_h` int(11) NOT NULL DEFAULT '0',
  `h_in_h` int(11) NOT NULL DEFAULT '0',
  `i_in_h` int(11) NOT NULL DEFAULT '0',
  `j_in_h` int(11) NOT NULL DEFAULT '0',
  `k_in_h` int(11) NOT NULL DEFAULT '0',
  `l_in_h` int(11) NOT NULL DEFAULT '0',
  `m_in_h` int(11) NOT NULL DEFAULT '0',
  `n_in_h` int(11) NOT NULL DEFAULT '0',
  `o_in_h` int(11) NOT NULL DEFAULT '0',
  `p_in_h` int(11) NOT NULL DEFAULT '0',
  `q_in_h` int(11) NOT NULL DEFAULT '0',
  `r_in_h` int(11) NOT NULL DEFAULT '0',
  `s_in_h` int(11) NOT NULL DEFAULT '0',
  `t_in_h` int(11) NOT NULL DEFAULT '0',
  `u_in_h` int(11) NOT NULL DEFAULT '0',
  `v_in_h` int(11) NOT NULL DEFAULT '0',
  `w_in_h` int(11) NOT NULL DEFAULT '0',
  `x_in_h` int(11) NOT NULL DEFAULT '0',
  `y_in_h` int(11) NOT NULL DEFAULT '0',
  `z_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_a_t` int(11) NOT NULL DEFAULT '0',
  `amount_b_t` int(11) NOT NULL DEFAULT '0',
  `amount_c_t` int(11) NOT NULL DEFAULT '0',
  `amount_d_t` int(11) NOT NULL DEFAULT '0',
  `amount_e_t` int(11) NOT NULL DEFAULT '0',
  `amount_f_t` int(11) NOT NULL DEFAULT '0',
  `amount_g_t` int(11) NOT NULL DEFAULT '0',
  `amount_h_t` int(11) NOT NULL DEFAULT '0',
  `amount_i_t` int(11) NOT NULL DEFAULT '0',
  `amount_j_t` int(11) NOT NULL DEFAULT '0',
  `amount_k_t` int(11) NOT NULL DEFAULT '0',
  `amount_l_t` int(11) NOT NULL DEFAULT '0',
  `amount_m_t` int(11) NOT NULL DEFAULT '0',
  `amount_n_t` int(11) NOT NULL DEFAULT '0',
  `amount_o_t` int(11) NOT NULL DEFAULT '0',
  `amount_p_t` int(11) NOT NULL DEFAULT '0',
  `amount_q_t` int(11) NOT NULL DEFAULT '0',
  `amount_r_t` int(11) NOT NULL DEFAULT '0',
  `amount_s_t` int(11) NOT NULL DEFAULT '0',
  `amount_t_t` int(11) NOT NULL DEFAULT '0',
  `amount_u_t` int(11) NOT NULL DEFAULT '0',
  `amount_v_t` int(11) NOT NULL DEFAULT '0',
  `amount_w_t` int(11) NOT NULL DEFAULT '0',
  `amount_x_t` int(11) NOT NULL DEFAULT '0',
  `amount_y_t` int(11) NOT NULL DEFAULT '0',
  `amount_z_t` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_games_kamikadze`
--

CREATE TABLE `db_games_kamikadze` (
  `id` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) COLLATE cp1251_bin NOT NULL,
  `date` int(11) NOT NULL,
  `sum` int(10) NOT NULL,
  `stavka` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert_money`
--

CREATE TABLE `db_insert_money` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery`
--

CREATE TABLE `db_lottery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery_winners`
--

CREATE TABLE `db_lottery_winners` (
  `id` int(11) NOT NULL,
  `user_a` varchar(10) NOT NULL,
  `bil_a` int(11) NOT NULL DEFAULT '0',
  `user_b` varchar(10) NOT NULL,
  `bil_b` int(11) NOT NULL DEFAULT '0',
  `user_c` varchar(10) NOT NULL,
  `bil_c` int(11) NOT NULL DEFAULT '0',
  `bank` float NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--

CREATE TABLE `db_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_otziv`
--

CREATE TABLE `db_otziv` (
  `id` int(11) NOT NULL,
  `login` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `neg` int(1) NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `db_payeer_insert`
--

CREATE TABLE `db_payeer_insert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_payment`
--

CREATE TABLE `db_payment` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_penny`
--

CREATE TABLE `db_penny` (
  `id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `sum` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `win` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_recovery`
--

CREATE TABLE `db_recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_regkey`
--

CREATE TABLE `db_regkey` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sell_items`
--

CREATE TABLE `db_sell_items` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `f_s` int(11) NOT NULL DEFAULT '0',
  `g_s` int(11) NOT NULL DEFAULT '0',
  `h_s` int(11) NOT NULL DEFAULT '0',
  `i_s` int(11) NOT NULL DEFAULT '0',
  `j_s` int(11) NOT NULL DEFAULT '0',
  `k_s` int(11) NOT NULL DEFAULT '0',
  `l_s` int(11) NOT NULL DEFAULT '0',
  `m_s` int(11) NOT NULL DEFAULT '0',
  `n_s` int(11) NOT NULL DEFAULT '0',
  `o_s` int(11) NOT NULL DEFAULT '0',
  `p_s` int(11) NOT NULL DEFAULT '0',
  `q_s` int(11) NOT NULL DEFAULT '0',
  `r_s` int(11) NOT NULL DEFAULT '0',
  `s_s` int(11) NOT NULL DEFAULT '0',
  `t_s` int(11) NOT NULL DEFAULT '0',
  `u_s` int(11) NOT NULL DEFAULT '0',
  `v_s` int(11) NOT NULL DEFAULT '0',
  `w_s` int(11) NOT NULL DEFAULT '0',
  `x_s` int(11) NOT NULL DEFAULT '0',
  `y_s` int(11) NOT NULL DEFAULT '0',
  `z_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sender`
--

CREATE TABLE `db_sender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_serfing`
--

CREATE TABLE `db_serfing` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `time_add` int(11) NOT NULL DEFAULT '0',
  `title` varchar(55) NOT NULL,
  `desc` varchar(55) NOT NULL,
  `url` varchar(255) NOT NULL,
  `timer` enum('20','30','40','50','60') NOT NULL DEFAULT '20',
  `move` enum('0','1','','') NOT NULL DEFAULT '0',
  `high` enum('0','1','','') NOT NULL DEFAULT '0',
  `speed` enum('1','2','3','4','5','6','7') NOT NULL DEFAULT '1',
  `baner` enum('0','1','','') NOT NULL,
  `baner_url` varchar(250) NOT NULL,
  `crev` enum('0','1','','') NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_serfing_view`
--

CREATE TABLE `db_serfing_view` (
  `id` int(11) NOT NULL,
  `ident` int(11) NOT NULL DEFAULT '0',
  `time_add` datetime NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--

CREATE TABLE `db_stats` (
  `id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_btree`
--

CREATE TABLE `db_stats_btree` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_swap_ser`
--

CREATE TABLE `db_swap_ser` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_a`
--

CREATE TABLE `db_users_a` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `chat_moder` int(1) NOT NULL,
  `rating` double NOT NULL,
  `ava` varchar(55) NOT NULL,
  `name` varchar(25) NOT NULL,
  `pol` int(1) NOT NULL,
  `purse` varchar(9) NOT NULL,
  `ban_chat` int(1) NOT NULL DEFAULT '0',
  `hide` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_b`
--

CREATE TABLE `db_users_b` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `money_b` double NOT NULL DEFAULT '0',
  `money_p` double NOT NULL DEFAULT '0',
  `a_t` int(11) NOT NULL DEFAULT '0',
  `b_t` int(11) NOT NULL DEFAULT '0',
  `c_t` int(11) NOT NULL DEFAULT '0',
  `d_t` int(11) NOT NULL DEFAULT '0',
  `e_t` int(11) NOT NULL DEFAULT '0',
  `f_t` int(11) NOT NULL DEFAULT '0',
  `g_t` int(11) NOT NULL DEFAULT '0',
  `h_t` int(11) NOT NULL DEFAULT '0',
  `i_t` int(11) NOT NULL DEFAULT '0',
  `j_t` int(11) NOT NULL DEFAULT '0',
  `k_t` int(11) NOT NULL DEFAULT '0',
  `l_t` int(11) NOT NULL DEFAULT '0',
  `m_t` int(11) NOT NULL DEFAULT '0',
  `n_t` int(11) NOT NULL DEFAULT '0',
  `o_t` int(11) NOT NULL DEFAULT '0',
  `p_t` int(11) NOT NULL DEFAULT '0',
  `q_t` int(11) NOT NULL DEFAULT '0',
  `r_t` int(11) NOT NULL DEFAULT '0',
  `s_t` int(11) NOT NULL DEFAULT '0',
  `t_t` int(11) NOT NULL DEFAULT '0',
  `u_t` int(11) NOT NULL DEFAULT '0',
  `v_t` int(11) NOT NULL DEFAULT '0',
  `w_t` int(11) NOT NULL DEFAULT '0',
  `x_t` int(11) NOT NULL DEFAULT '0',
  `y_t` int(11) NOT NULL DEFAULT '0',
  `z_t` int(11) NOT NULL DEFAULT '0',
  `a_b` int(11) NOT NULL DEFAULT '0',
  `b_b` int(11) NOT NULL DEFAULT '0',
  `c_b` int(11) NOT NULL DEFAULT '0',
  `d_b` int(11) NOT NULL DEFAULT '0',
  `e_b` int(11) NOT NULL DEFAULT '0',
  `f_b` int(11) NOT NULL DEFAULT '0',
  `g_b` int(11) NOT NULL DEFAULT '0',
  `h_b` int(11) NOT NULL DEFAULT '0',
  `i_b` int(11) NOT NULL DEFAULT '0',
  `j_b` int(11) NOT NULL DEFAULT '0',
  `k_b` int(11) NOT NULL DEFAULT '0',
  `l_b` int(11) NOT NULL DEFAULT '0',
  `m_b` int(11) NOT NULL DEFAULT '0',
  `n_b` int(11) NOT NULL DEFAULT '0',
  `o_b` int(11) NOT NULL DEFAULT '0',
  `p_b` int(11) NOT NULL DEFAULT '0',
  `q_b` int(11) NOT NULL DEFAULT '0',
  `r_b` int(11) NOT NULL DEFAULT '0',
  `s_b` int(11) NOT NULL DEFAULT '0',
  `t_b` int(11) NOT NULL DEFAULT '0',
  `u_b` int(11) NOT NULL DEFAULT '0',
  `v_b` int(11) NOT NULL DEFAULT '0',
  `w_b` int(11) NOT NULL DEFAULT '0',
  `x_b` int(11) NOT NULL DEFAULT '0',
  `y_b` int(11) NOT NULL DEFAULT '0',
  `z_b` int(11) NOT NULL DEFAULT '0',
  `all_time_a` int(11) NOT NULL DEFAULT '0',
  `all_time_b` int(11) NOT NULL DEFAULT '0',
  `all_time_c` int(11) NOT NULL DEFAULT '0',
  `all_time_d` int(11) NOT NULL DEFAULT '0',
  `all_time_e` int(11) NOT NULL DEFAULT '0',
  `all_time_f` int(11) NOT NULL DEFAULT '0',
  `all_time_g` int(11) NOT NULL DEFAULT '0',
  `all_time_h` int(11) NOT NULL DEFAULT '0',
  `all_time_i` int(11) NOT NULL DEFAULT '0',
  `all_time_j` int(11) NOT NULL DEFAULT '0',
  `all_time_k` int(11) NOT NULL DEFAULT '0',
  `all_time_l` int(11) NOT NULL DEFAULT '0',
  `all_time_m` int(11) NOT NULL DEFAULT '0',
  `all_time_n` int(11) NOT NULL DEFAULT '0',
  `all_time_o` int(11) NOT NULL DEFAULT '0',
  `all_time_p` int(11) NOT NULL DEFAULT '0',
  `all_time_q` int(11) NOT NULL DEFAULT '0',
  `all_time_r` int(11) NOT NULL DEFAULT '0',
  `all_time_s` int(11) NOT NULL DEFAULT '0',
  `all_time_t` int(11) NOT NULL DEFAULT '0',
  `all_time_u` int(11) NOT NULL DEFAULT '0',
  `all_time_v` int(11) NOT NULL DEFAULT '0',
  `all_time_w` int(11) NOT NULL DEFAULT '0',
  `all_time_x` int(11) NOT NULL DEFAULT '0',
  `all_time_y` int(11) NOT NULL DEFAULT '0',
  `all_time_z` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `payment_sum` double NOT NULL DEFAULT '0',
  `insert_sum` double NOT NULL DEFAULT '0',
  `purse` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_vote_otziv`
--

CREATE TABLE `db_vote_otziv` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `dislike` int(12) NOT NULL,
  `oklike` int(12) NOT NULL,
  `id_news` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_aukcion_game`
--

CREATE TABLE `tb_aukcion_game` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` int(11) NOT NULL,
  `timers` int(11) NOT NULL,
  `among` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_aukcion_game_stats`
--

CREATE TABLE `tb_aukcion_game_stats` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` int(11) NOT NULL,
  `among` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_chat`
--
ALTER TABLE `db_chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_chat_ban`
--
ALTER TABLE `db_chat_ban`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competition`
--
ALTER TABLE `db_competition`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competitioninv`
--
ALTER TABLE `db_competitioninv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competition_users`
--
ALTER TABLE `db_competition_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competition_usersinv`
--
ALTER TABLE `db_competition_usersinv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_conabrul`
--
ALTER TABLE `db_conabrul`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_config`
--
ALTER TABLE `db_config`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_games_kamikadze`
--
ALTER TABLE `db_games_kamikadze`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_insert_money`
--
ALTER TABLE `db_insert_money`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_lottery`
--
ALTER TABLE `db_lottery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_news`
--
ALTER TABLE `db_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_otziv`
--
ALTER TABLE `db_otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_payment`
--
ALTER TABLE `db_payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_penny`
--
ALTER TABLE `db_penny`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_recovery`
--
ALTER TABLE `db_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`);

--
-- Индексы таблицы `db_regkey`
--
ALTER TABLE `db_regkey`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `db_sell_items`
--
ALTER TABLE `db_sell_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_sender`
--
ALTER TABLE `db_sender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_serfing`
--
ALTER TABLE `db_serfing`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_serfing_view`
--
ALTER TABLE `db_serfing_view`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_stats`
--
ALTER TABLE `db_stats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_users_a`
--
ALTER TABLE `db_users_a`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_users_b`
--
ALTER TABLE `db_users_b`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_vote_otziv`
--
ALTER TABLE `db_vote_otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_aukcion_game`
--
ALTER TABLE `tb_aukcion_game`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_aukcion_game_stats`
--
ALTER TABLE `tb_aukcion_game_stats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_chat`
--
ALTER TABLE `db_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `db_chat_ban`
--
ALTER TABLE `db_chat_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_competition`
--
ALTER TABLE `db_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `db_competitioninv`
--
ALTER TABLE `db_competitioninv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_competition_users`
--
ALTER TABLE `db_competition_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_competition_usersinv`
--
ALTER TABLE `db_competition_usersinv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_conabrul`
--
ALTER TABLE `db_conabrul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_config`
--
ALTER TABLE `db_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_games_kamikadze`
--
ALTER TABLE `db_games_kamikadze`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_insert_money`
--
ALTER TABLE `db_insert_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_lottery`
--
ALTER TABLE `db_lottery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_news`
--
ALTER TABLE `db_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_otziv`
--
ALTER TABLE `db_otziv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_payment`
--
ALTER TABLE `db_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_penny`
--
ALTER TABLE `db_penny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_recovery`
--
ALTER TABLE `db_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_regkey`
--
ALTER TABLE `db_regkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_sell_items`
--
ALTER TABLE `db_sell_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_sender`
--
ALTER TABLE `db_sender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_serfing`
--
ALTER TABLE `db_serfing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_serfing_view`
--
ALTER TABLE `db_serfing_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_stats`
--
ALTER TABLE `db_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_users_a`
--
ALTER TABLE `db_users_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `db_users_b`
--
ALTER TABLE `db_users_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `db_vote_otziv`
--
ALTER TABLE `db_vote_otziv`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tb_aukcion_game`
--
ALTER TABLE `tb_aukcion_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tb_aukcion_game_stats`
--
ALTER TABLE `tb_aukcion_game_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
