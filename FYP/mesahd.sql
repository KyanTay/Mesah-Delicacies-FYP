-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 05:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mesahd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincart`
--

CREATE TABLE `admincart` (
  `adminCID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `FoodQuantity` int(255) NOT NULL,
  `FoodPrice` double NOT NULL,
  `orderID` int(255) NOT NULL,
  `FoodID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admincart`
--

INSERT INTO `admincart` (`adminCID`, `userID`, `FoodName`, `FoodQuantity`, `FoodPrice`, `orderID`, `FoodID`) VALUES
(1, 8, 'Mee Siam', 1, 5, 1659705442, 17),
(2, 8, 'Mee Siam', 6, 5, 1659705480, 17);

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `auID` int(255) NOT NULL,
  `FullName` char(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` int(255) NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`auID`, `FullName`, `userID`, `Email`, `PhoneNo`, `TotalPrice`) VALUES
(1, 'Tan Zi Jian test', 8, 'zijian88885@gmail.com', 98765432, 102);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `CheckoutID` int(255) NOT NULL,
  `FullName` char(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNo` int(50) NOT NULL,
  `PaymentMethod` char(50) NOT NULL,
  `Message` varchar(256) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `UserID` int(90) NOT NULL,
  `TotalPrice` int(255) NOT NULL,
  `DStatus` varchar(256) NOT NULL,
  `orderID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `completedorders`
--

CREATE TABLE `completedorders` (
  `coID` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` int(255) NOT NULL,
  `FullName` char(255) NOT NULL,
  `amountSpent` double NOT NULL,
  `orderID` int(255) NOT NULL,
  `Date` date NOT NULL,
  `dateMonth` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completedorders`
--

INSERT INTO `completedorders` (`coID`, `Email`, `PhoneNo`, `FullName`, `amountSpent`, `orderID`, `Date`, `dateMonth`) VALUES
(1, 'zijian88885@gmail.com', 98765432, 'Tan Zi Jian test', 15, 1659705442, '2022-08-05', 8),
(2, 'zijian88885@gmail.com', 98765432, 'Tan Zi Jian test', 40, 1659705480, '2022-08-05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `FoodID` int(90) NOT NULL,
  `FoodName` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `rateNo` int(255) NOT NULL,
  `Rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` (`FoodID`, `FoodName`, `Price`, `Description`, `Image`, `rateNo`, `Rating`) VALUES
(16, 'Mee Rebus', 6, 'The dish is made of yellow egg noodles, which are also used in Hokkien mee, with a spicy slightly sweet curry-like gravy. The gravy is made from shrimp or tauchu broth, shallots, lemongrass, galangal, salam leaf (Indonesian bay leaf), kaffir lime leaf, gula jawa (Indonesian dark palm sugar), salt, water, and corn starch as a thickening agent. The dish is garnished with a hard-boiled egg, dried shrimp, boiled potato, calamansi limes, spring onions, Chinese celery, green chilies, fried firm tofu (', 'meerebus.jpg', 0, 0),
(17, 'Mee Siam', 5, 'Mee siam is a dish of thin rice vermicelli with hot, sweet, and sour flavors, originated in Penang but is popular among the Malay and Peranakan communities throughout Peninsular Malaysia and Singapore, although the dish is called \"Siamese noodle\" in Malay and thus appears to be inspired or adapted from Thai flavors when Thailand was formerly known as Siam. Mee siam is related to kerabu bee hoon although there is a significant difference in the recipe.', 'meesiam.jpg', 1, 5),
(19, 'Nasi Lemak', 3, 'This traditional favorite offers sambal, Ikan Bilis (anchovies), peanuts, and boiled egg. This is the most traditional version. Nasi lemak stalls can be found serving them with fried egg, sambal kerang (cockles) - a local favorite, sambal squids, sambal fish, chicken or chicken/beef rendang, squid fritters, or even fried chicken or fish. It can be consumed for breakfast, brunch, lunch, tea, dinner, and even supper.', 'nasilemak.jpg', 0, 0),
(20, 'Odeh Odeh', 4, 'Odeh Odeh is a traditional Malay and Peranakan Kueh that used to be found in neighborhood stalls or coffee shops. It is infused with Pandan-flavored boil rice balls, stuffed with gula Melaka', 'odehodeh.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fooditemcart`
--

CREATE TABLE `fooditemcart` (
  `CartID` int(255) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Price` double NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `user_id` int(90) NOT NULL,
  `FoodID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grapth`
--

CREATE TABLE `grapth` (
  `colD` int(255) NOT NULL,
  `amountSpend` double NOT NULL,
  `month` int(255) NOT NULL,
  `Year` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grapth`
--

INSERT INTO `grapth` (`colD`, `amountSpend`, `month`, `Year`) VALUES
(1, 88, 8, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `UserID` int(90) NOT NULL,
  `usertype` char(100) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `FullName` char(40) NOT NULL,
  `Contact` int(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Email`, `UserID`, `usertype`, `Password`, `FullName`, `Contact`, `Address`) VALUES
('Admin', 'admin@gmail.com', 7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 99999999, '9 Woodlands Ave 9, Singapore 738964'),
('ZJ', 'zijian88885@gmail.com', 8, 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Tan Zi Jian test', 98765432, 'Tampines Street 75, Ching Chong, 369369'),
('TEEHEE', 'MJ@hotmail.com', 11, 'user', '114c9f6bdd0f7cb798b453099c3f5ff9a9f3b35f', 'MJ', 1234, '`12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincart`
--
ALTER TABLE `admincart`
  ADD PRIMARY KEY (`adminCID`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`auID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`CheckoutID`);

--
-- Indexes for table `completedorders`
--
ALTER TABLE `completedorders`
  ADD PRIMARY KEY (`coID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `fooditem`
--
ALTER TABLE `fooditem`
  ADD PRIMARY KEY (`FoodID`);

--
-- Indexes for table `fooditemcart`
--
ALTER TABLE `fooditemcart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `grapth`
--
ALTER TABLE `grapth`
  ADD PRIMARY KEY (`colD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admincart`
--
ALTER TABLE `admincart`
  MODIFY `adminCID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `auID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `CheckoutID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `completedorders`
--
ALTER TABLE `completedorders`
  MODIFY `coID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fooditem`
--
ALTER TABLE `fooditem`
  MODIFY `FoodID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fooditemcart`
--
ALTER TABLE `fooditemcart`
  MODIFY `CartID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `grapth`
--
ALTER TABLE `grapth`
  MODIFY `colD` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
