-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2021 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin@gmail.com', '123456', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `status`, `created`) VALUES
(1, 'Category1', 'a', '2021-10-18 19:38:29'),
(2, 'Category2\r\n', 'a', '2021-10-18 19:38:29'),
(3, 'Category3\r\n', 'a', '2021-10-18 19:38:29'),
(4, 'Category4\r\n', 'a', '2021-10-18 19:38:29'),
(5, 'Category5\r\n', 'a', '2021-10-18 19:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `countryName` varchar(255) NOT NULL,
  `isActive` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `CountryId`, `countryName`, `isActive`) VALUES
(1, 12, 'mm', 'y'),
(2, 361335, 'aa', 'y'),
(3, 222, 'kkk', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country_code`
--

CREATE TABLE `tbl_country_code` (
  `CountryId` int(11) NOT NULL,
  `unicode` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `countryName` varchar(50) NOT NULL,
  `Currency` varchar(30) DEFAULT NULL,
  `CurrencyCode` varchar(3) DEFAULT NULL,
  `phonecode` varchar(10) NOT NULL,
  `countryName_1` varchar(50) NOT NULL,
  `countryName_2` varchar(50) NOT NULL,
  `isAudienceCountry` enum('y','n') NOT NULL DEFAULT 'y',
  `isActive` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country_code`
--

INSERT INTO `tbl_country_code` (`CountryId`, `unicode`, `countryName`, `Currency`, `CurrencyCode`, `phonecode`, `countryName_1`, `countryName_2`, `isAudienceCountry`, `isActive`) VALUES
(1, '🇮🇳', 'India', 'Indian Rupee ', 'INR', '+91', 'India', 'India', 'y', 'y'),
(2, '🇦🇱', 'Albania', 'Lek ', 'ALL', '+355', 'Albania', 'Albania', 'y', 'y'),
(3, '🇩🇿', 'Algeria', 'Algerian Dinar ', 'DZD', '+213', 'Algeria', 'Algeria', 'y', 'y'),
(4, '🇦🇸', 'American Samoa', 'US Dollar', 'USD', '+1684', 'American Samoa', 'American Samoa', 'y', 'y'),
(5, '🇦🇩', 'Andorra', 'Euro', 'EUR', '+376', 'Andorra', 'Andorra', 'y', 'y'),
(6, '🇦🇴', 'Angola', 'Kwanza ', 'AOA', '+244', 'Angola', 'Angola', 'y', 'y'),
(7, '🇦🇮', 'Anguilla', 'East Caribbean Dollar ', 'XCD', '+1264', 'Anguilla', 'Anguilla', 'y', 'y'),
(8, '🇦🇶', 'Antarctica', '', '', '+672', 'Antarctica', 'Antarctica', 'y', 'y'),
(9, '🇦🇬', 'Antigua and Barbuda', 'East Caribbean Dollar ', 'XCD', '+1268', 'Antigua and Barbuda', 'Antigua and Barbuda', 'y', 'y'),
(10, '🇦🇷', 'Argentina', 'Argentine Peso ', 'ARS', '+54', 'Argentina', 'Argentina', 'y', 'y'),
(11, '🇦🇲', 'Armenia', 'Armenian Dram ', 'AMD', '+374', 'Armenia', 'Armenia', 'y', 'y'),
(12, '🇦🇼', 'Aruba', 'Aruban Guilder', 'AWG', '+297', 'Aruba', 'Aruba', 'y', 'y'),
(13, '', 'Ashmore and Cartier', '', '', '', 'Ashmore and Cartier', 'Ashmore and Cartier', 'y', 'n'),
(14, '🇦🇺', 'Australia', 'Australian dollar ', 'AUD', '+61', 'Australia', 'Australia', 'y', 'y'),
(15, '🇦🇹', 'Austria', 'Euro', 'EUR', '+43', 'Austria', 'Austria', 'y', 'y'),
(16, '🇦🇿', 'Azerbaijan', 'Azerbaijani Manat ', 'AZM', '+994', 'Azerbaijan', 'Azerbaijan', 'y', 'y'),
(17, '🇧🇸', 'The Bahamas', 'Bahamian Dollar ', 'BSD', '+1242', 'The Bahamas', 'The Bahamas', 'y', 'y'),
(18, '🇧🇭', 'Bahrain', 'Bahraini Dinar ', 'BHD', '+973', 'Bahrain', 'Bahrain', 'y', 'y'),
(19, '', 'Baker Island', '', '', '', 'Baker Island', 'Baker Island', 'y', 'n'),
(20, '🇧🇩', 'Bangladesh', 'Taka ', 'BDT', '+880', 'Bangladesh', 'Bangladesh', 'y', 'y'),
(21, '🇧🇧', 'Barbados', 'Barbados Dollar', 'BBD', '+1246', 'Barbados', 'Barbados', 'y', 'y'),
(22, '', 'Bassas da India', '', '', '', 'Bassas da India', 'Bassas da India', 'y', 'n'),
(23, '🇧🇾', 'Belarus', 'Belarussian Ruble', 'BYR', '+375', 'Belarus', 'Belarus', 'y', 'y'),
(24, '🇧🇪', 'Belgium', 'Euro', 'EUR', '+32', 'Belgium', 'Belgium', 'y', 'y'),
(25, '🇧🇿', 'Belize', 'Belize Dollar', 'BZD', '+501', 'Belize', 'Belize', 'y', 'y'),
(26, '🇧🇯', 'Benin', 'CFA Franc BCEAO', 'XOF', '+229', 'Benin', 'Benin', 'y', 'y'),
(27, '🇧🇲', 'Bermuda', 'Bermudian Dollar ', 'BMD', '+1441', 'Bermuda', 'Bermuda', 'y', 'y'),
(28, '🇧🇹', 'Bhutan', 'Ngultrum', 'BTN', '+975', 'Bhutan', 'Bhutan', 'y', 'y'),
(29, '🇧🇴', 'Bolivia', 'Boliviano ', 'BOB', '+591', 'Bolivia', 'Bolivia', 'y', 'y'),
(30, '🇧🇦', 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', '+387', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'y', 'y'),
(31, '🇧🇼', 'Botswana', 'Pula ', 'BWP', '+267', 'Botswana', 'Botswana', 'y', 'y'),
(32, '', 'Bouvet Island', 'Norwegian Krone ', 'NOK', '', 'Bouvet Island', 'Bouvet Island', 'y', 'n'),
(33, '🇧🇷', 'Brazil', 'Brazilian Real ', 'BRL', '+55', 'Brazil', 'Brazil', 'y', 'y'),
(34, '🇮🇴', 'British Indian Ocean Territory', 'US Dollar', 'USD', '+246', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'y', 'y'),
(35, '🇻🇬', 'British Virgin Islands', 'US Dollar', 'USD', '+1284', 'British Virgin Islands', 'British Virgin Islands', 'y', 'y'),
(36, '🇧🇳', 'Brunei Darussalam', 'Brunei Dollar', 'BND', '+673', 'Brunei Darussalam', 'Brunei Darussalam', 'y', 'y'),
(37, '🇧🇬', 'Bulgaria', 'Lev ', 'BGN', '+359', 'Bulgaria', 'Bulgaria', 'y', 'y'),
(38, '🇧🇫', 'Burkina Faso', 'CFA Franc BCEAO', 'XOF', '+226', 'Burkina Faso', 'Burkina Faso', 'y', 'y'),
(39, '', 'Burma', 'kyat ', 'MMK', '', 'Burma', 'Burma', 'y', 'n'),
(40, '🇧🇮', 'Burundi', 'Burundi Franc ', 'BIF', '+257', 'Burundi', 'Burundi', 'y', 'y'),
(41, '🇰🇭', 'Cambodia', 'Riel ', 'KHR', '+855', 'Cambodia', 'Cambodia', 'y', 'y'),
(42, '🇨🇲', 'Cameroon', 'CFA Franc BEAC', 'XAF', '+237', 'Cameroon', 'Cameroon', 'y', 'y'),
(43, '🇨🇦', 'Canada', 'Canadian Dollar ', 'CAD', '+1', 'Canada', 'Canada', 'y', 'y'),
(44, '🇨🇻', 'Cape Verde', 'Cape Verdean Escudo ', 'CVE', '+238', 'Cape Verde', 'Cape Verde', 'y', 'y'),
(45, '🇰🇾', 'Cayman Islands', 'Cayman Islands Dollar', 'KYD', '+1345', 'Cayman Islands', 'Cayman Islands', 'y', 'y'),
(46, '🇨🇫', 'Central African Republic', 'CFA Franc BEAC', 'XAF', '+236', 'Central African Republic', 'Central African Republic', 'y', 'y'),
(47, '🇹🇩', 'Chad', 'CFA Franc BEAC', 'XAF', '+235', 'Chad', 'Chad', 'y', 'y'),
(48, '🇨🇱', 'Chile', 'Chilean Peso ', 'CLP', '+56', 'Chile', 'Chile', 'y', 'y'),
(49, '🇨🇳', 'China', 'Yuan Renminbi', 'CNY', '+86', 'China', 'China', 'y', 'y'),
(50, '🇨🇽', 'Christmas Island', 'Australian Dollar ', 'AUD', '', 'Christmas Island', 'Christmas Island', 'y', 'n'),
(51, '', 'Clipperton Island', '', '', '', 'Clipperton Island', 'Clipperton Island', 'y', 'n'),
(52, '🇨🇨', 'Cocos (Keeling) Islands', 'Australian Dollar ', 'AUD', '', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'y', 'n'),
(53, '🇨🇴', 'Colombia', 'Colombian Peso ', 'COP', '+57', 'Colombia', 'Colombia', 'y', 'y'),
(54, '🇰🇲', 'Comoros', 'Comoro Franc', 'KMF', '+269', 'Comoros', 'Comoros', 'y', 'y'),
(55, '🇨🇩', 'Congo, Democratic Republic of the', 'Franc Congolais', 'CDF', '+243', 'Congo, Democratic Republic of the', 'Congo, Democratic Republic of the', 'y', 'y'),
(56, '🇨🇩', 'Congo, Republic of the', 'CFA Franc BEAC', 'XAF', '+242', 'Congo, Republic of the', 'Congo, Republic of the', 'y', 'y'),
(57, '🇨🇰', 'Cook Islands', 'New Zealand Dollar ', 'NZD', '+682', 'Cook Islands', 'Cook Islands', 'y', 'y'),
(58, '', 'Coral Sea Islands', '', '', '', 'Coral Sea Islands', 'Coral Sea Islands', 'y', 'n'),
(59, '🇨🇷', 'Costa Rica', 'Costa Rican Colon', 'CRC', '+506', 'Costa Rica', 'Costa Rica', 'y', 'y'),
(60, '🇨🇮', 'Cote d\'Ivoire', 'CFA Franc BCEAO', 'XOF', '+225', 'Cote d\'Ivoire', 'Cote d\'Ivoire', 'y', 'y'),
(61, '🇭🇷', 'Croatia', 'Kuna', 'HRK', '+385', 'Croatia', 'Croatia', 'y', 'y'),
(62, '🇨🇺', 'Cuba', 'Cuban Peso', 'CUP', '+53', 'Cuba', 'Cuba', 'y', 'y'),
(63, '🇨🇾', 'Cyprus', 'Cyprus Pound', 'CYP', '+357', 'Cyprus', 'Cyprus', 'y', 'y'),
(64, '🇨🇿', 'Czech Republic', 'Czech Koruna', 'CZK', '+420', 'Czech Republic', 'Czech Republic', 'y', 'y'),
(65, '🇩🇰', 'Denmark', 'Danish Krone', 'DKK', '+45', 'Denmark', 'Denmark', 'y', 'y'),
(66, '🇩🇯', 'Djibouti', 'Djibouti Franc', 'DJF', '+253', 'Djibouti', 'Djibouti', 'y', 'y'),
(67, '🇩🇲', 'Dominica', 'East Caribbean Dollar', 'XCD', '+1767', 'Dominica', 'Dominica', 'y', 'y'),
(68, '🇩🇴', 'Dominican Republic', 'Dominican Peso', 'DOP', '+1', 'Dominican Republic', 'Dominican Republic', 'y', 'y'),
(69, '', 'East Timor', 'Timor Escudo', 'TPE', '', 'East Timor', 'East Timor', 'y', 'n'),
(70, '🇪🇨', 'Ecuador', 'US Dollar', 'USD', '+593', 'Ecuador', 'Ecuador', 'y', 'y'),
(71, '🇪🇬', 'Egypt', 'Egyptian Pound ', 'EGP', '+20', 'Egypt', 'Egypt', 'y', 'y'),
(72, '🇸🇻', 'El Salvador', 'El Salvador Colon', 'SVC', '+503', 'El Salvador', 'El Salvador', 'y', 'y'),
(73, '🇬🇶', 'Equatorial Guinea', 'CFA Franc BEAC', 'XAF', '+240', 'Equatorial Guinea', 'Equatorial Guinea', 'y', 'y'),
(74, '🇪🇷', 'Eritrea', 'Nakfa', 'ERN', '+291', 'Eritrea', 'Eritrea', 'y', 'y'),
(75, '🇪🇪', 'Estonia', 'Kroon', 'EEK', '+372', 'Estonia', 'Estonia', 'y', 'y'),
(76, '🇪🇹', 'Ethiopia', 'Ethiopian Birr', 'ETB', '+251', 'Ethiopia', 'Ethiopia', 'y', 'y'),
(77, '', 'Europa Island', '', '', '', 'Europa Island', 'Europa Island', 'y', 'n'),
(78, '🇫🇰', 'Falkland Islands (Islas Malvinas)', 'Falkland Islands Pound', 'FKP', '+500', 'Falkland Islands (Islas Malvinas)', 'Falkland Islands (Islas Malvinas)', 'y', 'y'),
(79, '🇫🇴', 'Faroe Islands', 'Danish Krone ', 'DKK', '+298', 'Faroe Islands', 'Faroe Islands', 'y', 'y'),
(80, '🇫🇯', 'Fiji', 'Fijian Dollar ', 'FJD', '+679', 'Fiji', 'Fiji', 'y', 'y'),
(81, '🇫🇮', 'Finland', 'Euro', 'EUR', '+358', 'Finland', 'Finland', 'y', 'y'),
(82, '🇫🇷', 'France', 'Euro', 'EUR', '+33', 'France', 'France', 'y', 'y'),
(83, '', 'France, Metropolitan', 'Euro', 'EUR', '', 'France, Metropolitan', 'France, Metropolitan', 'y', 'n'),
(84, '🇬🇫', 'French Guiana', 'Euro', 'EUR', '+594', 'French Guiana', 'French Guiana', 'y', 'y'),
(85, '🇵🇫', 'French Polynesia', 'CFP Franc', 'XPF', '+689', 'French Polynesia', 'French Polynesia', 'y', 'y'),
(86, '', 'French Southern and Antarctic Lands', 'Euro', 'EUR', '', 'French Southern and Antarctic Lands', 'French Southern and Antarctic Lands', 'y', 'n'),
(87, '🇬🇦', 'Gabon', 'CFA Franc BEAC', 'XAF', '+241', 'Gabon', 'Gabon', 'y', 'y'),
(88, '🇬🇲', 'The Gambia', 'Dalasi', 'GMD', '+220', 'The Gambia', 'The Gambia', 'y', 'y'),
(89, '', 'Gaza Strip', 'New Israeli Shekel ', 'ILS', '', 'Gaza Strip', 'Gaza Strip', 'y', 'n'),
(90, '🇬🇪', 'Georgia', 'Lari', 'GEL', '+995', 'Georgia', 'Georgia', 'y', 'y'),
(91, '🇩🇪', 'Germany', 'Euro', 'EUR', '+49', 'Germany', 'Germany', 'y', 'y'),
(93, '🇬🇮', 'Gibraltar', 'Gibraltar Pound', 'GIP', '+350', 'Gibraltar', 'Gibraltar', 'y', 'y'),
(94, '', 'Glorioso Islands', '', '', '', 'Glorioso Islands', 'Glorioso Islands', 'y', 'n'),
(95, '🇬🇷', 'Greece', 'Euro', 'EUR', '+30', 'Greece', 'Greece', 'y', 'y'),
(96, '🇬🇱', 'Greenland', 'Danish Krone', 'DKK', '+299', 'Greenland', 'Greenland', 'y', 'y'),
(97, '🇬🇩', 'Grenada', 'East Caribbean Dollar', 'XCD', '+1473', 'Grenada', 'Grenada', 'y', 'y'),
(98, '🇬🇵', 'Guadeloupe', 'Euro', 'EUR', '+590', 'Guadeloupe', 'Guadeloupe', 'y', 'y'),
(99, '🇬🇺', 'Guam', 'US Dollar', 'USD', '+1671', 'Guam', 'Guam', 'y', 'y'),
(100, '🇬🇹', 'Guatemala', 'Quetzal', 'GTQ', '+502', 'Guatemala', 'Guatemala', 'y', 'y'),
(101, '', 'Guernsey', 'Pound Sterling', 'GBP', '', 'Guernsey', 'Guernsey', 'y', 'n'),
(102, '🇬🇳', 'Guinea', 'Guinean Franc ', 'GNF', '+224', 'Guinea', 'Guinea', 'y', 'y'),
(103, '🇬🇼', 'Guinea-Bissau', 'CFA Franc BCEAO', 'XOF', '+245', 'Guinea-Bissau', 'Guinea-Bissau', 'y', 'y'),
(104, '🇬🇾', 'Guyana', 'Guyana Dollar', 'GYD', '+592', 'Guyana', 'Guyana', 'y', 'y'),
(105, '🇭🇹', 'Haiti', 'Gourde', 'HTG', '+509', 'Haiti', 'Haiti', 'y', 'y'),
(106, '', 'Heard Island and McDonald Islands', 'Australian Dollar', 'AUD', '', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'y', 'n'),
(107, '', 'Holy See (Vatican City)', 'Euro', 'EUR', '', 'Holy See (Vatican City)', 'Holy See (Vatican City)', 'y', 'n'),
(108, '🇭🇳', 'Honduras', 'Lempira', 'HNL', '+504', 'Honduras', 'Honduras', 'y', 'y'),
(109, '🇭🇰', 'Hong Kong (SAR)', 'Hong Kong Dollar ', 'HKD', '+852', 'Hong Kong (SAR)', 'Hong Kong (SAR)', 'y', 'y'),
(110, '', 'Howland Island', '', '', '', 'Howland Island', 'Howland Island', 'y', 'n'),
(111, '🇭🇺', 'Hungary', 'Forint', 'HUF', '+36', 'Hungary', 'Hungary', 'y', 'y'),
(112, '🇮🇸', 'Iceland', 'Iceland Krona', 'ISK', '+354', 'Iceland', 'Iceland', 'y', 'y'),
(114, '🇮🇩', 'Indonesia', 'Rupiah', 'IDR', '+62', 'Indonesia', 'Indonesia', 'y', 'y'),
(115, '🇮🇷', 'Iran', 'Iranian Rial', 'IRR', '+98', 'Iran', 'Iran', 'y', 'y'),
(116, '🇮🇶', 'Iraq', 'Iraqi Dinar', 'IQD', '+964', 'Iraq', 'Iraq', 'y', 'y'),
(117, '🇮🇪', 'Ireland', 'Euro', 'EUR', '+353', 'Ireland', 'Ireland', 'y', 'y'),
(118, '🇮🇱', 'Israel', 'New Israeli Sheqel', 'ILS', '+972', 'Israel', 'Israel', 'y', 'y'),
(119, '🇮🇹', 'Italy', 'Euro', 'EUR', '+39', 'Italy', 'Italy', 'y', 'y'),
(120, '🇯🇲', 'Jamaica', 'Jamaican dollar ', 'JMD', '+1876', 'Jamaica', 'Jamaica', 'y', 'y'),
(121, '', 'Jan Mayen', 'Norway Kroner', 'NOK', '', 'Jan Mayen', 'Jan Mayen', 'y', 'n'),
(122, '🇯🇵', 'Japan', 'Yen ', 'JPY', '+81', 'Japan', 'Japan', 'y', 'y'),
(123, '', 'Jarvis Island', '', '', '', 'Jarvis Island', 'Jarvis Island', 'y', 'n'),
(124, '', 'Jersey', 'Pound Sterling', 'GBP', '', 'Jersey', 'Jersey', 'y', 'n'),
(125, '', 'Johnston Atoll', '', '', '', 'Johnston Atoll', 'Johnston Atoll', 'y', 'n'),
(126, '🇯🇴', 'Jordan', 'Jordanian Dinar', 'JOD', '+962', 'Jordan', 'Jordan', 'y', 'y'),
(127, '', 'Juan de Nova Island', '', '', '', 'Juan de Nova Island', 'Juan de Nova Island', 'y', 'n'),
(128, '🇰🇿', 'Kazakhstan', 'Tenge', 'KZT', '+7', 'Kazakhstan', 'Kazakhstan', 'y', 'y'),
(129, '🇰🇪', 'Kenya', 'Kenyan shilling ', 'KES', '+254', 'Kenya', 'Kenya', 'y', 'y'),
(130, '', 'Kingman Reef', '', '', '', 'Kingman Reef', 'Kingman Reef', 'y', 'n'),
(131, '🇰🇮', 'Kiribati', 'Australian dollar ', 'AUD', '+686', 'Kiribati', 'Kiribati', 'y', 'y'),
(132, '', 'Korea, North', 'North Korean Won', 'KPW', '', 'Korea, North', 'Korea, North', 'y', 'n'),
(133, '', 'Korea, South', 'Won', 'KRW', '', 'Korea, South', 'Korea, South', 'y', 'n'),
(134, '🇰🇼', 'Kuwait', 'Kuwaiti Dinar', 'KWD', '+965', 'Kuwait', 'Kuwait', 'y', 'y'),
(135, '🇰🇬', 'Kyrgyzstan', 'Som', 'KGS', '+996', 'Kyrgyzstan', 'Kyrgyzstan', 'y', 'y'),
(136, '🇱🇦', 'Laos', 'Kip', 'LAK', '+856', 'Laos', 'Laos', 'y', 'y'),
(137, '🇱🇻', 'Latvia', 'Latvian Lats', 'LVL', '+371', 'Latvia', 'Latvia', 'y', 'y'),
(138, '🇬🇭', 'Ghana', 'Cedi', 'GHC', '+233', 'Ghana', 'Ghana', 'y', 'y'),
(139, '🇱🇸', 'Lesotho', 'Loti', 'LSL', '+266', 'Lesotho', 'Lesotho', 'y', 'y'),
(140, '🇱🇷', 'Liberia', 'Liberian Dollar', 'LRD', '+231', 'Liberia', 'Liberia', 'y', 'y'),
(141, '🇱🇾', 'Libya', 'Libyan Dinar', 'LYD', '+218', 'Libya', 'Libya', 'y', 'y'),
(142, '🇱🇮', 'Liechtenstein', 'Swiss Franc', 'CHF', '+423', 'Liechtenstein', 'Liechtenstein', 'y', 'y'),
(143, '🇱🇹', 'Lithuania', 'Lithuanian Litas', 'LTL', '+370', 'Lithuania', 'Lithuania', 'y', 'y'),
(144, '🇱🇺', 'Luxembourg', 'Euro', 'EUR', '+352', 'Luxembourg', 'Luxembourg', 'y', 'y'),
(145, '🇲🇴', 'Macao', 'Pataca', 'MOP', '+853', 'Macao', 'Macao', 'y', 'y'),
(146, '🇲🇰', 'Macedonia, The Former Yugoslav Republic of', 'Denar', 'MKD', '+389', 'Macedonia, The Former Yugoslav Republic of', 'Macedonia, The Former Yugoslav Republic of', 'y', 'y'),
(147, '🇲🇬', 'Madagascar', 'Malagasy Franc', 'MGF', '+261', 'Madagascar', 'Madagascar', 'y', 'y'),
(148, '🇲🇼', 'Malawi', 'Kwacha', 'MWK', '+265', 'Malawi', 'Malawi', 'y', 'y'),
(149, '🇲🇾', 'Malaysia', 'Malaysian Ringgit', 'MYR', '+60', 'Malaysia', 'Malaysia', 'y', 'y'),
(150, '🇲🇻', 'Maldives', 'Rufiyaa', 'MVR', '+960', 'Maldives', 'Maldives', 'y', 'y'),
(151, '🇲🇱', 'Mali', 'CFA Franc BCEAO', 'XOF', '+223', 'Mali', 'Mali', 'y', 'y'),
(152, '🇲🇹', 'Malta', 'Euro', 'EUR', '+356', 'Malta', 'Malta', 'y', 'y'),
(153, '', 'Man, Isle of', 'Pound Sterling', 'GBP', '', 'Man, Isle of', 'Man, Isle of', 'y', 'n'),
(154, '🇲🇭', 'Marshall Islands', 'US Dollar', 'USD', '+692', 'Marshall Islands', 'Marshall Islands', 'y', 'y'),
(155, '🇲🇶', 'Martinique', 'Euro', 'EUR', '+596', 'Martinique', 'Martinique', 'y', 'y'),
(156, '🇲🇷', 'Mauritania', 'Ouguiya', 'MRO', '+222', 'Mauritania', 'Mauritania', 'y', 'y'),
(157, '🇲🇺', 'Mauritius', 'Mauritius Rupee', 'MUR', '+230', 'Mauritius', 'Mauritius', 'y', 'y'),
(158, '', 'Mayotte', 'Euro', 'EUR', '', 'Mayotte', 'Mayotte', 'y', 'n'),
(159, '🇲🇽', 'Mexico', 'Mexican Peso', 'MXN', '+52', 'Mexico', 'Mexico', 'y', 'y'),
(160, '🇫🇲', 'Micronesia, Federated States of', 'US Dollar', 'USD', '+691', 'Micronesia, Federated States of', 'Micronesia, Federated States of', 'y', 'y'),
(161, '', 'Midway Islands', 'United States Dollars', 'USD', '', 'Midway Islands', 'Midway Islands', 'y', 'n'),
(162, '', 'Miscellaneous (French)', '', '', '', 'Miscellaneous (French)', 'Miscellaneous (French)', 'y', 'n'),
(163, '🇲🇩', 'Moldova', 'Moldovan Leu', 'MDL', '+373', 'Moldova', 'Moldova', 'y', 'y'),
(164, '🇲🇨', 'Monaco', 'Euro', 'EUR', '+377', 'Monaco', 'Monaco', 'y', 'y'),
(165, '🇲🇳', 'Mongolia', 'Tugrik', 'MNT', '+976', 'Mongolia', 'Mongolia', 'y', 'y'),
(166, '🇲🇪', 'Montenegro', '', '', '+382', 'Montenegro', 'Montenegro', 'y', 'y'),
(167, '🇲🇸', 'Montserrat', 'East Caribbean Dollar', 'XCD', '+1664', 'Montserrat', 'Montserrat', 'y', 'y'),
(168, '🇲🇦', 'Morocco', 'Moroccan Dirham', 'MAD', '+212', 'Morocco', 'Morocco', 'y', 'y'),
(169, '🇲🇿', 'Mozambique', 'Metical', 'MZM', '+258', 'Mozambique', 'Mozambique', 'y', 'y'),
(170, '🇲🇲', 'Myanmar', 'Kyat', 'MMK', '+95', 'Myanmar', 'Myanmar', 'y', 'y'),
(171, '🇳🇦', 'Namibia', 'Namibian Dollar ', 'NAD', '+264', 'Namibia', 'Namibia', 'y', 'y'),
(172, '🇳🇷', 'Nauru', 'Australian Dollar', 'AUD', '+674', 'Nauru', 'Nauru', 'y', 'y'),
(173, '', 'Navassa Island', '', '', '', 'Navassa Island', 'Navassa Island', 'y', 'n'),
(174, '🇳🇵', 'Nepal', 'Nepalese Rupee', 'NPR', '+977', 'Nepal', 'Nepal', 'y', 'y'),
(175, '🇳🇱', 'Netherlands', 'Euro', 'EUR', '+31', 'Netherlands', 'Netherlands', 'y', 'y'),
(176, '', 'Netherlands Antilles', 'Netherlands Antillean guilder ', 'ANG', '', 'Netherlands Antilles', 'Netherlands Antilles', 'y', 'n'),
(177, '🇳🇨', 'New Caledonia', 'CFP Franc', 'XPF', '+687', 'New Caledonia', 'New Caledonia', 'y', 'y'),
(178, '🇳🇿', 'New Zealand', 'New Zealand Dollar', 'NZD', '+64', 'New Zealand', 'New Zealand', 'y', 'y'),
(179, '🇳🇮', 'Nicaragua', 'Cordoba Oro', 'NIO', '+505', 'Nicaragua', 'Nicaragua', 'y', 'y'),
(180, '🇳🇪', 'Niger', 'CFA Franc BCEAO', 'XOF', '+227', 'Niger', 'Niger', 'y', 'y'),
(181, '🇳🇬', 'Nigeria', 'Naira', 'NGN', '+234', 'Nigeria', 'Nigeria', 'y', 'y'),
(182, '🇳🇺', 'Niue', 'New Zealand Dollar', 'NZD', '+683', 'Niue', 'Niue', 'y', 'y'),
(183, '🇳🇫', 'Norfolk Island', 'Australian Dollar', 'AUD', '+672', 'Norfolk Island', 'Norfolk Island', 'y', 'y'),
(184, '🇲🇵', 'Northern Mariana Islands', 'US Dollar', 'USD', '+1670', 'Northern Mariana Islands', 'Northern Mariana Islands', 'y', 'y'),
(185, '🇳🇴', 'Norway', 'Norwegian Krone', 'NOK', '+47', 'Norway', 'Norway', 'y', 'y'),
(186, '🇴🇲', 'Oman', 'Rial Omani', 'OMR', '+968', 'Oman', 'Oman', 'y', 'y'),
(187, '🇵🇰', 'Pakistan', 'Pakistan Rupee', 'PKR', '+92', 'Pakistan', 'Pakistan', 'y', 'y'),
(188, '🇵🇼', 'Palau', 'US Dollar', 'USD', '+680', 'Palau', 'Palau', 'y', 'y'),
(189, '', 'Palmyra Atoll', '', '', '', 'Palmyra Atoll', 'Palmyra Atoll', 'y', 'n'),
(190, '🇵🇦', 'Panama', 'balboa ', 'PAB', '+507', 'Panama', 'Panama', 'y', 'y'),
(191, '🇵🇬', 'Papua New Guinea', 'Kina', 'PGK', '+675', 'Papua New Guinea', 'Papua New Guinea', 'y', 'y'),
(192, '', 'Paracel Islands', '', '', '', 'Paracel Islands', 'Paracel Islands', 'y', 'n'),
(193, '🇵🇾', 'Paraguay', 'Guarani', 'PYG', '+595', 'Paraguay', 'Paraguay', 'y', 'y'),
(194, '🇵🇪', 'Peru', 'Nuevo Sol', 'PEN', '+51', 'Peru', 'Peru', 'y', 'y'),
(195, '🇵🇭', 'Philippines', 'Philippine Peso', 'PHP', '+63', 'Philippines', 'Philippines', 'y', 'y'),
(196, '', 'Pitcairn Islands', 'New Zealand Dollar', 'NZD', '', 'Pitcairn Islands', 'Pitcairn Islands', 'y', 'n'),
(197, '🇵🇱', 'Poland', 'Zloty', 'PLN', '+48', 'Poland', 'Poland', 'y', 'y'),
(198, '🇵🇹', 'Portugal', 'Euro', 'EUR', '+351', 'Portugal', 'Portugal', 'y', 'y'),
(199, '🇵🇷', 'Puerto Rico', 'US Dollar', 'USD', '+1', 'Puerto Rico', 'Puerto Rico', 'y', 'y'),
(200, '🇶🇦', 'Qatar', 'Qatari Rial', 'QAR', '+974', 'Qatar', 'Qatar', 'y', 'y'),
(201, '🇷🇪', 'Reunion', 'Euro', 'EUR', '+262', 'Reunion', 'Reunion', 'y', 'y'),
(202, '🇷🇴', 'Romania', 'Leu', 'ROL', '+40', 'Romania', 'Romania', 'y', 'y'),
(203, '🇷🇺', 'Russia', 'Russian Ruble', 'RUB', '+7', 'Russia', 'Russia', 'y', 'y'),
(204, '🇷🇼', 'Rwanda', 'Rwanda Franc', 'RWF', '+250', 'Rwanda', 'Rwanda', 'y', 'y'),
(205, '🇸🇭', 'Saint Helena', 'Saint Helenian Pound ', 'SHP', '+290', 'Saint Helena', 'Saint Helena', 'y', 'y'),
(206, '🇰🇳', 'Saint Kitts and Nevis', 'East Caribbean Dollar ', 'XCD', '+1869', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 'y', 'y'),
(207, '🇱🇨', 'Saint Lucia', 'East Caribbean Dollar ', 'XCD', '+1758', 'Saint Lucia', 'Saint Lucia', 'y', 'y'),
(208, '🇵🇲', 'Saint Pierre and Miquelon', 'Euro', 'EUR', '+508', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'y', 'y'),
(209, '🇻🇨', 'Saint Vincent and the Grenadines', 'East Caribbean Dollar ', 'XCD', '+1784', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'y', 'y'),
(210, '🇼🇸', 'Samoa', 'Tala', 'WST', '+685', 'Samoa', 'Samoa', 'y', 'y'),
(211, '🇸🇲', 'San Marino', 'Euro', 'EUR', '+378', 'San Marino', 'San Marino', 'y', 'y'),
(212, '🇸🇹', 'Sao Tome and Principe', 'Dobra', 'STD', '+239', 'Sao Tome and Principe', 'Sao Tome and Principe', 'y', 'y'),
(213, '🇸🇦', 'Saudi Arabia', 'Saudi Riyal', 'SAR', '+966', 'Saudi Arabia', 'Saudi Arabia', 'y', 'y'),
(214, '🇸🇳', 'Senegal', 'CFA Franc BCEAO', 'XOF', '+221', 'Senegal', 'Senegal', 'y', 'y'),
(215, '🇷🇸', 'Serbia', '', '', '+381', 'Serbia', 'Serbia', 'y', 'y'),
(216, '', 'Serbia and Montenegro', '', '', '', 'Serbia and Montenegro', 'Serbia and Montenegro', 'y', 'n'),
(217, '🇸🇨', 'Seychelles', 'Seychelles Rupee', 'SCR', '+248', 'Seychelles', 'Seychelles', 'y', 'y'),
(218, '🇸🇱', 'Sierra Leone', 'Leone', 'SLL', '+232', 'Sierra Leone', 'Sierra Leone', 'y', 'y'),
(219, '🇸🇬', 'Singapore', 'Singapore Dollar', 'SGD', '+65', 'Singapore', 'Singapore', 'y', 'y'),
(220, '🇸🇰', 'Slovakia', 'Euro', 'EUR', '+421', 'Slovakia', 'Slovakia', 'y', 'y'),
(221, '🇸🇮', 'Slovenia', 'Euro', 'EUR', '+386', 'Slovenia', 'Slovenia', 'y', 'y'),
(222, '🇸🇧', 'Solomon Islands', 'Solomon Islands Dollar', 'SBD', '+677', 'Solomon Islands', 'Solomon Islands', 'y', 'y'),
(223, '🇸🇴', 'Somalia', 'Somali Shilling', 'SOS', '+252', 'Somalia', 'Somalia', 'y', 'y'),
(224, '🇿🇦', 'South Africa', 'Rand', 'ZAR', '+27', 'South Africa', 'South Africa', 'y', 'y'),
(225, '', 'South Georgia and the South Sandwich Islands', 'Pound Sterling', 'GBP', '', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'y', 'n'),
(226, '🇪🇸', 'Spain', 'Euro', 'EUR', '+34', 'Spain', 'Spain', 'y', 'y'),
(227, '', 'Spratly Islands', '', '', '', 'Spratly Islands', 'Spratly Islands', 'y', 'n'),
(228, '🇱🇰', 'Sri Lanka', 'Sri Lanka Rupee', 'LKR', '+94', 'Sri Lanka', 'Sri Lanka', 'y', 'y'),
(229, '🇸🇩', 'Sudan', 'Sudanese Dinar', 'SDD', '+249', 'Sudan', 'Sudan', 'y', 'y'),
(230, '🇸🇷', 'Suriname', 'Suriname Guilder', 'SRG', '+597', 'Suriname', 'Suriname', 'y', 'y'),
(231, '', 'Svalbard', 'Norwegian Krone', 'NOK', '', 'Svalbard', 'Svalbard', 'y', 'n'),
(232, '🇸🇿', 'Swaziland', 'Lilangeni', 'SZL', '+268', 'Swaziland', 'Swaziland', 'y', 'y'),
(233, '🇸🇪', 'Sweden', 'Swedish Krona', 'SEK', '+46', 'Sweden', 'Sweden', 'y', 'y'),
(234, '🇨🇭', 'Switzerland', 'Swiss Franc', 'CHF', '+41', 'Switzerland', 'Switzerland', 'y', 'y'),
(235, '🇸🇾', 'Syria', 'Syrian Pound', 'SYP', '+963', 'Syria', 'Syria', 'y', 'y'),
(236, '🇹🇼', 'Taiwan', 'New Taiwan Dollar', 'TWD', '+886', 'Taiwan', 'Taiwan', 'y', 'y'),
(237, '🇹🇯', 'Tajikistan', 'Somoni', 'TJS', '+992', 'Tajikistan', 'Tajikistan', 'y', 'y'),
(238, '🇹🇿', 'Tanzania', 'Tanzanian Shilling', 'TZS', '+255', 'Tanzania', 'Tanzania', 'y', 'y'),
(239, '🇹🇭', 'Thailand', 'Baht', 'THB', '+66', 'Thailand', 'Thailand', 'y', 'y'),
(240, '🇹🇬', 'Togo', 'CFA Franc BCEAO', 'XOF', '+228', 'Togo', 'Togo', 'y', 'y'),
(241, '🇹🇰', 'Tokelau', 'New Zealand Dollar', 'NZD', '+690', 'Tokelau', 'Tokelau', 'y', 'y'),
(242, '🇹🇴', 'Tonga', 'Pa\'anga', 'TOP', '+676', 'Tonga', 'Tonga', 'y', 'y'),
(243, '🇹🇹', 'Trinidad and Tobago', 'Trinidad and Tobago Dollar', 'TTD', '+1868', 'Trinidad and Tobago', 'Trinidad and Tobago', 'y', 'y'),
(244, '', 'Tromelin Island', '', '', '', 'Tromelin Island', 'Tromelin Island', 'y', 'n'),
(245, '🇹🇳', 'Tunisia', 'Tunisian Dinar', 'TND', '+216', 'Tunisia', 'Tunisia', 'y', 'y'),
(246, '🇹🇷', 'Turkey', 'Turkish Lira', 'TRY', '+90', 'Turkey', 'Turkey', 'y', 'y'),
(247, '🇹🇲', 'Turkmenistan', 'Manat', 'TMM', '+993', 'Turkmenistan', 'Turkmenistan', 'y', 'y'),
(248, '🇹🇨', 'Turks and Caicos Islands', 'US Dollar', 'USD', '+1649', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'y', 'y'),
(249, '🇹🇻', 'Tuvalu', 'Australian Dollar', 'AUD', '+688', 'Tuvalu', 'Tuvalu', 'y', 'y'),
(250, '🇺🇬', 'Uganda', 'Uganda Shilling', 'UGX', '+256', 'Uganda', 'Uganda', 'y', 'y'),
(251, '🇺🇦', 'Ukraine', 'Hryvnia', 'UAH', '+380', 'Ukraine', 'Ukraine', 'y', 'y'),
(252, '🇦🇪', 'United Arab Emirates', 'UAE Dirham', 'AED', '+971', 'United Arab Emirates', 'United Arab Emirates', 'y', 'y'),
(253, '🇬🇧', 'United Kingdom', 'Pound Sterling', 'GBP', '+44', 'United Kingdom', 'United Kingdom', 'y', 'y'),
(254, '🇻🇮', 'United States', 'US Dollar', 'USD', '+1', 'United States', 'United States', 'y', 'y'),
(255, '', 'United States Minor Outlying Islands', 'US Dollar', 'USD', '', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'y', 'n'),
(256, '🇺🇾', 'Uruguay', 'Peso Uruguayo', 'UYU', '+598', 'Uruguay', 'Uruguay', 'y', 'y'),
(257, '🇺🇿', 'Uzbekistan', 'Uzbekistan Sum', 'UZS', '+998', 'Uzbekistan', 'Uzbekistan', 'y', 'y'),
(258, '🇻🇺', 'Vanuatu', 'Vatu', 'VUV', '+678', 'Vanuatu', 'Vanuatu', 'y', 'y'),
(259, '🇻🇪', 'Venezuela', 'Bolivar', 'VEB', '+58', 'Venezuela', 'Venezuela', 'y', 'y'),
(260, '🇻🇳', 'Vietnam', 'Dong', 'VND', '+84', 'Vietnam', 'Vietnam', 'y', 'y'),
(261, '', 'Virgin Islands', 'US Dollar', 'USD', '', 'Virgin Islands', 'Virgin Islands', 'y', 'n'),
(262, '', 'Virgin Islands (UK)', 'US Dollar', 'USD', '', 'Virgin Islands (UK)', 'Virgin Islands (UK)', 'y', 'n'),
(263, '', 'Virgin Islands (US)', 'US Dollar', 'USD', '', 'Virgin Islands (US)', 'Virgin Islands (US)', 'y', 'n'),
(264, '', 'Wake Island', 'US Dollar', 'USD', '', 'Wake Island', 'Wake Island', 'y', 'n'),
(265, '🇼🇫', 'Wallis and Futuna', 'CFP Franc', 'XPF', '+681', 'Wallis and Futuna', 'Wallis and Futuna', 'y', 'y'),
(266, '', 'West Bank', 'New Israeli Shekel ', 'ILS', '', 'West Bank', 'West Bank', 'y', 'n'),
(267, '', 'Western Sahara', 'Moroccan Dirham', 'MAD', '', 'Western Sahara', 'Western Sahara', 'y', 'n'),
(268, '', 'Western Samoa', 'Tala', 'WST', '', 'Western Samoa', 'Western Samoa', 'y', 'n'),
(269, '', 'World', '', '', '', 'World', 'World', 'y', 'n'),
(270, '🇾🇪', 'Yemen', 'Yemeni Rial', 'YER', '+967', 'Yemen', 'Yemen', 'y', 'y'),
(271, '', 'Yugoslavia', 'Yugoslavian Dinar ', 'YUM', '', 'Yugoslavia', 'Yugoslavia', 'n', 'n'),
(272, '', 'Zaire', '', '', '', 'Zaire', 'Zaire', 'y', 'n'),
(273, '🇿🇲', 'Zambia', 'Kwacha', 'ZMK', '+260', 'Zambia', 'Zambia', 'y', 'y'),
(274, '🇿🇼', 'Zimbabwe', 'Zimbabwe Dollar', 'ZWD', '+263', 'Zimbabwe', 'Zimbabwe', 'y', 'y'),
(275, '', 'Palestinian Territory, Occupied', '', '', '', 'Palestinian Territory, Occupied', 'Palestinian Territory, Occupied', 'y', 'y'),
(276, '🇦🇫', 'Afghanistan', 'Afghani', 'AFA', '+93', 'Afghanistan', 'Afghanistan', 'n', 'y'),
(277, '🇱🇧', 'Lebanon', 'Lebanese Pound', 'LBP', '+961', 'Lebanon', 'Lebanon', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier_pincode`
--

CREATE TABLE `tbl_courier_pincode` (
  `id` int(11) NOT NULL,
  `courier_partner_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_courier_pincode`
--

INSERT INTO `tbl_courier_pincode` (`id`, `courier_partner_id`, `pincode`, `created`) VALUES
(50, 4, 363421, '2021-11-02 15:56:00'),
(51, 4, 380002, '2021-11-02 15:56:00'),
(52, 4, 380003, '2021-11-02 15:56:00'),
(53, 4, 380004, '2021-11-02 15:56:00'),
(54, 4, 380018, '2021-11-02 15:56:00'),
(56, 2, 363421, '2021-11-02 15:57:00'),
(57, 2, 380002, '2021-11-02 15:57:00'),
(58, 2, 380003, '2021-11-02 15:57:00'),
(59, 2, 380004, '2021-11-02 15:57:00'),
(60, 2, 380018, '2021-11-02 15:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_html`
--

CREATE TABLE `tbl_email_html` (
  `id` int(11) NOT NULL,
  `html_name` text CHARACTER SET utf8 NOT NULL,
  `subject_name` text CHARACTER SET utf8 NOT NULL,
  `action` varchar(255) CHARACTER SET utf8 NOT NULL,
  `html_code` text CHARACTER SET utf8 NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_email_html`
--

INSERT INTO `tbl_email_html` (`id`, `html_name`, `subject_name`, `action`, `html_code`, `status`) VALUES
(1, 'Register Activation Link', 'Register Activation Link', 'register_link', '<p><strong>Hello ###NAME###, Thank you for joining us. There is one more step in your registration process. We need you to confirm your email address, so that we know this is really you. To confirm, please click the link below: Please use this link to&nbsp;Activation link&nbsp;your account. Thank You!</strong></p>\r\n', 'd'),
(2, 'Register', 'Register', 'Register', '<p>Register</p>\r\n', 'a'),
(3, 'Forgot Password', 'Forgot Password', 'forgot_password', '<p>Hello ###USERNAME###,</p>\r\n\r\n<p>Your new password is : ###NEW_PASSWORD###</p>\r\n\r\n<p>Thank You</p>\r\n', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seq` int(11) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu_name`, `module_name`, `link`, `seq`, `icon`, `status`) VALUES
(1, 'Dashboard', 'home', 'home', 1, 'fa fa-tachometer', 'a'),
(2, 'Manage Site Setting', 'sitesetting', 'sitesetting', 2, 'fa fa-cogs', 'a'),
(3, 'Change Admin Password', 'change_password', 'change_password', 3, 'fa fa-key', 'a'),
(4, 'Manage Users', 'user', 'user', 4, 'fa fa-users', 'a'),
(10, 'Manage Email Template', 'email_template', 'email_template', 5, 'fa fa-list\r\n', 'a'),
(11, 'Manage Shipping Rate', 'shipping_rate', 'shipping_rate', 6, 'fa fa-truck', 'a'),
(12, 'Manage Order', 'manage_order', 'manage_order', 7, 'fa fa-tasks', 'a'),
(13, 'Weight Discrepancy', 'weight_discrepancy', 'weight_discrepancy', 8, 'fa fa-tasks', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pincode` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_state` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float(8,2) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_category_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'c',
  `pickup_address_id` varchar(255) NOT NULL,
  `ship_pack_weight` varchar(255) NOT NULL,
  `shippment_charge` float(8,2) NOT NULL,
  `cod_charges` float(8,2) NOT NULL,
  `total_price` float(8,2) NOT NULL,
  `volumetric_cm_1` varchar(255) NOT NULL,
  `volumetric_cm_2` varchar(255) NOT NULL,
  `volumetric_cm_3` varchar(255) NOT NULL,
  `courier_partner` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `status` enum('p','c') NOT NULL DEFAULT 'p',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `order_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_pincode`, `customer_city`, `customer_state`, `product_name`, `product_price`, `product_qty`, `product_sku`, `product_category_id`, `payment_method`, `pickup_address_id`, `ship_pack_weight`, `shippment_charge`, `cod_charges`, `total_price`, `volumetric_cm_1`, `volumetric_cm_2`, `volumetric_cm_3`, `courier_partner`, `pickup_date`, `status`, `created`) VALUES
(23, 56, '00001', 'Bhavin Chavda', '8457968545', 'bhavin@gmail.com', 'Ahemdabad', '363521', 'Ahemdabad', 'Gujarat', 'Testing ', 100.00, '2', '1', '3', 'c', '1', '2', 100.00, 20.00, 320.00, '2', '1', '1', '1', '0000-00-00', 'c', '2021-11-02 11:29:00'),
(24, 56, '00002', 'Bhavin Chavda', '8457968545', 'bhavin@gmail.com', 'Ahemdabad', '363521', 'Ahemdabad', 'Gujarat', 'demo Product', 50.00, '2', '1', '1', 'p', '1', '2.5', 125.00, 0.00, 225.00, '2', '2', '2', '2', '0000-00-00', 'c', '2021-11-02 11:36:00'),
(25, 56, '00003', 'Testing', '8457968545', 'bhavin@gmail.com', 'Ahemdabad', '363521', 'Ahemdabad', 'Gujarat', 'demo Product', 250.00, '1', '1', '1', 'c', '1', '5', 250.00, 20.00, 520.00, '2', '2', '2', '1', '0000-00-00', 'c', '2021-11-02 11:36:00'),
(26, 56, '00004', 'Bhavin Chavda', '8457968545', 'bhavin@gmail.com', 'Ahemdabad', '363521', 'Ahemdabad', 'Gujarat', 'demo Product', 100.00, '1', '1', '1', 'p', '2', '2', 100.00, 0.00, 200.00, '2', '2', '2', '2', '0000-00-00', 'c', '2021-11-02 11:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_address`
--

CREATE TABLE `tbl_pickup_address` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pickup_address`
--

INSERT INTO `tbl_pickup_address` (`id`, `address`, `status`) VALUES
(1, 'Gondal Rajkot 360001', 'a'),
(2, 'surat Rajkot 360001', 'a'),
(3, 'vadodara gondal 360005', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(50) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `constant` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `label`, `field_name`, `type`, `constant`, `value`, `action`) VALUES
(1, 'Site Name', 'site_name', 'textbox', 'SITE_NAME', 'BHEJOOO', 'g'),
(2, 'Site Logo', 'site_logo', 'filebox', 'SITE_LOGO', '', 'g'),
(3, 'Admin Email', 'admin_email', 'textbox', 'ADMIN_EMAIL', 'test57470@gmail.com', 'm'),
(4, 'From Email', 'from_email', 'textbox', 'FROM_EMAIL', 'no-reply@notioninfosoft.com', 'm'),
(5, 'SMTP Host', 'smtp_host', 'textbox', 'SMTP_HOST', 'mail.notioninfosoft.com', 'm'),
(6, 'SMTP Port', 'smtp_port', 'textbox', 'SMTP_PORT', '587', 'm'),
(7, 'SMTP Username', 'smtp_username', 'textbox', 'SMTP_USERNAME', 'no-reply@notioninfosoft.com', 'm'),
(8, 'SMTP Password', 'smtp_password', 'textbox', 'SMTP_PASSWORD', '08Oct@1991', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_rate`
--

CREATE TABLE `tbl_shipping_rate` (
  `id` int(11) NOT NULL,
  `courier_partner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `within_city` int(11) NOT NULL,
  `within_zone` int(11) NOT NULL,
  `metros` int(11) NOT NULL,
  `rest_of_india` int(11) NOT NULL,
  `special_zone` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `courier_logo` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipping_rate`
--

INSERT INTO `tbl_shipping_rate` (`id`, `courier_partner`, `within_city`, `within_zone`, `metros`, `rest_of_india`, `special_zone`, `cod`, `courier_logo`, `status`, `created`) VALUES
(1, 'xpress Courier service', 50, 75, 100, 150, 200, 30, '1635230213_image.jpeg', 'a', '2021-10-26 12:06:00'),
(2, 'testing Courier service', 10, 20, 50, 30, 75, 30, '1635744500_imge1.jpg', 'a', '2021-11-01 10:58:00'),
(3, 'demo Courier service', 20, 25, 50, 60, 80, 20, '1635753593_1631194795_1628833906_DESK.jpg', 'a', '2021-11-01 13:29:00'),
(4, 'demo Courier service', 10, 15, 25, 30, 40, 20, '1635839313_doctor.jpg', 'a', '2021-11-02 13:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(155) NOT NULL,
  `permision_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `permision_slug` varchar(155) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id`, `menu_id`, `permision_name`, `permision_slug`) VALUES
(1, 1, 'View', 'view'),
(2, 2, 'View', 'view'),
(3, 2, 'Update Site Setting', 'update_site_setting'),
(4, 3, 'View', 'view'),
(5, 3, 'Change Password', 'change_password'),
(6, 4, 'View', 'view'),
(7, 4, 'Add', 'add'),
(8, 4, 'Edit', 'edit'),
(9, 4, 'Delete', 'delete'),
(10, 5, 'View', 'view'),
(11, 5, 'Add', 'add'),
(12, 5, 'Edit', 'edit'),
(13, 5, 'Delete', 'delete'),
(14, 6, 'View', 'view'),
(15, 6, 'Add', 'add'),
(16, 6, 'Edit', 'edit'),
(17, 6, 'Delete', 'delete'),
(18, 7, 'View', 'view'),
(19, 7, 'Add', 'add'),
(20, 7, 'Edit', 'edit'),
(21, 7, 'Delete', 'delete'),
(22, 8, 'View', 'view'),
(23, 8, 'Add', 'add'),
(24, 8, 'Edit', 'edit'),
(25, 8, 'Delete', 'delete'),
(26, 9, 'View', 'view'),
(27, 9, 'Add', 'add'),
(28, 9, 'Edit', 'edit'),
(29, 9, 'Delete', 'delete'),
(30, 10, 'View', 'view'),
(31, 10, 'Add', 'add'),
(32, 10, 'Edit', 'edit'),
(33, 10, 'Delete', 'delete'),
(34, 11, 'View', 'view'),
(35, 11, 'Add', 'add'),
(36, 11, 'Edit', 'edit'),
(37, 11, 'Delete', 'delete'),
(44, 4, 'Full View', 'full_view'),
(52, 9, 'Full View', 'full_view'),
(53, 9, 'Accept', 'accept'),
(54, 9, 'Reject', 'reject'),
(55, 12, 'View', 'view'),
(56, 12, 'Add', 'add'),
(57, 12, 'Edit', 'edit'),
(58, 12, 'Delete', 'delete'),
(59, 13, 'View', 'view'),
(60, 13, 'Full View', 'full_view'),
(61, 13, 'Add', 'add'),
(62, 13, 'Edit', 'edit'),
(63, 13, 'Delete', 'delete'),
(64, 14, 'View', 'view'),
(65, 14, 'Add', 'add'),
(66, 14, 'Edit', 'edit'),
(67, 14, 'Delete', 'delete'),
(68, 15, 'View', 'view'),
(69, 15, 'Add', 'add'),
(70, 15, 'Edit', 'edit'),
(71, 15, 'Delete', 'delete'),
(73, 16, 'View', 'view'),
(74, 16, 'Add', 'add'),
(75, 16, 'Edit', 'edit'),
(76, 16, 'Delete', 'delete'),
(77, 17, 'View', 'view'),
(78, 17, 'Add', 'add'),
(79, 17, 'Edit', 'edit'),
(80, 17, 'Delete', 'delete'),
(81, 18, 'View', 'view'),
(82, 18, 'Full View', 'full_view'),
(83, 18, 'Add', 'add'),
(84, 18, 'Edit', 'edit'),
(85, 18, 'Delete', 'delete'),
(86, 19, 'View', 'view'),
(87, 19, 'Full View', 'full_view'),
(88, 19, 'Add', 'add'),
(89, 19, 'Edit', 'edit'),
(90, 19, 'Delete', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_token` varchar(255) NOT NULL,
  `monthly_order` varchar(255) NOT NULL,
  `wallet_balance` float(8,2) NOT NULL,
  `courier_priority` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `email`, `mobile_no`, `company_name`, `password`, `email_token`, `monthly_order`, `wallet_balance`, `courier_priority`, `status`, `created`) VALUES
(48, 'Rajnish', 'Dholakiya', 'rajnish@gmail.com', '8980868694', 'notion infosoft', '123456', '', '10-20', 500.00, '', 'a', '2021-08-05 16:54:00'),
(52, 'sdfsdf', '', 'dfsd@gmail.com', 'sdf', 'sdf', '123456', 'PWgiGccS', '', 0.00, '', 'a', '2021-10-04 15:57:00'),
(53, 'ssdfg', '', 'sdfsfsd@gmail.com', 'sdfdfs', 'sdfsdf', '123456', 'VPbuhCSm', '', 0.00, '', 'a', '2021-10-04 15:58:00'),
(54, 'dfsfs', '', 'rajnish@gmail.com', 'sdf', 'sdf', '123456', '7PrAf58g', '', 0.00, '', 'a', '2021-10-04 15:59:00'),
(55, 'dfsdf', '', '45454@gmail.com', '5454545', 'sdf', '123456', 'vlaEbCZl', '', 0.00, '', 'a', '2021-10-04 20:41:00'),
(56, 'Rajnish', '', 'test57470@gmail.com', '12121', 'sdfsdd', '123456', 'sm1WVos7', '', 500.00, 'recommended priority', 'a', '2021-10-04 20:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weight_discrepancy`
--

CREATE TABLE `tbl_weight_discrepancy` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `enterd_weight` int(11) NOT NULL,
  `charged_weight` int(11) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_weight_discrepancy`
--

INSERT INTO `tbl_weight_discrepancy` (`id`, `order_id`, `product_name`, `product_qty`, `courier_name`, `enterd_weight`, `charged_weight`, `proof`, `status`, `created`) VALUES
(1, '00001', 'Testing', 1, 'xpress Courier service', 2, 1, '1636463137_image.jpeg', 'a', '2021-11-09 18:35:00'),
(2, '00004', 'dmo', 2, 'demo Courier service', 1, 2, '1636464576_imge1.jpg', 'a', '2021-11-09 18:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country_code`
--
ALTER TABLE `tbl_country_code`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `tbl_courier_pincode`
--
ALTER TABLE `tbl_courier_pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_html`
--
ALTER TABLE `tbl_email_html`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_pickup_address`
--
ALTER TABLE `tbl_pickup_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shipping_rate`
--
ALTER TABLE `tbl_shipping_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_weight_discrepancy`
--
ALTER TABLE `tbl_weight_discrepancy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_country_code`
--
ALTER TABLE `tbl_country_code`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000002;

--
-- AUTO_INCREMENT for table `tbl_courier_pincode`
--
ALTER TABLE `tbl_courier_pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_email_html`
--
ALTER TABLE `tbl_email_html`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_pickup_address`
--
ALTER TABLE `tbl_pickup_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_shipping_rate`
--
ALTER TABLE `tbl_shipping_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_weight_discrepancy`
--
ALTER TABLE `tbl_weight_discrepancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
