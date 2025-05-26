-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 12:10 AM
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
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `available_time` time NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `available_time`, `quantity`, `image`) VALUES
(3, 'rice', '2000', '12:34:00', '4', ''),
(8, 'rice', '2000', '12:34:00', '34', 'uploads675982c35c570__DSC3133_2.JPG'),
(9, 'pap', '200', '14:34:00', '2', 'uploads6778e51b59151__DSC3133_1.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `available_time` time NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `username`, `student_id`, `number`, `image`, `name`, `price`, `available_time`, `quantity`, `created_at`) VALUES
(1, 'Marykay', '0', '0902324267', 'uploads/6759267e6507b6.60870745.jpg', '', '', '00:00:00', '', '2024-12-11 06:43:26'),
(2, 'Marykay', '0', '0902324267', 'uploads/675926a09a2f71.45830982.jpg', '', '', '00:00:00', '', '2024-12-11 06:44:00'),
(3, 'Marykay', '0', '0902324267', 'uploads/6759371b20a943.91096806.jpg', '', '', '00:00:00', '', '2024-12-11 07:54:19'),
(4, 'Marykay', '0', '0902324267', '18232.jpg', 'spagetti', '2900', '13:04:00', '1', '2024-12-11 07:55:03'),
(5, 'Marykay', '0', '0902324267', 'uploads/675945a32dfcd8.41720819.jpg', '', '', '00:00:00', '', '2024-12-11 08:56:19'),
(6, 'Marykay', 'LUC-NGA2345678', '0902324267', '18229.jpg', 'Mary', '2900', '12:34:00', '77', '2024-12-11 11:07:32'),
(7, 'Marykay', 'LUC-NGA2345678', '0902324267', '18229.jpg', 'Mary', '2900', '12:34:00', '77', '2024-12-11 11:08:12'),
(8, 'Marykay', 'LUC-NGA2345678', '0902324267', '_DSC3133 (1)_1.JPG', 'Mary', '2900', '12:34:00', '5', '2024-12-11 12:58:51'),
(9, 'Marykay', 'LUC-NGA-002-ADM-1000007', '07047492313', '_DSC3133_1.JPG', 'MARY AKINYODE', '2000', '14:12:00', '3', '2024-12-14 18:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `semester`, `email`, `password`, `passport`, `created_at`) VALUES
(1, 'LUC-NGA-002-ADM-1000007', 'Akinyode Mary', '4', 'akinyode@gmail.com', '$2y$10$q.KP8YiaW.oHc93RBWO3a.lvFhzM96VG5lTv1riUqcObF7yFzItMi', '_DSC3133 (1)_1.JPG', '2024-12-10 09:06:54'),
(2, 'LUC-NGA2345678', 'Mary', '4', 'ak@gmail.com', '$2y$10$3OG/eAFaQK5eha5ROzoADOfBVS7nRExR50nJ3x0W6y44qgdXAr.lu', '_DSC3133 (1)_1.JPG', '2024-12-10 13:04:33'),
(3, 'LUC-NGA-345', 'MARY', '4', 'tee@gmail.com', '$2y$10$8WisVqEMfWiQ.UpUoVdjw.PhqUPOAgemDmRGDSPXMJMn3NdxOj.Zi', '5595.jpg', '2024-12-10 13:57:06'),
(4, 'LUC-NGA23456784', 'Marykay', '4', 'mary@gmail.com', '$2y$10$O4bM2YOgs2QHxZvXhBx3LOXVRrjv0V9NGY8V6bTNnNQDIv71d8CHm', '_DSC3133_2.JPG', '2024-12-11 06:58:44'),
(5, 'LUC-9', 'Maryk', '4', 'mariy@gmail.com', '$2y$10$FtbjDCwIZN64oiny0wuT4.XMpSLOb9xxCb3TJoYPCEl8YxNKubBsq', '18229.jpg', '2024-12-11 10:03:00'),
(6, 'LUC-NGA23456787', 'Mary', '4', 'mk@gmail.com', '$2y$10$H40WPAkeS4TxwpbFQgrsleyowRrJ7b191j2O2dfKutus0.7Kx1NGO', '_DSC3133_2.JPG', '2024-12-11 12:01:07'),
(7, 'LUC/FSSAH/DEL/06/009', 'Oguntamu Ayomide', '4', 'oguntamuayomide43@gmail.com', '$2y$10$alyfTSvMcEC4x62b9UosDerjDzZqvcAV5CPZnLOhg/vSO3WQenlLu', '', '2024-12-11 14:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
