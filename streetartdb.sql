-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 04:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streetartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `name`, `desc`) VALUES
(1, 'Ilustrasi', 'Ilustrasi'),
(2, 'Surealism', 'Surealism'),
(3, 'Impresionisme', 'Impresionisme'),
(4, 'Mural', 'Mural'),
(5, 'Neo-Impresionisme', 'Neo-Impresionisme');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `desc`, `user_id`, `content_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 35, 123177, '2018-04-19 22:47:58', NULL, NULL),
(2, 'asdasd', 35, 123177, '2018-04-19 22:48:12', NULL, NULL),
(3, 'TES', 35, 123178, '2018-04-19 22:57:43', NULL, NULL),
(4, 'asdas', 35, 123177, '2018-04-19 23:10:42', NULL, NULL);

--
-- Triggers `comments`
--
DELIMITER $$
CREATE TRIGGER `count_comments` AFTER INSERT ON `comments` FOR EACH ROW BEGIN
	UPDATE content SET total_comment = total_comment + 1 WHERE Id = NEW.content_id;
	END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_comment` AFTER DELETE ON `comments` FOR EACH ROW BEGIN
	UPDATE content SET total_comment = total_comment - 1 WHERE Id = OLD.content_id;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `total_like` int(11) DEFAULT NULL,
  `total_comment` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`Id`, `title`, `photos`, `desc`, `total_like`, `total_comment`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(123174, 'tes3', 'lqd.jpg', 'tes3', 1, 0, 32, '2018-04-19 16:38:15', NULL, NULL, 5),
(123175, 'tes4', 'pa.jpg', 'tes4', 1, 0, 32, '2018-04-19 16:38:56', NULL, NULL, 1),
(123176, 'Game1', 'bm1.jpg', 'Game1', 0, 0, 35, '2018-04-19 17:18:11', NULL, NULL, 2),
(123177, 'Game2', 'art-city-light-night-Favim_com-30786291.jpg', 'Game2', 1, 3, 35, '2018-04-19 17:19:08', NULL, NULL, 4),
(123178, 'Pic1', 'bipul2.jpg', 'Test', 0, 1, 32, '2018-04-19 22:34:08', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `Id` int(11) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `ended_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `followed_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`Id`, `user_id`, `followed_id`) VALUES
(15, 35, 32);

-- --------------------------------------------------------

--
-- Table structure for table `interest_detail`
--

CREATE TABLE `interest_detail` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `Id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `starting_price` varchar(255) DEFAULT NULL,
  `winner_price` varchar(255) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `email_status` enum('0','1') DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`Id`, `owner_id`, `content_id`, `starting_price`, `winner_price`, `winner_id`, `email_status`, `start_date`, `end_date`) VALUES
(2, 35, 123176, '400000', '500000', 32, NULL, '2018-05-10', '2018-05-17');

--
-- Triggers `lelang`
--
DELIMITER $$
CREATE TRIGGER `winner_trigger` AFTER UPDATE ON `lelang` FOR EACH ROW insert into winner_lelang(winner_id, lelang_id, winner_price)
    values(new.winner_id, new.Id, new.winner_price)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Id`, `user_id`, `content_id`) VALUES
(118, 35, 123175),
(119, 35, 123174),
(120, 32, 123177);

--
-- Triggers `likes`
--
DELIMITER $$
CREATE TRIGGER `count_likes` AFTER INSERT ON `likes` FOR EACH ROW BEGIN
	UPDATE content SET total_like = total_like + 1 WHERE Id = NEW.content_id;
	END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_likes` AFTER DELETE ON `likes` FOR EACH ROW BEGIN
	UPDATE content SET total_like = total_like - 1 WHERE Id = OLD.content_id;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Id` int(11) NOT NULL,
  `notif_id` varchar(15) DEFAULT NULL,
  `notified_id` int(11) DEFAULT NULL,
  `notifier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fotoprofil` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `email`, `fotoprofil`, `username`, `fullname`, `bio`, `phone`, `created_at`, `updated_at`, `password`, `status`) VALUES
(32, 'pandhuw58@gmail.com', NULL, NULL, 'Pandhu Wibowo', NULL, '081296807905', NULL, NULL, 'fe0fe29a0d6c4327bbf5f0ab0db972bb', '1'),
(34, 'pandhuw@gmail.com', NULL, NULL, 'Pandhu', NULL, '081296807905', '2018-04-13 22:11:05', NULL, 'fe0fe29a0d6c4327bbf5f0ab0db972bb', '1'),
(35, 'hendryrpl@gmail.com', 'tc1.jpg', 'hendryhnyss', 'Hendry Nugroho', 'asdasdasd', '089673751885', '2018-04-14 11:02:07', NULL, 'ae71018760a8730a6f652baa6a222a13', '1'),
(36, 'fakhri@gmail.com', NULL, NULL, 'Fakhry Ammarizky', NULL, '0812967584903', '2018-04-19 22:25:18', NULL, '00f5cd2d711b65895204a793e888b481', '0'),
(38, 'madness.game322@gmail.com', NULL, NULL, 'Madness', NULL, '0823921314123', '2018-05-06 23:56:40', NULL, 'ae71018760a8730a6f652baa6a222a13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `winner_lelang`
--

CREATE TABLE `winner_lelang` (
  `Id` int(11) NOT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `lelang_id` int(11) DEFAULT NULL,
  `winner_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Indexes for table `interest_detail`
--
ALTER TABLE `interest_detail`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `winner_id` (`winner_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `notified_id` (`notified_id`),
  ADD KEY `notifier_id` (`notifier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `winner_lelang`
--
ALTER TABLE `winner_lelang`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123179;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `interest_detail`
--
ALTER TABLE `interest_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `winner_lelang`
--
ALTER TABLE `winner_lelang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `featured`
--
ALTER TABLE `featured`
  ADD CONSTRAINT `featured_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interest_detail`
--
ALTER TABLE `interest_detail`
  ADD CONSTRAINT `interest_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interest_detail_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`notified_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`notifier_id`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
