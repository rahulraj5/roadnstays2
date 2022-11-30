-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2022 at 10:47 AM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roadnstay_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_choose_us`
--

CREATE TABLE `about_choose_us` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `subheading` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_choose_us`
--

INSERT INTO `about_choose_us` (`id`, `heading`, `subheading`, `created_at`, `updated_at`) VALUES
(1, 'Newly Space', 'We use latest technology for the latest world because we know the demand of peoples.', '2022-09-13 07:51:09', '2022-09-13 05:51:23'),
(2, 'Creative Guide', 'We are always creative and and always lisen our costomers and we mix these two things and make beast design.', '2022-09-13 07:51:26', '2022-09-13 06:27:42'),
(3, '24 x 7 User Support', 'If our customer has any problem and any query we are always happy to help then.', '2022-09-13 07:51:26', '2022-09-13 05:52:14'),
(4, 'Business Growth', 'Everyone wants to live on top of the mountain, but all the happiness and growth occurs while you\'re climbing it', '2022-09-13 07:52:22', '2022-09-13 05:53:10'),
(5, 'Market Strategy', 'Holding back technology to preserve broken business models is like allowing blacksmiths to veto the internal combustion engine in order to protect their horseshoes.', '2022-09-13 07:52:22', '2022-09-13 06:27:11'),
(6, 'Affordable cost', 'Love is a special word, and I use it only when I mean it. You say the word too much and it becomes cheap.', '2022-09-13 07:53:12', '2022-09-15 06:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_banner`
--

CREATE TABLE `about_us_banner` (
  `id` int(11) NOT NULL,
  `images` text NOT NULL,
  `heading` text NOT NULL,
  `sub_heading` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_banner`
--

INSERT INTO `about_us_banner` (`id`, `images`, `heading`, `sub_heading`, `created_at`, `updated_at`) VALUES
(1, 'about.jpg', 'RoadNstays', 'Skyler Associates', '2022-09-13 06:58:07', '2022-09-14 03:34:14'),
(2, 'about2.jpg', '24/7 Service', 'Always be there For You!', '2022-09-13 06:58:59', '2022-09-13 05:00:51'),
(3, 'about3.jpg', 'Best Service in Town', 'Find a great deal on a hotel for tonight or an upcoming trip', '2022-09-13 07:02:07', '2022-09-13 05:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_content_section`
--

CREATE TABLE `about_us_content_section` (
  `id` int(11) NOT NULL,
  `content_image` text NOT NULL,
  `image_heading` text NOT NULL,
  `image_subheading` text NOT NULL,
  `content_heading` text NOT NULL,
  `content_subheading` text NOT NULL,
  `about_content` text NOT NULL,
  `button_name` text NOT NULL,
  `button_url` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_content_section`
--

INSERT INTO `about_us_content_section` (`id`, `content_image`, `image_heading`, `image_subheading`, `content_heading`, `content_subheading`, `about_content`, `button_name`, `button_url`, `created_at`, `updated_at`) VALUES
(1, 'about.jpg', 'RoadNstays', 'Skyler Associates', 'Know More', 'About RoadNstays', '<div class=\"text\">Road N Stays is passionate about providing clean and safe lodgings for travellers at an economical price point. We stand with the people on the move and we understand their pulse for stays away from home. We run a network of customer experience executives who are professionally trained to facilitate sanitized and comfortable rooms in a reliable environment for you to rest and relax. Moreover, our platform is a single source of reference for all your invoicing and billing requirements.\r\n</div>\r\n<div class=\"text\">\r\n                    Book with us and enjoy your tour.\r\n\r\n                    </div>', 'Contact Us', '#', '2022-09-13 07:22:29', '2022-09-13 10:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admin_address` varchar(100) DEFAULT NULL,
  `admin_city` varchar(100) DEFAULT NULL,
  `admin_state` varchar(100) DEFAULT NULL,
  `admin_country` varchar(100) DEFAULT NULL,
  `admin_postal_code` varchar(100) DEFAULT NULL,
  `admin_number` varchar(100) DEFAULT NULL,
  `tour_op_name` varchar(100) DEFAULT NULL,
  `tour_op_contact_name` varchar(100) DEFAULT NULL,
  `num_dialcode_2` varchar(100) DEFAULT NULL,
  `country_iso2_code2` varchar(100) DEFAULT NULL,
  `tour_op_contact_num` varchar(100) DEFAULT NULL,
  `tour_op_email` varchar(100) DEFAULT NULL,
  `num_dialcode_3` varchar(100) DEFAULT NULL,
  `country_iso2_code3` varchar(100) DEFAULT NULL,
  `tour_op_booking_num` int(11) DEFAULT NULL,
  `tour_office_address` varchar(100) DEFAULT NULL,
  `tour_op_instagram` varchar(100) DEFAULT NULL,
  `tour_op_facebook` varchar(100) DEFAULT NULL,
  `tour_op_web_add` varchar(100) DEFAULT NULL,
  `tour_op_tiktok` varchar(100) DEFAULT NULL,
  `tour_op_youtube` varchar(100) DEFAULT NULL,
  `tour_op_bank_name` varchar(100) DEFAULT NULL,
  `tour_op_account_title` varchar(100) DEFAULT NULL,
  `tour_op_account_num` int(11) DEFAULT NULL,
  `tour_op_branch` varchar(100) DEFAULT NULL,
  `tour_op_easypaisa_num` varchar(100) DEFAULT NULL,
  `tour_op_easypaisa_name` varchar(100) DEFAULT NULL,
  `tour_op_jazzcash_num` varchar(100) DEFAULT NULL,
  `tour_op_jazzcash_name` varchar(100) DEFAULT NULL,
  `tour_op_notes` text DEFAULT NULL,
  `tour_contract_date` date DEFAULT NULL,
  `tour_contract_terms` varchar(100) DEFAULT NULL,
  `tour_op_document` varchar(100) DEFAULT NULL,
  `tour_op_img` varchar(100) DEFAULT NULL,
  `tour_op_id_front_img` varchar(100) DEFAULT NULL,
  `tour_op_id_back_img` varchar(100) DEFAULT NULL,
  `tour_op_id_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `admin_address`, `admin_city`, `admin_state`, `admin_country`, `admin_postal_code`, `admin_number`, `tour_op_name`, `tour_op_contact_name`, `num_dialcode_2`, `country_iso2_code2`, `tour_op_contact_num`, `tour_op_email`, `num_dialcode_3`, `country_iso2_code3`, `tour_op_booking_num`, `tour_office_address`, `tour_op_instagram`, `tour_op_facebook`, `tour_op_web_add`, `tour_op_tiktok`, `tour_op_youtube`, `tour_op_bank_name`, `tour_op_account_title`, `tour_op_account_num`, `tour_op_branch`, `tour_op_easypaisa_num`, `tour_op_easypaisa_name`, `tour_op_jazzcash_num`, `tour_op_jazzcash_name`, `tour_op_notes`, `tour_contract_date`, `tour_contract_terms`, `tour_op_document`, `tour_op_img`, `tour_op_id_front_img`, `tour_op_id_back_img`, `tour_op_id_number`, `created_at`, `updated_at`) VALUES
(1, 'RoadnStays Admin', 'admin@gmail.com', NULL, '$2y$10$MhWnBFhDk2ruulwlWeEni.JfhPOTqhsAnePBs/E9aZqErI9B6At7q', NULL, 'Lahore', 'Lahore', 'Panjab', 'Pakistan', '05499', '+92 342 4514629', 'Gilgit Baltistan Tourism Club', 'Admin', '92', 'pk', '+92 342 4514629', 'admin@gmail.com', '1', 'us', 2147483647, 'Vijay Nagar', 'instagram.com', 'https://vm.tiktok.com/gbtourism786', 'https://vm.tiktok.com/gbtourism786', 'https://vm.tiktok.com/gbtourism786', 'https://www.youtube.com', 'Habib Bank Limited', 'Jumail haider', 2147483647, 'indore', '4564654454', 'Jumail Haider', '4564654454', 'Jumail Haider', 'sdfsdf', '2022-08-27', 'dfsdf', NULL, '1655969332_pexels-naim-benjelloun-2029722-1661409093.jpg', '1655969332_pexels-naim-benjelloun-2029722-1661409093.jpg', '1655294814_monte-1661409093.jpg', '546654SDFSD', '2022-05-19 01:44:25', '2022-05-19 01:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_type`
--

CREATE TABLE `amenities_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amenity_name_type` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities_type`
--

INSERT INTO `amenities_type` (`id`, `name`, `amenity_name_type`, `status`) VALUES
(1, 'Room Amenitie', 'Room_Amenities', 1),
(2, 'Bathroom', 'Bathroom', 1),
(3, 'Media and Technology', 'Media_and_Technology', 1),
(4, 'Food & drinks', 'Food_&_drink', 1),
(5, 'Outdoor and views', 'Outdoor_and_view', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `earlybird_discount` int(11) DEFAULT NULL,
  `cleaning_fee` double(10,2) DEFAULT NULL,
  `city_fee` double(10,2) DEFAULT NULL,
  `tax_percentage` double(10,2) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `booking_status` enum('pending','processing','canceled','confirmed') DEFAULT NULL,
  `cancel_reason` varchar(255) DEFAULT NULL,
  `cancel_details` text DEFAULT NULL,
  `refund_status` enum('pending','processing','canceled','confirmed') NOT NULL DEFAULT 'pending',
  `canceled_at` datetime DEFAULT NULL,
  `refund_processed_at` datetime DEFAULT NULL,
  `refund_credited_at` datetime DEFAULT NULL,
  `refund_amount` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_token` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `total_days`, `total_room`, `total_member`, `coupon_code`, `discount`, `earlybird_discount`, `cleaning_fee`, `city_fee`, `tax_percentage`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `booking_status`, `cancel_reason`, `cancel_details`, `refund_status`, `canceled_at`, `refund_processed_at`, `refund_credited_at`, `refund_amount`, `payment_id`, `payment_token`, `payer_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(288, 1151, 409, 1053, '2022-10-22', '2022-10-23', 1, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 2310.00, 1, 924.00, 1386.00, 'canceled', 'Change of dates or destination', NULL, 'processing', '2022-10-19 18:03:56', '2022-10-19 18:51:27', NULL, '724', '493408', '909548178600', NULL, '1', 'Paid', '2022-10-19 11:22:08', '2022-10-19 13:21:27'),
(289, 1079, 409, 1053, '2022-11-09', '2022-11-11', 2, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 4310.00, 1, 1724.00, 2586.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '1070220', '643898754766', NULL, '1', 'Paid', '2022-10-27 06:16:35', '2022-10-27 05:46:35'),
(290, 837, 666, 1320, '2022-10-29', '2022-10-30', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 31.00, 0.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '1550370', '384218617446', NULL, '3', 'Paid', '2022-10-29 06:37:14', '2022-10-29 06:07:14'),
(291, 1151, 524, 1054, '2022-11-09', '2022-11-10', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 16.00, 2011.00, 0, 2011.00, 0.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '183611', '463470113933', NULL, '1', 'Paid', '2022-10-29 08:49:37', '2022-10-29 08:19:37'),
(292, 1151, 458, 1035, '2022-11-09', '2022-11-10', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 16.00, 1991.00, 1, 398.00, 1593.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '665381', '467950848558', NULL, '1', 'Paid', '2022-10-29 08:56:49', '2022-10-29 08:26:49'),
(293, 1151, 458, 1037, '2022-11-09', '2022-11-10', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 16.00, 3516.00, 1, 703.00, 2813.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '593145', '471750626379', NULL, '1', 'Paid', '2022-10-29 09:03:05', '2022-10-29 08:33:05'),
(294, 1151, 458, 1035, '2022-10-29', '2022-10-30', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 16.00, 1991.00, 1, 398.00, 1593.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '1622612', '515800072910', NULL, '1', 'Paid', '2022-10-29 10:16:32', '2022-10-29 09:46:32'),
(295, 837, 524, 1054, '2022-10-29', '2022-10-30', 1, 1, 1, NULL, NULL, NULL, 0.00, 0.00, 16.00, 2011.00, 0, 2011.00, 0.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '116292', '526628627272', NULL, '3', 'Paid', '2022-10-29 10:34:34', '2022-10-29 10:04:34'),
(316, 1151, 409, 1053, '2022-12-06', '2022-12-07', 1, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 2110.00, 0, 0.00, 2110.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-01 10:55:11', '2022-11-01 10:25:11'),
(317, 837, 666, 1320, '2022-11-01', '2022-11-02', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-01 13:02:56', '2022-11-01 12:32:56'),
(318, 837, 666, 1322, '2022-11-01', '2022-11-02', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-01 13:13:24', '2022-11-01 12:43:24'),
(319, 837, 667, 1326, '2022-11-02', '2022-11-03', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 31.00, 0.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '440777', '808976983237', NULL, '3', 'Paid', '2022-11-02 05:45:06', '2022-11-02 05:15:06'),
(321, 837, 666, 1324, '2022-11-02', '2022-11-03', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-02 07:49:17', '2022-11-02 07:19:17'),
(323, 837, 666, 1320, '2022-11-03', '2022-11-04', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-03 07:23:03', '2022-11-03 06:53:03'),
(324, 837, 409, 1053, '2022-11-03', '2022-11-04', 1, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 2310.00, 0, 0.00, 2310.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-03 09:35:39', '2022-11-03 09:05:39'),
(326, 837, 667, 1326, '2022-11-04', '2022-11-05', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 31.00, 0.00, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '676248', '666323002323', NULL, '3', 'Paid', '2022-11-04 09:20:46', '2022-11-04 08:50:46'),
(328, 837, 409, 1053, '2022-11-05', '2022-11-06', 1, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 2310.00, 0, 0.00, 2310.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-05 13:16:40', '2022-11-05 12:46:40'),
(331, 837, 666, 1320, '2022-11-09', '2022-11-10', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-09 07:29:21', '2022-11-09 06:59:21'),
(336, 837, 666, 1320, '2022-11-15', '2022-11-16', 1, 1, 1, NULL, NULL, NULL, 10.00, 10.00, 1.00, 31.00, 0, 0.00, 31.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', 'Offline', '2022-11-15 06:46:01', '2022-11-15 06:16:01'),
(340, 1315, 409, 1053, '2022-11-17', '2022-11-18', 1, 1, 1, NULL, NULL, NULL, 200.00, 100.00, 10.00, 2310.00, 1, 924.00, 1386.00, 'pending', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'failed', '2022-11-17 09:32:29', '2022-11-17 09:30:55'),
(360, 1221, 409, 1053, '0000-00-00', '0000-00-00', 0, 6, 1, NULL, NULL, NULL, 200.00, 100.00, NULL, 0.00, 0, NULL, NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'COD', 'COD', '2022-11-29 09:23:37', '2022-11-29 08:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `booking_temp`
--

CREATE TABLE `booking_temp` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `paccess_token` varchar(255) DEFAULT NULL,
  `token_id` varbinary(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `cleaning_fee` float(10,2) DEFAULT NULL,
  `city_fee` float(10,2) DEFAULT NULL,
  `tax_percentage` float(10,2) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `earlybird_discount` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `total_amount` float(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` float(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` float(10,2) DEFAULT NULL,
  `pay_amount` float(10,2) DEFAULT NULL,
  `online_payment_amount` float(10,2) DEFAULT NULL,
  `desk_payment_amount` float(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_temp`
--

INSERT INTO `booking_temp` (`id`, `payment_id`, `paccess_token`, `token_id`, `user_id`, `hotel_id`, `room_id`, `check_in`, `check_out`, `cleaning_fee`, `city_fee`, `tax_percentage`, `total_days`, `total_room`, `total_member`, `coupon_code`, `earlybird_discount`, `discount`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `pay_amount`, `online_payment_amount`, `desk_payment_amount`, `created_at`, `updated_at`) VALUES
(442, '868496', NULL, NULL, 1, 409, 1053, '2022-10-19', '2022-10-20', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-10-19 15:28:42', '2022-10-19 09:58:42'),
(443, '493408', NULL, NULL, 1, 409, 1053, '2022-10-22', '2022-10-23', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-10-19 16:10:11', '2022-10-19 10:40:11'),
(444, '929104', NULL, NULL, 1, 409, 1053, '2022-11-09', '2022-11-11', 200.00, 100.00, 10.00, 2, 1, 1, NULL, NULL, NULL, 4310.00, 1, 1724.00, 2586.00, NULL, NULL, NULL, '2022-10-27 11:12:18', '2022-10-27 05:42:18'),
(445, '1070220', NULL, NULL, 1, 409, 1053, '2022-11-09', '2022-11-11', 200.00, 100.00, 10.00, 2, 1, 1, NULL, NULL, NULL, 4310.00, 1, 1724.00, 2586.00, NULL, NULL, NULL, '2022-10-27 11:15:42', '2022-10-27 05:45:42'),
(446, '1550370', NULL, NULL, 1, 666, 1320, '2022-10-29', '2022-10-30', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-10-29 11:34:34', '2022-10-29 06:04:34'),
(448, '183611', NULL, NULL, NULL, 524, 1054, '2022-11-09', '2022-11-10', 0.00, 0.00, 16.00, 1, 1, 1, NULL, NULL, NULL, 2011.00, 0, 2011.00, 0.00, NULL, NULL, NULL, '2022-10-29 13:47:18', '2022-10-29 08:17:18'),
(449, '665381', NULL, NULL, NULL, 458, 1035, '2022-11-09', '2022-11-10', 0.00, 0.00, 16.00, 1, 1, 1, NULL, NULL, NULL, 1991.00, 1, 398.00, 1593.00, NULL, NULL, NULL, '2022-10-29 13:55:16', '2022-10-29 08:25:16'),
(450, '593145', NULL, NULL, NULL, 458, 1037, '2022-11-09', '2022-11-10', 0.00, 0.00, 16.00, 1, 1, 1, NULL, NULL, NULL, 3516.00, 1, 703.00, 2813.00, NULL, NULL, NULL, '2022-10-29 14:02:13', '2022-10-29 08:32:13'),
(451, '1622612', NULL, NULL, NULL, 458, 1035, '2022-10-29', '2022-10-30', 0.00, 0.00, 16.00, 1, 1, 1, NULL, NULL, NULL, 1991.00, 1, 398.00, 1593.00, NULL, NULL, NULL, '2022-10-29 15:15:43', '2022-10-29 09:45:43'),
(452, '116292', NULL, NULL, 1, 524, 1054, '2022-10-29', '2022-10-30', 0.00, 0.00, 16.00, 1, 1, 1, NULL, NULL, NULL, 2011.00, 0, 2011.00, 0.00, NULL, NULL, NULL, '2022-10-29 15:33:25', '2022-10-29 10:03:25'),
(453, '1064259', NULL, NULL, 1, 667, 1326, '2022-10-31', '2022-11-01', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-10-31 12:25:52', '2022-10-31 06:55:52'),
(459, '440777', NULL, NULL, 1, 667, 1326, '2022-11-02', '2022-11-03', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-02 10:42:08', '2022-11-02 05:12:08'),
(460, '676248', NULL, NULL, 1, 667, 1326, '2022-11-04', '2022-11-05', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-04 14:17:58', '2022-11-04 08:47:58'),
(461, '385564', NULL, NULL, 1, 667, 1326, '2022-11-08', '2022-11-09', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-08 11:33:37', '2022-11-08 06:03:37'),
(462, '1461256', NULL, NULL, NULL, 409, 1053, '2022-11-14', '2022-11-15', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-14 11:13:20', '2022-11-14 05:43:20'),
(463, '830275', NULL, NULL, 1, 667, 1326, '2022-11-14', '2022-11-15', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-14 12:36:24', '2022-11-14 07:06:24'),
(464, '673726', NULL, NULL, NULL, 409, 1053, '2022-12-19', '2022-12-21', 200.00, 100.00, 10.00, 2, 1, 1, NULL, NULL, NULL, 3910.00, 1, 1564.00, 2346.00, NULL, NULL, NULL, '2022-11-14 19:05:13', '2022-11-14 13:35:13'),
(465, '1545583', NULL, NULL, NULL, 409, 1053, '2022-12-19', '2022-12-21', 200.00, 100.00, 10.00, 2, 1, 1, NULL, NULL, NULL, 3910.00, 1, 1564.00, 2346.00, NULL, NULL, NULL, '2022-11-14 19:09:34', '2022-11-14 13:39:34'),
(466, '1072351', NULL, NULL, 1, 667, 1326, '2022-11-16', '2022-11-17', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-16 11:24:29', '2022-11-16 05:54:29'),
(467, '197449', NULL, NULL, 1, 667, 1326, '2022-11-16', '2022-11-17', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-16 12:11:51', '2022-11-16 06:41:51'),
(468, '1509013', NULL, NULL, 1, 409, 1053, '2022-11-17', '2022-11-18', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-17 14:15:25', '2022-11-17 08:45:25'),
(469, '735000', NULL, NULL, 1, 409, 1053, '2022-11-17', '2022-11-18', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-17 14:16:19', '2022-11-17 08:46:19'),
(470, '582482', NULL, NULL, 1, 409, 1053, '2022-11-17', '2022-11-18', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-17 14:17:14', '2022-11-17 08:47:14'),
(471, '440281', NULL, NULL, 1, 409, 1053, '2022-11-17', '2022-11-18', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-17 14:29:09', '2022-11-17 08:59:09'),
(472, '1167115', NULL, NULL, 1, 409, 1053, '2022-11-17', '2022-11-18', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-17 17:56:15', '2022-11-17 12:26:15'),
(473, '958683', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:23:58', '2022-11-17 12:53:58'),
(474, '1411162', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:31:01', '2022-11-17 13:01:01'),
(475, '666127', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:34:44', '2022-11-17 13:04:44'),
(476, '244883', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:37:23', '2022-11-17 13:07:23'),
(477, '1512271', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:38:25', '2022-11-17 13:08:25'),
(478, '129018', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:40:07', '2022-11-17 13:10:07'),
(479, '1255554', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:41:25', '2022-11-17 13:11:25'),
(480, '212663', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:43:19', '2022-11-17 13:13:19'),
(481, '1168491', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:43:46', '2022-11-17 13:13:46'),
(482, '1124619', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:54:56', '2022-11-17 13:24:56'),
(483, '1439330', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:56:58', '2022-11-17 13:26:58'),
(484, '783452', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:58:03', '2022-11-17 13:28:03'),
(485, '701145', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 18:59:34', '2022-11-17 13:29:34'),
(486, '674996', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 19:01:02', '2022-11-17 13:31:02'),
(487, '410791', NULL, NULL, 1, 667, 1326, '2022-11-17', '2022-11-18', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-17 19:02:05', '2022-11-17 13:32:05'),
(488, '681691', NULL, NULL, 1, 409, 1053, '2022-11-22', '2022-11-23', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-22 14:49:58', '2022-11-22 09:19:58'),
(489, '373288', NULL, NULL, 1, 409, 1053, '2022-11-22', '2022-11-23', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-22 15:25:17', '2022-11-22 09:55:17'),
(490, '1733372', NULL, NULL, 1, 667, 1326, '2022-11-23', '2022-11-24', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-23 18:01:10', '2022-11-23 12:31:10'),
(491, '159427', NULL, NULL, 1, 409, 1053, '2022-11-25', '2022-11-26', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-25 14:25:38', '2022-11-25 08:55:38'),
(492, '633968', NULL, NULL, 1, 667, 1326, '2022-11-28', '2022-11-29', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-28 16:11:52', '2022-11-28 10:41:52'),
(493, '1332766', NULL, NULL, 1, 409, 1053, '2022-11-28', '2022-11-29', 200.00, 100.00, 10.00, 1, 1, 1, NULL, NULL, NULL, 2310.00, 1, 924.00, 1386.00, NULL, NULL, NULL, '2022-11-28 17:46:13', '2022-11-28 12:16:13'),
(494, '864997', NULL, NULL, 1, 667, 1326, '2022-11-30', '2022-12-01', 10.00, 10.00, 1.00, 1, 1, 1, NULL, NULL, NULL, 31.00, 0, 31.00, 0.00, NULL, NULL, NULL, '2022-11-30 10:46:14', '2022-11-30 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `breakfast_type`
--

CREATE TABLE `breakfast_type` (
  `bfast_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breakfast_type`
--

INSERT INTO `breakfast_type` (`bfast_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Continental', 1, '2022-06-08 16:38:53', '2022-06-08 16:38:53'),
(2, 'American', 1, '2022-06-08 16:39:11', '2022-06-08 16:39:11'),
(3, 'Buffet', 1, '2022-06-08 16:39:11', '2022-06-08 16:39:11'),
(4, 'Halal', 1, '2022-06-08 16:39:11', '2022-06-08 16:39:11'),
(5, 'Asian', 1, '2022-06-08 16:39:11', '2022-06-08 16:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `copy_migrations`
--

CREATE TABLE `copy_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `copy_migrations`
--

INSERT INTO `copy_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_19_070355_create_admin_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 672),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 55),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 262),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 672),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 64),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 500),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT 1,
  `scout_id` int(11) DEFAULT NULL,
  `type` enum('free','free_booking','paid') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `ticket_qty` int(10) NOT NULL DEFAULT 1,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `hotel_ids` text DEFAULT NULL,
  `space_ids` text DEFAULT NULL,
  `operator_name` varchar(255) DEFAULT NULL,
  `operator_contact_name` varchar(255) DEFAULT NULL,
  `operator_contact_num` varchar(50) DEFAULT NULL,
  `operator_email` varchar(255) DEFAULT NULL,
  `operator_booking_num` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `vendor_id`, `scout_id`, `type`, `title`, `description`, `image`, `price`, `ticket_qty`, `start_date`, `start_time`, `end_date`, `end_time`, `address`, `latitude`, `longitude`, `hotel_ids`, `space_ids`, `operator_name`, `operator_contact_name`, `operator_contact_num`, `operator_email`, `operator_booking_num`, `status`, `created_at`, `updated_at`) VALUES
(49, 833, 1115, 'free', 'Bachelor Party', 'description', '1664621776_pexels-arthur-abdurashitov-1919077.jpg', 0.00, 1, '2022-08-22', '13:00:00', '2022-08-22', '14:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"664\",\"522\",\"458\",\"520\"]', '[\"636\"]', 'Operator Name', 'ocn', '2147483647', 'oe@gmail.com', '2147483647', 1, '2022-08-22 08:25:49', '2022-10-28 08:55:21'),
(61, 833, 1115, 'paid', 'So Rude of Me-comedy', 'description', 'unnamed (1).jpg', 20.00, 10, '2022-08-24', '00:00:00', '2022-08-24', '02:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"655\"]', '[\"636\"]', 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', 1, '2022-08-24 06:55:21', '2022-10-28 08:54:55'),
(62, 833, 1116, 'free', 'Food Expo event', 'description', 'pexels-trang-doan-1099680.jpg', 0.00, 1, '2022-10-25', '13:00:00', '2022-10-25', '14:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"458\"]', '[\"636\"]', 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', 1, '2022-08-24 07:05:21', '2022-10-28 08:54:37'),
(63, 833, 557, 'free', 'song concert', 'Come and witness this magical evening with your loved ones', 'pexels-matheus-bertelli-2608511.jpg', 0.00, 1, '2022-09-26', '13:00:00', '2022-09-30', '14:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"524\",\"522\",\"520\",\"458\",\"409\"]', '[\"636\",\"473\"]', 'alfalha op', 'shaikh', '942509544', 'shaikh@gmail.com', '123456789', 1, '2022-08-24 08:32:20', '2022-10-28 08:54:27'),
(64, 833, 1114, 'paid', 'cyber training', 'In this Event, Uses and advantages of learning the cybersecurity is discussed. It will be helpful for all you even for a lay person.\r\n\r\nAbout this Event\r\n\r\nIn this Event , We will provide you an enough knowledge about Cyber security. Tech is one of the few industries with the lowest barriers to entry. One does not exactly need a degree to break into the field, but you must have the technical knowledge and skills to succeed. In order to have the right skill set for the job you want, you must undergo some ample training', '1663051371_pexels-tima-miroshnichenko-5380642.jpg', 10.00, 10, '2022-10-18', '11:30:00', '2022-10-18', '18:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"458\"]', '[\"636\"]', 'himesh', 'kumar', '2147483647', 'himesh@gmail.com', '2147483647', 1, '2022-09-13 06:42:51', '2022-10-28 08:54:19'),
(65, 833, 1116, 'paid', 'tech expo', 'The Tech Expo is an opportunity for companies to promote their businesses, display what they\'re working on and network with manufacturers, suppliers, clients and customers.', '1663052089_pexels-christina-morillo-1181352.jpg', 10.00, 5, '2022-10-11', '11:00:00', '2022-10-11', '19:00:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"664\"]', '[\"636\"]', 'ayush', 'kamal', '2147483647', 'ayush@gmail.com', '2147483647', 1, '2022-09-13 06:54:49', '2022-10-28 08:54:10'),
(66, 833, 1115, 'paid', 'Standup Comedy', 'They are raunchy, raged, unapologetic, and most importantly funny. \r\n\r\nThey will be performing their best 30-30 minutes in this show.', '1664621743_pexels-ketut-subiyanto-4307935.jpg', 10.00, 10, '2022-10-10', '14:00:00', '2022-10-10', '16:30:00', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', '[\"524\",\"523\",\"522\",\"520\",\"458\"]', '[\"636\",\"473\"]', 'himanshu', '9874562587', '2147483647', 'hem@gmail.com', '2147483647', 1, '2022-09-13 07:03:52', '2022-11-29 10:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `event_booking`
--

CREATE TABLE `event_booking` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_token` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `booking_status` enum('pending','processing','canceled','confirmed') DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_booking_temp`
--

CREATE TABLE `event_booking_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `paccess_token` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery`
--

CREATE TABLE `event_gallery` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_gallery`
--

INSERT INTO `event_gallery` (`id`, `event_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(241, 62, '1661324721_pexels-chan-walrus-958545.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(242, 62, '1661324721_pexels-cottonbro-6466288.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(243, 62, '1661324721_pexels-daria-shevtsova-1528013.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(244, 62, '1661324721_pexels-hiteshkumar-koradiya-7793290.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(245, 62, '1661324721_pexels-julie-aagaard-2097090.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(246, 62, '1661324721_pexels-mentatdgt-1049622.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(247, 62, '1661324721_pexels-natalie-3371094.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(248, 62, '1661324721_pexels-photomix-company-95753.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(249, 62, '1661324721_pexels-photomix-company-226737.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(250, 62, '1661324721_pexels-pixabay-255501.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(251, 62, '1661324721_pexels-rajesh-tp-1633578.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(252, 62, '1661324721_pexels-trang-doan-1099680.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(253, 62, '1661324721_pexels-valeria-boltneva-1199957.jpg', 1, '2022-08-24 07:05:21', '2022-08-24 07:05:21'),
(254, 63, '1661329940_pexels-vinícius-caricatte-2231755.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(255, 63, '1661329940_pexels-wendy-wei-1179581.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(256, 63, '1661329940_pexels-wendy-wei-1387174.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(257, 63, '1661329940_pexels-wendy-wei-1699160.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(258, 63, '1661329940_pexels-wendy-wei-1916817.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(259, 63, '1661329940_pexels-wendy-wei-1916819.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(260, 63, '1661329940_pexels-wouter-de-jong-750895.jpg', 1, '2022-08-24 08:32:20', '2022-08-24 08:32:20'),
(262, 61, '1661331512_unnamed.jpg', 1, '2022-08-24 08:58:32', '2022-08-24 08:58:32'),
(263, 64, '1663051371_pexels-pixabay-39584.jpg', 1, '2022-09-13 06:42:51', '2022-09-13 01:42:51'),
(264, 64, '1663051371_pexels-pixabay-60504.jpg', 1, '2022-09-13 06:42:51', '2022-09-13 01:42:51'),
(265, 65, '1663052089_pexels-thisisengineering-3861458.jpg', 1, '2022-09-13 06:54:49', '2022-09-13 01:54:49'),
(266, 65, '1663052089_pexels-thisisengineering-3861958.jpg', 1, '2022-09-13 06:54:49', '2022-09-13 01:54:49'),
(267, 65, '1663052089_pexels-thisisengineering-3861969.jpg', 1, '2022-09-13 06:54:49', '2022-09-13 01:54:49'),
(268, 65, '1663052089_pexels-tima-miroshnichenko-5380642.jpg', 1, '2022-09-13 06:54:49', '2022-09-13 01:54:49'),
(269, 65, '1663052089_pexels-tima-miroshnichenko-5380665.jpg', 1, '2022-09-13 06:54:49', '2022-09-13 01:54:49'),
(270, 66, '1663052632_pexels-ilargian-faus-1629777.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(271, 66, '1663052632_pexels-ilargian-faus-1629781.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(272, 66, '1663052632_pexels-mentatdgt-1049622.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(273, 66, '1663052632_pexels-natalie-3371094.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(274, 66, '1663052632_pexels-oleksandr-pidvalnyi-321552.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(275, 66, '1663052632_pexels-pixabay-160472.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52'),
(276, 66, '1663052632_pexels-pixabay-207983.jpg', 1, '2022-09-13 07:03:52', '2022-09-13 02:03:52');

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
-- Table structure for table `guestinfo`
--

CREATE TABLE `guestinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `space_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `document_type` varchar(200) DEFAULT NULL,
  `document_number` varchar(200) DEFAULT NULL,
  `front_document_img` varchar(200) DEFAULT NULL,
  `back_document_img` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guestinfo`
--

INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(1, 934, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:33:11', '2022-10-17 09:56:55'),
(2, 837, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:33:44', '2022-10-18 05:45:02'),
(3, 1044, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:34:54', '2022-10-18 13:32:45'),
(4, 1088, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:35:20', '2022-10-19 06:02:42'),
(5, NULL, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:35:38', '2022-06-28 08:35:38'),
(6, NULL, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:35:54', '2022-06-28 08:35:54'),
(7, NULL, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:36:33', '2022-06-28 08:36:33'),
(8, NULL, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:38:04', '2022-06-28 08:38:04'),
(9, NULL, 104, 74, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:38:57', '2022-06-28 08:38:57'),
(10, NULL, 100, 55, NULL, NULL, NULL, 'votivephppushpendra@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 08:54:44', '2022-06-28 08:54:44'),
(11, NULL, 118, 109, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-28 13:15:53', '2022-06-28 13:15:53'),
(12, NULL, 100, 55, NULL, NULL, NULL, 'test@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 10:28:18', '2022-06-30 10:28:18'),
(13, NULL, 100, 55, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'kanchan', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 12:02:01', '2022-06-30 12:02:01'),
(14, NULL, 100, 55, NULL, NULL, NULL, 'votivephppushpendra@gmail.com', 'sdfsdf', 'dfgfdhdg', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 12:05:18', '2022-06-30 12:05:18'),
(15, NULL, 100, 55, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 12:35:48', '2022-06-30 12:35:48'),
(24, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'aa', 'sfd', '7418529875', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 09:15:56', '2022-07-06 09:15:56'),
(25, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'shu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 12:10:12', '2022-07-06 12:10:12'),
(26, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'shu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 12:10:30', '2022-07-06 12:10:30'),
(27, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.surabh@gmail.com', 'srb', 'shu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-06 13:13:03', '2022-07-06 13:13:03'),
(28, NULL, 80, 46, NULL, NULL, NULL, 'gffdgf', 'fgfggh', 'fdffg', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-07 07:23:18', '2022-07-07 07:23:18'),
(29, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'shu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-07 08:49:50', '2022-07-07 08:49:50'),
(30, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sh', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-07 09:22:10', '2022-07-07 09:22:10'),
(34, NULL, 80, 46, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 08:53:20', '2022-07-08 08:53:20'),
(35, NULL, 80, 46, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874562585', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 09:01:01', '2022-07-08 09:01:01'),
(36, NULL, 80, 46, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srbh', 'sahu', '6958456985', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 09:20:14', '2022-07-08 09:20:14'),
(37, NULL, 80, 110, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srv', 'sahu', '7485698258', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 09:35:28', '2022-07-08 09:35:28'),
(38, NULL, 80, 46, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srv', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 09:44:16', '2022-07-08 09:44:16'),
(39, NULL, 80, 46, NULL, NULL, NULL, 'votivephppushpendra@gmail.com', 'Pushpendra', 'jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 09:45:29', '2022-07-08 09:45:29'),
(40, NULL, 82, 40, NULL, NULL, NULL, 'pushpendra88@gmail.com', 'pushpendra', 'Last', '9179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 11:00:16', '2022-07-08 11:00:16'),
(41, NULL, 82, 61, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'pushpendra', 'jha', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 11:08:40', '2022-07-08 11:08:40'),
(42, NULL, 80, 110, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874856598', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-08 12:15:33', '2022-07-08 12:15:33'),
(46, NULL, 222, 269, NULL, NULL, NULL, 'vovds@gsd', 'sdfsd', 'sdfsd', '64654654654', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-09 13:53:45', '2022-07-09 13:53:45'),
(47, NULL, 118, 108, NULL, NULL, NULL, 'sdfsd@dfgdfgdf', 'dfgdfg', 'dfgdfg', '2323131313', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-10 04:52:45', '2022-07-10 04:52:45'),
(48, NULL, 82, 40, NULL, NULL, NULL, 'votivetester.surabh@gmail.com', 'srb', 'sahu', '9874856958', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 06:11:39', '2022-07-11 06:11:39'),
(49, NULL, 92, 39, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'pushpendra', 'jha', '9179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 06:12:09', '2022-07-11 06:12:09'),
(50, NULL, 95, 193, NULL, NULL, NULL, 'votivephone.sanjay@gmail.com', 'sanjay', 'phone', '4565412212', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 06:20:09', '2022-07-11 06:20:09'),
(52, NULL, 225, 274, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SRB', 'SAHU', '74859874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 06:55:47', '2022-07-11 06:55:47'),
(53, NULL, 226, 275, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874895875', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 06:59:09', '2022-07-11 06:59:09'),
(56, NULL, 100, 199, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'jha', '9179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 09:01:42', '2022-07-11 09:01:42'),
(57, NULL, 104, 66, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 09:16:28', '2022-07-11 09:16:28'),
(58, NULL, 82, 40, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7498857485', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 09:46:34', '2022-07-11 09:46:34'),
(59, NULL, 225, 274, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '8574987485', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 10:04:42', '2022-07-11 10:04:42'),
(61, NULL, 225, 274, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 10:44:16', '2022-07-11 10:44:16'),
(62, NULL, 227, 276, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'pushpendra', 'jha', '97894563210', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 11:36:06', '2022-07-11 11:36:06'),
(63, NULL, 227, 276, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'jha', '9179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 11:58:55', '2022-07-11 11:58:55'),
(64, NULL, 228, 277, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:08:32', '2022-07-11 12:08:32'),
(65, NULL, 82, 40, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7485698258', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:09:09', '2022-07-11 12:09:09'),
(66, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7485987458', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:15:02', '2022-07-11 12:15:02'),
(67, NULL, 118, 108, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:17:24', '2022-07-11 12:17:24'),
(68, NULL, 108, 198, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:23:25', '2022-07-11 12:23:25'),
(69, NULL, 82, 40, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:33:23', '2022-07-11 12:33:23'),
(70, NULL, 82, 40, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:45:04', '2022-07-11 12:45:04'),
(71, NULL, 82, 40, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:49:51', '2022-07-11 12:49:51'),
(72, NULL, 82, 40, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 12:54:37', '2022-07-11 12:54:37'),
(73, NULL, 82, 40, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 13:00:15', '2022-07-11 13:00:16'),
(74, NULL, 82, 136, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', '112', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 13:04:04', '2022-07-11 13:04:04'),
(75, NULL, 95, 76, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 13:10:36', '2022-07-11 13:10:36'),
(76, NULL, 95, 76, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-11 13:15:31', '2022-07-11 13:15:31'),
(79, NULL, 108, 87, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-12 09:34:08', '2022-07-12 09:34:08'),
(80, NULL, 108, 87, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-12 09:41:42', '2022-07-12 09:41:42'),
(81, NULL, 118, 107, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-12 09:47:13', '2022-07-12 09:47:13'),
(82, NULL, 108, 87, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'techs', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-12 09:52:42', '2022-07-12 09:52:42'),
(83, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562585', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 05:04:35', '2022-07-13 05:04:35'),
(84, NULL, 225, 274, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7418529875', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 05:06:19', '2022-07-13 05:06:19'),
(85, NULL, 240, 299, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874125864', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 06:30:03', '2022-07-13 06:30:03'),
(86, NULL, 239, 301, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '6958456985', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 08:48:54', '2022-07-13 08:48:54'),
(87, NULL, 239, 303, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 09:41:43', '2022-07-13 09:41:43'),
(88, NULL, 239, 303, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874105879', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-13 12:46:20', '2022-07-13 12:46:20'),
(89, NULL, 239, 320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874125698', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-14 06:00:36', '2022-07-14 06:00:36'),
(90, NULL, 239, 329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874589694', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-14 09:09:52', '2022-07-14 09:09:52'),
(91, NULL, 148, 287, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-15 05:59:00', '2022-07-15 05:59:00'),
(92, NULL, 148, 287, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-15 05:59:02', '2022-07-15 05:59:02'),
(93, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-16 05:30:22', '2022-07-16 05:30:22'),
(94, NULL, 226, 275, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '1472589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-16 09:37:47', '2022-07-16 09:37:47'),
(95, NULL, 95, 118, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7898412536', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 04:58:54', '2022-07-19 04:58:54'),
(96, NULL, 281, 379, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '1245789858', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 05:19:21', '2022-07-19 05:19:21'),
(97, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9887456598', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 05:31:13', '2022-07-19 05:31:13'),
(98, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 05:32:41', '2022-07-19 05:32:41'),
(99, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 05:38:36', '2022-07-19 05:38:36'),
(100, NULL, 104, 389, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874545869', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-19 08:49:11', '2022-07-19 08:49:11'),
(101, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-20 05:23:23', '2022-07-20 05:23:23'),
(102, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-22 05:29:05', '2022-07-22 05:29:05'),
(103, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-22 10:55:36', '2022-07-22 10:55:36'),
(104, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-25 07:24:27', '2022-07-25 07:24:27'),
(107, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-26 08:29:11', '2022-07-26 08:29:11'),
(108, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-26 10:03:05', '2022-07-26 10:03:05'),
(109, NULL, 281, 385, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-26 10:07:58', '2022-07-26 10:07:58'),
(110, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-27 06:14:41', '2022-07-27 06:14:41'),
(111, NULL, 327, 508, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-27 09:03:40', '2022-07-27 09:03:40'),
(112, NULL, 281, 445, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-27 09:08:52', '2022-07-27 09:08:52'),
(115, NULL, 92, 523, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-28 05:29:24', '2022-07-28 05:29:24'),
(116, NULL, 92, 523, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '6547891478', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-28 06:55:40', '2022-07-28 06:55:40'),
(117, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-28 10:29:47', '2022-07-28 10:29:47'),
(118, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 07:20:36', '2022-07-29 07:20:36'),
(119, NULL, NULL, NULL, 54, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Kha', '7845454545', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 10:58:24', '2022-07-29 10:58:24'),
(120, NULL, NULL, NULL, 54, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Kha', '7845454545', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 10:59:26', '2022-07-29 10:59:26'),
(121, NULL, 311, 479, NULL, NULL, NULL, 'ayesharoadnstay@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 12:05:18', '2022-07-29 12:05:18'),
(122, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 12:49:14', '2022-07-29 12:49:14'),
(123, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 13:01:01', '2022-07-29 13:01:01'),
(124, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-29 13:03:41', '2022-07-29 13:03:41'),
(125, NULL, NULL, NULL, 17, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 05:31:35', '2022-07-30 05:31:35'),
(126, NULL, NULL, NULL, 17, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 05:31:54', '2022-07-30 05:31:54'),
(127, NULL, NULL, NULL, 17, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 05:36:33', '2022-07-30 05:36:33'),
(131, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 09:51:09', '2022-07-30 09:51:09'),
(133, NULL, NULL, NULL, 19, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 10:08:16', '2022-07-30 10:08:16'),
(134, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7441258987', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 11:42:09', '2022-07-30 11:42:09'),
(136, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583697', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 11:46:43', '2022-07-30 11:46:43'),
(137, NULL, NULL, NULL, 73, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 11:48:30', '2022-07-30 11:48:30'),
(142, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:18:00', '2022-07-30 12:18:00'),
(144, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:24:36', '2022-07-30 12:24:36'),
(146, NULL, NULL, NULL, NULL, 297, NULL, 'votivtester.saurabh@gmail.com', 'saurabh', 'sahu', '7412585897', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:29:50', '2022-07-30 12:29:50'),
(147, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:31:38', '2022-07-30 12:31:38'),
(148, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7415898745', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:37:32', '2022-07-30 12:37:32'),
(151, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:44:38', '2022-07-30 12:44:38'),
(152, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 12:50:38', '2022-07-30 12:50:38'),
(158, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:05:39', '2022-07-30 13:05:39'),
(159, NULL, NULL, NULL, NULL, 272, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:10:40', '2022-07-30 13:10:40'),
(160, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589974', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:14:33', '2022-07-30 13:14:33'),
(161, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'SAHU', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:25:16', '2022-07-30 13:25:16'),
(162, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:26:57', '2022-07-30 13:26:57'),
(163, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-07-30 13:28:03', '2022-07-30 13:28:03'),
(164, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 04:57:26', '2022-08-01 04:57:26'),
(165, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562554', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 05:01:46', '2022-08-01 05:01:46'),
(166, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562554', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 05:01:56', '2022-08-01 05:01:56'),
(167, NULL, NULL, NULL, NULL, 375, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 05:06:34', '2022-08-01 05:06:34'),
(168, NULL, NULL, NULL, 20, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 06:18:48', '2022-08-01 06:18:48'),
(169, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SAURABH', 'SAHU', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 06:30:13', '2022-08-01 06:30:13'),
(170, NULL, NULL, NULL, 73, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SAURABH', 'SAHU', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 06:31:20', '2022-08-01 06:31:20'),
(171, NULL, NULL, NULL, NULL, 272, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'SAHU', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 06:32:39', '2022-08-01 06:32:39'),
(173, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SAURABH', 'SAHU', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 08:45:19', '2022-08-01 08:45:19'),
(174, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 08:46:59', '2022-08-01 08:46:59'),
(175, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SAURABH', 'SAHU', '9874562547', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 08:48:29', '2022-08-01 08:48:29'),
(176, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 09:01:00', '2022-08-01 09:01:00'),
(177, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 09:04:29', '2022-08-01 09:04:29'),
(178, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561474', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 09:23:39', '2022-08-01 09:23:39'),
(182, NULL, NULL, NULL, 19, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7441258987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 09:39:27', '2022-08-01 09:39:27'),
(183, NULL, NULL, NULL, NULL, 361, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 09:48:02', '2022-08-01 09:48:02'),
(184, NULL, NULL, NULL, 53, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 10:05:32', '2022-08-01 10:05:32'),
(185, NULL, NULL, NULL, 53, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'jha', '54878782155', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 10:11:46', '2022-08-01 10:11:46'),
(190, NULL, NULL, NULL, 19, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-01 12:37:38', '2022-08-01 12:37:38'),
(192, NULL, NULL, NULL, 20, NULL, NULL, 'votivtester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 05:12:02', '2022-08-02 05:12:03'),
(193, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 05:21:32', '2022-08-02 05:21:32'),
(194, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 05:24:29', '2022-08-02 05:24:29'),
(215, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 09:15:14', '2022-08-02 09:15:14'),
(219, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 09:40:15', '2022-08-02 09:40:15'),
(221, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 09:51:59', '2022-08-02 09:51:59'),
(234, NULL, NULL, NULL, 20, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7894786984', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 13:20:38', '2022-08-02 13:20:38'),
(235, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-02 13:24:56', '2022-08-02 13:24:56'),
(236, NULL, NULL, NULL, NULL, 361, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 06:26:39', '2022-08-03 06:26:39'),
(237, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 10:37:36', '2022-08-03 10:37:36'),
(238, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412587987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 10:39:25', '2022-08-03 10:39:25'),
(239, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 10:40:46', '2022-08-03 10:40:46'),
(240, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 11:58:45', '2022-08-03 11:58:45'),
(241, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 12:48:42', '2022-08-03 12:48:42'),
(242, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '74125898784', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-03 13:18:17', '2022-08-03 13:18:17'),
(243, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7742589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 05:20:43', '2022-08-04 05:20:43'),
(244, NULL, NULL, NULL, 104, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 05:40:35', '2022-08-04 05:40:35'),
(245, NULL, NULL, NULL, NULL, 418, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412587987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 05:42:17', '2022-08-04 05:42:17'),
(246, NULL, NULL, NULL, 106, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 06:18:44', '2022-08-04 06:18:44'),
(247, NULL, NULL, NULL, NULL, 422, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 06:25:40', '2022-08-04 06:25:40'),
(248, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7445879874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 08:34:06', '2022-08-04 08:34:06'),
(249, NULL, NULL, NULL, 108, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 08:44:57', '2022-08-04 08:44:57'),
(250, NULL, NULL, NULL, NULL, 425, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 08:52:35', '2022-08-04 08:52:35'),
(251, NULL, 380, 691, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 09:13:16', '2022-08-04 09:13:16'),
(252, NULL, NULL, NULL, NULL, 427, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412588698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 09:22:35', '2022-08-04 09:22:35'),
(254, NULL, NULL, NULL, 110, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589974', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 09:37:42', '2022-08-04 09:37:42'),
(255, NULL, 281, 385, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 09:47:25', '2022-08-04 09:47:25'),
(257, NULL, 118, 107, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 09:51:24', '2022-08-04 09:51:24'),
(258, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-04 10:25:42', '2022-08-04 10:25:42'),
(259, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7425836987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 08:27:22', '2022-08-05 08:27:22'),
(260, NULL, NULL, NULL, 73, NULL, NULL, 'votivtester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 08:44:03', '2022-08-05 08:44:03'),
(261, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '74125836984', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 09:26:12', '2022-08-05 09:26:12'),
(263, NULL, NULL, NULL, 73, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 09:55:05', '2022-08-05 09:55:05'),
(264, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 10:28:06', '2022-08-05 10:28:06'),
(265, NULL, NULL, NULL, NULL, 272, NULL, 'pushpendrajha@gmail.com', 'pushpendra', 'jha', '74397595794', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 10:29:24', '2022-08-05 10:29:24'),
(266, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 10:40:52', '2022-08-05 10:40:52'),
(267, NULL, NULL, NULL, 73, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 11:42:28', '2022-08-05 11:42:28'),
(268, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-05 11:44:34', '2022-08-05 11:44:34'),
(269, NULL, NULL, NULL, NULL, 272, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 04:53:14', '2022-08-06 04:53:14'),
(270, NULL, NULL, NULL, NULL, 406, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 05:02:30', '2022-08-06 05:02:30'),
(271, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 06:42:15', '2022-08-06 06:42:15'),
(272, NULL, NULL, NULL, 73, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 06:43:43', '2022-08-06 06:43:43'),
(273, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 06:49:13', '2022-08-06 06:49:13'),
(274, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 06:53:02', '2022-08-06 06:53:02'),
(275, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 08:15:43', '2022-08-06 08:15:43'),
(276, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-06 12:39:12', '2022-08-06 12:39:12'),
(277, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874625874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 06:48:44', '2022-08-09 06:48:44'),
(278, NULL, NULL, NULL, 120, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 06:54:32', '2022-08-09 06:54:32'),
(279, NULL, NULL, NULL, 120, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 06:56:15', '2022-08-09 06:56:15'),
(280, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 06:59:02', '2022-08-09 06:59:02'),
(281, NULL, NULL, NULL, NULL, 451, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 07:19:10', '2022-08-09 07:19:10'),
(282, NULL, NULL, NULL, 20, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 08:27:22', '2022-08-09 08:27:22'),
(283, NULL, NULL, NULL, 20, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 08:27:36', '2022-08-09 08:27:36'),
(284, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 08:30:27', '2022-08-09 08:30:27'),
(285, NULL, NULL, NULL, 120, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 08:32:02', '2022-08-09 08:32:02'),
(286, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 08:34:27', '2022-08-09 08:34:27'),
(288, NULL, NULL, NULL, 122, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:32:12', '2022-08-09 10:32:13'),
(289, NULL, 281, 385, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:37:46', '2022-08-09 10:37:46'),
(290, NULL, 400, 749, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874123698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:45:57', '2022-08-09 10:45:57'),
(291, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:47:26', '2022-08-09 10:47:26'),
(292, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:47:28', '2022-08-09 10:47:28'),
(293, NULL, NULL, NULL, NULL, 455, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 10:50:10', '2022-08-09 10:50:10'),
(294, NULL, 402, 753, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 12:25:10', '2022-08-09 12:25:10'),
(295, NULL, NULL, NULL, 122, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 12:26:53', '2022-08-09 12:26:53'),
(296, NULL, 402, 754, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 12:32:03', '2022-08-09 12:32:03'),
(297, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-09 13:25:03', '2022-08-09 13:25:03'),
(298, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7419874798', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 05:34:38', '2022-08-10 05:34:38'),
(299, NULL, NULL, NULL, NULL, 465, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 05:45:50', '2022-08-10 05:45:50'),
(301, NULL, NULL, NULL, NULL, 465, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:05:09', '2022-08-10 06:05:09'),
(302, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:19:14', '2022-08-10 06:19:14'),
(303, NULL, 104, 66, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:27:17', '2022-08-10 06:27:17'),
(304, NULL, NULL, NULL, NULL, 465, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:29:08', '2022-08-10 06:29:08'),
(305, NULL, NULL, NULL, 129, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:32:01', '2022-08-10 06:32:02'),
(306, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 06:50:17', '2022-08-10 06:50:17'),
(307, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 08:20:06', '2022-08-10 08:20:06'),
(308, NULL, NULL, NULL, 127, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 08:23:48', '2022-08-10 08:23:48'),
(309, NULL, NULL, NULL, 128, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 08:44:36', '2022-08-10 08:44:36'),
(310, NULL, NULL, NULL, NULL, 470, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 08:45:57', '2022-08-10 08:45:57'),
(311, NULL, NULL, NULL, 128, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 08:50:39', '2022-08-10 08:50:39'),
(312, NULL, NULL, NULL, NULL, 410, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 09:02:39', '2022-08-10 09:02:39'),
(313, NULL, 331, 770, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 09:23:18', '2022-08-10 09:23:18'),
(314, NULL, NULL, NULL, NULL, 472, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 10:19:17', '2022-08-10 10:19:17'),
(315, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 10:43:15', '2022-08-10 10:43:15'),
(316, NULL, 409, 775, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 11:26:10', '2022-08-10 11:26:10'),
(317, NULL, NULL, NULL, NULL, 410, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 11:41:21', '2022-08-10 11:41:21'),
(318, NULL, NULL, NULL, NULL, 474, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 11:53:01', '2022-08-10 11:53:01'),
(321, NULL, NULL, NULL, NULL, 449, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 12:51:25', '2022-08-10 12:51:25'),
(322, NULL, NULL, NULL, NULL, 449, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-10 13:00:15', '2022-08-10 13:00:15'),
(323, NULL, NULL, NULL, NULL, 272, NULL, 'asda@sdfsdf', 'sdfsd', 'sdfsd', 'sdfdfs', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-12 13:42:35', '2022-08-12 13:42:35'),
(324, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 04:42:42', '2022-08-16 04:42:42'),
(325, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 04:46:04', '2022-08-16 04:46:04'),
(326, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 04:48:22', '2022-08-16 04:48:22'),
(327, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7414798745', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 04:50:11', '2022-08-16 04:50:11'),
(328, NULL, NULL, NULL, NULL, 272, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 06:27:44', '2022-08-16 06:27:44'),
(329, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 08:15:08', '2022-08-16 08:15:08'),
(330, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 08:17:05', '2022-08-16 08:17:05'),
(331, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 08:18:39', '2022-08-16 08:18:39'),
(332, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 09:44:19', '2022-08-16 09:44:19'),
(333, NULL, NULL, NULL, NULL, 482, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 09:45:46', '2022-08-16 09:45:46'),
(334, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 10:05:40', '2022-08-16 10:05:40'),
(335, NULL, NULL, NULL, NULL, 487, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 11:52:14', '2022-08-16 11:52:14'),
(336, NULL, NULL, NULL, NULL, 487, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 12:50:08', '2022-08-16 12:50:08'),
(337, NULL, 281, 805, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 12:57:52', '2022-08-16 12:57:52'),
(338, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 13:00:59', '2022-08-16 13:00:59'),
(339, NULL, NULL, NULL, NULL, 487, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-16 13:02:18', '2022-08-16 13:02:18'),
(340, NULL, 281, 806, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 05:17:30', '2022-08-17 05:17:30'),
(341, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 05:19:29', '2022-08-17 05:19:29'),
(342, NULL, NULL, NULL, NULL, 490, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 05:21:01', '2022-08-17 05:21:01'),
(343, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'SAURABH', 'SAHU', '9874555565', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 07:23:14', '2022-08-17 07:23:14'),
(345, NULL, 228, 277, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 10:46:39', '2022-08-17 10:46:39'),
(346, NULL, NULL, NULL, 152, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 10:47:57', '2022-08-17 10:47:57'),
(347, NULL, NULL, NULL, NULL, 512, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874563698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 10:51:08', '2022-08-17 10:51:08'),
(348, NULL, NULL, NULL, NULL, 491, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9987456987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 13:06:48', '2022-08-17 13:06:48'),
(349, NULL, NULL, NULL, NULL, 491, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9987456987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 13:06:59', '2022-08-17 13:06:59'),
(350, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 13:08:54', '2022-08-17 13:08:54'),
(351, NULL, 228, 288, NULL, NULL, NULL, 'srb', 'srb', 'sahu', '9874561474', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 13:10:47', '2022-08-17 13:10:47'),
(352, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-17 13:27:55', '2022-08-17 13:27:55'),
(354, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 05:21:15', '2022-08-18 05:21:15'),
(355, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 05:23:59', '2022-08-18 05:23:59'),
(356, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 05:26:07', '2022-08-18 05:26:07'),
(357, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 06:40:36', '2022-08-18 06:40:36'),
(358, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 07:07:03', '2022-08-18 07:07:03'),
(359, NULL, 281, 805, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 10:43:51', '2022-08-18 10:43:51'),
(360, NULL, NULL, NULL, NULL, 487, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874142587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 10:47:30', '2022-08-18 10:47:30'),
(361, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 10:56:02', '2022-08-18 10:56:02'),
(362, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 10:57:32', '2022-08-18 10:57:32'),
(363, NULL, NULL, NULL, NULL, 482, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 10:58:58', '2022-08-18 10:58:58'),
(364, NULL, NULL, NULL, NULL, 272, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:01:24', '2022-08-18 13:01:24'),
(365, NULL, NULL, NULL, NULL, 492, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:03:35', '2022-08-18 13:03:35'),
(366, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:10:53', '2022-08-18 13:10:53'),
(367, NULL, NULL, NULL, NULL, 492, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:13:25', '2022-08-18 13:13:25'),
(368, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:15:39', '2022-08-18 13:15:39'),
(369, NULL, NULL, NULL, NULL, 526, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-18 13:17:29', '2022-08-18 13:17:29');
INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(370, NULL, NULL, NULL, NULL, 490, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 05:08:06', '2022-08-19 05:08:06'),
(371, NULL, NULL, NULL, NULL, 490, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 05:18:41', '2022-08-19 05:18:41'),
(372, NULL, NULL, NULL, 165, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 07:00:52', '2022-08-19 07:00:52'),
(373, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 08:22:57', '2022-08-19 08:22:57'),
(374, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 08:24:36', '2022-08-19 08:24:36'),
(375, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 08:25:53', '2022-08-19 08:25:53'),
(376, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 08:27:20', '2022-08-19 08:27:20'),
(377, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 09:36:01', '2022-08-19 09:36:01'),
(378, NULL, NULL, NULL, NULL, 540, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 09:37:49', '2022-08-19 09:37:49'),
(379, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 09:42:58', '2022-08-19 09:42:58'),
(380, NULL, 118, 107, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 10:12:00', '2022-08-19 10:12:00'),
(381, NULL, 104, 66, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '6616630938', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 10:57:41', '2022-08-19 10:57:41'),
(382, NULL, NULL, NULL, NULL, 541, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 11:42:33', '2022-08-19 11:42:33'),
(383, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561476', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-19 12:48:29', '2022-08-19 12:48:29'),
(384, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'arb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 05:20:12', '2022-08-22 05:20:12'),
(385, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 05:29:27', '2022-08-22 05:29:27'),
(386, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 05:30:44', '2022-08-22 05:30:44'),
(387, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:01:21', '2022-08-22 06:01:21'),
(388, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:05:07', '2022-08-22 06:05:07'),
(389, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:13:28', '2022-08-22 06:13:28'),
(390, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:46:45', '2022-08-22 06:46:45'),
(391, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:51:26', '2022-08-22 06:51:26'),
(392, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:55:56', '2022-08-22 06:55:56'),
(393, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:57:50', '2022-08-22 06:57:50'),
(394, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 06:58:45', '2022-08-22 06:58:45'),
(396, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 08:32:00', '2022-08-22 08:32:00'),
(397, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 08:37:47', '2022-08-22 08:37:47'),
(400, NULL, 118, 108, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 09:17:04', '2022-08-22 09:17:04'),
(401, NULL, NULL, NULL, 179, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 09:20:05', '2022-08-22 09:20:05'),
(402, NULL, NULL, NULL, NULL, 541, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 09:23:24', '2022-08-22 09:23:24'),
(403, NULL, 118, 107, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 09:29:58', '2022-08-22 09:29:58'),
(404, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 09:55:45', '2022-08-22 09:55:45'),
(405, NULL, 104, 66, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874261478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:01:02', '2022-08-22 10:01:02'),
(406, NULL, NULL, NULL, NULL, 540, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:17:31', '2022-08-22 10:17:31'),
(407, NULL, NULL, NULL, NULL, 540, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874461478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:19:44', '2022-08-22 10:19:44'),
(408, NULL, NULL, NULL, 179, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:20:43', '2022-08-22 10:20:43'),
(409, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:37:19', '2022-08-22 10:37:19'),
(410, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:42:48', '2022-08-22 10:42:48'),
(411, NULL, NULL, NULL, 179, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:43:59', '2022-08-22 10:43:59'),
(412, NULL, NULL, NULL, NULL, 323, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:45:12', '2022-08-22 10:45:12'),
(413, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:48:31', '2022-08-22 10:48:31'),
(414, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:55:21', '2022-08-22 10:55:21'),
(415, NULL, 104, 72, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 10:56:26', '2022-08-22 10:56:26'),
(416, NULL, NULL, NULL, NULL, NULL, 48, 'votivephppushpendra@gmail.com', 'Pushpendra', 'Jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 11:35:46', '2022-08-22 11:35:46'),
(417, NULL, NULL, NULL, NULL, NULL, 48, 'votivephppushpendra@gmail.com', 'Pushpendra', 'Jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 11:37:20', '2022-08-22 11:37:20'),
(418, NULL, NULL, NULL, NULL, 540, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9877456987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:20:33', '2022-08-22 12:20:33'),
(419, NULL, NULL, NULL, NULL, 570, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:22:48', '2022-08-22 12:22:48'),
(420, NULL, NULL, NULL, NULL, 542, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874465147', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:44:38', '2022-08-22 12:44:38'),
(421, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:48:06', '2022-08-22 12:48:06'),
(422, NULL, 104, 74, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:49:09', '2022-08-22 12:49:09'),
(423, NULL, 409, 775, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:51:58', '2022-08-22 12:51:58'),
(424, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874614785', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:53:30', '2022-08-22 12:53:30'),
(425, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 12:56:26', '2022-08-22 12:56:26'),
(426, NULL, 228, 277, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561474', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 13:08:50', '2022-08-22 13:08:50'),
(427, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-22 13:13:22', '2022-08-22 13:13:22'),
(428, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 04:45:45', '2022-08-23 04:45:45'),
(429, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874569874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 04:47:38', '2022-08-23 04:47:38'),
(430, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 04:48:27', '2022-08-23 04:48:27'),
(431, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 05:54:28', '2022-08-23 05:54:28'),
(432, NULL, NULL, NULL, NULL, 575, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:18:54', '2022-08-23 06:18:54'),
(433, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:22:23', '2022-08-23 06:22:23'),
(434, NULL, NULL, NULL, 21, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:38:47', '2022-08-23 06:38:47'),
(435, NULL, NULL, NULL, 51, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:40:04', '2022-08-23 06:40:04'),
(436, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:44:22', '2022-08-23 06:44:22'),
(437, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 06:46:12', '2022-08-23 06:46:12'),
(438, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 07:06:30', '2022-08-23 07:06:30'),
(439, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 08:16:50', '2022-08-23 08:16:50'),
(440, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 08:18:29', '2022-08-23 08:18:29'),
(441, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 08:49:20', '2022-08-23 08:49:20'),
(442, NULL, NULL, NULL, NULL, 578, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874514785', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 09:14:57', '2022-08-23 09:14:57'),
(443, NULL, NULL, NULL, NULL, 580, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 09:17:36', '2022-08-23 09:17:36'),
(444, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 09:21:55', '2022-08-23 09:21:55'),
(445, NULL, NULL, NULL, NULL, 367, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 09:24:38', '2022-08-23 09:24:38'),
(446, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 10:55:57', '2022-08-23 10:55:57'),
(447, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 11:07:58', '2022-08-23 11:07:58'),
(448, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 11:34:00', '2022-08-23 11:34:00'),
(449, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 11:36:09', '2022-08-23 11:36:09'),
(450, NULL, NULL, NULL, 52, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srbsahu', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-23 12:17:10', '2022-08-23 12:17:10'),
(451, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:08:09', '2022-08-24 05:08:09'),
(452, NULL, NULL, NULL, NULL, NULL, 48, 'votivtester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:11:13', '2022-08-24 05:11:13'),
(453, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:12:22', '2022-08-24 05:12:22'),
(454, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:15:48', '2022-08-24 05:15:48'),
(455, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:24:36', '2022-08-24 05:24:36'),
(456, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:28:11', '2022-08-24 05:28:11'),
(457, NULL, NULL, NULL, NULL, 362, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:29:36', '2022-08-24 05:29:36'),
(458, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:51:37', '2022-08-24 05:51:37'),
(459, NULL, NULL, NULL, NULL, NULL, 48, 'pushpendrajha@gmail.com', 'Pushpendra', 'Jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:52:48', '2022-08-24 05:52:48'),
(460, NULL, 108, 87, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:54:07', '2022-08-24 05:54:07'),
(461, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:55:24', '2022-08-24 05:55:24'),
(462, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:56:54', '2022-08-24 05:56:54'),
(463, NULL, 281, 384, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:58:29', '2022-08-24 05:58:29'),
(464, NULL, NULL, NULL, NULL, NULL, 48, 'votivephppushpendra@gmail.com', 'Pushpendra', 'jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 05:58:39', '2022-08-24 05:58:39'),
(465, NULL, NULL, NULL, 50, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:01:22', '2022-08-24 06:01:22'),
(466, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:03:16', '2022-08-24 06:03:16'),
(467, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:06:20', '2022-08-24 06:06:20'),
(468, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:14:51', '2022-08-24 06:14:51'),
(469, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561474', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:17:05', '2022-08-24 06:17:05'),
(470, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:22:51', '2022-08-24 06:22:51'),
(471, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:26:04', '2022-08-24 06:26:04'),
(472, NULL, 228, 277, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:28:16', '2022-08-24 06:28:16'),
(473, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:29:17', '2022-08-24 06:29:17'),
(474, NULL, 92, 39, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:31:00', '2022-08-24 06:31:00'),
(475, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:31:50', '2022-08-24 06:31:50'),
(476, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:32:45', '2022-08-24 06:32:45'),
(477, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583699', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:33:40', '2022-08-24 06:33:40'),
(478, NULL, 100, 199, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:36:23', '2022-08-24 06:36:23'),
(479, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:40:45', '2022-08-24 06:40:45'),
(480, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 06:45:34', '2022-08-24 06:45:34'),
(481, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 08:19:08', '2022-08-24 08:19:08'),
(482, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 09:56:41', '2022-08-24 09:56:41'),
(483, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:00:29', '2022-08-24 11:00:29'),
(484, NULL, NULL, NULL, NULL, 586, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583369', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:03:32', '2022-08-24 11:03:32'),
(485, NULL, 104, 66, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:04:47', '2022-08-24 11:04:47'),
(486, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:05:44', '2022-08-24 11:05:44'),
(487, NULL, 108, 390, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:06:45', '2022-08-24 11:06:45'),
(488, NULL, NULL, NULL, NULL, 592, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 11:08:56', '2022-08-24 11:08:56'),
(489, NULL, NULL, NULL, 190, NULL, NULL, 'votivetster.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 12:03:01', '2022-08-24 12:03:01'),
(490, NULL, 281, 967, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:18:10', '2022-08-24 13:18:10'),
(491, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:19:14', '2022-08-24 13:19:14'),
(492, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:20:13', '2022-08-24 13:20:13'),
(493, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'jha', '09179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:21:39', '2022-08-24 13:21:39'),
(494, NULL, NULL, NULL, NULL, 323, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:25:20', '2022-08-24 13:25:20'),
(495, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:27:21', '2022-08-24 13:27:21'),
(496, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7125836987', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:28:38', '2022-08-24 13:28:38'),
(497, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:29:28', '2022-08-24 13:29:28'),
(498, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'jha', '9179004123', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:30:46', '2022-08-24 13:30:46'),
(499, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:34:50', '2022-08-24 13:34:50'),
(500, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:36:24', '2022-08-24 13:36:24'),
(501, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'jha', '9794545454', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-24 13:37:41', '2022-08-24 13:37:41'),
(502, NULL, 281, 971, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583699', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 05:20:47', '2022-08-25 05:20:47'),
(503, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 05:21:59', '2022-08-25 05:21:59'),
(504, NULL, NULL, NULL, NULL, 323, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 05:24:47', '2022-08-25 05:24:47'),
(505, NULL, 228, 282, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 06:42:00', '2022-08-25 06:42:00'),
(506, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 06:43:08', '2022-08-25 06:43:08'),
(507, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 06:44:41', '2022-08-25 06:44:41'),
(508, NULL, NULL, NULL, NULL, 403, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 06:45:41', '2022-08-25 06:45:41'),
(509, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:16:56', '2022-08-25 08:16:56'),
(510, NULL, NULL, NULL, NULL, 403, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:24:11', '2022-08-25 08:24:11'),
(511, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412536984', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:26:08', '2022-08-25 08:26:08'),
(512, NULL, NULL, NULL, 203, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:27:12', '2022-08-25 08:27:12'),
(513, NULL, 95, 76, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:31:29', '2022-08-25 08:31:29'),
(514, NULL, 100, 55, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:32:51', '2022-08-25 08:32:51'),
(515, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 08:33:49', '2022-08-25 08:33:49'),
(516, NULL, 95, 84, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 09:27:54', '2022-08-25 09:27:54'),
(517, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 09:31:07', '2022-08-25 09:31:08'),
(518, NULL, 228, 288, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583669', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:16:46', '2022-08-25 10:16:46'),
(519, NULL, NULL, NULL, NULL, 540, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:18:06', '2022-08-25 10:18:06'),
(520, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:19:25', '2022-08-25 10:19:25'),
(521, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:20:51', '2022-08-25 10:20:51'),
(522, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:51:18', '2022-08-25 10:51:18'),
(523, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:54:53', '2022-08-25 10:54:53'),
(524, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583694', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 10:59:12', '2022-08-25 10:59:12'),
(525, NULL, NULL, NULL, NULL, 406, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 11:07:56', '2022-08-25 11:07:56'),
(526, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 11:38:47', '2022-08-25 11:38:47'),
(527, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 11:40:38', '2022-08-25 11:40:38'),
(529, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 12:42:31', '2022-08-25 12:42:31'),
(530, NULL, NULL, NULL, 18, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '74412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 12:48:02', '2022-08-25 12:48:02'),
(531, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 12:50:38', '2022-08-25 12:50:38'),
(532, NULL, 104, 72, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:06:28', '2022-08-25 13:06:28'),
(533, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:09:02', '2022-08-25 13:09:02'),
(534, NULL, NULL, NULL, NULL, NULL, 48, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:10:20', '2022-08-25 13:10:20'),
(535, NULL, NULL, NULL, NULL, 406, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:11:05', '2022-08-25 13:11:05'),
(536, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:13:26', '2022-08-25 13:13:26'),
(537, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:14:29', '2022-08-25 13:14:29'),
(538, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:15:25', '2022-08-25 13:15:25'),
(539, NULL, NULL, NULL, NULL, 622, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-25 13:17:18', '2022-08-25 13:17:18'),
(540, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 04:46:17', '2022-08-26 04:46:17'),
(541, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 04:50:49', '2022-08-26 04:50:49'),
(542, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '74125583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:22:02', '2022-08-26 05:22:02'),
(543, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:23:12', '2022-08-26 05:23:12'),
(544, NULL, NULL, NULL, NULL, 273, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583699', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:24:28', '2022-08-26 05:24:28'),
(545, NULL, 281, 382, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:26:29', '2022-08-26 05:26:29'),
(546, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:27:28', '2022-08-26 05:27:28'),
(547, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:28:33', '2022-08-26 05:28:33'),
(548, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:29:15', '2022-08-26 05:29:15'),
(549, NULL, NULL, NULL, NULL, 297, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:29:53', '2022-08-26 05:29:53'),
(550, NULL, NULL, NULL, 214, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 05:48:32', '2022-08-26 05:48:32'),
(551, NULL, 281, 383, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:34:09', '2022-08-26 06:34:09'),
(552, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:36:13', '2022-08-26 06:36:13'),
(553, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:37:39', '2022-08-26 06:37:39'),
(554, NULL, NULL, NULL, NULL, 626, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:39:45', '2022-08-26 06:39:45'),
(555, NULL, NULL, NULL, 53, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:54:18', '2022-08-26 06:54:18'),
(556, NULL, 104, 195, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:56:50', '2022-08-26 06:56:50'),
(557, NULL, NULL, NULL, NULL, 633, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 06:58:21', '2022-08-26 06:58:21'),
(558, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 07:01:00', '2022-08-26 07:01:00'),
(560, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 10:03:49', '2022-08-26 10:03:49'),
(561, NULL, 118, 107, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 10:10:58', '2022-08-26 10:10:58'),
(562, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 10:50:49', '2022-08-26 10:50:49'),
(563, NULL, NULL, NULL, NULL, 323, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 11:07:12', '2022-08-26 11:07:12'),
(564, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 11:58:07', '2022-08-26 11:58:07'),
(565, NULL, 100, 199, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 11:59:19', '2022-08-26 11:59:19'),
(566, NULL, NULL, NULL, NULL, 270, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 12:01:13', '2022-08-26 12:01:13'),
(567, NULL, 104, 66, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 12:04:29', '2022-08-26 12:04:29'),
(568, NULL, 104, 74, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 12:05:50', '2022-08-26 12:05:50'),
(569, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, NULL, NULL, NULL, NULL, 1, '2022-08-26 12:19:52', '2022-08-26 12:19:52'),
(578, NULL, NULL, NULL, 190, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '95754870525', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-01 09:45:20', '2022-09-01 09:45:20'),
(580, NULL, NULL, NULL, 192, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '9575487052', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-01 11:54:39', '2022-09-01 11:54:39'),
(582, NULL, NULL, NULL, 190, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '95754870525', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-02 06:20:23', '2022-09-02 06:20:23'),
(583, NULL, 458, 1035, NULL, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '9575487052', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-06 06:24:10', '2022-09-06 06:24:10'),
(584, NULL, 409, 1053, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-07 13:02:46', '2022-09-07 13:02:46'),
(585, NULL, 409, 1053, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-07 13:03:08', '2022-09-07 13:03:08'),
(590, NULL, 524, 1054, NULL, NULL, NULL, 'ayeshazahid913@gmail.com', 'Ayesha', 'Zahid', '1234567890', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-09 07:45:50', '2022-09-09 07:45:50'),
(592, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'pushpendra', 'jha', '9179904123', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-09 10:39:24', '2022-09-09 10:39:24'),
(622, NULL, 458, 1035, NULL, NULL, NULL, 'mkakhi@yahoo.com', 'Muhammad', 'Khalid', '923373164408', 'PAYID-MMQLU4I9V18256763125464Y', 'Voter Id', '3445654665', 'testtest-roadnstays-1663089264.png', 'testtest-roadnstays-1663089264.png', 1, '2022-09-13 17:14:25', '2022-09-13 17:14:25'),
(623, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', NULL, NULL, NULL, NULL, NULL, 1, '2022-09-14 05:48:59', '2022-09-14 05:48:59'),
(635, NULL, NULL, NULL, NULL, 638, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMQ5GHI2AK97063PS0869125', 'Passport', '32132132123', '3-1663161116.png', '3a-1663161116.jpg', 1, '2022-09-14 13:11:57', '2022-09-14 13:11:57'),
(636, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMRO5QA81E759938J287823S', 'Passport', '32132132123', '2bn-1663233727.png', '3-1663233727.png', 1, '2022-09-15 09:22:08', '2022-09-15 09:22:08'),
(637, NULL, NULL, NULL, 188, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMRQJNY53J79512TD862032K', 'Passport', '32132132123', '2bn-1663239350.png', '3-1663239350.png', 1, '2022-09-15 10:55:51', '2022-09-15 10:55:51'),
(638, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', 'PAYID-MMUBPNI2W666636BE776602T', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1663571892.pdf', 'Admin  Dashboard (2)-1663571892.pdf', 1, '2022-09-19 07:18:13', '2022-09-19 07:18:13'),
(639, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7411477897', 'PAYID-MMUBQQI14458178J6273110X', 'Voter Id', '446654', 'Admin  Dashboard (2)-1663572032.pdf', 'Admin  Dashboard (2)-1663572032.pdf', 1, '2022-09-19 07:20:33', '2022-09-19 07:20:33'),
(640, NULL, 524, 1054, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMUBRJA6VX88480TP294411K', 'Passport', '32132132123', '15-1663572132.png', '16-1663572132.png', 1, '2022-09-19 07:22:13', '2022-09-19 07:22:13'),
(641, NULL, 545, 1087, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874554147', 'PAYID-MMUCZII6NA36108FW389464L', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1663577247.pdf', 'Admin  Dashboard (2)-1663577247.pdf', 1, '2022-09-19 08:47:29', '2022-09-19 08:47:29'),
(642, NULL, NULL, NULL, 204, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', 'PAYID-MMUC2QY4B9074606E078143X', 'Voter Id', '55131', 'Admin  Dashboard (2)-1663577410.pdf', 'Admin  Dashboard (2)-1663577410.pdf', 1, '2022-09-19 08:50:11', '2022-09-19 08:50:11'),
(643, NULL, 523, 1074, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMUUWYQ400947490B0442315', 'Passport', '32132132123', '15-1663650656.png', '16-1663650656.png', 1, '2022-09-20 10:40:58', '2022-09-20 05:10:58'),
(644, NULL, 520, 1039, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMUU32Q3U859869T3604791N', 'Passport', '32132132123', '15-1663651305.png', '16-1663651305.png', 1, '2022-09-20 10:51:46', '2022-09-20 05:21:46'),
(645, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562557', 'PAYID-MMUWJOQ7R267867MM994915J', 'Voter Id', '65444', 'Admin  Dashboard (2)-1663657145.pdf', 'Admin  Dashboard (2)-1663657145.pdf', 1, '2022-09-20 12:29:07', '2022-09-20 06:59:07'),
(646, NULL, 552, 1096, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', 'PAYID-MMUWUDQ9AU574694H855871S', 'Voter Id', '86446', 'Admin  Dashboard (2)-1663658509.pdf', 'Admin  Dashboard (2)-1663658509.pdf', 1, '2022-09-20 12:51:50', '2022-09-20 07:21:50'),
(647, NULL, NULL, NULL, 209, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583699', 'PAYID-MMUXTJY28258077N93821820', 'Voter Id', '84446546', 'Admin  Dashboard (2)-1663662502.pdf', 'Admin  Dashboard (2)-1663662502.pdf', 1, '2022-09-20 13:58:23', '2022-09-20 08:28:23'),
(648, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMU2UUA98U73408DA435025G', 'Passport', '32132132123', '15-1663674958.png', '16-1663674958.png', 1, '2022-09-20 17:26:00', '2022-09-20 11:56:00'),
(649, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMU3N4Q23X02760FY7052707', 'Voter Id', '32132132123', '15-1663678194.png', '15-1663678194.png', 1, '2022-09-20 18:19:55', '2022-09-20 12:49:55'),
(650, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', 'PAYID-MMVKFAQ02R07106UT6604807', 'Passport', '7897878787', 'About us-1663738497.docx', 'About us-1663738497.docx', 1, '2022-09-21 11:04:58', '2022-09-21 05:34:58'),
(651, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', 'PAYID-MMVKHYQ1FR67175CE575373S', 'Passport', '7897878787', '2022_07_28T06_16_35_798Z-1663738849.jpeg', 'About us-1663738849.docx', 1, '2022-09-21 11:10:50', '2022-09-21 05:40:50'),
(652, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1025167', 'Passport', '5454545485', 'About us-1663740061.docx', 'About us-1663740061.docx', 1, '2022-09-21 11:31:01', '2022-09-21 06:01:01'),
(653, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1343784', 'Voter Id', '78456210', 'About us-1663740197.docx', 'alfafa-1663740197.txt', 1, '2022-09-21 11:33:17', '2022-09-21 06:03:17'),
(654, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '89534', 'Passport', '878456454541', 'About us-1663743523.docx', 'About us-1663743523.docx', 1, '2022-09-21 12:28:44', '2022-09-21 06:58:44'),
(655, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '53738', 'Passport', '487878', 'About us-1663744633.docx', 'About us-1663744633.docx', 1, '2022-09-21 12:47:14', '2022-09-21 07:17:14'),
(656, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '329552', 'Passport', '487878', 'About us-1663744701.docx', 'About us-1663744701.docx', 1, '2022-09-21 12:48:22', '2022-09-21 07:18:22'),
(657, NULL, 458, 1035, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1065371', 'Passport', '487878', 'About us-1663744735.docx', 'About us-1663744735.docx', 1, '2022-09-21 12:48:57', '2022-09-21 07:18:57'),
(658, NULL, 563, 1114, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '38607', 'Voter Id', '9874562584', 'Admin  Dashboard (2)-1663745132.pdf', 'Admin  Dashboard (2)-1663745132.pdf', 1, '2022-09-21 12:55:33', '2022-09-21 07:25:33'),
(659, NULL, NULL, NULL, 218, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMVNJAY4C1730332B0397544', 'Passport', '32132132123', '2a-1663751297.jpg', '3-1663751298.png', 1, '2022-09-21 14:38:19', '2022-09-21 09:08:19'),
(660, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9814725874', '1032435', 'Voter Id', '797799798', 'Admin  Dashboard (2)-1663760371.pdf', 'Admin  Dashboard (2)-1663760371.pdf', 1, '2022-09-21 17:09:32', '2022-09-21 11:39:32'),
(661, NULL, NULL, NULL, 221, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', 'PAYID-MMVP3TQ69173400Y9417051K', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1663761869.pdf', 'Admin  Dashboard (2)-1663761869.pdf', 1, '2022-09-21 17:34:30', '2022-09-21 12:04:30'),
(662, NULL, 458, 1036, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1518172', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1663762126.pdf', 'Admin  Dashboard (2)-1663762126.pdf', 1, '2022-09-21 17:38:47', '2022-09-21 12:08:47'),
(663, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', '1502456', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1663762295.pdf', 'Admin  Dashboard (2)-1663762295.pdf', 1, '2022-09-21 17:41:57', '2022-09-21 12:11:57'),
(664, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', '409283', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1663762424.pdf', 'Admin  Dashboard (2)-1663762424.pdf', 1, '2022-09-21 17:43:45', '2022-09-21 12:13:45'),
(665, NULL, 525, 1056, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '735923', 'Voter Id', '654645987987', 'About us-1663762607.docx', 'About us-1663762607.docx', 1, '2022-09-21 17:46:48', '2022-09-21 12:16:48'),
(666, NULL, NULL, NULL, 221, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'votivephp', '942509544', 'PAYID-MMVQG2A3TC477647X9854436', 'Voter Id', '32132132123', '15-1663763304.png', '15-1663763304.png', 1, '2022-09-21 17:58:24', '2022-09-21 12:28:24'),
(667, NULL, NULL, NULL, 221, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874462587', 'PAYID-MMVQHZY4HB375664V859691K', 'Voter Id', '4454546465456', 'Admin  Dashboard (2)-1663763430.pdf', 'Admin  Dashboard (2)-1663763430.pdf', 1, '2022-09-21 18:00:31', '2022-09-21 12:30:31'),
(668, NULL, 525, 1056, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '444953', 'Passport', '54787878', '4Twoo landing page-1663764123.psd', 'About us-1663764128.docx', 1, '2022-09-21 18:12:09', '2022-09-21 12:42:09'),
(669, NULL, NULL, NULL, 222, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', 'PAYID-MMVQNTA9Y54836952086453W', 'Voter Id', '4646465454', 'Admin  Dashboard (2)-1663764171.pdf', 'Admin  Dashboard (2)-1663764171.pdf', 1, '2022-09-21 18:12:52', '2022-09-21 12:42:52'),
(670, NULL, 525, 1056, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '28882', 'Passport', '654645987987', '2022_07_28T06_16_35_798Z-1663764184.jpeg', '4two-gaeste-1663764184.jpg', 1, '2022-09-21 18:13:06', '2022-09-21 12:43:06'),
(671, NULL, 525, 1056, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '964631', 'Passport', '654645987987', '2022_07_28T06_16_35_798Z-1663764264.jpeg', '4two-gaeste-1663764264.jpg', 1, '2022-09-21 18:14:25', '2022-09-21 12:44:25'),
(672, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.neha@gmail.com', 'Neha', 'Mandloi', '+919131403180', 'PAYID-MMVQ4FY0SK25370WL909242L', 'Voter Id', '1234567890', '1zx-1663766038.png', '3-1663766038.png', 1, '2022-09-21 18:43:59', '2022-09-21 13:13:59'),
(673, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', 'PAYID-MMVQ46Y6BH82296J5200713D', 'Voter Id', '13131313', 'Admin  Dashboard (2)-1663766138.pdf', 'Admin  Dashboard (2)-1663766138.pdf', 1, '2022-09-21 18:45:39', '2022-09-21 13:15:39'),
(674, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMV76DY6D9309846C787462G', 'Passport', '32132132123', '15-1663827726.png', '15-1663827726.png', 1, '2022-09-22 11:52:07', '2022-09-22 06:22:07'),
(675, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMV77GI1H348234G2511851Y', 'Passport', '32132132123', '15-1663827864.png', '15-1663827864.png', 1, '2022-09-22 11:54:25', '2022-09-22 06:24:25'),
(676, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '1204635', 'Voter Id', '446545465', 'Admin  Dashboard (2)-1663829483.pdf', 'Admin  Dashboard (2)-1663829483.pdf', 1, '2022-09-22 12:21:24', '2022-09-22 06:51:24'),
(677, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1173316', 'Voter Id', '44444', 'Admin  Dashboard (2)-1663829627.pdf', 'Admin  Dashboard (2)-1663829627.pdf', 1, '2022-09-22 12:23:49', '2022-09-22 06:53:49'),
(678, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMWDDDA6PE84180PS396980H', 'Passport', '32132132123', '15-1663840651.png', '15-1663840651.png', 1, '2022-09-22 15:27:32', '2022-09-22 09:57:32'),
(679, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'Jha', '09179004123', '107787', 'Voter Id', '7894563210', 'alfafa-1663844794.txt', 'apg-1663844794.txt', 1, '2022-09-22 16:36:35', '2022-09-22 11:06:35'),
(680, NULL, NULL, NULL, 188, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'Jha', '09179004123', '1046677', 'Passport', '45448787878', 'alfafa-1663846688.txt', 'apg-1663846688.txt', 1, '2022-09-22 17:08:09', '2022-09-22 11:38:09'),
(681, NULL, 523, 1048, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '670768', 'Passport', '32132132123', '15-1663847254.png', '15-1663847254.png', 1, '2022-09-22 17:17:35', '2022-09-22 11:47:35');
INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(682, NULL, NULL, NULL, 192, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'Jha', '09179004123', '550617', 'Passport', '654645987987', '4Twoo landing page-1663847862.psd', 'alfafa-1663847868.txt', 1, '2022-09-22 17:27:49', '2022-09-22 11:57:49'),
(683, NULL, 458, 1036, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1134789', 'Passport', '32132132123', '15-1663849233.png', '15-1663849233.png', 1, '2022-09-22 17:50:34', '2022-09-22 12:20:34'),
(684, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '2561', 'Passport', '32132132123', '15-1663850209.png', '15-1663850209.png', 1, '2022-09-22 18:06:50', '2022-09-22 12:36:50'),
(685, NULL, NULL, NULL, 188, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874462587', '1519795', 'Voter Id', '4444646546454', 'Admin  Dashboard (2)-1663909639.pdf', 'Admin  Dashboard (2)-1663909639.pdf', 1, '2022-09-23 10:37:20', '2022-09-23 05:07:20'),
(686, NULL, 458, 1037, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '169065', 'Voter Id', '55544654465', 'Admin  Dashboard (2)-1663911016.pdf', 'Admin  Dashboard (2)-1663911016.pdf', 1, '2022-09-23 11:00:17', '2022-09-23 05:30:17'),
(687, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '614984', 'Voter Id', '6444545', 'Admin  Dashboard (2)-1663911132.pdf', 'Admin  Dashboard (2)-1663911132.pdf', 1, '2022-09-23 11:02:13', '2022-09-23 05:32:13'),
(688, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '649872', 'Voter Id', '4444446', 'Admin  Dashboard (2)-1663911569.pdf', 'Admin  Dashboard (2)-1663911569.pdf', 1, '2022-09-23 11:09:30', '2022-09-23 05:39:30'),
(689, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1027417', 'Voter Id', '15564654654654', 'Admin  Dashboard (2)-1663911783.pdf', 'Admin  Dashboard (2)-1663911783.pdf', 1, '2022-09-23 11:13:04', '2022-09-23 05:43:04'),
(690, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', 'PAYID-MMWX4HI08X04970VV004003L', 'Passport', '32132132123', '15-1663925788.png', '15-1663925788.png', 1, '2022-09-23 15:06:29', '2022-09-23 09:36:29'),
(691, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '1114503', 'Voter Id', '464446464', 'Admin  Dashboard (2)-1663928887.pdf', 'Admin  Dashboard (2)-1663928887.pdf', 1, '2022-09-23 15:58:08', '2022-09-23 10:28:08'),
(692, NULL, 524, 1054, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '1234567890', '1623630', 'Passport', '244242542542', '1649150813_fd06191f-8c6c-436c-a3af-5f2a6a17184c-1663929247.jpg', '1649151380_decor 1-1663929247.jpg', 1, '2022-09-23 16:04:12', '2022-09-23 10:34:12'),
(693, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1119131', 'Passport', '32132132123', '15-1663937195.png', '15-1663937195.png', 1, '2022-09-23 18:16:36', '2022-09-23 12:46:36'),
(694, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '623911', 'Passport', '32132132123', '15-1663996882.png', '15-1663996882.png', 1, '2022-09-24 10:51:23', '2022-09-24 05:21:23'),
(695, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '828374', 'Voter Id', '5465444', 'Admin  Dashboard (2)-1663998175.pdf', 'Admin  Dashboard (2)-1663998175.pdf', 1, '2022-09-24 11:12:56', '2022-09-24 05:42:56'),
(696, NULL, NULL, NULL, 54, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1753649', 'Voter Id', '4464644654', 'Admin  Dashboard (2)-1663998950.pdf', 'Admin  Dashboard (2)-1663998950.pdf', 1, '2022-09-24 11:25:51', '2022-09-24 05:55:51'),
(697, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1640957', 'Passport', '32132132123', '15-1664002874.png', '15-1664002874.png', 1, '2022-09-24 12:31:15', '2022-09-24 07:01:15'),
(698, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '802033', 'Passport', '32132132123', '15-1664003435.png', '15-1664003435.png', 1, '2022-09-24 12:40:36', '2022-09-24 07:10:36'),
(699, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1392602', 'Passport', '32132132123', '15-1664003724.png', '15-1664003724.png', 1, '2022-09-24 12:45:24', '2022-09-24 07:15:24'),
(700, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '172395', 'Voter Id', '64444646', 'Admin  Dashboard (2)-1664013203.pdf', 'Admin  Dashboard (2)-1664013203.pdf', 1, '2022-09-24 15:23:24', '2022-09-24 09:53:24'),
(701, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1045796', 'Voter Id', '4645446465456465', 'Admin  Dashboard (2)-1664013479.pdf', 'Admin  Dashboard (2)-1664013479.pdf', 1, '2022-09-24 15:28:00', '2022-09-24 09:58:00'),
(702, NULL, NULL, NULL, NULL, NULL, 66, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '907435', 'Passport', '32132132123', '15-1664013989.png', '15-1664013989.png', 1, '2022-09-24 15:36:30', '2022-09-24 10:06:30'),
(703, NULL, NULL, NULL, NULL, NULL, 66, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '793488', 'Passport', '32132132123', '15-1664014557.png', '15-1664014557.png', 1, '2022-09-24 15:45:58', '2022-09-24 10:15:58'),
(704, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '87041', 'Voter Id', '44654654654', 'Admin  Dashboard (2)-1664174228.pdf', 'Admin  Dashboard (2)-1664174228.pdf', 1, '2022-09-26 12:07:09', '2022-09-26 06:37:09'),
(705, NULL, 590, 1162, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '539189', 'Voter Id', '45645646', 'Admin  Dashboard (2)-1664174304.pdf', 'Admin  Dashboard (2)-1664174304.pdf', 1, '2022-09-26 12:08:25', '2022-09-26 06:38:25'),
(706, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '915287', 'Voter Id', '45465', 'Admin  Dashboard (2)-1664192515.pdf', 'Admin  Dashboard (2)-1664192515.pdf', 1, '2022-09-26 17:11:56', '2022-09-26 11:41:56'),
(707, NULL, NULL, NULL, 236, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '807444', 'Voter Id', '1555454541', 'Admin  Dashboard (2)-1664192590.pdf', 'Admin  Dashboard (2)-1664192590.pdf', 1, '2022-09-26 17:13:11', '2022-09-26 11:43:11'),
(708, NULL, 598, 1177, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '829299', 'Voter Id', '32132132123', '05-hotelMainImg-1656491329-1664194974.png', '1646894193__117540535_hi052228232-1654607029-1664194974.jpg', 1, '2022-09-26 17:52:55', '2022-09-26 12:22:55'),
(709, NULL, 598, 1177, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '723020', 'Passport', '32132132123', '1-1654321705-1664195229.png', '3-hotelMainImg-1656594224-1664195229.png', 1, '2022-09-26 17:57:10', '2022-09-26 12:27:10'),
(710, NULL, 598, 1177, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1476184', 'Passport', '32132132123', '05-hotelMainImg-1656485074-1664195547.png', '1646894193__117540535_hi052228232-1654607029-1664195547.jpg', 1, '2022-09-26 18:02:28', '2022-09-26 12:32:28'),
(711, NULL, 524, 1054, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '73933', 'Passport', '32132132123', 'front-1664196070.jpg', 'back-1664196070.jpg', 1, '2022-09-26 18:11:10', '2022-09-26 12:41:10'),
(712, NULL, 598, 1177, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '81840', 'Passport', '32132132123', 'front-1664196321.jpg', 'back-1664196321.jpg', 1, '2022-09-26 18:15:22', '2022-09-26 12:45:22'),
(713, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '27851', 'Voter Id', '45645456', 'Admin  Dashboard (2)-1664198891.pdf', 'Admin  Dashboard (2)-1664198891.pdf', 1, '2022-09-26 18:58:12', '2022-09-26 13:28:12'),
(714, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '644924', 'Voter Id', '66446646564', 'Admin  Dashboard (2)-1664198981.pdf', 'Admin  Dashboard (2)-1664198981.pdf', 1, '2022-09-26 18:59:42', '2022-09-26 13:29:42'),
(715, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '55136', 'Voter Id', '46545646', 'Admin  Dashboard (2)-1664254109.pdf', 'Admin  Dashboard (2)-1664254109.pdf', 1, '2022-09-27 10:18:31', '2022-09-27 04:48:31'),
(716, NULL, NULL, NULL, 236, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '515004', 'Voter Id', '6546546546', 'Admin  Dashboard (2)-1664254230.pdf', 'Admin  Dashboard (2)-1664254230.pdf', 1, '2022-09-27 10:20:31', '2022-09-27 04:50:31'),
(717, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1021734', 'Passport', '32132132123', '1655095862_monte2-1664276186.png', '1655108965_destinations_jose_ignacio-1664276186.jpg', 1, '2022-09-27 16:26:28', '2022-09-27 10:56:28'),
(718, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '505311', 'Passport', '32132132123', 'front-1664276510.jpg', 'back-1664276510.jpg', 1, '2022-09-27 16:31:51', '2022-09-27 11:01:51'),
(719, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1648528', 'Voter Id', '546464464', 'Admin  Dashboard (2)-1664278869.pdf', 'Admin  Dashboard (2)-1664278869.pdf', 1, '2022-09-27 17:11:10', '2022-09-27 11:41:10'),
(720, NULL, NULL, NULL, 258, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '355164', 'Voter Id', '544646546', 'Admin  Dashboard (2)-1664278984.pdf', 'Admin  Dashboard (2)-1664278984.pdf', 1, '2022-09-27 17:13:05', '2022-09-27 11:43:05'),
(721, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '651279', 'Voter Id', '4654644644', 'Admin  Dashboard (2)-1664282033.pdf', 'Admin  Dashboard (2)-1664282033.pdf', 1, '2022-09-27 18:03:54', '2022-09-27 12:33:54'),
(722, NULL, NULL, NULL, 192, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562584', '339977', 'Voter Id', '6444546', 'Admin  Dashboard (2)-1664282674.pdf', 'Admin  Dashboard (2)-1664282674.pdf', 1, '2022-09-27 18:14:35', '2022-09-27 12:44:35'),
(723, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561475', '1594125', 'Voter Id', '444654', 'Admin  Dashboard (2)-1664282852.pdf', 'Admin  Dashboard (2)-1664282852.pdf', 1, '2022-09-27 18:17:33', '2022-09-27 12:47:33'),
(724, NULL, 458, 1035, NULL, NULL, NULL, 'votivepushpendraphp@gmail.com', 'ankit', 'test', '953423234', '1051952', 'Passport', '1213141411', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664341937.jpeg', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664341937.jpeg', 1, '2022-09-28 10:42:18', '2022-09-28 05:12:18'),
(725, NULL, 458, 1035, NULL, NULL, NULL, 'votivepushpendraphp@gmail.com', 'pushpendra', 'test', '953423234', '1410466', 'Passport', '1213141411', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664342085.jpeg', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664342085.jpeg', 1, '2022-09-28 10:44:46', '2022-09-28 05:14:46'),
(726, NULL, NULL, NULL, 258, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1164962', 'Voter Id', '54541564', 'Admin  Dashboard (2)-1664344115.pdf', 'Admin  Dashboard (2)-1664344115.pdf', 1, '2022-09-28 11:18:36', '2022-09-28 05:48:36'),
(727, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '102904', 'Voter Id', '465464456', 'Admin  Dashboard (2)-1664348393.pdf', 'Admin  Dashboard (2)-1664348393.pdf', 1, '2022-09-28 12:29:54', '2022-09-28 06:59:54'),
(728, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '232999', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1664361535.pdf', 'Admin  Dashboard (2)-1664361535.pdf', 1, '2022-09-28 16:08:57', '2022-09-28 10:38:57'),
(729, NULL, 458, 1036, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '962700', 'Voter Id', '646444545454', 'Admin  Dashboard (2)-1664440287.pdf', 'Admin  Dashboard (2)-1664440287.pdf', 1, '2022-09-29 14:01:28', '2022-09-29 08:31:28'),
(730, NULL, NULL, NULL, 190, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1134544', 'Voter Id', '464545465', 'Admin  Dashboard (2)-1664443287.pdf', 'Admin  Dashboard (2)-1664443287.pdf', 1, '2022-09-29 14:51:28', '2022-09-29 09:21:28'),
(731, NULL, 458, 1036, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '723818', 'Passport', '4646444', 'Admin  Dashboard (2)-1664445284.pdf', 'Admin  Dashboard (2)-1664445284.pdf', 1, '2022-09-29 15:24:45', '2022-09-29 09:54:45'),
(732, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '379835', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519328.jpeg', '2022_07_28T06_16_35_798Z-1664519328.jpeg', 1, '2022-09-30 11:58:49', '2022-09-30 06:28:49'),
(733, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '587829', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519334.jpeg', '2022_07_28T06_16_35_798Z-1664519334.jpeg', 1, '2022-09-30 11:58:55', '2022-09-30 06:28:55'),
(734, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '628068', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519887.jpeg', '2022_07_28T06_16_35_798Z-1664519887.jpeg', 1, '2022-09-30 12:08:08', '2022-09-30 06:38:08'),
(735, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1422154', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519920.jpeg', '2022_07_28T06_16_35_798Z-1664519920.jpeg', 1, '2022-09-30 12:08:41', '2022-09-30 06:38:41'),
(736, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1082972', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519952.jpeg', '2022_07_28T06_16_35_798Z-1664519952.jpeg', 1, '2022-09-30 12:09:13', '2022-09-30 06:39:13'),
(737, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1139440', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664519976.jpeg', '2022_07_28T06_16_35_798Z-1664519976.jpeg', 1, '2022-09-30 12:09:37', '2022-09-30 06:39:37'),
(738, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '724806', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520007.jpeg', '2022_07_28T06_16_35_798Z-1664520007.jpeg', 1, '2022-09-30 12:10:08', '2022-09-30 06:40:08'),
(739, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1782094', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520014.jpeg', '2022_07_28T06_16_35_798Z-1664520014.jpeg', 1, '2022-09-30 12:10:15', '2022-09-30 06:40:15'),
(740, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '457631', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520056.jpeg', '2022_07_28T06_16_35_798Z-1664520056.jpeg', 1, '2022-09-30 12:10:57', '2022-09-30 06:40:57'),
(741, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1367324', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520140.jpeg', '2022_07_28T06_16_35_798Z-1664520140.jpeg', 1, '2022-09-30 12:12:21', '2022-09-30 06:42:21'),
(742, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1561238', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520173.jpeg', '2022_07_28T06_16_35_798Z-1664520173.jpeg', 1, '2022-09-30 12:12:54', '2022-09-30 06:42:54'),
(743, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1720460', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520326.jpeg', '2022_07_28T06_16_35_798Z-1664520326.jpeg', 1, '2022-09-30 12:15:27', '2022-09-30 06:45:27'),
(744, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1287572', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520442.jpeg', '2022_07_28T06_16_35_798Z-1664520442.jpeg', 1, '2022-09-30 12:17:23', '2022-09-30 06:47:23'),
(745, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1663438', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520524.jpeg', '2022_07_28T06_16_35_798Z-1664520524.jpeg', 1, '2022-09-30 12:18:45', '2022-09-30 06:48:45'),
(746, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '466953', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520597.jpeg', '2022_07_28T06_16_35_798Z-1664520597.jpeg', 1, '2022-09-30 12:19:58', '2022-09-30 06:49:58'),
(747, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1186433', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520641.jpeg', '2022_07_28T06_16_35_798Z-1664520641.jpeg', 1, '2022-09-30 12:20:42', '2022-09-30 06:50:42'),
(748, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1372739', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520672.jpeg', '2022_07_28T06_16_35_798Z-1664520672.jpeg', 1, '2022-09-30 12:21:13', '2022-09-30 06:51:13'),
(749, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1155764', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520708.jpeg', '2022_07_28T06_16_35_798Z-1664520708.jpeg', 1, '2022-09-30 12:21:49', '2022-09-30 06:51:49'),
(750, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1150938', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520802.jpeg', '2022_07_28T06_16_35_798Z-1664520802.jpeg', 1, '2022-09-30 12:23:23', '2022-09-30 06:53:23'),
(751, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '645692', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664520924.jpeg', '2022_07_28T06_16_35_798Z-1664520924.jpeg', 1, '2022-09-30 12:25:25', '2022-09-30 06:55:25'),
(752, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '395072', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521051.jpeg', '2022_07_28T06_16_35_798Z-1664521051.jpeg', 1, '2022-09-30 12:27:32', '2022-09-30 06:57:32'),
(753, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '252630', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521087.jpeg', '2022_07_28T06_16_35_798Z-1664521087.jpeg', 1, '2022-09-30 12:28:08', '2022-09-30 06:58:08'),
(754, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '675325', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521120.jpeg', '2022_07_28T06_16_35_798Z-1664521120.jpeg', 1, '2022-09-30 12:28:41', '2022-09-30 06:58:41'),
(755, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '255080', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521184.jpeg', '2022_07_28T06_16_35_798Z-1664521184.jpeg', 1, '2022-09-30 12:29:45', '2022-09-30 06:59:45'),
(756, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1754270', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521378.jpeg', '2022_07_28T06_16_35_798Z-1664521378.jpeg', 1, '2022-09-30 12:32:59', '2022-09-30 07:02:59'),
(757, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '576848', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521434.jpeg', '2022_07_28T06_16_35_798Z-1664521434.jpeg', 1, '2022-09-30 12:33:55', '2022-09-30 07:03:55'),
(758, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1562971', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521563.jpeg', '2022_07_28T06_16_35_798Z-1664521563.jpeg', 1, '2022-09-30 12:36:04', '2022-09-30 07:06:04'),
(759, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1244548', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521593.jpeg', '2022_07_28T06_16_35_798Z-1664521593.jpeg', 1, '2022-09-30 12:36:34', '2022-09-30 07:06:34'),
(760, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1599565', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521699.jpeg', '2022_07_28T06_16_35_798Z-1664521699.jpeg', 1, '2022-09-30 12:38:21', '2022-09-30 07:08:21'),
(761, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '133824', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521715.jpeg', '2022_07_28T06_16_35_798Z-1664521715.jpeg', 1, '2022-09-30 12:38:36', '2022-09-30 07:08:36'),
(762, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '109657', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521749.jpeg', '2022_07_28T06_16_35_798Z-1664521749.jpeg', 1, '2022-09-30 12:39:11', '2022-09-30 07:09:11'),
(763, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '816427', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521800.jpeg', '2022_07_28T06_16_35_798Z-1664521800.jpeg', 1, '2022-09-30 12:40:01', '2022-09-30 07:10:01'),
(764, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1782272', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521861.jpeg', '2022_07_28T06_16_35_798Z-1664521861.jpeg', 1, '2022-09-30 12:41:02', '2022-09-30 07:11:02'),
(765, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '318695', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521922.jpeg', '2022_07_28T06_16_35_798Z-1664521922.jpeg', 1, '2022-09-30 12:42:03', '2022-09-30 07:12:03'),
(766, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '648779', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521981.jpeg', '2022_07_28T06_16_35_798Z-1664521981.jpeg', 1, '2022-09-30 12:43:02', '2022-09-30 07:13:02'),
(767, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '851894', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664521998.jpeg', '2022_07_28T06_16_35_798Z-1664521998.jpeg', 1, '2022-09-30 12:43:19', '2022-09-30 07:13:19'),
(768, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1520127', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664522156.jpeg', '2022_07_28T06_16_35_798Z-1664522156.jpeg', 1, '2022-09-30 12:45:57', '2022-09-30 07:15:57'),
(769, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '870548', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664522189.jpeg', '2022_07_28T06_16_35_798Z-1664522189.jpeg', 1, '2022-09-30 12:46:30', '2022-09-30 07:16:30'),
(770, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '583651', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664522257.jpeg', '2022_07_28T06_16_35_798Z-1664522257.jpeg', 1, '2022-09-30 12:47:38', '2022-09-30 07:17:38'),
(771, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '557355', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664523012.jpeg', '2022_07_28T06_16_35_798Z-1664523012.jpeg', 1, '2022-09-30 13:00:13', '2022-09-30 07:30:13'),
(772, NULL, NULL, NULL, 190, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '291212', 'Passport', '78789787', '2022_07_28T06_16_35_798Z-1664523020.jpeg', '2022_07_28T06_16_35_798Z-1664523020.jpeg', 1, '2022-09-30 13:00:21', '2022-09-30 07:30:21'),
(773, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '459288', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526002.jpeg', '2022_07_28T06_16_35_798Z-1664526002.jpeg', 1, '2022-09-30 13:50:03', '2022-09-30 08:20:04'),
(774, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '36586', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526241.jpeg', '2022_07_28T06_16_35_798Z-1664526241.jpeg', 1, '2022-09-30 13:54:02', '2022-09-30 08:24:02'),
(775, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1754411', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526264.jpeg', '2022_07_28T06_16_35_798Z-1664526264.jpeg', 1, '2022-09-30 13:54:25', '2022-09-30 08:24:25'),
(776, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '613561', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526301.jpeg', '2022_07_28T06_16_35_798Z-1664526301.jpeg', 1, '2022-09-30 13:55:02', '2022-09-30 08:25:02'),
(777, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1542931', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526344.jpeg', '2022_07_28T06_16_35_798Z-1664526344.jpeg', 1, '2022-09-30 13:55:45', '2022-09-30 08:25:45'),
(778, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '121088', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664526428.jpeg', '2022_07_28T06_16_35_798Z-1664526428.jpeg', 1, '2022-09-30 13:57:09', '2022-09-30 08:27:09'),
(779, NULL, 458, 1036, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874562587', '551429', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1664530806.pdf', 'Admin  Dashboard (2)-1664530806.pdf', 1, '2022-09-30 15:10:07', '2022-09-30 09:40:07'),
(780, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '514614', 'Passport', '987979797979', '2022_07_28T06_16_35_798Z-1664531240.jpeg', '2022_07_28T06_16_35_798Z-1664531240.jpeg', 1, '2022-09-30 15:17:21', '2022-09-30 09:47:21'),
(781, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1345149', 'Passport', '787878787', '2022_07_28T06_16_35_798Z-1664531275.jpeg', '2022_07_28T06_16_35_798Z-1664531275.jpeg', 1, '2022-09-30 15:17:56', '2022-09-30 09:47:56'),
(782, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '865706', 'Voter Id', '878787888', '2022_07_28T06_16_35_798Z-1664531364.jpeg', '2022_07_28T06_16_35_798Z-1664531364.jpeg', 1, '2022-09-30 15:19:25', '2022-09-30 09:49:25'),
(783, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1132875', 'Voter Id', '878787888', '2022_07_28T06_16_35_798Z-1664531981.jpeg', '2022_07_28T06_16_35_798Z-1664531981.jpeg', 1, '2022-09-30 15:29:42', '2022-09-30 09:59:42'),
(784, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '619703', 'Passport', '32132132123', 'front-1664539177.jpg', 'back-1664539177.jpg', 1, '2022-09-30 17:29:38', '2022-09-30 11:59:38'),
(785, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '18212', 'Voter Id', '878787888', '2022_07_28T06_16_35_798Z-1664540956.jpeg', '2022_07_28T06_16_35_798Z-1664540956.jpeg', 1, '2022-09-30 17:59:17', '2022-09-30 12:29:17'),
(786, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '357516', 'Voter Id', '878787888', '2022_07_28T06_16_35_798Z-1664541087.jpeg', '2022_07_28T06_16_35_798Z-1664541087.jpeg', 1, '2022-09-30 18:01:28', '2022-09-30 12:31:28'),
(787, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '885332', 'Passport', '7897878787', '2022_07_28T06_16_35_798Z-1664542044.jpeg', '2022_07_28T06_16_35_798Z-1664542044.jpeg', 1, '2022-09-30 18:17:25', '2022-09-30 12:47:25'),
(788, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1033533', 'Passport', '78454123651', '2022_07_28T06_16_35_798Z-1664543856.jpeg', '2022_07_28T06_16_35_798Z-1664543856.jpeg', 1, '2022-09-30 18:47:37', '2022-09-30 13:17:37'),
(789, NULL, 458, 1036, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1721479', 'Passport', '78454123651', '2022_07_28T06_16_35_798Z-1664543912.jpeg', '2022_07_28T06_16_35_798Z-1664543912.jpeg', 1, '2022-09-30 18:48:33', '2022-09-30 13:18:33'),
(790, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1472240', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664605021.jpeg', '4two-gaeste-2-1664605021.jpg', 1, '2022-10-01 11:47:02', '2022-10-01 06:17:02'),
(791, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '292816', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664605198.jpeg', '4two-gaeste-2-1664605198.jpg', 1, '2022-10-01 11:50:00', '2022-10-01 06:20:00'),
(792, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '222259', 'Voter Id', '465464654', 'Admin  Dashboard (2)-1664605310.pdf', 'Admin  Dashboard (2)-1664605310.pdf', 1, '2022-10-01 11:51:51', '2022-10-01 06:21:51'),
(793, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '933636', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664607455.jpeg', '4two-gaeste-2-1664607455.jpg', 1, '2022-10-01 12:27:36', '2022-10-01 06:57:36'),
(794, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '347692', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664607616.jpeg', '4two-gaeste-2-1664607616.jpg', 1, '2022-10-01 12:30:17', '2022-10-01 07:00:17'),
(795, NULL, 524, 1054, NULL, NULL, NULL, 'ss@gmail.com', 'dss', 'sd', '456461651', '1722554', 'Voter Id', '4568', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-24 at 17.17.59-1664607723.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-26 at 12.52.12-1664607723.png', 1, '2022-10-01 12:32:04', '2022-10-01 07:02:04'),
(796, NULL, 524, 1054, NULL, NULL, NULL, 'ss@gmail.com', 'dss', 'sd', '456461651', '664607', 'Voter Id', '4568', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-24 at 17.17.59-1664607725.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-26 at 12.52.12-1664607725.png', 1, '2022-10-01 12:32:06', '2022-10-01 07:02:06'),
(797, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '839216', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664607758.jpeg', '4two-gaeste-2-1664607758.jpg', 1, '2022-10-01 12:32:39', '2022-10-01 07:02:39'),
(798, NULL, 524, 1054, NULL, NULL, NULL, 'ss@gmail.com', 'dss', 'sd', '456461651', '1681433', 'Voter Id', '4568', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-24 at 17.17.59-1664607766.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-26 at 12.52.12-1664607766.png', 1, '2022-10-01 12:32:47', '2022-10-01 07:02:47'),
(799, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1012724', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664607788.jpeg', '4two-gaeste-2-1664607788.jpg', 1, '2022-10-01 12:33:09', '2022-10-01 07:03:09'),
(800, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '739677', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664607896.jpeg', '4two-gaeste-2-1664607896.jpg', 1, '2022-10-01 12:34:58', '2022-10-01 07:04:58'),
(801, NULL, 524, 1055, NULL, NULL, NULL, 'ss@gmail.com', 'shweta', 'sharma', '654787932', '682730', 'Voter Id', '6547', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-15 at 14.12.08-1664607912.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-10-01 at 11.34.00-1664607912.png', 1, '2022-10-01 12:35:13', '2022-10-01 07:05:13'),
(802, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '392940', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608006.jpeg', '4two-gaeste-2-1664608006.jpg', 1, '2022-10-01 12:36:47', '2022-10-01 07:06:47'),
(803, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1531981', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608025.jpeg', '4two-gaeste-2-1664608025.jpg', 1, '2022-10-01 12:37:07', '2022-10-01 07:07:07'),
(804, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '798005', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608034.jpeg', '4two-gaeste-2-1664608034.jpg', 1, '2022-10-01 12:37:15', '2022-10-01 07:07:15'),
(805, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '401767', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608042.jpeg', '4two-gaeste-2-1664608042.jpg', 1, '2022-10-01 12:37:24', '2022-10-01 07:07:24'),
(806, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1028365', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608297.jpeg', '4two-gaeste-2-1664608297.jpg', 1, '2022-10-01 12:41:38', '2022-10-01 07:11:38'),
(807, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1459565', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608337.jpeg', '4two-gaeste-2-1664608337.jpg', 1, '2022-10-01 12:42:18', '2022-10-01 07:12:18'),
(808, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1739287', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608434.jpeg', '4two-gaeste-2-1664608434.jpg', 1, '2022-10-01 12:43:56', '2022-10-01 07:13:56'),
(809, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1002622', 'Passport', '32132132123', 'front-1664608442.jpg', 'back-1664608442.jpg', 1, '2022-10-01 12:44:03', '2022-10-01 07:14:03'),
(810, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1174452', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608472.jpeg', '4two-gaeste-2-1664608472.jpg', 1, '2022-10-01 12:44:34', '2022-10-01 07:14:34'),
(811, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '174089', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608512.jpeg', '4two-gaeste-2-1664608512.jpg', 1, '2022-10-01 12:45:13', '2022-10-01 07:15:13'),
(812, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '919159', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608552.jpeg', '4two-gaeste-2-1664608552.jpg', 1, '2022-10-01 12:45:53', '2022-10-01 07:15:53'),
(813, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '63303', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608571.jpeg', '4two-gaeste-2-1664608571.jpg', 1, '2022-10-01 12:46:12', '2022-10-01 07:16:12'),
(814, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1330280', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608634.jpeg', '4two-gaeste-2-1664608634.jpg', 1, '2022-10-01 12:47:16', '2022-10-01 07:17:16'),
(815, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '775765', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608667.jpeg', '4two-gaeste-2-1664608667.jpg', 1, '2022-10-01 12:47:49', '2022-10-01 07:17:49'),
(816, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1125047', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608697.jpeg', '4two-gaeste-2-1664608697.jpg', 1, '2022-10-01 12:48:18', '2022-10-01 07:18:18'),
(817, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1093387', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608701.jpeg', '4two-gaeste-2-1664608701.jpg', 1, '2022-10-01 12:48:22', '2022-10-01 07:18:22'),
(818, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1591172', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608786.jpeg', '4two-gaeste-2-1664608786.jpg', 1, '2022-10-01 12:49:47', '2022-10-01 07:19:47'),
(819, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '234938', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608826.jpeg', '4two-gaeste-2-1664608826.jpg', 1, '2022-10-01 12:50:27', '2022-10-01 07:20:27'),
(820, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1167308', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608877.jpeg', '4two-gaeste-2-1664608877.jpg', 1, '2022-10-01 12:51:18', '2022-10-01 07:21:18'),
(821, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1125735', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664608942.jpeg', '4two-gaeste-2-1664608942.jpg', 1, '2022-10-01 12:52:23', '2022-10-01 07:22:23'),
(822, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1750391', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612303.jpeg', '4two-gaeste-2-1664612303.jpg', 1, '2022-10-01 13:48:24', '2022-10-01 08:18:24'),
(823, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1089398', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612354.jpeg', '4two-gaeste-2-1664612354.jpg', 1, '2022-10-01 13:49:15', '2022-10-01 08:19:15'),
(824, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '954359', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612380.jpeg', '4two-gaeste-2-1664612380.jpg', 1, '2022-10-01 13:49:42', '2022-10-01 08:19:42'),
(825, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '301441', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612486.jpeg', '4two-gaeste-2-1664612486.jpg', 1, '2022-10-01 13:51:28', '2022-10-01 08:21:28'),
(826, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '485031', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612616.jpeg', '4two-gaeste-2-1664612616.jpg', 1, '2022-10-01 13:53:37', '2022-10-01 08:23:37'),
(827, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '348037', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612640.jpeg', '4two-gaeste-2-1664612640.jpg', 1, '2022-10-01 13:54:01', '2022-10-01 08:24:01'),
(828, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1407533', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612681.jpeg', '4two-gaeste-2-1664612681.jpg', 1, '2022-10-01 13:54:42', '2022-10-01 08:24:42'),
(829, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '960301', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612712.jpeg', '4two-gaeste-2-1664612712.jpg', 1, '2022-10-01 13:55:13', '2022-10-01 08:25:13'),
(830, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '837971', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612760.jpeg', '4two-gaeste-2-1664612760.jpg', 1, '2022-10-01 13:56:02', '2022-10-01 08:26:02'),
(831, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '536178', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612817.jpeg', '4two-gaeste-2-1664612817.jpg', 1, '2022-10-01 13:56:59', '2022-10-01 08:26:59'),
(832, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1278275', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612870.jpeg', '4two-gaeste-2-1664612870.jpg', 1, '2022-10-01 13:57:51', '2022-10-01 08:27:51'),
(833, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '455393', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612909.jpeg', '4two-gaeste-2-1664612909.jpg', 1, '2022-10-01 13:58:30', '2022-10-01 08:28:30'),
(834, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '378153', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664612923.jpeg', '4two-gaeste-2-1664612923.jpg', 1, '2022-10-01 13:58:44', '2022-10-01 08:28:44'),
(835, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '615361', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613049.jpeg', '4two-gaeste-2-1664613049.jpg', 1, '2022-10-01 14:00:52', '2022-10-01 08:30:52'),
(836, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '738521', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613091.jpeg', '4two-gaeste-2-1664613091.jpg', 1, '2022-10-01 14:01:32', '2022-10-01 08:31:32'),
(837, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1295298', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613096.jpeg', '4two-gaeste-2-1664613096.jpg', 1, '2022-10-01 14:01:37', '2022-10-01 08:31:37'),
(838, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '313422', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613164.jpeg', '4two-gaeste-2-1664613164.jpg', 1, '2022-10-01 14:02:46', '2022-10-01 08:32:46'),
(839, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1011808', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613206.jpeg', '4two-gaeste-2-1664613206.jpg', 1, '2022-10-01 14:03:28', '2022-10-01 08:33:28'),
(840, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1105581', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613294.jpeg', '4two-gaeste-2-1664613294.jpg', 1, '2022-10-01 14:04:55', '2022-10-01 08:34:55'),
(841, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '180910', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613445.jpeg', '4two-gaeste-2-1664613445.jpg', 1, '2022-10-01 14:07:27', '2022-10-01 08:37:27'),
(842, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1091919', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613475.jpeg', '4two-gaeste-2-1664613475.jpg', 1, '2022-10-01 14:07:56', '2022-10-01 08:37:56'),
(843, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1035030', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613533.jpeg', '4two-gaeste-2-1664613533.jpg', 1, '2022-10-01 14:08:54', '2022-10-01 08:38:54'),
(844, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1324522', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613560.jpeg', '4two-gaeste-2-1664613560.jpg', 1, '2022-10-01 14:09:21', '2022-10-01 08:39:21'),
(845, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '649890', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613593.jpeg', '4two-gaeste-2-1664613593.jpg', 1, '2022-10-01 14:09:54', '2022-10-01 08:39:54'),
(846, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1071042', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613743.jpeg', '4two-gaeste-2-1664613743.jpg', 1, '2022-10-01 14:12:24', '2022-10-01 08:42:24'),
(847, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '431051', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613792.jpeg', '4two-gaeste-2-1664613792.jpg', 1, '2022-10-01 14:13:13', '2022-10-01 08:43:13'),
(848, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '738406', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613812.jpeg', '4two-gaeste-2-1664613812.jpg', 1, '2022-10-01 14:13:33', '2022-10-01 08:43:33'),
(849, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1632651', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613850.jpeg', '4two-gaeste-2-1664613850.jpg', 1, '2022-10-01 14:14:11', '2022-10-01 08:44:11'),
(850, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '1691634', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664613881.jpeg', '4two-gaeste-2-1664613881.jpg', 1, '2022-10-01 14:14:43', '2022-10-01 08:44:43'),
(851, NULL, 525, 1057, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '9179004123', '553614', 'Passport', '9856412301', '2022_07_28T06_16_35_798Z-1664614022.jpeg', '4two-gaeste-2-1664614022.jpg', 1, '2022-10-01 14:17:03', '2022-10-01 08:47:03'),
(852, NULL, 524, 1055, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1615685', 'Voter Id', '654464646', 'pexels-andrea-piacquadio-755022-1664616702.jpg', 'Admin  Dashboard (10)-1664616702.pdf', 1, '2022-10-01 15:01:43', '2022-10-01 09:31:43'),
(853, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1621933', 'Voter Id', '5464646', 'Admin  Dashboard (2)-1664617204.pdf', 'Admin  Dashboard (2)-1664617204.pdf', 1, '2022-10-01 15:10:05', '2022-10-01 09:40:05'),
(854, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '392490', 'Voter Id', '7412583698', 'Admin  Dashboard (2)-1664617391.pdf', 'Admin  Dashboard (2)-1664617391.pdf', 1, '2022-10-01 15:13:12', '2022-10-01 09:43:12'),
(855, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '253638', 'Passport', '32132132123', 'front-1664617485.jpg', 'back-1664617485.jpg', 1, '2022-10-01 15:14:46', '2022-10-01 09:44:46'),
(856, NULL, NULL, NULL, 236, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '6261678742', '136353', 'Voter Id', '4512541254', '1024mmm-1664617704.png', 'circlf-1664617704.png', 1, '2022-10-01 15:18:26', '2022-10-01 09:48:26'),
(857, NULL, NULL, NULL, 236, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '6261678742', '926785', 'Voter Id', '4512541254', '1024mmm-1664618052.png', 'circlf-1664618052.png', 1, '2022-10-01 15:24:14', '2022-10-01 09:54:14'),
(858, NULL, NULL, NULL, 236, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '6261678742', '1253999', 'Voter Id', '4512541254', '1024mmm-1664618095.png', 'circlf-1664618095.png', 1, '2022-10-01 15:24:56', '2022-10-01 09:54:56'),
(859, NULL, NULL, NULL, 236, NULL, NULL, 'votivedesigner.krishna@gmail.com', 'krishna', 'patel', '6261678742', '1462826', 'Voter Id', '4512541254', '1024mmm-1664618461.png', 'circlf-1664618461.png', 1, '2022-10-01 15:31:03', '2022-10-01 10:01:03'),
(860, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '966198', 'Passport', '32132132123', 'front-1664620995.jpg', 'back-1664620995.jpg', 1, '2022-10-01 16:13:16', '2022-10-01 10:43:16'),
(861, NULL, 458, 1035, NULL, NULL, NULL, 'ss@gmail.com', 'sdfsf', 'ssd', '523572572', '1517449', 'Voter Id', '24245', 'Simulator Screen Shot - iPhone 12 Pro - 2022-10-01 at 11.34.00-1664621031.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-26 at 12.52.12-1664621031.png', 1, '2022-10-01 16:13:52', '2022-10-01 10:43:52'),
(862, NULL, 458, 1035, NULL, NULL, NULL, 'ss@gmail.com', 'sdfsf', 'ssd', '523572572', '1169193', 'Voter Id', '24245', 'Simulator Screen Shot - iPhone 12 Pro - 2022-10-01 at 11.34.00-1664621197.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-26 at 12.52.12-1664621197.png', 1, '2022-10-01 16:16:38', '2022-10-01 10:46:38'),
(863, NULL, NULL, NULL, 258, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1554530', 'Passport', '5454545485', 'homework_classpertshome-1664624429.sql', 'home_work (1)-1664624429.sql', 1, '2022-10-01 17:10:30', '2022-10-01 11:40:30'),
(864, NULL, NULL, NULL, 258, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1028001', 'Passport', '5454545485', 'homework_classpertshome-1664624477.sql', 'home_work (1)-1664624477.sql', 1, '2022-10-01 17:11:18', '2022-10-01 11:41:18'),
(865, NULL, NULL, NULL, NULL, NULL, 65, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '793988', 'Passport', '78454123651', 'dinner_imgg-1664625957.png', 'dinner_imgg-1664625958.png', 1, '2022-10-01 17:35:59', '2022-10-01 12:05:59');
INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(866, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1694299', 'Passport', '32132132123', 'front-1664627741.jpg', 'back-1664627741.jpg', 1, '2022-10-01 18:05:42', '2022-10-01 12:35:42'),
(867, NULL, NULL, NULL, NULL, NULL, 140, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '859546', 'Voter Id', '1654456', 'Admin  Dashboard (5)-1664628080.pdf', 'Admin  Dashboard (5)-1664628080.pdf', 1, '2022-10-01 18:11:21', '2022-10-01 12:41:21'),
(868, NULL, 458, 1035, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '584554', 'Voter Id', '9871313', 'Admin  Dashboard (4)-1664628343.pdf', 'Admin  Dashboard (5)-1664628343.pdf', 1, '2022-10-01 18:15:44', '2022-10-01 12:45:44'),
(869, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '232967', 'Voter Id', '1485236986544', 'Admin  Dashboard (5)-1664629062.pdf', 'Admin  Dashboard (10)-1664629062.pdf', 1, '2022-10-01 18:27:43', '2022-10-01 12:57:43'),
(870, NULL, NULL, NULL, NULL, 473, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '212340', 'Voter Id', '9874562587', 'Admin  Dashboard (5)-1664629338.pdf', 'Admin  Dashboard (5)-1664629338.pdf', 1, '2022-10-01 18:32:19', '2022-10-01 13:02:19'),
(871, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '485717', 'Passport', '32132132123', 'front-1664948431.jpg', 'back-1664948431.jpg', 1, '2022-10-05 11:10:32', '2022-10-05 05:40:32'),
(872, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1142501', 'Passport', '32132132123', 'front-1664953238.jpg', 'back-1664953238.jpg', 1, '2022-10-05 12:30:39', '2022-10-05 07:00:39'),
(873, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1001845', 'Passport', '32132132123', 'front-1664954145.jpg', 'back-1664954145.jpg', 1, '2022-10-05 12:45:46', '2022-10-05 07:15:46'),
(874, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '819088', 'Passport', '32132132123', 'front-1664954512.jpg', 'back-1664954512.jpg', 1, '2022-10-05 12:51:54', '2022-10-05 07:21:54'),
(875, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1138679', 'Voter Id', '31564464', 'Admin  Dashboard (4)-1665035528.pdf', 'Admin  Dashboard (5)-1665035529.pdf', 1, '2022-10-06 11:22:10', '2022-10-06 05:52:10'),
(876, NULL, 625, 1242, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '129517', 'Voter Id', '232565556', 'Admin  Dashboard (5)-1665037402.pdf', 'Admin  Dashboard (6)-1665037402.pdf', 1, '2022-10-06 11:53:24', '2022-10-06 06:23:24'),
(877, NULL, NULL, NULL, 287, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '794446', 'Voter Id', '1654564646', 'Admin  Dashboard (5)-1665038865.pdf', 'Admin  Dashboard (5)-1665038865.pdf', 1, '2022-10-06 12:17:46', '2022-10-06 06:47:46'),
(878, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1374571', 'Voter Id', '454654', 'Admin  Dashboard (4)-1665039094.pdf', 'Admin  Dashboard (5)-1665039094.pdf', 1, '2022-10-06 12:21:36', '2022-10-06 06:51:36'),
(879, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '605966', 'Voter Id', '32132132123', 'front-1665040635.jpg', 'back-1665040635.jpg', 1, '2022-10-06 12:47:16', '2022-10-06 07:17:16'),
(880, NULL, NULL, NULL, NULL, 783, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '784669', 'Voter Id', '554', 'Admin  Dashboard (5)-1665040938.pdf', 'Admin  Dashboard (4)-1665040938.pdf', 1, '2022-10-06 12:52:19', '2022-10-06 07:22:19'),
(881, NULL, NULL, NULL, NULL, NULL, 65, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '79906', 'Voter Id', '6544564', 'Admin  Dashboard (9)-1665044577.pdf', 'Admin  Dashboard (10)-1665044577.pdf', 1, '2022-10-06 13:52:59', '2022-10-06 08:22:59'),
(882, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '19035', 'Passport', '32132132123', 'front-1665045708.jpg', 'back-1665045708.jpg', 1, '2022-10-06 14:11:49', '2022-10-06 08:41:49'),
(883, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '318486', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665045860.pdf', 'Admin  Dashboard (10)-1665045860.pdf', 1, '2022-10-06 14:14:22', '2022-10-06 08:44:22'),
(884, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1499238', 'Passport', '32132132123', 'front-1665046625.jpg', 'back-1665046625.jpg', 1, '2022-10-06 14:27:06', '2022-10-06 08:57:06'),
(885, NULL, 458, 1035, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '1149835', 'Voter Id', '464644465', 'Admin  Dashboard (4)-1665048245.pdf', 'Admin  Dashboard (4)-1665048245.pdf', 1, '2022-10-06 14:54:06', '2022-10-06 09:24:06'),
(886, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '675526', 'Voter Id', '4654464544', 'Admin  Dashboard (4)-1665048320.pdf', 'Admin  Dashboard (6)-1665048320.pdf', 1, '2022-10-06 14:55:21', '2022-10-06 09:25:21'),
(887, NULL, 458, 1035, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '9874562587', '485306', 'Voter Id', '564654', 'Admin  Dashboard (4)-1665048667.pdf', 'Admin  Dashboard (4)-1665048667.pdf', 1, '2022-10-06 15:01:09', '2022-10-06 09:31:09'),
(888, NULL, NULL, NULL, 287, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'SAHU', '9874561478', '1742130', 'Voter Id', '6546454', 'Admin  Dashboard (4)-1665048726.pdf', 'Admin  Dashboard (5)-1665048726.pdf', 1, '2022-10-06 15:02:08', '2022-10-06 09:32:08'),
(889, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1010223', 'Voter Id', '74646465', 'Admin  Dashboard (3)-1665048790.pdf', 'Admin  Dashboard (5)-1665048790.pdf', 1, '2022-10-06 15:03:11', '2022-10-06 09:33:11'),
(890, NULL, NULL, NULL, 287, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '757975', 'Voter Id', '7412589877', 'Admin  Dashboard (3)-1665049631.pdf', 'Admin  Dashboard (4)-1665049631.pdf', 1, '2022-10-06 15:17:13', '2022-10-06 09:47:13'),
(891, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', '1534375', 'Voter Id', '44466454', 'Admin  Dashboard (4)-1665050095.pdf', 'Admin  Dashboard (5)-1665050095.pdf', 1, '2022-10-06 15:24:56', '2022-10-06 09:54:56'),
(892, NULL, NULL, NULL, 287, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1332523', 'Voter Id', '4545644', 'Admin  Dashboard (3)-1665050203.pdf', 'Admin  Dashboard (4)-1665050203.pdf', 1, '2022-10-06 15:26:44', '2022-10-06 09:56:44'),
(893, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '782515', 'Voter Id', '7412587417', 'Admin  Dashboard (4)-1665050259.pdf', 'Admin  Dashboard (5)-1665050259.pdf', 1, '2022-10-06 15:27:41', '2022-10-06 09:57:41'),
(894, NULL, 626, 1246, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '872549', 'Voter Id', '7412589874', 'Admin  Dashboard (4)-1665051899.pdf', 'Admin  Dashboard (6)-1665051899.pdf', 1, '2022-10-06 15:55:01', '2022-10-06 10:25:01'),
(895, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '646483', 'Passport', '32132132123', 'front-1665052074.jpg', 'back-1665052074.jpg', 1, '2022-10-06 15:57:55', '2022-10-06 10:27:55'),
(896, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '222367', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665057542.pdf', 'Admin  Dashboard (5)-1665057542.pdf', 1, '2022-10-06 17:29:04', '2022-10-06 11:59:04'),
(897, NULL, 627, 1249, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '681268', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665057609.pdf', 'Admin  Dashboard (5)-1665057609.pdf', 1, '2022-10-06 17:30:10', '2022-10-06 12:00:10'),
(898, NULL, NULL, NULL, 289, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561478', '735070', 'Voter Id', '79887779', 'Admin  Dashboard (4)-1665057807.pdf', 'Admin  Dashboard (5)-1665057807.pdf', 1, '2022-10-06 17:33:28', '2022-10-06 12:03:28'),
(899, NULL, NULL, NULL, NULL, NULL, 142, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '599209', 'Voter Id', '64444664', 'pexels-donald-tong-189293-1665057933.jpg', 'pexels-donald-tong-189293-1665057933.jpg', 1, '2022-10-06 17:35:34', '2022-10-06 12:05:34'),
(900, NULL, 628, 1251, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '834782', 'Voter Id', '9874562587', 'Admin  Dashboard (5)-1665059212.pdf', 'Admin  Dashboard (5)-1665059212.pdf', 1, '2022-10-06 17:56:53', '2022-10-06 12:26:53'),
(901, NULL, NULL, NULL, NULL, 786, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '337766', 'Voter Id', '444644', 'Admin  Dashboard (4)-1665059411.pdf', 'Admin  Dashboard (5)-1665059411.pdf', 1, '2022-10-06 18:00:12', '2022-10-06 12:30:12'),
(902, NULL, NULL, NULL, 289, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1726849', 'Voter Id', '4565456456', 'Admin  Dashboard (4)-1665060034.pdf', 'Admin  Dashboard (4)-1665060034.pdf', 1, '2022-10-06 18:10:35', '2022-10-06 12:40:35'),
(903, NULL, NULL, NULL, NULL, NULL, 142, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '817717', 'Voter Id', '4546466', 'Admin  Dashboard (3)-1665062516.pdf', 'Admin  Dashboard (5)-1665062516.pdf', 1, '2022-10-06 18:51:57', '2022-10-06 13:21:57'),
(904, NULL, 629, 1252, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '271447', 'Voter Id', '66444644', 'Admin  Dashboard (3)-1665120207.pdf', 'Admin  Dashboard (9)-1665120207.pdf', 1, '2022-10-07 10:53:29', '2022-10-07 05:23:29'),
(905, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1614691', 'Voter Id', '44446', 'Admin  Dashboard (4)-1665120321.pdf', 'Admin  Dashboard (5)-1665120321.pdf', 1, '2022-10-07 10:55:22', '2022-10-07 05:25:22'),
(906, NULL, 630, 1254, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1461334', 'Voter Id', '46464444', 'Admin  Dashboard (4)-1665121464.pdf', 'Admin  Dashboard (5)-1665121464.pdf', 1, '2022-10-07 11:14:25', '2022-10-07 05:44:25'),
(907, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '209708', 'Voter Id', '5444554456', 'Admin  Dashboard (4)-1665121886.pdf', 'Admin  Dashboard (10)-1665121886.pdf', 1, '2022-10-07 11:21:28', '2022-10-07 05:51:28'),
(908, NULL, NULL, NULL, 290, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1279157', 'Voter Id', '7419874147', 'Admin  Dashboard (4)-1665126010.pdf', 'Admin  Dashboard (5)-1665126010.pdf', 1, '2022-10-07 12:30:11', '2022-10-07 07:00:11'),
(909, NULL, 629, 1252, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1142861', 'Voter Id', '484544554', 'Admin  Dashboard (4)-1665126462.pdf', 'Admin  Dashboard (5)-1665126462.pdf', 1, '2022-10-07 12:37:43', '2022-10-07 07:07:43'),
(910, NULL, NULL, NULL, NULL, NULL, 143, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1109471', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665127394.pdf', 'Admin  Dashboard (5)-1665127394.pdf', 1, '2022-10-07 12:53:16', '2022-10-07 07:23:16'),
(911, NULL, 630, 1255, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1635290', 'Voter Id', '454456654', 'Admin  Dashboard (4)-1665127755.pdf', 'Admin  Dashboard (5)-1665127755.pdf', 1, '2022-10-07 12:59:17', '2022-10-07 07:29:17'),
(912, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '295511', 'Voter Id', '455564465', 'Admin  Dashboard (4)-1665130854.pdf', 'Admin  Dashboard (5)-1665130854.pdf', 1, '2022-10-07 13:50:56', '2022-10-07 08:20:56'),
(913, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '938536', 'Passport', '32132132123', 'front-1665134676.jpg', 'back-1665134676.jpg', 1, '2022-10-07 14:54:37', '2022-10-07 09:24:37'),
(914, NULL, 525, 1056, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '352361', 'Passport', '32132132123', 'back-1665135620.jpg', 'front-1665135620.jpg', 1, '2022-10-07 15:10:21', '2022-10-07 09:40:21'),
(915, NULL, 458, 1035, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412589874', '39374', 'Passport', '46446446', 'Admin  Dashboard (4)-1665137173.pdf', 'Admin  Dashboard (4)-1665137173.pdf', 1, '2022-10-07 15:36:14', '2022-10-07 10:06:14'),
(916, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1330903', 'Voter Id', '44464444654', 'Admin  Dashboard (4)-1665137825.pdf', 'Admin  Dashboard (5)-1665137825.pdf', 1, '2022-10-07 15:47:10', '2022-10-07 10:17:10'),
(917, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1275666', 'Voter Id', '71478756454544', 'Admin  Dashboard (4)-1665138892.pdf', 'Admin  Dashboard (5)-1665138892.pdf', 1, '2022-10-07 16:04:54', '2022-10-07 10:34:54'),
(918, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '3456453453', '283849', 'Voter Id', '45645645', '77ce4780-c931-11eb-b7de-6f1d3275f38a-1665140223.jpeg', 'money-falling-from-sky_gettyimages-934096022 (1)-1665140223.jpg', 1, '2022-10-07 16:27:06', '2022-10-07 10:57:06'),
(919, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '3456453453', '1582861', 'Voter Id', '45645645', '77ce4780-c931-11eb-b7de-6f1d3275f38a-1665140338.jpeg', 'money-falling-from-sky_gettyimages-934096022 (1)-1665140338.jpg', 1, '2022-10-07 16:29:02', '2022-10-07 10:59:02'),
(920, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1304902', 'Voter Id', '9846444', 'Admin  Dashboard (4)-1665140596.pdf', 'Admin  Dashboard (5)-1665140596.pdf', 1, '2022-10-07 16:33:19', '2022-10-07 11:03:19'),
(921, NULL, NULL, NULL, NULL, NULL, 143, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561478', '623964', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665140690.pdf', 'Admin  Dashboard (5)-1665140690.pdf', 1, '2022-10-07 16:34:53', '2022-10-07 11:04:53'),
(922, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'SAHU', '9874562587', '179925', 'Voter Id', '3456446', 'Admin  Dashboard (4)-1665145923.pdf', 'Admin  Dashboard (5)-1665145923.pdf', 1, '2022-10-07 18:02:05', '2022-10-07 12:32:05'),
(923, NULL, 632, 1258, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1774997', 'Voter Id', '46446454', 'Admin  Dashboard (4)-1665146154.pdf', 'Admin  Dashboard (5)-1665146154.pdf', 1, '2022-10-07 18:05:55', '2022-10-07 12:35:55'),
(924, NULL, NULL, NULL, NULL, NULL, 146, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1039697', 'Voter Id', '4565456456', 'Admin  Dashboard (4)-1665146470.pdf', 'Admin  Dashboard (5)-1665146470.pdf', 1, '2022-10-07 18:11:12', '2022-10-07 12:41:12'),
(925, NULL, NULL, NULL, 293, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '401135', 'Voter Id', '165564456', 'Admin  Dashboard (4)-1665146856.pdf', 'Admin  Dashboard (4)-1665146857.pdf', 1, '2022-10-07 18:17:38', '2022-10-07 12:47:38'),
(926, NULL, NULL, NULL, NULL, NULL, 146, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1508432', 'Voter Id', '844655446', 'pexels-donald-tong-189293-1665147317.jpg', 'pexels-donald-tong-189293-1665147317.jpg', 1, '2022-10-07 18:25:18', '2022-10-07 12:55:18'),
(927, NULL, NULL, NULL, NULL, 793, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '160502', 'Voter Id', '4464464', 'pexels-donald-tong-189293-1665147522.jpg', 'pexels-donald-tong-189293-1665147522.jpg', 1, '2022-10-07 18:28:43', '2022-10-07 12:58:43'),
(928, NULL, 630, 1256, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'SAURABH', 'SAHU', '9874562584', '682078', 'Voter Id', '74198745656', 'Admin  Dashboard (4)-1665148900.pdf', 'Admin  Dashboard (4)-1665148900.pdf', 1, '2022-10-07 18:51:42', '2022-10-07 13:21:42'),
(929, NULL, NULL, NULL, 292, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1409322', 'Voter Id', '711258987', 'Admin  Dashboard (4)-1665149076.pdf', 'Admin  Dashboard (10)-1665149076.pdf', 1, '2022-10-07 18:54:37', '2022-10-07 13:24:37'),
(930, NULL, NULL, NULL, NULL, NULL, 145, 'ssnothinginlife@gmail.com', 'saurabh', 'sahu', '9874561478', '968122', 'Voter Id', '446654', 'Admin  Dashboard (5)-1665149265.pdf', 'Admin  Dashboard (4)-1665149265.pdf', 1, '2022-10-07 18:57:47', '2022-10-07 13:27:47'),
(931, NULL, 633, 1261, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '175889', 'Voter Id', '544646446', 'Admin  Dashboard (4)-1665379246.pdf', 'Admin  Dashboard (5)-1665379246.pdf', 1, '2022-10-10 10:50:49', '2022-10-10 05:20:49'),
(932, NULL, NULL, NULL, NULL, NULL, 66, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1198795', 'Voter Id', '46544446', 'Admin  Dashboard (4)-1665379628.pdf', 'Admin  Dashboard (5)-1665379628.pdf', 1, '2022-10-10 10:57:09', '2022-10-10 05:27:09'),
(933, NULL, NULL, NULL, NULL, 793, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '865443', 'Voter Id', '4644445', 'Admin  Dashboard (4)-1665379765.pdf', 'Admin  Dashboard (5)-1665379765.pdf', 1, '2022-10-10 10:59:26', '2022-10-10 05:29:26'),
(934, NULL, 634, 1264, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '9874561478', '702261', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665381281.pdf', 'Admin  Dashboard (5)-1665381281.pdf', 1, '2022-10-10 11:24:42', '2022-10-10 05:54:42'),
(935, NULL, NULL, NULL, NULL, NULL, 147, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '58221', 'Voter Id', '48446645645', 'Admin  Dashboard (4)-1665381444.pdf', 'Admin  Dashboard (5)-1665381444.pdf', 1, '2022-10-10 11:27:25', '2022-10-10 05:57:25'),
(936, NULL, NULL, NULL, NULL, NULL, 147, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1775', 'Voter Id', '64464464446', 'Admin  Dashboard (4)-1665381638.pdf', 'Admin  Dashboard (5)-1665381638.pdf', 1, '2022-10-10 11:30:41', '2022-10-10 06:00:41'),
(937, NULL, NULL, NULL, NULL, 795, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1544510', 'Voter Id', '644644', 'Admin  Dashboard (3)-1665381762.pdf', 'Admin  Dashboard (4)-1665381762.pdf', 1, '2022-10-10 11:32:44', '2022-10-10 06:02:44'),
(938, NULL, 633, 1262, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '970824', 'Voter Id', '44444656466', 'Admin  Dashboard (3)-1665382067.pdf', 'Admin  Dashboard (4)-1665382067.pdf', 1, '2022-10-10 11:37:49', '2022-10-10 06:07:49'),
(939, NULL, NULL, NULL, 292, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1349630', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665382235.pdf', 'Admin  Dashboard (5)-1665382235.pdf', 1, '2022-10-10 11:40:36', '2022-10-10 06:10:36'),
(940, NULL, NULL, NULL, NULL, NULL, 147, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '383462', 'Voter Id', '6446', 'Admin  Dashboard (4)-1665382365.pdf', 'Admin  Dashboard (4)-1665382365.pdf', 1, '2022-10-10 11:42:46', '2022-10-10 06:12:46'),
(941, NULL, NULL, NULL, 290, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '43415', 'Voter Id', '546446', 'pexels-donald-tong-189293-1665382795.jpg', 'pexels-donald-tong-189293-1665382795.jpg', 1, '2022-10-10 11:49:56', '2022-10-10 06:19:56'),
(942, NULL, NULL, NULL, NULL, NULL, 147, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '742258', 'Voter Id', '798787964645', 'Admin  Dashboard (4)-1665383348.pdf', 'Admin  Dashboard (5)-1665383348.pdf', 1, '2022-10-10 11:59:10', '2022-10-10 06:29:10'),
(943, NULL, 636, 1268, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '484581', 'Voter Id', '446654', 'Admin  Dashboard (4)-1665392426.pdf', 'Admin  Dashboard (5)-1665392426.pdf', 1, '2022-10-10 14:30:29', '2022-10-10 09:00:29'),
(944, NULL, NULL, NULL, NULL, NULL, 149, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '794787', 'Voter Id', '445644', 'Admin  Dashboard (4)-1665392726.pdf', 'Admin  Dashboard (5)-1665392726.pdf', 1, '2022-10-10 14:35:28', '2022-10-10 09:05:28'),
(945, NULL, NULL, NULL, NULL, 796, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1631590', 'Voter Id', '644644466', 'Admin  Dashboard (4)-1665392857.pdf', 'Admin  Dashboard (9)-1665392857.pdf', 1, '2022-10-10 14:37:38', '2022-10-10 09:07:38'),
(946, NULL, NULL, NULL, NULL, 796, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874562587', '930936', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1665393392.pdf', 'Admin  Dashboard (3)-1665393392.pdf', 1, '2022-10-10 14:46:33', '2022-10-10 09:16:33'),
(947, NULL, 636, 1269, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '938845', NULL, '644664544', 'Admin  Dashboard (4)-1665394116.pdf', 'Admin  Dashboard (9)-1665394116.pdf', 1, '2022-10-10 14:58:37', '2022-10-10 09:28:37'),
(948, NULL, NULL, NULL, 296, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1287689', 'Voter Id', '65464444', 'Admin  Dashboard (4)-1665394301.pdf', 'Admin  Dashboard (5)-1665394301.pdf', 1, '2022-10-10 15:01:43', '2022-10-10 09:31:43'),
(949, NULL, NULL, NULL, NULL, NULL, 149, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '944949', 'Voter Id', '6566546', 'Admin  Dashboard (4)-1665394476.pdf', 'Admin  Dashboard (5)-1665394476.pdf', 1, '2022-10-10 15:04:52', '2022-10-10 09:34:52'),
(950, NULL, NULL, NULL, NULL, NULL, 148, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '7412583698', '329598', 'Voter Id', '6444455645', 'Admin  Dashboard (4)-1665394595.pdf', 'Admin  Dashboard (5)-1665394595.pdf', 1, '2022-10-10 15:06:37', '2022-10-10 09:36:37'),
(951, NULL, NULL, NULL, NULL, 796, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1004986', 'Voter Id', '546464465', 'Admin  Dashboard (3)-1665395066.pdf', 'Admin  Dashboard (5)-1665395066.pdf', 1, '2022-10-10 15:14:27', '2022-10-10 09:44:27'),
(952, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '967599', 'Passport', '32132132123', 'front-1665395655.jpg', 'back-1665395655.jpg', 1, '2022-10-10 15:24:18', '2022-10-10 09:54:18'),
(953, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1516868', 'Passport', '32132132123', 'back-1665397138.jpg', 'front-1665397138.jpg', 1, '2022-10-10 15:48:59', '2022-10-10 10:18:59'),
(954, NULL, 636, 1270, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '869723', 'Voter Id', '564545', 'Admin  Dashboard (4)-1665403376.pdf', 'Admin  Dashboard (4)-1665403376.pdf', 1, '2022-10-10 17:32:59', '2022-10-10 12:02:59'),
(955, NULL, NULL, NULL, NULL, NULL, 149, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1570525', 'Voter Id', '54645446', 'Admin  Dashboard (3)-1665403616.pdf', 'Admin  Dashboard (4)-1665403616.pdf', 1, '2022-10-10 17:36:57', '2022-10-10 12:06:57'),
(956, NULL, NULL, NULL, NULL, NULL, 148, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '90122', 'Voter Id', '6546465464565', 'Admin  Dashboard (4)-1665403672.pdf', 'Admin  Dashboard (10)-1665403672.pdf', 1, '2022-10-10 17:37:55', '2022-10-10 12:07:55'),
(957, NULL, NULL, NULL, NULL, 796, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '9874561478', '78931', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1665403800.pdf', 'Admin  Dashboard (4)-1665403800.pdf', 1, '2022-10-10 17:40:02', '2022-10-10 12:10:02'),
(958, NULL, NULL, NULL, 296, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '556739', 'Voter Id', '98446464545645', 'Admin  Dashboard (4)-1665403970.pdf', 'Admin  Dashboard (5)-1665403970.pdf', 1, '2022-10-10 17:42:51', '2022-10-10 12:12:51'),
(959, NULL, NULL, NULL, NULL, 796, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '34285', 'Voter Id', '6544645446', 'Admin  Dashboard (3)-1665404872.pdf', 'Admin  Dashboard (4)-1665404872.pdf', 1, '2022-10-10 17:57:53', '2022-10-10 12:27:53'),
(960, NULL, NULL, NULL, NULL, 798, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1231982', 'Voter Id', '6546446556', 'Admin  Dashboard (4)-1665404956.pdf', 'Admin  Dashboard (5)-1665404956.pdf', 1, '2022-10-10 17:59:17', '2022-10-10 12:29:17'),
(961, NULL, 638, 1273, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '144120', 'Voter Id', '9874562587', 'Admin  Dashboard (4)-1665408499.pdf', 'Admin  Dashboard (4)-1665408499.pdf', 1, '2022-10-10 18:58:21', '2022-10-10 13:28:21'),
(962, NULL, 639, 1275, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1512865', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1665467524.pdf', 'Admin  Dashboard (4)-1665467524.pdf', 1, '2022-10-11 11:22:05', '2022-10-11 05:52:05'),
(963, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1104306', 'Voter Id', '654444454', 'file (1)-1665467697.pdf', 'file (2)-1665467697.pdf', 1, '2022-10-11 11:24:58', '2022-10-11 05:54:58'),
(964, NULL, NULL, NULL, NULL, 802, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1524072', 'Passport', '64444656', 'Admin  Dashboard (4)-1665467798.pdf', 'Admin  Dashboard (5)-1665467798.pdf', 1, '2022-10-11 11:26:40', '2022-10-11 05:56:40'),
(965, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1240254', 'Voter Id', '4654444', 'Admin  Dashboard (3)-1665468057.pdf', 'Admin  Dashboard (4)-1665468057.pdf', 1, '2022-10-11 11:30:59', '2022-10-11 06:00:59'),
(966, NULL, NULL, NULL, 301, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '662756', 'Voter Id', '216554546', 'Admin  Dashboard (3)-1665468354.pdf', 'Admin  Dashboard (5)-1665468354.pdf', 1, '2022-10-11 11:35:56', '2022-10-11 06:05:56'),
(967, NULL, 640, 1277, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1758035', 'Voter Id', '654446', 'Admin  Dashboard (4)-1665468871.pdf', 'Admin  Dashboard (6)-1665468871.pdf', 1, '2022-10-11 11:44:33', '2022-10-11 06:14:33'),
(968, NULL, NULL, NULL, NULL, NULL, 151, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1481892', 'Voter Id', '4546466', 'Admin  Dashboard (4)-1665469161.pdf', 'Admin  Dashboard (5)-1665469161.pdf', 1, '2022-10-11 11:49:23', '2022-10-11 06:19:23'),
(969, NULL, NULL, NULL, NULL, 804, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1042393', 'Voter Id', '64444664', 'Admin  Dashboard (5)-1665469301.pdf', 'Admin  Dashboard (6)-1665469301.pdf', 1, '2022-10-11 11:51:42', '2022-10-11 06:21:42'),
(970, NULL, 639, 1276, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '7412589874', '1002756', 'Voter Id', '9874562587', 'file (1)-1665469528.pdf', 'file (3)-1665469528.pdf', 1, '2022-10-11 11:55:29', '2022-10-11 06:25:29'),
(971, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '132481', 'Voter Id', '44446', 'Admin  Dashboard (4)-1665469682.pdf', 'file (1)-1665469682.pdf', 1, '2022-10-11 11:58:04', '2022-10-11 06:28:04'),
(972, NULL, NULL, NULL, NULL, NULL, 153, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1139421', 'Voter Id', '4444454', 'file (1)-1665470051.pdf', 'file (2)-1665470051.pdf', 1, '2022-10-11 12:04:12', '2022-10-11 06:34:12'),
(973, NULL, NULL, NULL, NULL, 804, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1675767', 'Voter Id', '654544', 'Admin  Dashboard (3)-1665470225.pdf', 'Admin  Dashboard (5)-1665470225.pdf', 1, '2022-10-11 12:07:06', '2022-10-11 06:37:06'),
(974, NULL, NULL, NULL, NULL, NULL, 153, 'ssnothinginlife@gmail.com', 'SAURABH', 'SAHU', '7412583698', '943848', 'Voter Id', '4546466', 'Admin  Dashboard (4)-1665470483.pdf', 'Admin  Dashboard (5)-1665470483.pdf', 1, '2022-10-11 12:11:25', '2022-10-11 06:41:25'),
(975, NULL, NULL, NULL, NULL, NULL, 151, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1087042', 'Voter Id', '446654', 'Admin  Dashboard (4)-1665470522.pdf', 'Admin  Dashboard (6)-1665470522.pdf', 1, '2022-10-11 12:12:03', '2022-10-11 06:42:03'),
(976, NULL, NULL, NULL, NULL, 802, NULL, 'ssnothinginlife@gmail.com', 'saurabh', 'sahu', '9874562587', '447171', 'Voter Id', '6454444', 'Admin  Dashboard (3)-1665470574.pdf', 'Admin  Dashboard (5)-1665470574.pdf', 1, '2022-10-11 12:12:55', '2022-10-11 06:42:55'),
(977, NULL, NULL, NULL, NULL, 804, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '476594', 'Voter Id', '64444664', 'Admin  Dashboard (4)-1665470614.pdf', 'Admin  Dashboard (6)-1665470614.pdf', 1, '2022-10-11 12:13:35', '2022-10-11 06:43:35'),
(978, NULL, 640, 1278, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '159566', 'Voter Id', '9874562587', 'Admin  Dashboard (5)-1665472761.pdf', 'Admin  Dashboard (5)-1665472761.pdf', 1, '2022-10-11 12:49:22', '2022-10-11 07:19:22'),
(979, NULL, 458, 1035, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1711260', 'Passport', '8446', 'file (1)-1665480795.pdf', 'Admin  Dashboard (6)-1665480795.pdf', 1, '2022-10-11 15:03:16', '2022-10-11 09:33:16'),
(980, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '642820', 'Voter Id', '6444446464', 'Admin  Dashboard (3)-1665481023.pdf', 'Admin  Dashboard (4)-1665481023.pdf', 1, '2022-10-11 15:07:05', '2022-10-11 09:37:05'),
(981, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412583698', '685293', 'Voter Id', '154466564', 'Admin  Dashboard (2)-1665482812.pdf', 'Admin  Dashboard (4)-1665482812.pdf', 1, '2022-10-11 15:36:54', '2022-10-11 10:06:54'),
(982, NULL, 525, 1056, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1033300', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1665483292.pdf', 'Admin  Dashboard (3)-1665483292.pdf', 1, '2022-10-11 15:44:55', '2022-10-11 10:14:55'),
(983, NULL, 640, 1280, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '895872', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665483652.pdf', 'Admin  Dashboard (3)-1665483652.pdf', 1, '2022-10-11 15:50:54', '2022-10-11 10:20:54'),
(984, NULL, NULL, NULL, NULL, NULL, 153, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1210651', NULL, '6546454', 'Admin  Dashboard (2)-1665483757.pdf', 'Admin  Dashboard (3)-1665483757.pdf', 1, '2022-10-11 15:52:39', '2022-10-11 10:22:39'),
(985, NULL, 640, 1280, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '820025', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665488983.pdf', 'Admin  Dashboard (3)-1665488983.pdf', 1, '2022-10-11 17:19:45', '2022-10-11 11:49:45'),
(986, NULL, NULL, NULL, NULL, NULL, 153, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1330459', 'Voter Id', '9874136987', 'Admin  Dashboard-1665489308.pdf', 'Admin  Dashboard (2)-1665489308.pdf', 1, '2022-10-11 17:25:09', '2022-10-11 11:55:09'),
(987, NULL, NULL, NULL, NULL, NULL, 151, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '954900', 'Voter Id', '4655464', 'Admin  Dashboard (2)-1665489955.pdf', 'Admin  Dashboard (3)-1665489955.pdf', 1, '2022-10-11 17:35:56', '2022-10-11 12:05:56'),
(988, NULL, 458, 1036, NULL, NULL, NULL, 'mkhalid71@hotmail.com', 'Muhammad', 'Khalid', '+966503589372', '1133258', 'Passport', '12345', '8717F613-F619-4A9E-84E1-1AD08891723D-1665548684.png', 'B01031CB-CB69-4DFC-89EE-FB1152E266C9-1665548685.png', 1, '2022-10-12 09:54:46', '2022-10-12 04:24:46'),
(989, NULL, 458, 1037, NULL, NULL, NULL, 'mkhalid71@hotmail.com', 'Muhammad', 'Khalid', '+966503589372', '817186', 'Passport', '1234', 'EC18EE10-1D89-43CF-BD59-AA9DE417FFE3-1665549344.png', 'F53EB21F-5911-434D-91E0-A0E6FF8E4B58-1665549344.png', 1, '2022-10-12 10:05:45', '2022-10-12 04:35:45'),
(990, NULL, 641, 1281, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'sahu', '7412589874', '599054', 'Voter Id', '4454664446', 'Admin  Dashboard (2)-1665553649.pdf', 'Admin  Dashboard (3)-1665553649.pdf', 1, '2022-10-12 11:17:30', '2022-10-12 05:47:30'),
(991, NULL, NULL, NULL, NULL, NULL, 154, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1569943', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1665553842.pdf', 'Admin  Dashboard (3)-1665553842.pdf', 1, '2022-10-12 11:20:43', '2022-10-12 05:50:43'),
(992, NULL, NULL, NULL, NULL, NULL, 154, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1256794', 'Voter Id', '6546454', 'Admin  Dashboard (3)-1665553959.pdf', 'Admin  Dashboard (4)-1665553959.pdf', 1, '2022-10-12 11:22:40', '2022-10-12 05:52:40'),
(993, NULL, NULL, NULL, NULL, 806, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1631160', 'Voter Id', '44646464', 'Admin  Dashboard (2)-1665554033.pdf', 'Admin  Dashboard (3)-1665554033.pdf', 1, '2022-10-12 11:23:54', '2022-10-12 05:53:54'),
(994, NULL, 642, 1283, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '516857', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665555523.pdf', 'Admin  Dashboard (2)-1665555523.pdf', 1, '2022-10-12 11:48:44', '2022-10-12 06:18:44'),
(995, NULL, 642, 1283, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1059631', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665555743.pdf', 'Admin  Dashboard (3)-1665555743.pdf', 1, '2022-10-12 11:52:24', '2022-10-12 06:22:24'),
(996, NULL, 642, 1283, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1213121', 'Voter Id', '16546546', 'Admin  Dashboard (3)-1665559021.pdf', 'Admin  Dashboard (5)-1665559021.pdf', 1, '2022-10-12 12:47:02', '2022-10-12 07:17:02'),
(997, NULL, 458, 1037, NULL, NULL, NULL, 'contact@roadnstays.com', 'Contact', 'Contact1', '+966503589372', '93223', 'Passport', '12344', 'CDEABE30-1823-4EA8-B82F-20EAE679F785-1665563578.png', '7F7B8987-DC15-409D-92D9-3D36EEC76F9F-1665563578.png', 1, '2022-10-12 14:02:59', '2022-10-12 08:32:59'),
(998, NULL, 644, 1285, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '295392', 'Voter Id', '654446', 'Admin  Dashboard (3)-1665571067.pdf', 'Admin  Dashboard (2)-1665571067.pdf', 1, '2022-10-12 16:07:49', '2022-10-12 10:37:49'),
(999, NULL, NULL, NULL, 304, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '166665', 'Voter Id', '94844465', 'Admin  Dashboard (2)-1665571678.pdf', 'Admin  Dashboard (3)-1665571678.pdf', 1, '2022-10-12 16:17:59', '2022-10-12 10:47:59'),
(1000, NULL, NULL, NULL, NULL, NULL, 157, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '593463', 'Voter Id', '446654', 'Admin  Dashboard (2)-1665571833.pdf', 'Admin  Dashboard (3)-1665571833.pdf', 1, '2022-10-12 16:20:35', '2022-10-12 10:50:35'),
(1001, NULL, NULL, NULL, 192, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1093543', 'Passport', '32132132123', 'front-1665572062.jpg', 'back-1665572062.jpg', 1, '2022-10-12 16:24:23', '2022-10-12 10:54:23'),
(1002, NULL, NULL, NULL, 192, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1682484', 'Passport', '32132132123', 'back-1665572313.jpg', 'front-1665572313.jpg', 1, '2022-10-12 16:28:34', '2022-10-12 10:58:34'),
(1003, NULL, 524, 1054, NULL, NULL, NULL, 'mkhalid71@hotmail.com', 'Muhammad', 'Khalid', '+923373164408', '1126749', 'Passport', '12345', 'Screenshot_1-1665592136.png', 'Screenshot_1-1665592137.png', 1, '2022-10-12 21:58:59', '2022-10-12 16:28:59'),
(1004, NULL, 646, 1287, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1659978', 'Voter Id', '6544464464', 'Admin  Dashboard (3)-1665639732.pdf', 'Admin  Dashboard (4)-1665639732.pdf', 1, '2022-10-13 11:12:13', '2022-10-13 05:42:13'),
(1005, NULL, NULL, NULL, NULL, 810, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '899337', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665639980.pdf', 'Admin  Dashboard (3)-1665639980.pdf', 1, '2022-10-13 11:16:21', '2022-10-13 05:46:21'),
(1006, NULL, 647, 1288, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '668509', 'Voter Id', '6544446', 'Admin  Dashboard (2)-1665640169.pdf', 'Admin  Dashboard (4)-1665640169.pdf', 1, '2022-10-13 11:19:30', '2022-10-13 05:49:30'),
(1007, NULL, 647, 1288, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '390157', 'Voter Id', '4644456', 'Admin  Dashboard (2)-1665643405.pdf', 'Admin  Dashboard (4)-1665643405.pdf', 1, '2022-10-13 12:13:26', '2022-10-13 06:43:26'),
(1008, NULL, 647, 1289, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '670873', 'Passport', '32132132123', 'front-1665645547.jpg', 'back-1665645547.jpg', 1, '2022-10-13 12:49:08', '2022-10-13 07:19:08'),
(1009, NULL, NULL, NULL, 306, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1759907', 'Voter Id', '14898552', 'Admin  Dashboard (2)-1665645802.pdf', 'Admin  Dashboard (4)-1665645802.pdf', 1, '2022-10-13 12:53:23', '2022-10-13 07:23:23'),
(1010, NULL, NULL, NULL, NULL, 810, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '990029', 'Voter Id', '984446565', 'Admin  Dashboard (2)-1665652347.pdf', 'Admin  Dashboard (3)-1665652347.pdf', 1, '2022-10-13 14:42:28', '2022-10-13 09:12:28'),
(1011, NULL, NULL, NULL, NULL, 809, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '579848', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665652498.pdf', 'Admin  Dashboard (3)-1665652498.pdf', 1, '2022-10-13 14:44:59', '2022-10-13 09:14:59'),
(1012, NULL, NULL, NULL, 188, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1448590', 'Passport', '32132132123', 'front-1665665896.jpg', 'back-1665665896.jpg', 1, '2022-10-13 18:28:17', '2022-10-13 12:58:17'),
(1013, NULL, NULL, NULL, NULL, NULL, 64, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1006667', 'Passport', '32132132123', 'back-1665723308.jpg', 'front-1665723308.jpg', 1, '2022-10-14 10:25:12', '2022-10-14 04:55:12'),
(1014, NULL, NULL, NULL, NULL, NULL, 157, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '994584', 'Passport', '32132132123', 'front-1665723946.jpg', 'back-1665723946.jpg', 1, '2022-10-14 10:35:47', '2022-10-14 05:05:47'),
(1015, NULL, NULL, NULL, NULL, NULL, 66, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '199188', 'Passport', '32132132123', 'front-1665723992.jpg', 'back-1665723992.jpg', 1, '2022-10-14 10:36:33', '2022-10-14 05:06:33'),
(1016, NULL, NULL, NULL, NULL, 809, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '804774', 'Voter Id', '32132132123', 'front-1665725319.jpg', 'back-1665725319.jpg', 1, '2022-10-14 10:58:40', '2022-10-14 05:28:40'),
(1017, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1149859', 'Passport', '32132132123', 'front-1665725791.jpg', 'back-1665725791.jpg', 1, '2022-10-14 11:06:32', '2022-10-14 05:36:32'),
(1018, NULL, NULL, NULL, NULL, NULL, 64, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1486426', 'Passport', '32132132123', 'front-1665726124.jpg', 'back-1665726124.jpg', 1, '2022-10-14 11:12:05', '2022-10-14 05:42:05'),
(1019, NULL, 646, 1287, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1270265', 'Passport', '32132132123', 'front-1665727128.jpg', 'back-1665727128.jpg', 1, '2022-10-14 11:28:49', '2022-10-14 05:58:49'),
(1020, NULL, NULL, NULL, 190, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1577177', 'Passport', '32132132123', 'front-1665728192.jpg', 'back-1665728192.jpg', 1, '2022-10-14 11:46:33', '2022-10-14 06:16:33'),
(1021, NULL, NULL, NULL, 190, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '127600', 'Passport', '32132132123', 'front-1665728442.jpg', 'back-1665728442.jpg', 1, '2022-10-14 11:50:43', '2022-10-14 06:20:43'),
(1022, NULL, NULL, NULL, NULL, NULL, 158, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '495834', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1665729163.pdf', 'Admin  Dashboard (3)-1665729163.pdf', 1, '2022-10-14 12:02:45', '2022-10-14 06:32:45'),
(1023, NULL, NULL, NULL, NULL, 811, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1620684', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665729221.pdf', 'Admin  Dashboard (4)-1665729221.pdf', 1, '2022-10-14 12:03:42', '2022-10-14 06:33:42'),
(1024, NULL, NULL, NULL, NULL, NULL, 158, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '740010', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1665729794.pdf', 'Admin  Dashboard (4)-1665729794.pdf', 1, '2022-10-14 12:13:15', '2022-10-14 06:43:15'),
(1025, NULL, NULL, NULL, NULL, NULL, 158, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1512272', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665730598.pdf', 'Admin  Dashboard (4)-1665730598.pdf', 1, '2022-10-14 12:26:39', '2022-10-14 06:56:39'),
(1026, NULL, NULL, NULL, NULL, NULL, 158, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '89712', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1665730689.pdf', 'Admin  Dashboard (4)-1665730689.pdf', 1, '2022-10-14 12:28:10', '2022-10-14 06:58:10'),
(1027, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1332876', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1665730733.pdf', 'Admin  Dashboard (4)-1665730733.pdf', 1, '2022-10-14 12:28:54', '2022-10-14 06:58:54'),
(1028, NULL, NULL, NULL, 305, NULL, NULL, 'votivetester.saurabh@gmail.com', 'saurabh', 'SAHU', '9874561478', '285528', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1665731673.pdf', 'Admin  Dashboard (4)-1665731673.pdf', 1, '2022-10-14 12:44:34', '2022-10-14 07:14:34'),
(1029, NULL, NULL, NULL, 305, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '302647', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665732345.pdf', 'Admin  Dashboard (5)-1665732345.pdf', 1, '2022-10-14 12:55:46', '2022-10-14 07:25:46'),
(1030, NULL, 649, 1290, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '1599128', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1665738417.pdf', 'Admin  Dashboard (3)-1665738417.pdf', 1, '2022-10-14 14:36:58', '2022-10-14 09:06:58'),
(1031, NULL, NULL, NULL, 190, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '240523', 'Passport', '32132132123', 'front-1665739723.jpg', 'back-1665739723.jpg', 1, '2022-10-14 14:58:44', '2022-10-14 09:28:44'),
(1032, NULL, NULL, NULL, 307, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1506437', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665740111.pdf', 'Admin  Dashboard (3)-1665740111.pdf', 1, '2022-10-14 15:05:12', '2022-10-14 09:35:12'),
(1033, NULL, NULL, NULL, NULL, NULL, 159, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '551425', NULL, '64444664', 'Admin  Dashboard (2)-1665740333.pdf', 'Admin  Dashboard (4)-1665740333.pdf', 1, '2022-10-14 15:08:54', '2022-10-14 09:38:54'),
(1034, NULL, NULL, NULL, NULL, 812, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1287625', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665740431.pdf', 'Admin  Dashboard (3)-1665740431.pdf', 1, '2022-10-14 15:10:32', '2022-10-14 09:40:32'),
(1035, NULL, 520, 1038, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '827597', 'Passport', '32132132123', 'front-1665741373.jpg', 'back-1665741373.jpg', 1, '2022-10-14 15:26:14', '2022-10-14 09:56:14'),
(1036, NULL, 409, 1053, NULL, NULL, NULL, 'contact@roadnstays.com', 'roadnstays', 'salonki', '9876123752136', '1639638', 'Voter Id', '58790989787', 'money-falling-from-sky_gettyimages-934096022 (1)-1665744173.jpg', 'FB_IMG_1664167504101 (1)-1665744173.jpg', 1, '2022-10-14 16:12:54', '2022-10-14 10:42:55'),
(1037, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1756475', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665752452.pdf', 'Admin  Dashboard (2)-1665752452.pdf', 1, '2022-10-14 18:30:53', '2022-10-14 13:00:53'),
(1038, NULL, NULL, NULL, NULL, NULL, 64, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '46665', 'Passport', '32132132123', 'front-1665752474.jpg', 'back-1665752474.jpg', 1, '2022-10-14 18:31:15', '2022-10-14 13:01:15'),
(1039, NULL, NULL, NULL, NULL, NULL, 159, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1063858', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665753141.pdf', 'Admin  Dashboard (3)-1665753141.pdf', 1, '2022-10-14 18:42:22', '2022-10-14 13:12:22'),
(1040, NULL, NULL, NULL, NULL, NULL, 159, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '424500', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665753260.pdf', 'Admin  Dashboard (3)-1665753260.pdf', 1, '2022-10-14 18:44:21', '2022-10-14 13:14:21'),
(1041, NULL, 653, 1291, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '533837', 'Voter Id', '6546454', 'pexels-fox-1082326-1665830612.jpg', 'pexels-jean-van-der-meulen-1457845-1665830612.jpg', 1, '2022-10-15 16:13:33', '2022-10-15 10:43:33'),
(1042, NULL, 653, 1291, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1242431', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665831690.pdf', 'Admin  Dashboard (3)-1665831690.pdf', 1, '2022-10-15 16:31:31', '2022-10-15 11:01:31'),
(1043, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '1151680', 'Voter Id', '54654564', 'front-1665834031.jpg', 'back-1665834031.jpg', 1, '2022-10-15 17:10:32', '2022-10-15 11:40:32'),
(1044, NULL, 524, 1054, NULL, NULL, NULL, 'mkakhi@yahoo.com', 'Muhammad', 'Khalid', '+923373164408', '856894', 'Passport', '123456', 'picture 3-1665853514.jpg', 'picture 3-1665853514.jpg', 1, '2022-10-15 22:35:15', '2022-10-15 17:05:15'),
(1045, NULL, 524, 1055, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '616505', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665982708.pdf', 'Admin  Dashboard (3)-1665982708.pdf', 1, '2022-10-17 10:28:29', '2022-10-17 04:58:29'),
(1046, NULL, NULL, NULL, NULL, NULL, 64, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '701416', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665982977.pdf', 'Admin  Dashboard (4)-1665982977.pdf', 1, '2022-10-17 10:32:58', '2022-10-17 05:02:58'),
(1047, NULL, 656, 1302, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1111245', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665984859.pdf', 'Admin  Dashboard (3)-1665984859.pdf', 1, '2022-10-17 11:04:20', '2022-10-17 05:34:20'),
(1048, NULL, 656, 1302, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1275341', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665985044.pdf', 'Admin  Dashboard (3)-1665985044.pdf', 1, '2022-10-17 11:07:25', '2022-10-17 05:37:25'),
(1049, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1680730', 'Passport', '32132132123', 'front-1665998448.jpg', 'back-1665998448.jpg', 1, '2022-10-17 14:50:49', '2022-10-17 09:20:49'),
(1050, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '3203', 'Passport', '32132132123', 'front-1666004128.jpg', 'back-1666004128.jpg', 1, '2022-10-17 16:25:29', '2022-10-17 10:55:29'),
(1051, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '728208', 'Passport', '32132132123', 'front-1666004245.jpg', 'back-1666004245.jpg', 1, '2022-10-17 16:27:26', '2022-10-17 10:57:26'),
(1052, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1158661', 'Passport', '32132132123', 'front-1666004383.jpg', 'back-1666004383.jpg', 1, '2022-10-17 16:29:44', '2022-10-17 10:59:44'),
(1053, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1040631', 'Passport', '32132132123', 'front-1666004440.jpg', 'back-1666004440.jpg', 1, '2022-10-17 16:30:41', '2022-10-17 11:00:41'),
(1054, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '675944', 'Passport', '32132132123', 'front-1666006887.jpg', 'back-1666006887.jpg', 1, '2022-10-17 17:11:28', '2022-10-17 11:41:28'),
(1055, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1281625', 'Passport', '32132132123', 'front-1666007389.jpg', 'back-1666007389.jpg', 1, '2022-10-17 17:19:50', '2022-10-17 11:49:50'),
(1056, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '25972', 'Passport', '32132132123', 'front-1666008900.jpg', 'back-1666008900.jpg', 1, '2022-10-17 17:45:01', '2022-10-17 12:15:01');
INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(1057, NULL, 659, 1307, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '477352', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666008990.pdf', 'Admin  Dashboard (3)-1666008990.pdf', 1, '2022-10-17 17:46:31', '2022-10-17 12:16:31'),
(1058, NULL, NULL, NULL, NULL, NULL, 164, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '810871', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666009245.pdf', 'Admin  Dashboard (3)-1666009245.pdf', 1, '2022-10-17 17:50:46', '2022-10-17 12:20:46'),
(1059, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1655875', 'Passport', '32132132123', 'front-1666009292.jpg', 'back-1666009292.jpg', 1, '2022-10-17 17:51:33', '2022-10-17 12:21:33'),
(1060, NULL, NULL, NULL, NULL, NULL, 164, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '447786', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1666009785.pdf', 'Admin  Dashboard (3)-1666009785.pdf', 1, '2022-10-17 17:59:46', '2022-10-17 12:29:46'),
(1061, NULL, NULL, NULL, NULL, 819, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1466346', 'Passport', '64444664', 'Admin  Dashboard (2)-1666009910.pdf', 'Admin  Dashboard (3)-1666009910.pdf', 1, '2022-10-17 18:01:51', '2022-10-17 12:31:51'),
(1062, NULL, NULL, NULL, 312, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1492464', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1666010055.pdf', 'Admin  Dashboard (3)-1666010055.pdf', 1, '2022-10-17 18:04:16', '2022-10-17 12:34:16'),
(1063, NULL, 659, 1308, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874562587', '913800', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1666011147.pdf', 'Admin  Dashboard (3)-1666011147.pdf', 1, '2022-10-17 18:22:29', '2022-10-17 12:52:29'),
(1064, NULL, 659, 1308, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561475', '1742202', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1666011283.pdf', 'Admin  Dashboard (4)-1666011283.pdf', 1, '2022-10-17 18:24:44', '2022-10-17 12:54:44'),
(1065, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '364417', 'Passport', '32132132123', 'front-1666011364.jpg', 'back-1666011364.jpg', 1, '2022-10-17 18:26:05', '2022-10-17 12:56:05'),
(1066, NULL, NULL, NULL, NULL, NULL, 164, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '7412589874', '1088880', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1666011439.pdf', 'Admin  Dashboard (5)-1666011439.pdf', 1, '2022-10-17 18:27:20', '2022-10-17 12:57:20'),
(1067, NULL, NULL, NULL, NULL, NULL, 164, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '7412589874', '1368256', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1666011460.pdf', 'Admin  Dashboard (5)-1666011460.pdf', 1, '2022-10-17 18:27:41', '2022-10-17 12:57:41'),
(1068, NULL, NULL, NULL, 236, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1482524', 'Passport', '32132132123', 'front-1666011616.jpg', 'back-1666011616.jpg', 1, '2022-10-17 18:30:16', '2022-10-17 13:00:16'),
(1069, NULL, NULL, NULL, NULL, 820, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1366826', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666012347.pdf', 'Admin  Dashboard (5)-1666012347.pdf', 1, '2022-10-17 18:42:28', '2022-10-17 13:12:28'),
(1070, NULL, 660, 1309, NULL, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '768449', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1666013267.pdf', 'Admin  Dashboard (5)-1666013267.pdf', 1, '2022-10-17 18:57:48', '2022-10-17 13:27:48'),
(1071, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '665702', 'Voter Id', '32132132123', 'front-1666068807.jpg', 'back-1666068807.jpg', 1, '2022-10-18 10:23:29', '2022-10-18 04:53:29'),
(1072, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '2353', 'Passport', '32132132123', 'front-1666069271.jpg', 'back-1666069271.jpg', 1, '2022-10-18 10:31:12', '2022-10-18 05:01:12'),
(1073, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1204236', 'Passport', '32132132123', 'front-1666069552.jpg', 'back-1666069552.jpg', 1, '2022-10-18 10:35:52', '2022-10-18 05:05:52'),
(1074, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '155895', 'Passport', '32132132123', 'back-1666073351.jpg', 'front-1666073351.jpg', 1, '2022-10-18 11:39:12', '2022-10-18 06:09:12'),
(1075, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '930206', 'Passport', '32132132123', 'back-1666084725.jpg', 'front-1666084725.jpg', 1, '2022-10-18 14:48:46', '2022-10-18 09:18:46'),
(1076, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '793203', 'Passport', '32132132123', 'back-1666085327.jpg', 'front-1666085327.jpg', 1, '2022-10-18 14:58:48', '2022-10-18 09:28:48'),
(1077, NULL, 663, 1313, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1555382', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1666086202.pdf', 'Admin  Dashboard (2)-1666086202.pdf', 1, '2022-10-18 15:13:23', '2022-10-18 09:43:23'),
(1078, NULL, 660, 1310, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '69689', 'Voter Id', '446654', 'Admin  Dashboard (3)-1666090202.pdf', 'Admin  Dashboard (4)-1666090202.pdf', 1, '2022-10-18 16:20:03', '2022-10-18 10:50:03'),
(1079, NULL, NULL, NULL, 312, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1104643', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666090431.pdf', 'Admin  Dashboard (5)-1666090431.pdf', 1, '2022-10-18 16:23:52', '2022-10-18 10:53:52'),
(1080, NULL, NULL, NULL, NULL, NULL, 164, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '921251', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1666090802.pdf', 'Admin  Dashboard (3)-1666090802.pdf', 1, '2022-10-18 16:30:03', '2022-10-18 11:00:03'),
(1081, NULL, NULL, NULL, NULL, 822, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1459070', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666090947.pdf', 'Admin  Dashboard (3)-1666090947.pdf', 1, '2022-10-18 16:32:28', '2022-10-18 11:02:28'),
(1082, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '996142', 'Passport', '32132132123', 'back-1666093563.jpg', 'front-1666093563.jpg', 1, '2022-10-18 17:16:04', '2022-10-18 11:46:04'),
(1083, NULL, NULL, NULL, NULL, NULL, 164, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '500191', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666098163.pdf', 'Admin  Dashboard (4)-1666098163.pdf', 1, '2022-10-18 18:32:44', '2022-10-18 13:02:44'),
(1084, NULL, 664, 1317, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1751625', 'Voter Id', '446654', 'Admin  Dashboard (2)-1666159778.pdf', 'Admin  Dashboard (3)-1666159778.pdf', 1, '2022-10-19 11:39:42', '2022-10-19 06:09:42'),
(1085, NULL, NULL, NULL, NULL, NULL, 168, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '900734', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1666160097.pdf', 'Admin  Dashboard (4)-1666160097.pdf', 1, '2022-10-19 11:45:04', '2022-10-19 06:15:04'),
(1086, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '868496', 'Passport', '32132132123', 'back-1666173516.jpg', 'front-1666173516.jpg', 1, '2022-10-19 15:28:42', '2022-10-19 09:58:42'),
(1087, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5461237890', '774012', 'Passport', 'sdfsd2323', 'back-1666174065.jpg', 'front-1666174065.jpg', 1, '2022-10-19 15:37:53', '2022-10-19 10:07:53'),
(1088, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5461237890', '1174306', 'Passport', 'sdfsd2323', 'back-1666174174.jpg', 'front-1666174174.jpg', 1, '2022-10-19 15:39:36', '2022-10-19 10:09:36'),
(1089, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '734775', 'Voter Id', 'sdfs332333', 'back-1666174708.jpg', 'front-1666174708.jpg', 1, '2022-10-19 15:48:31', '2022-10-19 10:18:31'),
(1090, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '1059346', 'Voter Id', '54654564', 'back-1666175423.jpg', 'front-1666175423.jpg', 1, '2022-10-19 16:00:29', '2022-10-19 10:30:29'),
(1091, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '357333', 'Voter Id', '54654564', 'back-1666175714.jpg', 'front-1666175714.jpg', 1, '2022-10-19 16:05:18', '2022-10-19 10:35:18'),
(1092, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '493408', 'Passport', '54654564', 'back-1666176009.jpg', 'front-1666176009.jpg', 1, '2022-10-19 16:10:11', '2022-10-19 10:40:11'),
(1093, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', '54654564', 'back-1666271322.jpg', 'front-1666271322.jpg', 1, '2022-10-20 18:38:42', '2022-10-20 13:08:42'),
(1094, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', '54654564', 'back-1666271397.jpg', 'front-1666271397.jpg', 1, '2022-10-20 18:39:57', '2022-10-20 13:09:57'),
(1095, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', '54654564', 'back-1666271613.jpg', 'front-1666271613.jpg', 1, '2022-10-20 18:43:33', '2022-10-20 13:13:33'),
(1096, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666332480.jpg', 'front-1666332480.jpg', 1, '2022-10-21 11:38:00', '2022-10-21 06:08:00'),
(1097, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666333819.jpg', 'front-1666333819.jpg', 1, '2022-10-21 12:00:19', '2022-10-21 06:30:19'),
(1098, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666333986.jpg', 'front-1666333986.jpg', 1, '2022-10-21 12:03:06', '2022-10-21 06:33:06'),
(1099, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666334410.jpg', 'front-1666334410.jpg', 1, '2022-10-21 12:10:10', '2022-10-21 06:40:10'),
(1100, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666336589.jpg', 'front-1666336589.jpg', 1, '2022-10-21 12:46:29', '2022-10-21 07:16:29'),
(1101, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666337181.jpg', 'front-1666337181.jpg', 1, '2022-10-21 12:56:21', '2022-10-21 07:26:21'),
(1102, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666340808.jpg', 'front-1666340808.jpg', 1, '2022-10-21 13:56:48', '2022-10-21 08:26:48'),
(1103, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666341181.jpg', 'front-1666341181.jpg', 1, '2022-10-21 14:03:01', '2022-10-21 08:33:01'),
(1104, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Passport', '32132132123', 'back-1666341307.jpg', 'front-1666341307.jpg', 1, '2022-10-21 14:05:07', '2022-10-21 08:35:07'),
(1105, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '129655', 'Passport', '32132132123', 'front-1666343437.jpg', 'back-1666343437.jpg', 1, '2022-10-21 14:40:38', '2022-10-21 09:10:38'),
(1106, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '727380', 'Passport', '32132132123', 'back-1666764239.jpg', 'front-1666764239.jpg', 1, '2022-10-26 11:34:00', '2022-10-26 06:04:00'),
(1107, NULL, NULL, NULL, 258, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', '1679108', 'Passport', '32132132123', 'back-1666764509.jpg', 'front-1666764509.jpg', 1, '2022-10-26 11:38:30', '2022-10-26 06:08:30'),
(1108, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', 'dfgdfg445', 'back-1666786458.jpg', 'front-1666786458.jpg', 1, '2022-10-26 17:44:18', '2022-10-26 12:14:18'),
(1109, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', 'dfgdfg445', 'back-1666786558.jpg', 'front-1666786558.jpg', 1, '2022-10-26 17:45:58', '2022-10-26 12:15:58'),
(1110, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', 'dfgdfg445', 'back-1666786600.jpg', 'front-1666786600.jpg', 1, '2022-10-26 17:46:40', '2022-10-26 12:16:40'),
(1111, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', 'dfgdfg445', 'back-1666787079.jpg', 'front-1666787079.jpg', 1, '2022-10-26 17:54:39', '2022-10-26 12:24:39'),
(1112, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', NULL, 'Passport', 'dfgdfg445', 'back-1666787347.jpg', 'front-1666787347.jpg', 1, '2022-10-26 17:59:07', '2022-10-26 12:29:07'),
(1113, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '1749316', 'Passport', 'dfgdfg445', 'back-1666788067.jpg', 'front-1666788067.jpg', 1, '2022-10-26 18:11:08', '2022-10-26 12:41:08'),
(1114, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '1184880', 'Passport', 'dfgdfg445', 'back-1666790189.jpg', 'front-1666790189.jpg', 1, '2022-10-26 18:46:30', '2022-10-26 13:16:30'),
(1115, NULL, NULL, NULL, NULL, 636, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '642374', 'Passport', 'dfgdfg445', 'back-1666847306.jpg', 'front-1666847306.jpg', 1, '2022-10-27 10:38:27', '2022-10-27 05:08:27'),
(1116, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '929104', 'Passport', '54654564', 'back-1666849337.jpg', 'front-1666849337.jpg', 1, '2022-10-27 11:12:18', '2022-10-27 05:42:18'),
(1117, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '5465789456', '1070220', 'Passport', '54654564', 'back-1666849542.jpg', 'front-1666849542.jpg', 1, '2022-10-27 11:15:42', '2022-10-27 05:45:42'),
(1118, NULL, 666, 1320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1550370', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1667023471.pdf', 'Admin  Dashboard (4)-1667023471.pdf', 1, '2022-10-29 11:34:34', '2022-10-29 06:04:34'),
(1119, NULL, NULL, NULL, 316, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '342315', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667027697.pdf', 'Admin  Dashboard (3)-1667027697.pdf', 1, '2022-10-29 12:44:58', '2022-10-29 07:14:58'),
(1120, NULL, NULL, NULL, 316, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1626392', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667028351.pdf', 'Admin  Dashboard (3)-1667028351.pdf', 1, '2022-10-29 12:55:52', '2022-10-29 07:25:52'),
(1121, NULL, 664, 1317, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '546546544', '947975', 'Voter Id', 'sdfs343', 'back-1667028620.jpg', 'front-1667028620.jpg', 1, '2022-10-29 13:00:21', '2022-10-29 07:30:21'),
(1122, NULL, 524, 1054, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '183611', 'Voter Id', 'sdfs343', 'back-1667031437.jpg', 'front-1667031437.jpg', 1, '2022-10-29 13:47:18', '2022-10-29 08:17:18'),
(1123, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '665381', 'Passport', 'sdfs343', 'front-1667031915.jpg', 'back-1667031915.jpg', 1, '2022-10-29 13:55:16', '2022-10-29 08:25:16'),
(1124, NULL, 458, 1037, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '593145', 'Passport', 'sdfs343', 'back-1667032332.jpg', 'front-1667032332.jpg', 1, '2022-10-29 14:02:13', '2022-10-29 08:32:13'),
(1125, NULL, NULL, NULL, NULL, NULL, 170, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '502150', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667034115.pdf', 'Admin  Dashboard (3)-1667034115.pdf', 1, '2022-10-29 14:31:56', '2022-10-29 09:01:56'),
(1126, NULL, NULL, NULL, NULL, NULL, 170, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '530364', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667034407.pdf', 'Admin  Dashboard (3)-1667034407.pdf', 1, '2022-10-29 14:36:47', '2022-10-29 09:06:47'),
(1127, NULL, NULL, NULL, NULL, 827, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1080607', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667034804.pdf', 'Admin  Dashboard (4)-1667034804.pdf', 1, '2022-10-29 14:43:25', '2022-10-29 09:13:25'),
(1128, NULL, NULL, NULL, 319, NULL, NULL, 'ssnothinginlife@gmail.com', 'srb', 'sahu', '9874561478', '1253783', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667035174.pdf', 'Admin  Dashboard (3)-1667035174.pdf', 1, '2022-10-29 14:49:35', '2022-10-29 09:19:35'),
(1129, NULL, 458, 1035, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '1622612', 'Passport', 'sdfs343', 'back-1667036742.jpg', 'front-1667036742.jpg', 1, '2022-10-29 15:15:43', '2022-10-29 09:45:43'),
(1130, NULL, 524, 1054, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '116292', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667037804.pdf', 'Admin  Dashboard (3)-1667037804.pdf', 1, '2022-10-29 15:33:25', '2022-10-29 10:03:25'),
(1131, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1064259', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667199351.pdf', 'Admin  Dashboard (3)-1667199351.pdf', 1, '2022-10-31 12:25:52', '2022-10-31 06:55:52'),
(1132, NULL, 664, 1317, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1429253', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667200800.pdf', 'Admin  Dashboard (3)-1667200800.pdf', 1, '2022-10-31 12:50:01', '2022-10-31 07:20:01'),
(1133, NULL, NULL, NULL, 319, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '729466', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667200912.pdf', 'Admin  Dashboard (4)-1667200912.pdf', 1, '2022-10-31 12:51:53', '2022-10-31 07:21:53'),
(1134, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1363385', 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1667201036.pdf', 'Admin  Dashboard (3)-1667201036.pdf', 1, '2022-10-31 12:53:56', '2022-10-31 07:23:56'),
(1135, NULL, NULL, NULL, 319, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1622223', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667205394.pdf', 'Admin  Dashboard (3)-1667205394.pdf', 1, '2022-10-31 14:06:36', '2022-10-31 08:36:36'),
(1136, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1244376', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1667205589.pdf', 'Admin  Dashboard (3)-1667205589.pdf', 1, '2022-10-31 14:09:50', '2022-10-31 08:39:50'),
(1137, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '768895', 'Passport', 'sdfs343', 'back-1667207861.jpg', 'front-1667207861.jpg', 1, '2022-10-31 14:47:42', '2022-10-31 09:17:42'),
(1138, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '682418', 'Passport', 'sdfs343', 'back-1667207880.jpg', 'front-1667207880.jpg', 1, '2022-10-31 14:48:01', '2022-10-31 09:18:01'),
(1139, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667209438.jpg', 'front-1667209438.jpg', 1, '2022-10-31 15:13:58', '2022-10-31 09:43:58'),
(1140, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'back-1667210965.jpg', 'front-1667210965.jpg', 1, '2022-10-31 15:39:25', '2022-10-31 10:09:25'),
(1141, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667212871.jpg', 'front-1667212871.jpg', 1, '2022-10-31 16:11:11', '2022-10-31 10:41:11'),
(1142, NULL, NULL, NULL, NULL, 473, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667212907.jpg', 'front-1667212907.jpg', 1, '2022-10-31 16:11:47', '2022-10-31 10:41:47'),
(1143, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'back-1667214538.jpg', 'front-1667214538.jpg', 1, '2022-10-31 16:38:58', '2022-10-31 11:08:58'),
(1144, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667216011.jpg', 'front-1667216011.jpg', 1, '2022-10-31 17:03:31', '2022-10-31 11:33:31'),
(1145, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667216133.jpg', 'front-1667216133.jpg', 1, '2022-10-31 17:05:33', '2022-10-31 11:35:33'),
(1146, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667216170.jpg', 'front-1667216170.jpg', 1, '2022-10-31 17:06:10', '2022-10-31 11:36:10'),
(1147, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667216408.jpg', 'front-1667216408.jpg', 1, '2022-10-31 17:10:08', '2022-10-31 11:40:08'),
(1148, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667216576.jpg', 'back-1667216576.jpg', 1, '2022-10-31 17:12:56', '2022-10-31 11:42:56'),
(1149, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667216597.jpg', 'back-1667216597.jpg', 1, '2022-10-31 17:13:17', '2022-10-31 11:43:17'),
(1150, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667217079.jpg', 'back-1667217079.jpg', 1, '2022-10-31 17:21:19', '2022-10-31 11:51:19'),
(1151, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667217417.jpg', 'back-1667217417.jpg', 1, '2022-10-31 17:26:57', '2022-10-31 11:56:57'),
(1152, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667217488.jpg', 'back-1667217488.jpg', 1, '2022-10-31 17:28:08', '2022-10-31 11:58:08'),
(1153, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667218269.jpg', 'back-1667218269.jpg', 1, '2022-10-31 17:41:09', '2022-10-31 12:11:09'),
(1154, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667218351.jpg', 'back-1667218351.jpg', 1, '2022-10-31 17:42:31', '2022-10-31 12:12:31'),
(1155, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Voter Id', 'sdfs343', 'front-1667218467.jpg', 'back-1667218467.jpg', 1, '2022-10-31 17:44:27', '2022-10-31 12:14:27'),
(1156, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667218579.jpg', 'front-1667218579.jpg', 1, '2022-10-31 17:46:19', '2022-10-31 12:16:19'),
(1157, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', '1426866', 'Passport', 'sdfs343', 'back-1667218758.jpg', 'front-1667218758.jpg', 1, '2022-10-31 17:49:19', '2022-10-31 12:19:19'),
(1158, NULL, NULL, NULL, 321, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1648147', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667286762.pdf', 'Admin  Dashboard (3)-1667286762.pdf', 1, '2022-11-01 12:42:43', '2022-11-01 07:12:43'),
(1159, NULL, NULL, NULL, NULL, NULL, 171, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '58138', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667286943.pdf', 'Admin  Dashboard (3)-1667286943.pdf', 1, '2022-11-01 12:45:44', '2022-11-01 07:15:44'),
(1160, NULL, NULL, NULL, NULL, 831, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1478636', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667287004.pdf', 'Admin  Dashboard (6)-1667287004.pdf', 1, '2022-11-01 12:46:45', '2022-11-01 07:16:45'),
(1161, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Voter Id', '32132132123', 'back-1667294187.jpg', 'front-1667294187.jpg', 1, '2022-11-01 14:46:27', '2022-11-01 09:16:27'),
(1162, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Voter Id', '32132132123', 'back-1667294200.jpg', 'front-1667294200.jpg', 1, '2022-11-01 14:46:40', '2022-11-01 09:16:40'),
(1163, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Voter Id', '32132132123', 'back-1667294347.jpg', 'front-1667294348.jpg', 1, '2022-11-01 14:49:08', '2022-11-01 09:19:08'),
(1164, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '942509544', NULL, 'Voter Id', '32132132123', 'back-1667294506.jpg', 'front-1667294506.jpg', 1, '2022-11-01 14:51:46', '2022-11-01 09:21:46'),
(1165, NULL, NULL, NULL, 321, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1040529', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667297808.pdf', 'Admin  Dashboard (3)-1667297808.pdf', 1, '2022-11-01 15:46:49', '2022-11-01 10:16:49'),
(1166, NULL, 409, 1053, NULL, NULL, NULL, 'votivephp.rahulraj@gmail.com', 'rahul', 'solanki', '4454543433', NULL, 'Passport', 'sdfs343', 'back-1667298311.jpg', 'front-1667298311.jpg', 1, '2022-11-01 15:55:11', '2022-11-01 10:25:11'),
(1167, NULL, 666, 1320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667305976.pdf', 'Admin  Dashboard (3)-1667305976.pdf', 1, '2022-11-01 18:02:56', '2022-11-01 12:32:56'),
(1168, NULL, 666, 1322, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667306604.pdf', 'Admin  Dashboard (3)-1667306604.pdf', 1, '2022-11-01 18:13:24', '2022-11-01 12:43:24'),
(1169, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '440777', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667365927.pdf', 'Admin  Dashboard (3)-1667365927.pdf', 1, '2022-11-02 10:42:08', '2022-11-02 05:12:08'),
(1170, NULL, NULL, NULL, 321, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1178533', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667366324.pdf', 'Admin  Dashboard (3)-1667366324.pdf', 1, '2022-11-02 10:48:45', '2022-11-02 05:18:45'),
(1171, NULL, NULL, NULL, NULL, 830, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '892959', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1667366439.pdf', 'Admin  Dashboard (3)-1667366439.pdf', 1, '2022-11-02 10:50:40', '2022-11-02 05:20:40'),
(1172, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '4565456456', 'Admin  Dashboard (2)-1667366801.pdf', 'Admin  Dashboard (3)-1667366801.pdf', 1, '2022-11-02 10:56:41', '2022-11-02 05:26:41'),
(1173, NULL, 666, 1324, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667373557.pdf', 'Admin  Dashboard (3)-1667373557.pdf', 1, '2022-11-02 12:49:17', '2022-11-02 07:19:17'),
(1174, NULL, 668, 1329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667383682.pdf', 'Admin  Dashboard (4)-1667383682.pdf', 1, '2022-11-02 15:38:02', '2022-11-02 10:08:02'),
(1175, NULL, NULL, NULL, NULL, 830, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '702765', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667384039.pdf', 'Admin  Dashboard (4)-1667384039.pdf', 1, '2022-11-02 15:44:00', '2022-11-02 10:14:00'),
(1176, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1291968', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667384328.pdf', 'Admin  Dashboard (3)-1667384328.pdf', 1, '2022-11-02 15:48:49', '2022-11-02 10:18:49'),
(1177, NULL, NULL, NULL, 321, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '687355', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1667384466.pdf', 'Admin  Dashboard (6)-1667384466.pdf', 1, '2022-11-02 15:51:07', '2022-11-02 10:21:07'),
(1178, NULL, 666, 1320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667458383.pdf', 'Admin  Dashboard (4)-1667458383.pdf', 1, '2022-11-03 12:23:03', '2022-11-03 06:53:03'),
(1179, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '454460', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667458626.pdf', 'Admin  Dashboard (3)-1667458626.pdf', 1, '2022-11-03 12:27:07', '2022-11-03 06:57:07'),
(1180, NULL, NULL, NULL, NULL, 832, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '713891', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667458834.pdf', 'Admin  Dashboard (3)-1667458834.pdf', 1, '2022-11-03 12:30:35', '2022-11-03 07:00:35'),
(1181, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667466339.pdf', 'Admin  Dashboard (3)-1667466339.pdf', 1, '2022-11-03 14:35:39', '2022-11-03 09:05:39'),
(1182, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '393236', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667466479.pdf', 'Admin  Dashboard (3)-1667466479.pdf', 1, '2022-11-03 14:38:01', '2022-11-03 09:08:01'),
(1183, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1100700', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667466868.pdf', 'Admin  Dashboard (3)-1667466868.pdf', 1, '2022-11-03 14:44:29', '2022-11-03 09:14:29'),
(1184, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667539365.pdf', 'Admin  Dashboard (3)-1667539365.pdf', 1, '2022-11-04 10:52:45', '2022-11-04 05:22:45'),
(1185, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '988024', NULL, '4565456456', 'Admin  Dashboard (2)-1667539570.pdf', 'Admin  Dashboard (4)-1667539570.pdf', 1, '2022-11-04 10:56:11', '2022-11-04 05:26:11'),
(1186, NULL, NULL, NULL, NULL, 831, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1149606', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667539774.pdf', 'Admin  Dashboard (3)-1667539774.pdf', 1, '2022-11-04 10:59:35', '2022-11-04 05:29:35'),
(1187, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '676248', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1667551677.pdf', 'Admin  Dashboard (3)-1667551677.pdf', 1, '2022-11-04 14:17:58', '2022-11-04 08:47:58'),
(1188, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1116356', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667551961.pdf', 'Admin  Dashboard (4)-1667551961.pdf', 1, '2022-11-04 14:22:42', '2022-11-04 08:52:42'),
(1189, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '959609', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667552119.pdf', 'Admin  Dashboard (3)-1667552119.pdf', 1, '2022-11-04 14:25:20', '2022-11-04 08:55:20'),
(1190, NULL, NULL, NULL, 322, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '177054', 'Voter Id', '6546454', 'Admin  Dashboard (2)-1667552397.pdf', 'Admin  Dashboard (4)-1667552397.pdf', 1, '2022-11-04 14:29:58', '2022-11-04 08:59:58'),
(1191, NULL, 668, 1329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667639267.pdf', 'Admin  Dashboard (4)-1667639267.pdf', 1, '2022-11-05 14:37:47', '2022-11-05 09:07:47'),
(1192, NULL, NULL, NULL, NULL, 831, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '285876', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667639735.pdf', 'Admin  Dashboard (3)-1667639735.pdf', 1, '2022-11-05 14:45:36', '2022-11-05 09:15:36'),
(1193, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (5)-1667652400.pdf', 'Admin  Dashboard (4)-1667652400.pdf', 1, '2022-11-05 18:16:40', '2022-11-05 12:46:40'),
(1194, NULL, NULL, NULL, NULL, 832, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1165564', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667652496.pdf', 'Admin  Dashboard (3)-1667652496.pdf', 1, '2022-11-05 18:18:17', '2022-11-05 12:48:17'),
(1195, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '446654', 'Admin  Dashboard (2)-1667803573.pdf', 'Admin  Dashboard (3)-1667803573.pdf', 1, '2022-11-07 12:16:13', '2022-11-07 06:46:13'),
(1196, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '724607', 'Voter Id', '446654', 'Admin  Dashboard (2)-1667803668.pdf', 'Admin  Dashboard (3)-1667803668.pdf', 1, '2022-11-07 12:17:49', '2022-11-07 06:47:49'),
(1197, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '504058', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667804404.pdf', 'Admin  Dashboard (3)-1667804404.pdf', 1, '2022-11-07 12:30:06', '2022-11-07 07:00:06'),
(1198, NULL, NULL, NULL, NULL, 832, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1240825', 'Voter Id', '446654', 'Admin  Dashboard (2)-1667804571.pdf', 'Admin  Dashboard (3)-1667804571.pdf', 1, '2022-11-07 12:32:52', '2022-11-07 07:02:52'),
(1199, NULL, NULL, NULL, 321, NULL, NULL, 'farahk16@outlook.com', 'Farah', 'Khalid', '+923373164408', '981781', 'Passport', '12344', 'a498aead-d89f-4a94-a5ff-3a5940218b33-1667847551.jpg', 'a498aead-d89f-4a94-a5ff-3a5940218b33-1667847551.jpg', 1, '2022-11-08 00:29:12', '2022-11-07 18:59:12'),
(1200, NULL, 668, 1329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667884935.pdf', 'Admin  Dashboard (3)-1667884935.pdf', 1, '2022-11-08 10:52:15', '2022-11-08 05:22:15'),
(1201, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '864462', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667885196.pdf', 'Admin  Dashboard (3)-1667885196.pdf', 1, '2022-11-08 10:56:37', '2022-11-08 05:26:37'),
(1202, NULL, NULL, NULL, NULL, 831, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '5154', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1667885353.pdf', 'Admin  Dashboard (3)-1667885353.pdf', 1, '2022-11-08 10:59:14', '2022-11-08 05:29:14'),
(1203, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '385564', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667887416.pdf', 'Admin  Dashboard (3)-1667887416.pdf', 1, '2022-11-08 11:33:37', '2022-11-08 06:03:37'),
(1204, NULL, 666, 1320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '6546454', 'Admin  Dashboard (2)-1667977161.pdf', 'Admin  Dashboard (3)-1667977161.pdf', 1, '2022-11-09 12:29:21', '2022-11-09 06:59:21'),
(1205, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '222321', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667977270.pdf', 'Admin  Dashboard (4)-1667977270.pdf', 1, '2022-11-09 12:31:11', '2022-11-09 07:01:11'),
(1206, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '68927', 'Voter Id', '64444664', 'Admin  Dashboard (2)-1667977456.pdf', 'Admin  Dashboard (3)-1667977456.pdf', 1, '2022-11-09 12:34:16', '2022-11-09 07:04:16'),
(1207, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667990762.pdf', 'Admin  Dashboard (3)-1667990762.pdf', 1, '2022-11-09 16:16:02', '2022-11-09 10:46:02'),
(1208, NULL, NULL, NULL, 323, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1140567', 'Voter Id', '4546466', 'Admin  Dashboard (2)-1667990828.pdf', 'Admin  Dashboard (3)-1667990828.pdf', 1, '2022-11-09 16:17:09', '2022-11-09 10:47:09'),
(1209, NULL, NULL, NULL, NULL, NULL, 172, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '714254', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667990956.pdf', 'Admin  Dashboard (4)-1667990956.pdf', 1, '2022-11-09 16:19:18', '2022-11-09 10:49:18'),
(1210, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '861201', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1667991086.pdf', 'Admin  Dashboard (3)-1667991086.pdf', 1, '2022-11-09 16:21:27', '2022-11-09 10:51:27'),
(1211, NULL, 668, 1329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '446654', 'Admin  Dashboard (2)-1668061050.pdf', 'Admin  Dashboard (3)-1668061050.pdf', 1, '2022-11-10 11:47:30', '2022-11-10 06:17:30'),
(1212, NULL, NULL, NULL, 325, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'SAHU', '9874561478', '1553323', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1668061111.pdf', 'Admin  Dashboard (5)-1668061111.pdf', 1, '2022-11-10 11:48:32', '2022-11-10 06:18:32'),
(1213, NULL, NULL, NULL, 325, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1199664', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668062054.pdf', 'Admin  Dashboard (3)-1668062054.pdf', 1, '2022-11-10 12:04:15', '2022-11-10 06:34:15'),
(1214, NULL, NULL, NULL, NULL, NULL, 173, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1775919', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668062180.pdf', 'Admin  Dashboard (4)-1668062180.pdf', 1, '2022-11-10 12:06:21', '2022-11-10 06:36:21'),
(1215, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '446654', 'Admin  Dashboard (2)-1668142605.pdf', 'Admin  Dashboard (3)-1668142605.pdf', 1, '2022-11-11 10:26:46', '2022-11-11 04:56:46'),
(1216, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '295432', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668142831.pdf', 'Admin  Dashboard (3)-1668142831.pdf', 1, '2022-11-11 10:30:33', '2022-11-11 05:00:33'),
(1217, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '124107', 'Voter Id', '6546454', 'Admin  Dashboard (3)-1668159790.pdf', 'Admin  Dashboard (4)-1668159790.pdf', 1, '2022-11-11 15:13:11', '2022-11-11 09:43:11'),
(1218, NULL, NULL, NULL, 327, NULL, NULL, 'bookings@roadnstays.com', 'khalid', 'khalid', '92300', '1621620', 'Passport', '1234', 'skyler logo-1668261585.png', 'skyler logo-1668261585.png', 1, '2022-11-12 19:29:46', '2022-11-12 13:59:46'),
(1219, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1461256', 'Passport', '7897878787', '4two-gaeste-2-1668404597.jpg', '2022_07_28T06_16_35_798Z-1668404597.jpeg', 1, '2022-11-14 11:13:20', '2022-11-14 05:43:20'),
(1220, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '446654', 'Admin  Dashboard (3)-1668405430.pdf', 'Admin  Dashboard (5)-1668405430.pdf', 1, '2022-11-14 11:27:10', '2022-11-14 05:57:10'),
(1221, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '830275', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1668409583.pdf', 'Admin  Dashboard (6)-1668409583.pdf', 1, '2022-11-14 12:36:24', '2022-11-14 07:06:24'),
(1222, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '673726', 'Voter Id', '848787878', '4two-gaeste-2-1668432912.jpg', '2022_07_28T06_16_35_798Z-1668432912.jpeg', 1, '2022-11-14 19:05:13', '2022-11-14 13:35:13'),
(1223, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1545583', 'Passport', '9856412301', '4two-gaeste-2-1668433172.jpg', '4two-gaeste-2-1668433173.jpg', 1, '2022-11-14 19:09:34', '2022-11-14 13:39:34'),
(1224, NULL, 666, 1320, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668492961.pdf', 'Admin  Dashboard (3)-1668492961.pdf', 1, '2022-11-15 11:46:01', '2022-11-15 06:16:01'),
(1225, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '64444664', 'Admin  Dashboard (2)-1668576210.pdf', 'Admin  Dashboard (3)-1668576210.pdf', 1, '2022-11-16 10:53:30', '2022-11-16 05:23:30'),
(1226, NULL, NULL, NULL, NULL, 830, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1293632', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668576516.pdf', 'Admin  Dashboard (4)-1668576516.pdf', 1, '2022-11-16 10:58:38', '2022-11-16 05:28:38'),
(1227, NULL, NULL, NULL, NULL, 830, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '715287', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668576591.pdf', 'Admin  Dashboard (4)-1668576591.pdf', 1, '2022-11-16 10:59:52', '2022-11-16 05:29:52'),
(1228, NULL, NULL, NULL, NULL, NULL, 173, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '680262', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668577208.pdf', 'Admin  Dashboard (3)-1668577208.pdf', 1, '2022-11-16 11:10:10', '2022-11-16 05:40:10'),
(1229, NULL, NULL, NULL, NULL, NULL, 173, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1192173', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1668577419.pdf', 'Admin  Dashboard (3)-1668577419.pdf', 1, '2022-11-16 11:13:40', '2022-11-16 05:43:40'),
(1230, NULL, 668, 1329, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1668577951.pdf', 'Admin  Dashboard (3)-1668577951.pdf', 1, '2022-11-16 11:22:31', '2022-11-16 05:52:31'),
(1231, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1072351', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668578068.pdf', 'Admin  Dashboard (4)-1668578068.pdf', 1, '2022-11-16 11:24:29', '2022-11-16 05:54:29'),
(1232, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1275178', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668578108.pdf', 'Admin  Dashboard (3)-1668578108.pdf', 1, '2022-11-16 11:25:09', '2022-11-16 05:55:09'),
(1233, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '197449', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668580910.pdf', 'Admin  Dashboard (3)-1668580910.pdf', 1, '2022-11-16 12:11:51', '2022-11-16 06:41:51'),
(1234, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1646455', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668582065.pdf', 'Admin  Dashboard (4)-1668582065.pdf', 1, '2022-11-16 12:31:07', '2022-11-16 07:01:07'),
(1235, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668667867.pdf', 'Admin  Dashboard (3)-1668667867.pdf', 1, '2022-11-17 12:21:07', '2022-11-17 06:51:07'),
(1236, NULL, NULL, NULL, NULL, NULL, 176, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '160250', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668667945.pdf', 'Admin  Dashboard (3)-1668667945.pdf', 1, '2022-11-17 12:22:27', '2022-11-17 06:52:27'),
(1237, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1270330', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668668002.pdf', 'Admin  Dashboard (4)-1668668002.pdf', 1, '2022-11-17 12:23:22', '2022-11-17 06:53:22'),
(1238, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1421307', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668669928.pdf', 'Admin  Dashboard (3)-1668669928.pdf', 1, '2022-11-17 12:55:28', '2022-11-17 07:25:28'),
(1239, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1509013', 'Passport', '654645987987', '4two-gaeste-2-1668674724.jpg', '4two-gaeste-1668674724.jpg', 1, '2022-11-17 14:15:25', '2022-11-17 08:45:25'),
(1240, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '735000', 'Passport', '654645987987', '4two-gaeste-2-1668674778.jpg', '4two-gaeste-1668674778.jpg', 1, '2022-11-17 14:16:19', '2022-11-17 08:46:19'),
(1241, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '582482', 'Passport', '654645987987', '4two-gaeste-2-1668674833.jpg', '4two-gaeste-2-1668674833.jpg', 1, '2022-11-17 14:17:14', '2022-11-17 08:47:14'),
(1242, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '9179004123', '440281', 'Passport', '654645987987', '4two-gaeste-2-1668675547.jpg', '4two-gaeste-2-1668675548.jpg', 1, '2022-11-17 14:29:09', '2022-11-17 08:59:09'),
(1243, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '722400', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668675895.pdf', 'Admin  Dashboard (3)-1668675895.pdf', 1, '2022-11-17 14:34:56', '2022-11-17 09:04:56'),
(1244, NULL, NULL, NULL, NULL, NULL, 176, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '766804', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668675994.pdf', 'Admin  Dashboard (3)-1668675994.pdf', 1, '2022-11-17 14:36:37', '2022-11-17 09:06:37'),
(1245, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1173321', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668676200.pdf', 'Admin  Dashboard (3)-1668676200.pdf', 1, '2022-11-17 14:40:01', '2022-11-17 09:10:01'),
(1246, NULL, 409, 1053, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1167115', 'Passport', '78454123651', '4two-gaeste-2-1668687974.jpg', '4two-gaeste-2-1668687974.jpg', 1, '2022-11-17 17:56:15', '2022-11-17 12:26:15'),
(1247, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668688793.pdf', 'Admin  Dashboard (3)-1668688793.pdf', 1, '2022-11-17 18:09:53', '2022-11-17 12:39:53'),
(1248, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1012861', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668689352.pdf', 'Admin  Dashboard (3)-1668689352.pdf', 1, '2022-11-17 18:19:14', '2022-11-17 12:49:14'),
(1249, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '958683', 'Passport', '654645987987', '4two-gaeste-2-1668689637.jpg', '4two-gaeste-2-1668689637.jpg', 1, '2022-11-17 18:23:58', '2022-11-17 12:53:58'),
(1250, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '9179004123', '1411162', 'Passport', '7896545112', '4two-gaeste-2-1668690060.jpg', '2022_07_28T06_16_35_798Z-1668690060.jpeg', 1, '2022-11-17 18:31:01', '2022-11-17 13:01:01'),
(1251, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '9179004123', '666127', 'Passport', '789654', '4two-gaeste-2-1668690283.jpg', '2022_07_28T06_16_35_798Z-1668690283.jpeg', 1, '2022-11-17 18:34:44', '2022-11-17 13:04:44');
INSERT INTO `guestinfo` (`id`, `user_id`, `hotel_id`, `room_id`, `tour_id`, `space_id`, `event_id`, `email`, `first_name`, `last_name`, `mobile`, `payment_id`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `status`, `created_date`, `updated_date`) VALUES
(1252, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '244883', 'Passport', '7897878787', '4two-gaeste-2-1668690441.jpg', '4two-gaeste-2-1668690442.jpg', 1, '2022-11-17 18:37:23', '2022-11-17 13:07:23'),
(1253, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1512271', 'Passport', '7897878787', '4two-gaeste-2-1668690503.jpg', '4two-gaeste-2-1668690504.jpg', 1, '2022-11-17 18:38:25', '2022-11-17 13:08:25'),
(1254, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '129018', 'Passport', '7897878787', '4two-gaeste-2-1668690605.jpg', '4two-gaeste-2-1668690606.jpg', 1, '2022-11-17 18:40:07', '2022-11-17 13:10:07'),
(1255, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1255554', 'Passport', '7897878787', '4two-gaeste-2-1668690683.jpg', '4two-gaeste-2-1668690684.jpg', 1, '2022-11-17 18:41:25', '2022-11-17 13:11:25'),
(1256, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '212663', 'Passport', '7897878787', '4two-gaeste-2-1668690797.jpg', '4two-gaeste-2-1668690798.jpg', 1, '2022-11-17 18:43:19', '2022-11-17 13:13:19'),
(1257, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1168491', 'Passport', '654645987987', '4two-gaeste-2-1668690825.jpg', '4two-gaeste-2-1668690826.jpg', 1, '2022-11-17 18:43:46', '2022-11-17 13:13:46'),
(1258, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '1124619', 'Passport', '5454545485', '4two-gaeste-2-1668691495.jpg', '2022_07_28T06_16_35_798Z-1668691495.jpeg', 1, '2022-11-17 18:54:56', '2022-11-17 13:24:56'),
(1259, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha88@gmail.com', 'Pushpendra', 'Jha', '06616630938', '1439330', 'Passport', '78454123651', '4two-gaeste-2-1668691617.jpg', '2022_07_28T06_16_35_798Z-1668691617.jpeg', 1, '2022-11-17 18:56:58', '2022-11-17 13:26:58'),
(1260, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '783452', 'Passport', '78454123651', '4two-gaeste-2-1668691682.jpg', '2022_07_28T06_16_35_798Z-1668691682.jpeg', 1, '2022-11-17 18:58:03', '2022-11-17 13:28:03'),
(1261, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '701145', 'Passport', '78789787', '4two-gaeste-2-1668691772.jpg', '4two-gaeste-2-1668691773.jpg', 1, '2022-11-17 18:59:34', '2022-11-17 13:29:34'),
(1262, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '674996', 'Passport', '7897878787', '4two-gaeste-2-1668691861.jpg', '4two-gaeste-2-1668691861.jpg', 1, '2022-11-17 19:01:02', '2022-11-17 13:31:02'),
(1263, NULL, 667, 1326, NULL, NULL, NULL, 'pushpendrajha@gmail.com', 'Pushpendra', 'techs', '09179004123', '410791', 'Passport', '7897878787', '4two-gaeste-2-1668691924.jpg', '4two-gaeste-2-1668691924.jpg', 1, '2022-11-17 19:02:05', '2022-11-17 13:32:05'),
(1264, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668754349.pdf', 'Admin  Dashboard (4)-1668754349.pdf', 1, '2022-11-18 12:22:29', '2022-11-18 06:52:29'),
(1265, NULL, NULL, NULL, NULL, NULL, 176, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '468810', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668754407.pdf', 'Admin  Dashboard (3)-1668754407.pdf', 1, '2022-11-18 12:23:28', '2022-11-18 06:53:28'),
(1266, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '389563', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668754540.pdf', 'Admin  Dashboard (4)-1668754540.pdf', 1, '2022-11-18 12:25:41', '2022-11-18 06:55:41'),
(1267, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668755326.pdf', 'Admin  Dashboard (3)-1668755326.pdf', 1, '2022-11-18 12:38:46', '2022-11-18 07:08:46'),
(1268, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1668755410.pdf', 'Admin  Dashboard (3)-1668755410.pdf', 1, '2022-11-18 12:40:10', '2022-11-18 07:10:10'),
(1269, NULL, NULL, NULL, 330, NULL, NULL, 'mkakhi@yahoo.com', 'Muhammad', 'Khalid', '+923002347656', '1145643', 'Passport', '12345', 'WhatsApp Image 2022-05-16 at 12.26.38 AM (1)-1668881373.jpeg', 'WhatsApp Image 2022-05-16 at 12.26.38 AM (1)-1668881373.jpeg', 1, '2022-11-19 23:39:34', '2022-11-19 18:09:34'),
(1270, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669009952.pdf', 'Admin  Dashboard (3)-1669009952.pdf', 1, '2022-11-21 11:22:32', '2022-11-21 05:52:32'),
(1271, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '810423', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669010099.pdf', 'Admin  Dashboard (4)-1669010099.pdf', 1, '2022-11-21 11:25:03', '2022-11-21 05:55:03'),
(1272, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1614649', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669010159.pdf', 'Admin  Dashboard (4)-1669010159.pdf', 1, '2022-11-21 11:26:00', '2022-11-21 05:56:00'),
(1273, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '568767', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669010266.pdf', 'Admin  Dashboard (4)-1669010266.pdf', 1, '2022-11-21 11:27:47', '2022-11-21 05:57:47'),
(1274, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '22840', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1669026426.pdf', 'Admin  Dashboard (5)-1669026426.pdf', 1, '2022-11-21 15:57:07', '2022-11-21 10:27:07'),
(1275, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '4546466', 'Admin  Dashboard (3)-1669026837.pdf', 'Admin  Dashboard (3)-1669026837.pdf', 1, '2022-11-21 16:03:57', '2022-11-21 10:33:57'),
(1276, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669106413.pdf', 'Admin  Dashboard (3)-1669106413.pdf', 1, '2022-11-22 14:10:13', '2022-11-22 08:40:13'),
(1277, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1679635', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669106474.pdf', 'Admin  Dashboard (3)-1669106474.pdf', 1, '2022-11-22 14:11:15', '2022-11-22 08:41:15'),
(1278, NULL, NULL, NULL, NULL, 837, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1584464', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669106592.pdf', 'Admin  Dashboard (3)-1669106592.pdf', 1, '2022-11-22 14:13:13', '2022-11-22 08:43:13'),
(1279, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669108691.pdf', 'Admin  Dashboard (3)-1669108691.pdf', 1, '2022-11-22 14:48:11', '2022-11-22 09:18:11'),
(1280, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '681691', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669108797.pdf', 'Admin  Dashboard (4)-1669108797.pdf', 1, '2022-11-22 14:49:58', '2022-11-22 09:19:58'),
(1281, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '373288', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669110916.pdf', 'Admin  Dashboard (3)-1669110916.pdf', 1, '2022-11-22 15:25:17', '2022-11-22 09:55:17'),
(1282, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669112643.pdf', 'Admin  Dashboard (3)-1669112643.pdf', 1, '2022-11-22 15:54:03', '2022-11-22 10:24:03'),
(1283, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '218119', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669112690.pdf', 'Admin  Dashboard (3)-1669112690.pdf', 1, '2022-11-22 15:54:51', '2022-11-22 10:24:51'),
(1284, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1733372', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669206669.pdf', 'Admin  Dashboard (3)-1669206669.pdf', 1, '2022-11-23 18:01:10', '2022-11-23 12:31:10'),
(1285, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669271694.pdf', 'Admin  Dashboard (2)-1669271694.pdf', 1, '2022-11-24 12:04:54', '2022-11-24 06:34:54'),
(1286, NULL, NULL, NULL, NULL, 838, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '661759', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669286850.pdf', 'Admin  Dashboard (2)-1669286850.pdf', 1, '2022-11-24 16:17:31', '2022-11-24 10:47:31'),
(1287, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '601352', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669292962.pdf', 'Admin  Dashboard (4)-1669292962.pdf', 1, '2022-11-24 17:59:23', '2022-11-24 12:29:23'),
(1288, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669355877.pdf', 'Admin  Dashboard (3)-1669355877.pdf', 1, '2022-11-25 11:27:57', '2022-11-25 05:57:57'),
(1289, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '379587', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669355946.pdf', 'Admin  Dashboard (3)-1669355946.pdf', 1, '2022-11-25 11:29:09', '2022-11-25 05:59:09'),
(1290, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1079550', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669356247.pdf', 'Admin  Dashboard (3)-1669356247.pdf', 1, '2022-11-25 11:34:08', '2022-11-25 06:04:08'),
(1291, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '866081', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669356370.pdf', 'Admin  Dashboard (3)-1669356370.pdf', 1, '2022-11-25 11:36:11', '2022-11-25 06:06:11'),
(1292, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669359300.pdf', 'Admin  Dashboard (3)-1669359300.pdf', 1, '2022-11-25 12:25:00', '2022-11-25 06:55:00'),
(1293, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '418431', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669359358.pdf', 'Admin  Dashboard (3)-1669359358.pdf', 1, '2022-11-25 12:25:59', '2022-11-25 06:55:59'),
(1294, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '159427', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669366537.pdf', 'Admin  Dashboard (3)-1669366537.pdf', 1, '2022-11-25 14:25:38', '2022-11-25 08:55:38'),
(1295, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '798668', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669366892.pdf', 'Admin  Dashboard (4)-1669366892.pdf', 1, '2022-11-25 14:31:33', '2022-11-25 09:01:33'),
(1296, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669377983.pdf', 'Admin  Dashboard (4)-1669377983.pdf', 1, '2022-11-25 17:36:23', '2022-11-25 12:06:23'),
(1297, NULL, NULL, NULL, NULL, NULL, 179, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1777327', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669378043.pdf', 'Admin  Dashboard (3)-1669378043.pdf', 1, '2022-11-25 17:37:24', '2022-11-25 12:07:24'),
(1298, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669438835.pdf', 'Admin  Dashboard (3)-1669438835.pdf', 1, '2022-11-26 10:30:35', '2022-11-26 05:00:35'),
(1299, NULL, NULL, NULL, NULL, NULL, 178, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '766637', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669438877.pdf', 'Admin  Dashboard (4)-1669438877.pdf', 1, '2022-11-26 10:31:19', '2022-11-26 05:01:19'),
(1300, NULL, NULL, NULL, NULL, NULL, 178, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '744646', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669439015.pdf', 'Admin  Dashboard (3)-1669439015.pdf', 1, '2022-11-26 10:33:36', '2022-11-26 05:03:36'),
(1301, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669443081.pdf', 'Admin  Dashboard (3)-1669443081.pdf', 1, '2022-11-26 11:41:21', '2022-11-26 06:11:21'),
(1302, NULL, NULL, NULL, NULL, NULL, 178, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1527040', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669443164.pdf', 'Admin  Dashboard (3)-1669443164.pdf', 1, '2022-11-26 11:42:45', '2022-11-26 06:12:45'),
(1303, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669617416.pdf', 'Admin  Dashboard (3)-1669617416.pdf', 1, '2022-11-28 12:06:56', '2022-11-28 06:36:56'),
(1304, NULL, NULL, NULL, NULL, NULL, 182, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '730728', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669617467.pdf', 'Admin  Dashboard (3)-1669617467.pdf', 1, '2022-11-28 12:07:49', '2022-11-28 06:37:49'),
(1305, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '651730', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669617673.pdf', 'Admin  Dashboard (3)-1669617673.pdf', 1, '2022-11-28 12:11:14', '2022-11-28 06:41:14'),
(1306, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669618277.pdf', 'Admin  Dashboard (3)-1669618277.pdf', 1, '2022-11-28 12:21:17', '2022-11-28 06:51:17'),
(1307, NULL, NULL, NULL, NULL, NULL, 182, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '760336', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669618328.pdf', 'Admin  Dashboard (3)-1669618328.pdf', 1, '2022-11-28 12:22:11', '2022-11-28 06:52:11'),
(1308, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1164720', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669618482.pdf', 'Admin  Dashboard (3)-1669618482.pdf', 1, '2022-11-28 12:24:43', '2022-11-28 06:54:43'),
(1309, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1669618583.pdf', 'Admin  Dashboard (3)-1669618583.pdf', 1, '2022-11-28 12:26:23', '2022-11-28 06:56:23'),
(1310, NULL, NULL, NULL, NULL, 827, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '487176', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669618637.pdf', 'Admin  Dashboard (3)-1669618637.pdf', 1, '2022-11-28 12:27:19', '2022-11-28 06:57:19'),
(1311, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '633968', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669632111.pdf', 'Admin  Dashboard (4)-1669632111.pdf', 1, '2022-11-28 16:11:52', '2022-11-28 10:41:52'),
(1312, NULL, NULL, NULL, NULL, NULL, 183, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1480976', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669632244.pdf', 'Admin  Dashboard (3)-1669632244.pdf', 1, '2022-11-28 16:14:05', '2022-11-28 10:44:05'),
(1313, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '211631', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669632351.pdf', 'Admin  Dashboard (4)-1669632351.pdf', 1, '2022-11-28 16:15:52', '2022-11-28 10:45:52'),
(1314, NULL, NULL, NULL, NULL, NULL, 183, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '113602', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669633066.pdf', 'Admin  Dashboard (3)-1669633066.pdf', 1, '2022-11-28 16:27:48', '2022-11-28 10:57:48'),
(1315, NULL, NULL, NULL, NULL, 636, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1225993', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669633196.pdf', 'Admin  Dashboard (3)-1669633196.pdf', 1, '2022-11-28 16:29:57', '2022-11-28 10:59:57'),
(1316, NULL, 409, 1053, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1332766', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669637771.pdf', 'Admin  Dashboard (2)-1669637771.pdf', 1, '2022-11-28 17:46:13', '2022-11-28 12:16:13'),
(1317, NULL, 668, 1328, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669639332.pdf', 'Admin  Dashboard (3)-1669639332.pdf', 1, '2022-11-28 18:12:12', '2022-11-28 12:42:12'),
(1318, NULL, NULL, NULL, NULL, NULL, 183, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '763508', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669639377.pdf', 'Admin  Dashboard (4)-1669639377.pdf', 1, '2022-11-28 18:12:58', '2022-11-28 12:42:58'),
(1319, NULL, NULL, NULL, 326, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '1438889', 'Voter Id', '9874562587', 'Admin  Dashboard (3)-1669711387.pdf', 'Admin  Dashboard (4)-1669711387.pdf', 1, '2022-11-29 14:13:08', '2022-11-29 08:43:08'),
(1320, 934, 409, NULL, NULL, NULL, NULL, 'sjsj@gmail.com', 'shshsh', 'bbdb', '3474838383', NULL, NULL, NULL, '', '', 1, '2022-11-29 14:23:37', '2022-11-29 09:23:37'),
(1321, NULL, 667, 1326, NULL, NULL, NULL, 'votivetester.saurabh@gmail.com', 'srb', 'sahu', '9874561478', '864997', 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1669785372.pdf', 'Admin  Dashboard (3)-1669785372.pdf', 1, '2022-11-30 10:46:14', '2022-11-30 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `H1_Hotel_and_other_Stays`
--

CREATE TABLE `H1_Hotel_and_other_Stays` (
  `id` int(11) NOT NULL,
  `stay_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H1_Hotel_and_other_Stays`
--

INSERT INTO `H1_Hotel_and_other_Stays` (`id`, `stay_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Homestay', 'A shared home where the guest has a private room and the host lives and is on site. Some facilities are shared between hosts and guests.', 1, '2022-06-01 10:11:13', NULL),
(5, 'Hostel', 'Budget accommodation with mostly dorm-style bedding and a social atmosphere', 1, '2022-06-01 10:11:25', NULL),
(6, 'Aparthotel', 'A self-catering apartment with some hotel facilities like a reception desk', 1, '2022-06-01 10:11:36', '2022-07-07 05:39:45'),
(7, 'Capsule', 'Extremely small units or capsules offering cheap and basic overnight accommodation', 1, '2022-06-01 10:11:47', '2022-07-26 09:28:22'),
(8, 'Country house', 'Private home with simple accommodation in the countryside', 1, '2022-06-01 10:11:47', NULL),
(9, 'Farm stay', 'Private farm with simple accommodation.', 1, '2022-06-01 10:12:34', '2022-06-02 10:43:59'),
(10, 'Inn', 'Small and basic accommodation with a rustic feel', 1, '2022-06-01 10:12:43', NULL),
(11, 'Motel', 'Roadside hotel usually for motorists, with direct access to parking and little to no amenities', 1, '2022-06-01 10:13:04', '2022-08-26 13:16:37'),
(12, 'Hotel', 'Accommodation for travellers often offering restaurants, meeting rooms and other guest services', 1, '2022-08-30 16:02:42', NULL),
(14, 'Guest House', 'Private home with separate living facilities for host and guest', 1, '2022-09-05 11:28:30', NULL),
(15, 'Bed and breakfast', 'Private home offering overnight stays and breakfast', 1, '2022-09-05 11:28:44', '2022-10-11 13:51:30'),
(16, 'Lodge', 'Private home with accommodation surrounded by nature, such as mountains or forests', 1, '2022-09-05 11:29:01', '2022-11-29 10:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `H2_Amenities`
--

CREATE TABLE `H2_Amenities` (
  `amenity_id` int(11) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_icon` varchar(255) DEFAULT NULL,
  `amenity_type` int(11) NOT NULL,
  `amenity_type_name` varchar(255) DEFAULT NULL,
  `amenity_type_sym` varchar(255) DEFAULT NULL,
  `order_by` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H2_Amenities`
--

INSERT INTO `H2_Amenities` (`amenity_id`, `amenity_name`, `amenity_icon`, `amenity_type`, `amenity_type_name`, `amenity_type_sym`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Alarm clock', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-02 07:11:13', '2022-08-05 05:51:00'),
(30, 'support', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-10 12:46:55', NULL),
(47, 'Interconnected room(s) available', '', 1, 'Room Amenitie', 'Room_Amenitie', NULL, 1, '2022-06-13 06:58:16', '2022-11-29 10:09:22'),
(48, 'Iron', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:58:54', NULL),
(49, 'Ironing facilities', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:59:23', NULL),
(50, 'Mosquito net', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:00:08', NULL),
(51, 'Safety deposit box', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:00:45', NULL),
(54, 'Seating Area', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:02:47', NULL),
(55, 'Tile/marble floor', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:03:20', NULL),
(56, 'Pants press', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:03:58', NULL),
(57, 'Hardwood or parquet floors', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:04:27', NULL),
(58, 'Desk', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:05:06', NULL),
(59, 'Hypoallergenic', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:05:36', NULL),
(60, 'Cleaning products', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:06:07', NULL),
(61, 'Electric blankets', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:06:32', NULL),
(62, 'Private entrance', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:09:11', NULL),
(63, 'Bath', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:16:20', NULL),
(64, 'Bidet', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:16:44', NULL),
(65, 'Bath or shower', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:17:12', NULL),
(66, 'Bathrobe', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:17:42', NULL),
(67, 'Private bathroom', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:18:20', NULL),
(68, 'Free toiletries', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:18:55', NULL),
(69, 'Spa bath', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:19:53', NULL),
(70, 'Shared bathroom', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:20:23', NULL),
(71, 'Shower', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:20:56', NULL),
(73, 'Slippers', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:21:59', NULL),
(74, 'Toilet', '', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:22:21', NULL),
(75, 'Books, DVDs, or music for children', '', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-13 07:25:45', NULL),
(76, 'Child safety socket covers', '', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-13 07:26:19', NULL),
(77, 'Wake-up service', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:28:37', NULL),
(78, 'Wake up service/Alarm clock', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:28:53', NULL),
(79, 'Linen', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:07', NULL),
(80, 'Towels', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:22', NULL),
(81, 'Towels/sheets (extra fee)', '', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:40', NULL),
(82, 'Game console', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:13:26', NULL),
(83, 'Game console – Nintendo Wii', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:14:09', NULL),
(85, 'Game console – PS2', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:14:54', NULL),
(86, 'Game console – PS3', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:15:38', NULL),
(87, 'Game console – Xbox 360', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:16:11', NULL),
(88, 'Laptop', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:16:47', NULL),
(89, 'iPad', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:19:53', NULL),
(90, 'Cable channels', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:18', NULL),
(91, 'CD player', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:39', NULL),
(92, 'DVD player', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:56', NULL),
(93, 'Fax', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:21:26', NULL),
(94, 'iPod dock', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:21:51', NULL),
(95, 'Laptop safe', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:22:21', NULL),
(96, 'Flat-screen TV', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:22:49', NULL),
(97, 'Pay-per-view channels', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:23:14', NULL),
(98, 'Radio', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:23:41', NULL),
(99, 'Satellite channels', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:03', NULL),
(100, 'Telephone', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:32', NULL),
(101, 'TV', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:52', NULL),
(102, 'Video', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:07', NULL),
(103, 'Video games', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:26', NULL),
(104, 'Blu-ray player', '', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:53', NULL),
(105, 'Barbecue', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:27:02', NULL),
(108, 'Toaster', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:27:58', NULL),
(109, 'Electric kettle', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:28:26', NULL),
(110, 'Outdoor dining area', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:28:59', NULL),
(111, 'Outdoor furniture', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:29:24', NULL),
(112, 'Minibar', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:00', NULL),
(113, 'Kitchenette', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:30', NULL),
(114, 'Kitchenware', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:57', NULL),
(115, 'Microwave', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:31:20', NULL),
(116, 'Refrigerator', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:31:42', NULL),
(117, 'Tea/Coffee maker', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:05', NULL),
(118, 'Coffee machine', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:34', NULL),
(119, 'Children\'s high chair', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:49', NULL),
(121, 'View', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:33:52', NULL),
(122, 'Terrace', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:34:25', NULL),
(123, 'City view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:34:43', NULL),
(124, 'Garden view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:06', NULL),
(125, 'Lake view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:32', NULL),
(126, 'Landmark view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:59', NULL),
(127, 'Mountain view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:15', NULL),
(128, 'Pool view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:33', NULL),
(129, 'River view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:52', NULL),
(130, 'Sea view', '', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:37:22', NULL),
(131, 'Stovetop', '', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:50:58', NULL),
(132, 'Upper floors accessible by elevator', '', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:55:53', NULL),
(133, 'Upper floors accessible by stairs only', '', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:56:12', NULL),
(134, 'Toilet with grab rails', '', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:56:29', NULL),
(144, 'certain', '', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-15 06:22:34', NULL),
(157, 'internet', NULL, 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-21 08:47:14', '2022-08-02 08:27:41'),
(159, 'fridge, kitchenware', NULL, 30, 'kitchen facility', 'kitchen_facility', NULL, 1, '2022-06-21 10:49:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `H3_Services`
--

CREATE TABLE `H3_Services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_type_name` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H3_Services`
--

INSERT INTO `H3_Services` (`id`, `service_name`, `service_type_id`, `service_type_name`, `service_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Baby safety gates', 1, 'Entertainment_and_family_services', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-17 06:31:55'),
(2, 'Board games/puzzles', 1, 'Entertainment_and_family_services', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-17 06:31:59'),
(3, 'Books, DVDs, or music for children', 1, 'Entertainment_and_family_services', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-17 06:32:02'),
(4, 'Child safety socket covers', 1, 'Entertainment_and_family_services', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-17 06:32:06'),
(5, 'Executive lounge access', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:32:53'),
(6, 'Alarm clock', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:32:57'),
(7, 'Wake-up service', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:33:00'),
(8, 'Wake up service/Alarm clock', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:33:04'),
(9, 'Linen', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:33:08'),
(10, 'Towels', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:33:12'),
(11, 'Towels/sheets (extra fee) ', 2, 'Services_&_Extras', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-17 06:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `images` text NOT NULL,
  `heading` text NOT NULL,
  `subheading` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `images`, `heading`, `subheading`, `created_at`, `updated_at`) VALUES
(1, 'illis3.jpg', 'Make Your Trip Fun & Noted', 'Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel..', '2022-09-08 14:46:04', '2022-09-14 00:18:20'),
(2, '', 'Trending cities & Areas', 'Book flights to a destination popular with travelers from Pakistan', '2022-09-08 14:55:59', '2022-09-08 12:56:14'),
(3, 'hero2-image-group3.png', 'We\'re truely dedicated to make your travel experience best.', '<ul>\r\n<li><a href=\"#\"> Most Attractive Hotels</a></li>\r\n<li><a href=\"#\"> Guest Houses</a></li>\r\n<li><a href=\"#\"> Single space</a></li>\r\n<li><a href=\"#\"> Event spaces</a></li>\r\n</ul>', '2022-09-08 14:56:21', '2022-09-14 00:18:30'),
(4, '', 'Featured Listings', 'These are the most recent properties added, with featured listed firstworld-class-feature', '2022-09-08 14:57:15', '2022-09-08 12:57:30'),
(5, '', 'Famous Religious Tourism Places', 'The existence of a large number of temples, mosques, churches, Gurudwaras and monasteries in world beckons the traveler to visit that is tolerant, spiritual and most of all diverse yet united.', '2022-09-08 14:57:41', '2022-09-08 12:57:56'),
(6, '', 'Special Offers & Discount', 'Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.', '2022-09-08 14:58:07', '2022-09-08 13:14:56'),
(7, 'newslatter-bg2.png', 'Get 10% Off On <br> <span>Family & Group</span> Tour', ' Sign up to receive the best offers on promotion and coupons.', '2022-09-08 15:12:37', '2022-09-08 13:15:07'),
(8, 'offera.png', 'BEST PRICE GUARANTEED', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-09-09 07:30:26', '2022-09-09 05:30:59'),
(9, 'location.png', 'AMAZING DESTINATION', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-09-09 07:31:14', '2022-09-09 05:32:04'),
(10, 'headfone.png', 'PERSONAL SERVICES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-09-09 07:32:14', '2022-09-09 05:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_user_id` int(11) NOT NULL DEFAULT 0,
  `is_admin` int(11) NOT NULL DEFAULT 0 COMMENT '"1" =>Admin, "2"=>?, "3"=> Vendor',
  `hotel_name` varchar(255) NOT NULL,
  `hotel_content` text DEFAULT NULL,
  `property_contact_name` varchar(255) NOT NULL,
  `property_contact_num` varchar(255) NOT NULL,
  `property_alternate_num` varchar(255) DEFAULT NULL,
  `cat_listed_room_type` int(11) DEFAULT NULL,
  `where_property_listed` int(11) NOT NULL,
  `do_you_multiple_hotel` int(11) NOT NULL,
  `hotel_rating` int(11) NOT NULL,
  `user_rating` int(11) DEFAULT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `checkin_time` varchar(255) DEFAULT NULL,
  `checkout_time` varchar(255) DEFAULT NULL,
  `min_day_before_book` varchar(255) DEFAULT NULL,
  `min_day_stays` varchar(255) DEFAULT NULL,
  `hotel_video` varchar(255) DEFAULT NULL,
  `hotel_gallery` varchar(255) DEFAULT NULL,
  `hotel_document` varchar(255) DEFAULT NULL,
  `hotel_notes` text DEFAULT NULL,
  `booking_option` tinyint(2) DEFAULT 0 COMMENT '"1" =>Instant Booking, "2"=>Approval Booking ',
  `payment_mode` tinyint(4) NOT NULL DEFAULT 0 COMMENT '"0" =>Pay at Desk, "1"=>Full Payment, "2"=> Partial Payment ',
  `online_payment_percentage` varchar(255) DEFAULT NULL,
  `at_desk_payment_percentage` varchar(255) DEFAULT NULL,
  `cancellation_mode` tinyint(4) NOT NULL DEFAULT 0,
  `cancel_time_period` tinyint(4) DEFAULT NULL,
  `num_of_days_cancellation` int(11) DEFAULT NULL,
  `cancel_policy` text DEFAULT NULL,
  `min_hrs` int(11) DEFAULT NULL,
  `max_hrs` int(11) DEFAULT NULL,
  `min_hrs_percentage` int(11) DEFAULT NULL,
  `max_hrs_percentage` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `hotel_address` varchar(255) DEFAULT NULL,
  `hotel_latitude` varchar(255) DEFAULT NULL,
  `hotel_longitude` varchar(255) DEFAULT NULL,
  `hotel_city` varchar(255) DEFAULT NULL,
  `neighb_area` varchar(255) DEFAULT NULL,
  `hotel_country` varchar(255) DEFAULT NULL,
  `attraction_name` varchar(255) DEFAULT NULL,
  `attraction_content` text DEFAULT NULL,
  `attraction_distance` varchar(255) DEFAULT NULL,
  `attraction_type` varchar(255) DEFAULT NULL,
  `stay_price` int(55) DEFAULT NULL,
  `extra_price_name` varchar(255) DEFAULT NULL,
  `extra_price` varchar(255) DEFAULT NULL,
  `extra_price_type` varchar(255) DEFAULT NULL,
  `service_fee_name` varchar(255) DEFAULT NULL,
  `service_fee` varchar(255) DEFAULT NULL,
  `service_fee_type` varchar(255) DEFAULT NULL,
  `property_type` varchar(255) DEFAULT NULL,
  `parking_option` tinyint(4) NOT NULL DEFAULT 0 COMMENT '"0" =>No Parking, "1"=>Free Parking, "2"=> Paid Parking ',
  `parking_price` int(11) DEFAULT 0,
  `payment_interval` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `parking_reserv_need` tinyint(4) NOT NULL DEFAULT 0,
  `parking_locate` tinyint(4) NOT NULL DEFAULT 0,
  `parking_type` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast_availability` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast_price_inclusion` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast_cost` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `breakfast_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_contact_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_contact_num` int(11) DEFAULT NULL,
  `operator_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_booking_num` varchar(25) DEFAULT NULL,
  `hotel_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_user_id`, `is_admin`, `hotel_name`, `hotel_content`, `property_contact_name`, `property_contact_num`, `property_alternate_num`, `cat_listed_room_type`, `where_property_listed`, `do_you_multiple_hotel`, `hotel_rating`, `user_rating`, `scout_id`, `checkin_time`, `checkout_time`, `min_day_before_book`, `min_day_stays`, `hotel_video`, `hotel_gallery`, `hotel_document`, `hotel_notes`, `booking_option`, `payment_mode`, `online_payment_percentage`, `at_desk_payment_percentage`, `cancellation_mode`, `cancel_time_period`, `num_of_days_cancellation`, `cancel_policy`, `min_hrs`, `max_hrs`, `min_hrs_percentage`, `max_hrs_percentage`, `commission`, `hotel_address`, `hotel_latitude`, `hotel_longitude`, `hotel_city`, `neighb_area`, `hotel_country`, `attraction_name`, `attraction_content`, `attraction_distance`, `attraction_type`, `stay_price`, `extra_price_name`, `extra_price`, `extra_price_type`, `service_fee_name`, `service_fee`, `service_fee_type`, `property_type`, `parking_option`, `parking_price`, `payment_interval`, `parking_reserv_need`, `parking_locate`, `parking_type`, `breakfast_availability`, `breakfast_price_inclusion`, `breakfast_cost`, `breakfast_type`, `operator_name`, `operator_contact_name`, `operator_contact_num`, `operator_email`, `operator_booking_num`, `hotel_status`, `created_at`, `updated_at`) VALUES
(409, 934, 3, 'TJ', 'This is TJ hotel', 'Ayesha Zahid', '02145682652', NULL, NULL, 1, 1, 5, NULL, 557, '3:02 PM', '8:02 PM', '2', '3', '', 'pexels-pixabay-271624-hotelMainImg-1660125929.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 2, '40', '60', 0, NULL, NULL, 'wewsd', 48, 72, 20, 10, NULL, 'Liberty Chowk, Commercial Area Gulberg III, Lahore, Pakistan', '31.5106497', '74.34073769999999', 'Lahore', 'Gulberg III', '162', NULL, NULL, NULL, NULL, 25000, NULL, NULL, NULL, NULL, NULL, NULL, '4', 2, 500, '0', 1, 1, 1, 1, 0, NULL, 'null', 'ayesha', 'ayesha', 123456789, 'abc@gmail.com', '1234', 1, '2022-08-10 10:05:29', '2022-11-07 10:41:04'),
(458, 833, 1, 'Hotel Tulip Inn Gulberg', 'Situated within 29 km of Wagah Border and 500 m of Pace Shopping Mall, Hotel Tulip Inn, Gulberg features rooms with air conditioning and a private bathroom in Lahore. This 3-star hotel offers a 24-hour front desk, room service, security and free WiFi. The hotel has family rooms. The rooms in the hotel are fitted with a flat-screen TV and free toiletries. Hotel has a large dinning hall for Buffet Meals. Hotel Tulip Inn, Gulberg offers a continental or halal Buffet breakfast. Vogue Towers is 1.7 km from the accommodation, Liberty Market is 2 km, while Lahore Gymkhana is 3 km from the property. The nearest airport is Allama Iqbal International Airport, 5 km from Hotel Tulip Inn, Gulberg. We speak your language!', 'Afraz Khan', '923004008465', '923224008465', NULL, 0, 1, 3, NULL, 557, '12:00 AM', '2:00 PM', '1', '1', '', 'WhatsApp-Image-2021-04-27-at-2.46.10-PM-hotelMainImg-1660863765.jpeg', '', 'roadnstays.com will make payment after 07-Days of every guest check-out & roadnstays.com will be charged 15% on every guest reservation.', NULL, 0, NULL, NULL, 0, 3, NULL, 'sdfsdf', NULL, NULL, NULL, NULL, 20, 'MM Alam Road, Block B 1 Gulberg III, Lahore, Pakistan', '31.5129662', '74.3511007', 'Lahore', 'Gulberg III', '162', NULL, NULL, NULL, NULL, 1975, NULL, NULL, NULL, NULL, NULL, NULL, '12', 1, 100, '0', 0, 1, 1, 1, 1, NULL, 'null', 'Afraz Khan', 'Afraz Khan', 2147483647, 'roadnstays@yahoo.com', '2147483647', 1, '2022-08-18 23:02:45', '2022-11-08 06:12:08'),
(520, 834, 3, 'Hotel The Oriel', 'Hotel the oriel Islamabad features accommodations with a restaurant, free private parking, a garden and a terrace. Boasting a 24-hour front desk.', 'Rahim Jadoon', '3149369335', NULL, NULL, 1, 0, 4, NULL, 1115, '4:00 AM', '12:00 PM', '1', '1', '', 'Capture3-hotelMainImg-1661862875.jpg', '', NULL, 2, 1, '70', '30', 2, 1, NULL, '1) Free Cancellation before 48 hrs.\n2. 10% deducted if booking is cancelled at the less than 48 hrs.\n3. 10% deducted if booking is cancelled at the less than 24 hrs.', 24, 48, 30, 10, 5, 'Zia Balti & BBQ, G-7/1 G 7/1 G-7, Islamabad, Pakistan', '33.6989681', '73.064934', 'Islamabad', 'G-7', '99', NULL, NULL, NULL, NULL, 3850, NULL, NULL, NULL, NULL, NULL, NULL, '12', 1, NULL, '0', 0, 1, 0, 0, 0, NULL, 'null', 'shaikh op', 'abdulla', 942509544, 'abdul@gmail.com', '123456789', 1, '2022-08-30 12:34:35', '2022-10-29 06:08:40'),
(522, 1, 1, 'Hilton Hotel Bypass', 'Delux Room at Swat Hilton Hotel Bypass Mingora Swat', 'Raffiullah khan', '3440025026', NULL, NULL, 0, 0, 5, NULL, 557, '2:00 PM', '10:00 PM', '1', '2', '', 'Frront-side-2-1-hotelMainImg-1662289230.jpeg', '', '1) Partial payment policy. 2) venrooms share is 15%. 3) They don\'t digitally managed service, venrooms will manage the dashboard. 4) Contract Type: Digitally Management Only. CEX ID: 10022', 1, 2, '70', '30', 0, 3, NULL, 'xsdsd', 24, 72, 30, 10, NULL, 'Swat Garden Centre, General Bus Station, Bypass road, near Mingora, Mingora, Pakistan', '34.788096', '72.3447999', 'Swat', 'Mingora', '99', NULL, NULL, NULL, NULL, 9200, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 'null', 'shaikh op', 'Swayam', 2147483647, 'votivephp@gmail.com', '123456789', 1, '2022-09-04 11:00:30', '2022-10-01 06:44:41'),
(523, 1, 1, 'Season Inn', 'Season Inn Hotel, Pakistan', 'Husnain Ghazanfar', '3002154157', '02134110122', NULL, 0, 0, 4, NULL, 557, '12:00 PM', '12:00 AM', '5', '2', '', 'WhatsApp-Image-2021-12-19-at-3.58.13-PM-hotelMainImg-1662299815.jpeg', '', 'Terms & Conditions: 1) 15% will be charged by venrooms on bookings through venrooms. 2) You will get 70% booking payment by guest at the time of check-in/out. 3) Remaining 15% of your amount will be deposited by venrooms to you with in a week after check-out. CEX ID: 10004', 1, 1, NULL, NULL, 0, 3, NULL, 'Terms & Conditions: 1) 15% will be charged by venrooms on bookings through venrooms. 2) You will get 70% booking payment by guest at the time of check-in/out. 3) Remaining 15% of your amount will be deposited by venrooms to you with in a week after check-out. CEX ID: 10004', 24, 48, 30, 10, 5, 'C-17, Block-3, Railway Society, Model Colony, Karachi', '24.896751', '67.1805342', 'Karachi', 'Model Colony, Karachi', '162', NULL, NULL, NULL, NULL, 3500, NULL, NULL, NULL, NULL, NULL, NULL, '12', 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 'null', 'shaikh op', 'shaikh', 123456789, 'shaikh@gmail.com', '123456789', 1, '2022-09-04 13:56:55', '2022-10-01 06:43:58'),
(524, 1054, 3, 'Hotel Tulip Inn Faisal Town', 'Set in Lahore, 34 km from Wagah Border, Hotel Tulip Inn, Faisal Town offers accommodation with a restaurant, free private parking and a shared lounge. This 3-star hotel offers room service and a concierge service. The accommodation provides a 24-hour front desk, airport transfers, a shared kitchen and free WiFi throughout the property. The units at the hotel come with a seating area. At Hotel Tulip Inn, Faisal Town every room includes a wardrobe, a flat-screen TV and a private bathroom. Guests at the accommodation can enjoy a continental breakfast. Emporium Mall is 5 km from Hotel Tulip Inn, Faisal Town, while Gaddafi Stadium is 6 km away. The nearest airport is Allama Iqbal International Airport, 11 km from the hotel. Metro Bus station is 3 km away from hotel. Offering inclusive of Buffet Breakfast, welcome drinks, Dress Pressing, Dress washing, shoe shinning. We speak your language! Hotel Tulip Inn, Faisal Town is welcoming Venrooms.com\'s guests.', 'Afraz Khan', '3004008465', '3224008465', NULL, 1, 1, 5, NULL, 557, '12:00 AM', '12:00 PM', '1', '1', '', 'WhatsApp-Image-2021-05-08-at-10.45.42-PM-1-400x314-hotelMainImg-1662707800.jpeg', '', 'Venroom.com will charge 15% on guest reservations and make payment after 07-Days of guest check-out. after 6 months contract will be renewed with mutual understanding.', 1, 1, '20', '80', 0, NULL, NULL, 'sdfsdf', 48, 72, 20, 2, NULL, '9-B, Abdul Hassan Isfahani Road, Faisal Town, Lahore.', '31.4777169', '74.3086515', 'Lahore', 'Faisal Town', '162', NULL, NULL, NULL, NULL, 1995, NULL, NULL, NULL, NULL, NULL, NULL, '12', 1, NULL, '0', 0, 1, 1, 1, 1, NULL, 'null', 'Afraz', 'Afraz Khan', 2147483647, 'hoteltulipinn@yahoo.com', '55', 1, '2022-09-09 07:16:40', '2022-10-15 17:30:31'),
(655, 1266, 3, 'Bhurban Valley Guest House', 'Bhurban valley guest house in Murree provides accommodation with a garden and a terrace. Among the facilities of this property are a restaurant, a 24-hour front desk and room service, along with free WiFi. The hotel features family rooms.\n\nSelected rooms here will provide you with a kitchen with a dishwasher, a microwave and a fridge.\n\nThe nearest airport is Islamabad International Airport, 97 km from the hotel.\n\nCouples particularly like the location — they rated it 10 for a two-person trip.', 'Subhan Asghar', '03435435588', NULL, NULL, 0, 0, 2, NULL, 557, '12:00 PM', '12:00 PM', '5', '1', '', 'WhatsApp Image 2021-08-25 at 9.48.20 PM-hotelMainImg-1665914851.jpeg', '', NULL, 2, 2, '30', '70', 0, NULL, NULL, 'Guest can cancel prior 48h from the time of check-in', 48, 1, 1, 1, 10, 'Cadet College Bhurban, Murree, Pakistan', '33.9696623', '73.4602615', 'Rawalpindi', 'Kohsar Market', '162', NULL, NULL, NULL, NULL, 3000, NULL, NULL, NULL, NULL, NULL, NULL, '14', 1, NULL, '0', 0, 1, 1, 0, 0, NULL, 'null', 'Roman Ahmed', '03403003000', 2147483647, '99tajik@gmail.com', '1231', 1, '2022-10-16 15:37:31', '2022-10-17 11:13:53'),
(666, 1163, 1, 'abc1', 'content', 'abcd', '7412589874', '7412589874', NULL, 0, 0, 5, NULL, 557, '11:15 AM', '11:15 PM', '1', '1', '', 'pexels-fox-1082326-hotelMainImg-1667022448.jpg', '', 'Cancellation Policy', 1, 0, NULL, NULL, 0, NULL, NULL, 'Cancellation Policy', 1, 1, 1, 1, 100, 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Lahore', 'Walled City of Lahore', '162', NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, '4', 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 'null', 'Operator Name', 'Operator Contact Name', 2147483647, 'oe@gmail.com', '2147483647', 1, '2022-10-29 11:17:28', '2022-11-01 13:01:30'),
(667, 1163, 3, 'hotelTest', 'Hotel Content', 'abcde', '7411477895', '9874789584', NULL, 0, 0, 5, NULL, 557, '12:20 PM', '12:20 AM', '1', '1', '', 'pexels-cottonbro-3419692-hotelMainImg-1667199107.jpg', '', 'Hotel Notes', 1, 1, NULL, NULL, 0, NULL, NULL, 'Cancellation Policy', 1, 2, 1, 1, NULL, 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Lahore', 'Walled City of Lahore', '162', NULL, NULL, NULL, NULL, 1000, NULL, NULL, NULL, NULL, NULL, NULL, '4', 0, NULL, '0', 0, 0, 0, 0, 0, NULL, 'null', 'Operator Name', 'Operator Contact Name', 2147483647, 'oe@gmail.com', '9874562587', 1, '2022-10-31 12:21:47', '2022-11-29 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_amenities`
--

CREATE TABLE `hotel_amenities` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_amenities`
--

INSERT INTO `hotel_amenities` (`id`, `hotel_id`, `amenity_id`, `status`, `created_at`, `updated_at`) VALUES
(7622, 523, 74, 1, '2022-10-01 11:43:58', '2022-10-01 06:43:58'),
(7623, 523, 101, 1, '2022-10-01 11:43:58', '2022-10-01 06:43:58'),
(7624, 522, 46, 1, '2022-10-01 11:44:41', '2022-10-01 06:44:41'),
(7625, 522, 67, 1, '2022-10-01 11:44:41', '2022-10-01 06:44:41'),
(7626, 522, 101, 1, '2022-10-01 11:44:41', '2022-10-01 06:44:41'),
(7627, 522, 127, 1, '2022-10-01 11:44:41', '2022-10-01 06:44:41'),
(9804, 524, 48, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(9805, 524, 65, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(9806, 524, 101, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(9807, 524, 109, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(9808, 524, 122, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(9949, 655, 54, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(9950, 655, 62, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(9951, 655, 67, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(9952, 655, 96, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(9953, 655, 127, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(10709, 666, 47, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(10710, 666, 68, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(10711, 666, 89, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(10712, 666, 105, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(10713, 666, 121, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(10794, 409, 61, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10795, 409, 63, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10796, 409, 71, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10797, 409, 86, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10798, 409, 104, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10799, 409, 105, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10800, 409, 117, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10801, 409, 121, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10802, 409, 128, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(10827, 458, 49, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10828, 458, 67, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10829, 458, 99, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10830, 458, 100, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10831, 458, 101, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10832, 458, 110, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(10833, 458, 123, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(11354, 667, 47, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03'),
(11355, 667, 63, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03'),
(11356, 667, 82, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03'),
(11357, 667, 111, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03'),
(11358, 667, 124, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_attraction`
--

CREATE TABLE `hotel_attraction` (
  `attraction_id` int(11) NOT NULL,
  `attraction_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attraction_content` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attraction_distance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attraction_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attraction_hotel_id` int(11) NOT NULL,
  `attraction_status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_attraction`
--

INSERT INTO `hotel_attraction` (`attraction_id`, `attraction_name`, `attraction_content`, `attraction_distance`, `attraction_type`, `attraction_hotel_id`, `attraction_status`, `created_at`, `updated_at`) VALUES
(21, 'name 1', 'content 1', 'distance 1', 'type 1', 336, 1, '2022-07-28 09:54:42', '2022-07-28 09:54:42'),
(22, 'name 2', 'content 2', 'distance 2', 'type 2', 336, 1, '2022-07-28 09:54:42', '2022-07-28 09:54:42'),
(23, 'name 3', 'content 3', 'distance 3', 'type 3', 336, 1, '2022-07-28 09:54:42', '2022-07-28 09:54:42'),
(24, 'name 4', 'content 4', 'distance 4', 'type 4', 336, 1, '2022-07-28 09:54:42', '2022-07-28 09:54:42'),
(28, 'name 1', 'content 1', 'distance 1', 'type 1', 339, 1, '2022-07-28 09:58:09', '2022-07-28 09:58:09'),
(29, 'name 2', 'content 2', 'distance 2', 'type 2', 339, 1, '2022-07-28 09:58:09', '2022-07-28 09:58:09'),
(30, 'name 3', 'content 3', 'distance 3', 'type 3', 339, 1, '2022-07-28 09:58:09', '2022-07-28 09:58:09'),
(45, 'name 1', 'content 1', 'distance 1', 'type 1', 519, 1, '2022-08-26 09:30:28', '2022-08-26 09:30:28'),
(46, 'name 2', 'content 2', 'distance 2', 'type 2', 519, 1, '2022-08-26 09:30:28', '2022-08-26 09:30:28'),
(47, 'name 3', 'content 3', 'distance 3', 'type 3', 519, 1, '2022-08-26 09:30:28', '2022-08-26 09:30:28'),
(48, 'abc', 'pwrs', 'uvs', 'dsfaf', 533, 1, '2022-09-16 06:16:51', '2022-09-16 01:16:51'),
(49, 'abcd', '147258', 'pqrs', '741258', 534, 1, '2022-09-16 09:33:46', '2022-09-16 04:33:46'),
(50, 'pqpqpqp', '147258', 'uvw', '147852', 534, 1, '2022-09-16 09:33:46', '2022-09-16 04:33:46'),
(51, 'abcd', '1234', 'pqrs', '147', 535, 1, '2022-09-16 10:13:33', '2022-09-16 05:13:33'),
(52, 'uvw', '147', 'xyz', '147', 535, 1, '2022-09-16 10:13:33', '2022-09-16 05:13:33'),
(53, 'abc', '123456', 'def', '7896544', 537, 1, '2022-09-16 11:40:40', '2022-09-16 06:40:40'),
(54, 'uvw', '9874562', 'pqr', '741258', 537, 1, '2022-09-16 11:40:40', '2022-09-16 06:40:40'),
(55, 'abc', '123', 'def', '123', 538, 1, '2022-09-16 12:22:34', '2022-09-16 07:22:34'),
(56, 'pqr', '741', 'uvw', '147', 538, 1, '2022-09-16 12:22:34', '2022-09-16 07:22:34'),
(57, 'abcd', '1234', 'uvw', '7415', 539, 1, '2022-09-16 12:44:06', '2022-09-16 07:44:06'),
(58, 'abc', '123', 'pqr', '741', 540, 1, '2022-09-16 12:57:02', '2022-09-16 07:57:02'),
(59, 'uvw', '9874', 'ghi', '74', 540, 1, '2022-09-16 12:57:02', '2022-09-16 07:57:02'),
(60, 'abc', '1234', 'def', '48545645', 541, 1, '2022-09-19 05:33:01', '2022-09-19 00:33:01'),
(62, 'abcd', '245654', 'hkhkhkj', '98777', 542, 1, '2022-09-19 05:58:04', '2022-09-19 00:58:04'),
(63, 'abcd', '12345', 'uw', '77987', 543, 1, '2022-09-19 06:07:16', '2022-09-19 01:07:16'),
(65, 'abcd', '1234', '14', '565654', 544, 1, '2022-09-19 08:26:50', '2022-09-19 03:26:50'),
(66, 'aabcd', '9874456', 'ssafg', '655656564', 545, 1, '2022-09-19 08:31:02', '2022-09-19 03:31:02'),
(67, 'abcd', '1234', 'xyz', '147', 546, 1, '2022-09-19 09:59:53', '2022-09-19 04:59:53'),
(68, 'abcd', '1234', 'pqrs', '1472', 549, 1, '2022-09-20 10:38:20', '2022-09-20 05:38:20'),
(69, 'uvw', '147258', 'ghi', '564646', 549, 1, '2022-09-20 10:38:20', '2022-09-20 05:38:20'),
(70, 'abcde', '123456', 'uvwxyz', '741258', 550, 1, '2022-09-20 11:23:06', '2022-09-20 06:23:06'),
(72, 'abcde', '12345', 'uvwxyz', '4644', 551, 1, '2022-09-20 11:59:56', '2022-09-20 06:59:56'),
(73, 'abcd', '123456', 'uvw', '147258', 552, 1, '2022-09-20 12:47:06', '2022-09-20 07:47:06'),
(74, 'abcd', '1234', 'uvwx', '1478', 554, 1, '2022-09-20 14:52:21', '2022-09-20 09:52:21'),
(75, 'pqr', '1478', 'xyz', '147', 554, 1, '2022-09-20 14:52:21', '2022-09-20 09:52:21'),
(76, 'UVW', '147258', 'xyz', '147258', 555, 1, '2022-09-20 15:37:05', '2022-09-20 10:37:05'),
(79, 'abcd', '147', 'pqr', '9874', 556, 1, '2022-09-20 16:25:50', '2022-09-20 11:25:50'),
(80, 'abcd', '123456', 'uvwx', '1472588', 557, 1, '2022-09-20 18:10:32', '2022-09-20 13:10:32'),
(81, 'abcd', '1234', 'pqr', '14725', 558, 1, '2022-09-20 18:25:17', '2022-09-20 13:25:17'),
(82, 'abcd', '23456', 'pqrs', '98741', 559, 1, '2022-09-20 18:53:58', '2022-09-20 13:53:58'),
(83, 'uvw', '998742', 'vgdksggaf', '864849488947848489', 559, 1, '2022-09-20 18:53:58', '2022-09-20 13:53:58'),
(84, 'abc', '1234', 'uvw', '7412', 560, 1, '2022-09-21 10:22:04', '2022-09-21 05:22:04'),
(85, 'pqr', '987', 'uvw', '147', 560, 1, '2022-09-21 10:22:04', '2022-09-21 05:22:04'),
(87, 'abcd', '1234', 'uvw', '1234', 561, 1, '2022-09-21 11:21:52', '2022-09-21 06:21:52'),
(88, 'abcd', '123456', 'uvw', '7412588', 562, 1, '2022-09-21 12:11:07', '2022-09-21 07:11:07'),
(89, 'efg', '1478987', 'ghi', '411554', 562, 1, '2022-09-21 12:11:07', '2022-09-21 07:11:07'),
(90, 'abvd', '1478', 'pqrs', '656565', 563, 1, '2022-09-21 12:33:40', '2022-09-21 07:33:40'),
(91, 'abcd', '1234', 'pqrs', '1478', 564, 1, '2022-09-21 14:03:30', '2022-09-21 09:03:30'),
(92, 'uvw', '1478', 'xyz', '1447', 564, 1, '2022-09-21 14:03:30', '2022-09-21 09:03:30'),
(93, 'abcd', '1234', 'pqr', '1178', 565, 1, '2022-09-21 15:33:10', '2022-09-21 10:33:10'),
(94, 'uvw', '1478', 'ghi', '5454', 565, 1, '2022-09-21 15:33:10', '2022-09-21 10:33:10'),
(100, 'abcd', '1234', 'pqrs', '1478', 566, 1, '2022-09-21 16:31:13', '2022-09-21 11:31:13'),
(101, 'abcd', '123456', 'pqrs', '14789', 567, 1, '2022-09-21 18:22:28', '2022-09-21 13:22:28'),
(102, 'abcd', '1234', 'pqpq', '1111', 568, 1, '2022-09-22 10:23:22', '2022-09-22 05:23:22'),
(104, 'abcd', '1234', 'pqrs', '1484', 569, 1, '2022-09-22 11:59:30', '2022-09-22 06:59:30'),
(105, 'abcd', '123456', 'pqrs', '65464646', 570, 1, '2022-09-22 12:47:36', '2022-09-22 07:47:36'),
(108, 'abc', '1234', 'pqrs', '1474', 571, 1, '2022-09-22 15:53:01', '2022-09-22 10:53:01'),
(109, 'abcd', '1234', 'pqr', '1478', 572, 1, '2022-09-22 16:37:31', '2022-09-22 11:37:31'),
(110, 'abcd', '123456', 'pqrs', '7412588', 573, 1, '2022-09-22 17:06:43', '2022-09-22 12:06:43'),
(112, 'abc', '123', 'pqr', '147', 574, 1, '2022-09-22 18:15:13', '2022-09-22 13:15:13'),
(114, 'abcd', '1234', 'uvw', '1234', 575, 1, '2022-09-23 11:34:01', '2022-09-23 06:34:01'),
(116, 'abcd', '123456', 'pqrs', '1478', 576, 1, '2022-09-23 11:56:03', '2022-09-23 06:56:03'),
(117, 'abcd', '123456', 'pqrs', '7895', 578, 1, '2022-09-23 14:11:24', '2022-09-23 09:11:24'),
(118, 'abcd', '123456', 'pqr', '789664465', 579, 1, '2022-09-23 14:47:49', '2022-09-23 09:47:49'),
(119, 'abcd', '123456', 'pqrs', '987456', 580, 1, '2022-09-23 15:09:37', '2022-09-23 10:09:37'),
(122, 'abcd', '123456', 'pqrs', '78958', 581, 1, '2022-09-23 15:26:08', '2022-09-23 10:26:08'),
(123, 'abcd', '123456', 'pqrs', '444546', 582, 1, '2022-09-23 16:11:27', '2022-09-23 11:11:27'),
(127, 'abcd', '123456', 'pqrs', '741258', 583, 1, '2022-09-23 18:02:55', '2022-09-23 13:02:55'),
(129, 'abcd', '1478', 'uvwxyz', '99874562587', 584, 1, '2022-09-23 18:13:18', '2022-09-23 13:13:18'),
(130, 'abcd', '123456', 'uvw', '786544', 585, 1, '2022-09-24 11:35:56', '2022-09-24 06:35:56'),
(132, 'abd', '1478', 'uvw', '741258', 586, 1, '2022-09-24 12:22:08', '2022-09-24 07:22:08'),
(133, 'abcd', '123456', 'pqrs', '741258', 587, 1, '2022-09-24 15:35:37', '2022-09-24 10:35:37'),
(135, 'acdf', '4446', 'vvadfsf', '465465456', 588, 1, '2022-09-24 19:01:02', '2022-09-24 14:01:02'),
(136, 'ABCD', '1234', 'POQRS', '5646456', 589, 1, '2022-09-26 11:21:50', '2022-09-26 06:21:50'),
(137, 'abcd', '1234', 'pqr', '1477', 590, 1, '2022-09-26 11:43:51', '2022-09-26 06:43:51'),
(139, 'abd', '147', 'pr', '654564', 591, 1, '2022-09-26 12:42:12', '2022-09-26 07:42:12'),
(140, 'abc', '1234', 'pqr', '454564', 592, 1, '2022-09-26 12:56:50', '2022-09-26 07:56:50'),
(141, 'abcd', '1234', 'pqrs', '1478', 593, 1, '2022-09-26 13:46:21', '2022-09-26 08:46:21'),
(143, 'abcd', '14777', 'sfafas5644564', '4546', 594, 1, '2022-09-26 14:26:23', '2022-09-26 09:26:23'),
(144, 'abcd', '12344', 'pqr', '556456', 595, 1, '2022-09-26 15:37:13', '2022-09-26 10:37:13'),
(145, 'abcd', '1234', 'uvw', '7412588', 596, 1, '2022-09-26 15:54:59', '2022-09-26 10:54:59'),
(146, 'abc', 'pqr', '123', '147', 597, 1, '2022-09-26 17:34:06', '2022-09-26 12:34:06'),
(148, 'ABCD', '147', 'pqrs', '1478', 598, 1, '2022-09-26 18:08:54', '2022-09-26 13:08:54'),
(149, 'abcd', '1234', 'pqr', '987456', 599, 1, '2022-09-27 10:35:02', '2022-09-27 05:35:02'),
(150, 'uvw', 'jh', 'ugyjkgj', '564454', 599, 1, '2022-09-27 10:35:02', '2022-09-27 05:35:02'),
(152, 'ABCD', '123', 'uvw', '987456', 600, 1, '2022-09-27 11:13:23', '2022-09-27 06:13:23'),
(154, 'abcd', '1234', 'pqrs', '1478', 601, 1, '2022-09-27 12:50:19', '2022-09-27 07:50:19'),
(158, 'abcd', '1234', 'pqr', '4465', 603, 1, '2022-09-27 14:55:51', '2022-09-27 09:55:51'),
(161, 'abcd', '123456', 'uvwxyz', '5446', 602, 1, '2022-09-27 16:23:36', '2022-09-27 11:23:36'),
(163, 'abc', '1232', 'pqr', '54544', 604, 1, '2022-09-27 17:22:36', '2022-09-27 12:22:36'),
(168, 'abcd', '1234', 'pqrs', '4544', 605, 1, '2022-09-28 11:48:10', '2022-09-28 06:48:10'),
(170, 'abcd', '1234', 'pqrs6', '454564', 607, 1, '2022-09-28 11:55:59', '2022-09-28 06:55:59'),
(173, 'UVW', '12344', 'PQRS', '31321', 608, 1, '2022-09-28 12:56:51', '2022-09-28 07:56:51'),
(175, 'abcd', '123456', 'uvw', '56564564', 606, 1, '2022-09-28 13:45:58', '2022-09-28 08:45:58'),
(180, 'abcd', '1234', 'pqrs', '1478', 609, 1, '2022-09-28 14:26:33', '2022-09-28 09:26:33'),
(181, 'pqr', '178', 'uvw', '14778', 609, 1, '2022-09-28 14:26:33', '2022-09-28 09:26:33'),
(183, 'abcd', '1234', 'pqrs', '4789', 610, 1, '2022-09-28 15:32:07', '2022-09-28 10:32:07'),
(186, 'abcd', '1234', 'pqr', '1478', 611, 1, '2022-09-28 15:45:32', '2022-09-28 10:45:32'),
(188, 'abcd', '1234', 'pqrs', '1478', 612, 1, '2022-09-28 16:24:45', '2022-09-28 11:24:45'),
(196, 'abcd', '123456', 'pqrs', '14784', 613, 1, '2022-09-28 18:56:55', '2022-09-28 13:56:55'),
(199, 'abcd', '1234', 'pqr14', '18', 614, 1, '2022-09-29 11:34:51', '2022-09-29 06:34:51'),
(205, 'abcd', '1234', 'pqrs', '65564', 615, 1, '2022-09-29 12:19:39', '2022-09-29 07:19:39'),
(208, 'abcd', '12344', 'pqrs', '65456', 616, 1, '2022-09-29 12:32:08', '2022-09-29 07:32:08'),
(213, 'abc', '123', 'pqr', '1478', 617, 1, '2022-09-29 16:05:38', '2022-09-29 11:05:38'),
(216, 'abcd', '1234', 'pqrs', '1478', 618, 1, '2022-09-30 12:35:27', '2022-09-30 07:35:27'),
(221, 'ABCD', '1234', 'pqrs', '1478', 619, 1, '2022-09-30 14:41:15', '2022-09-30 09:41:15'),
(224, 'abcde', '1234', 'pqrst', '65454645', 620, 1, '2022-09-30 15:31:37', '2022-09-30 10:31:37'),
(229, 'abcabc', '123456', 'pqrs', '741258', 621, 1, '2022-09-30 16:29:59', '2022-09-30 11:29:59'),
(234, 'abcd', '123456', 'pqrs', '741258', 622, 1, '2022-10-01 11:24:25', '2022-10-01 06:24:25'),
(235, 'uvwx', '741258', 'xyz', '741258', 622, 1, '2022-10-01 11:24:25', '2022-10-01 06:24:25'),
(237, 'name 1', 'content 1', 'distance 1', 'type 1', 522, 1, '2022-10-01 11:44:42', '2022-10-01 06:44:42'),
(238, 'name 2', 'content 2', 'distance 2', 'type 2', 522, 1, '2022-10-01 11:44:42', '2022-10-01 06:44:42'),
(240, 'abcd', '1234', 'uvw', '12344652', 623, 1, '2022-10-01 12:19:03', '2022-10-01 07:19:03'),
(243, 'abcd', '1234', 'pqrs', '1478', 624, 1, '2022-10-01 17:31:29', '2022-10-01 12:31:29'),
(251, 'abcd', '1478', 'pqrs', '4454564', 625, 1, '2022-10-06 14:59:50', '2022-10-06 09:59:50'),
(256, 'bda', '165456', 'hghgj', '544556', 626, 1, '2022-10-06 16:11:32', '2022-10-06 11:11:32'),
(261, 'abcd', '1546', 'ddsf', '4644', 628, 1, '2022-10-06 18:42:02', '2022-10-06 13:42:02'),
(262, 'abcd', '1234', 'pqrs', '7415', 627, 1, '2022-10-06 18:42:39', '2022-10-06 13:42:39'),
(264, 'abcd', '1234', 'pqrs', '544465', 629, 1, '2022-10-07 10:34:06', '2022-10-07 05:34:06'),
(283, 'abcd', '12354', 'pqrs', '456464', 631, 1, '2022-10-07 15:10:21', '2022-10-07 10:10:21'),
(296, 'abcd', '1234', 'pqrs', '44744', 632, 1, '2022-10-10 10:29:25', '2022-10-10 05:29:25'),
(297, 'abcd', '12646', 'pqrs', '5645646', 630, 1, '2022-10-10 10:42:57', '2022-10-10 05:42:57'),
(300, 'abcd', '1234', 'pqrs', '1478', 633, 1, '2022-10-10 10:46:23', '2022-10-10 05:46:23'),
(301, 'uvw', '1478', 'vvvvv', '147', 633, 1, '2022-10-10 10:46:23', '2022-10-10 05:46:23'),
(305, 'ab', '1478', 'pq', '1478', 634, 1, '2022-10-10 12:08:59', '2022-10-10 07:08:59'),
(333, 'ABCD', '123456', 'pqrs', '741258', 637, 1, '2022-10-10 18:13:47', '2022-10-10 13:13:47'),
(337, 'abcd', '1234', 'pqrs', '1478', 636, 1, '2022-10-10 18:43:13', '2022-10-10 13:43:13'),
(338, 'abcd', '123456', 'pqrs', '465456', 638, 1, '2022-10-10 19:01:18', '2022-10-10 14:01:18'),
(339, 'uvw', '654444', 'hfhafha', '147852', 638, 1, '2022-10-10 19:01:18', '2022-10-10 14:01:18'),
(340, 'abcd', '1234', 'pqrs', '7412588', 635, 1, '2022-10-10 19:01:56', '2022-10-10 14:01:56'),
(389, 'ABCD', '1234', 'def', '1478', 640, 1, '2022-10-11 18:00:58', '2022-10-11 13:00:58'),
(390, 'abcd', '1478', 'pqrs', '645465', 639, 1, '2022-10-11 18:03:40', '2022-10-11 13:03:40'),
(396, 'abcd', '1478', 'pqrs', '54464', 641, 1, '2022-10-12 10:37:41', '2022-10-12 05:37:41'),
(420, 'abcd', '1234', 'pqrs', '1478', 642, 1, '2022-10-12 12:57:50', '2022-10-12 07:57:50'),
(452, 'abcd', '1234', 'pqrs', '741258', 644, 1, '2022-10-12 16:34:11', '2022-10-12 11:34:11'),
(454, 'abcd', '1478', 'pqrs', '1144', 643, 1, '2022-10-12 16:38:21', '2022-10-12 11:38:21'),
(457, 'ABCD', '1478', 'PQRS', '654564', 525, 1, '2022-10-12 17:11:11', '2022-10-12 12:11:11'),
(461, 'abcd', '1234', 'pqrs', '1478', 645, 1, '2022-10-12 17:47:46', '2022-10-12 12:47:46'),
(463, 'abd', '15546', 'pqrw', '465464', 646, 1, '2022-10-13 10:37:39', '2022-10-13 05:37:39'),
(534, 'abcd', '14789', 'psdf', '44454', 647, 1, '2022-10-14 11:19:00', '2022-10-14 06:19:00'),
(562, 'abcd', '1478', 'pqrs', '1478', 649, 1, '2022-10-14 14:25:41', '2022-10-14 09:25:41'),
(566, 'abcd', '1478', 'pdsas', '5154', 650, 1, '2022-10-14 15:18:20', '2022-10-14 10:18:20'),
(598, 'abcd', '1478', 'pqrs', '4566', 648, 1, '2022-10-14 17:57:44', '2022-10-14 12:57:44'),
(610, 'abcd', '1478', 'pqrs', '1478', 651, 1, '2022-10-14 18:59:50', '2022-10-14 13:59:50'),
(612, 'abcd', '1478', 'pqrs', '165', 652, 1, '2022-10-15 10:29:25', '2022-10-15 05:29:25'),
(640, 'abcd', '1478', 'pqrss', '145664', 653, 1, '2022-10-15 16:06:31', '2022-10-15 11:06:31'),
(668, 'abcd', '1478', 'pqrs', '147852', 654, 1, '2022-10-15 18:58:52', '2022-10-15 13:58:52'),
(686, 'abcd', '14778', 'fsafa', '78444', 656, 1, '2022-10-17 11:43:48', '2022-10-17 06:43:48'),
(688, 'abcd', '1478', 'psfsaa', '46544', 657, 1, '2022-10-17 11:47:22', '2022-10-17 06:47:22'),
(695, 'acdf', '147', 'pqrs', '1478', 658, 1, '2022-10-17 15:19:28', '2022-10-17 10:19:28'),
(703, 'abcd', '1478', 'pqrs', '21478', 659, 1, '2022-10-17 17:13:50', '2022-10-17 12:13:50'),
(752, 'abcd', '1234', 'pqrs', '1478', 663, 1, '2022-10-18 16:05:46', '2022-10-18 11:05:46'),
(755, 'abcd', '1479', 'dds', '654645', 662, 1, '2022-10-18 16:06:56', '2022-10-18 11:06:56'),
(756, 'xfsasdfsf', '46465654', 'jhjhhggh', '65645645', 662, 1, '2022-10-18 16:06:56', '2022-10-18 11:06:56'),
(757, 'abd', '1445', 'pr', '65464', 661, 1, '2022-10-18 16:09:11', '2022-10-18 11:09:11'),
(763, 'abcd', '14778', 'pre', '65465', 660, 1, '2022-10-18 18:57:02', '2022-10-18 13:57:02'),
(768, 'abcd', '1478', 'pqrew', '6544', 664, 1, '2022-10-19 10:54:56', '2022-10-19 05:54:56'),
(769, 'fda', '646', 'fshf', '465465', 664, 1, '2022-10-19 10:54:56', '2022-10-19 05:54:56'),
(782, 'abcd', '1478', 'ppfsafaf', '46554564', 665, 1, '2022-10-19 11:37:29', '2022-10-19 06:37:29'),
(783, 'fgddg', '64564646', 'fsafas', '654465', 665, 1, '2022-10-19 11:37:29', '2022-10-19 06:37:29'),
(833, 'abcd', '1234', 'pqrs', '1478', 670, 1, '2022-11-01 11:56:05', '2022-11-01 06:56:05'),
(836, 'abcd', '741', 'fffff', '8748', 671, 1, '2022-11-01 12:24:44', '2022-11-01 07:24:44'),
(838, 'abcd', '1478', 'pqrs', '1478', 666, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(840, 'abcd', '74145464', 'dsgdgdfgfdg', '465644', 672, 1, '2022-11-02 11:32:24', '2022-11-02 06:32:24'),
(847, 'abcd', '7414', 'uvwxyz', '7412588', 674, 1, '2022-11-04 12:53:41', '2022-11-04 07:53:41'),
(849, 'dsfsaaf', '6544456', 'hgajafdsa', '46546546', 675, 1, '2022-11-04 15:52:31', '2022-11-04 10:52:31'),
(855, 'abcd', '1477892587', 'pqrs', '7412589874', 669, 1, '2022-11-07 18:56:37', '2022-11-07 13:56:37'),
(858, 'adsfssfa', '4465', 'dsadsafsd', '4984654', 676, 1, '2022-11-09 17:19:57', '2022-11-09 12:19:57'),
(862, 'afsaafsaf', '464456', 'fsafasdf', '465456', 677, 1, '2022-11-10 11:05:56', '2022-11-10 06:05:56'),
(866, 'abcd', '1234', 'pqrs', '741258', 678, 1, '2022-11-10 11:55:16', '2022-11-10 06:55:16'),
(868, 'ffssfafs', '22', 'ghghf', '6564456', 679, 1, '2022-11-10 14:46:02', '2022-11-10 09:46:02'),
(877, 'sAaaD', '98744', 'SDAFASSFS', '49654', 680, 1, '2022-11-16 17:54:53', '2022-11-16 12:54:53'),
(878, 'abcd', '1234', 'pqrs', '1478', 681, 1, '2022-11-16 18:52:25', '2022-11-16 13:52:25'),
(883, 'abcd', '1478', 'pqrs', '54555564', 682, 1, '2022-11-17 12:00:48', '2022-11-17 07:00:48'),
(910, 'abcd', '1234', 'pqrs', '1478', 684, 1, '2022-11-23 16:06:53', '2022-11-23 11:06:53'),
(913, 'abcd', '1234', 'pqrs', '1478', 685, 1, '2022-11-24 10:57:19', '2022-11-24 05:57:19'),
(915, 'abcd', '1234', 'pqrs', '1478', 686, 1, '2022-11-24 11:03:50', '2022-11-24 06:03:50'),
(932, 'abcd', '1234', 'pqrs', '1478', 687, 1, '2022-11-26 13:47:31', '2022-11-26 08:47:31'),
(935, 'abcd', '1234', 'pqrs', '1478', 688, 1, '2022-11-26 13:53:33', '2022-11-26 08:53:33'),
(936, 'abcd', '1234', 'pqrs', '1478', 683, 1, '2022-11-26 14:14:19', '2022-11-26 09:14:19'),
(939, 'abcd', '1234', 'uvwxyz', '741258', 689, 1, '2022-11-26 17:44:46', '2022-11-26 12:44:46'),
(954, 'abcd', '1234', 'uvwxyz', '7412588', 690, 1, '2022-11-29 11:20:07', '2022-11-29 06:20:07'),
(956, 'ABCD', '1478', 'SSDADAD', '864465546', 668, 1, '2022-11-29 12:42:50', '2022-11-29 07:42:50'),
(960, 'abc', '1234', 'pqrs', '1478', 667, 1, '2022-11-29 18:28:04', '2022-11-29 13:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_extra_price`
--

CREATE TABLE `hotel_extra_price` (
  `id` int(11) NOT NULL,
  `ext_opt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ext_opt_price` int(11) NOT NULL,
  `ext_opt_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_extra_price`
--

INSERT INTO `hotel_extra_price` (`id`, `ext_opt_name`, `ext_opt_price`, `ext_opt_type`, `hotel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'airport pickup', 100, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(2, 'laundary', 101, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(3, 'sports', 1000, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(6, 'name1', 100, 'single_fee', 107, 1, '2022-06-22 04:57:43', '2022-06-22 04:57:43'),
(7, 'name2', 101, 'single_fee', 107, 1, '2022-06-22 04:57:43', '2022-06-22 04:57:43'),
(10, '4003_wxtra', 10, 'single_fee', 106, 1, '2022-06-24 13:32:35', '2022-06-24 13:32:35'),
(11, 'name1', 100, 'single_fee', 135, 1, '2022-06-27 09:34:25', '2022-06-27 09:34:25'),
(12, 'name2', 101, 'single_fee', 135, 1, '2022-06-27 09:34:25', '2022-06-27 09:34:25'),
(14, 'name1', 100, 'single_fee', 137, 1, '2022-06-27 09:54:11', '2022-06-27 09:54:11'),
(15, 'name1', 100, 'single_fee', 147, 1, '2022-06-29 06:44:34', '2022-06-29 06:44:34'),
(16, 'room ext opt 12', 101, 'per_night', 147, 1, '2022-06-29 06:44:34', '2022-06-29 06:44:34'),
(1065, 'abcd', 1478, 'single_fee', 666, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(1082, 'Extra bed', 500, 'single_fee', 409, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(1189, 'abcd', 1234, 'single_fee', 667, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallery`
--

CREATE TABLE `hotel_gallery` (
  `id` int(11) NOT NULL,
  `hotel_id` bigint(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_featured` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1=is_featured',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `hotel_id`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1151, 409, '1660125929_pexels-donald-tong-189296.jpg', 0, 1, '2022-08-10 10:05:29', '2022-08-10 10:05:29'),
(1152, 409, '1660125929_pexels-pixabay-164595.jpg', 0, 1, '2022-08-10 10:05:29', '2022-08-10 10:05:29'),
(1153, 409, '1660125929_pexels-pixabay-258154.jpg', 0, 1, '2022-08-10 10:05:29', '2022-08-10 10:05:29'),
(1154, 409, '1660125929_pexels-pixabay-271624.jpg', 0, 1, '2022-08-10 10:05:29', '2022-08-10 10:05:29'),
(1155, 409, '1660125929_pexels-pixabay-271639.jpg', 0, 1, '2022-08-10 10:05:29', '2022-08-10 10:05:29'),
(1467, 458, '1660863765_WhatsApp-Image-2021-04-27-at-2.44.49-PM-521x790.jpeg', 0, 1, '2022-08-18 23:02:45', '2022-08-18 23:02:45'),
(1468, 458, '1660863766_WhatsApp-Image-2021-04-27-at-2.45.08-PM-768x790.jpeg', 0, 1, '2022-08-18 23:02:46', '2022-08-18 23:02:46'),
(1469, 458, '1660863766_WhatsApp-Image-2021-04-27-at-2.45.13-PM.jpeg', 0, 1, '2022-08-18 23:02:46', '2022-08-18 23:02:46'),
(1470, 458, '1660863766_WhatsApp-Image-2021-04-27-at-2.46.05-PM.jpeg', 0, 1, '2022-08-18 23:02:46', '2022-08-18 23:02:46'),
(2004, 520, '1661862875_117429729_100532208436804_9034492744920206019_n.jpg', 0, 1, '2022-08-30 12:34:35', '2022-08-30 07:34:35'),
(2005, 520, '1661862875_201933477_306919721131384_5809094944436100577_n.jpg', 0, 1, '2022-08-30 12:34:35', '2022-08-30 07:34:35'),
(2006, 520, '1661862875_Capture.jpg', 0, 1, '2022-08-30 12:34:35', '2022-08-30 07:34:35'),
(2007, 520, '1661862875_Capture3.jpg', 0, 1, '2022-08-30 12:34:35', '2022-08-30 07:34:35'),
(2009, 522, '1662289230_Frront-side-2-1.jpeg', 0, 1, '2022-09-04 11:00:30', '2022-09-04 06:00:30'),
(2010, 522, '1662289230_Standard-Room.jpeg', 0, 1, '2022-09-04 11:00:30', '2022-09-04 06:00:30'),
(2011, 522, '1662289230_WhatsApp-Image-2021-10-20-at-3.50.09-AM.jpeg', 0, 1, '2022-09-04 11:00:30', '2022-09-04 06:00:30'),
(2012, 522, '1662289231_WhatsApp-Image-2021-10-20-at-3.50.11-AM.jpeg', 0, 1, '2022-09-04 11:00:31', '2022-09-04 06:00:31'),
(2013, 523, '1662299815_WhatsApp-Image-2021-12-19-at-3.58.12-PM.jpeg', 0, 1, '2022-09-04 13:56:55', '2022-09-04 08:56:55'),
(2014, 523, '1662299815_WhatsApp-Image-2021-12-19-at-3.58.13-PM.jpeg', 0, 1, '2022-09-04 13:56:55', '2022-09-04 08:56:55'),
(2015, 523, '1662299815_WhatsApp-Image-2021-12-19-at-3.58.21-PM.jpeg', 0, 1, '2022-09-04 13:56:55', '2022-09-04 08:56:55'),
(2017, 523, '1662299816_WhatsApp-Image-2021-12-19-at-3.58.25-PM.jpeg', 0, 1, '2022-09-04 13:56:56', '2022-09-04 08:56:56'),
(2018, 524, '1662707800_WhatsApp-Image-2021-05-08-at-10.45.42-PM-1-400x314.jpeg', 0, 1, '2022-09-09 07:16:40', '2022-09-09 02:16:40'),
(2019, 524, '1662707800_WhatsApp-Image-2021-05-08-at-10.45.48-PM-1-10.jpeg', 0, 1, '2022-09-09 07:16:40', '2022-09-09 02:16:40'),
(2020, 524, '1662707800_WhatsApp-Image-2021-05-08-at-10.45.48-PM-11.jpeg', 0, 1, '2022-09-09 07:16:40', '2022-09-09 02:16:40'),
(2021, 524, '1662707800_WhatsApp-Image-2021-05-08-at-10.45.50-PM-1-3.jpeg', 0, 1, '2022-09-09 07:16:40', '2022-09-09 02:16:40'),
(2425, 655, '1665914851_WhatsApp Image 2021-08-25 at 9.48.20 PM.jpeg', 0, 1, '2022-10-16 15:37:31', '2022-10-16 10:37:31'),
(2480, 666, '1667022448_pexels-wendy-wei-1699160.jpg', 0, 1, '2022-10-29 11:17:28', '2022-10-29 06:17:28'),
(2481, 666, '1667022449_pexels-wendy-wei-1916817.jpg', 0, 1, '2022-10-29 11:17:29', '2022-10-29 06:17:29'),
(2482, 666, '1667022449_pexels-wendy-wei-1916819.jpg', 0, 1, '2022-10-29 11:17:29', '2022-10-29 06:17:29'),
(2483, 666, '1667022449_pexels-wouter-de-jong-750895.jpg', 0, 1, '2022-10-29 11:17:29', '2022-10-29 06:17:29'),
(2484, 666, '1667022449_pexels-yasmine-qasem-2034435.jpg', 0, 1, '2022-10-29 11:17:29', '2022-10-29 06:17:29'),
(2486, 667, '1667199108_pexels-amelia-hallsworth-5461590.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2487, 667, '1667199108_pexels-amir-ghoorchiani-1183434.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2488, 667, '1667199108_pexels-andrea-piacquadio-755022.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2489, 667, '1667199108_pexels-ankit-10440693.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2490, 667, '1667199108_pexels-ankur-khandelwal-4851376.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2491, 667, '1667199108_pexels-aphotox-2261282.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2492, 667, '1667199108_pexels-arnie-chou-2355088.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48'),
(2493, 667, '1667199108_pexels-arthur-abdurashitov-1919077.jpg', 0, 1, '2022-10-31 12:21:48', '2022-10-31 07:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_services`
--

CREATE TABLE `hotel_services` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `hotel_id`, `hotel_service_id`, `status`, `created_at`, `updated_at`) VALUES
(2916, 524, 2, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(2917, 524, 7, 1, '2022-10-15 22:30:31', '2022-10-15 17:30:31'),
(2973, 655, 10, 1, '2022-10-17 16:13:53', '2022-10-17 11:13:53'),
(3251, 666, 3, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(3252, 666, 7, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(3279, 409, 2, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(3280, 409, 5, 1, '2022-11-07 15:41:04', '2022-11-07 10:41:04'),
(3288, 458, 2, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(3289, 458, 6, 1, '2022-11-08 11:12:08', '2022-11-08 06:12:08'),
(3495, 667, 1, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03'),
(3496, 667, 5, 1, '2022-11-29 18:28:03', '2022-11-29 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_service_fee`
--

CREATE TABLE `hotel_service_fee` (
  `id` int(11) NOT NULL,
  `serv_fee_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `serv_fee_price` int(11) NOT NULL,
  `serv_fee_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_service_fee`
--

INSERT INTO `hotel_service_fee` (`id`, `serv_fee_name`, `serv_fee_price`, `serv_fee_type`, `hotel_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'service1', 100, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(2, 'service2', 200, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(3, 'service3', 200, 'single_fee', 105, 1, '2022-06-21 12:59:28', '2022-06-21 12:59:28'),
(6, 'serv1', 100, 'single_fee', 107, 1, '2022-06-22 04:57:43', '2022-06-22 04:57:43'),
(7, 'serv2', 100, 'single_fee', 107, 1, '2022-06-22 04:57:43', '2022-06-22 04:57:43'),
(9, '4003_serv', 10, 'single_fee', 106, 1, '2022-06-24 13:32:35', '2022-06-24 13:32:35'),
(10, 'serv1', 100, 'single_fee', 135, 1, '2022-06-27 09:34:25', '2022-06-27 09:34:25'),
(11, 'serv2', 100, 'single_fee', 135, 1, '2022-06-27 09:34:25', '2022-06-27 09:34:25'),
(13, 'serv1', 100, 'single_fee', 137, 1, '2022-06-27 09:54:11', '2022-06-27 09:54:11'),
(14, 'serv1', 100, 'per_guest', 147, 1, '2022-06-29 06:44:34', '2022-06-29 06:44:34'),
(15, 'serv2', 100, 'per_night_per_guest', 147, 1, '2022-06-29 06:44:34', '2022-06-29 06:44:34'),
(863, 'pqrw', 46544, 'single_fee', 666, 1, '2022-11-01 18:01:31', '2022-11-01 13:01:31'),
(981, 'pqrs', 1478, 'single_fee', 667, 1, '2022-11-29 18:28:04', '2022-11-29 13:28:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_19_070355_create_admin_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(261, 'votivephp.rahulraj@gmail.com', 'ioXK0aORt8M8X7s6lWrkDO3q8k4xTxGhwgKuL9gUz1luqRmSMiG6WXJeX32ETM8o', '2022-09-02 07:10:01'),
(277, 'p@q', 'DPOdms9f0lmmyQ7qVfTxDlWp5nVsG4NHxtlT3Gh3S0r3cXU7wKgycec5fbH7e5yx', '2022-09-22 06:16:04'),
(281, 'u@v', 'w2YdS5l9RV8LAJyXiDUPzR3bvDFE2OSxq9EhFf1vq4jhG0Ci0gP1YLtyc5CdhLjC', '2022-09-23 06:23:08'),
(284, 'pp@qq', '49hyCtFv2sZf15TwdywDFXoZWJ7vkUl1QmazgndYRyBdgCbwlD2UPTd0adRnpJuA', '2022-09-24 06:20:16'),
(291, 'uv@pq', 'w2gBrRtdyigtxZor2QHj2EZZ4XWLFSP8Qqakq6BqrV1cwwEEyTve71zfPHFVLUvX', '2022-09-28 11:12:14'),
(298, 'pqrs@uvwx', 'Kym2NC92dqW6oSime0ItteFS6phBHvnYUxH0Ie4U6p3CbJU1jyyj8N8WhYFAyqV9', '2022-09-30 07:46:04'),
(308, 'ssnothinginlife@gmail.com', 'qHDqrirFTXskhfrevzmLzm1CKXvefaTlW7WZjrSyRi0YuIQrBtDzrRa0I2QNnUf4', '2022-10-07 09:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transaction`
--

CREATE TABLE `payment_transaction` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `txn_amount` float(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `booking_type` varchar(255) DEFAULT NULL,
  `txn_status` varchar(255) NOT NULL,
  `txn_date` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_transaction`
--

INSERT INTO `payment_transaction` (`id`, `booking_id`, `user_id`, `vendor_id`, `txn_id`, `txn_amount`, `payment_method`, `booking_type`, `txn_status`, `txn_date`, `created_at`, `updated_at`) VALUES
(722, 205, 1151, 934, '890351599944', 3800.00, 'ALFA', 'Space', 'successful', '2022-10-19 15:40:46', '2022-10-19 15:40:46', '2022-10-19 10:10:46'),
(723, 190, 1151, 934, '906212727585', 18000.00, 'ALFA', 'Tour', 'successful', '2022-10-19 16:07:10', '2022-10-19 16:07:10', '2022-10-19 10:37:10'),
(724, 288, 1151, 934, '909548178600', 2310.00, 'ALFA', 'Room', 'Paid', '2022-10-19 16:22:08', '2022-10-19 16:22:08', '2022-10-19 10:52:08'),
(725, 214, 1079, 934, '030614410060', 7800.00, 'ALFA', 'Space', 'successful', '2022-10-26 18:16:03', '2022-10-26 18:16:03', '2022-10-26 12:46:03'),
(726, 215, 1079, 1, '622131339741', 3800.00, 'ALFA', 'Space', 'successful', '2022-10-27 10:40:22', '2022-10-27 10:40:22', '2022-10-27 05:10:22'),
(727, 289, 1079, 934, '643898754766', 4310.00, 'ALFA', 'Room', 'Paid', '2022-10-27 11:16:35', '2022-10-27 11:16:35', '2022-10-27 05:46:35'),
(728, 290, 837, 1163, '384218617446', 31.00, 'ALFA', 'Room', 'Paid', '2022-10-29 11:37:15', '2022-10-29 11:37:15', '2022-10-29 06:07:15'),
(729, 191, 837, 1163, '425888793199', 1000.00, 'ALFA', 'Tour', 'successful', '2022-10-29 12:46:42', '2022-10-29 12:46:42', '2022-10-29 07:16:42'),
(730, 192, 1163, 1163, '432271662241', 1000.00, 'ALFA', 'Tour', 'successful', '2022-10-29 12:57:20', '2022-10-29 12:57:20', '2022-10-29 07:27:20'),
(731, 291, 1151, 1054, '463470113933', 2011.00, 'ALFA', 'Room', 'Paid', '2022-10-29 13:49:37', '2022-10-29 13:49:37', '2022-10-29 08:19:37'),
(732, 292, 1151, 1, '467950848558', 1991.00, 'ALFA', 'Room', 'Paid', '2022-10-29 13:56:49', '2022-10-29 13:56:49', '2022-10-29 08:26:49'),
(733, 293, 1151, 1, '471750626379', 3516.00, 'ALFA', 'Room', 'Paid', '2022-10-29 14:03:05', '2022-10-29 14:03:05', '2022-10-29 08:33:05'),
(734, 49, 837, 1163, '490389404362', 0.00, 'ALFA', 'Event', 'successful', '2022-10-29 14:34:11', '2022-10-29 14:34:11', '2022-10-29 09:04:11'),
(735, 50, 1163, 1163, '494252811598', 0.00, 'ALFA', 'Event', 'successful', '2022-10-29 14:40:37', '2022-10-29 14:40:37', '2022-10-29 09:10:37'),
(736, 216, 1163, 1163, '496766173239', 121.00, 'ALFA', 'Space', 'successful', '2022-10-29 14:44:47', '2022-10-29 14:44:47', '2022-10-29 09:14:47'),
(737, 193, 1163, 1163, '500790844477', 1.00, 'ALFA', 'Tour', 'successful', '2022-10-29 14:51:32', '2022-10-29 14:51:32', '2022-10-29 09:21:32'),
(738, 294, 1151, 1, '515800072910', 1991.00, 'ALFA', 'Room', 'Paid', '2022-10-29 15:16:32', '2022-10-29 15:16:32', '2022-10-29 09:46:32'),
(739, 295, 837, 1054, '526628627272', 2011.00, 'ALFA', 'Room', 'Paid', '2022-10-29 15:34:34', '2022-10-29 15:34:34', '2022-10-29 10:04:34'),
(740, 296, 837, 1163, '141997286024', 31.00, 'ALFA', 'Room', 'Paid', '2022-10-31 12:26:48', '2022-10-31 12:26:48', '2022-10-31 06:56:48'),
(741, 297, 1163, 1163, '156603623224', 301.00, 'ALFA', 'Room', 'Paid', '2022-10-31 12:51:09', '2022-10-31 12:51:09', '2022-10-31 07:21:09'),
(742, 194, 1163, 1163, '157595245329', 1.00, 'ALFA', 'Tour', 'successful', '2022-10-31 12:52:47', '2022-10-31 12:52:47', '2022-10-31 07:22:47'),
(743, 217, 1163, 1163, '158844408991', 121.00, 'ALFA', 'Space', 'successful', '2022-10-31 12:54:52', '2022-10-31 12:54:52', '2022-10-31 07:24:52'),
(744, 195, 837, 1163, '203330600382', 1.00, 'ALFA', 'Tour', 'successful', '2022-10-31 14:09:03', '2022-10-31 14:09:03', '2022-10-31 08:39:03'),
(745, 218, 837, 1163, '204747134592', 121.00, 'ALFA', 'Space', 'successful', '2022-10-31 14:11:23', '2022-10-31 14:11:23', '2022-10-31 08:41:23'),
(746, 196, 837, 1163, '016917730182', 1.00, 'ALFA', 'Tour', 'successful', '2022-11-01 12:45:05', '2022-11-01 12:45:05', '2022-11-01 07:15:05'),
(747, 219, 837, 1, '018593632914', 301.00, 'ALFA', 'Space', 'successful', '2022-11-01 12:47:46', '2022-11-01 12:47:46', '2022-11-01 07:17:46'),
(748, 197, 837, 1163, '126972976455', 1.00, 'ALFA', 'Tour', 'successful', '2022-11-01 15:48:27', '2022-11-01 15:48:27', '2022-11-01 10:18:27'),
(749, 319, 837, 1163, '808976983237', 31.00, 'ALFA', 'Room', 'Paid', '2022-11-02 10:45:06', '2022-11-02 10:45:06', '2022-11-02 05:15:06'),
(750, 198, 837, 1163, '811811324134', 1.00, 'ALFA', 'Tour', 'successful', '2022-11-02 10:49:47', '2022-11-02 10:49:47', '2022-11-02 05:19:47'),
(751, 220, 837, 1163, '812963469210', 31.00, 'ALFA', 'Space', 'successful', '2022-11-02 10:51:42', '2022-11-02 10:51:42', '2022-11-02 05:21:42'),
(752, 221, 837, 1163, '990582135293', 31.00, 'ALFA', 'Space', 'successful', '2022-11-02 15:47:47', '2022-11-02 15:47:47', '2022-11-02 10:17:47'),
(753, 51, 837, 1163, '991915607550', 1.00, 'ALFA', 'Event', 'successful', '2022-11-02 15:49:58', '2022-11-02 15:49:58', '2022-11-02 10:19:58'),
(754, 199, 837, 1163, '993274412718', 1.00, 'ALFA', 'Tour', 'successful', '2022-11-02 15:52:14', '2022-11-02 15:52:14', '2022-11-02 10:22:14'),
(755, 52, 837, 1163, '735375587364', 1.00, 'ALFA', 'Event', 'successful', '2022-11-03 12:29:05', '2022-11-03 12:29:05', '2022-11-03 06:59:05'),
(756, 222, 837, 1163, '737250243152', 121.00, 'ALFA', 'Space', 'successful', '2022-11-03 12:32:10', '2022-11-03 12:32:10', '2022-11-03 07:02:10'),
(757, 53, 837, 1163, '815349193485', 1.00, 'ALFA', 'Event', 'successful', '2022-11-03 14:42:23', '2022-11-03 14:42:23', '2022-11-03 09:12:23'),
(758, 223, 837, 1, '817754926814', 3800.00, 'ALFA', 'Space', 'successful', '2022-11-03 14:46:21', '2022-11-03 14:46:21', '2022-11-03 09:16:21'),
(759, 54, 837, 1163, '544462386143', 1.00, 'ALFA', 'Event', 'successful', '2022-11-04 10:57:39', '2022-11-04 10:57:39', '2022-11-04 05:27:39'),
(760, 224, 837, 1, '546135261184', 301.00, 'ALFA', 'Space', 'successful', '2022-11-04 11:00:26', '2022-11-04 11:00:26', '2022-11-04 05:30:26'),
(761, 326, 837, 1163, '666323002323', 31.00, 'ALFA', 'Room', 'Paid', '2022-11-04 14:20:46', '2022-11-04 14:20:46', '2022-11-04 08:50:46'),
(762, 55, 837, 1163, '668113630885', 1.00, 'ALFA', 'Event', 'successful', '2022-11-04 14:23:43', '2022-11-04 14:23:43', '2022-11-04 08:53:43'),
(763, 225, 837, 1163, '669656190154', 121.00, 'ALFA', 'Space', 'successful', '2022-11-04 14:26:18', '2022-11-04 14:26:18', '2022-11-04 08:56:18'),
(764, 200, 837, 1163, '673317538387', 3000.00, 'ALFA', 'Tour', 'successful', '2022-11-04 14:32:25', '2022-11-04 14:32:25', '2022-11-04 09:02:25'),
(765, 226, 837, 1, '546832530898', 301.00, 'ALFA', 'Space', 'successful', '2022-11-05 14:48:16', '2022-11-05 14:48:16', '2022-11-05 09:18:16'),
(766, 227, 837, 1163, '673897922925', 121.00, 'ALFA', 'Space', 'successful', '2022-11-05 18:20:02', '2022-11-05 18:20:02', '2022-11-05 12:50:02'),
(767, 56, 837, 1163, '192848952663', 1.00, 'ALFA', 'Event', 'successful', '2022-11-07 12:31:35', '2022-11-07 12:31:35', '2022-11-07 07:01:35'),
(768, 228, 837, 1163, '194259913234', 121.00, 'ALFA', 'Space', 'successful', '2022-11-07 12:33:54', '2022-11-07 12:33:54', '2022-11-07 07:03:54'),
(769, 57, 837, 1163, '000799591146', 1.00, 'ALFA', 'Event', 'successful', '2022-11-08 10:58:09', '2022-11-08 10:58:09', '2022-11-08 05:28:09'),
(770, 229, 837, 1, '002258946015', 301.00, 'ALFA', 'Space', 'successful', '2022-11-08 11:00:37', '2022-11-08 11:00:37', '2022-11-08 05:30:37'),
(771, 58, 837, 1163, '921525450984', 1.00, 'ALFA', 'Event', 'successful', '2022-11-09 12:32:41', '2022-11-09 12:32:41', '2022-11-09 07:02:41'),
(772, 230, 837, 1163, '923220435363', 121.00, 'ALFA', 'Space', 'successful', '2022-11-09 12:35:29', '2022-11-09 12:35:29', '2022-11-09 07:05:29'),
(773, 201, 837, 1163, '056828141644', 1.00, 'ALFA', 'Tour', 'successful', '2022-11-09 16:18:10', '2022-11-09 16:18:10', '2022-11-09 10:48:10'),
(774, 59, 837, 1163, '058121553514', 1.00, 'ALFA', 'Event', 'successful', '2022-11-09 16:20:19', '2022-11-09 16:20:19', '2022-11-09 10:50:19'),
(775, 231, 837, 1163, '059384873938', 121.00, 'ALFA', 'Space', 'successful', '2022-11-09 16:22:26', '2022-11-09 16:22:26', '2022-11-09 10:52:26'),
(776, 360, 1221, 934, '', 0.00, 'COD', 'Room', 'COD', '2022-11-29 14:23:37', '2022-11-29 14:23:37', '2022-11-29 08:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

CREATE TABLE `room_amenities` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_amenities`
--

INSERT INTO `room_amenities` (`id`, `room_id`, `amenity_id`, `status`, `created_at`, `updated_at`) VALUES
(413, 77, 36, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(414, 77, 23, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(415, 77, 20, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(416, 77, 11, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(417, 77, 13, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(418, 77, 14, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(419, 77, 17, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(420, 77, 19, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(421, 77, 151, 1, '2022-06-21 10:10:15', '2022-06-21 10:10:15'),
(1570, 191, 28, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1571, 191, 8, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1572, 191, 20, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1573, 191, 109, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1574, 191, 123, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1575, 191, 14, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1576, 191, 16, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1577, 191, 80, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1578, 191, 151, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(6317, 933, 39, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6318, 933, 60, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6319, 933, 62, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6320, 933, 144, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6321, 933, 63, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6322, 933, 71, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6323, 933, 73, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6324, 933, 26, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6325, 933, 101, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6326, 933, 108, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6327, 933, 116, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6328, 933, 124, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6329, 933, 132, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6330, 933, 75, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(6331, 927, 39, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6332, 927, 60, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6333, 927, 62, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6334, 927, 144, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6335, 927, 63, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6336, 927, 71, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6337, 927, 73, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6338, 927, 26, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6339, 927, 101, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6340, 927, 108, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6341, 927, 116, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6342, 927, 124, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6343, 927, 132, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6344, 927, 75, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(6524, 945, 36, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6525, 945, 68, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6526, 945, 24, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6527, 945, 111, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6528, 945, 119, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6529, 945, 124, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6530, 945, 134, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6531, 945, 17, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(6540, 946, 36, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6541, 946, 68, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6542, 946, 83, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6543, 946, 111, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6544, 946, 119, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6545, 946, 124, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6546, 946, 134, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6547, 946, 76, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(6763, 878, 39, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(6764, 878, 67, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(6765, 878, 108, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(6766, 878, 123, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(6768, 778, 68, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6769, 778, 83, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6770, 778, 111, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6771, 778, 119, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6772, 778, 124, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6773, 778, 134, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(6777, 874, 39, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6778, 874, 60, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6779, 874, 62, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6780, 874, 144, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6781, 874, 63, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6782, 874, 71, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6783, 874, 73, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6784, 874, 101, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6785, 874, 108, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6786, 874, 116, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6787, 874, 124, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(6788, 874, 132, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(7571, 1035, 46, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7572, 1035, 54, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7573, 1035, 67, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7574, 1035, 73, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7575, 1035, 68, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7576, 1035, 101, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7577, 1035, 122, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(7585, 1036, 46, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7586, 1036, 54, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7587, 1036, 67, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7588, 1036, 68, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7589, 1036, 73, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7590, 1036, 101, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7591, 1036, 122, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(7599, 1037, 46, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7600, 1037, 54, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7601, 1037, 67, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7602, 1037, 68, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7603, 1037, 73, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7604, 1037, 101, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7605, 1037, 122, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(7606, 1034, 46, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(7607, 1034, 62, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(7608, 1034, 67, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(7609, 1034, 101, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(7610, 1034, 122, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(7616, 1038, 46, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(7617, 1038, 62, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(7618, 1038, 67, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(7619, 1038, 101, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(7620, 1038, 122, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(7626, 1039, 46, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(7627, 1039, 62, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(7628, 1039, 67, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(7629, 1039, 101, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(7630, 1039, 122, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(7631, 1040, 46, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(7632, 1040, 101, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(7633, 1040, 127, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(7637, 1041, 46, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(7638, 1041, 101, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(7639, 1041, 127, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(7646, 1042, 46, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(7647, 1042, 101, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(7648, 1042, 127, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(7652, 1043, 46, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(7653, 1043, 101, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(7654, 1043, 127, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(7664, 1045, 46, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(7665, 1045, 101, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(7666, 1045, 127, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(7667, 1044, 46, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(7668, 1044, 101, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(7669, 1044, 127, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(7676, 1047, 46, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(7678, 1046, 46, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(7687, 1048, 46, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(7698, 1055, 46, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(7699, 1055, 101, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(7700, 1054, 46, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(7701, 1054, 101, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(7818, 1074, 44, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(7819, 1074, 63, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(7820, 1074, 82, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(7821, 1074, 105, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(7822, 1074, 126, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(9168, 1202, 44, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(9169, 1202, 63, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(9170, 1202, 87, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(9171, 1202, 105, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(9172, 1202, 121, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(9178, 1203, 44, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(9179, 1203, 63, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(9180, 1203, 87, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(9181, 1203, 105, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(9182, 1203, 121, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(10816, 1053, 64, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(10817, 1053, 87, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(10818, 1053, 108, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(10819, 1053, 124, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(10824, 1206, 63, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(10825, 1206, 86, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(10826, 1206, 110, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(10827, 1206, 121, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(10859, 1299, 55, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10860, 1299, 54, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10861, 1299, 62, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10862, 1299, 71, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10863, 1299, 101, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10864, 1299, 127, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(10869, 1300, 54, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(10870, 1300, 62, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(10871, 1300, 74, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(10872, 1300, 127, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(10873, 1301, 55, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10874, 1301, 62, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10875, 1301, 54, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10876, 1301, 47, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10877, 1301, 65, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10878, 1301, 73, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10879, 1301, 74, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10880, 1301, 63, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10881, 1301, 101, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10882, 1301, 127, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(10883, 1298, 54, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(10884, 1298, 55, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(10885, 1298, 62, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(10886, 1298, 67, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(10887, 1298, 101, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(10888, 1298, 127, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(11199, 1320, 47, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(11200, 1320, 67, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(11201, 1320, 82, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(11202, 1320, 112, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(11203, 1320, 124, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(11244, 1322, 47, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(11245, 1322, 67, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(11246, 1322, 82, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(11247, 1322, 112, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(11248, 1322, 124, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(11279, 1324, 47, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(11280, 1324, 67, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(11281, 1324, 82, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(11282, 1324, 112, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(11283, 1324, 124, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(11319, 1327, 47, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(11320, 1327, 63, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(11321, 1327, 87, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(11322, 1327, 110, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(11323, 1327, 122, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(11829, 1326, 47, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28'),
(11830, 1326, 63, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28'),
(11831, 1326, 87, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28'),
(11832, 1326, 110, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28'),
(11833, 1326, 122, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `room_bed_details`
--

CREATE TABLE `room_bed_details` (
  `id` int(11) NOT NULL,
  `bed_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bed_number` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_bed_details`
--

INSERT INTO `room_bed_details` (`id`, `bed_type`, `bed_number`, `room_id`, `status`, `created_at`, `updated_at`) VALUES
(160, 'Single bed', 2, 1055, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(161, 'Sofa', 2, 1055, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(162, 'Extra-Large double bed (Super - King size)', 1, 1054, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(163, 'Sofa', 1, 1054, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(164, 'Extra-Large double bed (Super - King size)', 1, 1056, 1, '2022-09-09 08:17:58', '2022-09-09 03:17:58'),
(165, 'Sofa', 2, 1056, 1, '2022-09-09 08:17:58', '2022-09-09 03:17:58'),
(170, 'Single bed', 1, 1064, 1, '2022-09-15 12:08:35', '2022-09-15 07:08:35'),
(171, 'Single bed', 2, 1064, 1, '2022-09-15 12:08:35', '2022-09-15 07:08:35'),
(174, 'Single bed', 147, 1067, 1, '2022-09-16 06:23:04', '2022-09-16 01:23:04'),
(181, 'Single bed', 147, 1070, 1, '2022-09-16 10:18:32', '2022-09-16 05:18:32'),
(182, 'Single bed', 147, 1070, 1, '2022-09-16 10:18:32', '2022-09-16 05:18:32'),
(190, 'Single bed', 14, 1074, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(191, 'Single bed', 50, 1074, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(192, 'Single bed', 14, 1074, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(203, 'Single bed', 147, 1077, 1, '2022-09-16 12:59:49', '2022-09-16 07:59:49'),
(204, 'Single bed', 10, 1078, 1, '2022-09-16 13:01:22', '2022-09-16 08:01:22'),
(205, 'Single bed', 5, 1078, 1, '2022-09-16 13:01:22', '2022-09-16 08:01:22'),
(206, 'Single bed', 147558, 1079, 1, '2022-09-19 05:00:35', '2022-09-19 00:00:35'),
(207, 'Single bed', 36987452, 1079, 1, '2022-09-19 05:00:35', '2022-09-19 00:00:35'),
(208, 'Single bed', 147165, 1080, 1, '2022-09-19 05:35:54', '2022-09-19 00:35:54'),
(213, 'Single bed', 12354, 1082, 1, '2022-09-19 06:00:55', '2022-09-19 01:00:55'),
(214, 'Single bed', 654564, 1082, 1, '2022-09-19 06:00:55', '2022-09-19 01:00:55'),
(222, 'Single bed', 1, 1087, 1, '2022-09-19 08:34:53', '2022-09-19 03:34:53'),
(243, 'Single bed', 147, 1094, 1, '2022-09-20 11:57:41', '2022-09-20 06:57:41'),
(244, 'Single bed', 1111, 1094, 1, '2022-09-20 11:57:41', '2022-09-20 06:57:41'),
(249, 'Single bed', 0, 1096, 1, '2022-09-20 12:49:13', '2022-09-20 07:49:13'),
(250, 'Single bed', 0, 1096, 1, '2022-09-20 12:49:13', '2022-09-20 07:49:13'),
(251, 'Single bed', 4774, 1100, 1, '2022-09-20 15:00:55', '2022-09-20 10:00:55'),
(252, 'Single bed', 741147, 1100, 1, '2022-09-20 15:00:55', '2022-09-20 10:00:55'),
(263, 'Single bed', 1, 1104, 1, '2022-09-20 18:13:41', '2022-09-20 13:13:41'),
(264, 'Double bed', 2, 1104, 1, '2022-09-20 18:13:41', '2022-09-20 13:13:41'),
(269, 'Single bed', 12345, 1105, 1, '2022-09-20 18:17:16', '2022-09-20 13:17:16'),
(270, 'Single bed', 147, 1105, 1, '2022-09-20 18:17:16', '2022-09-20 13:17:16'),
(274, 'Single bed', 0, 1109, 1, '2022-09-21 10:25:11', '2022-09-21 05:25:11'),
(275, 'Single bed', 0, 1109, 1, '2022-09-21 10:25:11', '2022-09-21 05:25:11'),
(276, 'Single bed', 0, 1111, 1, '2022-09-21 10:34:19', '2022-09-21 05:34:19'),
(277, 'Single bed', 0, 1111, 1, '2022-09-21 10:34:19', '2022-09-21 05:34:19'),
(278, 'Single bed', 147, 1112, 1, '2022-09-21 10:35:48', '2022-09-21 05:35:48'),
(279, 'Single bed', 147, 1112, 1, '2022-09-21 10:35:48', '2022-09-21 05:35:48'),
(281, 'Single bed', 123, 1114, 1, '2022-09-21 12:38:04', '2022-09-21 07:38:04'),
(282, 'Single bed', 147, 1114, 1, '2022-09-21 12:38:04', '2022-09-21 07:38:04'),
(283, 'Single bed', 1, 1116, 1, '2022-09-21 14:06:34', '2022-09-21 09:06:34'),
(284, 'Single bed', 2, 1116, 1, '2022-09-21 14:06:34', '2022-09-21 09:06:34'),
(289, 'Single bed', 1, 1118, 1, '2022-09-21 15:35:43', '2022-09-21 10:35:43'),
(290, 'Single bed', 2, 1118, 1, '2022-09-21 15:35:43', '2022-09-21 10:35:43'),
(293, 'Single bed', 0, 1120, 1, '2022-09-21 15:56:48', '2022-09-21 10:56:48'),
(300, 'Single bed', 1234, 1123, 1, '2022-09-21 18:26:59', '2022-09-21 13:26:59'),
(301, 'Single bed', 1234, 1124, 1, '2022-09-22 10:25:42', '2022-09-22 05:25:42'),
(304, 'Single bed', 133, 1126, 1, '2022-09-22 11:26:39', '2022-09-22 06:26:39'),
(307, 'Single bed', 1, 1129, 1, '2022-09-22 12:49:45', '2022-09-22 07:49:45'),
(308, 'Single bed', 2, 1129, 1, '2022-09-22 12:49:45', '2022-09-22 07:49:45'),
(309, 'Single bed', 1234, 1131, 1, '2022-09-22 15:49:25', '2022-09-22 10:49:25'),
(314, 'Single bed', 1, 1133, 1, '2022-09-22 17:10:00', '2022-09-22 12:10:00'),
(317, 'Single bed', 147, 1136, 1, '2022-09-22 18:11:52', '2022-09-22 13:11:52'),
(320, 'Single bed', 1478, 1138, 1, '2022-09-22 18:21:53', '2022-09-22 13:21:53'),
(323, 'Single bed', 123456, 1140, 1, '2022-09-23 11:31:54', '2022-09-23 06:31:54'),
(326, 'Single bed', 1234, 1142, 1, '2022-09-23 11:54:21', '2022-09-23 06:54:21'),
(327, 'Single bed', 12345, 1145, 1, '2022-09-23 13:53:32', '2022-09-23 08:53:32'),
(328, 'Single bed', 888789, 1145, 1, '2022-09-23 13:53:32', '2022-09-23 08:53:32'),
(333, 'Single bed', 1234, 1147, 1, '2022-09-23 14:13:50', '2022-09-23 09:13:50'),
(334, 'Single bed', 144, 1149, 1, '2022-09-23 15:23:47', '2022-09-23 10:23:47'),
(346, 'Single bed', 147, 1155, 1, '2022-09-24 11:39:37', '2022-09-24 06:39:37'),
(347, 'Single bed', 147, 1155, 1, '2022-09-24 11:39:37', '2022-09-24 06:39:37'),
(348, 'Single bed', 14785, 1157, 1, '2022-09-24 15:37:57', '2022-09-24 10:37:57'),
(349, 'Single bed', 14789, 1158, 1, '2022-09-24 15:39:28', '2022-09-24 10:39:28'),
(356, 'Single bed', 123, 1162, 1, '2022-09-26 12:17:38', '2022-09-26 07:17:38'),
(361, 'Single bed', 414, 1166, 1, '2022-09-26 13:49:33', '2022-09-26 08:49:33'),
(362, 'Single bed', 741, 1166, 1, '2022-09-26 13:49:33', '2022-09-26 08:49:33'),
(367, 'Single bed', 147, 1170, 1, '2022-09-26 14:24:21', '2022-09-26 09:24:21'),
(370, 'Single bed', 1234, 1173, 1, '2022-09-26 15:57:02', '2022-09-26 10:57:02'),
(373, 'Single bed', 147, 1175, 1, '2022-09-26 17:36:12', '2022-09-26 12:36:12'),
(374, 'Single bed', 2, 1175, 1, '2022-09-26 17:36:12', '2022-09-26 12:36:12'),
(376, 'Single bed', 1234, 1176, 1, '2022-09-26 17:38:25', '2022-09-26 12:38:25'),
(378, 'Single bed', 6446546, 1177, 1, '2022-09-26 17:50:50', '2022-09-26 12:50:50'),
(385, 'Single bed', 147, 1178, 1, '2022-09-26 18:27:03', '2022-09-26 13:27:03'),
(389, 'Single bed', 147, 1182, 1, '2022-09-27 11:07:38', '2022-09-27 06:07:38'),
(390, 'Single bed', 2, 1182, 1, '2022-09-27 11:07:38', '2022-09-27 06:07:38'),
(394, 'Single bed', 144, 1185, 1, '2022-09-27 12:48:27', '2022-09-27 07:48:27'),
(395, 'Double bed', 1474, 1185, 1, '2022-09-27 12:48:27', '2022-09-27 07:48:27'),
(398, 'Single bed', 1, 1187, 1, '2022-09-27 13:53:47', '2022-09-27 08:53:47'),
(402, 'Single bed', 144, 1190, 1, '2022-09-27 14:53:35', '2022-09-27 09:53:35'),
(403, 'Single bed', 1474, 1190, 1, '2022-09-27 14:53:35', '2022-09-27 09:53:35'),
(408, 'Single bed', 147, 1193, 1, '2022-09-27 17:20:20', '2022-09-27 12:20:20'),
(424, 'Single bed', 147, 1202, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(425, 'Single bed', 12345, 1203, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(436, 'Single bed', 147, 1208, 1, '2022-09-28 16:23:07', '2022-09-28 11:23:07'),
(447, 'Single bed', 1478, 1212, 1, '2022-09-28 18:25:26', '2022-09-28 13:25:26'),
(448, 'Single bed', 646465, 1214, 1, '2022-09-29 11:20:54', '2022-09-29 06:20:54'),
(464, 'Single bed', 4454, 1221, 1, '2022-09-29 12:29:44', '2022-09-29 07:29:44'),
(481, 'Single bed', 1478, 1228, 1, '2022-09-30 14:35:49', '2022-09-30 09:35:49'),
(484, 'Single bed', 1234, 1230, 1, '2022-09-30 15:29:18', '2022-09-30 10:29:18'),
(493, 'Single bed', 14788, 1235, 1, '2022-10-01 11:22:31', '2022-10-01 06:22:31'),
(496, 'Single bed', 147, 1237, 1, '2022-10-01 12:16:56', '2022-10-01 07:16:56'),
(500, 'Single bed', 147, 1239, 1, '2022-10-01 17:26:58', '2022-10-01 12:26:58'),
(511, 'Single bed', 12, 1242, 1, '2022-10-06 14:57:45', '2022-10-06 09:57:45'),
(521, 'Single bed', 1477, 1249, 1, '2022-10-06 17:09:40', '2022-10-06 12:09:40'),
(525, 'Single bed', 147, 1251, 1, '2022-10-06 17:51:13', '2022-10-06 12:51:13'),
(527, 'Single bed', 1478, 1252, 1, '2022-10-07 10:36:29', '2022-10-07 05:36:29'),
(528, 'Single bed', 1445664, 1253, 1, '2022-10-07 10:38:10', '2022-10-07 05:38:10'),
(529, 'Single bed', 544465, 1253, 1, '2022-10-07 10:38:10', '2022-10-07 05:38:10'),
(537, 'Single bed', 14788, 1254, 1, '2022-10-07 14:46:53', '2022-10-07 09:46:53'),
(544, 'Single bed', 2, 1057, 1, '2022-10-07 15:19:11', '2022-10-07 10:19:11'),
(545, 'Sofa', 2, 1057, 1, '2022-10-07 15:19:11', '2022-10-07 10:19:11'),
(549, 'Single bed', 1478, 1258, 1, '2022-10-07 17:23:15', '2022-10-07 12:23:15'),
(554, 'Single bed', 734544, 1256, 1, '2022-10-07 17:58:58', '2022-10-07 12:58:58'),
(557, 'Single bed', 445645, 1261, 1, '2022-10-10 10:48:25', '2022-10-10 05:48:25'),
(558, 'Single bed', 778777, 1261, 1, '2022-10-10 10:48:25', '2022-10-10 05:48:25'),
(560, 'Single bed', 14778, 1262, 1, '2022-10-10 10:49:34', '2022-10-10 05:49:34'),
(564, 'Single bed', 147, 1264, 1, '2022-10-10 11:14:43', '2022-10-10 06:14:43'),
(565, 'Single bed', 148, 1264, 1, '2022-10-10 11:14:43', '2022-10-10 06:14:43'),
(568, 'Single bed', 1478, 1265, 1, '2022-10-10 12:09:29', '2022-10-10 07:09:29'),
(573, 'Single bed', 1234, 1266, 1, '2022-10-10 14:01:38', '2022-10-10 09:01:38'),
(587, 'Single bed', 147, 1268, 1, '2022-10-10 17:18:56', '2022-10-10 12:18:56'),
(589, 'Single bed', 54446, 1270, 1, '2022-10-10 17:20:07', '2022-10-10 12:20:07'),
(590, 'Single bed', 147, 1271, 1, '2022-10-10 18:15:25', '2022-10-10 13:15:25'),
(593, 'Single bed', 147, 1273, 1, '2022-10-10 18:40:44', '2022-10-10 13:40:44'),
(597, 'Single bed', 654448, 1275, 1, '2022-10-11 10:38:01', '2022-10-11 05:38:01'),
(600, 'Single bed', 147, 1276, 1, '2022-10-11 10:39:50', '2022-10-11 05:39:50'),
(601, 'Single bed', 147, 1278, 1, '2022-10-11 12:46:53', '2022-10-11 07:46:53'),
(619, 'Single bed', 147, 1280, 1, '2022-10-11 17:59:39', '2022-10-11 12:59:39'),
(624, 'Single bed', 544, 1281, 1, '2022-10-12 10:38:09', '2022-10-12 05:38:09'),
(639, 'Single bed', 147, 1283, 1, '2022-10-12 12:44:28', '2022-10-12 07:44:28'),
(640, 'Single bed', 2, 1283, 1, '2022-10-12 12:44:28', '2022-10-12 07:44:28'),
(647, 'Single bed', 14778, 1284, 1, '2022-10-12 15:05:31', '2022-10-12 10:05:31'),
(651, 'Single bed', 1234, 1285, 1, '2022-10-12 16:23:29', '2022-10-12 11:23:29'),
(655, 'Single bed', 147, 1286, 1, '2022-10-12 17:28:11', '2022-10-12 12:28:11'),
(657, 'Single bed', 111, 1287, 1, '2022-10-13 10:40:01', '2022-10-13 05:40:01'),
(696, 'Single bed', 1234, 1290, 1, '2022-10-14 14:15:06', '2022-10-14 09:15:06'),
(704, 'Double bed', 12345, 1288, 1, '2022-10-14 17:51:40', '2022-10-14 12:51:40'),
(721, 'Single bed', 147, 1291, 1, '2022-10-15 15:47:52', '2022-10-15 10:47:52'),
(722, 'Single bed', 1474, 1291, 1, '2022-10-15 15:47:52', '2022-10-15 10:47:52'),
(723, 'Single bed', 144, 1294, 1, '2022-10-15 15:55:25', '2022-10-15 10:55:25'),
(725, 'Single bed', 147, 1295, 1, '2022-10-15 16:07:03', '2022-10-15 11:07:03'),
(726, 'Double bed', 2, 1053, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(728, 'Single bed', 147, 1206, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(729, 'Single bed', 147, 1296, 1, '2022-10-15 18:38:22', '2022-10-15 13:38:22'),
(730, 'Double bed', 1477, 1296, 1, '2022-10-15 18:38:22', '2022-10-15 13:38:22'),
(735, 'Single bed', 1234, 1297, 1, '2022-10-15 18:59:52', '2022-10-15 13:59:52'),
(736, 'Single bed', 147, 1297, 1, '2022-10-15 18:59:52', '2022-10-15 13:59:52'),
(738, 'Double bed', 1, 1299, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(741, 'Double bed', 1, 1300, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(742, 'Single bed', 1, 1300, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(743, 'Double bed', 2, 1301, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(744, 'Double bed', 1, 1298, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(756, 'Single bed', 6545646, 1302, 1, '2022-10-17 11:34:56', '2022-10-17 06:34:56'),
(761, 'Single bed', 147, 1304, 1, '2022-10-17 15:14:54', '2022-10-17 10:14:54'),
(762, 'Single bed', 1234, 1305, 1, '2022-10-17 15:16:18', '2022-10-17 10:16:18'),
(764, 'Single bed', 14782, 1307, 1, '2022-10-17 16:19:50', '2022-10-17 11:19:50'),
(773, 'Single bed', 147, 1308, 1, '2022-10-17 17:14:50', '2022-10-17 12:14:50'),
(774, 'Single bed', 1474, 1308, 1, '2022-10-17 17:14:50', '2022-10-17 12:14:50'),
(777, 'Single bed', 1234, 1309, 1, '2022-10-17 18:51:34', '2022-10-17 13:51:34'),
(778, 'Single bed', 147, 1309, 1, '2022-10-17 18:51:34', '2022-10-17 13:51:34'),
(785, 'Single bed', 147, 1311, 1, '2022-10-18 12:47:53', '2022-10-18 07:47:53'),
(786, 'Single bed', 2, 1311, 1, '2022-10-18 12:47:53', '2022-10-18 07:47:53'),
(790, 'Single bed', 464, 1313, 1, '2022-10-18 14:45:09', '2022-10-18 09:45:09'),
(791, 'Single bed', 6545, 1313, 1, '2022-10-18 14:45:09', '2022-10-18 09:45:09'),
(795, 'Single bed', 6544445, 1314, 1, '2022-10-18 16:03:57', '2022-10-18 11:03:57'),
(797, 'Single bed', 147, 1316, 1, '2022-10-18 16:05:19', '2022-10-18 11:05:19'),
(801, 'Single bed', 147, 1310, 1, '2022-10-18 18:52:09', '2022-10-18 13:52:09'),
(802, 'Single bed', 1478, 1317, 1, '2022-10-19 10:57:36', '2022-10-19 05:57:36'),
(803, 'Single bed', 1478, 1317, 1, '2022-10-19 10:57:36', '2022-10-19 05:57:36'),
(804, 'Single bed', 1478, 1318, 1, '2022-10-19 10:59:01', '2022-10-19 05:59:01'),
(807, 'Single bed', 147, 1319, 1, '2022-10-19 11:37:53', '2022-10-19 06:37:53'),
(808, 'Single bed', 1477, 1319, 1, '2022-10-19 11:37:53', '2022-10-19 06:37:53'),
(809, 'Single bed', 147, 1320, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(815, 'Single bed', 111, 1322, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(821, 'Single bed', 12345, 1324, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(828, 'Single bed', 147, 1328, 1, '2022-10-31 12:37:57', '2022-10-31 07:37:57'),
(829, 'Single bed', 1478, 1329, 1, '2022-10-31 14:27:27', '2022-10-31 09:27:27'),
(830, 'Single bed', 1477, 1330, 1, '2022-11-01 11:38:24', '2022-11-01 06:38:24'),
(831, 'Single bed', 1234, 1331, 1, '2022-11-02 11:34:04', '2022-11-02 06:34:04'),
(833, 'Single bed', 465454654, 1332, 1, '2022-11-03 15:39:13', '2022-11-03 10:39:13'),
(835, 'Single bed', 12345, 1333, 1, '2022-11-04 11:34:56', '2022-11-04 06:34:56'),
(837, 'Single bed', 1478, 1334, 1, '2022-11-04 11:45:57', '2022-11-04 06:45:57'),
(838, 'Single bed', 147, 1335, 1, '2022-11-07 12:25:53', '2022-11-07 07:25:53'),
(845, 'Single bed', 147, 1336, 1, '2022-11-09 17:20:35', '2022-11-09 12:20:35'),
(847, 'Single bed', 147, 1338, 1, '2022-11-09 18:13:35', '2022-11-09 13:13:35'),
(849, 'Single bed', 498489, 1339, 1, '2022-11-10 10:51:23', '2022-11-10 05:51:23'),
(853, 'Single bed', 147, 1340, 1, '2022-11-10 11:55:43', '2022-11-10 06:55:43'),
(854, 'Single bed', 147, 1341, 1, '2022-11-10 12:17:30', '2022-11-10 07:17:30'),
(856, 'Single bed', 147, 1342, 1, '2022-11-10 12:19:01', '2022-11-10 07:19:01'),
(862, 'Single bed', 147, 1343, 1, '2022-11-11 14:05:35', '2022-11-11 09:05:35'),
(864, 'Single bed', 147, 1346, 1, '2022-11-17 10:37:22', '2022-11-17 05:37:22'),
(866, 'Single bed', 147, 1347, 1, '2022-11-17 10:43:19', '2022-11-17 05:43:19'),
(868, 'Single bed', 147, 1348, 1, '2022-11-17 10:54:26', '2022-11-17 05:54:26'),
(874, 'Single bed', 147, 1349, 1, '2022-11-17 12:01:17', '2022-11-17 07:01:17'),
(880, 'Single bed', 147, 1350, 1, '2022-11-22 16:29:45', '2022-11-22 11:29:45'),
(904, 'Single bed', 147, 1351, 1, '2022-11-26 14:14:55', '2022-11-26 09:14:55'),
(909, 'Single bed', 12345, 1356, 1, '2022-11-28 18:16:55', '2022-11-28 13:16:55'),
(913, 'Double bed', 12345, 1326, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_request`
--

CREATE TABLE `room_booking_request` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `request_status` int(11) DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `invoice_num` varchar(255) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL,
  `discount_name` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `earlybird_discount` int(11) DEFAULT NULL,
  `expense_name` varchar(255) DEFAULT NULL,
  `expense_value` int(11) DEFAULT NULL,
  `cleaning_fee` double(10,2) DEFAULT NULL,
  `city_fee` double(10,2) DEFAULT NULL,
  `tax_percentage` double(10,2) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room_booking_request`
--

INSERT INTO `room_booking_request` (`id`, `hotel_id`, `room_id`, `user_id`, `person`, `request_status`, `approve_status`, `payment_status`, `invoice_num`, `check_in_date`, `check_out_date`, `total_days`, `total_room`, `total_member`, `discount_name`, `discount`, `earlybird_discount`, `expense_name`, `expense_value`, `cleaning_fee`, `city_fee`, `tax_percentage`, `total_amount`, `created_at`, `updated_at`) VALUES
(14, 520, 1034, 1151, NULL, 1, 0, 0, NULL, '2022-10-28', '2022-10-29', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 4950.00, '2022-10-28 18:03:58', '0000-00-00 00:00:00'),
(17, 655, 1298, 1151, NULL, 1, 1, 0, 'INV43456', '2022-12-01', '2022-12-02', 1, 1, 1, 'WW', 33, NULL, 'QQ', 243, 0.00, 0.00, 16.00, 3416.00, '2022-11-03 14:31:17', '2022-11-03 12:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `room_custom_price`
--

CREATE TABLE `room_custom_price` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `price_start_date` date NOT NULL,
  `price_end_date` date NOT NULL,
  `new_price` double NOT NULL,
  `extra_price` double DEFAULT NULL,
  `price_per_night_7d` double DEFAULT NULL,
  `price_per_night_30d` double DEFAULT NULL,
  `price_per_weekend` double DEFAULT NULL,
  `min_day_of_booking` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_custom_price`
--

INSERT INTO `room_custom_price` (`id`, `hotel_id`, `room_id`, `price_start_date`, `price_end_date`, `new_price`, `extra_price`, `price_per_night_7d`, `price_per_night_30d`, `price_per_weekend`, `min_day_of_booking`, `status`, `created_at`, `update_at`) VALUES
(3, 118, 393, '2022-08-24', '2022-08-27', 2000, 500, 3200, 12000, 2500, 2, 1, '0000-00-00 00:00:00', '2022-08-19 09:55:31'),
(4, 118, 393, '2022-08-20', '2022-08-21', 3000, 600, 3500, 15000, 5000, 2, 1, '0000-00-00 00:00:00', '2022-08-19 12:31:14'),
(5, 458, 878, '2022-08-20', '2022-08-21', 1500, 200, 200, 45620, 5454, 1, 1, '0000-00-00 00:00:00', '2022-08-19 12:55:52'),
(6, 458, 878, '2022-08-22', '2022-08-25', 855, NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00 00:00:00', '2022-08-19 13:20:04'),
(9, 533, 1068, '2022-09-15', '2022-09-15', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-16 06:25:30'),
(10, 525, 1069, '2022-09-16', '2022-09-16', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-16 09:41:04'),
(11, 535, 1071, '2022-09-16', '2022-09-16', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-16 10:23:40'),
(12, 540, 1079, '2022-09-19', '2022-09-19', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-19 05:01:17'),
(13, 541, 1081, '2022-09-19', '2022-09-19', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-19 05:37:30'),
(14, 409, 1086, '2022-09-19', '2022-09-19', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-19 07:00:11'),
(15, 549, 1090, '2022-09-20', '2022-09-20', 1000, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-20 05:14:53'),
(16, 553, 1099, '2022-09-20', '2022-09-20', 10, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-20 08:49:29'),
(17, 409, 1102, '2022-09-20', '2022-09-20', 100, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-20 10:11:19'),
(18, 560, 1110, '2022-09-21', '2022-09-21', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-21 04:57:12'),
(19, 565, 1119, '2022-09-21', '2022-09-21', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-21 10:07:26'),
(20, 523, 1048, '2022-05-14', '2022-06-09', 2000, 0, 3200, 15000, 2500, 2, 1, '0000-00-00 00:00:00', '2022-09-21 11:49:47'),
(21, 568, 1125, '2022-09-22', '2022-09-22', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-22 04:57:21'),
(22, 573, 1134, '2022-09-25', '2022-09-30', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-22 11:41:44'),
(23, 574, 1139, '2022-09-22', '2022-09-25', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-22 12:54:20'),
(24, 577, 1146, '2022-09-25', '2022-09-25', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-23 08:25:48'),
(25, 585, 1156, '2022-09-25', '2022-09-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-24 06:12:06'),
(26, 587, 1159, '2022-09-24', '2022-09-24', 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-24 12:56:35'),
(27, 587, 1158, '2022-09-26', '2022-09-29', 2000, 500, 3200, 12000, 2500, 2, 1, '0000-00-00 00:00:00', '2022-09-24 12:57:58'),
(28, 587, 1160, '2022-09-26', '2022-09-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-26 05:48:22'),
(29, 590, 1165, '2022-09-26', '2022-09-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-26 06:57:32'),
(30, 593, 1167, '2022-09-26', '2022-09-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-26 08:22:02'),
(31, 594, 1170, '2022-09-26', '2022-09-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-26 09:33:17'),
(32, 599, 1181, '2022-09-27', '2022-09-27', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-27 05:11:48'),
(33, 599, 1184, '2022-09-27', '2022-09-27', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-27 06:39:59'),
(34, 602, 1188, '2022-09-27', '2022-09-27', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-27 08:25:44'),
(35, 409, 1053, '2022-10-04', '2022-10-08', 2000, 232, 3500, 15000, 2500, 2, 1, '0000-00-00 00:00:00', '2022-09-27 08:29:03'),
(36, 602, 1189, '2022-09-27', '2022-09-27', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-27 08:49:30'),
(37, 602, 1195, '2022-09-27', '2022-09-27', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-27 12:12:01'),
(38, 606, 1199, '2022-09-28', '2022-09-28', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-28 06:01:33'),
(39, 615, 1218, '2022-09-29', '2022-09-29', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-29 06:17:02'),
(40, 615, 1219, '2022-09-29', '2022-09-29', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-29 06:21:58'),
(41, 615, 1220, '2022-09-29', '2022-09-29', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-29 06:47:36'),
(42, 616, 1222, '2022-09-29', '2022-09-29', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-29 07:01:08'),
(43, 618, 1226, '2022-09-30', '2022-09-30', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-30 05:18:52'),
(44, 619, 1229, '2022-09-30', '2022-09-30', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-30 09:07:13'),
(45, 620, 1231, '2022-09-30', '2022-09-30', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-09-30 10:00:41'),
(46, 626, 1245, '2022-10-06', '2022-10-06', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-06 10:12:04'),
(47, 630, 1260, '2022-10-10', '2022-10-10', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-10 05:01:34'),
(48, 637, 1272, '2022-10-10', '2022-10-10', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-10 12:46:43'),
(49, 637, 1272, '2022-10-10', '2022-10-10', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-10 12:46:43'),
(50, 639, 1276, '2022-10-11', '2022-10-11', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-11 05:09:15'),
(51, 640, 1280, '2022-10-11', '2022-10-11', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-11 08:41:51'),
(52, 647, 1288, '2022-10-14', '2022-10-14', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-14 05:24:04'),
(53, 653, 1293, '2022-10-15', '2022-10-15', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-15 08:38:18'),
(54, 653, 1294, '2022-10-15', '2022-10-15', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-15 10:25:44'),
(55, 659, 1308, '2022-10-17', '2022-10-17', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-17 10:57:13'),
(56, 659, 1308, '2022-10-17', '2022-10-17', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-17 11:44:16'),
(57, 660, 1310, '2022-10-18', '2022-10-18', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-18 04:39:57'),
(58, 663, 1315, '2022-10-18', '2022-10-18', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-18 09:55:03'),
(59, 666, 1324, '2022-10-29', '2022-10-29', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-29 09:50:32'),
(60, 668, 1329, '2022-10-31', '2022-10-31', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-10-31 08:57:51'),
(61, 674, 1333, '2022-11-04', '2022-11-04', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-04 06:05:13'),
(62, 676, 1336, '2022-11-07', '2022-11-07', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-07 07:23:14'),
(63, 676, 1336, '2022-11-09', '2022-11-09', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-09 11:50:20'),
(64, 679, 1342, '2022-11-10', '2022-11-10', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-10 06:48:36'),
(65, 680, 1343, '2022-11-11', '2022-11-11', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-11 08:23:44'),
(66, 681, 1346, '2022-11-17', '2022-11-17', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-17 05:06:35'),
(67, 682, 1348, '2022-11-17', '2022-11-17', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-17 05:24:02'),
(68, 685, 1352, '2022-11-23', '2022-11-23', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-23 10:42:38'),
(69, 687, 1354, '2022-11-24', '2022-11-24', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-24 05:42:03'),
(70, 687, 1354, '2022-11-25', '2022-11-25', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-25 05:14:39'),
(71, 687, 1356, '2022-11-25', '2022-11-25', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-25 08:32:13'),
(72, 687, 1356, '2022-11-26', '2022-11-26', 1, 1, 700, 3000, 1, 1, 1, '0000-00-00 00:00:00', '2022-11-26 08:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `room_extra_option`
--

CREATE TABLE `room_extra_option` (
  `id` int(11) NOT NULL,
  `ext_opt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ext_opt_price` int(11) NOT NULL,
  `ext_opt_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_extra_option`
--

INSERT INTO `room_extra_option` (`id`, `ext_opt_name`, `ext_opt_price`, `ext_opt_type`, `room_id`, `status`, `created_at`, `updated_at`) VALUES
(136, 'Extra bed', 500, 'per_night_per_guest', 778, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(176, 'abcd', 1234, 'single_fee', 1074, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(177, 'pqrs', 9874, 'single_fee', 1074, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(480, 'abcd', 100, 'single_fee', 1202, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(481, 'pqrs', 10, 'single_fee', 1202, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(482, 'abcd', 123456, 'single_fee', 1203, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(813, 'Extra bed', 500, 'single_fee', 1053, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(816, 'abcd', 1478, 'single_fee', 1206, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(817, 'pqr', 4447, 'single_fee', 1206, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(888, 'abcd', 1477, 'single_fee', 1320, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(894, 'abcd', 1478, 'single_fee', 1322, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(900, 'abcd', 1234, 'single_fee', 1324, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(993, 'abcd', 1478, 'single_fee', 1326, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`id`, `room_id`, `feature_id`, `status`, `created_at`, `updated_at`) VALUES
(196, 191, 5, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(790, 933, 3, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(791, 927, 3, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(818, 945, 5, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(820, 946, 5, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(865, 878, 3, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(867, 778, 5, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(871, 874, 3, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(947, 998, 2, 1, '2022-08-25 08:53:34', '2022-08-25 08:53:34'),
(1046, 1035, 4, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1047, 1035, 29, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1048, 1035, 28, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1049, 1035, 17, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1050, 1035, 23, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1051, 1035, 1, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(1058, 1036, 1, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1059, 1036, 4, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1060, 1036, 17, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1061, 1036, 23, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1062, 1036, 28, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1063, 1036, 29, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(1070, 1037, 1, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1071, 1037, 4, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1072, 1037, 17, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1073, 1037, 23, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1074, 1037, 28, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1075, 1037, 29, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(1076, 1034, 4, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(1077, 1034, 23, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(1080, 1038, 4, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(1081, 1038, 23, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(1084, 1039, 1, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1085, 1039, 4, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1086, 1039, 7, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1087, 1039, 8, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1088, 1039, 13, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1089, 1039, 16, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1090, 1039, 12, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1091, 1039, 29, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1092, 1039, 28, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1093, 1039, 26, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1094, 1039, 25, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1095, 1039, 19, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1096, 1039, 20, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1097, 1039, 18, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1098, 1039, 15, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1099, 1039, 17, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1100, 1039, 23, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1101, 1039, 27, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1102, 1039, 10, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1103, 1040, 1, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1104, 1040, 3, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1105, 1040, 4, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1106, 1040, 2, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1107, 1040, 8, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1108, 1040, 7, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1109, 1040, 10, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1110, 1040, 12, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1111, 1040, 13, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1112, 1040, 17, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1113, 1040, 16, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1114, 1040, 18, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1115, 1040, 19, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1116, 1040, 23, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1117, 1040, 26, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1118, 1040, 27, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1119, 1040, 28, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1120, 1040, 29, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1139, 1041, 1, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1140, 1041, 2, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1141, 1041, 3, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1142, 1041, 4, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1143, 1041, 7, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1144, 1041, 8, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1145, 1041, 10, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1146, 1041, 12, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1147, 1041, 13, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1148, 1041, 16, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1149, 1041, 17, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1150, 1041, 18, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1151, 1041, 19, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1152, 1041, 23, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1153, 1041, 26, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1154, 1041, 27, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1155, 1041, 28, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1156, 1041, 29, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(1193, 1042, 1, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1194, 1042, 2, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1195, 1042, 3, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1196, 1042, 4, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1197, 1042, 7, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1198, 1042, 8, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1199, 1042, 10, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1200, 1042, 12, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1201, 1042, 13, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1202, 1042, 16, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1203, 1042, 17, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1204, 1042, 18, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1205, 1042, 19, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1206, 1042, 23, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1207, 1042, 26, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1208, 1042, 27, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1209, 1042, 28, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1210, 1042, 29, 1, '2022-09-04 12:45:33', '2022-09-04 07:45:33'),
(1229, 1043, 1, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1230, 1043, 2, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1231, 1043, 3, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1232, 1043, 4, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1233, 1043, 7, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1234, 1043, 8, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1235, 1043, 10, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1236, 1043, 12, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1237, 1043, 13, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1238, 1043, 16, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1239, 1043, 17, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1240, 1043, 18, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1241, 1043, 19, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1242, 1043, 23, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1243, 1043, 26, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1244, 1043, 27, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1245, 1043, 28, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1246, 1043, 29, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(1301, 1045, 1, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1302, 1045, 2, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1303, 1045, 3, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1304, 1045, 4, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1305, 1045, 7, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1306, 1045, 8, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1307, 1045, 10, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1308, 1045, 12, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1309, 1045, 13, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1310, 1045, 16, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1311, 1045, 17, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1312, 1045, 18, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1313, 1045, 19, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1314, 1045, 23, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1315, 1045, 26, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1316, 1045, 27, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1317, 1045, 28, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1318, 1045, 29, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(1319, 1044, 1, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1320, 1044, 2, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1321, 1044, 3, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1322, 1044, 4, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1323, 1044, 7, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1324, 1044, 8, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1325, 1044, 10, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1326, 1044, 12, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1327, 1044, 13, 1, '2022-09-04 13:12:53', '2022-09-04 08:12:53'),
(1328, 1044, 16, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1329, 1044, 17, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1330, 1044, 18, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1331, 1044, 19, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1332, 1044, 23, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1333, 1044, 26, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1334, 1044, 27, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1335, 1044, 28, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1336, 1044, 29, 1, '2022-09-04 13:12:54', '2022-09-04 08:12:54'),
(1397, 1047, 1, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1398, 1047, 4, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1399, 1047, 7, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1400, 1047, 8, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1401, 1047, 12, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1402, 1047, 18, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1403, 1047, 23, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1404, 1047, 26, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1405, 1047, 27, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1406, 1047, 29, 1, '2022-09-07 11:46:47', '2022-09-07 06:46:47'),
(1417, 1046, 1, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1418, 1046, 4, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1419, 1046, 7, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1420, 1046, 8, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1421, 1046, 12, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1422, 1046, 18, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1423, 1046, 23, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1424, 1046, 26, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1425, 1046, 27, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1426, 1046, 29, 1, '2022-09-07 12:14:21', '2022-09-07 07:14:21'),
(1458, 1048, 1, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1459, 1048, 4, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1460, 1048, 7, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1461, 1048, 8, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1462, 1048, 12, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1463, 1048, 18, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1464, 1048, 23, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1465, 1048, 26, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1466, 1048, 27, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1467, 1048, 29, 1, '2022-09-07 13:33:32', '2022-09-07 08:33:32'),
(1563, 1055, 1, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1564, 1055, 2, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1565, 1055, 3, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1566, 1055, 4, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1567, 1055, 6, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1568, 1055, 7, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1569, 1055, 8, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1570, 1055, 10, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1571, 1055, 12, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1572, 1055, 13, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1573, 1055, 15, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1574, 1055, 16, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1575, 1055, 17, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1576, 1055, 23, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1577, 1055, 25, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1578, 1055, 26, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1579, 1055, 27, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1580, 1055, 28, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1581, 1055, 29, 1, '2022-09-09 07:42:50', '2022-09-09 02:42:50'),
(1582, 1054, 1, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1583, 1054, 2, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1584, 1054, 3, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1585, 1054, 4, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1586, 1054, 6, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1587, 1054, 7, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1588, 1054, 8, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1589, 1054, 10, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1590, 1054, 12, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1591, 1054, 13, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1592, 1054, 15, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1593, 1054, 16, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1594, 1054, 17, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1595, 1054, 23, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1596, 1054, 25, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1597, 1054, 26, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1598, 1054, 27, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1599, 1054, 28, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1600, 1054, 29, 1, '2022-09-09 07:43:44', '2022-09-09 02:43:44'),
(1961, 1074, 3, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(2231, 1202, 5, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(2233, 1203, 5, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(2592, 1053, 6, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(2594, 1206, 4, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(2612, 1299, 29, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2613, 1299, 27, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2614, 1299, 26, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2615, 1299, 23, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2616, 1299, 19, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2617, 1299, 18, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2618, 1299, 17, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2619, 1299, 12, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2620, 1299, 13, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2621, 1299, 8, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2622, 1299, 7, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2623, 1299, 10, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2624, 1299, 4, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(2630, 1300, 8, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(2631, 1300, 10, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(2632, 1300, 18, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(2633, 1300, 23, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(2634, 1300, 26, 1, '2022-10-16 16:39:29', '2022-10-16 11:39:29'),
(2635, 1301, 27, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2636, 1301, 4, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2637, 1301, 29, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2638, 1301, 26, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2639, 1301, 23, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2640, 1301, 18, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2641, 1301, 17, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2642, 1301, 12, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2643, 1301, 10, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2644, 1301, 8, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2645, 1301, 7, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(2646, 1298, 7, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2647, 1298, 8, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2648, 1298, 10, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2649, 1298, 12, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2650, 1298, 13, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2651, 1298, 17, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2652, 1298, 18, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2653, 1298, 19, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2654, 1298, 23, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2655, 1298, 26, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2656, 1298, 27, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2657, 1298, 29, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(2720, 1320, 3, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(2729, 1322, 3, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(2736, 1324, 3, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(2744, 1327, 2, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(2846, 1326, 2, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `room_gallery`
--

CREATE TABLE `room_gallery` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '1=is_featured',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '"1" => default',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_gallery`
--

INSERT INTO `room_gallery` (`id`, `room_id`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1422, 778, '1660129758_pexels-pixabay-164595.jpg', 0, 1, '2022-08-10 11:09:18', '2022-08-10 11:09:18'),
(1423, 778, '1660129758_pexels-pixabay-258154.jpg', 0, 1, '2022-08-10 11:09:18', '2022-08-10 11:09:18'),
(1424, 778, '1660129758_pexels-pixabay-271624.jpg', 0, 1, '2022-08-10 11:09:18', '2022-08-10 11:09:18'),
(1756, 874, '1660865573_251340906.jpg', 0, 1, '2022-08-18 23:32:53', '2022-08-18 23:32:53'),
(1757, 874, '1660865573_251345137-5.jpg', 0, 1, '2022-08-18 23:32:53', '2022-08-18 23:32:53'),
(1758, 874, '1660865573_296688934-13.jpg', 0, 1, '2022-08-18 23:32:53', '2022-08-18 23:32:53'),
(1759, 874, '1660865573_WhatsApp-Image-2021-04-27-at-2.45.09-PM-3-768x790.jpeg', 0, 1, '2022-08-18 23:32:53', '2022-08-18 23:32:53'),
(1767, 878, '1660867142_251248948.jpg', 0, 1, '2022-08-18 23:59:02', '2022-08-18 23:59:02'),
(1768, 878, '1660867142_251346875-2.jpg', 0, 1, '2022-08-18 23:59:02', '2022-08-18 23:59:02'),
(1769, 878, '1660867142_296688934-14.jpg', 0, 1, '2022-08-18 23:59:02', '2022-08-18 23:59:02'),
(1770, 878, '1660867142_WhatsApp-Image-2021-04-27-at-2.46.10-PM-9.jpeg', 0, 1, '2022-08-18 23:59:02', '2022-08-18 23:59:02'),
(1771, 878, '1660867142_WhatsApp-Image-2021-04-30-at-1.23.43-AM-4.jpeg', 0, 1, '2022-08-18 23:59:02', '2022-08-18 23:59:02'),
(2268, 1034, '1661864067_1.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2269, 1034, '1661864067_2.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2270, 1034, '1661864067_3.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2271, 1034, '1661864067_117429729_100532208436804_9034492744920206019_n.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2272, 1034, '1661864067_201933477_306919721131384_5809094944436100577_n.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2273, 1034, '1661864067_Capture.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2274, 1034, '1661864067_Capture3.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2275, 1034, '1661864067_capture-5.jpg', 0, 1, '2022-08-30 12:54:27', '2022-08-30 07:54:27'),
(2276, 1035, '1662227164_251344197-1.jpg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2277, 1035, '1662227164_251344899-1.jpg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2278, 1035, '1662227164_296689976-5.jpg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2279, 1035, '1662227164_WhatsApp-Image-2021-04-27-at-2.44.42-PM.jpeg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2280, 1035, '1662227164_WhatsApp-Image-2021-04-27-at-2.44.43-PM-2.jpeg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2281, 1035, '1662227164_WhatsApp-Image-2021-04-27-at-2.45.08-PM-6.jpeg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2282, 1035, '1662227164_WhatsApp-Image-2021-04-27-at-2.45.13-PM-3.jpeg', 0, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(2284, 1035, '1662227165_WhatsApp-Image-2021-04-30-at-1.23.42-AM-1-5.jpeg', 0, 1, '2022-09-03 17:46:05', '2022-09-03 12:46:05'),
(2285, 1036, '1662228072_251297135-1.jpg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2286, 1036, '1662228072_251345137-1.jpg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2287, 1036, '1662228072_282682511-1.jpg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2288, 1036, '1662228072_296688934-5.jpg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2289, 1036, '1662228072_WhatsApp-Image-2021-04-27-at-2.45.08-PM-768x790.jpeg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2290, 1036, '1662228072_WhatsApp-Image-2021-04-27-at-2.45.13-PM.jpeg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2291, 1036, '1662228072_WhatsApp-Image-2021-04-27-at-2.46.05-PM.jpeg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2292, 1036, '1662228072_WhatsApp-Image-2021-04-27-at-2.46.10-PM.jpeg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2293, 1036, '1662228072_WhatsApp-Image-2021-04-30-at-1.23.42-AM-1.jpeg', 0, 1, '2022-09-03 18:01:12', '2022-09-03 13:01:12'),
(2294, 1037, '1662229041_251248948.jpg', 0, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(2295, 1037, '1662229041_251346875-2.jpg', 0, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(2296, 1037, '1662229041_296688934-14.jpg', 0, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(2297, 1037, '1662229041_WhatsApp-Image-2021-04-27-at-2.46.10-PM-9.jpeg', 0, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(2298, 1037, '1662229041_WhatsApp-Image-2021-04-30-at-1.23.43-AM-4.jpeg', 0, 1, '2022-09-03 18:17:21', '2022-09-03 13:17:21'),
(2299, 1038, '1662230141_2-7.jpg', 0, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(2300, 1038, '1662230141_3-7.jpg', 0, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(2301, 1038, '1662230141_201933477_306919721131384_5809094944436100577_n-6.jpg', 0, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(2302, 1038, '1662230141_Capture3-7.jpg', 0, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(2303, 1038, '1662230141_capture-5-7.jpg', 0, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(2304, 1039, '1662285311_1-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2305, 1039, '1662285311_2-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2306, 1039, '1662285311_3-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2307, 1039, '1662285311_4-3.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2308, 1039, '1662285311_5-3.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2309, 1039, '1662285311_117429729_100532208436804_9034492744920206019_n-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2310, 1039, '1662285311_201933477_306919721131384_5809094944436100577_n-4.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2311, 1039, '1662285311_Capture3-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2312, 1039, '1662285311_capture-5-5.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2313, 1039, '1662285311_Capture-6.jpg', 0, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(2314, 1040, '1662293958_Delux-Room-2.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2315, 1040, '1662293958_Dining-Hall-9.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2316, 1040, '1662293958_Front-side-3-1.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2317, 1040, '1662293958_Frront-side-2-10.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2318, 1040, '1662293958_WhatsApp-Image-2021-10-20-at-3.50.09-AM-9.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2319, 1040, '1662293958_WhatsApp-Image-2021-10-20-at-3.50.11-AM-9.jpeg', 0, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(2320, 1041, '1662295238_Dining-Hall-7.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2321, 1041, '1662295238_Front-Side-3.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2322, 1041, '1662295238_Frront-side-2-8.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2323, 1041, '1662295238_Suit-Room-1.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2324, 1041, '1662295238_WhatsApp-Image-2021-10-20-at-3.50.09-AM-7.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2325, 1041, '1662295238_WhatsApp-Image-2021-10-20-at-3.50.11-AM-7.jpeg', 0, 1, '2022-09-04 12:40:38', '2022-09-04 07:40:38'),
(2326, 1042, '1662295490_Dining-Hall-5.jpeg', 0, 1, '2022-09-04 12:44:50', '2022-09-04 07:44:50'),
(2327, 1042, '1662295490_Front-Side-1.jpeg', 0, 1, '2022-09-04 12:44:50', '2022-09-04 07:44:50'),
(2328, 1042, '1662295490_Frront-side-2-6.jpeg', 0, 1, '2022-09-04 12:44:50', '2022-09-04 07:44:50'),
(2329, 1042, '1662295490_Standard-Room-1.jpeg', 0, 1, '2022-09-04 12:44:50', '2022-09-04 07:44:50'),
(2330, 1042, '1662295491_WhatsApp-Image-2021-10-20-at-3.50.09-AM-5.jpeg', 0, 1, '2022-09-04 12:44:51', '2022-09-04 07:44:51'),
(2331, 1042, '1662295491_WhatsApp-Image-2021-10-20-at-3.50.11-AM-5.jpeg', 0, 1, '2022-09-04 12:44:51', '2022-09-04 07:44:51'),
(2332, 1043, '1662295855_Dining-Hall-4.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2333, 1043, '1662295855_Front-Side.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2334, 1043, '1662295855_Frront-side-2-5.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2335, 1043, '1662295855_Presidential-room.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2336, 1043, '1662295855_WhatsApp-Image-2021-10-20-at-3.50.09-AM-4.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2337, 1043, '1662295855_WhatsApp-Image-2021-10-20-at-3.50.11-AM-4.jpeg', 0, 1, '2022-09-04 12:50:55', '2022-09-04 07:50:55'),
(2338, 1044, '1662296185_Dining-Hall-3.jpeg', 0, 1, '2022-09-04 12:56:25', '2022-09-04 07:56:25'),
(2339, 1044, '1662296185_Frront-side-2-4.jpeg', 0, 1, '2022-09-04 12:56:25', '2022-09-04 07:56:25'),
(2340, 1044, '1662296185_VIP-Room.jpeg', 0, 1, '2022-09-04 12:56:25', '2022-09-04 07:56:25'),
(2341, 1044, '1662296185_WhatsApp-Image-2021-10-20-at-3.50.09-AM-3.jpeg', 0, 1, '2022-09-04 12:56:25', '2022-09-04 07:56:25'),
(2342, 1044, '1662296185_WhatsApp-Image-2021-10-20-at-3.50.11-AM-3.jpeg', 0, 1, '2022-09-04 12:56:25', '2022-09-04 07:56:25'),
(2343, 1045, '1662297032_Dining-Hall.jpeg', 0, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(2344, 1045, '1662297032_Frront-side-2-1.jpeg', 0, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(2345, 1045, '1662297032_Standard-Room.jpeg', 0, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(2346, 1045, '1662297032_WhatsApp-Image-2021-10-20-at-3.50.09-AM.jpeg', 0, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(2347, 1045, '1662297032_WhatsApp-Image-2021-10-20-at-3.50.11-AM.jpeg', 0, 1, '2022-09-04 13:10:32', '2022-09-04 08:10:32'),
(2348, 1046, '1662300613_WhatsApp-Image-2021-12-19-at-3.58.12-PM.jpeg', 0, 1, '2022-09-04 14:10:13', '2022-09-04 09:10:13'),
(2349, 1046, '1662300613_WhatsApp-Image-2021-12-19-at-3.58.13-PM.jpeg', 0, 1, '2022-09-04 14:10:13', '2022-09-04 09:10:13'),
(2350, 1046, '1662300613_WhatsApp-Image-2021-12-19-at-3.58.21-PM.jpeg', 0, 1, '2022-09-04 14:10:13', '2022-09-04 09:10:13'),
(2351, 1046, '1662300613_WhatsApp-Image-2021-12-19-at-3.58.21-PM-1.jpeg', 0, 1, '2022-09-04 14:10:13', '2022-09-04 09:10:13'),
(2352, 1046, '1662300613_WhatsApp-Image-2021-12-19-at-3.58.25-PM.jpeg', 0, 1, '2022-09-04 14:10:13', '2022-09-04 09:10:13'),
(2353, 1047, '1662357497_WhatsApp-Image-2021-12-19-at-3.58.12-PM-5.jpeg', 0, 1, '2022-09-05 05:58:17', '2022-09-05 00:58:17'),
(2354, 1047, '1662357497_WhatsApp-Image-2021-12-19-at-3.58.13-PM-1-1.jpeg', 0, 1, '2022-09-05 05:58:17', '2022-09-05 00:58:17'),
(2355, 1047, '1662357497_WhatsApp-Image-2021-12-19-at-3.58.13-PM-5.jpeg', 0, 1, '2022-09-05 05:58:17', '2022-09-05 00:58:17'),
(2356, 1047, '1662357497_WhatsApp-Image-2021-12-19-at-3.58.21-PM-1-5.jpeg', 0, 1, '2022-09-05 05:58:17', '2022-09-05 00:58:17'),
(2357, 1048, '1662357958_WhatsApp-Image-2021-12-19-at-3.58.12-PM-3.jpeg', 0, 1, '2022-09-05 06:05:58', '2022-09-05 01:05:58'),
(2358, 1048, '1662357958_WhatsApp-Image-2021-12-19-at-3.58.13-PM-3.jpeg', 0, 1, '2022-09-05 06:05:58', '2022-09-05 01:05:58'),
(2359, 1048, '1662357958_WhatsApp-Image-2021-12-19-at-3.58.16-PM-1.jpeg', 0, 1, '2022-09-05 06:05:58', '2022-09-05 01:05:58'),
(2360, 1048, '1662357958_WhatsApp-Image-2021-12-19-at-3.58.20-PM.jpeg', 0, 1, '2022-09-05 06:05:58', '2022-09-05 01:05:58'),
(2361, 1048, '1662357958_WhatsApp-Image-2021-12-19-at-3.58.21-PM-1-3.jpeg', 0, 1, '2022-09-05 06:05:58', '2022-09-05 01:05:58'),
(2365, 1052, '1662534032_1.png', 0, 1, '2022-09-07 07:00:32', '2022-09-07 02:00:32'),
(2366, 1053, '1662554742_WhatsApp-Image-2021-12-19-at-3.58.12-PM-3.jpeg', 0, 1, '2022-09-07 12:45:42', '2022-09-07 07:45:42'),
(2367, 1053, '1662554742_WhatsApp-Image-2021-12-19-at-3.58.13-PM-3.jpeg', 0, 1, '2022-09-07 12:45:42', '2022-09-07 07:45:42'),
(2368, 1053, '1662554742_WhatsApp-Image-2021-12-19-at-3.58.16-PM-1.jpeg', 0, 1, '2022-09-07 12:45:42', '2022-09-07 07:45:42'),
(2369, 1053, '1662554742_WhatsApp-Image-2021-12-19-at-3.58.20-PM.jpeg', 0, 1, '2022-09-07 12:45:42', '2022-09-07 07:45:42'),
(2370, 1054, '1662708733_WhatsApp-Image-2021-05-08-at-10.45.46-PM-1-1-400x314.jpeg', 0, 1, '2022-09-09 07:32:13', '2022-09-09 02:32:13'),
(2371, 1054, '1662708733_WhatsApp-Image-2021-05-08-at-10.45.48-PM-1-10.jpeg', 0, 1, '2022-09-09 07:32:13', '2022-09-09 02:32:13'),
(2372, 1054, '1662708733_WhatsApp-Image-2021-05-08-at-10.45.48-PM-11.jpeg', 0, 1, '2022-09-09 07:32:13', '2022-09-09 02:32:13'),
(2373, 1054, '1662708733_WhatsApp-Image-2021-05-08-at-10.45.50-PM-1-3.jpeg', 0, 1, '2022-09-09 07:32:13', '2022-09-09 02:32:13'),
(2374, 1055, '1662709069_WhatsApp-Image-2021-05-08-at-10.45.48-PM-1-10.jpeg', 0, 1, '2022-09-09 07:37:49', '2022-09-09 02:37:49'),
(2375, 1055, '1662709069_WhatsApp-Image-2021-05-08-at-10.45.48-PM-11.jpeg', 0, 1, '2022-09-09 07:37:49', '2022-09-09 02:37:49'),
(2420, 1074, '1663328686_pexels-deno-wang-11671086.jpg', 0, 1, '2022-09-16 11:44:46', '2022-09-16 06:44:46'),
(2421, 1074, '1663328686_pexels-donald-tong-189293.jpg', 0, 1, '2022-09-16 11:44:46', '2022-09-16 06:44:46'),
(2422, 1074, '1663328686_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-09-16 11:44:46', '2022-09-16 06:44:46'),
(2719, 1202, '1664353175_pexels-donald-tong-189293.jpg', 0, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(2720, 1202, '1664353175_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(2721, 1203, '1664353238_pexels-donald-tong-189293.jpg', 0, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(2722, 1203, '1664353238_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(2727, 1206, '1664360336_pexels-asad-photo-maldives-2549018.jpg', 0, 1, '2022-09-28 15:48:56', '2022-09-28 10:48:56'),
(2728, 1206, '1664360336_pexels-deno-wang-11671086.jpg', 0, 1, '2022-09-28 15:48:56', '2022-09-28 10:48:56'),
(2729, 1206, '1664360336_pexels-donald-tong-189293.jpg', 0, 1, '2022-09-28 15:48:56', '2022-09-28 10:48:56'),
(2730, 1206, '1664360336_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-09-28 15:48:56', '2022-09-28 10:48:56'),
(3026, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.06 PM.jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3027, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.09 PM (1).jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3028, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.09 PM.jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3029, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.11 PM.jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3030, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.16 PM.jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3031, 1299, '1665916524_WhatsApp Image 2021-08-25 at 9.48.17 PM (1).jpeg', 0, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(3032, 1299, '1665916525_WhatsApp Image 2021-08-25 at 9.48.17 PM.jpeg', 0, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(3033, 1299, '1665916525_WhatsApp Image 2021-08-25 at 9.48.20 PM.jpeg', 0, 1, '2022-10-16 16:05:25', '2022-10-16 11:05:25'),
(3034, 1300, '1665918371_1.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3035, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.47.57 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3036, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.47.59 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3037, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.01 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3038, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.04 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3039, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.16 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3040, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.17 PM (1).jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3041, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.17 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3042, 1300, '1665918371_WhatsApp Image 2021-08-25 at 9.48.20 PM.jpeg', 0, 1, '2022-10-16 16:36:11', '2022-10-16 11:36:11'),
(3043, 1301, '1665918853_1.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3044, 1301, '1665918853_WhatsApp Image 2021-08-25 at 9.48.38 PM.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3045, 1301, '1665918853_WhatsApp Image 2021-08-25 at 9.48.41 PM.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3046, 1301, '1665918853_WhatsApp Image 2021-08-25 at 9.48.46 PM.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3047, 1301, '1665918853_WhatsApp Image 2021-08-25 at 9.49.39 PM.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3048, 1301, '1665918853_x.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3049, 1301, '1665918853_xx.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3050, 1301, '1665918853_z.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3051, 1301, '1665918853_zz.jpeg', 0, 1, '2022-10-16 16:44:13', '2022-10-16 11:44:13'),
(3052, 1298, '1665920212_1.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3053, 1298, '1665920212_WhatsApp Image 2021-08-25 at 9.48.22 PM.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3054, 1298, '1665920212_WhatsApp Image 2021-08-25 at 9.48.23 PM.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3055, 1298, '1665920212_WhatsApp Image 2021-08-25 at 9.48.25 PM.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3056, 1298, '1665920212_WhatsApp Image 2021-08-25 at 9.48.29 PM.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3057, 1298, '1665920212_WhatsApp Image 2021-08-25 at 9.48.31 PM.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3058, 1298, '1665920212_x.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3059, 1298, '1665920212_xx.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3060, 1298, '1665920212_y.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3061, 1298, '1665920212_yy.jpeg', 0, 1, '2022-10-16 17:06:52', '2022-10-16 12:06:52'),
(3062, 1298, '1665920213_zz.jpeg', 0, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(3140, 1320, '1667022611_pexels-fox-1082326.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3141, 1320, '1667022611_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3142, 1320, '1667022611_pexels-pixabay-261327.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3143, 1320, '1667022611_pexels-pixabay-261395.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3144, 1320, '1667022611_pexels-prime-cinematics-2057610.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3145, 1320, '1667022611_pexels-quang-nguyen-vinh-3355732.jpg', 0, 1, '2022-10-29 11:20:11', '2022-10-29 06:20:11'),
(3146, 1320, '1667022612_pexels-vincent-rivaud-2363807.jpg', 0, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(3151, 1322, '1667026447_pexels-fox-1082326.jpg', 0, 1, '2022-10-29 12:24:07', '2022-10-29 07:24:07'),
(3152, 1322, '1667026447_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-10-29 12:24:07', '2022-10-29 07:24:07'),
(3153, 1322, '1667026447_pexels-pixabay-261327.jpg', 0, 1, '2022-10-29 12:24:07', '2022-10-29 07:24:07'),
(3154, 1322, '1667026447_pexels-pixabay-261395.jpg', 0, 1, '2022-10-29 12:24:07', '2022-10-29 07:24:07'),
(3155, 1322, '1667026447_pexels-prime-cinematics-2057610.jpg', 0, 1, '2022-10-29 12:24:07', '2022-10-29 07:24:07'),
(3160, 1324, '1667032560_pexels-fox-1082326.jpg', 0, 1, '2022-10-29 14:06:00', '2022-10-29 09:06:00'),
(3161, 1324, '1667032560_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-10-29 14:06:00', '2022-10-29 09:06:00'),
(3162, 1324, '1667032560_pexels-pixabay-261327.jpg', 0, 1, '2022-10-29 14:06:00', '2022-10-29 09:06:00'),
(3163, 1324, '1667032560_pexels-pixabay-261395.jpg', 0, 1, '2022-10-29 14:06:00', '2022-10-29 09:06:00'),
(3167, 1326, '1667199233_pexels-fox-1082326.jpg', 0, 1, '2022-10-31 12:23:53', '2022-10-31 07:23:53'),
(3168, 1326, '1667199233_pexels-jean-van-der-meulen-1457845.jpg', 0, 1, '2022-10-31 12:23:53', '2022-10-31 07:23:53'),
(3169, 1326, '1667199233_pexels-pixabay-261327.jpg', 0, 1, '2022-10-31 12:23:53', '2022-10-31 07:23:53'),
(3170, 1326, '1667199233_pexels-prime-cinematics-2057610.jpg', 0, 1, '2022-10-31 12:23:53', '2022-10-31 07:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_types_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'room_default_img.jpg',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `max_adults` int(11) NOT NULL,
  `max_childern` int(11) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `price_per_night` double NOT NULL,
  `projected_percentage` double DEFAULT NULL,
  `projected_price` double DEFAULT NULL,
  `tax_percentage` int(11) DEFAULT NULL,
  `price_per_night_7d` double NOT NULL,
  `price_per_night_30d` int(11) NOT NULL,
  `is_guest_allow` tinyint(2) DEFAULT 0,
  `extra_guest_per_night` double DEFAULT 0,
  `is_above_guest_cap` tinyint(2) DEFAULT 0,
  `is_pay_by_num_guest` tinyint(2) DEFAULT 0,
  `room_size` int(11) DEFAULT NULL,
  `type_of_price` enum('single_fee','per_night','per_guest','per_night_per_guest') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cleaning_fee` double DEFAULT NULL,
  `cleaning_fee_type` enum('single_fee','per_night','per_guest','per_night_per_guest') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `city_fee` double DEFAULT NULL,
  `city_fee_type` enum('single_fee','per_night','per_guest','per_night_per_guest') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `earlybird_discount` int(11) DEFAULT NULL,
  `min_days_in_advance` int(11) DEFAULT NULL,
  `num_of_beds` int(11) DEFAULT NULL,
  `bed_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `private_bathroom` int(11) NOT NULL COMMENT '1=yes,0=no',
  `private_entrance` int(11) NOT NULL COMMENT '1=yes,0=no',
  `optional_services` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `family_friendly` int(11) NOT NULL COMMENT '1=yes,0=no',
  `outdoor_facilities` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `extra_people` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `breakfast_availability` tinyint(4) DEFAULT NULL COMMENT '1=yes,0=no',
  `breakfast_price_inclusion` tinyint(4) DEFAULT NULL COMMENT '1=no,0=yes',
  `breakfast_cost` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `breakfast_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `hotel_id`, `room_types_id`, `name`, `image`, `description`, `notes`, `max_adults`, `max_childern`, `number_of_rooms`, `price_per_night`, `projected_percentage`, `projected_price`, `tax_percentage`, `price_per_night_7d`, `price_per_night_30d`, `is_guest_allow`, `extra_guest_per_night`, `is_above_guest_cap`, `is_pay_by_num_guest`, `room_size`, `type_of_price`, `cleaning_fee`, `cleaning_fee_type`, `city_fee`, `city_fee_type`, `earlybird_discount`, `min_days_in_advance`, `num_of_beds`, `bed_type`, `private_bathroom`, `private_entrance`, `optional_services`, `family_friendly`, `outdoor_facilities`, `extra_people`, `breakfast_availability`, `breakfast_price_inclusion`, `breakfast_cost`, `breakfast_type`, `status`, `created_at`, `updated_at`) VALUES
(777, 409, NULL, NULL, 'room_default_img.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 2, 2, 2, 2000, NULL, NULL, 10, 14000, 60000, 0, NULL, NULL, NULL, 5, 'per_night_per_guest', 200, 'single_fee', 100, 'single_fee', 10, 2, NULL, 'Single bed', 1, 1, 'board games', 1, 'parking', '2', NULL, NULL, NULL, NULL, 0, '2022-08-10 10:14:52', '2022-08-10 10:14:52'),
(778, 409, NULL, 'Standard Double Room', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 2, 2, 2, 2000, NULL, NULL, 10, 14000, 60000, 0, 0, 0, 0, 5, 'per_night_per_guest', 200, 'per_night_per_guest', 100, 'per_night_per_guest', 10, 2, NULL, 'Single bed', 1, 1, 'board games', 1, 'parking', '2', NULL, NULL, NULL, NULL, 1, '2022-08-10 10:52:53', '2022-08-24 12:20:25'),
(874, 458, NULL, 'Deluxe Twin Room', '251340906-roomMainImg-1660865573.jpg', 'Deluxe Twin Room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 2, 1, 10, 1975, NULL, NULL, 16, 1975, 1975, 1, 12, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Single bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 1, '2022-08-18 23:32:53', '2022-08-24 12:29:41'),
(876, 458, NULL, NULL, 'room_default_img.jpg', 'Deluxe Twin Room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 2, 1, 10, 1995, NULL, NULL, 16, 1975, 1975, 1, 0, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 0, '2022-08-18 23:46:14', '2022-08-18 23:46:14'),
(877, 458, NULL, NULL, 'room_default_img.jpg', 'Deluxe Twin Room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 2, 1, 10, 1995, NULL, NULL, 16, 1975, 1975, 1, 0, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 0, '2022-08-18 23:47:58', '2022-08-18 23:47:58'),
(878, 458, NULL, 'Standard Suite', '251248948-roomMainImg-1660867142.jpg', 'Family Suit room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 4, 1, 10, 3500, NULL, NULL, 16, 3500, 3500, 1, 0, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 1, '2022-08-18 23:54:18', '2022-08-24 12:12:58'),
(927, 458, NULL, 'Family Room with Pool View', 'room_default_img.jpg', 'Deluxe Twin Room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 2, 1, 10, 1975, NULL, NULL, 16, 1975, 1975, 1, 250, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Single bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 1, '2022-08-23 06:00:22', '2022-08-23 07:01:54'),
(933, 458, NULL, NULL, 'room_default_img.jpg', 'Deluxe Twin Room', 'Venroom.com will make payment after 07-Days of every guest check-out & venrooms.com will be charged 15% on every guest reservation.', 2, 1, 10, 1975, NULL, NULL, 16, 1975, 1975, 1, 250, 1, NULL, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Single bed', 1, 1, NULL, 1, 'Garden', '2', NULL, NULL, NULL, NULL, 0, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(945, 409, NULL, NULL, 'room_default_img.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 2, 2, 2, 2000, NULL, NULL, 10, 14000, 60000, 0, 0, 0, 0, 5, 'per_night_per_guest', 200, 'per_night_per_guest', 100, 'per_night_per_guest', 10, 2, NULL, 'Single bed', 1, 1, 'board games', 1, 'parking', '2', NULL, NULL, NULL, NULL, 0, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(946, 409, NULL, NULL, 'room_default_img.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 2, 2, 2, 2000, NULL, NULL, 10, 14000, 60000, 0, 0, 0, 0, 5, 'per_night_per_guest', 200, 'per_night_per_guest', 100, 'per_night_per_guest', 10, 2, NULL, 'Single bed', 1, 1, 'board games', 1, 'parking', '2', NULL, NULL, NULL, NULL, 0, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(1034, 520, 6, 'Deluxe Family Room', '1-roomMainImg-1661864067.jpg', 'Hotel the oriel Islamabad features accommodations with a restaurant, free private parking, a garden and a terrace. Boasting a 24-hour front desk.', 'Hotel the oriel Islamabad features accommodations with a restaurant, free private parking, a garden and a terrace. Boasting a 24-hour front desk.', 4, 2, 2, 4950, NULL, NULL, 0, 4950, 4950, 0, 0, 0, 0, 200, 'per_night', NULL, 'single_fee', NULL, 'single_fee', NULL, NULL, 4, 'Double bed', 1, 1, NULL, 1, 'parking', '0', NULL, NULL, NULL, NULL, 1, '2022-08-30 12:54:27', '2022-09-03 18:27:49'),
(1035, 458, 4, 'Deluxe Twin/Double Room', '251344899-1-roomMainImg-1662227164.jpg', 'Deluxe Room', 'roadnstays.com will make payment after 07-Days of every guest check-out & roadnstays.com will be charged 15% on every guest reservation.', 2, 1, 10, 1975, NULL, NULL, 16, 1975, 1975, 0, NULL, NULL, NULL, 200, 'per_night', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Single bed', 1, 1, NULL, 1, 'Garden', '0', NULL, NULL, NULL, NULL, 1, '2022-09-03 17:46:04', '2022-09-03 12:46:04'),
(1036, 458, 1, 'Standard Single Room', '282682511-1-roomMainImg-1662228072.jpg', 'Standard Single Master', 'roadnstays.com will make payment after 07-Days of every guest check-out & roadnstays.com will be charged 15% on every guest reservation.', 2, 1, 10, 1995, NULL, NULL, 16, 1995, 1995, 0, 0, 0, 0, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'Garden', '0', NULL, NULL, NULL, NULL, 1, '2022-09-03 17:47:57', '2022-09-03 18:01:12'),
(1037, 458, 7, 'Superior Suite', '251248948-roomMainImg-1662229041.jpg', 'Family Suite Room', 'roadnstays.com will make payment after 07-Days of every guest check-out & roadnstays.com will be charged 15% on every guest reservation.', 4, 2, 4, 3500, NULL, NULL, 16, 3500, 3500, 0, 0, 0, 0, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'Garden', '0', NULL, NULL, NULL, NULL, 1, '2022-09-03 18:09:22', '2022-09-03 18:17:21'),
(1038, 520, 1, 'Large Single Room', '2-7-roomMainImg-1662230141.jpg', 'Hotel The Oriel, Triple Room', '\"Terms and conditions:\r\n1) 6 months digitally maintained contract.\r\n2) Host will provide rates for rooms, venrooms’ will add their 10% share on the top.\r\n3) 7 working days payment settlement period.\"', 3, 2, 2, 4400, NULL, NULL, 0, 4400, 4400, 0, 0, 0, 0, 200, 'per_night', NULL, 'per_night', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, NULL, 1, 'parking', '0', NULL, NULL, NULL, NULL, 1, '2022-09-03 18:28:01', '2022-09-03 18:35:41'),
(1039, 520, 2, 'Large Double Room', '1-5-roomMainImg-1662285311.jpg', 'Hotel The Oriel, Master Room', '\"Terms and conditions:\r\n1) 6 months digitally maintained contract.\r\n2) Host will provide rates for rooms, venrooms’ will add their 10% share on the top.\r\n3) 7 working days payment settlement period.\"', 2, 2, 4, 3850, NULL, NULL, 0, 3850, 3850, 0, 0, 0, 0, 200, 'per_night', NULL, 'single_fee', NULL, 'per_night', NULL, NULL, NULL, 'Double bed', 1, 1, 'Yes', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 09:29:53', '2022-09-04 09:55:11'),
(1040, 522, 2, 'Deluxe Double Room', 'Delux-Room-2-roomMainImg-1662293958.jpeg', 'Delux Room at Swat Hilton Hotel Bypass Mingora Swat', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 2, 2, 3, 9200, NULL, NULL, 0, 9200, 9200, 0, NULL, NULL, NULL, 1, 'per_night', 0, 'single_fee', 0, 'single_fee', NULL, 3, 1, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:19:18', '2022-09-04 07:19:18'),
(1041, 522, 7, 'Deluxe Suite with Private Bathroom', 'Suit-Room-1-roomMainImg-1662295238.jpeg', 'Suit Room at Swat Hilton Hotel Bypass Mingora Swat', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 4, 2, 2, 13225, NULL, NULL, 0, 13225, 13225, 0, 0, 0, 0, 1, 'per_night', 0, 'single_fee', 0, 'per_night', NULL, 3, 1, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:26:52', '2022-09-04 12:40:38'),
(1042, 522, 2, 'Large Double Room', 'Standard-Room-1-roomMainImg-1662295490.jpeg', 'Standard Room at Swat Hilton Hotel Bypass Mingora Swat', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 2, 2, 1, 6900, NULL, NULL, 0, 6900, 6900, 0, 0, 0, 0, 1, 'per_night', 0, 'per_night', 0, 'per_night', NULL, 3, NULL, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:41:44', '2022-09-04 12:45:33'),
(1043, 522, 2, 'Superior Double Room', 'Presidential-room-roomMainImg-1662295855.jpeg', 'Presidential Room at Swat Hilton Hotel Bypass Mingora Swat', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 2, 2, 1, 27025, NULL, NULL, 0, 27025, 27025, 0, 0, 0, 0, 1, 'per_night', 0, 'single_fee', 0, 'single_fee', NULL, 3, NULL, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:45:42', '2022-09-04 12:50:55'),
(1044, 522, 2, 'Large Double Room', 'VIP-Room-roomMainImg-1662296185.jpeg', 'VIP Room at Swat Hilton Hotel Bypass Mingora Swat', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 2, 2, 2, 12000, NULL, NULL, 0, 12000, 12000, 0, 0, 0, 0, 1, 'per_night', 0, 'per_night', 0, 'per_night', NULL, 3, NULL, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:52:30', '2022-09-04 13:12:53'),
(1045, 522, 2, 'Double Room', 'Standard-Room-roomMainImg-1662297032.jpeg', 'Luxury Rooms in Swat view hotel fizagat swat ( Three Beds Room)', 'The property of Swat Hilton hotel bypass Mingora swat is in excellent condition. The administration is hardworking and taking care of their guests on priority basis. All the rooms having stock and they keep their rooms neat and clean.', 2, 2, 1, 6900, NULL, NULL, 0, 6900, 6900, 0, 0, 0, 0, 1, 'per_night', 0, 'single_fee', 0, 'single_fee', NULL, 3, NULL, 'Double bed', 1, 1, 'Backup generator, Parking, Hot Water', 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 12:56:46', '2022-09-04 13:10:32'),
(1046, 523, 2, 'Deluxe Double Room', 'WhatsApp-Image-2021-12-19-at-3.58.21-PM-roomMainImg-1662300613.jpeg', 'Season Inn Guest House Deluxe Double', 'Terms & Conditions: 1) 15% will be charged by venrooms on bookings through venrooms. 2) You will get 70% booking payment by guest at the time of check-in/out. 3) Remaining 15% of your amount will be deposited by venrooms to you with in a week after check-out. CEX ID: 10004', 2, 2, 3, 3500, 18, 4130, 13, 3500, 3500, 0, 0, 0, 0, 1, 'single_fee', 0, NULL, 0, NULL, NULL, 1, 1, 'Double bed', 1, 1, NULL, 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-04 14:10:13', '2022-09-07 12:14:21'),
(1047, 523, 3, 'Deluxe Twin Room', 'WhatsApp-Image-2021-12-19-at-3.58.13-PM-1-1-roomMainImg-1662357497.jpeg', 'Season Inn Guest House Deluxe Twin', 'Terms & Conditions: 1) 15% will be charged by venrooms on bookings through venrooms. 2) You will get 70% booking payment by guest at the time of check-in/out. 3) Remaining 15% of your amount will be deposited by venrooms to you with in a week after check-out. CEX ID: 10004', 2, 2, 2, 3500, 20, 4200, 13, 3500, 3500, 0, 0, 0, 0, 1, 'per_night', 0, 'per_night', 0, 'per_night', NULL, 1, NULL, 'Double bed', 1, 1, NULL, 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-05 05:29:31', '2022-09-07 11:46:47'),
(1048, 523, 6, 'Deluxe Family Room', 'WhatsApp-Image-2021-12-19-at-3.58.20-PM-roomMainImg-1662357958.jpeg', 'Season Inn Guest House Deluxe Family Room', 'Terms & Conditions: 1) 15% will be charged by venrooms on bookings through venrooms. 2) You will get 70% booking payment by guest at the time of check-in/out. 3) Remaining 15% of your amount will be deposited by venrooms to you with in a week after check-out. CEX ID: 10004', 3, 2, 1, 3500, 13, 3955, 13, 3500, 3500, 0, 0, 0, 0, 1, 'per_night', 20, 'per_night', 50, 'per_night', 13, 5, 2, 'Double bed', 1, 1, NULL, 1, 'Yes', '0', NULL, NULL, NULL, NULL, 1, '2022-09-05 06:00:00', '2022-09-07 13:33:32'),
(1052, 522, 1, 'Budget Single Room', '1-roomMainImg-1662534032.png', 'sdsdf', 'sdfsdf', 2, 1, 5, 2500, 10, 2750, 2, 3200, 15000, 0, 0, 0, 0, 1500, 'single_fee', NULL, 'single_fee', NULL, 'single_fee', NULL, NULL, NULL, '', 1, 1, NULL, 1, 'asdasd', '1', NULL, NULL, NULL, NULL, 1, '2022-09-07 07:00:32', '2022-09-07 11:46:26'),
(1053, 409, 4, 'Budget Twin/Double Room', 'WhatsApp-Image-2021-12-19-at-3.58.20-PM-roomMainImg-1662554742.jpeg', 'dg', 'sdf', 2, 2, 6, 2000, 50, 3000, 10, 14000, 60000, 0, 0, 0, 0, 5, 'per_night', 200, 'per_night', 100, 'per_night', 10, 3, NULL, '', 1, 1, 'board games', 1, 'parking', '2', NULL, NULL, NULL, NULL, 1, '2022-09-07 12:45:42', '2022-10-15 11:04:35'),
(1054, 524, 1, 'Standard Single Room', 'WhatsApp-Image-2021-05-08-at-10.45.46-PM-1-1-400x314-roomMainImg-1662708733.jpeg', 'Set in Lahore, 34 km from Wagah Border, Hotel Tulip Inn, Faisal Town offers accommodation with a restaurant, free private parking and a shared lounge. This 3-star hotel offers room service and a concierge service. The accommodation provides a 24-hour front desk, airport transfers, a shared kitchen and free WiFi throughout the property. The units at the hotel come with a seating area. At Hotel Tulip Inn, Faisal Town every room includes a wardrobe, a flat-screen TV and a private bathroom. Guests at the accommodation can enjoy a continental breakfast. Emporium Mall is 5 km from Hotel Tulip Inn, Faisal Town, while Gaddafi Stadium is 6 km away. The nearest airport is Allama Iqbal International Airport, 11 km from the hotel. Metro Bus station is 3 km away from hotel. Offering inclusive of Buffet Breakfast, welcome drinks, Dress Pressing, Dress washing & shoe shinning. We speak your language! Hotel Tulip Inn, Faisal Town is welcoming Venrooms.com’s guests.', 'Venroom.com will charge 15% on guest reservations and make payment after 07-Days of guest check-out. after 6 months contract will be renewed with mutual understanding.', 2, 2, 10, 1995, NULL, NULL, 16, 1995, 1995, 0, 0, 0, 0, 5, 'single_fee', NULL, 'single_fee', NULL, 'single_fee', NULL, NULL, NULL, '', 1, 1, NULL, 1, 'Yes', '1', NULL, NULL, NULL, NULL, 1, '2022-09-09 07:32:13', '2022-09-09 07:56:47'),
(1055, 524, 3, 'Deluxe Twin Room', 'WhatsApp-Image-2021-05-08-at-10.45.44-PM-1-1-roomMainImg-1662709069.jpeg', 'Set in Lahore, 34 km from Wagah Border, Hotel Tulip Inn, Faisal Town offers accommodation with a restaurant, free private parking and a shared lounge. This 3-star hotel offers room service and a concierge service. The accommodation provides a 24-hour front desk, airport transfers, a shared kitchen and free WiFi throughout the property.\r\n\r\nThe units at the hotel come with a seating area. At Hotel Tulip Inn, Faisal Town every room includes a wardrobe, a flat-screen TV and a private bathroom.\r\n\r\nGuests at the accommodation can enjoy a continental breakfast.\r\n\r\nEmporium Mall is 5 km from Hotel Tulip Inn, Faisal Town, while Gaddafi Stadium is 6 km away. The nearest airport is Allama Iqbal International Airport, 11 km from the hotel. Metro Bus station is 3 km away from hotel.\r\n\r\nOffering inclusive of Buffet Breakfast, welcome drinks, Dress Pressing, Dress washing & shoe shinning.\r\n\r\nWe speak your language!\r\n\r\nHotel Tulip Inn, Faisal Town is welcoming Venrooms.com’s guests.', 'Venroom.com will charge 15% on guest reservations and make payment after 07-Days of guest check-out. after 6 months contract will be renewed with mutual understanding.', 2, 2, 6, 1975, NULL, NULL, 16, 1975, 1975, 0, 0, 0, 0, 5, 'single_fee', NULL, 'single_fee', NULL, 'single_fee', NULL, NULL, NULL, '', 1, 1, 'Yes', 1, 'Yes', '1', NULL, NULL, NULL, NULL, 1, '2022-09-09 07:33:43', '2022-09-09 07:37:49'),
(1074, 523, 5, 'Quadruple with Park View', 'pexels-asad-photo-maldives-2549018-roomMainImg-1663328686.jpg', 'description', 'notes', 10, 10, 10, 100, 10, 110, 1, 700, 3000, 0, 0, 0, 0, 144, 'single_fee', 100, 'single_fee', 100, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-09-16 11:44:46', '2022-09-16 11:45:11'),
(1202, 520, 4, 'Budget Twin/Double Room', 'pexels-donald-tong-189293-roomMainImg-1664353175.jpg', 'room description', 'notes', 10, 10, 10, 100, 1, 101, 1, 700, 3000, 0, NULL, NULL, NULL, 144, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-09-28 13:49:35', '2022-09-28 08:19:41'),
(1203, 520, 2, 'Double with Park View', 'pexels-donald-tong-189293-roomMainImg-1664353238.jpg', 'room description', 'notes', 10, 10, 10, 100, 1, 101, 1, 700, 3000, 0, 0, 0, 0, 144, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-09-28 13:49:44', '2022-09-28 08:20:42'),
(1206, 523, 4, 'Budget Twin/Double Room', 'pexels-donald-tong-189293-roomMainImg-1664360336.jpg', 'Room description', 'Notes', 10, 10, 5, 100, 10, 110, 1, 700, 3000, 0, 0, 0, 0, 144, 'single_fee', 100, 'single_fee', 100, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-09-28 15:48:56', '2022-10-15 12:40:50'),
(1298, 655, 2, 'Budget Double Room', 'WhatsApp Image 2021-08-25 at 9.48.22 PM-roomMainImg-1665920212.jpeg', 'Best budget room for a couple to enjoy at a very exquisite tourist attraction of Pakistan', 'Best budget room for a couple to enjoy at a very exquisite tourist attraction of Pakistan', 2, 1, 1, 4000, NULL, NULL, 16, 4000, 4000, 1, 0, 1, NULL, 225, 'per_night', 0, 'per_night', 0, 'per_night', 15, 5, NULL, '', 1, 1, 'Yes', 1, 'Yes', 'Yes', NULL, NULL, NULL, NULL, 1, '2022-10-16 15:55:24', '2022-10-16 11:36:52'),
(1299, 655, 2, 'Small Double Room', 'WhatsApp Image 2021-08-25 at 9.48.09 PM (1)-roomMainImg-1665916524.jpeg', 'A budget double-bed room at a very reasonable price', 'A budget double-bed room at a very reasonable price', 2, 2, 1, 3000, NULL, NULL, 16, 3000, 3000, 1, 0, 1, NULL, 225, 'per_night', 0, 'single_fee', 0, 'single_fee', 15, 5, NULL, '', 1, 1, 'Yes', 1, 'Yes', 'Yes', NULL, NULL, NULL, NULL, 1, '2022-10-16 16:05:24', '2022-10-16 11:05:24'),
(1300, 655, 6, 'Standard Family Room', '1-roomMainImg-1665918370.jpeg', 'A budget room for a mid-sized family, the room includes 1 single bed, 1 double.', 'A budget room for a mid-sized family, the room includes 1 single bed, 1 double.', 3, 2, 1, 3500, NULL, NULL, 16, 3500, 3500, 1, 0, 1, NULL, 225, 'per_night', 0, 'per_night', 0, 'per_night', 15, 5, NULL, '', 1, 1, 'Yes', 1, 'Yes', 'Yes', NULL, NULL, NULL, NULL, 1, '2022-10-16 16:36:10', '2022-10-16 11:09:29'),
(1301, 655, 7, 'Deluxe Suite with Shared Bathroom', 'WhatsApp Image 2021-08-25 at 9.48.38 PM-roomMainImg-1665918853.jpeg', 'A couple of interconnected rooms with queen beds, at a very reasonable price and facilities.', 'A couple of interconnected rooms with queen beds, at a very reasonable price and facilities.', 4, 2, 1, 7500, NULL, NULL, 16, 7500, 7500, 1, 0, 1, NULL, 450, 'per_night', 0, 'single_fee', 0, 'single_fee', 15, 5, NULL, '', 1, 1, 'Yes', 1, 'Yes', 'Yes', NULL, NULL, NULL, NULL, 1, '2022-10-16 16:44:13', '2022-10-17 10:39:02'),
(1320, 666, 1, 'Budget Single Room', 'pexels-fox-1082326-roomMainImg-1667022611.jpg', 'Cancellation Policy', 'v', 10, 10, 10, 10, 10, 11, 1, 70, 300, 0, NULL, NULL, NULL, 144, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-10-29 11:20:11', '2022-10-29 06:52:28'),
(1322, 666, 1, 'Standard Single Room with Mountain View', 'pexels-pixabay-261327-roomMainImg-1667026447.jpg', 'Cancellation Policy', 'v', 10, 10, 10, 10, NULL, NULL, 1, 70, 300, 0, 0, 0, 0, 144, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-10-29 12:22:43', '2022-10-29 08:34:33'),
(1324, 666, 1, 'Single Room with Private Bathroom', 'pexels-pixabay-261327-roomMainImg-1667032560.jpg', 'Cancellation Policy', 'v', 10, 10, 10, 10, NULL, NULL, 1, 70, 300, 0, 0, 0, 0, 144, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-10-29 14:04:57', '2022-10-29 12:37:40'),
(1326, 667, 1, 'Single Room with Park View', 'pexels-fox-1082326-roomMainImg-1667199233.jpg', 'Room description', 'Room description', 10, 10, 10, 10, NULL, NULL, 1, 70, 300, 0, 0, 0, 0, 356, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 1, '2022-10-31 12:23:53', '2022-11-29 12:58:14'),
(1327, 667, NULL, NULL, 'room_default_img.jpg', 'Room description', 'Room description', 10, 10, 10, 10, NULL, NULL, 1, 70, 300, 0, 0, 0, 0, 356, 'single_fee', 10, 'single_fee', 10, 'single_fee', 1, 1, NULL, '', 1, 1, 'Yes', 1, 'Yes', '4', NULL, NULL, NULL, NULL, 0, '2022-10-31 12:24:24', '2022-10-31 06:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `room_name_list`
--

CREATE TABLE `room_name_list` (
  `id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_name_list`
--

INSERT INTO `room_name_list` (`id`, `room_type_id`, `room_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Budget Single Room', 1, '2022-06-13 05:49:09', '2022-06-13 06:10:57'),
(2, 1, 'Deluxe Single Room', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(3, 1, 'Deluxe Single room with Balcony', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(4, 1, 'Deluxe Single Room with Sea View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(5, 1, 'Economy Single Room', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(6, 1, 'Large Single Room', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(7, 1, 'Single Room', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(8, 1, 'Single Room - Disability Access', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(9, 1, 'Single Room with Balcony', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(10, 1, 'Single Room with Bath', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(11, 1, 'Single Room with Bathroom', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(12, 1, 'Single Room with Garden View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(14, 1, 'Single Room with Lake View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(15, 1, 'Single Room with Mountain View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(16, 1, 'Single Room with Park View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(18, 1, 'Single Room with Private Bathroom', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(19, 1, 'Single Room with Sea View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(20, 1, 'Single with Park View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(21, 1, 'Single Room with Pool View', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(22, 1, 'Single Room with Shared Bathroom', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(23, 1, 'Single Room with Shared Shower and Toilet', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(24, 1, 'Single Room with Shared Toilet', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(25, 1, 'Single Room with Shower', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(26, 1, 'Single Room with Terrace', 1, '2022-06-13 06:02:28', '2022-06-13 06:10:57'),
(27, 1, 'Small Single Room', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(28, 1, 'Standard Single Room', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(29, 1, 'Standard Single Room with Mountain View', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(30, 1, 'Standard Single Room with Sauna', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(31, 1, 'Standard Single Room with Sea View', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(32, 1, 'Standard Single Room with Shared Bathroom', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(33, 1, 'Standard Single Room with Shower', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(34, 1, 'Superior Single Room', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(35, 1, 'Superior Single Room with Lake View', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(39, 1, 'Single Room with Lake View', 1, '2022-06-13 06:06:41', '2022-06-13 06:10:57'),
(103, 2, 'Budget Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(104, 2, 'Deluxe Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(105, 2, 'Deluxe Double room with Balcony', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(106, 2, 'Deluxe Double Room with Sea View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(107, 2, 'Economy Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(108, 2, 'Large Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(109, 2, 'Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(110, 2, 'Double Room - Disability Access', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(111, 2, 'Double Room with Balcony', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(112, 2, 'Double Room with Bath', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(113, 2, 'Double Room with Bathroom', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(114, 2, 'Double Room with Garden View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(115, 2, 'Double Room with Lake View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(116, 2, 'Double Room with Mountain View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(117, 2, 'Double Room with Park View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(118, 2, 'Double Room with Pool View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(119, 2, 'Double Room with Private Bathroom', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(120, 2, 'Double Room with Sea View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(121, 2, 'Double with Park View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(122, 2, 'Double Room with Pool View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(123, 2, 'Double Room with Shared Bathroom', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(124, 2, 'Double Room with Shared Shower and Toilet', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(125, 2, 'Double Room with Shared Toilet', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(126, 2, 'Double Room with Shower', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(127, 2, 'Double Room with Terrace', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(128, 2, 'Small Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(129, 2, 'Standard Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(130, 2, 'Standard Double Room with Mountain View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(131, 2, 'Standard Double Room with Sauna', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(132, 2, 'Standard Double Room with Sea View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(133, 2, 'Standard Double Room with Shared Bathroom', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(134, 2, 'Standard Double Room with Shower', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(135, 2, 'Superior Double Room', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(136, 2, 'Superior Double Room with Lake View', 1, '2022-06-13 06:26:44', '2022-06-13 06:26:44'),
(137, 3, 'Budget Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(138, 3, 'Deluxe Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(139, 3, 'Deluxe Twin room with Balcony', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(140, 3, 'Deluxe Twin Room with Sea View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(141, 3, 'Economy Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(142, 3, 'Large Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(143, 3, 'Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(144, 3, 'Twin Room - Disability Access', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(145, 3, 'Twin Room with Balcony', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(146, 3, 'Twin Room with Bath', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(147, 3, 'Twin Room with Bathroom', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(148, 3, 'Twin Room with Garden View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(149, 3, 'Twin Room with Lake View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(150, 3, 'Twin Room with Mountain View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(151, 3, 'Twin Room with Park View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(152, 3, 'Twin Room with Pool View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(153, 3, 'Twin Room with Private Bathroom', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(154, 3, 'Twin Room with Sea View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(155, 3, 'Twin with Park View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(156, 3, 'Twin Room with Pool View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(157, 3, 'Twin Room with Shared Bathroom', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(158, 3, 'Twin Room with Shared Shower and Toilet', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(159, 3, 'Twin Room with Shared Toilet', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(160, 3, 'Twin Room with Shower', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(161, 3, 'Twin Room with Terrace', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(162, 3, 'Small Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(163, 3, 'Standard Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(164, 3, 'Standard Twin Room with Mountain View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(165, 3, 'Standard Twin Room with Sauna', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(166, 3, 'Standard Twin Room with Sea View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(167, 3, 'Standard Twin Room with Shared Bathroom', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(168, 3, 'Standard Twin Room with Shower', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(169, 3, 'Superior Twin Room', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(170, 3, 'Superior Twin Room with Lake View', 1, '2022-06-13 06:38:41', '2022-06-13 06:38:41'),
(171, 4, 'Budget Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(172, 4, 'Deluxe Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(173, 4, 'Deluxe Twin/Double room with Balcony', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(174, 4, 'Deluxe Twin/Double Room with Sea View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(175, 4, 'Economy Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(176, 4, 'Large Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(177, 4, 'Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(178, 4, 'Twin/Double Room - Disability Access', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(179, 4, 'Twin/Double Room with Balcony', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(180, 4, 'Twin/Double Room with Bath', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(181, 4, 'Twin/Double Room with Bathroom', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(182, 4, 'Twin/Double Room with Garden View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(183, 4, 'Twin/Double Room with Lake View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(184, 4, 'Twin/Double Room with Mountain View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(185, 4, 'Twin/Double Room with Park View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(186, 4, 'Twin/Double Room with Pool View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(187, 4, 'Twin/Double Room with Private Bathroom', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(188, 4, 'Twin/Double Room with Sea View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(189, 4, 'Twin/Double with Park View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(190, 4, 'Twin/Double Room with Pool View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(191, 4, 'Twin/Double Room with Shared Bathroom', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(192, 4, 'Twin/Double Room with Shared Shower and Toilet', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(193, 4, 'Twin/Double Room with Shared Toilet', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(194, 4, 'Twin/Double Room with Shower', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(195, 4, 'Twin/Double Room with Terrace', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(196, 4, 'Small Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(197, 4, 'Standard Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(198, 4, 'Standard Twin/Double Room with Mountain View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(199, 4, 'Standard Twin/Double Room with Sauna', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(200, 4, 'Standard Twin/Double Room with Sea View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(201, 4, 'Standard Twin/Double Room with Shared Bathroom', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(202, 4, 'Standard Twin/Double Room with Shower', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(203, 4, 'Superior Twin/Double Room', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(204, 4, 'Superior Twin/Double Room with Lake View', 1, '2022-06-13 06:43:39', '2022-06-13 06:43:39'),
(205, 5, 'Budget Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(206, 5, 'Deluxe Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(207, 5, 'Deluxe Quadruple room with Balcony', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(208, 5, 'Deluxe Quadruple Room with Sea View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(209, 5, 'Economy Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(210, 5, 'Large Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(211, 5, 'Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(212, 5, 'Quadruple Room - Disability Access', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(213, 5, 'Quadruple Room with Balcony', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(214, 5, 'Quadruple Room with Bath', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(215, 5, 'Quadruple Room with Bathroom', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(216, 5, 'Quadruple Room with Garden View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(217, 5, 'Quadruple Room with Lake View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(218, 5, 'Quadruple Room with Mountain View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(219, 5, 'Quadruple Room with Park View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(220, 5, 'Quadruple Room with Pool View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(221, 5, 'Quadruple Room with Private Bathroom', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(222, 5, 'Quadruple Room with Sea View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(223, 5, 'Quadruple with Park View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(224, 5, 'Quadruple Room with Pool View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(225, 5, 'Quadruple Room with Shared Bathroom', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(226, 5, 'Quadruple Room with Shared Shower and Toilet', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(227, 5, 'Quadruple Room with Shared Toilet', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(228, 5, 'Quadruple Room with Shower', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(229, 5, 'Quadruple Room with Terrace', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(230, 5, 'Small Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(231, 5, 'Standard Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(232, 5, 'Standard Quadruple Room with Mountain View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(233, 5, 'Standard Quadruple Room with Sauna', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(234, 5, 'Standard Quadruple Room with Sea View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(235, 5, 'Standard Quadruple Room with Shared Bathroom', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(236, 5, 'Standard Quadruple Room with Shower', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(237, 5, 'Superior Quadruple Room', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(238, 5, 'Superior Quadruple Room with Lake View', 1, '2022-06-13 06:45:23', '2022-06-13 06:45:23'),
(239, 6, 'Budget Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(240, 6, 'Deluxe Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(241, 6, 'Deluxe Family room with Balcony', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(242, 6, 'Deluxe Family Room with Sea View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(243, 6, 'Economy Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(244, 6, 'Large Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(245, 6, 'Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(246, 6, 'Family Room - Disability Access', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(247, 6, 'Family Room with Balcony', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(248, 6, 'Family Room with Bath', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(249, 6, 'Family Room with Bathroom', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(250, 6, 'Family Room with Garden View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(251, 6, 'Family Room with Lake View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(252, 6, 'Family Room with Mountain View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(253, 6, 'Family Room with Park View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(254, 6, 'Family Room with Pool View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(255, 6, 'Family Room with Private Bathroom', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(256, 6, 'Family Room with Sea View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(257, 6, 'Family with Park View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(258, 6, 'Family Room with Pool View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(259, 6, 'Family Room with Shared Bathroom', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(260, 6, 'Family Room with Shared Shower and Toilet', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(261, 6, 'Family Room with Shared Toilet', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(262, 6, 'Family Room with Shower', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(263, 6, 'Family Room with Terrace', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(264, 6, 'Small Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(265, 6, 'Standard Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(266, 6, 'Standard Family Room with Mountain View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(267, 6, 'Standard Family Room with Sauna', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(268, 6, 'Standard Family Room with Sea View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(269, 6, 'Standard Family Room with Shared Bathroom', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(270, 6, 'Standard Family Room with Shower', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(271, 6, 'Superior Family Room', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(272, 6, 'Superior Family Room with Lake View', 1, '2022-06-13 06:46:47', '2022-06-13 06:46:47'),
(273, 7, 'Deluxe Double Studio', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(274, 7, 'Deluxe Junior Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(275, 7, 'Deluxe King Studio', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(276, 7, 'Deluxe King Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(277, 7, 'Deluxe Queen Studio', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(278, 7, 'Deluxe Queen Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(279, 7, 'Deluxe Studio', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(280, 7, 'Deluxe Suite - Disability Access', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(281, 7, 'Deluxe Suite with Balcony', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(282, 7, 'Deluxe Suite with Bath', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(283, 7, 'Deluxe Suite with Bathroom', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(284, 7, 'Deluxe Suite with Garden View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(285, 7, 'Deluxe Suite with Lake View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(286, 7, 'Deluxe Suite with Mountain View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(287, 7, 'Deluxe Suite with Park View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(288, 7, 'Deluxe Suite with Pool View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(289, 7, 'Deluxe Suite with Private Bathroom', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(290, 7, 'Deluxe Suite with Sea View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(291, 7, 'Suite with Park View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(292, 7, 'Deluxe Suite with Pool View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(293, 7, 'Deluxe Suite with Shared Bathroom', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(294, 7, 'Deluxe Suite with Shared Shower and Toilet', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(295, 7, 'Deluxe Suite with Shared Toilett', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(296, 7, 'Deluxe Suite with Shower', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(297, 7, 'Deluxe Suite with Terrace', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(298, 7, 'Small Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(299, 7, 'Standard Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(300, 7, 'Standard Suite  with Mountain View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(301, 7, 'Standard Suite  with Sauna', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(302, 7, 'Standard Suite  with Sea View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(303, 7, 'Standard Suite  with Shared Bath', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(304, 7, 'Standard Suite  with Shower', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(305, 7, 'Superior Suite', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(306, 7, 'Superior Suite  with Lake View', 1, '2022-06-13 06:55:35', '2022-06-13 06:55:35'),
(307, 8, 'Budget Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(308, 8, 'Deluxe Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(309, 8, 'Deluxe Studio room with Balcony', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(310, 8, 'Deluxe Studio Room with Sea View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(311, 8, 'Economy Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(312, 8, 'Large Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(313, 8, 'Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(314, 8, 'Studio Room - Disability Access', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(315, 8, 'Studio Room with Balcony', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(316, 8, 'Studio Room with Bath', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(317, 8, 'Studio Room with Bathroom', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(318, 8, 'Studio Room with Garden View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(319, 8, 'Studio Room with Lake View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(320, 8, 'Studio Room with Mountain View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(321, 8, 'Studio Room with Park View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(322, 8, 'Studio Room with Pool View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(323, 8, 'Studio Room with Private Bathroom', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(324, 8, 'Studio Room with Sea View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(325, 8, 'Studio with Park View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(326, 8, 'Studio Room with Pool View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(327, 8, 'Studio Room with Shared Bathroom', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(328, 8, 'Studio Room with Shared Shower and Toilet', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(329, 8, 'Studio Room with Shared Toilet', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(330, 8, 'Studio Room with Shower', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(331, 8, 'Studio Room with Terrace', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(332, 8, 'Small Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(333, 8, 'Standard Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(334, 8, 'Standard Studio Room with Mountain View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(335, 8, 'Standard Studio Room with Sauna', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(336, 8, 'Standard Studio Room with Sea View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(337, 8, 'Standard Studio Room with Shared Bathroom', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(338, 8, 'Standard Studio Room with Shower', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(339, 8, 'Superior Studio Room', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(340, 8, 'Superior Studio Room with Lake View', 1, '2022-06-13 06:55:51', '2022-06-13 06:55:51'),
(341, 9, 'Female Dormitory Room', 1, '2022-06-13 06:57:23', '2022-06-13 06:57:23'),
(342, 9, 'Male Dormitory Room', 1, '2022-06-13 06:57:23', '2022-06-13 06:57:23'),
(343, 9, 'Mixed Dormitory Rooms', 1, '2022-06-13 06:57:23', '2022-11-29 06:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `room_others_features`
--

CREATE TABLE `room_others_features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_others_features`
--

INSERT INTO `room_others_features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioner', 1, '2022-06-09 05:14:04', '2022-06-09 05:14:04'),
(2, 'Bar / Restaurant', 1, '2022-06-09 05:14:13', '2022-06-23 09:54:13'),
(3, 'Breakfast Included', 1, '2022-06-09 05:14:26', '2022-06-09 05:14:26'),
(4, 'Doorman', 1, '2022-06-09 05:14:34', '2022-06-09 05:14:34'),
(5, 'Dryer', 1, '2022-06-09 05:14:45', '2022-06-09 05:14:45'),
(6, 'Elevator in Building', 1, '2022-06-09 05:14:51', '2022-06-09 05:14:51'),
(7, 'Essentials', 1, '2022-06-09 05:15:01', '2022-06-09 05:15:01'),
(8, 'Family/Kid Friendly', 1, '2022-06-09 05:15:24', '2022-06-09 05:16:02'),
(9, 'Fax', 1, '2022-06-09 05:16:19', '2022-06-09 05:16:19'),
(10, 'Free Parking on Premises', 1, '2022-06-09 05:16:30', '2022-06-09 05:16:30'),
(11, 'Gym', 1, '2022-06-09 05:16:43', '2022-06-09 05:16:43'),
(12, 'Hand Sanitizer', 1, '2022-06-09 05:16:55', '2022-06-09 05:16:55'),
(13, 'Heating', 1, '2022-06-09 05:17:04', '2022-06-09 05:17:04'),
(14, 'Hot Tub', 1, '2022-06-09 05:17:11', '2022-06-09 05:17:11'),
(15, 'Indoor Fireplace', 1, '2022-06-09 05:17:21', '2022-06-09 05:17:21'),
(16, 'Kitchen', 1, '2022-06-09 05:17:30', '2022-06-09 05:17:30'),
(17, 'Masks', 1, '2022-06-09 05:17:39', '2022-06-09 05:17:39'),
(18, 'Mineral Water', 1, '2022-06-09 05:17:45', '2022-06-09 05:17:45'),
(19, 'Non Smoking', 1, '2022-06-09 05:17:54', '2022-06-09 05:17:54'),
(20, 'Pets Allowed', 1, '2022-06-09 05:18:02', '2022-06-09 05:18:02'),
(21, 'Pool', 1, '2022-06-09 05:18:14', '2022-06-09 05:18:14'),
(22, 'Projector(s)', 1, '2022-06-09 05:18:21', '2022-06-09 05:18:21'),
(23, 'Sanitized facility', 1, '2022-06-09 05:18:35', '2022-06-09 05:18:35'),
(24, 'Scanner/Printer', 1, '2022-06-09 05:18:44', '2022-06-23 09:49:09'),
(25, 'Smoking Allowed', 1, '2022-06-09 05:18:55', '2022-06-09 05:18:55'),
(26, 'Suitable for Events', 1, '2022-06-09 05:19:02', '2022-06-09 05:19:02'),
(27, 'TV', 1, '2022-06-09 05:19:13', '2022-06-09 05:19:13'),
(28, 'Wheelchair Accessible', 1, '2022-06-09 05:19:21', '2022-06-09 05:19:21'),
(29, 'Wireless Internet', 1, '2022-06-09 05:19:32', '2022-06-09 05:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `room_services`
--

CREATE TABLE `room_services` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_service_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_services`
--

INSERT INTO `room_services` (`id`, `room_id`, `room_service_id`, `status`, `created_at`, `updated_at`) VALUES
(333, 191, 2, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(334, 191, 7, 1, '2022-07-01 11:01:22', '2022-07-01 11:01:22'),
(1491, 933, 2, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(1492, 933, 7, 1, '2022-08-23 06:57:00', '2022-08-23 06:57:00'),
(1493, 927, 2, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(1494, 927, 7, 1, '2022-08-23 07:01:54', '2022-08-23 07:01:54'),
(1547, 945, 3, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(1548, 945, 11, 1, '2022-08-23 09:48:39', '2022-08-23 09:48:39'),
(1551, 946, 3, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(1552, 946, 11, 1, '2022-08-23 09:50:42', '2022-08-23 09:50:42'),
(1641, 878, 1, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(1642, 878, 6, 1, '2022-08-24 12:12:58', '2022-08-24 12:12:58'),
(1645, 778, 3, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(1646, 778, 11, 1, '2022-08-24 12:20:25', '2022-08-24 12:20:25'),
(1653, 874, 2, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(1654, 874, 7, 1, '2022-08-24 12:29:41', '2022-08-24 12:29:41'),
(1947, 1034, 7, 1, '2022-09-03 18:27:49', '2022-09-03 13:27:49'),
(1949, 1038, 7, 1, '2022-09-03 18:35:41', '2022-09-03 13:35:41'),
(1951, 1039, 7, 1, '2022-09-04 09:55:11', '2022-09-04 04:55:11'),
(1994, 1074, 4, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(1995, 1074, 5, 1, '2022-09-16 11:45:11', '2022-09-16 06:45:11'),
(2534, 1202, 2, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(2535, 1202, 5, 1, '2022-09-28 13:49:35', '2022-09-28 08:49:35'),
(2538, 1203, 2, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(2539, 1203, 5, 1, '2022-09-28 13:50:38', '2022-09-28 08:50:38'),
(3198, 1053, 3, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(3199, 1053, 11, 1, '2022-10-15 16:34:35', '2022-10-15 11:34:35'),
(3202, 1206, 2, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(3203, 1206, 7, 1, '2022-10-15 18:08:37', '2022-10-15 13:08:37'),
(3215, 1298, 10, 1, '2022-10-16 17:06:53', '2022-10-16 12:06:53'),
(3340, 1320, 1, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(3341, 1320, 10, 1, '2022-10-29 11:20:12', '2022-10-29 06:20:12'),
(3358, 1322, 1, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(3359, 1322, 10, 1, '2022-10-29 14:04:51', '2022-10-29 09:04:51'),
(3372, 1324, 1, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(3373, 1324, 10, 1, '2022-10-29 15:27:46', '2022-10-29 10:27:46'),
(3388, 1327, 2, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(3389, 1327, 11, 1, '2022-10-31 12:24:24', '2022-10-31 07:24:24'),
(3592, 1326, 2, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28'),
(3593, 1326, 11, 1, '2022-11-29 18:28:28', '2022-11-29 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_categories`
--

CREATE TABLE `room_type_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_type_categories`
--

INSERT INTO `room_type_categories` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Singles', 'Single', 1, '2022-06-07 08:39:16', '2022-11-29 09:39:06'),
(2, 'Double', 'Doubles', 1, '2022-06-07 08:39:42', '2022-10-17 10:37:03'),
(3, 'Twin', 'Twin', 1, '2022-06-07 08:40:04', '2022-10-17 10:37:07'),
(4, 'Twin/Double', 'Twin/Double', 1, '2022-06-07 08:40:48', '2022-10-17 10:37:10'),
(5, 'Quadruple', 'Quadruple', 1, '2022-06-07 08:42:07', '2022-10-17 10:37:13'),
(6, 'Family', 'Family', 1, '2022-06-07 08:42:19', '2022-10-17 10:37:16'),
(7, 'Suite', 'Suite', 1, '2022-06-07 08:42:35', '2022-10-17 10:37:20'),
(8, 'Studio', 'Studio', 1, '2022-06-07 08:42:48', '2022-10-17 10:37:23'),
(9, 'Dormitory', 'Dormitory', 1, '2022-06-07 08:43:18', '2022-10-17 10:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `room_video`
--

CREATE TABLE `room_video` (
  `id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scout_details`
--

CREATE TABLE `scout_details` (
  `id` int(11) NOT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `status` enum('Active','Suspended') DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `nic_upload` varchar(255) DEFAULT NULL,
  `contract_upload` varchar(255) DEFAULT NULL,
  `basic_salary` double DEFAULT NULL,
  `transport_allowance` double DEFAULT NULL,
  `other_allowance` double DEFAULT NULL,
  `other_allowance_1` double DEFAULT NULL,
  `other_allowance_2` double DEFAULT NULL,
  `gross_salary` int(11) DEFAULT NULL,
  `other_benefits` varchar(255) DEFAULT NULL,
  `hotel_commission` int(11) DEFAULT NULL,
  `tour_commision` int(11) DEFAULT NULL,
  `space_commission` int(11) DEFAULT NULL,
  `event_commission` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scout_details`
--

INSERT INTO `scout_details` (`id`, `scout_id`, `status`, `designation`, `other`, `contract_date`, `nic`, `nic_upload`, `contract_upload`, `basic_salary`, `transport_allowance`, `other_allowance`, `other_allowance_1`, `other_allowance_2`, `gross_salary`, `other_benefits`, `hotel_commission`, `tour_commision`, `space_commission`, `event_commission`, `rating`, `year`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1120, 'Active', 'Senior CEX', NULL, '2022-09-08', '878754545', '4two-gaeste-profile_picture-1667024746.jpg', '2022_07_28T06_16_35_798Z-contract_upload-1667024746.jpeg', 15000, 1000, 3000, 5000, 5000, 20000, NULL, 25, 15, 20, 30, 33, 2022, 'remarks', '2022-10-29 11:55:46', '2022-10-29 06:25:46'),
(4, 1119, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'remark', '2022-10-01 17:58:05', '2022-10-01 12:28:05'),
(5, 1116, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 15:57:32', '2022-09-30 10:57:32'),
(6, 1115, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 15:57:53', '2022-09-30 10:57:53'),
(7, 1114, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 15:58:13', '2022-09-30 10:58:13'),
(8, 1085, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-30 15:58:42', '2022-09-30 10:58:42'),
(9, 1084, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'remarks', '2022-10-01 18:00:23', '2022-10-01 12:30:23'),
(10, 1083, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'remarks', '2022-10-01 18:01:03', '2022-10-01 12:31:03'),
(11, 557, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'remarks', '2022-10-01 18:02:13', '2022-10-01 12:32:13'),
(12, 477, 'Active', 'CEX', NULL, '2022-09-30', '7878787', 'back-profile_picture-1667629929.jpg', 'front-contract_upload-1667629929.jpg', 50000, 100, 23, 12, 12, 6000, NULL, 1, 1, 22, 11, 5, 2012, 'sadsad', '2022-11-05 12:02:09', '2022-11-05 06:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `scout_performance_rating`
--

CREATE TABLE `scout_performance_rating` (
  `id` int(11) NOT NULL,
  `scout_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `remarks` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `scout_performance_rating`
--

INSERT INTO `scout_performance_rating` (`id`, `scout_id`, `rating`, `year`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(2, 1120, 5, 2015, 'Hello Test Best', 1, '2022-09-07 09:57:44', '2022-09-07 10:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

CREATE TABLE `services_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `service_name_type` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services_type`
--

INSERT INTO `services_type` (`id`, `name`, `service_name_type`, `status`) VALUES
(1, 'Entertainment and family services', 'Entertainment_and_family_services', 1),
(2, 'Services & Extras', 'Services_&_Extras', 1);

-- --------------------------------------------------------

--
-- Table structure for table `space`
--

CREATE TABLE `space` (
  `space_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `space_user_id` int(11) DEFAULT NULL COMMENT '1="Admin", "id"="Vendor"',
  `is_admin` int(11) DEFAULT 1,
  `space_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'room_default_img.jpg',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_document` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `scout_id` int(11) NOT NULL,
  `booking_option` tinyint(2) DEFAULT 1 COMMENT '1="Instant",2="Approval"',
  `payment_mode` tinyint(2) DEFAULT 1 COMMENT '1="Online",2="Parital",0="Offline"',
  `online_payment_percentage` varchar(255) DEFAULT NULL,
  `at_desk_payment_percentage` varchar(255) DEFAULT NULL,
  `cancel_policy` text DEFAULT NULL,
  `min_hrs` int(11) DEFAULT NULL,
  `max_hrs` int(11) DEFAULT NULL,
  `min_hrs_percentage` int(11) DEFAULT NULL,
  `max_hrs_percentage` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `reserv_date_change_allow` tinyint(2) DEFAULT 0 COMMENT '1="Allow",0=Not Allow',
  `guest_number` int(11) NOT NULL,
  `price_per_night` double NOT NULL,
  `tax_percentage` int(11) DEFAULT NULL,
  `price_per_night_7d` double NOT NULL,
  `price_per_night_30d` int(11) NOT NULL,
  `is_guest_allow` tinyint(2) DEFAULT 0,
  `extra_guest_per_night` double DEFAULT 0,
  `is_above_guest_cap` tinyint(2) DEFAULT 0,
  `is_pay_by_num_guest` tinyint(2) DEFAULT 0,
  `room_size` int(11) DEFAULT NULL,
  `room_number` int(11) DEFAULT NULL,
  `bedroom_number` int(11) DEFAULT NULL,
  `bathroom_number` int(11) DEFAULT NULL,
  `checkin_hr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `checkout_hr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `late_checkin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cleaning_fee` double NOT NULL DEFAULT 0,
  `cleaning_fee_type` enum('single_fee','per_night','per_guest','per_night_per_guest') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `city_fee` double NOT NULL DEFAULT 0,
  `city_fee_type` enum('single_fee','per_night','per_guest','per_night_per_guest') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `security_deposite` int(11) DEFAULT NULL,
  `earlybird_discount` int(11) DEFAULT NULL,
  `min_days_in_advance` int(11) DEFAULT NULL,
  `bed_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `private_bathroom` int(11) NOT NULL COMMENT '1=yes,0=no',
  `private_entrance` int(11) NOT NULL COMMENT '1=yes,0=no',
  `optional_services` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `family_friendly` int(11) NOT NULL COMMENT '1=yes,0=no',
  `outdoor_facilities` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `extra_people` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cancellation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_country` int(11) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `neighbor_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_latitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_longitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_contact_num` int(11) DEFAULT NULL,
  `operator_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `operator_booking_num` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `copy_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space`
--

INSERT INTO `space` (`space_id`, `category_id`, `sub_category_id`, `space_user_id`, `is_admin`, `space_name`, `image`, `description`, `notes`, `space_document`, `scout_id`, `booking_option`, `payment_mode`, `online_payment_percentage`, `at_desk_payment_percentage`, `cancel_policy`, `min_hrs`, `max_hrs`, `min_hrs_percentage`, `max_hrs_percentage`, `commission`, `reserv_date_change_allow`, `guest_number`, `price_per_night`, `tax_percentage`, `price_per_night_7d`, `price_per_night_30d`, `is_guest_allow`, `extra_guest_per_night`, `is_above_guest_cap`, `is_pay_by_num_guest`, `room_size`, `room_number`, `bedroom_number`, `bathroom_number`, `checkin_hr`, `checkout_hr`, `late_checkin`, `cleaning_fee`, `cleaning_fee_type`, `city_fee`, `city_fee_type`, `security_deposite`, `earlybird_discount`, `min_days_in_advance`, `bed_type`, `private_bathroom`, `private_entrance`, `optional_services`, `family_friendly`, `outdoor_facilities`, `extra_people`, `cancellation`, `space_address`, `space_country`, `city`, `neighbor_area`, `zip_code`, `province`, `space_latitude`, `space_longitude`, `operator_name`, `operator_contact_name`, `operator_contact_num`, `operator_email`, `operator_booking_num`, `status`, `copy_status`, `created_at`, `updated_at`) VALUES
(473, 23, 13, 934, 0, 'Disco Apartment', 'pexels-pixabay-164595-spaceMainImg-1660131932.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Admin  Dashboard (2)-1664612992.pdf', 477, 2, 0, '70', '30', 'dfgdf dgdfg', 72, 120, 30, 20, NULL, 1, 12, 2000, 1500, 14000, 60000, 0, 0, 0, 0, 5, 5, 3, 5, '7:00 AM', '6:00 PM', '10:00 AM', 200, 'single_fee', 100, 'single_fee', 2500, 1500, 2, 'Double bed', 1, 1, 'board games', 1, 'parking', '2', '1000', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', 166, 'Lahore', 'Walled City of Lahore', '54000', 'Punjab', '31.5762848', '74.3213639', 'shaikh op', 'Swayam', 942509544, 'shaikh@gmail.com', 123456789, 1, 1, '2022-08-10 11:45:32', '2022-11-03 12:11:00'),
(636, 23, 10, 1, 1, 'spacee', 'pexels-amar-saleem-91628-spaceMainImg-1663050050.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 1119, 1, 1, NULL, NULL, 'sdf sdf', 96, 192, 30, 10, NULL, 0, 25, 2000, 1500, 14000, 60000, 0, 0, 0, 0, 5, 1, 1, 1, '3:00 AM', '5:00 PM', '8:00 AM', 200, 'single_fee', 100, 'single_fee', 2500, 1500, 2, 'Double bed', 1, 1, 'Yes', 1, 'Yes', '4', 'yes', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', 166, 'Lahore', 'Walled City of Lahore', '54000', 'Punjab', '31.5762848', '74.3213639', 'ab', 'cd', 2147483647, 'ab@gmail.com', 2147483647, 1, 1, '2022-09-13 06:20:50', '2022-11-29 06:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `space_amenities`
--

CREATE TABLE `space_amenities` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `space_bedroom_type`
--

CREATE TABLE `space_bedroom_type` (
  `bedroom_type_id` int(11) NOT NULL,
  `bedroom_name` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_bedroom_type`
--

INSERT INTO `space_bedroom_type` (`bedroom_type_id`, `bedroom_name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Single', 'Single', 1, '2022-06-07 08:39:16', '2022-07-07 05:39:07'),
(2, 'Double', 'Double', 1, '2022-06-07 08:39:42', '2022-06-21 10:55:22'),
(3, 'Twin', 'Twin', 1, '2022-06-07 08:40:04', '2022-06-07 08:40:04'),
(4, 'Twin/Double', 'Twin/Double', 1, '2022-06-07 08:40:48', '2022-06-07 08:40:48'),
(5, 'Quadruple', 'Quadruple', 1, '2022-06-07 08:42:07', '2022-06-07 08:42:07'),
(6, 'Family', 'Family', 1, '2022-06-07 08:42:19', '2022-06-07 08:42:19'),
(7, 'Suite', 'Suite', 1, '2022-06-07 08:42:35', '2022-06-07 08:42:35'),
(8, 'Studio', 'Studio', 1, '2022-06-07 08:42:48', '2022-06-07 08:42:48'),
(9, 'Dormitory', 'Dormitory', 1, '2022-06-07 08:43:18', '2022-06-07 08:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `space_booking`
--

CREATE TABLE `space_booking` (
  `id` int(11) NOT NULL,
  `space_booking_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `space_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_token` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `cancel_reason` varchar(255) DEFAULT NULL,
  `cancel_details` text DEFAULT NULL,
  `canceled_at` datetime DEFAULT NULL,
  `refund_processed_at` datetime DEFAULT NULL,
  `refund_credited_at` datetime DEFAULT NULL,
  `refund_amount` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `booking_status` enum('pending','processing','canceled','confirmed') NOT NULL,
  `refund_status` enum('pending','processing','canceled','confirmed') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_booking`
--

INSERT INTO `space_booking` (`id`, `space_booking_id`, `space_id`, `user_id`, `check_in_date`, `check_out_date`, `total_days`, `total_room`, `total_member`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `payment_id`, `payment_token`, `payer_id`, `cancel_reason`, `cancel_details`, `canceled_at`, `refund_processed_at`, `refund_credited_at`, `refund_amount`, `payment_type`, `payment_status`, `booking_status`, `refund_status`, `created_at`, `updated_at`) VALUES
(212, 'RnS-B-2B8I5', 473, 1151, '2022-11-11', '2022-11-17', 6, 5, 12, 13800.00, 0, 0.00, 13800.00, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Offline', 'pending', 'pending', '2022-10-26 17:46:40', '2022-10-26 12:16:40'),
(213, 'RnS-B-IT99B', 473, 347, '2022-11-19', '2022-11-23', 4, 5, 12, 9800.00, 0, 0.00, 9800.00, '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'Offline', 'pending', 'pending', '2022-10-26 17:54:39', '2022-10-26 12:24:39'),
(214, 'RnS-B-RYKPL', 473, 1079, '2022-11-25', '2022-11-28', 3, 5, 12, 7800.00, 1, 5460.00, 2340.00, '1749316', '030614410060', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Paid', 'confirmed', 'pending', '2022-10-26 18:16:03', '2022-10-26 12:46:03'),
(215, 'RnS-B-X0OLN', 636, 1079, '2022-11-16', '2022-11-17', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '642374', '622131339741', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Paid', 'confirmed', 'pending', '2022-10-27 10:40:22', '2022-10-27 05:10:22'),
(223, 'RnS-B-CWQBN', 636, 837, '2022-11-03', '2022-11-04', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '1100700', '817754926814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'Paid', 'confirmed', 'pending', '2022-11-03 14:46:21', '2022-11-03 09:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `space_booking_request`
--

CREATE TABLE `space_booking_request` (
  `id` int(11) NOT NULL,
  `space_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_status` int(11) DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `invoice_num` varchar(255) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_days` int(11) NOT NULL,
  `discount_name` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `expense_name` varchar(255) DEFAULT NULL,
  `expense_value` int(11) DEFAULT NULL,
  `cleaning_fee` double(10,2) DEFAULT NULL,
  `city_fee` double(10,2) DEFAULT NULL,
  `tax_percentage` double(10,2) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `last_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `space_booking_request`
--

INSERT INTO `space_booking_request` (`id`, `space_id`, `user_id`, `request_status`, `approve_status`, `payment_status`, `invoice_num`, `check_in_date`, `check_out_date`, `total_days`, `discount_name`, `discount`, `expense_name`, `expense_value`, `cleaning_fee`, `city_fee`, `tax_percentage`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `last_date`, `last_time`, `created_at`, `updated_at`) VALUES
(39, 473, 837, 1, 0, 0, NULL, '2022-11-26', '2022-11-27', 1, NULL, NULL, NULL, NULL, 200.00, 100.00, 1500.00, 3800.00, 0, NULL, NULL, '2022-11-27', '10:35:00', '2022-11-26 10:35:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `space_booking_temp`
--

CREATE TABLE `space_booking_temp` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `paccess_token` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `space_id` int(11) DEFAULT NULL,
  `space_start_date` date DEFAULT NULL,
  `space_end_date` date DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_booking_temp`
--

INSERT INTO `space_booking_temp` (`id`, `payment_id`, `paccess_token`, `token_id`, `user_id`, `space_id`, `space_start_date`, `space_end_date`, `total_days`, `total_room`, `total_member`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `created_at`, `updated_at`) VALUES
(228, '774012', NULL, NULL, 1, 473, '2022-10-21', '2022-10-22', 1, 5, 12, 3800.00, 1, 2660.00, 1140.00, '2022-10-19 15:37:53', '2022-10-19 10:07:53'),
(229, '1174306', NULL, NULL, 1, 473, '2022-10-21', '2022-10-22', 1, 5, 12, 3800.00, 1, 2660.00, 1140.00, '2022-10-19 15:39:36', '2022-10-19 10:09:36'),
(230, '129655', NULL, NULL, 1, 473, '2022-11-22', '2022-11-24', 2, 5, 12, 5800.00, 0, 5800.00, 0.00, '2022-10-21 14:40:38', '2022-10-21 09:10:38'),
(231, '1749316', NULL, NULL, 1, 473, '2022-11-25', '2022-11-28', 3, 5, 12, 7800.00, 1, 5460.00, 2340.00, '2022-10-26 18:11:08', '2022-10-26 12:41:08'),
(232, '1184880', NULL, NULL, 1, 473, '2022-12-06', '2022-12-09', 3, 5, 12, 7800.00, 0, 7800.00, 0.00, '2022-10-26 18:46:30', '2022-10-26 13:16:30'),
(233, '642374', NULL, NULL, 1, 636, '2022-11-16', '2022-11-17', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-10-27 10:38:27', '2022-10-27 05:08:27'),
(241, '1100700', NULL, NULL, 1, 636, '2022-11-03', '2022-11-04', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-03 14:44:29', '2022-11-03 09:14:29'),
(255, '389563', NULL, NULL, 1, 636, '2022-11-18', '2022-11-19', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-18 12:25:41', '2022-11-18 06:55:41'),
(258, '218119', NULL, NULL, 1, 636, '2022-11-22', '2022-11-23', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-22 15:54:51', '2022-11-22 10:24:51'),
(260, '866081', NULL, NULL, 1, 636, '2022-11-25', '2022-11-26', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-25 11:36:11', '2022-11-25 06:06:11'),
(261, '651730', NULL, NULL, 1, 636, '2022-11-28', '2022-11-29', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-28 12:11:14', '2022-11-28 06:41:14'),
(262, '1164720', NULL, NULL, 1, 636, '2022-11-28', '2022-11-29', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-28 12:24:43', '2022-11-28 06:54:43'),
(264, '211631', NULL, NULL, 1, 636, '2022-11-28', '2022-11-29', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-28 16:15:52', '2022-11-28 10:45:52'),
(265, '1225993', NULL, NULL, 1, 636, '2022-11-28', '2022-11-29', 1, 1, 25, 3800.00, 0, 3800.00, 0.00, '2022-11-28 16:29:57', '2022-11-28 10:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `space_categories`
--

CREATE TABLE `space_categories` (
  `scat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `space_cat_image` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_categories`
--

INSERT INTO `space_categories` (`scat_id`, `category_name`, `space_cat_image`, `details`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Apartment', 'apartments-spaceCatImg-1659781884.png', NULL, 1, '2022-07-20 07:28:55', '2022-08-06 10:31:24'),
(24, 'B & B', 'private-room-spaceCatImg-1659781908.png', NULL, 1, '2022-07-20 07:29:07', '2022-08-06 10:31:48'),
(25, 'Cabin', 'cabin-spaceCatImg-1659781917.png', NULL, 1, '2022-07-20 07:29:17', '2022-08-06 10:31:57'),
(26, 'Condos', 'condos-spaceCatImg-1659781929.png', NULL, 1, '2022-07-20 07:29:24', '2022-08-06 10:32:09'),
(27, 'Coworking space', 'co-work-spaceCatImg-1659781938.png', NULL, 1, '2022-07-20 07:29:32', '2022-08-06 10:32:18'),
(28, 'Dorm', 'cabin-spaceCatImg-1659781974.png', NULL, 1, '2022-07-20 07:29:40', '2022-08-06 10:32:54'),
(29, 'House', 'house-spaceCatImg-1659781984.png', NULL, 1, '2022-07-20 07:29:46', '2022-10-17 10:51:13'),
(30, 'Villaa', 'villa-spaceCatImg-1659781993.png', NULL, 1, '2022-07-20 07:29:55', '2022-11-25 04:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `space_custom_details`
--

CREATE TABLE `space_custom_details` (
  `custom_id` int(11) NOT NULL,
  `custom_label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `custom_quantity` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_custom_details`
--

INSERT INTO `space_custom_details` (`custom_id`, `custom_label`, `custom_quantity`, `space_id`, `status`, `created_at`, `updated_at`) VALUES
(273, 'abcd', 1234, 686, 1, '2022-09-22 12:18:27', '2022-09-22 07:18:27'),
(274, 'pqrs', 1478, 686, 1, '2022-09-22 12:18:27', '2022-09-22 07:18:27'),
(1047, 'Ayesha Zahid', 2, 473, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1119, 'abv', 2, 636, 1, '2022-11-29 11:55:32', '2022-11-29 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `space_extra_option`
--

CREATE TABLE `space_extra_option` (
  `ext_id` int(11) NOT NULL,
  `ext_opt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ext_opt_price` int(11) NOT NULL,
  `ext_opt_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `space_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_extra_option`
--

INSERT INTO `space_extra_option` (`ext_id`, `ext_opt_name`, `ext_opt_price`, `ext_opt_type`, `space_id`, `status`, `created_at`, `updated_at`) VALUES
(247, 'abd12', 123, 'single_fee', 686, 1, '2022-09-22 12:18:27', '2022-09-22 07:18:27'),
(945, 'Extra bed', 500, 'single_fee', 473, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1017, 'pqrs', 4984546, 'single_fee', 636, 1, '2022-11-29 11:55:32', '2022-11-29 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `space_features`
--

CREATE TABLE `space_features` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `space_feature_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_features`
--

INSERT INTO `space_features` (`id`, `space_id`, `space_feature_id`, `status`, `created_at`, `updated_at`) VALUES
(625, 686, 5, 1, '2022-09-22 12:18:27', '2022-09-22 07:18:27'),
(1355, 473, 26, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1356, 473, 27, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1357, 473, 28, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1358, 473, 29, 1, '2022-11-03 17:41:00', '2022-11-03 12:41:00'),
(1430, 636, 1, 1, '2022-11-29 11:55:32', '2022-11-29 06:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `space_features_list`
--

CREATE TABLE `space_features_list` (
  `space_feature_id` int(11) NOT NULL,
  `space_feature_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_features_list`
--

INSERT INTO `space_features_list` (`space_feature_id`, `space_feature_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioner', 1, '2022-06-09 05:14:04', '2022-06-09 05:14:04'),
(2, 'Bar / Restaurant', 1, '2022-06-09 05:14:13', '2022-06-23 09:54:13'),
(3, 'Breakfast Included', 1, '2022-06-09 05:14:26', '2022-06-09 05:14:26'),
(4, 'Doorman', 1, '2022-06-09 05:14:34', '2022-06-09 05:14:34'),
(5, 'Dryer', 1, '2022-06-09 05:14:45', '2022-06-09 05:14:45'),
(6, 'Elevator in Building', 1, '2022-06-09 05:14:51', '2022-06-09 05:14:51'),
(7, 'Essentials', 1, '2022-06-09 05:15:01', '2022-06-09 05:15:01'),
(8, 'Family/Kid Friendly', 1, '2022-06-09 05:15:24', '2022-06-09 05:16:02'),
(9, 'Fax', 1, '2022-06-09 05:16:19', '2022-06-09 05:16:19'),
(10, 'Free Parking on Premises', 1, '2022-06-09 05:16:30', '2022-06-09 05:16:30'),
(11, 'Gym', 1, '2022-06-09 05:16:43', '2022-06-09 05:16:43'),
(12, 'Hand Sanitizer', 1, '2022-06-09 05:16:55', '2022-06-09 05:16:55'),
(13, 'Heating', 1, '2022-06-09 05:17:04', '2022-06-09 05:17:04'),
(14, 'Hot Tub', 1, '2022-06-09 05:17:11', '2022-06-09 05:17:11'),
(15, 'Indoor Fireplace', 1, '2022-06-09 05:17:21', '2022-06-09 05:17:21'),
(16, 'Kitchen', 1, '2022-06-09 05:17:30', '2022-06-09 05:17:30'),
(17, 'Masks', 1, '2022-06-09 05:17:39', '2022-06-09 05:17:39'),
(18, 'Mineral Water', 1, '2022-06-09 05:17:45', '2022-06-09 05:17:45'),
(19, 'Non Smoking', 1, '2022-06-09 05:17:54', '2022-06-09 05:17:54'),
(20, 'Pets Allowed', 1, '2022-06-09 05:18:02', '2022-06-09 05:18:02'),
(21, 'Pool', 1, '2022-06-09 05:18:14', '2022-06-09 05:18:14'),
(22, 'Projector(s)', 1, '2022-06-09 05:18:21', '2022-06-09 05:18:21'),
(23, 'Sanitized facility', 1, '2022-06-09 05:18:35', '2022-06-09 05:18:35'),
(24, 'Scanner/Printer', 1, '2022-06-09 05:18:44', '2022-06-23 09:49:09'),
(25, 'Smoking Allowed', 1, '2022-06-09 05:18:55', '2022-06-09 05:18:55'),
(26, 'Suitable for Events', 1, '2022-06-09 05:19:02', '2022-06-09 05:19:02'),
(27, 'TV', 1, '2022-06-09 05:19:13', '2022-06-09 05:19:13'),
(28, 'Wheelchair Accessible', 1, '2022-06-09 05:19:21', '2022-06-09 05:19:21'),
(29, 'Wireless Internet', 1, '2022-06-09 05:19:32', '2022-06-09 05:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `space_gallery`
--

CREATE TABLE `space_gallery` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '1=is_featured',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '"1" => default',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_gallery`
--

INSERT INTO `space_gallery` (`id`, `space_id`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(860, 473, '1660131932_pexels-donald-tong-189296.jpg', 0, 1, '2022-08-10 11:45:32', '2022-08-10 11:45:32'),
(861, 473, '1660131932_pexels-pixabay-164595.jpg', 0, 1, '2022-08-10 11:45:32', '2022-08-10 11:45:32'),
(862, 473, '1660131932_pexels-pixabay-258154.jpg', 0, 1, '2022-08-10 11:45:32', '2022-08-10 11:45:32'),
(863, 473, '1660131932_pexels-pixabay-271624.jpg', 0, 1, '2022-08-10 11:45:32', '2022-08-10 11:45:32'),
(864, 473, '1660131932_pexels-pixabay-271639.jpg', 0, 1, '2022-08-10 11:45:32', '2022-08-10 11:45:32'),
(872, 636, '1663050050_pexels-amar-saleem-91628.jpg', 0, 1, '2022-09-13 06:20:50', '2022-09-13 01:20:50'),
(873, 636, '1663050050_pexels-asad-photo-maldives-2549018.jpg', 0, 1, '2022-09-13 06:20:50', '2022-09-13 01:20:50'),
(874, 636, '1663050050_pexels-ben-cheung-441379.jpg', 0, 1, '2022-09-13 06:20:50', '2022-09-13 01:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `space_sub_categories`
--

CREATE TABLE `space_sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `space_sub_categories`
--

INSERT INTO `space_sub_categories` (`sub_cat_id`, `sub_category_name`, `details`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Condos', 'Condos', 1, '2022-07-16 09:55:22', '2022-10-14 11:50:34'),
(11, 'Private Room with bath', NULL, 1, '2022-07-20 10:51:09', '2022-10-14 11:50:32'),
(13, 'Lower Portion', NULL, 1, '2022-07-20 11:04:23', '2022-10-14 11:50:30'),
(14, 'Upper Portion', NULL, 1, '2022-07-20 11:04:35', '2022-11-25 04:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `banner` text NOT NULL,
  `page_url_text` text NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `banner`, `page_url_text`, `heading`, `content`, `created_at`, `updated_at`) VALUES
(1, 'terms1.jpg', 'terms_&_condition', 'TERMS AND CONDITIONS', '<ol>\r\n	<li>Terms for Accommodations products and services.</li>\r\n</ol>\r\n\r\n<p>Contractual understanding</p>\r\n\r\n<ol>\r\n	<li>R&amp;S not a &lsquo;contractual party&rsquo; to your booking when made to any Service Provider</li>\r\n	<li>R&amp;S owns and operates the Platform.</li>\r\n	<li>R&amp;S only shows staycation and tours that have a commercial relationship with us, and it doesn&rsquo;t necessarily show all their products or services.</li>\r\n	<li>Information about Service Providers (e.g. facilities, house rules and sustainability measures) and their Travel Experiences (e.g. prices, availability and cancellation policies) is based on what they provide to us. They&rsquo;re responsible for making sure it&rsquo;s accurate and up to date.</li>\r\n</ol>\r\n\r\n<p>What we will do</p>\r\n\r\n<ol>\r\n	<li>R&amp;S provides a Platform on which Service Providers can promote and sell their Rooms and Accommodations &ndash; and a customer can freely search, compare and book them.</li>\r\n	<li>Once a booking is made, we will provide you and the Service Provider with details of your Booking with names.</li>\r\n	<li>Based on the terms of your Booking, we may be able to help you change or cancel upon your wish or situation.</li>\r\n</ol>\r\n\r\n<p>What you need to do</p>\r\n\r\n<ol>\r\n	<li>Provide your contact details correctly, so we and/or the Service Provider can process the booking and confirm it. If necessary we can contact you.</li>\r\n	<li>Read these Terms and the terms displayed during the booking process carefully.</li>\r\n	<li>Take care of the Accommodation and its furniture, fixtures, electronics and other contents, and leave things in the same state they were when you got there. If anything is broken, damaged or lost, make sure you report it to the staff there (as soon as you can, and certainly before you check out).</li>\r\n	<li>Maintain the security of the Accommodation and its contents during your stay. So don&rsquo;t, for example, leave doors or windows unlocked.</li>\r\n</ol>\r\n\r\n<p>Price and payment</p>\r\n\r\n<p>We Price Match</p>\r\n\r\n<ol>\r\n	<li>R&amp;S wants the best possible result for your price every time. Once you book your Accommodation with us and you find the same Accommodation (with the same conditions) for less on another website, we shall refund the difference, subject to conditions.</li>\r\n</ol>\r\n\r\n<p>Partner offer</p>\r\n\r\n<ol>\r\n	<li>Some offers on our Platform are marked as &#39;Partner offers&#39;, which means they come to us through a R&amp;S partner company, rather than straight from a Service Provider or us. Unless otherwise indicated, any Partner offer that you reserve:\r\n	<ul>\r\n		<li>Must be paid for at the time of booking</li>\r\n		<li>Can&#39;t be modified. However, if it offers free cancellation, you will be able to cancel it for free, as long as you do it in time.</li>\r\n		<li>Can&#39;t be combined with any other offers (promotions, incentives or rewards)</li>\r\n		<li>Can&#39;t be scored or reviewed on our Platform. Price incentives</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<ol>\r\n	<li>Some of the price reductions you see are funded by us, not by the Service Provider. We simply pay some of the cost ourselves.</li>\r\n</ol>\r\n\r\n<p>Damage Policy</p>\r\n\r\n<ol>\r\n	<li>When you&rsquo;re booking, you may see that some Service Providers refer to a &lsquo;damage policy&rsquo;. This means that if anyone in your group loses or damages anything:\r\n	<ul>\r\n		<li>you should inform the Service Provider</li>\r\n		<li>instead of charging you for it directly, the Service Provider will have 14 days to submit a damage payment request through our Platform, under your reservation number</li>\r\n		<li>if they do, we&rsquo;ll tell you, so you can tell us if you have any comments, and whether or not you agree with the charge - and then:\r\n		<ul>\r\n			<li>if you agree, we&rsquo;ll charge you on their behalf</li>\r\n			<li>if you disagree, we&rsquo;ll look into it and decide whether or not to discuss it further*.</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>Any payment you make would be between the Service Provider and you &ndash; we&rsquo;d just be organising it on the Service Provider&rsquo;s behalf.</li>\r\n	<li>The damage policy doesn&rsquo;t relate to general cleaning, ordinary wear and tear, any crimes (such as theft), or any non-physical &lsquo;damages&rsquo; (e.g. fines for smoking or bringing pets).</li>\r\n</ol>\r\n\r\n<p>How We Work</p>\r\n\r\n<p>Scope of this section</p>\r\n\r\n<ol>\r\n	<li>This section contains the specific terms for Attractions products and services.</li>\r\n</ol>\r\n\r\n<p>Contractual relationship</p>\r\n\r\n<ol>\r\n	<li>We do not (re)sell, offer or provide any Attractions on our own behalf - when you book an Attraction, you enter into a contract directly with (a) the Service Provider or (b) a Third-Party Aggregator (if they&rsquo;re reselling the Attraction), as disclosed during the booking process.</li>\r\n	<li>We act solely as the Platform and are not involved in the Third-Party Terms. We are not responsible for your ticket and (to the fullest extent permitted by law) have no liability to you in relation to your Booking.</li>\r\n</ol>\r\n\r\n<p>What we will do</p>\r\n\r\n<ol>\r\n	<li>We provide the Platform on which Service Providers and (from time to time) Third-Party Aggregators can promote and sell Travel Experiences &ndash; and you can search for, compare and book them.</li>\r\n	<li>Once you&rsquo;ve booked your Attraction, we&rsquo;ll provide you and the Service Provider with details of the Booking; if the Service Provider needs more than your name, we&rsquo;ll tell you at the time of booking.</li>\r\n	<li>Depending on the terms of your Booking, we may be able to help you change or cancel it if you wish to.</li>\r\n</ol>\r\n\r\n<p>What you need to do</p>\r\n\r\n<ol>\r\n	<li>You must fill in all your contact details correctly, so we and/or the Service Provider can provide you with information about your Booking and, if necessary, contact you.</li>\r\n	<li>You must read and agree to comply with our Terms and the Third-Party Terms (which will be displayed at checkout) &ndash; and acknowledge that breaching them may lead to additional charges and/or the cancellation of your Booking.</li>\r\n</ol>\r\n\r\n<p>Cancellations</p>\r\n\r\n<p>If you cancel:</p>\r\n\r\n<ul>\r\n	<li>MORE THAN 48 hours before your rental is due to start, you&rsquo;ll receive a full refund.</li>\r\n	<li>LESS THAN 48 hours before, or while you&rsquo;re at the rental counter, we&rsquo;ll refund what you paid minus the cost of 3 days of your rental - so there won&rsquo;t be any refund if your car was booked for 3 days or less.</li>\r\n	<li>AFTER your rental is due to start (or you just don&rsquo;t turn up) you&rsquo;ll receive no refund.</li>\r\n</ul>', '2022-09-09 11:28:22', '2022-09-14 00:20:54'),
(2, 'about2.jpg', 'list-your-property', 'List your property', '<p>List your property, it is easy, safe, and free. Start your business or list your business and grow with us. Make a decent profit by extending your hospitality to others through our powerful platform. We will provide the marketing, insights and tools to help you grow and prosper. Confidently project yourself in Pakistan and Internationally.</p>', '2022-09-12 11:47:56', '2022-09-12 12:32:16'),
(3, 'cancel1.jpg', 'cancellation-policy', 'Cancellation Policy', '<p>Hosts and Guests are responsible for any modifications to a booking that they make via the Ventura Platform or direct Ventura customer service to make &ldquo;Booking Modifications&rdquo;, and agree to pay any additional Listing Fees, Host Fees or Guest Fees and/or Taxes associated with such Booking Modifications</p>\r\n\r\n<p>Any cancelation from the host and guests will be administered on the following grounds:</p>\r\n\r\n<p>Cancellation by host:</p>\r\n\r\n<ul>\r\n	<li>If the host cancels any confirmed booking with a time period, which is greater than or equal to 24 hours from the time of booking, the full amount will be refunded to the guest minus any transaction charges.</li>\r\n	<li>If the host cancels any confirmed booking with a time period, which is less than 24 hours from the time of booking, the full amount will be refunded to the guest but the host&rsquo;s account will be credited with 10% of the booking amount. Road N Stays will deduct this amount from the host at the time of settling invoices with the host.</li>\r\n</ul>\r\n\r\n<p>Cancellation by guest:</p>\r\n\r\n<ul>\r\n	<li>If the guest cancels any confirmed booking with a time period, which is greater than or equal to 24 hours from the time of booking, the full amount will be refunded to the guest minus any transaction charges.</li>\r\n	<li>If the guest cancels any confirmed booking with a time period, which is less than 24 hours from the time of booking, guest will not be eligible for any refunds.</li>\r\n	<li>For the cancellation and refund, please send email to Ventura Customer Service at&nbsp;cancellations@roadnstays.com&nbsp;with booking ID, invoice, and brief detail.</li>\r\n	<li>All payments to hosts and guests from any event triggered through the Road N Stays booking portal will be done off-line through Road N Stays clearing house.</li>\r\n	<li>All financial settlements resulting from all events triggered from Road N Stays will be cleared on the 15th of each month or agreed otherwise.</li>\r\n</ul>\r\n\r\n<p>The cancellation policy is valid till 31 December 2022. After that cancellation time period will change and communicated in the updated cancellation policy.</p>', '2022-09-12 11:53:57', '2022-09-13 07:30:41'),
(4, 'privacy1.jpg', 'privacy-policy', 'Privacy Policy', '<ul>\r\n  <li>1. INTRODUCTION</li>\r\n  \r\n</ul>\r\n<p>Thank you for using RoadNStays! Trust is an important virtue and the information that’s shared with us helps us to provide a great experience with RoadNStays. Our privacy team is committed to protecting all the personal information. This purpose of the Privacy Policy is to layout the principles on how we collect, use, process, and disclose your personal information, in conjunction with your access to and use of the RoadNStays Platform and the Payment gateways. Please read the privacy policy on the applicable site.\r\n</p>\r\n\r\n<h6>1.1. Definitions</h6>\r\n<p>If you see an undefined term in this Privacy Policy (such as “Listing” or “RoadNStays Platform”), it has the same definition as in our Terms of Service (“Terms”).</p>\r\n<h6>1.2. Data Controller\r\n</h6>\r\n<p>When this policy mentions “RoadNStays,” “we,” “us,” or “our,” it refers to the RoadNStays company that is responsible for your information under this Privacy Policy. As the current operations are hosted in Pakistan so the data controller remains RoadNStays, Pakistan.\r\n</p>\r\n<h6>1.3. Applicability to Payments</h6>\r\n<p>This Privacy Policy also applies to the Payment gateways provided to you by Payment gateways pursuant to laws and regulations of the State Bank of Pakistan. When using the Payment gateways, you will be also providing your information, including personal information, to one or more externa Payments gateways, which will also be the Data\r\n  Controller (the “Payments Data Controller”) of your information related to the Payment gateways. In all cases, RoadNStays payment gateways are fully regulated and may process any personal information according to enforced regulations and lawsenforced by State Bank of Pakistan and the Government of Pakistan. Please see the Contact Us section below for contact details of the Data Controllers and Payments Data Controllers.\r\n  </p>\r\n  <ul>\r\n    <li>2. COLLECTED INFORMATION</li>\r\n  </ul>\r\n  <p>Given below are general categories of information we collect.</p>\r\n  <h6>2.1. Mandatory Information\r\n  </h6>\r\n  <p>This information is necessary for the adequate performance of the contract between you and us and to allow us to comply with our legal obligations. Without it, we may not be able to provide you with all the requested services.\r\n  </p>\r\n  <p><span>Account Information</span>When you sign up for an RoadNStays Account, we require certain information such as your first name, last name, email address, and date of birth</p>\r\n  <p><span>Profile and Listing Information</span>To use certain features of the RoadNStays Platform (such as booking or creating a Listing), we may ask you to provide additional information, which may include your address, phone number, and a profile picture</p>\r\n  <p><span>Identity Verification Information. </span>To help create and maintain a trusted environment, we may collect identity verification information (such as images of your government issued ID, passport, national ID card, or driving license, as permitted by applicable laws) or other authentication information.\r\n  </p>\r\n  <p><span>Payment Information</span>To use certain features of the RoadNStays Platform (such as booking or creating a Listing), we may require you to provide certain financial information (like your bank account or credit card information) in order to facilitate the processing of payments (via RoadNStays Payment gateways).</p>\r\n  <p><span>Communications with RoadNStays and other Members</span>. When you communicate with RoadNStays or use the RoadNStays Platform to communicate with other Members, we collect information about your communication and any information you choose to provide.\r\n  </p>\r\n\r\n  <h6>2.2.&nbsp;Information given by choice</h6>\r\n  <p><span>Additional Profile Information</span>. You may choose to provide additional information as part of your RoadNStays profile (such as gender, preferred language(s), city, and a personal description). Some of this information as indicated in your Account settings is part of your public profile page, and will be publicly visible to others.\r\n  </p>\r\n  <p><span>\r\n    Contact Information\r\n  </span>You may choose to import your address book contacts or enter your contacts’ information manually to access certain features of the RoadNStays Platform, like inviting them to use RoadNStays.\r\n</p>\r\n<p><span>Other Information</span>You may otherwise choose to provide us information when you fill in a form, update or add information to your RoadNStays Account, respond to surveys, post to community forums, participate in promotions, communicate with our customer care team, share your experience with us (such as through Host Stories), or use other features\r\n  of the RoadNStays Platform.</p>\r\n  <h6>2.3. Information that is necessary for the use of the Payment gateways.</h6>\r\n  <p>The Payments Data Controller needs to collect the following information necessary for the adequate performance of the contract with you and to comply with applicable law (such as anti-money laundering regulations). Without it, you will not be able to use Payment gateways:\r\n  </p>\r\n  <p>Payment Information. When you use the Payment gateways, the Payments Data Controller requires certain financial information (like your bank account or credit card information) in order to process payments and comply with applicable law.\r\n  </p>\r\n  <p>Identity Verification and Other Information. If you are a Host, the Payments Data Controller may require identity verification information (such as images of your government issued ID, passport, national ID card, or driving license) or other authentication information, your date of birth, your address, email address, phone number and other information in order to verify your identity, provide the Payment gateways to you, and to comply with applicable law.\r\n  </p>\r\n  <h6>2.4. Information Automatically Collect from Your Logs\r\n  </h6>\r\n  <p>Geo-location Information. When you use certain features of the RoadNStays Platform, we may collect information about your precise or approximate location as determined through data such as your IP address or mobile device’s GPS to offer you an improved user experience. Most mobile devices allow you to control or disable the use of location services for applications in the device’s settings menu. RoadNStays may also collect this\r\n    information even when you are not using the app if this connection is enabled through your settings or device permissions.\r\n    </p>\r\n    <p>Usage Information. We collect information about your interactions with the RoadNStays Platform such as the pages or content you view, your searches for Listings, bookings you have made, and other actions on the RoadNStays Platform.\r\n    </p>\r\n    <p>Cookies and Similar Technologies. We use cookies and other similar technologies when you use our platform, use our mobile app, or engage with our online ads or email communications. We may collect certain information by automated means using technologies such as cookies, web beacons, pixels, browser analysis tools, server logs, and mobile identifiers. In many cases the information we collect using cookies and other tools\r\n      is only used in a non-identifiable without reference to personal information. For example, we may use information we collect to better understand website traffic patterns and to optimize our website experience. In some cases we associate the information we collect using cookies and other technology with your personal information. Our business\r\n      partners may also use these tracking technologies on the RoadNStays Platform or engage others to track your behavior on our behalf.\r\n      </p>\r\n      <p>Pixels and SDKs. Third parties, including Facebook, may use cookies, web beacons, and other storage technologies to collect or receive information from our websites and elsewhere on the internet and use that information to provide measurement services and target ads. For apps, that third parties, including Facebook, may collect or receive information from your app and other apps and use that information to provide measurement services and targeted ads. Users can opt-out of the collection and use of\r\n        information for ad targeting by updating their Facebook account ad settings and by contacting opt-out@roadnstays.com with a description of your request and validation information. Users can access a mechanism for exercising such choice by going to our Cookie Policy.\r\n        </p>\r\n        <p>Payment Transaction Information. RoadNStays does not collect your payment credentials and only uses billing information to clear its accounts with guests and hosts.\r\n        </p>\r\n        <h6>2.5. Information from Third Parties.</h6>\r\n        <p>RoadNStays and RoadNStays Payments may collect information, including personal information, that others provide about you when they use the RoadNStays Platform and the Payment gateways, or obtain information from other sources and combine that with information we collect through the RoadNStays Platform and the Payment gateways. We do not control, supervise or respond for how the third parties providing your information process your Personal Information, and any information request regarding the disclosure of your personal information to us should be directed to such third parties.\r\n        </p>\r\n        <h6>2.6. Children’s Data.\r\n        </h6>\r\n        <p>\r\n        Our websites and applications are not directed to children under 16 and we do not knowingly collect any personal information directly from children under 16. If you believe that we processing the personal information pertaining to a child inappropriately, we take this very seriously and urge you to contact us using the information provided under the “Contact Us” section below.\r\n        </p>\r\n        <ul>\r\n          <li>3. USE OF INFORMATION</li>\r\n        </ul>\r\n        <p>We may use, store, and process personal information to (1) provide, understand, improve, and develop the RoadNStays Platform, (2) create and maintain a trusted and safer environment (such as to comply with our legal obligations and ensure compliance with RoadNStays Policies) and (3) provide, personalize, measure, and improve our advertising and marketing.\r\n        </p>\r\n        <p>We process this personal information for these purposes given our legitimate interest in improving the RoadNStays Platform and our Members’ experience with it, and where it is necessary for the adequate performance of the contract with you.\r\n        </p>\r\n        <p>We may use the personal information as a part of Payment gateways such as to:\r\n          Enable you to access and use the Payment gateways.\r\n          </p>\r\n          <p>Detect and prevent fraud, abuse, security incidents, and other harmful activity.\r\n            Conduct security investigations and risk assessments.\r\n            </p>\r\n            <p>Conduct checks against databases and other information sources.\r\n              Comply with legal obligations (such as anti-money laundering regulations).\r\n              Enforce the Payment Terms and other payment policies.\r\n              </p>\r\n              <p>With your consent, send you promotional messages, marketing, advertising, and other information that may be of interest to you based on your preferences. The Payments Data Controller processes this personal information given its legitimate interest in improving the Payment gateways and its users’ experience with it, and where it is necessary for the adequate performance of the contract with you and to comply with applicable laws.\r\n              </p>\r\n              <ul>\r\n                <li>4. SHARING &amp; DISCLOSURE</li>\r\n              </ul>\r\n              <h6>4.1. Advertising and Social Media; Sharing With Your Consent.\r\n              </h6>\r\n              <p>Where you have provided consent, we share your information, including personal information, as described at the time of consent, such as when you authorize a third party application or website to access your RoadNStays Account or when you participate in promotional activities conducted by RoadNStays partners or third parties.\r\n              </p>\r\n              <p>Where permissible according to applicable law we may use certain limited personal information about you, such as your email address, to hash it and to share it with social media platforms, such as Facebook or Google, to generate leads, drive traffic to our websites or otherwise promote our products and services or the RoadNStays Platform. These processing activities are based on our legitimate interest in undertaking marketing activities to offer you products or services that may be if your interest.\r\n              </p>\r\n              <p>The social media platforms with which we may share your personal information are not controlled or supervised by RoadNStays. Therefore, any questions regarding how your social media platform service provider processes your personal information should be directed to such provider.\r\n              </p>\r\n              <p>Please note that you may, at any time ask RoadNStays to cease processing your data for these\r\n              </p>\r\n              <p>direct marketing purposes by sending an e-mail given on our website.\r\n              </p>\r\n              <h6>4.2. Sharing between Members.</h6>\r\n              <p>To help facilitate bookings or other interactions between Members, we may need to share certain information, including personal information, with other Members, as it is necessary for the adequate performance of the contract between you and us, as follows:\r\n              </p>\r\n              <p>When you as a Guest submit a booking request, certain information about you is shared with the Host (and Co-Host, if applicable), including your profile, full name, the full name&nbsp; of any additional Guests, your cancellation history, and other information you agree to share. </p>\r\n              <p>When your booking is confirmed, we will disclose additional information to assist\r\n                with coordinating the trip, like your phone number.\r\n                </p>\r\n                <p>When you as a Host (or Co-Host, if applicable) have a confirmed booking, certain information is shared with the Guest (and the additional Guests they may invite, if applicable) to coordinate the booking, such as your profile, full name, phone number, and\r\n                  Accommodation or Experience address.\r\n                  </p>\r\n                  <p>When you as a Host invite another Member to become a Co-Host, you authorize the CoHost to access and update your information and Member Content, including but not limited to certain information like your full name, phone number, Accommodation address, calendar, Listing information, Listing photos, and email address.\r\n                  </p>\r\n                  <p>When you as a Guest invite additional Guests to a booking, your full name, travel dates, Host name, Listing details, the Accommodation address, and other related information will be shared with each additional Guest.\r\n                  </p>\r\n                  <p>When you as a Guest initiate a Group Payment Booking Request certain information about each participant such as first name, last initial, profile picture as well as the booking details is shared among all participants of the Group Payment Booking Request. We don’t share your billing and payout information with other Members.\r\n                  </p>\r\n                  <h6>4.3. Profiles, Listings, and other Public Information.</h6>\r\n                  <p>The RoadNStays Platform lets you publish information, including personal information, that is visible to the general public. For example: Parts of your public profile page, such as your first name, your description, and city, are\r\n                    publicly visible to others.\r\n                    </p>\r\n                    <p>Listing pages are publicly visible and include information such as the Accommodation or Experience’s approximate location (neighborhood and city) or precise location (where you have provided your consent), Listing description, calendar availability, your public profile photo, aggregated demand information (like page views over a period of time),\r\n                      and any additional information you choose to share.\r\n                      </p>\r\n                      <p>After completing a booking, Guests and Hosts may write Reviews and rate each other. Reviews and Ratings are a part of your public profile page and may also be surfaced elsewhere on the RoadNStays Platform (such as the Listing page).\r\n                        </p>\r\n                        <p>If you submit content in a community or discussion forum, blog or social media post, or use a similar feature on the RoadNStays Platform, that content is publicly visible.</p>\r\n                        <h6>4.4. Additional Services by Hosts.\r\n                        </h6>\r\n                        <p>Hosts may need to use third party services available through the RoadNStays Platform to assist with managing their Accommodation or providing additional services requested by you, such as cleaning services or lock providers. Hosts may use features on the RoadNStays Platform to share information about the Guest (like check-in and check-out dates, Guest name, Guest phone number) with such third party service providers for the purposes of coordinating the stay, managing the Accommodation, or providing other services. Hosts are responsible for third party service providers they use and ensuring those service providers process Guest information securely and in compliance with applicable law\r\n                        </p>\r\n                        <p>including data privacy and data protection laws.\r\n                        </p>\r\n                        <h6>4.5. Compliance with Law and Legal Requests.\r\n                        </h6>\r\n                        <p>RoadNStays and RoadNStays Payments may disclose your information, including personal information, to courts, law enforcement, governmental authorities, tax authorities, or authorized third parties, if and to the extent we are required or permitted to do so by law or if such disclosure is reasonably necessary. These disclosures may be necessary to comply with our legal obligations, for the protection of your or another person’s vital interests or for the purposes of our or a third party’s legitimate interest in keeping the RoadNStays Platform secure, preventing harm or crime, enforcing or defending legal rights, facilitating the collection of taxes and prevention of tax fraud or preventing damage.\r\n                        </p>\r\n                        <h6>4.6. Collection and Remittance of Occupancy Taxes.\r\n                        </h6>\r\n                        <p>In jurisdictions where RoadNStays facilitates the Collection and Remittance of Occupancy Taxes, Hosts and Guests, where legally permissible according to applicable law, expressly grant us permission, without further notice, to disclose Hosts’ and Guests’ data and other&nbsp; information relating to them or to their transactions, bookings, Accommodations and Occupancy Taxes to the relevant tax authority.\r\n                        </p>\r\n                        <h6>4.7. Government Registration.\r\n                        </h6>\r\n                        <p>In jurisdictions where RoadNStays facilitates or requires a registration, notification, permit, or license application of a Host with a local governmental authority through the RoadNStays Platform in accordance with local law, we may share information of participating Hosts with the relevant authority, both during the application process and, if applicable,\r\n                        </p>\r\n                        <p>periodically thereafter, such as the Host’s full name and contact details, Accommodation address, tax identification number, Listing details, and number of nights booked.\r\n                        </p>\r\n                        <h6>4.8. Information Provided to Enterprise Customers.</h6>\r\n                        <p>If you have linked your RoadNStays Account to the RoadNStays Account of a company or other organization (an “Enterprise”), added your work email address, or have a booking facilitated via another party (such as the future employer or other entity) or used a coupon in a similar capacity in connection with an Enterprise (such as using a coupon to pay for an accommodation for an enterprise related event like employment onboarding, orientation, meetings, etc.) through one of our Enterprise products, that Enterprise will have access to your name, contact details, permissions and roles, and other information as required to enable use by you and the Enterprise of such Enterprise products.\r\n                        </p>\r\n                        <h6>4.9. Aggregated Data.\r\n                        </h6>\r\n                        <p>We may also share aggregated information (information about our users that we combine together so that it no longer identifies or references an individual user) and other anonymized information for regulatory compliance, industry and market analysis, research, demographic profiling, marketing and advertising, and other business purposes.\r\n</p>\r\n                        <ul>\r\n                          <li>5. OTHER IMPORTANT INFORMATION\r\n                          </li>\r\n                        </ul>\r\n                        <h6>5.1. Analyzing your Communications.</h6>\r\n                        <p>We may review, scan, or analyze your communications on the RoadNStays Platform for fraud prevention, risk assessment, regulatory compliance, investigation, product development, research, analytics, and customer support purposes. For example, as part of our fraud prevention efforts, we scan and analyze messages to mask contact information and\r\n                          references to other websites. In some cases, we may also scan, review, or analyze messages to debug, improve, and expand product offerings. We use automated methods where reasonably possible. However, occasionally we may need to manually review some communications, such as for fraud investigations and customer support, or to assess and improve the functionality of these automated tools. We will not review, scan, or analyze your messaging communications to send third party marketing messages to you, and we will not sell reviews or analyses of these communications. These activities are carried out based on RoadNStays’s legitimate interest in ensuring compliance with applicable laws and our Terms, preventing fraud, promoting safety, and improving and ensuring the adequate performance of our services.\r\n                          </p>\r\n                          <h6>5.2. Linking Third Party Accounts.</h6>\r\n                          <p>You may link your RoadNStays Account with your account at a third party social networking service. We only collect your information from linked third party accounts to the extent necessary to ensure the adequate performance of our contract with you, or to ensure that we comply with applicable laws, or with your consent.\r\n                          </p>\r\n                          <h6>5.3. Third Party Partners &amp; Integrations</h6>\r\n                          <p>The RoadNStays Platform may contain links to third party websites or services, such as third party integrations, co-branded services, or third party-branded services (“Third Party Partners”). RoadNStays doesn’t own or control these Third Party Partners and when you interact with them, you may be providing information directly to the Third Party Partner,\r\n                            RoadNStays, or both. These Third Party Partners will have their own rules about the collection, use, and disclosure of information. We encourage you to review the privacy policies of the other websites you visit.\r\n                            </p>\r\n                            <ul>\r\n                              <li>6. YOUR RIGHTS\r\n                              </li>\r\n                            </ul>\r\n                            <p>Consistent with applicable law, you may exercise any of the rights described in this section before\r\n                              your applicable RoadNStays Data Controller and Payments Data Controller.Please note that we may\r\n                              ask you to verify your identity and request before taking further action on your request</p>\r\n                              <h6>6.1. Managing Your Information.</h6>\r\n                              <p>You may access and update some of your information through your Account settings. If you have chosen to connect your RoadNStays Account to a third-party application, like Facebook or Google, you can change your settings and remove permission for the app by changing your Account settings. You are responsible for keeping your personal information up-to-date.\r\n                              </p>\r\n                              <h6>6.2. Rectification of Inaccurate or Incomplete Information.\r\n                              </h6>\r\n                              <p>You have the right to ask us to correct inaccurate or incomplete personal information about you (and which you cannot update yourself within your RoadNStays Account).\r\n                              </p>\r\n                              <h6>6.3. Data Retention and Erasure.\r\n                              </h6>\r\n                              <p>We generally retain your personal information for as long as is necessary for the performance of the contract between you and us and to comply with our legal obligations. We may retain some of your personal information as necessary for our legitimate\r\n                                business interests, such as fraud detection and prevention and enhancing safety. For example, if we suspend an RoadNStays Account for fraud or safety reasons, we may retain certain information from that RoadNStays Account to prevent that Member from opening a new RoadNStays Account in the future.\r\n                                </p>\r\n                                <p>We may retain and use your personal information to the extent necessary to comply with our legal obligations. For example, RoadNStays and RoadNStays Payments may keep some of your\r\n                                  information for tax, legal reporting and auditing obligations. Information you have shared with others (e.g., Reviews, forum postings) may continue to be publicly visible on the RoadNStays Platform, even after your RoadNStays Account is cancelled.\r\n                                  </p>\r\n                                  <p>However, attribution of such information to you will be removed. Additionally, some copies of your information (e.g., log records) may remain in our database, but are disassociated from personal identifiers.\r\n                                  </p>\r\n                                  <p>Because we maintain the RoadNStays Platform to protect from accidental or malicious loss and destruction, residual copies of your personal information may not be removed from our backup systems for a limited period of time.\r\n                                  </p>\r\n\r\n                                  <h6>6.4. Lodging Complaints.</h6>\r\n                                  <p>You have the right to lodge complaints about our data processing activities by filing a\r\n                                    complaint with our Data Protection Officer who can be reached by the “Contact Us”\r\n                                    section below or with a supervisory authority.\r\n                                    </p>\r\n\r\n                                    <ul><li>7. SECURITY</li></ul>\r\n                                    <p>We are continuously implementing and updating administrative, technical, and physical security measures to help protect your information against unauthorized access, loss, destruction, or alteration. Some of the safeguards we use to protect your information are firewalls and data encryption, and information access controls.\r\n                                    </p>\r\n                                    <ul><li>8. CHANGES TO THIS PRIVACY POLICY</li></ul>\r\n                                    <p>RoadNStays reserves the right to modify this Privacy Policy at any time in accordance with this provision. If we make changes to this Privacy Policy, we will post the revised Privacy Policy on the RoadNStays Platform and update the “Last Updated” date at the top of this Privacy Policy. We will also provide you with notice of the modification by email at least thirty (30) days before the date they become effective. If you disagree with the revised Privacy Policy, you may cancel your Account. If you do not cancel your Account before the date the revised Privacy Policy becomes effective, your continued access to or use of the RoadNStays Platform will be subject to the revised Privacy Policy</p>\r\n                                    <ul><li>9. CONTACT US\r\n                                    </li></ul>\r\n                                    <p>If you have any questions or complaints about this Privacy Policy or RoadNStays’s information handling practices, you may email us at the email addresses provided at our websites.\r\n                                    </p>\r\n                                    <p class=\"copyrighttext\">© 2022 RoadNStays, Inc. All rights reserved.</p>', '2022-09-12 11:56:04', '2022-09-12 12:32:49'),
(5, 'privacy1.jpg', 'cookie-policy', 'Cookie Policy', '<p>Road N Stays uses cookies and related technologies with similar functionalities such as pixels, web beacons, mobile identifiers, and tracking URLs to help obtain log data. This is to help in providing improved services.</p>\r\n\r\n<p>We use them for</p>\r\n\r\n<ul>\r\n	<li>To enable access to our platform and use its tools.</li>\r\n	<li>To enable access to our payment and booking system.</li>\r\n	<li>To improve access to our platform and understand your interaction for better service.</li>\r\n	<li>To customize your options and advertising including third party websites.</li>\r\n	<li>To provide customized relevant content.</li>\r\n	<li>To fine tune our platform and optimize its performance.</li>\r\n	<li>To manage governance of agreements and legal obligations pertaining to our platform.</li>\r\n	<li>To detect fraud.</li>\r\n	<li>For prevention of illegal access and to provide safety.</li>\r\n	<li>For analytics and product development&rsquo;</li>\r\n</ul>\r\n\r\n<p>Cookies</p>\r\n\r\n<p>Cookies are placed on computes to uniquely identify your browser or to store information We may use Cookies allow us to know you when you return. This helps us in customizing the user experience and also help in fraud detection. Mostly you can manage cookie preferences and opt-out of having cookies and other data collection technologies used by adjusting the settings on your browser. For more information please do your own research on internet cookies.</p>\r\n\r\n<p>Flash Cookies</p>\r\n\r\n<p>We may use Flash Cookies, and related technologies to personalize and enhance your online experience, and to deliver content for Flash players. We may also use Flash cookies for security purposes, to gather certain website metrics and to help remember settings and preferences</p>\r\n\r\n<p>Pixel Tags and Web Beacons</p>\r\n\r\n<p>These tags are little graphic images and tiny blocks of code placed on website pages, ads, or in our emails that allow us to determine whether you performed a specific action. When you access these pages, or when you open an email, the pixel tags and web beacons let us know you have accessed the web page or opened the email.</p>\r\n\r\n<p>Server Logs and Other Technologies</p>\r\n\r\n<p>We may over time collect different types of information from server logs and other technological devices. Your access information to access our website, operating systems, domain, language, browser type, system settings, country and time zone of your device location. We may record the IP addresses of the device of your use. Information website you were visiting before you land on our website and the website you move on to from our website. The information is used in improving the system and system experience.</p>\r\n\r\n<p>Device Information</p>\r\n\r\n<p>We may use related information about devices that authenticate users for various purpose including fraud-detection and target advertising.</p>\r\n\r\n<p>Third Parties</p>\r\n\r\n<p>For improving our service delivery and customer experience we may commission third parties to place important technologies to monitor and prevent fraud and collect information that may help in the improvement of overall system. Our engagement will be in line with the general prevalent trends that are market norms within the internet global community.</p>\r\n\r\n<p>Third Party Social Plugins</p>\r\n\r\n<p>This is may be administrated in agreement to the internet acceptable global practices.</p>\r\n\r\n<p>Your Choices</p>\r\n\r\n<p>Cookie Preferences</p>\r\n\r\n<p>Most browsers automatically accept cookies, but you can modify your browser setting to decline cookies.</p>\r\n\r\n<p>Flash cookies management tools available in a web browser will not remove flash cookies. To learn more about how to manage flash cookies, you can visit the Adobe website and make changes at the Global Privacy Settings Panel.</p>\r\n\r\n<p>Your mobile device may allow you to control cookies through its settings function. Refer to your device manufacturer&rsquo;s instructions for more information.</p>\r\n\r\n<p>If you choose to decline cookies, some parts of the Road N Stays Platform may not work as intended or may not work at all.</p>', '2022-09-12 11:57:18', '2022-09-14 03:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking`
--

CREATE TABLE `tour_booking` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_token` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `booking_status` enum('pending','processing','canceled','confirmed') NOT NULL,
  `cancel_reason` varchar(255) DEFAULT NULL,
  `cancel_details` text DEFAULT NULL,
  `refund_status` enum('pending','processing','canceled','confirmed') DEFAULT 'pending',
  `canceled_at` datetime DEFAULT NULL,
  `refund_processed_at` datetime DEFAULT NULL,
  `refund_credited_at` datetime DEFAULT NULL,
  `refund_amount` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_booking`
--

INSERT INTO `tour_booking` (`id`, `tour_id`, `user_id`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `payment_id`, `payment_token`, `payer_id`, `booking_status`, `cancel_reason`, `cancel_details`, `refund_status`, `canceled_at`, `refund_processed_at`, `refund_credited_at`, `refund_amount`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(190, 258, 1151, 18000.00, 1, 5400.00, 12600.00, '357333', '906212727585', NULL, 'canceled', 'Unable to travel due to Personal reason', NULL, 'pending', '2022-10-19 18:32:36', NULL, NULL, '3600', '1', 'Paid', '2022-10-19 16:07:10', '2022-10-19 13:02:36'),
(191, 316, 837, 1000.00, 0, 1000.00, 0.00, '342315', '425888793199', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-10-29 12:46:42', '2022-10-29 07:16:42'),
(192, 316, 1163, 1000.00, 0, 1000.00, 0.00, '1626392', '432271662241', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-10-29 12:57:20', '2022-10-29 07:27:20'),
(193, 319, 1163, 1.00, 0, 1.00, 0.00, '1253783', '500790844477', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-10-29 14:51:32', '2022-10-29 09:21:32'),
(194, 319, 1163, 1.00, 0, 1.00, 0.00, '729466', '157595245329', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-10-31 12:52:47', '2022-10-31 07:22:47'),
(195, 319, 837, 1.00, 0, 1.00, 0.00, '1622223', '203330600382', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-10-31 14:09:03', '2022-10-31 08:39:03'),
(196, 321, 837, 1.00, 0, 1.00, 0.00, '1648147', '016917730182', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-01 12:45:05', '2022-11-01 07:15:05'),
(197, 321, 837, 1.00, 0, 1.00, 0.00, '1040529', '126972976455', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-01 15:48:27', '2022-11-01 10:18:27'),
(198, 321, 837, 1.00, 0, 1.00, 0.00, '1178533', '811811324134', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-02 10:49:47', '2022-11-02 05:19:47'),
(199, 321, 837, 1.00, 0, 1.00, 0.00, '687355', '993274412718', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-02 15:52:14', '2022-11-02 10:22:14'),
(200, 322, 837, 3000.00, 0, 3000.00, 3000.00, '177054', '673317538387', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-04 14:32:25', '2022-11-04 09:02:25'),
(201, 323, 837, 1.00, 0, 1.00, 0.00, '1140567', '056828141644', NULL, 'confirmed', NULL, NULL, 'pending', NULL, NULL, NULL, NULL, '3', 'Paid', '2022-11-09 16:18:10', '2022-11-09 10:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking_request`
--

CREATE TABLE `tour_booking_request` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_status` int(11) DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `invoice_num` varchar(255) DEFAULT NULL,
  `discount_name` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `expense_name` varchar(255) DEFAULT NULL,
  `expense_value` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tour_booking_request`
--

INSERT INTO `tour_booking_request` (`id`, `tour_id`, `user_id`, `request_status`, `approve_status`, `payment_status`, `invoice_num`, `discount_name`, `discount`, `expense_name`, `expense_value`, `total_amount`, `created_at`, `updated_at`) VALUES
(71, 258, 1151, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-03 17:48:45', '0000-00-00 00:00:00'),
(72, 322, 837, 1, 1, 1, 'INV51154', NULL, NULL, NULL, NULL, NULL, '2022-11-04 14:21:41', '2022-11-04 09:02:25'),
(73, 323, 837, 1, 1, 1, 'INV60490', NULL, NULL, NULL, NULL, NULL, '2022-11-05 14:44:29', '2022-11-09 10:48:10'),
(75, 327, 1312, 1, 1, 0, 'INV46895', 'discount for transporation', 15, NULL, NULL, NULL, '2022-11-12 19:24:58', '2022-11-12 13:57:02'),
(76, 326, 837, 1, 1, 0, 'INV09486', NULL, NULL, NULL, NULL, NULL, '2022-11-15 16:02:54', '2022-11-16 05:26:19'),
(79, 326, 1315, 0, 1, 0, 'INV23075', NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:05:39', '2022-11-18 06:23:59'),
(80, 330, 1312, 1, 1, 0, 'INV86203', 'discount 50', 50, 'discount 50', 50, NULL, '2022-11-19 23:24:52', '2022-11-19 17:57:04'),
(81, 330, 1320, 1, 1, 0, 'INV58994', 'discount 1', 25, 'extra 2', 50, NULL, '2022-11-20 00:25:33', '2022-11-19 19:03:31'),
(82, 330, 837, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 16:04:12', '0000-00-00 00:00:00'),
(83, 330, 1315, 1, 1, 0, 'INV80390', 'dis', 120, 'test', 10, NULL, '2022-11-22 11:06:54', '2022-11-22 06:12:10'),
(85, 54, 837, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 12:05:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tour_booking_temp`
--

CREATE TABLE `tour_booking_temp` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `partial_payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `online_paid_amount` double(10,2) DEFAULT NULL,
  `remaining_amount_to_pay` double(10,2) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `paccess_token` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `booking_option` int(11) DEFAULT NULL COMMENT '"1"=>Instant Booking, "2"=>Approval Booking',
  `tour_start_date` date DEFAULT NULL,
  `tour_end_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_booking_temp`
--

INSERT INTO `tour_booking_temp` (`id`, `tour_id`, `user_id`, `total_amount`, `partial_payment_status`, `online_paid_amount`, `remaining_amount_to_pay`, `payment_id`, `paccess_token`, `token_id`, `booking_option`, `tour_start_date`, `tour_end_date`, `created_at`, `updated_at`) VALUES
(322, 258, 1, 18000.00, 1, 5400.00, 12600.00, '357333', NULL, NULL, NULL, '2022-10-22', '2022-10-25', '2022-10-19 16:05:18', '2022-10-19 10:35:18'),
(323, 258, 1, 18000.00, 0, 18000.00, 12600.00, '727380', NULL, NULL, NULL, '2022-10-22', '2022-10-25', '2022-10-26 11:34:00', '2022-10-26 06:04:00'),
(324, 258, 1, 18000.00, 1, 5400.00, 12600.00, '1679108', NULL, NULL, NULL, '2022-10-22', '2022-10-25', '2022-10-26 11:38:30', '2022-10-26 06:08:30'),
(325, 316, 1, 1000.00, 0, 1000.00, 0.00, '342315', NULL, NULL, NULL, '2022-10-19', '2022-10-23', '2022-10-29 12:44:58', '2022-10-29 07:14:58'),
(326, 316, 1, 1000.00, 0, 1000.00, 0.00, '1626392', NULL, NULL, NULL, '2022-10-19', '2022-10-23', '2022-10-29 12:55:52', '2022-10-29 07:25:52'),
(327, 319, 1, 1.00, 0, 1.00, 0.00, '1253783', NULL, NULL, NULL, '2022-10-29', '2022-10-30', '2022-10-29 14:49:35', '2022-10-29 09:19:35'),
(328, 319, 1, 1.00, 0, 1.00, 0.00, '729466', NULL, NULL, NULL, '2022-10-29', '2022-10-30', '2022-10-31 12:51:53', '2022-10-31 07:21:53'),
(329, 319, 1, 1.00, 0, 1.00, 0.00, '1622223', NULL, NULL, NULL, '2022-10-29', '2022-10-30', '2022-10-31 14:06:36', '2022-10-31 08:36:36'),
(330, 321, 1, 1.00, 0, 1.00, 0.00, '1648147', NULL, NULL, NULL, '2022-11-01', '2022-11-02', '2022-11-01 12:42:43', '2022-11-01 07:12:43'),
(331, 321, 1, 1.00, 0, 1.00, 0.00, '1040529', NULL, NULL, NULL, '2022-11-01', '2022-11-02', '2022-11-01 15:46:49', '2022-11-01 10:16:49'),
(332, 321, 1, 1.00, 0, 1.00, 0.00, '1178533', NULL, NULL, NULL, '2022-11-01', '2022-11-02', '2022-11-02 10:48:45', '2022-11-02 05:18:45'),
(333, 321, 1, 1.00, 0, 1.00, 0.00, '687355', NULL, NULL, NULL, '2022-11-01', '2022-11-02', '2022-11-02 15:51:07', '2022-11-02 10:21:07'),
(334, 322, 1, 3000.00, 0, 3000.00, 3000.00, '177054', NULL, NULL, NULL, '2022-11-02', '2022-11-09', '2022-11-04 14:29:58', '2022-11-04 08:59:58'),
(335, 321, NULL, 1.00, 0, 1.00, 0.00, '981781', NULL, NULL, NULL, '2022-11-01', '2022-11-02', '2022-11-08 00:29:12', '2022-11-07 18:59:12'),
(336, 323, 1, 1.00, 0, 1.00, 0.00, '1140567', NULL, NULL, NULL, '2022-11-03', '2022-11-04', '2022-11-09 16:17:09', '2022-11-09 10:47:09'),
(337, 325, 1, 10.00, 0, 10.00, 0.00, '1553323', NULL, NULL, NULL, '2022-11-10', '2022-11-15', '2022-11-10 11:48:32', '2022-11-10 06:18:32'),
(338, 325, 1, 10.00, 0, 10.00, 0.00, '1199664', NULL, NULL, NULL, '2022-11-10', '2022-11-15', '2022-11-10 12:04:15', '2022-11-10 06:34:15'),
(339, 326, 1, 10.00, 0, 10.00, 0.00, '295432', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-11 10:30:33', '2022-11-11 05:00:33'),
(340, 326, 1, 10.00, 0, 10.00, 0.00, '124107', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-11 15:13:11', '2022-11-11 09:43:11'),
(341, 327, 1, 15.00, 0, 15.00, 10.00, '1621620', NULL, NULL, NULL, '2022-11-27', '2022-12-04', '2022-11-12 19:29:46', '2022-11-12 13:59:46'),
(342, 326, 1, 10.00, 0, 10.00, 0.00, '1275178', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-16 11:25:09', '2022-11-16 05:55:09'),
(343, 326, 1, 10.00, 0, 10.00, 0.00, '1646455', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-16 12:31:07', '2022-11-16 07:01:07'),
(344, 326, 1, 10.00, 0, 10.00, 0.00, '1421307', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-17 12:55:28', '2022-11-17 07:25:28'),
(345, 326, 1, 10.00, 0, 10.00, 0.00, '1173321', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-17 14:40:01', '2022-11-17 09:10:01'),
(346, 326, 1, 10.00, 0, 10.00, 0.00, '1012861', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-17 18:19:14', '2022-11-17 12:49:14'),
(347, 330, 1, 500.00, 0, 500.00, 400.00, '1145643', NULL, NULL, NULL, '2022-12-02', '2022-12-13', '2022-11-19 23:39:34', '2022-11-19 18:09:34'),
(348, 326, 1, 10.00, 0, 10.00, 0.00, '810423', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-21 11:25:03', '2022-11-21 05:55:03'),
(349, 326, 1, 10.00, 0, 10.00, 0.00, '1614649', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-21 11:26:00', '2022-11-21 05:56:00'),
(350, 326, 1, 10.00, 0, 10.00, 0.00, '22840', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-21 15:57:07', '2022-11-21 10:27:07'),
(351, 326, 1, 10.00, 0, 10.00, 0.00, '1679635', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-22 14:11:15', '2022-11-22 08:41:15'),
(352, 326, 1, 10.00, 0, 10.00, 0.00, '1438889', NULL, NULL, NULL, '2022-11-11', '2022-11-15', '2022-11-29 14:13:08', '2022-11-29 08:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `tour_gallery`
--

CREATE TABLE `tour_gallery` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_gallery`
--

INSERT INTO `tour_gallery` (`id`, `tour_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(201, 54, '1658817303_pexels-asad-photo-maldives-1320686.jpg', 1, '2022-07-26 06:35:03', '2022-07-26 06:35:03'),
(202, 54, '1658817303_pexels-asad-photo-maldives-1483053.jpg', 1, '2022-07-26 06:35:03', '2022-07-26 06:35:03'),
(203, 54, '1658817303_pexels-asad-photo-maldives-3155724.jpg', 1, '2022-07-26 06:35:03', '2022-07-26 06:35:03'),
(991, 188, '1661259056_pexels-adrienn-1460145.jpg', 1, '2022-08-23 12:50:56', '2022-08-23 12:50:56'),
(992, 188, '1661259056_pexels-ankit-10440693.jpg', 1, '2022-08-23 12:50:56', '2022-08-23 12:50:56'),
(993, 188, '1661259056_pexels-ankur-khandelwal-4851376.jpg', 1, '2022-08-23 12:50:56', '2022-08-23 12:50:56'),
(994, 188, '1661259056_pexels-shiraz-henry-4938550.jpg', 1, '2022-08-23 12:50:56', '2022-08-23 12:50:56'),
(996, 190, '1661260840_pexels-fox-1082326.jpg', 1, '2022-08-23 13:20:40', '2022-08-23 13:20:40'),
(998, 192, '1661926198_7101424013_8c6a963328_b.jpg', 1, '2022-08-31 06:09:58', '2022-08-31 01:09:58'),
(999, 192, '1661926198_download.jpg', 1, '2022-08-31 06:09:58', '2022-08-31 01:09:58'),
(1000, 192, '1661926198_images.jpg', 1, '2022-08-31 06:09:58', '2022-08-31 01:09:58'),
(1001, 192, '1661926198_TMcC0XShYzoIhzNmFLsSLEKyLntR3geiRSQDFWRi.jpeg', 1, '2022-08-31 06:09:58', '2022-08-31 01:09:58'),
(1116, 236, '1663937140_15.jpg', 1, '2022-09-23 18:15:40', '2022-09-23 13:15:40'),
(1396, 319, '1667033426_pexels-christina-morillo-1181352.jpg', 1, '2022-10-29 14:20:26', '2022-10-29 09:20:26'),
(1397, 319, '1667033426_pexels-cottonbro-3171811.jpg', 1, '2022-10-29 14:20:26', '2022-10-29 09:20:26'),
(1398, 319, '1667033427_pexels-cottonbro-3419692.jpg', 1, '2022-10-29 14:20:27', '2022-10-29 09:20:27'),
(1399, 319, '1667033427_pexels-cottonbro-4429322.jpg', 1, '2022-10-29 14:20:27', '2022-10-29 09:20:27'),
(1400, 319, '1667033427_pexels-diana-titenko-3271945.jpg', 1, '2022-10-29 14:20:27', '2022-10-29 09:20:27'),
(1401, 319, '1667033427_pexels-dodo-phanthamaly-1028379.jpg', 1, '2022-10-29 14:20:27', '2022-10-29 09:20:27'),
(1402, 320, '1667284907_pexels-fox-1082326.jpg', 1, '2022-11-01 12:11:47', '2022-11-01 07:11:47'),
(1403, 320, '1667284907_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-01 12:11:47', '2022-11-01 07:11:47'),
(1404, 320, '1667284907_pexels-pixabay-261327.jpg', 1, '2022-11-01 12:11:47', '2022-11-01 07:11:47'),
(1405, 321, '1667286001_pexels-fox-1082326.jpg', 1, '2022-11-01 12:30:01', '2022-11-01 07:30:01'),
(1406, 321, '1667286001_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-01 12:30:01', '2022-11-01 07:30:01'),
(1407, 321, '1667286001_pexels-pixabay-261327.jpg', 1, '2022-11-01 12:30:01', '2022-11-01 07:30:01'),
(1409, 322, '1667299101_4two-gaeste-2.jpg', 1, '2022-11-01 16:08:21', '2022-11-01 11:08:21'),
(1410, 323, '1667369831_pexels-fox-1082326.jpg', 1, '2022-11-02 11:47:11', '2022-11-02 06:47:11'),
(1411, 323, '1667369831_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-02 11:47:11', '2022-11-02 06:47:11'),
(1412, 323, '1667369831_pexels-pixabay-261327.jpg', 1, '2022-11-02 11:47:11', '2022-11-02 06:47:11'),
(1414, 325, '1667998245_pexels-fox-1082326.jpg', 1, '2022-11-09 18:20:45', '2022-11-09 13:20:45'),
(1415, 325, '1667998245_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-09 18:20:45', '2022-11-09 13:20:45'),
(1416, 325, '1667998245_pexels-pixabay-261327.jpg', 1, '2022-11-09 18:20:45', '2022-11-09 13:20:45'),
(1417, 326, '1668058364_pexels-fox-1082326.jpg', 1, '2022-11-10 11:02:44', '2022-11-10 06:02:44'),
(1418, 326, '1668058364_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-10 11:02:44', '2022-11-10 06:02:44'),
(1419, 326, '1668058364_pexels-pixabay-261327.jpg', 1, '2022-11-10 11:02:44', '2022-11-10 06:02:44'),
(1420, 326, '1668058364_pexels-prime-cinematics-2057610.jpg', 1, '2022-11-10 11:02:44', '2022-11-10 06:02:44'),
(1421, 327, '1668255875_12 Days Combo Tour (Swat,Malam Jabba,Hunza Valley,Skardu,Nalter Valley and Khanpur Dame.jpeg', 1, '2022-11-12 17:54:35', '2022-11-12 12:54:35'),
(1422, 328, '1668429522_pexels-fox-1082326.jpg', 1, '2022-11-14 18:08:42', '2022-11-14 13:08:42'),
(1423, 328, '1668429522_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-14 18:08:42', '2022-11-14 13:08:42'),
(1424, 328, '1668429522_pexels-pixabay-261327.jpg', 1, '2022-11-14 18:08:42', '2022-11-14 13:08:42'),
(1425, 329, '1668579385_pexels-fox-1082326.jpg', 1, '2022-11-16 11:46:25', '2022-11-16 06:46:25'),
(1426, 329, '1668579385_pexels-jean-van-der-meulen-1457845.jpg', 1, '2022-11-16 11:46:25', '2022-11-16 06:46:25'),
(1427, 329, '1668579385_pexels-pixabay-261327.jpg', 1, '2022-11-16 11:46:25', '2022-11-16 06:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `tour_itinerary`
--

CREATE TABLE `tour_itinerary` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `place_from` varchar(255) DEFAULT NULL,
  `place_to` varchar(255) DEFAULT NULL,
  `hotel` varchar(255) DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `night_stay` int(11) DEFAULT 0 COMMENT '1=>Yes,0=>No',
  `trip_detail` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_itinerary`
--

INSERT INTO `tour_itinerary` (`id`, `tour_id`, `title`, `place_from`, `place_to`, `hotel`, `transport`, `night_stay`, `trip_detail`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(546, 157, 'uuuuuu', NULL, NULL, NULL, NULL, 0, '[\"vv\"]', NULL, 1, '2022-08-18 05:11:06', '2022-08-18 05:11:06'),
(701, 190, '00', '0', '0', '0', '0', 0, '[\"a\"]', NULL, 1, '2022-08-31 05:56:50', '2022-08-31 00:56:50'),
(705, 54, 'Day 1 - Arrival in Male', 'Islamabad', 'Hunza', 'abc hotel', 'bus', 0, '[\"arrival\"]', NULL, 1, '2022-08-31 06:03:56', '2022-08-31 01:03:56'),
(924, 188, 'Monday', 'Islamabad', 'Mansehra', 'abc hotel', 'bus', 0, '[\"Enjoy the day at leisure with a comfortable sleep in the hotel.\"]', NULL, 1, '2022-10-06 18:25:29', '2022-10-06 13:25:29'),
(1172, 236, 'dwe', 'fdfg', 'dfgdf', 'dfgdf', 'dfgdf', 1, '[\"rtr\"]', NULL, 1, '2022-10-17 18:29:35', '2022-10-17 13:29:35'),
(1210, 258, 'monday', 'Karachi', 'islamabad', 'KI', 'bus', 1, '[\"sdfsd\",\"Dinner\"]', NULL, 1, '2022-10-26 11:41:59', '2022-10-26 06:41:59'),
(1211, 258, 'tuesday', 'islambad', 'lahore', 'IL', 'bus', 1, '[\"wifi\"]', NULL, 1, '2022-10-26 11:41:59', '2022-10-26 06:41:59'),
(1231, 319, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\"]', NULL, 1, '2022-11-01 12:08:50', '2022-11-01 07:08:50'),
(1233, 320, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\",\"b\"]', NULL, 1, '2022-11-01 12:12:18', '2022-11-01 07:12:18'),
(1235, 321, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\",\"bbb\"]', NULL, 1, '2022-11-01 16:05:31', '2022-11-01 11:05:31'),
(1236, 322, '00', 'indore', 'indore', 'hotel', 'car', 1, '[\"tekari\"]', NULL, 1, '2022-11-01 16:08:21', '2022-11-01 11:08:21'),
(1245, 192, 'Monday', 'Islamabad', 'Lahore', 'abc hotel', 'bus', 0, '[\"a\"]', NULL, 1, '2022-11-08 11:08:01', '2022-11-08 06:08:01'),
(1247, 323, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\"]', NULL, 1, '2022-11-09 17:26:20', '2022-11-09 12:26:20'),
(1249, 325, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\",\"b\"]', NULL, 1, '2022-11-10 10:52:33', '2022-11-10 05:52:33'),
(1253, 326, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\"]', NULL, 1, '2022-11-11 12:53:37', '2022-11-11 07:53:37'),
(1298, 328, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\"]', NULL, 1, '2022-11-14 18:08:42', '2022-11-14 13:08:42'),
(1310, 327, '1', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1311, 327, '2', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1312, 327, '3', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1313, 327, '4', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1314, 327, '5', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1315, 327, '6', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1316, 327, '7', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1317, 327, '8', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1318, 327, '9', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1319, 327, '10', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1320, 327, '11', 'z', 'z', 'z', 'z', 0, '[\"z\"]', NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(1529, 329, 'a', 'a', 'a', 'a', 'a', 0, '[\"a\"]', NULL, 1, '2022-11-29 18:30:15', '2022-11-29 13:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `tour_list`
--

CREATE TABLE `tour_list` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `tour_status` enum('available','booked') DEFAULT NULL,
  `tour_title` varchar(255) DEFAULT NULL,
  `tour_description` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `neighb_area` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `tour_code` varchar(255) DEFAULT NULL,
  `tour_start_day` varchar(255) DEFAULT NULL,
  `tour_start_date` date NOT NULL,
  `tour_end_date` date NOT NULL,
  `tour_feature_image` varchar(255) NOT NULL,
  `tour_type` varchar(255) DEFAULT NULL,
  `tour_sub_type` varchar(255) NOT NULL,
  `tour_days` varchar(255) DEFAULT NULL,
  `tour_price` double DEFAULT NULL,
  `tour_child_price` double DEFAULT NULL,
  `tour_deluxe_price` double DEFAULT NULL,
  `tour_gold_price` double DEFAULT NULL,
  `tour_price_others` double DEFAULT NULL,
  `tour_discount` int(11) DEFAULT NULL,
  `children_policy` text DEFAULT NULL,
  `tour_min_capacity` int(11) DEFAULT NULL,
  `tour_max_capacity` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `private_note` text DEFAULT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `tour_policy` text DEFAULT NULL,
  `booking_option` tinyint(2) DEFAULT NULL COMMENT ' "1"=>Instant Booking, "2"=> Approval Booking',
  `payment_mode` tinyint(4) DEFAULT NULL COMMENT '"0" =>Pay at Desk, "1"=>Full Payment, "2"=> Partial Payment ',
  `online_payment_percentage` varchar(255) DEFAULT NULL,
  `at_desk_payment_percentage` varchar(255) DEFAULT NULL,
  `cancellation_and_refund` text DEFAULT NULL,
  `min_hrs` int(11) DEFAULT NULL,
  `max_hrs` int(11) DEFAULT NULL,
  `min_hrs_percentage` int(11) DEFAULT NULL,
  `max_hrs_percentage` int(11) DEFAULT NULL,
  `tour_locations` text DEFAULT NULL,
  `tour_activities` text DEFAULT NULL,
  `tour_services_includes` text DEFAULT NULL,
  `tour_services_not_includes` text DEFAULT NULL,
  `tour_duration` varchar(255) DEFAULT NULL,
  `tour_payment_term` varchar(255) DEFAULT NULL,
  `tour_term_condition` text DEFAULT NULL,
  `tour_document` varchar(255) DEFAULT NULL,
  `operator_name` varchar(255) DEFAULT NULL,
  `operator_contact_name` varchar(255) DEFAULT NULL,
  `operator_contact_num` varchar(25) DEFAULT NULL,
  `operator_email` varchar(255) DEFAULT NULL,
  `operator_booking_num` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_list`
--

INSERT INTO `tour_list` (`id`, `vendor_id`, `tour_status`, `tour_title`, `tour_description`, `city`, `address`, `latitude`, `longitude`, `neighb_area`, `country_id`, `tour_code`, `tour_start_day`, `tour_start_date`, `tour_end_date`, `tour_feature_image`, `tour_type`, `tour_sub_type`, `tour_days`, `tour_price`, `tour_child_price`, `tour_deluxe_price`, `tour_gold_price`, `tour_price_others`, `tour_discount`, `children_policy`, `tour_min_capacity`, `tour_max_capacity`, `commission`, `private_note`, `scout_id`, `tour_policy`, `booking_option`, `payment_mode`, `online_payment_percentage`, `at_desk_payment_percentage`, `cancellation_and_refund`, `min_hrs`, `max_hrs`, `min_hrs_percentage`, `max_hrs_percentage`, `tour_locations`, `tour_activities`, `tour_services_includes`, `tour_services_not_includes`, `tour_duration`, `tour_payment_term`, `tour_term_condition`, `tour_document`, `operator_name`, `operator_contact_name`, `operator_contact_num`, `operator_email`, `operator_booking_num`, `created_at`, `status`, `updated_at`) VALUES
(54, 1044, 'available', 'Attabad Lake', '5 DAY PLAN\r\n2 FLIGHTS\r\n2 FLIGHTS\r\n2 ACTIVITIES', 'Attabad Lake', 'Attabad Lake, Hunza Nagar', '36.3190424', '74.8653331', 'Gojal', 162, 'IJ14756', NULL, '2022-08-01', '2022-08-05', 'pexels-asad-photo-maldives-1320686-tourMainImg-1658817303.jpg', 'adventure', 'standard', '5', 4555, NULL, NULL, NULL, 450, 1, 'Hello', 4, 5, NULL, NULL, 477, 'vbcb', 2, 0, NULL, NULL, 'fgsdg', NULL, NULL, NULL, NULL, 'Maldives', 'location', 'drinks', 'brekfast, lunch, dinner', NULL, NULL, 'Please expect to receive your vouchers 72 hours before your departure date (subject to full payment of your package cost)\r\nPlease note that these packages are customizable, which means that you will be able to make changes to the itinerary/activity if you so desire. The final payment will be calculated as per the activities reflecting on the website which will be outlined in the confirmatory e-mail sent to you.\r\nPersonal expenses such as laundry, telephone calls, room service, alcoholic beverages, mini bar etc., are not included.\r\nIn case your package needs to be cancelled due to any natural calamity, weather conditions etc.  RoadNStay shall strive to give you the maximum possible refund subject to the agreement made with our trade partners/vendors.\r\nIf payment is not made as per the schedule provided in the first booking confirmation e-mail, RoadNStay reserves the right to cancel the booking after attempting to get in touch with you. Refunds would be as per the package cancellation policy.\r\nThe passenger names in the booking form should be exactly as per passports.  RoadNStay  will not bear any liability for the name change fee, if incorrect names and ages have been added at the time of booking.', NULL, 'Khalid', 'M.Khalid', '123654789', 'khalid@gmail.com', '1234567895', '2022-07-26 06:35:03', 1, '2022-07-26 06:35:03'),
(188, 1044, 'available', 'Shogran Valley', 'Do you wish to take a break from the mundanity and din of city life? Then embark on an amazing journey to the Northeast. Our Darjeeling tour package from Indore allows you to discover the grandeur of the Gangtok and Darjeeling at the fullest. If you are looking ahead to spend your time with your family or a honeymoon package or a trip with friends, this package would be the right option.\nHighlights\nUnwind in the exhilarating beauty of Gangtok-DarjeelingSunrise view from the Tiger hillsExcursions to Tsomgo lakeHandicraft shopping from Gangtok', 'Mansehra', 'Shogran Valley Tour, Shogran, Pakistan', '34.6398264', '73.4607431', 'JFQ6+W7Q, Shogran', 162, NULL, NULL, '2022-11-25', '2022-11-30', 'pexels-quang-nguyen-vinh-3355732-tourMainImg-1661259056.jpg', 'adventure', 'standard', '6', 45, NULL, NULL, NULL, 0, 0, 'not yet', 2, 10, NULL, NULL, 557, 'policy', 2, 1, NULL, NULL, 'cancellation policy', NULL, NULL, NULL, NULL, 'Mansehra, Shogran Valley', 'a', 'Meal Plan\nBreakfast\nAccommodation\nTwin-sharing basis at 4-star hotel\nSightseeing at Gangtok and Darjeeling\nPickup and drop by private cabs from the nearest airport and railway stations', 'Meal Plans\nLunch and Dinner\nPersonal expenses\nLaundryTelephone charges\nGratuity and Tips\nMineral water\nSoft and Hard drinks\nRiver rafting\nRock climbing\nParagliding\nAdditional sightseeing\nExtra usage of vehicles\nOther than the mentioned in the itinerary\nEntrance fees and guide charges', NULL, NULL, NULL, NULL, 'Syed Faheem', 'Syed Faheem', '123456', 'syed@gmail.com', '23654187', '2022-08-23 12:50:56', 1, '2022-08-23 12:50:56'),
(190, 1044, 'available', 'Naran valley', 'de', 'Mansehra', 'Naran Valley, Naran, Pakistan', '34.90592850000001', '73.6468434', 'Naran', 162, NULL, NULL, '2022-08-01', '2022-08-27', 'pexels-pixabay-261395-tourMainImg-1661260840.jpg', 'adventure', 'standard', '2', 1000, NULL, NULL, NULL, 0, 0, 'p', 2, 10, NULL, NULL, 557, 'p', 1, 1, NULL, NULL, 'c', NULL, NULL, NULL, NULL, 'c', 'c', 's', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-23 13:20:40', 1, '2022-08-23 13:20:40'),
(192, 1044, 'available', 'Badshahi Mosque', 'd', 'Lahore', 'Badshahi Mosque, Lahore, Pakistan', '31.2048633', '73.93639519999999', '6W3P+WHR, Phool Nager, Lahore', 162, NULL, NULL, '2022-08-31', '2022-09-07', 'TMcC0XShYzoIhzNmFLsSLEKyLntR3geiRSQDFWRi-tourMainImg-1661926198.jpeg', 'adventure', 'standard', '6', 20000, NULL, 323, 33, 2000, 100, 'a', 5, 7, NULL, NULL, 1085, 'a', 2, 2, '1', '99', 'a', 1, 1, 1, 1, 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, 'abc', 'def', '987', 'a@b', '2322', '2022-08-31 06:09:58', 1, '2022-08-31 01:09:58'),
(236, 1077, 'available', 'Mahoba Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-10-04', '2022-10-09', '3-tourMainImg-1663937140.png', 'adventure', 'standard', '7', 18000, NULL, NULL, NULL, 343, 10, 'sdfsdf', 5, 100, NULL, NULL, 1085, 'gfhjfgh', 1, 2, '45', '55', 'fghfgh', 192, 96, 30, 20, 'hgjfgh', 'fghfgh', 'fghfgh', 'fghfgh', NULL, NULL, NULL, NULL, 'shaikh op', 'shaikh', '942509544', 'shaikh@gmail.com', '123456789', '2022-09-23 18:15:40', 1, '2022-09-23 13:15:40'),
(258, 934, 'available', 'Fatehi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-10-22', '2022-10-25', '1655114518_destinations_garzon-tourMainImg-1664276135.jpg', 'adventure', 'deluxe', '7', 18000, NULL, 0, 0, 343, 34, 'fghgh', 23, 50, NULL, NULL, 1083, 'fghfgh', 2, 2, '30', '70', 'fghfgh', 48, 72, 20, 10, 'Islamabad', 'pleasure trip', NULL, 'wifi', NULL, NULL, NULL, NULL, 'shaikh op', 'shaikh', '942509544', 'shaikh@gmail.com', '123456789', '2022-09-27 16:25:35', 1, '2022-09-27 11:25:35'),
(319, 1163, 'available', 'toou2', 'Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-10-29', '2022-10-30', 'pexels-cottonbro-3419692-tourMainImg-1667033426.jpg', 'adventure', 'standard', '2', 1, NULL, 2, 3, 0, 0, 'Children Policy', 1, 10, NULL, NULL, 557, 'Tour Policy', 1, 1, NULL, NULL, 'Cancellation and Refund', 1, 1, 1, 1, 'Tour Locations', 'Tour Locations', 'Tour Services Includes', 'Tour Services Not Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-10-29 14:20:26', 1, '2022-10-29 09:20:26'),
(320, 1163, 'available', 'toou3', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-01', '2022-11-02', 'pexels-pixabay-261327-tourMainImg-1667284907.jpg', 'adventure', 'standard', '2', 10, NULL, 20, 30, 0, 0, 'Children Policy', 2, 10, NULL, NULL, 557, 'Children Policy', 2, 0, NULL, NULL, 'Cancellation and Refund', NULL, NULL, NULL, NULL, 'Cancellation and Refund', 'Cancellation and Refund', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-01 12:11:47', 1, '2022-11-01 07:11:47'),
(321, 1163, 'available', 'touuuu', 'v', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-01', '2022-11-02', 'pexels-quang-nguyen-vinh-3355732-tourMainImg-1667286001.jpg', 'sightseeing', 'standard', '2', 1, NULL, 2, 3, 1, 1, 'Children Policy', 2, 10, NULL, NULL, 557, 'Tour Policy', 1, 1, NULL, NULL, 'Cancellation and Refund', 1, 1, 1, 1, 'Tour Locations', 'Tour Activities', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-01 12:30:01', 1, '2022-11-01 07:30:01'),
(322, 1163, 'available', 'Test', 'Hii', 'Harris County', '8200 Westwold Drive, Tomball, TX, USA', '30.0291731', '-95.6063808', 'Tomball', 226, NULL, NULL, '2022-11-02', '2022-11-09', '4two-gaeste-tourMainImg-1667299100.jpg', 'sightseeing', 'standard', '3', 3000, NULL, 100, 200, 400, 1, '123', 4, 5, NULL, NULL, 1116, 'Hell', 2, 2, NULL, NULL, 'fadsff', NULL, NULL, NULL, NULL, 'fgfdg', 'dfgfdg', 'dgdfg', 'dfgfg', NULL, NULL, NULL, NULL, 'Test', 'techs', '2147483647', 'pushpendrajha@gmail.com', '2147483647', '2022-11-01 16:08:21', 1, '2022-11-01 11:08:21'),
(323, 1163, 'available', 'touuee', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-03', '2022-11-04', 'pexels-pixabay-261327-tourMainImg-1667369831.jpg', 'adventure', 'deluxe', '2', 1, NULL, 2, 3, 0, 0, 'Children Policy', 2, 10, NULL, NULL, 1120, 'v', 2, 1, NULL, NULL, 'Cancellation and Refund', 24, 40, 25, 10, 'Lahore,Karachi,Islamabad', 'Cancellation and Refund', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-02 11:47:11', 1, '2022-11-02 06:47:11'),
(325, 1163, 'available', 'TOU2', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-10', '2022-11-15', 'pexels-pixabay-261327-tourMainImg-1667998245.jpg', 'sightseeing', 'standard', '5', 10, NULL, 20, 30, 0, 0, 'Tour Description', 10, 20, NULL, NULL, 557, 'Tour Policy', 1, 1, NULL, NULL, 'Cancellation and Refund', 1, 2, 1, 1, 'Tour Locations', 'Tour Activities', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-09 18:20:45', 1, '2022-11-09 13:20:45'),
(326, 1163, 'available', 'tou3', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-11', '2022-11-15', 'pexels-pixabay-261327-tourMainImg-1668058364.jpg', 'sightseeing', 'standard', '2', 10, NULL, 20, 30, 0, 0, 'Children Policy', 2, 10, NULL, NULL, 557, 'Tour Policy', 2, 1, NULL, NULL, 'Cancellation and Refund', 1, 2, 1, 1, 'Cancellation and Refund', 'Cancellation and Refund', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-10 11:02:44', 1, '2022-11-10 06:02:44'),
(327, 1266, 'available', 'Big Combo Tour SNOW COVERED SWAT & MALAM JABBA|HUNZA VALLEY | SKARDU | PLUS NALTTER VALLEY AND KHANPUR DAME', '12 Days Big Combo Tour\n8 Days & 7 Nights: from Islamabad  12 Days from Karachi\nSNOW COVERED SWAT & MALAM JABBA|HUNZA VALLEY | SKARDU | PLUS NALTTER VALLEY AND KHANPUR DAME  ALSO\n\nTravel With Smile brining Winters converting into spring season Family and couples Oriented event to Swat Valley to explore , Malam Jabba & Ski Resort, Fizza Ghat, Swat Museum, Mingora, White Palace alnogwith the Skardu and Hunza plus Nalter ak also visit  Khanpur dam on a day trip to Enjoy the Boating, Speed Boating and Parasailing.  \n\n8 Days & 7 Nights: from Islamabad \n12 Days from Karachi', 'Islamabad', 'Islamabad, Pakistan', '33.6844202', '73.04788479999999', 'Islamabad', 162, NULL, NULL, '2022-11-27', '2022-12-04', '12 Days Combo Tour (Swat,Malam Jabba,Hunza Valley,Skardu,Nalter Valley and Khanpur Dame-tourMainImg-1668255875.jpeg', 'adventure_sightseeing', 'standard', '8', 30, 50, 40, 50, 0, 0, 'Up to 2 years stay free (no seat). +2-9 Years Kids will be charge 50% of event fee (Basic ISB Package). Mode of Travel from KHI-ISB-KHI on Train / Bus / Air will be charges as per concerned authorities polices., kids will be allotted folding seat during trip and will accommodate with parents in Hotel Room.', 5, 40, NULL, NULL, 1116, '• Minimum number to carry out a trip is 10, in case a trip is called off by Travel with smile due to low registration the members who have paid will be entitled to a 100% refund or transfer amount to the next upcoming trip. \n• We will avoid using meal provided in train or at the platforms as it is un-healthy, \n• Every member must keep his/her original CNIC.\n• Member should have to report 30 mints before departure time.\n• Only 10 Kg Cargo bags are allowed & every member is responsible for his/her own baggage, and has to carry its own luggage.\n• Member must behave ethically with his/her fellow group members; Otherwise SK Tours can cancel his/her membership at any time.\n• travel with smile is not responsible for personal injuries and accidents, (first aid will be given).\n• Travel with smile is not responsible for loss of any kind of valuable item.\n• No returns will be made in case of cancellation of booking before ONE WEEK of departure date.\n• No refunds shall be made in case of a natural disaster or any unforeseen circumstance beyond human control including but not limited to rains, storms, land sliding, accident, flat tires, engine failure or other vehicle mal-function etc.,\n• Travel with smile can cancel booking at any time.\n• travel with smile can change terms and conditions at any time.\n• Personal weapons are strictly not allowed.\n• Separate rooms for couples, but will be charged accordingly.\n• No drugs or alcohol will be entertained, members should avoid from all sort of illegal and unethical stuff.\n• Sight tickets for forts are not included in the package.\n\n??????????? ?? ?????:\n-	I understand that the adventure/outdoor activities carry a potential risk of personal injury. I further undertake that neither I nor my heirs or legal representatives shall raise any compensation from the Travel with smile\n\nShare with us your details for booking:\nNo. Of Persons\nParticipants names\nPayment receipt\nCNIC numbers of participants\nContact numbers of participants.\nIf any couple bring nikkah farm also', NULL, NULL, '30', '70', '10 Days Before Event Date:\nRs. 5000 per person deduction for Islamabad members.\nRs. 5000 + Train ticket cancellation charges per person deduction for Karachi members.\n-Less then 7 Days and 2 Days before Event Date:\n50% deduction of Event Fee. \n-Less then 2 days (After or before 48 Hours of Event)\nNo refund of event fee', 24, 72, 100, 0, '• Islamabad\n• Swat moterway \n• Mangora\n• Malam jabba\n• shangla top\n• Thakot \n• Hazara Motorway \n• Batgram \n• Besham \n• Dasu \n• Summar Nalla \n• Chilas \n• Jaglot \n• 3 Mountain Junction Point \n• Karakorum Highway \n• Nanga Parbat View Point \n• Hunza Valley\n• Altit Fort\n• Royal Garden\n• Baltit Fort\n• Cultural Heritage of Hunza\n• Karimabad Bazar\n• Attabad Lake\n• Passu\n• Rakaposhi View Point\n• Sost\n• Hussain Bridge\n• Nalter Valley Day Trip on 4 x 4 \n• Ski & Ice Skating Site \n• Snow Leopard Cage \n• Gilgit \n• Raikot Bridge\n• Skardu\n• Shangrila Resort\n• Shigar fort\n• Mantokha waterfall\n• Kachura lake\n• Soq valley\n• Bashu Valley \n• Bashu village\n• Khanpur Dam\n• Boating, Parasailing, Jet ski', 'as detailed', '✅ 2 Meal BF and Dinner  \n✅ Transport ISB – ISB  \n✅ Fuel & Tool Taxes \n✅ Services of a Guide \n✅ Bonfire & BBQ one night \n✅ Hotel Accommodation', 'Porters (for carrying personal equipment of participant) \n❌ Extra expenses due to landslides\\road blocks \n❌ Lunch, Tea, Mineral water and Cold drinks expense \n❌ Entry Fee of Museum | Ski Resort | Forts  \n❌ Parasailing and Boating Charges  \n❌ Extra expenses due to the acts of nature and political reasons etc. \n❌ Any item not mentioned above\n* ???? ????????? *\nOn adventure trek of this type, weather, local politics, transport or a multitude of other factors beyond the control of organizers can result in a change of itinerary. It is, however, very unlikely that the itinerary would be substantially altered; if alterations are necessary the Leader and Guide will decide what is the best alternative, taking into consideration the best interests of the whole group', NULL, NULL, NULL, NULL, 'Travel with Ismail', 'Muhammad ismail', '98797987977', 'mkakhi@yahoo.com', '95487821212', '2022-11-12 17:54:35', 1, '2022-11-12 12:54:35'),
(328, 1163, 'available', 'tourtest1', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-15', '2022-11-20', 'pexels-vincent-rivaud-2363807-tourMainImg-1668429521.jpg', 'adventure', 'standard', '5', 10, NULL, 20, 30, 0, 0, 'Children Policy', 1, 10, NULL, NULL, 557, 'Tour Policy', 2, 1, NULL, NULL, 'Cancellation and Refund', NULL, NULL, NULL, NULL, 'Cancellation and Refund', 'Cancellation and Refund', 'Cancellation and Refund', 'Cancellation and Refund', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '2147483647', 'oe@gmail.com', '2147483647', '2022-11-14 18:08:42', 0, '2022-11-14 13:08:42'),
(329, 1163, 'available', 'tourtest2', 'Tour Description', 'Lahore', 'Circular Road, Mochi Gate Walled City of Lahore, Lahore, Pakistan', '31.5762848', '74.3213639', 'Mochi Gate', 162, NULL, NULL, '2022-11-20', '2022-11-21', 'pexels-jean-van-der-meulen-1457845-tourMainImg-1668579385.jpg', 'adventure', 'city tours', '2', 10, 12, 20, 30, 0, 0, 'Children Policy', 2, 10, 0, 'Private Note', 557, 'Tour Policy', NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 'Tour Locations', 'Tour Locations', 'Tour Services Includes', 'Tour Services Includes', NULL, NULL, NULL, NULL, 'Operator Name', 'Operator Contact Name', '9874562587', 'oe@gmail.com', '9874562587', '2022-11-16 11:46:25', 1, '2022-11-16 06:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `tour_pickup_locations`
--

CREATE TABLE `tour_pickup_locations` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitute` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tour_pickup_locations`
--

INSERT INTO `tour_pickup_locations` (`id`, `tour_id`, `city`, `price`, `transport`, `address`, `latitute`, `longitude`, `area`, `country`, `status`, `created_at`, `updated_at`) VALUES
(13, 324, 'sdfsd', 44, '33', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-08 11:51:23', '2022-11-08 06:51:23'),
(14, 323, 'Indore', 250, 'Bus', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-09 17:26:20', '2022-11-09 12:26:20'),
(15, 323, 'Bhopal', 200, 'Bus', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-09 17:26:20', '2022-11-09 12:26:20'),
(17, 325, 'lahore', 654564646, '874566', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-10 10:52:33', '2022-11-10 05:52:33'),
(21, 326, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-11 12:53:37', '2022-11-11 07:53:37'),
(34, 328, 'lahore', 1477, '65445', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-14 18:08:42', '2022-11-14 13:08:42'),
(38, 327, 'Karachi - Economy', 10000, 'Economy Standard Train', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(39, 327, 'Karachi - Executive', 17000, 'Executive Class Faisal Mover / Kainat Express', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(40, 327, 'Karachi - Business', 22000, 'Business Train Green line / sir Syed Express', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-16 02:11:11', '2022-11-15 21:11:11'),
(80, 330, 'Karachi', 100, 'Bus', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-23 16:14:07', '2022-11-23 11:14:07'),
(81, 330, 'Lahore', 150, 'Bus', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-23 16:14:07', '2022-11-23 11:14:07'),
(82, 331, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-23 16:17:01', '2022-11-23 11:17:01'),
(87, 332, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-24 11:26:04', '2022-11-24 06:26:04'),
(97, 333, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-26 12:14:33', '2022-11-26 07:14:33'),
(100, 334, 'lahore', 1, '1', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-26 14:08:17', '2022-11-26 09:08:17'),
(101, 335, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-26 15:49:31', '2022-11-26 10:49:31'),
(106, 336, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-28 11:07:25', '2022-11-28 06:07:25'),
(117, 337, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-29 11:22:18', '2022-11-29 06:22:18'),
(123, 329, 'lahore', 100, '1010', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-29 18:30:15', '2022-11-29 13:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `trip_with_us`
--

CREATE TABLE `trip_with_us` (
  `id` int(11) NOT NULL,
  `your_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `mattress` enum('Yes','No') NOT NULL,
  `mattress_quantity` int(11) DEFAULT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `departure_city` varchar(255) DEFAULT NULL,
  `tour_duration` varchar(255) DEFAULT NULL,
  `flexible_date` varchar(50) DEFAULT NULL,
  `trip_type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trip_with_us`
--

INSERT INTO `trip_with_us` (`id`, `your_name`, `email_address`, `phone_number`, `adult`, `child`, `rooms`, `mattress`, `mattress_quantity`, `transport`, `date`, `departure_city`, `tour_duration`, `flexible_date`, `trip_type`, `location`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pushpendra Jha', 'pushpendrajha88@gmail.com', '06616630938', 1, 1, 1, 'Yes', NULL, 'Train', '2022-10-27', 'Lahore', '1', '5 days before', 'Adventure', 'Manali', 'Hello', 1, '2022-10-17 18:49:34', '2022-10-17 13:19:34'),
(2, 'sdfsdf', 'votivephp.rahulraj@gmail.com', '942509544', 1, 1, 1, 'Yes', 1, 'Train', '2022-10-19', 'Phaktoon', '1', '2 days ago', 'Sightseeing', 'Manali', 'sdfsd', 1, '2022-10-18 10:13:32', '2022-10-18 04:43:32'),
(3, 'techs', 'pushpendrajha@gmail.com', '09179004123', 3, 2, 2, 'Yes', 2, 'Train', '2022-10-19', 'Phaktoon', '1', '2 days ago', 'Honeymoon', 'Manali', 'Hello', 1, '2022-10-19 17:22:55', '2022-10-19 11:52:55'),
(4, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:30:02', '2022-10-19 12:00:02'),
(5, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:32:25', '2022-10-19 12:02:25'),
(6, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:34:12', '2022-10-19 12:04:12'),
(7, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:35:27', '2022-10-19 12:05:27'),
(8, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:37:09', '2022-10-19 12:07:09'),
(9, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:41:46', '2022-10-19 12:11:46'),
(10, 'techs', 'pushpendrajha@gmail.com', '09179004123', 1, 1, 1, 'No', 0, 'Train', '2022-10-28', 'Phaktoon', '4', '5 days before', 'Sightseeing', 'Shimla', 'Hello', 1, '2022-10-19 17:42:56', '2022-10-19 12:12:56'),
(11, 'krishna patel', 'patelkrish70@gmail.com', '9261678742', 1, 1, 1, 'No', 0, 'Car', '2022-10-27', 'Lahore', '1', '2 days ago', 'Adventure', 'Madhya Pradesh', 'sdsada sadasd', 1, '2022-10-26 14:09:41', '2022-10-26 08:39:41'),
(12, 'saurabh', 'votivetester.saurabh@gmail.com', '9874562587', 2, 1, 1, 'No', 0, 'Bus', '2022-11-16', 'Karachi', '2', '2 days ago', 'Adventure', 'Laddhakh', 'dff', 1, '2022-11-15 16:02:12', '2022-11-15 10:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `num_dialcode_1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country_iso2_code1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_company_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `landline_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `about_me` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `i_speak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `payment_info` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '"1" => Admin, "2" => User, "3" => Scout, "4" => Vendor/Service Provider',
  `is_verify_email` tinyint(4) DEFAULT 0,
  `is_verify_contact` tinyint(4) DEFAULT 0,
  `profile_pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '99',
  `state_id` varchar(255) DEFAULT NULL,
  `user_city` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `wallet_balance` int(11) DEFAULT 0,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alternate_num` varchar(20) DEFAULT NULL,
  `social_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `register_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `website` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `device_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `device_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `device_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vrfn_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `user_signup_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `document_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `document_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `front_document_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `back_document_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guest_login` int(10) UNSIGNED DEFAULT NULL,
  `otp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `email`, `num_dialcode_1`, `country_iso2_code1`, `contact_number`, `user_company_number`, `landline_number`, `password`, `about_me`, `i_speak`, `payment_info`, `role_id`, `is_verify_email`, `is_verify_contact`, `profile_pic`, `gender`, `user_country`, `state_id`, `user_city`, `postal_code`, `latitude`, `longitude`, `wallet_balance`, `address`, `alternate_num`, `social_id`, `register_by`, `website`, `device_id`, `device_token`, `device_type`, `vrfn_code`, `status`, `user_signup_method`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `created_at`, `updated_at`, `remember_token`, `guest_login`, `otp`) VALUES
(336, 'service_provider', 'service', 'provider', 'rahulservpro@gmail.com', NULL, NULL, '3453453450', NULL, NULL, '$2y$10$jGnNJ0JULRSehm5PfC64R.OmXFFGWVlcW3RDhKHMD0vpitf39OLb6', NULL, NULL, NULL, 4, 1, 0, 'avatar5-1657169063.png', NULL, '99', 'madhya pradesh', 'indore', 452009, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'kK40jc', 1, NULL, NULL, NULL, NULL, NULL, '2022-05-25 11:41:12', '2022-08-17 04:50:24', NULL, NULL, NULL),
(346, 'normal_user', 'rahul', 'solanki', 'user@gmail.com', NULL, NULL, '0942509544', NULL, NULL, '$2y$10$.gRna0rWr.gSaYQ4wkL4gO1jXdAOIbNy2mezz9TmKTi/REVoBFiMy', NULL, NULL, NULL, 2, 0, 0, 'bmw-1654599938.png', NULL, '99', 'madhya pradesh', 'indore', 452001, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-26 08:22:09', '2022-06-22 10:41:55', NULL, NULL, NULL),
(347, 'normal_user', 'vivek', 'demo', 'vivek@gmail.com', NULL, NULL, '1234577899', NULL, NULL, '$2y$10$cfKorP8.CE6arkxNyVFFouHvKLpYIuWSBN7wpdvc6Az7K8XIxlJTi', NULL, NULL, NULL, 2, 1, 1, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:10:02', '2022-05-28 06:56:21', NULL, NULL, NULL),
(348, 'normal_user', 'viveksd', 'demo', 'vevie@gmail.com', NULL, NULL, '1231324562', NULL, NULL, '$2y$10$ljLea3bBvsYVpWH3xfE4DeGZKkgPW8tO8/wWe7tDy4apdzhWGm7Qq', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:11:22', '2022-05-26 07:41:22', NULL, NULL, NULL),
(351, 'normal_user', 'nakul', 'demo', 'nakulsuhane@gmail.com', NULL, NULL, '9993776089', NULL, NULL, '$2y$10$d35Lv45BGe7igztuFOUJouYWJAYjjZc3aer0CAMRHvBWRAZsQc8vO', NULL, NULL, NULL, 2, 0, 0, '1649150813_fd06191f-8c6c-436c-a3af-5f2a6a17184c-1653648938.jpg', NULL, '99', 'madhya pradesh', 'indore', 45454545, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:47:25', '2022-06-07 10:16:33', NULL, NULL, NULL),
(352, 'service_provider', 'Votive tech', 'demo', 'votive.techs@gmail.com', NULL, NULL, '1231231234', NULL, NULL, '$2y$10$DrJ/97AfkWzYzgP66hEK5uqE67w2gmtQcWeYgJE6X1E9yd0Cyv1se', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-27 11:08:02', '2022-10-15 13:08:52', NULL, NULL, NULL),
(353, 'service_provider', 'new vendor', 'demo', 'vendor2@gmail.com', NULL, NULL, '3131021230', NULL, NULL, '$2y$10$WiyOS7gEw5gCigyA80oscOGurqTCOnLU1F0x3Y.AOLV.9ncmqb3uO', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-27 13:26:33', '2022-05-28 07:48:22', NULL, NULL, NULL),
(354, 'normal_user', 'Muhammad Khalid', 'demo', 'mkakhi12@yahoo.com', NULL, NULL, '0503589372', NULL, NULL, '$2y$10$IBJySupEyRUT4rRrKx5fuOuO/kNkLvgb1PGQU1x/yquog0Nt38gT6', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', 'madhya pradesh', 'lahore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-05-27 20:36:30', '2022-10-15 13:09:44', NULL, NULL, NULL),
(477, 'scout', 'Swayam', 'Scout', 'votivephp.rahulscout@arss.me', NULL, NULL, '09425095449', NULL, NULL, '$2y$10$qBKV3v2DLktHo4xBehGiE.lLbuz0YRF913QHqNtrcYKTe7hLm8OxC', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', 'madhya pradesh', 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'yFv0op', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-09 10:38:27', '2022-11-05 07:02:09', NULL, NULL, NULL),
(484, 'service_provider', 'spfn', 'demo', 'spfn@gmail.com', NULL, NULL, '9874563214', NULL, NULL, '$2y$10$w2rLUrh9Z/26TKnCBHO3u.gR.JGZrPqp5LNoGvjbg1LmuPRPOlPZq', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'nqRA5N', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-10 05:32:47', '2022-06-14 13:25:49', NULL, NULL, NULL),
(557, 'scout', 'asc', 'sdsd', 'asc@gmail.com', NULL, NULL, '3692581474', NULL, NULL, '$2y$10$NMkamgWsYjkbTzx6vSBmmu8Egw7Hb64sNfzSW58PCFmoHETmIrBTS', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', 'madhya pradesh', 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'quZetW', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-15 12:01:42', '2022-10-13 10:59:45', NULL, NULL, NULL),
(615, 'normal_user', 'ankit', 'demo', 'votiveankit@yopmail.com', NULL, NULL, '9425095332', NULL, NULL, '$2y$10$Jw8FvWrqKdASeJrsyxPIJOMFjbxo/bzSkcQNSt/RuLZx9NVas3fvu', NULL, NULL, NULL, 2, 0, 0, 'http://votivelaravel.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, '0', '0', '0', 'S73y8D', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-23 05:24:43', '2022-06-23 05:24:43', NULL, NULL, NULL),
(627, 'normal_user', 'ankit', 'test', 'votiveankit1@yopmail.com', NULL, NULL, '9425095331', NULL, NULL, '$2y$10$X6VzSjzM72R/YQkxUH2Qj.KkCanNV.ASJ/hrf68PhGxsTOp6hDke2', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, 'adad', 'adad', 'ada', 'Z4c6zV', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-23 07:03:00', '2022-06-23 07:03:00', NULL, NULL, NULL),
(637, 'normal_user', 'ankit', 'test', 'votivemobile.ankit@gmail.com', NULL, NULL, '94250235651', NULL, NULL, '$2y$10$TlCDG4qN5ANHEfPNZhLUEOKBJuLyHJ3xu3po7pqakjtNcUkYSlvY6', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1656149554.jpg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, 'ss', 'ss', 'Ios', 'fGUO0w', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-23 09:39:39', '2022-09-30 07:15:52', NULL, NULL, '5401'),
(641, 'normal_user', 'neha', 'test', 'votivephp.neha@gmail.com', NULL, NULL, '942502356532', NULL, NULL, '$2y$10$nWV4O1QmLLybfpiMtiVAO.MEh8W1lqYmegnCjyF72RIpaBXxj9gpG', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1656063127.jpeg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, 'dsf', 'cxcv', 'dfdf', '2kBJbM', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-24 05:47:56', '2022-10-17 09:12:23', NULL, NULL, NULL),
(645, 'normal_user', 'neha', 'mandloi', 'votivephp.neha679@gmail.com', NULL, NULL, '234156590', NULL, NULL, '$2y$10$LDOHwFfaKAbkkpVbOUxp4eOAAVR7wdACXfeKWoKM3L5932SHzlsiK', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1656067497.jpg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, 'cvvcx', 'vcvcv', 'ccxvc', 'LDLcit', 1, NULL, NULL, NULL, NULL, NULL, '2022-06-24 10:44:58', '2022-06-24 10:46:43', NULL, NULL, NULL),
(649, 'normal_user', 'nakul', 'Votive', 'votive.mrk1@gmail.com', NULL, NULL, '9993776088', NULL, NULL, '$2y$10$8qW6frLZo19LxIWqCduJK.UZSznGwXvAMolkfNUBYQke8VXDymp/W', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, 'ss', 'ss', 'Ios', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-06-24 10:54:14', '2022-06-28 10:35:43', NULL, NULL, NULL),
(678, 'normal_user', 'test', 'buyer', 'votivephp.nehaojha-buyer@gmail.com', NULL, NULL, '408-651-5221', NULL, NULL, '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'paypal', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Passport', '32132132123', '15-1662977528.png', '16-1662977528.png', '2022-06-28 11:49:00', '2022-09-12 05:12:21', NULL, NULL, NULL),
(689, 'normal_user', 'facilitator', 'account', 'deepaksahucwa-facilitator@gmail.com', NULL, NULL, '408-582-1562', NULL, NULL, '0e7517141fb53f21ee439b355b5a1d0a', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'paypal', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Passport', '32132132123', '3-1663158556.png', '2bn-1663158556.png', '2022-06-30 13:07:14', '2022-09-14 07:29:25', NULL, NULL, NULL),
(712, 'normal_user', 'krishna', 'patel', 'votivedesigner.krishna@gmail.com', NULL, NULL, '9575487052', NULL, NULL, '$2y$10$4ZzYLkTXVhJibZq7Mnu8WOiHlkGWpNAnAVAnypRnLGpUdZijCJ/g2', NULL, NULL, NULL, 2, 0, 0, '1a-1656928730.jpg', NULL, '99', 'madhya pradesh', 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-02 06:26:07', '2022-07-02 11:43:47', NULL, NULL, NULL),
(754, 'normal_user', 'devid', 'techs', 'votivedeepak.php12@gmail.com', NULL, NULL, '09179004123', NULL, NULL, '$2y$10$KC92IWcngGCJ6qqUg1gXv.AsU3ifvjSH6SdOOdR9r1iQ8EP6KPtRa', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, 'web', NULL, '123', '14566', 'android', 'MPOi9m', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-07 06:17:46', '2022-11-03 06:13:14', NULL, NULL, NULL),
(755, 'normal_user', 'devid', 'dhawan', 'votivedeepak123.php@gmail.com', NULL, NULL, '8978974147', NULL, NULL, '$2y$10$2YISriK2evnRiTBIsAdYzedswm1yFbS5njB8edZ.i4uLMZy//qnhO', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '14566', 'android', 'ypJIOP', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-07 06:20:07', '2022-07-07 06:20:07', NULL, NULL, NULL),
(789, 'normal_user', 'devid', 'dhawan', 'votivedeepak1.php@gmail.com', NULL, NULL, '8978974447', NULL, NULL, '$2y$10$lw9LeJtpgX/ywPDuhM2Pnu0SuOf41sqfklgesuoS6GagLbitlbmga', NULL, NULL, NULL, 2, 1, 0, 'http://votivelaravel.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '14566', 'android', '1PJJ5t', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-08 06:01:52', '2022-07-08 06:01:52', NULL, NULL, NULL),
(790, 'normal_user', 'devid', 'dhawan', 'votivedeepak11.php@gmail.com', NULL, NULL, '8978971117', NULL, NULL, '$2y$10$sh3/paT.wVQk.F848BtgzewDd4hVBMMPGvnyqVsnuv7OS82M/wocq', NULL, NULL, NULL, 2, 1, 0, 'https://votivetechnologies.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '14566', 'android', 'TdOCHQ', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-08 06:02:23', '2022-07-08 06:02:23', NULL, NULL, NULL),
(791, 'normal_user', 'devid', 'dhawan', 'votivedeepak110.php@gmail.com', NULL, NULL, '8978978817', NULL, NULL, '$2y$10$021kPZF26DUzhfYu/8FBoOQIc3.aSgBxGQBSBe9kRSGxRuWXGe4fq', NULL, NULL, NULL, 2, 1, 0, 'https://votivetechnologies.in/roadNstays/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '14566', 'android', 'bh3Pm7', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-08 06:05:28', '2022-07-08 06:05:28', NULL, NULL, NULL),
(819, 'normal_user', 'Pushpendra', 'Jha', 'pushpendrajha@gmail.com', NULL, NULL, '9179004123', NULL, NULL, '$2y$10$7Y7QGobXjBeOVOWCNYKrkOFfPPUPDCTcsL5hBCXN2Zg0d09Ig3rVe', NULL, NULL, NULL, 2, 0, 0, 'mumbai-1661233406.jpg', NULL, '99', 'Madhya Pradesh', 'Indore', 452001, NULL, NULL, 0, 'Indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-11 06:06:08', '2022-10-18 14:04:15', NULL, NULL, NULL),
(833, 'service_provider', 'rahul', 'solanki', 'votivephp.rahul@gmail.com', '91', 'in', '9425095440', NULL, NULL, '$2y$10$Zp4hv7NWfA9NTU2I43ZE5uLMTlyuQkn89.pzT4tRgoZH.qCNJSCsy', 'Full Stack Developer in php and python', 'Tell me any issue i\'ll Fix it', 'Billionaire', 4, 1, 0, NULL, NULL, '99', 'Madhya Pradesh', 'Indore', 452009, NULL, NULL, 0, 'Rnt Marg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-12 10:05:14', '2022-11-01 13:16:18', NULL, NULL, NULL),
(834, 'service_provider', 'Pushpendra', 'Jha', 'votivephppushpendra@gmail.com', NULL, NULL, '9179004123', NULL, NULL, '$2y$10$ckRPMs1uuAB77Os.KV9Whe.pPVUVCe7iuRxTJBZ9IJpWbwbNc84US', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-12 10:09:51', '2022-07-14 13:20:39', NULL, NULL, NULL),
(837, 'normal_user', 'srb', 'sahu', 'votivetester.saurabh@gmail.com', NULL, NULL, '9874562585', NULL, NULL, '$2y$10$PPKlBAGiKMjMKoL6.DwKyOmWq8ait03JWpSYUYWwmFM1gzo7lJteq', NULL, NULL, NULL, 2, 1, 0, 'pexels-aline-viana-prado-3491940-1669785794.jpg', NULL, '99', 'madhya pradesh', 'indore', 452001, NULL, NULL, 0, 'rnt road', NULL, NULL, NULL, NULL, 'ss', 'ss', 'Android', NULL, 1, NULL, 'Voter Id', '9874562587', 'Admin  Dashboard (2)-1665752452.pdf', 'Admin  Dashboard (2)-1665752452.pdf', '2022-07-13 05:03:05', '2022-11-30 05:42:45', NULL, NULL, '6176'),
(934, 'service_provider', 'Ayesha', 'Zahid', 'ayeshazahid913@gmail.com', NULL, NULL, '0123456789', NULL, NULL, '$2y$10$OYsOqmiWukbtgWCbl6rFz.W6TPYI2/QlqXpjbyZhsTpg/MS0AZ0SW', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'lahore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'TYRTli', 1, NULL, NULL, NULL, NULL, NULL, '2022-07-26 10:58:01', '2022-11-08 06:30:18', NULL, NULL, NULL),
(1044, 'service_provider', 'Muhammad', 'Khalid', 'mkakhi123@icloud.com', NULL, NULL, '00966503589372', NULL, NULL, '$2y$10$KZNN5X16GFraiNK00gNuSOwKTElOakxBGljc5MEd6xkOs2/J9H2dC', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '187', NULL, 'Riyadh', NULL, NULL, NULL, 0, 'Riyadh', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'QmUgjZ', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-16 20:48:54', '2022-11-19 19:03:21', NULL, NULL, NULL),
(1053, 'service_provider', 'abc', 'def', 'abc@gmail.com', NULL, NULL, '1234568990', NULL, NULL, '$2y$10$R6iv2evIkGlONaOngZrYZeuSykzE5caKIshwzrhpgTJrYBHzFhKFm', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-18 11:23:01', '2022-08-18 11:23:01', NULL, NULL, NULL),
(1054, 'service_provider', 'Afraz', 'Khan', 'roadnstays@yahoo.com', '92', 'pk', '3004008465', NULL, '923224008465', '$2y$10$nO6yaV./cIgrzXm9VvGCSeJ6VcdnO5K/Gf.g2rJoAYlWEPinsE54W', 'Owner', 'Urdu, English, Local', 'JAZZCASH - 0300 400 8465,\n\nroadnstays.com will make payment after 07-Days of every guest check-out & roadnstays.com will be charged 15% on every guest reservation. +923224008465 +924235871541-42-43-44', 4, 1, 0, NULL, NULL, '162', NULL, 'Lahore', NULL, NULL, NULL, 0, 'Lahore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'PIwYW1', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-18 22:10:50', '2022-10-12 19:27:34', NULL, NULL, NULL),
(1058, 'service_provider', 'Jamail', 'haider', 'jumailhaider04@gmail.com', NULL, NULL, '923418994572', NULL, NULL, '$2y$10$HPI.zeIGmp0pyZ6h.Fe9UOXXW8gtH/wFh3BT0lq.edlrrruXhzwom', NULL, NULL, '\"• Bank Name: Habib Bank Limited\n• Account Title: Jumail haider\n• Account Number: 12467903703903\n• Branch: Township Branch Lahore.\"', 4, 1, 0, NULL, NULL, '162', NULL, 'Gilgit', NULL, NULL, NULL, 0, 'Gilgit Baltistan Tourism', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'egN0Gn', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-19 09:48:29', '2022-10-12 21:30:54', NULL, NULL, NULL),
(1077, 'service_provider', 'Arjun', 'Rana', 'arjun@gmail.com', NULL, NULL, '4561234562', NULL, '0261-224466', '$2y$10$zddfWQsYi.EMkJMXsZYRieZt7r4aGcAaficDVQlRcsBbzz7Xf09c6', 'I\'m devil of my world', 'Nothing to say', 'Paypal', 4, 1, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'bsbsb', NULL, NULL, 'web', NULL, NULL, NULL, NULL, '4hF77W', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-24 10:19:38', '2022-08-24 10:19:38', NULL, NULL, NULL),
(1079, 'normal_user', 'ravi', 'kumar', 'ravi@gmail.com', NULL, NULL, '65478932', NULL, NULL, '$2y$10$0zlQfoHc1tTODPnjXrcDie3xfjis8qaClBF9scXBdSrpSdtBc37yW', NULL, NULL, NULL, 2, 1, 0, 'food-1666846950.png', NULL, '99', NULL, 'indore', NULL, NULL, NULL, 0, 'Rajendra Nagar', NULL, NULL, 'web', NULL, 'ss', 'ss', 'Ios', 'aeCKTZ', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-24 12:31:58', '2022-10-26 13:06:19', NULL, NULL, NULL),
(1080, 'service_provider', 'john', 'abc', 'john@gmail.com', NULL, NULL, '1234567890', NULL, '0215478963', '$2y$10$6xjzzwtt3zPICOyJn0LIZub6qS9iihdppjYMEZanqVgiJ7VHTT8Bi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 'Urdu', NULL, 4, 1, 0, NULL, NULL, '162', NULL, 'Lahore', NULL, NULL, NULL, 0, 'Lahore Pakistan', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'YG22Tq', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-24 14:09:28', '2022-08-24 14:09:28', NULL, NULL, NULL),
(1081, 'service_provider', 'Ghansyam', 'Govind', 'ghansyam@gmail.com', '91', 'in', '09425095449', NULL, '0261-226644', '$2y$10$FuAKlE1FNqyXvo6afCJaGeuBT4dhTjZ.8BNPUyyWkJDDl5NRSJWdW', 'sdfsd', 'sdfsd', 'fsdf', 4, 1, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'bsbsb', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'z9IFTL', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-25 06:31:33', '2022-08-25 12:19:41', NULL, NULL, NULL),
(1082, 'service_provider', 'Rahim', 'Jadoon', 'Jadoon7123@gmail.com', NULL, NULL, '3149369335', NULL, NULL, '$2y$10$L.z5rylLJgegThaZ4o7gy.u8HCLz2Q3tOUMC4.Yf/8361vRmQUyk6', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'lahore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-29 08:22:03', '2022-09-06 00:40:35', NULL, NULL, NULL),
(1083, 'scout', 'Pushpendra', 'Jha', 'Pushpendra@gmail.com', NULL, NULL, '06616630938', NULL, NULL, '$2y$10$07Efpice9twdee4pWrCvs.n3jghqSD.RHYDuBExobCaHkwxOIk.lK', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'MLxmsM', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-30 10:09:09', '2022-10-13 10:59:43', NULL, NULL, NULL),
(1084, 'scout', 'Sanjay', 'Bairagi', 'sanjay@gmail.com', NULL, NULL, '545487878787', NULL, NULL, '$2y$10$7KI63lu8Uw8gYj.3YzSlH.A9.ECwoP.Xy0rivg4Clt.pE5gVBRIV2', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'XBKGux', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-30 10:14:44', '2022-10-13 10:59:41', NULL, NULL, NULL),
(1085, 'scout', 'Roman', 'Tajik', '99tajid@gmail.com', NULL, NULL, '3403003000', NULL, NULL, '$2y$10$1csaWknLvsygkL6Yj6sW0.573yUX2ESG9AWoNZuX0F6maAf.VnrPi', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'Sawat', NULL, NULL, NULL, 0, 'Sawat, Pakistan', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'RnB5SP', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-30 10:15:05', '2022-10-13 10:59:39', NULL, NULL, NULL),
(1088, 'service_provider', 'Test', 'Test', 'Test@gmail.com', NULL, NULL, '6616630938', NULL, NULL, '$2y$10$DXA3vjsRAHn3dbTezQkuMO0gq1HYWubO8DCc36P.ED2vUcQ28DptK', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-31 09:46:01', '2022-08-31 04:46:01', NULL, NULL, NULL),
(1089, 'service_provider', 'Test1', 'Test', 'test12@gmail.com', NULL, NULL, '7894562301', NULL, NULL, '$2y$10$reQA3nwk0437Q6OvZxI5WOE2KQHBD4rVwvPcG6szlS/gXfDM1yuMO', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-08-31 09:48:16', '2022-08-31 04:48:16', NULL, NULL, NULL),
(1100, 'service_provider', 'Kabir', 'singh1', 'kabir@gmail.com', '92', 'pk', '09425095449', NULL, '0261-202244', '$2y$10$445w/dqC2vmbaHSoSl9sKuv3cq95ZhcdnoRfPmX2atnfoE6lJmOaC', 'sdfsd', 'sdfsdf', 'fsdfsd', 4, 1, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'bsbsb', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'arDPiM', 1, NULL, NULL, NULL, NULL, NULL, '2022-08-31 11:44:11', '2022-08-31 07:18:09', NULL, NULL, NULL),
(1114, 'scout', 'Zeeshan', 'Munawar', 'zeeshan.munawar@venrooms.com', NULL, NULL, '923214520529', NULL, NULL, '$2y$10$V55JV.cCwvZAOu1lrLS0ouryPzIUZMhoZ83QNlvNN1ShZxZ42jQga', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'Lahore', NULL, NULL, NULL, 0, 'Lahore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'J63YBG', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-03 17:15:54', '2022-10-13 10:59:37', NULL, NULL, NULL),
(1115, 'scout', 'Ayaz Ali Miyan', 'Ayaz Ali Miyan', 'hayazali29@gmail.com', NULL, NULL, '3429628129', NULL, NULL, '$2y$10$u/cVmgHCu6LE/04s9PMXWuFSZA8aE.UjDKJ73XpeCcHi5R6FnvhAO', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'Sawat', NULL, NULL, NULL, 0, 'Sawat, Pakistan', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'SaAOrb', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-04 10:13:16', '2022-10-13 10:59:34', NULL, NULL, NULL),
(1116, 'scout', 'Muhammad Saud', 'Muhammad Saud', 'saudkk95@gmail.com', NULL, NULL, '3323994514', NULL, '78784545454', '$2y$10$RVTZpZIyBvSK7gt5slt6ke6l.c7H5eOiilM8E6G4.LX/LlHZAWaqm', NULL, NULL, NULL, 3, 1, 0, 'unnamed (1)-profile_picture-1662458102.jpg', NULL, '162', NULL, 'Karachi', NULL, NULL, NULL, 0, 'Karachi,Pakistan', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'KgEfiD', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-04 13:45:01', '2022-10-13 10:59:31', NULL, NULL, NULL),
(1117, 'normal_user', 'Ayesha', 'Zahid', 'ayesharoadandstay@gmail.com', NULL, NULL, '0123456789', NULL, NULL, '$2y$10$sMfFSnGDUk3EgM2DlgiJKewppJoSoSv35dCsNzbY0VXmJYReXB78S', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, 'Lahore', NULL, NULL, NULL, 0, 'Lahore Pakistan', NULL, NULL, 'web', NULL, 'ss', 'ss', 'Android', 'QXUf3I', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-05 12:31:26', '2022-09-05 07:31:26', NULL, NULL, NULL),
(1118, 'normal_user', 'pk', 'k', 'parveen.votive@gmail.com', NULL, NULL, '123456789', NULL, NULL, '$2y$10$69pBlGXRCS4UaNNMYVxzve/gOzabl9l.jXJ3NPgokc8IvxxOCit9i', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'XUAmkw', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-05 13:08:18', '2022-09-05 08:08:18', NULL, NULL, NULL),
(1119, 'scout', 'Test', 'Test', 'test78@gmail.com', NULL, NULL, '787878787878', NULL, '4545454545', '$2y$10$3n.Jgil9AX355uipTJ46wej59/WDyyniaCz.xzPIir8L8fLc3Ph2q', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'zZd8M0', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-06 10:42:12', '2022-10-13 10:59:26', NULL, NULL, NULL),
(1120, 'scout', 'Test', 'Test', 'test78fdg@gmail.com', NULL, NULL, '787878787878', NULL, '4545454545', '$2y$10$z9790S5QdfiYRQ8WOwV3XeIcxFHTrkD6F7BJRwV1tRQsAt7BdHdjO', NULL, NULL, NULL, 3, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'xKw11T', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-06 10:43:21', '2022-11-22 12:23:34', NULL, NULL, NULL),
(1121, 'service_provider', 'Husnain', 'Ghazanfar', 'hasnainghazanfar30@gmail.com', NULL, NULL, '3002154157', NULL, NULL, '$2y$10$cFJWcMrqBe9fcJFB5S6GK.fjMiTZWBHUp4Sr0yRPVP9pfZs3k1UQm', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-09-06 11:44:34', '2022-09-06 06:44:34', NULL, NULL, NULL),
(1143, 'normal_user', 'ih', 'jk', 'ih@gmail.com', NULL, NULL, '965412354', NULL, NULL, '$2y$10$5UBqz8RUVUtq/nGcNM78/eGc8sLc9oHjKALVljO2x4dyqc1a81ota', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Android', 'MLfwSJ', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-14 11:00:47', '2022-09-14 06:00:47', NULL, NULL, NULL),
(1144, 'normal_user', 'ih', 'jk', 'hi@gmail.com', NULL, NULL, '8745361245', NULL, NULL, '$2y$10$ThQ1Y/aK9Qb.yjCRybnoN.fyjCvWfQXakaQWLUoOSo7uEYMGONbzm', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Android', 'dTXzx0', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-14 11:02:22', '2022-09-14 06:02:22', NULL, NULL, NULL),
(1151, 'normal_user', 'rahul', 'raj', 'votivephp.rahulraj@gmail.com', NULL, NULL, '4563217343', NULL, NULL, '$2y$10$oIBjaxPhHdUSpbCf9UOgO.M2du4TBF1dIEiGxqCbdQucAnXY8W.oC', NULL, NULL, NULL, 2, 1, 0, '1655113098_avatar5-1665034883.png', NULL, '99', 'Madhya Pradesh', 'Indore', 452002, NULL, NULL, 0, 'shree vardhan complex', NULL, NULL, 'paypal', NULL, 'ss', 'ss', 'Android', NULL, 1, NULL, 'Passport', 'sdfs343', 'back-1667036742.jpg', 'front-1667036742.jpg', '2022-09-14 13:12:05', '2022-10-31 09:45:31', NULL, NULL, NULL),
(1153, 'normal_user', 'rahul', 'solanki', 'pk.votive@gmail.com', NULL, NULL, '5786764564', NULL, NULL, '$2y$10$X9pePLLbycDs472sk1EKMOqGxJ0cHYtkxsrxJJGmfZfvgmKuhD2Bq', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '1234', 'ios', '7OXErL', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-15 04:59:32', '2022-09-14 23:59:32', NULL, NULL, NULL),
(1158, 'normal_user', 'ssfdsssf', 'ddfdsfs', 'fdsfss@gmail.com', NULL, NULL, '45632178', NULL, NULL, '$2y$10$YZsztLojy04YGBBN/yh8SObV1tpA/m5qj.CiuQHJSYhu82U4HLFp6', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'vP7jzR', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-15 10:50:45', '2022-09-15 05:50:45', NULL, NULL, NULL),
(1163, 'service_provider', 'saurabh', 'sahu', 'ssnothinginlife@gmail.com', NULL, NULL, '7412583698', NULL, NULL, '$2y$10$E.X8dvE5IljJBRgzpkx96uN09v6PmPLr5iRHLocleMddfcfI71PWa', NULL, NULL, NULL, 4, 1, 0, 'pexels-asad-photo-maldives-1450372-1669712421.jpg', NULL, '162', 'panjab', 'Lahore', 6554, NULL, NULL, 0, 'circular road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-09-19 05:52:33', '2022-11-26 12:35:39', NULL, NULL, NULL),
(1182, 'normal_user', 'Pushpendra', 'techs', 'pushpendrajha@gmail.com', NULL, NULL, '09179004123', NULL, NULL, '$2y$10$zjryk5Ju1fB7mCRnu7N.KOyz1k.tbV9r/ZhvPZyVajX/WDqTK2AKu', NULL, NULL, NULL, 2, 1, 1, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Passport', '654645987987', '4Twoo landing page-1663847862.psd', 'alfafa-1663847868.txt', '2022-09-21 15:12:33', '2022-10-01 12:06:59', NULL, NULL, NULL),
(1200, 'normal_user', 'rohan', 'kumar', 'rohan@gmail.com', NULL, NULL, '3698521478', NULL, NULL, '$2y$10$CJ.pMb1bReEVyu3v9xq4Jer7m6TvdFMaX4w9EnA1a6cFPI1H7yZti', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'rrXaCS', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-26 15:24:24', '2022-09-26 10:24:24', NULL, NULL, NULL),
(1201, 'normal_user', 'rohan', 'kumar', 'rohan2512@gmail.com', NULL, NULL, '8795462131', NULL, NULL, '$2y$10$S4S4BLewjI1ANFf.7qW4VOcCtk90J.2V1uK6a12fyFTKgevW36y1W', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', '8HjiBt', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-26 15:25:02', '2022-09-26 10:25:02', NULL, NULL, NULL),
(1206, 'normal_user', 'pushpendra', 'techs', 'pushpendrajha78@gmail.com', NULL, NULL, '09179004123', NULL, NULL, '$2y$10$/i2SjhEwu9cHvB0kUGDRFuQovduG2cLDpIbo/JXQSMqf9lpCSASqy', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Passport', '1213141411', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664342085.jpeg', 'WhatsApp Image 2022-08-26 at 4.20.51 PM-1664342085.jpeg', '2022-09-28 10:47:01', '2022-10-01 12:06:42', NULL, NULL, NULL),
(1211, 'normal_user', 'rahul', 'solanki', 'kp.votive@gmail.com', NULL, NULL, '5786764560', NULL, NULL, '$2y$10$u.ceDTiGE7geMgjOT2.UWOcBbsNCCkgrwcbRoI09ZbPhIiUzCrJJy', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '1234', 'ios', 'jcuEA7', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 13:44:55', '2022-09-28 08:44:55', NULL, NULL, NULL),
(1212, 'normal_user', 'bk', 'solanki', 'bk.votive@gmail.com', NULL, NULL, '5786764562', NULL, NULL, '$2y$10$m8WNFYCmR0dYfCyoefDTh.bQIee12n2gvWRrE/aaHpZy6YhHAAk/W', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '123', '1234', 'ios', 'oyhKsH', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 13:46:32', '2022-09-28 08:46:32', NULL, NULL, NULL),
(1214, 'normal_user', 'lp', 'kl', 'lppp@gmail.com', NULL, NULL, '12345656', NULL, NULL, '$2y$10$Lc1WRXJ.J1Sm3dZY7tNJLOjjNY2VP8UmC15nCvirabfrE.a7H6rQq', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'b5yqBf', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 13:56:03', '2022-09-28 08:56:03', NULL, NULL, NULL),
(1215, 'normal_user', 'dd', 'gh', 'dd@gmail.com', NULL, NULL, '32165478', NULL, NULL, '$2y$10$yoxIOvC9z3aNs1yP0m6ipux0KagDQQ.GCxbnHVblpJxkW4QpsENP2', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'y5Kpe8', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 14:00:46', '2022-09-28 09:00:46', NULL, NULL, NULL),
(1216, 'normal_user', 'vinita', 'dubey', 'vinita@gmail.com', NULL, NULL, '32145698', NULL, NULL, '$2y$10$5tUNyxb.ZC3c5YyUYgQeWOF9PEjZILp83lzX8tSBiABOY9MgUmKwe', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'Dpj8Xx', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 14:03:40', '2022-09-28 09:03:40', NULL, NULL, NULL),
(1217, 'normal_user', 'heena', 'khan', 'heena@gmail.com', NULL, NULL, '123456012', NULL, NULL, '$2y$10$.Db.NJLdJlG5RIvRxiUm0u6PrQ0e36KnMNZdNvB2fn8lom0EsqXe2', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'xlbUH5', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 14:07:57', '2022-09-28 09:07:57', NULL, NULL, NULL),
(1220, 'normal_user', 'pinky', 'rathore', 'pinky@gmail.com', NULL, NULL, '123654789', NULL, NULL, '$2y$10$JahOh6Ds4RTSXYnYk7G3qOge0LVkaLPRn9u2mNowiGkcBog99x1za', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'RBrMCF', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 14:32:07', '2022-09-28 09:32:07', NULL, NULL, NULL),
(1221, 'normal_user', 'ppp', 'kumar', 'pk@yopmail.com', NULL, NULL, '12365478', NULL, NULL, '$2y$10$uXLypxuxu.9PRSI5n7gHPe.qdLtDf1C985Q8aBTvjU6gg.B9URcPC', NULL, NULL, NULL, 2, 1, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'ss', 'ss', 'Android', 'Vzbfjj', 1, NULL, NULL, NULL, NULL, NULL, '2022-09-28 14:52:30', '2022-09-28 13:58:57', NULL, NULL, NULL),
(1234, 'normal_user', 'shweta', 'sharma', 'ss@gmail.com', NULL, NULL, '654787932', NULL, NULL, '$2y$10$8JPC5Zt0wj/SQBL5SXEk9eWPBoijIV/CBAIWrrSoPcJWq9k/nuzLO', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Voter Id', '6547', 'Simulator Screen Shot - iPhone 12 Pro - 2022-09-15 at 14.12.08-1664607912.png', 'Simulator Screen Shot - iPhone 12 Pro - 2022-10-01 at 11.34.00-1664607912.png', '2022-10-01 12:37:30', '2022-10-01 07:37:30', NULL, NULL, NULL),
(1235, 'normal_user', 'jaya', 'pd', 'java@yopmail.com', NULL, NULL, '36985214', NULL, NULL, '$2y$10$CCF8cn9VdhF.cBM6PtTDLeypQ.4B6O41V2tabMCe9HDB6yJ/TvzuS', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Android', 'HrtNsI', 1, NULL, NULL, NULL, NULL, NULL, '2022-10-06 10:41:08', '2022-10-06 05:41:08', NULL, NULL, NULL),
(1236, 'normal_user', 'jayad', 'pg', 'javadd@gmail.com', NULL, NULL, '36985200', NULL, NULL, '$2y$10$FSx2yVcgD43YJCI0InMCAuBM6qngKdUkp58/pWhh/biQl4zl4K2du', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Android', 'wzjMDG', 1, NULL, NULL, NULL, NULL, NULL, '2022-10-06 10:44:28', '2022-10-06 05:44:28', NULL, NULL, NULL),
(1237, 'normal_user', 'kk', 'gg', 'kd@yopmail.com', NULL, NULL, '5841236', NULL, NULL, '$2y$10$VSpSyQYZxRgOmd4R/4Lp4uVADCTWneWYHD7mc2AwePnREnUz5y8aq', NULL, NULL, NULL, 2, 1, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, 'web', NULL, 'ss', 'ss', 'Ios', 'GYB4wl', 1, NULL, NULL, NULL, NULL, NULL, '2022-10-06 10:46:44', '2022-10-14 07:11:46', NULL, NULL, '1808'),
(1253, 'normal_user', 'Muhammad', 'Khalid', 'mkhalid71111@hotmail.com', NULL, NULL, '3373164408', NULL, NULL, '$2y$10$UZ8u/ne9jgfZXx/viy/ymOHMfarjIsMR1T650iskrNFfXgv.EEHpW', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Passport', '12345', 'Screenshot_1-1665592136.png', 'Screenshot_1-1665592137.png', '2022-10-12 09:35:07', '2022-10-28 12:13:49', NULL, NULL, NULL),
(1254, 'normal_user', 'Muhammad', 'Khalid', 'roadnstays@gmail.com', NULL, NULL, '3373164408', NULL, NULL, '$2y$10$Wqrp0v5hIiar7AnAegLFdeqt9Ogtl3r1PULjbGYgLS8txE8G7uwxm', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-13 00:45:32', '2022-10-13 11:20:12', NULL, NULL, NULL),
(1256, 'normal_user', 'Rajshree', 'Premium', 'rajshree@gmail.com', '92', 'pk', '6556464645', NULL, NULL, '$2y$10$RrGulpYYWx5wuVlGPdcP3eokyAH.yHf.fwRVCir96SIgpuCpyjCtK', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-13 17:09:54', '2022-10-14 05:44:32', NULL, NULL, NULL),
(1257, 'service_provider', 'rajshree vendor', 'asdf', 'rajvendorsa@gmail.com', '92', 'pk', '6546465465', NULL, NULL, '$2y$10$jH6BUfVYASiN1X7Cb0JMTeQ/kCftMMtMylnyH6MOkS0p8aKIk3zX6', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-13 17:24:25', '2022-10-15 09:03:50', NULL, NULL, NULL),
(1258, 'normal_user', 'Arita', 'jain', 'jain@gmail.com', NULL, NULL, '55557788', NULL, NULL, '$2y$10$/wZJ/QR1RGMgnCNbim6DyefBrMOtgm1tXbhG5G0ZWzMvWfpzuFTp2', NULL, NULL, NULL, 2, 0, 0, 'https://www.roadnstays.com/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'fdhaskldf', 'ss', 'Ios', 'emq2F3', 1, NULL, NULL, NULL, NULL, NULL, '2022-10-14 12:04:35', '2022-10-14 11:03:58', NULL, NULL, NULL),
(1259, 'normal_user', 'roadnstays', 'salonki', 'contact@5656roadnstays.com', NULL, NULL, '9876123752136', NULL, NULL, '$2y$10$pSlBIDhQc94ISNsfEHXdGuDMU6z34fltxZ7HJ71J2T8lQo57VnO9O', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'lahore', NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Voter Id', '58790989787', 'money-falling-from-sky_gettyimages-934096022 (1)-1665744173.jpg', 'FB_IMG_1664167504101 (1)-1665744173.jpg', '2022-10-14 16:19:33', '2022-10-14 12:14:01', NULL, NULL, NULL),
(1260, 'normal_user', 'makaha', 'kakha', 'contact@roadnstays.com', '92', 'pk', '3373164408', NULL, NULL, '$2y$10$wJfiePwirDCuGYmK/WsJCeHSFuOJmujUnXMS1XtuDXOQlL2ftIZmy', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-14 17:14:13', '2022-10-14 12:49:33', NULL, NULL, NULL),
(1263, 'normal_user', 'Yousuf', 'Ansari', 'yousf.ansari@roadnstays.com', '92', 'pk', '3332242609', NULL, NULL, '$2y$10$cdyeojzs5EHOW6xAR85qkegb.MMyp2c1hR8ogcdUVoXg7r5XfjO8O', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-14 19:46:53', '2022-10-14 14:46:53', NULL, NULL, NULL),
(1265, 'service_provider', 'Subhan', 'Asghar', '99tajik@gmail.com', '92', 'pk', '3435435588', NULL, NULL, '$2y$10$K6oen33dGZCP3E6JRCKILOGLyuVg.PY0sYvVmrfDocbfFuTkzz1KW', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '162', NULL, 'To be updated', NULL, NULL, NULL, 0, 'To be updated', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-15 15:21:54', '2022-10-15 13:12:45', NULL, NULL, NULL),
(1266, 'service_provider', 'Subhan', 'Asghar', 'mkakhi@yahoo.com', '92', 'pk', '3435435588', NULL, NULL, '$2y$10$GAUSn6W5OUx3zpBRUpLyEOErSObsUWJy311LFrbBsIXEKUDjIGChS', NULL, NULL, NULL, 4, 1, 0, NULL, NULL, '162', NULL, 'Muree', NULL, NULL, NULL, 0, 'Bhurban Valley Guest House,Bhurban, Murree', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-15 18:15:01', '2022-11-12 12:14:45', NULL, NULL, NULL),
(1267, 'normal_user', 'Muhammad', 'Khalid', 'mkakhi123@yahoo.com', '92', 'pk', '3373164408', NULL, NULL, '$2y$10$UhZhE4BBtPJBBy0UqUrsyOs1JC1VbOKLfagrsMN6X92sfH6vu4hB6', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, 'Islamabad', NULL, NULL, NULL, 0, 'Islamabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-15 22:32:18', '2022-11-19 19:01:58', NULL, NULL, NULL),
(1269, 'normal_user', 'ayesha', 'zahid', 'ayesharoadnstay@gmail.com', '92', 'pk', '3122786074', NULL, NULL, '$2y$10$Nux4sJlb2Tjy4SC5dnbMPuqjzckOt9MAUe37Tynr/DQLGGETxgmFm', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-19 00:46:14', '2022-10-19 06:31:59', NULL, NULL, NULL),
(1270, 'normal_user', 'Muhammad', 'Khalid', 'mkhalid71@hotmail.com', '92', 'pk', '3373164408', NULL, NULL, '$2y$10$00RVEaeOGylc51YhSBH97ujsvaueL/CyaKLvZq2GWDHyTBfmJ3lLO', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '187', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-28 17:14:01', '2022-10-28 12:14:01', NULL, NULL, NULL),
(1272, 'normal_user', 'ab', 'cd', 'votivetester.saurabh2@gmail.com', '91', 'in', '7418523698', NULL, NULL, '$2y$10$uMReplfsk7yRpqd75ss8j.2gN5NMULPgujreTzbQ02yImfSyvKAmK', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-02 11:58:10', '2022-11-02 06:58:10', NULL, NULL, NULL),
(1273, 'service_provider', 'pq', 'rs', 'ssnothinginlife2@gmail.com', '91', 'in', '7411454645', NULL, NULL, '$2y$10$5j5eNt7/or4KoBaLLOMzl.69s4hGps9kxhUZEaixXVr6a9CHHua5m', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-02 11:59:43', '2022-11-02 06:59:43', NULL, NULL, NULL),
(1274, 'normal_user', 'Deepak', 'Sahu', 'votivedeepak.php454@gmail.com', '91', 'in', '917900412', NULL, NULL, '$2y$10$2AiUK0LdexAZE/oS6JS.y.HNreQHhR0wV.8qCNqfo6Q7p47KAMxwC', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore, Indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-03 11:13:27', '2022-11-03 06:28:25', NULL, NULL, NULL),
(1275, 'normal_user', 'Pushpendra', 'techs', 'pushpendrajha8844@gmail.com', '91', 'in', '09179004123', NULL, NULL, '$2y$10$JoB9/hvFqabr8Y50qeT.6O/Im/Yu8VZ4lr8nsrD3b6J01cuq69RZe', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-03 11:16:55', '2022-11-03 06:49:57', NULL, NULL, NULL),
(1276, 'normal_user', 'Deepak', 'sa', 'votivedeepak.php@gmail.com', '91', 'in', '7894563201', NULL, NULL, '$2y$10$fubb6bU06DJx8kOXdJ1ToewM1byJnHpg/by5gYxYFQvBUiBdF6.m6', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-03 11:29:08', '2022-11-03 06:29:08', NULL, NULL, NULL),
(1277, 'normal_user', 'Pushpendra', 'techs', 'pushpendrajha888@gmail.com', '91', 'in', '9179004123', NULL, NULL, '$2y$10$HmXEm.MtFL6SGVJqL6FWwumhcNj.hmAb8zg8kGZfxc4QZMM.JJDlO', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore, Indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-03 11:50:35', '2022-11-15 11:13:19', NULL, NULL, NULL),
(1278, 'normal_user', 'ab', 'cd', 'votivetester.saurabh3@gmail.com', '91', 'in', '7412583698', NULL, NULL, '$2y$10$Zn/wEMXf4Rol1dmEqYvzrutBm6nYLmGqx3I5bwOifb6qUvuDZ.Oei', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-05 12:16:05', '2022-11-08 11:11:53', NULL, NULL, NULL),
(1279, 'normal_user', 'Priyanka', 'saini', 'rahul12@gmail.com', NULL, NULL, '6268965521', NULL, NULL, '$2y$10$nufVOGIiqUG0hNdG49.pkOpVEPoMQWEGSiGTbMtOt3cn8h/whwmZ.', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'iynjRW', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 16:50:28', '2022-11-08 11:50:28', NULL, NULL, NULL),
(1280, 'normal_user', 'Rahul', 'Mishra', 'rwr@gmail.com', NULL, NULL, '5344543534', NULL, NULL, '$2y$10$xdxfetT5sNoKfoseoG9Vu.si.yXhk1LeknGj4gmWSV9yoCm2ieRzW', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'swift', 'sdgfgf', 'fsdsd', 's4IO6e', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 16:56:42', '2022-11-08 11:56:42', NULL, NULL, NULL),
(1281, 'normal_user', 'Rahul', 'Mishra', 'rwr2@gmail.com', NULL, NULL, '534', NULL, NULL, '$2y$10$jPdVZf88dR99OMROHw246eGLbJY2rs1x3op7uNA/ci2i/9ZSBS8ty', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'swift', 'sdgfgf', 'fsdsd', 'xTGgF3', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 16:58:50', '2022-11-08 11:58:50', NULL, NULL, NULL),
(1282, 'normal_user', 'Rahul', 'Mishra', 'rwr5@gmail.com', NULL, NULL, '53', NULL, NULL, '$2y$10$7NbgFUsQrPF.cqQ4U3jS1u/H0K6IMd54ZkfLaaumYREtEyG1Xj3Uy', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'swift', 'sdgfgf', 'fsdsd', 'LVyZjl', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:07:58', '2022-11-08 12:07:58', NULL, NULL, NULL),
(1283, 'normal_user', 'Priyanka', 'saini', 'priya23@gmail.com', NULL, NULL, '6789543234', NULL, NULL, '$2y$10$owikmpvy67GZX6Iy2aMdmuzaEXurneuYcfLtiqufuDjjLri6bPwly', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', '3MsiAN', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:08:07', '2022-11-08 12:08:07', NULL, NULL, NULL),
(1284, 'normal_user', 'Priyanka', 'saini', 'priya20@gmail.com', NULL, NULL, '678954522', NULL, NULL, '$2y$10$ovTRjJ6G6iCs0PqG4fjQ/e7eSY4/tkftxUVYCNtlSKIDj6lVe6uLa', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', '0uE7aG', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:08:54', '2022-11-08 12:08:54', NULL, NULL, NULL),
(1285, 'normal_user', 'Priyanka', 'saini', 'priya201@gmail.com', NULL, NULL, '678954523', NULL, NULL, '$2y$10$3t2MgK0VGWEprSNhRWlyVuRg3OFQ7yzJBaaVy/7/k.W/J9mR3Aj82', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'nkwcYr', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:09:52', '2022-11-08 12:09:52', NULL, NULL, NULL),
(1286, 'normal_user', 'Rahul', 'Mishra', 'rwr7@gmail.com', NULL, NULL, '534545', NULL, NULL, '$2y$10$6/V/vIW0ofbCin/K8fl2SuGBTRNc6ZyFE9TwctnmJEUauq.smtFpi', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'swift', 'sdgfgf', 'fsdsd', 'KfTAYy', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:10:11', '2022-11-08 12:10:11', NULL, NULL, NULL),
(1287, 'normal_user', 'Priyanka', 'saini', 'tesst@gmail.com', NULL, NULL, '654123987', NULL, NULL, '$2y$10$q9CH22o258fcZrSIYRPJou0Ydjuh0BYbvpdC2nPdS0885hnp1eteG', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '1234', 'jhgjgkkj', 'iOS', 'jSNjIp', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:23:41', '2022-11-08 12:23:41', NULL, NULL, NULL),
(1288, 'normal_user', 'fdgfg', 'fgdfhghfg', 'tesst12@gmail.com', NULL, NULL, '67867558900', NULL, NULL, '$2y$10$RESx1c80PYZFUUytRCYj1.QKGaSG3IzlPPImyBHhb2ZXDvvgZ7DvK', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '1234', 'jhgjgkkj', 'iOS', 'LUSDHs', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:29:59', '2022-11-08 12:29:59', NULL, NULL, NULL),
(1289, 'normal_user', 'fdgfg', 'fgdfhghfg', 'tesst123@gmail.com', NULL, NULL, '6541239870', NULL, NULL, '$2y$10$xtdypG/toUFpR4LEsUpgfuESbatI5529uQz5H94A3QgPhjKhBCyXy', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '1234', 'jhgjgkkj', 'iOS', 'V6L6j2', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-08 17:33:30', '2022-11-08 12:33:30', NULL, NULL, NULL),
(1290, 'normal_user', 'fdgfg', 'fgdfhghfg', 'jhhk@gmail.com', NULL, NULL, '4525896325', NULL, NULL, '$2y$10$szi40gspDUzQmOOCURfU/uFH338KsI/1sNpjG9Jr2UuWB5VfDJZcS', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, '1234', 'swift', 'ios', 'gFLUsZ', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 11:40:59', '2022-11-09 06:40:59', NULL, NULL, NULL),
(1291, 'normal_user', 'Priyankaa', 'saini', 'priyanka@gmail.com', NULL, NULL, '2514369870', NULL, NULL, '$2y$10$bUYE6rxm4a.43C2FgpScL.G1dJd9B2ue/5s5Wu.IF6TNhfy7NS0hu', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'jqqH5y', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 13:53:39', '2022-11-09 08:53:39', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `email`, `num_dialcode_1`, `country_iso2_code1`, `contact_number`, `user_company_number`, `landline_number`, `password`, `about_me`, `i_speak`, `payment_info`, `role_id`, `is_verify_email`, `is_verify_contact`, `profile_pic`, `gender`, `user_country`, `state_id`, `user_city`, `postal_code`, `latitude`, `longitude`, `wallet_balance`, `address`, `alternate_num`, `social_id`, `register_by`, `website`, `device_id`, `device_token`, `device_type`, `vrfn_code`, `status`, `user_signup_method`, `document_type`, `document_number`, `front_document_img`, `back_document_img`, `created_at`, `updated_at`, `remember_token`, `guest_login`, `otp`) VALUES
(1292, 'normal_user', 'Priyanka', 'saini', 'priyanka112@gmail.com', NULL, NULL, '1425357480', NULL, NULL, '$2y$10$Gos9ssmktBK8Mc7cNUmFG.GXuKziVr2l0La8M1mN6j/ZAk3LpD9VK', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'zRiMig', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 13:55:50', '2022-11-09 08:55:50', NULL, NULL, NULL),
(1293, 'normal_user', 'Priyanka', 'Saini', 'priyanka9223@gmail.com', NULL, NULL, '8956231245', NULL, NULL, '$2y$10$XC3Lnrlej853qJ5IZO0bWuH7oe/kkE4bmc43EVk1nB7qvDzhBRyhq', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'qwXTCO', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 13:57:49', '2022-11-09 08:57:49', NULL, NULL, NULL),
(1294, 'normal_user', 'Priyanka', 'Saini', 'priyanka9226@gmail.com', NULL, NULL, '8956231248', NULL, NULL, '$2y$10$6TlyezD.slv1p1Fe3qvTS.MQbnlJmRJBUGAPFB4V/1uXTgD9uhkVW', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'kMM9OQ', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 13:58:19', '2022-11-09 08:58:19', NULL, NULL, NULL),
(1295, 'normal_user', 'Rahul', 'Mishra', 'rahulmishra@gmail.com', NULL, NULL, '1472583690', NULL, NULL, '$2y$10$JgmUCKEOKffDLr5R8qmkFOLHhMve/KQpyjYD0gZE7kw0SZTwC7fSq', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'Cy8Ece', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:05:57', '2022-11-09 09:05:57', NULL, NULL, NULL),
(1296, 'normal_user', 'Aman', 'Rai', 'eraman07@gmail.com', NULL, NULL, '1532789112', NULL, NULL, '$2y$10$1J7WdOCqnqheI5FvqRdxI.atnpTntB0rD0QHiy9Zxo9C9dxjokVve', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'DjjPEX', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:13:42', '2022-11-09 09:13:42', NULL, NULL, NULL),
(1297, 'normal_user', 'Aman', 'Rai', 'eraman0745@gmail.com', NULL, NULL, '1532172369', NULL, NULL, '$2y$10$0xt/OypGT0T8KZfu0I7zPO60k0oyEqeluyn34Q4kCZbHn.Y4Lhjf2', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'KPUUoV', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:14:43', '2022-11-09 09:14:43', NULL, NULL, NULL),
(1298, 'normal_user', 'Mansi', 'Sharma', 'mansi06@gmail.com', NULL, NULL, '9123586978', NULL, NULL, '$2y$10$wQsKUYKYkDB5yKikcTwtCepToakbUXNuFmfuhFocy3o16pGmAGoAe', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'X8eIye', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:23:07', '2022-11-09 09:23:07', NULL, NULL, NULL),
(1299, 'normal_user', 'Priyanka', 'Saini', 'priyanka334@gmail.com', NULL, NULL, '9137265408', NULL, NULL, '$2y$10$E7xqhzw7D7bGQUT7HMw6feAAmGlExt6xDzkOWIUz3x4JF83ibdrQe', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'jJJ9xn', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:35:05', '2022-11-09 09:35:05', NULL, NULL, NULL),
(1300, 'normal_user', 'Priyanka', 'Saini', 'priyanka556@gmail.com', NULL, NULL, '1245783698', NULL, NULL, '$2y$10$Upq8B/N5Ctf7pHEFtFVz7eY8THCJCoRsdR/ia1h5R5lC9YOBZa5A6', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'V4j9z5', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 14:56:23', '2022-11-09 09:56:23', NULL, NULL, NULL),
(1301, 'normal_user', 'Rahul', 'Mishra', 'rahul21@gmail.com', NULL, NULL, '5869231480', NULL, NULL, '$2y$10$/kehLIr.PGn1EO5pHfQrBemNVdpS7eoCs7.qQYYBpeJzBB/krS1Xy', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'eEDIdn', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 16:20:59', '2022-11-09 11:20:59', NULL, NULL, NULL),
(1302, 'normal_user', 'priyanka', 'saini', 'priyanka3366@gmail.com', NULL, NULL, '1937258420', NULL, NULL, '$2y$10$yV6pMHiToYwG/Uw42SBt7eVllxsHzodR8rKGRway/RNZNck6PSAj2', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'lIxTJO', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-09 17:13:21', '2022-11-09 12:13:21', NULL, NULL, NULL),
(1303, 'normal_user', 'Priyanka', 'saini', 'priyankasaini9223@gmail.com', NULL, NULL, '1030546985', NULL, NULL, '$2y$10$I87C8.l8vYyJtpIbiuIxXOs7oCE/ViXn6rayQMQ2fQ7pEwUT02Iua', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'E04aE2', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 11:30:21', '2022-11-10 06:30:21', NULL, NULL, NULL),
(1304, 'normal_user', 'Mansi', 'Mishra', 'mansimishra@gmail.com', NULL, NULL, '1472589658', NULL, NULL, '$2y$10$HNt9CjFahyFLAYcpc54Ypuyas1R.O8jz8ZRSDqufnNOmBj0t6HeJ.', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'V8WOyB', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 12:28:06', '2022-11-10 07:28:06', NULL, NULL, NULL),
(1305, 'normal_user', 'faded', 'dvds', 'abc12@gmail.com', NULL, NULL, '2369851470', NULL, NULL, '$2y$10$u84GTDW7r2eUeJPFzW1DAuM1/c.A6pTBoj0xUgAqeCQq7qB.uVxfS', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'lmUoZ9', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 14:30:12', '2022-11-10 09:30:12', NULL, NULL, NULL),
(1306, 'normal_user', 'priyanka', 'Saini', 'abcd3344@gmail.com', NULL, NULL, '2356891045', NULL, NULL, '$2y$10$vFd7qPSW2LyXSv8QNuHUW.EF5QgCy8VgaXNhfZFQW7dUFdrx4ECKq', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'enx9fk', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 14:31:36', '2022-11-10 09:31:36', NULL, NULL, NULL),
(1307, 'normal_user', 'Priyanka', 'saini', 'priya77882@gmail.com', NULL, NULL, '1593214789', NULL, NULL, '$2y$10$aByE9AWiWuW/qawbUX.6PuYQ5DkBE2Ts9.aCQbH0L2M9MoEbAeOEe', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', '0Mt0qL', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 14:36:43', '2022-11-10 09:36:43', NULL, NULL, NULL),
(1308, 'normal_user', 'Priyanka', 'saini', 'priya7788@gmail.com', NULL, NULL, '1593214788', NULL, NULL, '$2y$10$Az4sNVYkzLiFqleuTvGcpO4NPtK0GHtl5wgb7yduCDQGolknL5NvK', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'GOTvxO', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 14:37:08', '2022-11-10 09:37:08', NULL, NULL, NULL),
(1309, 'normal_user', 'Priyanka', 'Saini', 'priyanka9923@gmail.com', NULL, NULL, '5682365214', NULL, NULL, '$2y$10$CBg2xUqAsEYMEy9HA/hmguRxjCgtpEwdOCAFWJ808Djw1fmz19HZy', NULL, NULL, NULL, 2, 0, 0, 'https://roadnstays.com/development/resources/assets/images/blank_user.jpg', NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'web', NULL, 'Swift', '123', 'iOS', 'gKwRAc', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-10 14:42:25', '2022-11-10 09:42:25', NULL, NULL, NULL),
(1312, 'normal_user', 'xyz', 'xyz', 'bookings@roadnstays.com', NULL, NULL, '0300234567', NULL, NULL, '$2y$10$Wgqcw8R7ddI96BQiJdAza.icvLQyMhcDBrtrXsybhp2YOecJPCE6i', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '162', NULL, 'karachi', NULL, NULL, NULL, 0, 'karachi', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'u7xmdj', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-12 18:54:11', '2022-11-12 13:54:11', NULL, NULL, NULL),
(1313, 'normal_user', 'Pushpendra', 'techs', 'pushpendrajha878458@gmail.com', '91', 'in', '09179004123', NULL, NULL, '$2y$10$RMC9ap2ewAOaHXZgamCXxueQ0PhD87ikAadvS9/MTfw5v4soM1OaW', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 0, 'Indore, Indore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-15 16:13:54', '2022-11-16 06:36:58', NULL, NULL, NULL),
(1315, 'normal_user', 'Pushpendra', 'Jha', 'pushpendrajha88@gmail.com', '1', 'pr', '7874554549', NULL, NULL, '$2y$10$BIMLhBaQMHDFAIlpnio/uOqIezKmbtg.3SDtsxyswXrx7996/Y2.W', NULL, NULL, NULL, 2, 1, 1, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-16 11:37:33', '2022-11-16 06:37:33', NULL, NULL, NULL),
(1316, 'normal_user', 'Pushpendra', 'Jha', 'testpush@gmail.com', '91', 'in', '9179456123', NULL, NULL, '$2y$10$tyj2sw5kqflGZW5khfmk8.YETiF8pB9klf9x9zP/i1mClxUurJFh6', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:20:25', '2022-11-16 10:20:25', NULL, NULL, NULL),
(1317, 'normal_user', 'Test', 'Test', 'asbc@gmail.com', '91', 'in', '9179004123', NULL, NULL, '$2y$10$0iLT3HaxuWHvUPbPZBhX/et3kx32uL/OjLH1UjbmDzwJRltvqwjmK', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-16 15:26:50', '2022-11-18 13:55:57', NULL, NULL, NULL),
(1320, 'normal_user', 'Muhammad', 'Akhtar', 'mkakhi@icloud.com', NULL, NULL, '9230023456676', NULL, NULL, '$2y$10$QIYHHJMUj6NcH3QdFGN7Y.4rAs6817e9aiYK9MaDBqHgtYUa4RBeW', NULL, NULL, NULL, 2, 1, 0, NULL, NULL, '187', NULL, 'Riyadh', NULL, NULL, NULL, 0, 'KSA-AL Mather Ash Shamali - Prince Turki Al Awwal Road. P.O. Box 6891 - Riyadh 11452', NULL, NULL, 'web', NULL, NULL, NULL, NULL, 'om5XBT', 1, NULL, NULL, NULL, NULL, NULL, '2022-11-20 00:25:05', '2022-11-19 19:25:05', NULL, NULL, NULL),
(1321, 'normal_user', 'c', 'd', 'c@d', '91', 'in', '7412589874', NULL, NULL, '$2y$10$l5WAcV4UiZYxzudwWrjSbeBcPNxdTxR2scmWVMb5eRgAHdm1zMr9m', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '162', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-22 12:23:23', '2022-11-22 12:23:26', NULL, NULL, NULL),
(1322, 'service_provider', 'u', 'v', 'ub@v', '91', 'in', '4561472584', NULL, NULL, '$2y$10$UBZhnKfhl.11zWZrNqahQOaDqqNvnL8IhGBmRbNHeSU4ru6APDYlW', NULL, NULL, NULL, 4, 0, 0, NULL, NULL, '162', NULL, 'lahore', NULL, NULL, NULL, 0, 'circular road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-22 12:24:42', '2022-11-22 12:24:02', NULL, NULL, NULL),
(1323, 'normal_user', 'indore', 'delhi', 'indore@delhi', '91', 'in', '7412589887', NULL, NULL, '$2y$10$t7I/2rRyek8aT5Q5Tl5Pfu1T8mWeTycEBf7Z/90Bitj7dPQomtuXW', NULL, NULL, NULL, 2, 0, 0, NULL, NULL, '99', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:54:35', '2022-11-28 12:54:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_profile`
--

CREATE TABLE `vendor_profile` (
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tour_op_name` varchar(255) DEFAULT NULL,
  `tour_op_contact_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `num_dialcode_2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country_iso2_code2` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_contact_num` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `num_dialcode_3` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country_iso2_code3` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_booking_num` int(11) DEFAULT NULL,
  `tour_office_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_web_add` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_tiktok` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_youtube` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_bank_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_account_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_account_num` int(11) DEFAULT NULL,
  `tour_op_branch` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_easypaisa_num` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_easypaisa_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_jazzcash_num` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_jazzcash_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_notes` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_contract_date` date DEFAULT NULL,
  `tour_contract_terms` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_document` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_id_front_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_id_back_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tour_op_id_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vendor_profile`
--

INSERT INTO `vendor_profile` (`vendor_id`, `user_id`, `tour_op_name`, `tour_op_contact_name`, `num_dialcode_2`, `country_iso2_code2`, `tour_op_contact_num`, `tour_op_email`, `num_dialcode_3`, `country_iso2_code3`, `tour_op_booking_num`, `tour_office_address`, `tour_op_instagram`, `tour_op_facebook`, `tour_op_web_add`, `tour_op_tiktok`, `tour_op_youtube`, `tour_op_bank_name`, `tour_op_account_title`, `tour_op_account_num`, `tour_op_branch`, `tour_op_easypaisa_num`, `tour_op_easypaisa_name`, `tour_op_jazzcash_num`, `tour_op_jazzcash_name`, `tour_op_notes`, `tour_contract_date`, `tour_contract_terms`, `tour_op_document`, `tour_op_img`, `tour_op_id_front_img`, `tour_op_id_back_img`, `tour_op_id_number`) VALUES
(1, 877, 'Gilgit Baltistan Tourism Club', 'Jumail haider', NULL, NULL, '923418994572', 'jumailhaider04@gmail.com', NULL, NULL, 2147483647, 'silver mall, rnt road, murai mohalla, near lemon tree hotel', 'https://vm.tiktok.com/gbtourismclub', 'https://vm.tiktok.com/gbtourism786', 'https://www.gbtourism.com', 'https://vm.tiktok.com/ZSe937m54/', 'https://www.youtube.com', 'Habib Bank Limited', 'Jumail haider', 2147483647, 'Township Branch Lahore.', '03418994572', 'Jumail Haider', '03115137660', 'Jumail Haider', 'the notes are as follows - \r\nPlease aware of Danger at tour', '2022-08-31', 'We have not any responsibility of your Luggage and Childrens', '1655965386_pexels-pixabay-164595-1661323172.jpg', 'gilgit-1661338292.jpg', '1655105064_photo2-1661338176.png', '1654856361_rooms2-1661338176.jpg', '546654SDFSD'),
(2, 1077, 'Gilgit Baltistan Tourism Club', 'Swayam', NULL, NULL, '09425095449', 'gilgit@operator.com', NULL, NULL, 2147483647, 'Rajendra Nagar', 'instagram.com', 'facebook.com', 'www.google.com', 'https://vm.tiktok.com/ZSe937m54/', 'www.youtube.com', 'Intersteller', 'Unknown', 2147483647, 'Mangal planet', '654654654', 'difficult to pay', '4564654454', 'too difficult to pay', 'sdlkfjlk', '2022-08-25', 'kjlkjlkwe  sdf', '1655965386_pexels-pixabay-164595-1661336378.jpg', '1655105064_photo1-1661336378.png', '1655105064_photo1-1661336378.png', '1655105064_photo2-1661336378.png', '546654SDFSD'),
(3, 1081, 'Gilgit Baltistan Tourism Club', 'Swayam', '92', 'pk', '09425095449', 'abcd@gmail.com', '1', 'us', 2147483647, 'Vijay Nagar', 'instagram.com', 'https://vm.tiktok.com/gbtourism786', 'https://vm.tiktok.com/gbtourism786', 'https://vm.tiktok.com/gbtourism786', 'https://www.youtube.com', 'Habib Bank Limited', 'Jumail haider', 2147483647, 'indore', '4564654454', 'Jumail Haider', '4564654454', 'Jumail Haider', 'sdfsdf', '2022-08-27', 'dfsdf', NULL, '1655969332_pexels-naim-benjelloun-2029722-1661409093.jpg', '1655969332_pexels-naim-benjelloun-2029722-1661409093.jpg', '1655294814_monte-1661409093.jpg', '546654SDFSD'),
(4, 1044, 'Gilgit Baltistan Tourism Club', 'Khalid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 834, 'Gilgit Baltistan Tourism Club', 'Pushpendra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 833, 'Rahul', 'Hack the Universe', '92', 'pk', '3433434343', 'universe@universe.com', '92', 'pk', 2147483647, 'Black Hole', 'universe.com', 'universe.com', 'universe.com', 'universe.com', 'universe.com', 'universe bank', 'Unlimited Saving', 2147483647, 'Black Hole', '77777777777', 'Infinite paisa', '777777777777', 'Infinite Jazz', 'vice', '2022-11-05', 'opopo', 'alfalha-1667306131.jpg', 'alfalha-1667306131.jpg', 'back-1667306131.jpg', 'front-1667306131.jpg', '6666666666'),
(7, 1082, 'Rahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1080, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1058, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1054, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 934, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 353, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 352, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 336, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1053, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1086, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1088, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1085, 1089, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1086, 1094, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1092, 1100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1093, 1111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1094, 1112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1095, 1113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1096, 1121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1097, 1136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1098, 1139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1099, 1142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1100, 1155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1101, 1157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1102, 1160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1103, 1162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1104, 1163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1105, 1166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1106, 1171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1107, 1173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1108, 1175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1109, 1179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1110, 1184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1111, 1186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1112, 1191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1113, 1192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1114, 1195, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1115, 1197, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1116, 1199, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1117, 1203, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1118, 1205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1119, 1229, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1120, 1231, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1121, 1239, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1122, 1243, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1123, 1245, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL),
(1124, 1247, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1125, 1248, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1126, 1252, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1127, 1257, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1128, 1265, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1129, 1266, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1130, 1268, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1131, 1273, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1132, 1314, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1133, 1322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us_heading`
--

CREATE TABLE `why_choose_us_heading` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `subheading` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us_heading`
--

INSERT INTO `why_choose_us_heading` (`id`, `heading`, `subheading`, `created_at`, `updated_at`) VALUES
(1, '<span>Why Choose</span> Us?', 'When you choose us, you\'ll feel the benefit of 10 years\' experience of Tourism. Because we know the digital world and we know that how to handle it. With working knowledge.', '2022-09-13', '2022-09-13 05:34:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_choose_us`
--
ALTER TABLE `about_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_banner`
--
ALTER TABLE `about_us_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_content_section`
--
ALTER TABLE `about_us_content_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `amenities_type`
--
ALTER TABLE `amenities_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_temp`
--
ALTER TABLE `booking_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breakfast_type`
--
ALTER TABLE `breakfast_type`
  ADD PRIMARY KEY (`bfast_id`);

--
-- Indexes for table `copy_migrations`
--
ALTER TABLE `copy_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_booking_temp`
--
ALTER TABLE `event_booking_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_gallery`
--
ALTER TABLE `event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guestinfo`
--
ALTER TABLE `guestinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `H1_Hotel_and_other_Stays`
--
ALTER TABLE `H1_Hotel_and_other_Stays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `H2_Amenities`
--
ALTER TABLE `H2_Amenities`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `H3_Services`
--
ALTER TABLE `H3_Services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_amenities`
--
ALTER TABLE `hotel_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_attraction`
--
ALTER TABLE `hotel_attraction`
  ADD PRIMARY KEY (`attraction_id`);

--
-- Indexes for table `hotel_extra_price`
--
ALTER TABLE `hotel_extra_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_service_fee`
--
ALTER TABLE `hotel_service_fee`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_transaction`
--
ALTER TABLE `payment_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_bed_details`
--
ALTER TABLE `room_bed_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_booking_request`
--
ALTER TABLE `room_booking_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `room_custom_price`
--
ALTER TABLE `room_custom_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_extra_option`
--
ALTER TABLE `room_extra_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_gallery`
--
ALTER TABLE `room_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_name_list`
--
ALTER TABLE `room_name_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_others_features`
--
ALTER TABLE `room_others_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_services`
--
ALTER TABLE `room_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type_categories`
--
ALTER TABLE `room_type_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_video`
--
ALTER TABLE `room_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scout_details`
--
ALTER TABLE `scout_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scout_performance_rating`
--
ALTER TABLE `scout_performance_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space`
--
ALTER TABLE `space`
  ADD PRIMARY KEY (`space_id`);

--
-- Indexes for table `space_amenities`
--
ALTER TABLE `space_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space_bedroom_type`
--
ALTER TABLE `space_bedroom_type`
  ADD PRIMARY KEY (`bedroom_type_id`);

--
-- Indexes for table `space_booking`
--
ALTER TABLE `space_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space_booking_request`
--
ALTER TABLE `space_booking_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `space_id` (`space_id`);

--
-- Indexes for table `space_booking_temp`
--
ALTER TABLE `space_booking_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space_categories`
--
ALTER TABLE `space_categories`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `space_custom_details`
--
ALTER TABLE `space_custom_details`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `space_extra_option`
--
ALTER TABLE `space_extra_option`
  ADD PRIMARY KEY (`ext_id`);

--
-- Indexes for table `space_features`
--
ALTER TABLE `space_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `space_features_list`
--
ALTER TABLE `space_features_list`
  ADD PRIMARY KEY (`space_feature_id`);

--
-- Indexes for table `space_gallery`
--
ALTER TABLE `space_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `space_id` (`space_id`);

--
-- Indexes for table `space_sub_categories`
--
ALTER TABLE `space_sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_booking`
--
ALTER TABLE `tour_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_booking_request`
--
ALTER TABLE `tour_booking_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tour_booking_temp`
--
ALTER TABLE `tour_booking_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_itinerary`
--
ALTER TABLE `tour_itinerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_list`
--
ALTER TABLE `tour_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_pickup_locations`
--
ALTER TABLE `tour_pickup_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_with_us`
--
ALTER TABLE `trip_with_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `why_choose_us_heading`
--
ALTER TABLE `why_choose_us_heading`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_choose_us`
--
ALTER TABLE `about_choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `about_us_banner`
--
ALTER TABLE `about_us_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `about_us_content_section`
--
ALTER TABLE `about_us_content_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities_type`
--
ALTER TABLE `amenities_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `booking_temp`
--
ALTER TABLE `booking_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `breakfast_type`
--
ALTER TABLE `breakfast_type`
  MODIFY `bfast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `copy_migrations`
--
ALTER TABLE `copy_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `event_booking_temp`
--
ALTER TABLE `event_booking_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `event_gallery`
--
ALTER TABLE `event_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestinfo`
--
ALTER TABLE `guestinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1322;

--
-- AUTO_INCREMENT for table `H1_Hotel_and_other_Stays`
--
ALTER TABLE `H1_Hotel_and_other_Stays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `H2_Amenities`
--
ALTER TABLE `H2_Amenities`
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `H3_Services`
--
ALTER TABLE `H3_Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=691;

--
-- AUTO_INCREMENT for table `hotel_amenities`
--
ALTER TABLE `hotel_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11359;

--
-- AUTO_INCREMENT for table `hotel_attraction`
--
ALTER TABLE `hotel_attraction`
  MODIFY `attraction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;

--
-- AUTO_INCREMENT for table `hotel_extra_price`
--
ALTER TABLE `hotel_extra_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1190;

--
-- AUTO_INCREMENT for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2587;

--
-- AUTO_INCREMENT for table `hotel_services`
--
ALTER TABLE `hotel_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3497;

--
-- AUTO_INCREMENT for table `hotel_service_fee`
--
ALTER TABLE `hotel_service_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=982;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `payment_transaction`
--
ALTER TABLE `payment_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;

--
-- AUTO_INCREMENT for table `room_amenities`
--
ALTER TABLE `room_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11844;

--
-- AUTO_INCREMENT for table `room_bed_details`
--
ALTER TABLE `room_bed_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915;

--
-- AUTO_INCREMENT for table `room_booking_request`
--
ALTER TABLE `room_booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room_custom_price`
--
ALTER TABLE `room_custom_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `room_extra_option`
--
ALTER TABLE `room_extra_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2849;

--
-- AUTO_INCREMENT for table `room_gallery`
--
ALTER TABLE `room_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3288;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1359;

--
-- AUTO_INCREMENT for table `room_name_list`
--
ALTER TABLE `room_name_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `room_others_features`
--
ALTER TABLE `room_others_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `room_services`
--
ALTER TABLE `room_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3598;

--
-- AUTO_INCREMENT for table `room_type_categories`
--
ALTER TABLE `room_type_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `room_video`
--
ALTER TABLE `room_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scout_details`
--
ALTER TABLE `scout_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scout_performance_rating`
--
ALTER TABLE `scout_performance_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_type`
--
ALTER TABLE `services_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `space`
--
ALTER TABLE `space`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=847;

--
-- AUTO_INCREMENT for table `space_amenities`
--
ALTER TABLE `space_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `space_bedroom_type`
--
ALTER TABLE `space_bedroom_type`
  MODIFY `bedroom_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `space_booking`
--
ALTER TABLE `space_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `space_booking_request`
--
ALTER TABLE `space_booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `space_booking_temp`
--
ALTER TABLE `space_booking_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `space_categories`
--
ALTER TABLE `space_categories`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `space_custom_details`
--
ALTER TABLE `space_custom_details`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1120;

--
-- AUTO_INCREMENT for table `space_extra_option`
--
ALTER TABLE `space_extra_option`
  MODIFY `ext_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- AUTO_INCREMENT for table `space_features`
--
ALTER TABLE `space_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1431;

--
-- AUTO_INCREMENT for table `space_features_list`
--
ALTER TABLE `space_features_list`
  MODIFY `space_feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `space_gallery`
--
ALTER TABLE `space_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1446;

--
-- AUTO_INCREMENT for table `space_sub_categories`
--
ALTER TABLE `space_sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tour_booking`
--
ALTER TABLE `tour_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `tour_booking_request`
--
ALTER TABLE `tour_booking_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tour_booking_temp`
--
ALTER TABLE `tour_booking_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `tour_gallery`
--
ALTER TABLE `tour_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1460;

--
-- AUTO_INCREMENT for table `tour_itinerary`
--
ALTER TABLE `tour_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1530;

--
-- AUTO_INCREMENT for table `tour_list`
--
ALTER TABLE `tour_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `tour_pickup_locations`
--
ALTER TABLE `tour_pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `trip_with_us`
--
ALTER TABLE `trip_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1324;

--
-- AUTO_INCREMENT for table `vendor_profile`
--
ALTER TABLE `vendor_profile`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1134;

--
-- AUTO_INCREMENT for table `why_choose_us_heading`
--
ALTER TABLE `why_choose_us_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
