-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 03:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamiltonroad`
--

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

CREATE TABLE `bags` (
  `Title` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Price` decimal(18,2) NOT NULL,
  `FileName` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`Title`, `Description`, `Price`, `FileName`) VALUES
('Fall2020', 'Get this bag to look great in the fall!', '200.00', 'assets/default_image.jpg'),
('FannyPack', 'Get a fanny pack!', '1337.00', 'assets/default_image.jpg'),
('LeatherBag1', 'This is a bag that is half silk and half leather', '120.00', 'assets/default_image.jpg'),
('PremiumQuality', 'Our most premium  bag!', '250.00', 'assets/default_image.jpg'),
('SilkBag1', 'This is a silk bag made from the finest spiders', '123.00', 'assets/default_image.jpg'),
('SilkBag2', 'Made from wool and silk', '50.00', 'assets/default_image.jpg'),
('SilkBag3', 'Our cheapest silk bag', '35.00', 'assets/default_image.jpg'),
('VelcroBag', 'This is a bag with a velcro strap', '90.00', 'assets/default_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lineitems`
--

CREATE TABLE `lineitems` (
  `LineItemID` int(11) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `BagTitle` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `PurchaseID` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Total` decimal(18,2) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`PurchaseID`, `UserName`, `Total`, `Date`) VALUES
(1061, 'michaeltest', '835.00', '2019-12-13'),
(3023, 'michaeltest', '835.00', '2019-12-13'),
(3134, 'fredtest', '1537.00', '2019-12-13'),
(3511, 'michaeltest', '425.00', '2019-12-13'),
(4150, 'michaeltest', '3474.00', '2019-12-13'),
(5913, 'michaeltest', '1160.00', '2019-12-13'),
(9535, 'fredtest', '1537.00', '2019-12-13'),
(9815, 'michaeltest', '425.00', '2019-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(35) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
('fredtest', 'Fred', 'Scott', 'fredscott@test.com', '$2y$10$61spEqaYvm12LWwnCxjk7.b1AJK2dkEMaDzrKlSDiZEDo8RF6nsVK'),
('michaeltest', 'Michael', 'D\'Ambrosio', 'damb@test.com', '$2y$10$3kAtxv0XTqW/GNEwXWfQJeU5FDznuJzX8udzIEce1LdGvfL1iHTE6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bags`
--
ALTER TABLE `bags`
  ADD PRIMARY KEY (`Title`);

--
-- Indexes for table `lineitems`
--
ALTER TABLE `lineitems`
  ADD PRIMARY KEY (`LineItemID`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lineitems`
--
ALTER TABLE `lineitems`
  MODIFY `LineItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
