-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 12:29 AM
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
-- Database: `trimclick_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `contact`, `username`, `password`) VALUES
(1, 'ban', 'awmdfiawmf', '2147483647', 'banban123', '$2y$10$rAzfnpE8jF5wVErbYUpcReKELVVTzytMWaX//0ZmIZzfvBO3mAkxe'),
(2, 'ban', 'banban', '2147483647', 'banban123', '$2y$10$RaxU9BvPMzQBwEW9UutHte3IeJPhaoEtx/5jLBfVh1ttOwYinf55C'),
(3, 'ban', 'banban', '09179150066', 'banban123', '$2y$10$r9tW2jH.pfDQV7LpHzzzB.4rOjK3XqMktGO5yp5HwwGnymwzGsAWi'),
(4, 'awdaw', 'awda', '09179150066', 'banban123', '$2y$10$wazN2S1U2ZV8jwhpou/gl.rgWC5jP3AAxoJ9h6w0qIy7sKavafmri'),
(5, 'ban', 'miranda', '09123456789', 'banban123', '$2y$10$SPSdn/fF0ykduNKjBtfSjuKnh6Co28oP7fHxLM8aqQiZgwIovDISW'),
(6, 'ban', 'miranda', '09123456789', 'banban12323', '$2y$10$lHnJLlwNyMdm4sS2ra8//e33iOrV/wzemdpZDaGjSbGkmAd8i3rzi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
