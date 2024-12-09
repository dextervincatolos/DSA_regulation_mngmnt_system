-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 05:26 AM
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
(6, '2024', '2025');

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
(203, 1, 'Login Initiated...', 'successful', '2024-10-03 02:23:18'),
(204, 1, 'Initiated logout...', 'successful', '2024-10-03 02:24:46'),
(205, 1, 'Login Initiated...', 'successful', '2024-10-04 05:59:42'),
(206, 1, 'New school policy added (Academic Suspension)..', 'successful', '2024-10-04 06:21:56'),
(207, 1, 'New school policy sanction added for (Academic Suspension)...', 'successful', '2024-10-04 06:21:56'),
(208, 1, 'Created new department/College (looooop)...', 'successful', '2024-10-04 06:26:10'),
(209, 1, 'Login Initiated...', 'successful', '2024-10-05 11:13:06'),
(210, 1, 'Login Initiated...', 'successful', '2024-10-06 03:39:44'),
(211, 1, 'Login Initiated...', 'successful', '2024-10-07 01:44:29'),
(212, 1, 'Updated Policy (Academic Suspension)...', 'successful', '2024-10-07 01:54:42'),
(213, 1, 'Initiated logout...', 'successful', '2024-10-07 01:55:21'),
(214, 1, 'Login Initiated...', 'successful', '2024-10-07 02:11:45'),
(215, 1, 'Initiated logout...', 'successful', '2024-10-07 02:16:19'),
(216, 1, 'Login Initiated...', 'successful', '2024-10-07 02:17:37'),
(217, 1, 'Updated department/College information (College of Computer Science)...', 'successful', '2024-10-07 02:57:56'),
(218, 1, 'Created new department/College (College of Criminal Justice )...', 'successful', '2024-10-07 02:59:21'),
(219, 1, 'Created new department/College (Bachelor of Science in Tourism Management)...', 'successful', '2024-10-07 03:01:05'),
(220, 1, 'Created new department/College (College of Arts and Science)...', 'successful', '2024-10-07 03:02:00'),
(221, 1, 'Created new department/College (College of Teacher Education)...', 'successful', '2024-10-07 03:02:43'),
(222, 1, 'Created new year level (1st Year)...', 'successful', '2024-10-07 03:04:23'),
(223, 1, 'Created new year level (2nd Year)...', 'successful', '2024-10-07 03:04:40'),
(224, 1, 'Created new year level (3rd Year)...', 'successful', '2024-10-07 03:04:58'),
(225, 1, 'Created new year level (4th Year)...', 'successful', '2024-10-07 03:05:42'),
(226, 1, 'New School year opened (S.Y 2024 2025)...', 'successful', '2024-10-07 03:05:53'),
(227, 1, 'Updated department/College information (College of Information  and Computing Science)...', 'successful', '2024-10-07 03:10:08'),
(228, 1, 'Created new course (CCIS)...', 'successful', '2024-10-07 03:10:41'),
(229, 1, 'Updated course information (Bachelor of Science and Information Technology)...', 'successful', '2024-10-07 03:11:28'),
(230, 1, 'Created new course (Bachelor of Education Values)...', 'successful', '2024-10-07 03:13:59'),
(231, 1, 'Created new course (Bachelor of Secondary Education)...', 'successful', '2024-10-07 03:14:53'),
(232, 1, 'Created new course (Bachelor of Elementary Education)...', 'successful', '2024-10-07 03:15:38'),
(233, 1, 'Initiated logout...', 'successful', '2024-10-07 03:17:11'),
(234, 1, 'Login Initiated...', 'successful', '2024-10-07 05:22:32'),
(235, 1, 'Initiated logout...', 'successful', '2024-10-07 05:56:54'),
(236, 1, 'Login Initiated...', 'successful', '2024-10-07 05:57:18'),
(237, 1, 'Initiated logout...', 'successful', '2024-10-07 05:59:42'),
(238, 1, 'Login Initiated...', 'successful', '2024-10-07 05:59:58'),
(239, 1, 'Initiated logout...', 'successful', '2024-10-07 06:00:11'),
(240, 1, 'Login Initiated...', 'successful', '2024-10-07 06:01:00'),
(241, 1, 'Created new student record (Kathleen Anne  Arciosa)...', 'successful', '2024-10-07 06:03:25'),
(242, 1, 'Initiated logout...', 'successful', '2024-10-07 06:34:04'),
(243, 1, 'Login Initiated...', 'successful', '2024-10-07 06:34:35'),
(244, 1, 'New semester opened (1st sem)...', 'successful', '2024-10-07 06:36:18'),
(245, 1, 'Added new violation...', 'successful', '2024-10-07 06:36:47'),
(246, 1, 'Created new student record (Arvy Baingan)...', 'successful', '2024-10-07 07:48:39'),
(247, 1, 'Added new violation...', 'successful', '2024-10-07 07:49:17'),
(248, 1, 'Created new student record (Jenalyn Caluttung)...', 'successful', '2024-10-07 07:51:43'),
(249, 1, 'Updated user information (Arvy Baingan)...', 'successful', '2024-10-07 07:54:49'),
(250, 1, 'Initiated logout...', 'successful', '2024-10-07 07:55:56'),
(251, 1, 'Login Initiated...', 'successful', '2024-10-07 07:56:14'),
(252, 1, 'Login Initiated...', 'successful', '2024-10-12 10:33:06'),
(253, 1, 'Login Initiated...', 'successful', '2024-10-12 23:39:04'),
(254, 1, 'Created new student record (Frea  Agudes)...', 'successful', '2024-10-12 23:48:12'),
(255, 1, 'Created new student record (Jonel Asuncion)...', 'successful', '2024-10-12 23:51:22'),
(256, 1, 'Login Initiated...', 'successful', '2024-10-30 01:09:38'),
(257, 1, 'Login Initiated...', 'successful', '2024-11-13 01:13:22'),
(258, 1, 'Login Initiated...', 'successful', '2024-11-19 00:54:36'),
(259, 1, 'Login Initiated...', 'successful', '2024-11-19 01:38:01'),
(260, 1, 'Login Initiated...', 'successful', '2024-11-20 00:27:32'),
(261, 1, 'Login Initiated...', 'successful', '2024-11-20 00:29:40'),
(262, 1, 'Login Initiated...', 'successful', '2024-11-20 06:28:05'),
(263, 1, 'Login Initiated...', 'successful', '2024-11-20 06:28:05'),
(264, 1, 'Login Initiated...', 'successful', '2024-11-21 14:46:25'),
(265, 1, 'Login Initiated...', 'successful', '2024-11-21 14:47:10'),
(266, 1, 'Initiated logout...', 'successful', '2024-11-21 14:50:13'),
(267, 1, 'Login Initiated...', 'successful', '2024-11-21 14:57:45'),
(268, 1, 'Initiated logout...', 'successful', '2024-11-21 14:57:55'),
(269, 1, 'Login Initiated...', 'successful', '2024-11-21 23:23:18'),
(270, 1, 'Updated department/College information (College of Business Management)...', 'successful', '2024-11-21 23:30:30'),
(271, 1, 'Updated department/College information (College of Teachers Education)...', 'successful', '2024-11-21 23:33:14'),
(272, 1, 'Created new student record (JOYCERINE AGUINALDO)...', 'successful', '2024-11-21 23:37:39'),
(273, 1, 'Updated department/College information (College of Business Management)...', 'successful', '2024-11-21 23:38:32'),
(274, 1, 'Updated department/College information (College of Arts and Teacher Education)...', 'successful', '2024-11-21 23:40:37'),
(275, 1, 'Updated department/College information (College of Criminal Justice  Education)...', 'successful', '2024-11-21 23:43:20'),
(276, 1, 'Created new course (Bachelor of Science Business Ad.)...', 'successful', '2024-11-21 23:50:29'),
(277, 1, 'Updated course information (Bachelor of Elementary Education)...', 'successful', '2024-11-21 23:50:49'),
(278, 1, 'Updated course information (Bachelor of Secondary Education)...', 'successful', '2024-11-21 23:51:08'),
(279, 1, 'Updated course information (Bachelor of Education Values)...', 'successful', '2024-11-21 23:51:20'),
(280, 1, 'Created new course (Bachelor of Tourism Management)...', 'successful', '2024-11-21 23:52:08'),
(281, 1, 'Login Initiated...', 'successful', '2024-11-22 00:40:51'),
(282, 1, 'New semester opened (2nd Semester)...', 'successful', '2024-11-22 00:44:34'),
(283, 1, 'Added new violation...', 'successful', '2024-11-22 00:52:38'),
(284, 1, 'Created new course (Bachelor of Science in CRIM.)...', 'successful', '2024-11-22 00:58:49'),
(285, 1, 'Login Initiated...', 'successful', '2024-11-22 01:04:50'),
(286, 1, 'Initiated logout...', 'successful', '2024-11-22 01:26:25'),
(287, 1, 'Login Initiated...', 'successful', '2024-11-22 01:34:37'),
(288, 1, 'Updated Policy (Academic Suspension)...', 'successful', '2024-11-22 01:37:18'),
(289, 1, 'New school policy added (Academic suspension)..', 'successful', '2024-11-22 01:46:44'),
(290, 1, 'New school policy sanction added for (Academic suspension)...', 'successful', '2024-11-22 01:46:44'),
(291, 1, 'Updated Policy (Academic suspension)...', 'successful', '2024-11-22 01:53:23'),
(292, 1, 'Added new violation...', 'successful', '2024-11-22 01:54:21'),
(293, 1, 'Login Initiated...', 'successful', '2024-11-22 06:00:09'),
(294, 1, 'Deactivate Student account (Kathleen Anne  Arciosa)...', 'successful', '2024-11-22 06:07:23'),
(295, 1, 'Deactivate Student account (Frea  Agudes)...', 'successful', '2024-11-22 06:07:37'),
(296, 1, 'Deactivate Student account (Jenalyn Caluttung)...', 'successful', '2024-11-22 06:07:48'),
(297, 1, 'Deactivate Student account (Arvy Baingan)...', 'successful', '2024-11-22 06:08:00'),
(298, 1, 'Deactivate Student account (JOYCERINE AGUINALDO)...', 'successful', '2024-11-22 06:08:11'),
(299, 1, 'Deactivate Student account (Jonel Asuncion)...', 'successful', '2024-11-22 06:08:22'),
(300, 1, 'Login Initiated...', 'successful', '2024-11-26 05:58:31'),
(301, 1, 'Login Initiated...', 'successful', '2024-11-28 00:59:26'),
(302, 1, 'New school policy added (Academic suspension)..', 'successful', '2024-11-28 01:04:29'),
(303, 1, 'New school policy sanction added for (Academic suspension)...', 'successful', '2024-11-28 01:04:29'),
(304, 1, 'Login Initiated...', 'successful', '2024-11-28 01:37:51'),
(305, 1, 'Login Initiated...', 'successful', '2024-11-28 01:51:34'),
(306, 1, 'Login Initiated...', 'successful', '2024-11-28 02:00:16'),
(307, 1, 'Login Initiated...', 'successful', '2024-11-28 02:03:52'),
(308, 1, 'Login Initiated...', 'successful', '2024-11-28 02:11:04'),
(309, 1, 'Login Initiated...', 'successful', '2024-11-28 02:18:22'),
(310, 1, 'Created new student record (Jenalyn Caluttung)...', 'successful', '2024-11-28 02:19:46'),
(311, 1, 'Login Initiated...', 'successful', '2024-11-28 02:30:24'),
(312, 1, 'Login Initiated...', 'successful', '2024-11-28 04:42:12'),
(313, 1, 'Login Initiated...', 'successful', '2024-11-28 04:46:32'),
(314, 1, 'Violation resolved (28)...', 'successful', '2024-11-28 05:26:45'),
(315, 1, 'Login Initiated...', 'successful', '2024-11-28 11:34:09'),
(316, 1, 'Login Initiated...', 'successful', '2024-11-28 15:54:36'),
(317, 1, 'Login Initiated...', 'successful', '2024-11-28 16:07:25'),
(318, 1, 'Login Initiated...', 'successful', '2024-11-28 23:46:32'),
(319, 1, 'Login Initiated...', 'successful', '2024-11-29 00:38:16'),
(320, 1, 'Created new student record (JHON RICH  DOMINGO)...', 'successful', '2024-11-29 00:45:00'),
(321, 1, 'Created new student record (CLEIANNE  CORPUZ)...', 'successful', '2024-11-29 00:48:11'),
(322, 1, 'Created new student record (ASHLEY FAITH  BUGARIN)...', 'successful', '2024-11-29 00:50:36'),
(323, 1, 'Created new student record (ROLLY   BRAGASIN)...', 'successful', '2024-11-29 00:52:44'),
(324, 1, 'Updated student information (ROLLY   BRAGASIN)...', 'successful', '2024-11-29 00:53:12'),
(325, 1, 'Created new student record (MARK AJAY  DANAO)...', 'successful', '2024-11-29 00:55:15'),
(326, 1, 'Created new course (Bachelor of Library and Information Science)...', 'successful', '2024-11-29 00:59:53'),
(327, 1, 'Updated course information (Bachelor of Tourism Management)...', 'successful', '2024-11-29 01:00:23'),
(328, 1, 'Created new student record (ARVY BAINGAN)...', 'successful', '2024-11-29 01:04:41'),
(329, 1, 'Updated course information (Bachelor of Science  in Information Technology)...', 'successful', '2024-11-29 01:05:19'),
(330, 1, 'Updated course information (Bachelor of Science in Business Administration)...', 'successful', '2024-11-29 01:06:22'),
(331, 1, 'Updated course information (Bachelor of Science in Tourism Management)...', 'successful', '2024-11-29 01:07:51'),
(332, 1, 'Updated course information (Bachelor of Values Education)...', 'successful', '2024-11-29 01:08:57'),
(333, 1, 'Created new student record (JHON PAUL  DIMAYA)...', 'successful', '2024-11-29 01:11:08'),
(334, 1, 'Added new violation...', 'successful', '2024-11-29 01:12:57'),
(335, 1, 'Created new student record (GRACIE LABAY)...', 'successful', '2024-11-29 01:14:40'),
(336, 1, 'Added new violation...', 'successful', '2024-11-29 01:15:19'),
(337, 1, 'Violation resolved (33)...', 'successful', '2024-11-29 01:17:09'),
(338, 1, 'Login Initiated...', 'successful', '2024-11-29 06:18:44'),
(339, 1, 'New school policy added (Interventions Specific to certain Offense For Premarital Offense)..', 'successful', '2024-11-29 06:31:26'),
(340, 1, 'New school policy sanction added for (Interventions Specific to certain Offense For Premarital Offense)...', 'successful', '2024-11-29 06:31:26'),
(341, 1, 'Updated Policy (Interventions Specific to certain Offense For Premarital Offense)...', 'successful', '2024-11-29 06:32:05'),
(342, 1, 'Created new student record (RIZALYN ABALOS)...', 'successful', '2024-11-29 06:34:36'),
(343, 1, 'Added new violation...', 'successful', '2024-11-29 06:35:23'),
(344, 1, 'Updated Policy (Academic suspension)...', 'successful', '2024-11-29 06:35:48'),
(345, 1, 'New school policy added (Interventions Specific to certain Offense For Premarital Offense)..', 'successful', '2024-11-29 06:37:24'),
(346, 1, 'New school policy sanction added for (Interventions Specific to certain Offense For Premarital Offense)...', 'successful', '2024-11-29 06:37:24'),
(347, 1, 'Updated Policy (Academic Suspension)...', 'successful', '2024-11-29 06:40:27'),
(348, 1, 'Initiated logout...', 'successful', '2024-11-29 06:40:39'),
(349, 1, 'Login Initiated...', 'successful', '2024-11-29 08:54:54'),
(350, 1, 'Violation resolved (29)...', 'successful', '2024-11-29 09:05:24'),
(351, 1, 'Login Initiated...', 'successful', '2024-11-29 09:42:03'),
(352, 1, 'New school policy added (Interventions Specific to certain Offense For Premarital Offense)..', 'successful', '2024-11-29 09:45:23'),
(353, 1, 'New school policy sanction added for (Interventions Specific to certain Offense For Premarital Offense)...', 'successful', '2024-11-29 09:45:23'),
(354, 1, 'Added new violation...', 'successful', '2024-11-29 09:52:32'),
(355, 1, 'Register new user account...', 'successful', '2024-11-29 10:01:32'),
(356, 1, 'Initiated logout...', 'successful', '2024-11-29 10:21:20'),
(357, 1, 'Login Initiated...', 'successful', '2024-11-29 10:22:22'),
(358, 1, 'Updated user information (Jechris Sabugal)...', 'successful', '2024-11-29 10:24:12'),
(359, 1, 'Initiated logout...', 'successful', '2024-11-29 10:24:19'),
(360, 1, 'Login Initiated...', 'successful', '2024-11-29 10:25:43'),
(361, 1, 'Login Initiated...', 'successful', '2024-12-03 03:59:42'),
(362, 1, 'Login Initiated...', 'successful', '2024-12-03 07:11:52'),
(363, 1, 'Login Initiated...', 'successful', '2024-12-06 01:00:25'),
(364, 1, 'Login Initiated...', 'successful', '2024-12-06 04:30:11'),
(365, 1, 'Register new user account...', 'successful', '2024-12-06 04:39:30'),
(366, 1, 'Register new user account...', 'successful', '2024-12-06 04:40:18'),
(367, 1, 'Added new violation...', 'successful', '2024-12-06 06:23:16'),
(368, 1, 'Added new violation...', 'successful', '2024-12-06 06:30:34'),
(369, 16, 'Login Initiated...', 'successful', '2024-12-06 06:53:56'),
(370, 16, 'Initiated logout...', 'successful', '2024-12-06 07:20:12'),
(371, 17, 'Login Initiated...', 'successful', '2024-12-06 07:20:41'),
(372, 17, 'Initiated logout...', 'successful', '2024-12-06 23:51:44'),
(373, 16, 'Login Initiated...', 'successful', '2024-12-06 23:52:00'),
(374, 16, 'Initiated logout...', 'successful', '2024-12-06 23:52:09'),
(375, 17, 'Login Initiated...', 'successful', '2024-12-06 23:52:29'),
(376, 17, 'Initiated logout...', 'successful', '2024-12-07 01:44:24'),
(377, 1, 'Login Initiated...', 'successful', '2024-12-07 01:45:36'),
(378, 1, 'Register new user account...', 'successful', '2024-12-07 01:52:20'),
(379, 1, 'Initiated logout...', 'successful', '2024-12-07 01:52:31'),
(380, 18, 'Login Initiated...', 'successful', '2024-12-07 01:55:48'),
(381, 18, 'Initiated logout...', 'successful', '2024-12-07 01:56:10'),
(382, 18, 'Login Initiated...', 'successful', '2024-12-07 01:56:49'),
(383, 1, 'Login Initiated...', 'successful', '2024-12-07 03:18:20'),
(384, 1, 'Added new violation...', 'successful', '2024-12-07 03:19:46'),
(385, 1, 'Added new violation...', 'successful', '2024-12-07 03:21:04'),
(386, 18, 'Initiated logout...', 'successful', '2024-12-07 04:14:19'),
(387, 1, 'Initiated logout...', 'successful', '2024-12-07 07:50:04'),
(388, 16, 'Login Initiated...', 'successful', '2024-12-07 07:50:55'),
(389, 1, 'Login Initiated...', 'successful', '2024-12-07 07:59:28'),
(390, 1, 'Initiated logout...', 'successful', '2024-12-07 10:56:21'),
(391, 16, 'Login Initiated...', 'successful', '2024-12-07 11:02:28'),
(392, 16, 'Initiated logout...', 'successful', '2024-12-07 12:47:14'),
(393, 16, 'Login Initiated...', 'successful', '2024-12-07 12:47:30'),
(394, 16, 'Initiated logout...', 'successful', '2024-12-07 13:13:56'),
(395, 1, 'Login Initiated...', 'successful', '2024-12-07 13:15:01'),
(396, 1, 'Violation resolved (35)...', 'successful', '2024-12-07 13:55:18'),
(397, 1, 'New school policy added (Stealing)..', 'successful', '2024-12-07 14:23:23'),
(398, 1, 'New school policy sanction added for (Stealing)...', 'successful', '2024-12-07 14:23:23'),
(399, 1, 'Added new violation...', 'successful', '2024-12-07 14:24:37'),
(400, 1, 'Initiated logout...', 'successful', '2024-12-07 14:25:02'),
(401, 16, 'Login Initiated...', 'successful', '2024-12-07 14:25:14'),
(402, 16, 'Initiated logout...', 'successful', '2024-12-07 14:41:15'),
(403, 18, 'Login Initiated...', 'successful', '2024-12-07 14:41:25'),
(404, 18, 'Initiated logout...', 'successful', '2024-12-07 14:51:30'),
(405, 1, 'Login Initiated...', 'successful', '2024-12-09 01:28:19'),
(406, 1, 'Initiated logout...', 'successful', '2024-12-09 01:35:45'),
(407, 18, 'Login Initiated...', 'successful', '2024-12-09 02:18:30'),
(408, 18, 'Initiated logout...', 'successful', '2024-12-09 03:18:59'),
(409, 16, 'Login Initiated...', 'successful', '2024-12-09 03:19:17');

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
(27, 20, 'BSIT', 'Bachelor of Science  in Information Technology'),
(28, 23, 'Val-ED', 'Bachelor of Values Education'),
(29, 23, 'BSED', 'Bachelor of Secondary Education'),
(30, 23, 'BEED', 'Bachelor of Elementary Education'),
(31, 22, 'BSBA', 'Bachelor of Science in Business Administration'),
(32, 22, 'BSTM', 'Bachelor of Science in Tourism Management'),
(33, 21, 'BSCRIM', 'Bachelor of Science in CRIM.'),
(34, 20, 'BLIS', 'Bachelor of Library and Information Science');

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
(20, 'CICS', 'College of Information  and Computing Science'),
(21, 'CCJE', 'College of Criminal Justice  Education'),
(22, 'CBM', 'College of Business Management'),
(23, 'CASTE', 'College of Arts and Teacher Education');

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `notifID` int(11) UNSIGNED NOT NULL,
  `violationID` int(11) UNSIGNED NOT NULL,
  `deptID` int(11) UNSIGNED NOT NULL,
  `notif_Content` varchar(255) NOT NULL,
  `notif_Status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_tbl`
