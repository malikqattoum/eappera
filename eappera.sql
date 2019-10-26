-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 07:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eappera`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(255) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2019-10-26-114512', 'App\\Database\\Migrations\\PostsTable', 'default', 'App', 1572093321, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'dsadssssssssss', 'wdwwwwwwwwwwwww', NULL, '2019-10-26 07:06:46', '2019-10-26 07:06:46', NULL),
(2, 9, 'Non voluptas consect', 'Ullam aliquid et eos', NULL, '2019-10-26 07:18:45', '2019-10-26 07:18:45', NULL),
(3, 14, 'Accusamus molestias ', 'Nostrud totam fugit', '1572101646_627fd235cbc8b970e465.png', '2019-10-26 16:19:08', '2019-10-26 07:54:06', NULL),
(4, 8, 'vcxv', '', '1572101679_379372fcb64281f7e29f.png', '2019-10-26 16:19:12', '2019-10-26 07:54:39', NULL),
(5, 14, 'Qui qui ex ea cupidi', '', NULL, '2019-10-26 07:58:16', '2019-10-26 07:58:16', NULL),
(6, 2, 'php developer', '', NULL, '2019-10-26 09:43:29', '2019-10-26 09:43:29', NULL),
(7, 9, 'php developer', '', NULL, '2019-10-26 09:43:52', '2019-10-26 09:43:52', NULL),
(8, 2, 'ghfhfghgfhhhhhh', '', '1572108836_61a9bd73941b8fc0f4d8.png', '2019-10-26 09:53:56', '2019-10-26 09:53:56', NULL),
(9, 10, 'raewdddd ds adsa dsa dsa', '', '1572109205_20523a61dbba8dfc92d6.png', '2019-10-26 10:00:05', '2019-10-26 10:00:05', NULL),
(10, 8, 'Blanditiis optio at', 'Voluptatum sit nesci', '1572109223_16a612b54c048a216ee9.png', '2019-10-26 10:00:23', '2019-10-26 10:00:23', NULL),
(12, 10, 'Est id quis nulla na', 'Qui minus est dolor ', '1572110281_1e9edac458bed736f299.png', '2019-10-26 10:18:01', '2019-10-26 10:18:01', NULL),
(13, 6, 'Sint commodo corpori', 'Repellendus Adipisc', '1572110295_d19c2f5268fb1df32397.jpg', '2019-10-26 10:18:15', '2019-10-26 10:18:15', NULL),
(14, 8, 'Eaque omnis inventor', 'Praesentium quis con', '1572110311_272e7c47d776a4fc5aca.png', '2019-10-26 10:18:31', '2019-10-26 10:18:31', NULL),
(15, 6, 'Placeat quod beatae', 'Necessitatibus eius ', '1572110338_a34ced40aedcb2892c65.jpg', '2019-10-26 10:18:58', '2019-10-26 10:18:58', NULL),
(16, 9, 'Consequuntur fugiat', 'Quidem hic quasi ex ', '1572110407_488092c21aade28defa0.jpg', '2019-10-26 10:20:07', '2019-10-26 10:20:07', NULL),
(17, 12, 'Expedita quis possim', 'Non deleniti irure s', '1572110430_73eb0a24aeabf676838e.jpg', '2019-10-26 10:20:30', '2019-10-26 10:20:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Camerongytry', 'Molinaryyy', 'digymexy@mailinatdddor.com', '$2y$10$uVx3f7HXok7JMER0acWmi.HtDB8xnPBK81l4ErDgWlNBoxyizjkEW', '2019-10-25 11:17:17', '2019-10-26 10:22:47', NULL),
(3, 'Hilary', 'Lara', 'locela@mailinator.com', '$2y$10$o69ePYrdsyAQZxdGxUQWAuiPMLP4ASLLCeHihSu8PZMTGYws4yvg2', '2019-10-25 11:24:45', '2019-10-25 11:24:45', NULL),
(5, 'Eden', 'Hazard', 'givofoveq@mailinator.net', '$2y$10$mO39xwMhT94NufSPXstvh.8jsH0nTA0qILVr.p2XjVNh3OkvM.c1S', '2019-10-25 12:04:02', '2019-10-25 13:23:43', NULL),
(6, 'Merritt', 'Mercer', 'xiqiwer@mailinator.net', '$2y$10$nQb8Asr6.jOb2dVwja.8BugeveQNjTUNElD4yfWZ3nafIrc7Pwkw6', '2019-10-25 12:06:16', '2019-10-25 12:06:16', NULL),
(7, 'Norman', 'Diaz', 'govyl@mailinator.net', '$2y$10$ro5k6rp4MYEXaskn7fhQc.7mX4ZcBIFiPaju/g8MS7aIW425Y6/hq', '2019-10-25 12:06:39', '2019-10-25 12:06:39', NULL),
(8, 'Jonas', 'Barnett', 'ropifet@mailinator.net', '$2y$10$vQEZf6K6z/B/rXhLyr1CMefZAyh/3RIz1prxucmNm/e4MBiJRW2au', '2019-10-25 12:07:37', '2019-10-25 12:07:37', NULL),
(10, 'Basia', 'Carroll', 'matu@mailinator.net', '$2y$10$10sKOn0i4Y1i57TGjdiQD.mfzwqqQLDZf685lqGN/4vpD8rvIPtmm', '2019-10-25 12:12:25', '2019-10-25 12:12:25', NULL),
(12, 'Jescie', 'Romero', 'qezy@mailinator.net', '$2y$10$U7bbXSpwDBt0eSRd.pecn.rj50NmePI6JJe3DocygDAEMtI6W48cW', '2019-10-25 12:23:49', '2019-10-25 12:23:49', NULL),
(13, 'Quentin', 'Castillo', 'wefifa@mailinator.com', '$2y$10$k48FsJDUhNhSh/qcp3Ijd.brlyQr6CTJ4NT4w/DfJ8ScRK3nwIgze', '2019-10-25 12:24:11', '2019-10-25 12:24:11', NULL),
(14, 'malik', 'qattoum', 'malikqattom@gmail.com', '$2y$10$iBeZ7k.ZTJD/Eem6Q8O9I.lTUtZxiBE9TKWF24HzCLBbSqg3UYxkK', '2019-10-26 01:29:25', '2019-10-26 01:29:25', NULL),
(15, 'Scarlett', 'York', 'macanozuk@mailinator.net', '$2y$10$us6NCiAnxKWgVvQMRjfddu20.9aNtH/CucMcF60LVFKGrDLUxEZ4O', '2019-10-26 10:22:56', '2019-10-26 10:22:56', NULL),
(16, 'Shafira', 'Boyd', 'syvo@mailinator.com', '$2y$10$STSiTi0eJ4llpc1eCg7AdON08Y4puUgwD3BtWs27vme8u3hV9rHZG', '2019-10-26 10:25:34', '2019-10-26 10:25:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
