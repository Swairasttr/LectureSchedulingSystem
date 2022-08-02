-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 08:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_description` varchar(3000) NOT NULL,
  `c_pic` varchar(255) NOT NULL,
  `c_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `c_description`, `c_pic`, `c_code`) VALUES
(2, 'Math', 'Basic Math', '../upload_img/2.jpg', '001'),
(3, 'English', 'English for Beginners', '../upload_img/3f6e6201f42e7ce3b168f417cab90f56.jpg', '002'),
(4, 'Physics', 'The Physics knowledge', '../upload_img/e92debf1b20a8b815b9f094d6618937a.jpg', '003'),
(7, 'Chemistry', 'Environmental Chemistry', '../upload_img/Chemistry.jpeg', '006'),
(8, 'arts', 'Creating Arts', '../upload_img/art.jpg', '007'),
(5, 'Algebra', 'Algebra for Beginners', '../upload_img/1.jpg', '004'),
(6, 'Computer', 'Fundamentals of Computers', '../upload_img/pexels-pixabay-257360.jpg', '005');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_designation` varchar(255) NOT NULL,
  `f_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_email`, `f_designation`, `f_password`) VALUES
(1, 'Muhammad Saad', 'muhammadsaad@gmail.com', 'lecturer', 'saad'),
(2, 'Muhammad Ali', 'muhammadali@gmail.com', 'lecturer', 'ali'),
(3, 'Sara Ali', 'saraali@gmail.com', 'teacher', 'sara'),
(4, 'Asad', 'asad@gmail.com', 'asad', 'YHXUWu');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`r_id`, `r_name`) VALUES
(2, '101'),
(3, '102'),
(4, '103'),
(5, '201'),
(6, '105'),
(7, '106');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `f_id`, `c_id`, `r_id`, `days`, `starttime`, `endtime`) VALUES
(1, 2, 3, 3, 'mon,tues,wed', '11:00:00', '12:00:00'),
(4, 3, 6, 5, 'mon,tues,wed', '14:40:00', '15:40:00'),
(5, 1, 4, 4, 'wed,thurs', '15:41:00', '16:41:00'),
(10, 4, 8, 7, 'fri', '08:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `select_course`
--

CREATE TABLE `select_course` (
  `sel_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `select_course`
--

INSERT INTO `select_course` (`sel_id`, `st_id`, `c_id`) VALUES
(1, 2, 3),
(2, 2, 6),
(4, 2, 4),
(5, 1, 3),
(6, 2, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_password` varchar(255) NOT NULL,
  `st_birth` date NOT NULL,
  `st_number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_name`, `st_email`, `st_password`, `st_birth`, `st_number`) VALUES
(1, 'Saba', 'saba@gmail.com', 'saba', '1998-02-14', '03001236547'),
(2, 'Sania', 'sania@gmail.com', 'sania', '1999-12-11', '03151234567'),
(3, 'Sahlah', 'sahlah@gmail.com', 'sahlah', '2021-09-28', '03011111'),
(4, 'Swaira', 'swaira@gmail.com', 'swaira', '2021-10-01', '0300232323'),
(5, 'Ayat', 'ayat@gmail.coom', 'ayat', '2021-09-29', '030141414'),
(6, 'haya', 'haya@gmail.com', 'haya', '2021-10-10', '030112122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `r_id` (`r_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `select_course`
--
ALTER TABLE `select_course`
  ADD PRIMARY KEY (`sel_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `select_course`
--
ALTER TABLE `select_course`
  MODIFY `sel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
