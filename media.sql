-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 04:20 AM
-- Server version: 5.6.36
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `media`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE IF NOT EXISTS `about_me` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `work` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `website` varchar(30) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `userid`, `work`, `birthday`, `mobile`, `website`, `location`) VALUES
(1, 25, 'Programmer', '2017-09-15', '08956881278', 'www.gethome.com', 'Bandung, Paris Van Java');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(11) NOT NULL,
  `messageid` int(11) NOT NULL,
  `useridfrom` int(11) NOT NULL,
  `useridto` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `followid` int(11) NOT NULL,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `auth` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`followid`, `fromid`, `toid`, `date`, `auth`) VALUES
(1, 25, 1, '2017-09-17 23:07:32', 0),
(3, 1, 25, '2017-09-07 00:00:00', 1),
(4, 1, 26, '2017-09-02 00:00:00', 1),
(5, 27, 1, '2017-09-23 22:16:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `friendid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `idfriend` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `caption` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_comment`
--

CREATE TABLE IF NOT EXISTS `gallery_comment` (
  `gallerycommentid` int(11) NOT NULL,
  `galleryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_like`
--

CREATE TABLE IF NOT EXISTS `gallery_like` (
  `gallerylikeid` int(11) NOT NULL,
  `galleryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageid` int(11) NOT NULL,
  `userid_1` int(11) NOT NULL,
  `userid_2` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `content`, `date`) VALUES
(29, 25, 'cek satu', '2017-09-13 10:04:13'),
(30, 24, 'cek satu', '2017-09-13 10:04:16'),
(31, 1, 'klsa', '2017-09-13 10:09:28'),
(32, 25, 'cek', '2017-09-19 13:16:50'),
(33, 25, 'cekilong', '2017-09-19 20:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE IF NOT EXISTS `post_comment` (
  `postcommentid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `auth` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`postcommentid`, `postid`, `userid`, `comment`, `date`, `auth`) VALUES
(7, 29, 25, 'rest', '2017-09-13 10:05:06', 1),
(8, 29, 25, 'sada', '2017-09-13 10:15:38', 1),
(10, 29, 25, 'test', '2017-09-13 10:17:53', 1),
(15, 29, 25, 'sad', '2017-09-13 10:37:20', 1),
(16, 29, 1, 'sad', '2017-09-13 10:38:41', 1),
(19, 31, 25, 'test', '2017-09-13 10:39:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE IF NOT EXISTS `post_like` (
  `postlikeid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `auth` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`postlikeid`, `postid`, `userid`, `date`, `auth`) VALUES
(3, 30, 24, '2017-09-13 10:33:40', 0),
(4, 29, 24, '2017-09-13 10:33:45', 1),
(6, 29, 25, '2017-09-19 19:55:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `date`, `usertype`, `status`, `foto`) VALUES
(1, 'kaloz', 'kaloz', 'kaloz.fauzan2@gmail.com', '2017-08-02 00:00:00', 'user', 'online', 'IMG_6089_2017_08_16_11_15_49.jpg\r\n'),
(20, 'admin', 'admin', 'admin@gmail.com', '2017-08-01 00:00:00', 'admin', 'online', 'IMG_6089_2017_08_16_11_15_49.jpg\r\n'),
(25, 'test', '$2y$10$1QRGSKEy3tLR3sv.gHYWKu2r1vf96Wzyx8vLnZa/OXp/PDZ6fM9nG', 'kaloz.fauzan2@gmail.com', '2017-09-14 14:02:19', 'user', 'online', 'IMG_6089_2017_09_23_11_39_50.jpg'),
(26, 'egi', '$2y$10$G6hBp/zaItvNUEhkW1wvn.DOdWiDGgYR3tB4xmJ7lMydh9LyuK2Ia', 'egi@gmail.com', '2017-09-20 09:31:50', 'user', 'online', 'Screenshot_from_2017-09-16_00-13-56_2017_09_25_10_15_12.png'),
(27, 'aden', '$2y$10$34Ksln1UvWk2QZU0n03dxeB35dXZ5urcw7vzAIJuAf2HPQH0oerHC', 'aden@gmail.com', '2017-09-23 22:08:50', 'user', 'online', 'IMG_6089_2017_09_23_10_16_06.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friendid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryid`);

--
-- Indexes for table `gallery_comment`
--
ALTER TABLE `gallery_comment`
  ADD PRIMARY KEY (`gallerycommentid`);

--
-- Indexes for table `gallery_like`
--
ALTER TABLE `gallery_like`
  ADD PRIMARY KEY (`gallerylikeid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`postcommentid`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`postlikeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friendid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_comment`
--
ALTER TABLE `gallery_comment`
  MODIFY `gallerycommentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery_like`
--
ALTER TABLE `gallery_like`
  MODIFY `gallerylikeid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `postcommentid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `postlikeid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
