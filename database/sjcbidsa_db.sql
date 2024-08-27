-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 08:04 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `deptID` int(11) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `schoolpolicy_tbl`
--

CREATE TABLE `schoolpolicy_tbl` (
  `spID` int(11) UNSIGNED NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_desc` varchar(255) NOT NULL,
  `policy_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `semID` int(11) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Arvy', 'DSA-Admin', 'DSA.admin@gmail.com', 'F-0001', '09980235797', '$2y$10$8AbKN1YisUwJL.xtCuKyKeHQDa81VdtTAeGjHRnLvZQQsDrOq2OAG', 'Baingan', 'Catolos', '', 'Barsat West Baggao Cagayan', 'online');

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

-- --------------------------------------------------------

--
-- Table structure for table `yearlvl_tbl`
--

CREATE TABLE `yearlvl_tbl` (
  `yearlvlID` int(11) UNSIGNED NOT NULL,
  `year_lvl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `acadsyrID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activity_logs_tbl`
--
ALTER TABLE `activity_logs_tbl`
  MODIFY `logID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `courseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `deptID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `rid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  MODIFY `sanctionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `schoolpolicy_tbl`
--
ALTER TABLE `schoolpolicy_tbl`
  MODIFY `spID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `semID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `studID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  MODIFY `violationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `yearlvl_tbl`
--
ALTER TABLE `yearlvl_tbl`
  MODIFY `yearlvlID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
