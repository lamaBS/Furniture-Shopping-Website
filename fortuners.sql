-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 07:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fortuners`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(10) NOT NULL,
  `buildingNo` varchar(15) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `country` varchar(20) NOT NULL,
  `postalCode` int(15) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `buildingNo`, `street`, `city`, `country`, `postalCode`, `Email`) VALUES
(6, '100', 'Some Street', 'Riyadh', 'Saudi Arabia', 33222, 'alanoud@email.com'),
(7, 'B22', '1st street', 'Al Ahmadi', 'Kuwait', 33333, 'alanoud@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `phone`, `password`, `First_name`, `Last_name`) VALUES
('renad@gmail.com', 111, 'tt', 'renad', 'alzugibi');

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `cartitemID` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `productNo` int(10) NOT NULL,
  `Quantity` int(2) NOT NULL,
  `colorID` int(11) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `Name`) VALUES
(1, 'Kitchen'),
(2, 'Living Room'),
(3, 'Decor');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Flagged` varchar(30) NOT NULL DEFAULT '0',
  `Text` text NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Time` time NOT NULL,
  `productNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `phoneNumber` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Email`, `password`, `First_name`, `Last_name`, `phoneNumber`) VALUES
('alanoud@email.com', 'Alanoud123', 'Alanoud', 'Alhamid', '0096655555555');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderitemID` int(10) NOT NULL,
  `productNo` int(10) NOT NULL,
  `quantity` int(30) NOT NULL,
  `colorID` int(11) NOT NULL,
  `orderNum` int(30) NOT NULL,
  `rate` varchar(30) DEFAULT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNum` int(30) NOT NULL,
  `Date` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(10) NOT NULL,
  `cardNumber` bigint(20) NOT NULL,
  `expDate_month` int(2) NOT NULL,
  `expDate_year` int(2) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `cardNumber`, `expDate_month`, `expDate_year`, `Email`, `Name`) VALUES
(22, 1234123412341234, 1, 20, 'alanoud@email.com', 'Alanoud Alhamid'),
(23, 1111222233334444, 12, 20, 'alanoud@email.com', 'Some Name');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productNo` int(11) NOT NULL,
  `orgPrice` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `avgRate` decimal(4,2) NOT NULL DEFAULT '0.00',
  `refunded` varchar(30) NOT NULL DEFAULT '0',
  `sold` int(30) NOT NULL DEFAULT '0',
  `Name` varchar(30) NOT NULL,
  `numOfRate` int(30) NOT NULL DEFAULT '0',
  `catID` int(10) NOT NULL,
  `discount` int(3) NOT NULL DEFAULT '0',
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productNo`, `orgPrice`, `price`, `description`, `avgRate`, `refunded`, `sold`, `Name`, `numOfRate`, `catID`, `discount`, `pic`) VALUES
(13, 140, 56, 'All eyes are on the spindle-backed Phoenix sofa,\r\na new shape for spring which celebrates stripped-back structure and minimalist form. Designed to be viewed 360 and sit centrally,\r\nits hand-turned back and tapered legs are softened by its plump \r\nand pillowy upholstery.', '0.00', '0', 0, 'spindle-backed Phoenix sofa', 0, 2, 40, 'photo/INK_main.jpg'),
(14, 300, 60, 'Set within a golden frame, this opulent ottoman is a luxe accent in a contemporary living space.', '0.00', '0', 0, 'Velvet Carousel Ottoman', 0, 2, 20, 'photo/main.jpg'),
(15, 80, 80, 'Glazed terracotta\r\nHand wash\r\nPortugal', '0.00', '0', 0, 'Karuma Pitcher', 0, 1, 0, 'photo/main2.jpg'),
(16, 50, 50, 'Sold individually\r\nSlight variation in natural stone/wood will occur\r\nStone, gold electroplating\r\nImported', '0.00', '0', 0, 'Silvered geode Coaster', 0, 1, 0, 'photo/main3.jpg'),
(17, 60, 60, 'Decaled glass, wood, stainless steel\r\nHand wash\r\nImported', '0.00', '0', 0, 'Tia infuser Water Bottle', 0, 1, 0, 'photo/main4.jpg'),
(18, 40, 40, 'Handpainted stoneware\r\nImported', '0.00', '0', 0, 'City Trinket Dish', 0, 3, 0, 'photo/main5.jpg'),
(19, 80, 80, 'Glazed earthenware, rattan\r\nIncludes drainage holes\r\nWipe with damp cloth\r\nImported', '0.00', '0', 0, 'Sun Porch Pot', 0, 3, 0, 'photo/main6.jpg'),
(20, 70, 70, 'Glass, brass\r\nWipe with dry cloth\r\nImported', '0.00', '0', 0, 'Viteri Hanging Frame', 0, 3, 0, 'photo/main8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `productNo` int(11) NOT NULL,
  `colorID` int(11) NOT NULL,
  `color` varchar(40) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`productNo`, `colorID`, `color`, `stock`) VALUES
(13, 15, 'blue', 50),
(13, 16, 'black', 90),
(13, 17, '', 0),
(14, 18, 'dark-green', 200),
(14, 19, 'pink', 100),
(14, 20, '', 0),
(15, 21, 'pink', 60),
(15, 22, 'white', 50),
(15, 23, 'blue', 80),
(16, 24, 'blue', 150),
(16, 25, '', 0),
(16, 26, '', 0),
(17, 27, 'pink', 100),
(17, 28, 'blue', 150),
(17, 29, '', 0),
(18, 30, 'orignal', 100),
(18, 31, '', 0),
(18, 32, '', 0),
(19, 33, 'original', 150),
(19, 34, '', 0),
(19, 35, '', 0),
(20, 36, 'gray', 100),
(20, 37, 'brown', 80),
(20, 38, 'white', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`cartitemID`),
  ADD KEY `productNo` (`productNo`),
  ADD KEY `Email` (`Email`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `productNo` (`productNo`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderitemID`),
  ADD KEY `orderNum` (`orderNum`),
  ADD KEY `productNo` (`productNo`),
  ADD KEY `colorID` (`colorID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNum`) USING BTREE,
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productNo`),
  ADD UNIQUE KEY `Name` (`Name`,`pic`),
  ADD KEY `catID` (`catID`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`colorID`),
  ADD KEY `productNo` (`productNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `cartitemID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderitemID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `colorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`);

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`),
  ADD CONSTRAINT `cartitem_ibfk_2` FOREIGN KEY (`productNo`) REFERENCES `product` (`productNo`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartitem_ibfk_3` FOREIGN KEY (`colorID`) REFERENCES `productcolor` (`colorID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productNo`) REFERENCES `product` (`productNo`) ON DELETE CASCADE;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`productNo`) REFERENCES `product` (`productNo`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`colorID`) REFERENCES `productcolor` (`colorID`),
  ADD CONSTRAINT `orderitem_ibfk_3` FOREIGN KEY (`orderNum`) REFERENCES `orders` (`orderNum`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`);

--
-- Constraints for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD CONSTRAINT `productcolor_ibfk_1` FOREIGN KEY (`productNo`) REFERENCES `product` (`productNo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
