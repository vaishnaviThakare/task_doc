-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 04:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`firstname`, `lastname`, `email`, `task`, `end_date`) VALUES
('HOD', '', 'admin@admin.com', 'project', '0000-00-00'),
('HOD', '', 'admin@admin.com', 'project', '0000-00-00'),
('HOD', '', 'admin@admin.com', 'zsddf', '0000-00-00'),
('Nivedita', 'Deshmukh', 'admin12@gmail.com', 'task', '2022-12-29'),

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(30) NOT NULL,
  `semester` tinyint(2) NOT NULL,
  `semester_number` int(200) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `semester_number`, `academic_year`, `start_date`, `end_date`) VALUES
(6, 0, 7, '2022-23', '2022-08-01', '2023-01-30'),
(10, 0, 6, '2022-23', '2023-02-01', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(30) NOT NULL,
  `task_id` int(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `actual_start_date` date DEFAULT NULL,
  `actual_end_date` date DEFAULT NULL,
  `assign_to` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `file_json` text NOT NULL,
  `task_cat` tinyint(2) DEFAULT NULL,
  `temp_name` tinyint(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `academic_year` varchar(10) NOT NULL,
  `semester_number` int(10) NOT NULL,
  `reccuring` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `task_id`, `title`, `status`, `start_date`, `end_date`, `actual_start_date`, `actual_end_date`, `assign_to`, `comment`, `description`, `file_json`, `task_cat`, `temp_name`, `date_created`, `academic_year`, `semester_number`, `reccuring`) VALUES
(42, 0, 'Title finalization', 3, '2023-01-02', '2023-01-04', '2023-01-02', '2023-01-04', 'Abhishek K', '                             \r\n             \r\n            ', '																																	', '', 0, 0, '2023-01-02 11:09:49', 'Select', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(100) NOT NULL,
  `task_cat` varchar(100) NOT NULL,
  `temp_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `task_cat`, `temp_name`, `title`) VALUES
(2, 'Group', 'seminar', 'Title Finalization'),
(5, 'Group', 'Seminar', 'Poster Presentation'),
(6, 'Group', 'Seminar', 'Report submission'),
(7, 'Group', 'Project', 'Title finalization'),
(8, 'Group', 'Project', 'Mid term evaluation'),
(9, 'Group', 'Project', 'Final evaluation'),
(10, 'Group', 'Project', 'Report submission'),
(11, 'Individual', 'DM', 'Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = admin, 5 = staff',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'HOD', '', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-11-26 10:57:04'),
(24, 'Academic', 'cordinator', 'xyz@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 2, '2022-12-31 13:42:39'),
(28, 'faculty', '.', 'sakshitapase991@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 3, '2023-01-02 11:24:53'),
(29, 'Abhishek', 'K', 'amk@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 3, '2023-01-02 11:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
