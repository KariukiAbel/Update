-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 11:12 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `user_id`, `phone`) VALUES
(1, 'victor', 2, '714309973'),
(2, 'test name', 3, '0714309973'),
(3, 'victor', 2, '714309973'),
(4, '', 6, ''),
(5, '', 68, ''),
(6, '', 71, ''),
(7, '', 73, ''),
(8, '', 75, ''),
(9, '', 77, ''),
(10, 'First supplier', 78, '714309973'),
(11, 'victor', 79, '714309973'),
(12, 'wwe', 80, 'qwe'),
(13, 'gfgsvahjs', 81, '642378194763'),
(14, 'sk qbja', 82, 'kjsb');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `units`, `supplier_id`, `unit_description`, `cost`) VALUES
(1, 3, 4, 1, 3, '', 0),
(2, 3, 4, 1, 3, '', 0),
(3, 3, 1, 1, 4, '', 0),
(4, 3, 1, 1, 4, '', 0),
(5, 3, 3, 1, 3, '', 0),
(6, 3, 5, 2, 3, '', 0),
(7, 3, 4, 1, 3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `unit_price` float NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `supplier_id`, `unit_description`, `brand`, `available`, `description`, `quantity`, `unit_price`, `sku`, `images`, `color`, `size`, `other_desc`) VALUES
(4, 'Cool Product', 3, 'Per Dozen', 'New Brand', '1', 'This is a test product description', 100, 100, '12345', '220px_spottedquoll_2005_seanmcclean.jpg', '', '', ''),
(13, 'wefjk', 3, '', 'test brand', '1', 'dfejb', 13, 123, 'dd2kejf2', 'walden-pond.jpg', 'fekwj', 'ddkfe', ''),
(20, 'test', 5, 'test', '', '', 'test', 76.5, 150, '12345', '', 'test', 'test', 'test'),
(50, 'wf', 3, 'sf', 'asf', '1', 'sjkf', 12, 213, '1231', '', 'Edit OK', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`id`, `color`, `quantity`, `description`, `product_id`, `images`) VALUES
(1, 'white', 10, 'These are ream papers', 1, ''),
(2, 'white', 10, 'These are ream papers', 2, ''),
(3, 'white', 10, 'These are ream papers', 3, ''),
(4, 'red', 2, 'lorem ipsj qw njqvqdwj behjs kq', 4, ''),
(5, 'white', 100, 'These are ream papers', 5, ''),
(6, 'White, Khaki', 20, 'High Quality Printing papers', 6, '120px_rainforest_bluemountainsnsw.jpg,180px_koala_ag1.jpg,180px_ormiston_pound.jpg,180px_wobbegong.jpg,');

-- --------------------------------------------------------

--
-- Table structure for table `product_suppliers`
--

CREATE TABLE `product_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_suppliers`
--

INSERT INTO `product_suppliers` (`id`, `name`, `phone`, `email`, `location`, `pin`) VALUES
(3, 'PEMACO PAPAERS &amp; STATIONERS', '714309973', 'pemaco@email.com', 'Menengai II HSE\r\nRiver Road\r\nBasement\r\nRm No. 29', '00200'),
(4, 'new Supplier', '714309973', 'hred@gmail.com', 'Nairobi', 'A003664646A');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` float NOT NULL,
  `unit_price` float NOT NULL,
  `vat` float NOT NULL,
  `vat_pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `customer_id`, `name`, `description`, `quantity`, `total_price`, `unit_price`, `vat`, `vat_pin`, `sub_total`, `date`, `time`, `supplier_id`) VALUES
(2, 2, 'papers', 'Aldestor long', 250, 8750, 35, 1206.9, '', 7543.1, '2019-06-16', '17:26:00', 3),
(3, 2, 'Papers', 'These are ream papers', 100, 9000, 90, 1241.38, '', 7758.62, '2019-07-16', '12:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ready_sale`
--

CREATE TABLE `ready_sale` (
  `id` int(11) NOT NULL,
  `fraction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `buying_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ready_sale`
--

INSERT INTO `ready_sale` (`id`, `fraction`, `quantity`, `selling_price`, `buying_price`, `sku`, `product_id`) VALUES
(7, '1/4', 0, 38, '33', '748', 14),
(8, '1/8', 0, 19, '16.5', '748', 14),
(9, '1/4', 46, 42.5, '37.5', '12345', 20),
(10, '1/2', 10, 85, '75', '12345', 20),
(11, '1/2', 100, 50, '50', '12345', 4),
(12, '1/4', 9, 25, '25', '12345', 4),
(13, '1/2', 10, 65, '61', 'dd2kejf2', 13);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `receipt_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fraction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `sub_total` float NOT NULL,
  `vat` float NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `receipt_id`, `product_name`, `sku`, `fraction`, `quantity`, `unit_price`, `sub_total`, `vat`, `supplier_id`) VALUES
(19, '12345678', 'smdbjh', '748', '1/4', 4, 38, 152, 176.32, 3),
(20, '12345678', 'smdbjh', '748', '1/8', 8, 19, 152, 176.32, 3),
(21, '12345678', 'smdbjh', '748', '1/4', 4, 38, 152, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `user_id`, `phone`) VALUES
(1, 'victor', 1, '714309973'),
(2, 'victor', 3, '714309973'),
(3, 'supplier', 4, '0714309973'),
(4, 'Supplier A', 5, '0712345678'),
(5, 'test name', 83, '714309973');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`) VALUES
(1, 1, 'victor@email.comaS', '$2y$10$xrafmFYqUed28g1/oUYq1.3rP.3oTX2/jahVktBrcGV5mXm9fSn46'),
(2, 1, 'victor', '$2y$10$eGbgTng.xOQOprPYV/zIHe.nvA4UIegZwKp/DUc0ehn3cQrr44mhO'),
(3, 2, 'victornguli', '$2y$10$DvYssBJP7yq1z9KWWoUFO.oAkFkySePRAf9xZlYkSxpu6h4uOxeSe'),
(4, 2, 'supplier', '$2y$10$ebYRj9nj9rYpZ/2miLUJjOP0hSg32jnsKJG9Bwna5PPcan6Y2GWsO'),
(5, 2, 'myusername', '$2y$10$IwjEFOWtatt4wjBZ1NvqU.ItnevhHi67AG.WjkOj9HEbFJN.MwXha'),
(78, 1, 'root', '$2y$10$ssSsO1gUiPMOVUDN7felCuw60Uu3onXV3k9Ar5.5nb0eeX6ehRhQW'),
(79, 1, 'username233', '$2y$10$TmB3BvoPAgrKZ80hdQq8seZDmb9m10yGqGGPpIZV2bG5LUjMaC96i'),
(80, 1, 'victorwefe', '$2y$10$0FsvwFZb611PeJjLH.9LAeYlhY77d6yPihfohe7W1wEz.pqQsVRf.'),
(81, 1, 'supplier2', '$2y$10$FSRO03S5A7CR4y4Yb5VsA.vzz0uV9FF3qoFjDdkwU9A6s2nGuct4a'),
(82, 1, 'fwnwj', '$2y$10$waAOUsuVTskwYLBh4HIYyuEKPWM/2.dETClZ9y1ABxsF4nVTO7Clm'),
(83, 2, 'test', '$2y$10$ogQnZ9VLRfYZnHfZg4EP7Ol9qTQ7pUJ.WyodKPLp9LXLzCeu7MlHe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `product_suppliers`
--
ALTER TABLE `product_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ready_sale`
--
ALTER TABLE `ready_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_suppliers`
--
ALTER TABLE `product_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ready_sale`
--
ALTER TABLE `ready_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
