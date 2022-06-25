-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220506.44a5cb2d56
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 12:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_tabara3`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_events`
--

CREATE TABLE `enrolled_events` (
  `enrolled_events_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_attendance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrolled_events`
--

INSERT INTO `enrolled_events` (`enrolled_events_id`, `user_id`, `event_id`, `event_attendance`) VALUES
(23, 5, 17, '\"absent\"'),
(24, 5, 18, '\"present\"'),
(25, 5, 19, '\"absent\"'),
(26, 5, 20, '\"absent\"'),
(27, 5, 21, '\"present\"'),
(28, 5, 22, '\"present\"'),
(29, 5, 23, ''),
(30, 5, 24, ''),
(31, 5, 25, ''),
(32, 6, 17, '\"present\"'),
(33, 6, 18, '\"absent\"'),
(34, 6, 19, '\"absent\"'),
(35, 6, 20, '\"absent\"'),
(36, 6, 21, '\"absent\"'),
(37, 6, 22, '\"present\"'),
(38, 6, 23, ''),
(39, 6, 24, ''),
(40, 6, 25, ''),
(41, 7, 17, '\"absent\"'),
(42, 7, 18, '\"absent\"'),
(43, 7, 19, '\"absent\"'),
(44, 7, 20, '\"absent\"'),
(45, 7, 21, '\"absent\"'),
(46, 7, 22, '\"present\"'),
(47, 7, 23, ''),
(48, 7, 24, ''),
(49, 7, 25, ''),
(50, 8, 17, '\"present\"'),
(51, 8, 18, '\"present\"'),
(52, 8, 19, '\"absent\"'),
(53, 8, 20, '\"present\"'),
(54, 8, 21, '\"absent\"'),
(55, 8, 22, '\"present\"'),
(56, 9, 19, '\"absent\"'),
(57, 9, 18, '\"absent\"'),
(58, 9, 22, '\"absent\"'),
(59, 10, 19, '\"absent\"'),
(60, 10, 18, '\"present\"'),
(61, 10, 22, '\"absent\"'),
(62, 11, 18, '\"present\"'),
(63, 11, 21, '\"absent\"'),
(64, 11, 20, '\"present\"'),
(65, 11, 22, '\"absent\"'),
(66, 12, 19, '\"absent\"'),
(67, 12, 20, '\"present\"'),
(68, 13, 19, '\"absent\"'),
(69, 13, 17, '\"present\"');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_enrolled` int(11) NOT NULL,
  `event_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `event_description` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `event_img` varchar(255) NOT NULL,
  `event_start_date` datetime DEFAULT NULL,
  `event_end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_enrolled`, `event_created_at`, `event_description`, `org_id`, `event_img`, `event_start_date`, `event_end_date`) VALUES
(17, 'blood donation campaign', 5, '2022-06-03 21:19:54', 'Your blood donation is the lifeblood', 5, 'blod.jpg', '2022-06-08 18:00:00', '2022-06-30 03:00:00'),
(18, 'Car wash campaign', 7, '2022-06-03 21:25:10', 'Organize a car wash drive and donate the money you collect to a charity', 5, 'ghaseel.jpg', '2022-06-15 00:00:00', '2022-06-28 00:00:00'),
(19, 'Bread donation campaign', 8, '2022-06-03 21:28:15', 'Provide a charity in your area with bread for a specified period', 5, 'khobs.jpg', '2022-06-06 00:00:00', '2022-06-14 00:30:00'),
(20, 'Meal delivery campaign', 6, '2022-06-03 21:58:39', 'Participate in the delivery of meals and gifts to patients in hospitals', 6, 'tawsel.jpg', '2022-06-08 00:58:00', '2022-06-22 00:58:00'),
(21, 'fundraising', 5, '2022-06-03 22:01:10', 'Participate in a charity fundraiser', 6, 'tabaru3.webp', '2022-06-02 01:01:00', '2022-06-15 01:01:00'),
(22, 'An event on the occasion of a national holiday', 7, '2022-06-03 22:04:18', 'Organize an event for a national or religious holiday or anniversary popular in your area', 6, 'jor_event.jpg', '2022-06-01 01:04:00', '2022-06-30 01:04:00'),
(23, 'Summer camp for kids', 3, '2022-06-03 22:16:43', 'Volunteer at a summer camp for kids', 7, 'mokhayam.jpg', '2022-06-01 01:16:00', '2022-06-28 01:16:00'),
(24, 'Visiting children in hospital', 3, '2022-06-03 22:19:19', 'Give games to sick children in hospitals', 7, 'child.jpeg', '2022-06-02 01:19:00', '2022-06-22 01:19:00'),
(25, 'Donate books for children', 3, '2022-06-03 22:26:19', 'Donate books for children', 7, 'ketab.jpg', '2022-06-01 01:26:00', '2022-06-14 01:26:00'),
(26, 'Donate clothes', 0, '2022-06-03 22:28:39', 'Donate your old clothes', 9, 'malabes.jpg', '2022-06-01 01:28:00', '2022-06-27 01:28:00'),
(27, 'Donate a first aid kit', 0, '2022-06-03 22:31:45', 'Donate first aid kits and give them to shelters or nursing homes', 8, 'esaaf.jpg', '2022-06-02 01:31:00', '2022-06-14 01:31:00'),
(28, 'Meals campaign', 0, '2022-06-03 22:33:57', 'Prepare a homemade meal and donate it to a poor person or a shelter for the poor', 10, 'taam.jpg', '2022-06-02 01:33:00', '2022-06-29 01:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_link` varchar(255) NOT NULL,
  `org_admin_id` int(11) NOT NULL,
  `org_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_link`, `org_admin_id`, `org_img`) VALUES
