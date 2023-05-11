-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(55) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(5, 'Laptop'),
(6, 'Desktop'),
(7, 'Tablet'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'OSDS'),
(2, 'CID'),
(3, 'SGOD');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(55) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `emp_contact_no` varchar(50) NOT NULL,
  `emp_email_add` text NOT NULL,
  `position_id` int(55) NOT NULL,
  `office_id` int(55) NOT NULL,
  `division_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(55) NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `picture`, `firstname`, `middlename`, `lastname`, `emp_contact_no`, `emp_email_add`, `position_id`, `office_id`, `division_id`, `username`, `password`, `role_id`, `added_at`) VALUES
(0, '', '', '', '', '', '', 0, 0, 0, '', '$2y$10$FybLdGyTw0jUxUfXeyng/.E4sacSjqnI8Zuww1Gshau3UVyfQizZ2', 0, '2023-03-19 14:40:19'),
(1, '_DSC0128 (2).JPG', 'Geperson', 'Camporedondo', 'Mamalias', '09317562740', 'geperson.ph@gmail.com', 7, 9, 0, 'geperson', '$2y$10$77qr92YiqHUMn4c.BVo8ZufBN.K3srkdBeBwxsNDYrGuYBGfLeUSi', 2, '2022-06-05 16:02:24'),
(71, '', 'Admin', 'Admin', 'Admin', '09123456789', 'admin@gmail.com', 1, 1, 0, 'admin@gmail.com', '$2y$10$77qr92YiqHUMn4c.BVo8ZufBN.K3srkdBeBwxsNDYrGuYBGfLeUSi', 2, '2022-10-22 09:18:43'),
(72, '', 'User', 'User', 'User', '09123456789', 'user@gmail.com', 1, 1, 0, 'user@gmail.com', '$2y$10$aoF3GO5Wyf6qLSG8MhbDaO4hjb8VID9A9NEnfqr6gvxaqJHA3jrwO', 3, '2022-10-22 09:20:09'),
(73, '', 'Superadmin', 'Superadmin', 'Superadmin', '09123456789', 'superadmin@gmail.com', 3, 1, 0, 'superadmin@gmail.com', '$2y$10$9cKb.z/gAsSZwlK10oSX1OPQsNE1HtkJYouQouw0CaJ4pc6wL6WI.', 1, '2022-10-22 09:21:26'),
(79, '', 'Mario', 'C', 'Mondejar', '09123456789', 'mario.mondejar@deped.gov.ph', 5, 10, 3, 'mario.mondejar@deped.gov.ph', '$2y$10$Q4Aj8XdABONmVLcGiOI0x.4kJr5uYJuSknrdIj70pJ71a77nDE6Hy', 3, '2023-01-23 14:17:53'),
(80, '', 'ROMEO', 'M.', 'YTING', '09123456789', 'romeo.yting@deped.gov.ph', 10, 9, 0, 'romeo.yting@deped.gov.ph', '$2y$10$XX5C2T8CNIagi1VAZIy/Yul6XWz.1wrQAEMZvZhdnl4wVI1GleGfm', 3, '2023-01-23 14:25:04'),
(81, '', 'ARIEL', 'D.', 'DUCO', '09123456789', 'ariel.duco@deped.gov.ph', 1, 14, 3, 'ariel.duco@deped.gov.ph', '$2y$10$Juwlpg4C7LBkJNKPhBKlqe.SIHG0ebIYBb6eSieWrOF2KFk9ahRtm', 3, '2023-01-24 15:03:41'),
(82, '', 'JENNY ROSE', 'A', 'ALITANA', '09123456789', 'jenny.solitana@deped.gov.ph', 1, 10, 3, 'jenny.solitana@deped.gov.ph', '$2y$10$eTqLLCwGiNaJN4xz327LGeR2r.AahJBSfIHcPMd8VtszIdnY.zxWC', 3, '2023-01-24 15:05:48'),
(83, '', 'JESSIE', 'S', 'SAJOL', '09123456789', 'jessie.sajol@deped.gov.ph', 1, 10, 3, 'jessie.sajol@deped.gov.ph', '$2y$10$q.vmR5xocuLpKB1EbiFaUu2gP0u8S4sU9UyyFb6nGNgg4fd7Y54Ky', 3, '2023-01-24 15:09:07'),
(86, '', 'KIRK SONNY  GIL', 'P.', 'HERUELA', '09123456789', 'kirk.heruela@deped.gov.ph', 1, 10, 3, 'kirk.heruela@deped.gov.ph', '$2y$10$iC6corxsLcnVlpkkelwsV.qlgc9qIKcc0X3Kl72rT/uQ6YgrDVOc.', 3, '2023-01-24 15:13:05'),
(87, '', 'AMY', 'P.', 'CORRAL', '09123456789', 'amy.corral@deped.gov.ph', 1, 10, 3, 'amy.corral@deped.gov.ph', '$2y$10$Yhnpn/lDmvk8uCgYKuygI.H67ZnQxjXyeUiSB0tpb4jeob3kqwyrC', 3, '2023-01-24 15:31:25'),
(88, '', 'JOVETH', 'G.', 'TUBIANO', '09123456789', 'joveth.tubiano@deped.gov.ph', 1, 10, 3, 'joveth.tubiano@deped.gov.ph', '$2y$10$OxbNb9UzCJJO.WXEy3f0be8PTmA2IwSnTau5LvhYEvtEceH72Q9Gm', 3, '2023-01-24 15:32:22'),
(89, '', 'NEIL JOHN', 'T.', 'AUDAN', '09123456789', 'neiljohn.audan@deped.gov.ph', 1, 10, 3, 'neiljohn.audan@deped.gov.ph', '$2y$10$5M66aIhofCs2WI1Jq0VXP.EL1KuEn/NtASPKiYuIPJ0XoVz.3beAu', 3, '2023-01-24 15:33:23'),
(90, '', 'ELYN', 'L.', 'SUPRENTE', '09123456789', 'elyn.suprente@deped.gov.ph', 1, 10, 3, 'elyn.suprente@deped.gov.ph', '$2y$10$b2p13Rw5RkKfK7aPBzRHvuor6yzdMMZ9EEl/g.ID53a31MnmvGrCG', 3, '2023-01-24 15:34:24'),
(91, '', 'CHRISTINE', 'P.', 'LIMBUJAN', '09123456789', 'christine.limbujan@deped.gov.ph', 1, 10, 3, 'christine.limbujan@deped.gov.ph', '$2y$10$Kz1Wg/ehnkljzioljg17Ue3WODI7nEBGX3s.JJfrQ3znuzkCroprK', 3, '2023-01-24 15:35:24'),
(92, '', 'Janette', 'G.', 'VELOSO', '09123456789', 'janette.veloso@deped.gov.ph', 1, 15, 1, 'janette.veloso@deped.gov.ph', '$2y$10$oCiDeIYAOkOLF8qKEWUWt.x1UxUjsFS/HGQmLG4J0al7OcXsQKM46', 3, '2023-01-24 15:37:44'),
(93, '', 'CHEERYLYN', 'C', 'COMETA', '09123456789', 'cheerylyn.cometa@deped.gov.ph', 11, 4, 2, 'cheerylyn.cometa@deped.gov.ph', '$2y$10$VnGQEKr3fy4ppJENPUWzGuhtu7Ea5eU2Uuf7ZZQ4yX.u4l70FVmEe', 3, '2023-01-25 09:23:05'),
(94, '', 'ROMEO', 'M.', 'YTING', '09123456789', 'romeo.yting@deped.gov.ph', 1, 9, 1, 'romeo.yting@deped.gov.ph', '$2y$10$QSbPEofbYhhxrU8c7ZnXS.pksHzfQrA.wKZKzfKVl82FqKNpE9uJ2', 2, '2023-01-30 15:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `inv_ict`
--

CREATE TABLE `inv_ict` (
  `inv_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `specs` varchar(255) NOT NULL,
  `quantity` int(250) NOT NULL,
  `serial_no` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `date_acquired` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_inspection` date NOT NULL,
  `inspected_by` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inv_ict`
