-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2017 at 01:24 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animated_sign`
--

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
('Is in study', 'This is for signs that are in studies. The description will be the study', 1),
('Test', 'This is a test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
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
(0, 'none', '', 'na', 0),
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
  `s_sign` varchar(30) NOT NULL,
  `r_sign` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `related_sign`
--

INSERT INTO `related_sign` (`s_sign`, `r_sign`) VALUES
('(1h)Car', 'aaaaaaaaaaaa'),
('(1h)Car', 'chair'),
('(1h)Car', 'fffffffffffff'),
('(1h)Car', 'HOME'),
('(1h)Car', 'one'),
('(1h)Car', 'penis'),
('aaaaaaaaaaaa', '(1h)Car'),
('aaaaaaaaaaaa', 'chair'),
('aaaaaaaaaaaa', 'Tigger'),
('Box', 'fffffffffffff'),
('chair', '(1h)Car'),
('chair', 'aaaaaaaaaaaa'),
('chair', 'fffffffffffff'),
('dasda', 'fffffffffffff'),
('dasdas', 'tonic'),
('ddsadsa', 'DICK'),
('DICK', 'ddsadsa'),
('DICK', 'FUCK'),
('DICK', 'headphone'),
('DICK', 'TITTY'),
('fffffffffffff', '(1h)Car'),
('fffffffffffff', 'Box'),
('fffffffffffff', 'chair'),
('fffffffffffff', 'dasda'),
('FUCK', 'last'),
('FUCK', 'TITTY'),
('headphone', 'DICK'),
('HO', 'TITTY'),
('HOME', '(1h)Car'),
('last', 'FUCK'),
('one', '(1h)Car'),
('penis', '(1h)Car'),
('Tigger', 'aaaaaaaaaaaa'),
('TITTY', 'DICK'),
('TITTY', 'FUCK'),
('TITTY', 'HO'),
('tonic', 'dasdas'),
('turkey', 'WORK'),
('WORK', 'turkey'),
('WORK', 'wrongs'),
('wrongs', 'WORK');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `embr_xml` text NOT NULL,
  `gloss` varchar(30) NOT NULL,
  `dominant_start_HS` int(11) NOT NULL,
  `dominant_end_HS` int(11) NOT NULL,
  `nondominant_start_HS` int(11) NOT NULL,
  `handedness` int(11) NOT NULL,
  `nondominant_end_HS` int(11) NOT NULL,
  `english_meaning` varchar(100) NOT NULL,
  `start_photo` varchar(50) NOT NULL,
  `end_photo` varchar(50) NOT NULL,
  `finished` int(11) NOT NULL,
  `asllvd_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`embr_xml`, `gloss`, `dominant_start_HS`, `dominant_end_HS`, `nondominant_start_HS`, `handedness`, `nondominant_end_HS`, `english_meaning`, `start_photo`, `end_photo`, `finished`, `asllvd_link`) VALUES
