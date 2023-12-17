-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 05:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-title`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appliedjobs`
--

CREATE TABLE `tbl_appliedjobs` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `jbid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appliedjobs`
--

INSERT INTO `tbl_appliedjobs` (`id`, `date`, `pid`, `jbid`, `status`) VALUES
(1, '2023-12-17', 1, 1, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employers`
--

CREATE TABLE `tbl_employers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employers`
--

INSERT INTO `tbl_employers` (`id`, `name`, `email`, `password`) VALUES
(1, 'FSY Printing', 'fsy@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `eid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `qualifications` text NOT NULL,
  `salary` int(12) NOT NULL,
  `location` varchar(255) NOT NULL,
  `work_sched` varchar(100) NOT NULL,
  `work_arrangement` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `date`, `eid`, `title`, `description`, `qualifications`, `salary`, `location`, `work_sched`, `work_arrangement`, `status`) VALUES
(1, '2023-12-15', 1, 'Store Clerk', 'Provide quality costumer service.', 'Basic computer skills', 610, 'Caloocan City, Philippines', 'Full-Time', 'On-Site', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseekers`
--

CREATE TABLE `tbl_jobseekers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `bday` date NOT NULL,
  `education` text NOT NULL,
  `experience` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobseekers`
--

INSERT INTO `tbl_jobseekers` (`id`, `name`, `email`, `password`, `phone`, `bday`, `education`, `experience`, `skills`) VALUES
(1, 'Miks Yalung', 'miks@gmail.com', 'password', '09946647643', '2003-03-07', 'Studying Bachelor of Science in Computer Science in University of Caloocan City.', 'Worked as an Assistant at the Office of Senior Citizens Affairs at the North Caloocan City Hall this Summer, 2023.', 'Programming, Organizational Skills, Adaptability and Flexibility');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appliedjobs`
--
ALTER TABLE `tbl_appliedjobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`) USING BTREE,
  ADD KEY `appliedjobs_seekerFK` (`jbid`) USING BTREE;

--
-- Indexes for table `tbl_employers`
--
ALTER TABLE `tbl_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employer` (`eid`);

--
-- Indexes for table `tbl_jobseekers`
--
ALTER TABLE `tbl_jobseekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appliedjobs`
--
ALTER TABLE `tbl_appliedjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employers`
--
ALTER TABLE `tbl_employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jobseekers`
--
ALTER TABLE `tbl_jobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD CONSTRAINT `fk_employer` FOREIGN KEY (`eid`) REFERENCES `tbl_employers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
