-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2025 at 04:09 PM
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
-- Database: `jobseera`
--

-- --------------------------------------------------------

--
-- Table structure for table `step1`
--

CREATE TABLE `step1` (
  `step1_id` int(11) NOT NULL,
  `step1_user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`location`)),
  `links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`links`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step1`
--

INSERT INTO `step1` (`step1_id`, `step1_user_id`, `first_name`, `last_name`, `phone`, `email`, `location`, `links`) VALUES
(2, 7, 'Saurav', 'Khandelwal', '8527545406', 'sauravthecoder@gmail.com', '{\"state\":\"Haryana\",\"city\":\"Faridabad\",\"area\":\"Sector 55\"}', '{\"link-id-4\":\"https:\\/\\/www.instagram.com\\/sauravwastaken\\/\",\"link-id-2\":\"https:\\/\\/github.com\\/Sauravwastaken\"}');

-- --------------------------------------------------------

--
-- Table structure for table `step2`
--

CREATE TABLE `step2` (
  `step2_id` int(11) NOT NULL,
  `step2_user_id` int(11) NOT NULL,
  `step2_school_x_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`step2_school_x_details`)),
  `step2_school_xii_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `step2_higher_education_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`step2_higher_education_details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step2`
--

INSERT INTO `step2` (`step2_id`, `step2_user_id`, `step2_school_x_details`, `step2_school_xii_details`, `step2_higher_education_details`) VALUES
(2, 7, '{\"school_name\":\"GMSSS Sec 55\",\"percentage\":\"100\",\"joining_date\":\"2018\",\"passing_date\":\"2019\"}', '{\"school_name\":\"GMSSS Sec 55\",\"percentage\":\"81\",\"joining_date\":\"2021\",\"passing_date\":\"2022\"}', '{\"Professional & Vocational Courses\":{\"courseName\":\"B.voc\",\"branchName\":\"Web Development\",\"higherEducationCgpa\":\"9\",\"higherEducationInstituteName\":\"JC Bose Univesity of Science and Technology, YMCA, Faridabad\",\"higherEducationJoiningDate\":\"2023\",\"higherEducationPassingDate\":\"2026\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `step3`
--

CREATE TABLE `step3` (
  `step3_id` int(11) NOT NULL,
  `step3_user_id` int(11) NOT NULL,
  `step3_entry_type` enum('job','project') NOT NULL,
  `step3_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`step3_details`)),
  `step3_start_date` varchar(100) NOT NULL,
  `step3_end_date` varchar(100) NOT NULL,
  `step3_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step3`
--

INSERT INTO `step3` (`step3_id`, `step3_user_id`, `step3_entry_type`, `step3_details`, `step3_start_date`, `step3_end_date`, `step3_description`) VALUES
(41, 7, 'job', '{\"jobTitle\":\"Wordpress Developer\",\"companyName\":\"Amazon\",\"jobLocation\":\"America\",\"jobType\":\"Full-Time\",\"jobTechUsed\":\"\"}', '02-2023', '04-2024', 'Working as a CEO'),
(42, 7, 'project', '{\"projectTitle\":\"Wishister\",\"companyName\":\"\",\"projectLocation\":\"https:\\/\\/github.com\\/Sauravwastaken\\/wishlister\",\"projectType\":\"Personal\",\"projectTechUsed\":\"ReactJs, Django\"}', '11-2024', '01-2025', 'A wishlist manager project');

-- --------------------------------------------------------

--
-- Table structure for table `step4_abilities`
--

CREATE TABLE `step4_abilities` (
  `step4_id` int(11) NOT NULL,
  `step4_user_id` int(11) NOT NULL,
  `step4_entry_type` enum('skill','lang') NOT NULL,
  `step4_name` varchar(100) NOT NULL,
  `step4_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step4_abilities`
--

INSERT INTO `step4_abilities` (`step4_id`, `step4_user_id`, `step4_entry_type`, `step4_name`, `step4_level`) VALUES
(22, 7, 'skill', 'HTML', 'Proficient'),
(23, 7, 'skill', 'CSS', 'Advanced'),
(24, 7, 'lang', 'English', 'Intermediate'),
(25, 7, 'lang', 'Hindi', 'Advanced');

-- --------------------------------------------------------

--
-- Table structure for table `step4_achievements`
--

CREATE TABLE `step4_achievements` (
  `step4_id` int(11) NOT NULL,
  `step4_user_id` int(11) NOT NULL,
  `step4_entry_type` enum('certificate','accomplish') NOT NULL,
  `step4_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`step4_details`)),
  `step4_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `step4_achievements`
--

INSERT INTO `step4_achievements` (`step4_id`, `step4_user_id`, `step4_entry_type`, `step4_details`, `step4_date`) VALUES
(10, 7, 'accomplish', '{\"name\":\"Rajya Purushkar\",\"provider\":\"Scout and guides\",\"description\":\"Went to a trip to shimla\"}', '01-2025'),
(11, 7, 'certificate', '{\"name\":\"Certificate1\",\"provider\":\"issuer1\",\"description\":\"desc of cer1\"}', '01-2025');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_provider` enum('local','google') NOT NULL,
  `user_google_linked` tinyint(1) NOT NULL DEFAULT 0,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_provider`, `user_google_linked`, `user_created_at`) VALUES
(7, 'Saurav Khandelwal', 'shrisauravji@gmail.com', NULL, 'google', 0, '2025-04-04 13:45:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `step1`
--
ALTER TABLE `step1`
  ADD PRIMARY KEY (`step1_id`);

--
-- Indexes for table `step2`
--
ALTER TABLE `step2`
  ADD PRIMARY KEY (`step2_id`);

--
-- Indexes for table `step3`
--
ALTER TABLE `step3`
  ADD PRIMARY KEY (`step3_id`);

--
-- Indexes for table `step4_abilities`
--
ALTER TABLE `step4_abilities`
  ADD PRIMARY KEY (`step4_id`);

--
-- Indexes for table `step4_achievements`
--
ALTER TABLE `step4_achievements`
  ADD PRIMARY KEY (`step4_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `step1`
--
ALTER TABLE `step1`
  MODIFY `step1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `step2`
--
ALTER TABLE `step2`
  MODIFY `step2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `step3`
--
ALTER TABLE `step3`
  MODIFY `step3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `step4_abilities`
--
ALTER TABLE `step4_abilities`
  MODIFY `step4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `step4_achievements`
--
ALTER TABLE `step4_achievements`
  MODIFY `step4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
