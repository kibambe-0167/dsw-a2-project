-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2021 at 10:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Uinnovate`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `comment_id` int(7) NOT NULL,
  `pro_id` int(7) NOT NULL,
  `comment` text NOT NULL,
  `owner_id` int(7) NOT NULL,
  `owner_fname` varchar(50) NOT NULL,
  `owner_lname` varchar(50) NOT NULL,
  `made_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `pro_id`, `comment`, `owner_id`, `owner_fname`, `owner_lname`, `made_time`) VALUES
(1, 4, 'this is great, keep it up.', 5, 'esther', 'chima', '2021-05-25'),
(2, 9, 'can we talk about this, im really interested to know more.', 5, 'esther', 'chima', '2021-05-25'),
(3, 14, 'i can\'t wait to start using this.', 5, 'esther', 'chima', '2021-05-25'),
(4, 14, 'i can\'t wait to start using this.', 5, 'esther', 'chima', '2021-05-25'),
(5, 14, 'i can\'t wait to start using this.', 5, 'esther', 'chima', '2021-05-25'),
(6, 9, 'nice worl', 5, 'esther', 'chima', '2021-05-25'),
(7, 4, 'cool', 5, 'esther', 'chima', '2021-05-25'),
(8, 4, 'cool', 5, 'esther', 'chima', '2021-05-25'),
(9, 4, 'great guys', 5, 'esther', 'chima', '2021-05-25'),
(10, 4, 'let get in touch', 5, 'esther', 'chima', '2021-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `member_project`
--

CREATE TABLE `member_project` (
  `member_id` int(7) NOT NULL,
  `project_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `id` int(6) NOT NULL,
  `student_id` int(7) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_ext_link` varchar(255) DEFAULT NULL,
  `pro_reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`id`, `student_id`, `pro_name`, `type`, `pro_desc`, `pro_ext_link`, `pro_reg_date`) VALUES
(4, 10, 'smart check in', 'mobile App', 'this is a MOBILE app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', '', '2021-05-11'),
(6, 10, 'smart alert', 'mobile App', 'this is a mobile app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. This mobile app helps users do this and that and this is the problem we are solving using tbis mobile app....\r\n        ', 'www.smartalert.com', '2021-05-11'),
(9, 11, 'report', 'Mobile app', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', '', '2021-05-11'),
(11, 12, 'ulink', 'web App', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', 'www.link.com', '2021-05-19'),
(12, 13, 'smart report', 'web App', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', 'www.smart.com', '2021-05-19'),
(13, 12, 'mali app', 'mobile App', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', 'www.mali.com', '2021-05-23'),
(14, 12, 'calender app', 'mobile App', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n        ', '', '2021-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `Savvy`
--

CREATE TABLE `Savvy` (
  `id` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Savvy`
--

INSERT INTO `Savvy` (`id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
(1, 'micheal', 'Banda', 'micheal@gmail.com', '2021-05-09'),
(4, 'golden', 'Chanda', 'chanda@gmail.com', '2021-05-10'),
(5, 'esther', 'chima', 'chima@gmail.com', '2021-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(7) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `school_email` varchar(100) NOT NULL,
  `current_year` int(2) NOT NULL,
  `department` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `school_email`, `current_year`, `department`, `password`, `reg_date`) VALUES
(3, 'Bakali', 'Phiri', '9999999@student.uj.ac.za', 3, 'AIS', 'Bakali', '2021-05-09'),
(4, 'micheal', 'phiri', 'micheal@student.uj.ac.za', 3, 'AIS', 'Bakali', '2021-05-09'),
(7, 'mary', 'siya', 'siya@student.uj.ac.za', 1, 'AIS', 'Bakali', '2021-05-11'),
(10, 'jane', 'james', 'jane@student.uj.ac.za', 1, 'AIS', 'Bakali', '2021-05-11'),
(11, 'surprise', 'ngoveni', 'ngoveni@student.uj.ac.za', 2, 'AIS', 'Bakali', '2021-05-11'),
(12, 'hapiness', 'blah', 'blah@student.uj.ac.za', 2, 'AIS', 'Bakali', '2021-05-19'),
(13, 'hbk', 'hbk_name', 'hbk@student.uj.ac.za', 2, 'AIS', 'Bakali', '2021-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `Team_member`
--

CREATE TABLE `Team_member` (
  `member_id` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Savvy`
--
ALTER TABLE `Savvy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `Team_member`
--
ALTER TABLE `Team_member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Savvy`
--
ALTER TABLE `Savvy`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Team_member`
--
ALTER TABLE `Team_member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;