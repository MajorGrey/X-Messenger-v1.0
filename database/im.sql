-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 12:59 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im`
--

-- --------------------------------------------------------

--
-- Table structure for table `abel`
--

CREATE TABLE `abel` (
  `id` int(11) NOT NULL,
  `user1_id` varchar(30) NOT NULL,
  `user2_id` varchar(30) NOT NULL,
  `user_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biggiman`
--

CREATE TABLE `biggiman` (
  `id` int(11) NOT NULL,
  `user1_id` varchar(30) NOT NULL,
  `user2_id` varchar(30) NOT NULL,
  `user_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biggman`
--

CREATE TABLE `biggman` (
  `id` int(11) NOT NULL,
  `user1_id` varchar(30) NOT NULL,
  `user2_id` varchar(30) NOT NULL,
  `user_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bolu`
--

CREATE TABLE `bolu` (
  `id` int(11) NOT NULL,
  `user1_id` varchar(30) NOT NULL,
  `user2_id` varchar(30) NOT NULL,
  `user_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sid` varchar(10000) DEFAULT NULL,
  `rid` varchar(1000) DEFAULT NULL,
  `chatid` varchar(1000) DEFAULT NULL,
  `msg` mediumtext,
  `image` varchar(1000) DEFAULT NULL,
  `username` varchar(1000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sid`, `rid`, `chatid`, `msg`, `image`, `username`, `date`) VALUES
(39, '8', '7', '56', 'Tunde', NULL, 'bolu', '2019-11-09 10:38:15'),
(45, '5', '8', '40', 'wetin det', NULL, 'xxx', '0000-00-00 00:00:00'),
(46, '5', '8', '40', 'wetin det', NULL, 'xxx', '2019-11-06 01:42:12'),
(47, '5', '8', '40', 'how e dey b', NULL, 'xxx', '2019-11-06 01:43:20'),
(48, '4', '8', '32', 'bawo nii', NULL, 'xxx', '2019-11-06 06:59:53'),
(49, '4', '8', '32', 'yfgfjhioouioyiuguo', NULL, 'xxx', '2019-11-06 07:01:15'),
(50, '4', '8', '32', '', NULL, 'xxx', '2019-11-06 07:01:18'),
(51, '7', '8', '56', 'sdad', NULL, 'xxx', '2019-11-09 10:25:35'),
(52, '7', '8', '56', 'sad', NULL, 'xxx', '2019-11-20 01:32:49'),
(53, '8', '7', '56', 'olaya', NULL, 'bolu', '2019-11-09 10:28:11'),
(54, '8', '7', '56', 'jdskdr', NULL, 'bolu', '2019-11-09 10:28:17'),
(55, '7', '4', '28', 'yo bro', NULL, 'grey', '2019-11-21 17:06:27'),
(56, '7', '4', '28', 'hows today', NULL, 'grey', '2019-11-21 17:06:35'),
(57, '7', '6', '42', 'abeli', NULL, 'abel', '2019-11-21 17:07:12'),
(58, '7', '6', '42', 'wetin dey sup', NULL, 'abel', '2019-11-21 17:07:33'),
(59, '7', '5', '35', 'biggiman', NULL, 'biggman', '2019-11-21 17:08:10'),
(69, '8', '5', '40', 'hello grey chukz', NULL, 'biggman', '2019-11-29 06:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` longtext NOT NULL,
  `fname` mediumtext,
  `username` varchar(10000) NOT NULL,
  `image` text NOT NULL,
  `time` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'online'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `fname`, `username`, `image`, `time`, `status`) VALUES
(41, '6', 'abel', 'abel', 'Lighthouse.jpg', '08:47:45pm', 'online'),
(47, '5', 'Adeleye', 'biggman', 'IMG_7406_cr.jpg', '02:28:57am', 'online'),
(48, '4', 'grey', 'grey', '_DSC619gfdf8.JPG', '01:47:43am', 'online'),
(62, '7', 'Bolu', 'bolu', 'IMG_7180_cr.jpg', '08:59:09pm', 'online'),
(63, '8', 'xxx xxx', 'xxx', '68967823_2362259857225593_7056398261057224704_n.jpg', '01:50:24am', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `image`, `username`, `fname`, `mobile`, `password`, `ip`, `date`) VALUES
(4, 'grey@grey.grey', '_DSC619gfdf8.JPG', 'grey', 'grey', '', 'ca50000a180a293de0b27acb67a695cb', '127.0.0.1', '2019-10-04 20:55:13'),
(5, 'contact@adeleyeayodeji.com', 'IMG_7406_cr.jpg', 'biggman', 'Adeleye', '09030919902', 'ab3845225c618f84ff15d82dc26101cc', '127.0.0.1', '2019-10-04 23:22:43'),
(6, 'abel@gmail.com', 'Lighthouse.jpg', 'abel', 'abel', '090238919', 'a6cd39ee5b1d8276f6bc716b3f7881b7', '127.0.0.1', '2019-10-05 21:56:25'),
(7, 'bolu@gmail.com', 'IMG_7180_cr.jpg', 'bolu', 'Bolu', '90384782390', '3573b51824147102d20b6e61ea29a89d', '127.0.0.1', '2019-10-08 18:31:20'),
(8, 'xxxx@xxx.xx', '68967823_2362259857225593_7056398261057224704_n.jpg', 'xxx', 'xxx xxx', '567657', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', '127.0.0.1', '2019-11-02 17:59:32'),
(9, 'adeleyeayodeji12345@gmail.com', '', 'biggiman', 'Adeleye', '07034803384', '21232f297a57a5a743894a0e4a801fc3', '192.168.8.101', '2019-11-02 20:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `xxx`
--

CREATE TABLE `xxx` (
  `id` int(11) NOT NULL,
  `user1_id` varchar(30) NOT NULL,
  `user2_id` varchar(30) NOT NULL,
  `user_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abel`
--
ALTER TABLE `abel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biggiman`
--
ALTER TABLE `biggiman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biggman`
--
ALTER TABLE `biggman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bolu`
--
ALTER TABLE `bolu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xxx`
--
ALTER TABLE `xxx`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abel`
--
ALTER TABLE `abel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biggiman`
--
ALTER TABLE `biggiman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biggman`
--
ALTER TABLE `biggman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bolu`
--
ALTER TABLE `bolu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `xxx`
--
ALTER TABLE `xxx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
