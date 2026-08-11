-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 06:57 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `likes` bigint(20) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `file_name`, `title`, `category`, `image_path`, `content`, `likes`, `created_at`) VALUES
(1, 12, 'IMG_6a69de54ed3102.87158791.png', 'Qui doloremque qui i', 'Science', 'uploads/IMG_6a69de54ed3102.87158791.png', 'Voluptatem saepe inc', 0, '2026-07-29'),
(2, 15, 'IMG_6a6a1ad20a92a5.80604594.png', 'Neque impedit adipi', 'Other', 'uploads/IMG_6a6a1ad20a92a5.80604594.png', 'dfnaklg aiaero eui tot oru toau tweet uyaerfhjakahgiuar rag  gr thr rr hh harg arhgu hrg hr hhgoraeghrug ore graehrgreg ahfha ufajk hgu uuru hua rgfah gu ygvjkcxv nuervihvuytgfh njhvp9re v g99 aerydfnaklg aiaero eui tot oru toau tweet uyaerfhjakahgiuar rag  gr thr rr hh harg arhgu hrg hr hhgoraeghrug ore graehrgreg ahfha ufajk hgu uuru hua rgfah gu ygvjkcxv nuervihvuytgfh njhvp9re v g99 aerydfnaklg aiaero eui tot oru toau tweet uyaerfhjakahgiuar rag  gr thr rr hh harg arhgu hrg hr hhgoraeghrug o', 0, '2026-07-29'),
(3, 13, 'IMG_6a6aed69e61e04.46027848.png', 'Voluptate aut est op', 'Science', 'uploads/IMG_6a6aed69e61e04.46027848.png', 'Ut minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis eaUt minim sit quis ea', 0, '2026-07-30'),
(4, 13, 'IMG_6a6ec05418c159.73283771.jpg', 'Fuga Ut amet dolor', 'Other', 'uploads/IMG_6a6ec05418c159.73283771.jpg', 'Eum ea tempor modi e', 0, '2026-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(10, 'McKenzie Walters', 'hojana@mailinator.com', '$2y$10$WWi/MLMhXKTO.WyFUvPmgu6B9/j8cvgXyuta2cZ43UO9pL9KThIQ.'),
(11, 'Hedda Brewer', 'guwecumih@mailinator.com', '$2y$10$vDEFDxax16Xui9kYSknX1.Rjdcu/yuHcumZ0JEon5aLSnZCJ/nZcy'),
(12, 'Leandra Pace', 'doci@mailinator.com', '$2y$10$1qD3Eji/wdjGtj6loCdE/.CAIRdb7uisTjLuLXLvil.jVG6n181Tu'),
(13, 'Abdullah Ali', 'jdifn@gmail.com', '$2y$10$CYNPFhMh68iLRfoupKqvOuKybqqtUKd/36JnkqVWt2BuZl6S68IOy'),
(14, 'Clare Blanchard', 'jecavuc@mailinator.com', '$2y$10$FH/kAT.29dKXSwPnuAdygOIbYE0.QOu/0kTUTPTEbUjL9VI6L3hI2'),
(15, 'Herrod Cunningham', 'fujosudibo@mailinator.com', '$2y$10$1/pSwy149rcaylEWqmfC0OXAJDbnqCVCRO/9RTH060Mi.bDrWCZsq'),
(16, 'Dara Blake', 'raxeqikuc@mailinator.com', '$2y$10$AvX/6E9IYz0fw/ht7jrBy.4pNkMbLZeO9ytjo41IOX/.FIJCBfHyS'),
(17, 'Anastasia Fowler', 'jaxuqide@mailinator.com', '$2y$10$IC0ykofRBBZjJdQMCjt6oe1ubMABbQTY4BNH4HePvuz31yttlrrly'),
(18, 'gjdy', 'jdifnfhsry@gmail.com', '$2y$10$3135ofqOZEGJ.JXELnGjEOGLxLNzrWPQ1m3By/V0kWjJp2PtjkcoO'),
(19, 'Catherine Knight', 'sapunexu@mailinator.com', '$2y$10$MTNl/ew/jqobH5wGhDE53O7CoR0/j.HuZYFGTcmlJcIpCmH0QshaW'),
(20, 'Steel Whitaker', 'zefikyqol@mailinator.com', '$2y$10$fRn.akG5d8o5C3vfXJsH6OGzC4uOJ9OGvzsUa6iJY.Jg8bt7.KyQq'),
(21, 'Walter Bradley', 'wejoxivyla@mailinator.com', '$2y$10$JDZfh3bXtNfiP98Q35SMBO3a26MQf4/KSLl2Z.iHR/aS903bniQ4W'),
(22, 'Demetrius Cooke', 'jdifn74@gmail.com', '$2y$10$It8vrQQBVrf5kNAkWRGN/e1NVOTXlI1LW6avL7X0J1T69o35KVxRS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
