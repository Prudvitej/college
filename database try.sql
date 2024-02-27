-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 06:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `hallTicketNumber` varchar(11) DEFAULT NULL,
  `subject_Name` varchar(100) DEFAULT NULL,
  `submission_time` varchar(11) NOT NULL,
  `YEAR` int(2) NOT NULL,
  `SEM` int(2) NOT NULL,
  `regulation` varchar(5) NOT NULL,
  `SEM_TYPE` varchar(20) NOT NULL,
  `AMOUNT` int(50) NOT NULL,
  `FINE` varchar(50) NOT NULL,
  `TOTAL_AMOUNT` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `subapp` varchar(10) NOT NULL,
  `lab_count` varchar(10) NOT NULL,
  `REG_FORM_NUMBER` varchar(100) NOT NULL,
  `MOB_NO` varchar(11) NOT NULL,
  `Lab_Names` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`hallTicketNumber`, `subject_Name`, `submission_time`, `YEAR`, `SEM`, `regulation`, `SEM_TYPE`, `AMOUNT`, `FINE`, `TOTAL_AMOUNT`, `Name`, `subapp`, `lab_count`, `REG_FORM_NUMBER`, `MOB_NO`, `Lab_Names`, `program`, `course`) VALUES
('22TR1A6617', 'bppe,lpvd,rs', '2024-02-12 ', 2, 2, 'r18', 'Supply', 500, '0', 500, 'PPt', '3', '0', '4586', '9182520644', 'n/a', 'B.Tech', 'CSE'),
('22TR1A6617', 'bppe,lpvd,rs', '2024-02-12 ', 2, 2, 'r18', 'Supply', 500, '0', 500, 'PPt', '3', '0', '4586', '9182520644', 'n/a', 'B.Tech', 'CSE'),
('bgvfdsa', 'hgf,lkj,poi', '2024-02-15 ', 1, 1, 'r12', 'Regular', 5222222, '0', 5222222, 'jhgfdsz', '5', '3', 'hgfds', '9876543210', 'na', 'B.Tech', 'CSE'),
('20tr1a0592', 'cg,wt', '2024-02-16 ', 3, 1, 'r18', 'Supply', 500, '0', 500, 'prudvi', '2', '0', '5555', '9182520644', 'na', 'B.Tech', 'CSE'),
('20tr1a0592', 'm1,bee,chem,ap', '2024-02-16 ', 3, 2, 'r18', 'Regular', 800, '0', 800, 'prudvi', '4', '3', '5555', '9182520644', 'ap,chem,bee', 'B.Tech', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

  CREATE TABLE `user_login` (
    `Name` varchar(100) NOT NULL,
    `User_name` varchar(100) NOT NULL,
    `Password` varchar(100) NOT NULL,
    `Mob_no` varchar(11) NOT NULL,
    `status` varchar(50) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`Name`, `User_name`, `Password`, `Mob_no`, `status`) VALUES
('prudvi', 'prudvi', '1158', '9182520644', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD UNIQUE KEY `User_name` (`User_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
