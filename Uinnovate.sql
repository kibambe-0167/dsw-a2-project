-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2021 at 04:31 PM
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
(10, 4, 'let get in touch', 5, 'esther', 'chima', '2021-05-25'),
(11, 4, '  ', 5, 'esther', 'chima', '2021-05-26'),
(12, 4, 'your comment box doesn\'t allow empty spaces', 5, 'esther', 'chima', '2021-05-26'),
(13, 4, 'your comment box doesn\'t allow empty spaces', 5, 'esther', 'chima', '2021-05-26'),
(14, 4, 'nice 1', 5, 'esther', 'chima', '2021-05-26'),
(15, 4, 'great work', 14, 'bakali', 'phiri', '2021-05-27'),
(16, 4, 'happiness', 14, 'bakali', 'phiri', '2021-05-27'),
(17, 4, 'would like to see more', 10, 'kerein', 'kiba', '2021-05-29'),
(18, 18, 'nice!', 15, 'bakali', 'phiri', '2021-05-29'),
(19, 18, 'let talk some', 15, 'bakali', 'phiri', '2021-05-29'),
(20, 19, 'amazing ..!', 15, 'bakali', 'phiri', '2021-05-29'),
(21, 19, 'let talk some about this idea?', 5, 'esther', 'chima', '2021-05-29'),
(22, 20, 'well, im curious about this..!', 5, 'esther', 'chima', '2021-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `member_project`
--

CREATE TABLE `member_project` (
  `member_id` int(7) NOT NULL,
  `project_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_project`
--

INSERT INTO `member_project` (`member_id`, `project_id`) VALUES
(1, 18),
(2, 18),
(3, 18),
(4, 18),
(5, 18),
(6, 19),
(7, 19),
(8, 20),
(9, 20);

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
  `id` int(6) NOT NULL,
  `student_id` int(7) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `pro_desc` text NOT NULL,
  `project_file` blob DEFAULT NULL,
  `project_email` varchar(100) NOT NULL,
  `pro_ext_link` varchar(100) DEFAULT NULL,
  `pro_reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`id`, `student_id`, `pro_name`, `type`, `pro_desc`, `project_file`, `project_email`, `pro_ext_link`, `pro_reg_date`) VALUES
(19, 15, 'dummy2', 'ios app', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n          ', 0x4453572057656220546573742032202d204d617920323032312e706466, 'dummy2@gmail.com', '', '2021-05-29'),
(20, 15, 'dummy3 updated', 'mobile app', 'this is an app that helps blah blah blah and blah, its was made with blah, html, js, blah, backend with mysql, php and blah. its helps users do this and that and this is the problem we are solving....\r\n          ', 0x4453572057656220546573742032202d204d617920323032312e706466, '', '', '2021-05-29'),
(21, 15, 'dummy4', 'unknown yet', ' a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn  a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn  a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn  a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn a,sf jkdjfbkjsd skjdbvksdjbfksjdvksjdvbksjdbvksjdbvkjsdbvk ksdjv ksd ksjd vksdjbv ksjdvbksjdbvksdn ', NULL, 'dummy4@gmail.com', '', '2021-05-30');

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
(5, 'esther', 'chima', 'chima@gmail.com', '2021-05-10'),
(6, 'dk', 'matloa', 'dk@gmail.com', '2021-05-27'),
(7, 'isaac', 'chinyax', 'isaa@gmail.com', '2021-05-27'),
(8, 'tito', 'surname', 'tito@gmail.com', '2021-05-27'),
(9, 'zuma', 'zane', 'zane@gmail.com', '2021-05-27'),
(10, 'kena', 'kiba', 'kenakiba@gmail.com', '2021-05-29');

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
(15, 'bakali', 'phiri', 'phiri@student.uj.ac.za', 2, 'AIS', 'Bakali', '2021-05-27');

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
-- Dumping data for table `Team_member`
--

INSERT INTO `Team_member` (`member_id`, `firstname`, `lastname`, `email`) VALUES
(1, 'edward', 'mulenga', 'mulenga@gmail.com'),
(2, 'Zane', 'Shaka', 'zane@gmail.com'),
(3, 'Mary', 'Mumba', 'mary@gmail.com'),
(4, 'two', 'Mumba', 'two@gmail.com'),
(5, 'Surprise', 'Mumba', 'mumba@gmail.com'),
(6, 'micheal', 'james', 'james@gmail.com'),
(7, 'james', 'button', 'button@gmail.com'),
(8, 'one', 'two', 'one@gmail.com'),
(9, 'golden', 'surname', 'golden@gmail.com');

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
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Savvy`
--
ALTER TABLE `Savvy`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Team_member`
--
ALTER TABLE `Team_member`
  MODIFY `member_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;