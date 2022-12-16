-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kruca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(9, 'dk11', 'dekin1@gmail.com', '$2y$10$3LWDJEN/bEVeO1ZfBaw7ceLGxRnjHUcXlDVtD9QjpVULL2duz380a'),
(10, 'Brooks', 'pvsdevro@gmail.com', '$2y$10$fPNbasAVaBr1LNFPW8n8K.V1W.J7CwdajYlAwO5yAgnfsuOD1O66e'),
(11, 'Cynthia', 'vx@df.vom', '$2y$10$0bPlgVjd6KYW1KUmxVOm/.zCyHyYir5zp0U/qYiijuEBUy3xhtVO6');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `txtFrom` varchar(50) NOT NULL,
  `txt_to` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `txtFrom`, `txt_to`, `message`, `time`) VALUES
(108, '19', 'admin', 'hy', '2022-12-09 18:31:55'),
(109, 'admin', '19', 'How can we help you', '2022-12-09 18:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `fullName`, `phone`, `model_id`) VALUES
(16, 'James Miller', '123456', 46),
(17, 'Mavis Beacon', '303030', 46),
(18, 'King Moses', '024888', 38),
(19, 'moses', '2334565', 46),
(20, 'Malik Brown', '002211', 47);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `service` varchar(100) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `bodyType` varchar(100) NOT NULL,
  `MatchName` varchar(100) NOT NULL,
  `MatchNumber` varchar(50) NOT NULL,
  `amount` decimal(19,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `fullName`, `mobile`, `interest`, `description`, `service`, `age`, `gender`, `image`, `image2`, `bodyType`, `MatchName`, `MatchNumber`, `amount`) VALUES
(38, 'Cynthia Morgan', '02619888456', 'Dancing', 'i like cooking', 'Regular', '28', 'Female', 'avatar-0.jpg', 'avatar-3.jpg', 'Slim', 'King Moses', '024888', '50.00'),
(46, 'Sandras Banks Mira', '2336555223', 'hiking,dancing,Singing', 'good', 'Regular', '30', 'Female', 'darren-lawrence.jpg', 'jeferson-gomes.jpg', 'Thick,Slender', 'moses', '2334565', '500.00'),
(47, 'Kelly Brown', '030556985', 'Football', 'i like cooking', 'Regular', '24', 'Female', 'carlos-augusto.jpg', 'pexels-pixabay.jpg', 'Thick', 'Malik Brown', '002211', '500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
