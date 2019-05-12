-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2019 at 05:35 PM
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
-- Database: `hrm`
--
CREATE DATABASE IF NOT EXISTS `hrm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hrm`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2'),
(3, 'admin3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_rank`
--

CREATE TABLE `tbl_academic_rank` (
  `rank_id` int(3) NOT NULL,
  `rank_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_rank`
--

INSERT INTO `tbl_academic_rank` (`rank_id`, `rank_name`) VALUES
(1, 'Giáo Sư'),
(2, 'Phó Giáo Sư'),
(3, 'Tiến Sĩ '),
(9, 'Thạc Sĩ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(3) NOT NULL,
  `dept_name` varchar(75) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(2, 'Đại Học Bách Khoa Hà Nội'),
(9, 'Đại Học Kinh Tế Quốc Dân'),
(10, 'Đại Học Bưu Chính Viễn Thông'),
(11, 'Đại Học Sư Phạm'),
(12, 'Đại Học Xây Dựng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(7) NOT NULL,
  `file_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `per_id` int(6) NOT NULL,
  `filetype` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date_uploaded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `tbl_gass_rank`
--

CREATE TABLE `tbl_gass_rank` (
  `gass_id` int(3) NOT NULL,
  `gass_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gass_rank`
--

INSERT INTO `tbl_gass_rank` (`gass_id`, `gass_name`) VALUES
(1, 'Văn thư'),
(2, 'Thủ quỹ'),
(3, 'Kế  toán'),
(4, 'Viện trưởng'),
(5, 'Phó viện trưởng'),
(6, 'Trưởng bộ môn'),
(7, 'Phó trưởng bộ môn'),
(43, 'Giảng viên'),
(44, 'Chủ tịch công đoàn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `per_id` int(6) NOT NULL,
  `per_firstname` varchar(20) CHARACTER SET utf32 NOT NULL,
  `per_middlename` varchar(20) CHARACTER SET utf8 NOT NULL,
  `per_lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` varchar(20) CHARACTER SET utf8 NOT NULL,
  `per_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `per_address` varchar(150) CHARACTER SET utf8 NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `per_place_of_birth` varchar(150) CHARACTER SET utf8 NOT NULL,
  `per_date_of_original_appointment` date NOT NULL,
  `per_campus` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_employee_status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `promote_id` int(5) NOT NULL,
  `per_contact_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `rank_id` int(3) NOT NULL,
  `bs_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bs_year` year(4) NOT NULL,
  `bs_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ms_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ms_with_unit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ms_year` year(4) NOT NULL,
  `ms_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dr_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dr_year` year(4) NOT NULL,
  `dr_with_unit` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dr_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `other_degree` varchar(50) CHARACTER SET utf8 NOT NULL,
  `other_year` year(4) NOT NULL,
  `other_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `per_image` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date_modified` date NOT NULL,
  `gass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`per_id`, `per_firstname`, `per_middlename`, `per_lastname`, `pos_id`, `per_gender`, `per_status`, `per_address`, `per_date_of_birth`, `per_place_of_birth`, `per_date_of_original_appointment`, `per_campus`, `dept_id`, `per_employee_status`, `promote_id`, `per_contact_no`, `rank_id`, `bs_name`, `bs_year`, `bs_school`, `ms_name`, `ms_with_unit`, `ms_year`, `ms_school`, `dr_name`, `dr_year`, `dr_with_unit`, `dr_school`, `other_degree`, `other_year`, `other_school`, `per_image`, `date_modified`, `gass_id`) VALUES
(187, 'Cường', ' Xuân ', 'Chu', 0, 'Nam', 'Độc thân', 'Hà Nội', '1998-12-07', 'Bắc Giang', '2016-01-01', 'Công nghệ phần mêm', 'Hợp đồng', 2, '+84565-656-654', 9, '', 0000, '', 'Thạc sĩ khoa học', 'Công nghệ th', 2014, 'HUST', '', 0000, '', '', '', 0000, '', '', '2019-05-12', 43),
(188, 'Dương', 'Văn ', 'Phạm ', 0, 'Nam', 'Độc thân', 'Hà Nội', '1998-03-12', 'Thái Bình', '2014-01-01', 'Hệ thống thông tin', 'Biên chế', 9, '+84454-645-646', 3, '', 0000, '', '', '', 0000, '', 'Tiến sĩ khoa học', 2013, 'Công nghệ th', 'Đại Học Bách Khoa Hà Nội', '', 0000, '', '', '2019-05-12', 6),
(189, 'Linh', 'Khánh', 'Mai', 0, 'Nam', 'Độc thân', 'Hà Nội', '1998-05-05', 'Thái Bình', '2000-05-07', 'Khoa học máy tính', 'Biên chế', 11, '+84545-455-545', 1, '', 0000, '', '', '', 0000, '', 'Tiến sĩ khoa học', 0000, 'Công nghệ th', '', '', 0000, '', '', '2019-05-12', 4),
(190, 'Nam', 'Nghĩa', 'Nguyễn ', 0, 'Nam', 'Đã kết h', 'Hà Nội', '1975-02-01', 'Hà Nội', '2000-06-05', 'Kĩ thuật máy tính', 'Hợp đồng', 12, '+84789-456-123', 2, '', 0000, '', '', '', 0000, '', 'Tiến sĩ khoa học', 2000, 'Công nghệ th', 'Đại Học Bách Khoa Hà Nội', '', 0000, '', '', '2019-05-12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel_master_file`
--

CREATE TABLE `tbl_personnel_master_file` (
  `per_id` int(7) NOT NULL,
  `per_firstname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `per_middlename` varchar(20) CHARACTER SET utf8 NOT NULL,
  `per_lastname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` varchar(6) CHARACTER SET utf8 NOT NULL,
  `per_status` varchar(8) CHARACTER SET utf8 NOT NULL,
  `per_address` varchar(150) CHARACTER SET utf8 NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `per_place_of_birth` varchar(150) CHARACTER SET utf8 NOT NULL,
  `per_date_of_original_appointment` date NOT NULL,
  `per_campus` varchar(14) CHARACTER SET utf8 NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_employee_status`` varchar(50) CHARACTER SET utf8 NOT NULL,
  `promote_id` int(5) NOT NULL,
  `per_contact_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `rank_id` int(3) NOT NULL,
  `bs_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bs_year` year(4) NOT NULL,
  `bs_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ms_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ms_with_unit` varchar(12) CHARACTER SET utf8 NOT NULL,
  `ms_year` year(4) NOT NULL,
  `ms_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dr_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dr_with_unit` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dr_year` year(4) NOT NULL,
  `dr_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `other_degree` varchar(50) CHARACTER SET utf8 NOT NULL,
  `other_year` year(4) NOT NULL,
  `other_school` varchar(50) CHARACTER SET utf8 NOT NULL,
  `per_image` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date_modified` date NOT NULL,
  `gass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--



-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_gass_rank`
--
ALTER TABLE `tbl_gass_rank`
  ADD PRIMARY KEY (`gass_id`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`per_id`);

--

-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  MODIFY `rank_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_gass_rank`
--
ALTER TABLE `tbl_gass_rank`
  MODIFY `gass_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `per_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

