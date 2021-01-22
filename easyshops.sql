-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 08:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyshops`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mob_no` int(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_shop_id` int(11) NOT NULL,
  `order_name` varchar(256) NOT NULL,
  `order_rate` int(11) NOT NULL,
  `order_purchase_rate` float NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `username`, `user_id`, `mob_no`, `order_id`, `order_product_id`, `order_shop_id`, `order_name`, `order_rate`, `order_purchase_rate`, `order_quantity`, `order_image`) VALUES
(102, 'isuraj86', 1, 2147483647, 1, 1, 2, 'good day', 10, 7.42, 3, 'good_day.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `placed_product_id` int(11) NOT NULL,
  `placed_shop_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `mob_no` int(255) NOT NULL,
  `order_name` varchar(256) NOT NULL,
  `order_rate` int(11) NOT NULL,
  `order_purchase_rate` float NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `full_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_shop_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_manufacturer` varchar(256) NOT NULL,
  `product_quantities` int(11) NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `product_purchase_rate` int(11) NOT NULL,
  `net_purchase_rate` float NOT NULL,
  `product_sale_rate` int(11) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `c_gst` int(11) NOT NULL,
  `s_gst` int(11) NOT NULL,
  `product_mfg` date NOT NULL,
  `product_exp` date NOT NULL,
  `product_barcode` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_shop_id`, `product_name`, `product_manufacturer`, `product_quantities`, `product_image`, `product_purchase_rate`, `net_purchase_rate`, `product_sale_rate`, `product_mrp`, `c_gst`, `s_gst`, `product_mfg`, `product_exp`, `product_barcode`) VALUES
(1, 1, 2, 'good day', 'britainia', 39, 'good_day.jpg', 7, 7.42, 10, 10, 3, 3, '2006-12-20', '2006-12-20', 123456789),
(4, 2, 2, 'Cream Biscuit 1', 'britainia', 61, 'good_day.jpg', 7, 7.42, 10, 10, 3, 3, '2006-12-20', '2006-12-20', 123456789),
(5, 1, 2, 'nothing', 'britainia', 2, 'good_day.jpg', 1, 1.06, 1, 10, 3, 3, '2020-01-21', '2020-01-21', 0),
(8, 1, 2, 'good day', 'britainia', 39, 'good_day.jpg', 7, 7.42, 10, 10, 3, 3, '2006-12-20', '2006-12-20', 123456789),
(9, 2, 2, 'Cream Biscuit 1', 'britainia', 61, 'good_day.jpg', 7, 7.42, 10, 10, 3, 3, '2006-12-20', '2006-12-20', 123456789),
(10, 1, 2, 'nothing', 'britainia', 2, 'good_day.jpg', 1, 1.06, 1, 10, 3, 3, '2020-01-21', '2020-01-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `categories_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `categories_title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`categories_id`, `shop_id`, `categories_title`) VALUES
(1, 2, 'Biscuits'),
(2, 2, 'Grocery'),
(3, 2, 'Cold drinks\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_shop_id` int(11) NOT NULL,
  `sell_amount` int(255) NOT NULL,
  `sell_date` date NOT NULL,
  `purchase_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_shop_id`, `sell_amount`, `sell_date`, `purchase_amount`) VALUES
(5, 2, 30, '2021-01-21', 22.26);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(256) NOT NULL,
  `shop_type` varchar(256) NOT NULL,
  `shop_image` varchar(256) NOT NULL DEFAULT 'shop.jpg',
  `shop_owner_username` varchar(256) NOT NULL,
  `shop_owner_name` varchar(256) NOT NULL,
  `shop_address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_name`, `shop_type`, `shop_image`, `shop_owner_username`, `shop_owner_name`, `shop_address`) VALUES
(2, 'Easyshop', 'general store', 'shop.jpg', 'isuraj86', 'Suraj', 'Maranpur, Gaya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(256) NOT NULL,
  `user_lastname` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `user_mobileno` bigint(255) NOT NULL,
  `user_address` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_randSalt` varchar(256) NOT NULL DEFAULT 'ilovemycountry'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_role`, `username`, `user_mobileno`, `user_address`, `user_email`, `user_password`, `user_randSalt`) VALUES
(1, 'Suraj', 'Kumar', 'Admin', 'suraj123', 9162741700, 'Maranpur, Bypass Road, Gaya', 'surajkr727785@gmail.com', 'ilusYA.MG4nBA', 'ilovemycountry'),
(10, 'Akash', 'Kumar', 'Subscriber', 'akash123', 12345678, 'Easyshop, Maranpur, Bypass Road', 'sdfghj@sdfghj.dfgh', 'ilusYA.MG4nBA', 'ilovemycountry'),
(11, 'Suraj ', 'Kumar', 'Sales', 'isuraj86', 123456789, 'gaya', 'surajkr727785@gmail.com', 'ilusYA.MG4nBA', 'ilovemycountry'),
(13, 'Shivam', 'Kumar', 'Subscriber', 'shivam123', 123456789, 'gaya', 'nothing@gmail.com', 'ilusYA.MG4nBA', 'ilovemycountry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
