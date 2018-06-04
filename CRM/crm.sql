-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-06-04 05:32:16
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
-- 資料表結構 `food`
--

CREATE TABLE `food` (
  `f_id` int(10) UNSIGNED NOT NULL,
  `o_no` int(11) NOT NULL,
  `dog` enum('小型犬','中型犬','大型犬','超大型犬') COLLATE utf8_unicode_ci NOT NULL,
  `mean` enum('雞肉','牛肉','鴨肉','鹿肉','羊肉') COLLATE utf8_unicode_ci NOT NULL,
  `buff` enum('腎臟護理','血糖管理','肥胖代謝','增重') COLLATE utf8_unicode_ci NOT NULL,
  `buff1` enum('消化系統護理','心臟護理','環境除臭','泌尿道','關節管理','視力保健','皮膚護理','亮毛護理') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `food`
--

INSERT INTO `food` (`f_id`, `o_no`, `dog`, `mean`, `buff`, `buff1`) VALUES
(1, 1, '小型犬', '雞肉', '增重', '皮膚護理'),
(2, 2, '大型犬', '羊肉', '腎臟護理', '泌尿道'),
(3, 2, '小型犬', '牛肉', '腎臟護理', '泌尿道'),
(4, 2, '大型犬', '鴨肉', '血糖管理', '關節管理'),
(5, 3, '中型犬', '牛肉', '增重', '消化系統護理'),
(6, 4, '中型犬', '雞肉', '肥胖代謝', '亮毛護理'),
(7, 7, '大型犬', '雞肉', '血糖管理', '環境除臭'),
(8, 7, '小型犬', '牛肉', '增重', '關節管理'),
(9, 8, '小型犬', '牛肉', '血糖管理', '關節管理'),
(10, 9, '超大型犬', '羊肉', '血糖管理', '環境除臭'),
(11, 11, '中型犬', '鴨肉', '腎臟護理', '視力保健'),
(12, 12, '小型犬', '羊肉', '肥胖代謝', '泌尿道'),
(13, 13, '中型犬', '雞肉', '肥胖代謝', '泌尿道'),
(14, 16, '超大型犬', '牛肉', '肥胖代謝', '皮膚護理'),
(15, 16, '中型犬', '牛肉', '肥胖代謝', '亮毛護理'),
(16, 18, '中型犬', '羊肉', '肥胖代謝', '亮毛護理'),
(17, 19, '中型犬', '鴨肉', '腎臟護理', '亮毛護理'),
(18, 19, '中型犬', '鴨肉', '增重', '泌尿道'),
(19, 19, '超大型犬', '鴨肉', '肥胖代謝', '泌尿道'),
(20, 24, '中型犬', '鴨肉', '腎臟護理', '關節管理'),
(21, 24, '大型犬', '雞肉', '肥胖代謝', '環境除臭'),
(22, 26, '中型犬', '牛肉', '肥胖代謝', '關節管理'),
(23, 27, '超大型犬', '鴨肉', '肥胖代謝', '心臟護理'),
(24, 30, '大型犬', '雞肉', '增重', '心臟護理'),
(25, 32, '超大型犬', '羊肉', '血糖管理', '消化系統護理'),
(26, 32, '小型犬', '鴨肉', '血糖管理', '泌尿道'),
(27, 33, '大型犬', '雞肉', '腎臟護理', '環境除臭'),
(28, 36, '超大型犬', '羊肉', '肥胖代謝', '泌尿道'),
(29, 36, '小型犬', '牛肉', '腎臟護理', '心臟護理'),
(30, 39, '超大型犬', '雞肉', '增重', '環境除臭'),
(31, 39, '中型犬', '鴨肉', '血糖管理', '皮膚護理'),
(32, 40, '中型犬', '雞肉', '增重', '泌尿道'),
(33, 42, '小型犬', '雞肉', '增重', '消化系統護理'),
(34, 42, '小型犬', '羊肉', '腎臟護理', '環境除臭'),
(35, 45, '小型犬', '雞肉', '增重', '消化系統護理'),
(36, 46, '大型犬', '鹿肉', '腎臟護理', '視力保健'),
(37, 51, '超大型犬', '雞肉', '腎臟護理', '視力保健'),
(38, 51, '超大型犬', '雞肉', '腎臟護理', '視力保健'),
(39, 51, '小型犬', '羊肉', '腎臟護理', '皮膚護理'),
(40, 51, '小型犬', '鴨肉', '腎臟護理', '關節管理'),
(41, 52, '超大型犬', '羊肉', '增重', '消化系統護理'),
(42, 53, '中型犬', '鴨肉', '增重', '環境除臭'),
(43, 57, '大型犬', '羊肉', '腎臟護理', '泌尿道'),
(44, 57, '中型犬', '鹿肉', '血糖管理', '視力保健'),
(45, 57, '大型犬', '鴨肉', '增重', '環境除臭'),
(46, 58, '超大型犬', '', '腎臟護理', '消化系統護理'),
(47, 59, '中型犬', '鹿肉', '增重', '環境除臭'),
(48, 60, '超大型犬', '雞肉', '肥胖代謝', '視力保健'),
(49, 60, '大型犬', '羊肉', '增重', '環境除臭'),
(50, 62, '大型犬', '鴨肉', '血糖管理', '皮膚護理'),
(51, 62, '超大型犬', '鴨肉', '血糖管理', '關節管理'),
(52, 62, '超大型犬', '羊肉', '腎臟護理', '關節管理'),
(53, 63, '中型犬', '牛肉', '血糖管理', '環境除臭'),
(54, 64, '超大型犬', '牛肉', '肥胖代謝', '環境除臭'),
(55, 64, '大型犬', '牛肉', '血糖管理', '心臟護理'),
(56, 65, '小型犬', '羊肉', '腎臟護理', '關節管理'),
(57, 65, '小型犬', '羊肉', '肥胖代謝', '視力保健'),
(58, 68, '大型犬', '羊肉', '肥胖代謝', '視力保健'),
(59, 68, '超大型犬', '鹿肉', '腎臟護理', '心臟護理'),
(60, 68, '小型犬', '雞肉', '增重', '視力保健'),
(61, 70, '超大型犬', '羊肉', '腎臟護理', '泌尿道'),
(62, 70, '中型犬', '牛肉', '血糖管理', '消化系統護理'),
(63, 71, '大型犬', '羊肉', '血糖管理', '環境除臭'),
(64, 73, '大型犬', '雞肉', '血糖管理', '泌尿道'),
(65, 73, '中型犬', '羊肉', '血糖管理', '視力保健'),
(66, 75, '中型犬', '雞肉', '肥胖代謝', '心臟護理'),
(67, 75, '大型犬', '羊肉', '腎臟護理', '泌尿道'),
(68, 76, '中型犬', '牛肉', '增重', '亮毛護理'),
(69, 76, '大型犬', '牛肉', '增重', '皮膚護理'),
(70, 78, '小型犬', '雞肉', '肥胖代謝', '亮毛護理'),
(71, 78, '超大型犬', '鹿肉', '肥胖代謝', '心臟護理'),
(72, 80, '超大型犬', '鹿肉', '血糖管理', '亮毛護理'),
(73, 82, '超大型犬', '鹿肉', '腎臟護理', '消化系統護理'),
(74, 83, '超大型犬', '鹿肉', '增重', '皮膚護理'),
(75, 83, '中型犬', '雞肉', '腎臟護理', '心臟護理'),
(76, 85, '超大型犬', '羊肉', '肥胖代謝', '泌尿道'),
(77, 87, '超大型犬', '羊肉', '肥胖代謝', '泌尿道'),
(78, 89, '大型犬', '雞肉', '血糖管理', '關節管理'),
(79, 91, '中型犬', '雞肉', '腎臟護理', '心臟護理'),
(80, 91, '大型犬', '羊肉', '腎臟護理', '皮膚護理'),
(81, 92, '超大型犬', '羊肉', '增重', '心臟護理'),
(82, 92, '小型犬', '羊肉', '血糖管理', '關節管理'),
(83, 95, '小型犬', '牛肉', '肥胖代謝', '心臟護理'),
(84, 96, '中型犬', '鴨肉', '血糖管理', '消化系統護理'),
(85, 96, '小型犬', '羊肉', '肥胖代謝', '皮膚護理'),
(86, 96, '小型犬', '雞肉', '血糖管理', '亮毛護理'),
(87, 97, '大型犬', '牛肉', '肥胖代謝', '心臟護理'),
(88, 99, '小型犬', '牛肉', '增重', '皮膚護理'),
(89, 99, '小型犬', '鴨肉', '增重', '皮膚護理'),
(90, 100, '超大型犬', '羊肉', '血糖管理', '亮毛護理'),
(91, 100, '小型犬', '牛肉', '增重', '泌尿道');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `m_id` int(10) UNSIGNED NOT NULL,
  `m_on` int(11) NOT NULL,
  `sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `ago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`m_id`, `m_on`, `sex`, `ago`) VALUES
