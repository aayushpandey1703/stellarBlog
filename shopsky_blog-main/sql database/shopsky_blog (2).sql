-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 08:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopsky_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `author`, `image`, `title`, `description`, `date`, `likes`) VALUES
(1, 'Aayush', 'proto.jpg', 'Comparison', 'This blog is for test purpose', '2020-12-05', 1),
(2, 'Aayush', 'apple-3840x2160-ios-10-4k-5k-live-wallpaper-live-photo-mount-macos-12000.jpg', 'web devlopement', 'Nature, in the broadest sense, is the natural, physical, or material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science. Although humans are part of nature, human activity is often understood as a separate category from other natural phenomena', '2020-12-05', 2),
(3, 'Aayush', 'Free-dark-background-wallpaper.jpg', 'Prototype', 'Test!!', '2020-12-05', 1),
(4, 'Aayush', 'apple-3840x2160-ios-10-4k-5k-live-wallpaper-live-photo-mount-macos-12000.jpg', 'Title', 'Nature, in the broadest sense, is the natural, physical, or material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science. Although humans are part of nature, human activity is often understood as a separate category from other natural phenomena', '2020-12-05', 0),
(5, 'Aayush', 'grp.jpg', 'Dev', 'Prototype only', '2020-12-05', 0),
(6, 'Aayush', 'person.jpeg', 'ML', '                Within the various uses of the word today             ', '2020-12-05', 1),
(12, 'Aayush', '9owEWdo.jpg', 'yo', '<p><span style=\"text-decoration: underline;\"><em><strong>This blog is just for test putpose</strong></em></span></p>\r\n<p><span style=\"text-decoration: underline;\"><em><strong><img src=\"image/Free-dark-background-wallpaper.jpg\" alt=\"\" width=\"1536\" height=\"960\" /></strong></em></span></p>', '2020-12-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE `coment` (
  `id` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coment` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coment`
--

INSERT INTO `coment` (`id`, `bid`, `name`, `coment`, `date`) VALUES
('', '', '', '', '2020-12-05'),
('2', '6', 'Aayush', 'Awsm blog!!!', '2020-12-05'),
('3', '2', 'Aayush Pandey', 'Test commen\'t!!', '2020-12-05'),
('3', '3', 'Aayush Pandey', 'Cool!!\n', '2020-12-05'),
('3', '1', 'Aayush Pandey', 'Awsm!!\n', '2020-12-06'),
('3', '12', 'Aayush Pandey', 'awsm\n', '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('reader','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Aayush', 'pandeyaayush88@gmail.com', '$2y$10$hCZzS6j7vlxU5secl3UOAO8dXcP1YuIsf7Hy.xpjQeOXYtl7QtDzW', 'admin'),
(3, 'Aayush Pandey', 'pandeyaayush81@gmail.com', '$2y$10$.Er1aGG5i76ae1GgM7H1C.cdX0fVOqkMHdcF4lv3QP/7TIsIOC2X2', 'reader');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `bid`) VALUES
('2', '1'),
('3', '3'),
('2', '13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
