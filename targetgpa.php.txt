-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 07:02 PM
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
-- Database: `cit215_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `programme_id` varchar(10) DEFAULT NULL,
  `semester_offered` int(11) DEFAULT NULL,
  `lecturer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `credits`, `programme_id`, `semester_offered`, `lecturer_name`) VALUES
('CSE101', 'Programming I', 3, 'CSE', 1, 'Mr. Aaron Smith'),
('CSE102', 'Data Structures', 3, 'CSE', 2, 'Miss Lay Tomphson');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `semster` varchar(10) DEFAULT NULL,
  `academic_year` varchar(20) DEFAULT NULL,
  `grade_letter` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `course_id`, `semster`, `academic_year`, `grade_letter`) VALUES
(4, 'STU001', 'CSE101', '1', '2024/2025', 'A'),
(5, 'STU001', 'CSE102', '2', '2024/2025', 'B'),
(6, 'STU002', 'CIT101', '1', '2024/2025', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `gpa_record`
--

CREATE TABLE `gpa_record` (
  `gpa_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL,
  `semester_gpa` decimal(3,2) DEFAULT NULL,
  `cumulative_gpa` decimal(10,0) DEFAULT NULL,
  `total_credits_earned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gpa_record`
--

INSERT INTO `gpa_record` (`gpa_id`, `student_id`, `semester`, `academic_year`, `semester_gpa`, `cumulative_gpa`, `total_credits_earned`) VALUES
(1, 'STU001', '1', '2023/2024', 4.00, 4, 3),
(2, 'STU001', '2', '2023/2024', 3.00, 4, 6),
(3, 'STU002', '1', '2024/2025', 2.00, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_letter` varchar(2) NOT NULL,
  `grade_point` decimal(3,2) DEFAULT NULL,
  `percentage_minimum` int(11) DEFAULT NULL,
  `percentage_maximum` int(11) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `is_passing` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_letter`, `grade_point`, `percentage_minimum`, `percentage_maximum`, `description`, `is_passing`) VALUES
('A', 4.00, 80, 100, 'Excellent', 1),
('B', 3.00, 70, 79, 'Good', 1),
('C', 2.00, 60, 69, 'Average', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pissrecord`
--

CREATE TABLE `pissrecord` (
  `piss_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `piss_type` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `supervisor_name` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `grade_obtained` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pissrecord`
--

INSERT INTO `pissrecord` (`piss_id`, `student_id`, `piss_type`, `status`, `supervisor_name`, `submission_date`, `grade_obtained`) VALUES
(1, 'STU001', 'Internship', 'Completed', 'Dr. Osei', '2024-12-10', 'A'),
(2, 'STU002', 'Project', 'Pending', 'Prof. Amoah', NULL, NULL),
(3, 'STU003', 'Seminar', 'Approved', 'Dr. Eshun', '2025-03-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programme_id` varchar(10) NOT NULL,
  `programme_name` varchar(50) DEFAULT NULL,
  `duration_years` int(11) DEFAULT NULL,
  `total_credits` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `head_of_programme` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programme_id`, `programme_name`, `duration_years`, `total_credits`, `department`, `head_of_programme`) VALUES
('CSE', 'Computer Science', 2, 4, 'Engineering', 'Mr. John Kent'),
('P002', 'Information Technology', 4, 120, 'Computing', 'Prof. Ned Fendy');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `enrollment_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `phone`, `enrollment_year`) VALUES
('\'STD001\'', '\'Lin\'', '\'Johnson\'', '\'lijohnson@sdc.edu\'', '25983647', 2023),
('\'STD002\'', '\'Issac\'', '\'Alfred\'', '\'isalfred@sdc.edu\'', '52697156', 2024),
('\'STD003\'', '\'Sam\'', '\'Monda\'', '\'samonda@sdc.edu\'', '98751307', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password_hash` varchar(300) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`user_id`, `username`, `password_hash`, `role`, `student_id`, `email`, `created_at`) VALUES
(1, 'linjohnson', 'hash135', 'student', 'STD001', 'lijohnson@sdc.edu', '2024-05-02 00:00:00'),
(2, 'issacalfred', 'hash989', 'student', 'STD002', 'isalfred@sdc.edu', '2023-06-05 00:00:00'),
(3, 'sammonda', 'hash210', 'student', 'STD002', 'samonda@sdc.edu', '2023-07-05 00:00:00'),
(4, 'jakesmith', 'hashadmin', 'superuser', NULL, 'sdc@campus.edu', '2023-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `target_gpa_request`
--

CREATE TABLE `target_gpa_request` (
  `request_id` int(11) NOT NULL,
  `student_id` varchar(10) DEFAULT NULL,
  `target_gpa` decimal(3,2) DEFAULT NULL,
  `current_gpa` decimal(3,2) DEFAULT NULL,
  `credits_remaining` int(11) DEFAULT NULL,
  `required_grades` text DEFAULT NULL,
  `request_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `target_gpa_request`
--

INSERT INTO `target_gpa_request` (`request_id`, `student_id`, `target_gpa`, `current_gpa`, `credits_remaining`, `required_grades`, `request_date`) VALUES
(1, 'STU001', 3.50, 3.50, 114, 'Maintain B+', '2023-04-16'),
(2, 'STU002', 3.00, 2.00, 117, 'Need As', '2023-04-15'),
(3, 'STU003', 3.80, 0.00, 120, 'All As', '2024-04-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `programme_id` (`programme_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `gpa_record`
--
ALTER TABLE `gpa_record`
  ADD PRIMARY KEY (`gpa_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_letter`);

--
-- Indexes for table `pissrecord`
--
ALTER TABLE `pissrecord`
  ADD PRIMARY KEY (`piss_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `target_gpa_request`
--
ALTER TABLE `target_gpa_request`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gpa_record`
--
ALTER TABLE `gpa_record`
  MODIFY `gpa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pissrecord`
--
ALTER TABLE `pissrecord`
  MODIFY `piss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `target_gpa_request`
--
ALTER TABLE `target_gpa_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`programme_id`) REFERENCES `programme` (`programme_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
