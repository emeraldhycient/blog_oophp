-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2020 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `textz` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cat` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `textz`, `photo`, `date`, `cat`, `userid`) VALUES
(2, 'commodo consequat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', '', '2019-09-16 20:26:51', 'cat', ''),
(3, 'magna aliqua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', '', '2019-09-16 20:27:40', 'cat', ''),
(4, 'Lorem ipsum ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', 'Nike_Air_Force_1_Low_CMFT_Equality_White_Black_AQ2118_100_9605_720x-1-600x600.jpg', '2019-09-16 20:43:31', 'cat', '5edb6ad5822f8'),
(6, 'Ut enim ad minim veniam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', 'Black_White_BV4594_001_6872_540x.jpg', '2019-09-16 21:06:46', 'cat', '5edb6ad5822f8'),
(7, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit a', 'Make a YouTube Clone from Scratch JavaScript PHP and MySQL (Part -37) Styling the Form Header(360P).mp4', '2019-09-16 21:15:39', 'App_development', '5edb6ad5822f8'),
(8, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', 'wristwatchonhand.jpeg', '2019-10-26 19:26:02', 'Graphic_design', ''),
(9, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', 'wristwatchonhand.jpeg', '2019-10-26 19:26:42', 'Graphic_design', ''),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas', 'BeautyPlus_video_20190814083655094.mp4', '2020-06-15 15:51:30', '', '5edb6ad5822f8'),
(11, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', 'vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia a', 'Make a YouTube Clone from Scratch JavaScript PHP and MySQL (Part -37) Styling the Form Header(360P).mp4', '2020-06-15 16:10:31', 'select category', '5edb6ad5822f8');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `sender_profile_pic` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg`, `sender`, `sender_id`, `sender_profile_pic`, `photo`, `date`) VALUES
(1, 'hello', '', 0, '', 'Screenshot (1).png', '2020-04-12 20:42:34'),
(2, 'mad oo', '', 0, '', '', '2020-04-12 20:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentor` varchar(255) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `postid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `email`, `commentor`, `comment`, `postid`) VALUES
(1, 'igwezehycient86@gmail.com', 'emerald', 'nice watch', 9),
(2, 'igwezehycient86@gmail.com', 'emerald', 'nice watch', 9),
(3, 'igwezehycient86@gmail.com', 'hycient', 'testing my comment section', 9),
(4, 'fizzydiamonds@gmail.com', 'fizzy', 'nice bro!', 8),
(5, 'igwezehycient86@gmail.com', 'chris', 'bravo ', 8),
(6, '.igwezehycient86@gmail.com.', '.Igweze Hycient.', '.quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 9),
(7, 'igwezehycient86@gmail.com', 'Igweze Hycient', 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 6),
(8, 'annypaul86@gmail.com', 'anny paul', 'is this blog responsive ?', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `unqid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`unqid`, `fname`, `lname`, `username`, `email`, `profession`, `skills`, `phone`, `pass`, `role`, `avatar`, `created`) VALUES
('5edb6a00e768e', 'okechukwu', 'favour', 'favourokechukwu', 'igwezehycient', 'webdeveloper', 'html css jquery php', 2147483647, '$2y$10$nFCtkejWyNPqjtsw7EJEaO6T63kf0lL0KSU99UnmaaoN8LmDVAtx6', '', '../medias/Screenshot (5).png', '2020-06-06 11:03:45'),
('5edb6ad5822f8', 'Igweze', 'Hycient', 'igwezehycient', 'igwezehycient86@gmail.com', 'webdeveloper', 'html css jquery php', 2147483647, '$2y$10$BWGn2cCo/eioGrwBOkyfk.yPh6jC1sk8CbeG/V83lWchs0eqHu38C', '', 'Screenshot (5).png', '2020-06-06 11:07:17'),
('5edbc12f2c756', 'emmanuel', 'okey', 'favourokechukwu', 'favourite@gmail.com', 'webdeveloper', 'html css jquery php', 12345, '$2y$10$Bb9cMUUnUL85rgxDoU2laukfmVzChDFTDQcvIBVU7d2p5Q24TDJ6C', '', 'Screenshot (10).png', '2020-06-06 17:15:43'),
('5ee0fc70e3a0a', 'okon', 'malor', 'fav', 'yeujnxbdhdu@gmail.com', 'webdeveloper', 'html css jquery php', 123456789, '$2y$10$jd6mTOUi0oqJxCKA1ph4aesBHWu5yr/AWEWvs8Hdxna6fvEuUTNRK', '', 'Screenshot (1).png', '2020-06-10 16:29:53'),
('5ee0ff75db8c2', 'tom', 'mark', 'tommark', 'tommark@gmail.com', 'webdeveloper', 'html css jquery php', 123456789, '$2y$10$NwU973zAMz4DZzbwgwyYn.u.nPLC4Yh/YO2yxud4N3/ghtt4FbSwu', '', 'Screenshot (23).png', '2020-06-10 16:42:46'),
('5ee10007c3092', 'favcon', 'famcom', 'famcomfavcom', 'famcomfavcom@gmail.com', 'webdeveloper', 'html css jquery php', 123456789, '$2y$10$N0AXxXWFZdaQMKO7GTq3veiLvu.EvkADQ1S5Hq2SKQDilJOe531Sy', '', 'Screenshot (12).png', '2020-06-10 16:45:11'),
('5ee100ac69921', 'famj', 'sdfggh', 'sdfg', 'wetrrdcc', 'webdeveloper', 'html css jquery php', 1234567, '$2y$10$SJqHEyL49Ny91hwTy4ONz.GVI7f2AkcHwrFgOt3XFlqwHWmhuULZi', '', 'Screenshot (24).png', '2020-06-10 16:47:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`unqid`),
  ADD UNIQUE KEY `unqid` (`unqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
