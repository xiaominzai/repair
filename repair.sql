-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-01-18 07:57:45
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair`
--

-- --------------------------------------------------------

--
-- 表的结构 `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `filename` varchar(32) NOT NULL COMMENT '文件名',
  `src` varchar(255) NOT NULL COMMENT '文件路径',
  `number` int(11) NOT NULL DEFAULT '0' COMMENT '文件下载数',
  `creat` int(11) NOT NULL DEFAULT '0' COMMENT '上传时间',
  `lock` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `download`
--

INSERT INTO `download` (`id`, `filename`, `src`, `number`, `creat`, `lock`) VALUES
(2, '2016-11-05 11-53-05屏幕截图.png', '/repair3.1/Public/Uploads/2016-11/5837fbf970bcf.png', 0, 1480063993, 0);

-- --------------------------------------------------------

--
-- 表的结构 `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `link` varchar(11) NOT NULL,
  `time` int(11) NOT NULL,
  `submit` int(11) DEFAULT NULL,
  `desc` text NOT NULL,
  `admin` varchar(30) DEFAULT NULL,
  `dept` varchar(10) DEFAULT NULL,
  `handle` int(11) NOT NULL DEFAULT '0',
  `del` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `repair`
--

INSERT INTO `repair` (`id`, `name`, `link`, `time`, `submit`, `desc`, `admin`, `dept`, `handle`, `del`) VALUES
(193, '啦啦啦', '555', 1479830400, 1479564647, '啦啦啦', NULL, 'C10', 0, 0),
(194, '测试功能', '8484', 1480003200, 1479564667, '踢踢踢', NULL, 'C13', 0, 0),
(195, '测试功能', '8484', 1480003200, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(196, '集体', '58484', 1479744000, 1479564698, '提提啦说进去', NULL, 'C7', 0, 0),
(197, '水晶', '58484', 1479744000, 1475254861, '提提啦说进去', NULL, 'C7', 0, 0),
(198, '水晶', '58484', 1479744000, 1479564712, '提提啦说进去', NULL, 'C1', 0, 0),
(199, '泸沽湖', '964848', 1479744000, 1479564733, '踢腿', NULL, 'C8', 0, 0),
(200, '泸沽湖', '964848', 1479744000, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(201, '泸沽湖', '964848', 1479744000, 1475254861, '踢腿', NULL, 'C1', 0, 0),
(202, '泸沽湖', '964848', 1479744000, 1475254861, '踢腿', NULL, 'C1', 0, 0),
(203, '泸沽湖', '964848', 1479744000, 1479564741, '踢腿', NULL, 'C1', 0, 0),
(204, '泸沽湖', '964848', 1479744000, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(205, '泸沽湖', '964848', 1479744000, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(206, '泸沽湖', '964848', 1479744000, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(207, '泸沽湖', '964848', 1479744000, 1464714061, '踢腿', NULL, 'C1', 0, 0),
(208, '泸沽湖', '964848', 1479744000, 1479564742, '踢腿', NULL, 'C1', 0, 0),
(209, '泸沽湖', '964848', 1479744000, 1479564742, '踢腿', NULL, 'C1', 0, 0),
(210, 'JJ', '55', 1479744000, 1479564761, '鸡腿', NULL, 'C12', 0, 0),
(211, 'JJ', '55', 1479744000, 1479564762, '鸡腿', NULL, 'C12', 0, 0),
(212, 'JJ', '55', 1479744000, 1456765261, '鸡腿', NULL, 'C12', 0, 0),
(213, 'JJ', '55', 1479744000, 1456765261, '鸡腿', NULL, 'C12', 0, 0),
(214, 'JJ', '55', 1456765261, 1456765261, '鸡腿', NULL, 'C12', 0, 0),
(215, 'JJ', '55', 1456765261, 1456765261, '鸡腿', NULL, 'C12', 0, 0),
(216, 'JJ', '55', 1479744000, 1456765261, '鸡腿', NULL, 'C12', 0, 0),
(217, 'JJ', '55', 1479744000, 1479564763, '鸡腿', NULL, 'C12', 0, 0),
(218, 'JJ', '55', 1479744000, 1479564763, '鸡腿', NULL, 'C12', 0, 0),
(219, 'JJ', '55', 1479744000, 1479564763, '鸡腿', NULL, 'C12', 0, 0),
(220, 'JJ', '55', 1479744000, 1479564764, '鸡腿', NULL, 'C12', 0, 0),
(221, 'JJ', '55', 1479744000, 1479564764, '鸡腿', NULL, 'C12', 0, 0),
(222, 'JJ', '55', 1479744000, 1479564764, '鸡腿', NULL, 'C12', 0, 0),
(223, 'JJ', '55', 1479744000, 1479564764, '鸡腿', NULL, 'C12', 0, 0),
(224, 'JJ', '55', 1479744000, 1479564764, '鸡腿', NULL, 'C12', 0, 0),
(225, 'JJ', '55', 1479744000, 1479564765, '鸡腿', NULL, 'C12', 0, 0),
(226, 'JJ', '55', 1479744000, 1479564765, '鸡腿', NULL, 'C12', 0, 0),
(227, 'JJ', '55', 1479744000, 1479564765, '鸡腿', NULL, 'C12', 0, 0),
(228, 'JJ', '55', 1479744000, 1479564765, '鸡腿', NULL, 'C12', 0, 0),
(229, 'JJ', '55', 1479744000, 1479564765, '鸡腿', NULL, 'C12', 0, 0),
(230, 'JJ', '55', 1479744000, 1479564766, '鸡腿', NULL, 'C12', 0, 0),
(231, 'JJ', '55', 1479744000, 1479564766, '鸡腿', NULL, 'C12', 0, 0),
(232, 'JJ', '55', 1479744000, 1479564766, '鸡腿', NULL, 'C12', 0, 0),
(233, 'JJ', '55', 1479744000, 1479564766, '鸡腿', NULL, 'C12', 0, 0),
(234, 'JJ', '55', 1479744000, 1479564767, '鸡腿', NULL, 'C12', 0, 0),
(235, 'JJ', '55', 1479744000, 1479564767, '鸡腿', NULL, 'C12', 0, 0),
(236, 'JJ', '55', 1479744000, 1479564768, '鸡腿', NULL, 'C12', 0, 0),
(237, 'JJ', '55', 1479744000, 1479564769, '鸡腿', NULL, 'C12', 0, 0),
(238, 'JJ', '55', 1479744000, 1479564769, '鸡腿', '超级管理员', 'C12', 1, 0),
(239, 'JJ', '55', 1479744000, 1479564769, '鸡腿', NULL, 'C12', 0, 0),
(240, 'JJ', '55', 1479744000, 1479564770, '鸡腿', NULL, 'C12', 0, 0),
(241, 'JJ', '55', 1479744000, 1479564770, '鸡腿', NULL, 'C12', 0, 0),
(242, 'JJ', '55', 1479744000, 1479564771, '鸡腿', '超级管理员', 'C12', 1, 0),
(243, 'JJ', '55', 1479744000, 1479564771, '鸡腿', '超级管理员', 'C12', 0, 0),
(244, 'JJ', '55', 1479744000, 1479564771, '鸡腿', '超级管理员', 'C12', 0, 0),
(245, 'JJ', '55', 1479744000, 1479564771, '鸡腿', '超级管理员', 'C12', 0, 0),
(246, 'JJ', '55', 1479744000, 1479564771, '鸡腿', '超级管理员', 'C12', 0, 0),
(247, 'JJ', '55', 1479830400, 1479564774, '鸡腿', '超级管理员', 'C12', 0, 0),
(248, 'JJ', '555', 1480003200, 1479565099, '啦啦啦', '小民', 'C12', 1, 1),
(249, '65645', '654', 1479830400, 1479565285, '54645', '超级管理员', 'C3', 1, 1),
(250, '哈哈', '5454', 1479657600, 1479578352, '匿名', '超级管理员', 'C11', 1, 1),
(251, 'fadsf', '545', 1480348800, 1479578542, 'dfasdf', NULL, 'C2', 0, 1),
(252, 'sdfs', '564', 1479830400, 1479697481, '45645', '小民', 'C4', 1, 1),
(253, '456', '5464', 1479830400, 1479838180, '456', '超级管理员', 'C1', 1, 0),
(254, '小民', '5454884', 1479916800, 1479838219, '叽叽叽叽', '超级管理员', 'C5', 0, 1),
(255, '545545', '45454', 1479830400, 1479838905, '456', NULL, 'C10', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `desc` varchar(32) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `logintime` int(11) NOT NULL DEFAULT '0' COMMENT '最近登录时间',
  `power` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `desc`, `password`, `logintime`, `power`) VALUES
(42, 'libmill', '超级管理员', '2323fc9212ea99653170ec59f46e32ba', 1481688736, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
