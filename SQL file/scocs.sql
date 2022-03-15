-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 03:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gcash_name` varchar(255) NOT NULL,
  `gcash_number` bigint(11) NOT NULL,
  `QRimage` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `gcash_name`, `gcash_number`, `QRimage`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '0b9e46051c3be316cd8a9146ac053c95', 'Jayson', '', 'Atienza', 'scocs@gmail.com', 'Jayson Atienza', 9392799250, 'GcashQR.png', '2022-01-24 16:21:18', '12-03-2022 12:58:34 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Cake', 'by: Jayson A. Atienza', '2022-03-05 09:54:43', NULL),
(2, 'Cake Balls', 'by: Jayson A. Atienza', '2022-03-05 15:47:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL,
  `outgoing` varchar(20) NOT NULL,
  `incoming` varchar(20) NOT NULL,
  `messages` varchar(5000) NOT NULL,
  `dateMSG` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `payment_receipt`, `orderStatus`) VALUES
(1, 2, '2', 1, '2022-03-12 06:36:08', 'Cash On Pickup', NULL, NULL),
(2, 2, '6', 1, '2022-03-12 06:36:42', 'Gcash E-wallet', 'sample-receipt.jpg', NULL),
(3, 2, '2', 1, '2022-03-12 07:08:41', 'Gcash E-wallet', 'sample-receipt.jpg', 'Delivered'),
(4, 2, '2', 1, '2022-03-12 09:06:17', 'Gcash E-wallet', 'sample-receipt.jpg', NULL),
(5, 2, '6', 1, '2022-03-12 09:06:17', 'Gcash E-wallet', 'sample-receipt.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 3, 'in Process', 'Please wait a moment...', '2022-03-12 07:53:36'),
(2, 3, 'Delivered', 'Thank You for ordering', '2022-03-12 07:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `order_id`, `name`, `review`, `reviewDate`, `updationDate`) VALUES
(1, 2, 3, 'Chad Villaluna', 'try2', '2022-03-14 14:08:21', '14-03-2022 10:10:31 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productSize` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productDescription` varchar(255) DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `productName`, `productSize`, `productPrice`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Pumpkin Cheese Cake', '5 x 2', 960, 'This pumpkin cheesecake features a delicious pumpkin spice swirl, rich and creamy cheesecake filling. Very delicious pumpkin cheesecake', 'pumpkin-cheese-cake.jpg', 'pumpkincheesecake.jpg', 'pumpkin-cheesecake.png', 0, 'In Stock', '2022-03-05 10:07:12', NULL),
(2, 1, 1, 'Espresso Cheese Cake', '5 x 2', 960, 'This espresso cheesecake is made with cream cheese, sour cream, chocolate, espresso powder, and biscotti crumb crust.', 'espresso-cheese-cake.jpg', 'espresso-cheesecake2.jpg', 'espresso-cheesecake2.jpg', 0, 'In Stock', '2022-03-05 10:13:46', NULL),
(3, 1, 1, 'White Chocolate Cheese Cake', '5 x 2', 980, 'A simple, creamy dessert for a any occasion. Pairing this white chocolate cheesecake with fresh fruit offsets the richness.', 'white-chocolate-cheese-cake.jpg', 'white-chocolate.jpg', 'White_Chocolate_Cheesecake.jpg', 0, 'In Stock', '2022-03-05 10:18:20', NULL),
(4, 1, 1, 'Turtle Cheese Cake', '5 x 2', 950, 'Rich and creamy, this Turtle Cheesecake is a showstopping dessert perfect for the holidays. Filled with caramel, chocolate, and pecans!', 'turtle-cheese-cake.jpg', 'turtle cheesecake2.jpg', 'Turtle-Cheesecake.jpg', 0, 'In Stock', '2022-03-05 10:23:13', NULL),
(5, 1, 1, 'Caramel Cheese Cake', '5 x 2', 980, 'This Caramel Cheesecake features layers of caramel and smooth, creamy cheesecake on top of graham cracker crust.', 'caramel-cheese-cake.jpg', 'caramel cheesecake2.jpg', 'caramel cheesecake3.jpg', 0, 'In Stock', '2022-03-05 10:37:20', NULL),
(6, 1, 1, 'Dark Chocolate Cheese Cake', '5 x 2', 980, 'This amazingly delicious easy chocolate cheesecake recipe is a perfect combination of light fluffy cream cheese and rich chocolate.', 'dark-chocolate-cheese-cake.jpg', 'dark-chocolate-cheesecake-2.jpg', 'darkchocolatecheesecake3.jpg', 0, 'In Stock', '2022-03-05 10:49:34', NULL),
(7, 1, 1, 'Pistacio Cheese Cake', '6 x 2', 1200, 'This pistachio cheesecake is a simple yet delicious dessert with a smooth and creamy texture', 'pistachio-cheese-cake.jpg', 'pistachio-cheese-cake2.jpg', 'pistachio-cheese-cake3.jpg', 0, 'In Stock', '2022-03-05 11:05:59', NULL),
(8, 1, 1, 'Brownies Cheese Cake', '5 x 2', 1200, 'These delicious cheesecake brownies have a rich, fudgy chocolate base and a light, perfectly sweet cheesecake topping swirled', 'brownies-cheese-cake.jpg', 'Brownie-Cheesecake3.jpg', 'Brownie-Cheesecake2.jpg', 0, 'In Stock', '2022-03-05 11:14:26', NULL),
(9, 1, 2, 'Pistacio Cake', '5 x 2', 650, 'This Pistacio Cake is made with real pistachios! It is soft, fluffy, light and tastes unbelievable with silky cream cheese frosting.', 'pistachio-cake.jpg', 'pistachio-cheese-cake2.jpg', 'pistachio-cheese-cake3.jpg', 0, 'In Stock', '2022-03-05 11:19:11', NULL),
(10, 1, 2, 'Red Velvet', '5 x 2', 650, 'The most incredible Red Velvet Cake is fluffy, soft and buttery with the perfect velvety texture!', 'redvelvet-cake.jpg', 'red-velvet.jpg', 'authentic_red_velvet_cake.jpg', 0, 'In Stock', '2022-03-05 11:25:20', NULL),
(11, 1, 2, 'White Forest', '5 x 2', 650, 'White Forest Cake - vanilla sponge, filled with whipped cream, a cherry and kirsch jam, white chocolate and fresh cherries.', 'white-forest.jpg', 'White-Forest-Cake-2.jpg', 'White-Forest-Cake.jpg', 0, 'In Stock', '2022-03-05 11:35:48', NULL),
(12, 1, 2, 'Cookies and Cream', '5 x 2', 690, 'This cookies & cream sheet cake combines a soft white cake with plenty of Oreo cookies and lightly sweetened whipped cream frosting!', 'cookiesNcream.jpg', 'cookies-and-cream.jpg', 'Cookies-N-Cream-Cake_-3.jpg', 0, 'In Stock', '2022-03-05 11:39:51', NULL),
(13, 1, 3, 'Double Chocolate', '5 x 2', 650, 'This Double Chocolate Cake is a moist, rich chocolate cake that is topped with a fudge chocolate frosting.', 'double-chocolate.jpg', 'double-Chocolate-Cake-2.jpg', 'double-Chocolate-Cake-3.jpg', 0, 'In Stock', '2022-03-05 11:46:52', NULL),
(14, 1, 4, 'Cookies and Cream Drip Cake', '5 x 3', 1800, 'A 3-layer Chocolate Cake, with Oreo Buttercream, a Chocolate Drip, and Even More Oreos Make a Delectable & Showstopping Oreo Drip Cake!', 'cookiesNcream-DripCake.jpg', 'cookiesNcream-DripCake-2.jpg', 'cookiesNcream-DripCake-3.jpg', 0, 'In Stock', '2022-03-05 11:54:55', NULL),
(15, 1, 4, 'Donut Drip Cake', '5 x 3', 2000, 'Light and fluffy donut cake layers frosted with maple buttercream and a pink drip. This donut cake really tastes just like a real donut.', 'donut-DripCake.jpg', 'donut-DripCake.jpeg', 'donut-DripCake-3.jpeg', 0, 'In Stock', '2022-03-05 12:01:12', NULL),
(16, 1, 4, 'Caramel Drip Cake', '5 x 3', 1800, 'Awesome caramel drip cake, choc mud inside with caramel cream, caramel sauce and chocolate ganache. It is one of top sellers in Sugarcoat Creations.', 'caramel-DripCake.jpg', 'caramel-drip-cake.jpg', 'caramel-drip-cake-3.jpeg', 0, 'In Stock', '2022-03-05 12:07:01', NULL),
(17, 2, 5, 'Assorted Butternuts Cake', '12 pcs per box', 250, 'Flavors:\r\nDouble Chocolate, Chocolate Butternuts, Vanilla Strawberry', 'butternuts_3.jpg', 'butternuts_1.jpg', 'butternuts_2.jpg', 0, 'In Stock', '2022-03-05 15:54:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Cheese Cake', '2022-03-05 09:56:10', NULL),
(2, 1, 'Classic Cake', '2022-03-05 11:17:57', NULL),
(3, 1, 'Chocolate Cake', '2022-03-05 11:40:46', NULL),
(4, 1, 'Drip Cake', '2022-03-05 11:48:08', NULL),
(5, 2, 'Butternuts', '2022-03-05 15:52:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-06 05:36:43', '06-03-2022 01:11:57 PM', 1),
(2, 'sheila@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-06 07:44:09', NULL, 1),
(3, 'sheila@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-06 09:26:35', NULL, 1),
(4, 'sheila@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-06 09:39:56', NULL, 0),
(5, 'sheila@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-06 09:40:06', NULL, 1),
(6, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-07 05:07:48', NULL, 1),
(7, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-07 11:17:52', NULL, 1),
(8, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-07 12:31:48', NULL, 1),
(9, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-08 00:53:00', NULL, 1),
(10, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-12 04:44:29', NULL, 1),
(11, 'chad@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-14 13:17:51', '14-03-2022 07:43:06 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingProvince` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingBarangay` varchar(255) NOT NULL,
  `shippingStreet` varchar(255) NOT NULL,
  `shippingZipcode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingProvince`, `shippingCity`, `shippingBarangay`, `shippingStreet`, `shippingZipcode`, `regDate`, `updationDate`) VALUES
(1, 'Jayson Atienza', 'scocs@gmail.com', 9457921208, 'ede79b3fbf673a9a8e9bf3db02aeb7b2', 'Batangas', 'Batangas', 'Kumintang', 'Ilaya', 4200, '2022-02-06 06:13:53', NULL),
(2, 'Chad Villaluna', 'chad@gmail.com', 9457921208, 'ede79b3fbf673a9a8e9bf3db02aeb7b2', 'Oriental Mindoro', 'Calapan City', 'Mahal na Pangalan', 'Ubasan', 5200, '2022-02-04 19:30:50', ''),
(5, 'Sheila Mae Naling', 'sheila@gmail.com', 9179979173, '66dcaf1b4f523b9cc54d3aeba25c1fc1', 'Oriental Mindoro', 'Calapan City', 'Balite', 'Bulalo', 5200, '2022-03-06 07:43:52', '06-03-2022 04:07:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
