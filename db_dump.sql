-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2017 at 10:46 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_id`, `user_id`, `thread_id`, `comment`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 3, 1, 'Good stuff', NULL, '2017-02-21 09:38:59', '2017-02-21 09:38:59'),
(2, 0, 3, 1, 'Second Comment', NULL, '2017-02-21 09:39:10', '2017-02-21 09:39:10'),
(3, 2, 3, 1, 'Child Comment', NULL, '2017-02-21 09:39:28', '2017-02-21 09:39:28'),
(4, 1, 3, 1, 'Test comment', NULL, '2017-02-21 09:39:58', '2017-02-21 09:39:58'),
(5, 2, 3, 1, 'Third Child', NULL, '2017-02-21 09:40:38', '2017-02-21 09:40:38'),
(6, 3, 3, 1, 'Bad Stuff', NULL, '2017-02-21 09:40:53', '2017-02-21 09:40:53'),
(7, 0, 3, 2, 'Good stuff', NULL, '2017-02-21 09:41:47', '2017-02-21 09:41:47'),
(8, 7, 3, 2, 'Good stuff', NULL, '2017-02-21 09:41:52', '2017-02-21 09:41:52'),
(9, 0, 3, 3, 'Good stuff', NULL, '2017-02-21 09:42:09', '2017-02-21 09:42:09'),
(10, 0, 3, 3, 'Good stuff', NULL, '2017-02-21 09:42:14', '2017-02-21 09:42:14'),
(11, 10, 3, 3, 'Good stuff', NULL, '2017-02-21 09:42:18', '2017-02-21 09:42:18'),
(12, 11, 3, 3, 'Good stuff', NULL, '2017-02-21 09:42:22', '2017-02-21 09:42:22'),
(13, 0, 3, 4, 'Good stuff', NULL, '2017-02-21 09:42:27', '2017-02-21 09:42:27'),
(14, 0, 3, 5, 'Good stuff', NULL, '2017-02-21 09:42:31', '2017-02-21 09:42:31'),
(15, 0, 3, 6, 'Good stuff', NULL, '2017-02-21 09:42:35', '2017-02-21 09:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2017_02_20_052346_create_topic_table', 1),
(14, '2017_02_20_063043_create_threads_table', 1),
(15, '2017_02_20_122743_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `user_id`, `topic_id`, `title`, `body`, `photo`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'New imaging technique catches DNA ‘blinking’ on', 'A new imaging technique takes advantage of DNA’s natural ability to “blink” in response to stimulating light.  The new approach will allow unprecedented views of genetic material and other cellular players. It’s the first method to resolve features smaller than 10 nanometers, biomedical engineer Vadim Backman said February 17 at the annual meeting of the American Association for the Advancement of Science.', '1487691191.jpg', '2017-02-21 09:16:38', '2017-02-21 09:33:11'),
(2, 3, 1, 'Microbes survived inside giant cave crystals for up to 50,000 years', 'The microbes found inside the crystals appear to be similar but not identical to those living outside, on the cave walls and other nearby areas, Boston said. That leaves Boston and her team fairly confident that the samples were not contaminated with other microbes and that their age estimates for the crystal-trapped microbes is solid. The team has not yet published the result. If confirmed, the microbes would represent some of the toughest extremophiles on the planet — dwelling at depths 100 to 400 meters below Earth’s surface and enduring temperatures of 45° to 65° Celsius.', '1487690459.jpg', '2017-02-21 09:20:59', '2017-02-21 09:20:59'),
(3, 2, 2, 'How hydras know where to regrow their heads', 'Hydras, petite pond polyps known for their seemingly eternal youth, exemplify the art of bouncing back. The animals’ cellular scaffolding, or cytoskeleton, can regrow from a slice of tissue that’s just 5 percent of its full body size. Researchers thought that molecular signals told cells where and how to rebuild, but new evidence suggests there are other forces at play', '1487690695.jpg', '2017-02-21 09:24:55', '2017-02-21 09:24:55'),
(4, 2, 2, 'When a nearby star goes supernova', 'Almost every night that the constellation Orion is visible, physicist Mark Vagins steps outside to peer at a reddish star at the right shoulder of the mythical figure. “You can see the color of Betelgeuse with the naked eye. It’s very striking, this red, red star,” he says. “It may not be in my lifetime, but one of these days, that star is going to explode', '1487690919.jpg', '2017-02-21 09:28:39', '2017-02-21 09:28:39'),
(5, 2, 3, 'Cow carved in stone paints picture of Europe’s early human culture', 'This stone engraving of an aurochs, or wild cow, found in a French rock-shelter in 2012, provides glimpses of an ancient human culture’s spread across Central and Western Europe, researchers say.\n\nRows of dots partly cover the aurochs. A circular depression cut into the center of the animal’s body may have caused the limestone to split in two, says Stone Age art specialist Raphaëlle.', '1487691011.jpg', '2017-02-21 09:30:11', '2017-02-21 09:30:11'),
(6, 2, 4, 'Ancient otter of unusual size unearthed in China', 'Fossils of a giant otter have emerged from the depths of an open-pit mine in China.\n\nThe crushed cranium, jaw bone and partial skeletons of at least three animals belong to a now-extinct species of otter that lived some 6.2 million years ago, scientists report January 23 in the Journal of Systematic Palaeontology.\n\nAt roughly 50 kilograms in weight, the otter would have outclassed', '1487691048.jpg', '2017-02-21 09:30:48', '2017-02-21 09:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Science', 'Science topic goes here', '2017-02-21 09:11:52', '2017-02-21 09:11:52'),
(2, 'Art', 'Art topc', '2017-02-21 09:12:03', '2017-02-21 09:12:03'),
(3, 'Education', 'Need good education system', '2017-02-21 09:12:21', '2017-02-21 09:12:21'),
(4, 'Digital Education', 'Digital Education system', '2017-02-21 09:13:10', '2017-02-21 09:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Foo', 'demo@gmail.com', '$2y$10$RUpFvm0XqY6ANuJuFiYniuexwJXMWLU2l.2gc7.qTFDxnFnFSt08.', 'KxiyQE1CseUHyo9fY3uu5IXWywtZ3zeJLxfanZ6fNzAhzcyg5QdACe446dGx', '2017-02-21 09:10:35', '2017-02-21 09:10:35'),
(2, 'Jorge', 'test@yahoo.com', '$2y$10$69hpUS5eNK8Lpj1yuT9uBeZ0nuf3R0EeT9bTLPv8lAGlQ7uYEWn8u', '6nJ4bLo4R8zbxhOtfRQcN4arky9dOjeFJtiS9zVxAO3Xx8Yd1NJkz7BWwNlA', '2017-02-21 09:11:02', '2017-02-21 09:11:02'),
(3, 'Fobia', 'demo@yahoo.com', '$2y$10$Js99qqFJcCWfDu2sLeUj1.XigW8DZNROwypclnD9SSAFt1EV1m7rK', 'I1rIgnHWkNWVcEPNc7LhsxHTL5iLif2brncdXtGyoGDWJsvxKjAXM88n5cbC', '2017-02-21 09:11:21', '2017-02-21 09:11:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