--

INSERT INTO `inv_ict` (`inv_id`, `employee_id`, `item_name`, `specs`, `quantity`, `serial_no`, `price`, `date_acquired`, `category_id`, `date_inspection`, `inspected_by`, `created_at`, `deleted`, `updated_at`) VALUES
(17, 82, 'Acer', 'sample', 7, '1232dew123', 32, '2023-05-02', 8, '2023-05-02', 'Maning', '2023-05-02 06:51:45', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(55) NOT NULL,
  `office_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_name`) VALUES
(1, 'Admin'),
(2, 'Budget'),
(3, 'Cashier'),
(4, 'CID'),
(5, 'COA'),
(6, 'Finance'),
(7, 'HR'),
(8, 'Legal'),
(9, 'Supply'),
(10, 'SGOD'),
(13, 'Records'),
(14, 'Physical Facilities'),
(15, 'ASDS');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(55) NOT NULL,
  `position_name` varchar(250) NOT NULL,
  `position_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`, `position_desc`) VALUES
(1, 'Administrative Officer', 'Permanent'),
(2, 'Administrative Aide', 'Permanent'),
(3, 'Accountant', 'Permanent'),
(4, 'Budget Officer', 'Permanent'),
(5, 'Education Program Supervisor', 'Permanent'),
(6, 'Auditor', 'Permanent'),
(7, 'Job Order', 'Contractual'),
(8, 'CEO', 'System Admin'),
(10, 'ADMINISTRATIVE OFFICER IV', 'SUPPLY OFFICER'),
(11, 'CID CHIEF', 'CID CHIEF'),
(12, 'EPS', 'EPS'),
(13, 'ADMINISTRATIVE OFFICER V', 'ADMIN OFFICER V');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(55) NOT NULL,
  `role_desc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_desc`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `inv_ict`
--
ALTER TABLE `inv_ict`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inv_ict`
--
ALTER TABLE `inv_ict`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
