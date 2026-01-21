-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 10:33 AM
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
-- Database: `db_jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$ie4ZFDygSKiUvZp6C55wpeYBigaRDis17itJBvtOholCEuD8EnsgS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IT & Telecommunication', 'it-telecommunication', 'IT & Telecommunication', 1, '2025-07-31 13:45:13', '2025-09-16 12:22:41'),
(2, 'Accounting', 'accounting', 'Accounting', 1, '2025-07-31 13:45:26', '2025-07-31 13:45:26'),
(3, 'Software Engineer', 'software-engineer', 'Software Engineer', 1, '2025-07-31 13:45:38', '2025-07-31 13:45:38'),
(4, 'Engineering/Architecture', 'engineeringarchitecture', 'engineering', 1, '2025-09-16 12:16:15', '2025-09-16 12:16:15'),
(5, 'Finance & Banking Service', 'finance-banking-service', 'Finance & Banking Service', 1, '2025-09-16 12:21:32', '2025-09-16 12:21:32'),
(6, 'Real Estate Business', 'real-estate-business', 'Real Estate Business', 1, '2025-09-16 12:22:16', '2025-09-16 12:22:16'),
(7, 'Marketing', 'marketing', 'Marketing', 1, '2025-09-16 12:23:49', '2025-09-16 12:23:49'),
(8, 'Security/Support Service', 'securitysupport-service', 'Security/Support Service', 1, '2025-09-16 12:24:45', '2025-09-16 12:24:45'),
(9, 'Delivery Man', 'delivery-man', 'Delivery Man', 1, '2025-09-16 12:25:08', '2025-09-16 12:25:08'),
(10, 'Pharmaceutical', 'pharmaceutical', 'Pharmaceutical', 1, '2025-09-16 12:26:07', '2025-09-16 12:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `company_name`, `email`, `phone`, `password`, `company_website`, `logo`, `company_address`, `company_description`, `industry_type`, `is_approved`, `status`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dolan Doyle', 'Wagner Osborn Associates', 'seseve@mailinator.com', NULL, '$2y$12$ie4ZFDygSKiUvZp6C55wpeYBigaRDis17itJBvtOholCEuD8EnsgS', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2025-07-31 13:42:08', '2025-07-31 13:42:08'),
(2, 'Price Daniel', 'Harmon Velez Plc', 'jecuxikup@mailinator.com', NULL, '$2y$12$BVBBviZakNArgDNKlvqSjuYqQwagZQNEWohsOC/58bflzIPVEIv6O', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2025-07-31 13:45:53', '2025-07-31 13:45:53'),
(3, 'Kirby Harrison', 'Mcdaniel Cross Inc', 'pixuzem@mailinator.com', NULL, '$2y$12$U5m9r6VVsG6p1en8/4pfhOY6L9.9GCJID8mDvsHFFDMZn3Dk1GfvK', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2025-07-31 16:37:47', '2025-07-31 16:37:47'),
(4, 'Hammett Nichols', 'Dunn and Weeks Inc', 'namume@mailinator.com', NULL, '$2y$12$3fkG4IjJj.CyzaeYXEPqaeS5WydVE/zl7SQvCl94GrpWUPKq4Jp9O', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2025-08-19 15:28:04', '2025-08-19 15:28:04'),
(5, 'Paul Chan', 'Foley and Clay LLC', 'jilaci@mailinator.com', NULL, '$2y$12$aQAhL4Y2rlkpAAv2BlSQ1uK2P3C5mQTr6qzjHPvBdhMidrRSv31YG', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2025-10-29 16:20:25', '2025-10-29 16:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cover_letter` text DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','reviewed','shortlisted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `user_id`, `cover_letter`, `cv_path`, `applied_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'test', 'cvs/4Wj79buatFnVh5hYguP8jS86VYx6a7DRa0ce45E2.pdf', '2025-07-31 08:23:47', 'pending', '2025-07-31 15:23:47', '2025-07-31 15:23:47'),
(2, 3, 2, 'hello', 'cvs/pjVKBPS6sJQz1LFMqT6TwYHyzNBz4xrVxvT3dVt6.pdf', '2025-07-31 09:41:22', 'pending', '2025-07-31 16:41:22', '2025-07-31 16:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `job_code` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `job_level` varchar(255) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `remote_available` tinyint(1) NOT NULL DEFAULT 0,
  `salary_range` varchar(255) DEFAULT NULL,
  `salary_hidden` tinyint(1) NOT NULL DEFAULT 0,
  `deadline` date DEFAULT NULL,
  `application_deadline_time` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `education_requirements` text DEFAULT NULL,
  `experience_requirements` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age_limit` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `job_benefits` text DEFAULT NULL,
  `application_email` varchar(255) DEFAULT NULL,
  `application_link` varchar(255) DEFAULT NULL,
  `apply_instruction` text DEFAULT NULL,
  `job_language` varchar(255) NOT NULL DEFAULT 'en',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tags` varchar(255) DEFAULT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `employer_id`, `job_code`, `job_title`, `slug`, `company_name`, `company_logo`, `job_type`, `category_id`, `job_level`, `vacancy`, `location`, `remote_available`, `salary_range`, `salary_hidden`, `deadline`, `application_deadline_time`, `description`, `responsibilities`, `requirements`, `education_requirements`, `experience_requirements`, `gender`, `age_limit`, `skills`, `job_benefits`, `application_email`, `application_link`, `apply_instruction`, `job_language`, `is_featured`, `is_approved`, `status`, `tags`, `view_count`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'JOB-18JXYQGR2', 'Nemo qui vel asperna', 'nemo-qui-vel-asperna-job-18jxyqgr2', NULL, NULL, 'Part-time', '3', 'Senior', 47, 'Natus fuga Quam est', 0, 'Quae voluptatum in n', 0, '2039-10-11', '16:59:00', 'Labore illum cupidi Labore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidi', 'Quam repudiandae und', 'Ea in nostrud sed al', 'Consectetur ut opti', 'Ea sed quasi tenetur', 'Any', 'Accusamus aperiam es', 'Quis quas dolore dol', 'Sunt commodi dicta', 'jowoh@mailinator.com', 'https://www.kaco.info', 'Magnam voluptatibus', 'en', 1, 1, 1, 'Quidem anim esse est', 0, NULL, NULL, '2025-07-31 13:46:38', '2025-07-31 17:48:46'),
(2, 2, 'JOB-26KGDB74G', 'Iusto obcaecati null', 'iusto-obcaecati-null-job-26kgdb74g', NULL, NULL, 'Internship', '2', 'Mid', 64, 'Quia debitis ex tene', 1, 'Lorem voluptatem mol', 1, '2036-05-21', '01:22:00', 'Labore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidiLabore illum cupidi', 'Modi cillum irure qu', 'Esse veniam velit', 'In et ut expedita fu', 'Rerum dolore iure id', 'Any', 'Consectetur illum c', 'Est aut saepe omnis', 'Saepe qui sit ea sap', 'gelasecazu@mailinator.com', 'https://www.femojolyrib.co.uk', 'Amet explicabo Pla', 'en', 1, 1, 1, 'Sit magni dolorem ma', 0, NULL, NULL, '2025-07-31 13:47:39', '2025-07-31 17:48:41'),
(3, 3, 'JOB-3P4WC5IRQ', 'Amet eu nostrud ess', 'amet-eu-nostrud-ess-job-3p4wc5irq', NULL, NULL, 'Full-time', '2', 'Entry', 9, 'Quis reprehenderit', 0, 'Labore sed nihil del', 0, '2026-09-14', '14:31:00', 'Aut aut pariatur Ni kjhiufhe hsfuhsafg hasgfiuah fgiasfgha uhgfhagfiugh ahbviafg g', 'Quam aut explicabo', 'Adipisicing autem es', 'Amet est deserunt e', 'Cum magni ea quo cum', 'Male', 'Provident hic place', 'Eos vel quis neque q', 'Ullamco quam autem t', 'kazaluny@mailinator.com', 'https://www.fujutecodykip.cm', 'Laudantium maxime a', 'en', 0, 1, 1, 'Voluptatem Laborum', 0, NULL, NULL, '2025-07-31 16:38:11', '2025-07-31 16:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2025_06_24_052743_create_admins_table', 1),
(24, '2025_06_24_065921_create_employers_table', 1),
(25, '2025_06_30_065620_create_job_posts_table', 1),
(26, '2025_07_07_111529_create_categories_table', 1),
(27, '2025_07_29_084320_create_job_applications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tarik Reynolds', 'kihid@mailinator.com', NULL, '$2y$12$14AwFo3XkpXsbbE2T8ilWexvr4vX14ODuZCUIYwmNAs.xPP7JZDva', NULL, '2025-07-31 13:47:51', '2025-07-31 13:47:51'),
(2, 'Rana Webb', 'gygasihuwi@mailinator.com', NULL, '$2y$12$/nFjHvyPOBE78jyPgzSFwO2uhYZ6B8Zd3zu6xJ8IWSITG2.Udotkq', NULL, '2025-07-31 16:41:07', '2025-07-31 16:41:07'),
(3, 'Zeph York', 'cetavexe@mailinator.com', NULL, '$2y$12$PiCq/c9c24XHszNzYd6mRenqczjD4AKrkGdhCGI/RgZZ9kizBb1c2', NULL, '2025-10-29 16:18:57', '2025-10-29 16:18:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_posts_job_code_unique` (`job_code`),
  ADD UNIQUE KEY `job_posts_slug_unique` (`slug`),
  ADD KEY `job_posts_employer_id_foreign` (`employer_id`),
  ADD KEY `job_posts_job_type_index` (`job_type`),
  ADD KEY `job_posts_category_index` (`category_id`),
  ADD KEY `job_posts_location_index` (`location`),
  ADD KEY `job_posts_deadline_index` (`deadline`),
  ADD KEY `job_posts_application_deadline_time_index` (`application_deadline_time`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
