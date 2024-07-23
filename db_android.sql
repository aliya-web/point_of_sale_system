-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 09:15 AM
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
-- Database: `db_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(5) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `c_remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`, `c_remark`, `user_id`) VALUES
(1, 'ເຄື່ອງໃຊ້ໃນຄົວ', '', 1),
(2, 'ເຄື່ອງສຳອາງ', '', 1),
(3, 'ເຄື່ອງປະດັບ', '', 1),
(6, 'ອຸປະກອນການຮຽນ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(5) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `remark`, `user_id`) VALUES
(1, 'A', '', 1),
(2, 'B', '', 1),
(4, 'C', '', 1),
(7, 'E', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` varchar(50) NOT NULL,
  `cate_id` int(5) NOT NULL,
  `class_id` int(5) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_qty` int(6) NOT NULL,
  `bprice` decimal(12,2) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `img` varchar(80) NOT NULL,
  `user_id` int(5) NOT NULL,
  `p_remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cate_id`, `class_id`, `prod_name`, `prod_qty`, `bprice`, `sprice`, `img`, `user_id`, `p_remark`) VALUES
('8851932434676', 1, 1, 'ຈານ', 1, 5000.00, 10000.00, '../img/09.jpg', 1, ''),
('8851932434677', 2, 2, 'ລີບສະຕິກ', 1, 6000.00, 10000.00, '../img/Screenshot_20211031-152345_Chrome.jpg', 1, ''),
('8851932434678', 3, 4, 'ໂບມັດຜົມ', 0, 7000.00, 10000.00, '../img/22.jpg', 1, ''),
('99999', 1, 1, 'ກ່ອງໃສ່ອາຫານ', 0, 5000.00, 10000.00, '../img/000.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `r_id` int(5) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `r_qty` int(5) NOT NULL,
  `r_bprice` decimal(12,2) NOT NULL,
  `r_amount` decimal(12,2) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `r_remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`r_id`, `prod_id`, `r_qty`, `r_bprice`, `r_amount`, `r_date`, `r_time`, `r_remark`, `user_id`) VALUES
(1, '8851932434676', 10, 5000.00, 50000.00, '2023-06-02', '11:46:24', '', 1),
(2, '8851932434677', 10, 6000.00, 60000.00, '2023-06-02', '12:39:50', '', 1),
(3, '8851932434676', 12, 5000.00, 60000.00, '2023-11-18', '19:01:16', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `s_id` int(5) NOT NULL,
  `bill` int(10) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `s_qty` int(5) NOT NULL,
  `sprice` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `s_date` date NOT NULL,
  `s_time` time NOT NULL,
  `s_remark` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`s_id`, `bill`, `prod_id`, `s_qty`, `sprice`, `amount`, `s_date`, `s_time`, `s_remark`, `user_id`) VALUES
(1, 100000, '8851932434676', 1, 10000.00, 10000.00, '2023-06-02', '11:48:16', '', 3),
(2, 100000, '8851932434677', 1, 10000.00, 10000.00, '2023-06-02', '12:40:56', '', 3),
(3, 100001, '8851932434677', 1, 10000.00, 10000.00, '2023-06-02', '12:42:55', '', 3),
(4, 100002, '8851932434676', 1, 10000.00, 10000.00, '2023-06-02', '12:45:55', '', 3),
(5, 100003, '8851932434677', 1, 10000.00, 10000.00, '2023-06-02', '12:52:26', '', 3),
(6, 100004, '8851932434676', 1, 10000.00, 10000.00, '2023-06-02', '12:54:24', '', 3),
(7, 100005, '8851932434676', 1, 10000.00, 10000.00, '2023-06-02', '13:06:52', '', 3),
(8, 100006, '8851932434676', 1, 10000.00, 10000.00, '2023-06-04', '13:27:36', '', 3),
(9, 100007, '8851932434677', 1, 10000.00, 10000.00, '2023-06-04', '21:01:54', '', 3),
(11, 100009, '8851932434677', 1, 10000.00, 10000.00, '2023-06-04', '21:18:48', '', 3),
(12, 100010, '8851932434676', 1, 10000.00, 10000.00, '2023-06-04', '21:19:05', '', 3),
(13, 100011, '8851932434676', 1, 10000.00, 10000.00, '2023-06-04', '21:19:53', '', 3),
(14, 100012, '8851932434676', 1, 10000.00, 10000.00, '2023-06-05', '14:31:12', '', 3),
(15, 100013, '8851932434677', 1, 10000.00, 10000.00, '2023-06-05', '18:30:49', '', 3),
(16, 100014, '8851932434676', 1, 10000.00, 10000.00, '2023-06-05', '19:05:30', '', 3),
(17, 100015, '8851932434676', 1, 10000.00, 10000.00, '2023-11-18', '19:01:33', '', 3),
(18, 0, '8851932434676', 2, 10000.00, 20000.00, '2023-11-18', '19:02:09', '', 3),
(19, 100016, '8851932434676', 2, 10000.00, 20000.00, '2023-12-12', '18:41:55', '', 3),
(20, 100017, '8851932434676', 1, 10000.00, 10000.00, '2023-12-12', '18:43:36', '', 3),
(21, 100018, '8851932434676', 1, 10000.00, 10000.00, '2023-12-12', '18:46:09', '', 3),
(22, 100019, '8851932434677', 1, 10000.00, 10000.00, '2023-12-12', '18:48:01', '', 3),
(23, 100019, '8851932434676', 1, 10000.00, 10000.00, '2023-12-12', '18:48:14', '', 3),
(24, 100020, '8851932434677', 1, 10000.00, 10000.00, '2023-12-12', '18:51:03', '', 3),
(25, 100021, '8851932434676', 1, 10000.00, 10000.00, '2024-04-03', '11:35:26', '', 3),
(26, 100022, '8851932434676', 1, 10000.00, 0.00, '2024-05-07', '15:51:39', '', 3),
(27, 100023, '8851932434676', 1, 10000.00, 0.00, '2024-05-07', '15:52:13', '', 3),
(28, 100024, '8851932434676', 1, 10000.00, 10000.00, '2024-05-07', '16:41:38', '\n\n\n', 3),
(29, 100025, '8851932434677', 1, 10000.00, 10000.00, '2024-07-04', '10:04:07', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `vill` varchar(50) NOT NULL,
  `dis` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `u_remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `gender`, `dob`, `vill`, `dis`, `prov`, `status`, `tel`, `user_name`, `password`, `u_remark`) VALUES
(1, 'ນາງ ອາລີຢາ', 'ບຸນເຮືອງເສຍໄຖ', 'ຍິງ', '2004-07-18', 'ນາແຄ', 'ວັງວຽງ', 'ວຽງຈັນ', 'ຜູ້ບໍລິຫານ', '98718098', 'aliya', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(3, 'ນາງ ໄມເຍ່ຍ', 'ໂຊຕູ້ກີ', 'ຍິງ', '2004-01-31', 'ໜອງບົວແດງ', 'ຮຸນ', 'ອຸດົມໄຊ', 'ພະນັກງານຂາຍ', '000090080', 'maiyia', 'c81e728d9d4c2f636f067f89cc14862c', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `receives`
--
ALTER TABLE `receives`
  ADD CONSTRAINT `receives_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `receives_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`),
  ADD CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
