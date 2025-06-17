-- phpMyAdmin SQL Dump
-- version 5.2.2-1.el9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2025 at 06:27 AM
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
-- Table structure for table `art_pieces`
--

CREATE TABLE `art_pieces` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `art_pieces`
--

INSERT INTO `art_pieces` (`id`, `title`, `price`, `description`, `image`) VALUES
(1, 'Ocean Dreams', 610.00, 'The calming waves of the deep blue sea.', 'piece1.jfif'),
(2, 'Mystic Forest', 450.00, 'A mysterious forest painted in deep greens.', 'piece2.jfif'),
(3, 'Art', 100.00, 'A surreal dreamscape where melting clocks symbolize the fluidity and unreliability of time.', 'piece3.jfif'),
(13, 'The Starry Night', 2300.00, 'Swirling night sky over a quiet village.', '6809c1da501ae.jpg'),
(14, 'Girl with a Pearl Earring', 1100.00, 'Captivating gaze of a young woman.', '6809d4eb3c8c1.jpg'),
(15, 'The Kiss', 1699.00, 'Ornate depiction of a couple&#39;s embrace.', '6809d5216dbb0.jpg'),
(16, 'The Great Wave off Kanagawa', 1298.98, 'Iconic Japanese woodblock print depicting a towering wave threatening boats near Mount Fuji.&#13;&#10;', '6809d59ec3597.jpg'),
(17, 'Impr​ession, Sunrise', 1399.00, 'The painting that gave Impressionism its name, showcasing a hazy sunrise over Le Havre harbor.', '6809d5dfaffe9.jpg'),
(18, 'The Birth of Venus', 2199.00, 'Renaissance masterpiece portraying the goddess Venus emerging from the sea on a shell.', '6809d6124d2a0.jpg'),
(19, 'The Night Watch', 1349.00, 'A dynamic group portrait of a city militia, renowned for its dramatic use of light and shadow', '6809d6e894ea4.jpg'),
(20, 'The Hay Wain', 1119.00, 'A quintessential English landscape depicting a rural scene with a cart crossing a river.&#13;&#10;', '6809d72ad7cb2.jpg'),
(21, 'Jaune Rouge Bleu', 1999.00, '​A dynamic composition of primary colors and geometric forms, illustrating the balance between structured geometry and expressive abstraction.', '6809d8744f4f1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_pieces`
--
ALTER TABLE `art_pieces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_pieces`
--
ALTER TABLE `art_pieces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
