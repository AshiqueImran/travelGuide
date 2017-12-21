-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: ডিসে 13, 2017 at 05:45 PM
-- সার্ভার সংস্করন: 10.1.13-MariaDB
-- পিএইছপির সংস্করন: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `travelguide`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addedBy` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `admin`
--

INSERT INTO `admin` (`Admin_id`, `name`, `password`, `email`, `addedBy`) VALUES
(1, 'Ashik Imran', '$2y$10$0K9KIyduXmDmJcAXhc8woeZvg3QMZkqjnbhoxxwbQD0UbKzS7j6C2', 'imranashik50@gmail.com', 'imranashik50@gmail.com'),
(2, 'Azizur Rahman Ananda', '$2y$10$8xuKI.z8f.mt.KxHPmhWW.GYe1mIYJFcbVMjA8VXK/2HDfZGDe.HC', 'anhonestdevil@gmail.com', 'imranashik50@gmail.com'),
(3, 'Purba Das Gupta', '$2y$10$FhzIPUSdx/qfueRxZRBZBujYhcyu10YLAVh1zqYVIny35kak6BSvm', 'purbadasgupta66@gmail.com', 'anhonestdevil@gmail.com');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `bookingtable`
--

CREATE TABLE `bookingtable` (
  `id` int(11) NOT NULL,
  `bookingplace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bookedby` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `TrxID` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `bookingtable`
--

INSERT INTO `bookingtable` (`id`, `bookingplace`, `hotel`, `bookedby`, `mobile`, `time`, `TrxID`, `price`, `status`) VALUES
(2, 'sylhet', 'trip hotels', 'tanvir.hasan1984@yahoo.com', '01935197981', '2018-01-23', 'gashcdhka12', 5000, 'applied'),
(3, 'kuakata', 'recent motel zone', 'tanvir.hasan1984@yahoo.com', '01935197981', '2018-02-06', 'qar234', 10000, 'confirmed'),
(4, 'bandarban', 'ocean blue', 'user@gmail.com', '01717220661', '2018-02-01', 'agdsv1232hvdj', 4000, 'applied');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `hotelinfo`
--

CREATE TABLE `hotelinfo` (
  `id` int(11) NOT NULL,
  `hotel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `hotelinfo`
--

INSERT INTO `hotelinfo` (`id`, `hotel`, `place`, `address`, `price`) VALUES
(1, 'ocean blue', 'bandarban', 'bandarban town', 4000),
(2, 'ovishar', 'bandarban', 'bandarban bus stand road', 2000);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `placetable`
--

CREATE TABLE `placetable` (
  `id` int(11) NOT NULL,
  `plcaeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `hotel` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastEdit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `placetable`
--

INSERT INTO `placetable` (`id`, `plcaeName`, `details`, `hotel`, `category`, `lastEdit`, `capacity`, `count`) VALUES
(1, 'sundarban', 'The Sundarbans is the world''''s largest coastal mangrove forest in the coastal region of the Bay of Bengal; considered one of the natural wonders of the world, it was recognised in 1997 as a UNESCO World Heritage Site.', 'meghalaya hotel', 'forest', 'imranashik50@gmail.com', 43, 0),
(2, 'coxs_bazar', 'Cox''s Bazar is a city, a fishing port and district headquarters in Bangladesh. The beach in Cox''s Bazar is an unbroken 120 km sandy sea beach with a gentle slope, making it the second longest sea beach in the world.', 'hotel media', 'beach', 'imranashik50@gmail.com', 50, 0),
(3, 'rangamati', 'Rangamati  is a district in south-eastern Bangladesh. It is a part of the Chittagong Division and the town of Rangamati serves as the headquarters of the district. Area-wise, it is the largest district of the country.', 'sufia hotel', 'hill', 'purbadasgupta66@gmail.com', 50, 0),
(4, 'bandarban', 'Bandarban is a district in South-Eastern Bangladesh, and a part of the Chittagong Division.Its popular place Nillgiri and Nillachal.It is famous for it''''s tracking,hiking,camping and off road journey.', 'sky hotel', 'hill', 'imranashik50@gmail.com', 40, 0),
(5, 'sylhet', 'Sylhet is a metropolitan city in northeastern Bangladesh.It is famous for Tea Garden,Jaflong,Waterfall of Madhobkundo,Bichnakandi,Ratargul.It''''s natural beauty is perfect for relaxing from the stress of life.', 'trip hotels', 'fountain', 'imranashik50@gmail.com', 40, 0),
(6, 'kushtia', 'Kushtia is a district in the Khulna division of Bangladesh.The Shahi Mosque in Kushtia bears the sign of rich cultural heritage of the region from the Mughal period.The great Lalon Shas''''s Tomb is situated here.', 'kushtia city hall', 'cultural', 'imranashik50@gmail.com', 50, 0),
(7, 'kuakata', 'Kuakata in Kalapara Upazila, Patuakhali District, known for its panoramic sea beach.One can have a stunning view of both sunrise and sunset over the Bay of Bengal.It is also famous for jhau-bon along side the beach.', 'recent motel zone', 'beach', 'imranashik50@gmail.com', 45, 0),
(8, 'rajshahi', 'Rajshahi is famous for Puthia Temple Complex and kantajio as a sacred site,Mohasthangor as ancient ruins and historic site,Tajhat palace as a architectural building and bagha mosque as religious site.', 'hotel rajshahi kings', 'historic', 'imranashik50@gmail.com', 50, 0),
(9, 'sonargaon', 'Sonargaon was a historic administrative, commercial and maritime centre in Bengal. Situated in the centre of the Ganges delta, it was the seat of the medieval Muslim rulers and governors of eastern Bengal.', 'sonargaon hotel', 'historic', 'imranashik50@gmail.com', 45, 0),
(10, 'tangail', 'Tangail is a district in the central region of Bangladesh known for sweets. It is the largest district of Dhaka division by area and second largest by population. The population of Tangail zilla is about 3.8 million.', 'Tangail  ailla hotel', 'forest', 'imranashik50@gmail.com', 40, 0),
(11, 'barisal', 'Barisal is a major city that lies on the bank of Kirtankhola river in south-central Bangladesh. It is the largest city and the administrative headquarter of both Barisal district and Barisal Division.', 'lalbagh hotel', 'cultural', 'imranashik50@gmail.com', 40, 0),
(12, 'narayanganj', 'Narayanganj is a city in central Bangladesh located near the capital city of Dhaka and has a population of about 2 million. The city is on the bank of the Shitalakshya River.It'' Port is an important shipping place.', 'ABC hotels \r\nnarayanganj town\r\nnarayanganj', 'historic', 'imranashik50@gmail.com', 40, 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `usertable`
--

CREATE TABLE `usertable` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `usertable`
--

INSERT INTO `usertable` (`userId`, `name`, `password`, `email`, `mobile`) VALUES
(1, 'user', '$2y$10$wjNdtAPgvtqtX1wBI6frTuhg232kl/hCAk3BfuUdXzgU9DHK1S6Ia', 'user@gmail.com', '01717220661'),
(2, 'Tanvir Hasan', '$2y$10$Iv8/zx4/9dv/kdzzze9wSemp4CMYj/.ZxR5uoyuy6pFfTbY7EwtI2', 'tanvir.hasan1984@yahoo.com', '01935197981');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- টেবিলের ইনডেক্সসমুহ `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `hotelinfo`
--
ALTER TABLE `hotelinfo`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `placetable`
--
ALTER TABLE `placetable`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `hotelinfo`
--
ALTER TABLE `hotelinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `placetable`
--
ALTER TABLE `placetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
