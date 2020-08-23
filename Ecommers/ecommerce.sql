-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 01:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  `Url_Key` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Parent_Category_Id` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Category_Name`, `Url_Key`, `Image`, `Status`, `Description`, `Parent_Category_Id`, `Created_At`, `Updated_At`) VALUES
(1, 'Electronics', 'electronics', 'electronics.jpg', 1, 'Consumer electronics are products used in a domestic or personal context, in contrast to items used for business, industrial, or professional recording purposes. These can include television sets, video players and recorders.', 0, '2020-02-29 11:07:58', '2020-03-05 15:14:34'),
(2, 'Mobiles', 'mobiles', 'mobiles.jpg', 1, 'Mobile phones are no more merely a part of our lives. Whether its to stay connected with friends and family or to keep abreast of important developments around the world, mobiles are no longer for sending a text or making a call. From budget to state-of-t', 1, '2020-02-29 11:14:53', '2020-02-29 11:40:57'),
(3, 'Televisions', 'televisions', 'televisions.jpg', 1, 'Welcome to India No.1 TV Store. From 500+ Brands | 3000+ Selection & complete range of Pre & Post-Purchase services to cater to all your needs & eliminate all your worries. Benefits on buying from our site - No Cost EMI, Free Installation, Complete TV Pro', 1, '2020-02-29 11:22:06', '2020-02-29 16:30:50'),
(4, 'Furniture', 'furniture', 'furniture.jpg', 1, 'Your home is complete, only when you have the right furniture pieces, along with the people you love and adore. From living room furniture such as a coffee table to bedroom furniture, you are bound to be spoilt for choice with the sheer variety. Oh, not t', 0, '2020-02-29 11:30:23', NULL),
(5, 'Sofas', 'sofas', 'sofas.jpg', 1, 'Considered to be THE furniture that is used to give a statement, Sofas are the first item that someone notices when they visit your home And hence, we have provided a one-stop destination for you to choose the right one!\r\nSofa Seaters: 1 seater, 2 seaters', 4, '2020-02-29 11:34:34', NULL),
(6, 'Dining Tables', 'dining-tables', 'dining-tables.jpg', 1, ' the family that eats together, stays together. We have a dining table for every family size - 2 seaters, 4 seaters, 6 seaters, 8 seater dining tables at unimaginable prices #JustHere. 10 years durability certified wooden dining tables, glass top dining.', 4, '2020-02-29 11:40:23', '2020-02-29 12:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `Id` int(11) NOT NULL,
  `Page_Title` varchar(255) NOT NULL,
  `Url_Key` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`Id`, `Page_Title`, `Url_Key`, `Status`, `Content`, `Created_At`, `Updated_At`) VALUES
