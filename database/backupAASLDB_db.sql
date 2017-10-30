-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2017 at 09:25 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `animated_sign`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `sign_id` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_list`
--

CREATE TABLE `attribute_list` (
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_list`
--

INSERT INTO `attribute_list` (`name`, `description`, `active`) VALUES
('Is in study', 'This is for signs that are in studies. The description will be the study', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditTrail`
--

CREATE TABLE `auditTrail` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `audit_information` varchar(500) NOT NULL,
  `sign_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hand_shape`
--

CREATE TABLE `hand_shape` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `embr_description` varchar(50) NOT NULL,
  `image` varchar(20) NOT NULL COMMENT 'Location on the server where the image is located',
  `active` int(11) NOT NULL COMMENT '0= Not active 1 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hand_shape`
--

INSERT INTO `hand_shape` (`id`, `description`, `embr_description`, `image`, `active`) VALUES
(0, 'test99', 'testss', 'na', 1),
(1, 'A', '', 'na', 1),
(2, 'B', '', 'na', 1),
(3, 'B-xd', '', 'na', 1),
(4, 'flat-B', '', 'na', 1),
(5, 'B-L', '', 'na', 1),
(6, 'crvd-B', '', 'na', 1),
(7, 'crvd-flat-B', '', 'na', 1),
(8, 'crvd-sprd-B', '', 'na', 1),
(9, 'bent-B', '', 'na', 1),
(10, 'bent-B-xd', '', 'na', 1),
(11, 'bent-B-L', '', 'na', 1),
(12, 'C', '', 'na', 1),
(13, 'sml-C/3', '', 'na', 1),
(14, 'tight-C', '', 'na', 1),
(15, 'tight-C/2', '', 'na', 1),
(16, 'D', '', 'na', 1),
(17, 'E', '', 'na', 1),
(18, 'loose-E', '', 'na', 1),
(19, 'F/9', '', 'na', 1),
(20, 'cocked-F', '', 'na', 1),
(21, 'open-F', '', 'na', 1),
(22, 'G/Q', '', 'na', 1),
(23, 'flat-G', '', 'na', 1),
(24, 'alt-G', '', 'na', 1),
(25, 'U/H', '', 'na', 1),
(26, 'I', '', 'na ', 1),
(27, 'I-L-Y', '', 'na', 1),
(28, 'bent-I-L-Y', '', 'na', 1),
(29, 'P/K', '', 'na', 1),
(30, 'L', '', 'na', 1),
(31, 'L-X', '', 'na', 1),
(32, 'crvd-L', '', 'na', 1),
(33, 'M', '', 'na', 1),
(34, 'alt-M', '', 'na', 1),
(35, 'bent-M', '', 'na', 1),
(36, 'N', '', 'na', 1),
(37, 'alt-N', '', 'na', 1),
(38, 'bent-N', '', 'na', 1),
(39, 'O', '', 'na', 1),
(40, 'baby-O', '', 'na', 1),
(41, 'flat-O', '', 'na', 1),
(42, 'flat-O/2', '', 'na', 1),
(43, 'fanned-flat-O', '', 'na', 1),
(44, 'alt-P', '', 'na', 1),
(45, 'R', '', 'na', 1),
(46, 'R-L', '', 'na', 1),
(47, 'S', '', 'na', 1),
(48, 'crooked-S', '', 'na', 1),
(49, 'T', '', 'na', 1),
(50, 'crvd-U', '', 'na', 1),
(51, 'bent-U', '', 'na', 1),
(52, 'cocked-U', '', 'na', 1),
(53, 'U-L', '', 'na', 1),
(54, 'bent-U-L', '', 'na', 1),
(55, 'V/2', '', 'na', 1),
(56, 'crvd-V', '', 'na', 1),
(57, 'bent-V', '', 'na', 1),
(58, 'W', '', 'na', 1),
(59, 'crvd-W', '', 'na', 1),
(60, 'X', '', 'na', 1),
(61, 'X-over-thumb', '', 'na', 1),
(62, 'Y', '', 'na', 1),
(63, 'Vulcan', '', 'na', 1),
(64, 'Horns', '', 'na', 1),
(65, 'bent-Horns', '', 'na', 1),
(66, 'O/2-Horns', '', 'na', 1),
(67, 'RLxd', '', 'na', 1),
(68, '1', '1', 'na', 1),
(69, 'bent-1', '', 'na', 1),
(70, '3', '', 'na', 1),
(71, 'crvd-3', '', 'na', 1),
(72, '4', '', 'na', 1),
(73, '5', '', 'na', 1),
(74, 'crvd-5', '', 'na', 1),
(75, '5-C', '', 'na', 1),
(76, '5-C-L', '', 'na', 1),
(77, '5-C-tt', '', 'na', 1),
(78, '6', '', 'na', 1),
(79, '7', '', 'na', 1),
(80, 'cocked-7', '', 'na', 1),
(81, 'open-7', '', 'na', 1),
(82, '8', '', 'na', 1),
(83, 'cocked-8', '', 'na', 1),
(84, 'open-8', '', 'na', 1),
(85, '25', '', 'na', 1),
(86, 'Other', '', 'na', 1);

-- --------------------------------------------------------

--
-- Table structure for table `related_sign`
--

CREATE TABLE `related_sign` (
  `s_sign` int(11) NOT NULL,
  `r_sign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(10) UNSIGNED NOT NULL,
  `embr_xml` varchar(8000) NOT NULL COMMENT 'This is the information that the animated sign is made of.',
  `gloss` varchar(30) NOT NULL,
  `dominant_start_HS` varchar(20) DEFAULT NULL,
  `dominant_end_HS` varchar(20) DEFAULT NULL,
  `nondominant_start_HS` varchar(20) DEFAULT NULL,
  `handedness` int(11) NOT NULL COMMENT 'Is the sign one handed or two handed 1 = 1h 2 = 2h',
  `nondominant_end_HS` varchar(20) DEFAULT NULL,
  `english_meaning` varchar(30) NOT NULL,
  `start_photo` char(50) NOT NULL,
  `end_photo` char(50) NOT NULL,
  `finished` int(11) NOT NULL COMMENT 'Is the sign finished 0=No 1=Yes',
  `asllvd_link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sign_history`
--

CREATE TABLE `sign_history` (
  `id` int(11) NOT NULL,
  `sign` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL,
  `old_embr` varchar(500) NOT NULL COMMENT 'the embr that was in the sign table before an update happened to it'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `synonym`
--

CREATE TABLE `synonym` (
  `id` int(11) NOT NULL,
  `sign_id` int(11) NOT NULL,
  `englis_word` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Unique identifier for all users',
  `username` varchar(10) NOT NULL,
  `password` varbinary(20) NOT NULL COMMENT 'Password is encrypted with AES',
  `security_level` int(11) NOT NULL COMMENT '2 = Admin 1 = user',
  `first_name` char(20) NOT NULL,
  `last_name` char(20) NOT NULL,
  `active` int(11) NOT NULL COMMENT '0 = Inactive 1 = Active',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `security_level`, `first_name`, `last_name`, `active`, `email`) VALUES
(2, 'mtw2935', 0x9ed38d8c7e95f75ad5b672d6e7904853, 3, 'Mackenzie', 'Willard', 1, 'mtwillard29@gmail.com'),
(3, 'jxt1234', 0x3f3f32d3b33f3f3f3f3f40783f6e, 1, 'John', 'Testington', 1, 'jtestington@rit.edu'),
(4, 'test', 0x74657374, 1, 'firstTest', 'lastTest', 1, 'acb123@email.com'),
(5, 'chicken', 0x3f3f3f3f363f486e3f3f3f533f3f3f3f733f, 2, 'Doug', 'lname', 1, 'email@email.com'),
(6, 'bbk1234', 0x503f3f3f3f21523f3f333f653f, 1, 'Bri', 'Kelly', 1, 'bbk1234@rit.edu'),
(7, 'mgs4321', 0x4145535f454e4352595054282744756e64657227, 2, 'Michael', 'Scott', 1, 'mgs432@df.com'),
(8, 'jth1234', 0x636c6b3f3f3f523f3f7d3f3f3f3f3f, 1, 'Jim', 'Halpert', 1, 'jth1234@df.com'),
(9, 'dba123', 0x3f4a7d3f453f683f367d3f3f3f, 2, 'David', 'Atten', 1, 'dba123@rit.edu'),
(10, 'mphics', 0x727b743f3f5b3fdba94e36603f78, 3, 'Matt', 'Huenerfauth', 1, 'matt.huenerfauth@rit.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`sign_id`,`attribute`);

--
-- Indexes for table `attribute_list`
--
ALTER TABLE `attribute_list`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auditTrail`
--
ALTER TABLE `auditTrail`
  ADD PRIMARY KEY (`sign_id`),
  ADD UNIQUE KEY `auditTrailIndex` (`id`,`date`,`user_id`);

--
-- Indexes for table `hand_shape`
--
ALTER TABLE `hand_shape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_sign`
--
ALTER TABLE `related_sign`
  ADD PRIMARY KEY (`s_sign`,`r_sign`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synonym`
--
ALTER TABLE `synonym`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for all users', AUTO_INCREMENT=11;