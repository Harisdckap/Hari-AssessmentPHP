-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2024 at 05:12 PM
-- Server version: 10.4.30-MariaDB-1:10.4.30+maria~ubu2004
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_appointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `confirmed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `reason`, `appointment_time`, `created_at`, `address`, `confirmed`) VALUES
(1, 'Harish', 'Fever', '16:27:00', '2024-07-16 06:58:15', 'no 55 andavar street avvai nagar', 1),
(3, 'maha', 'cold', '16:24:00', '2024-07-16 10:52:05', 'mmda', 0),
(4, 'kishorekumar', 'cold and cough', '20:26:00', '2024-07-16 10:56:54', 'Assumenda eveniet d', 0),
(5, 'brathkumar', 'fever', '16:33:00', '2024-07-16 11:02:27', 'koyamedu', 0),
(6, 'hari', 'malariya', '22:33:00', '2024-07-16 11:03:55', 'Architecto totam tem', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_doctor` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_doctor`) VALUES
(1, 'harikumar', '$2y$10$60wvPiIykknE7sX1pQuR/OheX9UHQvCtd3pCx5rCDMfRtYYEooM1.', 0),
(2, 'kumari', '$2y$10$8TWn37pN4gsxfq7XQJClVejrkkyob88oQxTRhe8jCwBvobUSXJ99y', 0),
(3, 'jeniliya', '$2y$10$5vrFI8mhla1DA9k6l42HseU4U1aV5E49Y8Xyo/v1OWSm3rerNThOW', 0),
(4, 'harini', '$2y$10$98RhSSV1sQU/PfUsT8YoTOvaNNc3QICRoE3KZFhbx4EeBJQ9eRa5y', 0),
(5, 'pattabi', '$2y$10$fsW4cnbEW3XW04RIJkvQvOQoj6tmyaE0Ukdez1flQHylPhSVocI8a', 0),
(6, 'margreat', '$2y$10$gGaQxnl7eneSoLMyZ1d8c.kTBL.gVBsOPYuLABg4MH0uiWn0MMiiS', 0),
(7, 'priyani', '$2y$10$hNQt/Z/vEqBlsR7j6UREHuRvxrM6ug5HN/SvZOeUhngxBZBHGnA2q', 0),
(8, 'Doctor', 'doctor', 1),
(9, 'shanmuga', '$2y$10$qSAPvTt2iKDphQTX15DcEuVJNLs.Vc/rLDJNmq54Qw/cHdnbL8ABK', 0),
(10, 'danush', '$2y$10$6HaXbA1OuRdPFQsXTP5eOuhFNMOEtDagdvMhZjmzWIcYH20XFFYra', 0),
(11, 'gunasri', '$2y$10$8x5bSmbrKICRjGS36SuvdOk1ErOJKe0BOCGFw9oyaVx.T4Sq2cY72', 0),
(12, 'gayuuuu', '$2y$10$NhWBv9KA.MLI5jG.KKcZ2O5/t0c3ny.2IjqiGgb0BlffiGV2CYHOS', 0),
(13, 'kumkibro', '$2y$10$Bi9WdMhIZLpFxvoNysYpgOQ5xWIF4ri29jyh/7FqtAs86KwVCg4tC', 0),
(14, 'vijilakshmi', '$2y$10$Tg/IaD8HuaUUOwg0LtoZY.Hn863xxk1SwK7JbTZ5Gcy7J1NpP02L2', 0),
(15, 'vigheshkumar', '$2y$10$lVdtwLKNZzEnvwbbGW207OspeJfjtTnynJjv3qei65h8FdS.Lb0dO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
