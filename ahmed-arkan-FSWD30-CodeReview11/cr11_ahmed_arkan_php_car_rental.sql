-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2018 at 04:59 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_ahmed_arkan_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `name` varchar(55) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `type` varchar(55) NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `fk_offices_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `image1`, `image2`, `image3`, `name`, `model`, `type`, `details`, `fk_offices_id`) VALUES
(1, 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292001.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292003.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292005.jpg?52fdd3521b591acdcea4cd791ea96344', 'Smart forTwo', 'Coupe 2016', 'Small Car', 'Benzin | Automatic | Coupe', 1),
(2, 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390001.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390004.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390003.jpg?aad4471d103c11b733b544b55a0b7ab9', 'Audi', 'A8', 'Limousine', 'Diesel | Automatic | Limousine', 4),
(3, 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206001.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206004.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206002.jpg?2616d4955d97a30a60f2b974001f70ff', 'BMW', 'X6', 'SUV', 'Diesel | Automatic | SUV', 3),
(4, 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292001.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292003.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292005.jpg?52fdd3521b591acdcea4cd791ea96344', 'Smart forTwo', 'Coupe 2016', 'Small Car', 'Benzin | Automatic | Coupe', 2),
(5, 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390001.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390004.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390003.jpg?aad4471d103c11b733b544b55a0b7ab9', 'Audi', 'A8', 'Limousine', 'Diesel | Automatic | Limousine', 3),
(6, 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206001.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206004.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206002.jpg?2616d4955d97a30a60f2b974001f70ff', 'BMW', 'X6', 'SUV', 'Diesel | Automatic | SUV', 2),
(7, 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292001.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292003.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292005.jpg?52fdd3521b591acdcea4cd791ea96344', 'Smart forTwo', 'Coupe 2016', 'Small Car', 'Benzin | Automatic | Coupe', 4),
(8, 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390001.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390004.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390003.jpg?aad4471d103c11b733b544b55a0b7ab9', 'Audi', 'A8', 'Limousine', 'Diesel | Automatic | Limousine', 1),
(9, 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206001.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206004.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206002.jpg?2616d4955d97a30a60f2b974001f70ff', 'BMW', 'X6', 'SUV', 'Diesel | Automatic | SUV', 3),
(10, 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292001.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292003.jpg?52fdd3521b591acdcea4cd791ea96344', 'https://secure.pic.autoscout24.net/images-big/292/729/0325729292005.jpg?52fdd3521b591acdcea4cd791ea96344', 'Smart forTwo', 'Coupe 2016', 'Small Car', 'Benzin | Automatic | Coupe', 2),
(11, 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390001.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390004.jpg?aad4471d103c11b733b544b55a0b7ab9', 'https://secure.pic.autoscout24.net/images-big/390/703/0296703390003.jpg?aad4471d103c11b733b544b55a0b7ab9', 'Audi', 'A8', 'Limousine', 'Diesel | Automatic | Limousine', 1),
(12, 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206001.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206004.jpg?2616d4955d97a30a60f2b974001f70ff', 'https://secure.pic.autoscout24.net/images-big/206/602/0330602206002.jpg?2616d4955d97a30a60f2b974001f70ff', 'BMW', 'X6', 'SUV', 'Diesel | Automatic | SUV', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cars_status`
--

CREATE TABLE `cars_status` (
  `cars_status_id` int(11) NOT NULL,
  `fk_current_location_id` int(11) NOT NULL,
  `fk_car_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `status` enum('available','not available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_status`
--

INSERT INTO `cars_status` (`cars_status_id`, `fk_current_location_id`, `fk_car_id`, `fk_user_id`, `status`) VALUES
(0, 2, 1, 1, 'available'),
(3, 1, 2, NULL, 'available'),
(4, 3, 4, NULL, 'available'),
(5, 5, 5, NULL, 'available'),
(6, 6, 6, NULL, 'not available'),
(7, 7, 8, NULL, 'available'),
(8, 8, 7, NULL, 'available'),
(9, 10, 9, NULL, 'not available'),
(10, 9, 10, NULL, 'not available'),
(11, 12, 11, NULL, 'available'),
(12, 11, 12, NULL, 'not available'),
(13, 4, 3, NULL, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `current_location`
--

CREATE TABLE `current_location` (
  `current_location_id` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `current_location`
--

INSERT INTO `current_location` (`current_location_id`, `lat`, `lng`) VALUES
(1, 48.188176, 16.412918),
(2, 48.259089, 16.449781),
(3, 48.174054, 16.365985),
(4, 48.257922, 16.411278),
(5, 48.19712, 16.39572),
(6, 48.259089, 16.449781),
(7, 48.188176, 16.412918),
(8, 48.20426, 16.350805),
(9, 48.229139, 16.322521),
(10, 48.208605, 16.304838),
(11, 48.168345, 16.282807),
(12, 48.174653, 16.406173);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `offices_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`offices_id`, `address`, `phone`) VALUES
(1, '1030 WIEN - Baumgasse 133', '+43 1 798 55 42'),
(2, '1220 Wien - Wagramer Straße 177', '+43 1 3451220'),
(3, '1100 Wien - Davidgasse 50', '+43 1 602 18 01'),
(4, '1210 Wien - Leopoldauerstraße 40', '+43 1 270 71 96');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `birthdate`, `user_email`, `user_pass`) VALUES
(1, 'Ahmeddd', 'Arkannn', '', NULL, 'ahmedarkan@icloud.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea'),
(2, 'aahmed', 'arkan', '', NULL, 'sabri@icloud.com1', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea'),
(3, 'ahasd', 'asfsf', '', NULL, 'sabr2i@icloud.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea'),
(4, 'xysa', 'asfasf', '', NULL, 'sabri@2icloud.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea'),
(5, 'asd', 'fewfew', 'female', '1212-03-12', 'sab2ri@icloud.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea'),
(6, 'dlshkgsd', 'sdgÃ¶osdngs', 'male', '0013-02-12', 'sasbri@icloud.com', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_offices_id` (`fk_offices_id`);

--
-- Indexes for table `cars_status`
--
ALTER TABLE `cars_status`
  ADD PRIMARY KEY (`cars_status_id`),
  ADD KEY `fk_current_location_id` (`fk_current_location_id`),
  ADD KEY `fk_car_id` (`fk_car_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `current_location`
--
ALTER TABLE `current_location`
  ADD PRIMARY KEY (`current_location_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`offices_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cars_status`
--
ALTER TABLE `cars_status`
  MODIFY `cars_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `current_location`
--
ALTER TABLE `current_location`
  MODIFY `current_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `offices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_offices_id`) REFERENCES `offices` (`offices_id`);

--
-- Constraints for table `cars_status`
--
ALTER TABLE `cars_status`
  ADD CONSTRAINT `cars_status_ibfk_2` FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `cars_status_ibfk_3` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cars_status_ibfk_4` FOREIGN KEY (`fk_current_location_id`) REFERENCES `current_location` (`current_location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
