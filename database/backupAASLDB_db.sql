-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2017 at 05:06 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

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
  `description` varchar(10) NOT NULL,
  `image` varchar(20) NOT NULL COMMENT 'Location on the server where the image is located',
  `active` int(11) NOT NULL COMMENT '0= Not active 1 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(10) UNSIGNED NOT NULL,
  `ember_xml` blob NOT NULL COMMENT 'This is the information that the animated sign is made of.',
  `gloss` varchar(30) NOT NULL,
  `dominate_start_HS` varchar(20) NOT NULL,
  `dominate_end_HS` varchar(20) NOT NULL,
  `nondominate_start_HS` varchar(20) NOT NULL,
  `handedness` int(11) NOT NULL COMMENT 'Is the sign one handed or two handed 1 = 1h 2 = 2h',
  `nondominate_end_HS` varchar(20) NOT NULL,
  `english_meaning` varchar(30) NOT NULL,
  `start_photo` char(50) NOT NULL,
  `end_photo` char(50) NOT NULL,
  `finished` int(11) NOT NULL COMMENT 'Is the sign finished 0=No 1=Yes'
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
  `security_level` int(11) NOT NULL COMMENT '0 = Admin 1 = user',
  `first_name` char(20) NOT NULL,
  `last_name` char(20) NOT NULL,
  `active` int(11) NOT NULL COMMENT '0 = Inactive 1 = Active',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `security_level`, `first_name`, `last_name`, `active`, `email`) VALUES
(2, 'mtw2935', 0x9ed38d8c7e95f75ad5b672d6e7904853, 0, 'Mackenzie', 'Willard', 1, 'mtwillard29@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`sign_id`,`attribute`);

--
-- Indexes for table `auditTrail`
--
ALTER TABLE `auditTrail`
  ADD PRIMARY KEY (`sign_id`),
  ADD UNIQUE KEY `auditTrailIndex` (`id`,`date`,`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for all users', AUTO_INCREMENT=3;