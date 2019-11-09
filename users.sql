-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 12:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crane`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(22) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('enable','disable') COLLATE utf8mb4_unicode_ci DEFAULT 'enable',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chimauche Njoku', 'demo23@gmail.com', '08080808080', 'enable', '$2y$10$pFttpcx44aq04iM1dSk4teHweQ3m9FRIZinEjyZb//UkuBcKY6Pka', 'y6nc7NppyE7EcgKzsy9JsPPfQ16JgPjomLVYpJmrNMazrjDnRfE24sPN4DRh', '2019-11-09 08:47:59', '2019-11-09 08:47:59'),
(2, 'Luke Gideon', 'luke@gmail.com', '09090909090', 'enable', '$2y$10$/sqvUBe2tEL1VelzU/p8C.ckVyT8p5EMyZcDk3TXp3OGA1xJQ36Nm', 'Qu7RWc5cubozKO53wdsdE1fmOUdPJw13OOvQwgylhODdzTQ7FV9ex980tDMJ', '2019-11-09 08:48:47', '2019-11-09 08:48:47'),
(3, 'Samuel Ayo', 'ayo@gmail.com', '07070707070', 'disable', '$2y$10$iEL1g8zVE6Aw/KSIva9FI.g0OZPzCP5iehh1R8jc12.k.3t2AS4CG', 'b3yXFb10DVteR3eD5qTOjH6vtbv4KhnIaJGpf0J3HEZRReMx2nBoLfXyobsd', '2019-11-09 08:49:19', '2019-11-09 10:03:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
