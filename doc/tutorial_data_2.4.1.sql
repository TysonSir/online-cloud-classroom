-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-28 11:39:15
-- 服务器版本： 5.5.28
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
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
-- 表的结构 `tu_courfile`
--

CREATE TABLE `tu_courfile` (
  `cf_id` int(10) UNSIGNED NOT NULL,
  `cf_name` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名',
  `cf_url` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  `cf_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `cf_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `cf_isdelete` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否删除',
  `cf_view` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '下载量',
  `cour_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '课程id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_courfile`
--

INSERT INTO `tu_courfile` (`cf_id`, `cf_name`, `cf_url`, `cf_addtime`, `cf_order`, `cf_isdelete`, `cf_view`, `cour_id`) VALUES
(1, 'C语言100题练习', 'uploads/courfile/起策C语言100题.PDF_20170529114559563.PDF', 1496058364, 0, 0, 0, 2),
(2, 'OOP练习', 'uploads/courfile/OOP练习.doc_20170722123308240.doc', 1500726814, 0, 0, 0, 3),
(3, '第1篇 面向对象的Java编程', 'uploads/courfile/面向对象的Java编程.ppt_20170722124754618.ppt', 1500727694, 0, 0, 0, 3);

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
  `cour_isdelete` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否删除',
  `tea_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '教师id',
  `cate_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级分类id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_course`
--

INSERT INTO `tu_course` (`cour_id`, `cour_name`, `cour_teacher`, `cour_title`, `cour_description`, `cour_image`, `cour_order`, `cour_time`, `cour_isdelete`, `tea_id`, `cate_id`) VALUES
(1, '数据结构', '刘雪娜', '数据结构是计算机存储、组织数据的方式。', '', 'uploads/images/20170529113333415.jpg', 0, 1496057667, 0, 8, 0),
(2, 'C语言程序设计', '刘雪娜', '入门编程语言', '', 'uploads/images/20170529113724240.jpeg', 0, 1496057867, 0, 8, 0),
(3, '面向对象程序设计（Java）', '任远鹏', '类、对象、继承、多态', '', 'uploads/images/20170722085016389.jpg', 0, 1500713465, 0, 9, 0),
(4, '数据库系统概论', '任远鹏', '数据库原理、增删改查及应用', '', 'uploads/images/20170722090142239.png', 0, 1500714038, 0, 9, 0);

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
-- 表的结构 `tu_courvideo`
--

CREATE TABLE `tu_courvideo` (
  `cv_id` int(10) UNSIGNED NOT NULL,
  `cv_name` varchar(50) NOT NULL DEFAULT '' COMMENT '视频名',
  `cv_url` varchar(255) NOT NULL DEFAULT '' COMMENT '视频路径',
  `cv_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `cv_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `cv_isdelete` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否删除',
  `cv_view` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '下载量',
  `cour_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '课程id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_courvideo`
--

INSERT INTO `tu_courvideo` (`cv_id`, `cv_name`, `cv_url`, `cv_addtime`, `cv_order`, `cv_isdelete`, `cv_view`, `cour_id`) VALUES
(1, 'C语言自学-01', 'uploads/courvideo/20170529114929391.mp4', 1496058573, 0, 0, 0, 2),
(2, '01-Java语法基础', 'uploads/courvideo/20170722114445356.mp4', 1500723890, 0, 0, 0, 3);

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
  `hw_comment` varchar(200) NOT NULL DEFAULT '' COMMENT '评语',
  `hw_score` tinyint(4) NOT NULL DEFAULT '0' COMMENT '分数',
  `hw_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `hw_addtime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上线时间',
  `hw_state` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '状态',
  `task_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '任务id',
  `stu_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学生id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_homework`
--

INSERT INTO `tu_homework` (`hw_id`, `hw_name`, `cour_name`, `hw_description`, `hw_file`, `hw_comment`, `hw_score`, `hw_order`, `hw_addtime`, `hw_state`, `task_id`, `stu_id`) VALUES
(1, '求1-100的和', 'C语言程序设计', '', 'uploads/homework/20170529114237420.docx', '态度认真，完全正确。', 99, 0, 1496058160, 0, 1, 1),
(2, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170722105359910.java', '', 0, 0, 1500720846, 0, 2, 2),
(3, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170722110824229.java', '格式规范，完成要求。', 80, 0, 1500721715, 0, 2, 2),
(4, '面向对象练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170722124327182.zip', '教师暂未评价', 66, 0, 1500727425, 0, 3, 2),
(5, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170722133703427.java', '教师暂未评价', 90, 0, 1500730625, 0, 2, 2),
(6, '求1-100的和', 'C语言程序设计', '', 'uploads/homework/20170722143601154.c', '', 0, 0, 1500734169, 0, 1, 1),
(7, '创建数据表Table', '数据库系统概论', '', 'uploads/homework/20170722144445344.sql', '教师暂未评价', 80, 0, 1500734688, 0, 4, 1),
(8, '面向对象练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170722144548182.cpp', '教师暂未评价', 60, 0, 1500734750, 0, 3, 1),
(9, '创建数据表Table', '数据库系统概论', '', 'uploads/homework/20170828060136753.cpp', '教师暂未评价', 60, 0, 1503900098, 0, 4, 2),
(10, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170828061032420.o', '', 0, 0, 1503900634, 0, 2, 1),
(11, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828061633145.exe', '教师暂未评价', 10, 0, 1503900997, 0, 5, 1),
(12, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170828063219889.cpp', '教师暂未评价', 2, 0, 1503901940, 0, 2, 3),
(13, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828063453124.o', '', 0, 0, 1503902094, 0, 5, 3),
(14, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828064234846.o', '', 0, 0, 1503902555, 0, 5, 3),
(15, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170828065149288.o', '', 0, 0, 1503903111, 0, 2, 3),
(16, '类操作练习', '面向对象程序设计（Java）', '', 'uploads/homework/20170828065715427.o', '教师暂未评价', 10, 0, 1503903436, 0, 2, 3),
(17, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828065937663.o', '教师暂未评价', 80, 0, 1503903579, 0, 5, 3),
(18, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828070331881.o', '', 0, 0, 1503903813, 0, 5, 3),
(19, '', '', '', 'uploads/homework/20170828070356533.o', '', 0, 0, 1503903837, 0, 0, 3),
(20, '列传行语句', '数据库系统概论', '', 'uploads/homework/20170828070442473.o', '教师暂未评价', 40, 0, 1503903883, 0, 5, 3),
(21, '子查询', '数据库系统概论', '', '', '', 0, 0, 1503904896, 1, 0, 0),
(22, '子查询', '数据库系统概论', '', 'uploads/homework/20170828072253423.o', '', 0, 0, 1503904979, 0, 8, 3),
(23, '接口interface', '面向对象程序设计（Java）', '', '', '', 0, 0, 1503905875, 1, 0, 0),
(24, '创建数据表Table', '数据库系统概论', '', 'uploads/homework/20170828074403418.jpg', '教师暂未评价', 88, 0, 1503906246, 0, 4, 2),
(25, '接口interface', '面向对象程序设计（Java）', '', 'uploads/homework/20170828080736837.jpg', '', 0, 0, 1503907657, 0, 9, 2);

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
(1, '蒋佳浩', 'eyJpdiI6IkptNGRQR0pZYU55TVwvak43ek8rMWtRPT0iLCJ2YWx1ZSI6IjJBZStqOFBvUFN0TnA2cXlWZ1Y4OWc9PSIsIm1hYyI6ImRiNmYxMWQyNzBjZGUxNmU1OTA5Nzc4MWZkMGZkODUwNjM0YmU4NjVhMzEwMmE1MTc5MTEwNDU5NTIyMTRkODUifQ==', '', '14301065', '0', '', '', '', 0, 0, 0),
(2, '陈泽众', 'eyJpdiI6IllMTTExWkhpcUdLQmt4bVwvQk9iZWpBPT0iLCJ2YWx1ZSI6IkpFTnkra2R0STQ0N05ldWo4aWE4UkE9PSIsIm1hYyI6IjMzNTI5ZGFiMzQ2ZGFmYjNkNTk2YzdiMWJiMDM0OTE2MmMxOTgyZTE3YzU5NTM3YTU5YzQxYTY1NDEwYWViYTgifQ==', '', '14301183', '0', '', '', '', 0, 0, 0),
(3, '张三', 'eyJpdiI6IkQ1OXV2NXcreUljSlpzTDNcL3FUZFpRPT0iLCJ2YWx1ZSI6IjRkTXQzdk5oRDRFNUh4dERxS2d2Zmc9PSIsIm1hYyI6IjI1NzBiY2VkODA0OWFmZWIxZWEyMjk0ZWQzMmIxZWFhZDUwMTgzNjYyNDQ2YzhmNGU1Mzc3ZjkzOTI0MjIyNTIifQ==', '', '14303333', '0', '', '', '', 0, 0, 0);

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
(1, '', '老师，今天讲什么？', 1496058721, 0, 2, 0),
(2, '', '讲数组与指针', 1496058856, 0, 2, 0),
(3, '', '二叉树非递归怎么实现？', 1496061672, 0, 1, 0);

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
(1, '求1-100的和', '  求1-100的和，提交完整工程文件。', '', 0, 0, 0, 1, 2),
(2, '类操作练习', '写一个汽车类，设计合理的成员属性和成员方法，并写出测试程序。', '', 0, 0, 1505462400, 1, 3),
(3, '面向对象练习', '  请提交程序代码', 'uploads\\taskfile\\OOP练习.doc_20170722123524831.doc', 0, 0, 1970, 1, 3),
(4, '创建数据表Table', '创建数据表User，Course，Homework', '', 0, 0, 1483257600, 1, 4),
(5, '列传行语句', ' 熟悉mysql 的case，when，than语句', '', 0, 0, 2017, 1, 4),
(9, '接口interface', '理解接口的定义', '', 0, 0, 1483257600, 1, 3),
(8, '子查询', '多表链接的另一种方式', '', 0, 0, 1483257600, 1, 4);

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
  `tea_order` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `mg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '专业id',
  `clg_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '学院id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tu_teacher`
--

INSERT INTO `tu_teacher` (`tea_id`, `tea_name`, `tea_password`, `tea_college`, `tea_description`, `tea_sex`, `tea_phone`, `tea_email`, `tea_professional`, `tea_order`, `mg_id`, `clg_id`) VALUES
(1, 'admin', 'eyJpdiI6InRtRHdreU5tVDMzb0loVU9jNmhPUEE9PSIsInZhbHVlIjoiUWs2TklUUnlvVDdqSTdsdUFNaVJUZz09IiwibWFjIjoiYTQ4N2UzMGM2ZGJjMjJkNTUyMTAwOTQ1Y2JhOWZjYWRkNmZmZmVlN2U0ODVlNWFjNjZkYjcyMThkZjJmMGYwOSJ9', '', '', '', '', 'a@a.com', '', 1, 0, 0),
(8, '刘雪娜', 'eyJpdiI6Ijl5dmJwVDNieTlvRXdnc1F2OEF0cnc9PSIsInZhbHVlIjoieGJXaXZleloweXZIYXJQUnBBV3oxQT09IiwibWFjIjoiYzY5MGE4MTdhODRlYzJmMGRjNDc3YzBlODIzNWEzMmY4NGVkODM1MDU0ODUxYzM3NDExOTMzZDU5Zjg3NmJmZiJ9', '', '', '', '', 'liuxuena@163.com', '', 0, 0, 0),
(9, '任远鹏', 'eyJpdiI6IlRxeDFHNFBmRDNicnZQOTdBSjd3ZUE9PSIsInZhbHVlIjoiZGlHS001WlJwbEtqOVFscjZNRWptVkQ4YW1DcUluSEpmWU51RTRIRm9nTT0iLCJtYWMiOiI5OGEzNzJkZDZhMDcxNjEzMWMzZDBhOTIwMWY3OGRlZTkxNTgxNjQ4YTA4NDc1MjgwZGIzZjcyNmNmMjQ5MmEyIn0=', '', '', '', '', '240117588@qq.com', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tu_college`
--
ALTER TABLE `tu_college`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `tu_courfile`
--
ALTER TABLE `tu_courfile`
  ADD PRIMARY KEY (`cf_id`);

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
-- Indexes for table `tu_courvideo`
--
ALTER TABLE `tu_courvideo`
  ADD PRIMARY KEY (`cv_id`);

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
-- 使用表AUTO_INCREMENT `tu_courfile`
--
ALTER TABLE `tu_courfile`
  MODIFY `cf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tu_course`
--
ALTER TABLE `tu_course`
  MODIFY `cour_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `tu_coursecategory`
--
ALTER TABLE `tu_coursecategory`
  MODIFY `ccg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tu_courvideo`
--
ALTER TABLE `tu_courvideo`
  MODIFY `cv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `tu_homework`
--
ALTER TABLE `tu_homework`
  MODIFY `hw_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `tu_major`
--
ALTER TABLE `tu_major`
  MODIFY `mg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `tu_student`
--
ALTER TABLE `tu_student`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tu_talk`
--
ALTER TABLE `tu_talk`
  MODIFY `talk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tu_task`
--
ALTER TABLE `tu_task`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `tu_teacher`
--
ALTER TABLE `tu_teacher`
  MODIFY `tea_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
