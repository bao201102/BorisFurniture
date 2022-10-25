-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 04:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_furniture`
--
CREATE DATABASE IF NOT EXISTS `db_furniture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_furniture`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Lamp', b'1'),
(2, 'Chair', b'1'),
(3, 'Accessories', b'1'),
(4, 'Table', b'1'),
(5, 'Sofa', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(2) NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` char(10) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cus_id`, `user_id`, `firstname`, `lastname`, `birthday`, `phone`, `status`) VALUES
(1, 1, 'Bảo', 'Nguyễn', '2002-11-20', '0946777777', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(2) NOT NULL,
  `user_id` int(2) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `phone` char(10) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `img_id` int(2) NOT NULL,
  `prod_image_id` varchar(5) NOT NULL,
  `img_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`img_id`, `prod_image_id`, `img_link`) VALUES
(1, 'img01', 'img01-1.jpg'),
(2, 'img01', 'img01-2.jpg'),
(3, 'img02', 'img02-1.jpg'),
(4, 'img02', 'img02-2.jpg'),
(5, 'img03', 'img03-1.jpg'),
(6, 'img03', 'img03-2.jpg'),
(7, 'img04', 'img04-1.jpg'),
(8, 'img04', 'img04-2.jpg'),
(9, 'img05', 'img05-1.jpg'),
(10, 'img05', 'img05-2.jpg'),
(11, 'img05', 'img05-3.jpg'),
(12, 'img06', 'img06-1.jpg'),
(13, 'img06', 'img06-2.jpg'),
(14, 'img06', 'img06-3.jpg'),
(15, 'img06', 'img06-4.jpg'),
(16, 'img07', 'img07-1.jpg'),
(17, 'img07', 'img07-2.jpg'),
(18, 'img07', 'img07-3.jpg'),
(19, 'img07', 'img07-4.jpg'),
(20, 'img08', 'img08-1.jpg'),
(21, 'img08', 'img08-2.jpg'),
(22, 'img08', 'img08-3.jpg'),
(23, 'img08', 'img08-4.jpg'),
(24, 'img08', 'img08-5.jpg'),
(25, 'img09', 'img09-1.jpg'),
(26, 'img09', 'img09-2.jpg'),
(27, 'img09', 'img09-3.jpg'),
(28, 'img09', 'img09-4.jpg'),
(29, 'img10', 'img10-1.jpg'),
(30, 'img10', 'img10-2.jpg'),
(31, 'img10', 'img10-3.jpg'),
(32, 'img10', 'img10-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(2) NOT NULL,
  `cus_id` int(2) DEFAULT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(2) NOT NULL,
  `order_id` int(2) NOT NULL,
  `prod_id` int(2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(2) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_quantity` int(100) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `category_id` int(2) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_image_id` varchar(5) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_quantity`, `prod_price`, `category_id`, `prod_description`, `prod_image_id`, `status`) VALUES
(1, 'Hanging Light', 15, 470, 1, 'More modern', 'img01', b'1'),
(2, 'Study Lamp', 21, 510, 1, 'Used to put on the desk', 'img02', b'1'),
(3, 'Classic Lamp', 16, 50, 1, 'Traditional style', 'img03', b'1'),
(4, 'Wooden Stool', 16, 350, 2, 'Compact design', 'img04', b'1'),
(5, 'Aether Vasee', 22, 123, 3, 'Comfortable', 'img05', b'1'),
(6, 'Classic Chairs', 24, 512, 2, 'So comfortable', 'img06', b'1'),
(7, 'Wooden Dining Chair', 17, 355, 2, 'Convenient', 'img07', b'1'),
(8, 'Round Coffee Table', 22, 1200, 4, 'So beautiful', 'img08', b'1'),
(9, 'Brown Long Table', 18, 230, 4, 'Suitable for family', 'img09', b'1'),
(10, 'Wooden Bowl', 13, 125, 3, 'Hard to break', 'img10', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `created_date` date NOT NULL,
  `user_type` bit(1) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `user_password`, `created_date`, `user_type`, `status`) VALUES
(1, 'bao201102@gmail.com', 'e69a2bce39e2e49014e75579e046e526', '2022-10-20', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type` bit(1) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type`, `type`) VALUES
(b'0', 'Employee'),
(b'1', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`img_id`,`prod_image_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_name` (`prod_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `img_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
