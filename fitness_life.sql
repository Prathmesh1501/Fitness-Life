-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220503.92457c1607
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Madhav Batkale', 'Maddy', '2b10435032f537ce08893c0962878796'),
(3, 'Rushikesh Mahadik', 'Rushi', 'eb4fcac30a12596187ad6f4aab529ddf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Dumbells', 'Food_Category_367.PNG', 'Yes', 'Yes'),
(2, 'Plates', 'Food_Category_996.PNG', 'Yes', 'Yes'),
(3, 'Gym Ball', 'Food_Category_788.jpeg', 'Yes', 'Yes'),
(4, 'Gym Bag', 'Food_Category_757.jpeg', 'Yes', 'Yes'),
(5, 'Gym Belt', 'Food_Category_913.jpeg', 'Yes', 'Yes'),
(6, 'Gym Mat', 'Food_Category_370.jpeg', 'Yes', 'Yes'),
(7, 'Hand Gloves', 'Food_Category_22.jpeg', 'Yes', 'Yes'),
(8, 'Machine', 'Food_Category_497.PNG', 'Yes', 'Yes'),
(9, 'Protein', 'Food_Category_903.PNG', 'Yes', 'Yes'),
(10, 'Rods', 'Food_Category_206.PNG', 'Yes', 'Yes'),
(11, 'Ropes', 'Food_Category_652.PNG', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `payment`) VALUES
(1, '', '249', 1, '249', '2022-04-20 07:34:46', 'Ordered', 'Pooja Madhav Batkale', '8390332259', 'madhavbatkale869@gmail.com', 'Chiplun', 'Cash On Delivery'),
(2, '', '249', 1, '249', '2022-04-21 07:15:04', 'ordered', 'Rushi Ramesh Mahadik', '8390332253', 'madhavbatkale869@gmail.com', 'chiplun', 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, '1 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-4019.PNG', 1, 'Yes', 'Yes'),
(2, '3 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-9499.PNG', 1, 'Yes', 'Yes'),
(3, '5 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-4263.PNG', 1, 'Yes', 'Yes'),
(4, '7.5 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-667.PNG', 1, 'Yes', 'Yes'),
(5, '10 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-407.PNG', 1, 'Yes', 'Yes'),
(6, '20 KG Dumbell', 'Best Quality and Non Rustable Best Grip Easy to Handle', '449', 'Product-Name-3277.jpg', 1, 'Yes', 'Yes'),
(7, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-5014.jpeg', 4, 'Yes', 'Yes'),
(8, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-3138.jpeg', 4, 'Yes', 'Yes'),
(9, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-2819.jpeg', 4, 'Yes', 'Yes'),
(10, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-2332.jpeg', 4, 'Yes', 'Yes'),
(11, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-1180.jpeg', 4, 'Yes', 'Yes'),
(12, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '499', 'Product-Name-4073.jpeg', 4, 'Yes', 'Yes'),
(13, '2.50KG Plate', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-5724.PNG', 2, 'Yes', 'Yes'),
(14, '5 KG Plate', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-4458.PNG', 2, 'Yes', 'Yes'),
(15, '7.5 KG Plate', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-4910.PNG', 2, 'Yes', 'Yes'),
(16, '10 KG Plate', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-411.PNG', 2, 'Yes', 'Yes'),
(17, '15 KG PLltes', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-535.PNG', 2, 'Yes', 'Yes'),
(18, '20 KG Plate', 'Best Quality and Non Rustable Best Grip Easy to Handle', '459', 'Product-Name-2315.PNG', 2, 'Yes', 'Yes'),
(19, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-3076.jpeg', 3, 'Yes', 'Yes'),
(20, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-1700.jpeg', 3, 'Yes', 'Yes'),
(21, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-968.jpeg', 3, 'Yes', 'Yes'),
(22, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-327.jpeg', 3, 'Yes', 'Yes'),
(23, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-4627.jpeg', 3, 'Yes', 'Yes'),
(24, 'Gym Ball', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-7530.jpeg', 3, 'Yes', 'Yes'),
(25, 'Gym Belt', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-9254.jpeg', 5, 'Yes', 'Yes'),
(26, 'Gym Bag', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-1972.jpeg', 5, 'Yes', 'Yes'),
(27, 'Gym Belt', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-1544.jpeg', 5, 'Yes', 'Yes'),
(28, 'Gym Belt', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-3471.jpeg', 5, 'Yes', 'Yes'),
(29, 'Gym Belt', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-8532.jpeg', 5, 'Yes', 'Yes'),
(30, 'Gym Mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-2289.jpeg', 6, 'Yes', 'Yes'),
(31, 'Gym Mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-1294.jpeg', 6, 'Yes', 'Yes'),
(32, 'Gym Mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-4157.jpeg', 6, 'Yes', 'Yes'),
(33, 'Gym Mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-1316.jpeg', 6, 'Yes', 'Yes'),
(34, 'Gym Mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-5918.jpeg', 6, 'Yes', 'Yes'),
(35, 'Gym mat', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-8810.jpeg', 6, 'Yes', 'Yes'),
(36, 'Hand Gloves', 'Best Quality and Non Rustable Best Grip Easy to Handle', '199', 'Product-Name-6492.jpeg', 7, 'Yes', 'Yes'),
(37, 'Hand Gloves', 'Best Quality and Non Rustable Best Grip Easy to Handle', '249', 'Product-Name-7719.jpeg', 7, 'Yes', 'Yes'),
(38, 'Hand Gloves', 'Best Quality and Non Rustable Best Grip Easy to Handle', '349', 'Product-Name-4184.jpeg', 7, 'Yes', 'Yes'),
(39, 'Hand Gloves', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-3500.jpeg', 7, 'Yes', 'Yes'),
(40, 'Bench', 'Best Quality and Non Rustable Best Grip Easy to Handle', '4399', 'Product-Name-2745.PNG', 8, 'Yes', 'Yes'),
(41, 'Workout Machine', 'Best Quality and Non Rustable Best Grip Easy to Handle', '10999', 'Product-Name-5192.PNG', 8, 'Yes', 'Yes'),
(42, 'Tricep Machine', 'Best Quality and Non Rustable Best Grip Easy to Handle', '7999', 'Product-Name-8108.PNG', 8, 'Yes', 'Yes'),
(43, 'Whey Protein', 'Best Quality and Non Rustable Best Grip Easy to Handle', '499', 'Product-Name-4388.PNG', 9, 'Yes', 'Yes'),
(44, 'Weight Gainer', 'Best Quality and Non Rustable Best Grip Easy to Handle', '599', 'Product-Name-1823.PNG', 9, 'Yes', 'Yes'),
(45, 'Tricep Rod', 'Best Quality and Non Rustable Best Grip Easy to Handle', '299', 'Product-Name-4649.PNG', 10, 'Yes', 'Yes'),
(46, 'Simple Rod', 'Best Quality and Non Rustable Best Grip Easy to Handle', '399', 'Product-Name-657.PNG', 10, 'Yes', 'Yes'),
(47, 'Rope', 'Best Quality and Non Rustable Best Grip Easy to Handle', '149', 'Product-Name-4060.PNG', 11, 'Yes', 'Yes');

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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



