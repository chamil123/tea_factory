-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 08:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tea_fac`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtytea_stok`
--

CREATE TABLE `dtytea_stok` (
  `dst_id` int(11) NOT NULL,
  `dtt_id` int(11) NOT NULL,
  `remaining_qty` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dtytea_stok`
--

INSERT INTO `dtytea_stok` (`dst_id`, `dtt_id`, `remaining_qty`, `added_date`) VALUES
(1, 5, 251, '2018-10-27 08:03:49'),
(2, 1, 20, '2018-10-27 08:04:17'),
(3, 2, 10, '2018-10-27 08:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payment`
--

CREATE TABLE `monthly_payment` (
  `mpay_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `monthly_payment`
--

INSERT INTO `monthly_payment` (`mpay_id`, `supp_id`, `date`, `total_amount`, `status`) VALUES
(1, 1, '2018-10-18', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `dtt_id` int(11) NOT NULL,
  `p_quantity` double NOT NULL,
  `p_date` date NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `dtt_id`, `p_quantity`, `p_date`, `remarks`) VALUES
(1, 5, 200, '2018-10-27', 'ssdsds'),
(2, 1, 20, '2018-10-27', 'ssdsds'),
(3, 5, 51, '2018-10-27', 'ssdsds'),
(4, 2, 10, '2018-10-14', 'zzzzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Subject Clerk'),
(3, 'Manager'),
(4, 'Store Keeper');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `passbook_no` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` char(225) NOT NULL,
  `id_no` varchar(15) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `email` char(100) NOT NULL,
  `supp_type` varchar(30) NOT NULL,
  `payment_met` varchar(20) NOT NULL,
  `regi_date` date NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=delete,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `passbook_no`, `name`, `address`, `id_no`, `mobile_no`, `email`, `supp_type`, `payment_met`, `regi_date`, `remarks`, `status`) VALUES
(1, '000014', 'Ranga Dissanayaka', 'No 32,udumulla, Monaragala', '891970986V', 0, 'ranganachamil11@gmail.com', 'With Transport', 'Cash', '2018-05-02', 'skkkjnjndd', 1),
(3, '000001', 'Lashan Herath', 'kaluthata', '884715321V', 714586025, 'lashan@yahoo.com', 'With Transport', 'Cheque', '2018-05-04', 'aaaaaaaaa', 1),
(4, '00016', 'Dananjani', 'Pinnaduwa,Galle', '917894561v', 714270061, '', 'Hand Deliver', 'Cash', '2018-10-07', 'ok', 1),
(5, '00018', 'dissanayaka', 'udumulla,monaragala', '891970988v', 714270061, '', 'With Transport', 'Cheque', '2018-10-07', 'ok', 1),
(6, '00019', 'Chamil 6', '    monaragala', '735810722V', 714270061, 'ranganachamil1@gmail.com', 'Hand Deliver', 'Cash', '2018-10-07', 'ok', 1),
(7, '00020', 'lalitha', 'monagala', '735810753V', 714270065, 'ranganacha@gmail.com', 'With Transport', 'Cheque', '2018-10-07', 'ok', 1),
(8, '00021', 'kalutotage', 'monagala', '735810754V', 714270064, 'ranga@gmail.com', 'Hand Deliver', 'Cash', '2018-10-07', 'ok', 1),
(9, '00022', 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '745896693v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cheque', '2018-10-08', 'ok', 1),
(10, '00027', 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '897251569v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-13', 'ssss', 1),
(11, '00028', 'kalum', 'monaragala', '917251789v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-13', 'aaaa', 1),
(12, '00029', 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '897251569v', 714270061, 'ranganachamil11@gmail.com', 'With Transport', 'Cheque', '2018-10-13', 'aaaaaa', 1),
(13, '00030', 'ranga2', 'no 03 welikeda, rajagiriya, srilanka', '735810723V', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-13', 'zzzz', 1),
(16, '00031', 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '897251789v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cheque', '2018-10-13', 'aaaaazz', 1),
(17, '000301', 'Chamil', 'no 03 welikeda, rajagiriya, srilanka', '735810721V', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-13', 'czcx', 1),
(18, '000214', 'chamera', ' no 03 welikeda, rajagiriya, srilanka', '745896121v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-17', 'zzzzzzzzz', 0),
(19, '00015', 'nimal', 'no 03 welikeda, rajagiriya, srilanka', '897251799v', 714270061, 'ranganachamil11@gmail.com', 'Hand Deliver', 'Cash', '2018-10-26', 'aaaaa', 1),
(20, '00057', 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '878251569v', 714270061, 'ranganachamil11@gmail.com', 'With Transport', 'Cheque', '2018-10-27', 'qqqqqqqq', 1),
(21, '00047', 'nalani', 'no 03 welikeda, rajagiriya, srilanka', '877251799v', 714270078, 'ranganachamil11@gmail.com', 'With Transport', 'Cheque', '2018-10-27', 'nalani', 1),
(22, '00058', 'kamala', 'no 03 welikeda, rajagiriya,', '867251799v', 714270087, 'ranganachamil11@gmail.com', 'With Transport', 'Cash', '2018-10-27', 'wwwwwww', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advpayment`
--

CREATE TABLE `tbl_advpayment` (
  `advpay_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `advance_amount` double NOT NULL,
  `pay_method` varchar(10) NOT NULL,
  `pay_date` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Advance payment for Tea leaves suppliers' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_advpayment`
--

INSERT INTO `tbl_advpayment` (`advpay_id`, `supp_id`, `advance_amount`, `pay_method`, `pay_date`, `remarks`, `status`) VALUES
(1, 1, 2000, 'Cash', '2018-10-22', 'zzzzz', 1),
(2, 1, 500, 'Cash', '2018-10-22', 'aaa', 1),
(4, 4, 3000, 'Cash', '2018-10-23', 'aaaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(256) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branch_name`, `location`, `remarks`, `created_at`, `status`) VALUES
(1, 'asd', '', '', '2018-09-26 09:47:10', 0),
(2, 'asd', '', '', '2018-09-26 09:47:25', 1),
(3, 'standard', '', '', '2018-09-26 13:36:41', 1),
(4, 'pinnaduwa', 'Galle', 'ok', NULL, 1),
(5, 'Galahena', 'Weligama', 'ok', NULL, 1),
(6, 'Pitipana', 'Colombo', 'aaaaa', NULL, 1),
(7, 'warella', 'Deniyaya', 'ssss', NULL, 1),
(8, 'Yakkalamulla', 'Galle', 'dddd', '2018-10-15 00:41:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `de_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` text,
  `nic_no` varchar(12) NOT NULL,
  `mobile` char(10) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `remarks` text,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(15) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`de_id`, `name`, `address`, `nic_no`, `mobile`, `tel`, `email`, `remarks`, `status`, `created_at`, `update_at`, `password`) VALUES
(1, 'ashan', '#15, main street', '', '713221221', '', 'ashan@gmail.com', 'sds', 1, '2018-09-24 17:28:31', '2018-10-17 17:17:24', '123'),
(2, '', '', '', '', '', '', '', 1, '2018-09-27 17:57:34', '2018-10-17 17:17:24', '123'),
(3, 'kapila', 'galle', '897251799v', '0451289456', '', '', 'zzzz', 1, '2018-09-29 12:05:16', '2018-10-17 17:17:24', '123'),
(4, 'ranga', 'no 03 welikeda, rajagiriya, srilanka', '897251569v', '714270061', '0112547894', 'ranganachamil11@gmail.com', 'ok', 0, NULL, '2018-10-17 17:17:24', '123'),
(5, 'Dissanayaka', 'Monaragala', '735811423V', '714270061', '558745632', 'ranganachamil11@gmail.com', 'aaaaaa', 1, NULL, '2018-10-17 17:17:24', '123'),
(6, 'Chamil', 'Galle', '897251889v', '723947704', '915678912', 'ranganachamil15@gmail.com', 'sssss', 1, '2018-10-16 01:04:30', '2018-10-17 17:17:24', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dailycolection`
--

CREATE TABLE `tbl_dailycolection` (
  `dc_id` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `net_qu` double NOT NULL,
  `tlt_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dailycolection`
--

INSERT INTO `tbl_dailycolection` (`dc_id`, `supp_id`, `id`, `net_qu`, `tlt_id`, `total_price`, `date`, `remarks`) VALUES
(1, 6, 4, 88, 2, 5280, '2018-10-17 15:32:52', 'sadasdasdasd'),
(2, 1, 5, 25, 1, 1500, '2018-10-17 15:33:23', 'sadasdasdasd'),
(3, 1, 4, 20, 1, 1200, '2018-10-19 16:43:08', 'zzzzzz'),
(4, 4, 5, 30, 2, 1800, '2018-10-19 16:43:30', 'aaa'),
(5, 4, 7, 45, 1, 2700, '2018-10-19 16:43:59', 'sssss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dryteatype`
--

CREATE TABLE `tbl_dryteatype` (
  `dtt_id` int(11) NOT NULL,
  `drytea_type` varchar(500) NOT NULL,
  `dtprice` double NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dryteatype`
--

INSERT INTO `tbl_dryteatype` (`dtt_id`, `drytea_type`, `dtprice`, `remarks`, `date`) VALUES
(1, 'AAA Tea', 100, 'ok', '2018-10-08 08:20:25'),
(2, 'abc tea', 50, 'ok', '2018-10-08 08:21:08'),
(3, 'good leaves', 0, 'ok', '2018-10-08 11:37:07'),
(4, 'good leaves', 0, 'ok', '2018-10-08 11:38:42'),
(5, 'Green Tea', 600, 'aaaa', '2018-10-27 03:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(45) NOT NULL,
  `invoice_dealer_name` varchar(200) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `invoice_no`, `invoice_dealer_name`, `invoice_date`, `invoice_total`, `user_id`, `invoice_status`) VALUES
(1, 'INV/TEA/20181259', 'Ranga Dissanayaka', '2018-10-27', 1450, 3, 0),
(2, 'INV/TEA/20181247', 'Lashan Herath', '2018-10-25', 35600, 3, 0),
(3, 'INV/TEA/20180220', 'Ranga Dissanayaka', '2018-10-02', 550, 3, 0),
(4, 'INV/TEA/20180312', 'Lashan Herath', '2018-10-27', 8500, 3, 0),
(5, 'INV/TEA/20180417', 'kalutotage', '2018-10-27', 2300, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_item`
--

CREATE TABLE `tbl_invoice_item` (
  `inv_item_id` int(11) NOT NULL,
  `inv_item_type` varchar(45) NOT NULL,
  `inv_item_price` double NOT NULL,
  `inv_item_qty` double NOT NULL,
  `inv_item_amount` double NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_item`
--

INSERT INTO `tbl_invoice_item` (`inv_item_id`, `inv_item_type`, `inv_item_price`, `inv_item_qty`, `inv_item_amount`, `invoice_id`) VALUES
(1, '1', 100, 10, 1000, 1),
(2, '2', 50, 5, 250, 1),
(3, '1', 100, 1, 100, 1),
(4, '2', 50, 2, 100, 1),
(5, '2', 50, 500, 25000, 2),
(6, '1', 100, 100, 10000, 2),
(7, '2', 50, 12, 600, 2),
(8, '2', 50, 10, 500, 3),
(9, '2', 50, 1, 50, 3),
(10, '5', 600, 10, 6000, 4),
(11, '1', 100, 15, 1500, 4),
(12, '2', 50, 20, 1000, 4),
(13, '2', 50, 12, 600, 5),
(14, '5', 600, 2, 1200, 5),
(15, '1', 100, 5, 500, 5),
(16, '4', 0, 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaves`
--

CREATE TABLE `tbl_leaves` (
  `tlt_id` int(11) NOT NULL,
  `tl_type` varchar(20) NOT NULL,
  `price` double NOT NULL COMMENT '1kg',
  `remarks` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_leaves`
--

INSERT INTO `tbl_leaves` (`tlt_id`, `tl_type`, `price`, `remarks`, `date`, `status`) VALUES
(1, 'Higher Quality  ', 90, 'ok', '2018-10-08 11:42:53', 1),
(2, 'Low Quality', 60, 'zzz', '2018-10-15 19:32:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sensors_data`
--

CREATE TABLE `tbl_sensors_data` (
  `sensors_data_id` int(11) NOT NULL,
  `sensors_temperature_data` varchar(30) NOT NULL,
  `sensors_data_date` date NOT NULL,
  `sensors_data_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sensors_data`
--

INSERT INTO `tbl_sensors_data` (`sensors_data_id`, `sensors_temperature_data`, `sensors_data_date`, `sensors_data_time`) VALUES
(339, '28', '2017-08-08', '10:00:00'),
(340, '26', '2017-08-07', '10:10:00'),
(341, '36', '2017-08-06', '10:20:00'),
(342, '31', '2017-08-05', '10:30:00'),
(343, '30', '2017-08-04', '10:40:00'),
(344, '27', '2017-08-03', '10:50:00'),
(345, '28', '2017-08-02', '11:00:00'),
(346, '25', '2017-08-01', '11:10:00'),
(347, '27', '2017-07-31', '11:20:00'),
(348, '27', '2017-07-30', '11:30:00'),
(349, '36', '2017-07-29', '11:40:00'),
(350, '30', '2017-07-28', '11:50:00'),
(351, '39', '2017-07-27', '12:00:00'),
(352, '36', '2017-07-26', '12:10:00'),
(353, '32', '2017-07-25', '12:20:00'),
(354, '33', '2017-08-09', '12:30:00'),
(355, '40', '2017-08-09', '12:40:00'),
(356, '33', '2017-08-09', '12:50:00'),
(357, '25', '2017-08-09', '13:00:00'),
(358, '33', '2017-08-09', '13:10:00'),
(359, '26', '2017-08-09', '13:20:00'),
(360, '38', '2017-07-24', '13:30:00'),
(361, '33', '2017-07-23', '13:40:00'),
(362, '37', '2017-07-22', '13:50:00'),
(363, '35', '2017-07-21', '14:00:00'),
(364, '39', '2017-07-20', '14:10:00'),
(365, '26', '2017-07-19', '14:20:00'),
(366, '29', '2017-07-18', '14:30:00'),
(367, '40', '2017-07-17', '14:40:00'),
(368, '40', '2017-07-16', '14:50:00'),
(369, '37', '2017-07-15', '15:00:00'),
(370, '28', '2017-07-14', '15:10:00'),
(371, '26', '2017-07-13', '15:20:00'),
(372, '32', '2017-07-12', '15:30:00'),
(373, '34', '2017-07-11', '15:40:00'),
(374, '31', '2017-07-10', '15:50:00'),
(375, '34', '2017-07-09', '16:00:00'),
(376, '37', '2017-07-08', '16:10:00'),
(377, '31', '2017-07-07', '16:20:00'),
(378, '36', '2017-07-06', '16:30:00'),
(379, '40', '2017-07-05', '16:40:00'),
(380, '27', '2017-07-04', '16:50:00'),
(381, '26', '2017-07-03', '17:00:00'),
(382, '38', '2017-07-02', '17:10:00'),
(383, '39', '2017-07-01', '17:20:00'),
(384, '33', '2017-06-30', '17:30:00'),
(385, '31', '2017-06-29', '17:40:00'),
(386, '38', '2017-06-28', '17:50:00'),
(387, '26', '2017-06-27', '18:00:00'),
(388, '32', '2017-06-26', '18:10:00'),
(389, '30', '2017-06-25', '18:20:00'),
(390, '27', '2017-06-24', '18:30:00'),
(391, '29', '2017-06-23', '18:40:00'),
(392, '39', '2017-06-22', '18:50:00'),
(393, '40', '2017-06-21', '19:00:00'),
(394, '39', '2017-06-20', '19:10:00'),
(395, '38', '2017-06-19', '19:20:00'),
(396, '25', '2017-06-18', '19:30:00'),
(397, '28', '2017-06-17', '19:40:00'),
(398, '37', '2017-06-16', '19:50:00'),
(399, '40', '2017-06-15', '20:00:00'),
(400, '40', '2017-06-14', '20:10:00'),
(401, '40', '2017-06-13', '20:20:00'),
(402, '25', '2017-06-12', '20:30:00'),
(403, '32', '2017-06-11', '20:40:00'),
(404, '34', '2017-06-10', '20:50:00'),
(405, '32', '2017-06-09', '21:00:00'),
(406, '25', '2017-06-08', '21:10:00'),
(407, '31', '2017-06-07', '21:20:00'),
(408, '39', '2017-06-06', '21:30:00'),
(409, '37', '2017-06-05', '21:40:00'),
(410, '30', '2017-06-04', '21:50:00'),
(411, '26', '2017-06-03', '22:00:00'),
(412, '38', '2017-06-02', '22:10:00'),
(413, '28', '2017-06-01', '22:20:00'),
(414, '40', '2017-05-31', '22:30:00'),
(415, '31', '2017-05-30', '22:40:00'),
(416, '34', '2017-05-29', '22:50:00'),
(417, '37', '2017-05-28', '23:00:00'),
(418, '33', '2017-05-27', '23:10:00'),
(419, '25', '2017-05-26', '23:20:00'),
(420, '27', '2017-05-25', '23:30:00'),
(421, '35', '2017-05-24', '23:40:00'),
(422, '30', '2017-05-23', '23:50:00'),
(423, '25', '2017-05-22', '00:00:00'),
(424, '35', '2017-05-21', '00:10:00'),
(425, '29', '2017-05-20', '00:20:00'),
(426, '38', '2017-05-19', '00:30:00'),
(427, '36', '2017-05-18', '00:40:00'),
(428, '32', '2017-05-17', '00:50:00'),
(429, '35', '2017-05-16', '01:00:00'),
(430, '35', '2017-05-15', '01:10:00'),
(431, '32', '2017-05-14', '01:20:00'),
(432, '35', '2017-05-13', '01:30:00'),
(433, '36', '2017-05-12', '01:40:00'),
(434, '39', '2017-05-11', '01:50:00'),
(435, '28', '2017-05-10', '02:00:00'),
(436, '28', '2017-05-09', '02:10:00'),
(437, '40', '2017-05-08', '02:20:00'),
(438, '35', '2017-05-07', '02:30:00'),
(439, '26', '2017-05-06', '02:40:00'),
(440, '36', '2017-05-05', '02:50:00'),
(441, '25', '2017-05-04', '03:00:00'),
(442, '28', '2017-05-03', '03:10:00'),
(443, '34', '2017-05-02', '03:20:00'),
(444, '28', '2017-05-01', '03:30:00'),
(445, '27', '2017-04-30', '03:40:00'),
(446, '25', '2017-04-29', '03:50:00'),
(447, '37', '2017-04-28', '04:00:00'),
(448, '39', '2017-04-27', '04:10:00'),
(449, '33', '2017-04-26', '04:20:00'),
(450, '38', '2017-04-25', '04:30:00'),
(451, '25', '2017-04-24', '04:40:00'),
(452, '28', '2017-04-23', '04:50:00'),
(453, '27', '2017-04-22', '05:00:00'),
(454, '26', '2017-04-21', '05:10:00'),
(455, '38', '2017-04-20', '05:20:00'),
(456, '32', '2017-04-19', '05:30:00'),
(457, '39', '2017-04-18', '05:40:00'),
(458, '33', '2017-04-17', '05:50:00'),
(459, '39', '2017-04-16', '06:00:00'),
(460, '34', '2017-04-15', '06:10:00'),
(461, '28', '2017-04-14', '06:20:00'),
(462, '31', '2017-04-13', '06:30:00'),
(463, '28', '2017-04-12', '06:40:00'),
(464, '40', '2017-04-11', '06:50:00'),
(465, '29', '2017-04-10', '07:00:00'),
(466, '32', '2017-04-09', '07:10:00'),
(467, '27', '2017-04-08', '07:20:00'),
(468, '28', '2017-04-07', '07:30:00'),
(469, '26', '2017-04-06', '07:40:00'),
(470, '29', '2017-04-05', '07:50:00'),
(471, '40', '2017-04-04', '08:00:00'),
(472, '26', '2017-04-03', '08:10:00'),
(473, '32', '2017-04-02', '08:20:00'),
(474, '34', '2017-04-01', '08:30:00'),
(475, '29', '2017-03-31', '08:40:00'),
(476, '35', '2017-03-30', '08:50:00'),
(477, '34', '2017-03-29', '09:00:00'),
(478, '26', '2017-03-28', '09:10:00'),
(479, '33', '2017-03-27', '09:20:00'),
(480, '27', '2017-03-26', '09:30:00'),
(481, '39', '2017-03-25', '09:40:00'),
(482, '34', '2017-03-24', '09:50:00'),
(483, '30', '2017-03-23', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tl_price`
--

CREATE TABLE `tl_price` (
  `tlp_id` int(11) NOT NULL,
  `tlprice` double NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tl_price`
--

INSERT INTO `tl_price` (`tlp_id`, `tlprice`, `date`, `remarks`) VALUES
(1, 175.53, '2018-05-04', 'change by government'),
(2, 175.53, '2018-05-05', 'change by government');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `mobile` int(11) DEFAULT NULL,
  `tel_no` int(11) DEFAULT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=delete,1=active',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nic`, `address`, `mobile`, `tel_no`, `email`, `gender`, `role_id`, `username`, `password`, `created_at`, `status`, `updated_at`) VALUES
(1, 'sf', 'fsd', 'f', 44, 4, '', 'Male', 2, 'ds', '123', '2018-10-13 15:39:02', 0, '0000-00-00 00:00:00'),
(3, 'Ranga Dissanayaka', '912403548V', '#14,Philip', 714270061, 0, 'ranganachamil11@gmail.com', 'Male', 1, 'admin', '123', '2018-10-13 15:30:09', 1, '2018-04-26 03:45:56'),
(4, 'Rangana Chamil', '891970986v', 'No 32, Udumulla,Dabagalla,monaragala', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Male', 1, 'ranga', '123', '2018-10-13 15:30:15', 1, '0000-00-00 00:00:00'),
(5, 'dissanayaka', '891970987v', 'weligama,matara', 715484569, 417845698, 'rang@gmail.com', 'Male', 2, 'dissa', 'dissa', '2018-10-13 15:33:25', 1, '0000-00-00 00:00:00'),
(9, 'Maheshika', '911892456v', 'Weligama,Matara', 710746144, 416405481, 'maheshika@gmail.com', 'Female', 2, 'maheshi', 'maheshi', '2018-10-13 15:34:23', 1, '0000-00-00 00:00:00'),
(10, 'Dissanayaka', '897251149v', 'no 03 welikeda, rajagiriya, srilanka', 714270061, 112587145, 'ranga11@gmail.com', 'Male', 2, 'ranga', '456', '2018-10-13 15:34:23', 1, '0000-00-00 00:00:00'),
(11, 'chamil', '902073428V', 'sdasasd', 716560550, 716560550, 'ranganachamil11@gmail.com', 'Male', 2, 'chamil', '123', '2018-10-13 15:34:23', 1, '0000-00-00 00:00:00'),
(13, 'mervyn', '992073428V', 'aadasd', 715689440, 362258900, 'ranganachamil11@gmail.com', 'Male', 2, 'mervyn', '123', '2018-10-13 15:34:23', 1, '0000-00-00 00:00:00'),
(16, 'gayantha', '882073428V', 'sdfsdfsdf', 718896550, 362258590, 'ranganachamil11@gmail.com', 'Male', 2, 'gayantha', '123', '2018-10-13 15:34:23', 1, '2018-10-12 02:40:36'),
(18, 'chamera', '992076458V', 'sdfsdfs', 716894550, 362255690, 'ranganachamil11@gmail.com', 'Male', 2, 'chameera', '123', '2018-10-13 15:34:23', 1, '0000-00-00 00:00:00'),
(22, 'rangana', '887320438V', 'dgdffdfg', 718954550, 365589750, 'ranganachamil11@gmail.com', 'Male', 2, 'rangana', '123', '2018-10-13 15:37:11', 0, '0000-00-00 00:00:00'),
(26, 'madushan', '929072458V', 'fdsfsdf', 716860440, 362258980, 'ranganachamil11@gmail.com', 'Male', 2, 'chamil12', '123', '2018-10-13 15:36:30', 0, '0000-00-00 00:00:00'),
(27, 'kalum1', '897251789v', 'no 03 welikeda, rajagiriya, srilanka', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Male', 2, 'kalum', '123', '2018-10-13 15:34:23', 1, '2018-10-12 20:19:26'),
(28, 'ranga', '787251569v', 'no 03 welikeda, rajagiriya, srilanka', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Male', 2, 'aaa', '123', '2018-10-13 15:34:50', 0, '0000-00-00 00:00:00'),
(29, 'dissanayaka', '897251729v', 'Monaragala', 714270061, 714270061, 'ranganachamil12@gmail.com', 'Male', 4, 'dissanayaka', 'dissanayaka', '2018-10-26 16:59:10', 1, '0000-00-00 00:00:00'),
(30, 'chameera', '897251769v', 'awissawella', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Male', 3, 'chameera', 'chameera', '2018-10-26 17:04:09', 1, '0000-00-00 00:00:00'),
(31, 'nishantha', '735810753V', 'Galle', 714270061, 714270061, 'ranganachamil16@gmail.com', 'Male', 2, 'nishantha', 'nishantha', '2018-10-26 17:07:57', 1, '0000-00-00 00:00:00'),
(33, 'amara', '897255819v', 'panadura', 714270062, 714270062, 'ranganachamil21@gmail.com', 'Male', 2, 'amara', 'amara', '2018-10-26 17:25:11', 1, '0000-00-00 00:00:00'),
(34, 'nayana', '897251589v', 'no 03 welikeda, rajagiriya, srilanka', 714270066, 714270066, 'ranganachamil11@gmail.com', 'Female', 2, 'nayana', 'nayana', '2018-10-26 17:32:04', 1, '0000-00-00 00:00:00'),
(35, 'thamara', '735810743V', 'no 03 welikeda, rajagiriya, srilanka', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Female', 2, 'thamara', 'thamara', '2018-10-26 18:20:58', 0, '0000-00-00 00:00:00'),
(37, 'nimal', '897251526v', 'no 03 welikeda, Kelaniya', 714270062, 714270061, 'ranganachamil11@gmail.com', 'Male', 4, 'nimal1', '523', '2018-10-26 18:20:35', 0, '2018-10-26 02:50:09'),
(38, 'nimala', '735810823V', 'no 03 welikeda, rajagiriya, srilanka', 714270061, 714270061, 'ranganachamil11@gmail.com', 'Female', 2, 'nimala', 'nimala', '2018-10-27 15:29:18', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtytea_stok`
--
ALTER TABLE `dtytea_stok`
  ADD PRIMARY KEY (`dst_id`);

--
-- Indexes for table `monthly_payment`
--
ALTER TABLE `monthly_payment`
  ADD PRIMARY KEY (`mpay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`),
  ADD UNIQUE KEY `passbook_no` (`passbook_no`);

--
-- Indexes for table `tbl_advpayment`
--
ALTER TABLE `tbl_advpayment`
  ADD PRIMARY KEY (`advpay_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `tbl_dailycolection`
--
ALTER TABLE `tbl_dailycolection`
  ADD PRIMARY KEY (`dc_id`);

--
-- Indexes for table `tbl_dryteatype`
--
ALTER TABLE `tbl_dryteatype`
  ADD PRIMARY KEY (`dtt_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tbl_invoice_item`
--
ALTER TABLE `tbl_invoice_item`
  ADD PRIMARY KEY (`inv_item_id`);

--
-- Indexes for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  ADD PRIMARY KEY (`tlt_id`);

--
-- Indexes for table `tbl_sensors_data`
--
ALTER TABLE `tbl_sensors_data`
  ADD PRIMARY KEY (`sensors_data_id`);

--
-- Indexes for table `tl_price`
--
ALTER TABLE `tl_price`
  ADD PRIMARY KEY (`tlp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtytea_stok`
--
ALTER TABLE `dtytea_stok`
  MODIFY `dst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `monthly_payment`
--
ALTER TABLE `monthly_payment`
  MODIFY `mpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_advpayment`
--
ALTER TABLE `tbl_advpayment`
  MODIFY `advpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_dailycolection`
--
ALTER TABLE `tbl_dailycolection`
  MODIFY `dc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_dryteatype`
--
ALTER TABLE `tbl_dryteatype`
  MODIFY `dtt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_invoice_item`
--
ALTER TABLE `tbl_invoice_item`
  MODIFY `inv_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  MODIFY `tlt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sensors_data`
--
ALTER TABLE `tbl_sensors_data`
  MODIFY `sensors_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;
--
-- AUTO_INCREMENT for table `tl_price`
--
ALTER TABLE `tl_price`
  MODIFY `tlp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
