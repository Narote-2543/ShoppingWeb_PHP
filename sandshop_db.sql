-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 12:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_listsell`
--

CREATE TABLE `db_listsell` (
  `listid` int(11) NOT NULL,
  `ProductStockID` int(11) DEFAULT NULL,
  `idmember` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `ProductStockDetailName` varchar(255) NOT NULL,
  `ProductStockName` varchar(255) NOT NULL,
  `productQTY` int(11) NOT NULL,
  `Flgstatus` varchar(1) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `TransportName` varchar(255) NOT NULL,
  `TransportID` int(11) NOT NULL,
  `SellDate` datetime DEFAULT NULL,
  `IMG_Product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_listsell`
--

INSERT INTO `db_listsell` (`listid`, `ProductStockID`, `idmember`, `memberName`, `ProductStockDetailName`, `ProductStockName`, `productQTY`, `Flgstatus`, `CreateDate`, `TotalPrice`, `TransportName`, `TransportID`, `SellDate`, `IMG_Product`) VALUES
(1, 1, 1, 'ปิยดา แสนสีเเก้ว', 'นีเวีย เอ็กซ์ตร้า ไวท์ ซี แอนด์ เอ วิตามิน โลชั่น', 'ครีมทาผิว', 3, 'S', '2023-09-04 22:22:40', 250, 'เคอรี่ เอ็กซ์เพรส', 1, '2023-09-07 22:49:27', 'Img_01_01.jpg'),
(2, 2, 1, 'ปิยดา แสนสีเเก้ว', 'Test1', 'ครีมทาผิว', 2, 'C', '2023-09-04 22:25:19', 10, '', 0, NULL, 'Img_01_02.jpg'),
(3, 1, 1, 'ปิยดา แสนสีเเก้ว', 'นีเวีย เอ็กซ์ตร้า ไวท์ ซี แอนด์ เอ วิตามิน โลชั่น', 'ครีมทาผิว', 1, 'R', '2023-09-06 22:09:14', 70, '', 0, NULL, 'Img_01_01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_member`
--

