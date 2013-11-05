-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2012 at 07:57 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `id` int(50) NOT NULL,
  `photo` varchar(10) DEFAULT NULL,
  `application_no` varchar(10) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `enrollment` varchar(10) DEFAULT NULL,
  `how_did_u_heard_abt_school` varchar(10) DEFAULT NULL,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  `middle_name` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `nationality` varchar(10) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `caste` varchar(10) DEFAULT NULL,
  `community` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `mother_tongue` varchar(10) DEFAULT NULL,
  `lang_speak_at_home` varchar(10) DEFAULT NULL,
  `father_name` varchar(10) DEFAULT NULL,
  `mobile_phone` varchar(10) DEFAULT NULL,
  `work_phone` varchar(10) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL,
  `employer` varchar(10) DEFAULT NULL,
  `occupation` varchar(10) DEFAULT NULL,
  `annual_income` varchar(10) DEFAULT NULL,
  `mother_name` varchar(10) DEFAULT NULL,
  `mmobile_phone` varchar(10) DEFAULT NULL,
  `mwork_phone` varchar(10) DEFAULT NULL,
  `memail` varchar(10) DEFAULT NULL,
  `memployer` varchar(10) DEFAULT NULL,
  `moccupation` varchar(10) DEFAULT NULL,
  `mannual_income` varchar(10) DEFAULT NULL,
  `home_address` varchar(10) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `home_phone` varchar(10) DEFAULT NULL,
  `landmark` varchar(10) DEFAULT NULL,
  `doctors_name` varchar(10) DEFAULT NULL,
  `dphone` varchar(10) DEFAULT NULL,
  `dmobile` varchar(10) DEFAULT NULL,
  `doctors_address` varchar(10) DEFAULT NULL,
  `branch_id` int(50) NOT NULL,
  `date_timestamp` date NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission`
--


-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE IF NOT EXISTS `education_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name_or_degree` varchar(150) DEFAULT NULL,
  `mark_or_grade` varchar(45) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `photo_copy_image` varchar(350) DEFAULT NULL,
  `is_given` char(1) DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `year_completed` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `education_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `perm_address_id` int(11) DEFAULT NULL,
  `present_address_id` int(11) DEFAULT NULL,
  `education_details_id` int(11) DEFAULT NULL,
  `experience_details_id` int(11) DEFAULT NULL,
  `date_of_employment` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `last_paid_salary` float DEFAULT NULL,
  `employment_type_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `salary_details_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `application_no` varchar(45) DEFAULT NULL,
  `employee_no` varchar(45) DEFAULT NULL,
  `signature_image` varchar(150) DEFAULT NULL,
  `reference_details_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_user_id` (`user_id`),
  KEY `fk_employee_experience_id` (`experience_details_id`),
  KEY `fk_education_details_id` (`education_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `experence_details`
--

CREATE TABLE IF NOT EXISTS `experence_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `supervisor_name` varchar(45) DEFAULT NULL,
  `reason_for_leaving` varchar(45) DEFAULT NULL,
  `reference_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `experence_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(50) NOT NULL,
  `class` int(50) NOT NULL,
  `students` int(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `chellan_no` varchar(50) NOT NULL,
  `pay` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `date_timestamp` date NOT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class`),
  KEY `students` (`students`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_name` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_name_UNIQUE` (`login_name`),
  KEY `fk_login_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `login_name`, `password`, `last_updated`, `is_active`) VALUES
(1, 1, 'admin', '0192023a7bbd73250516f069df18b500', '2011-12-31 20:30:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maddress`
--

CREATE TABLE IF NOT EXISTS `maddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(500) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `reference_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_state_id` (`state`),
  KEY `fk_address_country_id` (`country`),
  KEY `fk_address_city_id` (`city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `maddress`
--


-- --------------------------------------------------------

--
-- Table structure for table `mcity`
--

CREATE TABLE IF NOT EXISTS `mcity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(150) DEFAULT NULL,
  `city_code` varchar(45) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mcity`
--


-- --------------------------------------------------------

--
-- Table structure for table `mclass`
--

CREATE TABLE IF NOT EXISTS `mclass` (
  `id` int(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mclass`
--

INSERT INTO `mclass` (`id`, `class`, `group`, `status`) VALUES
(1, 'PreKG', '1', '1'),
(2, 'LKG', '1', '1'),
(3, 'UKG', '1', '1'),
(4, 'STD 1', '1', '1'),
(5, 'STD 2', '1', '1'),
(6, 'STD 3', '1', '1'),
(7, 'STD 4', '1', '1'),
(8, 'STD 5', '1', '1'),
(9, 'STD 6', '1', '1'),
(10, 'STD 7', '1', '1'),
(11, 'STD 8', '1', '1'),
(12, 'STD 9', '1', '1'),
(13, 'STD 10', '1', '1'),
(14, 'STD 11', '1', '1'),
(15, 'STD 12', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mcompany`
--

CREATE TABLE IF NOT EXISTS `mcompany` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) DEFAULT NULL,
  `company_code` varchar(150) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `parent_company` int(11) DEFAULT '0',
  `factory_address_id` int(11) DEFAULT NULL,
  `office_address_id` int(11) DEFAULT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `company_currency` int(11) DEFAULT NULL,
  `website` varchar(75) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `phone1` varchar(45) DEFAULT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `phone3` varchar(45) DEFAULT NULL,
  `phone4` varchar(45) DEFAULT NULL,
  `phone5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mcompany`
--

INSERT INTO `mcompany` (`id`, `company_name`, `company_code`, `branch_name`, `parent_company`, `factory_address_id`, `office_address_id`, `company_logo`, `company_currency`, `website`, `tax_id`, `phone1`, `phone2`, `phone3`, `phone4`, `phone5`) VALUES
(1, 'Geotekh', 'Gt', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcountry`
--

CREATE TABLE IF NOT EXISTS `mcountry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  `country_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=244 ;

--
-- Dumping data for table `mcountry`
--

INSERT INTO `mcountry` (`id`, `country_name`, `country_code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Aland Islands', 'AX'),
(3, 'Albania', 'AL'),
(4, 'Algeria', 'DZ'),
(5, 'American Samoa', 'AS'),
(6, 'Andorra', 'AD'),
(7, 'Angola', 'AO'),
(8, 'Anguilla', 'AI'),
(9, 'Antarctica', 'AQ'),
(10, 'Antigua And Barbuda', 'AG'),
(11, 'Argentina', 'AR'),
(12, 'Armenia', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Australia', 'AU'),
(15, 'Austria', 'AT'),
(16, 'Azerbaijan', 'AZ'),
(17, 'Bahamas', 'BS'),
(18, 'Bahrain', 'BH'),
(19, 'Bangladesh', 'BD'),
(20, 'Barbados', 'BB'),
(21, 'Belarus', 'BY'),
(22, 'Belgium', 'BE'),
(23, 'Belize', 'BZ'),
(24, 'Benin', 'BJ'),
(25, 'Bermuda', 'BM'),
(26, 'Bhutan', 'BT'),
(27, 'Bolivia', 'BO'),
(28, 'Bosnia And Herzegovina', 'BA'),
(29, 'Botswana', 'BW'),
(30, 'Bouvet Island', 'BV'),
(31, 'Brazil', 'BR'),
(32, 'British Indian Ocean Territory', 'IO'),
(33, 'Brunei Darussalam', 'BN'),
(34, 'Bulgaria', 'BG'),
(35, 'Burkina Faso', 'BF'),
(36, 'Burundi', 'BI'),
(37, 'Cambodia', 'KH'),
(38, 'Cameroon', 'CM'),
(39, 'Canada', 'CA'),
(40, 'Cape Verde', 'CV'),
(41, 'Cayman Islands', 'KY'),
(42, 'Central African Republic', 'CF'),
(43, 'Chad', 'TD'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Christmas Island', 'CX'),
(47, 'Cocos (Keeling) Islands', 'CC'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Congo', 'CG'),
(51, 'Congo, The Democratic Republic Of The', 'CD'),
(52, 'Cook Islands', 'CK'),
(53, 'Costa Rica', 'CR'),
(54, 'Cote D''Ivoire', 'CI'),
(55, 'Croatia', 'HR'),
(56, 'Cuba', 'CU'),
(57, 'Cyprus', 'CY'),
(58, 'Czech Republic', 'CZ'),
(59, 'Denmark', 'DK'),
(60, 'Djibouti', 'DJ'),
(61, 'Dominica', 'DM'),
(62, 'Dominican Republic', 'DO'),
(63, 'Ecuador', 'EC'),
(64, 'Egypt', 'EG'),
(65, 'El Salvador', 'SV'),
(66, 'Equatorial Guinea', 'GQ'),
(67, 'Eritrea', 'ER'),
(68, 'Estonia', 'EE'),
(69, 'Ethiopia', 'ET'),
(70, 'Falkland Islands (Malvinas)', 'FK'),
(71, 'Faroe Islands', 'FO'),
(72, 'Fiji', 'FJ'),
(73, 'Finland', 'FI'),
(74, 'France', 'FR'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guernsey', ' GG'),
(91, 'Guinea', 'GN'),
(92, 'Guinea-Bissau', 'GW'),
(93, 'Guyana', 'GY'),
(94, 'Haiti', 'HT'),
(95, 'Heard Island And Mcdonald Islands', 'HM'),
(96, 'Holy See (Vatican City State)', 'VA'),
(97, 'Honduras', 'HN'),
(98, 'Hong Kong', 'HK'),
(99, 'Hungary', 'HU'),
(100, 'Iceland', 'IS'),
(101, 'India', 'IN'),
(102, 'Indonesia', 'ID'),
(103, 'Iran, Islamic Republic Of', 'IR'),
(104, 'Iraq', 'IQ'),
(105, 'Ireland', 'IE'),
(106, 'Isle Of Man', 'IM'),
(107, 'Israel', 'IL'),
(108, 'Italy', 'IT'),
(109, 'Jamaica', 'JM'),
(110, 'Japan', 'JP'),
(111, 'Jersey', 'JE'),
(112, 'Jordan', 'JO'),
(113, 'Kazakhstan', 'KZ'),
(114, 'Kenya', 'KE'),
(115, 'Kiribati', 'KI'),
(116, 'Korea, Democratic People''S Republic Of', 'KP'),
(117, 'Korea, Republic Of', 'KR'),
(118, 'Kuwait', 'KW'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Lao People''S Democratic Republic', 'LA'),
(121, 'Latvia', 'LV'),
(122, 'Lebanon', 'LB'),
(123, 'Lesotho', 'LS'),
(124, 'Liberia', 'LR'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macao', 'MO'),
(130, 'Macedonia, The Former Yugoslav Republic Of', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Marshall Islands', 'MH'),
(138, 'Martinique', 'MQ'),
(139, 'Mauritania', 'MR'),
(140, 'Mauritius', 'MU'),
(141, 'Mayotte', 'YT'),
(142, 'Mexico', 'MX'),
(143, 'Micronesia, Federated States Of', 'FM'),
(144, 'Moldova, Republic Of', 'MD'),
(145, 'Monaco', 'MC'),
(146, 'Mongolia', 'MN'),
(147, 'Montserrat', 'MS'),
(148, 'Morocco', 'MA'),
(149, 'Mozambique', 'MZ'),
(150, 'Myanmar', 'MM'),
(151, 'Namibia', 'NA'),
(152, 'Nauru', 'NR'),
(153, 'Nepal', 'NP'),
(154, 'Netherlands', 'NL'),
(155, 'Netherlands Antilles', 'AN'),
(156, 'New Caledonia', 'NC'),
(157, 'New Zealand', 'NZ'),
(158, 'Nicaragua', 'NI'),
(159, 'Niger', 'NE'),
(160, 'Nigeria', 'NG'),
(161, 'Niue', 'NU'),
(162, 'Norfolk Island', 'NF'),
(163, 'Northern Mariana Islands', 'MP'),
(164, 'Norway', 'NO'),
(165, 'Oman', 'OM'),
(166, 'Pakistan', 'PK'),
(167, 'Palau', 'PW'),
(168, 'Palestinian Territory, Occupied', 'PS'),
(169, 'Panama', 'PA'),
(170, 'Papua New Guinea', 'PG'),
(171, 'Paraguay', 'PY'),
(172, 'Peru', 'PE'),
(173, 'Philippines', 'PH'),
(174, 'Pitcairn', 'PN'),
(175, 'Poland', 'PL'),
(176, 'Portugal', 'PT'),
(177, 'Puerto Rico', 'PR'),
(178, 'Qatar', 'QA'),
(179, 'Reunion', 'RE'),
(180, 'Romania', 'RO'),
(181, 'Russian Federation', 'RU'),
(182, 'Rwanda', 'RW'),
(183, 'Saint Helena', 'SH'),
(184, 'Saint Kitts And Nevis', 'KN'),
(185, 'Saint Lucia', 'LC'),
(186, 'Saint Pierre And Miquelon', 'PM'),
(187, 'Saint Vincent And The Grenadines', 'VC'),
(188, 'Samoa', 'WS'),
(189, 'San Marino', 'SM'),
(190, 'Sao Tome And Principe', 'ST'),
(191, 'Saudi Arabia', 'SA'),
(192, 'Senegal', 'SN'),
(193, 'Serbia And Montenegro', 'CS'),
(194, 'Seychelles', 'SC'),
(195, 'Sierra Leone', 'SL'),
(196, 'Singapore', 'SG'),
(197, 'Slovakia', 'SK'),
(198, 'Slovenia', 'SI'),
(199, 'Solomon Islands', 'SB'),
(200, 'Somalia', 'SO'),
(201, 'South Africa', 'ZA'),
(202, 'South Georgia And The South Sandwich Islands', 'GS'),
(203, 'Spain', 'ES'),
(204, 'Sri Lanka', 'LK'),
(205, 'Sudan', 'SD'),
(206, 'Suriname', 'SR'),
(207, 'Svalbard And Jan Mayen', 'SJ'),
(208, 'Swaziland', 'SZ'),
(209, 'Sweden', 'SE'),
(210, 'Switzerland', 'CH'),
(211, 'Syrian Arab Republic', 'SY'),
(212, 'Taiwan, Province Of China', 'TW'),
(213, 'Tajikistan', 'TJ'),
(214, 'Tanzania, United Republic Of', 'TZ'),
(215, 'Thailand', 'TH'),
(216, 'Timor-Leste', 'TL'),
(217, 'Togo', 'TG'),
(218, 'Tokelau', 'TK'),
(219, 'Tonga', 'TO'),
(220, 'Trinidad And Tobago', 'TT'),
(221, 'Tunisia', 'TN'),
(222, 'Turkey', 'TR'),
(223, 'Turkmenistan', 'TM'),
(224, 'Turks And Caicos Islands', 'TC'),
(225, 'Tuvalu', 'TV'),
(226, 'Uganda', 'UG'),
(227, 'Ukraine', 'UA'),
(228, 'United Arab Emirates', 'AE'),
(229, 'United Kingdom', 'GB'),
(230, 'United States', 'US'),
(231, 'United States Minor Outlying Islands', 'UM'),
(232, 'Uruguay', 'UY'),
(233, 'Uzbekistan', 'UZ'),
(234, 'Vanuatu', 'VU'),
(235, 'Venezuela', 'VE'),
(236, 'Viet Nam', 'VN'),
(237, 'Virgin Islands, British', 'VG'),
(238, 'Virgin Islands, U.S.', 'VI'),
(239, 'Wallis And Futuna', 'WF'),
(240, 'Western Sahara', 'EH'),
(241, 'Yemen', 'YE'),
(242, 'Zambia', 'ZM'),
(243, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `display_icon` varchar(255) DEFAULT NULL,
  `access_key` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `url`, `display_icon`, `access_key`, `parent`, `status`) VALUES
(1, 'Dashboard', '#', NULL, NULL, 0, NULL),
(2, 'Academics', '#', '', '', 0, 0),
(3, 'Pre-Admission', 'index.php?file=pre_admission&action=add', '', '', 2, 0),
(4, 'Admission', 'index.php?file=admission&action=add', '', '', 2, 0),
(5, 'Fees', 'index.php?file=fees&action=add', '', '', 2, 0),
(6, 'Curriculum', 'index.php?file=curriculum&action=add', '', '', 2, 0),
(7, 'Health', 'index.php?file=health&action=add', '', '', 2, 0),
(8, 'Student', 'index.php?file=student&action=add', '', '', 2, 0),
(9, 'Activites', 'index.php?file=activities&action=add', '', '', 2, 0),
(10, 'Non-Academics', '#', '', '', 0, 0),
(11, 'Staff', 'index.php?file=staff&action=add', '', '', 10, 0),
(12, 'Time-Table', 'index.php?file=timetable&action=add', '', '', 10, 0),
(13, 'Memo', 'index.php?file=memo&action=add', '', '', 10, 0),
(18, 'Admin', '#', NULL, NULL, 0, NULL),
(19, 'class', 'index.php?file=mclass', NULL, NULL, 18, NULL),
(49, 'view', 'index.php?file=mclass&action=view&id=1', NULL, NULL, 19, NULL),
(50, 'add', 'index.php?file=mclass&action=add', NULL, NULL, 19, NULL),
(51, 'edit', 'index.php?file=mclass&action=edit&id=1', NULL, NULL, 19, NULL),
(20, 'subjects', '#', NULL, NULL, 18, NULL),
(52, 'view', 'index.php?file=msubjects&action=view&id=1', NULL, NULL, 20, NULL),
(53, 'add', 'index.php?file=msubject&action=add', NULL, NULL, 20, NULL),
(54, 'edit', 'index.php?file=msubject&action=edit&id=1', NULL, NULL, 20, NULL),
(21, 'fees', 'index.php?file=mfees', NULL, NULL, 18, NULL),
(55, 'view', 'index.php?file=mfees&action=view&id=1', NULL, NULL, 21, NULL),
(56, 'add', 'index.php?file=mfees&action=add', NULL, NULL, 21, NULL),
(57, 'edit', 'index.php?file=mfees&action=edit&id=1', NULL, NULL, 21, NULL),
(22, 'city', 'index.php?file=mcity', NULL, NULL, 18, NULL),
(58, 'view', 'index.php?file=mcity&action=view&id=1', NULL, NULL, 22, NULL),
(59, 'add', 'index.php?file=mcity&action=add', NULL, NULL, 22, NULL),
(60, 'edit', 'index.php?file=mcity&action=edit&id=1', NULL, NULL, 22, NULL),
(23, 'state', 'index.php?file=mstate', NULL, NULL, 18, NULL),
(61, 'view', 'index.php?file=mstate&action=view&id=1', NULL, NULL, 23, NULL),
(62, 'add', 'index.php?file=mstate&action=add', NULL, NULL, 23, NULL),
(63, 'edit', 'index.php?file=mstate&action=edit&id=1', NULL, NULL, 23, NULL),
(24, 'country', 'index.php?file=mcountry', NULL, NULL, 18, NULL),
(64, 'view', 'index.php?file=mcountry&action=view&id=1', NULL, NULL, 24, NULL),
(65, 'add', 'index.php?file=mcountry&action=add', NULL, NULL, 24, NULL),
(66, 'edit', 'index.php?file=mcountry&action=edit&id=1', NULL, NULL, 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mfees`
--

CREATE TABLE IF NOT EXISTS `mfees` (
  `id` int(11) NOT NULL,
  `admission_fees` int(11) NOT NULL,
  `material_fees` int(11) NOT NULL,
  `refundable_fees` int(11) NOT NULL,
  `extra_curricular` int(11) NOT NULL,
  `term_1` int(11) NOT NULL,
  `term_2` int(11) NOT NULL,
  `term_3` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date_timestamp` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfees`
--


-- --------------------------------------------------------

--
-- Table structure for table `mstate`
--

CREATE TABLE IF NOT EXISTS `mstate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(45) DEFAULT NULL,
  `state_name` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `mstate`
--

INSERT INTO `mstate` (`id`, `state_code`, `state_name`, `country_id`) VALUES
(1, 'AP', 'Andhra Pradesh', 101),
(2, 'AR', 'Arunachal Pradesh', 101),
(3, 'AS', 'Assam', 101),
(4, 'BR', 'Bihar', 101),
(5, 'CG', 'Chhattisgarh', 101),
(6, 'GA', 'Goa', 101),
(7, 'GJ', 'Gujarat', 101),
(8, 'HR', 'Haryana', 101),
(9, 'HP', 'Himachal Pradesh', 101),
(10, 'JK', 'Jammu & Kashmir', 101),
(11, 'JH', 'Jharkhand', 101),
(12, 'KA', 'Karnataka', 101),
(13, 'KL', 'Kerala', 101),
(14, 'MP', 'Madhya Pradesh', 101),
(15, 'MH', 'Maharashtra', 101),
(16, 'MN', 'Manipur', 101),
(17, 'ML', 'Meghalaya', 101),
(18, 'MZ', 'Mizoram', 101),
(19, 'NL', 'Nagaland', 101),
(20, 'OR', 'Orissa', 101),
(21, 'PB', 'Punjab', 101),
(22, 'RJ', 'Rajasthan', 101),
(23, 'SK', 'Sikkim', 101),
(24, 'TN', 'Tamil Nadu', 101),
(25, 'TR', 'Tripura', 101),
(26, 'UK', 'Uttarakhand', 101),
(27, 'UP', 'Uttar Pradesh', 101),
(28, 'WB', 'West Bengal', 101);

-- --------------------------------------------------------

--
-- Table structure for table `pre_admission`
--

CREATE TABLE IF NOT EXISTS `pre_admission` (
  `id` int(50) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_date_of_birth` date NOT NULL,
  `class_to_be_admitted` int(50) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_returning` date NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `date_of_pre_screening` date NOT NULL,
  `time_of_pre_screening` date NOT NULL,
  `principal_remarks` varchar(100) NOT NULL,
  `screening_date_time` date NOT NULL,
  `admission_confirmed` binary(50) NOT NULL,
  `branch_id` int(100) NOT NULL,
  `date_timestamp` date NOT NULL,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_to_be_admitted` (`class_to_be_admitted`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_admission`
--


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(150) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_cparent_id` (`parent_id`),
  KEY `fk_student_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `students`
--


-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(45) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `enrollment` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `landmark1` varchar(150) DEFAULT NULL,
  `landmark2` varchar(150) DEFAULT NULL,
  `pickup` varchar(150) DEFAULT NULL,
  `drop_point` varchar(150) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL,
  `total_km` int(11) DEFAULT NULL,
  `pickup_km` int(11) DEFAULT NULL,
  `drop_km` int(11) DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `remarks` varchar(45) DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `drop_time` time DEFAULT NULL,
  `application_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transportation`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `work_phone` varchar(45) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `photo` varchar(550) DEFAULT NULL,
  `is_physically_challenged` char(1) NOT NULL,
  `physically_challanged_remarks` varchar(2500) DEFAULT NULL,
  `sex` char(1) NOT NULL,
  `user_type` int(11) NOT NULL,
  `father_spouse_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_details_company_id` (`organization_id`),
  KEY `fk_user_details_address_id` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `mobile`, `work_phone`, `address_id`, `organization_id`, `blood_group`, `photo`, `is_physically_challenged`, `physically_challanged_remarks`, `sex`, `user_type`, `father_spouse_name`) VALUES
(1, 'Sundar', 'G', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_details`
--

CREATE TABLE IF NOT EXISTS `user_menu_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `user_menu_details`
--

INSERT INTO `user_menu_details` (`id`, `user_id`, `menu_id`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 9),
(11, 1, 10),
(12, 1, 11),
(13, 1, 12),
(14, 1, 13),
(15, 1, 14),
(16, 1, 15),
(17, 1, 16),
(18, 1, 17),
(19, 1, 18),
(20, 1, 19),
(21, 1, 20),
(22, 1, 21),
(23, 1, 22),
(24, 1, 23),
(25, 1, 24),
(26, 1, 25),
(27, 1, 26),
(28, 1, 27),
(29, 1, 28),
(30, 1, 29),
(31, 1, 30),
(32, 1, 31),
(33, 1, 32),
(34, 1, 33),
(35, 1, 34),
(36, 1, 35),
(37, 1, 36),
(38, 1, 37),
(39, 1, 38),
(40, 1, 39),
(41, 1, 40),
(42, 1, 41),
(43, 1, 42),
(44, 1, 43),
(45, 1, 44),
(46, 1, 45),
(47, 1, 46),
(48, 1, 47),
(49, 1, 48),
(50, 1, 49),
(51, 1, 50),
(52, 1, 51),
(53, 1, 52),
(54, 1, 53),
(55, 1, 54),
(56, 1, 55),
(57, 1, 56),
(58, 1, 57),
(59, 1, 58),
(60, 1, 59),
(61, 1, 60),
(62, 1, 61),
(63, 1, 62),
(64, 1, 63),
(65, 1, 64),
(66, 1, 65),
(67, 1, 66);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_education_details_id` FOREIGN KEY (`education_details_id`) REFERENCES `education_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_experience_id` FOREIGN KEY (`experience_details_id`) REFERENCES `experence_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`class`) REFERENCES `mclass` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mstate`
--
ALTER TABLE `mstate`
  ADD CONSTRAINT `mstate_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `mcountry` (`id`);

--
-- Constraints for table `pre_admission`
--
ALTER TABLE `pre_admission`
  ADD CONSTRAINT `pre_admission_ibfk_1` FOREIGN KEY (`class_to_be_admitted`) REFERENCES `mclass` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student_cparent_id` FOREIGN KEY (`parent_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `fk_user_details_address_id` FOREIGN KEY (`address_id`) REFERENCES `maddress` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_details_company_id` FOREIGN KEY (`organization_id`) REFERENCES `mcompany` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
