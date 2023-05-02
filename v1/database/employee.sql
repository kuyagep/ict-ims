-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 09:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `picture`, `firstname`, `middlename`, `lastname`, `emp_contact_no`, `emp_email_add`, `position_id`, `office_id`, `division_id`, `username`, `password`, `role_id`, `added_at`) VALUES
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`position_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
