-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:28 PM
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
-- Database: `gnbdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `repairshops`
--

CREATE TABLE `repairshops` (
  `ID` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_No` varchar(20) NOT NULL,
  `About` varchar(255) NOT NULL,
  `Image` blob NOT NULL,
  `IDImage` blob NOT NULL,
  `ImageOne` blob NOT NULL,
  `ImageTwo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repairshops`
--

INSERT INTO `repairshops` (`ID`, `Email`, `Name`, `Address`, `Contact_No`, `About`, `Image`, `IDImage`, `ImageOne`, `ImageTwo`) VALUES
(1, 'bengcopatrick036@gmail.com', 'practice lets goo', 'manibaug, porac, babo robot', '09898788997', 'asdasd', 0x50726f66696c652e6a7067, 0x696d67312e6a7067, 0x52657061697253686f702e6a7067, 0x47656e6572616c20417373656d626c792e6a7067),
(2, 'test@gmail.com', 'practice lets goo', 'manibaug, porac, babo robot', '09898788997', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 0x494d475f393830342e77656270, 0x47656e6572616c20417373656d626c792e6a7067, 0x6173646464642e6a7067, 0x6173646173642e6a7067),
(3, 'bengcopatrick036@gmail.com', 'practice lets goo', 'manibaug, porac, babo robot', '09898788997', 'asdasd', 0x494d475f393830342e77656270, 0x47656e6572616c20417373656d626c792e6a7067, 0x6173646464642e6a7067, 0x43686f6f73792e6a7067),
(4, 'test@gmail.com', 'safe measure', 'manibaug, porac, babo robot', '09898788997', 'asdasd', 0x494d475f393830342e77656270, 0x64393234623061386239333033636531376532376330626563666536396263382e6a706567, 0x6173646173642e6a7067, 0x612e6a7067),
(5, 'bengcopatrick036@gmail.com', 'practice lets goo', 'manibaug, porac, babo robot', '09898788997', 'asdasd', 0x494d475f393830342e77656270, 0x64393234623061386239333033636531376532376330626563666536396263382e6a706567, 0x756e6e616d65642e6a7067, 0x43686f6f73792e6a7067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
