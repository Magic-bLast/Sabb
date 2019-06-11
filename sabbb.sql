-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 11:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodType` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `foodname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `haveFood` tinyint(1) NOT NULL DEFAULT '1',
  `foodAv` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodType`, `foodname`, `price`, `haveFood`, `foodAv`) VALUES
('อื่นๆ', 'ขนมจีน', 10, 1, 1),
('อื่นๆ', 'ข้าวสวย', 10, 1, 1),
('อื่นๆ', 'ข้าวเหนียว', 10, 1, 1),
('ทอด/ย่าง', 'คอหมูย่าง', 60, 1, 1),
('อื่นๆ', 'ชาเขียวโออิชิน้ำผึ้งมะนาว', 20, 1, 1),
('ต้มแซบ', 'ต้มแซบกระดูกอ่อน(หมู)', 60, 0, 1),
('ต้มแซบ', 'ต้มแซบขาไก่ตุ๋น', 60, 0, 1),
('ต้มแซบ', 'ต้มแซบทะเล', 80, 1, 1),
('ต้มแซบ', 'ต้มแซบหมูเปื่อย', 60, 1, 1),
('ต้มแซบ', 'ต้มแซบเครื่องในเนื้อ', 70, 0, 1),
('ต้มแซบ', 'ต้มแซบเนื้อน่องลาย', 70, 1, 1),
('ทอด/ย่าง', 'ตับหมูย่าง', 60, 0, 1),
('ทอด/ย่าง', 'ทอดมันปลา', 50, 1, 1),
('ลาบ/น้ำตก', 'น้ำตกคอหมูย่าง', 70, 1, 1),
('ลาบ/น้ำตก', 'น้ำตกหมู', 60, 1, 1),
('ลาบ/น้ำตก', 'น้ำตกเนื้อ', 70, 1, 1),
('อื่นๆ', 'น้ำเปล่า', 10, 1, 1),
('อื่นๆ', 'น้ำแข็ง', 10, 1, 1),
('ทอด/ย่าง', 'ปากเป็ดทอด', 60, 1, 1),
('ยำ', 'ยำคอหมูย่าง', 70, 1, 1),
('ยำ', 'ยำทุเรียน', 150, 1, 0),
('ยำ', 'ยำปลาดุกฟู', 70, 1, 1),
('ยำ', 'ยำปูม้า', 160, 1, 1),
('ยำ', 'ยำปูเค็ม', 70, 1, 1),
('ยำ', 'ยำมาม่า', 60, 1, 1),
('ยำ', 'ยำวุ้นเส้น', 60, 0, 1),
('ยำ', 'ยำหมูยอ', 60, 1, 1),
('ยำ', 'ยำไข่เยี่ยวม้า', 60, 0, 1),
('ลาบ/น้ำตก', 'ลาบหมู', 60, 1, 1),
('ลาบ/น้ำตก', 'ลาบเนื้อ', 70, 1, 1),
('ลาบ/น้ำตก', 'ลาบเป็ด', 70, 1, 1),
('ลาบ/น้ำตก', 'ลาบไก่ทอด', 60, 0, 1),
('อื่นๆ', 'ลูกตาลลอยแก้ว', 30, 1, 0),
('อื่นๆ', 'สตรอเบอรี่ลอยแก้ว', 30, 0, 1),
('ส้มตำ', 'ส้มตำกะท้อน', 45, 1, 0),
('ส้มตำ', 'ส้มตำข้าวโพด', 40, 1, 1),
('ส้มตำ', 'ส้มตำดอกอัญชัน', 40, 0, 1),
('ส้มตำ', 'ส้มตำถั่วฝักยาว', 35, 1, 1),
('ส้มตำ', 'ส้มตำทุเรียน', 150, 1, 0),
('ส้มตำ', 'ส้มตำปู', 40, 1, 1),
('ส้มตำ', 'ส้มตำปูทะเลไข่', 300, 1, 1),
('ส้มตำ', 'ส้มตำปูปลาร้า', 45, 1, 1),
('ส้มตำ', 'ส้มตำปูม้า', 90, 1, 1),
('ส้มตำ', 'ส้มตำหอยดอง', 35, 1, 1),
('ส้มตำ', 'ส้มตำแตง', 35, 1, 1),
('ส้มตำ', 'ส้มตำไข่เค็ม', 35, 1, 1),
('ส้มตำ', 'ส้มตำไทย', 35, 1, 1),
('ส้มตำ', 'ส้มตำไทยใส่ปู', 45, 1, 1),
('อื่นๆ', 'สละลอยแก้ว', 30, 0, 1),
('อื่นๆ', 'สไปรท์', 10, 0, 1),
('ทอดย่าง', 'หมูแดดเดียวทอด', 50, 1, 1),
('ทอด/ย่าง', 'เกี๊ยวปลาทอด', 40, 1, 1),
('ทอด/ย่าง', 'เต้าหู้ปลาทอด', 40, 1, 1),
('ทอด/ย่าง', 'เนื้อย่าง', 70, 1, 1),
('ทอด/ย่าง', 'เนื้อแดดเดียวทอด', 70, 1, 1),
('อื่นๆ', 'เส้นหมี่กระเทียม', 15, 1, 1),
('อื่นๆ', 'โค้ก', 10, 1, 1),
('อื่นๆ', 'โซดา', 10, 1, 1),
('ทอด/ย่าง', 'ไส้ตันทอด', 70, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `l_id` int(11) NOT NULL,
  `l_desc` varchar(512) COLLATE utf8_thai_520_w2 NOT NULL,
  `l_money` int(11) NOT NULL,
  `l_type` varchar(64) COLLATE utf8_thai_520_w2 NOT NULL,
  `l_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`l_id`, `l_desc`, `l_money`, `l_type`, `l_time`) VALUES