(1, 'Home', 'home', 1, 'Home Page Content', '2020-02-15 08:28:24', '2020-02-28 09:13:18'),
(2, 'About Us', 'about-us', 1, 'About Us Content', '2020-02-15 08:28:45', '2020-02-28 09:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `Url_Key` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Short_Description` varchar(255) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Product_Name`, `SKU`, `Url_Key`, `Image`, `Status`, `Description`, `Short_Description`, `Price`, `Stock`, `Created_At`, `Updated_At`) VALUES
(1, 'Samsung Galaxy A50', 'SM-A505FZBDINS', 'samsung-galaxy-a50', 'samsung-galaxy-a50.jpg', 1, 'Do a lot more than just text and call your friends with the Samsung Galaxy A50 smartphone. The Exynos 9610 Octa-core Processor makes multitasking a breeze. Take your photography skills a notch higher with its revolutionary Triple Camera System that compri', '4 GB RAM | 64 GB ROM | Expandable Upto 512 GB\r\n16.26 cm (6.4 inch) Full HD+ Display\r\n25MP + 5MP + 8MP | 25MP Front Camera\r\n4000 mAh Lithium-ion Battery\r\nExynos 9610 Processor\r\nSuper AMOLED Display', '12999', 100, '2020-02-29 11:48:26', '2020-02-29 17:23:36'),
(2, 'Mi A3', 'MZB7975IN', 'mi-a3', 'mi-a3.jpg', 1, 'Boasting a reflective coating and a nano-level holographic pattern, this smartphone from Mi looks jawdropping. It also features a Qualcomm Snapdragon 665 AIE processor that packs a punch when it comes to smartphone performance. And, if you’re an entertain', '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB\r\n15.44 cm (6.08 inch) HD+ Display\r\n48MP + 8MP + 2MP | 32MP Front Camera\r\n4030 mAh Battery\r\nQualcomm Snapdragon 665 Processor', '11999', 100, '2020-02-29 11:51:54', '2020-02-29 16:34:17'),
(3, 'Samsung Series 7 Ultra HD (4K) LED Smart TV', 'UA43NU7100KXXL', 'samsung-series-7-ultra-hd-4k-led-smart-tv', 'samsung-series-7-ultra-hd-4k-led-smart-tv.jpg', 1, 'Beat stress, exhaustion, and fatigue by relaxing and watching a movie on this Samsung UHD TV. It comes equipped with technologies such as High Dynamic Range (HDR) and PurColour to help you enjoy better clarity and vibrant colours on the TV screen. The 1', 'Supported Apps: Netflix|Hotstar|Youtube\r\nOperating System: Tizen\r\nResolution: Ultra HD (4K) 3840 x 2160 Pixels\r\nSound Output: 20 W\r\nRefresh Rate: 100 Hz', '47999', 100, '2020-02-29 12:05:24', '2020-02-29 13:44:30'),
(4, 'Mi LED Smart TV 4A Pro', ' L43M5-AN', 'mi-led-smart-tv-4a-pro', 'mi-led-smart-tv-4a-pro.jpg', 1, 'Enjoy television viewing like never before with this 108-cm (43) Full HD LED TV from Mi. Apart from featuring 1 GB of RAM and 8 GB of storage space, this TV also comes with cinematic sound quality, a rich range of colours, and multiple connectivity option', 'Supported Apps: Hotstar|Youtube\r\nOperating System: Android (Google Assistant & Chromecast in-built)\r\nResolution: Full HD 1920 x 1080 Pixels\r\nSound Output: 20 W\r\nRefresh Rate: 60 Hz', '21999', 100, '2020-02-29 12:08:04', '2020-02-29 13:44:40'),
(5, 'Muebles Casa Marco Leatherette 6 Seater Sofa', 'MARCO-LHS-L-SHAPE', 'muebles-casa-marco-leatherette-6-seater-sofa', 'muebles-casa-marco-leatherette-6-seater-sofa.jpg', 1, 'Upholestry: Leatherette\r\nFilling Material: Foam\r\nW x H x D: 259.08 cm x 83.82 cm x 226.06 cm (8 ft 6 in x 2 ft 9 in x 7 ft 5 in)\r\nLeft Facing\r\nDelivery Condition: Pre Assembled (Ready to Use)', 'Upholestry: Leatherette\r\nFilling Material: Foam\r\nW x H x D: 259.08 cm x 83.82 cm x 226.06 cm (8 ft 6 in x 2 ft 9 in x 7 ft 5 in)\r\nLeft Facing\r\nDelivery Condition: Pre Assembled (Ready to Use)', '44099', 100, '2020-02-29 12:12:04', '2020-02-29 13:44:54'),
(6, 'Muebles Casa Alvin Fabric 6 Seater Sofa', 'MC022', 'muebles-casa-alvin-fabric-6-seater-sofa', 'muebles-casa-alvin-fabric-6-seater-sofa.jpg', 1, 'Upholestry: Polycotton\r\nFilling Material: Foam\r\nW x H x D: 261.62 cm x 83.82 cm x 223.52 cm (8 ft 7 in x 2 ft 9 in x 7 ft 3 in)\r\nLeft Facing\r\nDelivery Condition: Pre Assembled (Ready to Use)', 'Upholestry: Polycotton\r\nFilling Material: Foam\r\nW x H x D: 261.62 cm x 83.82 cm x 223.52 cm (8 ft 7 in x 2 ft 9 in x 7 ft 3 in)\r\nLeft Facing\r\nDelivery Condition: Pre Assembled (Ready to Use)', '43349', 100, '2020-02-29 12:13:44', '2020-02-29 13:45:25'),
(7, 'Woodness Winston Upholstered Solid Wood 4 Seater Dining Set', 'Winston-Upholstered', 'woodness-winston-upholstered-solid-wood-4-seater-dining-set', 'woodness-winston-upholstered-solid-wood-4-seater-dining-set.jpg', 1, 'Manufactured from eco-friendly Grade A Malaysian Rubberwood, this dining set features a simple silhouette with well balanced proportions creating a clean and contemporary look. Straight and sturdy legs perfectly support the table while ensuring maximum le', 'Table Top Material: Solid Wood\r\nChair Frame: Solid Wood\r\nTable (W x H x D): 110 cm x 75 cm x 70 cm (3 ft 7 in x 2 ft 5 in x 2 ft 3 in)\r\nSeating Capacity: 4 Seater\r\nDelivery Condition: Knock Down - Delivered in non-assembled pieces, installation by service', '10890', 100, '2020-02-29 12:15:31', '2020-02-29 13:45:37'),
(8, 'RoyalOak Poznan Metal 4 Seater Dining Set', ' Poznan', 'royaloak-poznan-metal-4-seater-dining-set', 'royaloak-poznan-metal-4-seater-dining-set.jpg', 1, 'Boasting of a contemporary design that fits well with most modern dining rooms, this four-seater Milan dining set from Royal Oak is going to be a beautiful addition to your home. Its chairs feature padded backrests and seats, making it as comfortable as i', 'Table Top Material: Glass\r\nChair Frame: Metal\r\nTable (W x H x D): 129.5 cm x 76.3 cm x 48.1 cm (4 ft 2 in x 2 ft 6 in x 1 ft 6 in)\r\nSeating Capacity: 4 Seater\r\nDelivery Condition: Knock Down - Delivered in non-assembled pieces, installation by service par', '22000', 100, '2020-02-29 12:16:52', '2020-02-29 16:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `Id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`Id`, `product_id`, `category_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 5),
(6, 6, 5),
(7, 7, 6),
(8, 8, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Url_Key` (`Url_Key`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Url_Key` (`Url_Key`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD UNIQUE KEY `Url_Key` (`Url_Key`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeignKeyProductID` (`product_id`),
  ADD KEY `ForeignKeyCategoryID` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `ForeignKeyCategoryID` FOREIGN KEY (`category_id`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeignKeyProductID` FOREIGN KEY (`product_id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
