-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 02:29 PM
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
-- Database: `myinternship_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ac_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_regis` timestamp NOT NULL DEFAULT current_timestamp(),
  `act_id` int(10) NOT NULL COMMENT 'ประเภทบัญชี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_id`, `username`, `password`, `date_regis`, `act_id`) VALUES
(1, 'roseedee', '2002', '2023-01-13 13:16:01', 1),
(17, 'roseedee', '12345', '2023-01-04 19:09:17', 2),
(31, 'xang12341@gmail.com', '12341', '2023-01-08 08:41:28', 2),
(32, 'nahza2000@gmail.com', '12341', '2023-01-08 08:56:33', 2),
(33, 'manaw1ho2@gmail.com', '12341', '2023-01-08 09:14:57', 2),
(34, 'hanee12341@gmail.com', '12341', '2023-01-08 09:33:06', 2),
(51, 'farasah2000@gmail.com', '12341', '2023-01-10 10:43:22', 2),
(52, 'Gintama', '12341', '2023-01-10 10:58:56', 2),
(53, 'deechang@gmail.com', '12345678', '2023-01-10 23:47:44', 2),
(54, 'fff', '12345678', '2023-01-11 02:39:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `act_id` int(10) NOT NULL,
  `act_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`act_id`, `act_type`) VALUES
(1, 'student'),
(2, 'company');

-- --------------------------------------------------------

--
-- Table structure for table `address_company`
--

CREATE TABLE `address_company` (
  `ad_id` int(10) NOT NULL,
  `ad_address` varchar(50) NOT NULL,
  `ad_sub_district` varchar(20) NOT NULL,
  `ad_district` varchar(20) NOT NULL,
  `ad_province` varchar(20) NOT NULL,
  `ad_zipcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_company`
--

INSERT INTO `address_company` (`ad_id`, `ad_address`, `ad_sub_district`, `ad_district`, `ad_province`, `ad_zipcode`) VALUES
(17, '3/8 Banhadsai', 'ธารคีรี', 'สะบ้าย้อย', 'สงขลา', '90210'),
(31, '95/1', 'บาเจาะ', 'บันนังสตา', 'ยะลา', '95130'),
(32, '95/1', 'บันนังสตา', 'บันนังสตา', 'ยะลา', '95130'),
(33, '95/1', 'บันนังสตา', 'บันนังสตา', 'ยะลา', '95130'),
(34, '95/1', 'บันนังสตา', 'บันนังสตา', 'ยะลา', '95130'),
(51, '95/1', 'บันนังสตา', 'บันนังสตา', 'ยะลา', '95130'),
(52, '95/1', 'บันนังสตา', 'บันนังสตา', 'ยะลา', '95130'),
(53, '3/8 Banhadsai', 'บังนังสตา', 'บังนังสตา', 'Yala', '95130'),
(54, '3/8 Banhadsai', 'กดเกด', 'กดเกดเ', 'single', '90210');

-- --------------------------------------------------------

--
-- Table structure for table `address_student`
--

CREATE TABLE `address_student` (
  `ad_id` int(10) NOT NULL,
  `ad_address` varchar(50) NOT NULL,
  `ad_sub_district` varchar(10) NOT NULL,
  `ad_district` varchar(10) NOT NULL,
  `ad_province` varchar(10) NOT NULL,
  `ad_zipcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_student`
--

INSERT INTO `address_student` (`ad_id`, `ad_address`, `ad_sub_district`, `ad_district`, `ad_province`, `ad_zipcode`) VALUES
(1, '3/8 Banhadsai', 'ฟหกด', 'ฟหกด', 'single', '90210');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cp_id` int(10) NOT NULL,
  `cp_nameth` varchar(30) NOT NULL,
  `cp_nameeng` varchar(30) DEFAULT NULL,
  `cp_email` varchar(50) NOT NULL,
  `cp_tel` varchar(20) NOT NULL,
  `cp_jobdetails` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cp_id`, `cp_nameth`, `cp_nameeng`, `cp_email`, `cp_tel`, `cp_jobdetails`) VALUES
(17, 'ดี คอมพิวเตอร์', 'Dee Computer', 'roseedee2002@gmail.com', '0630742165', '<h1>ร้านดี คอมพิวเตอร์</h1>'),
(31, 'นัน คอมพิวเตอร์', 'nang comtuter', 'xang12341@gmail.com', '0845024911', 'ความตั้งใจของพี่ในการรับสมัครน้องฝึกงาน คือ เพื่อให้น้องได้สัมผัสประสบการณ์ที่มีคุณค่าที่สุดช่วงหนึ่งในชีวิต \r\n'),
(32, 'นาห์เซีย', 'nahzia internet', 'nahza2000@gmail.com', '0845024911', 'เพื่อให้น้องได้ประสบการณ์ ต่างๆในการฝึกงาน \r\n'),
(33, 'บริษัท มะนาว สถาปนิก', 'manaw architect', 'manaw1ho2@gmail.com', '0980369840', 'ออกแบบงานสถาปัตยกรรม\r\n'),
(34, 'ร้าน ฮานนี่ ', 'hanee zone', 'hanee12341@gmail.com', '0980369840', '-รับนักร้อง และ ดนตรี  <br>\r\n-ประสานงานกับ โปรดิวเซอร์ได้ และผู้ที่เกี่ยวข้อง<br>\r\n-สามารถ เลือกเวลาได้  รีบมาสมัครกันน๊าา<br>'),
(51, 'ร้านฟาซาระห์', 'Farasah Famous', 'farasah2000@gmail.com', '0987654321', 'รับงานนักศึกษา ปวช ปวส'),
(52, 'ร้านสารพัดรับจ้าง', 'Yorozuya Gin-chan', 'Yorozuya Gin-chan', '0293847561', 'ร้านสารพัดรับจ้าง หรือ ร้านรับจ้างสารพัด<br>\r\nรับจ้างทำทุกอย่าง<br>'),
(53, 'ร้านดีจัง คอมพิวเตอร์', 'dee chang computer store', 'deechang@gmail.com', '03164766332326', 'ร้านซ่อมคอม'),
(54, 'ร้านอย่าใจร้ายน่ะ', 'Roseedee Cehleah', 'roseedee2002@gmail.com', '0000000', 'ร้สฟาห่กวสาด');

-- --------------------------------------------------------

--
-- Table structure for table `intelligent_type`
--

CREATE TABLE `intelligent_type` (
  `itt_id` int(10) NOT NULL,
  `itt_type` varchar(45) NOT NULL,
  `itt_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intelligent_type`
--

INSERT INTO `intelligent_type` (`itt_id`, `itt_type`, `itt_description`) VALUES
(1, 'ปัญญาด้านมิติสัมพันธ์', NULL),
(2, 'ปัญญาด้านภาษา', NULL),
(3, 'ปัญญาด้านตรรกะและคณิตศาสตร์', NULL),
(4, 'ปัญญาด้านร่างการและการเคลื่อนไหว', NULL),
(5, 'ปัญญาด้านดนตรี', NULL),
(6, 'ปัญญาด้านมนุษย์สัมพันธ์', NULL),
(7, 'ปัญญาด้านความเข้าใจตนเอง', NULL),
(8, 'ปัญญาด้านธรรมชาติวิทยา', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `j_id` int(10) NOT NULL,
  `j_jobname` varchar(45) NOT NULL,
  `itt_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `j_jobname`, `itt_id`) VALUES
