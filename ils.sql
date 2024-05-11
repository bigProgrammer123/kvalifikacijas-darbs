-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 06:43 PM
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
  `link_to_literature` varchar(1000) NOT NULL,
  `invent_num` varchar(20) NOT NULL,
  `structural_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `language`, `type`, `cover_img`, `publish_date`, `description`, `create_date`, `status`, `udk`, `price`, `link_to_literature`, `invent_num`, `structural_unit`) VALUES
(15, 'Kitāb al-aqdas', 'Baháʼuʼlláh', 'Persian', 'Book', 'placeholder.png', 1992, 'Baháʼuʼlláh. Kitāb al-aqdas. Persian. Haifa : Baháʼí World Centre, [c1992]', '2024-05-11 15:00:38', 'Available', '02 Religion', 2.69, 'http://primocat.bl.uk/F/?func=direct&local_base=PRIMO&doc_number=016897006&format=001&con_lng=eng&_g', '34', 'Nacionālais centrs'),
(16, 'Kitāb al-aqdas', 'Baháʼuʼlláh', 'Persian', 'Book', 'placeholder.png', 1995, 'Baháʼuʼlláh. Kitāb al-aqdas. Persian. Canada : Quebecor Jasper Printing, [c1995]', '2024-05-11 15:04:23', 'Available', '02 Religion', 3.42, '', '35', 'Nacionālais centrs'),
(17, 'Tablets of the divine plan', 'ʻAbduʼl-Bahá', 'English', 'Book', 'placeholder.png', 1993, 'ʻAbduʼl-Bahá. Tablets of the divine plan. 1st pocket-size ed. Wilmette, Ill. : Baháʼí Pub. Trust, 1993.', '2024-05-11 15:13:00', 'Available', '02 Religion', 1.27, 'https://lccn.loc.gov/91025381', '178002', 'Nacionālais centrs'),
(18, 'The Kitáb-i-íqán : the Book of certitude', 'Baháʼuʼlláh', 'English', 'Book', 'placeholder.png', 1983, 'Baháʼuʼlláh. The Kitáb-i-íqán : the Book of certitude / translated by Shoghi Effendi. 1st pocket-size ed. Wilmette, Ill., Baháʼí Pub. Committee, 1983.', '2024-05-11 15:19:49', 'Available', '02 Religion', 2.74, 'https://lccn.loc.gov/00709564', 'JE11.3.0', 'Storage'),
(19, 'Writings of Baha\'u\'llah : a compilation', 'Baháʼuʼlláh', 'English', 'Book', 'placeholder.png', 1986, 'Baháʼuʼlláh. Writings of Baha\'u\'llah : a compilation. New Delhi : Baháʼí Pub. Trust, 1986.', '2024-05-11 15:30:54', 'Available', '02 Religion', 7.17, 'http://primocat.bl.uk/F/?func=direct&local_base=PRIMO&doc_number=009254960&format=001&con_lng=eng&_g', 'JE18.0', 'Nacionālais centrs'),
(20, 'Selections from the writings of the Báb', 'Báb', 'English', 'Book', 'placeholder.png', 1976, 'Báb. Selections from the writings of the Báb. Haifa : The Centre ; Wilmette, Ill. : distributed in the U.S. by Baháʼí Pub. Trust, c1976.', '2024-05-11 15:34:45', 'Available', '02 Religion', 2.23, 'https://lccn.loc.gov/79670141', 'LV00.0.0', 'Storage'),
(21, 'Selections from the writings of the Báb', 'Báb', 'English', 'Book', 'placeholder.png', 1976, 'Báb. Selections from the writings of the Báb. Haifa : The Centre ; Wilmette, Ill. : distributed in the U.S. by Baháʼí Pub. Trust, c1976.', '2024-05-11 15:36:18', 'Available', '02', 2.23, 'https://lccn.loc.gov/79670141', 'LV00.0.1', 'Nacionālais centrs'),
(22, 'Selections from the writings of the Báb', 'Báb', 'English', 'Book', 'placeholder.png', 1976, 'Báb. Selections from the writings of the Báb. Haifa : The Centre ; Wilmette, Ill. : distributed in the U.S. by Baháʼí Pub. Trust, c1976.', '2024-05-11 15:37:44', 'Available', '02 Religion', 2.23, 'https://lccn.loc.gov/79670141', 'LV00.0.2', 'Nacionālais centrs'),
(23, ' A concordance to the writings of Baháʼuʼlláh', 'Nelson, Lee', 'English', 'Book', 'placeholder.png', 1988, 'Nelson, Lee, 1955- A concordance to the writings of Baháʼuʼlláh. Wilmette, Ill. : Baháʼí Pub. Trust, c1988.', '2024-05-11 15:39:26', 'Available', '02 Religion', 11.10, 'https://lccn.loc.gov/88006176', 'LV1.0', 'Nacionālais centrs'),
(24, 'The Kitáb-i-aqdas = The most holy book', 'Baháʼuʼlláh', 'English', 'Book', 'placeholder.png', 1992, 'Baháʼuʼlláh. The Kitáb-i-aqdas = The most holy book. Haifa : Baháʼí World Centre, c1992.', '2024-05-11 15:41:37', 'Available', '02 Religion', 2.96, 'https://lccn.loc.gov/2001390888', 'LV10.0', 'Nacionālais centrs'),
(25, 'The Kitáb-i-aqdas = The most holy book', 'Baháʼuʼlláh', 'English', 'Book', 'placeholder.png', 1992, 'Baháʼuʼlláh. The Kitáb-i-aqdas = The most holy book. Haifa : Baháʼí World Centre, c1992.', '2024-05-11 15:42:51', 'Available', '02 Religion', 2.96, 'https://lccn.loc.gov/2001390888', 'LV10.0.1', 'Storage'),
(26, 'The Kitáb-i-aqdas = The most holy book', 'Baháʼuʼlláh', 'English', 'Book', 'placeholder.png', 1992, 'Baháʼuʼlláh. The Kitáb-i-aqdas = The most holy book. Haifa : Baháʼí World Centre, c1992.', '2024-05-11 15:43:57', 'Available', '02 Religion', 2.96, 'https://lccn.loc.gov/2001390888', 'LV10.0.2', 'Nacionālais centrs'),
(27, 'Secret in the Garden', 'Barnum-Newman, Winifred', 'English', 'Book', 'placeholder.png', 1980, 'Barnum-Newman, Winifred. Secret in the Garden. Wlmette, Ill. : Baháʼí Publ. Trust, 1980.', '2024-05-11 15:46:28', 'Available', '08 Language. Literature', 0.32, '', 'LV90.0.0', 'Storage'),
(28, 'Secret in the Garden', 'Barnum-Newman, Winifred', 'English', 'Book', 'placeholder.png', 1980, 'Barnum-Newman, Winifred. Secret in the Garden. Wlmette, Ill. : Baháʼí Publ. Trust, 1980.', '2024-05-11 15:47:58', 'Available', '08 Language. Literature', 0.32, '', 'LV90.0.1', 'Nacionālais centrs'),
(29, 'Simply noble : A step-by-step guide to cultivating', 'Reyhani, Ramona', 'English', 'Book', 'placeholder.png', 2005, 'Reyhani, Ramona. Simply noble : A step-by-step guide to cultivating the best in your child. Berlin : Horizonte Publishing Trust, c2005, 2006.', '2024-05-11 15:53:31', 'Available', '06 Applied sciences', 1.84, '', 'RI92.0.0', 'Riga centre'),
(30, 'Bahājiešu lūgšanas : Bahāullā, Baba un Abdulbahā a', 'Baháʼuʼlláh, ʻAbduʼl-Bahá, Báb', 'Latvian', 'Book', 'placeholder.png', 2003, 'Bahājiešu lūgšanas : Bahāullā, Baba un Abdulbahā atklato lūgšanu izlase. Rēzekne : Bahāi ticības Rīgas draudzes Vietējā Garīgā Padome, 2003.', '2024-05-11 16:01:27', 'Available', '02 Religion', 1.96, '', '266', 'Riga centre'),
(31, 'The spiritual revolution', 'Thornhill, Ontario : Canadian Baháʼí Community', 'English', 'Brochure', 'placeholder.png', 1974, 'The spiritual revolution. Thornhill, Ontario : Canadian Baháʼí Community, 1974.', '2024-05-11 16:08:11', 'Available', '02 Religion', 0.18, '', 'LV456,0,0', 'Nacionālais centrs');

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
(30, 'name', 'example@email.com', 'my question is here!', 1);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
