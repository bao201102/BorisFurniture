-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2022 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_furniture`
--
CREATE DATABASE IF NOT EXISTS `db_furniture` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_furniture`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Chair');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_employee`
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
-- Cấu trúc bảng cho bảng `tbl_image`
--

CREATE TABLE `tbl_image` (
  `img_id` int(2) NOT NULL,
  `prod_image_id` varchar(5) NOT NULL,
  `img_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_image`
--

INSERT INTO `tbl_image` (`img_id`, `prod_image_id`, `img_link`) VALUES
(1, 'img01', 'https://cdn11.bigcommerce.com/s-ntuushs0ci/images/stencil/500x659/products/15137/67259/DSC04693__21769.1658860193.jpg?c=2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
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
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_id` int(2) NOT NULL,
  `prod_id` int(2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(2) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_quantity` int(100) NOT NULL,
  `prod_price` int(100) NOT NULL,
  `category_id` int(2) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_image_id` varchar(5) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_quantity`, `prod_price`, `category_id`, `prod_description`, `prod_image_id`, `status`) VALUES
(1, 'Amalfi Lounge Chair', 10, 519, 1, 'Adjustable outdoor lounge chair. \r\nStainless steel frame in Slate finish. \r\nWhite outdoor seat and back cushion. \r\nOther finish options available. ', 'img01', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
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
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `user_password`, `created_date`, `user_type`, `status`) VALUES
(1, 'bao201102@gmail.com', 'e69a2bce39e2e49014e75579e046e526', '2022-09-21', b'1', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_type` bit(1) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`img_id`,`prod_image_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_id`,`prod_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_name` (`prod_name`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `img_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