(1, 'สถาปนิก', 1),
(2, 'ศิลปิน', 1),
(3, 'มัณฑนากร', 1),
(4, 'วิศวกร', 1),
(5, 'นักออกแบบ', 1),
(6, 'นักเขียน', 2),
(7, 'นักประพันธ์', 2),
(8, 'นักข่าว', 2),
(9, 'ทนายความ', 2),
(10, 'ครูอาจารย์', 2),
(11, 'ไอที/เขียนโปรแกรม', 3),
(12, 'วิศวกร', 3),
(13, 'บัญชี', 3),
(14, 'งานวิจัยและวิทยาศาสตร์', 3),
(15, 'ช่างซ่อมรถยนต์', 4),
(16, 'ช่างเชื่อม', 4),
(17, 'ช่างไฟฟ้า', 4),
(18, 'จิตรกร', 4),
(19, 'นักประดิษฐ์', 4),
(20, 'ศัลยแพทย์', 4),
(21, 'นักดนตรี', 5),
(22, 'นักประพันธ์', 5),
(23, 'นักร้อง', 5),
(24, 'ครูสอนดนตรี', 5),
(25, 'นักจิตวิทยา', 6),
(26, 'ที่ปรึกษา', 6),
(27, 'นักขาย', 6),
(28, 'นักการเมือง', 6),
(29, 'นักปรัชญา', 7),
(30, 'งานเขียน', 7),
(31, 'นักทฤษฎี', 7),
(32, 'นักวิทยาศาสตร์', 7),
(33, 'นักชีววิทยา', 8),
(34, 'นักอนุรักษ์', 8),
(35, 'ชาวสวนชาวไร่', 8);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `mj_id` int(10) NOT NULL,
  `mj_name` varchar(45) NOT NULL,
  `mj_education_lv` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`mj_id`, `mj_name`, `mj_education_lv`) VALUES
(1, 'ช่างยนต์', 0),
(2, 'ช่างกลโรงงาน', 0),
(3, 'ช่างเชื่อมโลหะ', 0),
(4, 'ช่างไฟฟ้ากำลัง', 0),
(5, 'ช่างอิเล็กทรอนิกส์', 0),
(6, 'ช่างก่อสร้าง', 0),
(7, 'สถาปัตยกรรม', 0),
(8, 'ช่างเทคนิคคอมพิวเตอร์', 0),
(9, 'คอมพิวเตอร์ธุรกิจ', 0),
(10, 'เทคนิคเครื่องกล', 1),
(11, 'เทคนิคการผลิต', 1),
(12, 'เทคนิคโลหะ', 1),
(13, 'ไฟฟ้า', 1),
(14, 'เทคโนโลยีโทรคมนาคม', 1),
(15, 'โยธา', 1),
(16, 'เทคนิคสถาปัตยกรรม', 1),
(17, 'เทคโนโลยีคอมพิวเตอร์', 1),
(18, 'เทคโนโลยีธุรกิจดิจิทัล', 1);

-- --------------------------------------------------------

--
-- Table structure for table `major_intelligent_type`
--

