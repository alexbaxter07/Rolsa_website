-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 07:32 PM
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
-- Database: `rolsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `made_on` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `date`, `made_on`, `user_id`, `staff_id`, `type`) VALUES
(13, 1744635600, 1743669981, 1, 9, 'solar'),
(14, 1745247600, 1743670008, 1, 9, 'hems'),
(15, 1745239800, 1743670033, 1, 11, 'solar'),
(16, 1745845200, 1743670052, 1, 11, 'hems'),
(17, 1745333220, 1743670068, 1, 14, 'ev'),
(18, 1745935680, 1743670080, 1, 14, 'solar'),
(19, 1746542880, 1743670091, 1, 15, 'solar'),
(20, 1745855280, 1743670103, 1, 5, 'solar'),
(21, 1745938080, 1743670120, 1, 5, 'solar'),
(44, 1745923200, 1745945322, 6, 9, 'solar');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `s_email` text NOT NULL,
  `password` text NOT NULL,
  `signup_date` int(11) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `postcode` text NOT NULL,
  `city` text NOT NULL,
  `s_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `s_email`, `password`, `signup_date`, `address_line_1`, `address_line_2`, `postcode`, `city`, `s_type`) VALUES
(1, 'Gerry', 'Cinnamon', 'gerry.cinnamon@rtechnologies.com', '$2y$10$bHwJztGvWeipgoopT7NrUOdSD0Wo.hzgOEAyXlwpUQhfkAQ7f0zRe', 1743588980, '', ' ', 'LS10 1LA', 'Leeds', 'admin'),
(2, 'Jonny', 'Yerrell', 'jonny.yerrell@rtechnologies.com', '$2y$10$/QCua/cslt78Xn3GvRwzTOzYaQJmgT8bYsrt7zlt/T7pZ4FwL298u', 1743589108, 'Cottingley', ' ', 'BD161TJ', 'Bradford', 'con'),
(3, 'Alex', 'Turner', 'alex.turner@rtechnologies.com', '$2y$10$Wiqor9AYyc1Keuwh6E5k8usoIOhGckwAQJbptkWAjjjFdnLwL2Wvm', 1743590487, 'Cottingley', ' ', 'BD161TJ', 'Bradford', 'ins'),
(4, 'Avril', 'Lavigne', 'avril.lavigne@rtechnologies.com', '$2y$10$SJV0Dxg8my9Op.VN9dTZ3OsWzSpVFuEqvGmT5MX0ce/epHiVSpnT6', 1743668889, 'Hunslet', ' ', 'LS10 1LA', 'Leeds', 'admin'),
(5, 'Robbie', 'Williams', 'robbie.williams@rtechnologies.com', '$2y$10$aeb6kemEj53BMWUMbR9cSuznCwc7SRL30FwFb7McWkfjODXZdeqJW', 1743669068, 'Hunslet', ' ', 'LS10 1LA', 'Leeds', 'ins'),
(6, 'Graham', 'McPherson', 'greyham.mcpherson@rtechnologies.com', '$2y$10$92ybHJhCaqV5d2L6Tsnk8OcgLpp6D5S9kxmVADkNg6npx1sa8FKF6', 1743669234, 'Cottingley', ' ', 'BD161TJ', 'Bradford', 'con'),
(7, 'Jamie', 'Webster', 'jamie.webster@rtechnologies.com', '$2y$10$eECaUZN7Pw0bS8cXQuGtte/r6J7KYIr0wA53bSyZ1DPxo5PyDkyGe', 1743669336, 'Cottingley', ' ', 'BD161TJ', 'Bradford', 'ins'),
(8, 'Dexter', 'Holland', 'dexter.holland@rtechnologies.com', '$2y$10$.GNOGnPpONoaIfhYHhdaVe3ciFLLttH.z59Fvry1hGRV879ki/k42', 1743669534, 'Hunslet', ' ', 'LS10 1LA', 'Leeds', 'con'),
(9, 'Doug', 'Thompson', 'doug.thompson@rtechnologies.com', '$2y$10$9m7AedcJDMN5NHnt0KD8x.9kklJQU.8.e6KHnW0oSCawlqA8LmWWe', 1743669580, 'Hunslet', ' ', 'LS10 1LA', 'Leeds', 'ins'),
(10, 'Caity', 'Baser', 'caity.baser@rtechnologies.com', '$2y$10$DJvZUDzrV10VLhSNlApGzeZ/hUp7nIgXvQFeRXp0/jbZ4ypqJkUuK', 1743669644, '', ' ', 'BD161TJ', 'Bradford', 'ins'),
(11, 'Patrick', 'Stump', 'patrick.stump@rtechnologies.com', '$2y$10$.uf5m5wjsbDrTJrtk.SdZudrqc2PUPswhgcifiKZz2c20B9EwZDay', 1743669751, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(12, 'Marshall', 'Mathers', 'marshall.mathers@rtechnologies.com', '$2y$10$80cAWcNIxmeFv.7MWXgfved1q0yRGoEMJD9LRbpfjOUvjrV88Lf1O', 1743669917, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(13, 'Becky', 'Hill', 'becky.hill@rtechnologies.com', '$2y$10$q5wty8w8UZZNmFKsRSoNWusJQti174JRAl0ZVbUnVLCjBtQeyLfCO', 1743672964, '', ' ', 'BD161TJ', 'Bradford', 'ins'),
(14, 'Sabrina', 'Carpenter', 'sabrina.carpenter@rtechnologies.com', '$2y$10$adloFLqeYNuUNf1fnDrm0Ooif46N3DAL9WMU0DzqQTQSfvMCJQM9O', 1743673010, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(15, 'Olivia', 'Rodrigo', 'olivia.rodrego@rtechnologies.com', '$2y$10$cgmCLJf1/RqxuUxX8TfyoelnLeq9seud9rh9gJfLwZltRFp9TMcKG', 1743673054, '', ' ', 'BD161TJ', 'Bradford', 'ins'),
(16, 'Billie', 'Armstrong', 'billie.armstrong@rtechnologies.com', '$2y$10$6Jf6edbL.h0fiAlr/fH5k.X5melEQxOIRsrmy8Y0srizWQxgC00vO', 1743673114, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(17, 'Dolly', 'Parton', 'dolly.parton@rtechnologies.com', '$2y$10$V7OCvAlv/hlbVJbZRMMRqu4FTDFgLC1m8LkDpM47JyoOrnrRIf/1C', 1743754021, '', ' ', 'LS10 1LA', 'Leeds', 'ins'),
(18, 'Trace', 'Adkins', 'trace.adkins@rtechnologies.com', '$2y$10$WTpHsmYldPNcLHxXBI6a2.Gk4R3dnTYz1g3i/Lrs3VtYM8tJvj7Yy', 1743754096, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(19, 'Luke ', 'Combs', 'luke.combs@rtechnologies.com', '$2y$10$2LaYhk7kZuLx8Oc3JDzHyOwBQkrueLAVi9NcixvD4FIOezDeguglu', 1743754148, '', ' ', 'BD161TJ', 'Bradford', 'ins'),
(20, 'Miranda', 'Lambert', 'miranda.lambert@rtechnologies.com', '$2y$10$PS0GqDLJxF3mnQgR7rsl2O5Lo2r.iUbCPsdu1I.kqVvN4./4ZC5IC', 1743754199, '', ' ', 'BD161TJ', 'Bradford', 'con'),
(21, 'Carrie', 'Underwood', 'carrie.underwood@rtechnologies.com', '$2y$10$wGusmT55CwphPpQmgldBwOCRzk.kEsj87FD1Oy/RbZBBLx01UFuly', 1743754237, '', ' ', 'BD161TJ', 'Bradford', 'ins'),
(22, 'Megan', 'Trainer', 'megan.trainer@rtechnologies.com', '$2y$10$Cx0X7nGJ4XgkpAB.OYCWF.pxEsjvyNTIkuoFRq.4uOytqWNCk000q', 1743754273, '', ' ', 'BD161TJ', 'Bradford', 'admin'),
(23, 'billy', 'joel', 'billy.joel@rtechnologies.com', '$2y$10$qh.H.cd9rE..KZvGhRhgBuPLY1JJauL3J1vR9AuY5Df97qR7Ud4bq', 1745945653, '', ' ', 'bd16 1rd', 'Bradford', 'ins');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `signup_date` int(11) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `postcode` text NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `signup_date`, `address_line_1`, `address_line_2`, `postcode`, `city`) VALUES
(1, 'Adam', 'sandler', 'adam.sandler@gmail.com', '$2y$10$gG8wBhFWewerUjiR8FneSOqhEcE.oKX5cwF6BRl0oWDkjUMHqorr6', 1743159792, '', ' ', 'LS10 1LA', 'Leeds'),
(2, 'John', 'Nolan', 'john.nolan@gmail.com', '$2y$10$o54GkT/v61iMKa7WnWTg8Og9.FYP/J/te3muiLuv3.GqXMCe3UUi.', 1743159877, '', ' ', 'LS10 1LA', 'Leeds'),
(3, 'Sam', 'Winchester', 'sam.winchester@gmail.com', '$2y$10$aCgA.dccl8wEYG2QLxhko.XnHgq/PD4Yo3m876eym8JT2CCa6dVge', 1743673226, 'Airedale Avenue', 'Cottingley', 'BD161TH', 'Bradford'),
(6, 'Ryan', 'Downing', 'BradfordCity@g.c', '$2y$10$wY.SCZ2dJ9ra16vldwDKyuN/5b/nN0qm0nnIez5gOxBcYczYUj.xq', 1745945138, 'spongebobhouse', ' ', 'Bd73qbs', 'Bradford');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`,`staff_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
