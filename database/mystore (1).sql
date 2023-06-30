-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 10:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'FilsenorDABO', 'oumaroud195@gmail.com', '$2y$10$hIBRwcPkGC3Xl6KiNsfIA.4T41HEeJ5CVkII87QbOv6WgUG1HpKGy');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(11, 'world Fashion'),
(12, 'Mario Casas'),
(13, 'Luxury Bride'),
(14, 'Litle Joy Kids'),
(15, 'Carlo'),
(17, 'Luxe-homegg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(10, 'Boy'),
(11, 'Girl Child'),
(13, 'Shirt'),
(14, 'Suit'),
(15, 'T-shirt'),
(16, 'Wedding Dress'),
(17, 'mangue');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(32, 2, 1006179641, 22, 1, 'pending'),
(33, 2, 1612453367, 22, 1, 'pending'),
(34, 2, 1560093646, 22, 1, 'pending'),
(35, 2, 2087440870, 22, 1, 'pending'),
(36, 2, 821429746, 21, 1, 'pending'),
(37, 2, 612707124, 17, 2, 'pending'),
(38, 2, 103522774, 19, 1, 'pending'),
(39, 2, 503433345, 22, 1, 'pending'),
(40, 2, 477005564, 20, 1, 'pending'),
(41, 2, 1389615490, 22, 1, 'pending'),
(42, 2, 1800180704, 22, 1, 'pending'),
(43, 2, 1523383552, 18, 1, 'pending'),
(44, 2, 1732628929, 17, 2, 'pending'),
(45, 2, 1473799975, 22, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(18, 'Dress', 'Royal', 'Special', 16, 13, 'WhatsApp Image 2023-05-07 at 07.23.19 (1).jpeg', 'WhatsApp Image 2023-05-07 at 07.23.19 (2).jpeg', 'WhatsApp Image 2023-05-07 at 07.23.19.jpeg', '400', '2023-05-20 01:55:30', 'true'),
(19, 'Suit', 'Slim', 'Slim', 14, 12, 'WhatsApp Image 2023-05-07 at 07.20.28 (1).jpeg', 'WhatsApp Image 2023-05-07 at 07.20.28 (2).jpeg', 'WhatsApp Image 2023-05-07 at 07.20.28 (3).jpeg', '500', '2023-05-20 02:04:00', 'true'),
(20, 'Suit', 'Italian', 'Italian', 14, 12, 'WhatsApp Image 2023-05-07 at 07.18.34 (1).jpeg', 'WhatsApp Image 2023-05-07 at 07.18.34 (2).jpeg', 'WhatsApp Image 2023-05-07 at 07.18.34.jpeg', '500', '2023-05-20 01:56:29', 'true'),
(21, 'Shirt', 'Men', 'court-sleeve', 13, 15, 'WhatsApp Image 2023-05-07 at 07.21.44 (2).jpeg', 'WhatsApp Image 2023-05-07 at 07.21.44 (3).jpeg', 'WhatsApp Image 2023-05-07 at 07.21.45.jpeg', '25', '2023-05-20 01:58:39', 'true'),
(22, 'Polo Tshirt', 'Striped Pique Polo Neck Tshirt', 'Carman Yaka', 15, 15, 'WhatsApp Image 2023-05-07 at 07.17.27.jpeg', 'WhatsApp Image 2023-05-07 at 07.17.27 (2).jpeg', 'WhatsApp Image 2023-05-07 at 07.17.27 (1).jpeg', '25', '2023-05-07 11:20:25', 'true'),
(23, 'food', 'ghjklşi', 'yes', 15, 17, '805-8059103_adana-kebab-adana-kebap-png.png', '1997432-focus.jpg', '255660916_1916771248493714_3488215220704876917_n.jpg', '234', '2023-06-08 07:32:29', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users_order`
--

CREATE TABLE `users_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_order`
--

INSERT INTO `users_order` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(59, 2, 29, 1266990165, 1, '2023-05-03 11:10:37', 'Complete'),
(60, 2, 29, 1245600864, 1, '2023-05-07 11:52:54', 'Complete'),
(61, 2, 325, 1006179641, 2, '2023-05-08 08:24:22', 'Complete'),
(62, 2, 0, 2097334102, 0, '2023-05-08 08:24:35', 'Complete'),
(63, 2, 40, 1612453367, 2, '2023-05-08 08:25:45', 'Complete'),
(64, 2, 25, 1560093646, 1, '2023-05-15 02:30:29', 'Complete'),
(65, 2, 50, 2087440870, 2, '2023-05-21 14:00:14', 'Complete'),
(66, 2, 25, 821429746, 1, '2023-05-25 07:54:52', 'Complete'),
(67, 2, 30, 612707124, 1, '2023-06-03 13:12:37', 'Complete'),
(68, 2, 500, 103522774, 1, '2023-06-08 07:17:16', 'Complete'),
(69, 2, 1025, 503433345, 3, '2023-05-25 07:58:16', 'Complete'),
(70, 2, 500, 477005564, 1, '2023-05-25 07:54:38', 'pending'),
(71, 2, 25, 1389615490, 1, '2023-05-25 08:43:34', 'pending'),
(73, 2, 400, 1523383552, 1, '2023-05-25 11:42:55', 'pending'),
(74, 2, 30, 1732628929, 1, '2023-05-25 12:46:27', 'pending'),
(75, 2, 1050, 1473799975, 2, '2023-06-08 07:16:33', 'pending'),
(76, 2, 0, 909905342, 0, '2023-06-08 07:20:58', 'pending'),
(77, 2, 0, 288982605, 0, '2023-06-08 07:27:31', 'pending'),
(78, 2, 0, 1032729478, 0, '2023-06-08 07:28:08', 'pending'),
(79, 2, 0, 598324453, 0, '2023-06-08 07:52:27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(12, 59, 1266990165, 29, 'papara', '2023-05-03 11:10:37'),
(13, 60, 1245600864, 29, 'papara', '2023-05-07 11:52:53'),
(14, 61, 1006179641, 325, 'Payoffline', '2023-05-08 08:24:22'),
(15, 62, 2097334102, 0, 'UPI', '2023-05-08 08:24:35'),
(16, 63, 1612453367, 40, 'Netbanking', '2023-05-08 08:25:45'),
(17, 64, 1560093646, 25, 'Netbanking', '2023-05-15 02:30:29'),
(18, 65, 2087440870, 50, 'Select Payment Mode', '2023-05-21 14:00:14'),
(19, 66, 821429746, 25, 'Netbanking', '2023-05-25 07:54:52'),
(21, 67, 612707124, 30, 'Select Payment Mode', '2023-06-03 13:12:37'),
(22, 68, 103522774, 500, 'Paypal', '2023-06-08 07:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_username`, `user_password`, `user_email`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'fils', '$2y$10$DcIoacc3TzDgxzdhAZ.HZuX3O/zF73lBVy4q78qAZk280XHuVID5O', '195@gmail.com', '', '::1', 'Bitlis', '123456789'),
(3, 'Omar', '$2y$10$Sfk8s.5bd/PaAob5iw2rrOUEf5iq5lr1kfxA4FzJwKFvGexh5MW.2', 'oumaroud195gmail.com', 'Screenshot 2022-03-17 180059.png', '::1', 'Bitlis', '04567890*34567896789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_order`
--
ALTER TABLE `users_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
