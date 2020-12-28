-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 28, 2020 at 11:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
create database break_time;
use break_time;
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
(15, 'Noodles', 100, '', 'chinese');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `order_detail` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `username`, `order_detail`, `date`) VALUES
(11, 'priyanshsolanki', '2 X Mango Shake ------------ ( 2 X 30 ) = 60<br/>2 X Samosa ------------ ( 2 X 20 ) = 40<br/>Total Price :100', '2020-12-28 11:55:19'),
(12, 'priyanshsolanki', '2 X Mango Shake ------------ ( 2 X 30 ) = 60<br/>2 X Samosa ------------ ( 2 X 20 ) = 40<br/>1 X Masala Dosa ------------ ( 1 X 55 ) = 55<br/>Total Price :155', '2020-12-28 11:56:09'),
(13, 'bhushanpande', '1 X Tea ------------ ( 1 X 15 ) = 15<br/>1 X Samosa ------------ ( 1 X 20 ) = 20<br/>1 X Vada-Pav ------------ ( 1 X 15 ) = 15<br/>1 X Uttapam ------------ ( 1 X 65 ) = 65<br/>Total Price :115', '2020-12-28 12:15:35'),
(14, 'bhushanpande', '1 X Regular-Meal ------------ ( 1 X 120 ) = 120<br/>Total Price :120', '2020-12-28 12:17:13'),
(15, 'bhushanpande', '2 X Masala Dosa ------------ ( 2 X 55 ) = 110<br/>Total Price :110', '2020-12-28 12:19:25'),
(16, 'jayanthpabothu', '2 X Mango Shake ------------ ( 2 X 30 ) = 60<br/>1 X Hot Coffee ------------ ( 1 X 20 ) = 20<br/>1 X Choc-Icecream ------------ ( 1 X 40 ) = 40<br/>Total Price :120', '2020-12-28 15:37:40'),
(17, 'naitikparmar', '1 X Masala Dosa ------------ ( 1 X 55 ) = 55<br/>1 X Choc-Icecream ------------ ( 1 X 40 ) = 40<br/>1 X Noodles ------------ ( 1 X 100 ) = 100<br/>Total Price :195', '2020-12-28 15:42:20');

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
('AbcKuchBhi', 'abcdef', '12345678', '9763699121'),
('Ashish Sulakhe', 'ashishsulakhe', '12345678', '8888888888'),
('Bhushan Pande', 'bhushanpande', '12345678', '9876543210'),
('Jayanth Pabothu', 'jayanthpabothu', '12345678', '9876543210'),
('Naitik Parmar', 'naitikparmar', '12345678', '9876543211'),
('Priyansh Sunilkumar ', 'priyanshsolanki', '12345678', '9763699247'),
('Sejal Shroff', 'sejalshroff', '12345678', '9876543210');

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
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
