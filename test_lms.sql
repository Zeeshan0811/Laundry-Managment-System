-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 02:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(3, '1', '', 'Pickup Only', 3, 2, '0000-00-00 00:00:00', '2022-05-02 03:17:54');

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
(1, 'Order Delivery Type');

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
(1, 2, '1651992300', 11, '99999.00', 6, '0.00', '', '0.00', '599994.00', '', '2022-05-08 06:45:00'),
(2, 2, '1651992300', 12, '269.00', 4, '0.00', '', '0.00', '1076.00', '', '2022-05-08 06:45:00'),
(3, 5, '1651992413', 11, '99999.00', 6, '0.00', 'Weekly', '0.00', '599994.00', '', '2022-05-08 06:46:53'),
(4, 5, '1651992413', 12, '269.00', 4, '0.00', 'Monthly', '0.00', '1076.00', '', '2022-05-08 06:46:53'),
(5, 6, '1651994685', 11, '99999.00', 4, '0.00', 'Weekly', '0.00', '399996.00', '', '2022-05-08 07:24:45'),
(6, 6, '1651994685', 12, '269.00', 6, '0.00', 'Monthly', '0.00', '1614.00', '', '2022-05-08 07:24:45'),
(7, 7, '1651994686', 11, '99999.00', 4, '0.00', 'Weekly', '0.00', '399996.00', '', '2022-05-08 07:24:46'),
(8, 7, '1651994686', 12, '269.00', 6, '0.00', 'Monthly', '0.00', '1614.00', '', '2022-05-08 07:24:46'),
(9, 8, '1651994834', 11, '99999.00', 3, '0.00', 'Weekly', '0.00', '299997.00', '', '2022-05-08 07:27:14'),
(10, 8, '1651994834', 12, '269.00', 4, '0.00', 'Monthly', '0.00', '1076.00', '', '2022-05-08 07:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `nso_generals`
--

CREATE TABLE `nso_generals` (
  `generalId` int(11) NOT NULL,
  `transectionId` varchar(55) NOT NULL,
  `formId` int(11) NOT NULL COMMENT '1 = Order',
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `delivery_type` int(11) NOT NULL COMMENT 'All Setup type = 1',
  `delivery_date` date NOT NULL,
  `purchase_order_number` varchar(55) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandAmount` decimal(10,2) NOT NULL COMMENT 'Total Amount of purchase ',
  `narration` text NOT NULL,
  `payment_type` enum('1','2','3','4') NOT NULL COMMENT '1 = Cash On Delivery, 2 = Online Payment, 3 = Advance Paid, 4 = None',
  `payment_status` enum('1','2','3','4') NOT NULL COMMENT '1 = Pending, 2 = Processing, 3 = Successful, 4= Canceled	',
  `order_status` enum('1','2','3','4') NOT NULL COMMENT '1 = Pending, 2 = Packing, 3 = Packed, 4 = Dispatched',
  `invoice_status` enum('1','2','3','4') NOT NULL COMMENT '1 = Not sent, 2 = Sent',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_generals`
--

INSERT INTO `nso_generals` (`generalId`, `transectionId`, `formId`, `date`, `userId`, `customer`, `delivery_type`, `delivery_date`, `purchase_order_number`, `amount`, `fee`, `discount`, `grandAmount`, `narration`, `payment_type`, `payment_status`, `order_status`, `invoice_status`, `created_at`) VALUES
(1, '1651992277', 2, '2022-05-08', 2, 6, 1, '2022-05-18', '545', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 06:44:37'),
(2, '1651992300', 2, '2022-05-08', 2, 6, 1, '2022-05-18', '545', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 06:45:00'),
(3, '1651992365', 2, '2022-05-08', 2, 6, 1, '2022-05-18', '545', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 06:46:05'),
(4, '1651992394', 2, '2022-05-08', 2, 6, 1, '2022-05-18', '545', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 06:46:34'),
(5, '1651992413', 2, '2022-05-08', 2, 6, 1, '2022-05-18', '545', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 06:46:53'),
(6, '1651994685', 2, '2022-05-08', 2, 6, 1, '2022-05-08', '5646', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 07:24:45'),
(7, '1651994686', 2, '2022-05-08', 2, 6, 1, '2022-05-08', '5646', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 07:24:46'),
(8, '1651994834', 2, '2022-05-08', 2, 6, 1, '2022-05-08', '', '0.00', '0.00', '0.00', '0.00', '', '4', '1', '1', '1', '2022-05-08 07:27:14');

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
  `product_name` varchar(255) NOT NULL,
  `categories` text NOT NULL,
  `pack_size` int(11) NOT NULL,
  `wash_price` decimal(10,2) NOT NULL,
  `rental_price` decimal(10,2) NOT NULL,
  `rental_type` enum('Daily','Weekly','Forthnightly','Monthly') NOT NULL,
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

INSERT INTO `nso_master_stock` (`master_stock_id`, `user_id`, `product_name`, `categories`, `pack_size`, `wash_price`, `rental_price`, `rental_type`, `stock_code`, `gl_code`, `grams`, `max_usage`, `updated_by`, `updated_at`, `created_at`) VALUES
(11, 2, 'Apron', '', 5, '22.00', '99999.00', 'Weekly', '', '', '0.00', 0, 2, '2022-05-02 03:37:59', '2022-05-01 05:14:18'),
(12, 2, 'Begs', '', 1, '259.00', '269.00', 'Monthly', '', '', '0.00', 0, 2, '2022-05-02 03:38:03', '2022-05-01 05:15:59');

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
  `country` varchar(255) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `designation` int(11) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `photo` text NOT NULL,
  `custom_details` text NOT NULL,
  `status` enum('1','2','3','4') NOT NULL COMMENT '1 = Active, 2 = Hold, 3 = Deactivated, 4 = Cancel',
  `updatedBy` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_user`
--

INSERT INTO `nso_user` (`userId`, `type`, `firstName`, `lastName`, `phone`, `email`, `username`, `password`, `rawPass`, `address`, `address_line_2`, `city`, `country`, `zip`, `designation`, `salary`, `photo`, `custom_details`, `status`, `updatedBy`, `updatedAt`, `createdAt`) VALUES
(1, '2', 'Zeeshan', 'Akhtar', '', 'Zeeshan@admin.com', 'Zeeshan@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', 0, '0.00', '', '', '', 0, '0000-00-00 00:00:00', '2021-07-10 17:59:19'),
(2, '4', 'Yoweri', 'Laundries', '54654645', 'admin@admin.com', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'NSW 2450, Australia ', '', '', '', '', 0, '0.00', '', '', '', 0, '0000-00-00 00:00:00', '2021-07-10 17:59:19'),
(4, '1', 'Zeeshan', 'Akhtar', '465464', 'Zeeshan0811@gmail.com', 'Zeeshan0811@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Road#06', 'Mohammadpur', 'Dhaka', 'Bangladesh', '4545', 0, '0.00', '', '', '', 0, '0000-00-00 00:00:00', '2021-08-16 15:28:17'),
(5, '1', 'Zeeshan', 'Akhtar', '465464', 'Zeeshan@tlntrip.com', '', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Road#06', 'Mohammadpur', 'Dhaka', 'Bangladesh', '1207', 0, '0.00', '', '', '', 0, '0000-00-00 00:00:00', '2021-08-24 14:23:38'),
(6, '2', 'Shaan Laundry', '', 'werwerww@asdas', 'asd2342342', '', '1ef02a77f3b6ab87fb96656548f816ea', '330351', '', '', '', '', '', 0, '0.00', '', '{\"trading_name\":\"sdfsdf -- \",\"legal_name\":\" sfdgdfgwe wer wr\",\"abn\":\"wer wrew\",\"customer_code\":\"rwerw rw\",\"gl_code\":\"erwe rwer\",\"business_email\":\"werwerww@asdas\",\"business_phone\":\"asd2342342\",\"customer_status\":null,\"customer_group\":\"\",\"delivery_add_line_1\":\"dfsd\",\"delivery_add_line_2\":\"rte --\",\"delivery_suburb\":\"tyuu\",\"delivery_state\":\"yui\",\"delivery_postcode\":\"uiou\",\"billing_add_line_1\":\"dsdvx\",\"billing_add_line_2\":\"xcvdd\",\"billing_suburb\":\"fdgdg\",\"billing_state\":\"fghf\",\"billing_postcode\":\"tyutyu\"}', '', 2, '0000-00-00 00:00:00', '2022-04-23 23:11:11'),
(7, '8', 'Masters', 'Admin', '54654645', 'ma@admin.com', 'ma@admin.com', '6797f82f504379e72c59879b12594d39', '', 'NSW 2450, Australia ', '', '', '', '', 0, '0.00', '', '', '', 0, '0000-00-00 00:00:00', '2021-07-10 17:59:19'),
(8, '4', 'Mark', 'Jones', '54464645', 'rl@gmail.com', 'rl@gmail.com', '5cbac0db3ab6f167f95fe13684969b87', '607336', '', '', '', '', '', 0, '0.00', '', '', '', 7, '2022-05-12 16:20:17', '2022-05-12 10:20:17'),
(9, '4', 'Peter', 'Shaun', '44654', 'perter@gmail.com', 'perter@gmail.com', '4a2aabb1f1e1ba2465bba17e9763d6b8', '267821', '', '', '', '', '', 0, '0.00', '', '', '', 7, '2022-05-12 16:22:08', '2022-05-12 10:22:08'),
(10, '4', 'Derik', 'Jackson', '4546461', 'derik@gmial.com', 'derik@gmial.com', 'a89eb3eee1a7e5caf87762f1c27c2823', '222504', '', '', '', '', '', 0, '0.00', '', '', '', 7, '2022-05-12 16:30:32', '2022-05-12 10:30:32'),
(11, '4', 'Jafor', 'Iqbal', '464564', 'jafor@gmail.com', 'jafor@gmail.com', 'f9121433c11ca958dab09dea85767a7a', '273446', '', '', '', '', '', 0, '0.00', '', '', '1', 7, '2022-05-12 16:50:18', '2022-05-12 10:50:18'),
(12, '4', 'hkjh', 'jhjkh', 'jjkh654645', 'jgjhG', 'jgjhG', '46d2cc69840d6097950a02df16fa1d52', '667264', '', '', '', '', '', 0, '0.00', '', '', '1', 7, '2022-05-12 16:51:31', '2022-05-12 10:51:31'),
(13, '4', 'hkjh', 'jhjkh', 'jjkh654645', 'jgjhG', 'jgjhG', 'c426d89c80c04636a079da66caabf6c0', '136863', '', '', '', '', '', 0, '0.00', '', '', '1', 7, '2022-05-12 16:51:51', '2022-05-12 10:51:51'),
(14, '4', 'hkjh', 'jhjkh', 'jjkh654645', 'jgjhG', 'jgjhG', '7a6316dbbe3fd792094a0dc9165139ce', '323099', '', '', '', '', '', 0, '0.00', '', '', '1', 7, '2022-05-12 16:52:11', '2022-05-12 10:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `nso_user_vendor_access`
--

CREATE TABLE `nso_user_vendor_access` (
  `nso_access_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `access_type` enum('1','2','3','4','5','6','7','8') NOT NULL COMMENT '2 = Customer, \r\n4 = Vendor\r\n8 = Master Admin',
  `status` enum('1','2','3','4') NOT NULL COMMENT '1 = Active, 2 = Hold, 3 = Deactivated, 4 = Cancel',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_user_vendor_access`
--

INSERT INTO `nso_user_vendor_access` (`nso_access_id`, `user_id`, `vendor_id`, `access_type`, `status`, `created_at`) VALUES
(1, 14, 1, '4', '1', '2022-05-12 10:52:11'),
(2, 14, 2, '4', '1', '2022-05-12 10:52:11'),
(3, 14, 3, '4', '1', '2022-05-12 10:52:11'),
(4, 14, 4, '4', '1', '2022-05-12 10:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `nso_vendors`
--

CREATE TABLE `nso_vendors` (
  `vendor_id` int(11) NOT NULL,
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
  `vendor_status` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '1 = Active, \r\n2 = Hold,\r\n3 = Terminated',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nso_vendors`
--

INSERT INTO `nso_vendors` (`vendor_id`, `trading_name`, `legal_name`, `abn`, `customer_code`, `gl_code`, `business_email`, `business_phone`, `delivery_add_line_1`, `delivery_add_line_2`, `delivery_suburb`, `delivery_state`, `delivery_postcode`, `delivery_country`, `billing_add_line_1`, `billing_add_line_2`, `billing_suburb`, `billing_state`, `billing_postcode`, `billing_country`, `vendor_status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 'Red Laundry', 'RL', '25465', '', '', 'rl@gmail.com', '54464645', '', '', '', '', '', '', '', '', '', '', '', '', '1', 7, 7, '2022-05-12 10:20:17', '2022-05-12 10:20:17'),
(2, 'Pacific Laundry', 'PL', '654654', '', '', 'Pacific@laundry.com', '2564654', '', '', '', '', '', '', '', '', '', '', '', '', '1', 7, 7, '2022-05-12 10:22:08', '2022-05-12 10:22:08'),
(3, 'Stone Laundry', 'SLN', '5484654', '', '', 'sln@gmail.com', '4846456', '', '', '', '', '', '', '', '', '', '', '', '', '1', 7, 7, '2022-05-12 10:30:32', '2022-05-12 10:30:32'),
(4, 'Stone Laundry', 'SLN', '5484654', '', '', 'sln@gmail.com', '4846456', '', '', '', '', '', '', '', '', '', '', '', '', '1', 7, 7, '2022-05-12 10:30:32', '2022-05-12 10:30:32');

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
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nso_generalledger`
--
ALTER TABLE `nso_generalledger`
  MODIFY `generalLedgerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nso_generals`
--
ALTER TABLE `nso_generals`
  MODIFY `generalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `master_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nso_user_vendor_access`
--
ALTER TABLE `nso_user_vendor_access`
  MODIFY `nso_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nso_vendors`
--
ALTER TABLE `nso_vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
