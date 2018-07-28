-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2018 at 07:18 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cherono`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `packageID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `customerID`, `packageID`, `date`, `time`, `location`, `description`, `status`, `response`, `seen`) VALUES
(1, 1, '2', '2018-07-25', '', 'nairobi', 'i will be in a photoshoot', 'accepted', '', 'seen'),
(2, 1, 'photoshoot package', '2018-07-25', '', 'nairobi', 'i will be in a photoshoot', 'accepted', 'yesssss', 'seen'),
(3, 1, '2', '2018-07-25', '', 'nairobi', 'i will be in a photoshoot', 'accepted', 'not available', 'unseen'),
(4, 1, 'photoshoot package', '2018-08-01', '08:00-10:00', 'nairobi', 'im graduating', 'accepted', 'im too busy then', 'unseen'),
(5, 1, 'graduation package', '2018-08-01', '', 'thika', 'i will be in a photoshoot', 'pending', '', 'unseen'),
(6, 1, 'photoshoot package', '2018-07-26', '', 'thika', 'i will be in a photoshoot', 'pending', '', 'unseen'),
(7, 1, 'photoshoot package', '2018-08-03', '11:00-13:00', 'nairobi', 'i will be in a photoshoot', 'accepted', 'i will be attending', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`FirstName`, `LastName`, `Email`, `PhoneNumber`, `Image`, `CustomerID`) VALUES
('kirigo', 'karanjas', 'kirigokaranja@gmail.com', '0713774575', 'Black And White Christmas wallpaper - 889042.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `MessageDate` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `MessageDate`, `name`, `email`, `phone`, `message`, `status`, `reply`) VALUES
(1, '2018/07/21', 'kirigo karanja', 'kirigokaranja@gmail.com', '0713774575', 'how do you conduct your work', 'replied', 'not now'),
(2, '2018/07/21', 'james bond', 'jamesbond@gmail.com', '0713774575', 'its me again', 'replied', 'good to see you'),
(3, '2018/07/21', 'sharon', 'sharonkirigo@gmail.com', '0723404552', 'lets do this again', 'replied', 'anytime doll');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageID` int(11) NOT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackageDetails` varchar(255) DEFAULT NULL,
  `PackagePrice` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PackageID`, `PackageName`, `PackageDetails`, `PackagePrice`, `status`) VALUES
(2, 'photoshoot package', 'Basic Special Effects,\r\nZombie,\r\nInjury Simulation,\r\nFantasy,\r\nTheatre', '3000', 'active'),
(3, 'graduation package', 'Natural,\r\n    Basic Beauty,\r\n    Formal,\r\n    Glamour,\r\n    Contour\r\n\r\n', '2500', 'active'),
(4, 'kirigo', 'its me only', '1000', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioID`, `image`, `category`, `details`) VALUES
(3, 'about.jpg', 'photoshoot package', 'photoshoot details'),
(4, 'raphael-lovaski-532696-unsplash.jpg', 'graduation package', 'my graduation');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `package` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `bookID`, `title`, `date`, `start`, `end`, `package`, `location`, `description`) VALUES
(3, 7, 'nairobi ,photoshoot', '2018-08-03', '2018-08-03 11:00:00', '2018-08-03 13:00:00', 'photoshoot package', 'nairobi', 'i will be in a photoshoot');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `password`) VALUES
(1, 2, 'kirigokaranja@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