('Start\r\nis \r\nthis working the\r\nway that I want it\r\n\r\nNow this is pod racing\r\n', '(1h)Car', 72, 70, 0, 1, 0, 'Car', 'na', 'na', 1, 'dddd'),
('', 'aaaaaaaaaaaa', 44, 73, 0, 1, 0, 'sssssssssssssssssssssssssssss', 'startTest.png', 'na', 1, 'ffdsafd'),
('sfdfadsafdsacsadcads', 'Box', 85, 85, 0, 1, 0, 'fkmsdlkmf', 'na', 'na', 1, 'fdlksmflksd'),
('fweaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'chair', 70, 73, 70, 1, 68, 'sdklmaslkm', 'na', 'na', 1, 'dlkxsmflskdmflkmsdkljsnfdjklghndfjkl'),
('TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n', 'CHILDREN', 5, 5, 0, 1, 0, 'Children', 'na', 'na', 0, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partialamp;key=Childrenamp;variant_name=CHILDamp;demonstrator=Allamp;is_main=1'),
('dddd', 'dasda', 72, 75, 0, 1, 0, 'dfsdfsdaf', 'startTest.png', 'endTest.png', 1, 'fsdafsd'),
('dddd', 'dasdas', 70, 72, 0, 1, 0, 'dasdas', 'na', 'na', 1, 'dsadas'),
('dasdasd', 'ddsadsa', 77, 73, 0, 1, 0, 'fsdafdsae', 'na', 'na', 1, 'sdsadas'),
('', 'DICK', 85, 70, 0, 1, 0, 'lkdasjl', 'na', 'na', 1, 'sdfklmdfdslkm'),
('', 'dsadas', 85, 72, 0, 1, 0, 'dsfdsaf', 'na', 'na', 1, 'fdsafasd'),
('fadsdsdsdsdsds', 'fffffffffffff', 70, 70, 0, 1, 0, 'fffffffffff', 'startTest.png', 'endTest.png', 1, 'fdsaf'),
('', 'FUCK', 85, 73, 0, 1, 0, 'dklasjm', 'na', 'na', 1, 'lckdsmflk'),
('', 'Gin', 85, 44, 0, 1, 0, 'maslkdm', 'na', 'na', 1, 'lkmdslkfmslkdm'),
('', 'headphone', 68, 85, 0, 1, 0, 'ndslkasnlkd', 'startTest.png', 'endTest.png', 1, 'dflkmdsflkmsdlk'),
('kldfsdkl', 'HO', 70, 70, 0, 1, 0, 'ho', 'na', 'na', 1, 'ho'),
('start\r\nend', 'HOME', 41, 41, 0, 1, 0, 'home', 'startTest.png', 'endTest.png', 1, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partial&key=HOME&variant_name=HOME&demonstrator=All&is_main=1'),
('TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n', 'HORSE', 5, 5, 0, 2, 0, 'Horse', 'na', 'na', 0, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partial&key=Horse&variant_name=HORSE&demonstrator=All&is_main=1'),
('', 'last', 70, 73, 0, 1, 0, 'mena', 'na', 'na', 1, 'dmaksldmalsk'),
('TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n', 'LION', 5, 5, 0, 1, 0, 'Children', 'startTest.png', 'endTest.png', 0, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partial&key=LION&variant_name=LION&demonstrator=All&is_main=1'),
('', 'one', 68, 68, 0, 1, 0, 'one', 'na', 'na', 1, 'dkjasnlkj'),
('TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n', 'PANDA', 5, 5, 0, 1, 0, 'Children', 'na', 'na', 0, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partialamp;key=Childrenamp;variant_name=CHILDamp;demonstrator=Allamp;is_main=1'),
('ffff', 'pay', 85, 72, 0, 1, 0, 'pay', 'na', 'na', 1, 'fsdafds'),
('s', 'penis', 29, 29, 0, 1, 0, 'penis', 'na', 'na', 1, 'skdlkasm'),
('dddd', 'Phone', 85, 70, 0, 1, 0, 'phone', 'startTest.png', 'endTest.png', 1, 'sdlkmas'),
('TIME_RESET\r\n\r\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\r\n CHARACTER:Ben\r\n START:300\r\n FADE_IN:200\r\n FADE_OUT:300\r\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\r\n  TIME_POINT:300\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.12;0;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.12\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.28;-0.88;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;0.34;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\r\n  TIME_POINT:567\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.22\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\r\n  TIME_POINT:833\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.12;-0.94;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.22;0.36;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\r\n  TIME_POINT:1100\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.2\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\nEND\r\n\r\n', 'pigglet', 29, 73, 0, 1, 0, 'pig', 'na', 'na', 1, 'mmmdll..d.s.damnfmdmskfm'),
('TIME_RESET\r\n\r\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\r\n CHARACTER:Ben\r\n START:300\r\n FADE_IN:200\r\n FADE_OUT:300\r\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\r\n  TIME_POINT:300\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.12;0;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.12\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.28;-0.88;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;0.34;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\r\n  TIME_POINT:567\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.22\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\r\n  TIME_POINT:833\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.12;-0.94;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.22;0.36;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\r\n  TIME_POINT:1100\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.2\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\nEND\r\n\r\n', 'Pooh', 85, 85, 0, 1, 0, 'Pooh', 'na', 'na', 1, 'ertyuiopkljmdsakml;kadml;k'),
('TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n', 'PUPPIES', 5, 5, 0, 1, 0, 'Children', 'na', 'na', 0, 'http://secrets.rutgers.edu/dai/queryPages/search/result.php?type=partialamp;key=Childrenamp;variant_name=CHILDamp;demonstrator=Allamp;is_main=1'),
('', 'SAD', 68, 85, 0, 1, 0, 'sss', 'na', 'na', 1, 'lllll'),
('', 'SSSSSS', 68, 70, 0, 1, 0, 'dasdas', 'na', 'na', 1, 'dddd'),
('TIME_RESET\r\n\r\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\r\n CHARACTER:Ben\r\n START:300\r\n FADE_IN:200\r\n FADE_OUT:300\r\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\r\n  TIME_POINT:300\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.12;0;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.12\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.28;-0.88;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;0.34;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\r\n  TIME_POINT:567\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.22\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\r\n  TIME_POINT:833\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.12;-0.94;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.22;0.36;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\r\n  TIME_POINT:1100\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.2\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\nEND\r\n\r\n', 'Tigger', 49, 49, 0, 1, 0, 'tigger', 'na', 'na', 1, 'dfksjanfjklasdnfljksdanfkjasdnfkljnasd'),
('', 'TITTY', 68, 70, 0, 1, 0, 'ddddd', 'na', 'na', 1, 'dfsdfd'),
('fdsdfadfsfdsa', 'tonic', 68, 72, 0, 1, 0, 'help', 'na', 'na', 1, 'dsla,dals;,d;'),
('', 'turkey', 85, 82, 0, 1, 0, 'turkeu', 'na', 'na', 1, 'dfdsfsa'),
('', 'WORK', 85, 72, 0, 1, 0, 'ksdkas', 'na', 'na', 1, 'xxxcc'),
('', 'wrongs', 72, 72, 0, 1, 0, 'dlkmsalkm', 'na', 'na', 1, 'kfldsmlkfmsdlk'),
('', 'XXXCZ', 68, 70, 68, 2, 68, 'xx', 'na', 'na', 1, 'ccccc');

-- --------------------------------------------------------

--
-- Table structure for table `sign_attribute`
--

CREATE TABLE `sign_attribute` (
  `sign` varchar(30) NOT NULL,
  `attribute` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sign_attribute`
--

INSERT INTO `sign_attribute` (`sign`, `attribute`, `description`) VALUES
('aaaaaaaaaaaa', 'Is_in_study', 'dddd'),
('dasdas', 'Is_in_study', 'ddddd'),
('fffffffffffff', 'Is_in_study', 'ffffffffff'),
('headphone', 'Is_in_study', 'sdaads'),
('last', 'Is_in_study', 'qweqweqwe'),
('one', 'Is_in_study', 'Numbers'),
('Phone', 'Is_in_study', 'ggggggg'),
('Tigger', 'Is_in_study', 'Cats'),
('turkey', 'Is_in_study', 'Food'),
('wrongs', 'Is_in_study', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sign_history`
--

CREATE TABLE `sign_history` (
  `sign` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL,
  `old_embr` text NOT NULL COMMENT 'the embr that was in the sign table before an update happened to it'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sign_history`
--

INSERT INTO `sign_history` (`sign`, `date`, `user`, `old_embr`) VALUES
('(1h)Car', '2017-11-10 20:21:37', 2, 'Start\r\nis \r\nthis working the\r\nway that I want it'),
('(1h)Car', '2017-11-10 20:21:59', 2, 'Start\r\nis \r\nthis working the\r\nway that I want it\r\n\r\nNow this is pod racing\r\n'),
('cat', '0000-00-00 00:00:00', 1, 'This is where this will go'),
('cow', '2017-11-07 18:58:45', 1, 'More information here'),
('HORSE', '2017-11-08 20:47:36', 2, 'TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n'),
('LION', '2017-11-07 19:59:26', 2, 'TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n'),
('pigglet', '2017-11-07 19:56:19', 2, 'TIME_RESET\r\n\r\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\r\n CHARACTER:Ben\r\n START:300\r\n FADE_IN:200\r\n FADE_OUT:300\r\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\r\n  TIME_POINT:300\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.12;0;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.12\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.28;-0.88;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;0.34;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\r\n  TIME_POINT:567\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.22\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\r\n  TIME_POINT:833\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.12;-0.94;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.22;0.36;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\r\n  TIME_POINT:1100\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.2\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\nEND\r\n\r\n'),
('pigglet', '2017-11-08 04:22:19', 10, 'TIME_RESET\r\n\r\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\r\n CHARACTER:Ben\r\n START:300\r\n FADE_IN:200\r\n FADE_OUT:300\r\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\r\n  TIME_POINT:300\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.12;0;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.12\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.28;-0.88;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;0.34;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\r\n  TIME_POINT:567\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:0;-0.26;0.22\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\r\n  TIME_POINT:833\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.24\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.12;-0.94;0.4\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.22;0.36;0.88\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_start\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\r\n  TIME_POINT:1100\r\n  HOLD:133\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:lhand\r\n    POSE_KEY:hands_ASL_BCL\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    TARGET:0.38;0.1;-0.84\r\n    JOINT:lhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:-0.1;0.02;-1\r\n    JOINT:lhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:larm\r\n    DIRECTION:1;-0.08;-0.1\r\n    JOINT:lhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN POSE_TARGET\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rhand\r\n    POSE_KEY:hands_open-straight\r\n  END\r\n  BEGIN POSITION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    TARGET:-0.12;-0.26;0.2\r\n    JOINT:rhand\r\n    OFFSET:0;0;0\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:0.34;-0.94;0\r\n    JOINT:rhand\r\n    NORMAL:Yaxis\r\n  END\r\n  BEGIN ORIENTATION_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    DIRECTION:-0.26;-0.12;0.94\r\n    JOINT:rhand\r\n    NORMAL:Zaxis\r\n  END\r\n  BEGIN SWIVEL_CONSTRAINT\r\n    FEEDBACK_ID:feedback_end\r\n    BODY_GROUP:rarm\r\n    SWIVEL_ANGLE:39.599999999999994\r\n  END\r\n END\r\nEND\r\n\r\n'),
('PUPPIES', '2017-11-07 19:59:26', 2, 'TIME_RESET\n\nBEGIN K_POSE_SEQUENCE  # --- LEXEME:(1h)CHILDREN\n CHARACTER:Ben\n START:300\n FADE_IN:200\n FADE_OUT:300\n BEGIN K_POSE  # --- Pose 0 --- SYNC:start\n  TIME_POINT:300\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.12;0;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.12\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.28;-0.88;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;0.34;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 1 --- SYNC:start\n  TIME_POINT:567\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:0;-0.26;0.22\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 2 --- SYNC:start\n  TIME_POINT:833\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.24\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:0.12;-0.94;0.4\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    DIRECTION:-0.22;0.36;0.88\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_start\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\n BEGIN K_POSE  # --- Pose 3 --- SYNC:end\n  TIME_POINT:1100\n  HOLD:133\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:lhand\n    POSE_KEY:hands_ASL_BCL\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    TARGET:0.38;0.1;-0.84\n    JOINT:lhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:-0.1;0.02;-1\n    JOINT:lhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:larm\n    DIRECTION:1;-0.08;-0.1\n    JOINT:lhand\n    NORMAL:Zaxis\n  END\n  BEGIN POSE_TARGET\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rhand\n    POSE_KEY:hands_open-straight\n  END\n  BEGIN POSITION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    TARGET:-0.12;-0.26;0.2\n    JOINT:rhand\n    OFFSET:0;0;0\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:0.34;-0.94;0\n    JOINT:rhand\n    NORMAL:Yaxis\n  END\n  BEGIN ORIENTATION_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    DIRECTION:-0.26;-0.12;0.94\n    JOINT:rhand\n    NORMAL:Zaxis\n  END\n  BEGIN SWIVEL_CONSTRAINT\n    FEEDBACK_ID:feedback_end\n    BODY_GROUP:rarm\n    SWIVEL_ANGLE:39.599999999999994\n  END\n END\nEND\n'),
('tigger', '2017-11-07 19:12:15', 1, 'Information');

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
-- Indexes for table `attribute_list`
--
ALTER TABLE `attribute_list`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
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
  ADD PRIMARY KEY (`gloss`);

--
-- Indexes for table `sign_attribute`
--
ALTER TABLE `sign_attribute`
  ADD PRIMARY KEY (`sign`,`attribute`,`description`);

--
-- Indexes for table `sign_history`
--
ALTER TABLE `sign_history`
  ADD PRIMARY KEY (`sign`,`date`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for all users', AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
