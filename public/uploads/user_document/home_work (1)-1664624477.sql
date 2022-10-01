-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 11:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpserve_jawaher`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_work`
--

CREATE TABLE `home_work` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `homework_doc_file` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-start,1-end'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_work`
--

INSERT INTO `home_work` (`id`, `user_id`, `grade_id`, `title`, `subject`, `description`, `start_date`, `due_date`, `homework_doc_file`, `status`) VALUES
(1, 2815, 459, 'iyuiuyi', 'fghgfhgfhgfhf', 'dfgfdgfgfdgdfg', '2021-08-26', '2021-08-20', 'twitter_PNG38.png', 0),
(2, 2815, 459, 'iyuiuyi', 'fghgfhgfhgfhf', 'dfgfdgfgfdgdfg', '2021-08-26', '2021-08-20', 'twitter_PNG38.png', 0),
(3, 2815, 86, 'iyuiuyi', 'fghgfhgfhgfhf', 'dfgfdgfgfdgdfg', '2021-08-26', '2021-08-20', 'twitter_PNG38.png', 0),
(4, 2815, 459, 'iopi', 'iopoip', 'oipoipoip', '2021-08-28', '2021-08-28', 'Lighthouse.jpg', 0),
(5, 177, 17, 'test', 'subject', 'test', '2021-08-03', '2021-08-06', 'Desert.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_work`
--
ALTER TABLE `home_work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_work`
--
ALTER TABLE `home_work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
