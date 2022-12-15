-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 01:35 AM
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
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used'),
(16, 'Rusty');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(13, 'Admin', 'User', 'admin@cse340.net', '$2y$10$9OwwLRUVM/HBF/MmOXs7gOHgS7SXWFry3/sdw8iSCN4u12MG.tqQu', '3', NULL),
(14, 'Esther', 'Ezimadu', 'buc@gmail.com', '$2y$10$tpPnq3a4inavQzStZtMORuTQUvl/4eK4M6yq4IAysQ1J95HA72FcK', '3', NULL),
(15, 'josua', 'Evans', 'buchiezim@gmail.com', '$2y$10$D975VFiT/6UClJz6tN4RKeePNcRJo/7nOiBWW0cnHRLXesCgC5sIK', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `invId` int(11) NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ImgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `ImgPrimary`) VALUES
(23, 1, 'jeep-wrangler.jpg', '/phpmotors/images//jeep-wrangler.jpg', '2022-12-07 17:02:32', 1),
(24, 1, 'jeep-wrangler-tn.jpg', '/phpmotors/images//jeep-wrangler-tn.jpg', '2022-12-07 17:02:32', 1),
(25, 2, 'ford-modelt.jpg', '/phpmotors/images//ford-modelt.jpg', '2022-12-07 17:03:57', 1),
(26, 2, 'ford-modelt-tn.jpg', '/phpmotors/images//ford-modelt-tn.jpg', '2022-12-07 17:03:57', 1),
(27, 3, 'lambo-Adve.jpg', '/phpmotors/images//lambo-Adve.jpg', '2022-12-07 17:15:06', 1),
(28, 3, 'lambo-Adve-tn.jpg', '/phpmotors/images//lambo-Adve-tn.jpg', '2022-12-07 17:15:06', 1),
(29, 4, 'monster.jpg', '/phpmotors/images//monster.jpg', '2022-12-07 17:15:36', 1),
(30, 4, 'monster-tn.jpg', '/phpmotors/images//monster-tn.jpg', '2022-12-07 17:15:36', 1),
(31, 5, 'ms.jpg', '/phpmotors/images//ms.jpg', '2022-12-07 17:16:34', 1),
(32, 5, 'ms-tn.jpg', '/phpmotors/images//ms-tn.jpg', '2022-12-07 17:16:34', 1),
(33, 19, 'delorean.jpg', '/phpmotors/images//delorean.jpg', '2022-12-07 17:17:49', 1),
(34, 19, 'delorean-tn.jpg', '/phpmotors/images//delorean-tn.jpg', '2022-12-07 17:17:49', 1),
(35, 15, 'no-image.png', '/phpmotors/images//no-image.png', '2022-12-07 17:18:50', 1),
(36, 15, 'no-image-tn.png', '/phpmotors/images//no-image-tn.png', '2022-12-07 17:18:51', 1),
(37, 1, 'logo.jpg', '/phpmotors/images//logo.jpg', '2022-12-07 17:20:07', 0),
(38, 1, 'logo-tn.jpg', '/phpmotors/images//logo-tn.jpg', '2022-12-07 17:20:07', 0),
(39, 8, 'fire-truck.jpg', '/phpmotors/images//fire-truck.jpg', '2022-12-13 19:55:30', 1),
(40, 8, 'fire-truck-tn.jpg', '/phpmotors/images//fire-truck-tn.jpg', '2022-12-13 19:55:30', 1),
(41, 9, 'crwn-vic.jpg', '/phpmotors/images//crwn-vic.jpg', '2022-12-13 19:56:08', 1),
(42, 9, 'crwn-vic-tn.jpg', '/phpmotors/images//crwn-vic-tn.jpg', '2022-12-13 19:56:08', 1),
(43, 12, 'hummer.jpg', '/phpmotors/images//hummer.jpg', '2022-12-13 19:56:39', 1),
(44, 12, 'hummer-tn.jpg', '/phpmotors/images//hummer-tn.jpg', '2022-12-13 19:56:39', 1),
(45, 6, 'bat.jpg', '/phpmotors/images//bat.jpg', '2022-12-13 19:57:12', 1),
(46, 6, 'bat-tn.jpg', '/phpmotors/images//bat-tn.jpg', '2022-12-13 19:57:12', 1),
(47, 7, 'mystery-van.jpg', '/phpmotors/images//mystery-van.jpg', '2022-12-13 19:59:09', 1),
(48, 7, 'mystery-van-tn.jpg', '/phpmotors/images//mystery-van-tn.jpg', '2022-12-13 19:59:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(11) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/phpmotors/images/jeep-wrangler.jpg', '/phpmotors/images/jeep-wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/phpmotors/images/ford-modelt.jpg', '/phpmotors/images/ford-modelt-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/phpmotors/images/lambo-Adve.jpg', '/phpmotors/images/lambo-Adve-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/phpmotors/images/monster.jpg', '/phpmotors/images/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/phpmotors/images/ms.jpg', '/phpmotors/images/ms-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/phpmotors/images/bat.jpg', '/phpmotors/images/bat-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/mm.jpg', '/phpmotors/images/mm-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/phpmotors/images/fire-truck.jpg', '/phpmotors/images/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/phpmotors/images/crown-vic.jpg', '/phpmotors/images/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/camaro.jpg', '/phpmotors/images/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/escalade.jpg', '/phpmotors/images/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/hummer.jpg', '/phpmotors/images/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/phpmotors/images/aerocar.jpg', '/phpmotors/images/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/phpmotors/images/fbi.jpg', '/phpmotors/images/fbi-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/phpmotors/images/dog.jpg', '/phpmotors/images/dog-tn.jpg', '35000', 1, 'Brown', 2),
(19, 'hunvh', 'test', 'dfdd', '/phpmotors/phpmotors/images/no-image.png', '/phpmotors/phpmotors/images/no-image.png', '2', 3, 'ee', 2),
(21, 'Estoria', 'retoria', 'perfection last', '/phpmotors/phpmotors/images/no-image.png', '/phpmotors/phpmotors/images/no-image.png', '200000', 5, 'red', 16);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(23, 'I love the car', '0000-00-00 00:00:00', 4, 14),
(24, 'Sweet Car', '2022-12-14 10:43:06', 4, 15),
(25, 'Love Love It4', '2022-12-14 14:37:25', 21, 15),
(32, 'joo', '2022-12-15 00:27:40', 8, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`) USING BTREE;

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
