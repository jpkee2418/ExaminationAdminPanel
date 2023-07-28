-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 08:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE `dean` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `DeanNum` varchar(255) NOT NULL,
  `DeanName` varchar(255) DEFAULT NULL,
  `Faculty` enum('Technological Studies','Applied Science','Bussiness Studies') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT 'abcd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`id`, `Year`, `DeanNum`, `DeanName`, `Faculty`, `Email`, `contactno`, `Password`) VALUES
(1, '2021', 'UOV/FTS/Dean', 'MR.D.Suthakaran', 'Technological Studies', NULL, NULL, 'abcd'),
(2, '2022', 'UOV/FAS/Dean', 'MR.A', 'Applied Science', NULL, NULL, 'abcd'),
(3, '2020', 'UOV/FBS/Dean', 'Mr.B', 'Bussiness Studies', NULL, 704899858, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `HODNum` varchar(255) NOT NULL,
  `HODName` varchar(255) DEFAULT NULL,
  `Faculty` enum('Technological Studies','Applied Science','Bussiness Studies') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT 'abcd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`id`, `Year`, `HODNum`, `HODName`, `Faculty`, `Email`, `contactno`, `Password`) VALUES
(1, '2020', 'UOV/FTS/HOD', 'MR.V.Senthooran', 'Technological Studies', 'abcgmail.com', 123456, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `lectNum` varchar(255) NOT NULL,
  `lectName` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Faculty` enum('Technological Studies','Applied Science','Business Studies') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT 'abcd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `Year`, `lectNum`, `lectName`, `degree`, `age`, `Faculty`, `Email`, `contactno`, `Password`) VALUES
(1, '2021', 'UOV/FTS/L1', 'jhothiha', 'bsc', 24, 'Technological Studies', 'pradhajp2408@gmail.com', 134565431, 'jp'),
(2, '2018/2019', 'UOV/FTS/L2', 'amma', 'Bachelor of information and communication technology', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(3, '2018/2019', 'UOV/FBS/L1', 'vasi', 'Bachelor of information and communication technology', NULL, 'Business Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(4, '2018/2019', 'UOV/FAS/L1', 'vaishna', 'Bachelor of information and communication technology', NULL, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) NOT NULL,
  `StudentName` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Faculty` enum('Technological Studies','Applied Science','Business Studies') DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT 'abcd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Year`, `RegNo`, `StudentName`, `age`, `Faculty`, `Email`, `contactno`, `Password`) VALUES
(1, '2018/2019', '2018ICTS05', 'Jayapradha Perinparajah', 23, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'jp'),
(2, '2018/2019', '2018ICTS07', 'jhothiha', 21, 'Applied Science', 'pradhajp@gmail.com', 704899858, 'abcd'),
(4, '2018/2019', '2018ICTS08', 'vasi', NULL, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(5, '2018/2019', '2018ICTS79', 'kishorkanth', NULL, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(6, '2018/2019', '2018ICTS76', 'janani ', NULL, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(8, '2018/2019', '2018ICTS08', 'kanchana', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(9, '2019/2020', '2019FAS02', 'krishikan', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(10, '2018/2019', '2018ICTS01', 'princy', NULL, 'Technological Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(11, '2018/2019', '2018ICTS02', 'suracxshana', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(12, '2018/2019', '2018ICTS03', 'sivadhanusha', NULL, 'Business Studies', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(13, '2018/2019', '2018ICTS85', 'hashan', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(14, '2019/2020', '2019ICTS01', 'kabisha', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd'),
(15, '2020/2021', '2020ICT10', 'sadakshini', NULL, 'Applied Science', 'pradhajp2408@gmail.com', 704899858, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('Student','DR','Dean','HOD','Lecturer') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 'DR', 'UOV/DR', 'e2fc714c4727ee9395f324cd2e7f331f', 'DR uov'),
(2, 'Dean', 'UOV/Dean', 'e2fc714c4727ee9395f324cd2e7f331f', 'Dean uov'),
(3, 'HOD', 'UOV/HOD', 'e2fc714c4727ee9395f324cd2e7f331f', 'HOD uov'),
(4, 'Student', 'UOV/Stu', 'e2fc714c4727ee9395f324cd2e7f331f', 'Stu uov'),
(5, 'Lecturer', 'UOV/Lect', 'e2fc714c4727ee9395f324cd2e7f331f', 'lect uov');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
