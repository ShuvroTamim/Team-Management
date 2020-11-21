-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 08:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

CREATE TABLE `member_info` (
  `ID` int(10) NOT NULL,
  `Name` text NOT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Job` varchar(20) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Salary` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_info`
--

INSERT INTO `member_info` (`ID`, `Name`, `Image`, `Job`, `Description`, `Location`, `Salary`) VALUES
(10, 'Tamim Ahmed Shapon', '160561309343ea260706e1a3d3c49638793c39eba4.jpg', 'Web Developer', 'Have confidence in the truth, the existence, or the reliability of something, although without absolute proof that one is right in doing so: Only if one believes in something can one act purposefully.', 'Tangail', 75000),
(11, 'Tipu Sultan', '1605613113b6965decae43701c23754d09bd832cd6.jpg', 'Software Developer', 'Have confidence in the truth, the existence, or the reliability of something, although without absolute proof that one is right in doing so: Only if one believes in something can one act purposefully.', 'Mymensing', 74000),
(13, 'Mehedi Hasan Shaown', '16056244391dab0dd8645c94262eaa0578664772ba.jpg', 'SEO', '                                                                Have confidence in the truth, the existence, or the reliability of something, although without absolute proof that one is right in doing so: Only if one believes in something can one act purposefully.', 'Vola', 79000),
(14, 'Barkatgani Dostogir', '160579345129f46897d1dd451d49c74c48d7c2d20a.jpg', 'Computer Engineer', '                An agricultural engineer helps to make farming sustainable, safe, and environmentally friendly. How? By analyzing agricultural operations and looking at new technologies and ways of doing things to improve land use, increase yields, and conserve resources.', 'Dinajpur', 76000),
(15, 'Faruk Rana', '1605861386050d44b6f783fee3526949d5facd3fde.jpg', 'Pharmacist', 'Pharmacists, also known as chemists (Commonwealth English) or druggists (North American and, archaically, Commonwealth English), are health professionals who specialize in the use of medicines, as they deal with the composition, effects, mechanism of action and proper and effective use of drugs.', 'Noakhali', 83000),
(16, 'Neyamul Kabir Utsha', '16058632871dab0dd8645c94262eaa0578664772ba.jpg', 'Software Engineer', 'Software engineering treats the approach to developing software as a formal process much like that found in traditional engineering.  Software engineers begin by analyzing user needs. They design software, deploy, test it for quality and maintain it.', 'Tangail', 78000);

-- --------------------------------------------------------

--
-- Table structure for table `reg_info`
--

CREATE TABLE `reg_info` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_info`
--

INSERT INTO `reg_info` (`id`, `name`, `email`, `image`, `password`, `confirm_password`) VALUES
(1, 'Tamim Ahmed Shapon', 'tamimahmed357@gmail.com', '160563718543ea260706e1a3d3c49638793c39eba4.jpg', '12qwas', '12qwas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_info`
--
ALTER TABLE `member_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reg_info`
--
ALTER TABLE `reg_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_info`
--
ALTER TABLE `member_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reg_info`
--
ALTER TABLE `reg_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
