-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 12:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `daerah_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`daerah_id`, `name`, `slug`) VALUES
(1, 'Bandung', 'bandung'),
(2, 'Jakarta', 'jakarta'),
(3, 'Semarang', 'semarang'),
(4, 'Surabaya', 'surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_checkin`
--

CREATE TABLE `hotel_checkin` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `total_inap` int(11) NOT NULL,
  `total_dewasa` int(11) NOT NULL,
  `total_anak` int(11) NOT NULL,
  `hotel_fee` int(255) NOT NULL,
  `fasilitas_fee` int(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_checkin`
--

INSERT INTO `hotel_checkin` (`id`, `hotel_id`, `room_no`, `u_name`, `email`, `no_telp`, `total_inap`, `total_dewasa`, `total_anak`, `hotel_fee`, `fasilitas_fee`, `total_price`, `checkin`, `checkout`, `active`) VALUES
(1, 1, 108, 'Eemam', 'eemam@gmail.com', '134512341235', 4, 3, 1, 750000, 100000, 850000, '2022-12-27', '2022-12-31', 0),
(2, 1, 107, 'Eemams', 'eemam@gmail.com', '1234512535', 7, 2, 1, 500000, 0, 500000, '2022-12-27', '2023-01-03', 0),
(3, 1, 105, 'Eemam', 'eemam@gmail.com', '123451234', 4, 2, 3, 250000, 0, 500000, '2022-12-27', '2022-12-31', 0),
(4, 1, 107, 'Alicia', 'alicia@gmail.com', '123415', 2, 1, 2, 250000, 0, 250000, '2022-12-27', '2022-12-29', 0),
(5, 1, 106, 'Eemam', 'eemam@gmail.com', '13241234', 2, 2, 3, 500000, 0, 500000, '2022-12-27', '2022-12-29', 0),
(6, 1, 105, 'Eemam', 'eemam@gmail.com', '1234152341', 30, 4, 2, 1000000, 0, 1000000, '2022-12-27', '2023-01-26', 0),
(7, 1, 105, 'Eemam', 'eemam@gmail.com', '13451234', 30, 6, 3, 45000000, 0, 45000000, '2022-12-27', '2023-01-26', 0),
(8, 1, 105, '1', '1@1', '1', 11, 3, 1, 8250000, 0, 8250000, '2022-12-27', '2023-01-07', 0),
(9, 1, 105, 'Eemam', 'eemam@gmail.com', '3251234', 25, 2, 2, 12500000, 0, 12500000, '2022-12-27', '2023-01-21', 0),
(10, 1, 102, '2@', '2@2', '2', 2, 2, 2, 1000000, 0, 1000000, '2022-12-27', '2022-12-29', 0),
(11, 1, 105, 'Eemam', 'eemam@gmail.com', '08123456789', 30, 6, 3, 45000000, 0, 45000000, '2022-12-27', '2023-01-26', 0),
(12, 1, 102, '2@', '2@2', '22', 5, 1, 1, 1250000, 0, 1250000, '2022-12-27', '2023-01-01', 0),
(13, 1, 107, 'asdf', 'asdf@asdf', '123', 2, 1, 0, 500000, 0, 500000, '2022-12-27', '2022-12-29', 0),
(14, 1, 103, '33', '3@3', '3', 3, 2, 2, 1500000, 0, 1500000, '2022-12-27', '2022-12-30', 0),
(15, 1, 101, '1', '1@1', '1', 11, 1, 1, 2750000, 0, 2750000, '2022-12-27', '2023-01-07', 0),
(16, 1, 102, '21', '21@21', '21', 21, 2, 1, 10500000, 0, 10500000, '2022-12-27', '2023-01-17', 0),
(17, 1, 105, '555', '555@555', '555', 5, 5, 0, 6250000, 0, 6250000, '2022-12-27', '2023-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_main`
--

CREATE TABLE `hotel_main` (
  `hotel_id` int(11) NOT NULL,
  `total_room` int(11) NOT NULL,
  `used_room` int(11) NOT NULL,
  `features` text NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_main`
--

INSERT INTO `hotel_main` (`hotel_id`, `total_room`, `used_room`, `features`, `rate`) VALUES
(1, 11, 5, 'feature 1, feature 2, feature 3, feature 4, feature 5, feature 6, feature 7', 4),
(2, 12, 8, 'feature 1, feature 2, feature 3, feature 4, feature 5, feature 6, feature 7', 4),
(3, 15, 6, 'feature 1, feature 2, feature 3, feature 4, feature 5, feature 6, feature 7', 3),
(4, 10, 8, 'feature 1, feature 2, feature 3, feature 4, feature 5, feature 6, feature 7', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_order`
--

CREATE TABLE `hotel_order` (
  `id` int(11) NOT NULL,
  `checkin_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `max_adults` int(11) NOT NULL,
  `max_anak` int(11) NOT NULL,
  `features` text NOT NULL,
  `terisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`id`, `hotel_id`, `room_no`, `beds`, `max_adults`, `max_anak`, `features`, `terisi`) VALUES
(1, 1, 101, 1, 6, 3, 'feature 4, feature 6, feature 7, feature 9', 0),
(2, 1, 102, 1, 6, 3, 'feature 1, feature 2, feature 3, feature 5', 0),
(3, 1, 103, 1, 6, 3, 'feature 2, feature 5, feature 6, feature 8', 0),
(4, 1, 104, 1, 6, 3, 'feature 5, feature 6, feature 7, feature 9', 0),
(5, 1, 105, 2, 6, 3, 'feature 1, feature 3, feature 5, feature 7, feature 9', 0),
(6, 1, 106, 2, 6, 3, 'feature 1, feature 2, feature 5', 0),
(7, 1, 107, 2, 6, 3, 'feature 3, feature 4, feature 5, feature 6', 0),
(8, 1, 108, 2, 6, 3, 'feature 1, feature 2, feature 6, feature 9', 0),
(9, 2, 101, 2, 4, 3, 'feature 1, feature 2, feature 4, feature 5, feature 6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `daerah_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `facility` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hotel`
--

INSERT INTO `tb_hotel` (`hotel_id`, `name`, `slug`, `daerah_id`, `price`, `facility`, `image`) VALUES
(1, 'Hotel A', 'hotel-a', 1, '250000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(2, 'Bandung B', 'bandung-b', 1, '1200000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(3, 'Hotel C', 'hotel-c', 2, '725000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(4, 'Hotel B', 'hotel-b', 2, '240000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(5, 'Hotel L', 'hotel-l', 3, '725000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(6, 'Hotel M', 'hotel-m', 3, '840000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, animi esse quis laboriosam illum similique sequi, fugiat reprehenderit corporis omnis dicta! Enim delectus commodi provident repellat dignissimos repellendus eveniet doloribus obcaecati ratione ullam, non molestiae aperiam illum, adipisci, asperiores beatae aliquid odit eum quos accusamus est quo ea. Minus aperiam iste placeat modi numquam, et ad debitis, consequatur, incidunt fuga facilis tenetur in quibusdam? Provident ex earum repellat hic magnam. Quis nesciunt asperiores in voluptates vel illum cupiditate voluptate soluta quisquam reprehenderit non totam laborum, commodi eos omnis tempore exercitationem tempora praesentium modi molestias suscipit velit quidem! A, dignissimos quia?', ''),
(17, 'Hotel Surabaya Baru', 'hotel-surabaya-baru', 4, '100000', 'Free AC, Free WiFi, Free Breakfast', 'IMG_20221229_1672311248.jpeg'),
(18, 'Hotel Surabaya Baru Lagi', 'hotel-surabaya-baru-lagi', 4, '100000', 'Free AC, Free WiFi, Free Breakfast', 'IMG_20221229_1672311280.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `daerah_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `promosi` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `name`, `slug`, `daerah_id`, `price`, `promosi`, `description`, `image`) VALUES
(1, 'Paket Bandung 1', 'paket-bandung-1', 1, '765000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid veritatis veniam molestias quibusdam, ipsum recusandae atque dolor consequatur perspiciatis laboriosam unde dignissimos ea nulla ab ducimus asperiores error delectus eaque voluptate voluptates possimus voluptatem quia totam repellendus. Quo nostrum dignissimos sequi dolorum tenetur est nulla sint quasi, cupiditate tempore molestiae eaque repudiandae recusandae cum quos unde? Quasi explicabo dolore deleniti magnam nulla ipsa illum quos provident modi, doloremque eveniet recusandae alias quae cumque corrupti perspiciatis. Quisquam dolorem at ut hic culpa impedit veritatis praesentium, nesciunt magni asperiores officia natus optio, harum blanditiis vitae. Hic alias veritatis dolores temporibus? Distinctio, ut!', 'Perjalanan Travel Bandung, Meliputi:\r\n- Kota 1\r\n- Kota 2\r\n- Kota 3\r\n- Kota 4\r\n- Kota 5', ''),
(2, 'Paket Bandung 2', 'paket-bandung-2', 1, '465000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid veritatis veniam molestias quibusdam, ipsum recusandae atque dolor consequatur perspiciatis laboriosam unde dignissimos ea nulla ab ducimus asperiores error delectus eaque voluptate voluptates possimus voluptatem quia totam repellendus. Quo nostrum dignissimos sequi dolorum tenetur est nulla sint quasi, cupiditate tempore molestiae eaque repudiandae recusandae cum quos unde? Quasi explicabo dolore deleniti magnam nulla ipsa illum quos provident modi, doloremque eveniet recusandae alias quae cumque corrupti perspiciatis. Quisquam dolorem at ut hic culpa impedit veritatis praesentium, nesciunt magni asperiores officia natus optio, harum blanditiis vitae. Hic alias veritatis dolores temporibus? Distinctio, ut!', 'Perjalanan Travel Bandung, Meliputi:\r\n- Kota 1\r\n- Kota 2\r\n- Kota 3\r\n- Kota 4\r\n- Kota 5', ''),
(3, 'Paket Jakarta 1', 'paket-jakarta-1', 2, '600000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid veritatis veniam molestias quibusdam, ipsum recusandae atque dolor consequatur perspiciatis laboriosam unde dignissimos ea nulla ab ducimus asperiores error delectus eaque voluptate voluptates possimus voluptatem quia totam repellendus. Quo nostrum dignissimos sequi dolorum tenetur est nulla sint quasi, cupiditate tempore molestiae eaque repudiandae recusandae cum quos unde? Quasi explicabo dolore deleniti magnam nulla ipsa illum quos provident modi, doloremque eveniet recusandae alias quae cumque corrupti perspiciatis. Quisquam dolorem at ut hic culpa impedit veritatis praesentium, nesciunt magni asperiores officia natus optio, harum blanditiis vitae. Hic alias veritatis dolores temporibus? Distinctio, ut!', 'Paket Tour Jakarta, Melewati:\r\n- Daerah 1\r\n- Daerah 2\r\n- Daerah 3\r\n- Daerah 4', ''),
(4, 'Paket Jakarta 2', 'paket-jakarta-2', 2, '900000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid veritatis veniam molestias quibusdam, ipsum recusandae atque dolor consequatur perspiciatis laboriosam unde dignissimos ea nulla ab ducimus asperiores error delectus eaque voluptate voluptates possimus voluptatem quia totam repellendus. Quo nostrum dignissimos sequi dolorum tenetur est nulla sint quasi, cupiditate tempore molestiae eaque repudiandae recusandae cum quos unde? Quasi explicabo dolore deleniti magnam nulla ipsa illum quos provident modi, doloremque eveniet recusandae alias quae cumque corrupti perspiciatis. Quisquam dolorem at ut hic culpa impedit veritatis praesentium, nesciunt magni asperiores officia natus optio, harum blanditiis vitae. Hic alias veritatis dolores temporibus? Distinctio, ut!', 'Paket Tour Jakarta, Melalui:\r\n- Pasar 1\r\n- Pasar 2\r\n- Taman 1\r\n- Taman 2\r\n- Kota 1\r\n- Kota 2', ''),
(5, 'Paket Semarang 1', 'paket-semarang-1', 3, '640000', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid veritatis veniam molestias quibusdam, ipsum recusandae atque dolor consequatur perspiciatis laboriosam unde dignissimos ea nulla ab ducimus asperiores error delectus eaque voluptate voluptates possimus voluptatem quia totam repellendus. Quo nostrum dignissimos sequi dolorum tenetur est nulla sint quasi, cupiditate tempore molestiae eaque repudiandae recusandae cum quos unde? Quasi explicabo dolore deleniti magnam nulla ipsa illum quos provident modi, doloremque eveniet recusandae alias quae cumque corrupti perspiciatis. Quisquam dolorem at ut hic culpa impedit veritatis praesentium, nesciunt magni asperiores officia natus optio, harum blanditiis vitae. Hic alias veritatis dolores temporibus? Distinctio, ut!', 'Paket Tour Semarang, Melewati:\r\n- Daerah 1\r\n- Daerah 2\r\n- Daerah 3\r\n- Daerah 4', ''),
(7, 'Paket Surabaya', 'paket-surabaya', 4, '800000', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.', 'IMG_20221229_1672293428.jpeg'),
(8, 'Paket Surabaya 2', 'paket-surabaya-2', 4, '850000', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.                                                                                                                ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.                                                                                                                ', 'IMG_20221229_1672303664.jpeg'),
(9, 'Paket Bandung 3', 'paket-bandung-3', 1, '2700000', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.', 'IMG_20221229_1672296017.jpeg'),
(10, 'Paket Surabaya 4', 'paket-surabaya-4', 4, '850000', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.                                                                ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum, eius maxime repellendus delectus reprehenderit dolor dolorem? Veniam commodi aliquam itaque voluptatibus maiores. Saepe incidunt, repellat nam repudiandae quisquam reprehenderit quam similique culpa harum magnam, possimus voluptates necessitatibus exercitationem eaque delectus repellendus! Architecto beatae veritatis sint, aliquam odit esse accusamus atque officia laudantium sapiente quas. Eos dignissimos itaque, maiores libero a voluptas iure alias esse nulla nobis aspernatur labore commodi, autem, quisquam vero harum saepe excepturi exercitationem atque. Obcaecati voluptas rerum alias rem molestias repellat nobis corporis molestiae quibusdam vitae vel in error nemo aut enim doloremque aliquam, quod reprehenderit possimus.                                                                ', 'IMG_20221229_1672303763.jpeg'),
(13, 'Paket Surabaya Baru', 'paket-surabaya-baru', 4, '1850000', '                ', '                ', 'IMG_20221229_1672305790.png'),
(14, 'Paket Bandung Baru', 'paket-bandung-baru', 1, '2800000', '', '', 'IMG_20221229_1672306095.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `u_name`, `username`, `email`, `u_password`, `no_telp`, `alamat`, `is_admin`) VALUES
(7, 'Super Admin', 'Super Admin', 'sadmin@gmail.com', '$2y$10$YuM6TniwNngD9HKt/OArOe/oWRLzFZWPDUuMiUCYOrEvtfVN/DFiK', '081234567890', 'Jalan PHH Mustofa', 2),
(8, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JPxErkMwRl2icci7IuuXZuyx/KOCqBlrQeP.RC.8WlLPEslsxqCmi', '080987654321', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde dolor fuga nulla nisi explicabo eveniet veniam quos ducimus a, soluta, quidem, hic debitis necessitatibus deserunt!', 1),
(13, '', '', 'user@gmail.com', '$2y$10$pOSXTNJNOgfnTYOKXBNSQeGvTF7pk4qwZngtz2A67u4bHTJgUMxFS', '', '', 0),
(16, 'User1', 'User Baru', 'user1@gmail.com', '$2y$10$GcWMvbcjvUCY6h3fkORM7.Oh.3OILjeLDHYiVZ68uTb6VxWtBnkUy', '1', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`daerah_id`);

--
-- Indexes for table `hotel_checkin`
--
ALTER TABLE `hotel_checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `order_id` (`room_no`);

--
-- Indexes for table `hotel_main`
--
ALTER TABLE `hotel_main`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_order`
--
ALTER TABLE `hotel_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`checkin_id`),
  ADD KEY `checkin_id` (`checkin_id`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `daerah_id` (`daerah_id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daerah_id` (`daerah_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `daerah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_checkin`
--
ALTER TABLE `hotel_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel_order`
--
ALTER TABLE `hotel_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_room`
--
ALTER TABLE `hotel_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_main`
--
ALTER TABLE `hotel_main`
  ADD CONSTRAINT `hotel_main_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `tb_hotel` (`hotel_id`);

--
-- Constraints for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD CONSTRAINT `hotel_room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_main` (`hotel_id`);

--
-- Constraints for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD CONSTRAINT `tb_hotel_ibfk_1` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`daerah_id`);

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`daerah_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