--

INSERT INTO `notification_tbl` (`notifID`, `violationID`, `deptID`, `notif_Content`, `notif_Status`, `created_at`, `userID`) VALUES
(2, 39, 0, 'A new violation has been committed.', 1, '2024-12-09 01:33:30', 1),
(3, 39, 0, 'A new violation has been committed.', 1, '2024-12-07 14:50:32', 18),
(4, 39, 21, 'A new violation has been committed.', 0, '2024-12-06 08:15:35', 17),
(5, 40, 0, 'A new violation has been committed.', 0, '2024-12-07 14:50:13', 1),
(6, 40, 0, 'A new violation has been committed.', 0, '2024-12-07 03:19:46', 15),
(7, 40, 21, 'A new violation has been committed.', 0, '2024-12-07 03:19:46', 17),
(8, 40, 0, 'A new violation has been committed.', 0, '2024-12-07 14:50:10', 18),
(9, 41, 0, 'A new violation has been committed.', 0, '2024-12-07 14:50:07', 1),
(10, 41, 0, 'A new violation has been committed.', 0, '2024-12-07 03:21:04', 15),
(11, 41, 20, 'A new violation has been committed.', 1, '2024-12-09 03:20:04', 16),
(12, 41, 0, 'A new violation has been committed.', 0, '2024-12-07 14:50:03', 18),
(13, 42, 0, 'A new violation has been committed.', 0, '2024-12-07 14:24:37', 1),
(14, 42, 0, 'A new violation has been committed.', 0, '2024-12-07 14:24:37', 15),
(15, 42, 20, 'A new violation has been committed.', 0, '2024-12-07 14:49:57', 16),
(16, 42, 0, 'A new violation has been committed.', 1, '2024-12-07 14:50:43', 18);

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
(52, 10, 'suspension of 1-3 school days'),
(53, 11, '1-3 days school suspension'),
(54, 12, '1-3 school days suspension'),
(55, 13, 'Compulsory Leave of Absence (CLAb)'),
(56, 14, '1-3 school days suspension'),
(57, 10, 'Compulsory Leave of Absence (CLAb)'),
(58, 15, '1-3 school days suspension'),
(59, 16, 'Permanent Ban from school');

