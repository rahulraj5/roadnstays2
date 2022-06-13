-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2022 at 01:32 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votivela_roadnstays`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$veRpHDfzuM4HyCp7iPqI8OnvJX4Nzm47KSHJDZo.JlgIPSHdMiLui', NULL, '2022-05-19 01:44:25', '2022-05-19 01:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `amenities_type`
--

CREATE TABLE `amenities_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities_type`
--

INSERT INTO `amenities_type` (`id`, `name`, `status`) VALUES
(1, 'Room Amenities', 1),
(2, 'Bathroom', 1),
(3, 'Media and Technology', 1),
(4, 'Food & drink', 1),
(5, 'Outdoor and view', 1),
(6, 'Accessibility', 1),
(7, 'Entertainment and family services', 1),
(8, 'Services & extras', 1);

-- --------------------------------------------------------

--
-- Table structure for table `breakfast_type`
--

CREATE TABLE `breakfast_type` (
  `bfast_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `H1_Hotel_and_other_Stays`
--

CREATE TABLE `H1_Hotel_and_other_Stays` (
  `id` int(11) NOT NULL,
  `stay_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H1_Hotel_and_other_Stays`
--

INSERT INTO `H1_Hotel_and_other_Stays` (`id`, `stay_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', 'Accommodation for travellers often offering restaurants, meeting rooms and other guest services.', 1, '2022-06-01 15:40:22', '2022-06-03 09:16:58'),
(2, 'Guest house', 'Private home with separate living facilities for host and guest', 1, '2022-06-01 10:09:39', NULL),
(3, 'Bed and breakfast', 'Private home offering overnight stays and breakfast', 1, '2022-06-01 10:11:00', NULL),
(4, 'Homestay', 'A shared home where the guest has a private room and the host lives and is on site. Some facilities are shared between hosts and guests.', 1, '2022-06-01 10:11:13', NULL),
(5, 'Hostel', 'Budget accommodation with mostly dorm-style bedding and a social atmosphere', 1, '2022-06-01 10:11:25', NULL),
(6, 'Aparthotel', 'A self-catering apartment with some hotel facilities like a reception desk', 1, '2022-06-01 10:11:36', NULL),
(7, 'Capsule hotel', 'Extremely small units or capsules offering cheap and basic overnight accommodation', 1, '2022-06-01 10:11:47', NULL),
(8, 'Country house', 'Private home with simple accommodation in the countryside', 1, '2022-06-01 10:11:47', NULL),
(9, 'Farm stay', 'Private farm with simple accommodation.', 1, '2022-06-01 10:12:34', '2022-06-02 10:43:59'),
(10, 'Inn', 'Small and basic accommodation with a rustic feel', 1, '2022-06-01 10:12:43', NULL),
(11, 'Motel', 'Roadside hotel usually for motorists, with direct access to parking and little to no amenities', 1, '2022-06-01 10:13:04', NULL),
(12, 'Resort', 'A place for relaxation with onsite restaurants, activities and often with a luxury feel.', 1, '2022-06-01 10:13:38', '2022-06-01 11:42:22'),
(13, 'Lodges', 'Private home with accommodation surrounded by nature, such as mountain or forest.', 1, '2022-06-01 10:14:02', '2022-06-13 12:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `H2_Amenities`
--

CREATE TABLE `H2_Amenities` (
  `amenity_id` int(11) NOT NULL,
  `amenity_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amenity_type` int(11) NOT NULL,
  `amenity_type_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amenity_type_sym` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_other_featured_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H2_Amenities`
--

INSERT INTO `H2_Amenities` (`amenity_id`, `amenity_name`, `amenity_type`, `amenity_type_name`, `amenity_type_sym`, `room_other_featured_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Clothes rack', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-02 06:51:37', NULL),
(8, 'Toilet paper', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-02 06:52:19', NULL),
(9, 'Computer', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-02 06:52:33', NULL),
(10, 'Dining area', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-02 06:55:43', NULL),
(11, 'Dining table', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-02 06:55:55', NULL),
(12, 'Balcony', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-02 06:56:13', NULL),
(13, 'Patio', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-02 06:56:37', NULL),
(14, 'Room is situated on the ground floor', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-02 06:56:50', NULL),
(15, 'Room is entirely wheelchair accessible', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-02 06:58:23', NULL),
(16, 'Baby safety gates', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-02 06:58:56', NULL),
(17, 'Board games/puzzles', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-02 07:00:41', NULL),
(18, 'Executive lounge access', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-02 07:11:05', NULL),
(19, 'Alarm clock', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-02 07:11:13', NULL),
(20, 'giving breaking news on mobile', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-03 07:01:34', NULL),
(21, 'multiplex', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-03 07:22:51', NULL),
(22, 'freshner', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-03 08:22:12', NULL),
(23, 'detergent', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-03 09:35:31', NULL),
(24, 'WI FI', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-04 05:34:22', NULL),
(25, 'shampoo', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-06 06:53:59', NULL),
(26, 'blutooth', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-06 08:50:24', NULL),
(27, 'cold', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-09 12:39:43', NULL),
(28, 'all out', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-10 05:22:32', NULL),
(29, 'personal care', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-10 06:11:29', NULL),
(30, 'support', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-10 12:46:55', NULL),
(31, 'soapcase', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 05:04:19', NULL),
(32, 'hairdryer', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 05:21:39', NULL),
(35, 'Home thetre', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-13 06:44:07', NULL),
(36, 'Drying rack for clothing', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:50:09', NULL),
(37, 'Fold-up bed', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:50:50', NULL),
(38, 'Sofa bed', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:51:27', NULL),
(39, 'Air conditioning', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:52:03', NULL),
(40, 'Wardrobe or closet', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:53:19', NULL),
(41, 'Carpeted', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:53:59', NULL),
(42, 'Dressing room', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:54:35', NULL),
(43, 'Extra long beds (> 2 metres)', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:55:10', NULL),
(44, 'Fan', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:56:23', NULL),
(45, 'Fireplace', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:57:02', NULL),
(46, 'Heating', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:57:42', NULL),
(47, 'Interconnected room(s) available', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:58:16', NULL),
(48, 'Iron', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:58:54', NULL),
(49, 'Ironing facilities', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 06:59:23', NULL),
(50, 'Mosquito net', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:00:08', NULL),
(51, 'Safety deposit box', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:00:45', NULL),
(52, 'Sofa', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:01:17', NULL),
(53, 'Soundproofing', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:02:08', NULL),
(54, 'Seating Area', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:02:47', NULL),
(55, 'Tile/marble floor', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:03:20', NULL),
(56, 'Pants press', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:03:58', NULL),
(57, 'Hardwood or parquet floors', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:04:27', NULL),
(58, 'Desk', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:05:06', NULL),
(59, 'Hypoallergenic', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:05:36', NULL),
(60, 'Cleaning products', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:06:07', NULL),
(61, 'Electric blankets', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:06:32', NULL),
(62, 'Private entrance', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 07:09:11', NULL),
(63, 'Bath', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:16:20', NULL),
(64, 'Bidet', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:16:44', NULL),
(65, 'Bath or shower', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:17:12', NULL),
(66, 'Bathrobe', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:17:42', NULL),
(67, 'Private bathroom', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:18:20', NULL),
(68, 'Free toiletries', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:18:55', NULL),
(69, 'Spa bath', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:19:53', NULL),
(70, 'Shared bathroom', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:20:23', NULL),
(71, 'Shower', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:20:56', NULL),
(73, 'Slippers', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:21:59', NULL),
(74, 'Toilet', 2, 'Bathroom', 'Bathroom', NULL, 1, '2022-06-13 07:22:21', NULL),
(75, 'Books, DVDs, or music for children', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-13 07:25:45', NULL),
(76, 'Child safety socket covers', 7, 'Entertainment and family services', 'Entertainment_and_family_services', NULL, 1, '2022-06-13 07:26:19', NULL),
(77, 'Wake-up service', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:28:37', NULL),
(78, 'Wake up service/Alarm clock', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:28:53', NULL),
(79, 'Linen', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:07', NULL),
(80, 'Towels', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:22', NULL),
(81, 'Towels/sheets (extra fee)', 8, 'Services & extras', 'Services_&_extras', NULL, 1, '2022-06-13 07:29:40', NULL),
(82, 'Game console', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:13:26', NULL),
(83, 'Game console – Nintendo Wii', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:14:09', NULL),
(85, 'Game console – PS2', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:14:54', NULL),
(86, 'Game console – PS3', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:15:38', NULL),
(87, 'Game console – Xbox 360', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:16:11', NULL),
(88, 'Laptop', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:16:47', NULL),
(89, 'iPad', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:19:53', NULL),
(90, 'Cable channels', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:18', NULL),
(91, 'CD player', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:39', NULL),
(92, 'DVD player', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:20:56', NULL),
(93, 'Fax', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:21:26', NULL),
(94, 'iPod dock', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:21:51', NULL),
(95, 'Laptop safe', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:22:21', NULL),
(96, 'Flat-screen TV', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:22:49', NULL),
(97, 'Pay-per-view channels', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:23:14', NULL),
(98, 'Radio', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:23:41', NULL),
(99, 'Satellite channels', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:03', NULL),
(100, 'Telephone', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:32', NULL),
(101, 'TV', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:24:52', NULL),
(102, 'Video', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:07', NULL),
(103, 'Video games', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:26', NULL),
(104, 'Blu-ray player', 3, 'Media and Technology', 'Media_and_Technology', NULL, 1, '2022-06-13 08:25:53', NULL),
(105, 'Barbecue', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:27:02', NULL),
(108, 'Toaster', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:27:58', NULL),
(109, 'Electric kettle', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:28:26', NULL),
(110, 'Outdoor dining area', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:28:59', NULL),
(111, 'Outdoor furniture', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:29:24', NULL),
(112, 'Minibar', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:00', NULL),
(113, 'Kitchenette', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:30', NULL),
(114, 'Kitchenware', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:30:57', NULL),
(115, 'Microwave', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:31:20', NULL),
(116, 'Refrigerator', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:31:42', NULL),
(117, 'Tea/Coffee maker', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:05', NULL),
(118, 'Coffee machine', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:34', NULL),
(119, 'Children\'s high chair', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:32:49', NULL),
(120, 'AC & other', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 08:33:03', NULL),
(121, 'View', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:33:52', NULL),
(122, 'Terrace', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:34:25', NULL),
(123, 'City view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:34:43', NULL),
(124, 'Garden view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:06', NULL),
(125, 'Lake view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:32', NULL),
(126, 'Landmark view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:35:59', NULL),
(127, 'Mountain view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:15', NULL),
(128, 'Pool view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:33', NULL),
(129, 'River view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:36:52', NULL),
(130, 'Sea view', 5, 'Outdoor and view', 'Outdoor_and_view', NULL, 1, '2022-06-13 08:37:22', NULL),
(131, 'Stovetop', 4, 'Food & drink', 'Food_&_drink', NULL, 1, '2022-06-13 08:50:58', NULL),
(132, 'Upper floors accessible by elevator', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:55:53', NULL),
(133, 'Upper floors accessible by stairs only', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:56:12', NULL),
(134, 'Toilet with grab rails', 6, 'Accessibility', 'Accessibility', NULL, 1, '2022-06-13 08:56:29', NULL),
(136, 'sabour', 1, 'Room Amenities', 'Room_Amenities', NULL, 1, '2022-06-13 12:06:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `H3_Services`
--

CREATE TABLE `H3_Services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H3_Services`
--

INSERT INTO `H3_Services` (`id`, `service_name`, `service_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Baby safety gates', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-02 05:17:06'),
(2, 'Board games/puzzles', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-02 05:17:06'),
(3, 'Books, DVDs, or music for children', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-02 05:17:06'),
(4, 'Child safety socket covers', 'Entertainment_n_Family', 1, '2022-06-02 05:17:06', '2022-06-02 05:17:06'),
(5, 'Executive lounge access', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(6, 'Alarm clock', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(7, 'Wake-up service', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(8, 'Wake up service/Alarm clock', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(9, 'Linen', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(10, 'Towels', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46'),
(11, 'Towels/sheets (extra fee) ', 'Services_n_Extras', 1, '2022-06-02 05:18:46', '2022-06-02 05:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_user_id` int(11) NOT NULL DEFAULT '0',
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `hotel_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_content` text COLLATE utf8_unicode_ci NOT NULL,
  `property_contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_contact_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_alternate_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_listed_room_type` int(11) NOT NULL,
  `where_property_listed` int(11) NOT NULL,
  `do_you_multiple_hotel` int(11) NOT NULL,
  `hotel_rating` int(11) NOT NULL,
  `scout_id` int(11) DEFAULT NULL,
  `checkin_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkout_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_day_before_book` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_day_stays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_gallery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_option` tinyint(2) DEFAULT '0',
  `hotel_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `neighb_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attraction_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attraction_content` text COLLATE utf8_unicode_ci,
  `attraction_distance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attraction_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stay_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_price_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_price_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_fee_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_fee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_fee_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entertain_family_service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_service` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bathroom_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_tech_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `food_drink_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `outdoor_view_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibility_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entertain_family_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_service_amenities` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parking_option` tinyint(4) NOT NULL DEFAULT '0',
  `parking_price` int(11) DEFAULT '0',
  `payment_interval` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `parking_reserv_need` tinyint(4) NOT NULL DEFAULT '0',
  `parking_locate` tinyint(4) NOT NULL DEFAULT '0',
  `parking_type` tinyint(4) NOT NULL DEFAULT '0',
  `breakfast_availability` tinyint(4) NOT NULL DEFAULT '0',
  `breakfast_price_inclusion` tinyint(4) NOT NULL DEFAULT '0',
  `breakfast_cost` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `breakfast_type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `hotel_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_user_id`, `is_admin`, `hotel_name`, `hotel_content`, `property_contact_name`, `property_contact_num`, `property_alternate_num`, `cat_listed_room_type`, `where_property_listed`, `do_you_multiple_hotel`, `hotel_rating`, `scout_id`, `checkin_time`, `checkout_time`, `min_day_before_book`, `min_day_stays`, `hotel_video`, `hotel_gallery`, `hotel_document`, `hotel_notes`, `booking_option`, `hotel_address`, `hotel_latitude`, `hotel_longitude`, `hotel_city`, `neighb_area`, `hotel_country`, `attraction_name`, `attraction_content`, `attraction_distance`, `attraction_type`, `stay_price`, `extra_price_name`, `extra_price`, `extra_price_type`, `service_fee_name`, `service_fee`, `service_fee_type`, `property_type`, `entertain_family_service`, `extra_service`, `room_amenities`, `bathroom_amenities`, `media_tech_amenities`, `food_drink_amenities`, `outdoor_view_amenities`, `accessibility_amenities`, `entertain_family_amenities`, `extra_service_amenities`, `parking_option`, `parking_price`, `payment_interval`, `parking_reserv_need`, `parking_locate`, `parking_type`, `breakfast_availability`, `breakfast_price_inclusion`, `breakfast_cost`, `breakfast_type`, `hotel_status`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'Hotel Votive', 'description', 'Votive tech', '0942509544', NULL, 4, 0, 0, 5, NULL, '11:16 AM', '11:16 PM', '5', '15', '', '', '', '', 0, 'Rajendra Nagar', '12312.11', '1212.121', 'indore', 'sdfasdf', '1', 'sdfsdf', 'ashdfkjh', 'sdkfsd', 'sdfsdf', '10000', 'Swayam', '232', 'sdsd', 'Swayam', '2300', 'sdfsd', '4', '[\"1\",\"2\",\"3\",\"4\"]', '[\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\"]', '[\"7\",\"22\"]', '[\"8\",\"23\"]', '[\"9\",\"20\"]', '[\"10\",\"11\"]', '[\"12\",\"13\"]', '[\"14\",\"15\"]', '[\"16\",\"17\",\"21\"]', '[\"18\",\"19\"]', 0, 0, '', 0, 0, 0, 0, 0, NULL, '0', 1, '2022-06-04 05:51:11', '2022-06-04 12:35:46'),
(15, 1, 1, 'Lemon Tree', 'sdfsdf', 'Swayam', '0942509544', NULL, 2, 1, 0, 1, NULL, '7:08 PM', '7:08 AM', '5', '15', '', '', '', '', 0, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '99', 'Swayam', 'fsdf', 'fsdf', 'sdfsd', 'sdfsdf', 'sdfsd', 'sdf', 'sdf', 'sdfs', 'dfsdf', 'sdf', '6', '[\"4\"]', '[\"8\"]', '[\"22\"]', '[\"23\"]', '[\"20\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 0, 0, '', 0, 0, 0, 0, 0, NULL, '0', 1, '2022-06-04 13:41:28', '2022-06-06 04:35:38'),
(32, 1, 1, 'Guru kripa', 'At center of indore', 'Test User', '7686767667676', '75676767676', 4, 0, 1, 4, NULL, '1:54 PM', '11:54 AM', '2', '3', 'WEVOLjE5MDktQklPUy1FTCAkUzQ1LTE2MA---1654623023.ica', 'DXC Logo 2C RGB-1654623023.bmp', 'Monroe Party Pack (1)-1654623023.pdf', 'Monroe Party Pack-1654623023.pdf', 1, 'vijay nagar', NULL, NULL, 'indore', 'indore1', '99', 'testA', 'testA', 'testA', 'testA', '2000', 'testA', 'testA', 'testA', 'testA', '2000', 'testA', '2', '[\"2\"]', '[\"10\"]', '[\"22\"]', '[\"8\",\"23\"]', '[\"24\"]', '[\"11\"]', '[\"13\"]', '[\"15\"]', '[\"17\"]', '[\"19\"]', 0, 0, '', 0, 0, 0, 0, 0, NULL, '0', 1, '2022-06-07 17:30:23', '2022-06-07 17:30:23'),
(39, 1, 1, 'Redision sdfsdf', 'fghfghdfgdfgdfg', 'Swayam', '09425095449', NULL, 2, 1, 1, 3, NULL, '2:22 PM', '2:22 AM', '5', '15', '', '', '', 'fdfgdfg', 0, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '99', 'rahul solanki', 'ashdfkjh', 'sdkfsd', 'sdfsdf', '10000', 'rahul solanki', '232', 'sdsd', 'rahul solanki', '2300', 'sdfsd', '5', '[\"1\",\"2\"]', '[\"9\",\"11\"]', '[\"7\"]', '[\"23\"]', '[\"20\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\",\"19\"]', 0, 0, '', 0, 0, 0, 0, 0, NULL, '0', 1, '2022-06-08 08:54:05', '2022-06-08 09:04:12'),
(40, 336, 3, 'Palash', '<p>description here of hotel</p>', 'Ghansyam', '0942509544', NULL, 2, 1, 1, 3, NULL, '2:53 PM', '2:53 AM', '5', '15', '', '', '', '<p>write here notes of hotel</p>', 0, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '1', 'rahul solanki', 'ashdfkjh', 'sdkfsd', 'sdfsdf', '10000', 'rahul solanki', '232', 'sdsd', 'rahul solanki', '2300', 'sdfsd', '3', '[\"1\"]', '[\"5\"]', '[\"7\"]', '[\"8\"]', '[\"9\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 0, 0, '', 0, 0, 0, 0, 0, NULL, '0', 1, '2022-06-08 09:24:13', '2022-06-08 09:32:05'),
(49, 1, 1, 'Click this hotel to see hotel\'s room', 'sdfsdf', 'Don\'t delete this Hotel', '09425095449', NULL, 2, 1, 1, 4, 504, '7:06 PM', '7:06 AM', '5', '15', '', '', '', 'sdfsdf', NULL, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '99', 'rahul solanki', 'ashdfkjh', 'sdkfsd', 'sdfsdf', '10000', 'Swayam', '232', 'sdsd', 'Swayam', '2300', 'sdfsd', '5', '[\"2\"]', '[\"6\"]', '[\"7\"]', '[\"8\"]', '[\"9\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 0, NULL, '', 0, 0, 0, 0, 0, NULL, NULL, 1, '2022-06-09 13:38:05', '2022-06-10 13:07:27'),
(50, 1, 1, 'Lemon Tree', 'sdfsdf', 'Swayam', '09425095449', NULL, 2, 1, 1, 3, 477, '7:11 PM', '7:11 AM', '5', '15', '', '', '', 'sdfsd', 0, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '99', 'Swayam', 'ashdfkjh', 'dfgdfg', 'sdfsdf', '10000', 'Swayam', '232', 'sdsd', 'Swayam', '2300', 'sdfsd', '5', '[\"1\"]', '[\"10\"]', '[\"7\"]', '[\"8\"]', '[\"9\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 0, NULL, '', 0, 0, 0, 0, 0, NULL, NULL, 1, '2022-06-09 13:42:11', '2022-06-10 08:12:59'),
(55, 1, 1, 'akash', '<p>with nice view</p>', 'ravi sharma', '9874147987', '3216547898', 1, 0, 0, 2, 477, '8:58 AM', '11:59 PM', '5', '2', 'prize1-1654857201.jpg', 'prize1-1654857201.jpg', 'prize1-1654857201.jpg', '<p>Notes</p>', 2, 'rnt road', '147852.58', '97777.23', 'indore', 'mg road', '99', 'greenery', 'cool look', '100 m', 'abc', '500', 'pqr', '200', 'ghij', 'sfee', '40', 'bg', '1', '[\"3\"]', '[\"11\"]', '[\"7\"]', '[\"8\"]', '[\"20\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 0, NULL, '', 0, 0, 0, 0, 0, NULL, NULL, 1, '2022-06-10 10:33:21', '2022-06-10 10:33:21'),
(58, 1, 1, 'Trinity Hotel', '<p>description of hotel&nbsp;</p>', 'Swayam', '09425095449', NULL, 3, 1, 1, 4, 504, '5:42 PM', '5:42 AM', '5', '15', '', '', '', '<p>hotel notes</p>', NULL, 'Rajendra Nagar', NULL, NULL, 'indore', NULL, '99', 'Swayam', 'ashdfkjh', 'sdkfsd', 'sdfsdf', '10000', 'rahul solanki', '232', 'sdsd', 'Swayam', '2300', 'sdfsd', '5', '[\"1\"]', '[\"8\"]', '[\"7\"]', '[\"8\"]', '[\"9\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', 2, 100, '0', 1, 1, 1, 1, 1, '100', 'null', 1, '2022-06-10 12:15:17', '2022-06-13 12:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_facility_amenities`
--

CREATE TABLE `hotels_facility_amenities` (
  `hotel_amenity_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallery`
--

CREATE TABLE `hotel_gallery` (
  `id` int(11) NOT NULL,
  `hotel_id` bigint(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=is_featured',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `hotel_id`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 58, '1654863317_photo1.png', 0, 1, '2022-06-10 12:15:17', '2022-06-10 12:15:17'),
(2, 58, '1654863317_photo2.png', 0, 1, '2022-06-10 12:15:17', '2022-06-10 12:15:17'),
(3, 58, '1654863317_photo3.jpg', 0, 1, '2022-06-10 12:15:17', '2022-06-10 12:15:17'),
(4, 58, '1654863317_photo4.jpg', 0, 1, '2022-06-10 12:15:17', '2022-06-10 12:15:17'),
(5, 59, '1654864634_1.jpg', 0, 1, '2022-06-10 12:37:14', '2022-06-10 12:37:14'),
(6, 60, '1655095862_monte2.png', 0, 1, '2022-06-13 04:51:02', '2022-06-13 04:51:02'),
(7, 61, '1655096341_NEW_TOUR.jpg', 0, 1, '2022-06-13 04:59:01', '2022-06-13 04:59:01'),
(8, 62, '1655108965_destinations_jose_ignacio.jpg', 0, 1, '2022-06-13 08:29:25', '2022-06-13 08:29:25'),
(18, 66, '1655115714_art.jpg', 0, 1, '2022-06-13 10:21:54', '2022-06-13 10:21:54'),
(19, 66, '1655115714_banner.png', 0, 1, '2022-06-13 10:21:54', '2022-06-13 10:21:54'),
(20, 67, '1655115715_art.jpg', 0, 1, '2022-06-13 10:21:55', '2022-06-13 10:21:55'),
(21, 67, '1655115715_banner.png', 0, 1, '2022-06-13 10:21:55', '2022-06-13 10:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` int(11) NOT NULL,
  `hotel_type_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_types`
--

INSERT INTO `hotel_types` (`id`, `hotel_type_category_id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Budget Single Room', 'Budget Single Room', 1, '2022-06-07 08:49:37', '2022-06-07 08:54:10');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_05_19_070355_create_admin_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('votivephp.rahulraj@gmail.com', '1EcMgOqwgzPnKoo4ZArvXdIQRx2ZvXtSsB8oP6jm5rNFCjl899wVDLYvhuyj95VA', '2022-05-31 08:41:23'),
('votivephp.rahulraj@gmail.com', 'Q6TI0pd7D83cWRgpYHtiRsG5tysXSXwFmQ5bbGn8Zsl2rrYHCK87TYywTFlO8ZCU', '2022-05-31 08:57:41'),
('votivetester.saurabh@gmail.com', 'SlwW3sVHoMfwIdGbN5MCKi0gs5kxUmK2nTDNGyi28LiHZv48Uf4NawBK7RxUvBMd', '2022-05-31 09:08:41'),
('votivetester.saurabh@gmail.com', 'QyVqwOTAvzhMkIQwT35hPS6umuHTBpTCsYYCSJJJIiSqtIxC4fiYhxR6SmLPjH9Y', '2022-05-31 09:09:13'),
('votivephp.rahulraj@gmail.com', 'mpwbcHC5wxQiSiWBoI9nTZq1rPWah0gIlv45GGvVx6WIwxQpZ6iBibNbCyWayyQw', '2022-05-31 09:10:42'),
('votivephp.rahulraj@gmail.com', 'RFkPiqg4RoMsvX2HK7QrbwDwCNz5vCzvzY8oQUk4vhV3lz3uNiGG9VD7pL0fBDgp', '2022-05-31 09:14:12'),
('votivephp.rahulraj@gmail.com', 'pwZ3howqDlhqu0c6S9YfPN0ZalIU0LDA4TBEAqixk285R5rV540tha2lL3KhgBsy', '2022-05-31 09:32:44'),
('votivephp.rahulraj@gmail.com', 'bVz7jdCHM92kAQitC72QDAyM9NbcfgK18DOECcV7Ts162FhjiUstnceAQCTQfFAu', '2022-05-31 12:02:17'),
('votivetester.saurabh@gmail.com', '1d3e7OqdZ5AgzpJKRvojKJxoBBxMrBfLO4VspPRcBki40VpeLvQLaqi94NG43D15', '2022-05-31 12:12:10'),
('votivephp.rahulraj@gmail.com', 'ZRyQPdKU3WYPW3Izzs7FfWBUxLmdQbSiFXh91c8gnl60rcM0jqVCWaImCub75CK4', '2022-05-31 12:12:27'),
('votivetester.saurabh@gmail.com', 'OKE906Z0vE6IjlSwKfe1HB9NuuHFTgYK2mMtqA1Y7VIig0ZcDxkMWX1pAM3ddbRX', '2022-05-31 12:15:51'),
('votivephp.rahulraj@gmail.com', 'NO3DTk1kfj8GrATHWjbzH9djyNLhrfv1Gnvr9NcZxeynGwShdlPomiblLCEROoEa', '2022-05-31 12:39:12'),
('votivetester.saurabh@gmail.com', 'Szer54mXK2DjQOveGuGB1hj2IcXjlYc5IkaG2AJLGwEFYwLMm4S2PS3c5YgL6nQd', '2022-05-31 12:47:37'),
('votivephp.rahulraj@gmail.com', 'VIGS1hU5x1DNZ9MMGJMqdrquEz5iQSWYQAsHoUmyIMRJ4fgrIdyIexDAf1DgEph9', '2022-05-31 13:01:23'),
('votivetester.saurabh@gmail.com', '1L0HZ355F3JKT0XfjBncZPj8wptiBLUHv9LD0A7SWubLfwPIRglCsiYMoJhwZfzq', '2022-05-31 13:15:48'),
('votivetester.saurabh@gmail.com', '8ZKfEhu6uBwyHonjNI1qi31xwUkyYuntDqUywsHPmLA35XtGOC8rOx5ERBlMd3Vg', '2022-05-31 13:21:16'),
('votivephp.rahulraj@gmail.com', 'nnnSTiKt2tVl3AYhQZQeOtMS5zCrD7ySAoEBYdRd8NzSD94YQigve8M3aYY6RDo0', '2022-06-01 05:06:17'),
('votivetester.saurabh@gmail.com', 'skZuHQKVI8W8Cj28qdZzBZgqbBRvlXvFEXxzMSx7Ys6aLwdae6TkzV2ADbEUBAKp', '2022-06-01 05:08:01'),
('votivetester.saurabh@gmail.com', 'UAEy8VhRmlpPOIKkXmshE5zprJwmjedeb902OEnOv1ofDZduh7Qvy8ackV7WT3LX', '2022-06-01 05:10:37'),
('votivetester.saurabh@gmail.com', 'c5usU9RAf4aj3pbCt3RLkCqGY0surHupwg99P9CbvMdHLNWGk89ikzsbg97GbnEx', '2022-06-01 05:11:39'),
('votivetester.saurabh@gmail.com', 'XRW9KivI862P53gWscXCDiXxCAB8NviBQZEpnAt3at6LyZvd5yVoduuBNy9pTFd8', '2022-06-01 05:13:57'),
('votivetester.saurabh@gmail.com', 'BpyyNEdp6G7uVf5VGmVlMahgBWWJRFB2MIZCWKLHk8fZv0RMe430jAdLJlhn3Pcm', '2022-06-01 06:44:19'),
('votivetester.saurabh@gmail.com', 'sXDXAgdL7LtIPf1tNdI7omdhvC1v2ne2ODMDCqIPVlJZ3D8gEvQFo068c8T4kTI1', '2022-06-01 06:44:19'),
('votivetester.saurabh@gmail.com', 'j6d5vbMNKN48dtH9hvnAjGEaubNyEqmCeQ7bK6IK1nCX4iAU30ri1IdrgiMFkee4', '2022-06-01 06:45:10'),
('votivetester.saurabh@gmail.com', '4orwAqOydrjnqFSVoIBYwxwJ0owEfAgPNdPNuBNe0f6xw8sidO3hy4aNl2yiqhnP', '2022-06-01 06:50:29'),
('votivetester.saurabh@gmail.com', 'kkhhWInDBtWHLGYzhAy7T9tuFbbVAw8J724OlnFKfW8mZX5ZKBtQPrBGp85sT6YJ', '2022-06-01 06:53:16'),
('votivetester.saurabh@gmail.com', 'knDhSIwJXH4uQeGcqBCzG5Zi8RW4VWFrefRu6vc24MQQenvTmEWxyWXBJ3wic82r', '2022-06-01 06:53:53'),
('votivetester.saurabh@gmail.com', 'rlKS88Y6b0Dl3JAYyMlOiKqK2WAhooIFId95lWtSlkvZZ7e6cEOHlQ3va6eMTcAG', '2022-06-01 08:53:33'),
('votivetester.saurabh@gmail.com', '03NZC9kOxITtgnOydwQ50vrZwVzHtIVulsiGJfGw9LAfF754thA1LJgSoXX1W3Vm', '2022-06-01 08:53:34'),
('votivetester.saurabh@gmail.com', 'lVLwWDAVRD9yPANcct3BdbBbFOYTmqswuSGDPrawDRLrvhirzc4ALeibRsWjWaAf', '2022-06-01 08:57:12'),
('votivetester.saurabh@gmail.com', 'xnBlPis4bvgWUG2hOacfFMzFH3gomlM9edtMEzpCWqEHauYgWNCfhDoOyVQIAhLy', '2022-06-01 08:57:12'),
('votivetester.saurabh@gmail.com', 'cbi0W3m1IhIoQGJao7S4oyuHIxkavgsIsWtKifNaP0hvYY1mOjANUBERjgdJUMSd', '2022-06-01 09:39:07'),
('votivetester.saurabh@gmail.com', 'ok05FxLSMQetC2P526de9wd9SWamsDvLBfDLrLSVdp0B4twmhVgK5FpCTad079WU', '2022-06-02 11:06:04'),
('votivetester.saurabh@gmail.com', '6lEalQQBxTxQzh47DphyIU754JRT2MR2dBDFKb0sidx7ykNg4EYptlDqcIcWugFP', '2022-06-02 11:09:16'),
('votivetester.saurabh@gmail.com', 'Uz7roifgvNx9EIU1uENUM1iFHmAIlxhjwoTEZL7u2g7hJPH759xx3rno3Z7FaeUk', '2022-06-03 06:26:02'),
('votivetester.saurabh@gmail.com', 'tJG8ZUJwnTa1Bl3TdhxkkD61W89ikaX8lzW64MtLITP3HauSj4FSoNMrLShSXYlS', '2022-06-03 08:38:43'),
('votivetester.saurabh@gmail.com', 'PVJX3aLk7auY1BSzY1W4EN2jFBpRjbDa9fQnpqKpBga6b1MEbACUKgQWl8iFZvyd', '2022-06-03 08:44:24'),
('votivetester.saurabh@gmail.com', 'LiIBm8dA4LY8yeTnLBbhAJ5vhKRXktQxmXWeWOrksRbV0iJZWcakcuI5fVUzoGzS', '2022-06-03 10:17:44'),
('votivetester.saurabh@gmail.com', 'MqQP2SZvCxg5eA2DIO2tv2W40zrYmDmdioJ9t9WoRIgWoxTvE7XQNgNMMXDmIlT6', '2022-06-03 10:19:36'),
('snothinginlife@gmail.com', 'gFrsR5HbMOBuxc9KpibLH4k8Z7SFL8MOP5j3Zv7cuxezwpv9jjEIrHAYGZEVgl5N', '2022-06-03 10:27:38'),
('snothinginlife@gmail.com', 'WPrj5VnRGtFOrCOOOQOtyWx6FobA2weArNTFlGbyJoi87S0kIyx9jfOGQIbZz4qq', '2022-06-03 10:28:05'),
('snothinginlife@gmail.com', '9FSaJIJ4pEm413m3e1lLhydRW4wFOaVsw80ufv5jh7cEc0MU6mbjKg7IXnpuCnV8', '2022-06-03 10:28:39'),
('votivetester.saurabh@gmail.com', 'KpDbRQk4EAlvIReHSV9px7Wwd3NJp0bnz54NSQX7eT2okLIRl8uQbnzmjBUH54t0', '2022-06-03 11:06:41'),
('votivetester.saurabh@gmail.com', 'CQhlJKANRLILDd3l6ineiK5dpbaV1fPBLkW6GFUdfTmPFot7rX9aeCuiTxXXIdpm', '2022-06-03 11:06:42'),
('snothinginlife@gmail.com', 'Aj2Tc7EdJIcV2eAVf9WSjqDwn2PfhXXkk6M3eNvPdJj3ZXuu32jW9ZamWqSyaHkJ', '2022-06-03 11:06:48'),
('votivetester.saurabh@gmail.com', 'D8XRIcuJEczrsu93n5Cj480yteDwBhB4PIYVtJnovbhqC0jOSQzv0Q8NutJE3Chz', '2022-06-03 12:09:53'),
('votivetester.saurabh@gmail.com', 'movshShSvGSsvEUhpbPZkGCtzHnEm1O8IN9rnMiE2PTUad6XlB6ataYRWJqKvwY1', '2022-06-04 06:15:19'),
('votivetester.saurabh@gmail.com', 'ler5mlauZ7I6txN8PQXeip7DqvApAP5NSipzowb4bG8RaSwxVwUS4xgJ3uAuxz5T', '2022-06-04 07:22:49'),
('votivetester.saurabh@gmail.com', '828NsJvWZNIzsy3bRiFp7re62ETX3uaVU6rJCwS73qUE6SGbHJLcdNahtxONeoRW', '2022-06-04 11:08:39'),
('votivetester.saurabh@gmail.com', 'At5I3Rmq1LWxxzMoeU4RGmAMvjIrIxwDqJXsNLPHTPfmPowcpBefOEM7fLGb0vKJ', '2022-06-04 11:08:39'),
('votivetester.saurabh@gmail.com', 'QlCUds9f9BGXh3aktljaSSuzwue7LlPRB2CKPtb2HUG60K8ty3sJQxA8JhLa0eQB', '2022-06-04 11:37:55'),
('votivetester.saurabh@gmail.com', 'sLrrTyUZV11Lw7Vd47VXDvfQj0npAWCgMk9dbkQUBP4fzHE0ox2mXNfcOOb3y5Oy', '2022-06-06 05:30:40'),
('votivetester.saurabh@gmail.com', 'briwQ7TxIGhaBAaku0wbkaahyFWBqZjqaYCclNq2Az1TtA9CTG2Z31Tfm9m6sXFm', '2022-06-06 05:31:26'),
('votivetester.saurabh@gmail.com', '5pqisk8siMoI60msirCvPMnbYB6sMgHqozkrbeN1F5H0fatLv30YRF5yrMn6MV1X', '2022-06-06 05:31:48'),
('votivetester.saurabh@gmail.com', 'Fn7ljK470VnqEZd5UwH11P87hwVCjrHasahs5e1tYdgG8YE4dMMuj8sRzJGOUMkY', '2022-06-06 09:09:41'),
('votivetester.saurabh@gmail.com', 'hsUdmxpzZIRMJcaneMq8DKgRAWzOo4W0MLjNKqa5FyVP9kzhCS0uYUnYdTzbCWNQ', '2022-06-08 04:53:51'),
('votivetester.saurabh@gmail.com', 'FkNX7j8FyWqKVvC25eeTq4bMJyffjmjeHSxrDnzpYltTnWhvTLOzTjfEPQr8eXR7', '2022-06-08 04:57:43'),
('votivetester.saurabh@gmail.com', 'c7Db9YEmJpuO4rSSMzhqy1wuIPjJEzIQnJf5nQi1TMsUHyTBvHL6R4gSyM0CHSyy', '2022-06-08 05:15:12'),
('votivetester.saurabh@gmail.com', 'PKPj5XCF2z6wJZom6ADmjktlF3wDxMkFnCSNPpPN8wuitdZ1Nf8NnMaw1PyXkfsC', '2022-06-08 05:17:26'),
('votivetester.saurabh@gmail.com', 'kekRXCzpsUJIqr52xRRPiFFvVHh63IDTmV98q7wA2MmlUMfU3H1g2f8rqb8V1gWu', '2022-06-09 09:13:00'),
('votivetester.saurabh@gmail.com', '0KDapCCBfUt69q4HR4xA0CQVkbxRd8gX9zQRI2MjYQlDZ0cLjfbYhXRhvnE10wr2', '2022-06-09 09:14:39'),
('votivetester.saurabh@gmail.com', 'IFPsgNoN4niALf0aYejvNPnXfwU1jWHPu6d8u7rsBQH7LVpTxlMtSdkGwEby5UAV', '2022-06-09 09:58:40'),
('votivetester.saurabh@gmail.com', '8fDqTQMtathurE4pLaQn8af5SbiYIrlkJcfAoS9YXe8WpJVYMFgxBw1hzPVVJ26N', '2022-06-09 10:01:35'),
('votivetester.saurabh@gmail.com', '4iK6s6uR2i9FhSHKTId8FoGPQreZpnScBD9eDUoDNXbGCaNy9OiewkkhZQBA25OA', '2022-06-10 11:30:23'),
('votivetester.saurabh@gmail.com', 'ZGSz0lfQ3Hh2KTTMG61Ta1FvGplyDH06pJmKmzoOYDaeoKiF4SuTK69jMdGMkyAw', '2022-06-10 13:18:42'),
('votivetester.saurabh@gmail.com', 'ywu2fTSiX8tAqkMTgO0fw71AmGOOPOMa8XrXKdNWA3Eg4DDgyO9lStaXfMaQWL1P', '2022-06-10 13:19:02'),
('votivetester.saurabh@gmail.com', 'pF9gaZ9Kd92VmKERUSge87vu2QAMqp9P8FFZj1w0rvFRqlpLu8P1fGLl0RoesFnT', '2022-06-13 05:19:13'),
('votivetester.saurabh@gmail.com', 'Lc4eh4oT9s7noSaqYnkYuv2Xb1frzizrOTQ1Ed51wmBVLWt0MtK5NT0vHuqN5cmx', '2022-06-13 07:01:25'),
('votivetester.saurabh@gmail.com', 'vThLLZ9xSL6JfqP0ddvrxYkIXfyjozwysE9ACtPfdr6hDKjyCMQJaTC0VZu9UZcD', '2022-06-13 09:03:26'),
('votivetester.saurabh@gmail.com', '4ZjatnI2roHNeM7rh8ZGtrRF9U5nfCWgwbIxdk2oBTGLsAGlYKlVXdUti4R8ApNe', '2022-06-13 09:45:18'),
('votivetester.saurabh@gmail.com', '5CwfiZ6zDbQyOrLN2ev5nJIdFU2puDW30yncZagTIg5z0uj46FLOWiGVLnXDikai', '2022-06-13 09:50:51'),
('votivetester.saurabh@gmail.com', 'aKcf8NeT1g27dQXNHQeJeMlavtVlV81pMY8CS8Hi9MtnGT6sfNo66QbXoJR0g4Jz', '2022-06-13 10:14:05'),
('votivetester.saurabh@gmail.com', 'Bn803H5mhSkrCZJcPZdgK24Oxj9e7bpunRnT9cUOn8kWhGbOJROfzoHJLilEscUB', '2022-06-13 11:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `room_gallery`
--

CREATE TABLE `room_gallery` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` int(11) NOT NULL COMMENT '1=is_featured',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_gallery`
--

INSERT INTO `room_gallery` (`id`, `room_id`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, '1654856248_prize1.jpg', 0, 1, '2022-06-10 00:00:00', '2022-06-10 10:29:03'),
(2, 11, '1654856361_images.jpg', 0, 1, '2022-06-10 00:00:00', '2022-06-10 10:29:23'),
(3, 11, '1654856361_room.jpg', 0, 1, '2022-06-10 00:00:00', '2022-06-10 10:29:43'),
(4, 11, '1654856361_rooms1.jpg', 0, 1, '2022-06-10 00:00:00', '2022-06-10 10:30:01'),
(5, 11, '1654856361_rooms2.jpg', 0, 1, '2022-06-10 00:00:00', '2022-06-10 10:30:11'),
(6, 12, '1654861813_2-5.jpg', 0, 1, '2022-06-10 11:50:13', '2022-06-10 11:50:13'),
(7, 13, '1655105064_photo1.png', 0, 1, '2022-06-13 07:24:24', '2022-06-13 07:24:24'),
(8, 13, '1655105064_photo2.png', 0, 1, '2022-06-13 07:24:24', '2022-06-13 07:24:24'),
(9, 13, '1655105064_photo3.jpg', 0, 1, '2022-06-13 07:24:24', '2022-06-13 07:24:24'),
(10, 13, '1655105064_photo4.jpg', 0, 1, '2022-06-13 07:24:24', '2022-06-13 07:24:24'),
(11, 14, '1655105418_destinations_Colonia_del_Sacramento.jpg', 0, 1, '2022-06-13 07:30:18', '2022-06-13 07:30:18'),
(12, 15, '1655109563_markus.jpg', 0, 1, '2022-06-13 08:39:23', '2022-06-13 08:39:23'),
(13, 16, '1655110207_destination_punta_del_diablo.jpg', 0, 1, '2022-06-13 08:50:07', '2022-06-13 08:50:07'),
(14, 17, '1655116352_image2.jpg', 0, 1, '2022-06-13 10:32:32', '2022-06-13 10:32:32'),
(15, 18, '1655122519_image4.jpg', 0, 1, '2022-06-13 12:15:19', '2022-06-13 12:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `id` int(11) NOT NULL,
  `room_types_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `max_adults` int(11) NOT NULL,
  `max_childern` int(11) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `price_per_night` double NOT NULL,
  `price_per_night_7d` double NOT NULL,
  `price_per_night_30d` int(11) NOT NULL,
  `extra_guest_per_night` double NOT NULL,
  `cleaning_fee` double NOT NULL,
  `city_fee` double NOT NULL,
  `type_of_price` enum('single_fee','per_night','per_guest','per_night_per_guest') COLLATE utf8_unicode_ci NOT NULL,
  `bed_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `private_bathroom` int(11) NOT NULL COMMENT '1=yes,0=no',
  `private_entrance` int(11) NOT NULL COMMENT '1=yes,0=no',
  `optional_services` text COLLATE utf8_unicode_ci NOT NULL,
  `family_friendly` int(11) NOT NULL COMMENT '1=yes,0=no',
  `outdoor_facilities` text COLLATE utf8_unicode_ci NOT NULL,
  `extra_people` text COLLATE utf8_unicode_ci NOT NULL,
  `room_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bathroom_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_tech_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `food_drink_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `outdoor_view_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessibility_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entertain_family_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_service_amenities` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entertain_family_service` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_service` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_room_features` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `room_types_id`, `hotel_id`, `name`, `description`, `notes`, `max_adults`, `max_childern`, `number_of_rooms`, `price_per_night`, `price_per_night_7d`, `price_per_night_30d`, `extra_guest_per_night`, `cleaning_fee`, `city_fee`, `type_of_price`, `bed_type`, `private_bathroom`, `private_entrance`, `optional_services`, `family_friendly`, `outdoor_facilities`, `extra_people`, `room_amenities`, `bathroom_amenities`, `media_tech_amenities`, `food_drink_amenities`, `outdoor_view_amenities`, `accessibility_amenities`, `entertain_family_amenities`, `extra_service_amenities`, `entertain_family_service`, `extra_service`, `other_room_features`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Budget Single Room', 'Hello', 'Hello', 2, 1, 15, 452, 456, 1582, 458, 10, 0, 'single_fee', 'Single bed', 1, 0, 'No', 1, 'No', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-09 12:43:29', '2022-06-10 10:04:07'),
(2, 2, 49, 'Shree Maya', 'd', 'e', 4, 4, 5, 100, 70, 50, 10, 10, 10, 'per_night_per_guest', 'Single bed', 0, 0, 'a', 1, 'b', 'c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-09 12:46:07', '2022-06-10 09:20:16'),
(3, 2, 49, 'z', 'room', 'abcd', 4, 4, 5, 10, 7, 5, 1, 0, 0, 'per_night_per_guest', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 05:01:51', '2022-06-10 09:18:21'),
(4, 1, 49, 'nmop', 'room', 'abcd', 10, 3, 5, 50, 40, 30, 10, 5, 5, 'single_fee', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 06:19:33', '2022-06-10 09:18:21'),
(5, 1, 49, 'nmop', 'room', 'abcd', 10, 3, 5, 50, 40, 30, 10, 5, 5, 'single_fee', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 06:20:13', '2022-06-10 09:18:21'),
(6, 2, 49, 'sl_double', 'room', 'abcd', 5, 3, 10, 1000, 5000, 15000, 100, 0, 0, 'per_night_per_guest', 'Double bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 08:23:50', '2022-06-10 09:18:21'),
(7, 2, 49, 'sl_double', 'room', 'abcd', 5, 3, 10, 1000, 5000, 15000, 100, 0, 0, 'per_night_per_guest', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 08:25:06', '2022-06-10 09:18:21'),
(8, 1, 49, 'sl_double', 'coolroom', 'abcd', 5, 3, 10, 1000, 5000, 15000, 100, 0, 0, 'per_night_per_guest', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 08:53:26', '2022-06-10 09:56:44'),
(9, 3, 32, 'rm45', 'awesome', 'notes', 10, 5, 5, 500, 400, 350, 50, 25, 25, 'per_night_per_guest', 'Double bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 09:12:43', '2022-06-10 09:50:09'),
(10, 2, 32, 'gkd', 'room', 'abcd', 4, 2, 10, 500, 400, 300, 50, 25, 25, 'per_night', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 10:17:28', '2022-06-10 10:17:28'),
(11, 1, 32, 'Test', 'Hello', 'Hello', 2, 1, 15, 452, 456, 1582, 458, 10, 0, 'single_fee', 'Double bed', 1, 1, 'No', 1, 'No', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 10:19:21', '2022-06-10 10:19:21'),
(12, 1, 50, 'lemon11', 'room', 'abcd', 10, 5, 10, 500, 400, 300, 1, 25, 25, 'per_night', 'Extra-Large double bed (Super - King size)', 1, 1, 'yes', 1, 'yes', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-10 11:50:13', '2022-06-13 13:21:36'),
(13, 6, 58, 'room type name one', 'This is a secure environment where all neighbours are verified.', 'fdfgdf', 2, 1, 5, 500, 3200, 12000, 250, 100, 10, 'per_night', 'Double bed', 1, 1, 'sdfsd', 1, 'sdfsd', '1', '[\"7\"]', '[\"8\"]', '[\"9\"]', '[\"10\"]', '[\"12\"]', '[\"14\"]', '[\"16\"]', '[\"18\"]', '[\"1\"]', '[\"5\"]', '[\"1\"]', 1, '2022-06-13 07:24:24', '2022-06-13 07:24:24'),
(14, 1, 7, 'b', 'room', 'notes', 10, 2, 5, 50, 70, 500, 40, 50, 500, 'per_night_per_guest', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', '[\"25\"]', '[\"8\"]', '[\"9\"]', '[\"27\"]', '[\"12\"]', '[\"14\"]', '[\"17\"]', '[\"18\"]', '[\"1\"]', '[\"6\"]', '[\"1\"]', 1, '2022-06-13 07:30:18', '2022-06-13 07:30:18'),
(15, 1, 62, 'c', 'coolroom', 'notes', 5, 5, 5, 200, 180, 150, 5, 5, 5, 'per_night_per_guest', 'Extra-Large double bed (Super - King size)', 1, 1, 'yes', 1, 'yes', 'yes', '[\"22\"]', '[\"63\"]', '[\"26\"]', '[\"105\"]', '[\"121\"]', '[\"14\"]', '[\"35\"]', '[\"19\"]', '[\"2\"]', '[\"6\"]', '[\"4\"]', 1, '2022-06-13 08:39:23', '2022-06-13 08:39:23'),
(16, 1, 62, 'kfc02', 'awesome', 'abcd', 4, 2, 10, 1000, 900, 800, 2, 50, 50, 'per_night_per_guest', 'Single bed', 1, 1, 'Yes', 1, 'Yes', 'Yes', '[\"28\"]', '[\"31\"]', '[\"82\"]', '[\"108\"]', '[\"122\"]', '[\"14\"]', '[\"21\"]', '[\"30\"]', '[\"2\"]', '[\"6\"]', '[\"4\"]', 1, '2022-06-13 08:50:07', '2022-06-13 08:50:07'),
(17, 1, 55, 'ba', 'coolroom', 'notes', 10, 2, 2, 200, 180, 150, 1, 10, 10, 'per_night_per_guest', 'Single bed', 1, 1, 'yes', 1, 'yes', 'yes', '[\"7\",\"25\"]', '[\"32\"]', '[\"82\"]', '[\"109\"]', '[\"123\"]', '[\"132\"]', '[\"21\"]', '[\"30\"]', '[\"2\"]', '[\"7\"]', '[\"2\"]', 1, '2022-06-13 10:32:32', '2022-06-13 10:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `room_name_list`
--

CREATE TABLE `room_name_list` (
  `id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(343, 9, 'Mixed Dormitory Room', 1, '2022-06-13 06:57:23', '2022-06-13 06:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `room_others_features`
--

CREATE TABLE `room_others_features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_others_features`
--

INSERT INTO `room_others_features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Air Conditioner', 1, '2022-06-09 05:14:04', '2022-06-09 05:14:04'),
(2, 'Bar / Restaurant', 1, '2022-06-09 05:14:13', '2022-06-09 05:14:13'),
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
(24, 'Scanner / Printer', 1, '2022-06-09 05:18:44', '2022-06-09 05:18:44'),
(25, 'Smoking Allowed', 1, '2022-06-09 05:18:55', '2022-06-09 05:18:55'),
(26, 'Suitable for Events', 1, '2022-06-09 05:19:02', '2022-06-09 05:19:02'),
(27, 'TV', 1, '2022-06-09 05:19:13', '2022-06-09 05:19:13'),
(28, 'Wheelchair Accessible', 1, '2022-06-09 05:19:21', '2022-06-09 05:19:21'),
(29, 'Wireless Internet', 1, '2022-06-09 05:19:32', '2022-06-09 05:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_categories`
--

CREATE TABLE `room_type_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_type_categories`
--

INSERT INTO `room_type_categories` (`id`, `title`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Single', 'Single', 1, '2022-06-07 08:39:16', '2022-06-07 08:39:16'),
(2, 'Double', 'Double', 1, '2022-06-07 08:39:42', '2022-06-07 08:39:42'),
(3, 'Twin', 'Twin', 1, '2022-06-07 08:40:04', '2022-06-07 08:40:04'),
(4, 'Twin/Double', 'Twin/Double', 1, '2022-06-07 08:40:48', '2022-06-07 08:40:48'),
(5, 'Quadruple', 'Quadruple', 1, '2022-06-07 08:42:07', '2022-06-07 08:42:07'),
(6, 'Family', 'Family', 1, '2022-06-07 08:42:19', '2022-06-07 08:42:19'),
(7, 'Suite', 'Suite', 1, '2022-06-07 08:42:35', '2022-06-07 08:42:35'),
(8, 'Studio', 'Studio', 1, '2022-06-07 08:42:48', '2022-06-07 08:42:48'),
(9, 'Dormitory', 'Dormitory', 1, '2022-06-07 08:43:18', '2022-06-07 08:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `room_video`
--

CREATE TABLE `room_video` (
  `id` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_verify_email` tinyint(4) DEFAULT '0',
  `is_verify_contact` tinyint(4) DEFAULT '0',
  `my_referral_code` varchar(255) DEFAULT NULL,
  `user_referral_id` varchar(255) DEFAULT NULL,
  `wallet_balance` float DEFAULT '0',
  `profile_pic` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `user_plan` int(11) DEFAULT NULL,
  `user_language` varchar(50) DEFAULT NULL,
  `user_categories` varchar(300) DEFAULT NULL,
  `user_company_name` varchar(150) DEFAULT NULL,
  `user_company_number` varchar(50) DEFAULT NULL,
  `user_company_address` varchar(200) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `activation_code` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_city` varchar(30) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `address` text,
  `ship_id` int(11) DEFAULT NULL,
  `shipping_price` float(10,2) DEFAULT NULL,
  `shipping_currency` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `social_id` text,
  `register_by` varchar(255) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `about` text,
  `device_id` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `vrfn_code` varchar(255) DEFAULT NULL,
  `card_status` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `job-status` tinyint(4) DEFAULT NULL,
  `user_rec_promo` int(11) DEFAULT NULL,
  `user_rec_outdoor_promo` int(11) DEFAULT NULL,
  `user_signup_method` varchar(255) DEFAULT NULL,
  `auth_check` int(11) DEFAULT NULL,
  `sms_check` int(11) DEFAULT NULL,
  `act_link` varchar(50) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_online` int(11) DEFAULT NULL,
  `publishonhome` smallint(6) DEFAULT NULL,
  `toprated` smallint(6) DEFAULT NULL,
  `user_profile_pic` varchar(255) DEFAULT NULL,
  `businessID` varchar(255) DEFAULT NULL,
  `social_login` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `braintree_token` longtext,
  `guest_login` int(10) UNSIGNED DEFAULT NULL,
  `purches_for` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `email`, `contact_number`, `password`, `role_id`, `is_verify_email`, `is_verify_contact`, `my_referral_code`, `user_referral_id`, `wallet_balance`, `profile_pic`, `resume`, `gender`, `user_plan`, `user_language`, `user_categories`, `user_company_name`, `user_company_number`, `user_company_address`, `notification`, `activation_code`, `dob`, `user_country`, `state_id`, `user_city`, `postal_code`, `latitude`, `longitude`, `address`, `ship_id`, `shipping_price`, `shipping_currency`, `parent_id`, `social_id`, `register_by`, `website`, `about`, `device_id`, `device_token`, `device_type`, `vrfn_code`, `card_status`, `status`, `job-status`, `user_rec_promo`, `user_rec_outdoor_promo`, `user_signup_method`, `auth_check`, `sms_check`, `act_link`, `last_login`, `is_online`, `publishonhome`, `toprated`, `user_profile_pic`, `businessID`, `social_login`, `created_at`, `updated_at`, `remember_token`, `braintree_token`, `guest_login`, `purches_for`, `otp`) VALUES
(336, 'service_provider', 'service', 'provider', 'rahulservpro@gmail.com', '345345345', '$2y$10$J6btJfRDY8Sdb0AOmOG9v./KYFc1fyyv7IsjCIktWyvOc8MfWmBHy', 4, 1, 0, 'YVVyZGE4Rm8wY2FPWnN3Q2oyd09mUT09', NULL, 0, 'art-1654507052.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 'bsbsb', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'kK40jc', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-25 11:41:12', '2022-05-28 07:07:04', NULL, NULL, NULL, NULL, NULL),
(346, 'normal_user', 'rahul solanki', NULL, 'user@gmail.com', '0942509544', '$2y$10$5IQEE45OY6zKgN2qtkhmaeIFs05o4A6kU0RIsUc.9ZajkdTGVRbCO', 2, 0, 0, NULL, NULL, 0, 'bmw-1654599938.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India', 'Madhya Pradesh', 'Indore', 452001, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 08:22:09', '2022-05-28 06:53:05', NULL, NULL, NULL, NULL, NULL),
(347, 'normal_user', 'vivek', NULL, 'vivek@gmail.com', '1234577899', '$2y$10$cfKorP8.CE6arkxNyVFFouHvKLpYIuWSBN7wpdvc6Az7K8XIxlJTi', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 'indore', NULL, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:10:02', '2022-05-28 06:56:21', NULL, NULL, NULL, NULL, NULL),
(348, 'normal_user', 'viveksd', NULL, 'vevie@gmail.com', '1231324562', '$2y$10$ljLea3bBvsYVpWH3xfE4DeGZKkgPW8tO8/wWe7tDy4apdzhWGm7Qq', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:11:22', '2022-05-26 07:41:22', NULL, NULL, NULL, NULL, NULL),
(349, 'normal_user', 'asdfsd asdasd', NULL, 'asdfg@gmail.com', '4456121324', '$2y$10$VRVzb4wqGtxCBEEDV5qVBeH2gsgoV3mBVOnfopaGOD3LP9RNQDoeS', 2, 0, 0, NULL, NULL, 0, 'user-1653640891-1653645830.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:03:26', '2022-05-27 10:03:26', NULL, NULL, NULL, NULL, NULL),
(350, 'service_provider', 'Pushpendra Jha', NULL, 'votivephppushpendra@gmail.com', '9179004123', '$2y$10$iY2hG4wEJhLDnRcsMZPOFOhNphQu0hQH9sQtSmHEcafC2Z6O9lV5m', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:08:53', '2022-05-27 13:25:23', NULL, NULL, NULL, NULL, NULL),
(351, 'normal_user', 'nakul', NULL, 'nakulsuhane@gmail.com', '9993776089', '$2y$10$d35Lv45BGe7igztuFOUJouYWJAYjjZc3aer0CAMRHvBWRAZsQc8vO', 2, 0, 0, NULL, NULL, 0, '1649150813_fd06191f-8c6c-436c-a3af-5f2a6a17184c-1653648938.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', 'mp', 'Indore', 45454545, NULL, NULL, 'vijay nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:47:25', '2022-06-07 10:16:33', NULL, NULL, NULL, NULL, NULL),
(352, 'service_provider', 'Votive tech', NULL, 'votive.techs@gmail.com', '1231231234', '$2y$10$DrJ/97AfkWzYzgP66hEK5uqE67w2gmtQcWeYgJE6X1E9yd0Cyv1se', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 11:08:02', '2022-05-27 11:08:02', NULL, NULL, NULL, NULL, NULL),
(353, 'service_provider', 'new vendor', NULL, 'vendor2@gmail.com', '3131021230', '$2y$10$WiyOS7gEw5gCigyA80oscOGurqTCOnLU1F0x3Y.AOLV.9ncmqb3uO', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, 'indore', NULL, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 13:26:33', '2022-05-28 07:48:22', NULL, NULL, NULL, NULL, NULL),
(354, 'normal_user', 'Muhammad Khalid', NULL, 'mkakhi@yahoo.com', '0503589372', '$2y$10$IBJySupEyRUT4rRrKx5fuOuO/kNkLvgb1PGQU1x/yquog0Nt38gT6', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 20:36:30', '2022-05-27 20:36:30', NULL, NULL, NULL, NULL, NULL),
(439, 'normal_user', 'Ayesha Zahid', NULL, 'ayeshazahid913@gmail.com', '0123456789', '$2y$10$DuheIwPHZNKQo.mKWGWtPu6ZBpHTTghdlurpf0gjMepPuvONV4hkK', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 13:28:20', '2022-06-03 13:28:20', NULL, NULL, NULL, NULL, NULL),
(440, 'normal_user', 'Ayesha', NULL, 'ayha00@gmail.com', '3122786074', '$2y$10$iZOQUlXqRQJogwEW.gzpSeiiKeGuGjA3WwWWBM491H2bVco9rh0v6', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 13:40:35', '2022-06-03 13:40:35', NULL, NULL, NULL, NULL, NULL),
(472, '', 'neha', 'mandloi', 'neha1@gmail.com', '1234567892', '$2y$10$nikIxFk6dOl/rJbKFDxUeecj9fXi69P.CkvMizVWLXO2G2oxSSCxi', NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 09:49:41', '2022-06-09 09:49:41', NULL, NULL, NULL, NULL, NULL),
(476, 'normal_user', 'neha', 'mandloi', 'neha@gmail.com', '1234567893', '$2y$10$Bda9josjpIG7i2.Cm0uB.uq3JaNq7HNpymXpd5Hq4aZqtfPUJw/3C', NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 10:30:26', '2022-06-09 10:30:26', NULL, NULL, NULL, NULL, NULL),
(477, 'scout', 'Swayam', NULL, 'scout@gmail.com', '09425095449', '$2y$10$qBKV3v2DLktHo4xBehGiE.lLbuz0YRF913QHqNtrcYKTe7hLm8OxC', 3, 1, 0, 'T0dCTkttMXl0MXFnUmJjb28wN1RjQT09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 'bsbsb', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'yFv0op', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 10:38:27', '2022-06-10 04:54:02', NULL, NULL, NULL, NULL, NULL),
(484, 'service_provider', 'spfn', NULL, 'spfn@gmail.com', '9874563214', '$2y$10$w2rLUrh9Z/26TKnCBHO3u.gR.JGZrPqp5LNoGvjbg1LmuPRPOlPZq', 4, 1, 0, 'eXFoTHU5bFdIcG1sMkdQTFJjYkVCdz09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'nqRA5N', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 05:32:47', '2022-06-10 05:32:47', NULL, NULL, NULL, NULL, NULL),
(497, 'normal_user', 'cfn', NULL, 'cfn@gmail.com', '3698745621', '$2y$10$.Qr0zxJcbMyqTjdxWUpvq.S4jSvTC3mlK5V1FQ0aDfLxPfZiVfb4G', 2, 1, 0, 'TDR5bnFJNzNUYXZldlpwbHJPRTVUUT09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'djkgvO', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 10:38:25', '2022-06-10 10:38:25', NULL, NULL, NULL, NULL, NULL),
(498, 'service_provider', 'vsu', NULL, 'vsu@gmail.com', '3698741258', '$2y$10$Vdb8shHnXDkW6pcyovBxxOtrbAYI1kMTS1mfr1PGwR8RXR97EQpx6', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 10:47:02', '2022-06-10 10:47:02', NULL, NULL, NULL, NULL, NULL),
(499, 'normal_user', 'saurabh', NULL, 'ss@gmail.com', '3698745214', '$2y$10$fDduTrRtYUqpFQ3z/sX2aOpIBSfE8oJnPMENaQrV.IbS2rblaUAIW', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 10:58:25', '2022-06-13 13:20:44', NULL, NULL, NULL, NULL, NULL),
(500, 'normal_user', 'a', NULL, 'votivetester.saurabh@gmail.com', '4874789582', '$2y$10$e4epLrdJQimzdizvigRZte3mrHFkDp3ypKjAG0K6IYnLDdMy36SqW', 2, 0, 0, NULL, NULL, 0, 'destinations_garzon-1655103212.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'india', 'madhya pradesh', 'indore', 452001, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 10:59:13', '2022-06-10 10:59:13', NULL, NULL, NULL, NULL, NULL),
(503, 'service_provider', 'spro', NULL, 'spro@gmail.com', '1234564711', '$2y$10$WcUOTOZrTG8JYmVsef7o.OVRN7kRcrci8Y2V6A9Vgj8zza48TklBu', 4, 1, 0, 'eldWWGFGNWFJVERlN0FYclQvMXBWQT09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'Bvc1P5', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:26:12', '2022-06-10 12:30:22', NULL, NULL, NULL, NULL, NULL),
(504, 'scout', 'sct', NULL, 'sct@gmail.com', '3692581474', '$2y$10$GqKDcu/8TGgd6oifl5pzGuOna5mtqsZxeJmxzmaaCXtj0mO9lk5km', 3, 1, 0, 'SWhaR3ZXRUUyelFmNStoeHlkeWphdz09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'mg road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, '7SgFiF', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:27:56', '2022-06-10 13:26:39', NULL, NULL, NULL, NULL, NULL),
(507, 'normal_user', 'neha', '', 'votivephp.neha@gmail.com', '1234567899', '$2y$10$5J98Oa.Yj0BAG2PevuB76.M9oSK8ZzcWp2qMcpF/qgz0bYQzFhLdC', 2, 0, 0, 'M1l1dy9SYVRoTHB0VDZ3Ulp6YlZ2QT09', '', 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1654864868.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, '0', '0', '0', 'iyQgaV', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 12:41:08', '2022-06-10 12:41:08', NULL, NULL, NULL, NULL, NULL),
(509, 'service_provider', 'aspn', NULL, 'aspn@gmail.com', '3692587412', '$2y$10$wrYbzPO5XMnYAiHC4VL.t.NFf.QPYUXJtH.3Wgr52cOQDCOE3As62', 4, 1, 0, 'QzBiYUxKM05IU004bWxWdkorUm9aQT09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'mg road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, '1ktEkM', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 05:13:10', '2022-06-13 05:13:34', NULL, NULL, NULL, NULL, NULL),
(510, 'normal_user', 'cstmr', NULL, 'cstmr@gmail.com', '3698521475', '$2y$10$yJzeq700XgOcRMrIVc2t1OdxHF2He6Y27QjjyXcFZU.fHEMmH5jcu', 2, 1, 0, 'cnNtaGtMTkU3MWFVYU5FN2ZkVHJSQT09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'mg road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'j8t50n', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 05:15:10', '2022-06-13 05:15:30', NULL, NULL, NULL, NULL, NULL),
(511, 'service_provider', 'vendor', NULL, 'vendor@gmail.com', '3698745214', '$2y$10$G0nge9L26ov6jdpmJwwfw.7GYL.mvIwkBNVi0sh1RxglVX15UAadS', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 05:27:53', '2022-06-13 05:27:53', NULL, NULL, NULL, NULL, NULL),
(513, 'service_provider', 'AddSerPro', NULL, 'AddSerPro@gmail.com', '3698741254', '$2y$10$EL8LbE6kgOwj2JApN2ANx.2MhUr.jPI8iYdUdDSXbLkZOXXXobUum', 4, 1, 0, 'VnpXb0V3SnVVRi9HRlhiQkQzT3VsZz09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'mg road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'GCEyOI', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 06:35:51', '2022-06-13 09:00:01', NULL, NULL, NULL, NULL, NULL),
(514, 'normal_user', 'aa', NULL, 'a@b', '1478523697', '$2y$10$kV/.9aND19ex.eA2I.0Zl.KeD3rq6J9a7uRPqFJP0JmRbC9rVKD.O', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 09:44:23', '2022-06-13 09:44:23', NULL, NULL, NULL, NULL, NULL),
(519, 'normal_user', 'neha', '', 'neha12@gmail.com', '2345672457', '$2y$10$1d4gJI4dAyoZ6jya6HquHOmiH7wZx21Q2ahUWQnhdA.19vEbJGbIq', 2, 0, 0, 'TWJScU94akNiZElNOTRmWWVzOFp3dz09', '', 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1655121774.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, '0', '0', '0', 'BTTKop', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:02:54', '2022-06-13 12:02:54', NULL, NULL, NULL, NULL, NULL),
(520, 'normal_user', 'neha', '', 'neha124@gmail.com', '2345672458', '$2y$10$jys4q9c6XXkO6pJu2QJ3PenltaVx0tDsIoTHKub59q7efFc8spNJG', 2, 0, 0, 'd05TU0ZnN2QvSkJYUXBoa0kwWEY3QT09', '', 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1655121830.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, '0', '0', '0', 'hLT6MU', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:03:50', '2022-06-13 12:03:50', NULL, NULL, NULL, NULL, NULL),
(521, 'normal_user', 'neha', '', 'neha1245@gmail.com', '2345672459', '$2y$10$laZj8yygtMEq8VSk3JyEd.1ZvzRlNmRXfnxsWNdL7NysKjkArJYeq', 2, 0, 0, 'ZmljU2JRSWRCbWZQNHFzYVpkMEx5UT09', '', 0, 'http://votivelaravel.in/roadNstays/public/uploads/profile_image/1655122047.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, '0', '0', '0', '0E8gyr', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:07:27', '2022-06-13 12:07:27', NULL, NULL, NULL, NULL, NULL),
(526, 'service_provider', 'fnsp', NULL, 'fnsp@gmail.com', '3698745214', '$2y$10$EnMEc9owGPETLiE0qw5uYOIrVcVClqaFSmCatDH0KKhFpiWhdF6fW', 4, 1, 0, 'YWMvcjRGTktlSGVyZlVJaUlTNUxVZz09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'rnt road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'Bh31KZ', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13 12:52:48', '2022-06-13 12:53:19', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$Rm5FC2i6utcbScNomUg2mO0PzaoOYZ.ni5z4Zd1/9T5.Qs3I/1eiO', NULL, '2022-05-19 05:56:14', '2022-05-19 05:56:14'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$2m7C0Bp9Usm9up6wZU.ee.jU9lsLFHJvzAcNQ2d7iWHZuwe/buZ1K', NULL, '2022-05-19 01:13:31', '2022-05-19 01:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Vendor', 'vendor@gmail.com', NULL, '$2y$10$Fx3agFuck9jKNbH9FQyMTet9bMhW60ta18O.J0E1/hed.g79mA0jC', NULL, '2022-05-19 01:44:25', '2022-05-19 01:44:25');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `breakfast_type`
--
ALTER TABLE `breakfast_type`
  ADD PRIMARY KEY (`bfast_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotels_facility_amenities`
--
ALTER TABLE `hotels_facility_amenities`
  ADD PRIMARY KEY (`hotel_amenity_id`);

--
-- Indexes for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_types`
--
ALTER TABLE `hotel_types`
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
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities_type`
--
ALTER TABLE `amenities_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `breakfast_type`
--
ALTER TABLE `breakfast_type`
  MODIFY `bfast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `H1_Hotel_and_other_Stays`
--
ALTER TABLE `H1_Hotel_and_other_Stays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `H2_Amenities`
--
ALTER TABLE `H2_Amenities`
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `H3_Services`
--
ALTER TABLE `H3_Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `hotels_facility_amenities`
--
ALTER TABLE `hotels_facility_amenities`
  MODIFY `hotel_amenity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_gallery`
--
ALTER TABLE `room_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_name_list`
--
ALTER TABLE `room_name_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `room_others_features`
--
ALTER TABLE `room_others_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `room_type_categories`
--
ALTER TABLE `room_type_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_video`
--
ALTER TABLE `room_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