(5, 'Tkiyet Um Ali', '', 5, 'omali.jpg'),
(6, 'Development and Employment Fund', '', 6, 'tan_org.jpg'),
(7, 'Jordanian Women\'s Training and Rehabilitation Charitable Association', '', 7, 'jor_wom_org.jpg'),
(8, 'Jordan Hashemite Charity Organization', '', 8, 'hash_org.jpg'),
(9, 'Ministry of Social Development', '', 9, 'wiz_org.jpg'),
(10, 'Wings Of Hope Society', '', 10, 'wings_org.png');

-- --------------------------------------------------------

--
-- Table structure for table `org_admin`
--

CREATE TABLE `org_admin` (
  `org_admin_id` int(11) NOT NULL,
  `org_admin_name` varchar(255) NOT NULL,
  `org_admin_email` varchar(255) NOT NULL,
  `org_admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_admin`
--

INSERT INTO `org_admin` (`org_admin_id`, `org_admin_name`, `org_admin_email`, `org_admin_pass`) VALUES
(5, 'Tareq', 't.anshasi99@gmail.com', '1234'),
(6, 'abdullah', 'awwa@gmail.com', '1234'),
(7, 'Omar', 'omar@gmail.com', '1234'),
(8, 'ahmad', 'ahmad@gmail.com', '1234'),
(9, 'khaled', 'khaled@gmail.com', '1234'),
(10, 'motasim', 'motasim@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `barth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_gender`, `user_created_at`, `barth_date`) VALUES
(5, 'tareq', 'tareq@gmail.com', '$2y$10$OudZW.nSb/H5vZ2AMjOKze/Qe1DHuVcOqJyltZ61kA7eELF2adLr.', 791445926, 'Male', '2022-06-03 20:40:22', '1999-08-13'),
(6, 'awwa', 'awwa999@gmail.com', '$2y$10$7GAxirrJmX0C.U9/hjImpu1DcIpAigUrposAO.7ILpEAl/0ku6cZ2', 79552018, 'Male', '2022-06-03 20:41:20', '1999-06-17'),
(7, 'zeyad', 'zeyad@gmail.com', '$2y$10$rvaIPoARG2boFp5eaB.iEOepsVIDjRKTEgP.owHmRx.O4Xl1mDRPm', 1255542222, 'Male', '2022-06-03 20:42:01', '2019-02-19'),
(8, 'ahmad', 'ahmad@gmail.com', '$2y$10$q8znvZFhHP8nd1oxxX59JeCVEP8eMm7EHq25stjlk4p1.wyMRqkqK', 2147483647, 'Male', '2022-06-03 20:42:32', '2018-06-06'),
(9, 'soso', 'soso@gmail.com', '$2y$10$Uvpq6zx81p2pnRVlhVP1z.SP4Rs1pWmqpeOP6GmNWNpxdBWEMNPle', 2147483647, 'Female', '2022-06-03 20:43:01', '2021-02-11'),
(10, 'omar', 'omar@gmail.com', '$2y$10$2bWCx.7bdjOUKHQxKaRPtu6fwcCwAgI4hy8Ox2DrhorhVA9iKsUqa', 2147483647, 'Male', '2022-06-03 20:43:29', '2018-03-10'),
(11, 'samar', 'samar@gmail.com', '$2y$10$Nkgm22M22fZSYl7xRhYGEu//sySrEoS.vXoJvoUGnkeQKQZtR/cs6', 2147483647, 'Male', '2022-06-03 20:44:06', '2018-02-08'),
(12, 'lolo', 'lolo@gmail.com', '$2y$10$TPzOPX6tiE.rPH2FHgGf9uldXt2ZkwwKOGC4SH9m3iOmSEHmoTU7W', 987426622, 'Female', '2022-06-03 20:44:34', '2017-02-11'),
(13, 'salah', 'salah@gmail.com', '$2y$10$.sWc0k99l2mJYFHmHuJO9.cbWn1aDjylKwLTsL3X1Jpma4qEf/PmO', 2147483647, 'Male', '2022-06-03 20:45:12', '2017-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrolled_events`
--
ALTER TABLE `enrolled_events`
  ADD PRIMARY KEY (`enrolled_events_id`),
  ADD KEY `enrolled_events_ibfk_1` (`user_id`),
  ADD KEY `id_event` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`),
  ADD KEY `org_admin_id` (`org_admin_id`);

--
-- Indexes for table `org_admin`
--
ALTER TABLE `org_admin`
  ADD PRIMARY KEY (`org_admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled_events`
--
ALTER TABLE `enrolled_events`
  MODIFY `enrolled_events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `org_admin`
--
ALTER TABLE `org_admin`
  MODIFY `org_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled_events`
--
ALTER TABLE `enrolled_events`
  ADD CONSTRAINT `enrolled_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_events_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`org_admin_id`) REFERENCES `org_admin` (`org_admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



