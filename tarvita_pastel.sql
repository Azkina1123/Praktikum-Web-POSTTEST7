-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 03:32 PM
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
-- Database: `tarvita_pastel`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(50) NOT NULL,
  `released_date` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `net` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `frame` varchar(10) DEFAULT NULL,
  `technic` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `packing_list` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `released_date`, `name`, `price`, `description`, `stock`, `net`, `width`, `height`, `frame`, `technic`, `material`, `packing_list`, `image`) VALUES
('painting-1', '2022-10-18 21:31:00', 'Hirondelle Amour Painting', 6019905, 'Hand-painted canvas reproduction with quality oil painting.', 14, 34.3, 70.8, 52.3, 'Yes', 'Oil Painting', '', '', 'painting-1-Hirondelle Amour Painting.jpg'),
('painting-2', '2022-10-18 21:32:00', 'Koi Alpha Tree Painting', 2190000, 'Koi fish painting with LED FLS and size 50x100 cm.', 12, 34.7, 42.2, 67.1, 'Yes', 'Unknown', '', '', 'painting-2-Koi Alpha Tree Painting.jpg'),
('painting-3', '2022-10-18 21:33:00', 'Seascape Painting', 690909, 'Large art hand-painted 4pcs/set oil painting on canvas unframed.', 32, 40.2, 33.2, 65.5, 'No', 'Oil Painting', '', '', 'painting-3-Seascape Painting.jpg'),
('painting-4', '2022-10-18 21:34:00', 'Abstract City Painting', 4976784, 'Landscape painting with modern canvas for living room decoration.', 8, 30.7, 65.1, 51.1, 'Yes', 'Unknown', '', '', 'painting-4-Abstract City Painting.jpg'),
('painting-5', '2022-10-18 21:35:00', 'Girl Full Round Drill Rhinestone', 108450, 'The most popular painting which can perfectly decorate your room.', 23, 22.8, 38.2, 50.1, 'Yes', 'Unknown', '', '', 'painting-5-Girl Full Round Drill Rhinestone.jpg'),
('tool-1', '2022-10-18 21:36:00', 'Paint Brush', 25500, 'Set professional brushes for acrylic, watercolor, and oil painting.', 34, 0.2, 5, 20, '', '', 'Wood', '1 Set paint brushes (6 pcs)', 'tool-1-Paint Brush.jpeg'),
('tool-2', '2022-10-18 21:36:00', 'Painting Canvas', 38402, 'High quality painting canvas with medium texture cotton duck fabric.', 72, 3.6, 20, 30, '', '', 'Canvas', '1 Pcs Canvas', 'tool-2-Painting Canvas.jpg'),
('tool-3', '2022-10-18 21:37:00', 'Watercolor Paint', 29450, 'Paint with the finest materials, smooth application, and true color.', 112, 1.7, 3.9, 7.1, '', '', 'Watercolor', '1 Set watercolor (white, green, blue, yellow, red', 'tool-3-Watercolor Paint.jpg'),
('tool-4', '2022-10-18 21:37:00', 'Plastic Pallete Painting', 59990, 'Brand new and high quality pallete. Suitable for all water based media.', 41, 0.5, 10.7, 10.7, '', '', 'Plastic', '1 Pcs pallete', 'tool-4-Plastic Pallete Painting.jfif'),
('tool-5', '2022-10-18 21:38:00', 'Craft Painting Tools Kits', 273000, 'The tools set is used for decorating and painting DIY model spraying.', 32, 4.4, 1.2, 13.4, '', '', 'Alluminium', '1 Set craft painting (10 pcs)', 'tool-5-Craft Painting Tools Kits.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `psw`, `phone`, `address`) VALUES
(1, 'User1', '$2y$10$TAtI39lDBKB6mNUgEG9d7eMUsGp46xKYVC0.u0GB2lwK9NUl2ICBG', '081250539358', 'Jl. KS Tubun Dalam'),
(2, 'User2', '$2y$10$BPI23rvLKYQu0pgLe3gJJ.NmMZaZYWUIboPkyDmvVZOglsqrFa2Ym', '082115783345', 'Jl. Pahlawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
