-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 08:23 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'riian.22', '123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cabor`
--

CREATE TABLE `cabor` (
  `id` int(11) NOT NULL,
  `nm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabor`
--

INSERT INTO `cabor` (`id`, `nm`) VALUES
(1, 'Anggar'),
(2, 'Angkat Besi'),
(5, 'Baseball'),
(6, 'Bola Basket'),
(7, 'Bola Tangan'),
(8, 'Bola Voli'),
(9, 'Bulu Tangkis'),
(10, 'Dayung'),
(11, 'Hoki'),
(12, 'Jalan'),
(13, 'Judo'),
(14, 'kano'),
(15, 'Karate-Do'),
(16, 'Kung Fu'),
(17, 'Lari Cepat'),
(18, 'Lari Jauh'),
(19, 'Lari Gawang'),
(20, 'Lompat Jauh'),
(21, 'Lempar Cakram'),
(22, 'Lempar Lembing'),
(23, 'Lempar Jangkit'),
(24, 'Lompat Tinggi'),
(25, 'Lompat Tinggi Galah'),
(26, 'Loncat Indah'),
(27, 'Lontar Martil'),
(28, 'Panahan'),
(29, 'Panjat Tebing'),
(30, 'Pencak Silat'),
(31, 'Renang Jarak Pendek'),
(32, 'Renang Jarak Jauh'),
(33, 'Senam'),
(34, 'Sepakbola'),
(35, 'Sepak Takraw'),
(36, 'Sepeda'),
(37, 'Softball'),
(38, 'Squash'),
(39, 'Steeplechase'),
(40, 'Taekwondo'),
(41, 'Tenis'),
(42, 'Tenis Meja'),
(43, 'Tinju'),
(44, 'Tolak Peluru');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pelatih`
--

CREATE TABLE `detail_pelatih` (
  `id` int(11) NOT NULL,
  `id_pelatih` int(11) NOT NULL DEFAULT 0,
  `tgl_lahir` varchar(50) NOT NULL DEFAULT '0',
  `ijazah` varchar(50) NOT NULL DEFAULT '0',
  `npwp` varchar(50) NOT NULL DEFAULT '0',
  `spk` varchar(50) NOT NULL DEFAULT '0',
  `skp` varchar(50) NOT NULL DEFAULT '0',
  `ktp` varchar(50) NOT NULL DEFAULT '0',
  `thn_daftar` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `komen` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pelatih`
--

INSERT INTO `detail_pelatih` (`id`, `id_pelatih`, `tgl_lahir`, `ijazah`, `npwp`, `spk`, `skp`, `ktp`, `thn_daftar`, `status`, `komen`) VALUES
(8, 3, '0', '0', '0', '0', '0', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', 2022, 1, NULL),
(9, 3, '0', '0', '0', '0', '0', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', 2021, 0, NULL),
(10, 3, '2021-12-28', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', '', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', 'WhatsApp Image 2021-12-27 at 10.50.25.jpeg', 2020, 2, NULL),
(11, 3, '1998-01-28', 'WhatsApp Image 2021-12-10 at 10.15.21 PM.jpeg', 'WhatsApp Image 2021-12-10 at 10.15.21 PM.jpeg', 'WhatsApp Image 2021-12-10 at 10.15.21 PM.jpeg', 'WhatsApp Image 2021-12-10 at 10.15.21 PM.jpeg', 'WhatsApp Image 2021-12-10 at 10.15.21 PM.jpeg', 2019, 3, ''),
(12, 3, '2021-12-30', 'hujan di sore hari.PNG', 'hujan di sore hari.PNG', 'hujan di sore hari.PNG', 'hujan di sore hari.PNG', 'hujan di sore hari.PNG', 2021, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kat`
--

CREATE TABLE `kat` (
  `id` int(11) NOT NULL,
  `nm` varchar(10) NOT NULL,
  `nil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat`
--

INSERT INTO `kat` (`id`, `nm`, `nil`) VALUES
(1, 'E', 1),
(2, 'D', 2),
(3, 'C', 3),
(4, 'B', 4),
(5, 'A', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kla`
--

CREATE TABLE `kla` (
  `id` int(11) NOT NULL,
  `nm` varchar(100) NOT NULL,
  `nil` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kla`
--

INSERT INTO `kla` (`id`, `nm`, `nil`) VALUES
(1, 'Tidak Berbakat', '2.30'),
(2, 'Kurang Berbakat', '3.00'),
(3, 'Berbakat', '4.00'),
(4, 'Berbakat Istimewa', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `nil`
--

CREATE TABLE `nil` (
  `id` int(11) NOT NULL,
  `idn` int(11) NOT NULL,
  `ids` int(11) NOT NULL,
  `idk` int(11) NOT NULL,
  `nil` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nil`
--

INSERT INTO `nil` (`id`, `idn`, `ids`, `idk`, `nil`) VALUES
(1313, 1, 1, 5, '15.00'),
(1314, 1, 2, 5, '5.25'),
(1315, 1, 5, 5, '35.00'),
(1316, 1, 6, 5, '19.75'),
(1317, 1, 7, 5, '6.81'),
(1318, 1, 8, 5, '7.20'),
(1319, 1, 1, 4, '10.00'),
(1320, 1, 2, 4, '4.40'),
(1321, 1, 5, 4, '29.00'),
(1322, 1, 6, 4, '19.76'),
(1323, 1, 7, 4, '6.82'),
(1324, 1, 8, 4, '5.20'),
(1325, 1, 1, 3, '6.00'),
(1326, 1, 2, 3, '3.50'),
(1327, 1, 5, 3, '23.00'),
(1328, 1, 6, 3, '22.25'),
(1329, 1, 7, 3, '7.77'),
(1330, 1, 8, 3, '3.30'),
(1331, 1, 1, 2, '3.00'),
(1332, 1, 2, 2, '2.70'),
(1333, 1, 5, 2, '17.00'),
(1334, 1, 6, 2, '24.74'),
(1335, 1, 7, 2, '8.72'),
(1336, 1, 8, 2, '2.30'),
(1337, 1, 1, 1, '2.00'),
(1338, 1, 2, 1, '2.60'),
(1339, 1, 5, 1, '16.00'),
(1340, 1, 6, 1, '27.23'),
(1341, 1, 7, 1, '9.67'),
(1342, 1, 8, 1, '2.30'),
(1343, 4, 1, 5, '17.00'),
(1344, 4, 2, 5, '5.90'),
(1345, 4, 5, 5, '39.00'),
(1346, 4, 6, 5, '18.96'),
(1347, 4, 7, 5, '6.78'),
(1348, 4, 8, 5, '8.80'),
(1349, 4, 1, 4, '12.00'),
(1350, 4, 2, 4, '5.10'),
(1351, 4, 5, 4, '33.00'),
(1352, 4, 6, 4, '18.97'),
(1353, 4, 7, 4, '5.79'),
(1354, 4, 8, 4, '6.50'),
(1355, 4, 1, 3, '8.00'),
(1356, 4, 2, 3, '4.30'),
(1357, 4, 5, 3, '26.00'),
(1358, 4, 6, 3, '21.11'),
(1359, 4, 7, 3, '7.60'),
(1360, 4, 8, 3, '4.20'),
(1361, 4, 1, 2, '4.00'),
(1362, 4, 2, 2, '3.30'),
(1363, 4, 5, 2, '19.00'),
(1364, 4, 6, 2, '23.25'),
(1365, 4, 7, 2, '8.41'),
(1366, 4, 8, 2, '2.80'),
(1367, 4, 1, 1, '3.00'),
(1368, 4, 2, 1, '3.30'),
(1369, 4, 5, 1, '18.00'),
(1370, 4, 6, 1, '25.38'),
(1371, 4, 7, 1, '9.22'),
(1372, 4, 8, 1, '2.70'),
(1373, 5, 1, 5, '16.00'),
(1374, 5, 2, 5, '6.20'),
(1375, 5, 5, 5, '36.00'),
(1376, 5, 6, 5, '18.96'),
(1377, 5, 7, 5, '6.42'),
(1378, 5, 8, 5, '7.70'),
(1379, 5, 1, 4, '12.00'),
(1380, 5, 2, 4, '5.40'),
(1381, 5, 5, 4, '30.00'),
(1382, 5, 6, 4, '18.97'),
(1383, 5, 7, 4, '6.43'),
(1384, 5, 8, 4, '6.00'),
(1385, 5, 1, 3, '7.00'),
(1386, 5, 2, 3, '4.60'),
(1387, 5, 5, 3, '21.00'),
(1388, 5, 6, 3, '21.11'),
(1389, 5, 7, 3, '7.20'),
(1390, 5, 8, 3, '4.20'),
(1391, 5, 1, 2, '3.00'),
(1392, 5, 2, 2, '3.90'),
(1393, 5, 5, 2, '19.00'),
(1394, 5, 6, 2, '23.25'),
(1395, 5, 7, 2, '7.98'),
(1396, 5, 8, 2, '2.50'),
(1397, 5, 1, 1, '2.00'),
(1398, 5, 2, 1, '3.80'),
(1399, 5, 5, 1, '18.00'),
(1400, 5, 6, 1, '25.38'),
(1401, 5, 7, 1, '8.74'),
(1402, 5, 8, 1, '2.40'),
(1403, 6, 1, 5, '17.00'),
(1404, 6, 2, 5, '6.80'),
(1405, 6, 5, 5, '42.00'),
(1406, 6, 6, 5, '18.15'),
(1407, 6, 7, 5, '6.05'),
(1408, 6, 8, 5, '9.30'),
(1409, 6, 1, 4, '14.00'),
(1410, 6, 2, 4, '6.00'),
(1411, 6, 5, 4, '35.00'),
(1412, 6, 6, 4, '18.16'),
(1413, 6, 7, 4, '6.06'),
(1414, 6, 8, 4, '8.00'),
(1415, 6, 1, 3, '10.00'),
(1416, 6, 2, 3, '5.20'),
(1417, 6, 5, 3, '28.00'),
(1418, 6, 6, 3, '20.08'),
(1419, 6, 7, 3, '6.76'),
(1420, 6, 8, 3, '5.70'),
(1421, 6, 1, 2, '6.00'),
(1422, 6, 2, 2, '4.30'),
(1423, 6, 5, 2, '21.00'),
(1424, 6, 6, 2, '22.00'),
(1425, 6, 7, 2, '7.46'),
(1426, 6, 8, 2, '3.50'),
(1427, 6, 1, 1, '5.00'),
(1428, 6, 2, 1, '4.20'),
(1429, 6, 5, 1, '20.00'),
(1430, 6, 6, 1, '23.92'),
(1431, 6, 7, 1, '8.16'),
(1432, 6, 8, 1, '3.40'),
(1433, 7, 1, 5, '17.00'),
(1434, 7, 2, 5, '6.45'),
(1435, 7, 5, 5, '38.00'),
(1436, 7, 6, 5, '18.17'),
(1437, 7, 7, 5, '6.33'),
(1438, 7, 8, 5, '8.10'),
(1439, 7, 1, 4, '13.00'),
(1440, 7, 2, 4, '5.70'),
(1441, 7, 5, 4, '32.00'),
(1442, 7, 6, 4, '18.18'),
(1443, 7, 7, 4, '6.34'),
(1444, 7, 8, 4, '6.30'),
(1445, 7, 1, 3, '8.00'),
(1446, 7, 2, 3, '4.90'),
(1447, 7, 5, 3, '26.00'),
(1448, 7, 6, 3, '20.27'),
(1449, 7, 7, 3, '7.08'),
(1450, 7, 8, 3, '4.50'),
(1451, 7, 1, 2, '4.00'),
(1452, 7, 2, 2, '4.10'),
(1453, 7, 5, 2, '21.00'),
(1454, 7, 6, 2, '22.37'),
(1455, 7, 7, 2, '7.83'),
(1456, 7, 8, 2, '2.70'),
(1457, 7, 1, 1, '3.00'),
(1458, 7, 2, 1, '4.05'),
(1459, 7, 5, 1, '20.00'),
(1460, 7, 6, 1, '24.45'),
(1461, 7, 7, 1, '8.55'),
(1462, 7, 8, 1, '2.60'),
(1463, 8, 1, 5, '18.00'),
(1464, 8, 2, 5, '8.05'),
(1465, 8, 5, 5, '44.00'),
(1466, 8, 6, 5, '16.60'),
(1467, 8, 7, 5, '5.82'),
(1468, 8, 8, 5, '10.20'),
(1469, 8, 1, 4, '15.00'),
(1470, 8, 2, 4, '6.90'),
(1471, 8, 5, 4, '37.00'),
(1472, 8, 6, 4, '16.61'),
(1473, 8, 7, 4, '5.83'),
(1474, 8, 8, 4, '8.90'),
(1475, 8, 1, 3, '11.00'),
(1476, 8, 2, 3, '5.70'),
(1477, 8, 5, 3, '29.00'),
(1478, 8, 6, 3, '18.73'),
(1479, 8, 7, 3, '6.57'),
(1480, 8, 8, 3, '6.60'),
(1481, 8, 1, 2, '7.00'),
(1482, 8, 2, 2, '4.50'),
(1483, 8, 5, 2, '22.00'),
(1484, 8, 6, 2, '20.85'),
(1485, 8, 7, 2, '7.31'),
(1486, 8, 8, 2, '4.30'),
(1487, 8, 1, 1, '6.00'),
(1488, 8, 2, 1, '4.45'),
(1489, 8, 5, 1, '21.00'),
(1490, 8, 6, 1, '22.97'),
(1491, 8, 7, 1, '8.05'),
(1492, 8, 8, 1, '4.20'),
(1493, 9, 1, 5, '17.00'),
(1494, 9, 2, 5, '6.90'),
(1495, 9, 5, 5, '39.00'),
(1496, 9, 6, 5, '17.38'),
(1497, 9, 7, 5, '6.04'),
(1498, 9, 8, 5, '8.10'),
(1499, 9, 1, 4, '13.00'),
(1500, 9, 2, 4, '6.00'),
(1501, 9, 5, 4, '33.00'),
(1502, 9, 6, 4, '17.39'),
(1503, 9, 7, 4, '6.05'),
(1504, 9, 8, 4, '6.30'),
(1505, 9, 1, 3, '8.00'),
(1506, 9, 2, 3, '5.10'),
(1507, 9, 5, 3, '27.00'),
(1508, 9, 6, 3, '19.80'),
(1509, 9, 7, 3, '6.89'),
(1510, 9, 8, 3, '4.50'),
(1511, 9, 1, 2, '4.00'),
(1512, 9, 2, 2, '4.20'),
(1513, 9, 5, 2, '22.00'),
(1514, 9, 6, 2, '22.22'),
(1515, 9, 7, 2, '7.43'),
(1516, 9, 8, 2, '2.70'),
(1517, 9, 1, 1, '3.00'),
(1518, 9, 2, 1, '4.10'),
(1519, 9, 5, 1, '21.00'),
(1520, 9, 6, 1, '24.62'),
(1521, 9, 7, 1, '8.56'),
(1522, 9, 8, 1, '2.60'),
(1523, 10, 1, 5, '19.00'),
(1524, 10, 2, 5, '8.75'),
(1525, 10, 5, 5, '47.00'),
(1526, 10, 6, 5, '16.42'),
(1527, 10, 7, 5, '5.50'),
(1528, 10, 8, 5, '11.40'),
(1529, 10, 1, 4, '16.00'),
(1530, 10, 2, 4, '7.50'),
(1531, 10, 5, 4, '40.00'),
(1532, 10, 6, 4, '16.43'),
(1533, 10, 7, 4, '5.51'),
(1534, 10, 8, 4, '9.20'),
(1535, 10, 1, 3, '12.00'),
(1536, 10, 2, 3, '6.20'),
(1537, 10, 5, 3, '32.00'),
(1538, 10, 6, 3, '18.36'),
(1539, 10, 7, 3, '6.22'),
(1540, 10, 8, 3, '6.90'),
(1541, 10, 1, 2, '8.00'),
(1542, 10, 2, 2, '5.00'),
(1543, 10, 5, 2, '25.00'),
(1544, 10, 6, 2, '20.30'),
(1545, 10, 7, 2, '6.94'),
(1546, 10, 8, 2, '4.70'),
(1547, 10, 1, 1, '7.00'),
(1548, 10, 2, 1, '5.45'),
(1549, 10, 5, 1, '24.00'),
(1550, 10, 6, 1, '22.23'),
(1551, 10, 7, 1, '7.65'),
(1552, 10, 8, 1, '4.60'),
(1553, 11, 1, 5, '18.00'),
(1554, 11, 2, 5, '7.10'),
(1555, 11, 5, 5, '39.00'),
(1556, 11, 6, 5, '16.92'),
(1557, 11, 7, 5, '5.99'),
(1558, 11, 8, 5, '8.30'),
(1559, 11, 1, 4, '14.00'),
(1560, 11, 2, 4, '6.20'),
(1561, 11, 5, 4, '33.00'),
(1562, 11, 6, 4, '16.93'),
(1563, 11, 7, 4, '5.98'),
(1564, 11, 8, 4, '6.30'),
(1565, 11, 1, 3, '9.00'),
(1566, 11, 2, 3, '5.40'),
(1567, 11, 5, 3, '26.00'),
(1568, 11, 6, 3, '19.48'),
(1569, 11, 7, 3, '6.77'),
(1570, 11, 8, 3, '4.50'),
(1571, 11, 1, 2, '5.00'),
(1572, 11, 2, 2, '4.23'),
(1573, 11, 5, 2, '23.00'),
(1574, 11, 6, 2, '22.03'),
(1575, 11, 7, 2, '7.55'),
(1576, 11, 8, 2, '2.70'),
(1577, 11, 1, 1, '4.00'),
(1578, 11, 2, 1, '4.20'),
(1579, 11, 5, 1, '22.00'),
(1580, 11, 6, 1, '24.58'),
(1581, 11, 7, 1, '8.31'),
(1582, 11, 8, 1, '2.60'),
(1583, 12, 1, 5, '20.00'),
(1584, 12, 2, 5, '9.85'),
(1585, 12, 5, 5, '57.00'),
(1586, 12, 6, 5, '14.89'),
(1587, 12, 7, 5, '5.00'),
(1588, 12, 8, 5, '11.80'),
(1589, 12, 1, 4, '17.00'),
(1590, 12, 2, 4, '8.70'),
(1591, 12, 5, 4, '48.00'),
(1592, 12, 6, 4, '14.90'),
(1593, 12, 7, 4, '5.01'),
(1594, 12, 8, 4, '9.50'),
(1595, 12, 1, 3, '13.00'),
(1596, 12, 2, 3, '7.50'),
(1597, 12, 5, 3, '36.00'),
(1598, 12, 6, 3, '17.89'),
(1599, 12, 7, 3, '5.94'),
(1600, 12, 8, 3, '7.10'),
(1601, 12, 1, 2, '9.00'),
(1602, 12, 2, 2, '6.30'),
(1603, 12, 5, 2, '29.00'),
(1604, 12, 6, 2, '20.18'),
(1605, 12, 7, 2, '6.78'),
(1606, 12, 8, 2, '4.80'),
(1607, 12, 1, 1, '8.00'),
(1608, 12, 2, 1, '6.25'),
(1609, 12, 5, 1, '28.00'),
(1610, 12, 6, 1, '22.13'),
(1611, 12, 7, 1, '7.51'),
(1612, 12, 8, 1, '4.70');

-- --------------------------------------------------------

--
-- Table structure for table `norma`
--

CREATE TABLE `norma` (
  `id` int(11) NOT NULL,
  `nm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `norma`
--

INSERT INTO `norma` (`id`, `nm`) VALUES
(1, 'Norma Penilaian Modifikasi Sport Search Usia 11 Tahun Puteri'),
(4, 'Norma Penilaian Modifikasi Sport Search Usia 11 Tahun Putera'),
(5, 'Norma Penilaian Modifikasi Sport Search Usia 12 Tahun Puteri'),
(6, 'Norma Penilaian Modifikasi Sport Search Usia 12 Tahun Putera'),
(7, 'Norma Penilaian Modifikasi Sport Search Usia 13 Tahun Puteri'),
(8, 'Norma Penilaian Modifikasi Sport Search Usia 13 Tahun Putera'),
(9, 'Norma Penilaian Modifikasi Sport Search Usia 14 Tahun Puteri'),
(10, 'Norma Penilaian Modifikasi Sport Search Usia 14 Tahun Putera'),
(11, 'Norma Penilaian Modifikasi Sport Search Usia 15 Tahun Puteri'),
(12, 'Norma Penilaian Modifikasi Sport Search Usia 15 Tahun Putera'),
(13, 'Norma Penilaian Sport Search Usia 15 Tahun Putera');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nm_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `id_siswa`, `nm_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat`, `no_hp`) VALUES
(18, 23, 'Rahmat', 'Swasta', 'Mislio', 'IRT', 'Teuku', '85658589');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `jk` varchar(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id`, `nama`, `nip`, `jk`, `username`, `password`) VALUES
(1, 'A', 54, '1', 'sari', '123'),
(2, 'Samsudin', 1234, 'Pria', 'samsu', '123'),
(3, 'Elisaa', 7238, '2', 'elis', '123');

-- --------------------------------------------------------

--
-- Table structure for table `peni`
--

CREATE TABLE `peni` (
  `id` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `ids` int(11) NOT NULL,
  `idn` int(11) NOT NULL,
  `nil` decimal(5,2) NOT NULL,
  `idk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peni`
--

INSERT INTO `peni` (`id`, `idp`, `ids`, `idn`, `nil`, `idk`) VALUES
(19, 1, 3, 1, '11.00', 3),
(20, 1, 3, 2, '4.37', 3),
(21, 1, 3, 5, '41.00', 5),
(22, 1, 3, 6, '17.00', 5),
(23, 1, 3, 7, '6.33', 5),
(24, 1, 3, 8, '8.00', 4),
(25, 2, 5, 1, '25.00', 0),
(26, 2, 5, 2, '4.00', 0),
(27, 2, 5, 5, '33.00', 0),
(28, 2, 5, 6, '16.00', 0),
(29, 2, 5, 7, '7.00', 0),
(30, 2, 5, 8, '8.00', 0),
(31, 2, 11, 1, '18.00', 0),
(32, 2, 11, 2, '4.52', 0),
(33, 2, 11, 5, '59.00', 0),
(34, 2, 11, 6, '23.22', 0),
(35, 2, 11, 7, '9.10', 0),
(36, 2, 11, 8, '7.20', 0),
(37, 1, 17, 1, '11.00', 3),
(38, 1, 17, 2, '3.52', 1),
(39, 1, 17, 5, '45.00', 5),
(40, 1, 17, 6, '19.00', 3),
(41, 1, 17, 7, '6.33', 5),
(42, 1, 17, 8, '7.50', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `prestasi` varchar(50) DEFAULT NULL,
  `ijazah` varchar(50) DEFAULT NULL,
  `skhu` varchar(50) DEFAULT NULL,
  `riwayat_orga` varchar(50) DEFAULT NULL,
  `alamat_cabor` varchar(50) DEFAULT NULL,
  `prestasi_olahraga` varchar(50) DEFAULT NULL,
  `mulai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `id_siswa`, `asal_sekolah`, `alamat`, `kelas`, `prestasi`, `ijazah`, `skhu`, `riwayat_orga`, `alamat_cabor`, `prestasi_olahraga`, `mulai`) VALUES
(17, 23, 'SMP Negei 21 Padang', 'Teuku', '1', '1', '1', '1', '1', '1', '1', '1'),
(18, 23, 'SMP Negei 21 Padang', 'Teuku', '1', '1', '1', '1', '1', '1', '1', '1'),
(19, 23, 'SMP Negei 21 Padang', 'Teuku', '1', '1', '1', '1', '1', '1', '1', '1'),
(20, 23, 'SMP Negei 21 Padang', 'Teuku', '1', '1', '1', '1', '1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `jk` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `cn` int(5) DEFAULT NULL,
  `idn` int(5) DEFAULT NULL,
  `pn` int(5) DEFAULT NULL,
  `akte` varchar(50) DEFAULT NULL,
  `kk` varchar(50) DEFAULT NULL,
  `bpjs` varchar(50) DEFAULT NULL,
  `aktif` varchar(50) DEFAULT NULL,
  `kartu_nisn` varchar(50) DEFAULT NULL,
  `narkoba` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `piagam` varchar(50) DEFAULT NULL,
  `rekom` varchar(50) DEFAULT NULL,
  `vaksin` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `cabor` varchar(50) DEFAULT NULL,
  `tinggi` varchar(50) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `cacat` varchar(50) DEFAULT NULL,
  `komen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `tgl`, `asal_sekolah`, `no_hp`, `agama`, `jk`, `username`, `password`, `cn`, `idn`, `pn`, `akte`, `kk`, `bpjs`, `aktif`, `kartu_nisn`, `narkoba`, `foto`, `piagam`, `rekom`, `vaksin`, `status`, `cabor`, `tinggi`, `berat`, `cacat`, `komen`) VALUES
(3, 'Xanana Gusmao', '1234', '2008-07-09', 'b', 'b', 'b', '1', 'sa', '123', 1, 4, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Mayor Alfredo', '123', '2012-06-30', 'q', 'q', 'q', '1', 'may', '123', 2, 6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Rohana Kudus', '1', '2013-05-05', 'b', 'b', 'c', '2', 'rohana', '123', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Dominikus', '2', '2021-10-29', 'bc', 'bc', 'cc', '1', 'dom12', '123', 1, 5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Markarius', '2', '2021-10-29', 'bca', 'bca', 'cca', '1', 'mar12', '123', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Elis', '456', '2022-01-26', 'SMP21', 'A', 'A', '2', 'dafa', '123456789', NULL, NULL, NULL, 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', '', NULL, NULL, NULL, NULL, NULL),
(20, 'ari', '54', '2022-12-31', 'SMP21', 'A', 'A', '1', 'ari21', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Ari Wardana', '1923876', '1998-04-28', 'SMPN 2 Samarinda', 'Rahmat', 'Misliana', '1', 'ariwardana28', '123456789', NULL, NULL, NULL, 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', '', NULL, NULL, NULL, NULL, NULL),
(22, 'ari28', '456', '2022-12-31', 'SMPN 2 Samarinda', 'Rahmat', 'Misliana', '1', 'ari28', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL),
(23, 'Emil Riza Putra', '1616716', '2021-12-31', 'SMP Negei 21 Padang', '85658589', 'Islam', '1', 'emil12', '123', NULL, NULL, NULL, 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', 'dfd.pdf', '4', 'Lari', '160', '60', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `stdcb`
--

CREATE TABLE `stdcb` (
  `id` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `idk` int(11) NOT NULL,
  `nil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdcb`
--

INSERT INTO `stdcb` (`id`, `idc`, `idk`, `nil`) VALUES
(1, 1, 1, 5),
(5, 1, 2, 4),
(6, 1, 5, 4),
(7, 1, 6, 4),
(8, 1, 7, 4),
(9, 1, 8, 4),
(10, 2, 1, 3),
(11, 2, 2, 5),
(12, 2, 5, 5),
(13, 2, 6, 2),
(14, 2, 7, 2),
(15, 2, 8, 1),
(16, 5, 1, 5),
(17, 5, 2, 4),
(18, 5, 5, 4),
(19, 5, 6, 4),
(20, 5, 7, 4),
(21, 5, 8, 4),
(22, 6, 1, 5),
(23, 6, 2, 5),
(24, 6, 5, 5),
(25, 6, 6, 4),
(26, 6, 7, 4),
(27, 6, 8, 4),
(28, 7, 1, 5),
(29, 7, 2, 4),
(30, 7, 5, 4),
(31, 7, 6, 4),
(32, 7, 7, 4),
(33, 7, 8, 4),
(34, 8, 1, 5),
(35, 8, 2, 4),
(36, 8, 5, 5),
(37, 8, 6, 4),
(38, 8, 7, 4),
(39, 8, 8, 4),
(40, 9, 1, 5),
(41, 9, 2, 5),
(42, 9, 5, 5),
(43, 9, 6, 5),
(44, 9, 7, 5),
(45, 9, 8, 5),
(46, 10, 1, 3),
(47, 10, 2, 5),
(48, 10, 5, 5),
(49, 10, 6, 2),
(50, 10, 7, 4),
(51, 10, 8, 4),
(52, 11, 1, 5),
(53, 11, 2, 4),
(54, 11, 5, 5),
(55, 11, 6, 5),
(56, 11, 7, 4),
(57, 11, 8, 4),
(58, 12, 1, 1),
(59, 12, 2, 3),
(60, 12, 5, 1),
(61, 12, 6, 2),
(62, 12, 7, 2),
(63, 12, 8, 5),
(64, 13, 1, 3),
(65, 13, 2, 4),
(66, 13, 5, 5),
(67, 13, 6, 3),
(68, 13, 7, 3),
(69, 13, 8, 3),
(70, 14, 1, 3),
(71, 14, 2, 3),
(72, 14, 5, 5),
(73, 14, 6, 2),
(74, 14, 7, 3),
(75, 14, 8, 4),
(76, 15, 1, 4),
(77, 15, 2, 5),
(78, 15, 5, 5),
(79, 15, 6, 5),
(80, 15, 7, 4),
(81, 15, 8, 4),
(82, 16, 1, 4),
(83, 16, 2, 5),
(84, 16, 5, 5),
(85, 16, 6, 5),
(86, 16, 7, 4),
(87, 16, 8, 4),
(88, 17, 1, 1),
(89, 17, 2, 5),
(90, 17, 5, 3),
(91, 17, 6, 4),
(92, 17, 7, 5),
(93, 17, 8, 2),
(94, 18, 1, 1),
(95, 18, 2, 3),
(96, 18, 5, 1),
(97, 18, 6, 3),
(98, 18, 7, 4),
(99, 18, 8, 5),
(100, 19, 1, 3),
(101, 19, 2, 5),
(102, 19, 5, 1),
(103, 19, 6, 5),
(104, 19, 7, 5),
(105, 19, 8, 2),
(106, 20, 1, 2),
(107, 20, 2, 5),
(108, 20, 5, 2),
(109, 20, 6, 3),
(110, 20, 7, 4),
(111, 20, 8, 2),
(112, 21, 1, 3),
(113, 21, 2, 4),
(114, 21, 5, 5),
(115, 21, 6, 3),
(116, 21, 7, 4),
(117, 21, 8, 1),
(118, 22, 1, 3),
(119, 22, 2, 4),
(120, 22, 5, 5),
(121, 22, 6, 3),
(122, 22, 7, 4),
(123, 22, 8, 2),
(124, 23, 1, 2),
(125, 23, 2, 5),
(126, 23, 5, 2),
(127, 23, 6, 3),
(128, 23, 7, 5),
(129, 23, 8, 2),
(130, 24, 1, 2),
(131, 24, 2, 5),
(132, 24, 5, 2),
(133, 24, 6, 4),
(134, 24, 7, 4),
(135, 24, 8, 2),
(136, 25, 1, 3),
(137, 25, 2, 5),
(138, 25, 5, 4),
(139, 25, 6, 3),
(140, 25, 7, 4),
(141, 25, 8, 2),
(142, 26, 1, 4),
(143, 26, 2, 5),
(144, 26, 5, 5),
(145, 26, 6, 5),
(146, 26, 7, 4),
(147, 26, 8, 2),
(148, 27, 1, 3),
(149, 27, 2, 4),
(150, 27, 5, 5),
(151, 27, 6, 2),
(152, 27, 7, 2),
(153, 27, 8, 1),
(154, 28, 1, 5),
(155, 28, 2, 2),
(156, 28, 5, 5),
(157, 28, 6, 1),
(158, 28, 7, 1),
(159, 28, 8, 3),
(160, 29, 1, 5),
(161, 29, 2, 5),
(162, 29, 5, 2),
(163, 29, 6, 4),
(164, 29, 7, 4),
(165, 29, 8, 4),
(166, 30, 1, 4),
(167, 30, 2, 5),
(168, 30, 5, 5),
(169, 30, 6, 5),
(170, 30, 7, 4),
(171, 30, 8, 4),
(172, 31, 1, 3),
(173, 31, 2, 5),
(174, 31, 5, 5),
(175, 31, 6, 3),
(176, 31, 7, 5),
(177, 31, 8, 4),
(178, 32, 1, 3),
(179, 32, 2, 4),
(180, 32, 5, 5),
(181, 32, 6, 3),
(182, 32, 7, 4),
(183, 32, 8, 5),
(184, 33, 1, 4),
(185, 33, 2, 5),
(186, 33, 5, 5),
(187, 33, 6, 5),
(188, 33, 7, 4),
(189, 33, 8, 2),
(190, 34, 1, 4),
(191, 34, 2, 4),
(192, 34, 5, 3),
(193, 34, 6, 4),
(194, 34, 7, 4),
(195, 34, 8, 4),
(196, 35, 1, 4),
(197, 35, 2, 5),
(198, 35, 5, 5),
(199, 35, 6, 5),
(200, 35, 7, 4),
(201, 35, 8, 4),
(202, 36, 1, 3),
(203, 36, 2, 5),
(204, 36, 5, 4),
(205, 36, 6, 4),
(206, 36, 7, 4),
(207, 36, 8, 5),
(208, 37, 1, 5),
(209, 37, 2, 4),
(210, 37, 5, 4),
(211, 37, 6, 4),
(212, 37, 7, 4),
(213, 37, 8, 4),
(214, 38, 1, 5),
(215, 38, 2, 4),
(216, 38, 5, 5),
(217, 38, 6, 5),
(218, 38, 7, 5),
(219, 38, 8, 4),
(220, 39, 1, 2),
(221, 39, 2, 5),
(222, 39, 5, 1),
(223, 39, 6, 4),
(224, 39, 7, 4),
(225, 39, 8, 5),
(226, 40, 1, 4),
(227, 40, 2, 5),
(228, 40, 5, 5),
(229, 40, 6, 5),
(230, 40, 7, 4),
(231, 40, 8, 4),
(232, 41, 1, 5),
(233, 41, 2, 5),
(234, 41, 5, 5),
(235, 41, 6, 5),
(236, 41, 7, 4),
(237, 41, 8, 5),
(238, 42, 1, 5),
(239, 42, 2, 3),
(240, 42, 5, 3),
(241, 42, 6, 3),
(242, 42, 7, 3),
(243, 42, 8, 3),
(244, 43, 1, 4),
(245, 43, 2, 3),
(246, 43, 5, 5),
(247, 43, 6, 4),
(248, 43, 7, 4),
(249, 43, 8, 4),
(250, 44, 1, 3),
(251, 44, 2, 4),
(252, 44, 5, 5),
(253, 44, 6, 2),
(254, 44, 7, 2),
(255, 44, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stdnl`
--

CREATE TABLE `stdnl` (
  `id` int(11) NOT NULL,
  `nm` varchar(50) NOT NULL,
  `sor` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdnl`
--

INSERT INTO `stdnl` (`id`, `nm`, `sor`) VALUES
(1, 'LTBT', 'i'),
(2, 'LBB', 'i'),
(5, 'LT', 'i'),
(6, 'LK', 'd'),
(7, 'Lari 40 Meter', 'd'),
(8, 'MFT', 'i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabor`
--
ALTER TABLE `cabor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pelatih`
--
ALTER TABLE `detail_pelatih`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelatih` (`id_pelatih`);

--
-- Indexes for table `kat`
--
ALTER TABLE `kat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kla`
--
ALTER TABLE `kla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nil`
--
ALTER TABLE `nil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `norma`
--
ALTER TABLE `norma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peni`
--
ALTER TABLE `peni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdcb`
--
ALTER TABLE `stdcb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdnl`
--
ALTER TABLE `stdnl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabor`
--
ALTER TABLE `cabor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `detail_pelatih`
--
ALTER TABLE `detail_pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kat`
--
ALTER TABLE `kat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kla`
--
ALTER TABLE `kla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nil`
--
ALTER TABLE `nil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1613;

--
-- AUTO_INCREMENT for table `norma`
--
ALTER TABLE `norma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peni`
--
ALTER TABLE `peni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stdcb`
--
ALTER TABLE `stdcb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `stdnl`
--
ALTER TABLE `stdnl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pelatih`
--
ALTER TABLE `detail_pelatih`
  ADD CONSTRAINT `FK__pelatih` FOREIGN KEY (`id_pelatih`) REFERENCES `pelatih` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
