-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 29, 2020 at 01:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE Database break_time;
use break_time;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `break_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `ingredients` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_no`, `item_name`, `price`, `ingredients`, `type`) VALUES
(1, 'Mango Shake', 30, '', 'drinks'),
(2, 'Idli', 30, '', 'snacks'),
(3, 'Cold Coffee', 30, '', 'drinks'),
(4, 'Hot Coffee', 20, '', 'drinks'),
(5, 'Tea', 15, '', 'drinks'),
(6, 'Samosa', 20, '', 'snacks'),
(7, 'Vada-Pav', 15, '', 'snacks'),
(8, 'Plain Dosa', 30, '', 'lunch'),
(9, 'Pullav', 40, '', 'lunch'),
(10, 'Mini-Meal', 75, '1 Sabji ,2 Chapati, Papad', 'lunch'),
(11, 'Regular-Meal', 120, '2 Sabji,3 Chapati, Papad, Dal, Rice, Sweet', 'lunch'),
(12, 'Uttapam', 65, '', 'lunch'),
(13, 'Masala Dosa', 55, '', 'lunch'),
(14, 'Choc-Icecream', 40, '', 'desert'),
(15, 'Noodles', 100, '', 'chinese'),
(16, 'Cheese Burst Pizza', 120, '', 'pizza'),
(17, 'Mac Maharaja', 130, 'Cheese , Mint Mayo, Crispy Pattie ', 'burger');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `order_detail` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `username`, `order_detail`, `date`, `total_price`, `status`) VALUES
(18, 'priyanshsolanki', '2 X Regular-Meal ---- ( 2 X 120 ) = 240<br/>', '2020-12-28 16:56:44', 240, 'COMPLETED'),
(19, 'jayanthpabothu', '1 X Regular-Meal   ( 1 X 120 ) = 120<br/>1 X Uttapam   ( 1 X 65 ) = 65<br/>1 X Choc-Icecream   ( 1 X 40 ) = 40<br/>', '2020-12-28 22:16:10', 225, 'COMPLETED'),
(20, 'jayanthpabothu', '1 X Noodles   ( 1 X 100 ) = 100<br/>', '2020-12-28 22:17:44', 100, 'COMPLETED'),
(21, 'jayanthpabothu', '1 X Mango Shake   ( 1 X 30 ) = 30<br/>', '2020-12-28 22:18:47', 30, 'READY'),
(22, 'jayanthpabothu', '2 X Hot Coffee   ( 2 X 20 ) = 40<br/>', '2020-12-28 22:19:00', 40, 'READY'),
(23, 'jayanthpabothu', '4 X Mango Shake   ( 4 X 30 ) = 120<br/>', '2020-12-28 22:21:08', 120, 'BEING PREPARED'),
(24, 'priyanshsolanki', '2 X Mango Shake   ( 2 X 30 ) = 60<br/>1 X Choc-Icecream   ( 1 X 40 ) = 40<br/>', '2020-12-28 22:30:34', 100, 'READY'),
(25, 'bhushanpande', '1 X Mango Shake   ( 1 X 30 ) = 30<br/>2 X Cheese Burst Pizza   ( 2 X 120 ) = 240<br/>', '2020-12-28 23:53:56', 270, 'READY'),
(26, 'bhushanpande', '2 X Cold Coffee   ( 2 X 30 ) = 60<br/>', '2020-12-28 23:54:16', 60, 'BEING PREPARED'),
(27, 'ashishsulakhe', '2 X Mango Shake   ( 2 X 30 ) = 60<br/>', '2020-12-29 12:05:17', 60, 'BEING PREPARED'),
(28, 'ashishsulakhe', '1 X Idli   ( 1 X 30 ) = 30<br/>1 X Cold Coffee   ( 1 X 30 ) = 30<br/>', '2020-12-29 12:51:04', 60, 'READY'),
(29, 'jayanthpabothu', '3 X Uttapam   ( 3 X 65 ) = 195<br/>', '2020-12-29 13:46:32', 195, 'COMPLETED'),
(30, 'sohampalnitkar', '1 X Cheese Burst Pizza   ( 1 X 120 ) = 120<br/>1 X Mac Maharaja   ( 1 X 130 ) = 130<br/>', '2020-12-29 14:17:08', 250, 'COMPLETED'),
(31, 'sohampalnitkar', '2 X Cold Coffee   ( 2 X 30 ) = 60<br/>', '2020-12-29 14:21:02', 60, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`name`, `username`, `password`, `mobile`) VALUES
('admin', 'admin', '12345678', '9876543210'),
('Ashish Sulakhe', 'ashishsulakhe', '12345678', '8888888888'),
('Bhushan Pande', 'bhushanpande', '12345678', '9876543210'),
('Jayanth Pabothu', 'jayanthpabothu', '12345678', '9876543210'),
('Naitik Parmar', 'naitikparmar', '12345678', '9876543211'),
('Priyansh Sunilkumar ', 'priyanshsolanki', '12345678', '9763699247'),
('Sejal Shroff', 'sejalshroff', '12345678', '9876543210'),
('Soham Palnitkar', 'sohampalnitkar', '12345678', '9876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
