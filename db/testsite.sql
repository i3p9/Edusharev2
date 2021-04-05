-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 08:43 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usermail` mediumtext NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `username`, `usermail`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$o6ij3/F/0T8KhSvh8X7RLu1vxVKcW5UfDA8geH22fdxL7MRI72DH6');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `requser` varchar(100) NOT NULL,
  `teauser` varchar(100) NOT NULL,
  `coursetitle` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `requser`, `teauser`, `coursetitle`, `comment`, `time`) VALUES
(1, 'faim', 'abrar', 'CSE110', 'HIU', 'All ady'),
(2, 'faim', 'abrar', 'CSE221', 'Sdasdasd', 'All ady'),
(3, 'faim', 'niaz', 'EEE420', 'Hello', 'Today'),
(4, 'faim', 'naqi', 'CSE335', 'Nothing', 'Tomorrow'),
(5, 'fahim', 'testt', 'CSE455', 'No', 'Monday'),
(6, 'fahim', 'abrar', 'CSE123', 'No', 'Monday'),
(7, 'fahim', 'testt', 'EER222', 'HH', 'Sunday'),
(8, 'fahim', 'abrar', 'TST222', 'no', 'no'),
(9, 'fahim', 'testt', 'TST555', 'sdfdsf', 'dsafasfd'),
(10, 'fahim', 'testt', 'CSE455', 'no', 'dsafasfd'),
(11, 'Shifat Sarwar', 'abrar', 'CSE335', 'Hello', 'Tomorrow');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `coursetype` varchar(3) NOT NULL DEFAULT 'CSE',
  `appointment` varchar(100) NOT NULL,
  `longdes` varchar(1000) NOT NULL,
  `timings` time NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `schedule` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `teacher`, `coursetype`, `appointment`, `longdes`, `timings`, `startdate`, `enddate`, `schedule`) VALUES
(39, 'CSE110', 'Basic Programming Concepts', 'Abrar Salehin', 'CSE', 'Everyday from 2PM to 5PM', 'HOCSE110 teaches the essential ideas of Computer Science for a zero-prior-experience audience. Computers can appear very complicated, but in reality, computers work within just a few, simple patterns. CS101 demystifies and brings those patterns to life, which is useful for anyone using computers today. In CSE110, participants play and experiment with short bits of \"computer code\" to bring to life to the power and limitations of computers. Everything works within the browser, so there is no extra software to download or install. CS101 also provides a general background on computers today: what is a computer, what is hardware, what is software, what is the internet. No previous experience is required other than the ability to use a web browser.', '00:00:00', '0000-00-00', '0000-00-00', ''),
(40, 'CSE221', 'Basic algorithms', 'Mohammad Naqi', 'CSE', 'Saturday from 2PM to 5PM', 'Long description', '00:00:00', '0000-00-00', '0000-00-00', ''),
(41, 'EEE417', 'Short circuits and waves', 'Niaz Mohammad', 'EEE', 'Sunday 10AM to 2PM', 'Long description', '00:00:00', '0000-00-00', '0000-00-00', ''),
(42, 'EEE325', 'Long Power', 'Abrar Salehin', 'EEE', 'Thursday 2PM to 5AM', 'EEE325 Long Description', '00:00:00', '0000-00-00', '0000-00-00', ''),
(43, 'STA201', 'Probability and Statistics ', 'Babul Kalam', 'OTH', 'Monday through Friday 2PM to 5AM', 'Long description', '00:00:00', '0000-00-00', '0000-00-00', ''),
(44, 'MAT120', 'Maths', 'Babul Kalam', 'OTH', 'Friday through Thursday 1PM to 5PM', 'Long description', '00:00:00', '0000-00-00', '0000-00-00', ''),
(45, 'CSE325', 'CSE325 short des', '', 'CSE', 'Not Today', 'CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325', '00:00:00', '0000-00-00', '0000-00-00', ''),
(46, 'CSE520', 'CSE520 short des', 'Abrar Salehin', 'CSE', 'Never', 'CSE520 long des', '00:00:00', '0000-00-00', '0000-00-00', ''),
(47, 'CSE112', 'CSE112 short', 'Abrar Salehin', 'CSE', 'ss', 'CSE110 long', '00:00:00', '0000-00-00', '0000-00-00', ''),
(48, 'MAT450', 'MAT450 Short des for table', 'Test Teacher One', 'OTH', 'All day saturday', 'MAT450 loooooooong des', '00:00:00', '0000-00-00', '0000-00-00', ''),
(49, 'CSE391', 'Programming for the Internet', 'Shifat', 'CSE', '', 'Programming for the InternetProgramming for the InternetProgramming for the InternetProgramming for the InternetProgramming for the InternetProgramming for the InternetProgramming for the Internet', '17:00:00', '2020-04-04', '2020-04-30', 'M/W');

-- --------------------------------------------------------

--
-- Table structure for table `courseobjects`
--

CREATE TABLE `courseobjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `des` longtext NOT NULL,
  `filelink` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseobjects`
--

INSERT INTO `courseobjects` (`id`, `name`, `username`, `des`, `filelink`) VALUES
(1, 'CSE110', 'Shifat', '', 'uploads/CSE110/5e82135e30dff8.97597315.png'),
(4, 'CSE110', 'Shifat', 'I am here', ''),
(5, 'CSE110', 'Shifat', 'I am not happy', 'uploads/CSE110/5e821684486033.35027156.png'),
(7, 'CSE110', 'Shifat', '', 'uploads/CSE110/blackOrange_03302020183522.png'),
(8, 'CSE110', 'Shifat', '', 'uploads/CSE110/html5_poster_03302020194944.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `coursereq`
--

CREATE TABLE `coursereq` (
  `requestid` int(11) NOT NULL,
  `teachername` varchar(100) NOT NULL,
  `courseid` varchar(8) NOT NULL,
  `coursename` text NOT NULL,
  `coursedes` varchar(1000) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `ctime` time NOT NULL,
  `cschedule` varchar(8) NOT NULL,
  `officiallink` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_student`
