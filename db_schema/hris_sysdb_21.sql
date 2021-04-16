-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 06:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_sysdb_21`
--

-- --------------------------------------------------------

--
-- Table structure for table `hrad_pages`
--

CREATE TABLE `hrad_pages` (
  `page_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hrad_pages`
--

INSERT INTO `hrad_pages` (`page_id`, `url`, `name`, `icon`, `position`, `parent`) VALUES
(1, 'masterfile', 'Masterfile', 'fa fa-fw fa-folder', 1, 0),
(2, 'compensation', 'Compensation', 'fas fa-fw fa-coins', 2, 0),
(3, 'benefits', 'Benefits', 'fas fa-fw fa-hands', 3, 0),
(4, 'talentacq', 'Talent Acquisition', 'fas fa-fw fa-user-plus', 4, 0),
(5, 'healthsec', 'Health Section', 'fa fa-fw fa-medkit', 5, 0),
(6, 'emprel', 'Employee Relation', 'fas fa-fw fa-user-tie', 6, 0),
(7, 'empengage', 'Employee Engagement', 'fa fa-fw fa-users', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hrad_page_access`
--

CREATE TABLE `hrad_page_access` (
  `pa_id` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  `page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hrad_page_access`
--

INSERT INTO `hrad_page_access` (`pa_id`, `privilege`, `page`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hrad_users`
--

CREATE TABLE `hrad_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `middle_name` varchar(45) CHARACTER SET latin1 DEFAULT '',
  `last_name` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `username` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `email_address` varchar(150) CHARACTER SET latin1 DEFAULT '',
  `privilege` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hrad_users`
--

INSERT INTO `hrad_users` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `email_address`, `privilege`, `date_created`) VALUES
(1, 'Jeriel', 'Leuterio', 'Formento', 'jeriel.formento', '$2y$08$5ZyRvIoH0bYxZyPTPsXAze9xs7TFgAMLVQ70BCPrt60549uaP/zey', '', 1, '2021-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hrad_user_privileges`
--

CREATE TABLE `hrad_user_privileges` (
  `priv_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrad_user_privileges`
--

INSERT INTO `hrad_user_privileges` (`priv_id`, `title`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `hr_recruitment_online_exam_result`
--

CREATE TABLE `hr_recruitment_online_exam_result` (
  `id` int(11) NOT NULL,
  `talent_acq_id` int(11) NOT NULL,
  `csu_username` varchar(100) NOT NULL,
  `exam_grammar` varchar(100) NOT NULL,
  `exam_math` varchar(100) NOT NULL,
  `exam_spelling` varchar(100) NOT NULL,
  `exam_computer` varchar(100) NOT NULL,
  `exam_call` varchar(100) NOT NULL,
  `exam_personality_assessment` varchar(100) NOT NULL,
  `exam_average` varchar(100) NOT NULL,
  `typing_gross_speed` varchar(100) NOT NULL,
  `typing_accuracy` varchar(100) NOT NULL,
  `typing_net_speed` varchar(100) NOT NULL,
  `ms_proficiency_test` varchar(100) NOT NULL,
  `other_skill_test` varchar(100) NOT NULL,
  `encoded_by` int(11) NOT NULL,
  `hr_interviewer` varchar(100) NOT NULL,
  `hr_interview_result` varchar(100) DEFAULT NULL,
  `ops_interviewer` varchar(100) DEFAULT NULL,
  `ops_interview_result` varchar(100) DEFAULT NULL,
  `ops_special_instruction` varchar(100) DEFAULT NULL,
  `final_interviewer` varchar(100) DEFAULT NULL,
  `final_interview_result` varchar(100) DEFAULT NULL,
  `final_special_instruction` varchar(100) DEFAULT NULL,
  `profiled_position` varchar(100) DEFAULT NULL,
  `campaign_assigned` varchar(100) DEFAULT NULL,
  `training_start` date DEFAULT NULL,
  `trainee_id` varchar(100) DEFAULT NULL,
  `training_conducted_by` varchar(100) DEFAULT NULL,
  `training_date` date DEFAULT NULL,
  `job_offer` varchar(100) DEFAULT NULL,
  `job_offer_date` date DEFAULT NULL,
  `req_birthcert` varchar(100) DEFAULT NULL,
  `req_nbi` varchar(100) DEFAULT NULL,
  `req_sss` varchar(100) DEFAULT NULL,
  `req_pagibig` varchar(100) DEFAULT NULL,
  `req_philhealth` varchar(100) DEFAULT NULL,
  `req_tin` varchar(100) DEFAULT NULL,
  `req_health_cert` varchar(100) DEFAULT NULL,
  `req_occ_permit` varchar(100) DEFAULT NULL,
  `req_med_health_alert` varchar(100) DEFAULT NULL,
  `req_picture` varchar(100) DEFAULT NULL,
  `req_coe` varchar(100) DEFAULT NULL,
  `req_tor` varchar(100) DEFAULT NULL,
  `req_diploma` varchar(100) DEFAULT NULL,
  `req_marriage_cert` varchar(100) DEFAULT NULL,
  `req_dependent_birthcert` varchar(100) DEFAULT NULL,
  `is_scanned` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hr_talent_acquisition`
--

CREATE TABLE `hr_talent_acquisition` (
  `id` int(11) NOT NULL,
  `applicant_code` varchar(100) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `date_applied` date NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birthdate` datetime NOT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `landline` varchar(20) DEFAULT NULL,
  `email_address` varchar(75) DEFAULT NULL,
  `emergency_person` varchar(100) DEFAULT NULL,
  `emergency_relationship` varchar(15) DEFAULT NULL,
  `emergency_contact` varchar(15) DEFAULT NULL,
  `emergency_email` varchar(75) DEFAULT NULL,
  `current_address` varchar(200) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `educational_attainment` varchar(200) NOT NULL,
  `work_length_experience` text DEFAULT NULL,
  `recruitment_channel` int(11) NOT NULL,
  `referred_by` varchar(100) DEFAULT NULL,
  `employee_code_referee` varchar(20) DEFAULT NULL,
  `employment_status_referee` varchar(20) DEFAULT NULL,
  `market_segment` int(11) DEFAULT NULL,
  `applied_position` varchar(100) NOT NULL,
  `initial_interviewer` varchar(100) NOT NULL,
  `initial_interview` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hrad_pages`
--
ALTER TABLE `hrad_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `hrad_page_access`
--
ALTER TABLE `hrad_page_access`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `hrad_users`
--
ALTER TABLE `hrad_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hrad_user_privileges`
--
ALTER TABLE `hrad_user_privileges`
  ADD PRIMARY KEY (`priv_id`);

--
-- Indexes for table `hr_recruitment_online_exam_result`
--
ALTER TABLE `hr_recruitment_online_exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_talent_acquisition`
--
ALTER TABLE `hr_talent_acquisition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hrad_pages`
--
ALTER TABLE `hrad_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hrad_page_access`
--
ALTER TABLE `hrad_page_access`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hrad_users`
--
ALTER TABLE `hrad_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hrad_user_privileges`
--
ALTER TABLE `hrad_user_privileges`
  MODIFY `priv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_recruitment_online_exam_result`
--
ALTER TABLE `hr_recruitment_online_exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_talent_acquisition`
--
ALTER TABLE `hr_talent_acquisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
