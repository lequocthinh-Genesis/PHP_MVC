-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnw_ct275`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(201, 16, 29, 'Wing Gundam', 256000, 1, '3D-wing-gundam-zero-custom-model_600.jpg'),
(202, 16, 31, 'GOLD', 2000000, 1, 'GOLD.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(17, 16, 'Lê Quốc Thịnh', 'user1@gmail.com', '123456789', 'Chất lượng sản phẩm rất tốt');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(27, 16, 'Lê Quốc Thịnh', '123456789', 'user1@gmail.com', 'Thanh toán khi nhận hàng', 'ktxA, 3/2, Ninh Kiều, Việt Nam - 5624', ', Lightning Gundam (2) , Breaker Helious Yurai (1) , HGUC 1144 (1) ', 2484000, '25-Apr-2022', 'Đã xác nhận'),
(28, 16, 'Lê Quốc Thịnh', '123456789', 'user1@gmail.com', 'Thanh toán khi nhận hàng', 'KtxA, 3/2, Ninh Kiều,Cần Thơ, Việt Nam - Mã Giảm Giá: 159357', ', KZT04 (1) , GOLD (2) , Lightning Gundam (2) ', 6378000, '25-Apr-2022', 'Chưa xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`) VALUES
(29, 'Wing Gundam', 'Wing Gundam bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 256000, '3D-wing-gundam-zero-custom-model_600.jpg'),
(30, 'Breaker Helious Yurai', 'Breaker Helious bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 750000, 'Breaker_Helios_Yurai.jpg'),
(31, 'GOLD', 'GOLD Gundam bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 2000000, 'GOLD.jpg'),
(32, 'HGUC 1144', 'HGUC 1144 bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 356000, 'hguc-1144-gm-custom.jpg'),
(34, 'Lightning Gundam', 'Lightning Gundam bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 689000, 'lightning-gundam-heavy-weapon (1).jpg'),
(35, 'O2R Messer', 'O2R Messer bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 650000, 'Me-O2R_Messer_F01.jpg'),
(37, 'KZT04', 'KZT04 Gundam bán ở FNG Shop có thiết kế gọn nhẹ nên dễ tham gia vào nhiều loại nhiệm vụ khác nhau. Đây là mẫu mobile suit sẽ phát huy khả năng tốt hơn khi hoạt động theo nhóm. Vũ khí mang theo cũng khá nhẹ nhàng với Beam Saber, Bullpup Machine Gun và khiên chắn.', 1000000, 'kzt04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(16, 'user 1', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(17, 'admin FNG', 'fng@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(104, 16, 29, 'Wing Gundam', 256000, '3D-wing-gundam-zero-custom-model_600.jpg'),
(105, 16, 30, 'Breaker Helious Yurai', 750000, 'Breaker_Helios_Yurai.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
