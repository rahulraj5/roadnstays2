-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2021 at 02:11 AM
-- Server version: 5.7.35
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework_classpertshome`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `slug`, `short_description`, `description`, `image_path`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'cat_gtHoQQ9wRKE', 'english', NULL, NULL, NULL, 1, '2021-09-09 18:22:39', '2021-09-09 18:22:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comprehension_passages`
--

CREATE TABLE `comprehension_passages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `difficulty_levels`
--

CREATE TABLE `difficulty_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `difficulty_levels`
--

INSERT INTO `difficulty_levels` (`id`, `name`, `code`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Very Easy', 'VERYEASY', 1, NULL, NULL, NULL),
(2, 'Easy', 'EASY', 1, NULL, NULL, NULL),
(3, 'Medium', 'MEDIUM', 1, NULL, NULL, NULL),
(4, 'High', 'HIGH', 1, NULL, NULL, NULL),
(5, 'Very High', 'VERYHIGH', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2018_11_06_222923_create_transactions_table', 1),
(5, '2018_11_07_192923_create_transfers_table', 1),
(6, '2018_11_07_202152_update_transfers_table', 1),
(7, '2018_11_15_124230_create_wallets_table', 1),
(8, '2018_11_19_164609_update_transactions_table', 1),
(9, '2018_11_20_133759_add_fee_transfers_table', 1),
(10, '2018_11_22_131953_add_status_transfers_table', 1),
(11, '2018_11_22_133438_drop_refund_transfers_table', 1),
(12, '2019_05_13_111553_update_status_transfers_table', 1),
(13, '2019_06_25_103755_add_exchange_status_transfers_table', 1),
(14, '2019_07_29_184926_decimal_places_wallets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_10_02_193759_add_discount_transfers_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2020_10_30_193412_add_meta_wallets_table', 1),
(19, '2021_01_19_122742_create_sessions_table', 1),
(20, '2021_01_26_103623_create_permission_tables', 1),
(21, '2021_01_26_145101_create_user_groups_table', 1),
(22, '2021_02_01_111346_create_categories_table', 1),
(23, '2021_02_01_123941_create_sub_categories_table', 1),
(24, '2021_03_11_165355_create_sections_table', 1),
(25, '2021_03_11_165427_create_skills_table', 1),
(26, '2021_03_11_165437_create_topics_table', 1),
(27, '2021_03_11_170421_create_difficulty_levels_table', 1),
(28, '2021_03_11_170645_create_question_types_table', 1),
(29, '2021_03_11_171040_create_comprehension_passages_table', 1),
(30, '2021_03_11_171818_create_questions_table', 1),
(31, '2021_05_06_170328_create_sub_category_types_table', 1),
(32, '2021_05_13_105405_create_quiz_types_table', 1),
(33, '2021_05_13_133602_create_quizzes_table', 1),
(34, '2021_05_13_162316_create_quiz_questions_table', 1),
(35, '2021_05_13_174530_create_practice_sets_table', 1),
(36, '2021_05_13_174705_create_practice_set_questions_table', 1),
(37, '2021_05_17_165018_create_settings_table', 1),
(38, '2021_05_18_094439_create_general_settings', 1),
(39, '2021_05_20_120637_create_sub_category_sections_table', 1),
(40, '2021_05_24_115523_create_practice_sessions_table', 1),
(41, '2021_05_25_153658_create_practice_session_questions', 1),
(42, '2021_06_06_121703_create_quiz_sessions_table', 1),
(43, '2021_06_06_122342_create_quiz_session_questions_table', 1),
(44, '2021_06_16_130734_create_quiz_schedules_table', 1),
(45, '2021_06_18_120842_create_user_group_users_table', 1),
(46, '2021_06_18_121246_create_user_group_quiz_schedules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practice_sessions`
--

CREATE TABLE `practice_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `practice_set_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_time_taken` int(11) NOT NULL DEFAULT '0',
  `percentage_completed` decimal(5,2) NOT NULL DEFAULT '0.00',
  `total_points_earned` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'started',
  `completed_at` datetime DEFAULT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practice_session_questions`
--

CREATE TABLE `practice_session_questions` (
  `practice_session_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `original_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `user_answer` text COLLATE utf8mb4_unicode_ci,
  `correct_answer` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unanswered',
  `is_correct` tinyint(1) DEFAULT NULL,
  `time_taken` int(11) NOT NULL DEFAULT '0',
  `points_earned` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practice_sets`
--

CREATE TABLE `practice_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total_questions` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `auto_grading` tinyint(1) NOT NULL DEFAULT '1',
  `correct_marks` int(10) UNSIGNED DEFAULT NULL,
  `allow_rewards` tinyint(1) NOT NULL DEFAULT '1',
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `practice_set_questions`
--

CREATE TABLE `practice_set_questions` (
  `practice_set_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `correct_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_marks` int(11) NOT NULL DEFAULT '1',
  `default_time` int(11) NOT NULL DEFAULT '60',
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `difficulty_level_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `preferences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `has_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `attachment_type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comprehension_passage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `solution` text COLLATE utf8mb4_unicode_ci,
  `solution_video` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `hint` text COLLATE utf8mb4_unicode_ci,
  `avg_time_taken` int(11) NOT NULL DEFAULT '0',
  `total_attempts` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `code`, `question_type_id`, `question`, `options`, `correct_answer`, `default_marks`, `default_time`, `skill_id`, `topic_id`, `difficulty_level_id`, `preferences`, `has_attachment`, `attachment_type`, `comprehension_passage_id`, `attachment_options`, `solution`, `solution_video`, `hint`, `avg_time_taken`, `total_attempts`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'que_7x831V7Gb06', 1, '<p>How many months we have in 1 year</p>', '[{\"option\":\"<p>10<\\/p>\",\"partial_weightage\":0},{\"option\":\"<p>9<\\/p>\",\"partial_weightage\":0},{\"option\":\"<p>12<\\/p>\",\"partial_weightage\":0},{\"option\":\"<p>6<\\/p>\",\"partial_weightage\":0}]', 'i:3;', 1, 60, 1, NULL, 1, '[]', 0, NULL, NULL, NULL, '<p>we have 12 months&nbsp;</p>', NULL, '<p>10 + 2</p>', 0, 0, 1, '2021-09-09 18:19:05', '2021-09-09 18:19:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `name`, `code`, `type`, `icon_path`, `short_description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Multiple Choice Single Answer', 'MSA', 'objective', 'msa.png', 'This question type is easy to set up and is the most frequent MCQ question in online exams. Users are allowed to pick just one answer from a list of given options.', 1, NULL, NULL, NULL),
(2, 'Multiple Choice Multiple Answers', 'MMA', 'objective', 'mma.png', 'Multiple Choice Multiple Answers type question allows users to select one or several answers from a list of given options.', 1, NULL, NULL, NULL),
(3, 'True or False', 'TOF', 'objective', 'tof.png', 'A true or false question consists of a statement that requires a true or false response. We can also format the options such as: Yes/No, Correct/Incorrect, and Agree/Disagree.', 1, NULL, NULL, NULL),
(4, 'Short Answer', 'SAQ', 'objective', 'saq.png', 'Short answer questions allow users to provide text or numeric answers. These responses will be validated against the provided possible answers.', 1, NULL, NULL, NULL),
(5, 'Match the Following', 'MTF', 'objective', 'mtf.png', 'A matching question is two adjacent lists of related words, phrases, pictures, or symbols. Each item in one list is paired with at least one item in the other list.', 1, NULL, NULL, NULL),
(6, 'Ordering/Sequence', 'ORD', 'objective', 'ord.png', 'An ordering/sequence question consists of a scrambled list of related words, phrases, pictures, or symbols. The User needs to arrange them in a logical order/sequence.', 1, NULL, NULL, NULL),
(7, 'Fill in the Blanks', 'FIB', 'objective', 'fib.png', 'A Fill in the Blank question consists of a phrase, sentence, or paragraph with a blank space where a student provides the missing word or words.', 1, NULL, NULL, NULL),
(8, 'Long Answer/Paragraph', 'LAQ', 'subjective', 'laq.png', 'In Long answer or paragraph question type is equivalent to essay writing where a student provides a text box to write his response.', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_type_id` bigint(20) UNSIGNED NOT NULL,
  `total_questions` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `total_duration` int(10) UNSIGNED DEFAULT NULL,
  `total_marks` double(5,2) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `price` bigint(20) UNSIGNED DEFAULT NULL,
  `can_redeem` tinyint(1) NOT NULL DEFAULT '0',
  `points_required` int(10) UNSIGNED DEFAULT NULL,
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_private` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `slug`, `code`, `description`, `sub_category_id`, `quiz_type_id`, `total_questions`, `total_duration`, `total_marks`, `is_paid`, `price`, `can_redeem`, `points_required`, `settings`, `is_private`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English exam 1', 'english-exam-1', 'quiz_W6LVszSeprs', '<p>Please answer the correct answer</p>', 1, 4, 1, 60, 1.00, 0, NULL, 0, NULL, '{\"restrict_attempts\":false,\"no_of_attempts\":null,\"disable_question_navigation\":false,\"list_questions\":true,\"auto_duration\":true,\"total_duration\":null,\"auto_grading\":true,\"correct_marks\":null,\"cutoff\":60,\"enable_negative_marking\":false,\"negative_marking_type\":\"fixed\",\"negative_marks\":null,\"disable_finish_button\":false,\"hide_solutions\":false}', 0, 1, '2021-09-09 18:23:55', '2021-09-09 18:32:02', NULL),
(2, 'Maths', 'maths', 'quiz_i9M4pabLZpC', NULL, 1, 1, 1, 60, 1.00, 0, NULL, 0, NULL, '{\"restrict_attempts\":false,\"no_of_attempts\":null,\"disable_question_navigation\":false,\"list_questions\":true,\"auto_duration\":true,\"total_duration\":null,\"auto_grading\":true,\"correct_marks\":null,\"cutoff\":60,\"enable_negative_marking\":false,\"negative_marking_type\":\"fixed\",\"negative_marks\":null,\"disable_finish_button\":false,\"hide_solutions\":false}', 0, 0, '2021-09-10 09:11:49', '2021-09-10 09:12:02', NULL),
(3, 'Maths', 'maths-2', 'quiz_YXROoicNyZ9', NULL, 1, 4, 1, 60, 1.00, 0, NULL, 0, NULL, '{\"restrict_attempts\":false,\"no_of_attempts\":null,\"disable_question_navigation\":false,\"list_questions\":true,\"auto_duration\":true,\"total_duration\":null,\"auto_grading\":true,\"correct_marks\":null,\"cutoff\":60,\"enable_negative_marking\":false,\"negative_marking_type\":\"fixed\",\"negative_marks\":null,\"disable_finish_button\":false,\"hide_solutions\":false}', 1, 1, '2021-09-10 09:12:55', '2021-09-10 09:13:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quiz_id`, `question_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_schedules`
--

CREATE TABLE `quiz_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `grace_period` int(11) NOT NULL DEFAULT '5',
  `send_email` tinyint(1) NOT NULL DEFAULT '0',
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_schedules`
--

INSERT INTO `quiz_schedules` (`id`, `code`, `quiz_id`, `schedule_type`, `start_date`, `start_time`, `end_date`, `end_time`, `grace_period`, `send_email`, `settings`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qsd_V3efTafKd6w', 1, 'fixed', '2021-09-09', '02:00:00', '2021-09-09', '02:01:00', 10, 0, NULL, 'active', '2021-09-09 18:33:12', '2021-09-09 18:33:12', NULL),
(2, 'qsd_khIuHEtocEi', 1, 'flexible', '2021-09-09', '02:00:00', '2021-09-15', '03:00:00', 5, 0, NULL, 'active', '2021-09-09 18:36:11', '2021-09-09 18:36:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sessions`
--

CREATE TABLE `quiz_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_schedule_id` bigint(20) UNSIGNED DEFAULT NULL,
  `starts_at` datetime NOT NULL,
  `ends_at` datetime NOT NULL,
  `total_time_taken` int(11) NOT NULL DEFAULT '0',
  `current_question` int(11) NOT NULL DEFAULT '0',
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'started',
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_sessions`
--

INSERT INTO `quiz_sessions` (`id`, `code`, `quiz_id`, `user_id`, `quiz_schedule_id`, `starts_at`, `ends_at`, `total_time_taken`, `current_question`, `results`, `status`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9149b606-1964-4586-822d-f2f34a91b19d', 1, 3, 2, '2021-09-09 14:36:43', '2021-09-09 14:37:43', 0, 0, '{\"score\":0,\"marks_earned\":0,\"marks_deducted\":0,\"percentage\":0,\"cutoff\":60,\"pass_or_fail\":\"Failed\",\"speed\":0,\"accuracy\":0,\"total_questions\":1,\"total_duration\":1,\"total_marks\":1,\"answered_questions\":0,\"unanswered_questions\":1,\"correct_answered_questions\":0,\"wrong_answered_questions\":0,\"total_time_taken\":{\"seconds\":0,\"short_readable\":\"0:0:0\",\"detailed_readable\":\"0 Sec\"},\"time_taken_for_answered\":{\"seconds\":0,\"short_readable\":\"0:0:0\",\"detailed_readable\":\"0 Sec\"},\"time_taken_for_other\":{\"seconds\":0,\"short_readable\":\"0:0:0\",\"detailed_readable\":\"0 Sec\"},\"time_taken_for_correct_answered\":{\"seconds\":0,\"short_readable\":\"0:0:0\",\"detailed_readable\":\"0 Sec\"},\"time_taken_for_wrong_answered\":{\"seconds\":0,\"short_readable\":\"0:0:0\",\"detailed_readable\":\"0 Sec\"},\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/92.0.4515.131 Safari\\/537.36\",\"ip_address\":\"94.187.0.71\"}', 'completed', '2021-09-09 14:36:58', '2021-09-09 18:36:43', '2021-09-09 18:36:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_session_questions`
--

CREATE TABLE `quiz_session_questions` (
  `quiz_session_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `original_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `user_answer` text COLLATE utf8mb4_unicode_ci,
  `correct_answer` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unanswered',
  `is_correct` tinyint(1) DEFAULT NULL,
  `time_taken` int(11) NOT NULL DEFAULT '0',
  `marks_earned` double(5,2) NOT NULL DEFAULT '0.00',
  `marks_deducted` double(5,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_session_questions`
--

INSERT INTO `quiz_session_questions` (`quiz_session_id`, `question_id`, `original_question`, `options`, `user_answer`, `correct_answer`, `status`, `is_correct`, `time_taken`, `marks_earned`, `marks_deducted`) VALUES
(1, 1, '<p>How many months we have in 1 year</p>', 'a:4:{i:0;s:9:\"<p>10</p>\";i:1;s:8:\"<p>9</p>\";i:2;s:9:\"<p>12</p>\";i:3;s:8:\"<p>6</p>\";}', NULL, 'i:3;', 'not_answered', NULL, 0, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_types`
--

CREATE TABLE `quiz_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_types`
--

INSERT INTO `quiz_types` (`id`, `name`, `code`, `slug`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quiz', 'qtp_lLvoMjFoKRf', 'quiz', NULL, 1, NULL, NULL, NULL),
(2, 'Contest', 'qtp_uqQvsmXRube', 'contest', NULL, 1, NULL, NULL, NULL),
(3, 'Daily Challenge', 'qtp_xJnjmbmgV5E', 'daily-challenge', NULL, 1, NULL, NULL, NULL),
(4, 'Daily Task', 'qtp_dJ7t7b2onxc', 'daily-task', NULL, 1, NULL, NULL, NULL),
(5, 'Hackathon', 'qtp_pALr8tBpML7', 'hackathon', NULL, 1, NULL, NULL, NULL),
(6, 'Assignment', 'qtp_ok3cIEqIHg4', 'assignment', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-09-06 06:29:50', '2021-09-06 06:29:50'),
(2, 'instructor', 'web', '2021-09-06 06:29:50', '2021-09-06 06:29:50'),
(3, 'student', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51'),
(4, 'parent', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51'),
(5, 'guest', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51'),
(6, 'employee', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51'),
(7, 'institute', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51'),
(8, 'candidate', 'web', '2021-09-06 06:29:51', '2021-09-06 06:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `code`, `slug`, `short_description`, `icon_path`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English Exam 1', 'sec_IpdBj5I3hF1', 'english-exam-1', 'this is about leaning letters', NULL, 1, '2021-09-09 18:17:06', '2021-09-09 18:17:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2elVLZhVed5N0xbNuq9M0XZqoWXkwf6iGCG0Lz9Z', NULL, '80.82.77.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWh6d1NEMVpjR1BXMTlwODFTTGxDbnZEMm9NNzRRSnpaZE04em9NZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631220268),
('8DxmAkglfZnYlWWBv0WiYkUjfugVqJ8zpO0bNFSu', 3, '94.187.0.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQlFzdG83MWxDelNjamdaa0lsWENtWDFJOTI1aVluN3E2czdXZkYxOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEJtV0hnV2JUSVR1NFVmRFlGZ0FaZE85bnQ3LkFpdGp3bXBkaTVLVmhwaHFYeS92b2xRdFhXIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRCbVdIZ1diVElUdTRVZkRZRmdBWmRPOW50Ny5BaXRqd21wZGk1S1ZocGhxWHkvdm9sUXRYVyI7fQ==', 1631254143),
('aHy9EF6R9fTnzsMHNJdelR5w2bwS8DtqOXOwUPEJ', NULL, '185.189.182.234', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjNtRmlEbFRHc1c0aWU4ZHFJUGpXS09wcm03VlZmclRSTmt5dVlJUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9ob21ld29yay5jbGFzc3BlcnRzLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1631251637),
('BSmI8KSt9nM46j9YDEWwi0YqHe1GbxMJFCm39nbf', NULL, '49.36.37.49', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnF0UzlIa3M1d2tyd3JpMVJSZzV2UlhSbjdpVWJqWDVpZlBHZU1BNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631178908),
('buPDcVXXQxKXIKMivHPxdFvlajCBBGyNZaYF82JH', NULL, '40.83.182.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHhZY0JmcnNLSlJNN2t6a09ENTI0aWwzYnh1eXlrVTF3dHVWRDVmSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631212882),
('FEQXJCgDyXLDgmrAVzOkd0kx4352QpxmErFKK5A5', NULL, '37.211.98.113', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNW9oWUNTTmNSRkU2TlFHYVNOS1o5RmdLMDhQMmtqbHJ3Z3pzWDg2YiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9ob21ld29yay5jbGFzc3BlcnRzLmNvbS9kYXNoYm9hcmQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cHM6Ly9ob21ld29yay5jbGFzc3BlcnRzLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1631207805),
('gAEmpGb5e2lalfoXGZFiOtJp62mV1MEjQue6zTNe', NULL, '128.14.133.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1F5aEVSbThyaGhiWGhhSks5STA5TUpEd1B5NHhLQm1oWkZTSHpuZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631184926),
('Ge8tR1QcR9yTX20Vs3Kr5ov40ClSI1HjU3lYqjOr', NULL, '91.232.100.207', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXlzd0NpcHBWbkhvMVQyemd0M08zV3Iwbm1EeGZUN053dThTWldLZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631177013),
('gmZKKvMrBdQVvL9Xc5dWfjMB2AG2QEqBzh0rphh3', NULL, '31.192.237.44', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHMyejNwTzNIQmt5Tlg0VHhFWkZiOFJ2Skc0c0RlOVlEcFIzQUlwVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vMTM5LjE2Mi4xMTMuMTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631232789),
('hsBx1QsEaXZ8NoPKupzRKim4ITXnanaNIsM0Bgbv', NULL, '94.187.0.71', 'WhatsApp/2.2134.10 N', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjl6dmUyMmxWcnd1akdWQTZqSk9RSVF3azU0N2dlbmEzY1A2Q0RFWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631192515),
('IYackWvGJsxpMCDyGik17v0s0NprElIQv9WH6h2L', NULL, '49.36.35.47', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVllqZFN5eHJpTndUbXlReEVBaVhSUlgybHc3V2kyZU42VHc0NFZVQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631253466),
('j1EVgXnmPB0h5Vgfb5LtBHvh3R0vadcLsBrPhu81', NULL, '66.249.80.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkdQY1JISTc4bUVNUUUzSndpUXg2OUlKT3BIN3RjTm53aGRLclRUSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631194601),
('JEq6LmSptg6F6xPNlvwtV2UEEsiKqzFRXMFUKcNQ', NULL, '176.107.128.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1JKZnNZdUdXeUtRQXBRZHNGWFpZenNwQ0YwVFZEeXZNdThGNjZoWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631222944),
('jmc5TwdrxJanBDwRXWt1RCgpJkKfm7MyjDT9LBPM', NULL, '184.105.247.196', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieXFEdXdEYmdyMnZLb2ZJZTlTTkw1Y0ZwYkRFTGZkd3FUazVoU3o0VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631243887),
('kIpbTFeMpPLpPvn2pGm8OL71186KrFJJnyFlsYat', 1, '49.36.35.47', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiaEs2bll6bkhOd3NGemZKYjVNWFRmNnJpcWRJZUhpQkx6UHBiZHFXWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2NzoiaHR0cHM6Ly9ob21ld29yay5jbGFzc3BlcnRzLmNvbS9hZG1pbi91c2VyLWdyb3Vwcz9wYWdlPTEmcGVyUGFnZT0xMCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2hvbWV3b3JrLmNsYXNzcGVydHMuY29tL2xvZ2luIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFh1aDFOSjV3WWdLUHFuUFR6OS9SVWV1eUthSUhkYy41b1RJLllKLkl4UFNRYnRZa1owbGw2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRYdWgxTko1d1lnS1BxblBUejkvUlVldXlLYUlIZGMuNW9USS5ZSi5JeFBTUWJ0WWtaMGxsNiI7fQ==', 1631254040),
('PsBNoO45zfMpOjGkrTvdPgtws6ybL4BQAxUT1O8d', NULL, '94.187.0.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXlRNDh6VkRvMDNaOGlXMEtvQnVEazl0SVpyVmpSUEdacHNXMDBOcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO319', 1631208205),
('q0BCE5E76GJ53nMAivUqIXB64qQCxEmY7ailr4Hp', NULL, '27.97.231.109', 'Mozilla/5.0 (Linux; Android 9; ASUS_X00TD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.62 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXRtWWExcFliTmpyN3NSZXVOVElCalBMOE9aRjJQdUJsdFkyRmtqYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9ob21ld29yay5jbGFzc3BlcnRzLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1631176168),
('SFp1ljgP7hETtEujbx796e0cEihDaMCAIG8e7R4z', NULL, '74.125.212.94', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDZIRXdYWTZhSU1BRVdsSnFTOXlDSWRScG1HVDdaSW1yd0lmRlY1YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631193465),
('TAKwMlTzuXHyOniSq913oicSfEQKqFN67HXbMCJR', NULL, '128.14.134.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkY2NllRdmxYbmdOM1duRFFqZXBEeUJOaFRpTE4yM3pzd2VuendZMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631225953),
('UieCN3Yj5zppgw2nkK8cAZVfImaL4ikFBWOtNYnY', NULL, '49.36.37.49', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkxRNWRzRTB2T21WZW8za1NBenBVTmthNnZaSDF2Y2x1b3BlV1BESiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631179676),
('y0gTZqHpdSsDm6sxrFV0lY4pLr4zlgYS4Ez4443z', NULL, '167.71.79.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkF1M2ZmSjV2Q1gwN1NwVE5saFpZT2pXZzJVUFQ1bG5XWDhGa0hOQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631223814),
('y2H9nmD4xPtzBuixUvfKE1NI9KqkdkGzdbHGZGnw', NULL, '52.114.14.71', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaE5Za2dyOUI0RDlKMUdTUVhDamNBbXhNM3c1c3J3bWlHeG9scWlPQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631175984),
('yJtlMFWDJA1QDWiFY3ARkHFyB8ryUqe8l30ogynR', NULL, '183.136.225.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3ZYazNzeWtFN1lIbjJaNVBoODRseXUwUHVwZ01kazFtMWZBRGpodCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vNjkuMTY3LjE1Mi4xNTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631244908),
('Z3ANmndSWptCU8F9p0dE6abtdSubCuiN5zLWpowj', NULL, '49.36.37.49', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2ZqT1pMMEtOWWQwb2VJWnBOQThjWXJib1BsVlZwb2NlV0I2dUJCeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vaG9tZXdvcmsuY2xhc3NwZXJ0cy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631193478);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group`, `name`, `locked`, `payload`, `created_at`, `updated_at`) VALUES
(1, 'site', 'app_name', 0, '\"QwikTest\"', '2021-09-06 06:29:32', '2021-09-06 06:29:32'),
(2, 'site', 'tag_line', 0, '\"Everything You Need For Your Exam Preparation.\"', '2021-09-06 06:29:32', '2021-09-06 06:29:32'),
(3, 'site', 'seo_description', 0, '\"Qwiktest Pro is an online test examination software and assessment tool that assists educational institutions,corporate companies to create and conduct web and mobile based exams.\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(4, 'site', 'logo_path', 0, '\"site\\/logo.png\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(5, 'site', 'can_register', 0, 'true', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(6, 'site', 'favicon_path', 0, '\"site\\/favicon.png\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(7, 'home_page', 'hero_title', 0, '\"\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(8, 'home_page', 'hero_subtitle', 0, '\"\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(9, 'home_page', 'hero_cta_text', 0, '\"Get Started\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(10, 'home_page', 'hero_image_path', 0, '\"site\\/hero_image_bg.png\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(11, 'localization', 'default_locale', 0, '\"en\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(12, 'localization', 'default_timezone', 0, '\"UTC\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(13, 'email', 'host', 0, '\"smtp.mailtrap.io\"', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(14, 'email', 'port', 0, '2525', '2021-09-06 06:29:33', '2021-09-06 06:29:33'),
(15, 'email', 'username', 0, '\"username\"', '2021-09-06 06:29:34', '2021-09-06 06:29:34'),
(16, 'email', 'password', 0, '\"password\"', '2021-09-06 06:29:34', '2021-09-06 06:29:34'),
(17, 'email', 'encryption', 0, '\"tls\"', '2021-09-06 06:29:34', '2021-09-06 06:29:34'),
(18, 'email', 'from_address', 0, '\"admin@qwiktest.com\"', '2021-09-06 06:29:34', '2021-09-06 06:29:34'),
(19, 'email', 'from_name', 0, '\"QwikTest\"', '2021-09-06 06:29:34', '2021-09-06 06:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `code`, `slug`, `section_id`, `short_description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Learn English skills', 'skl_OLDorT563NK', 'learn-english-skills', 1, 'english skills', 1, '2021-09-09 18:17:43', '2021-09-09 18:17:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `code`, `slug`, `category_id`, `sub_category_type_id`, `short_description`, `description`, `image_path`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English Skills', 'sub_cObzmqdNgXf', 'english-skills', 1, '9', NULL, NULL, NULL, 1, '2021-09-09 18:23:08', '2021-09-09 18:23:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_sections`
--

CREATE TABLE `sub_category_sections` (
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_types`
--

CREATE TABLE `sub_category_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_types`
--

INSERT INTO `sub_category_types` (`id`, `name`, `code`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Course', 'course', 1, NULL, NULL, NULL),
(2, 'Certification', 'certification', 1, NULL, NULL, NULL),
(3, 'Class', 'class', 1, NULL, NULL, NULL),
(4, 'Exam', 'exam', 1, NULL, NULL, NULL),
(5, 'Grade', 'grade', 1, NULL, NULL, NULL),
(6, 'Standard', 'standard', 1, NULL, NULL, NULL),
(7, 'Stream', 'stream', 1, NULL, NULL, NULL),
(8, 'Level', 'level', 1, NULL, NULL, NULL),
(9, 'Skill', 'skill', 1, NULL, NULL, NULL),
(10, 'Branch', 'branch', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `code`, `slug`, `skill_id`, `short_description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English Topic 1', 'top_3MLUjVOwL8d', 'english-topic-1', 1, 'English topic 1', 1, '2021-09-09 18:18:03', '2021-09-09 18:18:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT '0',
  `fee` decimal(64,0) NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code_expires_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `email_verified_at`, `mobile`, `mobile_verified_at`, `verification_code`, `verification_code_expires_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'QwikTest', 'Admin', 'admin', 'admin@qwiktest.com', '2021-09-06 06:29:51', NULL, NULL, NULL, NULL, '$2y$10$Xuh1NJ5wYgKPqnPTz9/RUeuyKaIHdc.5oTI.YJ.IxPSQbtYkZ0ll6', NULL, NULL, NULL, NULL, 'profile-photos/7dzmN3Y1xk95rHWMnuqzE27B0Y8XX9N06SeKN7yp.png', 1, '2021-09-06 06:29:52', '2021-09-09 13:19:56', NULL),
(2, 'marc', 'assaad', 'marc', 'marc@gmail.com', '2021-09-06 06:29:51', NULL, NULL, NULL, NULL, '$2y$10$qbUZvQqwFrUZM576n0rcI.BJxEJvZWvXrrDc5.zE2t2PVj9NNMluG', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-09 17:06:35', '2021-09-09 17:08:06', NULL),
(3, 'anthony', 'assaad', 'anthony', 'anthony@gmail.com', '2021-09-06 06:29:51', NULL, NULL, NULL, NULL, '$2y$10$BmWHgWbTITu4UfDYFgAZdO9nt7.Aitjwmpdi5KVhphqXy/volQtXW', NULL, NULL, NULL, NULL, NULL, 1, '2021-09-09 17:07:53', '2021-09-09 17:07:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_private` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `code`, `slug`, `description`, `is_private`, `is_active`, `settings`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jawahir1', 'ugp_N6IuzvFMJUe', 'jawahir1', NULL, 1, 1, NULL, '2021-09-09 17:07:09', '2021-09-09 18:50:08', NULL),
(2, 'jawahir2', 'ugp_nQJWqUJW1VE', 'jawahir2', NULL, 0, 1, NULL, '2021-09-09 18:49:21', '2021-09-09 18:49:21', NULL),
(3, '(Primary) - Girls Grade1 A-AR', 'ugp_cHO98iwOrs2', 'primary-girls-grade1-a-ar', NULL, 1, 1, NULL, '2021-09-10 08:58:15', '2021-09-10 09:16:21', NULL),
(4, '(Primary) - Girls Grade1 A-UR', 'ugp_1Ii3lDXeUiZ', 'primary-girls-grade1-a-ur', NULL, 0, 1, NULL, '2021-09-10 08:58:55', '2021-09-10 08:58:55', NULL),
(5, '(Primary) - Girls Grade1 B-AR', 'ugp_TjOYeuVclBE', 'primary-girls-grade1-b-ar', NULL, 0, 1, NULL, '2021-09-10 08:59:12', '2021-09-10 08:59:12', NULL),
(6, '(Primary) - Girls Grade1 B-UR', 'ugp_ZhhJ8hj5D7W', 'primary-girls-grade1-b-ur', NULL, 0, 1, NULL, '2021-09-10 08:59:32', '2021-09-10 08:59:32', NULL),
(7, '(Primary) - Girls Grade2 A-AR', 'ugp_sekieatxl5h', 'primary-girls-grade2-a-ar', NULL, 0, 1, NULL, '2021-09-10 08:59:44', '2021-09-10 08:59:44', NULL),
(8, '(Primary) - Girls Grade2 A-UR', 'ugp_vvxUt2pp8QG', 'primary-girls-grade2-a-ur', NULL, 0, 1, NULL, '2021-09-10 08:59:54', '2021-09-10 08:59:54', NULL),
(9, '(Primary) - Girls Grade2 B-AR', 'ugp_66QFWOmInc2', 'primary-girls-grade2-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:00:03', '2021-09-10 09:00:03', NULL),
(10, '(Primary) - Girls Grade2 B-UR', 'ugp_ErqJWzEVYtu', 'primary-girls-grade2-b-ur', NULL, 0, 1, NULL, '2021-09-10 09:00:23', '2021-09-10 09:00:23', NULL),
(11, '(Primary) - Girls Grade3 A-AR', 'ugp_l2ezLQ0TWqQ', 'primary-girls-grade3-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:00:33', '2021-09-10 09:00:33', NULL),
(12, '(Primary) - Girls Grade3 A-UR', 'ugp_Df83bIZ3sJi', 'primary-girls-grade3-a-ur', NULL, 0, 1, NULL, '2021-09-10 09:00:48', '2021-09-10 09:00:48', NULL),
(13, '(Primary) - Girls Grade3 B-AR', 'ugp_aYf3PwOpR8y', 'primary-girls-grade3-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:01:00', '2021-09-10 09:01:00', NULL),
(14, '(Primary) - Girls Grade3 B-UR', 'ugp_xPsBHcuABa8', 'primary-girls-grade3-b-ur', NULL, 0, 1, NULL, '2021-09-10 09:01:18', '2021-09-10 09:01:18', NULL),
(15, '(Primary) - Girls Grade3 C-AR', 'ugp_7WZ1YiXMYFo', 'primary-girls-grade3-c-ar', NULL, 0, 1, NULL, '2021-09-10 09:01:29', '2021-09-10 09:01:29', NULL),
(16, '(Primary) - Girls Grade3 C-UR', 'ugp_E5tLgeg2hYO', 'primary-girls-grade3-c-ur', NULL, 0, 1, NULL, '2021-09-10 09:01:37', '2021-09-10 09:01:37', NULL),
(17, '(Primary) - Girls Grade3 D-AR', 'ugp_gfkIRP61Bl4', 'primary-girls-grade3-d-ar', NULL, 0, 1, NULL, '2021-09-10 09:01:45', '2021-09-10 09:01:45', NULL),
(18, '(Primary) - Girls Grade3 D-UR', 'ugp_15g5VphTvC9', 'primary-girls-grade3-d-ur', NULL, 0, 1, NULL, '2021-09-10 09:01:51', '2021-09-10 09:01:51', NULL),
(19, '(Primary) - Girls Grade4 A-AR', 'ugp_slX0mZ9uKIe', 'primary-girls-grade4-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:01:58', '2021-09-10 09:01:58', NULL),
(20, '(Primary) - Girls Grade4 A-UR', 'ugp_4SWJ2ZoemCn', 'primary-girls-grade4-a-ur', NULL, 0, 1, NULL, '2021-09-10 09:02:04', '2021-09-10 09:02:04', NULL),
(21, '(Primary) - Girls Grade4 B-AR', 'ugp_wUHr4JH7DgB', 'primary-girls-grade4-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:02:10', '2021-09-10 09:02:10', NULL),
(22, '(Primary) - Girls Grade4 B-UR', 'ugp_yhFtUa0ul7l', 'primary-girls-grade4-b-ur', NULL, 0, 1, NULL, '2021-09-10 09:02:15', '2021-09-10 09:02:15', NULL),
(23, '(Primary) - Girls Grade5 A-AR', 'ugp_VVU2WwFPpYV', 'primary-girls-grade5-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:02:23', '2021-09-10 09:02:23', NULL),
(24, '(Primary) - Girls Grade5 B-AR', 'ugp_hj4H9cAiT8H', 'primary-girls-grade5-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:02:29', '2021-09-10 09:02:29', NULL),
(25, '(Primary) - Girls Grade6 A-AR', 'ugp_OIvsF1q6gJt', 'primary-girls-grade6-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:02:35', '2021-09-10 09:02:35', NULL),
(26, '(Primary) - Girls Grade6 A-UR', 'ugp_EsaxQQXt3LF', 'primary-girls-grade6-a-ur', NULL, 0, 1, NULL, '2021-09-10 09:02:41', '2021-09-10 09:02:41', NULL),
(27, '(Middle) - Girls Grade7 B-AR', 'ugp_b9xr60pvvf3', 'middle-girls-grade7-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:02:46', '2021-09-10 09:02:46', NULL),
(28, '(Middle) - Girls Grade7 B-UR', 'ugp_lTp7N4ejk2u', 'middle-girls-grade7-b-ur', NULL, 0, 1, NULL, '2021-09-10 09:02:53', '2021-09-10 09:02:53', NULL),
(29, '(Middle) - Girls Grade8 A-AR', 'ugp_AFDD8lezbB1', 'middle-girls-grade8-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:03:00', '2021-09-10 09:03:00', NULL),
(30, '(Middle) - Girls Grade8 B-AR', 'ugp_v4n68tif2Hx', 'middle-girls-grade8-b-ar', NULL, 0, 1, NULL, '2021-09-10 09:03:06', '2021-09-10 09:03:06', NULL),
(31, '(Middle) - Girls Grade8 B-UR', 'ugp_O7qF7b6ABl7', 'middle-girls-grade8-b-ur', NULL, 0, 1, NULL, '2021-09-10 09:03:11', '2021-09-10 09:03:11', NULL),
(32, '(Middle) - Girls Grade9 A-AR', 'ugp_2FHaSllFJym', 'middle-girls-grade9-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:03:18', '2021-09-10 09:03:18', NULL),
(33, '(High School)- Girls Grade10 A-AR', 'ugp_ywTKvB2tZ4V', 'high-school-girls-grade10-a-ar', NULL, 0, 1, NULL, '2021-09-10 09:03:23', '2021-09-10 09:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_quiz_schedules`
--

CREATE TABLE `user_group_quiz_schedules` (
  `quiz_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_group_quiz_schedules`
--

INSERT INTO `user_group_quiz_schedules` (`quiz_schedule_id`, `user_group_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_users`
--

CREATE TABLE `user_group_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) UNSIGNED NOT NULL,
  `joined_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_group_users`
--

INSERT INTO `user_group_users` (`user_id`, `user_group_id`, `joined_at`) VALUES
(2, 1, NULL),
(2, 2, NULL),
(3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `balance` decimal(64,0) NOT NULL DEFAULT '0',
  `decimal_places` smallint(6) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `description`, `meta`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Default Wallet', 'default', NULL, '[]', 0, 2, '2021-09-06 06:35:48', '2021-09-06 06:35:48'),
(2, 'App\\Models\\User', 2, 'Default Wallet', 'default', NULL, '[]', 0, 2, '2021-09-09 17:07:15', '2021-09-09 17:07:15'),
(3, 'App\\Models\\User', 3, 'Default Wallet', 'default', NULL, '[]', 0, 2, '2021-09-09 17:09:38', '2021-09-09 17:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comprehension_passages`
--
ALTER TABLE `comprehension_passages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comprehension_passages_code_unique` (`code`);

--
-- Indexes for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `difficulty_levels_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `practice_sessions`
--
ALTER TABLE `practice_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `practice_sessions_code_unique` (`code`),
  ADD KEY `practice_sessions_status_index` (`status`);

--
-- Indexes for table `practice_session_questions`
--
ALTER TABLE `practice_session_questions`
  ADD PRIMARY KEY (`practice_session_id`,`question_id`);

--
-- Indexes for table `practice_sets`
--
ALTER TABLE `practice_sets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `practice_sets_slug_unique` (`slug`),
  ADD UNIQUE KEY `practice_sets_code_unique` (`code`),
  ADD KEY `practice_sets_skill_id_foreign` (`skill_id`),
  ADD KEY `practice_sets_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `practice_set_questions`
--
ALTER TABLE `practice_set_questions`
  ADD PRIMARY KEY (`practice_set_id`,`question_id`),
  ADD KEY `practice_set_questions_question_id_foreign` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `questions_code_unique` (`code`),
  ADD KEY `questions_skill_id_foreign` (`skill_id`),
  ADD KEY `questions_topic_id_foreign` (`topic_id`),
  ADD KEY `questions_comprehension_passage_id_foreign` (`comprehension_passage_id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question_types_code_unique` (`code`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quizzes_slug_unique` (`slug`),
  ADD UNIQUE KEY `quizzes_code_unique` (`code`),
  ADD KEY `quizzes_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quiz_id`,`question_id`),
  ADD KEY `quiz_questions_question_id_foreign` (`question_id`);

--
-- Indexes for table `quiz_schedules`
--
ALTER TABLE `quiz_schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quiz_schedules_code_unique` (`code`);

--
-- Indexes for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quiz_sessions_code_unique` (`code`),
  ADD KEY `quiz_sessions_status_index` (`status`);

--
-- Indexes for table `quiz_session_questions`
--
ALTER TABLE `quiz_session_questions`
  ADD PRIMARY KEY (`quiz_session_id`,`question_id`);

--
-- Indexes for table `quiz_types`
--
ALTER TABLE `quiz_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quiz_types_code_unique` (`code`),
  ADD UNIQUE KEY `quiz_types_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_code_unique` (`code`),
  ADD UNIQUE KEY `sections_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_group_index` (`group`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_code_unique` (`code`),
  ADD UNIQUE KEY `skills_slug_unique` (`slug`),
  ADD KEY `skills_section_id_foreign` (`section_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_code_unique` (`code`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_category_sections`
--
ALTER TABLE `sub_category_sections`
  ADD PRIMARY KEY (`sub_category_id`,`section_id`),
  ADD KEY `sub_category_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `sub_category_types`
--
ALTER TABLE `sub_category_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_category_types_code_unique` (`code`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topics_code_unique` (`code`),
  ADD UNIQUE KEY `topics_slug_unique` (`slug`),
  ADD KEY `topics_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_groups_code_unique` (`code`),
  ADD UNIQUE KEY `user_groups_slug_unique` (`slug`);

--
-- Indexes for table `user_group_quiz_schedules`
--
ALTER TABLE `user_group_quiz_schedules`
  ADD PRIMARY KEY (`quiz_schedule_id`,`user_group_id`),
  ADD KEY `user_group_quiz_schedules_user_group_id_foreign` (`user_group_id`);

--
-- Indexes for table `user_group_users`
--
ALTER TABLE `user_group_users`
  ADD PRIMARY KEY (`user_id`,`user_group_id`),
  ADD KEY `user_group_users_user_group_id_foreign` (`user_group_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comprehension_passages`
--
ALTER TABLE `comprehension_passages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `difficulty_levels`
--
ALTER TABLE `difficulty_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practice_sessions`
--
ALTER TABLE `practice_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practice_sets`
--
ALTER TABLE `practice_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_schedules`
--
ALTER TABLE `quiz_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_types`
--
ALTER TABLE `quiz_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category_types`
--
ALTER TABLE `sub_category_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `practice_sets`
--
ALTER TABLE `practice_sets`
  ADD CONSTRAINT `practice_sets_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `practice_sets_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `practice_set_questions`
--
ALTER TABLE `practice_set_questions`
  ADD CONSTRAINT `practice_set_questions_practice_set_id_foreign` FOREIGN KEY (`practice_set_id`) REFERENCES `practice_sets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `practice_set_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_comprehension_passage_id_foreign` FOREIGN KEY (`comprehension_passage_id`) REFERENCES `comprehension_passages` (`id`),
  ADD CONSTRAINT `questions_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `questions_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sub_category_sections`
--
ALTER TABLE `sub_category_sections`
  ADD CONSTRAINT `sub_category_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_category_sections_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_group_quiz_schedules`
--
ALTER TABLE `user_group_quiz_schedules`
  ADD CONSTRAINT `user_group_quiz_schedules_quiz_schedule_id_foreign` FOREIGN KEY (`quiz_schedule_id`) REFERENCES `quiz_schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_group_quiz_schedules_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_group_users`
--
ALTER TABLE `user_group_users`
  ADD CONSTRAINT `user_group_users_user_group_id_foreign` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
