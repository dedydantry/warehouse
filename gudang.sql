-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2018 at 05:29 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `satuan_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `part_number`, `description`, `category_id`, `brand_id`, `satuan_id`, `price`, `cover`, `stok`, `created_at`, `updated_at`) VALUES
(1, '12345', 'Loremipsum doler si amet', 1, 1, 1, '12000.00', 'cover.jpg', 17, '2018-10-31 07:07:49', '2018-11-01 09:52:18'),
(2, '0019238928392', 'Loremipsum doler si amet', 19, 10, 1, '670000.00', 'img.jpg', 69, '2018-10-31 07:13:35', '2018-11-02 07:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ut.Jf', 'utjf', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(2, 'Rerum.Sy', 'rerumsy', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(3, 'Est ab.vv', 'est-abvv', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(4, 'Enim.Dh', 'enimdh', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(5, 'Optio.4N', 'optio4n', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(6, 'Eos.ZP', 'eoszp', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(7, 'Sint.os', 'sintos', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(8, 'Vel.jN', 'veljn', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(9, 'Quia.Nf', 'quianf', '2018-10-31 07:07:49', '2018-10-31 07:07:49'),
(10, 'In.KW', 'inkw', '2018-10-31 07:07:49', '2018-10-31 07:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dolore ut.Zu', 'dolore-utzu', '2018-10-31 07:07:46', '2018-10-31 07:07:46'),
(2, 'Quod eaque.YS', 'quod-eaqueys', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(3, 'Iusto et.0u', 'iusto-et0u', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(4, 'Qui nam sit.az', 'qui-nam-sitaz', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(5, 'Esse id qui.WT', 'esse-id-quiwt', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(6, 'Fuga libero.8u', 'fuga-libero8u', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(7, 'Iusto.BU', 'iustobu', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(8, 'Quibusdam.Pw', 'quibusdampw', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(9, 'Quas.dU', 'quasdu', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(10, 'Iste aut qui.Dv', 'iste-aut-quidv', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(11, 'Nemo autem.R4', 'nemo-autemr4', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(12, 'Ut possimus.si', 'ut-possimussi', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(13, 'Sint cumque.OY', 'sint-cumqueoy', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(14, 'Et quis.82', 'et-quis82', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(15, 'Perferendis.6x', 'perferendis6x', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(16, 'Aut aut.pA', 'aut-autpa', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(17, 'Vero nihil.E4', 'vero-nihile4', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(18, 'Inventore.vw', 'inventorevw', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(19, 'Repudiandae.rz', 'repudiandaerz', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(20, 'Repellendus.lY', 'repellendusly', '2018-10-31 07:07:47', '2018-10-31 07:07:47'),
(21, 'Sunt.u3', 'suntu3', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(22, 'Et velit.Ar', 'et-velitar', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(23, 'Impedit ex.Tl', 'impedit-extl', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(24, 'Consequatur.gy', 'consequaturgy', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(25, 'Et harum.0Y', 'et-harum0y', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(26, 'Quaerat.c6', 'quaeratc6', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(27, 'Et.3r', 'et3r', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(28, 'Vitae et.0y', 'vitae-et0y', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(29, 'Beatae qui.Kv', 'beatae-quikv', '2018-10-31 07:07:48', '2018-10-31 07:07:48'),
(30, 'Sed quisquam.1K', 'sed-quisquam1k', '2018-10-31 07:07:48', '2018-10-31 07:07:48');

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
(299, '2014_10_12_000000_create_users_table', 1),
(300, '2014_10_12_100000_create_password_resets_table', 1),
(301, '2018_10_24_150756_penyesuaian_table_users', 1),
(302, '2018_10_24_155109_create_categories_table', 1),
(303, '2018_10_24_160643_create_brands_table', 1),
(304, '2018_10_24_160712_create_satuans_table', 1),
(305, '2018_10_24_160923_create_barangs_table', 1),
(306, '2018_10_24_170350_create_transactions_table', 1),
(307, '2018_10_31_135307_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED DEFAULT NULL,
  `barang_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `barang_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL),
(3, 3, 1, 2, NULL, NULL),
(6, 5, 1, 3, NULL, NULL),
(7, 5, 2, 2, NULL, NULL),
(8, 3, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuans`
--

CREATE TABLE `satuans` (
  `id` int(10) UNSIGNED NOT NULL,
  `satuan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuans`
--

INSERT INTO `satuans` (`id`, `satuan_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Qui.1D', 'qui1d', '2018-10-31 07:07:49', '2018-10-31 07:07:49'),
(2, 'Qui.rO', 'quiro', '2018-10-31 07:07:49', '2018-10-31 07:07:49'),
(3, 'Qui.xB', 'quixb', '2018-10-31 07:07:49', '2018-10-31 07:07:49'),
(4, 'Quia.DV', 'quiadv', '2018-10-31 07:07:49', '2018-10-31 07:07:49'),
(5, 'Quia.4E', 'quia4e', '2018-10-31 07:07:49', '2018-10-31 07:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `picker` date NOT NULL,
  `faktur_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `picker`, `faktur_number`, `remark`, `supplier`, `status`, `created_at`, `updated_at`) VALUES
(1, '2018-10-10', '1312454656', 'lorem ipsum', 'Dedy', 'IN', '2018-10-31 07:12:10', '2018-10-31 07:12:10'),
(2, '2018-10-25', '56785878', 'Siap mantap jiwa', 'Sirait', 'OUT', '2018-10-31 07:14:09', '2018-10-31 07:14:09'),
(3, '2018-11-08', '848484', 'JOSS', 'Dedy dant', 'IN', '2018-10-31 10:15:07', '2018-11-02 07:12:56'),
(4, '2018-11-22', '21', 'Oke oce', 'Dan', 'IN', '2018-10-31 10:31:45', '2018-10-31 10:31:45'),
(5, '2018-11-09', '02932093029', 'Jos gandos', 'Wahyu', 'IN', '2018-11-01 09:52:18', '2018-11-01 09:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `status`) VALUES
(1, 'Dedy dantry', 'dedydantry@gmail.com', '$2y$10$VJ33JtqVbDqAaiS13UyX0eV1g81Tl3pchLf/yKZZ7Wz.nFFY8m.I2', NULL, '2018-10-31 07:07:46', '2018-10-31 07:07:46', '["ADMIN"]', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_category_id_foreign` (`category_id`),
  ADD KEY `barangs_brand_id_foreign` (`brand_id`),
  ADD KEY `barangs_satuan_id_foreign` (`satuan_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_barang_id_foreign` (`barang_id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `satuans_slug_unique` (`slug`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `barangs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `barangs_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
