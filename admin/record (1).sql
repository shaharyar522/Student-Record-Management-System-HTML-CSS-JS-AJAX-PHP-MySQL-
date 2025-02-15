-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 02:17 PM
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
-- Database: `record`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(10) NOT NULL,
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
(7, 'rahat bahi', 'dgf', '92-456-7889995', 'shahar.yar4511@gamil.com', '43245-6789876-5'),
(8, 'rahat bahi', 'dgf', '92-308-8154511', 'shahar.yar4511@gamil.com', '43245-6789876-5'),
(9, 'rahat bahi', 'dgf', '92-308-8154511', 'shahar.yar4511@gamil.com', '43245-6789876-5'),
(10, 'rahat bahi', 'dgf', '92-308-8154511', 'shahar.yar4511@gamil.com', '43245-6789876-5'),
(11, 'rahat bahi', 'dgf', '92-308-8154511', 'shahar.yar4511@gamil.com', '43245-6789876-5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
