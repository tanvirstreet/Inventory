-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 09:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(50) NOT NULL,
  `unit_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `unit_name`) VALUES
(3, 'cement', 'bag'),
(4, 'rood', 'ton');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_com_name` varchar(100) DEFAULT NULL,
  `total_amount` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_com_name`, `total_amount`, `paid`, `due`) VALUES
(3, 'mamun', 'IT', 5000, 4000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `total_prize` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `ctg_id`, `quantity`, `total_prize`) VALUES
(2, 'Shah Cement', 3, 46, 5000),
(3, 'AKS Steal', 4, 48, 50000),
(4, 'Akij Cement', 3, 125, 20000),
(5, 'BSRM Rod', 4, 340, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_trans`
--

CREATE TABLE IF NOT EXISTS `purchase_trans` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_prize` double NOT NULL,
  `total_prize` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_trans`
--

INSERT INTO `purchase_trans` (`id`, `date`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES
(1, '2016-06-01', 3, 2, 60, 500, 30000),
(2, '2016-06-02', 4, 3, 99, 1000, 99000);

-- --------------------------------------------------------

--
-- Table structure for table `sales_trans`
--

CREATE TABLE IF NOT EXISTS `sales_trans` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_com_name` varchar(100) NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_prize` double NOT NULL,
  `total_prize` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_trans`
--

INSERT INTO `sales_trans` (`id`, `date`, `client_name`, `client_com_name`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES
(1, '2016-06-01', 'Tanvir', 'IT', 3, 4, 1, 200, 200),
(2, '2016-06-02', 'Mostafa', 'Wezend IT', 4, 5, 1, 251, 251),
(3, '2016-06-01', 'Haidar', 'Saidpur', 3, 2, 8, 100, 800),
(4, '2016-06-02', 'Ifty', 'Dinajpur', 4, 5, 6, 1000, 6000),
(5, '2016-06-03', 'Ismat', 'Rangpur', 3, 4, 6, 100, 600),
(6, '2016-06-01', 'mamun', 'IT', 3, 2, 50, 500, 25000),
(7, '2016-06-02', 'Tanvir', 'Wezend IT', 3, 4, 50, 500, 25000),
(8, '2016-06-03', 'Mostafa', 'adfadf', 4, 3, 50, 1000, 50000),
(9, '2016-06-04', 'Haidar', 'Saidpur', 4, 5, 50, 1000, 50000),
(10, '2016-06-01', 'Tanvir', 'Khilkhet', 3, 2, 1, 450, 450),
(11, '2016-06-17', 'Haidar', 'Wezend', 3, 4, 2, 500, 1000),
(12, '2016-06-08', 'Tanvir', 'Wezend IT', 3, 4, 3, 520, 1560),
(13, '2016-06-08', 'Mostafa', 'IT', 3, 2, 3, 120, 360),
(14, '2016-06-08', 'Mostafa', 'Wezend IT', 4, 3, 2, 102, 204);

-- --------------------------------------------------------

--
-- Table structure for table `temp_purchase_trans`
--

CREATE TABLE IF NOT EXISTS `temp_purchase_trans` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_prize` double NOT NULL,
  `total_prize` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales_trans`
--

CREATE TABLE IF NOT EXISTS `temp_sales_trans` (
`id` int(11) NOT NULL,
  `date` date NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_com_name` varchar(100) NOT NULL,
  `ctg_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_prize` double NOT NULL,
  `total_prize` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_trans`
--
ALTER TABLE `purchase_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_trans`
--
ALTER TABLE `sales_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_purchase_trans`
--
ALTER TABLE `temp_purchase_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_sales_trans`
--
ALTER TABLE `temp_sales_trans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase_trans`
--
ALTER TABLE `purchase_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales_trans`
--
ALTER TABLE `sales_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `temp_purchase_trans`
--
ALTER TABLE `temp_purchase_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_sales_trans`
--
ALTER TABLE `temp_sales_trans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
