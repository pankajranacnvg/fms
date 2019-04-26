-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 25, 2019 at 10:35 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fundmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(155) COLLATE utf8_bin NOT NULL,
  `branch_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `account_number` varchar(50) COLLATE utf8_bin NOT NULL,
  `ifsc_account` varchar(20) COLLATE utf8_bin NOT NULL,
  `avail_amount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `update_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `bank_guarantee`
--

CREATE TABLE `bank_guarantee` (
  `id` int(11) NOT NULL,
  `clientname` varchar(100) COLLATE utf8_bin NOT NULL,
  `projectname` varchar(100) COLLATE utf8_bin NOT NULL,
  `amount` double NOT NULL,
  `bankname` varchar(100) COLLATE utf8_bin NOT NULL,
  `branch` varchar(200) COLLATE utf8_bin NOT NULL,
  `accountnumber` varchar(50) COLLATE utf8_bin NOT NULL,
  `ifsc_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `time_period` double NOT NULL,
  `document` varchar(255) COLLATE utf8_bin NOT NULL,
  `update_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bank_guarantee`
--

INSERT INTO `bank_guarantee` (`id`, `clientname`, `projectname`, `amount`, `bankname`, `branch`, `accountnumber`, `ifsc_code`, `time_period`, `document`, `update_on`, `create_on`) VALUES
(2, 'Abhishek Diwan', '4', 550000000, 'Bank Of India', 'Bhopal', '1234567890', 'IFSC00320', 3, '', '2019-04-24 12:21:13', '2019-04-24 00:00:00'),
(3, 'MY Hospital', '4', 15000000, 'State Bank Of India', 'Indore', '123467890', 'IFSC00123', 36, '', '2019-04-24 12:18:08', '2019-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id` int(11) NOT NULL,
  `hierarchy_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `note` varchar(500) COLLATE utf8_bin NOT NULL,
  `status` enum('Paid','Un-Paid','Rejected') COLLATE utf8_bin NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `fund_allotment`
--

CREATE TABLE `fund_allotment` (
  `id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `fund_allotted` double NOT NULL,
  `fund_status` int(11) NOT NULL,
  `allotment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `fund_allotment`
--

INSERT INTO `fund_allotment` (`id`, `proj_id`, `fund_allotted`, `fund_status`, `allotment_date`) VALUES
(11, 4, 15000000000, 1, '2019-04-24 10:37:44'),
(12, 4, 20000000000, 1, '2019-04-24 10:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy`
--

CREATE TABLE `hierarchy` (
  `id` int(11) NOT NULL,
  `lable` varchar(200) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `report_type` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin NOT NULL,
  `head_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `head_designation` varchar(100) COLLATE utf8_bin NOT NULL,
  `head_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `head_contact` varchar(20) COLLATE utf8_bin NOT NULL,
  `office_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `bank_branch` varchar(255) COLLATE utf8_bin NOT NULL,
  `account_number` varchar(50) COLLATE utf8_bin NOT NULL,
  `ifsc_code` varchar(10) COLLATE utf8_bin NOT NULL,
  `isactive` enum('yes','no') COLLATE utf8_bin NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hierarchy`
--

INSERT INTO `hierarchy` (`id`, `lable`, `parent_id`, `report_type`, `description`, `head_name`, `head_designation`, `head_email`, `head_contact`, `office_address`, `bank_name`, `bank_branch`, `account_number`, `ifsc_code`, `isactive`, `update_on`, `create_on`) VALUES
(11, 'Madhya Pradesh Health Department', NULL, '', 'Madhya Pradesh Health Department', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '2019-04-24 10:31:30'),
(12, 'Indore', 11, 'AMT', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Ujain', 11, 'AMT', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Jabalpur', 11, 'AMT', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'MY Hospital', 12, 'YN', '', 'MY Head Name', 'HOD', 'pankaj.rana@cnvg.in', '9806458872', 'MY Hospital', 'SBI', 'Indore', '1234567890', 'IFSC00123', 'yes', '2019-04-24 10:36:48', '0000-00-00 00:00:00'),
(16, 'Apollo', 12, 'YN', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Hospital 1', 13, 'AMT', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Hospital 1', 14, 'YN', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Hospital Jabalpur 1', 14, 'YN', '', '', '', '', '', '', '', '', '', '', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `labeling`
--

CREATE TABLE `labeling` (
  `id` int(11) NOT NULL,
  `default_lable` varchar(100) COLLATE utf8_bin NOT NULL,
  `new_lable` varchar(100) COLLATE utf8_bin NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `labeling`
--

INSERT INTO `labeling` (`id`, `default_lable`, `new_lable`, `update_on`) VALUES
(1, 'DEPARTMENT', 'Municipal Corporation', '2019-04-20 08:55:50'),
(2, 'LABLEONE', 'District', '2019-04-19 12:18:26'),
(3, 'LABLETWO', 'Municipal Corporation', '2019-04-20 08:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `hierarchy_id` int(11) NOT NULL,
  `organisation_name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `head_name` varchar(50) NOT NULL,
  `head_email` varchar(50) NOT NULL,
  `head_mobile` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_type` enum('ADMIN','OTHER') NOT NULL,
  `email_verify` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `update_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `hierarchy_id`, `organisation_name`, `logo`, `head_name`, `head_email`, `head_mobile`, `username`, `password`, `login_type`, `email_verify`, `token`, `update_on`, `create_on`) VALUES
(2, 11, 'Madhya Pradesh Health Department', 'logo_one.png', 'Pankaj Rana', 'pankaj.rana@cnvg.in', '9806458872', 'pankaj.rana@cnvg.in', '21dc2ce26a7286e9e501b13aed648bfa', 'ADMIN', 1, NULL, '2019-04-25 21:11:01', '2019-04-24 10:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `usernme` varchar(100) COLLATE utf8_bin NOT NULL,
  `module` varchar(155) COLLATE utf8_bin NOT NULL,
  `permission` enum('R','RW','RW+') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `usernme`, `module`, `permission`) VALUES
(1, 'pankaj.rana@cnvg.in', 'Dashboard', 'RW'),
(2, 'pankaj.rana@cnvg.in', 'BankGuarantee', 'RW'),
(3, 'pankaj.rana@cnvg.in', 'FundTracking', 'RW'),
(4, 'pankaj.rana@cnvg.in', 'Report', 'RW'),
(5, 'pankaj.rana@cnvg.in', 'Setting', 'RW');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `project_description` varchar(500) COLLATE utf8_bin NOT NULL,
  `project_type` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_by` varchar(100) COLLATE utf8_bin NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `create_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_title`, `project_description`, `project_type`, `created_by`, `update_on`, `create_on`) VALUES
(4, 'Ayusman Yojna', 'Free Treatment', 'DBT', 'admin', '0000-00-00 00:00:00', '2019-04-24 10:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `role` varchar(100) COLLATE utf8_bin NOT NULL,
  `ipaddress` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_agent` varchar(500) COLLATE utf8_bin NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `login_id`, `username`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES
(1, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 05:59:46'),
(2, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 06:04:12'),
(3, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 06:23:23'),
(4, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 08:15:42'),
(5, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 08:16:35'),
(6, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 08:18:52'),
(7, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 08:20:39'),
(8, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-11 10:42:45'),
(9, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-12 05:54:40'),
(10, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-13 04:05:21'),
(11, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-13 08:44:36'),
(12, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 05:28:24'),
(13, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 09:46:34'),
(14, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 10:45:51'),
(15, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 11:29:11'),
(16, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 12:16:16'),
(17, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 12:17:00'),
(18, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-16 12:17:51'),
(19, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-17 04:44:36'),
(20, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-17 11:24:27'),
(21, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-17 12:15:14'),
(22, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-19 08:51:55'),
(23, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-20 05:47:27'),
(24, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-22 06:02:16'),
(25, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-22 09:54:53'),
(26, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-22 12:15:59'),
(27, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-23 09:02:29'),
(28, 1, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Windows 10', '2019-04-24 07:06:55'),
(29, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-24 10:32:19'),
(30, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-24 12:38:58'),
(31, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-25 05:57:07'),
(32, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-25 07:38:57'),
(33, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-25 20:34:07'),
(34, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 73.0.3683.103, Mac OS X', '2019-04-25 21:02:23'),
(35, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 74.0.3729.108, Mac OS X', '2019-04-25 22:02:04'),
(36, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 74.0.3729.108, Mac OS X', '2019-04-25 22:02:33'),
(37, 2, 'pankaj.rana@cnvg.in', 'ADMIN', '::1', 'Chrome 74.0.3729.108, Mac OS X', '2019-04-25 22:04:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bankname` (`bank_name`);

--
-- Indexes for table `bank_guarantee`
--
ALTER TABLE `bank_guarantee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund_allotment`
--
ALTER TABLE `fund_allotment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`proj_id`);

--
-- Indexes for table `hierarchy`
--
ALTER TABLE `hierarchy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labeling`
--
ALTER TABLE `labeling`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `default_lable` (`default_lable`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `hierarchy_id` (`hierarchy_id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_title` (`project_title`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_guarantee`
--
ALTER TABLE `bank_guarantee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund_allotment`
--
ALTER TABLE `fund_allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hierarchy`
--
ALTER TABLE `hierarchy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `labeling`
--
ALTER TABLE `labeling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fund_allotment`
--
ALTER TABLE `fund_allotment`
  ADD CONSTRAINT `project_id` FOREIGN KEY (`proj_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `login_user`
--
ALTER TABLE `login_user`
  ADD CONSTRAINT `login_user_ibfk_1` FOREIGN KEY (`hierarchy_id`) REFERENCES `hierarchy` (`id`);
