-- phpMyAdmin SQL Dump
-- version 5.2.2-1.el9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2025 at 06:26 AM
-- Server version: 9.1.0-commercial
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singh84_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `aboutMe` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `myStory` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `artistStatement` mediumtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`aboutMe`, `myStory`, `artistStatement`) VALUES
('Welcome to my world of colors, textures, and emotions. My art is a reflection of my journey, my dreams, and the stories I wish to tell.', 'vincent van Gogh (1853-1890) was a Dutch Post-Impressionist painter known for his expressive use of color, bold brushstrokes, and emotional intensity. Despite struggling with mental health and financial hardship, he created over 2,000 artworks, including iconic pieces like Starry Night, Sunflowers, and Café Terrace at Night. His work, initially overlooked, later became some of the most celebrated in art history, influencing generations of artists. Despite struggling with mental health and financial hardship, he created over 2,000 artworks, including iconic pieces like Starry Night, Sunflowers, and Café Terrace at Night. His work, initially overlooked,\r\nlater became some of the most celebrated in art history, influencing generations of artists.', '\"My art is a  window into the soul—an expression of the beauty, vibrant fields, and expressive portraits, I seek to capture the movement of life and the depths of feeling. I believe that art should be more than an image; it should be a reflection of the heart and a light in the darkness.\"');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