CREATE TABLE `major_intelligent_type` (
  `mj_id` int(10) NOT NULL,
  `itt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major_intelligent_type`
--

INSERT INTO `major_intelligent_type` (`mj_id`, `itt_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(7, 1),
(8, 3),
(9, 3),
(9, 6),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(16, 1),
(17, 3),
(18, 3),
(18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `major_job`
--

CREATE TABLE `major_job` (
  `mj_id` int(10) NOT NULL,
  `j_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major_job`
--

INSERT INTO `major_job` (`mj_id`, `j_id`) VALUES
(1, 15),
(2, 12),
(3, 16),
(4, 17),
(5, 17),
(6, 4),
(7, 1),
(7, 3),
(7, 5),
(7, 18),
(8, 5),
(8, 11),
(8, 13),
(9, 5),
(9, 11),
(9, 13),
(10, 15),
(11, 12),
(12, 16),
(13, 17),
(14, 17),
(15, 12),
(16, 1),
(16, 3),
(16, 5),
(16, 18),
(17, 5),
(17, 11),
(17, 13),
(18, 5),
(18, 11),
(18, 13);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(10) NOT NULL,
  `p_title` varchar(45) NOT NULL,
  `p_details` varchar(255) NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `j_id` int(10) NOT NULL,
  `cp_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_details`, `p_date`, `j_id`, `cp_id`) VALUES
(2, 'ช่างคอมพิวเตอร์', 'รู้จักอุปกรณ์มีความรับผิดชอบตรงต่อเวลา', '2023-01-08 05:50:18', 11, 17),
(3, 'เขียนโปรแกรม', 'มีพื้นฐานการเขียนโปรแกรมดังนี้<br>\r\n<p style=\"text-indent: 20px;\">HTML</p>\r\n<p style=\"text-indent: 20px;\">CSS</p>\r\n<p style=\"text-indent: 20px;\">Javascript</p>\r\n<p style=\"text-indent: 20px;\">PHP</p>', '2023-01-08 05:50:33', 11, 17),
(9, 'รับเด็กฝึกงาน ทำกราฟฟิก', '- พัฒนา  และประสานงานกับผู้เกี่ยวข้องพื่อส่งมอบงานตามกำหนดเวลาที่ตกลงกันไว้<br>\r\n- จัดระบบเอกสาร ไฟล์งาน ข้อมูล และคลังความรู้ต่างๆ<br>\r\n- ดูแลระบบ ZOOM ในระหว่างการอบรม<br>\r\n- งานอื่นๆ ตามที่ได้รับมอบหมาย<br>', '2023-01-08 08:44:22', 11, 31),
(10, 'ซ่อมคอม ซ่อมโบ็ตบุค', '- สามารถซ่อมคอมพิวเตอร์ โน็ตบุคและปริ้นเตอร์ ลงวินโดวส์<br>\r\n- จัดสายคอม ส่งสินค้าให้ลูกค้า และเก็บข้อมูลคลังต่างๆ<br>\r\n- ดูแลอุปกรณ์ ในระหว่างการอบรม<br>\r\n- งานอื่นๆ ตามที่ได้รับมอบหมาย', '2023-01-08 08:49:38', 11, 31),
(13, 'รับฝึกงาน สถาปนิก  ออกแบบบ้าน', '-ออกแบบงานสถาปัตยกรรม<br>\r\n-ควบคุมและตรวจสอบงานก่อสร้างของผู้รับเหมา<br>\r\n-ประสานงานกับผู้รับเหมา Suppliers และผู้ที่เกี่ยวข้อง<br>\r\n-จำนวน 3 อัตตรา', '2023-01-08 09:16:58', 1, 33),
(14, 'รับฝึกงาน ออกแบบบ้าน ทำแบบแปลงบ้าน', '-ออกแบบงานสถาปัตยกรรม<br>\r\n-ทำแบบแปลงบ้าน<br>\r\nจำนวน 1 อัตตรา', '2023-01-08 09:18:37', 1, 33),
(15, 'รับเด็กฝึกงาน สามารถร้องเพลงได้', '-รับนักร้อง และ ดนตรี  <br>\r\n-ประสานงานกับ โปรดิวเซอร์ได้ และผู้ที่เกี่ยวข้อง<br>\r\n-สามารถ เลือกเวลาได้   จำนวน 2 อัตตรา <br>', '2023-01-08 09:34:15', 2, 34),
(16, 'รับนักดนตรี', '- เล่นดนตรีได้   <br>\r\n-ประสานงานกับ โปรดิวเซอร์และนักร้อง ได้ และผู้ที่เกี่ยวข้อง<br>\r\n-สามารถ เลือกเวลาฝึกงานได้ จำนวน <br>\r\n-จำนวน 5 อัตตรา <br>', '2023-01-08 09:36:30', 2, 34),
(17, 'รับฝึกงาน พิธีกร ', '-รับพิธีกร <br>\r\n-ประสานงานกับ โปรดิวเซอร์ได้ และผู้ที่เกี่ยวข้อง<br>\r\n-สามารถแอนเดอร์แทรนเนอร์<br>\r\n-จำนวน 3 อัตตรา', '2023-01-08 09:45:02', 2, 34),
(20, 'ช่างไฟ', 'ซ่อมอุปกรณ์ไฟฟ้าได้', '2023-01-09 12:21:56', 17, 17),
(21, 'ช่างไฟฟ้า', 'สามารถซ่อมอุปกรณ์ไฟฟ้าได้\r\nสามารถเดินระบบไฟภายในอาคารได้', '2023-01-09 12:31:39', 17, 17),
(22, 'ซ่อมคอมพิวเตอร์ ปริ้นเตอร์ ', 'มีความรู้ด้าน IT และเทคโนโลยีดิจิทัล<br>\r\nรับซ่อมคอมลง<br>\r\nลงวินโดวส์<br>\r\nลงโปรแกรม<br>\r\nซ่อมปริ้นเตอร์<br>', '2023-01-10 09:59:41', 11, 32),
(23, 'รับเด็กผึกงานขายคอมพิวเตอร์ และ โน็ตบุ๊ค', 'สื่อสารได้อย่างมีประสิทธิภาพ และมีความสามารถทางภาษา<br>\r\nวิเคราะห์ข้อมูลเป็น และนำมาใช้ประโยชน์ได้<br>\r\nมีความรู้ด้าน IT และเทคโนโลยีดิจิทัล<br>\r\nสามารถการปรับตัวและจัดลำดับความสำคัญได้<br>\r\nมีมนุษยสัมพันธ์<br>', '2023-01-10 10:01:35', 11, 32),
(24, 'ซ่อมคอม ซ่อมโบ็ตบุค ', 'สื่อสารได้อย่างมีประสิทธิภาพ และมีความสามารถทางภาษา<br>\r\nวิเคราะห์ข้อมูลเป็น และนำมาใช้ประโยชน์ได้<br>\r\nมีความรู้ด้าน IT และเทคโนโลยีดิจิทัล<br>\r\nสามารถการปรับตัวและจัดลำดับความสำคัญได้<br>\r\nมีมนุษยสัมพันธ์<br>', '2023-01-10 10:08:45', 11, 31),
(25, 'รับเด็กผึกงานซ่อมคอมโทรศัพท์มือถือ', 'ป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา<br>\r\n การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>', '2023-01-10 10:10:52', 11, 32),
(26, 'รับเด็กสถาปัตมาฝึกงาน', 'มีใจรักในวิถีอาชีพ <br>\r\nรักและเข้าใจในงาน<br>\r\nขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี <br>\r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>\r\n', '2023-01-10 10:14:12', 1, 34),
(27, 'ฝึกงานออกแบบแปลงบ้าน', 'ต้องมีระเบียบ วินัย <br>\r\nความรับผิดชอบ <br>\r\nมีความอดทนสูง <br>', '2023-01-10 10:16:21', 1, 34),
(28, 'รับฝึกงาน สถาปนิก  ออกแบบบ้าน ', 'รับผิดชอบ <br>\r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน<br> \r\nมีความรู้ในอาชืพ <br>\r\nมีประสบการณ์ <br>\r\nมีทักษะกระบวนการทำงาน  <br>', '2023-01-10 10:22:26', 1, 33),
(29, 'รับเด็กฝึกงาน ออกแบบตกแต่งภายใน', 'วางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>\r\nถนัดเรื่องการออกแบบเป็นอย่างดี<br>', '2023-01-10 10:28:52', 3, 33),
(30, 'Interior designer ฝึกงาน', 'ออกแบบตกแต่งภายใน <br>\r\nมีหน้าที่ออกแบบ วางแผนและควบคุมงานสถาปัตยกรรมภายในอาคาร <br>', '2023-01-10 10:30:53', 3, 33),
(31, 'ออกแบบตกแต่งภายในบ้าน ฝึกงาน', 'ออกแบบตกแต่งภายในตามความต้องการของผู้ว่าจ้าง<br>\r\nให้คำแนะนำเกี่ยวกับงานออกแบบตกแต่งภายใน<br>\r\nควบคุมงานออกแบบตกแต่งภายใน<br>\r\nออกแบบตกแต่งภายให้เกิดความสวยงามและก่อให้เกิดประโยชน์สูงสุด<br>', '2023-01-10 10:35:15', 3, 34),
(32, 'รับฝึกงาน เด็กวิศวะ', 'วิเคราะห์ คำนวณ ออกแบบ<br> \r\nตรวจสอบแก้ไขปัญหาและควบคุมการผลิต<br>\r\nจำนวน 5 อัตตรา <br>', '2023-01-10 10:44:52', 4, 51),
(33, 'รับฝึกงาน วิศวะกร ไฟฟ้า', 'วิเคราะห์ คำนวณ ออกแบไฟฟ้า<br> \r\nตรวจสอบแก้ไขปัญหาและควบคุมการผลิตไฟได้<br>', '2023-01-10 10:47:41', 4, 51),
(34, 'รับฝึกงาน วิศวะกรเครื่องจักรกล', 'การควบคุมเครื่องจักรกลโรงงาน<br>\r\nป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล <br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>', '2023-01-10 10:49:43', 4, 51),
(35, 'รับเด็กฝึกงาน มาทำงาน สวนส้ม', 'มีใจรักในวิถีอาชีพ <br>\r\nรักและเข้าใจธรรมชาติ <br>\r\nขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี <br>\r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>', '2023-01-10 11:00:30', 35, 52),
(36, 'รับฝึกงาน  ทำสวนต่างๆ', 'มีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>\r\nช่างสังเกต <br>\r\nเมื่อเห็นความผิดปกติใด ๆ จะได้ทำการรักษาหรือแก้ไขได้<br>\r\nมีจรรยาบรรณ มีความรับผิดชอบต่อผู้บริโภค <br>\r\nมีมนุษยสัมพันธ์ <br>\r\nทักษะในการเข้าสังคม<br>\r\n', '2023-01-10 11:01:39', 35, 52),
(37, 'รับสมัคร นักอนุรักษ์สิ่งแวดล้อม', 'รณรงค์ ให้ข้อมูลที่ถูกต้อง <br>\r\n ดูแลธรรมชาติ<br>\r\nจิตอาสา<br>\r\n3 อัตตรา <br>', '2023-01-10 11:05:06', 34, 52),
(38, 'รับสมัคร อุตุนิยมวิทยา', 'จัดการน้ำ และระบบนิเวศ<br>\r\n ให้คนได้เข้าใจถึงธรรมชาติ<br> \r\nการรับมือภัยธรรมชาติ <br>\r\nภัยพิบัติต่างๆ <br>\r\nรวมถึงการรับมือ ต่อสู้กับภาวะโลกร้อน<br>\r\nจำนวน 6 อัตตรา', '2023-01-10 11:07:12', 34, 52),
(39, 'อยากมาฝึกงานเป็นนักอนุรักษ์', '•อนุรักษ์มรดกทางศิลปวัฒนธรรม<br>\r\n•การฝึกอบรมทั้งภาคทฤษฎีและปฏิบัติ<br>\r\n •สามารถสื่อสารและใช้ภาษาอังกฤษในการทำงานได้<br>\r\n• สามารถทำงานกลางแจ้งได้ <br>\r\n• สามารถทำงานบนนั่งร้านที่มีความสูงได้<br>', '2023-01-10 11:13:11', 34, 52),
(40, 'รับเด็กฝึกงาน เกี่ยวกับสวนทุเรียน', 'ขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี<br> \r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>\r\nมีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>\r\n\r\n\r\n', '2023-01-10 11:19:35', 35, 52),
(41, 'รับเด็กฝึกงาน เกี่ยวกับสวนยางพารา', 'อบรมฟรี<br>\r\nศึกษาดูงงานตลอด 6เดือน<br>\r\nมีสถานที่พัก <br>\r\nขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี<br> \r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>\r\nมีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>\r\n\r\n\r\n', '2023-01-10 11:19:46', 35, 52),
(42, 'ชีววิทยา รับฝึกงาน', 'ความรู้เบื้องต้น<br>\r\n1.รังสีการแพทย์<br>\r\n2.เคมี, เคมีวิเคราะห์<br>\r\n3.ประสบการณ์ในงานรังสีการแพทย์<br>\r\n4.เภสัชรังสี, งานวิจัย/แลบ<br>\r\nอัตรา 1 อัตรา<br>\r\n', '2023-01-10 11:28:54', 33, 52),
(43, 'ด่วน รับเด็กฝึกงาน นักชีวะวิทยา ตรง', 'อัตรา 1 อัตรา<br>\r\nรูปแบบงาน งานประจำ (Full Time)<br><br>\r\nวิธีการรับสมัครงาน<br>\r\nสมัครด้วยตนเองที่บริษัท รับจ้างสารพัด (ประเทศไทย) จำกัด<br>\r\nหรือส่ง อีเมล์มาที่ ginta@gmail.com<br>\r\nโทร 0845024911<br>', '2023-01-10 11:30:12', 33, 52),
(44, 'รับเด็กฝึกงาน การผสมสารเคมี', 'ขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี <br>\r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>\r\nมีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>\r\n', '2023-01-10 11:32:51', 32, 52),
(45, 'วิเคราะ ออกแบบระบบเนื้อเยื้อพืชรับฝึกงาน', 'ความรู้เบื้องต้น<br>\r\n.รังสีการแพทย์<br>\r\n.เคมี, เคมีวิเคราะห์<br>\r\n.ประสบการณ์ในงานรังสีการแพทย์<br>\r\n.เภสัชรังสี, งานวิจัย/แลบ<br>\r\nมีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>', '2023-01-10 11:34:16', 32, 52),
(46, 'รับเด็กฝึกงาน เกี่ยวกับงานวิจัย ระบบสุริยะ ', 'ต้องมีความขยัน <br>\r\nรับผิดชอบ<br> \r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน <br>\r\nมีความรู้ในอาชืพ <br>\r\nมีประสบการณ์ <br>', '2023-01-10 11:37:06', 32, 52),
(47, 'เด็กฝึกงานสายตรง นักทฎี', 'ต้องมีความขยันความรับผิดชอบ <br>\r\nมีความละเอียด<br>\r\nมีความอดทนสูง <br>', '2023-01-10 11:39:34', 31, 52),
(48, 'รับสมัคร สายตรง ทฎษฎี', 'เป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>\r\n\r\n', '2023-01-10 11:41:17', 31, 52),
(49, 'รับสมัครนักเขียนนิยาย', 'วางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>', '2023-01-10 11:42:45', 30, 52),
(50, 'รับคนแต่งนิยาย วาย ', 'วางแผนและการจัดการงานได้อย่างดี<br>\r\nสื่อสารได้อย่างมีประสิทธิภาพ และมีความสามารถทางภาษา<br>\r\nวิเคราะห์ข้อมูลเป็น และนำมาใช้ประโยชน์ได้<br>\r\n', '2023-01-10 11:44:36', 30, 52),
(51, 'รับสมัครนักปรัชญา', 'มีมนุษยสัมพันธ์<br>\r\nเป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\n', '2023-01-10 11:45:31', 29, 52),
(52, 'ด่วน รับปรัชญา มาฝึก เด็กฝึกงาน', 'มีมนุษยสัมพันธ์<br>\r\nเป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\n', '2023-01-10 11:47:12', 29, 34),
(53, 'รับสมัคร นักศึกษาที่สนใจด้านการเมือง', 'มีมนุษยสัมพันธ์<br>\r\nมีการฝึกอบรม<br>\r\nอดทน<br>\r\nเป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\n', '2023-01-10 11:48:35', 28, 34),
(54, 'สมัครเป็นนักการเมืองทางนี่เลย', 'ขยัน อดทน ร่างกายแข็งแรง<br>\r\nสามารถปรับตัวเข้ากับสถานการณ์ต่าง ๆ ได้ดี <br>\r\nพร้อมที่จะเรียนรู้สิ่งใหม่ ๆ อยู่ตลอดเวลา<br>\r\nมีความรับผิดชอบ สามารถบริหารจัดการเวลาของตัวเองได้<br>\r\n', '2023-01-10 11:49:49', 28, 34),
(55, 'รับเด็กฝึกงาน เกี่ยวการขายสินค้ายางพารา', 'ช่างสังเกต <br>\r\nเมื่อเห็นความผิดปกติใด ๆ จะได้ทำการรักษาหรือแก้ไขได<br>\r\nมีจรรยาบรรณ มีความรับผิดชอบต่อผู้บริโภค <br>\r\nมีมนุษยสัมพันธ์ <br>\r\nทักษะในการเข้าสังคม<br>\r\nมนุษยสัมพันธ์ที่ดี <br>', '2023-01-10 11:52:12', 27, 52),
(56, 'รับเด็กฝึกงาน เกี่ยวกับการขาย อาหารเสริม', 'วางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>', '2023-01-10 11:53:25', 27, 52),
(57, 'ชอบขายขาย ทางนี่เลย ', 'รับผิดชอบ <br>\r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน<br> \r\nมีความรู้ในอาชืพ <br>\r\nมีประสบการณ์ <br>\r\nมีทักษะกระบวนการทำงาน<br>  \r\nการสื่อสาร<br>', '2023-01-10 11:55:49', 27, 52),
(58, 'ฝึกงานเกี่ยวกับ ที่ปรึษา สายตรงทางนี้', 'สามารถเรียนรู้ได้เร็ว เข้าใจง่าย<br>\r\nเป็นคนช่างสังเกต มีความสามารถเลือกที่จะรับรู้ รวบรวมข้อมูลได้ดี<br>\r\nมีวิจารณญาณในการตัดสินใจได้ดี<br>\r\nมีความสามารถในการวิเคราะห์และการสังเคราะห์ข้อมูล<br>\r\nรู้จักใช้เหตุผล<br>\r\nมีความคิดริเริ่มสร้างสรรค์<br>', '2023-01-10 11:57:50', 26, 52),
(59, 'รับสมัคร นักศึกษาที่สนใจ ใน งานที่ปรึกษา', 'รับผิดชอบ <br>\r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน<br> \r\nมีความรู้ในอาชืพ <br>\r\nมีประสบการณ์ <br>\r\nมีทักษะกระบวนการทำงาน<br>  \r\nการสื่อสาร<br>', '2023-01-10 11:58:56', 26, 52),
(60, 'สมัคร อาชีพจิตวิทยา', 'คุณสมบัติของนักจิตวิทยา <br>\r\n1. สำเร็จการศึกษาระดับปริญญาตรีคณะสังคมศาสตร์, คณะมนุษยศาสตร์ในประเภทสาขาการศึกษาจิตวิทยา<br>\r\n 2. มีความเมตตา มีใจรักที่จะช่วยเหลือผู้ป่วย<br>\r\n 3. ต้องเป็นคนที่มีคุณธรรม จริยธรรม รู้จัดอดทนอดกลั้น<br>', '2023-01-10 12:03:07', 25, 52),
(61, 'เปิดรับสมัครอาชีพ จิตวิทยา', 'มุ่งมั่นในการทำงาน<br> \r\nมีความรู้ในอาชืพ <br>\r\nมีประสบการณ์ <br>\r\nมีทักษะกระบวนการทำงาน<br>  \r\nการสื่อสาร<br>', '2023-01-10 12:04:08', 25, 34),
(62, 'รับสมัครครูดนตรี', 'การพัฒนาทั้งอัตลักษณ์ของนักดนตรี <br>\r\n ทำหน้าที่ถ่ายทอดวิชาความรู้ เป็นแบบอย่างใน การดำเนินชีวิต<br>และเป็นผู้ถ่ายทอดความเป็นครู<br>', '2023-01-10 12:06:57', 24, 52),
(63, 'นักศึกษา ที่ต้องฝึกเล่นดนตรี ครูดนตรี ', 'มีมนุษยสัมพันธ์<br>\r\nเป็นผู้นำและรู้จักการบริหารจัดการ<br>\r\nใส่ใจเรื่องมารยาททางสังคม<br>\r\nวางแผนและการจัดการงานได้อย่างดี<br>\r\nมีความสามารถในการแก้ปัญหา การใช้เหตุผล และมีความคิดสร้างสรรค์<br>\r\nทำงานเป็นทีม และทำงานกับผู้อื่นได้อย่างเป็นมืออาชีพ<br>', '2023-01-10 12:08:18', 21, 34),
(64, 'รับสมัคร ศลยแพทย์', 'ต้องมีความขยันความรับผิดชอบ <br>\r\nมีความละเอียด<br>\r\nมีความอดทนสูง <br>\r\nทำงานเป็นผู้ช่วยเหลือแพทย์<br>', '2023-01-10 12:09:01', 20, 52),
(65, 'รับสมัคร นักร้อง', 'ต้องมีความขยันความรับผิดชอบ <br>\r\nมีความละเอียด<br>\r\nมีความอดทนสูง <br>\r\n', '2023-01-10 12:10:45', 23, 52),
(66, 'ด่วน ๆรับสมัครนักร้องชาย นำ', 'มีมนุษยสัมพันธ์ <br>\r\nทักษะในการเข้าสังคม<br>\r\nมนุษยสัมพันธ์ที่ดี <br>\r\nชอบในการร้องเพลง <br>', '2023-01-10 12:11:57', 23, 52),
(67, 'นักเขียน บทกวี ร้อยกรอง ร้อยแก้ว', 'ช่างสังเกต<br>\r\nรับรู้อารมณ์ได้ดี<br>\r\nเป็นนักรับฟัง<br>\r\n มีจินตนาการ<br>', '2023-01-10 12:21:19', 6, 52),
(68, 'รับสมัคร นักเขียนสารคดี', 'รับรู้อารมณ์ได้ดี<br>\r\nช่างสังเกต<br>\r\nต้องมีความขยัน <br>\r\nรับผิดชอบ <br>\r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน<br>', '2023-01-10 12:22:54', 6, 52),
(69, 'รับสมัคร นักเขียนบทละคร', ' มีจินตนาการ<br>\r\nมีประสบการณ์ <br>\r\nมีทักษะกระบวนการทำงาน<br>  \r\nการสื่อสาร<br>', '2023-01-10 12:24:34', 6, 52),
(70, 'นักเขียนบทความรีวิวอาหาร ', 'มีความสนใจเกี่ยวกับอาหาร หรือชื่นชอบในการรีวิวอาหาร<br>\r\nรักในการเขียน มีความซื่อตรง และมีความกระตือรือร้น<br>\r\nสามารถอ่านและเขียนภาษาอังกฤษได้ดี จะได้รับการพิจารณาเป็นพิเศษ<br>', '2023-01-10 12:28:14', 6, 52),
(71, 'ซ่อมคอม ซ่อมโบ็ตบุค โทรศัพท์ ฝึกงานที่นี่เลย', 'ต้องมีความขยันความรับผิดชอบ <br>\r\nมีความละเอียด<br>\r\nมีความอดทนสูง <br>\r\nต้องมีความขยัน <br>\r\nรับผิดชอบ <br>\r\nอดทน <br>\r\nซื่อสัตย์ <br>\r\nมุ่งมั่นในการทำงาน<br>', '2023-01-10 12:30:36', 11, 31),
(72, 'รับนักศึกษาฝึกงาน', 'ซ่อมคอม', '2023-01-10 23:48:48', 11, 53),
(73, 'รับเด็กเอน', '', '2023-01-11 02:42:07', 8, 54);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `q_id` int(10) NOT NULL,
  `q_quiz` varchar(50) NOT NULL,
  `itt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`q_id`, `q_quiz`, `itt_id`) VALUES
(1, 'รักและชอบในงานศิลปะ', 1),
(2, 'ชอบการถ่ายรูป', 1),
(3, 'ชอบเล่นเกมส์เกี่ยวกับการออกแบบสร้างบ้าน', 1),
(4, 'ชอบแตะต้องหรือสัมผัสกับสิ่งของ', 1),
(5, 'สนุกกับการจดบันทึกเรื่องราวต่างๆที่เราสนใจ', 1),
(6, 'เก่งเรื่องการอ่านกาพย์ กลอนเป็นต้น', 2),
(7, 'ชอบการอ่าน เช่น หนังสือนวนิยาย และสื่อโฆษณา', 2),
(8, 'รับความรู้จากการฟังวิทยุ และเทปเสียงได้ดี', 2),
(9, 'ชอบเปรียบเทียบ โดยใช้สำนวน สุภาษิต', 2),
(10, 'ชอบเขียนบันทึกประจำวัน', 2),
(11, 'ชอบคำนวณ แก้โจทย์คณิต', 3),
(12, 'ทำงานตามขั้นตอนที่วางไว้', 3),
(13, 'ชอบเล่นคอมพิวเตอร์', 3),
(14, 'คิดเลขได้อย่างรวดเร็ว', 3),
(15, 'ชอบวิชาคณิตหรือการคำนวณ', 3),
(16, 'ไม่สามารถอยู่นิ่งเป็นเวลานานได้', 4),
(17, 'ชอบเล่นกีฬา ใช้เวลากลางแจ้ง เล่นกับเพื่อนๆ', 4),
(18, 'ชอบงานที่ต้องใช้มือทำหรืองานฝีมือ', 4),
(19, 'เก่งด้านเล่นกีฬา', 4),
(20, 'เล่นเกมส์ที่ขยับร่างกายเพื่อบังคับตัวละคร', 4),
(21, 'ร้องเพลงตรงทำนองเนื้อร้อง', 5),
(22, 'เล่นดนตรีได้', 5),
(23, 'ชอบฟังเพลง ฟังดนตรีหลากหลาย', 5),
(24, 'มีความสามารถการเลียนแบบท่าทาง เสียง', 5),
(25, 'มีความรู้ทางวิชาดนตรี', 5),
(26, 'รักและชอบในงานศิลปะ', 6),
(27, 'ชอบพบปะกับผู้คนมากกว่าการอยู่คนเดียว', 6),
(28, 'ชอบการถ่ายรูป', 6),
(29, 'ชอบช่วยเหลือผู้คน', 6),
(30, 'ชอบแตะต้องหรือสัมผัสกับสิ่งของ', 6),
(31, 'แสดงความเห็นโดยใช้เหตุผลหรือภาพประกอบ', 7),
(32, 'อดทนต่อความกดดันที่ทำให้เครียด', 7),
(33, 'ชอบที่จะเอาชนะการแข่งขัน', 7),
(34, 'ชอบตัดสินใจตามที่ตัวเองคิดเสมอ', 7),
(35, 'คาดการณ์สิ่งที่จะเกิดจากความจริง', 7),
(36, 'มีความสุขที่ได้ท่องเที่ยว', 8),
(37, 'ชอบต้นไม้ป่าไม้ การปลูกพืชผักและการเลี้ยงสัตว์', 8),
(38, 'ชอบสังเกตการเปลี่ยนแปลงของสิ่งมีชีวิต', 8),
(39, 'ชอบช่วยเหลือคนหรือสัตว์ที่ได้รับความเดือดร้อน', 8),
(40, 'สามารถแยกประเภทของสัตว์และพืชได้', 8);

-- --------------------------------------------------------

--
-- Table structure for table `result_quiz`
--

CREATE TABLE `result_quiz` (
  `rq_id` int(10) NOT NULL,
  `st_id` int(10) NOT NULL,
  `rq_average` int(10) NOT NULL,
  `itt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result_quiz`
--

INSERT INTO `result_quiz` (`rq_id`, `st_id`, `rq_average`, `itt_id`) VALUES
(57, 1, 31, 1),
(58, 1, 51, 2),
(59, 1, 56, 3),
(60, 1, 44, 4),
(61, 1, 48, 5),
(62, 1, 38, 6),
(63, 1, 41, 7),
(64, 1, 44, 8);

-- --------------------------------------------------------

--
-- Table structure for table `result_quiz_round`
--

CREATE TABLE `result_quiz_round` (
  `rqr_id` int(10) NOT NULL,
  `rqr_result` int(10) NOT NULL,
  `st_id` int(10) NOT NULL,
  `itt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result_quiz_round`
--

INSERT INTO `result_quiz_round` (`rqr_id`, `rqr_result`, `st_id`, `itt_id`) VALUES
(257, 40, 1, 1),
(258, 70, 1, 2),
(259, 55, 1, 3),
(260, 40, 1, 4),
(261, 50, 1, 5),
(262, 70, 1, 6),
(263, 50, 1, 7),
(264, 45, 1, 8),
(265, 40, 1, 1),
(266, 75, 1, 2),
(267, 55, 1, 3),
(268, 85, 1, 4),
(269, 85, 1, 5),
(270, 55, 1, 6),
(271, 65, 1, 7),
(272, 80, 1, 8),
(273, 45, 1, 1),
(274, 55, 1, 2),
(275, 35, 1, 3),
(276, 45, 1, 4),
(277, 55, 1, 5),
(278, 20, 1, 6),
(279, 40, 1, 7),
(280, 50, 1, 8),
(281, 0, 1, 1),
(282, 5, 1, 2),
(283, 80, 1, 3),
(284, 5, 1, 4),
(285, 0, 1, 5),
(286, 5, 1, 6),
(287, 10, 1, 7),
(288, 0, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `sk_id` int(10) NOT NULL,
  `sk_skill` varchar(45) NOT NULL,
  `skt_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`sk_id`, `sk_skill`, `skt_id`) VALUES
(1, 'การบัญขี', 1),
(2, 'ความมั่นใจ', 1),
(3, 'การจัดทำงบประงบประมาณ', 1),
(4, 'สถิติธุรกิจ / บทวิเคราะห์', 1),
(5, 'การจัดการกระแสเงินสด', 1),
(6, 'การปฏิบัติตาม', 1),
(7, 'สัญญา', 1),
(8, 'กฎหมายองค์กร', 1),
(9, 'การวิเคราะห์ต้นทุน', 1),
(10, 'การป้อนข้อมูล', 1),
(11, 'การสร้างแบรนด์นายจ้าง', 1),
(12, 'การวางแผนงาน', 1),
(13, 'การเงิน', 1),
(14, 'การวิเคราะห์ทางการเงิน', 1),
(15, 'การสร้างแบบจำลองทางการเงิน', 1),
(16, 'การรายงานทางการเงิน', 1),
(17, 'การจัดการทรัพยากรมนุษย์', 1),
(18, 'นำเข้าส่งออก', 1),
(19, 'ตรวจสอบภายใน', 1),
(20, 'การสร้างแบบจำลอง 3 มิติ', 2),
(21, 'AutoCAD', 2),
(22, 'AutoDesk', 2),
(23, 'ระบบอัตโนมัติ', 2),
(24, 'วิศวกรรมเคมี', 2),
(25, 'วิศวกรรมโยธา', 2),
(26, 'การตรวจสอบการก่อสร้าง', 2),
(27, 'การประมาณการต้นทุน', 2),
(28, 'เขียนแบบไฟฟ้า', 2),
(29, 'วิศวกรรมไฟฟ้า', 2),
(30, 'อิเล็กทรอนิกส์', 2),
(31, 'วิศวกรรมอุตสาหการ', 2),
(32, 'วิศวกรรมวัสดุ', 2),
(33, 'MathCAD', 2),
(34, 'เขียนแบบเครื่องกล', 2),
(35, 'วิศวกรรมการผลิต', 2),
(36, 'ระบบการจัดการคุณภาพ', 2),
(37, 'การสำรวจปริมาณ', 2),
(38, 'SOLIDWORKS', 2),
(39, 'ซาวด์เอ็นจิเนียริ่ง', 2),
(40, 'สามารถทำงานเป็นกะได้', 3),
(41, 'การคิดวิเคราะห์', 3),
(42, 'การเขียนเชิงสร้างสรรค์', 3),
(43, 'กระฉับกระเฉง', 3),
(44, 'กระตือรือร้น', 3),
(45, 'เรียนรู้เร็ว', 3),
(46, 'ทักษะการสื่อสารที่ดี', 3),
(47, 'ความรับผิดชอบสูง', 3),
(48, 'ทักษะความเป็นผู้นำ', 3),
(49, 'ตรงตามกำหนดเวลา', 3),
(50, 'การรายงานข่าว', 3),
(51, 'บุคลิกดี', 3),
(52, 'นักคิดบวก', 3),
(53, 'การแก้ปัญหา', 3),
(54, 'ตรงต่อเวลา', 3),
(55, 'บริการด้วยใจ', 3),
(56, 'การทำงานเป็นทีม', 3),
(57, 'เต็มใจที่จะทำงานล่วงเวลา', 3),
(58, '.NET', 4),
(59, 'Adobe Premiere', 4),
(60, 'Chrome OS', 4),
(61, 'DirectX', 4),
(62, 'AJAX', 4),
(63, 'Amazon AWS', 4),
(64, 'Network Programming', 4),
(65, 'Objective C', 4),
(66, 'OpenGL', 4),
(67, 'PHP', 4),
(68, 'node.js', 4),
(69, 'Postgre SQL', 4),
(70, 'NoSQL', 4),
(71, 'Computer Security', 4),
(72, 'MySQL', 4),
(73, 'Windows API', 4),
(74, 'XML', 4),
(75, 'React.js', 4),
(76, 'UI / UX', 4),
(77, 'Spring Boot', 4),
(78, ':Vue.js', 4),
(79, 'Xcode', 4),
(80, 'Smarty PHP', 4),
(81, 'R', 4),
(82, 'eCommerce', 4),
(83, 'Computer Graphics', 4),
(84, 'Server-Side Rendering', 4),
(85, 'Python', 4),
(86, 'MongoDB', 4),
(87, 'C++', 4),
(88, 'Database Development', 4),
(89, 'iOS', 4),
(90, 'CSS', 4),
(91, 'Kotlin', 4),
(92, 'Firebase', 4),
(93, 'DevOps', 4),
(94, 'Facebook API', 4),
(95, 'HTML5', 4),
(96, 'JSON', 4),
(97, 'Javascript', 4),
(98, 'Microsoft Access', 4),
(99, 'Matlab', 4),
(100, 'Java', 4),
(101, 'Cloud Computing', 4),
(102, 'Linux', 4),
(103, 'Fortran', 4),
(104, 'Golang', 4),
(105, 'Game Design', 4),
(106, 'Android', 4),
(107, 'Full Stack', 4),
(108, 'Git', 4),
(109, 'ASP.NET', 4),
(110, 'C', 4),
(111, 'C#', 4),
(112, 'Angular.js', 4),
(113, 'Apache', 4),
(114, 'Bash', 4),
(115, 'Assembly', 4),
(116, '3D Animation', 5),
(117, 'Adobe XD', 5),
(118, '3D Rendering', 5),
(119, ':Adobe Illustrator', 5),
(120, 'Branding', 5),
(121, 'SketchUp', 5),
(122, 'Adobe Dreamweaver', 5),
(123, 'Video Editing', 5),
(124, 'Google Adwords', 5),
(125, 'Creative Presentation', 5),
(126, 'Sketch', 5),
(127, 'BIM', 5),
(128, 'Product Design', 5),
(129, 'Adobe InDesign', 5),
(130, 'After Effects', 5),
(131, 'Facebook Marketing', 5),
(132, 'Digital Marketing', 5),
(133, 'Visio', 5),
(134, 'Blender', 5),
(135, 'Adobe Photoshop', 5),
(136, 'ปิโตรเคมี', 6),
(137, 'การประกันคุณภาพ', 6),
(138, 'วิจัย', 6),
(139, 'ชีววิทยา', 6),
(140, 'กระบวนการทางเคมี', 6),
(141, 'การจัดการความปลอดภัย', 6),
(142, 'การพัฒนาผลิตภัณฑ์', 6);

-- --------------------------------------------------------

--
-- Table structure for table `skill_type`
--

CREATE TABLE `skill_type` (
  `skt_id` int(10) NOT NULL,
  `skt_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_type`
--

INSERT INTO `skill_type` (`skt_id`, `skt_type`) VALUES
(1, 'ธุรกิจและการเงิน'),
(2, 'วิศวกรรม'),
(3, 'ทักษะทั่วไป'),
(4, 'ไอที'),
(5, 'การตลาดและการออกแบบ'),
(6, 'วิทยาศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(10) NOT NULL COMMENT 'ดึงจากตาราง account',
  `st_pname` varchar(10) NOT NULL,
  `st_fname` varchar(20) NOT NULL,
  `st_lname` varchar(20) NOT NULL,
  `st_sex` tinyint(4) NOT NULL,
  `st_birthday` date NOT NULL,
  `st_email` varchar(50) NOT NULL,
  `st_tel` varchar(20) NOT NULL,
  `st_academy` varchar(50) NOT NULL,
  `st_education_lv` varchar(10) NOT NULL,
  `mj_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_pname`, `st_fname`, `st_lname`, `st_sex`, `st_birthday`, `st_email`, `st_tel`, `st_academy`, `st_education_lv`, `mj_id`) VALUES
(1, 'นาย', 'Roseedee', 'Cehleah', 1, '2023-01-10', 'roseedee2002@gmail.com', 'ฟหกด', 'ฟหกด', '1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `student_job`
--

CREATE TABLE `student_job` (
  `st_id` int(10) NOT NULL,
  `j_id` int(10) NOT NULL,
  `j_jobname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_skill`
--

CREATE TABLE `student_skill` (
  `st_id` int(10) NOT NULL,
  `sk_id` int(10) NOT NULL,
  `sk_skill` varchar(45) NOT NULL,
  `skt_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `act_id` (`act_id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `address_company`
--
ALTER TABLE `address_company`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `address_student`
--
ALTER TABLE `address_student`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `intelligent_type`
--
ALTER TABLE `intelligent_type`
  ADD PRIMARY KEY (`itt_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`j_id`),
  ADD KEY `itt_id` (`itt_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`mj_id`);

--
-- Indexes for table `major_intelligent_type`
--
ALTER TABLE `major_intelligent_type`
  ADD PRIMARY KEY (`mj_id`,`itt_id`),
  ADD KEY `itt_id` (`itt_id`);

--
-- Indexes for table `major_job`
--
ALTER TABLE `major_job`
  ADD PRIMARY KEY (`mj_id`,`j_id`),
  ADD KEY `j_id` (`j_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `j_id` (`j_id`),
  ADD KEY `cp_id` (`cp_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `itt_id` (`itt_id`);

--
-- Indexes for table `result_quiz`
--
ALTER TABLE `result_quiz`
  ADD PRIMARY KEY (`rq_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `itt_id` (`itt_id`);

--
-- Indexes for table `result_quiz_round`
--
ALTER TABLE `result_quiz_round`
  ADD PRIMARY KEY (`rqr_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `itt_id` (`itt_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `skill_type`
--
ALTER TABLE `skill_type`
  ADD PRIMARY KEY (`skt_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `student_ibfk_2` (`mj_id`);

--
-- Indexes for table `student_job`
--
ALTER TABLE `student_job`
  ADD PRIMARY KEY (`st_id`,`j_id`),
  ADD KEY `j_id` (`j_id`);

--
-- Indexes for table `student_skill`
--
ALTER TABLE `student_skill`
  ADD PRIMARY KEY (`st_id`,`sk_id`),
  ADD KEY `sk_id` (`sk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `act_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `intelligent_type`
--
ALTER TABLE `intelligent_type`
  MODIFY `itt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `j_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `mj_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `result_quiz`
--
ALTER TABLE `result_quiz`
  MODIFY `rq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `result_quiz_round`
--
ALTER TABLE `result_quiz_round`
  MODIFY `rqr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `sk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `skill_type`
--
ALTER TABLE `skill_type`
  MODIFY `skt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `account_type` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `address_student`
--
ALTER TABLE `address_student`
  ADD CONSTRAINT `address_student_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`cp_id`) REFERENCES `account` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`itt_id`) REFERENCES `intelligent_type` (`itt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `major_intelligent_type`
--
ALTER TABLE `major_intelligent_type`
  ADD CONSTRAINT `major_intelligent_type_ibfk_1` FOREIGN KEY (`itt_id`) REFERENCES `intelligent_type` (`itt_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `major_intelligent_type_ibfk_2` FOREIGN KEY (`mj_id`) REFERENCES `major` (`mj_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `major_job`
--
ALTER TABLE `major_job`
  ADD CONSTRAINT `major_job_ibfk_1` FOREIGN KEY (`mj_id`) REFERENCES `major` (`mj_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `major_job_ibfk_2` FOREIGN KEY (`j_id`) REFERENCES `job` (`j_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cp_id`) REFERENCES `company` (`cp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`itt_id`) REFERENCES `intelligent_type` (`itt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_quiz`
--
ALTER TABLE `result_quiz`
  ADD CONSTRAINT `result_quiz_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_quiz_ibfk_2` FOREIGN KEY (`itt_id`) REFERENCES `intelligent_type` (`itt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result_quiz_round`
--
ALTER TABLE `result_quiz_round`
  ADD CONSTRAINT `result_quiz_round_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_quiz_round_ibfk_2` FOREIGN KEY (`itt_id`) REFERENCES `intelligent_type` (`itt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `account` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`mj_id`) REFERENCES `major` (`mj_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_job`
--
ALTER TABLE `student_job`
  ADD CONSTRAINT `student_job_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_job_ibfk_2` FOREIGN KEY (`j_id`) REFERENCES `job` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_skill`
--
ALTER TABLE `student_skill`
  ADD CONSTRAINT `student_skill_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_skill_ibfk_2` FOREIGN KEY (`sk_id`) REFERENCES `skill` (`sk_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
