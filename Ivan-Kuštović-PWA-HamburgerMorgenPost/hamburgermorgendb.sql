-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 09:25 PM
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
-- Database: `hamburgermorgendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `shortContent` text NOT NULL,
  `content` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `image`, `title`, `shortContent`, `content`, `category`, `published_at`) VALUES
(2, 'image2.jpeg', 'Champion\'s Comeback', 'An inspiring story of a sports champion\'s return.', 'After a year of recovery and intense training, the world-renowned athlete has made a triumphant return to the arena. This heartwarming story captures the trials and triumphs of the champion as they overcome personal and professional hurdles. Witness the dedication and perseverance that led to their remarkable comeback, inspiring fans and fellow athletes around the globe. The athlete\'s journey is a testament to their resilience and determination, providing a source of motivation for many. This detailed account offers insights into their daily routines, mental fortitude, and the support network that played a crucial role in their recovery.', 'Tech', '2024-06-09 23:23:34'),
(3, 'image4.jpg', 'Celebrity Scandals Unveiled', 'The latest gossip from the entertainment industry.', 'The entertainment world is never short of drama, and this week is no exception. From surprise breakups to shocking revelations, we uncover the most sensational scandals that have rocked Hollywood. Get an inside look at the lives of your favorite celebrities and the controversies that have captured headlines. This article provides an in-depth analysis of the events and their impact on the stars and their fans. It also explores how these scandals affect the celebrities\' careers and public perceptions, and what it means for the entertainment industry as a whole. We delve into the background stories and future implications for those involved.', 'Show', '2024-06-09 23:23:34'),
(4, 'image4.1.jpeg', 'Green Energy Solutions', 'How renewable energy is changing the world.', 'As the world grapples with climate change, renewable energy sources are becoming more crucial than ever. This article explores the latest advancements in green energy solutions, from solar and wind power to innovative battery technologies. Discover how these sustainable alternatives are reducing carbon footprints and promoting a cleaner, greener planet. Learn about the challenges and opportunities in the renewable energy sector. We also discuss the economic and policy changes necessary to support the widespread adoption of green energy. Experts weigh in on the future of energy and what we can do to accelerate the transition.', 'Tech', '2024-06-09 23:23:34'),
(5, 'image5.avif', 'Epic Football Finals', 'A recap of the most thrilling football match of the year.', 'The grand finale of the football season brought fans to the edge of their seats as two powerhouse teams faced off in an unforgettable match. This article recaps the key moments, standout performances, and pivotal plays that defined the game. Relive the excitement of the last-minute goals and the dramatic saves that kept everyone guessing until the final whistle. We also provide post-match analysis from experts and interviews with the players and coaches. This detailed account captures the emotions and strategies that made this final a true spectacle, leaving fans eagerly anticipating next season.', 'Sport', '2024-06-09 23:23:34'),
(6, 'image6.jpeg', 'Breakthroughs in Medical Research', 'New discoveries that could change healthcare.', 'The medical research community has made significant strides in recent months, unveiling groundbreaking discoveries that could revolutionize healthcare. This article highlights the most promising advancements, from new cancer treatments to innovative surgical techniques. Learn about the scientists behind these discoveries and the potential impact on patients\' lives. We also explore the challenges faced in bringing these innovations to market and the ongoing research needed to ensure their success. This comprehensive overview provides a glimpse into the future of medicine and the hope it brings for millions of patients worldwide.', 'Tech', '2024-06-09 23:23:34'),
(7, 'image7.webp', 'Olympic Dreams', 'Stories of athletes striving for gold.', 'As the Olympics approach, athletes from around the world are training harder than ever to achieve their dreams of winning gold. This article shares the inspiring stories of several athletes, detailing their rigorous training regimens, personal sacrifices, and unwavering dedication. Discover what drives these individuals to excel in their respective sports and the obstacles they have overcome. We also look at the support systems in place, including coaches, family, and friends, who play a vital role in their journey. These stories highlight the spirit of the Olympics and the pursuit of excellence that unites athletes globally.', 'Sport', '2024-06-09 23:23:34'),
(8, 'image8.jpeg', 'Fashion Week Highlights', 'The most memorable moments from fashion week.', 'Fashion Week never fails to bring excitement, and this season was no exception. From stunning runway shows to groundbreaking designs, this article covers the highlights of the event. Discover the trends that dominated the catwalk and the designers who made a lasting impression. We also delve into the behind-the-scenes action, providing a glimpse into the world of fashion. Interviews with top designers, models, and industry insiders offer insights into the creative process and the future of fashion. This comprehensive coverage ensures you won\'t miss any of the key moments from this glamorous event.', 'Show', '2024-06-09 23:23:34'),
(9, 'image9.jpeg', 'The Future of Work', 'How technology is reshaping the workplace.', 'The workplace is undergoing a transformation as technology continues to advance. This article explores how AI, automation, and remote work are changing the way we work. Learn about the benefits and challenges of these changes and what they mean for employees and employers. We also look at the skills needed for the future workforce and how individuals can prepare for these shifts. Expert opinions provide valuable insights into the trends shaping the future of work and the opportunities they present. This in-depth analysis helps readers understand the evolving landscape of the workplace and how to navigate it successfully.', 'Tech', '2024-06-09 23:23:34'),
(10, 'image10.jpeg', 'Marathon Journey', 'A runner\'s quest to complete a marathon.', 'Completing a marathon is no small feat, and this article follows the journey of a dedicated runner striving to achieve this goal. From the initial decision to the final race day, we chronicle the ups and downs of their training regimen. Discover the physical and mental challenges faced and the strategies used to overcome them. The runner\'s story is one of perseverance, determination, and the pursuit of a personal milestone. Interviews with coaches and fellow runners provide additional perspectives on the marathon experience. This article offers inspiration and practical advice for anyone considering taking on a marathon.', 'Sport', '2024-06-09 23:23:34'),
(11, 'image11.jpeg', 'Behind the Scenes of a Hit Show', 'An inside look at the making of a popular TV show.', 'Ever wondered what goes into making your favorite TV show? This article takes you behind the scenes, revealing the hard work and creativity involved in producing a hit series. From the writers\' room to the set, discover the processes and people that bring the show to life. Interviews with cast and crew members provide unique insights into their roles and experiences. Learn about the challenges faced during production and the moments of triumph that make it all worthwhile. This comprehensive look behind the scenes offers a new appreciation for the art and effort involved in creating compelling television.', 'Show', '2024-06-09 23:23:34'),
(12, 'image12.jpeg', 'Advances in Space Exploration', 'The latest milestones in space missions.', 'Space exploration continues to captivate our imagination, and recent advancements have brought us closer to new frontiers. This article highlights the latest milestones in space missions, from Mars rovers to lunar landers. Discover the technological innovations driving these missions and the scientific discoveries they have enabled. We also explore the future of space exploration, including planned missions and the potential for human settlement on other planets. Interviews with leading scientists and engineers provide insights into the challenges and opportunities in space exploration. This article offers a glimpse into the exciting future of our quest to explore the cosmos.', 'Tech', '2024-06-09 23:23:34'),
(13, 'image13.jpeg', 'Underdog Victory', 'A surprising win in the world of sports.', 'In a thrilling turn of events, an underdog team has defied the odds to claim victory in a major sports tournament. This article recounts the journey of the team, from their humble beginnings to their unexpected triumph. Learn about the key players, pivotal moments, and strategies that led to their success. The story of this underdog victory is one of resilience, teamwork, and the belief that anything is possible. We also explore the impact of their win on the sports community and the inspiration it provides to aspiring athletes. This detailed account captures the excitement and emotion of a true Cinderella story.', 'Sport', '2024-06-09 23:23:34'),
(14, 'image8.png', 'Naslov ', 'Clanak', 'Clanak1', 'Sport', '2024-06-10 18:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor') NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$.yCMP4cb9SnPqCUOmZe3fOPvm7ZQhMxLCeCBG4dJ7j9LrsE9EDr6i', 'admin'),
(8, 'editor', '$2y$10$sB7.QKDhuL.p/.pO1t2UuOSfPI/5FYTwzeVZdArjul1hMYj8EFzV.', 'editor'),
(9, 'korisnik', '$2y$10$YC3If9jeR9TgFILTvytAMu2yBt4SP3RDdAlxbCpxxDCYoBhPzzQDm', 'editor'),
(13, 'ivan1', '$2y$10$iAW0bhO//CL0Ct6E9hywvOlZwpi6p43lE.S9y.BbHqdzlrMRk2lBK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
