-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: JAN 5, 2023 at 01:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Abhi Yadav', 'Rahul Yadav', 35000, '2023-01-3 19:19:35'),
(2, 'Himanshu Singh', 'Anuj Singh', 30000, '2023-01-3 19:29:55'),
(3, 'Niraj More', 'Manish Rao', 53200, '2023-01-3 19:31:15'),
(4, 'Manish Rao', ' Suraj Sharma', 38950, '2023-01-3 19:44:12'),
(5, 'Anubhav Bassi', 'Himanshu Singh', 75010, '2023-01-3 20:44:59'),
(6, 'Surya Yadav','Niraj More', 35100, '2023-01-3 21:27:41'),
(7, 'Vikram Doshi', 'Surya Yadav', 4450, '2023-01-3 21:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(155) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `balance`) VALUES
(1, 'Abhi Yadav', 'abhi@gmail.com', 'Male', 42500),
(2, 'Rahul Yadav', 'rahul@gmail.com', 'Male', 30650),
(3, 'Surya Yadav', 'surya@gmail.com', 'Male', 20050),
(4, 'Niraj More', 'niraj@gmail.com', 'Male', 90005),
(5, 'Manish Rao', 'manish@gmail.com', 'Male', 22350),
(6, 'Vikram Doshi', 'vikram@gmail.com', 'Male', 29000),
(7, 'Himanshu Singh', 'himanshu@gmail.com', 'Male', 62205),
(8, 'Suraj Sharma', 'suraj@gmail.com', 'Male', 90300),
(9, 'Anubhav Bassi', 'anubhav@gmail.com', 'Male', 30000),
(10, 'Arjit Kudve', 'arjit@gmail.com', 'Male', 33000),
(19, 'Amit Rao', 'amit@gmail.com', 'Male', 43300),
(20, 'Karan Sehgal', 'karan@gmail.com', 'Female', 10010);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
