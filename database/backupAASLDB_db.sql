-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2017 at 02:40 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `animated_sign`
--

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
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(10) UNSIGNED NOT NULL,
  `ember_xml` blob NOT NULL COMMENT 'This is the information that the animated sign is made of.',
  `gloss` varchar(30) NOT NULL,
  `dominate_start_HS` varchar(20) NOT NULL,
  `dominate_end_HS` varchar(20) NOT NULL,
  `nondominate_start_HS` varchar(20) NOT NULL,
  `nondominate_end_HS` varchar(20) NOT NULL,
  `english_meaning` varchar(30) NOT NULL
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
(2, 'mtw2935', 0x4df5996e258693adc654f89ecc786543, 0, 'Mackenzie', 'Willard', 1, 'mtwillard29@gmail.com');

--
-- Indexes for dumped tables
--

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