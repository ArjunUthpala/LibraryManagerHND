-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 08:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_hnd61`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author1` varchar(25) NOT NULL,
  `author2` varchar(25) DEFAULT NULL,
  `publisher` varchar(20) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `category` enum('Action','Horror','Novel','Comic','Education') NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1- available for borrow & reserve\r\n0 - book has borrowed',
  `last_reserved_member` int(10) UNSIGNED DEFAULT NULL COMMENT 'currently reserved member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author1`, `author2`, `publisher`, `isbn`, `category`, `price`, `available`, `last_reserved_member`) VALUES
(12345, 'Javascript beginer guide', 'Jonathon Cook', '', 'Richard Publication', '978-3-16-148410-0', 'Education', '789', 1, 3333),
(13568, 'New Moon', 'Dan Brown', '', 'Pan Macmillan', '898-8-16-147530-1', 'Horror', '231', 1, 2222),
(16789, 'Spiritual Well-being', 'Sarath Panditharathna', '', 'Sarasavi Publication', '768-2-78-175360-1', 'Education', '753', 1, NULL),
(21345, 'Twilight', 'Meyer', 'Stephenie', 'Brown Book', '928-3-14-178410-0', 'Action', '120', 1, NULL),
(32567, 'Python for Beginners', 'Dan Thomson', 'Jannet Magret', 'Student hub', '528-3-76-174510-1', 'Education', '425', 0, NULL),
(78923, 'Madol  Doowa', 'Martin Wickramasinghe', '', 'Sarasavi Publication', '912-3-18-144510-0', 'Novel', '800', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE `book_borrow` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `due_return_date` date NOT NULL,
  `actual_return_date` date NOT NULL,
  `fine` decimal(10,2) NOT NULL,
  `is_reserve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`id`, `member_id`, `book_id`, `borrow_date`, `due_return_date`, `actual_return_date`, `fine`, `is_reserve`) VALUES
(9, 3333, 32567, '2021-03-09', '2021-03-23', '0000-00-00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_reserve`
--

CREATE TABLE `book_reserve` (
  `reserve_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `reserve_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_reserve`
--

INSERT INTO `book_reserve` (`reserve_id`, `member_id`, `book_id`, `reserve_date`) VALUES
(11, 3333, 12345, '2021-03-18'),
(12, 2222, 13568, '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `member_type` enum('student','professor') NOT NULL DEFAULT 'student',
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `address1` varchar(20) NOT NULL,
  `address2` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `register_date` date NOT NULL,
  `no_book_borrow` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `last_reserve_book` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `middle_name`, `last_name`, `member_type`, `gender`, `address1`, `address2`, `city`, `register_date`, `no_book_borrow`, `last_reserve_book`) VALUES
(1111, 'Sandun', '', 'Rathnayake', 'professor', 'male', 'Wijayaba Mawatha', 'Narammala', 'Kurunegala', '2021-03-12', 0, NULL),
(2222, 'Kasun', '', 'Maduwantha', 'student', 'male', 'Lake round', 'Yanthampalawa', 'Kurunegala', '2021-03-12', 0, 13568),
(3333, 'Viraj', '', 'Sasanka', 'professor', 'male', 'Walaw waththa', 'Yanthampalawa', 'Kurunegala', '2021-03-16', 4, 12345),
(3456, 'Wasantha', 'Kumara', 'Ranathunga', 'professor', 'male', 'No. 959, Lake round', 'Parani Nagaraya', 'Anuradhapura', '2021-02-25', 0, 12345),
(4444, 'Gayan', '', 'Sanjaya', 'professor', 'male', 'Industrial park', 'Alakoladeniya', 'Kurunegala', '2021-03-17', 0, NULL),
(6666, 'Arjun', 'Uthpala', 'Waththegedara', 'student', 'male', '246/2, Munamale lane', 'Negombo road,', 'Kurunegala', '2021-03-02', 0, NULL),
(6789, 'Dasuni', '', 'Wimalarathne', 'student', 'female', 'No. 28/2, ', 'Jaya Mawatha', 'Kurunegala', '2021-02-22', 0, NULL),
(9874, 'Kasuni', '', 'Perera', 'professor', 'female', '7, 5th lane', 'Peradeniya road,', 'Kandy', '2021-03-05', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `profile_image` varchar(50) NOT NULL,
  `password` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `member_id`, `user_name`, `user_type`, `profile_image`, `password`) VALUES
(9640, 1111, 'Sandun', 'admin', 'Profile_Images/sh1.png', '81dc9bdb52d04dc20036dbd8313ed055'),
(9641, 3333, 'Viraj', 'user', 'Profile_Images/sh3.png', '81dc9bdb52d04dc20036dbd8313ed055'),
(9642, 6666, 'Arjun', 'admin', 'Profile_Images/arjun.jpg', '81b073de9370ea873f548e31b8adc081');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fpk1` (`book_id`),
  ADD KEY `fpk2` (`member_id`);

--
-- Indexes for table `book_reserve`
--
ALTER TABLE `book_reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `fpk3` (`book_id`),
  ADD KEY `fpk4` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fpk5` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_reserve`
--
ALTER TABLE `book_reserve`
  MODIFY `reserve_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9643;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD CONSTRAINT `fpk1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `fpk2` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `book_reserve`
--
ALTER TABLE `book_reserve`
  ADD CONSTRAINT `fpk3` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `fpk4` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fpk5` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
