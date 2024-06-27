-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 04:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(1, '2024', '2025'),
(2, '2023', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `administrator_tbl`
--

CREATE TABLE `administrator_tbl` (
  `adminID` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `login_status` varchar(255) NOT NULL
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

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`courseID`, `deptID`, `course_name`, `course_desc`) VALUES
(2, 3, 'BSCE', 'Bachelor of Science in Civil Engineering'),
(3, 4, 'BSIT', 'Bachelor of Science in Information Technology');

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
(3, 'COE', 'College of Engineering'),
(4, 'CICS', 'College Information and Computing Sciences');

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
  `policy_desc` varchar(255) NOT NULL
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
  `courseID` int(11) UNSIGNED NOT NULL
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
  `login_status` varchar(255) NOT NULL,
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

INSERT INTO `user_tbl` (`userID`, `faculty_fname`, `faculty_role`, `faculty_email`, `faculty_number`, `faculty_contact`, `login_status`, `faculty_password`, `faculty_lname`, `faculty_mname`, `faculty_extname`, `faculty_address`, `user_status`) VALUES
(1, 'DSA -Admin', 'Admin', 'support@gmail.com', 'F-0001', '', 'online', '$2y$10$OXUslO1GFuQX7TqylgTK3e5G9g5y/HelnNiGViZpfgCYIB0EooaSm', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `violation_tbl`
--

CREATE TABLE `violation_tbl` (
  `violationID` int(11) UNSIGNED NOT NULL,
  `studID` int(11) UNSIGNED NOT NULL,
  `policy` int(11) NOT NULL,
  `sanctionID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `yearlvlID` int(11) UNSIGNED NOT NULL,
  `acadsyrID` int(11) UNSIGNED NOT NULL,
  `semID` int(11) UNSIGNED NOT NULL,
  `violation_status` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Dumping data for table `yearlvl_tbl`
--

INSERT INTO `yearlvl_tbl` (`yearlvlID`, `year_lvl`) VALUES
(2, '1st Year'),
(3, '2nd Year'),
(4, '3rd Year'),
(5, '4th Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year_tbl`
--
ALTER TABLE `academic_year_tbl`
  ADD PRIMARY KEY (`acadsyrID`);

--
-- Indexes for table `administrator_tbl`
--
ALTER TABLE `administrator_tbl`
  ADD PRIMARY KEY (`adminID`);

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
  ADD KEY `spID` (`policy`),
  ADD KEY `studID` (`studID`),
  ADD KEY `userID` (`userID`),
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
  MODIFY `acadsyrID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administrator_tbl`
--
ALTER TABLE `administrator_tbl`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `courseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `deptID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanction_tbl`
--
ALTER TABLE `sanction_tbl`
  MODIFY `sanctionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolpolicy_tbl`
--
ALTER TABLE `schoolpolicy_tbl`
  MODIFY `spID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `semID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `studID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `violation_tbl`
--
ALTER TABLE `violation_tbl`
  MODIFY `violationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yearlvl_tbl`
--
ALTER TABLE `yearlvl_tbl`
  MODIFY `yearlvlID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD CONSTRAINT `course_tbl_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department_tbl` (`deptID`);

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
  ADD CONSTRAINT `violation_tbl_ibfk_6` FOREIGN KEY (`userID`) REFERENCES `user_tbl` (`userID`),
  ADD CONSTRAINT `violation_tbl_ibfk_7` FOREIGN KEY (`yearlvlID`) REFERENCES `yearlvl_tbl` (`yearlvlID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
