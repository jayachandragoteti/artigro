-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 04:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artigro`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_sno` int(11) NOT NULL,
  `product_sno` int(11) NOT NULL,
  `user_sno` int(11) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_sno` int(11) NOT NULL,
  `cat_name` varchar(225) NOT NULL,
  `seller_sno` int(11) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_sno`, `cat_name`, `seller_sno`, `datm`) VALUES
(1, 'BRASSWARE', 12, '2021-04-29 14:11:46'),
(2, 'WOODEN', 12, '2021-04-29 14:11:54'),
(3, 'CLAY', 12, '2021-04-29 14:12:05'),
(5, 'AAAHHH', 12, '2021-06-01 14:45:54'),
(6, 'EJJJJJEJJE', 12, '2021-06-01 14:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_sno` int(11) NOT NULL,
  `city_name` varchar(225) NOT NULL,
  `city_admin` int(11) DEFAULT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_sno`, `city_name`, `city_admin`, `datm`) VALUES
(1, 'VISAKAPATANAM ', 0, '2021-04-05 04:55:21'),
(2, 'VIZIANAGARAM', 0, '2021-04-28 14:41:21'),
(4, 'SRIKAKULAM', 1, '2021-04-29 03:53:21'),
(5, 'VZM', 1, '2021-04-29 04:13:50'),
(6, 'Anantapur', 1, '2021-04-29 04:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `cs_sno` int(11) NOT NULL,
  `users_sno` int(11) NOT NULL,
  `cs_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_sno` int(11) NOT NULL,
  `city_sno` int(11) NOT NULL,
  `seller_sno` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_desc` longtext NOT NULL,
  `pro_cost` int(11) NOT NULL,
  `pro_materialsused` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pro_img1` varchar(225) NOT NULL,
  `pro_img2` varchar(225) NOT NULL,
  `pro_img3` varchar(225) NOT NULL,
  `pro_status` tinyint(1) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_sno`, `city_sno`, `seller_sno`, `category`, `subcategory`, `pro_name`, `pro_desc`, `pro_cost`, `pro_materialsused`, `quantity`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_status`, `datm`) VALUES
(1, 1, 12, 1, 5, 'Nanda Deepam with Lid', 'Mantra Gold Coatings is a renowned name engaged in manufacturing, wholesaling, trading, retailing, supplying, exporting service provider of 24 karat gold coated Lamps, Idols, Artifacts, Kolu Dolls Pooja Articles.', 900, 'Bronze', 20, 'nanda deepam with lid7990.jfif', 'nanda deepam with lid647719.jfif', 'nanda deepam with lid536264.jfif', 1, '2021-04-29 14:22:35'),
(2, 1, 51, 1, 9, 'Bhunes Brass Prabhavali ', 'Brass Prabhavali | Prabhavali frame | Prabhawal | Brass Arch For Home | prabhavali brass frame |Brass Arch | Prabhaval | brass prabhavalli |.\r\nImportant Note:\r\nThis product is for decorative purposes only. Any secondary/alternative use will be at the risk of the user.', 1199, 'Brass', 10, 'bhunes brass prabhavali 902106.jpeg', 'bhunes brass prabhavali 878436.jpeg', 'bhunes brass prabhavali 368700.jpeg', 1, '2021-04-29 14:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_sno` int(11) NOT NULL,
  `users_sno` int(11) NOT NULL,
  `city_sno` int(11) NOT NULL,
  `seller_status` tinyint(1) NOT NULL,
  `aadharcard` varchar(11) NOT NULL,
  `aadharcard_file` varchar(225) NOT NULL,
  `PANcard` varchar(225) NOT NULL,
  `PANcard_file` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_sno`, `users_sno`, `city_sno`, `seller_status`, `aadharcard`, `aadharcard_file`, `PANcard`, `PANcard_file`, `datm`) VALUES
(12, 2, 1, 1, '1234567890', '1234567890.pdf', '12345678901234567890', '12345678901234567890.pdf', '2021-04-06 17:43:41'),
(51, 3, 1, 1, '12121212121', '121212121212.pdf', '121212121212121212121212', '121212121212121212121212.pdf', '2021-04-28 14:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `sno` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `navlogo` varchar(200) NOT NULL,
  `favicon` varchar(200) NOT NULL,
  `footerlogo` varchar(200) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`sno`, `title`, `description`, `navlogo`, `favicon`, `footerlogo`, `datm`) VALUES
(1, 'ARTIGRO', 'The project “Artigo” is a web-based application. This application would be having three logins: sellers, courier services, buyers/viewers. This allows users to go through the products categorywise, citywise, seller wise. The sellers can get into contact with the buyers through the chatbot provided. The mutual communications between the sellers can be done through the groups created based on their categories. The team leads of each category will be acting as the point of contact between and central admin the sellers.', 'logo.png', 'favicon.png', 'logo.png', '2021-01-30 15:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_cat_sno` int(11) NOT NULL,
  `sub_cat_name` varchar(225) NOT NULL,
  `cat_sno` int(11) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_cat_sno`, `sub_cat_name`, `cat_sno`, `datm`) VALUES
(1, 'BRASSWARE', 1, '2021-04-29 14:11:46'),
(2, 'WOODEN', 2, '2021-04-29 14:11:54'),
(3, 'CLAY', 3, '2021-04-29 14:12:05'),
(5, 'DEEPAM LID', 1, '2021-04-29 14:13:06'),
(6, 'AFTABA', 1, '2021-04-29 14:13:14'),
(7, 'SHILPA', 1, '2021-04-29 14:13:26'),
(8, ' BOWL', 1, '2021-04-29 14:13:37'),
(9, 'BHUNES BRASS PRABHAVALI ', 1, '2021-04-29 14:32:46'),
(10, 'AAAHHH', 5, '2021-06-01 14:45:54'),
(11, 'HEHHE', 2, '2021-06-01 14:46:15'),
(12, 'EJJJJJEJJE', 6, '2021-06-01 14:46:42'),
(13, 'DDDDDDDDDDDDDDD', 6, '2021-06-01 14:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `fname` varchar(225) DEFAULT NULL,
  `mname` varchar(225) DEFAULT NULL,
  `lname` varchar(225) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `otp` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category` int(11) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `fname`, `mname`, `lname`, `phone`, `email`, `address`, `pincode`, `password`, `otp`, `status`, `category`, `datm`) VALUES
