-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 04:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaincrestcapital`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `daily_profit` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `bonus` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `caption`, `color`, `percentage`, `daily_profit`, `currency`, `bonus`, `days`, `amount`, `description`, `image`, `status`, `date`) VALUES
(7, 'Deluxe', 'deluxe', 'Deluxe Package', 'orange', '5%', '30%', '$', '$400', '25', '30,000', 'The Centure team works hard\r\nto deliver exceptional financial results\r\nand increase our clients\' revenue.', '1745115664.jpg', 0, '2024-08-14 17:50:43'),
(8, 'Gold', 'gold', 'Gold Package', 'blue', '10%', '35%', '$', '$500', '20', '50,000', 'GoldThe Centure team works hard\r\nto deliver exceptional financial results\r\nand increase our clients\' revenue.', '1745115642.jpg', 0, '2024-08-14 17:55:01'),
(9, 'Premium', 'premium', 'Premium Package', 'green', '2%', '25%', '$', '$300', '30', '20,000', 'The Centure team works hard\r\nto deliver exceptional financial results\r\nand increase our clients\' revenue. ', '1745115623.jpg', 0, '2024-08-14 18:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 0 COMMENT '0=pending, 1=approved, 2=declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `wallet_address` text DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_address` longtext DEFAULT NULL,
  `withdrawal_error` text DEFAULT NULL,
  `payment_notice` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `wallet_address`, `about`, `phone`, `email`, `office_address`, `withdrawal_error`, `payment_notice`, `facebook`, `instagram`, `twitter`, `linkedIn`, `youtube`, `logo`, `status`, `date`) VALUES
(1, 'DxPEQkYZZrbyqrAQVukxtFR7JYrHcnhdC9UUQ1SSozvZ', 'At TradeEclipse, we believe that the best endorsement comes from satisfied clients. It\'s no surprise that many of our new clients are referrals from our current customers.', '', 'support@chaincrestcapital.com', '795 South Park Avenue,\r\nMelbourne, Australia', 'Unable to withdraw! Please contact support@tradeeclipse.com for your Pin', 'Copy this wallet address to make payment, after making payment, upload the proof of payment on the \"proof section\".\r\nAfter confirmation, your current investment will be reflected.', 'facebook.com', 'instagram.com', 'twitter.com', 'linkedIn.com', 'youtube.com', '1745117538.png', 0, '2024-02-23 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invested_fund` float DEFAULT 0,
  `dividend` decimal(10,0) DEFAULT 0,
  `referral` decimal(10,0) DEFAULT 0,
  `withdrawn` decimal(10,0) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `invested_fund`, `dividend`, `referral`, `withdrawn`, `status`, `date`) VALUES
(1, 1, 0, 0, 0, 0, 0, '2024-11-01 17:57:02'),
(2, 2, 0, 0, 0, 0, 0, '2024-11-01 17:57:56'),
(3, 3, 0, 0, 0, 0, 0, '2025-04-19 20:34:50'),
(4, 4, 0, 0, 0, 0, 0, '2025-04-19 20:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL,
  `access` tinytext DEFAULT NULL COMMENT '0 - unrestricted, 1 - restricted\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `access`, `date_created`) VALUES
(3, 'Support ', 'support@chaincrestcapital.com', '$2y$10$f2z/6ISvw9Yrzk5R1Qs4h.S8oVecEgkFqIRpWCDrkDnSbJaW3fPFm', 2, '0', '2025-04-19 20:34:50'),
(4, 'Support', 'supportuser@chaincrestcapital.com', '$2y$10$4CJJ33aKxRX3wEs88pCzTeKP72sb3o3Z7RkDjDil8/8v8e60C2t0i', 0, '0', '2025-04-19 20:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `page_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `page_url`) VALUES
(1, '::1', 'http://localhost/financeteamx/index.php'),
(2, '::1', 'http://localhost/financeteamx/contact.php'),
(3, '::1', 'http://localhost/financeteamx/about.php'),
(4, '::1', 'http://localhost/coingainx/index.php'),
(5, '::1', 'http://localhost/coingainx/index.php?logout=true'),
(6, '::1', 'http://localhost/coingainx/how-it-works.php'),
(7, '::1', 'http://localhost/coingainx/dashboard.php'),
(8, '::1', 'http://localhost/coingainx/dashboard.php?logout=true'),
(9, '::1', 'http://localhost/chaincrestcapital/index.php'),
(10, '::1', 'http://localhost/chaincrestcapital/login.php'),
(11, '::1', 'http://localhost/chaincrestcapital/dashboard.php'),
(12, '::1', 'http://localhost/chaincrestcapital/invest.php?package=premium'),
(13, '::1', 'http://localhost/chaincrestcapital/about.php'),
(14, '::1', 'http://localhost/chaincrestcapital/how-it-works.php'),
(15, '::1', 'http://localhost/chaincrestcapital/faq.php'),
(16, '::1', 'http://localhost/chaincrestcapital/contact.php'),
(17, '::1', 'http://localhost/chaincrestcapital/privacy.php'),
(18, '::1', 'http://localhost/chaincrestcapital/dashboard.php?logout=true');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_addresses`
--

CREATE TABLE `wallet_addresses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `wallet_address` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_addresses`
--

INSERT INTO `wallet_addresses` (`id`, `name`, `wallet_address`, `status`, `created_at`) VALUES
(1, 'Bitcoin - BTC', 'DxPEQkYZZrbyqrAQVukxtFR7JYrHcnhdC9UUQ1SSozvZ', 0, '2025-04-19 20:33:48'),
(3, 'Etherium', 'Eth-DxPEQkYZZrbyqrAQVukxtFR7JYrHcnhdC9UUQ1SSozvZ', 0, '2025-04-20 05:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_addresses`
--
ALTER TABLE `wallet_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wallet_addresses`
--
ALTER TABLE `wallet_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