-- --------------------------------------------------------

--
-- Table structure for table `schoolpolicy_tbl`
--

CREATE TABLE `schoolpolicy_tbl` (
  `spID` int(11) UNSIGNED NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_desc` varchar(255) NOT NULL,
  `policy_code` varchar(255) NOT NULL,
  `policy_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolpolicy_tbl`
--

INSERT INTO `schoolpolicy_tbl` (`spID`, `policy_title`, `policy_desc`, `policy_code`, `policy_type`) VALUES
(10, 'Academic Suspension', 'commission of five (5) minor offences whether of different or same nature', 'B1', 1),
(11, 'Academic suspension', 'Taking part in all physical injuries', 'B2', 0),
(12, 'Academic suspension', 'PHYSICAL...', 'B2', 1),
(13, 'Interventions Specific to certain Offense For Premarital Offense', 'commission of five (5) minor offences whether of different or same nature', 'B2', 0),
(14, 'Interventions Specific to certain Offense For Premarital Offense', 'commission of five (5) minor offences whether of different or same nature', 'B2', 1),
(15, 'Interventions Specific to certain Offense For Premarital Offense', 'PHYSICAL', 'B2', 1),
(16, 'Stealing', 'gsdgfkjjshjkfs', 'P-01', 1);

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
(7, '1st semester'),
(8, '2nd Semester');

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
(12, 'Kathleen Anne ', 'Arciosa', 'Manuel', '', 'Female', ',', '09123456789', '', 'Arvy Baingan', 20, 27, 'Lasilat, Bagga, Cagayan', 'deactivated'),
(13, 'Arvy', 'Baingan', 'C', '', 'Male', '2022-11756', '09919059203', 'bainganarvy@sjbi.edu.ph', 'Arvy Baingan', 20, 27, 'barsat West Baggao Cagayan', 'deactivated'),
(14, 'Jenalyn', 'Caluttung', 'Soriano', '', 'Female', '2021-00241', '09269525072', 'caluttungjenalyn@gmail.com', 'Arvy Baingan', 20, 27, 'Tay-tay, Baggao, Cagayan', 'deactivated'),
(15, 'Frea ', 'Agudes', '.', '', 'Female', '.', '09876543215', 'agudesfrea@sjcbi.edu.ph', 'Jechris Sabugal', 20, 27, '.', 'deactivated'),
(16, 'Jonel', 'Asuncion', '.', '', 'Male', '9086-8638', '09267543680', 'jonelasuncion@gmail.com', 'Jechris Sabugal', 20, 27, '.', 'deactivated'),
(17, 'JOYCERINE', 'AGUINALDO', 'J', '', 'Female', '2023-00424', '09363703658', 'Joycerine@sjcbi.edu.ph', 'Jechris Sabugal', 20, 27, 'San Miguel Baggao Cagayan', 'deactivated'),
(18, 'Jenalyn', 'Caluttung', 'Soriano', '', 'Female', 'S2019-000121', '09269525072', 'caluttungjhen12@gmail.com', 'Jechris Sabugal', 20, 27, 'Tay-tay, Baggao, Cagayan', 'Active'),
(19, 'JHON RICH ', 'DOMINGO', 'B', '', 'Male', '2024-00540', '09675542973', 'jhonrichdomingo@gmail.com', 'Jechris Sabugal', 21, 33, 'Cabalongan Manning Zone 04', 'Active'),
(20, 'CLEIANNE ', 'CORPUZ', 'C', '', 'Female', '2023-00422', '09364022231', 'cleianne@gmail.com', 'Jechris Sabugal', 21, 33, 'Bitag Grande Baggao Cagayan', 'Active'),
(21, 'ASHLEY FAITH ', 'BUGARIN', 'L', '', 'Female', '2023-00423', '09757561937', 'ashley@gmail.com', 'Jechris Sabugal', 21, 33, 'Awallan, Baggao, Cagayan', 'Active'),
(22, 'ROLLY', 'BRAGASIN', 'B', 'jr.', 'Male', '2023-00441', '09750953237', 'rolly@gmail.com', 'Jechris Sabugal', 21, 33, 'San Miguel Baggao Cagayan', 'Active'),
(23, 'MARK AJAY ', 'DANAO', 'A', '', 'Male', '2023-00440', '09260875556', 'mj@gmail.com', 'Jechris Sabugal', 21, 33, 'Imurung ,baggao,cagayan', 'Active'),
(24, 'ARVY', 'BAINGAN', 'C', '', 'Male', '2022-11753', '09919059203', 'bainganarvy16@gmail.com', 'Jechris Sabugal', 20, 27, 'barsat West Baggao Cagayan', 'Active'),
(25, 'JHON PAUL ', 'DIMAYA', 'W', '', 'Male', '2023-00427', '09360547872', 'jp@gmail.com', 'Jechris Sabugal', 20, 27, 'San Miguel Baggao Cagayan', 'Active'),
(26, 'GRACIE', 'LABAY', 'C.', '', 'Female', '2023-11753', '09757561937', 'GRACIE@GMAIL.COM', 'Jechris Sabugal', 22, 32, 'barsat West Baggao Cagayan', 'Active'),
(27, 'RIZALYN', 'ABALOS', 'A.', '', 'Female', '2021-100690', '09757561937', 'ABALOS@GMAIL.COM', 'Jechris Sabugal', 23, 28, 'barsat West Baggao Cagayan', 'Active');

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
  `user_status` varchar(255) NOT NULL,
  `faculty_department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `faculty_fname`, `faculty_role`, `faculty_email`, `faculty_number`, `faculty_contact`, `faculty_password`, `faculty_lname`, `faculty_mname`, `faculty_extname`, `faculty_address`, `user_status`, `faculty_department`) VALUES
