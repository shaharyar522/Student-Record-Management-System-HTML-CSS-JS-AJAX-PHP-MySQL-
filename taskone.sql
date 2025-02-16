-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 09:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskone`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup_user_data`
--

CREATE TABLE `signup_user_data` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_user_data`
--

INSERT INTO `signup_user_data` (`sno`, `user_name`, `user_password`, `dt`) VALUES
(1, 'aa', '$2y$10$DHm6ZEwdyPxYHmXH7oP.DuiGaCyarvao79xyAAw.3fK2wc6mt87xu', '2025-01-29 13:30:36'),
(2, 'gm', '$2y$10$gkKDoduwffvp/GfexrjKU.hykTHH7ioyhmhe/bfbCsG3Xi316ZT9S', '2025-01-29 13:30:36'),
(3, 'gm1', '$2y$10$PLGwWnLjpnC9xxBd5lrntu5rzAgTz8b6UZZsIArT9AUU7G66dKyyi', '2025-01-29 13:30:36'),
(4, 'aa1', '$2y$10$kDPytuYz2eS24RQ/4Qjflu.J0u6GCVJFpt82UoTiWgqH.Sx/Ix9ti', '2025-01-29 13:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(10) NOT NULL DEFAULT 0,
  `st_name` varchar(30) NOT NULL,
  `st_fathername` varchar(30) NOT NULL,
  `st_contact` varchar(30) NOT NULL,
  `st_email` varchar(30) NOT NULL,
  `st_cnic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_fathername`, `st_contact`, `st_email`, `st_cnic`) VALUES
(22, 'atif', 'wwww', '92-308-1545100', 'shahar.yar4511@gamil.com', '11111-1111111-1'),
(26, 'jklafsdjkl', 'khan', '92-308-8154500', 'test@example.fgfdgd', '43245-6789876-8'),
(27, 'rahat bahi', 'dgf', '92-308-8154511', 'shahar.yar4511@gamil.com', '43245-6789876-5');

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `st_id` int(10) NOT NULL,
  `student_name` varchar(10) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_phone` int(20) NOT NULL,
  `student_dob` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`st_id`, `student_name`, `student_email`, `student_phone`, `student_dob`) VALUES
(1, 'tryr', 'rtytry', 98765, 'ytr'),
(2, 'sdrgtr', 'shari@gmail.com', 987654567, '2025-01-09'),
(3, '5rtttttttt', 'shari@gmail.com', 0, '2025-01-09'),
(4, 'erte', 'shari@gmail.com', 0, '2025-01-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup_user_data`
--
ALTER TABLE `signup_user_data`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup_user_data`
--
ALTER TABLE `signup_user_data`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
