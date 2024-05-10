-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 10:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ils`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT 'admin',
  `password` varchar(100) NOT NULL DEFAULT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `language` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `cover_img` varchar(100) NOT NULL,
  `publish_date` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `udk` varchar(100) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `link_to_literature` varchar(100) NOT NULL,
  `invent_num` varchar(20) NOT NULL,
  `structural_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `language`, `type`, `cover_img`, `publish_date`, `description`, `create_date`, `status`, `udk`, `price`, `link_to_literature`, `invent_num`, `structural_unit`) VALUES
(1, 'test', 'test', 'English', 'book', 'placeholder.png', 1990, 'test', '2024-05-10 19:58:05', 'ready', '03', 2.00, 'https://www.javatpoint.com/image-gallery-crud-using-php-mysql', '125', 'my mind'),
(2, 'Big book', 'Great Guy', 'English', 'book', 'placeholder.png', 1876, 'test book for testing', '2024-05-10 19:22:10', 'ready', '01', 0.30, 'https://www.javatpoint.com/image-gallery-crud-using-php-mysql', '125', 'my mind');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` int(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `book_id` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `phone_num`, `address`, `book_id`, `birth_date`) VALUES
(1, 'Māris Pavlovs', 'maris.pavlovs@gmail.com', 29628019, 'Salaspils', 3, '1979-03-19'),
(2, 'Elīza Liepniece-Pavlova', 'eliza.liepniece@gmail.com', 26381515, 'Salaspils', 2, '2003-11-24'),
(11, 'name', 'email@email.com', 12345678, '', 45, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_question`
--

CREATE TABLE `user_question` (
  `question_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `question` varchar(255) NOT NULL,
  `is_viewed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_question`
--

INSERT INTO `user_question` (`question_id`, `name`, `email`, `question`, `is_viewed`) VALUES
(26, 'name', 'email@email.com', 'my very important question', 1),
(27, 'test', 'test@test.test', 'testtesttsettesttesttest', 1),
(28, 'big filnal test', 'eliza.liepniece@gmail.com', 'testing big testin very important', 1),
(29, 'name', 'eliza.liepniece-pavlova@birgermind.com', 'test question', 1),
(30, 'name', 'example@email.com', 'my question is here!', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_question`
--
ALTER TABLE `user_question`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_question`
--
ALTER TABLE `user_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
