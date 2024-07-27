-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 08:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book_form`
--

INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leaving`) VALUES
(23, '', '', '', '', '', 0, '0000-00-00', '0000-00-00'),
(22, '', '', '', '', '', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `namecont` varchar(255) NOT NULL,
  `emailcont` varchar(255) NOT NULL,
  `numbercont` varchar(10) NOT NULL,
  `messagecont` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `namecont`, `emailcont`, `numbercont`, `messagecont`) VALUES
(1, 'test', 'test@gmail.com', '1234567890', 'this is a test!');

-- --------------------------------------------------------

--
-- Table structure for table `jetbirduser`
--

CREATE TABLE `jetbirduser` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jetbirduser`
--

INSERT INTO `jetbirduser` (`userID`, `fullName`, `email`, `password`) VALUES
(12, 'student3', 'student3@gmail.com', '$2y$10$uTP2ds7R5Pa6N4A83jnfBe46X4lM3fCyCTuSZuYHPtpsOATJnYVzK'),
(11, 'student2', 'student2@example.com', '$2y$10$D8kP5KaRfmP7v5B/G818Q.69Fgb8sJKVBxBMzsr5LjU3xytUF5e8K'),
(10, 'student', 'student@example.com', '$2y$10$6gO9DgP9cvia4U6xhQDubuwsoPj.9P502uU81o9aXRZ5bG.V0Dh6S');

--
-- Indexes for dumped tables
--
--
--Payment details
--
CREATE TABLE payments (
    full_name VARCHAR(255),
    card_number CHAR(16),
    expiry_date CHAR(5),
    cvv CHAR(3),
    date_created DATETIME DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
--
-- Indexes for table `book_form`
--
ALTER TABLE `book_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jetbirduser`
--
ALTER TABLE `jetbirduser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_form`
--
ALTER TABLE `book_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jetbirduser`
--
ALTER TABLE `jetbirduser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
