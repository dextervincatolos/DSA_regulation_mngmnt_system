-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2024 at 02:09 AM
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
-- Database: `sjcbidsa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year_tbl`
--

CREATE TABLE `academic_year_tbl` (
  `acadsyrID` int(11) UNSIGNED NOT NULL,
  `_from` year(4) NOT NULL,
  `_to` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_year_tbl`
--

INSERT INTO `academic_year_tbl` (`acadsyrID`, `_from`, `_to`) VALUES
(4, '2024', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs_tbl`
--

CREATE TABLE `activity_logs_tbl` (
  `logID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `_activity` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `activity_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs_tbl`
--

INSERT INTO `activity_logs_tbl` (`logID`, `userID`, `_activity`, `_status`, `activity_created_at`) VALUES
(5, 1, 'Login detected...', 'successfull', '2024-07-28 06:07:29'),
(6, 1, 'New school policy added...', 'successfull', '2024-07-28 06:32:42'),
(7, 1, 'New school policy sanction added...', 'successfull', '2024-07-28 06:32:42'),
(8, 1, 'New school policy added...', 'successfull', '2024-07-28 06:35:32'),
(9, 1, 'New school policy sanction added...', 'successfull', '2024-07-28 06:35:32'),
(10, 1, 'New school policy added (Gambling/Smoking/Possessing imbibing intoxicating liquor)..', 'successfull', '2024-07-28 06:41:08'),
(11, 1, 'New school policy sanction added for (Gambling/Smoking/Possessing imbibing intoxicating liquor)...', 'successfull', '2024-07-28 06:41:08'),
(12, 1, 'New school policy added (Immoral conduct and behavior)..', 'successfull', '2024-07-28 06:43:20'),
(13, 1, 'New school policy sanction added for (Immoral conduct and behavior)...', 'successfull', '2024-07-28 06:43:20'),
(14, 1, 'Register new user account...', 'successfull', '2024-07-28 08:13:37'),
(15, 1, 'Register new user account...', 'successfull', '2024-07-28 08:17:10'),
(16, 1, 'Deactivate user account...', 'successfull', '2024-07-28 08:30:56'),
(17, 1, 'Register new user account...', 'successfull', '2024-07-28 08:37:41'),
(18, 1, 'Deactivate user account...', 'successfull', '2024-07-28 08:38:19'),
(19, 1, 'Register new user account...', 'successfull', '2024-07-28 08:41:28'),
(20, 1, 'Deactivate user account...', 'successfull', '2024-07-28 08:42:12'),
(21, 1, 'Updated user information...', 'successfull', '2024-07-28 09:58:19'),
(22, 1, 'Updated user information (Jay Ziganay)...', 'successful', '2024-07-28 10:06:39'),
(23, 1, 'Created new department/College (College of Information and Computing Sciences)...', 'successfull', '2024-07-28 10:42:07'),
(24, 1, 'Created new department/College (Basic Education Unit)...', 'successful', '2024-07-28 10:51:56'),
(25, 1, 'Created new department/College (College of Arts, Sciences and Teacher Education Department)...', 'successful', '2024-07-28 10:52:35'),
(26, 1, 'Created new department/College (College of Business and Management)...', 'successful', '2024-07-28 10:53:02'),
(27, 1, 'Created new department/College (College of Criminology)...', 'successful', '2024-07-28 10:54:00'),
(28, 1, 'Updated department/College information (Basic Education Unit)...', 'successful', '2024-07-28 10:59:14'),
(29, 1, 'Updated department/College information (Basic Education Unit)...', 'successful', '2024-07-28 11:01:48'),
(30, 1, 'Deleted department/College (College of Criminology)...', 'successful', '2024-07-28 13:53:35'),
(31, 1, 'Created new department/College (College Information and Computing Sciences)...', 'successful', '2024-07-28 13:59:04'),
(32, 1, 'Created new department/College (Basic Education Unit)...', 'successful', '2024-07-28 13:59:17'),
(33, 1, 'Created new department/College (College of Arts, Sciences and Teacher Education Department)...', 'successful', '2024-07-28 13:59:41'),
(34, 1, 'Created new department/College (College of Criminology)...', 'successful', '2024-07-28 14:00:06'),
(35, 1, 'Created new department/College (College of Business and Management)...', 'successful', '2024-07-28 14:00:37'),
(36, 1, 'Created new course (Bachelor of Arts in Economics)...', 'successful', '2024-07-28 14:01:19'),
(37, 1, 'Created new course (Bachelor of Science in Information Technology)...', 'successful', '2024-07-28 14:04:35'),
(38, 1, 'Updated course information (College Information and Computing Sciences)...', 'successful', '2024-07-28 14:28:37'),
(39, 1, 'Updated course information (Bachelor of Arts in Economics)...', 'successful', '2024-07-28 14:29:42'),
(40, 1, 'Updated course information (Bachelor of Arts in Economics)...', 'successful', '2024-07-28 14:29:57'),
(41, 1, 'Updated course information (Bachelor of Arts in Economics)...', 'successful', '2024-07-28 14:32:57'),
(42, 1, 'Created new year level (Second year)...', 'successful', '2024-07-28 14:38:21'),
(43, 1, 'Updated year level (1st Year)...', 'successful', '2024-07-28 22:52:25'),
(44, 1, 'Updated year level (2nd year)...', 'successful', '2024-07-28 22:58:15'),
(45, 1, 'Deleted year level (2nd year)...', 'successful', '2024-07-28 23:04:40'),
(46, 1, 'Created new department/College (S.Y 2024 2025)...', 'successful', '2024-07-28 23:19:41'),
(47, 1, 'New semester opened (First Semester)...', 'successful', '2024-07-28 23:20:30'),
(48, 1, 'Created new student record (Dexter Vin Catolos)...', 'successful', '2024-07-28 23:44:34'),
(49, 1, 'New violation...', 'successful', '2024-07-29 03:09:07'),
(50, 1, 'Added new violation...', 'successful', '2024-07-29 03:11:38'),
(51, 1, 'Violation resolved (6)...', 'successful', '2024-07-29 03:24:19'),
(52, 1, 'Added new violation...', 'successful', '2024-07-29 03:26:27'),
(53, 1, 'Violation resolved (8)...', 'successful', '2024-07-29 03:27:16'),
(54, 1, 'Initiate logout...', 'successful', '2024-07-29 03:29:13'),
(55, 1, 'Login Initiated...', 'successfull', '2024-07-29 03:38:25'),
(56, 1, 'Initiated logout...', 'successful', '2024-07-29 03:50:16'),
(57, 1, 'Login Initiated...', 'successfull', '2024-07-29 06:10:22'),
(58, 1, 'Login Initiated...', 'successfull', '2024-07-31 01:17:37'),
(59, 1, 'Updated user information (Arvy Baingan)...', 'successful', '2024-07-31 02:08:31'),
(60, 1, 'Created new course (Bachelor of Science in Computer Science)...', 'successful', '2024-07-31 07:29:50'),
(61, 1, 'Created new course (Bachelor of Science in Animation Technology)...', 'successful', '2024-07-31 07:30:15'),
(62, 1, 'Created new course (Bachelor of Science in Elementary Education)...', 'successful', '2024-07-31 07:30:46'),
(63, 1, 'Updated course information (Bachelor of Science in Elementary Education)...', 'successful', '2024-07-31 07:31:22'),
(64, 1, 'Created new course (Bachelor of Science in Secondary Education)...', 'successful', '2024-07-31 07:31:53'),
(65, 1, 'Updated student information (Dexter Vin Catolos)...', 'successful', '2024-07-31 08:53:03'),
(66, 1, 'Updated student information (Dexter Catolos)...', 'successful', '2024-07-31 08:53:29'),
(67, 1, 'Updated student information (Dexter Catolo)...', 'successful', '2024-07-31 08:53:39'),
(68, 1, 'Updated student information (Dexter Catolo)...', 'successful', '2024-07-31 08:54:25'),
(69, 1, 'Updated student information (Dexter Catolo)...', 'successful', '2024-07-31 08:56:39'),
(70, 1, 'Updated student information (Dexter Catolo)...', 'successful', '2024-07-31 08:59:20'),
(71, 1, 'Updated student information (Dexter Catolo)...', 'successful', '2024-07-31 09:00:24'),
(72, 1, 'Updated student information (Dexter Vin Catolos)...', 'successful', '2024-07-31 09:02:35'),
(73, 1, 'Updated student information (Dexter Vin Catolos)...', 'successful', '2024-07-31 09:03:15'),
(74, 1, 'Deactivate Student account (Dexter Vin Catolos)...', 'successfull', '2024-07-31 13:33:44'),
(75, 1, 'Added new violation...', 'successful', '2024-07-31 14:38:00'),
(76, 1, 'Added new violation...', 'successful', '2024-07-31 14:38:30'),
(77, 1, 'Added new violation...', 'successful', '2024-08-01 00:18:04'),
(78, 1, 'Added new violation...', 'successful', '2024-08-01 00:18:52'),
(79, 1, 'Added new violation...', 'successful', '2024-08-01 00:33:20'),
(80, 1, 'Initiated logout...', 'successful', '2024-08-01 01:01:57'),
(81, 1, 'Login Initiated...', 'successfull', '2024-08-01 01:02:12'),
(82, 1, 'Added new violation...', 'successful', '2024-08-01 01:24:16'),
(83, 1, 'Initiated logout...', 'successful', '2024-08-01 01:28:30'),
(84, 1, 'Login Initiated...', 'successfull', '2024-08-01 01:28:46'),
(85, 1, 'Initiated logout...', 'successful', '2024-08-01 01:34:22'),
(86, 1, 'Login Initiated...', 'successfull', '2024-08-01 05:36:35'),
(87, 1, 'Login Initiated...', 'successfull', '2024-08-01 06:00:39'),
(88, 1, 'Login Initiated...', 'successfull', '2024-08-01 07:01:48'),
(89, 1, 'Deactivate user account (Arvy Baingan)...', 'successfull', '2024-08-01 07:04:37'),
(90, 1, 'Register new user account...', 'successfull', '2024-08-01 07:05:23'),
(91, 1, 'Initiated logout...', 'successful', '2024-08-01 07:05:29'),
(92, 12, 'Login Initiated...', 'successfull', '2024-08-01 07:06:14'),
(93, 12, 'Violation resolved (6)...', 'successful', '2024-08-01 07:16:10'),
(94, 1, 'Login Initiated...', 'successful', '2024-08-01 07:48:57'),
(95, 12, 'Added new violation...', 'successful', '2024-08-01 07:49:38'),
(96, 12, 'Initiated logout...', 'successful', '2024-08-01 07:51:02'),
(97, 12, 'Login Initiated...', 'successful', '2024-08-01 07:51:41'),
(98, 12, 'Initiated logout...', 'successful', '2024-08-01 07:51:58'),
(99, 1, 'Deactivate user account (Arvy Baingan)...', 'successfull', '2024-08-01 07:52:19'),
(100, 12, 'Login Initiated...', 'successful', '2024-08-01 07:54:17'),
(101, 12, 'Initiated logout...', 'successful', '2024-08-01 08:01:54'),
(102, 12, 'Login Initiated...', 'successful', '2024-08-01 08:02:23'),
(103, 12, 'Initiated logout...', 'successful', '2024-08-01 08:02:34'),
(104, 1, 'Deactivate user account (Arvy Baingan)...', 'successfull', '2024-08-01 08:04:06'),
(105, 12, 'Login Initiated...', 'successful', '2024-08-01 08:12:44'),
(106, 1, 'Deactivate user account (Arvy Baingan)...', 'successfull', '2024-08-01 08:13:05'),
(107, 1, 'Login Initiated...', 'successful', '2024-08-01 08:22:27'),
(108, 1, 'Added new violation...', 'successful', '2024-08-01 15:05:47'),
(109, 1, 'Created new year level (2nd Year)...', 'successful', '2024-08-02 00:05:19'),
(110, 1, 'Created new year level (3rd Year)...', 'successful', '2024-08-02 00:05:26'),
(111, 1, 'Created new year level (4th Year)...', 'successful', '2024-08-02 00:05:31'),
(112, 1, 'Created new course (Elemetary education)...', 'successful', '2024-08-02 00:07:41'),
(113, 1, 'Created new course (Junior high education)...', 'successful', '2024-08-02 00:08:08'),
(114, 1, 'Created new course (Senior High School)...', 'successful', '2024-08-02 00:08:42'),
(115, 1, 'Created new course (Bachelor Arts in Economics)...', 'successful', '2024-08-02 00:09:30'),
(116, 1, 'Created new course ( Bachelor of Secondary Education, Major in English)...', 'successful', '2024-08-02 00:10:08'),
(117, 1, 'Created new course ( Bachelor of Secondary Education, Major in Mathematics)...', 'successful', '2024-08-02 00:11:09'),
(118, 1, 'Created new course ( Bachelor of Secondary Education, Major in Science)...', 'successful', '2024-08-02 00:11:30'),
(119, 1, 'Created new course ( Bachelor of Secondary Education, Major in Values Education)...', 'successful', '2024-08-02 00:11:53'),
(120, 1, 'Created new course ( Bachelor of Science in Social Work)...', 'successful', '2024-08-02 00:12:10'),
(121, 1, 'Created new course ( Bachelor of Library and Information Science)...', 'successful', '2024-08-02 00:12:34'),
(122, 1, 'Created new course ( Bachelor of Science in Tourism Management)...', 'successful', '2024-08-02 00:12:54'),
(123, 1, 'Created new course ( Bachelor of Science in Business Administration)...', 'successful', '2024-08-02 00:13:12'),
(124, 1, 'Created new course ( Bachelor of Science in Criminology)...', 'successful', '2024-08-02 00:13:32'),
(125, 1, 'Created new student record (Allan Jay Catolos)...', 'successful', '2024-08-02 00:14:34'),
(126, 1, 'Created new student record (Zaira Reyes)...', 'successful', '2024-08-02 00:15:29'),
(127, 1, 'Created new student record (Martin Cachola)...', 'successful', '2024-08-02 00:16:33'),
(128, 1, 'Created new student record (Carla Abellana)...', 'successful', '2024-08-02 00:17:36'),
(129, 1, 'Created new student record (Diana Jane Narag)...', 'successful', '2024-08-02 00:18:34'),
(130, 1, 'Created new student record (Jennifer Dasalla)...', 'successful', '2024-08-02 00:19:23'),
(131, 1, 'Created new student record (Marc Cabana)...', 'successful', '2024-08-02 00:20:06'),
(132, 1, 'Created new student record (Leo Pattung)...', 'successful', '2024-08-02 00:20:58'),
(133, 1, 'Added new violation...', 'successful', '2024-08-02 00:21:32'),
(134, 1, 'Added new violation...', 'successful', '2024-08-02 00:22:34'),
(135, 1, 'Added new violation...', 'successful', '2024-08-02 00:24:08'),
(136, 1, 'Added new violation...', 'successful', '2024-08-02 00:24:36'),
(137, 1, 'Added new violation...', 'successful', '2024-08-02 00:25:15'),
(138, 1, 'Added new violation...', 'successful', '2024-08-02 00:26:16'),
(139, 1, 'Added new violation...', 'successful', '2024-08-02 00:27:11'),
(140, 1, 'Login Initiated...', 'successful', '2024-08-04 07:38:28'),
(141, 1, 'Updated student information (Allan Jay Catolos)...', 'successful', '2024-08-05 03:57:50'),
(142, 1, 'Initiated logout...', 'successful', '2024-08-05 06:14:39'),
(143, 1, 'Login Initiated...', 'successful', '2024-08-05 06:55:09'),
(144, 1, 'Deactivate Student account (Diana Jane Narag)...', 'successfull', '2024-08-05 07:34:59'),
(145, 1, 'Deactivate Student account (Jennifer Dasalla)...', 'successfull', '2024-08-05 07:35:09'),
(146, 1, 'Violation resolved (22)...', 'successful', '2024-08-05 07:39:29'),
(147, 1, 'Violation resolved (20)...', 'successful', '2024-08-05 07:39:38'),
(148, 1, 'Created new department/College (sdfsdf)...', 'successful', '2024-08-05 08:02:55'),
(149, 1, 'Deleted department/College (sdfsdf)...', 'successful', '2024-08-05 08:02:59'),
(150, 1, 'Deleted course ( Bachelor of Secondary Education, Major in Science)...', 'successful', '2024-08-05 08:04:19'),
(151, 1, 'Added new violation...', 'successful', '2024-08-05 14:07:40'),
(152, 1, 'Violation resolved (7)...', 'successful', '2024-08-05 14:09:25'),
(153, 1, 'Violation resolved (24)...', 'successful', '2024-08-05 14:17:32'),
(154, 1, 'Initiated logout...', 'successful', '2024-08-05 14:45:12'),
(155, 1, 'Login Initiated...', 'successful', '2024-08-05 14:46:12'),
(156, 1, 'Added new violation...', 'successful', '2024-08-05 14:59:45'),
(157, 1, 'Initiated logout...', 'successful', '2024-08-05 15:14:57'),
(158, 1, 'Login Initiated...', 'successful', '2024-08-06 00:08:51'),
(159, 1, 'Initiated logout...', 'successful', '2024-08-06 00:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `courseID` int(11) UNSIGNED NOT NULL,
  `deptID` int(11) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`courseID`, `deptID`, `course_name`, `course_desc`) VALUES
(5, 10, 'BSIT', 'Bachelor of Science in Information Technology'),
(6, 10, 'BSCS', 'Bachelor of Science in Computer Science'),
(7, 10, 'BS Animation', 'Bachelor of Science in Animation Technology'),
(8, 12, 'BSEED', 'Bachelor of Science in Elementary Education'),
(9, 12, 'BSSED', 'Bachelor of Science in Secondary Education'),
(10, 11, 'Elementary', 'Elemetary education'),
(11, 11, 'Junior High School', 'Junior high education'),
(12, 11, 'Senior High School', 'Senior High School'),
(13, 12, 'ABEC', 'Bachelor Arts in Economics'),
(14, 12, 'BSED-ENG', ' Bachelor of Secondary Education, Major in English'),
(15, 13, 'BSED-MATH', ' Bachelor of Secondary Education, Major in Mathematics'),
(17, 12, 'BS in Val. Ed', ' Bachelor of Secondary Education, Major in Values Education'),
(18, 12, 'BSSW', ' Bachelor of Science in Social Work'),
(19, 12, 'BLIS', ' Bachelor of Library and Information Science'),
(20, 14, 'BSTM', ' Bachelor of Science in Tourism Management'),
(21, 14, 'BSBA', ' Bachelor of Science in Business Administration'),
(22, 13, 'BSCRIM', ' Bachelor of Science in Criminology');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `deptID` int(11) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`deptID`, `dept_name`, `dept_desc`) VALUES
(10, 'CICS', 'College Information and Computing Sciences'),
(11, 'BEU', 'Basic Education Unit'),
(12, 'CASTED', 'College of Arts, Sciences and Teacher Education Department'),
(13, 'CRIM', 'College of Criminology'),
(14, 'CBM', 'College of Business and Management');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `rid` int(11) UNSIGNED NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`rid`, `userID`, `token`, `expires_at`) VALUES
(41, 1, '8520d8d46a20cc6c020d38f44afa8502', '2024-08-01 09:36:07'),
(42, 1, '4d7e907e8a66f48e5a9a466a6797fdbe', '2024-08-01 09:37:01'),
(43, 1, '968353250b0a436f1c58f1516e43d2a2', '2024-08-01 09:40:08'),
(44, 1, 'f20528071d12973c53240d66ba8143e7', '2024-08-01 09:40:59'),
(45, 1, '35cbceb69aabc68e0c8243b05e7c5b38', '2024-08-01 09:42:38'),
(46, 1, 'af0c4e6626b56486fd8221f0bc5f9cfe', '2024-08-01 09:42:53'),
(51, 1, '1201ec8408941664f18a4c1d506a4aef', '2024-08-05 09:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `sanction_tbl`
--

CREATE TABLE `sanction_tbl` (
  `sanctionID` int(11) UNSIGNED NOT NULL,
  `spID` int(11) UNSIGNED NOT NULL,
  `sanction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanction_tbl`
--

INSERT INTO `sanction_tbl` (`sanctionID`, `spID`, `sanction`) VALUES
(8, 4, 'First violation - suspension for 4-5 days with promissory note. Must undergo guidance and counselling'),
(9, 4, 'Second Violation - dismissal'),
(10, 5, 'First Violation - Dismissal'),
(11, 6, 'First violation - Call parent. Warning with promissory note. Must undergo guidance counseling'),
(12, 6, 'Second Violation - suspension for 4-5 days with probation.'),
(13, 6, 'Third violation - Non Re-admission'),
(14, 7, '1'),
(46, 7, '2'),
(47, 4, 'Third Offense - SJDJH');

-- --------------------------------------------------------

--
-- Table structure for table `schoolpolicy_tbl`
--

CREATE TABLE `schoolpolicy_tbl` (
  `spID` int(11) UNSIGNED NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolpolicy_tbl`
--

INSERT INTO `schoolpolicy_tbl` (`spID`, `policy_title`, `policy_desc`) VALUES
(4, 'Taking part in all kinds of violations', 'Taking part in all kinds of violations like brawls, stabbing, inflicting physical injuries, inciting to violence through talks, meetings, printed materials, intimidation, and carrying of dangerous weapons and explosives.'),
(5, 'Using possessing and/or trafficking drugs of narcotics', 'Using possessing and/or trafficking drugs of narcotics like marijuana, shabu, and others'),
(6, 'Gambling/Smoking/Possessing imbibing intoxicating liquor', 'Gambling/Smoking/Possessing imbibing intoxicating liquor IN and OUT of the campus and/or entering school premises under its influence.'),
(7, 'Immoral conduct and behaviors', 'Immoral conduct and behavior, illicit relationship. Acts that lead to public scandal.s');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `semID` int(11) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester_tbl`
--

INSERT INTO `semester_tbl` (`semID`, `semester`) VALUES
(4, 'First Semester');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `studID` int(11) UNSIGNED NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_lname` varchar(255) NOT NULL,
  `student_mname` varchar(255) NOT NULL,
  `student_extname` varchar(255) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `student_contact` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `college` int(11) NOT NULL,
  `courseID` int(11) UNSIGNED NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `_isActive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`studID`, `student_fname`, `student_lname`, `student_mname`, `student_extname`, `student_gender`, `student_number`, `student_contact`, `student_email`, `added_by`, `college`, `courseID`, `student_address`, `_isActive`) VALUES
(2, 'Arvy', 'Baingan', 'Catolos', 'Jr', 'Male', 'S-0001', '09000000000', 'catolos@gmail.com.ph', 'Arvy Baingan', 12, 9, 'Barsat West Baggao, Cagayan', 'Active'),
(3, 'Allan Jay', 'Catolos', 'Synider', '', 'Male', 'S-0002', '09521823690', 'allanjay.catolos@gmail.com', 'Arvy Baingan', 10, 5, 'Barsat West Baggao Cagayan', 'Active'),
(4, 'Zaira', 'Reyes', '-', '', 'Female', 'S-0003', '09521823691', 'zaira.reyes@gmail.com', 'Arvy Baingan', 11, 10, 'Tuguegarao City', 'Active'),
(5, 'Martin', 'Cachola', 'Marcos', '', 'Male', 'S-0004', '09521823692', 'martin.cahola@gmail.com', 'Arvy Baingan', 12, 9, 'Quezon City', 'Active'),
(6, 'Carla', 'Abellana', 'Miguel', '', 'Female', 'S-0005', '09521823694', 'carla.abellana@gmail.com', 'Arvy Baingan', 13, 22, 'Mindanao', 'Active'),
(7, 'Diana Jane', 'Narag', 'Narag', '', 'Female', 'S-0006', '09521823696', 'diana.narag@gmail.com', 'Arvy Baingan', 14, 20, 'Linao East, Tuguegarao City', 'deactivated'),
(8, 'Jennifer', 'Dasalla', 'Imarie', '', 'Female', 'S-0007', '09521823697', 'jennifer.dasalla@gmail.com', 'Arvy Baingan', 12, 13, 'Abulug Cagayan', 'deactivated'),
(9, 'Marc', 'Cabana', 'Cachola', '', 'Male', 'S-0008', '09521823698', 'marc.cabana@gmail.com', 'Arvy Baingan', 13, 22, 'Cubao', 'Active'),
(10, 'Leo', 'Pattung', 'nardo', '', 'Male', 'S-0009', '09521823699', 'leo.pattung@gmail.com', 'Arvy Baingan', 12, 14, 'Tallang', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userID` int(11) UNSIGNED NOT NULL,
  `faculty_fname` varchar(255) NOT NULL,
  `faculty_role` varchar(255) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_number` varchar(255) NOT NULL,
  `faculty_contact` varchar(255) NOT NULL,
  `faculty_password` varchar(255) NOT NULL,
  `faculty_lname` varchar(255) NOT NULL,
  `faculty_mname` varchar(255) NOT NULL,
  `faculty_extname` varchar(255) NOT NULL,
  `faculty_address` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `faculty_fname`, `faculty_role`, `faculty_email`, `faculty_number`, `faculty_contact`, `faculty_password`, `faculty_lname`, `faculty_mname`, `faculty_extname`, `faculty_address`, `user_status`) VALUES
(1, 'Arvy', 'DSA-User', 'DSA.admin@gmail.com', 'F-0001', '09980235797', '$2y$10$/ps3QND3LFyNsiez4FXi9umBnhzugT5MHk8gUSEK2wPOsLwJ0VSDS', 'Baingan', 'Catolos', 'Jr', 'Barsat West Baggao Cagayan', 'offline'),
(8, 'Cielo Vee', 'DSA-User', 'teacher1@gmail.com', 'F-0002', '09245674532', '$2y$10$AmxN8tvzFkDmky9Q2yOCie8GYVuYmhJ1.XrE.x0lyRxMhj4ZkbNQe', 'Ziganay', '-', '', 'Dalla Baggao Cagayan', 'offline'),
(9, 'Carlos', 'DSA-User', 'teacher2@gmail.com', 'F-0003', '09245674530', '$2y$10$GNrN3ZasFMYiGNPgNoG0U.MIgaaF7/Au9cJrA4Vrc7Ku4zvM2QGIG', 'Yulo', 'Lumboy', 'Jr.', 'Barsat West Baggao Cagayan', 'offline'),
(10, 'Jay', 'DSA-User', 'teacher3@gmail.com', 'F-0004', '09245674500', '$2y$10$p2aETnKVPOS4CgjSL5GeEuBajk12khiaa7NtCITbYPAeVmK1Th/DG', 'Catolos', 'Lumboy', '', 'Dalla Baggao Cagayan', 'deactivated'),
(12, 'Sakura', 'DSA-User', 'teacher6@gmail.com', 'F-0006', '09760235797', '$2y$10$UWLHn1ZWZyQ.9X5xfYDbLuDQ52cWOXhfChtI9fDCwUZ8KM7GqdTWa', 'Takeda', 'Takeda', '', 'San Jose Baggao, Cagayan', 'deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `violation_tbl`
--

CREATE TABLE `violation_tbl` (
  `violationID` int(11) UNSIGNED NOT NULL,
  `studID` int(11) UNSIGNED NOT NULL,
  `spID` int(11) NOT NULL,
  `sanctionID` int(11) UNSIGNED NOT NULL,
  `yearlvlID` int(11) UNSIGNED NOT NULL,
  `acadsyrID` int(11) UNSIGNED NOT NULL,
  `semID` int(11) UNSIGNED NOT NULL,
  `violation_status` varchar(255) NOT NULL,
  `violation_added_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `violation_updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation_tbl`
--

INSERT INTO `violation_tbl` (`violationID`, `studID`, `spID`, `sanctionID`, `yearlvlID`, `acadsyrID`, `semID`, `violation_status`, `violation_added_by`, `created_at`, `updated_at`, `violation_updated_by`) VALUES
(6, 2, 6, 11, 7, 4, 4, 'resolved', 'Arvy Baingan', '2024-07-10 03:09:07', '2024-08-01 07:16:10', 'DexterZiganay'),
(7, 2, 4, 8, 7, 4, 4, 'resolved', 'Arvy Baingan', '2024-07-24 03:11:38', '2024-08-05 14:09:25', 'ArvyBaingan'),
(8, 2, 4, 9, 7, 4, 4, 'resolved', 'Arvy Baingan', '2024-07-25 03:26:27', '2024-07-29 03:27:16', 'ArvyBaingan'),
(9, 2, 7, 14, 7, 4, 4, 'Open', 'Arvy Baingan', '2024-07-31 14:38:00', '2024-07-31 14:38:00', ''),
(13, 2, 5, 10, 7, 4, 4, 'Open', 'Arvy Baingan', '2024-08-01 00:33:20', '2024-08-01 00:33:20', ''),
(14, 2, 6, 12, 7, 4, 4, 'resolved', 'Arvy Baingan', '2024-08-01 01:24:16', '2024-08-01 01:24:16', ''),
(17, 3, 7, 14, 9, 4, 4, 'Open', 'Arvy Baingan', '2024-08-02 00:21:32', '2024-08-02 00:21:32', ''),
(18, 4, 5, 10, 9, 4, 4, 'Open', 'Arvy Baingan', '2024-08-02 00:22:34', '2024-08-02 00:22:34', ''),
(19, 10, 6, 11, 11, 4, 4, 'Open', 'Arvy Baingan', '2024-08-02 00:24:08', '2024-08-02 00:24:08', ''),
(20, 8, 5, 10, 11, 4, 4, 'resolved', 'Arvy Baingan', '2024-08-02 00:24:36', '2024-08-05 07:39:38', 'ArvyBaingan'),
(21, 5, 5, 10, 11, 4, 4, 'Open', 'Arvy Baingan', '2024-08-02 00:25:15', '2024-08-02 00:25:15', ''),
(22, 7, 4, 8, 10, 4, 4, 'resolved', 'Arvy Baingan', '2024-08-02 00:26:16', '2024-08-05 07:39:29', 'ArvyBaingan'),
(23, 3, 4, 8, 7, 4, 4, 'Open', 'Arvy Baingan', '2024-08-02 00:27:11', '2024-08-02 00:27:11', ''),
(24, 6, 7, 46, 9, 4, 4, 'resolved', 'Arvy Baingan', '2024-08-05 14:07:40', '2024-08-05 14:17:32', 'ArvyBaingan'),
(25, 5, 4, 47, 11, 4, 4, 'Open', 'Arvy Baingan', '2024-08-05 14:59:45', '2024-08-05 14:59:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `yearlvl_tbl`
--

CREATE TABLE `yearlvl_tbl` (
  `yearlvlID` int(11) UNSIGNED NOT NULL,
  `year_lvl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearlvl_tbl`
--

INSERT INTO `yearlvl_tbl` (`yearlvlID`, `year_lvl`) VALUES
(7, '1st Year'),
(9, '2nd Year'),
(10, '3rd Year'),
(11, '4th Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year_tbl`
--
ALTER TABLE `academic_year_tbl`
  ADD PRIMARY KEY (`acadsyrID`);

--
-- Indexes for table `activity_logs_tbl`
--
ALTER TABLE `activity_logs_tbl`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  ADD PRIMARY KEY (`sanctionID`),
  ADD KEY `spID` (`spID`);

--
-- Indexes for table `schoolpolicy_tbl`
--
ALTER TABLE `schoolpolicy_tbl`
  ADD PRIMARY KEY (`spID`);

--
-- Indexes for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`semID`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `deptID` (`college`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  ADD PRIMARY KEY (`violationID`),
  ADD KEY `acadsyrID` (`acadsyrID`),
  ADD KEY `sanctionID` (`sanctionID`),
  ADD KEY `semID` (`semID`),
  ADD KEY `spID` (`spID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `yearlvlID` (`yearlvlID`);

--
-- Indexes for table `yearlvl_tbl`
--
ALTER TABLE `yearlvl_tbl`
  ADD PRIMARY KEY (`yearlvlID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year_tbl`
--
ALTER TABLE `academic_year_tbl`
  MODIFY `acadsyrID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_logs_tbl`
--
ALTER TABLE `activity_logs_tbl`
  MODIFY `logID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `courseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `deptID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `rid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  MODIFY `sanctionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `schoolpolicy_tbl`
--
ALTER TABLE `schoolpolicy_tbl`
  MODIFY `spID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `semID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `studID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  MODIFY `violationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `yearlvl_tbl`
--
ALTER TABLE `yearlvl_tbl`
  MODIFY `yearlvlID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs_tbl`
--
ALTER TABLE `activity_logs_tbl`
  ADD CONSTRAINT `activity_logs_tbl_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_tbl` (`userID`);

--
-- Constraints for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD CONSTRAINT `course_tbl_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department_tbl` (`deptID`) ON DELETE NO ACTION;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user_tbl` (`userID`);

--
-- Constraints for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  ADD CONSTRAINT `sanction_tbl_ibfk_1` FOREIGN KEY (`spID`) REFERENCES `schoolpolicy_tbl` (`spID`);

--
-- Constraints for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD CONSTRAINT `student_tbl_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course_tbl` (`courseID`);

--
-- Constraints for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  ADD CONSTRAINT `violation_tbl_ibfk_1` FOREIGN KEY (`acadsyrID`) REFERENCES `academic_year_tbl` (`acadsyrID`),
  ADD CONSTRAINT `violation_tbl_ibfk_2` FOREIGN KEY (`sanctionID`) REFERENCES `sanction_tbl` (`sanctionID`),
  ADD CONSTRAINT `violation_tbl_ibfk_3` FOREIGN KEY (`semID`) REFERENCES `semester_tbl` (`semID`),
  ADD CONSTRAINT `violation_tbl_ibfk_5` FOREIGN KEY (`studID`) REFERENCES `student_tbl` (`studID`),
  ADD CONSTRAINT `violation_tbl_ibfk_7` FOREIGN KEY (`yearlvlID`) REFERENCES `yearlvl_tbl` (`yearlvlID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
