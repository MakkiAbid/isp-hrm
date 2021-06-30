-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2021 at 11:35 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
(4, 'Main Campus', 'Multan', '2021-06-17 10:39:11', '2021-06-17 10:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Accounts', '2021-06-17 10:38:51', '2021-06-17 10:38:51'),
(4, 'CST', '2021-06-18 02:35:37', '2021-06-18 02:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `education_types`
--

DROP TABLE IF EXISTS `education_types`;
CREATE TABLE IF NOT EXISTS `education_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `education` varchar(255) NOT NULL,
  `marks_type` enum('PERCENTAGE','CGPA','GRADE') NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_types`
--

INSERT INTO `education_types` (`id`, `education`, `marks_type`, `duration`, `created_at`, `updated_at`) VALUES
(15, 'Matriculation', 'PERCENTAGE', 10, '2021-06-12 03:41:54', '2021-06-12 03:41:54'),
(16, 'BS CS', 'CGPA', 4, '2021-06-12 04:38:11', '2021-06-12 04:38:11'),
(17, 'Velit in ducimus od', 'GRADE', 2, '2021-06-16 06:54:58', '2021-06-16 06:54:58'),
(18, 'Sunt minus dolor lab', 'PERCENTAGE', 1, '2021-06-16 06:58:59', '2021-06-16 06:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

DROP TABLE IF EXISTS `job_apply`;
CREATE TABLE IF NOT EXISTS `job_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(4, 20, 4, '2021-06-30 06:27:21', '2021-06-30 06:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

DROP TABLE IF EXISTS `job_post`;
CREATE TABLE IF NOT EXISTS `job_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `education_types_id` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `no_of_seats` varchar(255) NOT NULL,
  `minimum_experience` varchar(255) NOT NULL,
  `last_submission_date` date NOT NULL,
  `is_publish` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`),
  KEY `department_id` (`department_id`),
  KEY `education_types_id` (`education_types_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `department_id`, `education_types_id`, `campus_id`, `title`, `description`, `no_of_seats`, `minimum_experience`, `last_submission_date`, `is_publish`, `created_at`, `updated_at`) VALUES
(3, 3, 15, 4, 'TEST JOB updated', 'some description updated', '5', '0', '2021-07-08', 0, '2021-06-18 08:02:46', '2021-06-18 03:02:46'),
(4, 4, 15, 4, 'Ea a officia consequ', 'Eos iure voluptatem t ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '58', '10', '2022-01-20', 1, '2021-06-30 11:21:26', '2021-06-29 02:19:38'),
(5, 3, 16, 4, 'Distinctio Nobis qu', 'Ducimus tempore in t ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '91', '4', '2021-03-11', 1, '2021-06-29 07:56:48', '2021-06-29 02:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `user_id`, `city`, `address`, `gender`, `marital_status`, `nationality`, `religion`, `cnic`, `created_at`, `updated_at`) VALUES
(1, 1, 'multan', 'Nesciunt enim fuga', 'male', 'married', 'Nemo rerum velit rep', 'Assumenda ad sed ill', '36302-1234567-8', '2021-06-24 07:56:19', '2021-06-14 03:12:10'),
(2, 20, 'karachi', 'Ut aut aut duis aute', 'female', 'single', 'Quo enim fuga Ex en', 'Duis officiis est a', '36302-1234567-7', '2021-06-24 07:58:05', '2021-06-15 03:11:13'),
(3, 25, 'islamabad', 'Quia velit minim si', 'female', 'married', 'In et commodo esse s', 'Et blanditiis perspi', '36302-1234567-3', '2021-06-24 07:58:13', '2021-06-16 07:55:20'),
(4, 26, 'rawalpindi', 'Officiis dolorem iur', 'female', 'married', 'Id omnis perferendi', 'Vel corporis natus a', '36302-1234567-4', '2021-06-24 07:58:34', '2021-06-16 07:57:49'),
(5, 21, 'lahore', 'some address', 'male', 'single', 'pakistnai', 'islam', '36302-8081443-5', '2021-06-18 12:40:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Some One', 'some@some.com', '$2y$10$281zbt1SLkJLWuqDY96s4.mzEJbcWAW.wEWb2oQBtTkA.XMs3j96q', 'admin', NULL, NULL),
(20, 'Candidate', 'candidate@candidate.com', '$2y$10$281zbt1SLkJLWuqDY96s4.mzEJbcWAW.wEWb2oQBtTkA.XMs3j96q', 'candidate', '2021-06-07 03:35:40', '2021-06-07 03:35:40'),
(21, 'Staff', 'staff@staff.com', '$2y$10$xK4VYAz5rE.DrESRYWyPauPODsXD8Y6xX9TOrBRcHKAq81/00kM1u', 'staff', '2021-06-15 03:11:13', '2021-06-15 03:11:13'),
(25, 'Rogan Kerr', 'test3@candidate.com', '$2y$10$qADNSHDceps4a75paFL81ebA1P5ToNsGFa8emtFPpCq8lABqNBRl2', 'candidate', '2021-06-16 07:55:20', '2021-06-16 07:55:20'),
(26, 'Lacota Woods', 'test2@candidate.com', '$2y$10$BlnDKvW/Opgjn37Wl9docutFRfbkowPhSFqCzqo08HAhix.Mmx2zi', 'candidate', '2021-06-16 07:57:49', '2021-06-16 07:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_education`
--

DROP TABLE IF EXISTS `users_education`;
CREATE TABLE IF NOT EXISTS `users_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `education_type_id` int(11) NOT NULL,
  `obtained` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `education_type_id` (`education_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_education`
--

INSERT INTO `users_education` (`id`, `user_id`, `education_type_id`, `obtained`, `total`, `year`, `institute`, `created_at`, `updated_at`) VALUES
(2, 1, 15, 5, 48, '1997', 'Amet et voluptates ', '2021-06-12 07:34:00', '2021-06-12 07:34:00'),
(3, 25, 16, 28, 51, '1994', 'Blanditiis ut fugiat', '2021-06-19 07:04:39', '2021-06-12 07:34:00'),
(4, 20, 15, 62, 97, '1977', 'Reprehenderit eiusm', '2021-06-19 07:04:46', '2021-06-12 07:34:00'),
(5, 26, 15, 64, 78, '1983', 'Esse voluptatibus e', '2021-06-19 07:04:27', '2021-06-14 05:29:12'),
(6, 1, 16, 93, 40, '1983', 'Ratione nisi elit e', '2021-06-14 05:29:12', '2021-06-14 05:29:12'),
(7, 1, 16, 93, 40, '1983', 'Ratione nisi elit e', '2021-06-14 05:29:30', '2021-06-14 05:29:30'),
(8, 26, 16, 3, 4, '2001', 'isp', '2021-06-19 07:04:27', '2021-06-14 05:29:12'),
(12, 20, 16, 62, 97, '1977', 'Reprehenderit eiusm', '2021-06-19 07:04:46', '2021-06-12 07:34:00'),
(13, 20, 17, 62, 97, '1977', 'Reprehenderit eiusm', '2021-06-19 07:04:46', '2021-06-12 07:34:00'),
(14, 20, 17, 62, 97, '1977', 'Reprehenderit eiusm', '2021-06-19 07:04:46', '2021-06-12 07:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_experience`
--

DROP TABLE IF EXISTS `users_experience`;
CREATE TABLE IF NOT EXISTS `users_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_experience`
--

INSERT INTO `users_experience` (`id`, `user_id`, `company`, `designation`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 25, 'Delgado and Matthews Co', 'Ea iusto eiusmod aut', '1975-04-14', '1978-01-06', '2021-06-30 09:08:06', '2021-06-14 07:24:27'),
(2, 26, 'Nicholson and Foreman Trading', 'Nostrud rerum in ad ', '2007-06-06', '2009-12-24', '2021-06-30 09:08:15', '2021-06-14 07:24:27'),
(3, 20, 'eadcjkahsdjk', 'skjadkjadNostrud rerum in ad ', '2006-06-06', '2021-12-24', '2021-06-30 09:45:04', '2021-06-14 07:24:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD CONSTRAINT `job_apply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_apply_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_post`
--
ALTER TABLE `job_post`
  ADD CONSTRAINT `job_post_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_post_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_post_ibfk_3` FOREIGN KEY (`education_types_id`) REFERENCES `education_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD CONSTRAINT `personal_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_education`
--
ALTER TABLE `users_education`
  ADD CONSTRAINT `users_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_education_ibfk_2` FOREIGN KEY (`education_type_id`) REFERENCES `education_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_experience`
--
ALTER TABLE `users_experience`
  ADD CONSTRAINT `users_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
