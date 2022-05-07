-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 10:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `first_dose_done`
--

CREATE TABLE `first_dose_done` (
  `BirthCertificate` varchar(50) NOT NULL,
  `second_dose_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `first_dose_done`
--

INSERT INTO `first_dose_done` (`BirthCertificate`, `second_dose_date`) VALUES
('432hud29', '2022-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `fullyvaccinated`
--

CREATE TABLE `fullyvaccinated` (
  `BirthCertificate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fullyvaccinated`
--

INSERT INTO `fullyvaccinated` (`BirthCertificate`) VALUES
('432hud29');

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `BirthCertificate` varchar(50) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(50) NOT NULL,
  `phoneNum` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`BirthCertificate`, `UserID`, `userPassword`, `FullName`, `dateOfBirth`, `phoneNum`, `email`, `address`, `gender`) VALUES
('432hud29', 'niloy', '1234', 'niloy', '2022-05-26', '31233212', 'rafsnil@gmail.com', 'badda', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `second_dose_done`
--

CREATE TABLE `second_dose_done` (
  `BirthCertificate` varchar(50) NOT NULL,
  `boosterDoseDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `second_dose_done`
--

INSERT INTO `second_dose_done` (`BirthCertificate`, `boosterDoseDate`) VALUES
('432hud29', '2022-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `unvaccinated`
--

CREATE TABLE `unvaccinated` (
  `BirthCertificate` varchar(50) NOT NULL,
  `firstDoseDate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unvaccinated`
--

INSERT INTO `unvaccinated` (`BirthCertificate`, `firstDoseDate`) VALUES
('432hud29', '2022-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinecenter`
--

CREATE TABLE `vaccinecenter` (
  `centerID` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccinecenter`
--

INSERT INTO `vaccinecenter` (`centerID`, `name`, `address`) VALUES
('mirpur10', 'mirpur popular hospital', 'mirpur-6,house-13,dhaka'),
('mirpur14', 'mirpur dental', 'mirpur-14,house-11,near abul kasem road,dhaka'),
('mirpur2', 'mirpur heart foundation', 'mirpur-2,dhaka'),
('mirpur69', 'Iazdanul er basha', 'mirpur12'),
('shamoli01', 'ponggu hospital', 'shamaoli,beside shishu mela,dhaka'),
('sqaure04K', 'square hospital-kolabagan branch', 'plot-08,kolabagan,random road,dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `vaccineinfo`
--

CREATE TABLE `vaccineinfo` (
  `centerID` varchar(50) NOT NULL,
  `vaccineName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccineinfo`
--

INSERT INTO `vaccineinfo` (`centerID`, `vaccineName`) VALUES
('mirpur10', 'sinopharm'),
('mirpur14', 'Moderna'),
('mirpur2', 'Pfizer'),
('mirpur69', 'Shui '),
('shamoli01', 'Astrazeneca'),
('sqaure04K', 'sinopharm');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_appointment`
--

CREATE TABLE `vaccine_appointment` (
  `skID` int(11) NOT NULL,
  `BirthCertificate` varchar(50) DEFAULT NULL,
  `centerID` varchar(50) DEFAULT NULL,
  `vaccineName` varchar(50) DEFAULT NULL,
  `vaccineSchedule` varchar(50) DEFAULT NULL,
  `dose_order` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_appointment`
--

INSERT INTO `vaccine_appointment` (`skID`, `BirthCertificate`, `centerID`, `vaccineName`, `vaccineSchedule`, `dose_order`) VALUES
(7, '432hud29', 'mirpur10', 'sinopharm', '2022-05-03', '1'),
(8, '432hud29', 'mirpur10', 'sinopharm', '2022-05-04', '2'),
(9, '432hud29', 'mirpur10', 'sinopharm', '2022-05-05', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `first_dose_done`
--
ALTER TABLE `first_dose_done`
  ADD PRIMARY KEY (`BirthCertificate`);

--
-- Indexes for table `fullyvaccinated`
--
ALTER TABLE `fullyvaccinated`
  ADD PRIMARY KEY (`BirthCertificate`);

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`BirthCertificate`);

--
-- Indexes for table `second_dose_done`
--
ALTER TABLE `second_dose_done`
  ADD PRIMARY KEY (`BirthCertificate`);

--
-- Indexes for table `unvaccinated`
--
ALTER TABLE `unvaccinated`
  ADD PRIMARY KEY (`BirthCertificate`);

--
-- Indexes for table `vaccinecenter`
--
ALTER TABLE `vaccinecenter`
  ADD PRIMARY KEY (`centerID`);

--
-- Indexes for table `vaccineinfo`
--
ALTER TABLE `vaccineinfo`
  ADD PRIMARY KEY (`centerID`,`vaccineName`);

--
-- Indexes for table `vaccine_appointment`
--
ALTER TABLE `vaccine_appointment`
  ADD PRIMARY KEY (`skID`),
  ADD KEY `BirthCertificate` (`BirthCertificate`),
  ADD KEY `centerID` (`centerID`,`vaccineName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vaccine_appointment`
--
ALTER TABLE `vaccine_appointment`
  MODIFY `skID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `first_dose_done`
--
ALTER TABLE `first_dose_done`
  ADD CONSTRAINT `first_dose_done_ibfk_1` FOREIGN KEY (`BirthCertificate`) REFERENCES `registration_info` (`BirthCertificate`);

--
-- Constraints for table `fullyvaccinated`
--
ALTER TABLE `fullyvaccinated`
  ADD CONSTRAINT `fullyvaccinated_ibfk_1` FOREIGN KEY (`BirthCertificate`) REFERENCES `registration_info` (`BirthCertificate`);

--
-- Constraints for table `second_dose_done`
--
ALTER TABLE `second_dose_done`
  ADD CONSTRAINT `second_dose_done_ibfk_1` FOREIGN KEY (`BirthCertificate`) REFERENCES `registration_info` (`BirthCertificate`);

--
-- Constraints for table `unvaccinated`
--
ALTER TABLE `unvaccinated`
  ADD CONSTRAINT `unvaccinated_ibfk_1` FOREIGN KEY (`BirthCertificate`) REFERENCES `registration_info` (`BirthCertificate`);

--
-- Constraints for table `vaccineinfo`
--
ALTER TABLE `vaccineinfo`
  ADD CONSTRAINT `vaccineinfo_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `vaccinecenter` (`centerID`);

--
-- Constraints for table `vaccine_appointment`
--
ALTER TABLE `vaccine_appointment`
  ADD CONSTRAINT `vaccine_appointment_ibfk_1` FOREIGN KEY (`BirthCertificate`) REFERENCES `registration_info` (`BirthCertificate`),
  ADD CONSTRAINT `vaccine_appointment_ibfk_2` FOREIGN KEY (`centerID`,`vaccineName`) REFERENCES `vaccineinfo` (`centerID`, `vaccineName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
