-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 04:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvcoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type`) VALUES
(11, 'Other income', 'this is my other income', 1),
(12, 'Business Income-1', 'This is income', 1),
(13, 'Business Income-2', 'This is business income 2', 1),
(14, 'Business Income-3', 'income 3', 1),
(15, 'New income', 'this is my new income', 1),
(16, 'Other expense', 'this is other expense', 2),
(17, 'testing', 'test', 1),
(18, 'testing', 'test', 1),
(19, 'test1', 'test1', 1),
(20, 'test2', 'test2...', 2),
(21, 'session test', 'this is session test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `qty` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category_id`, `amount`, `qty`, `user_id`, `date`) VALUES
(2, 17, 300, 3, 11, '2020-12-05'),
(3, 11, 0, 0, 11, '2020-12-08'),
(4, 11, 0, 0, 11, '2020-12-08'),
(5, 11, 0, 0, 11, '2020-12-08'),
(6, 11, 0, 0, 11, '2020-12-08'),
(7, 15, 1, 2, 11, '2020-12-08'),
(8, 21, 2, 2, 11, '2020-12-08'),
(9, 15, 1, 0, 11, '2020-12-08'),
(10, 20, 555, 5, 11, '2020-12-08'),
(11, 17, 55, 0, 11, '2020-12-08'),
(12, 19, 44, 0, 11, '2020-12-08'),
(13, 12, 6, 0, 11, '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `category_id`, `amount`, `user_id`, `date`) VALUES
(1, 15, 10000000, 11, '2020-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'income', 'This is income'),
(2, 'expense', 'This is expense');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_login` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`) VALUES
(5, 'TintWai', 'tintwai544@gmail.com', 'MTIzNDU2Nw==', 'default_img.jpg', 0, 0, 0, 'e303ae328aa181a98f0f274ebaba0ea3a99bda67074fe6df022f2b756781c1638119fe83d145f5a58b4a2bffee739c678860', '2020-11-18'),
(6, 'Min Khant Zaw', 'khant@gmail.com', 'a2sxMjM=', 'default_img.jpg', 0, 0, 0, '1430d3b5cee2af18c493e036c23ce742c7cc8eff814f9a18de300360ee2ed7e88b2b6b39653a064f1866022b95666e900085', '2020-11-19'),
(7, 'Nu Nu', 'nunu@gmail.com', 'bm4xMjM=', 'default_img.jpg', 0, 0, 0, '080e7903a45cf668da69ba6a60e4e2dbf0a6bcc3938649631cab62a10bdd9a54580a14ec9dfd6840807d978d9bf5019072bf', '2020-11-19'),
(8, 'Soe Soe', 'soe@gmail.com', 'c29lMTIzMTIz', 'default_img.jpg', 0, 0, 0, '6b27684e65bc84bbec283c7077a760e92bd1c3a00e3de02b6131edf60717329f2704c47284d17c6350abdb57edd3f34cd92e', '2020-11-19'),
(9, 'sl', 'sl@gmail.com', 'c3MxMjM=', 'default_img.jpg', 0, 0, 0, 'cb6613f309cd38143a4d3b8ac221028faa0a28d390e992a99935c664552f36a985cbe07a962170b82644473c1af9d0f7154a', '2020-11-19'),
(10, 'thuzar', 'thuzar@gmail.com', 'dHQxMjM=', 'default_img.jpg', 0, 0, 0, '539bedba48eabf57d09afc8ae3ec03768af090d562201055f75f7c5ab511f94d74e5951ae70cffb0090ff472daeffc268aa9', '2020-11-19'),
(11, 'Nay Chi', 'naychi@gmail.com', 'bmF5MTIz', 'default_img.jpg', 0, 0, 1, '89139291085cff03daba8d4f4f6c43903d54217bf9f538a6c332ada1e72932e9484b63970b7c6e75de004ed24d1c95b70a11', '2020-11-19'),
(12, 'shin thant', 'shin@gmail.com', 'c3MxMjMxMjM=', 'default_img.jpg', 0, 0, 1, '4250f4f31300d6f4ece2848b506b0c6ec1b12caac2707e14cb8d06f2de411ea876012e4d413ae0977b5b1d7f97d8df608195', '2020-11-19'),
(13, 'Kaung Myat', 'km@gmail.com', 'a20xMjM=', 'default_img.jpg', 0, 0, 0, 'd5c5d49e25f5cc2cebae74374c9f2ed175f11dd6186b7a364b5fb37c4f2ab3cf2bee165ffafce16e6e02c0229ccbaaebc027', '2020-11-26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categories_types`
-- (See below for the actual view)
--
CREATE TABLE `vw_categories_types` (
`id` int(11)
,`name` varchar(255)
,`description` varchar(255)
,`type` int(11)
,`types_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categories_types_users`
-- (See below for the actual view)
--
CREATE TABLE `vw_categories_types_users` (
`id` int(11)
,`date` date
,`amount` double
,`category_name` varchar(255)
,`user_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categories_users_expenses`
-- (See below for the actual view)
--
CREATE TABLE `vw_categories_users_expenses` (
`id` int(11)
,`amount` double
,`qty` double
,`date` date
,`category_name` varchar(255)
,`user_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_categories_types`
--
DROP TABLE IF EXISTS `vw_categories_types`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories_types`  AS SELECT `categories`.`id` AS `id`, `categories`.`name` AS `name`, `categories`.`description` AS `description`, `categories`.`type` AS `type`, `types`.`name` AS `types_name` FROM (`categories` left join `types` on(`categories`.`type` = `types`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_categories_types_users`
--
DROP TABLE IF EXISTS `vw_categories_types_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories_types_users`  AS SELECT `incomes`.`id` AS `id`, `incomes`.`date` AS `date`, `incomes`.`amount` AS `amount`, `categories`.`name` AS `category_name`, `users`.`name` AS `user_name` FROM ((`incomes` left join `categories` on(`incomes`.`category_id` = `categories`.`id`)) left join `users` on(`incomes`.`user_id` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_categories_users_expenses`
--
DROP TABLE IF EXISTS `vw_categories_users_expenses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categories_users_expenses`  AS SELECT `expenses`.`id` AS `id`, `expenses`.`amount` AS `amount`, `expenses`.`qty` AS `qty`, `expenses`.`date` AS `date`, `categories`.`name` AS `category_name`, `users`.`name` AS `user_name` FROM ((`expenses` left join `categories` on(`expenses`.`category_id` = `categories`.`id`)) left join `users` on(`expenses`.`user_id` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