(1, 1, '男', 26),
(2, 2, '男', 63),
(3, 3, '男', 43),
(4, 4, '女', 27),
(5, 7, '女', 34),
(6, 8, '男', 63),
(7, 9, '女', 38),
(8, 11, '女', 22),
(9, 12, '男', 39),
(10, 13, '女', 19),
(11, 16, '女', 61),
(12, 18, '男', 37),
(13, 19, '女', 34),
(14, 24, '女', 19),
(15, 27, '男', 26),
(16, 30, '男', 36),
(17, 32, '男', 46),
(18, 33, '女', 28),
(19, 35, '女', 48),
(20, 36, '女', 58),
(21, 39, '女', 52),
(22, 40, '男', 20),
(23, 42, '女', 62),
(24, 45, '男', 40),
(25, 46, '女', 43),
(26, 51, '男', 21),
(27, 52, '女', 32),
(28, 53, '女', 37),
(29, 57, '女', 31),
(30, 58, '女', 21),
(31, 59, '女', 35),
(32, 60, '男', 61),
(33, 62, '男', 45),
(34, 63, '女', 58),
(35, 64, '男', 36),
(36, 65, '女', 28),
(37, 68, '女', 53),
(38, 70, '女', 44),
(39, 71, '女', 19),
(40, 73, '女', 24),
(41, 75, '女', 23),
(42, 76, '女', 54),
(43, 78, '女', 62),
(44, 80, '男', 57),
(45, 82, '女', 25),
(46, 83, '男', 65),
(47, 85, '女', 58),
(48, 87, '男', 61),
(49, 89, '男', 46),
(50, 91, '女', 27),
(51, 92, '女', 62),
(52, 95, '女', 64),
(53, 96, '男', 51),
(54, 98, '男', 65),
(55, 99, '男', 26),
(56, 100, '男', 35);

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
(12, '9527', 'gcobs120399', '4f58111f49e05226933bf1122df4a9ae', '女', '1996-01-20', 'admin', 'gcobs120399@gmail.com', '', '', '', 118, '2018-06-04 09:09:56', '2016-07-04 13:18:25'),
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
(1, '20歲以下', 300, 451),
(2, '21-30', 750, 951),
(3, '31-40', 1200, 1770),
(4, '41-50', 800, 981),
(5, '51以上', 300, 400);