CREATE TABLE `db_member` (
  `idmember` int(11) NOT NULL,
  `Member_name` text NOT NULL,
  `Member_idcitizen` text NOT NULL,
  `Member_age` int(11) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Member_phone` text NOT NULL,
  `Member_email` text NOT NULL,
  `Member_address` text NOT NULL,
  `Flgstatus` text NOT NULL,
  `Cratedate` datetime NOT NULL,
  `Member_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_member`
--

INSERT INTO `db_member` (`idmember`, `Member_name`, `Member_idcitizen`, `Member_age`, `Birthday`, `Member_phone`, `Member_email`, `Member_address`, `Flgstatus`, `Cratedate`, `Member_password`) VALUES
(1, 'ปิยดา แสนสีเเก้ว', '1111111111111', 23, '2023-09-06', '0991121199', 'Piyada@gmail.com', 'บ้าน', 'A', '2023-09-03 15:32:01', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `db_payment`
--

CREATE TABLE `db_payment` (
  `pay_id` int(11) NOT NULL,
  `pay_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pay_detail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_payment`
--

INSERT INTO `db_payment` (`pay_id`, `pay_name`, `pay_detail`) VALUES
(1, 'โอนเงินผ่านธนาคารกสิกร', 'ชื่อบัญชี วรรณการน์ กัลยาณพันธ์\r\nเลขที่บัญชี 11111111'),
(2, 'โอนเงินผ่านธนาคาร กรุงศรีอยุธยา', 'ชื่อบัญชี วรรณการน์ เลขที่บัญชี 22222222');

-- --------------------------------------------------------

--
-- Table structure for table `db_productstock`
--

CREATE TABLE `db_productstock` (
  `ProductStockID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductStockDetailName` varchar(255) NOT NULL,
  `ProductStockDetail` varchar(255) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductQTY` int(11) NOT NULL,
  `RevisedDate` datetime NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Flgstatus` varchar(1) NOT NULL,
  `IMG_Product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_productstock`
--

INSERT INTO `db_productstock` (`ProductStockID`, `ProductID`, `ProductStockDetailName`, `ProductStockDetail`, `ProductPrice`, `ProductQTY`, `RevisedDate`, `CreateDate`, `Flgstatus`, `IMG_Product`) VALUES
(1, 1, 'นีเวีย เอ็กซ์ตร้า ไวท์ ซี แอนด์ เอ วิตามิน โลชั่น', 'ครั้งแรกของวิตามินบำรุงผิวในรูปแบบโลชั่นทาตัวเนื้อบางเบา ซึมเร็ว และยังผสานวิตามินเอถึง 100 เท่าจากเชอร์รี่มิ้นท์สกัดสูตรเย็น และสารสกัดจากเมล็ดองุ่นทำให้สามารถตรงเข้าบำรุงผิวได้ทันที พร้อมกับช่วยลดเลือดจุดด่างดำให้ดูจางลง ทำให้ผิวมีออร่า และสีผิวสม่ำเสมอ', 70, 97, '2023-08-27 14:41:55', '0000-00-00 00:00:00', 'A', 'Img_01_01.jpg'),
(2, 1, 'Test1', 'Test1', 10, 10, '0000-00-00 00:00:00', '2023-08-28 21:35:41', 'C', 'Img_01_02.jpg'),
(9, 1, 'Test2', 'Test2', 40, 40, '0000-00-00 00:00:00', '2023-09-02 15:53:33', 'C', 'Img_01_02.jpg'),
(10, 2, 'วาสลีน วาสลีน เฮลธี้ ไบรท์ ยูวี เอ็กซ์ตร้า ไบรท์เทนนิ่ง กลูต้า โกลว์ โลชั่น', 'ส่วนผสมของแอ็คทีฟไนอะซินาไมด์ 10 เท่า มาพร้อมเทคโนโลยีกลูต้าโกลว์ สิทธิบัตรเฉพาะของวาสลีน ผสานกลูต้าไธโอนที่ช่วยเรื่องแอนตี้ออกซิแดนท์ที่มีประสิทธิภาพ', 40, 200, '0000-00-00 00:00:00', '2023-09-03 16:44:26', 'A', 'Img_02_01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_producttype`
--

CREATE TABLE `db_producttype` (
  `ProductID` int(11) NOT NULL,
  `ProductStockName` varchar(255) NOT NULL,
  `Flgstatus` varchar(1) NOT NULL,
  `Revisor` int(11) NOT NULL,
  `RevisedDate` datetime NOT NULL,
  `Creator` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_producttype`
--

INSERT INTO `db_producttype` (`ProductID`, `ProductStockName`, `Flgstatus`, `Revisor`, `RevisedDate`, `Creator`, `CreateDate`) VALUES
(1, 'ครีมทาผิว', 'A', 0, '2023-08-28 21:10:21', 1, '2023-08-26 10:31:08'),
(2, 'ครีมบำรุงผิวกาย', 'A', 0, '2023-08-28 21:10:21', 1, '2023-08-26 10:31:08'),
(3, 'ผลิตภัณฑ์บำรุงผม', 'A', 0, '2023-08-28 21:10:21', 1, '2023-08-26 10:31:08'),
(4, 'ลิปสติก', 'A', 0, '2023-08-28 21:10:21', 0, '2023-08-26 23:58:34'),
(6, 'รองพื้นทาหน้า', 'A', 0, '2023-08-28 21:10:21', 0, '2023-08-26 23:59:50'),
(7, 'ทดสอบ', 'C', 0, '2023-09-10 05:22:35', 0, '2023-08-27 00:02:31'),
(15, 'Test3', 'A', 0, '0000-00-00 00:00:00', 0, '2023-09-10 05:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `db_transport`
--

CREATE TABLE `db_transport` (
  `TransportID` int(11) NOT NULL,
  `TransportDetail` varchar(255) NOT NULL,
  `TransportPrice` varchar(100) NOT NULL,
  `TransportName` varchar(255) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Flgstatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_transport`
--

INSERT INTO `db_transport` (`TransportID`, `TransportDetail`, `TransportPrice`, `TransportName`, `CreateDate`, `Flgstatus`) VALUES
(1, 'บริษัท เคอรี่ เอ็กซ์เพรส (ประเทศไทย) จำกัด (มหาชน)เลขที่ 89 อาคารเจ้าพระยาทาวเวอร์ ชั้นที่ 9 ห้อง 906 ซอยวัดสวนพลู ถนนเจริญกรุง แขวงบางรัก เขตบางรัก กรุงเทพมหานคร 10500', '40', 'เคอรี่ เอ็กซ์เพรส', '2023-08-29 18:03:39', 'A'),
(2, 'บริษัท แฟลช เอ๊กเพรส จำกัด', '50', 'Flash express', '2023-09-10 00:39:14', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`user_id`, `user_name`, `user_login`, `user_pwd`) VALUES
(1, 'ผู้ดูแลระบบ', 'admin', '1234'),
(2, 'ปิยดา แสนสีแก้ว', 'piyada', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_listsell`
--
ALTER TABLE `db_listsell`
  ADD PRIMARY KEY (`listid`);

--
-- Indexes for table `db_member`
--
ALTER TABLE `db_member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `db_payment`
--
ALTER TABLE `db_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `db_productstock`
--
ALTER TABLE `db_productstock`
  ADD PRIMARY KEY (`ProductStockID`);

--
-- Indexes for table `db_producttype`
--
ALTER TABLE `db_producttype`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `db_transport`
--
ALTER TABLE `db_transport`
  ADD PRIMARY KEY (`TransportID`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_listsell`
--
ALTER TABLE `db_listsell`
  MODIFY `listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_member`
--
ALTER TABLE `db_member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_payment`
--
ALTER TABLE `db_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_productstock`
--
ALTER TABLE `db_productstock`
  MODIFY `ProductStockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_producttype`
--
ALTER TABLE `db_producttype`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `db_transport`
--
ALTER TABLE `db_transport`
  MODIFY `TransportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
