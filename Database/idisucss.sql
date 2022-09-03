-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 10:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idisucss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. ', '2022-08-22 14:55:30'),
(2, 'javascript', 'Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. ', '2022-08-22 14:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `thread_id` int(7) DEFAULT NULL,
  `comment_time` datetime DEFAULT current_timestamp(),
  `comment_by` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES
(1, 'dsfkjsldkfjlksdjflksdj', 1, '2022-08-27 23:37:36', 1),
(2, 'dsfkjsldkfjlksdjflksdjsdfsdfds', 1, '2022-08-27 23:37:36', 2),
(3, ' sadsadsa', 5, '2022-08-28 09:05:29', 1),
(4, ' okay keep going\r\n', 5, '2022-08-30 17:22:09', 3),
(5, ' okay keep going\r\n', 5, '2022-08-30 17:24:30', 4),
(6, 'type your comment\r\n', 1, '2022-08-30 18:08:33', 1),
(7, ' nice to \r\n', 1, '2022-08-30 18:09:51', 5),
(8, 'just chill and keep going with flow\r\n', 7, '2022-08-30 18:13:29', 5),
(9, ' Yup keep chilling is best \r\n', 7, '2022-08-30 18:14:39', 2),
(10, '&gt;', 4, '2022-09-01 18:45:07', 2),
(11, ' &lt;script&gt; alert(\"Hello World!!); &lt;/script&gt;', 2, '2022-09-01 18:49:31', 2),
(12, ' &lt;script&gt; alert(\"Hello World!!); &lt;/script&gt;', 2, '2022-09-01 18:56:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) DEFAULT NULL,
  `thread_desc` varchar(255) DEFAULT NULL,
  `thread_cat_id` varchar(255) DEFAULT NULL,
  `thread_user_id` int(7) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio', 'i am not unable to install on windows 10', '1', 1, '2022-08-24 16:42:38'),
(2, 'Problem is here', 'sdfdfdsfdsfdsfdsfds', '1', 2, '2022-08-27 22:35:09'),
(3, 'sdfdsf', 'sdfdsfsd', '1', 3, '2022-08-27 22:39:50'),
(4, 'vxcvxc', 'dsfsdfsdf', '1', 4, '2022-08-27 22:43:12'),
(5, 'Fetch api not working', 'it is not working on winodws', '2', 1, '2022-08-27 22:54:16'),
(6, 'Fetch api not working', 'it is not working on winodws', '2', 1, '2022-08-27 23:24:35'),
(7, 'A lots of problem i have faced in this days', 'nice to acces those proble still not a good', '1', 5, '2022-08-30 18:13:04'),
(9, 'kdsfkldsjfkj kdsjfkjdsof cjdcodcj df ', 'kdsfkldsjfkj kdsjfkjdsof cjdcodcj df ', '1', 2, '2022-09-01 18:57:54'),
(10, '&lt;script&gt;alert(\"hello world\"); &lt;/script&gt;', '&lt;script>alert(\"hello world\"); &lt;/script>', '1', 2, '2022-09-01 18:58:28'),
(11, 'ewrewrerew', 'ewrewrerew', '2', 8, '2022-09-03 11:35:02'),
(12, 'keep learning an keep exploring', 'keep learning an keep exploring', '2', 8, '2022-09-03 11:41:45'),
(13, 'jskdfjksjfskdfjkl', 'jskdfjksjfskdfjkl', '2', 8, '2022-09-03 11:42:15'),
(14, 'javascript', 'jskdfjksjfskdfjkl', '2', 8, '2022-09-03 11:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(7) NOT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`, `name`) VALUES
(1, 'dsfsdfdsfdsf', 'dsfdsfsd', '2022-08-28 10:08:22', 'sdfsdf'),
(2, 'success@gmail.com', '$2y$10$sxYavTyEBo.8rAsV3B0FGuujTpb9noULrfGvrI.LWn.6/k9tU0Rzm', '2022-08-28 10:17:04', 'success'),
(3, 'safal@gmail.com', '$2y$10$9LGZ/adpG1gssftP2OFN1OHR7ItkQjGCAmsqNpncMWymHWMfhJjS6', '2022-08-28 10:41:40', 'safal'),
(4, 'user@gmail.com', '$2y$10$cK3tozhYIJTimzuv54lFd.ktpcxlq.UbPigNWXoL4Sk9jijX5psie', '2022-08-28 10:46:34', 'user'),
(5, 'saphal@gmail.com', '$2y$10$JogCJZ9iKCKYtJ6O90T2auDKjlJYdw5Y9cnfYN25yp.Mibb5Teg2y', '2022-08-30 17:48:14', 'Saphal Ghorasaini'),
(6, 'admin@gmail.com', '$2y$10$UR8ZkqNpzGYcMsA0ioPxCOAtRLcSGJaiMGbE3FlpdQXKp2I8hyk3K', '2022-09-01 18:25:41', 'admin'),
(7, 'sabin@gmail.com', '$2y$10$DTQjLLymnPBfsMx4SRMaZenTLgAiqhiWB167vg6wANJuIZyg/6csy', '2022-09-01 19:09:00', 'sabin'),
(8, 'admin@123.com', '$2y$10$WILNUrUMcygRezRg0uc7buKkXFsrckGzD8ceYFgorOzTM.aQ3FeyK', '2022-09-03 10:28:19', 'admin Don');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
