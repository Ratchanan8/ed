-- phpMyAdmin SQL Dump
-- version 4.9.5 
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2022 at 03:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ed_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `result` tinyint(1) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer`, `result`, `photo`) VALUES
(1, 1, '2,900 เมตร', 0, ''),
(2, 1, '2,974 เมตร', 0, ''),
(3, 1, '2,960 เมตร', 0, ''),
(4, 1, '2,952 เมตร', 1, ''),
(5, 2, '2%', 1, ''),
(6, 2, '0.4%', 0, ''),
(7, 2, '1.5%', 0, ''),
(8, 2, '2.3%', 0, ''),
(9, 3, '500 – XY บาท', 0, ''),
(10, 3, '500 + (X – Y) บาท', 0, ''),
(11, 3, '500 – X – Y บาท', 0, ''),
(12, 3, '500 – (X + Y) บาท', 1, ''),
(13, 4, '28,703', 0, ''),
(14, 4, '27,830', 1, ''),
(15, 4, '23,870', 0, ''),
(16, 4, '23,780', 0, ''),
(17, 5, '40,800', 0, ''),
(18, 5, '44,000', 0, ''),
(19, 5, '49,800', 1, ''),
(20, 5, '48,000', 0, ''),
(21, 6, '584,638 < 534,633', 0, ''),
(22, 6, '900,900 > 909,090', 0, ''),
(23, 6, '613,273 >  633,721', 0, ''),
(24, 6, '208,048 < 208,480', 1, ''),
(25, 7, '684,950  648,905  645,980', 0, ''),
(26, 7, '456,598  456,809  465,809', 1, ''),
(27, 7, '689,954  698,045  695,048', 0, ''),
(28, 7, '604,958 609,854 608,954', 0, ''),
(29, 8, '450', 0, '166944605120220507_093742.jpg'),
(30, 8, '500', 1, ''),
(31, 8, '4,500', 0, ''),
(32, 8, '5,000', 0, ''),
(33, 9, '86 + 25 = 25 + 86', 0, ''),
(34, 9, '(3 +10) + 7 = 3 +(10 + 7)', 0, ''),
(35, 9, '(11 + 4) + 5 = 11 + (4 + 5)', 1, ''),
(36, 9, '12  x (9 + 6) = (12 x 9) + (12 x 6)', 0, ''),
(37, 10, '98 บาท', 0, ''),
(38, 10, '108 บาท', 0, ''),
(39, 10, '118 บาท', 1, ''),
(40, 10, '128 บาท', 0, ''),
(41, 11, '71 บาท', 0, ''),
(42, 11, '89 บาท', 0, ''),
(43, 11, '91 บาท', 1, ''),
(44, 11, '99 บาท', 0, ''),
(45, 12, '15 x 8 x 5 = ?', 0, ''),
(46, 12, '(15 x 5) ÷ 8 = ?', 0, ''),
(47, 12, '(15 x 8) ÷ 5 = ?', 1, ''),
(48, 12, '(15 x 8) x 5 = ?', 0, ''),
(49, 13, '18,003', 1, ''),
(50, 13, '37,869', 0, ''),
(51, 13, '54,853', 0, ''),
(52, 13, '63,289', 0, ''),
(53, 14, '269', 1, ''),
(54, 14, '2,069', 0, ''),
(55, 14, '2,691', 0, ''),
(56, 14, '20,069', 0, ''),
(57, 15, '17×(27×23)', 0, ''),
(58, 15, '17+(27×23)', 0, ''),
(59, 15, '17×(27+23)', 1, ''),
(60, 15, '(17×17)+(27×23)', 0, ''),
(61, 16, 'a + 1', 0, ''),
(62, 16, 'a + 2', 1, ''),
(63, 16, 'a', 0, ''),
(64, 16, '2a', 0, ''),
(65, 17, '1,000 บาท', 0, ''),
(66, 17, '1,100 บาท', 0, ''),
(67, 17, '1,200 บาท', 1, ''),
(68, 17, '1,300 บาท', 0, ''),
(69, 18, '864 + 44', 0, ''),
(70, 18, '(120×7) + (2×12)', 0, ''),
(71, 18, '74,070 – 73,172', 0, ''),
(72, 18, '13,986 ÷ 14', 1, ''),
(73, 19, '900,900', 0, ''),
(74, 19, '999,990', 0, ''),
(75, 19, '999,999', 1, ''),
(76, 19, '9,999,999', 0, ''),
(77, 20, '24', 0, ''),
(78, 20, '25', 0, ''),
(79, 20, '26', 1, ''),
(80, 20, '27', 0, ''),
(81, 21, '2, 4', 0, ''),
(82, 21, '2, 6', 1, ''),
(83, 21, '4, 4', 0, ''),
(84, 21, '6, 6', 0, ''),
(85, 22, '68.58', 1, ''),
(86, 22, '68.85', 0, ''),
(87, 22, '103.24', 0, ''),
(88, 22, '103.42', 0, ''),
(89, 23, '3', 1, ''),
(90, 23, '5', 0, ''),
(91, 23, '7', 0, ''),
(92, 23, '35', 0, ''),
(93, 24, '396', 1, ''),
(94, 24, '406', 0, ''),
(95, 24, '416', 0, ''),
(96, 24, '426', 0, ''),
(97, 25, '9', 0, ''),
(98, 25, '7', 0, ''),
(99, 25, '5', 0, ''),
(100, 25, '3', 1, ''),
(101, 26, '5', 1, ''),
(102, 26, '10', 0, ''),
(103, 26, '15', 0, ''),
(104, 26, '30', 0, ''),
(105, 27, '8', 0, ''),
(106, 27, '10', 0, ''),
(107, 27, '12', 1, ''),
(108, 27, '14', 0, ''),
(109, 28, '13.28', 0, ''),
(110, 28, '13.58', 0, ''),
(111, 28, '14.28', 1, ''),
(112, 28, '142.8', 0, ''),
(113, 29, '1.001', 0, ''),
(114, 29, '1.103', 0, ''),
(115, 29, '1.203', 1, ''),
(116, 29, '1.301', 0, ''),
(117, 30, '15.11', 1, ''),
(118, 30, '15.01', 0, ''),
(119, 30, '14.11', 0, ''),
(120, 30, '14.01', 0, ''),
(121, 31, 'รูปสามเหลี่ยมหน้าจั่ว', 0, ''),
(122, 31, 'รูปสามเหลี่ยมมุมฉาก', 0, ''),
(123, 31, 'รูปสามเหลี่ยมด้านไม่เท่า', 0, ''),
(124, 31, 'รูปสามเหลี่ยมด้านเท่า', 1, ''),
(125, 32, '195 ตารางเมตร', 0, ''),
(126, 32, '270 ตารางเมตร', 0, ''),
(127, 32, '630 ตารางเมตร', 1, ''),
(128, 32, '930 ตารางเมตร', 0, ''),
(129, 33, '20 เซนติเมตร', 0, ''),
(130, 33, '25 เซนติเมตร', 0, ''),
(131, 33, '32 เซนติเมตร', 0, ''),
(132, 33, '44 เซนติเมตร', 1, ''),
(133, 34, '262.8 เมตร', 0, ''),
(134, 34, '264.4 เมตร', 0, ''),
(135, 34, '265.6 เมตร', 0, ''),
(136, 34, '266.4 เมตร', 1, ''),
(137, 35, '96 ลูกบาศก์เมตร', 0, ''),
(138, 35, '108 ลูกบาศก์เมตร', 1, ''),
(139, 35, '112 ลูกบาศก์เมตร', 0, ''),
(140, 35, '120 ลูกบาศก์เมตร', 0, ''),
(141, 36, '1.0005 กิโลเมตร', 0, ''),
(142, 36, '1.005 กิโลเมตร', 0, ''),
(143, 36, '1.050 กิโลเมตร', 1, ''),
(144, 36, '1.500 กิโลเมตร', 0, ''),
(145, 37, '1.0005 กิโลเมตร', 0, ''),
(146, 37, '1.005 กิโลเมตร', 0, ''),
(147, 37, '1.050 กิโลเมตร', 1, ''),
(148, 37, '1.500 กิโลเมตร', 0, ''),
(149, 38, '200 ลิตร', 0, ''),
(150, 38, '2,000 ลิตร', 1, ''),
(151, 38, '20,000 ลิตร', 0, ''),
(152, 38, '200,000 ลิตร', 0, ''),
(153, 39, '9.00 นาฬิกา', 1, ''),
(154, 39, '10.00 นาฬิกา', 0, ''),
(155, 39, '10.30 นาฬิกา', 0, ''),
(156, 39, '11.00 นาฬิกา', 0, ''),
(157, 40, '240', 0, ''),
(158, 40, '250', 0, ''),
(159, 40, '260', 0, ''),
(160, 40, '270', 1, ''),
(161, 41, 'ร้อยละ 15', 0, ''),
(162, 41, 'ร้อยละ 20', 0, ''),
(163, 41, 'ร้อยละ 25', 1, ''),
(164, 41, 'ร้อยละ 30', 0, ''),
(165, 42, '96 บาท', 1, ''),
(166, 42, '64 บาท', 0, ''),
(167, 42, '50 บาท', 0, ''),
(168, 42, '32 บาท', 0, ''),
(169, 43, '795 บาท', 0, ''),
(170, 43, '825 บาท', 1, ''),
(171, 43, '855 บาท', 0, ''),
(172, 43, '875 บาท', 0, ''),
(173, 44, '4,500 บาท', 0, ''),
(174, 44, '5,000 บาท', 1, ''),
(175, 44, '5,500 บาท', 0, ''),
(176, 44, '6,000 บาท', 0, ''),
(177, 45, '420 คน', 0, ''),
(178, 45, '430 คน', 0, ''),
(179, 45, '440 คน', 1, ''),
(180, 45, '450 คน', 0, ''),
(181, 46, '32.94%', 0, ''),
(182, 46, '34.62%', 0, ''),
(183, 46, '35.45%', 0, ''),
(184, 46, '36.91%', 1, ''),
(185, 47, '319 : 298', 1, ''),
(186, 47, '279 : 198', 0, ''),
(187, 47, '1 : 2', 0, ''),
(188, 47, '2 : 1', 0, ''),
(189, 48, '22.81%', 0, ''),
(190, 48, '26.21%', 0, ''),
(191, 48, '28.21%', 1, ''),
(192, 48, '30.31%', 0, ''),
(193, 49, '200 บาท', 0, ''),
(194, 49, '400 บาท', 1, ''),
(195, 49, '800 บาท', 0, ''),
(196, 49, '1,600 บาท', 0, ''),
(197, 50, '290,007', 0, ''),
(198, 50, '290,097', 0, ''),
(199, 50, '290,997', 0, ''),
(200, 50, '299,997', 1, ''),
(201, 51, '13', 0, ''),
(202, 51, '27', 0, ''),
(203, 51, '32', 1, ''),
(204, 51, '41', 0, ''),
(205, 52, '19', 1, ''),
(206, 52, '38', 0, ''),
(207, 52, '45', 0, ''),
(208, 52, '190', 0, ''),
(209, 53, '7', 0, ''),
(210, 53, '9', 0, ''),
(211, 53, '11', 1, ''),
(212, 53, '13', 0, ''),
(213, 54, '65 เที่ยว', 0, ''),
(214, 54, '60 เที่ยว', 0, ''),
(215, 54, '55 เที่ยว', 1, ''),
(216, 54, '50 เที่ยว', 0, ''),
(217, 55, '6', 0, ''),
(218, 55, '7', 0, ''),
(219, 55, '8', 0, ''),
(220, 55, '9', 1, ''),
(221, 56, '8×(7–a) = 32', 0, ''),
(222, 56, '8×(7–a) = 7', 0, ''),
(223, 56, '6a–8 = 58', 0, ''),
(224, 56, '7–a = 3', 1, ''),
(225, 57, '1.6', 0, ''),
(226, 57, '3.2', 1, ''),
(227, 57, '4.8', 0, ''),
(228, 57, '4.48', 0, ''),
(229, 58, '54', 0, ''),
(230, 58, '68', 0, ''),
(231, 58, '72', 0, ''),
(232, 58, '77', 1, ''),
(233, 59, '112', 0, ''),
(234, 59, '100', 1, ''),
(235, 59, '98', 0, ''),
(236, 59, '86', 0, ''),
(237, 60, '1, 2, 3, 4', 0, ''),
(238, 60, '1, 2, 3, 4, 6', 0, ''),
(239, 60, '1, 2, 3, 4, 6, 12', 1, ''),
(240, 60, '1, 2, 3, 4, 6, 10, 12', 0, ''),
(241, 61, '12', 0, ''),
(242, 61, '6', 1, ''),
(243, 61, '4', 0, ''),
(244, 61, '3', 0, ''),
(245, 62, '15', 0, '187008017720220515_150405.png'),
(246, 62, '20', 0, ''),
(247, 62, '40', 0, ''),
(248, 62, '60', 1, ''),
(249, 63, 'ไก่', 1, '73178775520220511_175057.png'),
(250, 63, 'ไข่', 1, '93544084220220511_175241.png'),
(251, 63, 'ไก่เกิดก่อน เพราะอักษร กอ ไก่ มาก่อน อักษร ขอ ไข่', 1, '82626733420220511_175303.png');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_group` int(1) NOT NULL,
  `question` varchar(250) NOT NULL,
  `url_ref` text NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_group`, `question`, `url_ref`, `photo`) VALUES
(1, 1, 'ถนนสายหนึ่งนับเสาไฟฟ้า 2 ข้างถนนได้ทั้งหมด 740 ต้น และระหว่างเสาห่างกัน 8 เมตร', 'https://xn--12c3bpr6bsv7c.com/%E0%B9%81%E0%B8%99%E0%B8%A7%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%AA%E0%B8%AD%E0%B8%9A%E0%B8%81%E0%B8%9E/%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A3%E0%B8%B9%E0%B9%89%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%AA%E0%B8%B2%E0%B8%A1%E0%B8%B2%E0%B8%A3%E0%B8%96%E0%B8%97%E0%B8%B1%E0%B9%88%E0%B8%A7%E0%B9%84%E0%B8%9B/%E0%B8%84%E0%B8%93%E0%B8%B4%E0%B8%95%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C%E0%B8%97%E0%B8%B1%E0%B9%88%E0%B8%A7%E0%B9%84%E0%B8%9B\r\n\r\n \r\n\r\n', '191675540520220429_192620.jpg'),
(2, 1, 'นายองอาจได้รับเงินเดือนๆ ละ 6,370 บาท เพราะถูกหักเข้ากองทุนประกันสังคม ถ้าอัตราเงินเดือนของนายองอาจ คือ 6,500 บาท ค่าประกันสังคมคิดเป็นกี่เปอร์เซ็นต์', '', '105262752220220429_193043.jpg'),
(3, 1, 'ใช้ธนบัตรใบละ 500 บาท ซื้อของ 2 ชิ้น ราคา X และ Y บาทตามลําดับ จะได้เงินทอนเท่าใด', '', '122348337820220429_193205.jpg'),
(4, 1, 'ค่าของตัวเลข 7 ในข้อใดมีค่ามากที่สุด', 'https://www.mathpaper.net/index.php/en/2019-07-21-17-11-08/1052-6-2', ''),
(5, 1, 'ตัวเลข 5 และตัวเลข 2 ในจำนวน 656,241 มีค่าต่างกันเท่าใด', '', ''),
(6, 1, 'ข้อใดต่อไปนี้ถูกต้อง', '', ''),
(7, 1, 'ข้อใดเป็นการเรียงจำนวนจากน้อยไปหามาก', '', ''),
(8, 1, 'ค่าประมาณใกล้เคียงจำนวนเต็มร้อยและค่าประมาณใกล้เคียงจำนวนเต็มพันของ 574,450 ต่างกันเท่าใด', '', ''),
(9, 1, 'ข้อใดต่อไปนี้ไม่ถูกต้อง', '', ''),
(10, 1, ' ซื้อสมุดราคาเล่มละ 15 บาท จำนวน 6 เล่ม ซื้อปากการาคาด้ามละ 7 บาท จำนวน 4 ด้าม จะต้องจ่ายเงินเท่าไร', '', ''),
(11, 1, 'ซื้อชุดนัเรียนราคาชุดละ 599 บาท ชุดกีฬาราคาชุดละ 350 บาท ให้ธนบัตรหนึ่งพันบาท จะได้รับเงินทอนเท่าไร', '', ''),
(12, 1, 'ข้าวสาร 1 ถุง หนัก 5 กิโลกรัม ข้าวสาร 1 ถัง หนัก 15 กิโลกรัม ข้าวสาร 8 ถัง ตวงใส่ถุงได้กี่ถุง เขียนเป็นประโยคสัญลักษณ์เพื่อหาคำตอบได้ดังข้อใด', '', ''),
(13, 1, 'ตัวเลข 8 ข้อใดมีค่ามากที่สุด', 'https://www.tutorferry.com/2017/09/basic-math-m1-test.html', ''),
(14, 1, 'ค่าของ (2×100) + (6×10) + (9×1) ตรงกับข้อใด', 'https://www.tutorferry.com/2017/09/basic-math-m1-test.html', ''),
(15, 1, '(17×27) + (17×23) มีค่าเท่ากับข้อใด', '', ''),
(16, 1, 'ถ้า a เป็นจำนวนคี่ จำนวนคี่ที่มากกว่า a เป็นจำนวนแรก คือจำนวนใด', '', ''),
(17, 1, 'ต้องการซื้อแท่งพลาสติกแท่งละ 54 บาทจำนวน 22 แท่ง จะต้องเตรียมเงินอย่างคร่าวๆ ประมาณเท่าใดจึงจะใกล้เคียงที่สุด', '', ''),
(18, 1, 'ผลลัพธ์ของข้อใดมีค่ามากที่สุด', '', ''),
(19, 1, 'ตัวเลขจำนวนใดมีค่าประมาณใกล้เคียงกับ 1,000,000 มากที่สุด', '', ''),
(20, 1, 'ถ้า A+2 = 7, B+3 = 11, C+4 = 17 ค่าของ A+B+C ตรงกับข้อใด', '', ''),
(21, 1, 'กำหนดให้ 2 + ∆ = 4, ∆ + @ = 8 จงหาค่าของ ∆ และ @', '', ''),
(22, 1, '∆ + 17.42 = 86   ∆ มีค่าเท่ากับเท่าไร', '', ''),
(23, 1, 'ข้อใดไม่เป็นตัวประกอบของ 35', '', ''),
(24, 1, 'ห.ร.ม. และ ค.ร.น. ของ 36, 48 และ 54 ต่างกันเท่าไร', '', ''),
(25, 1, 'ข้อใดเป็นตัวประกอบเฉพาะของ 27', '', ''),
(26, 1, 'จำนวนนับที่มากที่สุด ที่หาร 60, 85 และ 125 ลงตัวคือจำนวนใด', '', ''),
(27, 1, 'ค.ร.น. ของ 45 และ 60 เป็นกี่เท่าของ ห.ร.ม. ของจำนวนทั้งสอง', '', ''),
(28, 1, '3.4 × 4.2 = ...... ควรเติมข้อใด', 'https://www.tutorferry.com/2017/10/basic-math-m1-test-2.html', ''),
(29, 1, 'กำหนด 0.996, 0.097, 1.3, 1.009 ผลต่างของจำนวนมากที่สุดกับจำนวนที่น้อยที่สุด มีค่าตรงกับข้อใด', '', ''),
(30, 1, '85.004 – (57.59 + 12.304) ได้ผลลัพธ์ตรงกับข้อใด', '', ''),
(31, 1, 'รูปสามเหลี่ยมใดที่มีมุมภายในเท่ากัน', '', ''),
(32, 1, 'ที่ดินรูปสี่เหลี่ยมผืนผ้ามีด้านกว้างสั้นกว่าด้านยาว 9 เมตร ถ้าวัดด้านยาวได้ 30 เมตรที่ดินผืนนี้มีพื้นที่เท่าใด', '', ''),
(33, 1, 'จานรูปวงกลมใบหนึ่งมีรัศมียาว 7 เซนติเมตรจะมีเส้นรอบรูปยาวเท่าไร', '', ''),
(34, 1, 'สนามหญ้ารูปสี่เหลี่ยมผืนผ้ากว้าง 60.5 เมตรยาว 72.7 เมตร ถ้าก่อกำแพงโดยรอบ จะได้กำแพงยาวกี่เมตร', '', ''),
(35, 1, 'สระน้ำรูปสี่เหลี่ยมมุมฉาก มีด้านกว้าง 6 เมตร ลึก 2 เมตร มีความยาวรอบสระ 30 เมตร สระนี้จุน้ำกี่ลูกบาศก์เมตร', '', ''),
(36, 1, 'สนามรูปสี่เหลี่ยมผืนผ้ากว้าง 8 เมตร ยาว 15 เมตร ต้องการทำสนามหญ้าให้ห่างจากกำแพงด้านละ 1 เมตร ดังนั้นพื้นที่ที่ติดกำแพงมีพื้นที่กี่ตารางเมตร', '', ''),
(37, 1, 'ระยะทางจากบ้านสมชายถึงโรงเรียนวัดได้ 1 กิโลเมตร 50 เมตร เขียนอยู่ในรูปทศนิยมที่มีหน่วยเป็นกิโลเมตรได้ตรงกับข้อใด', '', ''),
(38, 1, 'ถังน้ำมีปริมาตร 2 ลูกบาศก์เมตร จะจุน้ำได้กี่ลิตร', '', ''),
(39, 1, 'ตั้งนาฬิกาปลุกไว้ 3 เรือน เรือนแรกปลุกทุกๆ 10 นาที เรือนที่สองปลุกทุกๆ 15 นาทีเรือนที่สามปลุกทุกๆ 20 นาที ถ้าครั้งแรกนาฬิกาปลุกพร้อมกัน เวลา 8.00 น. นาฬิกาจะปลุกพร้อมกันอีกครั้งเวลาเท่าใด', '', ''),
(40, 1, '300% ของ 90 เท่ากับเท่าไร', '', ''),
(41, 1, 'ซื้อตุ๊กตามาราคา 120 บาท ขายไป 150 บาท ได้กำไรร้อยละเท่าไร', '', ''),
(42, 1, 'ซื้อพัดลมมาราคา 480 บาท ขายได้กำไร 20% คิดเป็นกำไรกี่บาท', '', ''),
(43, 1, 'ตู้เย็นหลังหนึ่งร้านค้าติดป้ายราคาไว้ 5,700 บาท ถ้าซื้อเงินสดลดให้ 15% ดังนั้นส่วนลดคิดเป็นเงินกี่บาท', '', ''),
(44, 1, 'สมชายมีรายได้ 25,000 บาท/เดือน เก็บไว้ใช้ส่วนตัว 30% ให้ครอบครัวไป 50% อยากทราบว่า สมชายมีเงินเหลือฝากธนาคารเดือนละเท่าไหร่', '', '21181050720220513_175234.png'),
(45, 1, 'โรงภาพยนตร์แห่งหนึ่งมีผู้ชมนั่งเต็มทุกที่นั่งเมื่อการแสดงพักครึ่งเวลา มีผู้ชมเดินออกมา 22 คน ทำให้มีที่นั่งว่าง 5% โรงภาพยนตร์แห่งนี้จุผู้ชมได้กี่คน', '', ''),
(46, 1, 'ใช้ข้อมูลข้างล่าง ตอบคำถาม 4-6 ตารางแสดงจำนวนนักเรียนที่สอบผ่านวิชาคณิตศาสตร์ พ.ศ. พ.ศ. ชั้น 2547 2548 ป.4 550 600 ป.5 495 545 ป.6 445 450 ในปี พ.ศ. 2547 มีนักเรียน ป.4 ที่สอบผ่านวิชาคณิตศาสตร์คิดเป็นร้อยละเท่าไรของนักเรียนทั้งหมด(ตั้งแต่ ป.4 – ป.6)', '', ''),
(47, 1, 'จากข้อมูลในข้อ 4. อัตราส่วนของนักเรียนที่สอบผ่านวิชาคณิตศาสตร์ทั้งหมดในปี พ.ศ.2548 กับปี พ.ศ.2547 เป็นเท่าใด', '', ''),
(48, 1, 'จากข้อมูลในข้อ 4. ในปี พ.ศ.2548 มีนักเรียนชั้น ป.6 ที่สอบผ่านวิชาคณิตศาสตร์ คิดเป็นร้อยละเท่าไรของนักเรียนทั้งหมด (ตั้งแต่ ป.4 – ป.6)', 'https://www.tutorferry.com/2017/10/50-1-36-50.html', ''),
(49, 1, 'ซื้อเตาอบมาราคา 8,000 บาท ขายไปขาดทุน 5% ขายไปขาดทุนคิดเป็นเงินกี่บาท', '', ''),
(50, 1, 'ค่าของตัวเลข 3 ในจำนวน 325,673 มีค่าแตกต่างกันเท่าไร', '', ''),
(51, 1, 'ถ้า a + 1 = จำนวนคี่ จงหาว่า a มีค่าเท่ากับข้อใด', '', ''),
(52, 1, 'สองเท่าของจำนวนจำนวนหนึ่งมากกว่า 19 อยู่ 19 จำนวนนั้นคือจำนวนอะไร', '', ''),
(53, 1, '6 เท่าของจำนวนๆ หนึ่ง รวมกับ 6 เป็น 72 จำนวนนั้นคืออะไร', '', ''),
(54, 1, 'ผู้รับเหมาก่อสร้างต้องการขนทราย 1,150 คิว แต่รถคันหนึ่งสามารถบรรทุกได้ 21 คิว จงประมาณคร่าวๆ ว่ารถคันนี้ต้องขนทรายทั้งหมดกี่เที่ยว', '', ''),
(55, 1, '88 × ...... = 792 ควรเติมตัวเลขใดลงในช่องว่าง', '', ''),
(56, 1, 'สมการในข้อใดมีคำตอบเหมือนคำตอบของสมการ [8×(7 – a)] + 4 = 28', '', ''),
(57, 1, 'จากสมการ a – 0.8 = 2.40 ดังนั้น a มีค่าเท่าไร', '', ''),
(58, 1, 'ผลบวกของจำนวนเฉพาะตั้งแต่ 1 ถึง 20 มีค่าเท่าไหร่', '', ''),
(59, 1, 'จำนวนใดที่มีค่าน้อยที่สุดซึ่งหารด้วย 24, 32 และ 48 แล้วเหลือเศษ 4', '', ''),
(60, 1, 'ข้อใดเป็นตัวประกอบทั้งหมดของ 12', '', ''),
(61, 1, 'จำนวนใดเป็นตัวหารร่วมมากของ 6 และ 12', '', ''),
(62, 1, 'ตัวคูณร่วมน้อยของ 15 และ 20 คือจำนวนใด', '', ''),
(63, 1, 'ไก่กับไข่อะไรเกิดก่อนกัน', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `question_group`
--

CREATE TABLE `question_group` (
  `id` int(1) NOT NULL,
  `name1` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_group`
