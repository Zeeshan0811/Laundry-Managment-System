-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 07:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `user_agent` varchar(120) CHARACTER SET utf8mb4 NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nso_account`
--

CREATE TABLE `nso_account` (
  `accountId` int(11) NOT NULL,
  `accountType` enum('1','2') NOT NULL COMMENT '1 = Cash , 2 = Bank',
  `accountName` varchar(255) NOT NULL,
  `accountNo` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `branchName` varchar(255) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_allsetup`
--

CREATE TABLE `nso_allsetup` (
  `unitId` int(11) NOT NULL,
  `type` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1= Delivery Type',
  `uri` varchar(99) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_allsetup`
--

INSERT INTO `nso_allsetup` (`unitId`, `type`, `uri`, `title`, `order_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, '1', '', 'Delivery & Pickup', 1, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54'),
(2, '1', '', 'Delivery Only', 2, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54'),
(3, '1', '', 'Pickup Only', 3, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54'),
(5, '2', '', 'Wash Order', 1, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54'),
(6, '2', '', 'Rental Order', 2, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54'),
(7, '2', '', 'Pickup Order', 3, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `nso_cateogory`
--

CREATE TABLE `nso_cateogory` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_deleted_data`
--

CREATE TABLE `nso_deleted_data` (
  `id` int(11) NOT NULL,
  `type` varchar(55) NOT NULL,
  `deleted_id` int(11) NOT NULL,
  `from_table` varchar(55) NOT NULL,
  `value1` text NOT NULL,
  `value2` text NOT NULL,
  `value3` text NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_form`
--

CREATE TABLE `nso_form` (
  `form_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_form`
--

INSERT INTO `nso_form` (`form_id`, `title`) VALUES
(1, 'Delivery Type'),
(2, 'Order Type');

-- --------------------------------------------------------

--
-- Table structure for table `nso_generalledger`
--

CREATE TABLE `nso_generalledger` (
  `generalLedgerId` int(11) NOT NULL,
  `generalsId` int(11) NOT NULL,
  `transectionId` varchar(55) NOT NULL,
  `productId` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `rental_type` varchar(55) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `narration` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_generalledger`
--

INSERT INTO `nso_generalledger` (`generalLedgerId`, `generalsId`, `transectionId`, `productId`, `unit_price`, `quantity`, `fee`, `rental_type`, `discount`, `total`, `narration`, `created_at`) VALUES
(11, 9, '1652971092', 22, '5.00', 5, '0.00', 'Weekly', '0.00', '25.00', '', '2022-05-19 14:38:12'),
(12, 9, '1652971092', 23, '11.00', 10, '0.00', 'Weekly', '0.00', '110.00', '', '2022-05-19 14:38:12'),
(13, 10, '1652973100', 22, '5.00', 3, '0.00', 'Weekly', '0.00', '15.00', '', '2022-05-19 15:11:40'),
(14, 10, '1652973100', 23, '11.00', 6, '0.00', 'Weekly', '0.00', '66.00', '', '2022-05-19 15:11:40'),
(15, 11, '1653037012', 22, '5.00', 4, '0.00', 'Weekly', '0.00', '20.00', '', '2022-05-20 08:56:52'),
(16, 11, '1653037012', 23, '11.00', 6, '0.00', 'Weekly', '0.00', '66.00', '', '2022-05-20 08:56:52'),
(17, 12, '1653038296', 22, '5.00', 5, '0.00', 'Weekly', '0.00', '25.00', '', '2022-05-20 09:18:16'),
(18, 12, '1653038296', 23, '11.00', 7, '0.00', 'Weekly', '0.00', '77.00', '', '2022-05-20 09:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `nso_generals`
--

CREATE TABLE `nso_generals` (
  `generalId` int(11) NOT NULL,
  `transectionId` varchar(55) NOT NULL,
  `purchase_order_number` varchar(55) NOT NULL,
  `order_type` int(11) NOT NULL COMMENT 'form id = 2',
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL COMMENT 'Company Id from nso_vendor Table',
  `delivery_type` int(11) NOT NULL COMMENT 'All Setup type = 1',
  `delivery_date` date NOT NULL,
  `pickup_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandAmount` decimal(10,2) NOT NULL COMMENT 'Total Amount of purchase ',
  `narration` text NOT NULL,
  `payment_type` enum('1','2','3','4') NOT NULL COMMENT '1 = Cash On Delivery, 2 = Online Payment, 3 = Advance Paid, 4 = None',
  `payment_status` enum('1','2','3','4') NOT NULL COMMENT '1 = Pending, 2 = Processing, 3 = Successful, 4= Canceled	',
  `order_status` enum('1','2','3','4','5') NOT NULL COMMENT '1 = Pending, 2 = Packing, 3 = Packed, 4 = Dispatched, 5 = Canceled',
  `invoice_status` enum('1','2','3','4') NOT NULL COMMENT '1 = Not sent, 2 = Sent',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_generals`
--

INSERT INTO `nso_generals` (`generalId`, `transectionId`, `purchase_order_number`, `order_type`, `date`, `userId`, `vendor_id`, `customer`, `delivery_type`, `delivery_date`, `pickup_date`, `amount`, `fee`, `discount`, `grandAmount`, `narration`, `payment_type`, `payment_status`, `order_status`, `invoice_status`, `created_at`) VALUES
(9, '1652971092', '123', 5, '2022-05-19', 22, 1, 2, 1, '2022-05-21', '2022-05-25', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '4', '1', '2022-05-19 14:38:12'),
(10, '1652973100', '2255', 5, '2022-05-19', 22, 1, 2, 1, '2022-05-24', '2022-05-28', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '2', '1', '2022-05-19 15:11:40'),
(11, '1653037012', '9988', 7, '2022-05-20', 22, 1, 3, 3, '2022-05-20', '2022-05-20', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-20 08:56:52'),
(12, '1653038296', '999', 5, '2022-05-20', 22, 1, 3, 1, '2022-05-27', '2022-05-30', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '2', '1', '2022-05-20 09:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `nso_images`
--

CREATE TABLE `nso_images` (
  `image_id` int(11) NOT NULL,
  `image_type` int(11) NOT NULL COMMENT '1 = Product Image, 2 = Allsetup Image',
  `reference_id` varchar(55) NOT NULL COMMENT 'pro_id from nso_product',
  `path` varchar(99) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_order` int(11) NOT NULL,
  `visible` enum('1','2') NOT NULL COMMENT '1 = Visible, 2 = Hidden',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_inbox`
--

CREATE TABLE `nso_inbox` (
  `inbox_id` int(11) NOT NULL,
  `first_name` varchar(99) NOT NULL,
  `last_name` varchar(99) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(99) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_master_stock`
--

CREATE TABLE `nso_master_stock` (
  `master_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `categories` text NOT NULL,
  `pack_size` int(11) NOT NULL,
  `wash_price` decimal(10,2) NOT NULL,
  `rental_price` decimal(10,2) NOT NULL,
  `rental_type` enum('Daily','Weekly','Forthnightly','Monthly') NOT NULL,
  `lost_price` decimal(10,2) NOT NULL,
  `stock_code` varchar(255) NOT NULL,
  `gl_code` varchar(255) NOT NULL,
  `grams` decimal(10,2) NOT NULL,
  `max_usage` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_master_stock`
--

INSERT INTO `nso_master_stock` (`master_stock_id`, `user_id`, `vendor_id`, `customer_id`, `product_name`, `categories`, `pack_size`, `wash_price`, `rental_price`, `rental_type`, `lost_price`, `stock_code`, `gl_code`, `grams`, `max_usage`, `updated_by`, `updated_at`, `created_at`) VALUES
(22, 22, 1, 0, 'Apron', '', 1, '30.00', '5.00', 'Weekly', '20.00', '', '', '0.00', 0, 22, '2022-05-19 13:22:43', '2022-05-19 13:22:43'),
(23, 22, 1, 0, 'Linen', '', 3, '20.00', '11.00', 'Weekly', '15.00', '', '', '0.00', 0, 22, '2022-05-19 13:26:19', '2022-05-19 13:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `nso_product`
--

CREATE TABLE `nso_product` (
  `pro_id` int(11) NOT NULL,
  `productId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `formulationId` int(11) NOT NULL,
  `date` date NOT NULL,
  `brandName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_type` int(11) NOT NULL COMMENT 'Asset type = 25',
  `pro_genericId` int(11) NOT NULL,
  `pro_category` int(11) NOT NULL,
  `pro_company` int(11) NOT NULL,
  `pro_importer` int(11) NOT NULL,
  `pro_weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Product Strength',
  `pro_weight_2` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_instruction` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchasesPrice` decimal(10,2) NOT NULL,
  `salesPrice` decimal(10,2) NOT NULL COMMENT 'Single MRP Price',
  `discount` decimal(10,2) NOT NULL COMMENT 'Discount in percentage',
  `cardPrice` decimal(10,2) NOT NULL COMMENT 'Discount on card price',
  `image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiblity` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Visible, 2 = Not Visible',
  `availability` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Available, 2 = Not',
  `requiredPrescription` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Not, 2 = Required',
  `updatedAt` datetime NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL COMMENT 'updated user id',
  `single_mrp_price` decimal(10,2) NOT NULL,
  `stripe_mrp_price` decimal(10,2) NOT NULL,
  `box_mrp_price` decimal(10,2) NOT NULL,
  `cartoon_mrp_price` decimal(10,2) NOT NULL,
  `stripe_qty` int(11) NOT NULL,
  `box_qty` int(11) NOT NULL,
  `carton_qty` int(11) NOT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_subscriber`
--

CREATE TABLE `nso_subscriber` (
  `subscriber_id` int(11) NOT NULL,
  `type` enum('1','2') NOT NULL COMMENT '1 = Subscriber, 2 = Contact form',
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('1','2') DEFAULT '1' COMMENT '1 = Active, 2 = Disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nso_sysconfig`
--

CREATE TABLE `nso_sysconfig` (
  `id` int(11) NOT NULL,
  `company_name` varchar(99) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `company_logo` text NOT NULL,
  `phone` varchar(55) NOT NULL,
  `phone_2` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(55) NOT NULL,
  `opening_hour` varchar(255) NOT NULL,
  `facebook` varchar(99) NOT NULL,
  `twitter` varchar(99) NOT NULL,
  `instagram` varchar(99) NOT NULL,
  `linkedin` varchar(99) NOT NULL,
  `pinterest` varchar(99) NOT NULL,
  `youtube` varchar(99) NOT NULL,
  `delivery_charge_inside_dhaka` decimal(10,2) NOT NULL,
  `delivery_charge_outside_dhaka` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_sysconfig`
--

INSERT INTO `nso_sysconfig` (`id`, `company_name`, `slogan`, `company_logo`, `phone`, `phone_2`, `email`, `address`, `website`, `opening_hour`, `facebook`, `twitter`, `instagram`, `linkedin`, `pinterest`, `youtube`, `delivery_charge_inside_dhaka`, `delivery_charge_outside_dhaka`, `created_at`) VALUES
(1, 'Yoweri Laundries', 'slogannnn', '4214f26b919a36d10d8f7b57fc6e5f5b.jpg', '019xxxxxxx', '019xxxxxxx', 'info@lms.com', 'NSW 2450, Australia ', 'https://www.lms.com.au/', 'Mon - Fri: 8am - 11pm <br/>Sat - Sun: 8am - 12pm', 'https://www.facebook.com/lms', 'twitter', 'https://instagram.com/lms', 'linked', 'pint', 'https://www.youtube.com/channel/UCYdcV8n4Civ-xtGdZo0dngw/featured', '60.00', '80.00', '2019-09-12 13:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `nso_user`
--

CREATE TABLE `nso_user` (
  `userId` int(11) NOT NULL,
  `type` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '2 = Customer, \r\n4 = Vendor\r\n8 = Master Admin',
  `firstName` text NOT NULL COMMENT 'Customer trading name',
  `lastName` text NOT NULL,
  `phone` varchar(35) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `rawPass` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `address_line_2` varchar(555) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(99) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `designation` int(11) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `photo` text NOT NULL,
  `status` enum('1','2','3','4') NOT NULL COMMENT '1 = Active, 2 = Hold, 3 = Deactivated, 4 = Cancel',
  `created_by` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_user`
--

INSERT INTO `nso_user` (`userId`, `type`, `firstName`, `lastName`, `phone`, `email`, `username`, `password`, `rawPass`, `address`, `address_line_2`, `city`, `state`, `country`, `zip`, `designation`, `salary`, `photo`, `status`, `created_by`, `updatedBy`, `updatedAt`, `createdAt`) VALUES
(1, '8', 'Zeeshan', 'Akhtar', '484654674', 'ma@admin.com', 'ma@admin.com', '6797f82f504379e72c59879b12594d39', '', 'Sydney, Australia', '', '', '', '', '', 0, '0.00', '', '1', 0, 0, '0000-00-00 00:00:00', '2021-07-10 17:59:19'),
(22, '4', 'Michel', 'Johnson', '654646', 'admin@admin.com', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Park Road', '26', 'Sydney', 'NSW', 'Australia', '365', 0, '0.00', '', '1', 0, 22, '2022-05-18 20:47:54', '2022-05-18 14:47:54'),
(23, '2', 'Mollie ', 'Jacob', '456546', 'customer@admin.com', 'customer@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Road 25', 'Belford', 'Sydney', 'NSW', 'Australia', '25878', 0, '0.00', '', '1', 22, 22, '0000-00-00 00:00:00', '2022-05-19 06:15:05'),
(33, '2', 'Amelia', 'Stefina', '6546544', 'amelia@gmail.com', 'amelia@gmail.com', 'b201c27b9b7afa7591ca6badc1a1722b', '519514', '', '', '', '', '', '', 0, '0.00', '', '1', 22, 22, '0000-00-00 00:00:00', '2022-05-20 08:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `nso_user_vendor_access`
--

CREATE TABLE `nso_user_vendor_access` (
  `nso_access_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `access_type` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '2 = Customer, \r\n4 = Vendor\r\n8 = Master Admin',
  `status` enum('1','2','3','4') NOT NULL COMMENT '1 = Active, 2 = Hold, 3 = Deactivated, 4 = Cancel',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_user_vendor_access`
--

INSERT INTO `nso_user_vendor_access` (`nso_access_id`, `user_id`, `vendor_id`, `customer_id`, `company_id`, `access_type`, `status`, `created_at`) VALUES
(1, 22, 1, 0, 0, '4', '1', '2022-05-18 14:47:54'),
(2, 22, 1, 23, 2, '2', '1', '2022-05-19 06:15:05'),
(12, 22, 1, 33, 3, '2', '1', '2022-05-20 08:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `nso_vendors`
--

CREATE TABLE `nso_vendors` (
  `vendor_id` int(11) NOT NULL,
  `type` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '2 = Customer, 4 = Vendor 8 = Master Admin',
  `trading_name` varchar(255) NOT NULL,
  `legal_name` varchar(255) NOT NULL,
  `abn` varchar(99) NOT NULL,
  `customer_code` varchar(99) NOT NULL,
  `gl_code` varchar(99) NOT NULL,
  `business_email` varchar(99) NOT NULL,
  `business_phone` varchar(55) NOT NULL,
  `delivery_add_line_1` varchar(255) NOT NULL,
  `delivery_add_line_2` varchar(255) NOT NULL,
  `delivery_suburb` varchar(55) NOT NULL,
  `delivery_state` varchar(55) NOT NULL,
  `delivery_postcode` varchar(25) NOT NULL,
  `delivery_country` varchar(55) NOT NULL,
  `billing_add_line_1` varchar(255) NOT NULL,
  `billing_add_line_2` varchar(255) NOT NULL,
  `billing_suburb` varchar(55) NOT NULL,
  `billing_state` varchar(55) NOT NULL,
  `billing_postcode` varchar(55) NOT NULL,
  `billing_country` varchar(55) NOT NULL,
  `vendor_status` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Hold, 3 = Deactivated, 4 = Cancel',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_vendors`
--

INSERT INTO `nso_vendors` (`vendor_id`, `type`, `trading_name`, `legal_name`, `abn`, `customer_code`, `gl_code`, `business_email`, `business_phone`, `delivery_add_line_1`, `delivery_add_line_2`, `delivery_suburb`, `delivery_state`, `delivery_postcode`, `delivery_country`, `billing_add_line_1`, `billing_add_line_2`, `billing_suburb`, `billing_state`, `billing_postcode`, `billing_country`, `vendor_status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, '4', 'Sturck Laundry', 'STL', '546546', '', '', 'stl@gmail.com', '1654654', '', '', '', '', '', '', '', '', '', '', '', '', '1', 1, 1, '2022-05-18 14:47:54', '2022-05-18 14:47:54'),
(2, '2', 'Hotel Blue Stone', 'HBS', '154454', 'hjks', 'hks', 'hotelblue@gmail.com', '5488485', 'Road 55/C', 'Lake view', 'Sydney', 'NSW', '654654', 'Australia', 'Road 55/C', 'Lake view', 'Sydney', 'NSW', '654654', 'Australia', '1', 22, 22, '2022-05-19 06:15:05', '2022-05-19 06:15:05'),
(3, '2', 'Sea Bird', 'ksjdj', 'k', 'j', 'klj', 'jkl', 'j', 'h', 'jh', 'kj', 'kj', 'hkjh', '', 'jhk', 'hjk', 'jhkj', '', 'kjh', '', '1', 22, 22, '2022-05-20 08:22:16', '2022-05-20 08:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nso_account`
--
ALTER TABLE `nso_account`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `nso_allsetup`
--
ALTER TABLE `nso_allsetup`
  ADD PRIMARY KEY (`unitId`);

--
-- Indexes for table `nso_cateogory`
--
ALTER TABLE `nso_cateogory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `nso_deleted_data`
--
ALTER TABLE `nso_deleted_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nso_form`
--
ALTER TABLE `nso_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `nso_generalledger`
--
ALTER TABLE `nso_generalledger`
  ADD PRIMARY KEY (`generalLedgerId`);

--
-- Indexes for table `nso_generals`
--
ALTER TABLE `nso_generals`
  ADD PRIMARY KEY (`generalId`);

--
-- Indexes for table `nso_images`
--
ALTER TABLE `nso_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `nso_inbox`
--
ALTER TABLE `nso_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `nso_master_stock`
--
ALTER TABLE `nso_master_stock`
  ADD PRIMARY KEY (`master_stock_id`);

--
-- Indexes for table `nso_product`
--
ALTER TABLE `nso_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `nso_subscriber`
--
ALTER TABLE `nso_subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `nso_sysconfig`
--
ALTER TABLE `nso_sysconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nso_user`
--
ALTER TABLE `nso_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `nso_user_vendor_access`
--
ALTER TABLE `nso_user_vendor_access`
  ADD PRIMARY KEY (`nso_access_id`);

--
-- Indexes for table `nso_vendors`
--
ALTER TABLE `nso_vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_account`
--
ALTER TABLE `nso_account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_allsetup`
--
ALTER TABLE `nso_allsetup`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nso_cateogory`
--
ALTER TABLE `nso_cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_deleted_data`
--
ALTER TABLE `nso_deleted_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_form`
--
ALTER TABLE `nso_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nso_generalledger`
--
ALTER TABLE `nso_generalledger`
  MODIFY `generalLedgerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nso_generals`
--
ALTER TABLE `nso_generals`
  MODIFY `generalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nso_images`
--
ALTER TABLE `nso_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_inbox`
--
ALTER TABLE `nso_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_master_stock`
--
ALTER TABLE `nso_master_stock`
  MODIFY `master_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nso_product`
--
ALTER TABLE `nso_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_subscriber`
--
ALTER TABLE `nso_subscriber`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nso_sysconfig`
--
ALTER TABLE `nso_sysconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nso_user`
--
ALTER TABLE `nso_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `nso_user_vendor_access`
--
ALTER TABLE `nso_user_vendor_access`
  MODIFY `nso_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nso_vendors`
--
ALTER TABLE `nso_vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
