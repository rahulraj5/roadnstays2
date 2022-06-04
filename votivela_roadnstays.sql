-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2022 at 05:29 AM
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
(13, 'Lodge', 'Private home with accommodation surrounded by nature, such as mountains or forest.', 1, '2022-06-01 10:14:02', '2022-06-03 09:31:23');

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
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `H2_Amenities`
--

INSERT INTO `H2_Amenities` (`amenity_id`, `amenity_name`, `amenity_type`, `amenity_type_name`, `amenity_type_sym`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Clothes rack', 1, 'Room Amenities', 'Room_Amenities', 1, '2022-06-02 06:51:37', NULL),
(8, 'Toilet paper', 2, 'Bathroom', 'Bathroom', 1, '2022-06-02 06:52:19', NULL),
(9, 'Computer', 3, 'Media and Technology', 'Media_and_Technology', 1, '2022-06-02 06:52:33', NULL),
(10, 'Dining area', 4, 'Food & drink', 'Food_&_drink', 1, '2022-06-02 06:55:43', NULL),
(11, 'Dining table', 4, 'Food & drink', 'Food_&_drink', 1, '2022-06-02 06:55:55', NULL),
(12, 'Balcony', 5, 'Outdoor and view', 'Outdoor_and_view', 1, '2022-06-02 06:56:13', NULL),
(13, 'Patio', 5, 'Outdoor and view', 'Outdoor_and_view', 1, '2022-06-02 06:56:37', NULL),
(14, 'Room is situated on the ground floor', 6, 'Accessibility', 'Accessibility', 1, '2022-06-02 06:56:50', NULL),
(15, 'Room is entirely wheelchair accessible', 6, 'Accessibility', 'Accessibility', 1, '2022-06-02 06:58:23', NULL),
(16, 'Baby safety gates', 7, 'Entertainment and family services', 'Entertainment_and_family_services', 1, '2022-06-02 06:58:56', NULL),
(17, 'Board games/puzzles', 7, 'Entertainment and family services', 'Entertainment_and_family_services', 1, '2022-06-02 07:00:41', NULL),
(18, 'Executive lounge access', 8, 'Services & extras', 'Services_&_extras', 1, '2022-06-02 07:11:05', NULL),
(19, 'Alarm clock', 8, 'Services & extras', 'Services_&_extras', 1, '2022-06-02 07:11:13', NULL),
(20, 'giving breaking news on mobile', 3, 'Media and Technology', 'Media_and_Technology', 1, '2022-06-03 07:01:34', NULL),
(21, 'multiplex', 7, 'Entertainment and family services', 'Entertainment_and_family_services', 1, '2022-06-03 07:22:51', NULL),
(22, 'freshner', 1, 'Room Amenities', 'Room_Amenities', 1, '2022-06-03 08:22:12', NULL),
(23, 'detergent', 2, 'Bathroom', 'Bathroom', 1, '2022-06-03 09:35:31', NULL);

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
  `min_day_before_book` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `hotel_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_gallery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_option` int(11) DEFAULT NULL,
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
  `stay_price` int(11) DEFAULT NULL,
  `extra_price_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_price` int(11) DEFAULT NULL,
  `extra_price_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_fee_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_fee` int(11) DEFAULT NULL,
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
  `hotel_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_user_id`, `is_admin`, `hotel_name`, `hotel_content`, `property_contact_name`, `property_contact_num`, `property_alternate_num`, `cat_listed_room_type`, `where_property_listed`, `do_you_multiple_hotel`, `hotel_rating`, `scout_id`, `checkin_time`, `checkout_time`, `min_day_before_book`, `min_day_stays`, `hotel_video`, `hotel_gallery`, `hotel_document`, `hotel_notes`, `booking_option`, `hotel_address`, `hotel_latitude`, `hotel_longitude`, `hotel_city`, `neighb_area`, `hotel_country`, `attraction_name`, `attraction_content`, `attraction_distance`, `attraction_type`, `stay_price`, `extra_price_name`, `extra_price`, `extra_price_type`, `service_fee_name`, `service_fee`, `service_fee_type`, `property_type`, `entertain_family_service`, `extra_service`, `room_amenities`, `bathroom_amenities`, `media_tech_amenities`, `food_drink_amenities`, `outdoor_view_amenities`, `accessibility_amenities`, `entertain_family_amenities`, `extra_service_amenities`, `hotel_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Lemon Tree', 'lemon tree hotel content description<!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->', 'Rahulraj', '212324564', '21321313', 3, 0, 1, 3, 1231321, '3:26 PM', '3:26 AM', 5, 15, 'SampleVideo_1280x720_1mb-1654170860.mp4', '7-1654170860.jpg', '7-1654170860.jpg', '7-1654170860.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-02 11:54:20', '2022-06-02 11:54:20'),
(2, 1, 1, 'Redision', 'hotel description<!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->', 'Rahulraj', '123456789', NULL, 10, 1, 1, 4, 436, '3:34 PM', '3:34 AM', 5, 15, 'SampleVideo_1280x720_1mb-1654250709.mp4', 'food-1653562618-1654250709.png', 'cab_reports2022_05_11_2022_05_20-1654250709.csv', 'cab_reports2022_05_11_2022_05_20-1654250709.csv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-06-03 10:05:09', '2022-06-03 10:05:09'),
(6, 1, 1, 'Hotel Palash', 'hotel description content<!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->', 'Swayam', '0942509549', NULL, 11, 1, 1, 3, 436, '10:19 AM', '10:19 PM', 5, 15, '', 'user1-1653644740-1654318310.jpg', 'cab_reports2022_05_11_2022_05_20-1654318310.csv', 'cab_reports2022_05_11_2022_05_20-1654318310.csv', 1, 'Rajendra Nagar', '12312.11', '1212.121', 'indore', 'sdfasdf', '99', 'abcd', 'ashdfkjh', 'sdkfsd', 'sdfsdf', 10000, 'rafg', 232, 'sdsd', 'ertre', 2300, 'sdfsd', '11', '[null,\"1\",\"2\",\"3\",\"4\"]', '[\"5\",\"6\",\"7\",\"8\",\"9\"]', '[\"22\"]', '[\"23\"]', '[\"20\"]', '[\"11\"]', '[\"13\"]', '[\"14\",\"15\"]', '[\"16\",\"17\",\"21\"]', '[\"18\",\"19\"]', 1, '2022-06-04 04:51:50', '2022-06-04 04:51:50');

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
('votivetester.saurabh@gmail.com', 'D8XRIcuJEczrsu93n5Cj480yteDwBhB4PIYVtJnovbhqC0jOSQzv0Q8NutJE3Chz', '2022-06-03 12:09:53');

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
(336, 'service_provider', 'service', 'provider', 'rahulservpro@gmail.com', '345345345', '$2y$10$J6btJfRDY8Sdb0AOmOG9v./KYFc1fyyv7IsjCIktWyvOc8MfWmBHy', 4, 1, 0, 'YVVyZGE4Rm8wY2FPWnN3Q2oyd09mUT09', NULL, 0, 'user1-1653644740-1653645711.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 'bsbsb', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'kK40jc', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-25 11:41:12', '2022-05-28 07:07:04', NULL, NULL, NULL, NULL, NULL),
(346, 'normal_user', 'rahul solanki', NULL, 'user@gmail.com', '0942509544', '$2y$10$5IQEE45OY6zKgN2qtkhmaeIFs05o4A6kU0RIsUc.9ZajkdTGVRbCO', 2, 0, 0, NULL, NULL, 0, 'user1-1653644740-1653972327.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India', 'Madhya Pradesh', 'Indore', 452001, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 08:22:09', '2022-05-28 06:53:05', NULL, NULL, NULL, NULL, NULL),
(347, 'normal_user', 'vivek', NULL, 'vivek@gmail.com', '1234577899', '$2y$10$cfKorP8.CE6arkxNyVFFouHvKLpYIuWSBN7wpdvc6Az7K8XIxlJTi', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 'indore', NULL, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:10:02', '2022-05-28 06:56:21', NULL, NULL, NULL, NULL, NULL),
(348, 'normal_user', 'viveksd', NULL, 'vevie@gmail.com', '1231324562', '$2y$10$ljLea3bBvsYVpWH3xfE4DeGZKkgPW8tO8/wWe7tDy4apdzhWGm7Qq', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 13:11:22', '2022-05-26 07:41:22', NULL, NULL, NULL, NULL, NULL),
(349, 'normal_user', 'asdfsd asdasd', NULL, 'asdfg@gmail.com', '4456121324', '$2y$10$VRVzb4wqGtxCBEEDV5qVBeH2gsgoV3mBVOnfopaGOD3LP9RNQDoeS', 2, 0, 0, NULL, NULL, 0, 'user-1653640891-1653645830.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:03:26', '2022-05-27 10:03:26', NULL, NULL, NULL, NULL, NULL),
(350, 'service_provider', 'Pushpendra Jha', NULL, 'votivephppushpendra@gmail.com', '9179004123', '$2y$10$iY2hG4wEJhLDnRcsMZPOFOhNphQu0hQH9sQtSmHEcafC2Z6O9lV5m', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:08:53', '2022-05-27 13:25:23', NULL, NULL, NULL, NULL, NULL),
(351, 'normal_user', 'nakul', NULL, 'nakulsuhane@gmail.com', '9993776088', '$2y$10$d35Lv45BGe7igztuFOUJouYWJAYjjZc3aer0CAMRHvBWRAZsQc8vO', 2, 0, 0, NULL, NULL, 0, '1649150813_fd06191f-8c6c-436c-a3af-5f2a6a17184c-1653648938.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'Indore', NULL, NULL, NULL, 'vijay nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 10:47:25', '2022-05-28 06:57:03', NULL, NULL, NULL, NULL, NULL),
(352, 'service_provider', 'Votive tech', NULL, 'votive.techs@gmail.com', '1231231234', '$2y$10$DrJ/97AfkWzYzgP66hEK5uqE67w2gmtQcWeYgJE6X1E9yd0Cyv1se', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 11:08:02', '2022-05-27 11:08:02', NULL, NULL, NULL, NULL, NULL),
(353, 'service_provider', 'new vendor', NULL, 'vendor2@gmail.com', '3131021230', '$2y$10$WiyOS7gEw5gCigyA80oscOGurqTCOnLU1F0x3Y.AOLV.9ncmqb3uO', 4, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6', NULL, 'indore', NULL, NULL, NULL, 'Rajendra Nagar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 13:26:33', '2022-05-28 07:48:22', NULL, NULL, NULL, NULL, NULL),
(354, 'normal_user', 'Muhammad Khalid', NULL, 'mkakhi@yahoo.com', '0503589372', '$2y$10$IBJySupEyRUT4rRrKx5fuOuO/kNkLvgb1PGQU1x/yquog0Nt38gT6', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 20:36:30', '2022-05-27 20:36:30', NULL, NULL, NULL, NULL, NULL),
(377, 'normal_user', 'rahul solanki', NULL, 'votivephp.rahulraj@gmail.com', '0942509544', '$2y$10$utRilVzA/OtDRrfAejbIFe3wXlrXy6.KihpZNZfELFd77rddW7gsy', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India', 'Indiana', 'Indore', 452009, NULL, NULL, 'bsbsb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-31 05:05:22', '2022-05-31 05:05:22', NULL, NULL, NULL, NULL, NULL),
(436, 'scout', 'rahulscout', NULL, 'sk@gmail.com', '9638527417', '$2y$10$G5msHPjAdRp2t0BpYPfrL.RVwJFCBskj6UzNjtoyqlM3YchrTzWXq', 3, 1, 0, 'ZDlOeVZNVDFvekNJdUVBc1NTZ1hndz09', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL, 'indore', NULL, NULL, NULL, 'mg road', NULL, NULL, NULL, NULL, NULL, 'web', NULL, NULL, NULL, NULL, NULL, 'O5Inx6', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 09:12:23', '2022-06-03 09:48:56', NULL, NULL, NULL, NULL, NULL),
(439, 'normal_user', 'Ayesha Zahid', NULL, 'ayeshazahid913@gmail.com', '0123456789', '$2y$10$DuheIwPHZNKQo.mKWGWtPu6ZBpHTTghdlurpf0gjMepPuvONV4hkK', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 13:28:20', '2022-06-03 13:28:20', NULL, NULL, NULL, NULL, NULL),
(440, 'normal_user', 'Ayesha', NULL, 'ayha00@gmail.com', '3122786074', '$2y$10$iZOQUlXqRQJogwEW.gzpSeiiKeGuGjA3WwWWBM491H2bVco9rh0v6', 2, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-03 13:40:35', '2022-06-03 13:40:35', NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `H3_Services`
--
ALTER TABLE `H3_Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotels_facility_amenities`
--
ALTER TABLE `hotels_facility_amenities`
  MODIFY `hotel_amenity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

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
