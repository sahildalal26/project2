-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2025 at 07:58 AM
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
-- Database: `g03`
--
CREATE DATABASE IF NOT EXISTS `g03`;
USE `g03`;

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference` varchar(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `suburb` varchar(40) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference`, `first_name`, `last_name`, `date_of_birth`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`, `status`, `created_at`) VALUES
(1, 'RA102', 'Caitlyn', 'Alice', '12/07/1998', 'Female', '1 Murphy St', 'Greenwoods Valley', 'WA', '6405', 'caitlyn.alice@example.com', '0412345678', 'HTML, CSS, JavaScript', 'Excellent with responsive web design', 'New', '2025-10-21 05:34:50'),
(2, 'LXD27', 'Skye', 'Appleroth', '03/08/1996', 'Female', '48 Souttar Drive', 'Duncraig', 'WA', '6023', 'skye.appleroth@example.com', '0405123123', 'HTML, CSS, PHP', 'Strong teamwork and UX design experience', 'New', '2025-10-21 05:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(120) NOT NULL,
  `salary_min` int(11) DEFAULT NULL,
  `salary_max` int(11) DEFAULT NULL,
  `reports_to` varchar(120) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_requirements` text DEFAULT NULL,
  `preferable_requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_ref`, `title`, `salary_min`, `salary_max`, `reports_to`, `description`, `responsibilities`, `essential_requirements`, `preferable_requirements`) VALUES
('DSL45', 'Digital Learning Support Lead', 70000, 82000, 'Manager, Learning Technologies', 'Coordinate frontline support for our suite of learning technologies, ensuring academics and students have seamless digital learning experiences.', 'Lead a support team handling LMS, video, and analytics tools.|Document knowledge base articles and process improvements.|Escalate incidents and maintain service level agreements.|Deliver onboarding sessions for new digital platforms.', 'Experience supporting enterprise learning technologies.|Strong stakeholder communication and problem solving skills.', 'ITIL certification or equivalent service management experience.|Exposure to scripting or automation for process efficiency.'),
('LXD27', 'Learning Experience Designer', 82000, 94000, 'Director of Digital Learning Innovation', 'Partner with academic teams to architect inclusive, research-informed curricula, blending pedagogy, multimedia production, and user-focused design.', 'Facilitate design sprints that convert learning goals into engaging digital experiences.|Prototype multimedia assets and interactive learning activities.|Coach academic staff on technology-enhanced teaching practices.|Evaluate learning impact through analytics and user feedback.', 'Qualification in Education, Learning Design, or similar.|Portfolio demonstrating inclusive digital learning design.', 'Familiarity with LMS platforms and accessibility guidelines (WCAG).|Experience with rapid prototyping tools (Figma, Articulate 360).'),
('RA102', 'Research Analyst', 78000, 90000, 'Head of Research Services', 'Support academic leaders by translating learning data into evidence based recommendations that improve student outcomes and research effectiveness.', 'Collect, model, and visualise student learning data sets.|Design evaluation frameworks for digital learning pilots.|Produce accessible reports for executive stakeholders.|Maintain secure data repositories and governance practices.', 'Degree in Data Science, Statistics, or Learning Analytics.|Experience with SPSS, R, or Python for statistical modelling.', 'Knowledge of higher education research practices.|Ability to communicate complex findings to non technical audiences.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
