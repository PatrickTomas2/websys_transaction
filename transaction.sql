-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaction`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `blog_id`, `username`, `comment`, `comment_date_time`) VALUES
(1, 1, 'Patrick143', 'Agree, Bali is such a nice place.', '2023-11-12 15:58:58'),
(2, 1, 'user2', 'ohh Bali is so beautiful.', '2023-11-12 16:16:41'),
(3, 3, 'Gerald1001', 'Wow! Very informative...', '2023-11-12 21:28:53'),
(5, 4, 'Robin0987', 'The practical budgeting tips and investment strategies have already made a positive impact on my financial journey.', '2023-11-12 23:46:22'),
(6, 5, 'Patrick143', 'This blog has truly opened my eyes to the beauty of mindful eating – the idea of turning the kitchen into a sanctuary of creativity and embracing the source of our ingredients resonates deeply, inspiring me to approach each meal with a newfound appreciation and intentionality.', '2023-11-12 23:50:06'),
(7, 4, 'Patrick143', 'Incredible finance insights! The blog\'s emphasis on diversification and the power of compounding has reshaped my approach to investing. Practical advice on debt management is a game-changer. Kudos for making finance education both enlightening and accessible!\"', '2023-11-12 23:57:20'),
(8, 5, 'Robin0987', 'Wow, your cooking guide is like a kitchen companion I never knew I needed! Learning to cook mindfully has turned meal prep into a daily ritual of joy. Exploring flavors from around the world? It\'s like a mini adventure every night. And the bit about sustainable eating? I never thought cooking could make me feel so connected to the planet. Thanks for making the kitchen feel like a place of magic!', '2023-11-13 00:09:43'),
(11, 3, 'user2', 'This is a comment.', '2023-11-13 01:24:55'),
(12, 3, 'Gerald1001', 'Sample comment...................', '2023-11-13 01:26:45'),
(13, 1, 'Luffy345', 'I want to find a treasure there.', '2023-11-13 15:59:38'),
(14, 6, 'Patrick143', 'This blog beautifully captures the essence of how music and art, like two intertwined souls, harmonize to create a tapestry of human experience that speaks to the heart.', '2023-11-13 16:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `blog_picture` varchar(255) NOT NULL,
  `blog_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`blog_id`, `blog_title`, `blog_content`, `blog_category`, `blog_picture`, `blog_date_time`) VALUES
(1, 'Exploring the Serene Beaches of Bali', ' In my recent journey to Bali, I was captivated by the pristine white sand beaches and crystal-clear waters. The gentle sound of the waves and the vibrant sunsets made each day a memorable experience. From the bustling markets of Denpasar to the tranquil shores of Nusa Dua, Bali offers a perfect blend of adventure and relaxation. Whether you\'re a thrill-seeker looking for water sports or a soul-searcher seeking peace, Bali has something for everyone.', 'Travel and Adventure', 'images/bali_indo.jpg', '2023-11-10 20:32:37'),
(3, 'Gaming and Technology: A Seamless Integration', 'In the dynamic marriage of gaming and technology, the landscape is evolving at an unprecedented pace. Next-gen consoles deliver lifelike graphics, virtual reality transports players to new dimensions, and cloud gaming makes titles accessible anytime, anywhere. Artificial Intelligence enhances gameplay, turning it into a personalized experience, while e-sports, fueled by advanced tech, transforms gaming into a global phenomenon. As we stand on the cusp of the future, innovations like haptic feedback and augmented reality hint at an even more immersive gaming experience, reinforcing the symbiotic relationship between gaming and technology, propelling the industry into uncharted territories.', 'Gaming and Technology', 'images/gaming.jpg', '2023-11-11 22:12:54'),
(4, 'Mastering Your Money: A Practical Guide to Financial Success', 'Embarking on the journey of financial mastery is a transformative endeavor that begins with a clear understanding of your financial terrain. Crafting a realistic budget act as your compass, guiding your spending and saving habits. Simultaneously, unlocking the power of credit empowers you to build a solid foundation for future financial endeavors. Diversifying your investments and harnessing the magic of compounding are crucial strategies for long-term growth. Facing financial challenges head-on, such as effective debt management and building emergency funds, ensures resilience in the face of uncertainties. As you advance, exploring tax efficiency and embracing sound retirement planning strategies will solidify your financial future. This comprehensive guide is your roadmap to fiscal fitness, equipping you with the knowledge and tools needed to navigate and conquer the diverse landscape of personal finance.', 'Personal Finance', 'images/finance.jpg', '2023-11-12 23:16:18'),
(5, 'Savoring Life: A Culinary Journey into the Art of Mindful Eating', 'Embark on a transformative culinary journey with \"Savoring Life,\" a guide to the art of mindful eating. In a world often characterized by hurried meals, this blog encourages a shift towards intentional and joyful consumption. From exploring the origins of your ingredients at local farmers\' markets to harmonizing your plate with the seasons, discover the significance of embracing the source. Dive into the heart of your kitchen as it transforms into a sanctuary of mindful cooking, infusing your creations with love and positive energy. Travel the globe through diverse culinary traditions, learning to appreciate the world on your plate. Beyond taste, explore the nourishment of body and soul, with insights on fueling your body with nutrient-rich foods and creating meaningful connections through shared meals. Delve into sustainable eating practices, minimizing food waste, and making mindful choices that contribute to a healthier planet. \"Savoring Life\" invites you to indulge consciously, striking a balance between treats and nutrient-rich choices. This guide is your companion on a culinary adventure, offering a roadmap to savoring life through the joyous exploration of food.', 'Food and Cooking', 'images/cooking.jpg', '2023-11-12 23:22:34'),
(6, 'Harmony in Diversity: The Interplay of Music and Art', 'In the rich tapestry of human expression, music and art stand as profound mediums that transcend boundaries and speak to the depths of our souls. Both forms of creativity share a common language, weaving emotions, stories, and perspectives into the fabric of our existence. Music, with its notes and rhythms, has the power to evoke emotions and transport us to different realms. Art, through colors and forms, invites us to see the world through the eyes of the creator. Together, they form a symbiotic relationship, influencing and inspiring each other. From the melodic strokes of a brush to the visual symphony of a musical composition, the connection between music and art is undeniable. This blog explores the harmonious relationship between these two expressive realms, delving into how they enhance and complement each other, creating a tapestry of human experience that resonates across cultures and generations. As we delve into the world of music and art, we discover a celebration of diversity, a universal language that connects us all in the beauty of creative expression.', 'Music and Arts', 'images/musicArt.jpg', '2023-11-13 15:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `firstname`, `middlename`, `lastname`, `age`, `sex`) VALUES
('Gerald1001', 'elad1001', 'Gerald', 'S', 'Tomas', 15, 'Male'),
('Luffy345', 'luffy345', 'Luffy', 'D', 'Monkey', 20, 'Male'),
('Patrick143', 'Patpat143', 'Patrick John', 'S.', 'Tomas', 20, 'Male'),
('Robin0987', 'robin0987', 'Nico', 'A', 'Robin', 30, 'Female'),
('user2', 'user2', 'Gerald', 'S', 'Tomas', 15, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `blog_FK` (`blog_id`),
  ADD KEY `username_FK` (`username`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `blog_FK` FOREIGN KEY (`blog_id`) REFERENCES `post` (`blog_id`),
  ADD CONSTRAINT `username_FK` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
