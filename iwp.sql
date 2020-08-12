-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 06:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blind`
--

CREATE TABLE `blind` (
  `name` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blind`
--

INSERT INTO `blind` (`name`, `age`, `USERNAME`, `PASSWORD`, `dob`) VALUES
('devandra', 20, 'devandra', 'password', '2019-11-08'),
('rishi', 20, 'rishi', 'password', '2019-11-20'),
('Dheeraj Ga', 20, 'dheeraj_ga', '265_393', '1999-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `blindstudentcourse`
--

CREATE TABLE `blindstudentcourse` (
  `STUDENTID` int(10) NOT NULL,
  `COURSECODE` int(10) NOT NULL,
  `TEACHERID` int(10) NOT NULL,
  `MARKS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blindstudentcourse`
--

INSERT INTO `blindstudentcourse` (`STUDENTID`, `COURSECODE`, `TEACHERID`, `MARKS`) VALUES
(0, 0, 0, 0),
(0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `COURSECODE` varchar(20) NOT NULL,
  `MARKS` int(5) NOT NULL,
  `TEACHER` varchar(20) NOT NULL,
  `STUDENT` varchar(20) NOT NULL,
  `LOCATION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSECODE` varchar(20) NOT NULL,
  `COURSENAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSECODE`, `COURSENAME`) VALUES
('cse2006', 'micro'),
('CSE3001', 'IWP'),
('CSE3002', 'DBMS');

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE `courseteacher` (
  `COURSECODE` varchar(20) NOT NULL,
  `TEACHER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`COURSECODE`, `TEACHER`) VALUES
('CSE3002', 'Nalini_iwp'),
('CSE3001', 'Nalini_iwp'),
('CSE3002', 'Nalini_iwp');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `NAME` varchar(20) NOT NULL,
  `AGE` int(5) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `COURSES` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`NAME`, `AGE`, `TYPE`, `USERNAME`, `PASSWORD`, `DOB`, `COURSES`) VALUES
('manumanoj0010', 32, 'DEAF', 'manumanoj0010', 'password', '0000-00-00', '0'),
('manumanoj0010', 32, 'DEAF', 'manumanoj', 'password', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `COURSECODE` varchar(20) NOT NULL,
  `STUDENTID` int(5) NOT NULL,
  `MARKS` int(5) NOT NULL,
  `TEACHERID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`COURSECODE`, `STUDENTID`, `MARKS`, `TEACHERID`) VALUES
('CSE3001', 0, 0, 0),
('CSE3002', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `NAME` varchar(20) NOT NULL,
  `AGE` int(5) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`NAME`, `AGE`, `USERNAME`, `PASSWORD`, `DOB`) VALUES
('Nalini', 32, 'Nalini_iwp', 'password', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `COURSECODE` varchar(20) NOT NULL,
  `TEACHER` varchar(20) NOT NULL,
  `TOPIC` varchar(20) NOT NULL,
  `LOCATION` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSECODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
