-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 08:16 AM
-- Server version: 10.4.8-MariaDB
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
(10, 'fahim', 'testt', 'CSE455', 'no', 'dsafasfd');

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
  `user` varchar(50) NOT NULL,
  `longdes` varchar(1000) NOT NULL,
  `filelink` varchar(100) NOT NULL,
  `prereq` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `teacher`, `coursetype`, `appointment`, `user`, `longdes`, `filelink`, `prereq`) VALUES
(39, 'CSE110', 'Basic Programming Concepts', 'Abrar Salehin', 'CSE', 'Everyday from 2PM to 5PM', 'abrar', 'HOCSE110 teaches the essential ideas of Computer Science for a zero-prior-experience audience. Computers can appear very complicated, but in reality, computers work within just a few, simple patterns. CS101 demystifies and brings those patterns to life, which is useful for anyone using computers today. In CSE110, participants play and experiment with short bits of \"computer code\" to bring to life to the power and limitations of computers. Everything works within the browser, so there is no extra software to download or install. CS101 also provides a general background on computers today: what is a computer, what is hardware, what is software, what is the internet. No previous experience is required other than the ability to use a web browser.', 'https://fahims.s3.us-east-1.amazonaws.com/cse110.pdf', 'CSE000'),
(40, 'CSE221', 'Basic algorithms', 'Mohammad Naqi', 'CSE', 'Saturday from 2PM to 5PM', 'naqi', 'Long description', '', ''),
(41, 'EEE417', 'Short circuits and waves', 'Niaz Mohammad', 'EEE', 'Sunday 10AM to 2PM', 'niaz', 'Long description', '', ''),
(42, 'EEE325', 'Long Power', 'Abrar Salehin', 'EEE', 'Thursday 2PM to 5AM', 'abrar', 'EEE325 Long Description', '', ''),
(43, 'STA201', 'Probability and Statistics ', 'Babul Kalam', 'OTH', 'Monday through Friday 2PM to 5AM', 'testt', 'Long description', '', ''),
(44, 'MAT120', 'Maths', 'Babul Kalam', 'OTH', 'Friday through Thursday 1PM to 5PM', 'testt', 'Long description', '', ''),
(45, 'CSE325', 'CSE325 short des', '', 'CSE', 'Not Today', 'abrar', 'CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325CSE325', 'https://fahims.s3.us-east-1.amazonaws.com/cse110.pdf', 'CSE322'),
(46, 'CSE520', 'CSE520 short des', 'Abrar Salehin', 'CSE', 'Never', 'abrar', 'CSE520 long des', 'https://fahims.s3.us-east-1.amazonaws.com/cse110.pdf', 'No'),
(47, 'CSE112', 'CSE112 short', 'Abrar Salehin', 'CSE', 'ss', 'abrar', 'CSE110 long', 'ss', 'ss'),
(48, 'MAT450', 'MAT450 Short des for table', 'Test Teacher One', 'OTH', 'All day saturday', 'testt', 'MAT450 loooooooong des', 'https://fahims.s3.us-east-1.amazonaws.com/cse110.pdf', 'MAT220');

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
('fahim', 'New Name', 'B', 'ee', 12312, '', 'no');

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

--
-- Dumping data for table `info_teacher`
--

INSERT INTO `info_teacher` (`uname`, `fullname`, `education`, `email`, `availability`, `bio`) VALUES
('abrar', 'Abrar Salehin', 'SCHOOL AND BRAC', 'd339479@urhen.com', 'Everyday All day', 'This is a short bio'),
('testt', 'Test Teacher One', 'Test College', 'testt@aol.com', 'Sunday', 'Short bio for the test teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `userstatus` varchar(8) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `userstatus`) VALUES
(8, 'abrar', '$2y$10$qypAAknC/A3ULKvggHFzTumZLxCRRMc3yjWctfEF0UiPiWrHCl5Pu', '2019-07-22 14:43:25', 'teacher'),
(13, 'admin', '$2y$10$sl9tj58eSLdks5GausH1pueXfMDWOgaaJ4f41fMMeCr6ad2WCevju', '2019-07-22 16:36:11', 'admin'),
(16, 'fahim', '$2y$10$rwwbdYK0K3G37yqoXlGqpeRAAHqhDCXoERzDAQc4ngiBOeHXTy31W', '2019-11-17 09:47:43', 'user'),
(19, 'notstudent', '$2y$10$eMUtlR2W6BDDIhXJvtGHlevlictxVRyGvaeqWWGvY7xigB.0WL/yG', '2019-12-09 05:02:28', 'user'),
(20, 'testt', '$2y$10$s59nexJVYrAtKm2eF0pI0.NzX/oMb5GL942YDxv3iItUqq37K53..', '2019-12-09 08:23:37', 'teacher');

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user` (`user`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userstatus` (`userstatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