(2, 'GOTETI JAYACHANDRA MOHAN LAKSHMI', 'NARASIMHA', 'MURTHY', '+919491694195', 'gotetijayachandra@gmail.com', 'MEDACHARLA Village', 531034, 'gotetijayachandra@gmail.com', '33b9b88dc305e07bec038ead29f92526', 1, 2, '2021-04-06 16:53:36'),
(3, 'GOTETI', 'NARASIMHA', 'MURTHY', '9347886639', '18a51a0515@adityatekkali.edu.in', 'MEDACHARLA Village', 531034, '18a51a0515@adityatekkali.edu.in', 'bbd116af50cdbc4480ff4e363385e7a2', 1, 2, '2021-04-28 14:38:56'),
(4, NULL, NULL, NULL, NULL, 'nikhithapusarla@gmail.com', NULL, NULL, 'Artigro@123', 'nikhithapusarla@gmail.com', 1, 1, '2021-04-29 15:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_sno` int(11) NOT NULL,
  `product_sno` int(11) NOT NULL,
  `user_sno` int(11) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_sno`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_sno`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_sno`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`cs_sno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_sno`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_sno`),
  ADD UNIQUE KEY `aadharcard` (`aadharcard`),
  ADD UNIQUE KEY `PANcard` (`PANcard`),
  ADD UNIQUE KEY `seller_sno` (`seller_sno`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_cat_sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
  MODIFY `cs_sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_cat_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