--

INSERT INTO `question_group` (`id`, `name1`) VALUES
(1, 'Mathematics'),
(2, 'Miljö'),
(3, 'Trafiksäkerhet'),
(4, 'Trafikregler'),
(5, 'Personliga förutsättningar');

-- --------------------------------------------------------

--
-- Table structure for table `test_temp`
--

CREATE TABLE `test_temp` (
  `username1` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_self` int(11) NOT NULL,
  `score` tinyint(1) NOT NULL,
  `mark` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_temp`
--

INSERT INTO `test_temp` (`username1`, `question_id`, `answer_self`, `score`, `mark`) VALUES
('cc', 17, 67, 1, ''),
('cc', 10, 39, 1, ''),
('cc', 8, 30, 1, ''),
('cc', 4, 14, 1, ''),
('cc', 42, 165, 1, ''),
('cc', 39, 153, 1, ''),
('cc', 52, 205, 1, ''),
('cc', 54, 215, 1, ''),
('cc', 18, 72, 1, ''),
('cc', 46, 184, 1, ''),
('fefe', 37, 147, 1, ''),
('fefe', 63, 251, 1, ''),
('fefe', 4, 14, 1, ''),
('fefe', 19, 75, 1, ''),
('fefe', 33, 132, 1, ''),
('fefe', 40, 160, 1, ''),
('fefe', 47, 185, 1, ''),
('fefe', 8, 30, 1, ''),
('fefe', 58, 231, 0, ''),
('fefe', 44, 174, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username1` varchar(50) NOT NULL,
  `status1` varchar(1) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password1` varchar(50) NOT NULL,
  `pass_group` varchar(3) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username1`, `status1`, `name1`, `email`, `password1`, `pass_group`, `trn_date`) VALUES
(1, 'fefe', '1', 'Ratchanan Singsaeng', 'thanapon_i@hotmail.com', '5416d7cd6ef195a0f7622a9c56b55e84', 'ADM', '2022-02-13 17:49:41'),
(2, 'sean', '1', 'Sean Henry1', 'sean@hotmail.com1', '5416d7cd6ef195a0f7622a9c56b55e84', 'USE', '2022-04-02 16:57:48'),
(3, 'nata1', '0', 'Natalia Sing1', 'nata@yahoo.com1', '46d045ff5190f6ea93739da6c0aa19bc', 'ADM', '2022-03-31 18:15:39'),
(56, 'nave1', '0', 'nave1', 'nave@yahoo.com', '1234', 'ADM', '2022-04-01 05:41:22'),
(57, 'anny', '1', 'Anny Metap', 'anny@yahoo.com', '1234', 'USE', '2022-04-01 05:40:53'),
(58, 'thana', '1', 'Thanapon Sing', 'thana@gmail.com', 'f4068fca1263d83cc4a898c90a87ad38', 'USE', '2022-04-04 18:11:08'),
(59, 'rere', '1', 'rere rere', 're@re.com', '1234', 'USE', '2022-04-05 19:32:31'),
(60, 'tt', '1', 'tt', 'tt@hotmail.com', '5416d7cd6ef195a0f7622a9c56b55e84', 'USE', '2022-04-05 19:39:19'),
(61, 'mksuki', '1', 'MK Suki', 'mk@hotmail.com', 'ebfbc475c1d97ff2a0503797568d7daf', 'USE', '2022-05-12 14:56:40'),
(62, 'gucci', '1', 'Gucci GG', 'gucci@gmail.com', '24b4b388e8fb734a395ec5c3d0ad258c', 'USE', '2022-05-12 15:16:16'),
(66, 'cc', '1', 'cc', 'cc@yahoo.com', 'e0323a9039add2978bf5b49550572c7c', 'USE', '2022-05-12 15:47:43'),
(67, 'test', '0', 'Test Test2', 'test@gmail.com2', '5416d7cd6ef195a0f7622a9c56b55e84', 'ADM', '2022-05-12 19:52:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_group`
--
ALTER TABLE `question_group`
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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
