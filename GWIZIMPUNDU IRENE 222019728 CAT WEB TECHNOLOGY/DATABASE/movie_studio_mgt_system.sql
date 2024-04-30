-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_studio_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `Actor_Id` int(11) NOT NULL,
  `Names` varchar(56) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`Actor_Id`, `Names`, `Email`, `Phone`, `Gender`) VALUES
(2, 'yanick', 'yanick@gmail.com', '0723232323', 'Male'),
(3, 'deborah', 'deborah@gmail.com', '07252525258', 'Female'),
(7, 'nelly', 'nell@gmail', '078999889', 'Female'),
(9, 'werty', 'asdfg@gmail.com', '07888888888', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `Director_Id` int(11) NOT NULL,
  `Names` varchar(59) DEFAULT NULL,
  `Telephone` varchar(13) DEFAULT NULL,
  `Email` varchar(59) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`Director_Id`, `Names`, `Telephone`, `Email`) VALUES
(1, 'dfgh', '765', 'sdfgh@gmail.com'),
(2, 'ange', '0789988554', 'peter@gmail.com'),
(5, 'dfgh', '765', 'sdfgh@gmail.com'),
(6, 'sdf', '56789', 'asdfg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `film_information`
--

CREATE TABLE `film_information` (
  `Film_Info_Id` int(11) NOT NULL,
  `Actor_Id` int(11) DEFAULT NULL,
  `Director_Id` int(11) DEFAULT NULL,
  `Title` varchar(109) DEFAULT NULL,
  `Duration` varchar(13) DEFAULT NULL,
  `Release_Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film_information`
--

INSERT INTO `film_information` (`Film_Info_Id`, `Actor_Id`, `Director_Id`, `Title`, `Duration`, `Release_Date`) VALUES
(3, 7, 2, 'life is good', '4hrs', '2024-09-04'),
(4, 7, 1, 'Good health', '3hrs', '2023-11-02'),
(6, 3, 1, 'Love  is so far', '10hrs', '2022-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `financial_management`
--

CREATE TABLE `financial_management` (
  `Financial_Mgt_Id` int(11) NOT NULL,
  `Film_Info_Id` int(11) DEFAULT NULL,
  `Budget` varchar(30) DEFAULT NULL,
  `Expenses` varchar(100) DEFAULT NULL,
  `Revenue` varchar(109) DEFAULT NULL,
  `profit` varchar(109) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_management`
--

INSERT INTO `financial_management` (`Financial_Mgt_Id`, `Film_Info_Id`, `Budget`, `Expenses`, `Revenue`, `profit`) VALUES
(1, 3, '500', '3435', '6466', '100'),
(2, 4, '6000', '3000', '100000', '2000'),
(3, 4, '123', '786', '4455', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

CREATE TABLE `production_details` (
  `Production_Details_Id` int(11) NOT NULL,
  `Budget` varchar(30) DEFAULT NULL,
  `Marketing_Location` varchar(100) DEFAULT NULL,
  `Production_Start_Line` varchar(109) DEFAULT NULL,
  `Production_End_Line` varchar(109) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production_details`
--

INSERT INTO `production_details` (`Production_Details_Id`, `Budget`, `Marketing_Location`, `Production_Start_Line`, `Production_End_Line`) VALUES
(2, 'shooting', 'kigali', '12:00 am', '17:00 pm'),
(3, 'recording', 'Bugesera', '13:00pm', '21:00pm'),
(4, 'play', 'kagitumba', '23:00pm', '01:00am'),
(5, 'hgtrdesdfy', 'kjghhj', 'gfdffghj', 'uytty'),
(6, 'to buy', 'nyabugogo', '08:00 am ', '17:00 pm'),
(7, 'ghj', 'vgggght', 'gjy', 'ghg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'umutesi', 'naome', 'mutesin', 'naomeumutesi@gmail.com', '07328877654', '$2y$10$plJj3IUGS2jw2NMTqKfB5eFLty8A1MJ8TFnt8HZU8lPgdpbfLg0tG', '2024-04-25 05:38:18', '3456', 0),
(2, 'timote', 'gerad', 'timoty', 'gerati@gmail.com', '0734455556', '$2y$10$0QEgquj5BUZgsff077h3Ku.k8I33abrMXU2I4TXHCqcNdepbkilQy', '2024-04-25 05:39:39', '34567', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`Actor_Id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`Director_Id`);

--
-- Indexes for table `film_information`
--
ALTER TABLE `film_information`
  ADD PRIMARY KEY (`Film_Info_Id`),
  ADD KEY `Actor_Id` (`Actor_Id`),
  ADD KEY `Director_Id` (`Director_Id`);

--
-- Indexes for table `financial_management`
--
ALTER TABLE `financial_management`
  ADD PRIMARY KEY (`Financial_Mgt_Id`),
  ADD KEY `Film_Info_Id` (`Film_Info_Id`);

--
-- Indexes for table `production_details`
--
ALTER TABLE `production_details`
  ADD PRIMARY KEY (`Production_Details_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `Actor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `Director_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `film_information`
--
ALTER TABLE `film_information`
  MODIFY `Film_Info_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `financial_management`
--
ALTER TABLE `financial_management`
  MODIFY `Financial_Mgt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production_details`
--
ALTER TABLE `production_details`
  MODIFY `Production_Details_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_information`
--
ALTER TABLE `film_information`
  ADD CONSTRAINT `film_information_ibfk_1` FOREIGN KEY (`Actor_Id`) REFERENCES `actors` (`Actor_Id`),
  ADD CONSTRAINT `film_information_ibfk_2` FOREIGN KEY (`Director_Id`) REFERENCES `directors` (`Director_Id`);

--
-- Constraints for table `financial_management`
--
ALTER TABLE `financial_management`
  ADD CONSTRAINT `financial_management_ibfk_1` FOREIGN KEY (`Film_Info_Id`) REFERENCES `film_information` (`Film_Info_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
