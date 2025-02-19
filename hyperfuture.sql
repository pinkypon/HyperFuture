-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 07:18 AM
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
-- Database: `hyperfuture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(254) NOT NULL,
  `admin_password` varchar(254) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_email`, `admin_password`, `reg_date`) VALUES
(6, 'facethereality01@gmail.com', '$2y$10$.7KFDELRt8Ffl9S3OH6k2uKtCDOLGGxVRUBsyHQc2xoYAXIfi8iN.', '2025-02-14 16:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `asset_status`
--

CREATE TABLE `asset_status` (
  `assets_id` int(11) NOT NULL,
  `assets_type` varchar(30) NOT NULL,
  `asset_serial` varchar(50) NOT NULL,
  `person_assign` varchar(254) DEFAULT NULL,
  `is_deployed` int(1) DEFAULT NULL,
  `asset_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_status`
--

INSERT INTO `asset_status` (`assets_id`, `assets_type`, `asset_serial`, `person_assign`, `is_deployed`, `asset_status`) VALUES
(1, 'Laptop', 'LPT-2025-XYZ-0231', 'blueracoon@gmail.com', 0, 0),
(5, 'Mouse', 'MSE-2023-ZXCV-3456', 'redracoon@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(254) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `reg_date`) VALUES
(3, 'Mark Jem', 'Garcia', 'markjemdee01@gmail.com', '$2y$10$u7q1B2hvxdPkpMXTvehVjO76jc/Ou3vd/RDaRHe38Cf4Eiu25UXWe', '2025-02-14 16:28:13'),
(5, 'Yellow', 'Racoon', 'yellowracoon@gmail.com', '$2y$10$Rbk2ZKM.SyNtWI/srMATL.M0MBGa5hae2qaj6TiCKmCGvVwoUNkva', '2025-02-17 13:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `special_user`
--

CREATE TABLE `special_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_password` varchar(254) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_user`
--

INSERT INTO `special_user` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`, `reg_date`) VALUES
(2, 'Mark Jem', 'Garcia', '2021305002@dhvsu.edu.ph', '$2y$10$PKkgKas6XL4XKmdrlfXNwOjuBLmouXgKHtxcGM9qZTYCoekAddoRm', '2025-02-14 16:37:32'),
(6, 'Blue', 'Racoon', 'blueracoon@gmail.com', '$2y$10$XMsCFDOHF//K1U6uXa7b/eoDNFhIP6wJergfIAMKMicaukW0yQmea', '2025-02-17 13:51:28'),
(7, 'Green', 'Racoon', 'greenracoon@gmail.com', '$2y$10$awhf6IQpLoliWuzi1w2EN.Oeth/WrnfX.tkevlKHz48qd7CxBQDcy', '2025-02-17 13:52:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `asset_status`
--
ALTER TABLE `asset_status`
  ADD PRIMARY KEY (`assets_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `special_user`
--
ALTER TABLE `special_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset_status`
--
ALTER TABLE `asset_status`
  MODIFY `assets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_user`
--
ALTER TABLE `special_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
