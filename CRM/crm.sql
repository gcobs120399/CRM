-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-06-01 07:45:27
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `crm`
--

-- --------------------------------------------------------

--
-- 資料表結構 `apparatus`
--

CREATE TABLE `apparatus` (
  `a_id` int(255) UNSIGNED NOT NULL,
  `a_pc` int(11) NOT NULL,
  `a_phone` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `a_month` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `apparatus`
--

INSERT INTO `apparatus` (`a_id`, `a_pc`, `a_phone`, `a_date`, `a_month`) VALUES
(1, 86, 83, '0000-00-00', '一月'),
(2, 89, 88, '0000-00-00', '二月'),
(3, 90, 98, '0000-00-00', '三月'),
(4, 89, 93, '0000-00-00', '四月'),
(5, 100, 106, '0000-00-00', '五月'),
(6, 83, 84, '0000-00-00', '六月'),
(7, 96, 105, '0000-00-00', '七月'),
(8, 106, 104, '0000-00-00', '八月'),
(9, 103, 91, '0000-00-00', '九月'),
(10, 110, 83, '0000-00-00', '十月'),
(11, 95, 106, '0000-00-00', '十一月'),
(12, 102, 92, '0000-00-00', '十二月');

-- --------------------------------------------------------

--
-- 資料表結構 `area`
--

CREATE TABLE `area` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `area` text COLLATE utf8_unicode_ci NOT NULL,
  `a_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `area`
--

INSERT INTO `area` (`a_id`, `area`, `a_people`) VALUES
(1, '北部', 2270),
(2, '中部', 2029),
(3, '南部', 9732),
(4, '東部', 2076),
(5, '外島', 77);

-- --------------------------------------------------------

--
-- 資料表結構 `memberdata`
--

CREATE TABLE `memberdata` (
  `m_id` int(255) NOT NULL,
  `m_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_passwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `m_birthday` date DEFAULT NULL,
  `m_level` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `m_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_login` int(255) UNSIGNED NOT NULL DEFAULT '0',
  `m_logintime` datetime DEFAULT NULL,
  `m_jointime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `memberdata`
--

INSERT INTO `memberdata` (`m_id`, `m_name`, `m_username`, `m_passwd`, `m_sex`, `m_birthday`, `m_level`, `m_email`, `m_url`, `m_phone`, `m_address`, `m_login`, `m_logintime`, `m_jointime`) VALUES
(1, '系統管理員', 'admin', '21232f297a57a5a743894a0e4a801fc3', '男', NULL, 'admin', NULL, NULL, NULL, NULL, 7, '2008-10-21 12:07:13', '2008-10-20 16:36:15'),
(12, '9527', 'gcobs120399', '4f58111f49e05226933bf1122df4a9ae', '女', '1996-01-20', 'admin', 'gcobs120399@gmail.com', '', '', '', 114, '2018-06-01 12:51:27', '2016-07-04 13:18:25'),
(13, '113', 'root12', 'f5948d35adf81357375ec2fe1313259f', '女', '1235-12-23', 'admin', 'gcobs120399@gmail.com', '', '', '', 18, '2016-10-22 09:04:15', '2016-07-04 13:29:24'),
(14, '豐田蘭園', 'b10356019', 'aef24e1def02692cefab5a014a8770d5', '女', '2017-01-03', 'admin', '123@yahoo.com.tw', '', '', '', 115, '2017-12-13 07:50:08', '2016-11-14 18:17:10'),
(15, '萬俟和玉', 'adg257p', '377c92bbe8b81606ed934808d2afa2cc', '女', '1996-07-11', 'admin', 'adg257p@yahoo.com.tw', '', '', '', 1, '2016-11-15 16:41:11', '2016-11-15 16:41:03'),
(16, 'HTML5', 'abcde', '827ccb0eea8a706c4c34a16891f84e7b', '女', '0000-00-00', 'member', 'emppy_miao511311@yahoo.com.tw', '', '', '', 35, '2017-04-11 16:24:59', '2016-11-15 16:46:20'),
(17, 'rybfvevk', 'uqubbetw', '32cc5886dc1fa8c106a02056292c4654', '女', '0000-00-00', 'member', 'sample@email.tst', '1', '555-666-0606', '3137 Laguna Street', 0, NULL, '2017-06-02 13:55:27'),
(18, 'ruskxfcj', 'jxuitvgr', '32cc5886dc1fa8c106a02056292c4654', '男', '0000-00-00', 'member', 'sample@email.tst', '1', '555-666-0606', '3137 Laguna Street', 0, NULL, '2017-06-02 13:55:27');

-- --------------------------------------------------------

--
-- 資料表結構 `mem_attributes`
--

CREATE TABLE `mem_attributes` (
  `mem_id` int(10) UNSIGNED NOT NULL,
  `mem` text COLLATE utf8_unicode_ci NOT NULL,
  `mem_b` int(11) NOT NULL,
  `mem_w` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `mem_attributes`
--

INSERT INTO `mem_attributes` (`mem_id`, `mem`, `mem_b`, `mem_w`) VALUES
(1, '20歲以下', 301, 352),
(2, '21-30', 701, 957),
(3, '31-40', 4660, 5830),
(4, '41-50', 753, 901),
(5, '51以上', 252, 301);

-- --------------------------------------------------------

--
-- 資料表結構 `path`
--

CREATE TABLE `path` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_month` text COLLATE utf8_unicode_ci NOT NULL,
  `p_fb` double NOT NULL,
  `p_momo` double NOT NULL,
  `p_find` double NOT NULL,
  `p_blog` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `path`
--

INSERT INTO `path` (`p_id`, `p_month`, `p_fb`, `p_momo`, `p_find`, `p_blog`) VALUES
(1, '一月', 89.9, 93.6, 88.9, 92.4),
(2, '二月', 91.5, 88.8, 88.8, 93.2),
(3, '三月', 106.4, 98.5, 99.3, 84.5),
(4, '四月', 129.2, 93.4, 101.4, 99.7),
(5, '五月', 134, 106, 117, 92.6),
(6, '六月', 156, 84.5, 98.3, 1.5),
(7, '七月', 135.6, 105, 99, 87.4),
(8, '八月', 148.5, 104.3, 89.6, 90.4),
(9, '九月', 166.4, 91.2, 112.4, 97.6),
(10, '十月', 154.1, 83.5, 95.2, 99.1),
(11, '十一月', 95.6, 106.6, 109.3, 106.8),
(12, '十二月', 105.4, 92.3, 91.2, 89.1);

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `s_id` int(10) UNSIGNED NOT NULL,
  `proudct` text COLLATE utf8_unicode_ci NOT NULL,
  `s_y` int(11) NOT NULL,
  `s_n` int(11) NOT NULL,
  `s_all` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `shop`
--

INSERT INTO `shop` (`s_id`, `proudct`, `s_y`, `s_n`, `s_all`) VALUES
(1, '優寶心', 1629, 652, 3462),
(2, '優寶骨', 1264, 506, 2164),
(3, '優寶睛', 1462, 585, 2834),
(4, '優寶膚', 2158, 863, 4202),
(5, '優寶身', 1390, 556, 2340);

-- --------------------------------------------------------

--
-- 資料表結構 `stay`
--

CREATE TABLE `stay` (
  `s_id` int(10) UNSIGNED NOT NULL,
  `s_month` text COLLATE utf8_unicode_ci NOT NULL,
  `s_count` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `stay`
--

INSERT INTO `stay` (`s_id`, `s_month`, `s_count`) VALUES
(1, '一月', 25),
(2, '二月', 29.9),
(3, '三月', 29.5),
(4, '四月', 30.5),
(5, '五月', 28.4),
(6, '六月', 24.5),
(7, '七月', 25.2),
(8, '八月', 26.5),
(9, '九月', 23.3),
(10, '十月', 24.3),
(11, '十一月', 26.9),
(12, '十二月', 29.6);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `apparatus`
--
ALTER TABLE `apparatus`
  ADD PRIMARY KEY (`a_id`);

--
-- 資料表索引 `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`a_id`);

--
-- 資料表索引 `memberdata`
--
ALTER TABLE `memberdata`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_username` (`m_username`);

--
-- 資料表索引 `mem_attributes`
--
ALTER TABLE `mem_attributes`
  ADD PRIMARY KEY (`mem_id`);

--
-- 資料表索引 `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`s_id`);

--
-- 資料表索引 `stay`
--
ALTER TABLE `stay`
  ADD PRIMARY KEY (`s_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `apparatus`
--
ALTER TABLE `apparatus`
  MODIFY `a_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `area`
--
ALTER TABLE `area`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `memberdata`
--
ALTER TABLE `memberdata`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `mem_attributes`
--
ALTER TABLE `mem_attributes`
  MODIFY `mem_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `path`
--
ALTER TABLE `path`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `stay`
--
ALTER TABLE `stay`
  MODIFY `s_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
