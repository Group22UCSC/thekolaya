-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 08:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thekolaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `advance_request`
--

CREATE TABLE `advance_request` (
  `request_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_day` date NOT NULL DEFAULT current_timestamp(),
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `emp_id` varchar(11) NOT NULL,
  `route_no` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `full_income` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auction_bid`
--

CREATE TABLE `auction_bid` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(11) NOT NULL,
  `buyer_id` varchar(11) NOT NULL,
  `sold_price` decimal(11,0) NOT NULL,
  `sold_amount` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` varchar(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_message`
--

CREATE TABLE `emergency_message` (
  `notification_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receiver_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` varchar(11) NOT NULL,
  `employee_type` enum('agent','accountant','admin','manager','supervisor','product_manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer_request`
--

CREATE TABLE `fertilizer_request` (
  `request_id` int(11) NOT NULL,
  `amount(kg)` int(11) NOT NULL,
  `date_delivered` date NOT NULL DEFAULT current_timestamp(),
  `emp_id(sup)` varchar(11) NOT NULL,
  `emp_id(agent)` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `in_stock`
--

CREATE TABLE `in_stock` (
  `in_date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `price_per_unit` decimal(11,0) NOT NULL,
  `price_for_amount` decimal(11,0) NOT NULL,
  `in_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `landowner`
--

CREATE TABLE `landowner` (
  `user_id` varchar(11) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `landowner_type` enum('indirect_landowner','direct_landowner') NOT NULL,
  `tea_availability` tinyint(1) DEFAULT NULL,
  `no_of_estimated_containers` int(11) NOT NULL,
  `route_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payment`
--

CREATE TABLE `monthly_payment` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_date` date NOT NULL,
  `fertilizer_expenses` decimal(11,0) NOT NULL,
  `advance_expenses` decimal(11,0) NOT NULL,
  `income` decimal(11,0) NOT NULL,
  `final_payment` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL,
  `lid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_profit`
--

CREATE TABLE `monthly_profit` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `profit` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_tea_price`
--

CREATE TABLE `monthly_tea_price` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `read_unread` tinyint(1) NOT NULL,
  `receiver_id` varchar(11) NOT NULL,
  `sender_id` varchar(11) NOT NULL,
  `receive_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `out_stock`
--

CREATE TABLE `out_stock` (
  `out_date` date NOT NULL DEFAULT current_timestamp(),
  `type` enum('fertilizer','firewood') NOT NULL,
  `out_quantity` decimal(11,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_manager`
--

CREATE TABLE `product_manager` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `confirm_date` date NOT NULL DEFAULT current_timestamp(),
  `response_status` tinyint(1) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `request_type` enum('fertilizer','advance') NOT NULL,
  `lid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `type` enum('fertilizer','firewood') NOT NULL,
  `full_stock` int(11) NOT NULL,
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tea`
--

CREATE TABLE `tea` (
  `date` date NOT NULL DEFAULT current_timestamp(),
  `lid` varchar(11) NOT NULL,
  `initial_weight(agent)` decimal(11,0) NOT NULL,
  `initial_weight(supervisor)` decimal(11,0) NOT NULL,
  `water_precentage` decimal(11,0) NOT NULL,
  `container_precentage` decimal(11,0) NOT NULL,
  `matured_precentage` decimal(11,0) NOT NULL,
  `net_weight` decimal(11,0) NOT NULL,
  `emp_id(sup)` varchar(11) NOT NULL,
  `emp_id(agent)` varchar(11) NOT NULL,
  `quality` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `user_type` enum('Agent','Accountant','Admin','Land_Owner','Manager','Product_Manager','Supervisor') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `address`, `contact_number`, `user_type`, `password`, `created_at`) VALUES
('3244', 'kumud', '12341234', 123234, 'Product_Manager', '$2y$10$N/zrKD6tC9YMx7JyX5dTpeCUGyx/Uchm3B0OrR6lSdvowglPSswLO', '2021-09-22'),
('Acc-000', 'Pasindu Melaka', 'Galle Kollek', 773158043, 'Accountant', '$2y$10$NlN2HI.qpL2mtLtpfQ5Cpe7X0BavLDogo6BRwyjTv1vFM6/vhxY02', '2021-09-02'),
('Admin-00', 'Sasindu', 'Math Galle Kollek', 768687025, 'Admin', '$2y$10$GLEs1JIzBvzUTEOYxkPT0uabC4unmvlQkeRO.Hj4DKsxP4kxXthvy', '0000-00-00'),
('Agent-000', 'Roneki', 'Mama Matara Kellek', 777816920, 'Agent', '$2y$10$DEoIysExgKU2NSRtgtnnc./gKPhb6QGVsDPCGrxd8LbRf7zu19T2G', '2021-09-02'),
('Land-000', 'Pasindu Lakmal', 'Galle Kollek', 771292250, 'Land_Owner', '$2y$10$q6YimXZjCCz9m3mN9ojKRemuuR8AOgb1ui/Qnq9tHVRfTkUwtqiny', '2021-09-04'),
('Land-001', 'pasindu', 'matara', 769372531, 'Land_Owner', '$2y$10$tpxU0lS4fuuIHgh6ntPncemTpNBjz64C7aoKyouKxLe937dov0oH.', '2021-09-09'),
('Land-002', 'kumud', 'Ariyawanshagama, Welipenna', 769372536, 'Land_Owner', '$2y$10$OSI3ePBJTCQFApw1ge9wyujZz/zJs8zUTnp5uerkYrSWS3aerFhjq', '2021-09-11'),
('Man-000', 'Sasindu', 'Galle Kollek', 768687026, 'Manager', '$2y$10$YkpCdR2YWXArh8iAMgj01.rsIOeFxIdVEwbwW1I/UFEqqPvhkdg9q', '2021-09-04'),
('PM-000', 'Pasindu Melaka', 'Galle Kollek', 773158044, 'Product_Manager', '$2y$10$ldnAwQ0woqQCQsBK0CkenuzSgioHyO5RU5s4b7d8D6/2hGQw4WCeu', '2021-09-21'),
('SUP-000', 'kumud', 'Ariyawanshagama, Welipenna', 769372530, 'Supervisor', '$2y$10$bvpZlNHQBQnOH9cqMUgSxuFK9WbBrkdrMpwl8UAmEBSlNjfmYMMCK', '2021-09-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `advance_request`
--
ALTER TABLE `advance_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `accountant_manage_advance` (`emp_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `auction_bid`
--
ALTER TABLE `auction_bid`
  ADD PRIMARY KEY (`date`,`product_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `emergency_message`
--
ALTER TABLE `emergency_message`
  ADD PRIMARY KEY (`notification_id`,`message_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fertilizer_request`
--
ALTER TABLE `fertilizer_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `supervisor_handle_fertilizer` (`emp_id(sup)`),
  ADD KEY `agent_delivers_fertilizer` (`emp_id(agent)`);

--
-- Indexes for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD PRIMARY KEY (`in_date`,`type`),
  ADD KEY `in_stock_derives_stock` (`type`);

--
-- Indexes for table `landowner`
--
ALTER TABLE `landowner`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `monthly_payment`
--
ALTER TABLE `monthly_payment`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `monthly_profit`
--
ALTER TABLE `monthly_profit`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `monthly_tea_price`
--
ALTER TABLE `monthly_tea_price`
  ADD PRIMARY KEY (`date`),
  ADD KEY `accountant_updates_monthly_tea` (`emp_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD PRIMARY KEY (`out_date`,`type`),
  ADD KEY `out_stock_derives_stock` (`type`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`date`,`product_id`);

--
-- Indexes for table `product_manager`
--
ALTER TABLE `product_manager`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `landowner_makes_request` (`lid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`type`),
  ADD KEY `supervisor_manges_stock` (`emp_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tea`
--
ALTER TABLE `tea`
  ADD PRIMARY KEY (`date`,`lid`),
  ADD KEY `landowner_gives_tea` (`lid`),
  ADD KEY `agent_collects_tea` (`emp_id(agent)`),
  ADD KEY `supervisor_measures_tea` (`emp_id(sup)`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_message`
--
ALTER TABLE `emergency_message`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountant`
--
ALTER TABLE `accountant`
  ADD CONSTRAINT `accountant_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advance_request`
--
ALTER TABLE `advance_request`
  ADD CONSTRAINT `accountant_manage_advance` FOREIGN KEY (`emp_id`) REFERENCES `accountant` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advance_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`);

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fertilizer_request`
--
ALTER TABLE `fertilizer_request`
  ADD CONSTRAINT `agent_delivers_fertilizer` FOREIGN KEY (`emp_id(agent)`) REFERENCES `agent` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fertilizer_request_derives_from_request` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `supervisor_handle_fertilizer` FOREIGN KEY (`emp_id(sup)`) REFERENCES `supervisor` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `in_stock`
--
ALTER TABLE `in_stock`
  ADD CONSTRAINT `in_stock_derives_stock` FOREIGN KEY (`type`) REFERENCES `stock` (`type`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monthly_tea_price`
--
ALTER TABLE `monthly_tea_price`
  ADD CONSTRAINT `accountant_updates_monthly_tea` FOREIGN KEY (`emp_id`) REFERENCES `accountant` (`emp_id`);

--
-- Constraints for table `out_stock`
--
ALTER TABLE `out_stock`
  ADD CONSTRAINT `out_stock_derives_stock` FOREIGN KEY (`type`) REFERENCES `stock` (`type`);

--
-- Constraints for table `product_manager`
--
ALTER TABLE `product_manager`
  ADD CONSTRAINT `product_manager_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `landowner_makes_request` FOREIGN KEY (`lid`) REFERENCES `landowner` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `supervisor_manges_stock` FOREIGN KEY (`emp_id`) REFERENCES `supervisor` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tea`
--
ALTER TABLE `tea`
  ADD CONSTRAINT `agent_collects_tea` FOREIGN KEY (`emp_id(agent)`) REFERENCES `agent` (`emp_id`),
  ADD CONSTRAINT `landowner_gives_tea` FOREIGN KEY (`lid`) REFERENCES `landowner` (`user_id`),
  ADD CONSTRAINT `supervisor_measures_tea` FOREIGN KEY (`emp_id(sup)`) REFERENCES `supervisor` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
