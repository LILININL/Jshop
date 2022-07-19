-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 12:33 PM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ตรารางเก็บใบเสร็จสำหรับการโอนเงิน';

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`transaction_id`, `date`, `name`, `invoice`, `amount`, `remarks`, `balance`) VALUES
(2, '02/03/2021', 'RS-22430720', 'IN-3063000', '150', 'gdb', -2),
(3, '02/13/2021', 'RS-22430720', 'IN-02323220', '50', '123', -52),
(4, '02/13/2021', 'RS-22430720', 'IN-334330', '500', 'จ่ายแล้ว', -552),
(5, '02/13/2021', 'RS-2035052', 'IN-0220342', '500', '123', -487),
(6, '02/13/2021', 'RS-23749302', 'IN-352332', '30', '1232231', -6),
(7, '05/28/2021', 'RS-23749302', 'IN-624037', '2', '23', -8),
(8, '05/28/2021', ' IN-7002223', 'IN-22223', '40', '', -40),
(9, '05/28/2021', 'RS-553903', 'IN-2602282', '130', 'โอนแล้ว', -8),
(11, '06/04/2021', 'RS-33333', 'IN-55207020', '6', 'โอนแล้ว 6/4/21', -1),
(12, '06/04/2021', 'RS-0202383', 'IN-42320332', '6300', '', -60),
(13, '06/14/2021', 'JSH-200223', 'IN-6333232', '3338.40', 'จ่ายแล้ว', 0),
(14, '06/14/2021', 'JSH-080302', 'IN-35230', '60', 'จ่ายแล้ว', -7),
(15, '06/14/2021', 'RS-33233233', 'IN-23220972', '500', 'จ่ายแล้ว', -56),
(16, '06/15/2021', 'JSH-2723222', 'IN-3030376', '3120', 'จ่ายจ่ายๆๆๆ', 0),
(17, '06/15/2021', 'JSH-03238838', 'IN-28232202', '1000', 'ไม่ครบ', 2120),
(18, '06/15/2021', 'JSH-03238838', 'IN-2230900', '2120', 'ครบแล้ว', 0),
(19, '06/15/2021', 'JSH-37202420', 'IN-33053', '3338.40', 'โอนแล้ว', 0),
(20, '06/16/2021', 'JSH-22232243', 'IN-092988', '10', 'จ่ายแล้ว', 0),
(21, '06/16/2021', 'JSH-02829720', 'IN-2203024', '2', 'ฟ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `first_name`, `middle_name`, `last_name`) VALUES
(3, 'ฟห ฟห ก', '/ฟ', '23', '23112', 'ฟห', 'ฟห', 'ก'),
(4, 'ยม ยํม พวงมาลา', 'ย๊มช็อป', 'ยมยม', '12355', 'ยม', 'ยํม', 'พวงมาลา'),
(9, 'ฟหก ฟหก ฟหก', 'ฟหก', 'ฟหก', 'ฟหก', 'ฟหก', 'ฟหก', 'ฟหก'),
(11, 'p p p', 'p', 'p', 'p', 'p', 'p', 'p'),
(12, 'คอม คอม ตอม', 'คอม', 'ป่า', 'คอม', 'คอม', 'คอม', 'ตอม'),
(13, 'a s s', 'd', '2', '123', 'a', 's', 's'),
(14, 'ไคบะ', '1412', 'จอมโจรคิด', '1412', 'ไคบะ', '-', 'เซโตะ'),
(15, 'สุ่มไฟ', '195 หมู 4', 'น้อง ปอ', '00012', 'นาย ป', '', 'สุ่มไฟ');

-- --------------------------------------------------------

--
-- Table structure for table `lose`
--

CREATE TABLE `lose` (
  `p_id` int(10) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description_name` varchar(30) NOT NULL,
  `amount_lose` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `exdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lose`
--

INSERT INTO `lose` (`p_id`, `product_code`, `product_name`, `description_name`, `amount_lose`, `qty`, `cost`, `date`, `category`, `exdate`) VALUES
(2, 'JSHP-223033', 'ปล่าเน่า', 'ของเน่า', '150', '19', '15', '', '', ''),
(3, 'JSHP-00006322', 'asd', 'asd', '0', '0', '123', '06-21-2021', 'เสื้อผ้า', '2021-06-17'),
(4, 'JSHP-00006322', 'asd', 'asd', '0', '0', '123', '06-21-2021', 'เสื้อผ้า', '0'),
(5, 'JSHP-00006322', 'asd', 'asd', '1230', '10', '123', '06-21-2021', 'เสื้อผ้า', '0'),
(6, 'JSHP-00006322', 'asd', 'asd', '0', '0', '123', '06-21-2021', 'เสื้อผ้า', '0'),
(7, 'JSHP-00006322', 'asd', 'asd', '0', '0', '123', '06-21-2021', 'เสื้อผ้า', '0'),
(8, 'JSHP-00006322', 'asd', 'asd', '2460', '20', '123', '06-21-2021', 'เสื้อผ้า', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description_name` varchar(50) NOT NULL,
  `cost` varchar(100) NOT NULL COMMENT 'ราคาทุน',
  `price` varchar(100) NOT NULL COMMENT 'ราคาขาย',
  `supplier` varchar(100) NOT NULL,
  `qty_left` int(10) NOT NULL COMMENT 'จำนวนสินค้าที่เหลือ',
  `category` varchar(100) NOT NULL COMMENT 'ประเภท',
  `date_delivered` varchar(20) NOT NULL,
  `expiration_date` varchar(20) NOT NULL,
  `unit` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `description_name`, `cost`, `price`, `supplier`, `qty_left`, `category`, `date_delivered`, `expiration_date`, `unit`) VALUES
(42, 'JSHP-302584', '123', '456', '1', '2', 'โรงนำการค้า', -2, 'สมุดหนังสือ', '2021-06-16', '2021-06-22', 'กล่อง'),
(43, 'JSHP-223323', 'Death note', 'สมุดจากยมทูต', '0', '5', 'จอมโจรคิด', 10, 'สมุดหนังสือ', '2021-06-21', '', 'เล่ม'),
(44, 'JSHP-30029303', 'คอมโจ้โจ้ๆ', 'โจ้โจ้้ววว', '5', '10', 'ค๊อมมมม', 54, 'เครื่องเขียน', '2021-06-21', '', 'ชิ้น'),
(46, 'JSHP-30372238', 'ประวัติศาสตร์ไทย', 'ประวัติศาสตร์ไทย ว่าเคยมี อะไรเกิดขึ้นบ้าง', '10', '25', 'โรงนำการค้า', 119, 'สมุดหนังสือ', '2021-06-22', '2021-06-22', 'แพ็ค');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `date_deliver` varchar(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date_order`, `suplier`, `date_deliver`, `p_name`, `qty`, `cost`, `status`, `remark`) VALUES
(45, 'JSH-322338', '2021-06-22', 'โรงนำการค้า', '2021-06-22', 'JSHP-30372238', '50', '1250', 'ส่งคืน', ' ไม่ตรงปก'),
(46, 'JSH-40332702', '2021-06-22', 'โรงนำการค้า', '2021-06-23', 'JSHP-30372238', '20', '500', 'ได้รับ', ' ฉบับแก้ไข'),
(47, 'JSH-336203', '2021-06-22', 'โรงนำการค้า', '2021-06-22', 'JSHP-302584', '10', '20', 'ยกเลิก', ' เทสระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`, `status`, `date`) VALUES
(34, 'JSHP-87233525', 20, '100', 'JSH-30349', 'รอดำเนินการ', '2021-06-15'),
(37, 'JSHP-87233525', 50, '250', 'JSH-0000392', 'รอดำเนินการ', '2021-06-16'),
(38, 'JSHP-2320822', 50, '2500', 'JSH-3202222', 'ได้รับ', '2021-06-16'),
(39, 'JSHP-2320822', 50, '500', 'JSH-223222', 'ได้รับ', '2021-06-18'),
(40, 'JSHP-2320822', 52, '520', 'JSH-2425620', 'ได้รับ', '2021-06-18'),
(41, 'JSHP-30029303', 10, '100', 'JSH-022220', 'รอดำเนินการ', '2021-06-21'),
(42, 'JSHP-30029303', 10, '100', 'JSH-022220', 'รอดำเนินการ', '2021-06-21'),
(43, 'JSHP-30029303', 10, '100', 'JSH-3732285', 'รอดำเนินการ', '2021-06-22'),
(44, 'JSHP-223323', 50, '250', 'JSH-4202203', 'ได้รับ', '2021-06-22'),
(45, 'JSHP-30372238', 50, '1250', 'JSH-322338', 'ส่งคืน', '2021-06-22'),
(46, 'JSHP-30372238', 20, '500', 'JSH-40332702', 'ได้รับ', '2021-06-22'),
(47, 'JSHP-302584', 10, '20', 'JSH-336203', 'ยกเลิก', '2021-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `p_amount` varchar(30) NOT NULL,
  `vat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `due_date`, `name`, `balance`, `total_amount`, `cash`, `month`, `year`, `p_amount`, `vat`) VALUES
(84, 'JSH-33000', 'Admin', '06/22/2021', 'cash', '29', '', 'คอม คอม ตอม', '', '', '29', 'June', '2021', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `omonth` varchar(25) NOT NULL,
  `oyear` varchar(25) NOT NULL,
  `qtyleft` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `sumqty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`, `category`, `date`, `omonth`, `oyear`, `qtyleft`, `dname`, `vat`, `total_amount`, `sumqty`) VALUES
(815, 'JSH-202520', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '49', '', '', '', ''),
(816, 'JSH-323226', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '48', '', '', '', ''),
(831, 'JSH-2232233', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '36', '', '', '', ''),
(832, 'JSH-273226', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '35', '', '', '', ''),
(833, 'JSH-273226', 'JSHP-30029303', '51', '10', 'คอมโจ้โจ้ๆ', '10', '0', 'เครื่องเขียน', '06/22/2021', 'June', '2021', '110', '', '', '', ''),
(834, 'JSH-00360002', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '34', '', '', '', ''),
(835, 'JSH-532302', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '33', '', '', '', ''),
(836, 'JSH-3723276', 'JSHP-223323', '16', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '32', '', '', '', ''),
(838, 'JSH-3723276', 'JSHP-30029303', '51', '10', 'คอมโจ้โจ้ๆ', '10', '0', 'เครื่องเขียน', '06/22/2021', 'June', '2021', '108', '', '', '', ''),
(841, 'JSH-023322', 'JSHP-223323', '16', '50', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '12', 'สมุดจากยมทูต', '3.5', '53.5', ''),
(848, 'JSH-33000', 'JSHP-302584', '12', '2', '123', '2', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '9', '', '', '', ''),
(849, 'JSH-33000', 'JSHP-223323', '1', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '11', '', '', '', ''),
(852, 'JSH-0322282', 'JSHP-223323', '1', '5', 'Death note', '5', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '10', '', '', '', ''),
(853, 'JSH-0322282', 'JSHP-30029303', '1', '10', 'คอมโจ้โจ้ๆ', '10', '0', 'เครื่องเขียน', '06/22/2021', 'June', '2021', '54', '', '', '', ''),
(854, 'JSH-0322282', 'JSHP-30372238', '1', '25', 'ประวัติศาสตร์ไทย', '25', '0', 'สมุดหนังสือ', '06/22/2021', 'June', '2021', '119', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`) VALUES
(11, 'ค๊อมมมม', '12241 ค๊อมๆ', '12354111', 'คอมม'),
(19, 'บ๊อลล', 'เกือบถึงโกล', '111452', 'บ๊อง'),
(20, 'จอมโจรคิด', 'ในประเทศญี่ปุ่น', '1412', 'คุโรบะ ไคโตะ '),
(21, 'โรงนำการค้า', '114 /12 ', '09555', 'คุณกอ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(20) NOT NULL COMMENT 'ตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin123', 'Admin', 'admin'),
(2, 'aa', 'aa', 'aaa', 'cashier'),
(3, 'asd', 'asd', 'asd', 'cashier'),
(4, 'dsa', 'dsa', 'dsa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `lose`
--
ALTER TABLE `lose`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=855;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
