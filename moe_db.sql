-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: moe-mysql-app: 3306
-- Generation Time: Sep 01, 2019 at 07:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `desk`
--

CREATE TABLE `desk` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `segment` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desk`
--

INSERT INTO `desk` (`id`, `user_id`, `name`, `segment`) VALUES
(74, 2, 'Notes', 'notes'),
(75, 2, 'Work', 'work'),
(76, 1, 'ÐÐ½Ð´Ñ€ÐµÐ¹ ÐŸÐµÑ€ÐµÐ²ÐµÑ€Ð·ÐµÐ²', 'andrey-pereverzev'),
(77, 1, 'Desk 2', 'desk'),
(78, 1, 'Some desk', 'new-desk'),
(79, 1, 'My awesome desk', 'my-awesome-desk'),
(80, 19, 'Secc', 'new-desk-1'),
(81, 19, 'First desk', 'new-desk'),
(82, 19, 'dd', 'dd'),
(83, 19, 'aaasdf', 'aa'),
(84, 19, 'kk', 'kk'),
(85, 19, 'df', 'df'),
(86, 19, 'aaa', 'aa-1'),
(87, 19, 'aaaa', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`) VALUES
(1, 'New menu'),
(2, 'Menu 2');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '#',
  `parent` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(5) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `name`, `link`, `parent`, `position`) VALUES
(1, 0, 'Home', '#', 0, 0),
(2, 0, 'About', '#', 0, 0),
(3, 0, 'Sample post', '#', 0, 0),
(4, 0, 'Contact', '#', 0, 0),
(7, 1, 'Item 1', '/link', 0, 1),
(8, 2, 'Item 1d', '#', 0, 0),
(9, 2, 'sdf', '#', 0, 3),
(10, 2, 'New item', '#', 0, 2),
(11, 1, 'Item 2', '/other link', 0, 0),
(12, 2, 'New iieee', '#', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `desk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '/#',
  `color` varchar(155) NOT NULL,
  `content` text NOT NULL,
  `markdown` text NOT NULL,
  `segment` varchar(255) NOT NULL,
  `type` varchar(155) NOT NULL DEFAULT 'page',
  `status` varchar(155) NOT NULL DEFAULT 'draft',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `desk_id`, `user_id`, `title`, `link`, `color`, `content`, `markdown`, `segment`, `type`, `status`, `date`) VALUES
(20, 74, 2, 'array length php', '', '#18abd5', 'content', '', 'array-length-php', 'page', 'publish', '2019-08-18 15:07:29'),
(21, 75, 2, 'Land Manager', '', '#18abd5', '<p><strong data-redactor-tag=\"strong\" data-verified=\"redactor\">cd Projects/lams-core-v1.0/LAMS/LAMS.WebUI/wwwroot/src </strong><span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\"><strong data-redactor-tag=\"strong\" data-verified=\"redactor\">â€‹â€‹</strong></span></p><p><span class=\"redactor-invisible-space\" data-verified=\"redactor\" data-redactor-tag=\"span\" data-redactor-class=\"redactor-invisible-space\"><strong data-redactor-tag=\"strong\" data-verified=\"redactor\"><a href=\"https://gitlab.com/agrichain-lams/lams-core-v1.0\">https://gitlab.com/agrichain-lams/lams-core-v1.0</a><span class=\"redactor-invisible-space\">â€‹</span><br></strong></span></p>', '', 'land-manager', 'undefined', 'undefined', '2019-08-18 15:08:41'),
(23, 77, 1, 'df', '', '#18abd5', 'content', '', 'df', 'page', 'publish', '2019-08-25 15:21:28'),
(26, 81, 19, 'werwersdf', '', 'blue', '<p>content</p>', '', 'dfdf', 'undefined', 'undefined', '2019-08-27 19:53:20'),
(27, 82, 19, 'dda', 'https://adm.tools/hosting/account/ftpaccess/?accid=150140', 'green', '<p>content</p>', '', 'dd', 'undefined', 'undefined', '2019-08-27 20:00:57'),
(28, 84, 19, 'kk', '', 'green', '<p>content</p>', '', 'kk', 'undefined', 'undefined', '2019-08-31 22:30:41'),
(29, 84, 19, 'sdfsdf\"sdfsdf', '', '#18abd5', 'content', '', 'sdfsdfsdfsdf', 'page', 'publish', '2019-08-31 23:18:39'),
(30, 84, 19, 'df\"\"', '', '#18abd5', 'content', '', 'dfdddd', 'page', 'publish', '2019-08-31 23:19:05'),
(31, 84, 19, 'abc\"\'', '', '#18abd5', 'content', '', 'abc', 'page', 'publish', '2019-08-31 23:20:46'),
(32, 84, 19, '\'-\'a', '', '#18abd5', '<p>con</p>', '', '-a', 'undefined', 'undefined', '2019-08-31 23:22:38'),
(33, 84, 19, '\'-\'a', '', '#18abd5', 'content', '', '-a', 'page', 'publish', '2019-08-31 23:22:54'),
(34, 83, 19, 'Ð¼Ð¾Ð¹ ÐºÐ°Ñ€Ñ‚Ð¾Ñ‡ÐºÐ°', '', '#18abd5', 'content', '', 'moy-kartochka', 'page', 'publish', '2019-09-01 01:34:08'),
(35, 86, 19, 'ddd', '', '#18abd5', 'content', '', 'ddd', 'page', 'publish', '2019-09-01 14:55:09'),
(39, 80, 19, 'Work', '', 'blue', '<p>dfdfSome contentâ€‹</p>', '```javascript\nsome test\n```', 'work', 'undefined', 'undefined', '2019-09-01 19:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `plugin`
--

CREATE TABLE `plugin` (
  `id` int(11) NOT NULL,
  `directory` varchar(255) NOT NULL,
  `is_active` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plugin`
--

INSERT INTO `plugin` (`id`, `directory`, `is_active`) VALUES
(3, 'ExamplePlugin', '0'),
(4, 'LiveTest', '0');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key_field` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `section` varchar(155) NOT NULL DEFAULT 'general'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `key_field`, `value`, `section`) VALUES
(1, 'Name site', 'name_site', 'MDMFD', 'general'),
(2, 'Description', 'description', 'Link Actualizing Platform', 'general'),
(3, 'Admin email', 'admin_email', 'admin@admin.com', 'general'),
(4, 'Language', 'language', 'english', 'general'),
(5, 'Active theme', 'active_theme', 'default', 'theme');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','moderator','user','') NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `hash`, `date_reg`) VALUES
(19, 'admin@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', '7807e0be0ba9365455fae0949a5b0728', '2019-08-26 14:26:14'),
(20, 'zvo.agency@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2019-08-26 14:26:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desk`
--
ALTER TABLE `desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugin`
--
ALTER TABLE `plugin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `key` (`key_field`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desk`
--
ALTER TABLE `desk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `plugin`
--
ALTER TABLE `plugin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