--

CREATE TABLE `info_student` (
  `uname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(10) NOT NULL,
  `major` varchar(20) NOT NULL,
  `bio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_student`
--

INSERT INTO `info_student` (`uname`, `fullname`, `institution`, `address`, `phone`, `major`, `bio`) VALUES
('Shifat', 'Shifat Sarwar', 'BRAC ', 'kakrail', 1830935039, '', 'I teach Physics');

-- --------------------------------------------------------

--
-- Table structure for table `info_teacher`
--

CREATE TABLE `info_teacher` (
  `uname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `bio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admissionid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `name`, `admissionid`) VALUES
('Shifat', 'CSE110', 1),
('Shifat', 'CSE221', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usermail` mediumtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `userstatus` varchar(8) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `usermail`, `password`, `created_at`, `userstatus`) VALUES
(13, 'admin', 'abc@gmail.com', '$2y$10$sl9tj58eSLdks5GausH1pueXfMDWOgaaJ4f41fMMeCr6ad2WCevju', '2019-07-22 16:36:11', 'admin'),
(26, 'Shifat', 'shifat@gmail.com', '$2y$10$MxaM5xLg7eSoVOdR.oisFe5H9FBDD2uvvVXHma3LpyjhWbpxpZjHm', '2020-03-26 22:26:35', 'user'),
(27, 'Ragib', 'ragib@gmail.com', '$2y$10$PdyEZdUeK36Evp9L1.YBkuxO32rd11KkvizjrH3YIdy.RoFl9YbeG', '2020-03-28 00:55:53', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher` varchar(100) NOT NULL,
  `vlimit` datetime NOT NULL,
  `voucherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher`, `vlimit`, `voucherid`) VALUES
('freeclass', '2020-06-30 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `courseobjects`
--
ALTER TABLE `courseobjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursereq`
--
ALTER TABLE `coursereq`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `info_student`
--
ALTER TABLE `info_student`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `info_teacher`
--
ALTER TABLE `info_teacher`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`admissionid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userstatus` (`userstatus`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucherid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `courseobjects`
--
ALTER TABLE `courseobjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coursereq`
--
ALTER TABLE `coursereq`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `admissionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info_student`
--
ALTER TABLE `info_student`
  ADD CONSTRAINT `info_student_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_teacher`
--
ALTER TABLE `info_teacher`
  ADD CONSTRAINT `info_teacher_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