(1, 'อาหารโต๊ะ 7', 115, 'รายรับ', '2019-05-24 03:04:09'),
(2, 'อาหารโต๊ะ 3', 905, 'รายรับ', '2019-05-24 03:12:20'),
(3, 'ซื้อหมูสับ', 500, 'รายจ่าย', '2019-05-24 12:56:50'),
(4, 'ซื้อไก่สด', 1200, 'รายจ่าย', '2019-05-24 14:11:28'),
(5, 'อาหารโต๊ะ 12', 155, 'รายรับ', '2019-05-24 14:42:25'),
(6, 'อาหารโต๊ะ 5', 45, 'รายรับ', '2019-06-02 16:52:02'),
(7, 'อาหารโต๊ะ 6', 290, 'รายรับ', '2019-06-04 11:10:25'),
(8, 'อาหารโต๊ะ 14', 795, 'รายรับ', '2019-06-09 15:47:13'),
(9, 'อาหารโต๊ะ 12', 155, 'รายรับ', '2019-05-24 14:42:25'),
(10, 'อาหารโต๊ะ 6', 175, 'รายรับ', '2019-05-24 03:04:09'),
(11, 'อาหารโต๊ะ 2', 300, 'รายรับ', '2019-05-24 03:12:20'),
(12, 'อาหารโต๊ะ 1', 245, 'รายรับ', '2019-05-24 14:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `oid` int(11) NOT NULL,
  `tableNum` int(20) NOT NULL,
  `foodname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `timeOrdered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foodDetail` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `foodQuantity` int(50) NOT NULL,
  `foodDone` tinyint(1) NOT NULL DEFAULT '0',
  `finishtime` datetime NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`oid`, `tableNum`, `foodname`, `timeOrdered`, `foodDetail`, `foodQuantity`, `foodDone`, `finishtime`, `paid`) VALUES
(23, 5, 'ขนมจีน', '2019-05-24 14:24:20', '-', 1, 1, '2019-05-24 14:39:11', 0),
(24, 5, 'ส้มตำถั่วฝักยาว', '2019-05-24 14:24:20', '-', 1, 1, '2019-05-24 14:39:10', 0),
(25, 6, 'ยำปูม้า', '2019-05-24 14:26:14', 'รสจัด', 1, 1, '2019-05-24 14:39:15', 0),
(26, 6, 'คอหมูย่าง', '2019-05-24 14:26:14', '-', 1, 1, '2019-05-24 14:39:15', 0),
(27, 6, 'ส้มตำแตง', '2019-05-24 14:26:14', 'เผ็ดๆ', 2, 1, '2019-05-24 14:39:12', 0),
(28, 12, 'ยำหมูยอ', '2019-05-24 14:37:00', 'รสจัด', 1, 1, '2019-05-24 14:39:18', 0),
(29, 12, 'น้ำตกหมู', '2019-05-24 14:37:00', 'เผ็ดๆ', 1, 1, '2019-05-24 14:39:17', 0),
(30, 12, 'ส้มตำถั่วฝักยาว', '2019-05-24 14:37:00', 'รสจัด', 1, 1, '2019-05-24 14:39:17', 0),
(31, 10, 'ยำปลาดุกฟู', '2019-06-04 11:13:08', '-', 1, 1, '2019-06-04 11:16:49', 0),
(32, 10, 'น้ำตกคอหมูย่าง', '2019-06-04 11:13:08', '-', 1, 1, '2019-06-04 11:15:11', 0),
(33, 10, 'ข้าวเหนียว', '2019-06-04 11:13:08', '-', 5, 1, '2019-06-04 11:15:10', 0),
(34, 10, 'เนื้อแดดเดียวทอด', '2019-06-04 11:13:08', '-', 1, 1, '2019-06-04 11:15:09', 0),
(35, 14, 'เนื้อแดดเดียวทอด', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:51', 0),
(36, 14, 'เนื้อแดดเดียวทอด', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:51', 0),
(37, 14, 'เนื้อแดดเดียวทอด', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:51', 0),
(38, 14, 'เนื้อแดดเดียวทอด', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:52', 0),
(39, 14, 'ลาบเนื้อ', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:53', 0),
(40, 14, 'ลาบเนื้อ', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:53', 0),
(41, 14, 'ลาบเนื้อ', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:53', 0),
(42, 14, 'ลาบเนื้อ', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:54', 0),
(43, 14, 'น้ำตกหมู', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:54', 0),
(44, 14, 'ส้มตำถั่วฝักยาว', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:55', 0),
(45, 14, 'ส้มตำถั่วฝักยาว', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:55', 0),
(46, 14, 'ส้มตำถั่วฝักยาว', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:55', 0),
(47, 14, 'ส้มตำถั่วฝักยาว', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:56', 0),
(48, 14, 'ส้มตำถั่วฝักยาว', '2019-06-09 15:42:20', '-', 1, 1, '2019-06-09 15:42:57', 0),
(49, 5, 'ลาบเป็ด', '2019-06-11 03:54:44', 'ไม่ใส่ชูรส', 1, 0, '0000-00-00 00:00:00', 0),
(50, 5, 'ข้าวเหนียว', '2019-06-11 03:54:44', '-', 2, 0, '0000-00-00 00:00:00', 0),
(51, 5, 'ขนมจีน', '2019-06-11 03:54:44', '-', 2, 0, '0000-00-00 00:00:00', 0),
(52, 5, 'ยำคอหมูย่าง', '2019-06-11 03:54:44', '-', 1, 0, '0000-00-00 00:00:00', 0),
(53, 5, 'เกี๊ยวปลาทอด', '2019-06-11 03:54:44', '-', 2, 0, '0000-00-00 00:00:00', 0),
(54, 5, 'ต้มแซบหมูเปื่อย', '2019-06-11 03:54:44', 'เผ็ดๆ', 1, 0, '0000-00-00 00:00:00', 0),
(55, 5, 'ส้มตำถั่วฝักยาว', '2019-06-11 03:54:44', 'ไม่ใส่พริก', 1, 0, '0000-00-00 00:00:00', 0),
(56, 5, 'ส้มตำปูม้า', '2019-06-11 15:05:17', 'รสจัด', 1, 0, '0000-00-00 00:00:00', 0),
(57, 5, 'ส้มตำไทย', '2019-06-11 15:05:17', '-', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tablestatus`
--

CREATE TABLE `tablestatus` (
  `tableNum` int(20) NOT NULL,
  `tableAv` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tablestatus`
--

INSERT INTO `tablestatus` (`tableNum`, `tableAv`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 0),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 0),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temporder`
--

CREATE TABLE `temporder` (
  `tempid` int(11) NOT NULL,
  `tablenum` int(20) NOT NULL,
  `foodname` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timeOrdered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foodDetail` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `foodQuantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `temporder`
--

INSERT INTO `temporder` (`tempid`, `tablenum`, `foodname`, `timeOrdered`, `foodDetail`, `foodQuantity`) VALUES
(3, 4, 'ส้มตำถั่วฝักยาว', '2019-06-11 15:07:49', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usercontrol`
--

CREATE TABLE `usercontrol` (
  `log_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `log_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `usercontrol`
--

INSERT INTO `usercontrol` (`log_name`, `log_pw`, `role`) VALUES
('admin', 'admin1234', 'a'),
('aeksabb2515', 'narongsak_isariya', 'a'),
('kitchen', 'sabbkitchen', 'k'),
('pang_sabb', 'pang1234', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodname`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tablestatus`
--
ALTER TABLE `tablestatus`
  ADD PRIMARY KEY (`tableNum`);

--
-- Indexes for table `temporder`
--
ALTER TABLE `temporder`
  ADD PRIMARY KEY (`tempid`);

--
-- Indexes for table `usercontrol`
--
ALTER TABLE `usercontrol`
  ADD PRIMARY KEY (`log_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `temporder`
--
ALTER TABLE `temporder`
  MODIFY `tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
