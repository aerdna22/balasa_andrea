-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:04 PM
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
-- Database: `andrea_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutme`
--

CREATE TABLE `tbl_aboutme` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_aboutme`
--

INSERT INTO `tbl_aboutme` (`id`, `image`, `description`) VALUES
(4, 'img_792.jpg', 'Proficient in PHP and HTML at an intermediate level, I have a knack for developing visually appealing and functional websites. I pay close attention to every detail to ensure that the websites I create not only look great but also perform seamlessly. Apart from my technical skills, I have a keen interest in photography. I use my photography abilities to capture meaningful moments and convey stories, adding an extra layer of creativity to my work.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '1234'),
(3, 'andreabalasa02@gmail.com', 'balasa22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `email`, `phone`) VALUES
(4, 'andreabalasa02@gmail.com', '09158402776');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `image`, `school`, `description`, `year`) VALUES
(9, 'img-2662.png', 'WESTERN MINDANAO STATE UNIVERSITY', 'Completed Bachelor of Science in Information Technology at WMSU, Baliwasan, Zamboanga City', '2020 – 2024'),
(10, 'educ_939.jpg', 'DON PABLO LORENZO MEMORIAL HIGH SCHOOL', 'Completed Junior High School and Senior High School at DPLMHS and DPLMHS Stand-Alone Senior High School, Gov.Ramos, Sta. Maria, Zamboanga City.', '2014 – 2020'),
(11, 'educ_909.png', 'CATALINA VD. DE JALON MEMORIAL SCHOOL', 'Graduated from Catalina Vd. De Jalon Memorial School, Tumaga, Zamboanga City.', ' 2008 – 2014');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hero`
--

CREATE TABLE `tbl_hero` (
  `id` int(11) UNSIGNED NOT NULL,
  `hero_Name` varchar(250) NOT NULL,
  `hero_Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hero`
--

INSERT INTO `tbl_hero` (`id`, `hero_Name`, `hero_Description`) VALUES
(2, 'Andrea Joy L. Balasa', 'WEB DEVELOPER/ UX DESIGNER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `project_Image` varchar(500) NOT NULL,
  `project_Name` varchar(500) NOT NULL,
  `project_Desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `project_Image`, `project_Name`, `project_Desc`) VALUES
(8, 'project_563.png', 'CODE CONNECT STUDIES (CCS): COMPUTER SYSTEM SERVICING THROUGH 3D MODEL PLATFORM', 'The CodeConnectStudies (CCS) Computer System Servicing program focuses on equipping learners with the skills needed to diagnose and resolve computer issues efficiently. By leveraging e-learning methods, participants gain theoretical knowledge in hardware troubleshooting and system maintenance, enhancing their ability to address common computer problems and optimize system performance.'),
(9, 'project_456.png', 'AO Facility Reservation and Management System', 'The Administration Office at Western Mindanao State University faces challenges with informal facility reservations, leading to difficulties in tracking requests manually. To address this, a web-based Facility Reservation System has been developed exclusively for the Office of the Director for Administration (ODA), streamlining the reservation process and simplifying monitoring and tracking of event details and requisitions.'),
(10, 'project_215.png', 'CYBER+', 'At Cyber+, embark on thrilling digital gaming journeys. Explore a diverse range of e-games, spanning from adrenaline-pumping action titles to captivating simulations. Our platform ensures hassle-free navigation and safe transactions, providing gamers with a smooth shopping journey and access to a galaxy of virtual thrills.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id` int(11) UNSIGNED NOT NULL,
  `skill` varchar(250) NOT NULL,
  `skill_Description` varchar(250) NOT NULL,
  `skill_Level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id`, `skill`, `skill_Description`, `skill_Level`) VALUES
(15, 'PHP', 'Skilled in PHP, I develop dynamic web apps with database management and API integration.', 'Intermediate'),
(16, 'HTML', 'Intermediate HTML skill; adept in web development.', 'Intermediate'),
(17, 'PHOTOGRAPHY', 'Talented photographer with versatile abilities.', 'Intermediate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutme`
--
ALTER TABLE `tbl_aboutme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutme`
--
ALTER TABLE `tbl_aboutme`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
