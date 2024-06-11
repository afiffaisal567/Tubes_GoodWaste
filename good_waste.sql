-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `good_waste`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `business_address` text NOT NULL,
  `business_category` varchar(100) NOT NULL,
  `business_logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_name`, `email`, `phone_number`, `business_address`, `business_category`, `business_logo`, `created_at`) VALUES
(1, 'Dunkin Donuts', 'dunkindonuts.id@gmail.com', '144332', 'Graha Pena Jl. Jend. A. Yani No. 88, Gayungan, Surabaya', 'Cake and Bakery', 'dunkin.png', '2024-06-02 11:32:32'),
(2, 'Dunkin Donuts', 'dunkindonuts.id@gmail.com', '0318498219', 'Graha Pena Jl. Jend. A. Yani No. 88, Gayungan, Surabaya', 'Cake and Bakery', 'dunkin.png', '2024-06-02 11:40:52'),
(3, 'J.CO Donuts & Coffee', 'jcodonutsandcoffee.id@gmail.com', '0318295374', 'Transmart Carrefour Rungkut, Lantai Ground Jl. Raya Kalirungkut No. 25, Rungkut, Surabaya', 'Cake and Bakery', 'jco.png', '2024-06-02 11:42:17'),
(4, 'TOUS les JOURS Bakery', 'touslejoursbakery.id@gmail.com', '03199534558', 'Galaxy Mall 1, Lantai 2. Jl. Dharmahusada Indah Timur No. 35 - 37, Mulyorejo, Surabaya', 'Cake and Bakery', 'tous.png', '2024-06-02 11:43:17'),
(5, 'Pizza Hut', 'pizzahut.id@gmail.com', '08113249125', 'Jl. Raya Jemursari No. 136, Tenggilis Mejoyo, Surabaya', 'Restoran', 'pizza.jpg', '2024-06-02 11:45:27'),
(6, 'KFC', 'kfc.indonesia@gmail.com', '03158251002', 'Jl. Adityawarman No. 371, Dukuh Pakis, Surabaya, Jawa Timur Surabaya Jawa Timur.', 'Restoran', 'kfc.jpg', '2024-06-02 11:46:57'),
(7, 'Hoka Hoka Bento', 'hokahokabento.id@gmail.com', ' 03182519218', 'Tunjungan Plaza 3, Lantai 5, Food Court Jl. Basuki Rahmat No. 8 - 12, Tegalsari, Surabaya', 'Restoran', 'hokben.jpg', '2024-06-02 11:48:02'),
(8, 'Carefour Market', 'carefourmarket.id@gmail.com', ' 082208255117', 'BG Junction Lobby Level LL-CR01, Jl. Bubutan No.1 - 7', 'Supermarket', 'carefour.png', '2024-06-02 11:49:04'),
(9, 'Sheraton Restaurant', 'sheratonresto.id@gmail.com', ' 0315468000', 'Jl. Embong Malang No.25-31, Kedungdoro, Kec. Tegalsari, Surabaya, Jawa Timur 60261', 'Hotel', 'sheraton.png', '2024-06-02 11:51:40'),
(10, 'Novotel Restaurant', 'novotelresto.id@gmail.com', '03199203888', 'Jl. Raya Kedung Baruk No.26-28, Kedung Baruk, Kec. Rungkut, Surabaya, Jawa Timur 60298', 'Hotel', 'novotel.png', '2024-06-02 11:52:34'),
(12, 'afif', 'afif@gmail.com', '084178147478', 'jfownownf', 'Restoran', 'Screenshot 2024-06-11 102822.png', '2024-06-11 04:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Home Automation', 'fskalam56@gmail.com', 'fgnoqnon', '2024-06-03 14:42:09'),
(2, 'afif', 'fskalam56@gmail.com', 'hay', '2024-06-11 04:44:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
