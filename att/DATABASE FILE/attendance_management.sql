-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 05:09 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `student` varchar(40) DEFAULT NULL,
  `regno` varchar(40) DEFAULT NULL,
  `week` varchar(40) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `unit` int(10) UNSIGNED DEFAULT NULL,
  `attended` varchar(40) DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student`, `regno`, `week`, `date`, `unit`, `attended`, `id`) VALUES
('AMS 303', 'AMS 303', '1', '2021-04-27', 5, NULL, 8),
('AMS 103', 'AMS 103', '1', '2021-04-26', 5, '1', 7),
('AMS 305', 'AMS 305', '1', '2021-04-26', 5, '1', 6),
('AMS 116', 'AMS 116', '1', '2021-04-28', 2, '1', 9),
('AMS 102', 'AMS 102', '1', '2021-04-28', 2, NULL, 10),
('AMS 111', 'AMS 111', '2', '2021-04-28', 1, '1', 11),
('AMS 304', 'AMS 304', '2', '2021-04-28', 1, NULL, 12),
('AMS 304', 'AMS 304', '1', '2021-04-16', 5, '1', 13),
('AMS 110', 'AMS 110', '4', '2021-05-18', 3, '1', 14),
('AMS 112', 'AMS 112', '6', '2021-05-25', 3, '1', 15),
('AMS 106', 'AMS 106', '2', '2021-04-20', 4, '1', 16),
('AMS 102', 'AMS 102', '2', '2021-05-09', 2, NULL, 17),
('AMS 102', 'AMS 102', '3', '2021-05-17', 2, NULL, 18),
('AMS 102', 'AMS 102', '4', '2021-05-26', 3, '1', 19),
('AMS 102', 'AMS 102', '5', '2021-06-05', 3, '1', 20),
('AMS 102', 'AMS 102', '6', '2021-06-16', 5, NULL, 21),
('AMS 102', 'AMS 102', '7', '2021-06-28', 4, '1', 22),
('AMS 102', 'AMS 102', '7', '2021-07-03', 1, '1', 23),
('AMS 102', 'AMS 102', '8', '2021-07-19', 3, '1', 24);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Technology Education'),
(2, 'Emerging Technologies and Innovation'),
(3, 'Bussiness Administration'),
(4, 'Databases'),
(5, 'Cyber Security'),
(6, 'Web Development'),
(7, 'Cloud Computing'),
(8, 'Network Security'),
(9, 'Software Design and Development'),
(10, 'Data Science'),
(11, 'Android App Development'),
(12, 'Programming in Java 1'),
(13, 'Programming in Java 2'),
(14, 'Data Mining and Visualisation'),
(15, 'IT Risk Management'),
(16, 'Principles of Programming Using C#'),
(17, 'Programming with Python'),
(18, 'Machine Learning'),
(19, 'Deep Learning');

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(11) DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 2, 'students', 1, 3, 3, 3),
(2, 2, 'units', 1, 3, 3, 3),
(3, 2, 'courses', 1, 3, 3, 3),
(4, 2, 'attendance', 1, 3, 3, 3),
(20, 3, 'attendance', 1, 3, 1, 1),
(18, 3, 'units', 1, 3, 1, 1),
(19, 3, 'courses', 1, 3, 1, 1),
(17, 3, 'students', 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2018-01-30', 0, 0),
(2, 'Admins', 'Admin group created automatically on 2018-01-30', 0, 1),
(3, 'Lecturer', 'lecturers can join group and add their courses and units and their students', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userpermissions`
--

CREATE TABLE `membership_userpermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(20) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) DEFAULT NULL,
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(20) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_userrecords`
--

INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
(1, 'courses', '1', 'admin', 1517324670, 1517324670, 2),
(2, 'courses', '2', 'admin', 1517324701, 1619619059, 2),
(3, 'courses', '3', 'admin', 1517324738, 1517324738, 2),
(4, 'units', '1', 'admin', 1517324782, 1619618170, 2),
(5, 'units', '2', 'admin', 1517324809, 1619618198, 2),
(74, 'attendance', '6', 'admin', 1619621626, 1619621626, 2),
(28, 'units', '5', 'admin', 1619618229, 1619618229, 2),
(27, 'units', '4', 'admin', 1619618211, 1619618211, 2),
(9, 'attendance', '1', 'admin', 1517325147, 1517325147, 2),
(10, 'attendance', '2', 'admin', 1517325189, 1519116547, 2),
(24, 'students', 'AMS 101', 'admin', 1619617963, 1619617963, 2),
(12, 'attendance', '3', 'admin', 1519116447, 1519116447, 2),
(25, 'students', 'AMS 102', 'admin', 1619617996, 1619617996, 2),
(14, 'attendance', '4', 'admin', 1519116523, 1519116523, 2),
(26, 'units', '3', 'admin', 1619618193, 1619618193, 2),
(16, 'attendance', '5', 'admin', 1619613567, 1619613567, 2),
(17, 'courses', '4', 'admin', 1619617598, 1619617598, 2),
(18, 'courses', '5', 'admin', 1619617614, 1619617614, 2),
(19, 'courses', '6', 'admin', 1619617623, 1619617623, 2),
(20, 'courses', '7', 'admin', 1619617718, 1619617718, 2),
(21, 'courses', '8', 'admin', 1619617726, 1619617726, 2),
(22, 'courses', '9', 'admin', 1619617737, 1619617737, 2),
(23, 'courses', '10', 'admin', 1619617749, 1619617749, 2),
(29, 'students', 'AMS 103', 'admin', 1619618285, 1619618285, 2),
(30, 'students', 'AMS 104', 'admin', 1619618306, 1619618306, 2),
(31, 'students', 'AMS105', 'admin', 1619618320, 1619618320, 2),
(32, 'students', 'AMS 106', 'admin', 1619618357, 1619618357, 2),
(33, 'students', 'AMS 107', 'admin', 1619618382, 1619618382, 2),
(34, 'students', 'AMS 108', 'admin', 1619618397, 1619618397, 2),
(35, 'students', 'AMS 109', 'admin', 1619618438, 1619618438, 2),
(36, 'students', 'AMS 110', 'admin', 1619618451, 1619618451, 2),
(37, 'students', 'AMS 111', 'admin', 1619618473, 1619618473, 2),
(38, 'students', 'AMS 112', 'admin', 1619618487, 1619618487, 2),
(39, 'students', 'AMS 113', 'admin', 1619618501, 1619618501, 2),
(40, 'students', 'AMS 114', 'admin', 1619618515, 1619618515, 2),
(41, 'students', 'AMS 115', 'admin', 1619618539, 1619618539, 2),
(42, 'students', 'AMS 116', 'admin', 1619618552, 1619618552, 2),
(43, 'students', 'AMS 117', 'admin', 1619618579, 1619618579, 2),
(44, 'students', 'AMS 118', 'admin', 1619618598, 1619618598, 2),
(45, 'students', 'AMS 119', 'admin', 1619618618, 1619618618, 2),
(46, 'students', 'AMS 120', 'admin', 1619618644, 1619618644, 2),
(47, 'students', 'AMS 200', 'admin', 1619618684, 1619618684, 2),
(48, 'students', 'AMS 201', 'admin', 1619618700, 1619618700, 2),
(49, 'students', 'AMS 202', 'admin', 1619618719, 1619618719, 2),
(50, 'students', 'AMS 203', 'admin', 1619618736, 1619618736, 2),
(51, 'students', 'AMS 204', 'admin', 1619618758, 1619618758, 2),
(52, 'students', 'AMS 205', 'admin', 1619618779, 1619618779, 2),
(53, 'students', 'AMS 206', 'admin', 1619618801, 1619618801, 2),
(54, 'students', 'AMS 207', 'admin', 1619618816, 1619618816, 2),
(55, 'students', 'AMS 208', 'admin', 1619618831, 1619618831, 2),
(56, 'students', 'AMS 209', 'admin', 1619618870, 1619618870, 2),
(57, 'students', 'AMS 210', 'admin', 1619618885, 1619618885, 2),
(58, 'students', 'AMS 300', 'admin', 1619618901, 1619618901, 2),
(59, 'students', 'AMS 301', 'admin', 1619618915, 1619618915, 2),
(60, 'students', 'AMS 302', 'admin', 1619618931, 1619618931, 2),
(61, 'students', 'AMS 303', 'admin', 1619618974, 1619619983, 2),
(62, 'courses', '11', 'admin', 1619619072, 1619619072, 2),
(63, 'courses', '12', 'admin', 1619619086, 1619619086, 2),
(64, 'courses', '13', 'admin', 1619619091, 1619619091, 2),
(65, 'courses', '14', 'admin', 1619619120, 1619619129, 2),
(66, 'courses', '15', 'admin', 1619619153, 1619619153, 2),
(67, 'courses', '16', 'admin', 1619619173, 1619619173, 2),
(69, 'students', 'AMS 304', 'admin', 1619621453, 1619621453, 2),
(70, 'courses', '17', 'admin', 1619621498, 1619621498, 2),
(71, 'courses', '18', 'admin', 1619621508, 1619621508, 2),
(72, 'courses', '19', 'admin', 1619621514, 1619621514, 2),
(73, 'students', 'AMS 305', 'admin', 1619621556, 1619621556, 2),
(75, 'attendance', '7', 'admin', 1619621644, 1619621644, 2),
(76, 'attendance', '8', 'admin', 1619621660, 1619621660, 2),
(77, 'attendance', '9', 'admin', 1619621682, 1619621682, 2),
(78, 'attendance', '10', 'admin', 1619621695, 1619621695, 2),
(79, 'attendance', '11', 'admin', 1619621721, 1619621721, 2),
(80, 'attendance', '12', 'admin', 1619621753, 1619621753, 2),
(81, 'attendance', '13', 'admin', 1619621777, 1619621777, 2),
(82, 'attendance', '14', 'demo', 1619622101, 1619622101, 3),
(84, 'attendance', '15', 'admin', 1619622222, 1619622222, 2),
(85, 'attendance', '16', 'admin', 1619622242, 1619622242, 2),
(86, 'attendance', '17', 'admin', 1619622326, 1619622326, 2),
(87, 'attendance', '18', 'admin', 1619622340, 1619622340, 2),
(88, 'attendance', '19', 'admin', 1619622368, 1619622368, 2),
(89, 'attendance', '20', 'admin', 1619622399, 1619622399, 2),
(90, 'attendance', '21', 'admin', 1619622438, 1619622438, 2),
(91, 'attendance', '22', 'admin', 1619622457, 1619622457, 2),
(92, 'attendance', '23', 'admin', 1619622508, 1619622508, 2),
(93, 'attendance', '24', 'admin', 1619622550, 1619622550, 2);

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(20) NOT NULL,
  `passMD5` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`) VALUES
('guest', NULL, NULL, '2018-01-30', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2018-01-30', NULL, NULL),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '2018-01-30', 2, 0, 1, 'John Walker', '241  Beechwood Avenue', 'Newark', 'New Jersey', 'Admin member created automatically on 2020-04-01\nmember updated his profile on 04/28/2021, 10:33 am from IP address ::1', NULL, NULL),
('demo', '2138cb5b0302e84382dd9b3677576b24', 'demo@demo.com', '2021-04-28', 3, 0, 1, 'demo', 'demo', 'demo', 'demo', 'member signed up through the registration form.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `regno` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`regno`, `name`, `course`) VALUES
('AMS 103', 'Ana H Taylor', '5'),
('AMS 102', 'Will Williams', '7'),
('AMS 101', 'Liam Johnson', '7'),
('AMS 104', 'Kenneth Bobby', '10'),
('AMS105', 'Darius M Doyle', '5'),
('AMS 106', 'William Prejean', '6'),
('AMS 107', 'Lena Miller', '6'),
('AMS 108', 'Marvin V Hannigan', '4'),
('AMS 109', 'Thomas Yrke', '7'),
('AMS 110', 'Kelly C Duckett', '6'),
('AMS 111', 'Mayme Dennis', '9'),
('AMS 112', 'Jeffrey Stowns', '7'),
('AMS 113', 'Rhonda Mefford', '5'),
('AMS 114', 'Timothy Richter', '6'),
('AMS 115', 'Jennifer H Webb', '6'),
('AMS 116', 'Marc Spector', '8'),
('AMS 117', 'Leonard JHelle', '4'),
('AMS 118', 'Lisa Hayes', '5'),
('AMS 119', 'Felicia Jlee', '4'),
('AMS 120', 'Dorothy Gadot', '9'),
('AMS 200', 'John L Maclachlan', '8'),
('AMS 201', 'Patricia Nelson', '9'),
('AMS 202', 'Yvette Velazquez', '6'),
('AMS 203', 'Teresa Smith', '6'),
('AMS 204', 'Anja McKamey', '10'),
('AMS 205', 'Ralph Fenley', '10'),
('AMS 206', 'Jeffery Ramos', '10'),
('AMS 207', 'Peter McOuff', '8'),
('AMS 208', 'Lanny Garrett', '9'),
('AMS 209', 'John Lyons', '4'),
('AMS 210', 'Patricia Thompson', '7'),
('AMS 300', 'Marvin Vanhorn', '5'),
('AMS 301', 'John K Macek', '10'),
('AMS 302', 'Connie Young', '6'),
('AMS 303', 'Jeff Snyder', '5'),
('AMS 304', 'Francis Moorhead', '16'),
('AMS 305', 'Carolyn Kennedy', '6');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, '8-Unit'),
(2, '6-Units'),
(3, '9-Units'),
(4, '12-15 Units'),
(5, '3-Units');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`);

--
-- Indexes for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`regno`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
