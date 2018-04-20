-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-04-01 23:49:55
-- 服务器版本： 5.7.13-0ubuntu0.16.04.2-log
-- PHP Version: 7.0.15-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tutorial`
--

-- --------------------------------------------------------

--
-- 表的结构 `tu_college`
--

CREATE TABLE `tu_college` (
  `clg_id` int(10) UNSIGNED NOT NULL,
  `clg_name` varchar(50) NOT NULL DEFAULT '' COMMENT '学院名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tu_course`
--

CREATE TABLE `tu_course` (
  `cour_id` int(10) UNSIGNED NOT NULL,
  `cour_name` varchar(50) NOT NULL DEFAULT '' COMMENT '课程名称',
  `cour_teacher` char(50) NOT NULL DEFAULT '' COMMENT '任课教师',
  `cour_title` char(255) NOT NULL DEFAULT '' COMMENT '简介',
  `cour_description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `cour_image` varchar(100) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `cour_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `cour_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `tea_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '教师id',
  `cate_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级分类id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_course`
--

INSERT INTO `tu_course` (`cour_id`, `cour_name`, `cour_teacher`, `cour_title`, `cour_description`, `cour_image`, `cour_order`, `cour_time`, `tea_id`, `cate_id`) VALUES
(1, 'C语言程序设计', '孙德才', '程序设计入门', '', 'uploads/images/20170331084808468.jpg', 2, 0, 0, 0),
(2, '软件工程导论', '赵旭辉', '软件开发理论课', '', 'uploads/images/20170331084247426.jpg', 1, 0, 0, 0),
(4, '互联网开发技术', '张丽娟', 'B/S架构', '', 'uploads/images/20170331070554120.jpg', 0, 0, 0, 0),
(5, '互联网开发新技术', '刘允峰', '单片机', '', 'uploads/images/20170331083759901.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tu_coursecategory`
--

CREATE TABLE `tu_coursecategory` (
  `ccg_id` int(10) UNSIGNED NOT NULL,
  `ccg_name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名',
  `ccg_pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tu_homework`
--

CREATE TABLE `tu_homework` (
  `hw_id` int(10) UNSIGNED NOT NULL,
  `hw_name` varchar(50) NOT NULL DEFAULT '' COMMENT '作业名称',
  `cour_name` varchar(50) NOT NULL DEFAULT '' COMMENT '课程名称',
  `hw_description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `hw_file` varchar(100) NOT NULL DEFAULT '' COMMENT '文件',
  `hw_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `hw_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `hw_state` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态',
  `task_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '任务id',
  `stu_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学生id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_homework`
--

INSERT INTO `tu_homework` (`hw_id`, `hw_name`, `cour_name`, `hw_description`, `hw_file`, `hw_order`, `hw_addtime`, `hw_state`, `task_id`, `stu_id`) VALUES
(1, '做一个加法计算器', 'C语言程序设计', '', '', 0, 1488378755, 0, 2, 1),
(2, '原型开发的好处', '软件工程导论', '', '', 0, 1488378815, 0, 4, 1),
(3, '做一个加法计算器', 'C语言程序设计', '', 'uploads/20170302144824771.php', 0, 1488466122, 0, 2, 1),
(4, '原型开发的好处', '软件工程导论', '', 'uploads/20170317141343198.chm', 0, 1489760025, 0, 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tu_major`
--

CREATE TABLE `tu_major` (
  `mg_id` int(10) UNSIGNED NOT NULL,
  `mg_name` varchar(50) NOT NULL DEFAULT '' COMMENT '专业名',
  `clg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学院id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tu_student`
--

CREATE TABLE `tu_student` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `stu_name` varchar(50) NOT NULL DEFAULT '' COMMENT '学生名',
  `stu_password` char(255) NOT NULL DEFAULT '' COMMENT '密码',
  `stu_grade` char(4) NOT NULL DEFAULT '' COMMENT '年级',
  `stu_code` char(12) NOT NULL DEFAULT '' COMMENT '学号',
  `stu_image` varchar(100) NOT NULL DEFAULT '0' COMMENT '头像',
  `stu_sex` varchar(2) NOT NULL DEFAULT '' COMMENT '性别',
  `stu_phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `stu_email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `stu_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `mg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '专业id',
  `clg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学院id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_student`
--

INSERT INTO `tu_student` (`stu_id`, `stu_name`, `stu_password`, `stu_grade`, `stu_code`, `stu_image`, `stu_sex`, `stu_phone`, `stu_email`, `stu_order`, `mg_id`, `clg_id`) VALUES
(1, '张三', 'eyJpdiI6IkQrRm1LRlwvMGUya2xLNVduU0ZBRHRRPT0iLCJ2YWx1ZSI6IlFcL3ZZbXkwbWFFeVwva0huQ2RnRjZIdz09IiwibWFjIjoiZjE3NjFmODhhNzBmNDMzMDliYjZkYjdhZTgxZjA4OGM4N2U5ZDZmYTY1MWYwOGY1ZWQyZWZlYjdlMDg0OTk5NSJ9', '', '14301183', '0', '', '', '', 6, 0, 0),
(2, '李四光', 'eyJpdiI6InlvSWVjQWN1Y3lMU0sySGZVa0lVMkE9PSIsInZhbHVlIjoiUVZreFNna1RJUHoxVzltWVR4TkhvUT09IiwibWFjIjoiZTE2NTM2OWRhYWM2YTM2MWMwNjg0YmQyYWIwOTU4ODU4MDA1ZmZiNmE1OWQ2YWNlNzdiYTE3NWFjMWNjYjhlOSJ9', '', '14301184', '0', '', '', '', 73, 0, 0),
(4, '蒋佳浩', 'eyJpdiI6IkdOMVJWcTNCajhsRkVGQWVnSktSTnc9PSIsInZhbHVlIjoicG1FclFuSW56QWJcL0FpM1JuSW5NOXc9PSIsIm1hYyI6IjliNzhkYzc4MWVmNDBjY2QyNzQxYjUxZmJiNzY2ZTk3NDdhY2U1MzU2NDJmNWNlODJjYzYwMmUxMmJmNDk2NmUifQ==', '', '14301065', '0', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tu_talk`
--

CREATE TABLE `tu_talk` (
  `talk_id` int(10) UNSIGNED NOT NULL,
  `talk_title` varchar(50) NOT NULL DEFAULT '' COMMENT '作业名称',
  `talk_content` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `talk_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `talk_state` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态',
  `cour_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '课程id',
  `stu_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学生id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_talk`
--

INSERT INTO `tu_talk` (`talk_id`, `talk_title`, `talk_content`, `talk_addtime`, `talk_state`, `cour_id`, `stu_id`) VALUES
(1, 'c语言', '变量如何定义', 0, 0, 1, 1),
(2, 'cpp', '函数局部变量操作', 0, 0, 1, 1),
(3, '', '气气气气', 0, 0, 1, 0),
(4, '', '气气气气2343', 0, 0, 1, 0),
(5, '', '气气气气2343', 0, 0, 1, 0),
(6, '', '气气气气2343', 0, 0, 1, 0),
(7, '', '123246', 0, 0, 1, 0),
(8, '', '请问二期人', 0, 0, 1, 0),
(9, '', '为儿童', 0, 0, 3, 0),
(10, '', '为儿童123123', 1488283311, 0, 3, 0),
(11, '', '12356', 1488350750, 0, 1, 0),
(12, '', '1235611', 1488350769, 0, 1, 0),
(13, '', '1235611', 1488350789, 0, 1, 0),
(14, '', '1235611', 1488350790, 0, 1, 0),
(15, '', '其全球', 1488366089, 0, 2, 0),
(16, '', '2214', 1489760052, 0, 2, 0),
(17, '', '11', 1490884227, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tu_task`
--

CREATE TABLE `tu_task` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(50) NOT NULL DEFAULT '' COMMENT '作业名称',
  `task_description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `task_file` varchar(100) NOT NULL DEFAULT '' COMMENT '文件',
  `task_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `task_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `task_finaltime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最晚提交时间',
  `task_state` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态',
  `cour_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '课程id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_task`
--

INSERT INTO `tu_task` (`task_id`, `task_name`, `task_description`, `task_file`, `task_order`, `task_addtime`, `task_finaltime`, `task_state`, `cour_id`) VALUES
(1, '编写HelloWorld代码', 'c语言', '', 0, 0, 0, 0, 1),
(2, '做一个加法计算器', '', '', 0, 0, 0, 0, 1),
(3, '瀑布模型简述', '', '', 0, 0, 0, 0, 2),
(4, '原型开发的好处', '', '', 0, 0, 0, 0, 2),
(5, '顺序表', '顺序表常用操作', 'uploads/taskfile/internet.jpg_20170401153226920.jpg', 0, 0, 0, 1, 1),
(6, '链表', '链表常用操作', 'uploads/taskfile/internet.jpg_20170401153727449.jpg', 0, 0, 1483315199, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tu_teacher`
--

CREATE TABLE `tu_teacher` (
  `tea_id` int(10) UNSIGNED NOT NULL,
  `tea_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `tea_password` char(255) NOT NULL DEFAULT '' COMMENT '密码',
  `tea_college` varchar(30) NOT NULL DEFAULT '' COMMENT '所属学院',
  `tea_description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `tea_sex` varchar(2) NOT NULL DEFAULT '' COMMENT '性别',
  `tea_phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `tea_email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `tea_professional` varchar(30) NOT NULL DEFAULT '' COMMENT '职称',
  `mg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '专业id',
  `clg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学院id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_teacher`
--

INSERT INTO `tu_teacher` (`tea_id`, `tea_name`, `tea_password`, `tea_college`, `tea_description`, `tea_sex`, `tea_phone`, `tea_email`, `tea_professional`, `mg_id`, `clg_id`) VALUES
(1, 's', 'eyJpdiI6IkY1N1wvME5QazJFNkJMdnZHVnhCSjF3PT0iLCJ2YWx1ZSI6ImFpYjVTMGNPQ0FMTjh3S0pwRU56UlE9PSIsIm1hYyI6ImM3ZDJhMWE3MTQ2YjAwYjBkZDkwMWY5Mzk1MWQzNzcwOGM3NjdhYmUyNzkwYTAxMzI1YzQ2MWFmYjFlZjczMjUifQ==', '', '', '', '', 'a@a.com', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tu_college`
--
ALTER TABLE `tu_college`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `tu_course`
--
ALTER TABLE `tu_course`
  ADD PRIMARY KEY (`cour_id`);

--
-- Indexes for table `tu_coursecategory`
--
ALTER TABLE `tu_coursecategory`
  ADD PRIMARY KEY (`ccg_id`);

--
-- Indexes for table `tu_homework`
--
ALTER TABLE `tu_homework`
  ADD PRIMARY KEY (`hw_id`);

--
-- Indexes for table `tu_major`
--
ALTER TABLE `tu_major`
  ADD PRIMARY KEY (`mg_id`);

--
-- Indexes for table `tu_student`
--
ALTER TABLE `tu_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `tu_talk`
--
ALTER TABLE `tu_talk`
  ADD PRIMARY KEY (`talk_id`);

--
-- Indexes for table `tu_task`
--
ALTER TABLE `tu_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tu_teacher`
--
ALTER TABLE `tu_teacher`
  ADD PRIMARY KEY (`tea_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tu_college`
--
ALTER TABLE `tu_college`
  MODIFY `clg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tu_course`
--
ALTER TABLE `tu_course`
  MODIFY `cour_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tu_coursecategory`
--
ALTER TABLE `tu_coursecategory`
  MODIFY `ccg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tu_homework`
--
ALTER TABLE `tu_homework`
  MODIFY `hw_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tu_major`
--
ALTER TABLE `tu_major`
  MODIFY `mg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tu_student`
--
ALTER TABLE `tu_student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tu_talk`
--
ALTER TABLE `tu_talk`
  MODIFY `talk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `tu_task`
--
ALTER TABLE `tu_task`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tu_teacher`
--
ALTER TABLE `tu_teacher`
  MODIFY `tea_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