(1, 'Jechris', 'DSA-Admin', 'jechsabugal05@gmail.com', 'F-0001', '09980235797', '$2y$10$/PXggIbcP0UeLe5VBop7xOWJJceLsTtBi2enwBLKlS1YIpmHiMKE6', 'Sabugal', 'Tumaneng', '', 'Tungel,  Baggao, Cagayan', 'offline', NULL),
(15, 'LARRY', 'DSA-User', 'GRACIE@GMAIL.COM', '35331546', '09757561937', '$2y$10$OlQvlkykgtrX0t6H18OPfeSRai26T0WA8i90l4iXc85K29t8KKYe6', 'DIGA', 'C', '', 'barsat West Baggao Cagayan', 'offline', NULL),
(16, 'Cielo', 'College-Dean', 'dean1@gmail.com', 'D-0001', '09245674532', '$2y$10$C/wG7oXq0SA19k20wgu5Z.XZiUMQvLXiiUt3uxp18wbHvA5eb4mOi', 'Ziganay', 'Vee', '', 'Dalla Baggao Cagayan', 'online', 20),
(17, 'Arvy', 'College-Dean', 'dean2@gmail.com', 'D-0002', '09245674530', '$2y$10$lA19ZIOzSBIfZTZVSz18Gug9MXhNMUke/aMCFBKfIB7dEFfkeOLTK', 'Baingan', 'Catolos', '', 'Barsat West Baggao Cagayan', 'offline', 21),
(18, 'Juan', 'DSA-User', 'user1@gmail.com', 'U-0001', '09245674500', '$2y$10$CRrG2QSZ7OYc8PFEaQGbteEyvSo7ncASzoOwTJt2DuYPgImW64Wnm', 'Cruz', 'Dela', '', 'San Jose Baggao Cagayansadas', 'offline', 0);

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
(28, 12, 10, 52, 16, 6, 7, 'resolved', 'Arvy Baingan', '2024-10-07 06:36:47', '2024-11-28 05:26:45', 'JechrisSabugal'),
(29, 13, 10, 52, 19, 6, 7, 'resolved', 'Arvy Baingan', '2024-10-07 07:49:17', '2024-11-29 09:05:24', 'JechrisSabugal'),
(30, 17, 10, 52, 18, 6, 8, 'Open', 'Jechris Sabugal', '2024-11-22 00:52:38', '2024-11-22 00:52:38', ''),
(31, 14, 10, 52, 19, 6, 7, 'Open', 'Jechris Sabugal', '2024-11-22 01:54:21', '2024-11-22 01:54:21', ''),
(32, 23, 10, 52, 16, 6, 8, 'Open', 'Jechris Sabugal', '2024-11-29 01:12:57', '2024-11-29 01:12:57', ''),
(33, 26, 11, 53, 17, 6, 7, 'resolved', 'Jechris Sabugal', '2024-11-29 01:15:19', '2024-11-29 01:17:09', 'JechrisSabugal'),
(34, 27, 13, 55, 19, 6, 7, 'Open', 'Jechris Sabugal', '2024-11-29 06:35:23', '2024-11-29 06:35:23', ''),
(35, 24, 12, 54, 18, 6, 7, 'resolved', 'Jechris Sabugal', '2024-11-29 09:52:32', '2024-12-07 13:55:18', 'JechrisSabugal'),
(36, 26, 15, 58, 17, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-06 06:20:21', '2024-12-06 06:20:21', ''),
(37, 24, 13, 55, 17, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-06 06:22:19', '2024-12-06 06:22:19', ''),
(38, 23, 14, 56, 19, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-06 06:23:16', '2024-12-06 06:23:16', ''),
(39, 22, 13, 55, 19, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-06 06:30:34', '2024-12-06 06:30:34', ''),
(40, 23, 13, 55, 19, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-07 03:19:46', '2024-12-07 03:19:46', ''),
(41, 18, 11, 53, 19, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-07 03:21:04', '2024-12-07 03:21:04', ''),
(42, 18, 16, 59, 19, 6, 8, 'Open', 'Jechris Sabugal', '2024-12-07 14:24:37', '2024-12-07 14:24:37', '');

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
(16, '1st Year'),
(17, '2nd Year'),
(18, '3rd Year'),
(19, '4th Year');

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
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`notifID`);

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
  MODIFY `acadsyrID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_logs_tbl`
--
ALTER TABLE `activity_logs_tbl`
  MODIFY `logID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `courseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `deptID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `notifID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `rid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  MODIFY `sanctionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `schoolpolicy_tbl`
--
ALTER TABLE `schoolpolicy_tbl`
  MODIFY `spID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `semID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `studID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  MODIFY `violationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `yearlvl_tbl`
--
ALTER TABLE `yearlvl_tbl`
  MODIFY `yearlvlID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
