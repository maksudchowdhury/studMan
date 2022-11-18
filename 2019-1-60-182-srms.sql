-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 07:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE DATABASE srms;
USE srms;

CREATE TABLE `admin_info` (
  `admin_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full name` varchar(100) NOT NULL,
  `password_simple` varchar(50) NOT NULL DEFAULT 'admin',
  `password` varchar(256) NOT NULL DEFAULT '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
  `image` varchar(100) NOT NULL DEFAULT 'images/profiles/admin/admin.jpg',
  `role` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `user_name`, `full name`, `password_simple`, `password`, `image`, `role`) VALUES
(3, 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'images/profiles/admin/default.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_id` int(50) NOT NULL,
  `course_name` varchar(10) NOT NULL,
  `course_section` int(10) NOT NULL,
  `course_instructor_id` int(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_name`, `course_section`, `course_instructor_id`, `semester`, `year`, `credit`) VALUES
(1, 'CSE103', 1, 6, 'summer', 2022, 4.5),
(2, 'CSE106', 1, 5, 'summer', 2022, 3),
(3, 'CSE110', 1, 6, 'summer', 2022, 4.5),
(4, 'CSE479', 1, 2, 'summer', 2022, 4.5),
(5, 'CSE360', 1, 3, 'summer', 2022, 3),
(6, 'CSE489', 1, 7, 'spring', 2022, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE `course_instructor` (
  `course_instructor_id` int(100) NOT NULL,
  `instructor_codename` varchar(50) NOT NULL,
  `instructor_fullname` varchar(100) NOT NULL,
  `instructor_email` varchar(100) NOT NULL,
  `instructor_phone` varchar(20) NOT NULL,
  `instructor_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`course_instructor_id`, `instructor_codename`, `instructor_fullname`, `instructor_email`, `instructor_phone`, `instructor_department`) VALUES
(1, 'mmsu', 'md mohsin uddin', 'mmsu@ewuedu.bd', '01912312312', 'CSE'),
(2, 'abst', 'abdus satter', 'abst@ewubd.edu', '01950123123', 'CSE'),
(3, 'shk', 'saddam hossain khan', 'shk@ewubd.edu', '01950123124', 'CSE'),
(4, 'rda', 'rashedul amin tuhin', 'rda@ewubd.edu', '01950123125', 'CSE'),
(5, 'nya', 'nawab yusuf ali', 'nya@ewubd.edu', '01950123126', 'CSE'),
(6, 'jao', 'jesan ahmed ovi', 'jao@ewubd.edu', '01950123127', 'CSE'),
(7, 'MKR', 'Dr. Md Mostofa Kamal Rasel', 'mkr@ewubd.edu', '01950123129', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(50) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_address` varchar(200) NOT NULL,
  `default_password` varchar(100) NOT NULL DEFAULT 'student',
  `student_password` varchar(256) NOT NULL DEFAULT '264c8c381bf16c982a4e59b0dd4c6f7808c51a05f64c35db42cc78a2a72875bb',
  `student_image` varchar(100) NOT NULL DEFAULT 'images/profiles/student/default.jpg',
  `student_status` varchar(10) NOT NULL DEFAULT 'active',
  `student_department` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `student_name`, `student_address`, `default_password`, `student_password`, `student_image`, `student_status`, `student_department`) VALUES
(2019160182, 'Maksud', 'Dhaka', '1', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'student/image/path/default.jpg', 'active', 'CSE'),
(2019460182, 'Rafa', 'Dhaka', 'student', '264c8c381bf16c982a4e59b0dd4c6f7808c51a05f64c35db42cc78a2a72875bb', 'student/image/path/default.jpg', 'active', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `result_id` int(100) NOT NULL,
  `student_id` int(50) NOT NULL,
  `course_id` int(100) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`result_id`, `student_id`, `course_id`, `exam`, `marks`) VALUES
(15, 2019160182, 1, 'quiz', 4),
(16, 2019160182, 1, 'classwork', 20),
(17, 2019160182, 1, 'mid-1', 20),
(18, 2019160182, 1, 'mid-2', 20),
(19, 2019160182, 1, 'final', 1),
(21, 2019160182, 2, 'quiz', 20),
(22, 2019160182, 2, 'classwork', 20),
(23, 2019160182, 2, 'mid-1', 20),
(24, 2019160182, 2, 'mid-2', 10),
(25, 2019160182, 2, 'final', 16),
(26, 2019160182, 5, 'quiz', 5),
(27, 2019160182, 5, 'classwork', 5),
(28, 2019160182, 5, 'mid-1', 6),
(29, 2019160182, 5, 'mid-2', 7),
(30, 2019160182, 5, 'final', 10),
(31, 2019460182, 6, 'quiz', 20),
(34, 2019460182, 6, 'classwork', 19),
(35, 2019460182, 6, 'final', 18.75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_instructor_foreignKey` (`course_instructor_id`);

--
-- Indexes for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD PRIMARY KEY (`course_instructor_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `course_id_foreignKey` (`course_id`),
  ADD KEY `student_id_foreignKey` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_instructor`
--
ALTER TABLE `course_instructor`
  MODIFY `course_instructor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `result_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_details`
--
ALTER TABLE `course_details`
  ADD CONSTRAINT `course_instructor_foreignKey` FOREIGN KEY (`course_instructor_id`) REFERENCES `course_instructor` (`course_instructor_id`);

--
-- Constraints for table `student_results`
--
ALTER TABLE `student_results`
  ADD CONSTRAINT `course_id_foreignKey` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`),
  ADD CONSTRAINT `student_id_foreignKey` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
