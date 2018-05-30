-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-30 12:00:12
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
(12, '9527', 'gcobs120399', '4f58111f49e05226933bf1122df4a9ae', '女', '1996-01-20', 'admin', 'gcobs120399@gmail.com', '', '', '', 92, '2018-05-30 16:31:29', '2016-07-04 13:18:25'),
(13, '113', 'root12', 'f5948d35adf81357375ec2fe1313259f', '女', '1235-12-23', 'admin', 'gcobs120399@gmail.com', '', '', '', 18, '2016-10-22 09:04:15', '2016-07-04 13:29:24'),
(14, '豐田蘭園', 'b10356019', 'aef24e1def02692cefab5a014a8770d5', '女', '2017-01-03', 'member', '123@yahoo.com.tw', '', '', '', 115, '2017-12-13 07:50:08', '2016-11-14 18:17:10'),
(15, '萬俟和玉', 'adg257p', '377c92bbe8b81606ed934808d2afa2cc', '女', '1996-07-11', 'member', 'adg257p@yahoo.com.tw', '', '', '', 1, '2016-11-15 16:41:11', '2016-11-15 16:41:03'),
(16, 'HTML5', 'abcde', '827ccb0eea8a706c4c34a16891f84e7b', '女', '0000-00-00', 'member', 'emppy_miao511311@yahoo.com.tw', '', '', '', 35, '2017-04-11 16:24:59', '2016-11-15 16:46:20'),
(17, 'rybfvevk', 'uqubbetw', '32cc5886dc1fa8c106a02056292c4654', '女', '0000-00-00', 'member', 'sample@email.tst', '1', '555-666-0606', '3137 Laguna Street', 0, NULL, '2017-06-02 13:55:27'),
(18, 'ruskxfcj', 'jxuitvgr', '32cc5886dc1fa8c106a02056292c4654', '男', '0000-00-00', 'member', 'sample@email.tst', '1', '555-666-0606', '3137 Laguna Street', 0, NULL, '2017-06-02 13:55:27');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `memberdata`
--
ALTER TABLE `memberdata`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_username` (`m_username`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `memberdata`
--
ALTER TABLE `memberdata`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
