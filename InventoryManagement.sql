-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 03:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toy_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Rastar'),
(2, 'Lego Denmark'),
(3, 'Tamiya'),
(4, 'Lego Wange');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Construction Toy'),
(2, 'Remote Controll Toy');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230217162906', '2023-02-17 17:29:15', 81),
('DoctrineMigrations\\Version20230220065827', '2023-02-20 07:58:37', 813),
('DoctrineMigrations\\Version20230220080138', '2023-02-20 09:01:47', 512),
('DoctrineMigrations\\Version20230220081307', '2023-02-20 09:13:16', 327),
('DoctrineMigrations\\Version20230220081704', '2023-02-20 09:17:10', 31),
('DoctrineMigrations\\Version20230221082809', '2023-02-21 09:28:16', 496),
('DoctrineMigrations\\Version20230221084528', '2023-02-21 09:45:34', 700),
('DoctrineMigrations\\Version20230224081925', '2023-02-24 09:19:34', 605);

-- --------------------------------------------------------

--
-- Table structure for table `export_order`
--

CREATE TABLE `export_order` (
  `id` int(11) NOT NULL,
  `ex_user_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `export_order`
--

INSERT INTO `export_order` (`id`, `ex_user_id`, `time`) VALUES
(2, 2, '2023-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `export_order_detail`
--

CREATE TABLE `export_order_detail` (
  `id` int(11) NOT NULL,
  `exorder_id` int(11) NOT NULL,
  `expro_id` int(11) NOT NULL,
  `ex_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `export_order_detail`
--

INSERT INTO `export_order_detail` (`id`, `exorder_id`, `expro_id`, `ex_quantity`) VALUES
(3, 2, 1, 3),
(4, 2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `import_order`
--

CREATE TABLE `import_order` (
  `id` int(11) NOT NULL,
  `time` date NOT NULL,
  `im_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_order`
--

INSERT INTO `import_order` (`id`, `time`, `im_user_id`) VALUES
(1, '2023-02-23', 1),
(2, '2018-01-01', 1),
(3, '2023-02-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `import_order_detail`
--

CREATE TABLE `import_order_detail` (
  `id` int(11) NOT NULL,
  `imorder_id` int(11) NOT NULL,
  `impro_id` int(11) NOT NULL,
  `im_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_order_detail`
--

INSERT INTO `import_order_detail` (`id`, `imorder_id`, `impro_id`, `im_quantity`) VALUES
(1, 1, 1, 4),
(2, 2, 4, 6),
(3, 1, 1, 10),
(4, 1, 2, 12),
(5, 3, 6, 4),
(6, 2, 1, 2),
(7, 2, 1, 1),
(8, 2, 3, 3),
(9, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `procat_id` int(11) NOT NULL,
  `probrand_id` int(11) NOT NULL,
  `price_import` double NOT NULL,
  `price_export` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `created`, `image`, `procat_id`, `probrand_id`, `price_import`, `price_export`) VALUES
(1, 'Mercedes AMG GT3 Performance', 14, '2023-02-21', 'Mercedes-AMG-GT3-Rastar-63f499e69fb69.jpg', 2, 1, 30, 35),
(2, 'Lamborghini Huracan STO', 0, '2023-02-21', '16292ABU186000-01-63f49fdb3d6f8.jpg', 2, 1, 45, 50),
(3, 'Mercedes-AMG F1 W11 EQ', 12, '2023-02-21', '71mrvqUI-OL-63f4a0afb9d04.jpg', 2, 1, 30, 35),
(4, 'Tamiya RC McLaren Senna TT-02', 20, '2023-02-22', 'TamiyaRC-McLaren-Senna-TT-02-63f5c6e38909a.png', 2, 3, 22, 27),
(5, 'Tamiya RC Impreza WRX STI ARAI VX-01', 20, '2023-02-22', 'Tamiya-RC-Impreza-WRX-STI-ARAI-VX-01-63f5c97b26f8f.jpg', 2, 3, 30, 35),
(6, 'Spider-Man Webquarters Hangout', 40, '2023-02-22', 'spider-63f5c9f1740e5.jpg', 1, 2, 30, 35),
(7, 'Batmobile: The Penguin Chase', 33, '2023-02-22', 'batman-63f5ca199298d.jpg', 1, 2, 25, 30),
(8, 'WANGE 5211 Taj Mahal, ancient city of Agra, India Blocks', 30, '2023-02-22', 'WANGE-5211-Taj-Mahal-ancient-city-of-Agra-India-Blocks-63f5cacccf5da.jpg', 1, 4, 15, 20),
(9, 'WANGE 6217 Potala Palace', 22, '2023-02-22', 'WANGE-6217-Potala-Palace-4-63f5cb3961f31.jpg', 1, 4, 17, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `phone`, `address`, `name`) VALUES
(1, 'son123@gmail.com', '[\"ROLE_USER\"]', '$2y$13$ujLV5JJ2r1ZzAYyMRM7WFOfmw6rtEK5HwG/JWmoB0luq3zpVQN//2', '0939133144', 'Cantho city', 'nguyen huynh son'),
(2, 'admin123@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$FNv/4ox2qQfWKCwzwq3IV.gq.xxvBSOYo31Td2zsv.0KxiFIRtZ7C', '0993399993', 'Cantho city', 'Admin'),
(3, 'sonsoisang@gmail.com', '[\"ROLE_USER\"]', '$2y$13$Wyfk7VQjbu2.TzdvVhmTaOTflASDBMG13RKss3Bd4PFlsVYgUVheC', '0987654321', 'bokemacthientich', 'song');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `export_order`
--
ALTER TABLE `export_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C2D7195E293B2B0E` (`ex_user_id`);

--
-- Indexes for table `export_order_detail`
--
ALTER TABLE `export_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6797DC6D778274DE` (`exorder_id`),
  ADD KEY `IDX_6797DC6D50DBAAE3` (`expro_id`);

--
-- Indexes for table `import_order`
--
ALTER TABLE `import_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_187C3C56D550CCBE` (`im_user_id`);

--
-- Indexes for table `import_order_detail`
--
ALTER TABLE `import_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4D07F1F58BE9936E` (`imorder_id`),
  ADD KEY `IDX_4D07F1F532920CC5` (`impro_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADD24E757A` (`procat_id`),
  ADD KEY `IDX_D34A04ADC514F7AE` (`probrand_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `export_order`
--
ALTER TABLE `export_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `export_order_detail`
--
ALTER TABLE `export_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `import_order`
--
ALTER TABLE `import_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `import_order_detail`
--
ALTER TABLE `import_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export_order`
--
ALTER TABLE `export_order`
  ADD CONSTRAINT `FK_C2D7195E293B2B0E` FOREIGN KEY (`ex_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `export_order_detail`
--
ALTER TABLE `export_order_detail`
  ADD CONSTRAINT `FK_6797DC6D50DBAAE3` FOREIGN KEY (`expro_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_6797DC6D778274DE` FOREIGN KEY (`exorder_id`) REFERENCES `export_order` (`id`);

--
-- Constraints for table `import_order`
--
ALTER TABLE `import_order`
  ADD CONSTRAINT `FK_187C3C56D550CCBE` FOREIGN KEY (`im_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `import_order_detail`
--
ALTER TABLE `import_order_detail`
  ADD CONSTRAINT `FK_4D07F1F532920CC5` FOREIGN KEY (`impro_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_4D07F1F58BE9936E` FOREIGN KEY (`imorder_id`) REFERENCES `import_order` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADC514F7AE` FOREIGN KEY (`probrand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_D34A04ADD24E757A` FOREIGN KEY (`procat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