-- --------------------------------------------------------

--
-- 資料表結構 `mem_buy`
--

CREATE TABLE `mem_buy` (
  `nb_id` int(10) UNSIGNED NOT NULL,
  `ago` text COLLATE utf8_unicode_ci NOT NULL,
  `w1` int(11) NOT NULL COMMENT '膚',
  `w2` int(11) NOT NULL COMMENT '心',
  `w3` int(11) NOT NULL COMMENT '睛',
  `w4` int(11) NOT NULL COMMENT '身',
  `w5` int(11) NOT NULL COMMENT '骨',
  `b1` int(11) NOT NULL COMMENT '膚',
  `b2` int(11) NOT NULL COMMENT '心',
  `b3` int(11) NOT NULL COMMENT '睛',
  `b4` int(11) NOT NULL COMMENT '身',
  `b5` int(11) NOT NULL COMMENT '骨'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `mem_buy`
--

INSERT INTO `mem_buy` (`nb_id`, `ago`, `w1`, `w2`, `w3`, `w4`, `w5`, `b1`, `b2`, `b3`, `b4`, `b5`) VALUES
(1, '20以下', 114, 64, 79, 105, 92, 69, 16, 48, 90, 81),
(2, '21-30', 264, 211, 179, 155, 142, 204, 151, 138, 35, 122),
(3, '31-40', 510, 427, 342, 237, 224, 339, 286, 228, 180, 167),
(4, '41-50', 273, 220, 185, 158, 145, 219, 166, 148, 140, 127),
(5, '51以上', 99, 46, 68, 100, 87, 67, 12, 48, 90, 77);

-- --------------------------------------------------------

--
-- 資料表結構 `order1`
--

CREATE TABLE `order1` (
  `o_id` int(10) UNSIGNED NOT NULL,
  `o_no` int(11) NOT NULL,
  `sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `ago` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `order1`
--

INSERT INTO `order1` (`o_id`, `o_no`, `sex`, `ago`, `money`, `date`) VALUES
(1, 1, '男', 26, 500, '2017-04-23'),
(2, 2, '男', 63, 470, '2017-03-28'),
(3, 2, '男', 63, 470, '2017-12-30'),
(4, 2, '男', 63, 470, '2017-12-01'),
(5, 3, '男', 43, 470, '2017-10-28'),
(6, 4, '女', 27, 530, '2017-11-22'),
(7, 7, '女', 34, 530, '2014-04-13'),
(8, 7, '女', 34, 530, '2017-09-11'),
(9, 8, '男', 63, 480, '2017-08-21'),
(10, 9, '女', 63, 530, '2017-12-06'),
(11, 11, '女', 22, 470, '2017-01-02'),
(12, 12, '男', 39, 500, '2017-06-04'),
(13, 13, '女', 19, 500, '2017-07-15'),
(14, 16, '女', 61, 480, '2017-07-21'),
(15, 16, '女', 61, 480, '2017-03-07'),
(16, 18, '男', 37, 500, '2017-11-20'),
(17, 19, '女', 34, 470, '2017-10-16'),
(18, 19, '女', 34, 470, '2017-08-25'),
(19, 19, '女', 34, 470, '2017-06-15'),
(20, 24, '女', 19, 530, '2017-03-07'),
(21, 26, '男', 30, 470, '2017-07-16'),
(22, 27, '男', 26, 480, '2017-08-06'),
(23, 30, '男', 36, 480, '2017-08-28'),
(24, 32, '男', 46, 530, '2017-07-21'),
(25, 32, '男', 46, 530, '2017-10-22'),
(26, 33, '女', 28, 530, '2017-11-25'),
(27, 35, '女', 48, 530, '2017-07-22'),
(28, 36, '女', 500, 500, '2017-08-16'),
(29, 36, '女', 58, 500, '2017-11-18'),
(30, 39, '女', 52, 470, '2017-04-30'),
(31, 39, '女', 52, 470, '2017-06-23'),
(32, 40, '男', 20, 470, '2017-06-24'),
(33, 42, '女', 62, 480, '2017-12-08'),
(34, 42, '女', 62, 480, '2017-11-15'),
(35, 42, '女', 62, 480, '2017-05-25'),
(36, 45, '男', 40, 530, '2017-01-31'),
(37, 46, '女', 43, 480, '2017-12-25'),
(38, 51, '男', 21, 470, '2017-10-11'),
(39, 51, '男', 21, 470, '2017-11-14'),
(40, 51, '男', 21, 470, '2017-08-25'),
(41, 53, '女', 37, 530, '2017-12-15'),
(42, 55, '男', 62, 470, '2017-09-06'),
(43, 57, '女', 31, 480, '2017-12-07'),
(44, 57, '女', 31, 480, '2017-12-15'),
(45, 57, '女', 31, 480, '2017-03-24'),
(46, 58, '女', 21, 500, '2017-12-31'),
(47, 59, '女', 35, 470, '2017-12-15'),
(48, 60, '男', 61, 470, '2017-02-26'),
(49, 60, '男', 61, 470, '2017-03-06'),
(50, 60, '男', 61, 470, '2017-01-29'),
(51, 62, '男', 45, 470, '2017-01-29'),
(52, 62, '男', 45, 470, '2017-04-22'),
(53, 62, '男', 45, 470, '2017-06-09'),
(54, 63, '女', 58, 480, '2017-03-15'),
(55, 63, '女', 58, 480, '2017-03-09'),
(56, 64, '女', 36, 530, '2017-04-27'),
(57, 64, '男', 36, 530, '2017-05-29'),
(58, 65, '女', 28, 470, '2017-08-10'),
(59, 65, '女', 28, 470, '2017-08-01'),
(60, 68, '男', 53, 530, '2017-02-09'),
(61, 68, '女', 53, 530, '2017-08-24'),
(62, 68, '女', 53, 530, '2017-08-24'),
(63, 70, '女', 44, 500, '2017-09-26'),
(64, 70, '女', 44, 500, '2017-05-24'),
(65, 70, '女', 44, 500, '2017-09-17'),
(66, 71, '女', 44, 500, '2017-09-17'),
(67, 73, '女', 24, 480, '2017-06-05'),
(68, 73, '女', 24, 480, '2017-06-06'),
(69, 75, '女', 23, 500, '2017-01-07'),
(70, 75, '女', 23, 500, '2017-01-07'),
(71, 75, '女', 23, 500, '2017-12-13'),
(72, 76, '女', 54, 500, '2017-02-06'),
(73, 76, '女', 54, 500, '2017-10-16'),
(74, 78, '女', 62, 530, '2017-09-09'),
(75, 78, '女', 62, 530, '2017-04-28'),
(76, 80, '男', 57, 470, '2017-03-23'),
(77, 80, '男', 57, 470, '2017-05-02'),
(78, 82, '女', 25, 530, '2017-10-03'),
(79, 83, '男', 65, 470, '2017-08-19'),
(80, 83, '男', 65, 470, '2017-08-08'),
(81, 85, '女', 58, 470, '2017-06-20'),
(82, 87, '男', 61, 470, '2017-12-30'),
(83, 89, '男', 46, 480, '2017-07-09'),
(84, 89, '男', 46, 480, '2017-03-25'),
(85, 91, '女', 27, 530, '2017-03-30'),
(86, 91, '女', 27, 530, '2017-08-30'),
(87, 92, '女', 62, 470, '2017-11-25'),
(88, 92, '女', 62, 470, '2017-10-09'),
(89, 95, '女', 64, 500, '2017-10-29'),
(90, 96, '男', 51, 500, '2017-07-12'),
(91, 96, '男', 51, 500, '2017-07-12'),
(92, 96, '男', 51, 500, '2017-01-17'),
(93, 97, '男', 58, 470, '2017-10-02'),
(94, 98, '男', 65, 480, '2017-03-21'),
(95, 99, '男', 26, 470, '2017-01-21'),
(96, 99, '男', 26, 470, '2017-11-24'),
(97, 100, '男', 35, 470, '2017-10-04'),
(98, 100, '男', 35, 470, '2017-10-04');

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
-- 資料表結構 `pet_body`
--

CREATE TABLE `pet_body` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `ago` text COLLATE utf8_unicode_ci NOT NULL,
  `w1` int(11) NOT NULL COMMENT '小',
  `w2` int(11) NOT NULL COMMENT '中',
  `w3` int(11) NOT NULL COMMENT '大',
  `w4` int(11) NOT NULL COMMENT '鈔大',
  `b1` int(11) NOT NULL COMMENT '小',
  `b2` int(11) NOT NULL COMMENT '中',
  `b3` int(11) NOT NULL COMMENT '大',
  `b4` int(11) NOT NULL COMMENT '超大'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pet_body`
--

INSERT INTO `pet_body` (`p_id`, `ago`, `w1`, `w2`, `w3`, `w4`, `b1`, `b2`, `b3`, `b4`) VALUES
(1, '20以下', 120, 122, 190, 55, 95, 90, 185, 12),
(2, '21-30', 210, 250, 336, 150, 170, 210, 260, 120),
(3, '31-40', 325, 410, 500, 260, 255, 329, 355, 256),
(4, '41-50', 220, 260, 350, 158, 180, 200, 270, 135),
(5, '51以上', 125, 100, 200, 50, 100, 85, 190, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `pet_medicine`
--

CREATE TABLE `pet_medicine` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `pet` text COLLATE utf8_unicode_ci NOT NULL,
  `eye` int(11) NOT NULL,
  `heart` int(11) NOT NULL,
  `body` int(11) NOT NULL,
  `bone` int(11) NOT NULL,
  `skin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pet_medicine`
--

INSERT INTO `pet_medicine` (`p_id`, `pet`, `eye`, `heart`, `body`, `bone`, `skin`) VALUES
(1, '小型犬', 431, 456, 123, 244, 546),
(2, '中型犬', 424, 434, 345, 241, 612),
(3, '大型犬', 512, 616, 718, 412, 578),
(4, '超大型犬', 95, 123, 204, 367, 422);

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
-- 資料表索引 `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

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
-- 資料表索引 `mem_buy`
--
ALTER TABLE `mem_buy`
  ADD PRIMARY KEY (`nb_id`);

--
-- 資料表索引 `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`o_id`);

--
-- 資料表索引 `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `pet_body`
--
ALTER TABLE `pet_body`
  ADD PRIMARY KEY (`p_id`);

--
-- 資料表索引 `pet_medicine`
--
ALTER TABLE `pet_medicine`
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
-- 使用資料表 AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
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
-- 使用資料表 AUTO_INCREMENT `mem_buy`
--
ALTER TABLE `mem_buy`
  MODIFY `nb_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `order1`
--
ALTER TABLE `order1`
  MODIFY `o_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- 使用資料表 AUTO_INCREMENT `path`
--
ALTER TABLE `path`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `pet_body`
--
ALTER TABLE `pet_body`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `pet_medicine`
--
ALTER TABLE `pet_medicine`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
