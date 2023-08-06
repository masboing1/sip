-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2023 at 04:44 PM
-- Server version: 11.0.2-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_access`
--

CREATE TABLE `tb_access` (
  `level` varchar(100) NOT NULL,
  `menu_id` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_access`
--

INSERT INTO `tb_access` (`level`, `menu_id`, `created_at`, `updated_at`) VALUES
('administrator', '000100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '010000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '010100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '010200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '010300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '020000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '020100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '020200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '020300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '030000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '030100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '030200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '030300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040400', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040500', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '040600', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '050000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '050100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '050200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '050300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '000100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '020000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '020100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '020200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '020300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '030000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '030100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '030200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '030300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040400', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040500', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '040600', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '050000', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '050100', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '050200', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('manajer', '050300', '2023-07-10 07:14:06', '2023-07-10 07:14:06'),
('administrator', '010400', '2023-07-10 07:58:03', '2023-07-10 07:58:03'),
('manajer', '010400', '2023-07-10 07:58:03', '2023-07-10 07:58:03'),
('operasional', '000100', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040000', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040100', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040200', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040300', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040400', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040500', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '040600', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '050000', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '050100', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('operasional', '050200', '2023-07-13 04:41:17', '2023-07-13 04:41:17'),
('warehouse', '040100', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '040200', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '040300', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '040400', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '040500', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '040600', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '050100', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '050200', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('warehouse', '050300', '2023-07-13 05:44:48', '2023-07-13 05:44:48'),
('kasir', '040000', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('kasir', '040300', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('kasir', '040400', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('kasir', '040500', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('kasir', '050000', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('kasir', '050200', '2023-07-30 10:13:33', '2023-07-30 10:13:33'),
('administrator', '050400', '2023-07-30 10:18:25', '2023-07-30 10:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` varchar(20) NOT NULL,
  `instansi_id` varchar(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori_id` varchar(3) NOT NULL,
  `satuan_id` varchar(3) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `hp` double NOT NULL,
  `hj` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `instansi_id`, `name`, `deskripsi`, `kategori_id`, `satuan_id`, `jumlah`, `hp`, `hj`) VALUES
('A002001001', 'A002', 'Gold Jelly', 'Gold Jelly', '001', '001', 5, 75000, 95000),
('A002001002', 'A002', 'Sabun Kedas', 'Sabun Kedas', '001', '001', 11, 34000, 47000),
('A002001003', 'A002', 'Body Scrub', 'Body Scrub', '001', '001', 1, 72000, 90000),
('A002001004', 'A002', 'Body Serum', 'Body Serum', '001', '001', 1, 82000, 100000),
('A002001005', 'A002', 'Buble Mask', 'Buble Mask', '001', '001', 1, 0, 35000),
('A002002001', 'A002', 'Sasak Helbal 100ml', 'Sasak Helbal 100ml', '002', '001', 5, 160000, 200000),
('A002002002', 'A002', 'Sasak Herbal 60ml', '', '002', '001', 10, 120000, 150000),
('A002002003', 'A002', 'Sasak Herbal 20ml', '', '002', '001', 10, 70000, 100000),
('A002002004', 'A002', 'Sasak Junior 100ml', '', '002', '001', 5, 120000, 170000),
('A002002005', 'A002', 'Sasak Junior 60ml', '', '002', '001', 10, 95000, 130000),
('A002002006', 'A002', 'Sasak Junior 10ml', '', '002', '001', 10, 20000, 48000),
('A002002007', 'A002', 'Sasak Junior 8ml', '', '002', '001', 10, 20000, 45000),
('B001003001', 'B001', 'LENOVO, C560 Type 10150', 'Intel Core i5 Gen 4, 4GB DDR3, 1TB HDD', '003', '001', 0, 1, 1),
('B001003002', 'B001', 'LENOVO, H30-50 Type 90B9', 'Intel Core i3 Gen 4, 8GB DDR3, 500GB HDD', '003', '001', 2, 1, 1),
('B001003003', 'B001', 'LENOVO, S500 Type 10HV', 'Pentium G3260, 2GB DDR3, 500GB HDD', '003', '001', 1, 1, 1),
('B001003004', 'B001', 'LENOVO, H410E Type 10085', 'Pentium, 2GB, 500GB HDD', '003', '001', 1, 1, 1),
('B001003005', 'B001', 'LENOVO, H530S', 'Intel Core i3 Gen 4, 4GB DDR3, 500GB HDD', '003', '001', 1, 1, 1),
('B001003006', 'B001', 'DELL, OPTIPLEX 7010', 'DELL, OPTIPLEX 7010', '003', '001', 5, 1, 1),
('B001004001', 'B001', 'LENOVO, K2450 Type 3623', 'Intel Core i3 Gen 4, 4GB DDR3, 500GB HDD', '004', '001', 1, 1, 1),
('B001004002', 'B001', 'LENOVO, Z40-70', 'Intel Core i3 Gen 5, 4GB DDR3, 500GB HDD', '004', '001', 1, 1, 1),
('B001004003', 'B001', 'LENOVO, G40-70', 'Intel Core i3 Gen 4, 2GB DDR3, 500GB HDD', '004', '001', 1, 1, 1),
('B001004004', 'B001', 'LENOVO, B40-80', 'Intel Core i3 Gen 5, 4GB DDR3, 500GB HDD', '004', '001', 1, 1, 1),
('B001004005', 'B001', 'LENOVO, B490', 'Intel Core i3 Gen 3, 2GB DDR3, 500GB', '004', '001', 1, 1, 1),
('B001004006', 'B001', 'ASUS, A416E', 'Intel Core i3 Gen 11, 4GB DDR4, 500GB SSD', '004', '001', 1, 1, 1),
('B001004007', 'B001', 'ASUS, A516JA', 'Intel Core i3 Gen 10, 4GB DDR4, 1TB HDD, 256GB SSD', '004', '001', 1, 1, 1),
('B001005001', 'B001', 'Ubiquiti, AC Pro, 300 Mbps', 'Ubiquiti, AC Pro, 300 Mbps', '005', '001', 2, 1, 1),
('B001005002', 'B001', 'Ubiquiti, Nanostation Loco M5', 'Ubiquiti, Nanostation Loco M5', '005', '001', 6, 1, 1),
('B001005003', 'B001', 'Ubiquiti, Airgrid m5hp', 'Ubiquiti, Airgrid m5hp', '005', '001', 2, 1, 1),
('B001005004', 'B001', 'Ubiquiti, Litle Beam M5', 'Ubiquiti, Litle Beam M5', '005', '001', 1, 1, 1),
('B001005005', 'B001', 'TP-LINK, CPE510', '5 GHz, 300 Mbps, 13 dBi', '005', '001', 2, 1, 1),
('B001005006', 'B001', 'TP-LINK, CPE210', '2.4 GHz, 300 Mbps, 9 dBi', '005', '001', 2, 1, 1),
('B001005007', 'B001', 'TP-LINK, TL-WR741N', '150 Mbps', '005', '001', 2, 1, 1),
('B001005008', 'B001', 'TOTOLINK, N300RT, 300 Mbps', 'TOTOLINK, N300RT, 300 Mbps', '005', '001', 1, 1, 1),
('B001005009', 'B001', 'TPLINK TL-WA5210G', 'Access Point Outdoor 2.4 GHz', '005', '001', 1, 1, 1),
('B001006001', 'B001', 'D-LINK, DWA-123, 150 Mbps', 'D-LINK, DWA-123, 150 Mbps', '006', '001', 1, 1, 1),
('B001006002', 'B001', 'D-LINK, DWA-132, 300 Mbps', 'D-LINK, DWA-132, 300 Mbps', '006', '001', 1, 1, 1),
('B001006003', 'B001', 'TP-LINK, TL-WN722N, 150 Mbps', 'TP-LINK, TL-WN722N, 150 Mbps', '006', '001', 1, 1, 1),
('B001006004', 'B001', 'TP-LINK, TL-WN725N, 150 Mbps', 'TP-LINK, TL-WN725N, 150 Mbps', '006', '001', 1, 1, 1),
('B001006006', 'B001', 'Cable Console LAN to RS232', 'Cable Console LAN to RS232', '006', '001', 2, 1, 1),
('B001006007', 'B001', 'TPLINK Gigabit PCI Express Network Adapter', 'TPLINK Gigabit PCI Express Network Adapter', '006', '001', 1, 1, 1),
('B001006008', 'B001', 'Panduit Konektor RJ45', 'Panduit Konektor RJ45', '006', '001', 31, 1, 1),
('B001006009', 'B001', 'Cable UTP, Panduit Cat6, 305m/roll', 'Cable UTP, Panduit Cat6, 305m/roll', '006', '004', 305, 1, 1),
('B001006010', 'B001', 'NETLINE PCI Express 2S 1P', '2 Serial Port dan 1 Pararel Port', '006', '001', 2, 1, 1),
('B001006011', 'B001', 'NETLINE PCI Express 1P', '1 Pararel Port', '006', '001', 2, 1, 1),
('B001006012', 'B001', 'Sandisk Flasdisk 64GB', '64GB', '006', '001', 1, 1, 1),
('B001007001', 'B001', 'LENOVO, ThinkVision E1922S', 'Wide 18.5 Inch, 16:9, 1368x788, VGA', '007', '001', 1, 1, 1),
('B001007002', 'B001', 'LENOVO, LI1931e Type 65A1-AB1', 'Wide 18.5 Inch, 16:9, 1366x768, VGA', '007', '001', 1, 1, 1),
('B001008001', 'B001', 'HIKVISION, DS-7732NI-E4', '32 Channel, 1080p, HDMI, VGA', '008', '001', 1, 1, 1),
('B001009001', 'B001', 'HIKVISION, DS-2CD2121F-I', '2MP, Indoor', '009', '001', 1, 1, 1),
('B001009002', 'B001', 'HIKVISION, DS-2CD2942F-I', '2MP, 360 derajat, Indoor', '009', '001', 1, 1, 1),
('B001009003', 'B001', 'HIKVISION, DS-2CD2020F-I', '2MP, Outdoor', '009', '001', 1, 1, 1),
('B001009004', 'B001', 'HIKVISION, DC-2CD2021G-I', '8MP, 4K, Outdoor, IP67', '009', '001', 10, 1, 1),
('B001009005', 'B001', 'EZVIZ, C3WN', '2MP, Outdoor, Wifi', '009', '001', 1, 1, 1),
('B001011001', 'B001', 'Mikrotik, RB 2011 UAS', 'Mikrotik, RB 2011 UAS (mipsbe)', '011', '001', 1, 1, 1),
('B001011002', 'B001', 'Mikrotik, RB 750 R2 hEX Lite', 'Mikrotik, RB 750 R2 hEX Lite', '011', '001', 1, 1, 1),
('B001011003', 'B001', 'Router Cisco C800', 'Router Cisco C800', '011', '001', 1, 1, 1),
('B001012001', 'B001', 'TP-LINK, TL-SF1024', 'TP-LINK, TL-SF1024', '012', '001', 2, 1, 1),
('B001012002', 'B001', 'TP-LINK, TL-SG1024D', 'TP-LINK, TL-SG1024D', '012', '001', 1, 1, 1),
('B001012003', 'B001', 'TENDA, S105, 5 Port', 'TENDA, S105, 5 Port', '012', '001', 0, 1, 1),
('B001012004', 'B001', 'TP-LINK, TL-SF1005D', 'TP-LINK, TL-SF1005D', '012', '001', 1, 1, 1),
('B001012005', 'B001', 'TP-LINK, TL-SF1008D', 'Switch Ethernet 8 Port 100Mbps', '012', '001', 1, 1, 1),
('B001012006', 'B001', 'Cisco C2960 24TC-S', 'Cisco C2960 24TC-S', '012', '001', 1, 1, 1),
('B001013001', 'B001', 'Box Dexta, 8.5×8.5×4.5cm, Plastic, Black', '8.5×8.5×4.5cm, Plastic, Black', '013', '001', 13, 1, 1),
('B001014001', 'B001', 'Extrana, NYM, 2C×2.5mm', '2C×2.5mm², Cu/PVC/PVC, White', '014', '004', 50, 1, 1),
('B001015001', 'B001', 'Connector RJ45 Panduit MP588-C ', 'UTP-Mod Cat5e, 8pos, 8wire, 4Pair, 100pc/Pack, Panduit MP588-C', '015', '001', 50, 1, 1),
('B001015002', 'B001', 'Konektor DC male socket jack', 'Konektor DC male socket jack', '015', '001', 13, 1, 1),
('B001015003', 'B001', 'Konektor DC female socket jack', 'Konektor DC female socket jack', '015', '001', 4, 1, 1),
('B001016001', 'B001', 'Power Supply 12V 10A', 'Power Supply 12V 10A', '016', '001', 3, 1, 1),
('B001017001', 'B001', 'Uticon, ST-158', '16A, 250VAC, 5 Outlet', '017', '001', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_operasional`
--

CREATE TABLE `tb_operasional` (
  `id` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_operasional_id` varchar(20) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_operasional`
--

INSERT INTO `tb_operasional` (`id`, `tanggal`, `jenis_operasional_id`, `detail`, `biaya`) VALUES
('A002K001000001', '2021-10-25', 'K005', 'Ongkir sabun', 6000),
('A002K001000002', '2021-10-27', 'K005', 'Ongkir', 6000),
('A002K001000003', '2021-11-15', 'K005', 'Ongkir Sabun 16 ps', 6000),
('B001D202308-001', '2023-08-03', 'D001', 'Kas awal agustus 2023', 1000000),
('B001D202308-002', '2023-08-03', 'D002', 'tambahan kas pertama', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` varchar(12) NOT NULL,
  `instansi_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `instansi_id`, `name`, `address`, `phone`) VALUES
('2003002023', 'B001', 'Dodon Mussefa', 'Finance Departement', '+62 821-4311-8044'),
('2201118', 'B001', 'Ikuo Wahyudi', 'Logistic and Distribution Departement', '+62 851-0026-8829'),
('2201120', 'B001', 'Bahtiar Trah Utomo', 'Logistic and Distribution Departement', '+62 821-4138-1071'),
('2201122', 'B001', 'Sunarko Hadi', 'Logistic and Distribution Departement', '+62 813-3435-3345'),
('2201125', 'B001', 'Aswin Bagus Prasetyo', 'Logistic and Distribution Departement', '+62 821-4070-1993'),
('2201260', 'B001', 'Zulhan Idrus', 'Sales Departement', '+62 812-3830-7439'),
('2201261', 'B001', 'M. Mamun Ghufran', 'Sales Departement', '+62 823-3550-0930'),
('2201265', 'B001', 'Dirta Wahyu Kurniawan', 'Sales Departement', '+62 823-3548-5817'),
('2201270', 'B001', 'Wardhana Reswari Arya Wp ', 'Accounting Departement', '+62 888-0342-7365'),
('2201272', 'B001', 'Abdul Aziz', 'Quality Assurance & Quality Control Departement', '+62 852-5589-8958'),
('2201273', 'B001', 'Lufti Noerdars', 'Maintenance Departement', '+62 852-4223-8225'),
('2201274', 'B001', 'Tatok Wahyudianto', 'Electrical Departement', '+62 856-4994-2355'),
('2201276', 'B001', 'Tatok Klifianto', 'Warehouse Departement', '+62 813-5774-3524'),
('2201277', 'B001', 'Bahtiar Alfahrosi', 'HRGA Departement', '+62 812-4907-9050'),
('2201279', 'B001', 'Ahmad Ghozali', 'IT Support Departement', '+62 852-5851-1260'),
('2201280', 'B001', 'Saligau Punagi ', 'Production Dept. Head', '+62 852-4804-1495'),
('2201294', 'B001', 'Ulung Akbar', 'Maintenance Departement', '+62 812-1747-7863'),
('2201307', 'B001', 'Nurgiyanto', 'Production Departement', '+62 823-3043-5541'),
('2201309', 'B001', 'Andhika Deny Ismawan', 'Quality Assurance and Quality Control Departement', '+62 813-3570-0830'),
('2201314', 'B001', 'Saiful Hadi Prasettiyo', 'Maintenance Departement', '+62 821-7202-4952'),
('2201319', 'B001', 'Ardi Bayu Permana ', 'Production Departement', '+62 823-3178-2499'),
('2201340', 'B001', 'Eka Mentari Dana Kusumaningrum ', 'HRGA Departement', '+62 811-3774-090'),
('A001P000001', 'A001', 'Ahmad Ghozali', 'Jl. Gatot Subrot KM 05 Bulusan Kalipuro Banyuwangi', '085258511260'),
('A001P000002', 'A001', 'Abdul Aziz', 'Makassar', '-'),
('A001P000003', 'A001', 'Tatok Wahyudiyanto', 'Banyuwangi', '-'),
('A002P000001', 'A002', 'Adi', 'Banyuwangi', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `faktur` varchar(20) NOT NULL,
  `instansi_id` varchar(4) NOT NULL,
  `tanggal` date NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `operator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`faktur`, `instansi_id`, `tanggal`, `suplier_name`, `operator`) VALUES
('A00220230729-001', 'A002', '2023-07-29', 'Kedas Beauty Pusat', 'desy.pradina'),
('B00120230804-001', 'B001', '2023-08-04', 'WAREHOUSE', 'itsd');

--
-- Triggers `tb_pembelian`
--
DELIMITER $$
CREATE TRIGGER `hapus_pembelian_detail` AFTER DELETE ON `tb_pembelian` FOR EACH ROW DELETE from tb_pembelian_detail where pembelian_faktur = old.faktur
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `pembelian_faktur` varchar(20) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `hp` double NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`pembelian_faktur`, `barang_id`, `name`, `satuan`, `hp`, `jumlah`) VALUES
('A00220230729-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 4),
('A00220230729-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 2),
('B00120230804-001', 'B001003002', 'LENOVO, H30-50 Type 90B9', 'pcs', 1, 1);

--
-- Triggers `tb_pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `beli_kurangi_stock` AFTER DELETE ON `tb_pembelian_detail` FOR EACH ROW UPDATE tb_barang SET jumlah = jumlah - old.jumlah where id = old.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `beli_tambah_stock` AFTER INSERT ON `tb_pembelian_detail` FOR EACH ROW UPDATE tb_barang
 SET jumlah = jumlah + NEW.jumlah
 WHERE
 id = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `faktur` varchar(20) NOT NULL,
  `instansi_id` varchar(4) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan_name` varchar(100) NOT NULL,
  `total` double NOT NULL,
  `bayar` double NOT NULL,
  `operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`faktur`, `instansi_id`, `tanggal`, `pelanggan_name`, `total`, `bayar`, `operator`) VALUES
('20210808-001', 'A002', '2021-08-08', '-', 190000, 190000, 'admin'),
('20210808-002', 'A002', '2021-08-08', 'Bu Sri', 130000, 130000, 'admin'),
('20210809-001', 'A002', '2021-08-09', '-', 90000, 90000, 'admin'),
('20210811-001', 'A002', '2021-08-11', '-', 90000, 90000, 'admin'),
('20210813-001', 'A002', '2021-08-13', 'De Kham', 324000, 324000, 'admin'),
('20210816-001', 'A002', '2021-08-16', '-', 40000, 40000, 'admin'),
('20210817-001', 'A002', '2021-08-17', '-', 130000, 130000, 'admin'),
('20210818-001', 'A002', '2021-08-18', '-', 130000, 130000, 'admin'),
('20210819-001', 'A002', '2021-08-19', 'Ina', 185000, 185000, 'admin'),
('20210820-001', 'A002', '2021-08-20', '-', 47000, 47000, 'admin'),
('20210822-001', 'A002', '2021-08-22', '-', 90000, 90000, 'admin'),
('20210822-002', 'A002', '2021-08-22', '-', 90000, 90000, 'admin'),
('20210823-001', 'A002', '2021-08-23', '-', 45000, 45000, 'admin'),
('20210824-001', 'A002', '2021-08-24', '-', 100000, 100000, 'admin'),
('20210827-001', 'A002', '2021-08-27', 'Bu Sri', 90000, 90000, 'admin'),
('20210827-002', 'A002', '2021-08-27', 'Mbak Fitri', 407000, 407000, 'admin'),
('20210827-003', 'A002', '2021-08-27', 'Nyoya', 80000, 80000, 'admin'),
('20210902-001', 'A002', '2021-09-02', 'Rudianto', 149000, 149000, 'admin'),
('20210903-001', 'A002', '2021-09-03', 'Faizah', 45000, 45000, 'admin'),
('20210904-001', 'A002', '2021-09-04', 'Nurul-Dropsip', 207000, 207000, 'admin'),
('20210905-001', 'A002', '2021-09-05', 'Shopee', 45000, 45000, 'admin'),
('20210908-001', 'A002', '2021-09-08', 'Marina', 45000, 45000, 'admin'),
('20210909-001', 'A002', '2021-09-09', 'Bu Sri', 130000, 130000, 'admin'),
('20210909-002', 'A002', '2021-09-09', 'Shela', 278000, 278000, 'admin'),
('20210909-003', 'A002', '2021-09-09', 'Indah', 88000, 88000, 'admin'),
('20210911-001', 'A002', '2021-09-11', 'Tika', 90000, 90000, 'admin'),
('20210912-001', 'A002', '2021-09-12', 'Ny', 80000, 80000, 'admin'),
('20210913-001', 'A002', '2021-09-13', 'Rahmanda-Shopee', 168000, 168000, 'admin'),
('20210913-002', 'A002', '2021-09-13', 'Mahya', 90000, 90000, 'admin'),
('20210914-001', 'A002', '2021-09-14', 'Faizah-Shopee', 127000, 127000, 'admin'),
('20210914-002', 'A002', '2021-09-14', 'Bunda Okta', 174000, 174000, 'admin'),
('20210916-001', 'A002', '2021-09-16', 'Ny', 34000, 34000, 'admin'),
('20210920-001', 'A002', '2021-09-20', 'Nur Hasanah', 317400, 317400, 'admin'),
('20210920-002', 'A002', '2021-09-20', 'Indah', 132000, 132000, 'admin'),
('20210922-001', 'A002', '2021-09-22', 'Heni', 138000, 138000, 'admin'),
('20210927-001', 'A002', '2021-09-27', 'Bu Sri', 90000, 90000, 'admin'),
('20210927-002', 'A002', '2021-09-27', 'Ayu-Shopee', 84000, 84000, 'admin'),
('20210929-001', 'A002', '2021-09-29', 'Mariana', 86400, 86400, 'superadmin'),
('20211001-002', 'A002', '2021-10-01', 'Fitri-Perum', 132000, 132000, 'superadmin'),
('20211001-003', 'A002', '2021-10-01', 'Sindi-Shopee', 86000, 86000, 'superadmin'),
('20211004-001', 'A002', '2021-10-04', 'Bu Sri', 125000, 125000, 'superadmin'),
('20211007-001', 'A002', '2021-10-07', 'Mahya', 90000, 90000, 'superadmin'),
('20211007-002', 'A002', '2021-10-07', 'Ny', 80000, 80000, 'superadmin'),
('20211010-001', 'A002', '2021-10-10', 'Devi-Shopee', 84000, 84000, 'superadmin'),
('20211010-002', 'A002', '2021-10-10', 'Amanatul-Shopee', 127000, 127000, 'superadmin'),
('20211010-003', 'A002', '2021-10-10', 'NikenNur-Shopee', 127000, 127000, 'superadmin'),
('20211012-001', 'A002', '2021-10-11', 'Ardhani-Shopee', 84000, 84000, 'superadmin'),
('20211012-002', 'A002', '2021-10-11', 'Putri-Shopee', 127000, 127000, 'superadmin'),
('20211012-003', 'A002', '2021-10-12', 'Devi', 47000, 47000, 'superadmin'),
('20211016-001', 'A002', '2021-10-16', 'Heni', 180000, 180000, 'superadmin'),
('20211018-001', 'A002', '2021-10-18', 'Sulis', 47000, 47000, 'superadmin'),
('20211021-001', 'A002', '2021-10-21', 'Shela', 505000, 505000, 'superadmin'),
('20211022-001', 'A002', '2021-10-22', 'Siti-Shopee', 84600, 84600, 'superadmin'),
('20211023-001', 'A002', '2021-10-23', 'Bunda Okta', 135000, 135000, 'superadmin'),
('20211023-002', 'A002', '2021-10-23', 'Nur Hasanah', 235000, 235000, 'superadmin'),
('20211023-003', 'A002', '2021-10-23', 'Bu Atik', 47000, 47000, 'superadmin'),
('20211023-004', 'A002', '2021-10-23', 'Ibu', 121000, 121000, 'superadmin'),
('20211025-001', 'A002', '2021-10-25', 'Angel', 284000, 284000, 'superadmin'),
('20211026-001', 'A002', '2021-10-26', 'Mariana', 134500, 134500, 'superadmin'),
('20211026-002', 'A002', '2021-10-26', 'Ny', 40000, 40000, 'superadmin'),
('20211027-001', 'A002', '2021-10-27', 'Rusdiana-Shopee', 127500, 127500, 'superadmin'),
('20211027-002', 'A002', '2021-10-27', 'Adinda-Shopee', 83800, 83800, 'superadmin'),
('20211028-001', 'A002', '2021-10-28', 'Nita', 128900, 128900, 'superadmin'),
('20211029-001', 'A002', '2021-10-29', 'Dewi', 411000, 411000, 'admin'),
('20211029-002', 'A002', '2021-10-29', 'Rida-Shopee', 128900, 128900, 'superadmin'),
('20211030-001', 'A002', '2021-10-30', 'Mufti', 267000, 267000, 'superadmin'),
('20211030-002', 'A002', '2021-10-30', 'Mbak Fitri', 137000, 137000, 'superadmin'),
('20211031-001', 'A002', '2021-10-31', 'Eka', 47000, 47000, 'superadmin'),
('20211031-002', 'A002', '2021-10-31', 'Ida', 137000, 137000, 'superadmin'),
('20211102-001', 'A002', '2021-11-02', 'Nita-Shopee', 33000, 33000, 'superadmin'),
('20211102-002', 'A002', '2021-11-02', 'Septi MAN', 90000, 90000, 'superadmin'),
('20211102-003', 'A002', '2021-11-02', 'Mahya', 90000, 90000, 'superadmin'),
('20211103-001', 'A002', '2021-11-03', 'Ny', 80000, 80000, 'superadmin'),
('20211104-001', 'A002', '2021-11-04', 'Mufti', 25000, 25000, 'superadmin'),
('20211105-001', 'A002', '2021-11-05', 'Fitri-Perum', 132000, 132000, 'superadmin'),
('20211110-001', 'A002', '2021-11-10', 'Septi MAN', 97000, 97000, 'superadmin'),
('20211111-001', 'A002', '2021-11-11', 'Bu Sri', 130000, 130000, 'superadmin'),
('20211111-002', 'A002', '2021-11-11', 'Maya-Shopee', 45000, 45000, 'superadmin'),
('20211112-001', 'A002', '2021-11-12', 'Yuliapus', 144000, 144000, 'superadmin'),
('20211115-001', 'A002', '2021-11-15', 'Mbak Emi', 47000, 47000, 'superadmin'),
('20211115-002', 'A002', '2021-11-15', 'Tika', 47000, 47000, 'superadmin'),
('20211118-001', 'A002', '2021-11-18', 'Mbak Emi', 95000, 95000, 'superadmin'),
('20211118-002', 'A002', '2021-11-18', 'Angel', 95000, 95000, 'superadmin'),
('20211119-001', 'A002', '2021-11-19', 'Bunda Okta', 190000, 190000, 'superadmin'),
('20211120-001', 'A002', '2021-11-20', 'Mufti', 137000, 137000, 'superadmin'),
('20211121-001', 'A002', '2021-11-21', 'Nur Hasanah', 189000, 189000, 'superadmin'),
('20211122-001', 'A002', '2021-11-22', 'Yuliapus', 95000, 95000, 'superadmin'),
('20211126-001', 'A002', '2021-11-26', 'Mariana', 142000, 142000, 'superadmin'),
('20211127-001', 'A002', '2021-11-27', 'Mahya', 95000, 95000, 'superadmin'),
('20211129-001', 'A002', '2021-11-29', 'Bunda Okta', 94000, 94000, 'superadmin'),
('20211129-002', 'A002', '2021-11-29', 'Amanatul-Shopee', 91200, 91200, 'superadmin'),
('20211130-001', 'A002', '2021-11-30', 'Lia-Kertosari', 327000, 327000, 'superadmin'),
('20211130-002', 'A002', '2021-11-30', 'Bu Atik', 140000, 140000, 'superadmin'),
('20211130-003', 'A002', '2021-11-30', 'Ny', 0, 0, 'superadmin'),
('A00220230729-001', 'A002', '2023-07-29', 'Pelanggan umum', 142000, 150000, 'desy.pradi'),
('A00220230729-002', 'A002', '2023-07-29', 'Pelanggan umum', 130000, 130000, 'desy.pradi'),
('A00220230729-003', 'A002', '2023-07-29', 'Pelanggan umum', 90000, 100000, 'desy.pradi'),
('A00220230729-004', 'A002', '2023-07-29', 'Pelanggan umum', 90000, 100000, 'desy.pradi'),
('A00220230729-005', 'A002', '2023-07-29', 'Pelanggan umum', 45000, 50000, 'desy.pradi'),
('A00220230729-006', 'A002', '2023-07-29', 'Pelanggan umum', 45000, 50000, 'desy.pradi'),
('A00220230729-007', 'A002', '2023-07-29', 'Pelanggan umum', 140000, 150000, 'desy.pradi'),
('B00120230804-001', 'B001', '2023-08-04', 'Ahmad Ghozali', 1, 1, 'itsd'),
('B00120230806-001', 'B001', '2023-08-06', 'Ahmad Ghozali', 1, 1, 'itsd');

--
-- Triggers `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `hapus_penjualan_detail` AFTER DELETE ON `tb_penjualan` FOR EACH ROW DELETE from tb_penjualan_detail where penjualan_faktur = old.faktur
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `penjualan_faktur` varchar(20) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `hp` double NOT NULL,
  `hj` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  `potongan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`penjualan_faktur`, `barang_id`, `name`, `satuan`, `hp`, `hj`, `jumlah`, `potongan`) VALUES
('20210808-001', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 0),
('20210808-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 0),
('20210808-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 3500),
('20210808-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 3500),
('20210809-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210813-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210813-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 3, 7000),
('20210813-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 0),
('20210816-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 7000),
('20210817-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 3500),
('20210817-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 3500),
('20210818-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 3500),
('20210818-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 3500),
('20210811-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210819-001', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 0),
('20210819-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 5000),
('20210820-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20210822-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210822-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210823-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20210824-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 0),
('20210827-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210827-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 0),
('20210827-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20210827-002', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 5000),
('20210827-002', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 5000),
('20210827-003', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20210902-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 93500, 1, 0),
('20210902-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 55500, 1, 0),
('20210903-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20210904-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 20000),
('20210904-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20210905-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20210908-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20210909-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 3500),
('20210909-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 3500),
('20210909-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210909-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 4, 0),
('20210909-003', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 2000),
('20210911-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 2, 4000),
('20210912-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20210913-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 12000),
('20210913-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210914-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20210914-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 5000),
('20210914-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 6000),
('20210916-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 13000),
('20210920-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 0),
('20210920-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20210920-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 9600),
('20210920-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20210920-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20210922-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210922-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 48000, 1, 0),
('20210927-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20210927-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 6000),
('20210929-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 3600),
('20211001-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211001-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 5000),
('20211001-003', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 4000),
('20211004-001', 'A002001005', 'Buble Mask', 'pcs', 0, 35000, 1, 0),
('20211004-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211007-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211007-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20211010-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 6000),
('20211010-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 5000),
('20211010-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20211010-003', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20211010-003', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 5000),
('20211012-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 6000),
('20211012-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20211012-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 5000),
('20211012-003', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211016-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 0),
('20211017-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20211017-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 6000),
('20211018-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211021-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 5, 0),
('20211021-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 3, 0),
('20211022-001', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 5400),
('20211023-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211023-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 2000),
('20211023-002', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 0),
('20211023-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 3, 6000),
('20211023-003', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211023-004', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20211023-004', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 6000),
('20211025-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211025-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 2, 0),
('20211025-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 0),
('20211026-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211026-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2500),
('20211027-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 7000),
('20211027-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 2500),
('20211026-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 7000),
('20211027-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 6200),
('20211028-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 8100),
('20211028-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211029-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 3, 0),
('20211029-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 3, 0),
('20211029-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211029-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 8100),
('20211030-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 2, 6000),
('20211030-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 2, 1000),
('20211030-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211030-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211031-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211031-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211031-002', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211102-001', 'A002001005', 'Buble Mask', 'pcs', 0, 35000, 1, 2000),
('20211102-002', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 0),
('20211102-003', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211104-001', 'A002001005', 'Buble Mask', 'pcs', 0, 35000, 1, 10000),
('20211103-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 10000),
('20211105-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 5000),
('20211105-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211110-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 3000),
('20211111-001', 'A002001001', 'Gold Jelly', 'pcs', 72000, 90000, 1, 0),
('20211111-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 7000),
('20211115-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211115-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211111-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20211112-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211112-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 3000),
('20211118-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211118-002', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211119-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 2, 0),
('20211120-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 5000),
('20211120-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211121-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 2, 1000),
('20211122-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211126-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211126-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211127-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211129-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 2, 0),
('20211129-002', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 3800),
('20211130-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211130-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('20211130-001', 'A002001003', 'Body Scrub', 'pcs', 72000, 90000, 1, 0),
('20211130-001', 'A002001004', 'Body Serum', 'pcs', 82000, 100000, 1, 5000),
('20211130-002', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('20211130-002', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('20211130-003', 'A002001005', 'Buble Mask', 'pcs', 0, 35000, 1, 35000),
('A00220230729-001', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('A00220230729-001', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 0),
('A00220230729-002', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('A00220230729-002', 'A002001005', 'Buble Mask', 'pcs', 0, 35000, 1, 0),
('A00220230729-003', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 5000),
('A00220230729-004', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 5000),
('A00220230729-005', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('A00220230729-006', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('A00220230729-007', 'A002001001', 'Gold Jelly', 'pcs', 75000, 95000, 1, 0),
('A00220230729-007', 'A002001002', 'Sabun Kedas', 'pcs', 34000, 47000, 1, 2000),
('B00120230804-001', 'B001003001', 'LENOVO, C560 Type 10150', 'pcs', 1, 1, 1, 0),
('B00120230806-001', 'B001006012', 'Sandisk Flasdisk 64GB', 'pcs', 1, 1, 1, 0);

--
-- Triggers `tb_penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `jual_kurangi_stock` AFTER INSERT ON `tb_penjualan_detail` FOR EACH ROW UPDATE tb_barang
 SET jumlah = jumlah - NEW.jumlah
 WHERE
 id = NEW.barang_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jual_tambah_stock` AFTER DELETE ON `tb_penjualan_detail` FOR EACH ROW update tb_barang set jumlah = jumlah + old.jumlah WHERE id = old.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_retur_penjualan`
--

CREATE TABLE `tb_retur_penjualan` (
  `id` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `penjualan_faktur` varchar(20) NOT NULL,
  `operator` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_retur_penjualan_detail`
--

CREATE TABLE `tb_retur_penjualan_detail` (
  `retur_id` int(20) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `hp` double DEFAULT NULL,
  `hj` double DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `keterangan` varchar(20) NOT NULL,
  `aksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_retur_penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `retur_tambah_stok` AFTER INSERT ON `tb_retur_penjualan_detail` FOR EACH ROW UPDATE tb_barang SET jumlah = jumlah + NEW.jumlah WHERE id = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id` varchar(12) NOT NULL,
  `instansi_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suplier`
--

INSERT INTO `tb_suplier` (`id`, `instansi_id`, `name`, `address`, `phone`) VALUES
('A001S000001', 'A001', 'Tatok Klifianto', 'Warehouse', '+62 813-5774-3524'),
('A002S000001', 'A002', 'Kedas Beauty Pusat', 'Jakarta', '0'),
('A002S000002', 'A002', 'Tiktok Shop', 'Tiktok Shop', '0'),
('B001S000001', 'B001', 'WAREHOUSE', 'WAREHOUSE DEPARTEMENT', '+62 813-5774-3524');

-- --------------------------------------------------------

--
-- Table structure for table `tm_instansi`
--

CREATE TABLE `tm_instansi` (
  `id` varchar(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_instansi`
--

INSERT INTO `tm_instansi` (`id`, `name`, `address`, `phone`) VALUES
('A001', 'IT SOLUTION', 'PERUM CEMARA REGENCY BLOK A.5 KEL. KEBALENAN KEC. BANYUWANGI KAB. BANYUWANGI', '085258511260'),
('A002', 'GRIYA BUNDA DESY', 'PERUM CEMARA REGENCY BLOK A5, KEL. KEBALENAN     KEC. BANYUWANGI KAB. BANYUWANGI', '089682527727'),
('B001', 'ITSD', 'JL. GATOT SUBROTO KM. 05 KEL. BULUSAN KEC. KALIPURO KAB. BANYUWANGI 68455', '085258511260');

-- --------------------------------------------------------

--
-- Table structure for table `tm_jenis_operasional`
--

CREATE TABLE `tm_jenis_operasional` (
  `id` varchar(4) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `uraian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_jenis_operasional`
--

INSERT INTO `tm_jenis_operasional` (`id`, `jenis`, `uraian`) VALUES
('D001', 'pemasukan', 'Kas Awal'),
('D002', 'pemasukan', 'Tambahan Kas'),
('D003', 'pemasukan', 'Pemasukan Lain'),
('K001', 'pengeluaran', 'Beban Operasional'),
('K002', 'pengeluaran', 'Beban Pengiriman'),
('K003', 'pengeluaran', 'Beban Paket Internet'),
('K004', 'pengeluaran', 'Beban Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kategori`
--

CREATE TABLE `tm_kategori` (
  `id` varchar(3) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_kategori`
--

INSERT INTO `tm_kategori` (`id`, `kategori`) VALUES
('001', 'Kosmetik'),
('002', 'Minyak Herbal'),
('003', 'Computer Desktop'),
('004', 'Computer Laptop'),
('005', 'Access Point'),
('006', 'Computer Accessoris'),
('007', 'Monitor'),
('008', 'Video Recording'),
('009', 'CCTV'),
('010', 'Printer'),
('011', 'Router Board'),
('012', 'Switch Ethernet'),
('013', 'Box'),
('014', 'Cable'),
('015', 'Connector'),
('016', 'Power Supply'),
('017', 'Socket');

-- --------------------------------------------------------

--
-- Table structure for table `tm_level`
--

CREATE TABLE `tm_level` (
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_level`
--

INSERT INTO `tm_level` (`level`) VALUES
('administrator'),
('kasir'),
('manajer'),
('operasional'),
('warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `tm_menu`
--

CREATE TABLE `tm_menu` (
  `id` varchar(6) NOT NULL,
  `breadcrumb` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `group_menu` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_menu`
--

INSERT INTO `tm_menu` (`id`, `breadcrumb`, `href`, `icon`, `menu`, `group_menu`) VALUES
('010000', 'Data Master', '#', 'fa fa-windows', 'Data Master', '0'),
('010100', 'Data Master > Instansi', 'instansi', 'fa fa-bank', 'Instansi', '010000'),
('010200', 'Data Master > Users', 'users', 'fa fa-users', 'Users', '010000'),
('010300', 'Data Master > Level', 'level', 'fa fa-balance-scale', 'Level', '010000'),
('020000', 'Referensi', '#', 'fa fa-bookmark', 'Referensi', '0'),
('020100', 'Referensi > Satuan', 'satuan', 'fa fa-circle-o', 'Satuan', '020000'),
('020200', 'Referensi > Kategori', 'kategori', 'fa fa-circle-o', 'Kategori', '020000'),
('020300', 'Referensi > Jenis Operasional', 'jenisoperasional', 'fa fa-circle-o', 'Jenis Operasional', '020000'),
('030000', 'Data', '#', 'fa fa-folder', 'Data', '0'),
('030100', 'Data > Barang', 'barang', 'fa fa-cubes', 'Barang', '030000'),
('030200', 'Data > Pelanggan', 'pelanggan', 'fa fa-smile-o', 'Pelanggan', '030000'),
('030300', 'Data > Suplier', 'suplier', 'fa fa-support', 'Suplier', '030000'),
('040000', 'Transaksi', '#', 'fa fa-shopping-cart', 'Transaksi', '0'),
('040100', 'Transaksi > Pembelian', 'pembelian', 'fa fa-archive', 'Pembelian', '040000'),
('040200', 'Transaksi > List Pembelian', 'pembelianaction', 'fa fa-archive', 'Pembelian List', '040000'),
('040300', 'Transaksi > Penjualan', 'penjualan', 'fa fa-cart-plus', 'Penjualan', '040000'),
('040400', 'Transaksi > List Penjualan', 'penjualanaction', 'fa fa-cart-plus', 'Penjualan List', '040000'),
('040500', 'Transaksi > Retur Penjualan', 'returpenjualan', 'fa fa-exchange', 'Retur Penjualan', '040000'),
('040600', 'Transaksi > Operasional', 'operasional', 'fa fa-book', 'Operasional', '040000'),
('050000', 'Laporan', '#', 'fa fa-file', 'Laporan', '0'),
('050100', 'Laporan > Pembelian', 'lappembelian', 'fa fa-archive', 'Pembelian', '050000'),
('050200', 'Laporan > Penjualan', 'lappenjualan', 'fa fa-cart-plus', 'Penjualan', '050000'),
('050300', 'Laporan > Laba Rugi', 'laplabarugi', 'fa fa-money', 'Laba Rugi', '050000'),
('050400', 'Laporan > Keuangan', 'lapkeuangan', 'fa fa-money', 'Keuangan', '050000');

-- --------------------------------------------------------

--
-- Table structure for table `tm_satuan`
--

CREATE TABLE `tm_satuan` (
  `id` varchar(3) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_satuan`
--

INSERT INTO `tm_satuan` (`id`, `satuan`) VALUES
('001', 'pcs'),
('002', 'kg'),
('003', 'g'),
('004', 'm'),
('005', 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `tm_users`
--

CREATE TABLE `tm_users` (
  `instansi_id` varchar(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tm_users`
--

INSERT INTO `tm_users` (`instansi_id`, `username`, `name`, `password`, `level`, `foto`) VALUES
('A001', 'ahmad.ghozali', 'Ahmad Ghozali', '447db77416a4410a135fa0948306ae69', 'administrator', '1688963301_0df2a2aabd2f4d004a1f.jpg'),
('A002', 'alifa.sakinah', 'Alifa Sakinah', 'e172dd95f4feb21412a692e73929961e', 'kasir', '1690346226_2796164b54248c13fafb.jpg'),
('A002', 'desy.pradina', 'Desy Pradina Rahayu', 'e172dd95f4feb21412a692e73929961e', 'manajer', '1688963273_64d0d90c54b979c16933.png'),
('B001', 'itsd', 'IT SUPPORT DEPARTEMENT', 'e172dd95f4feb21412a692e73929961e', 'manajer', 'default.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan_detail`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan_detail` (
`faktur` varchar(20)
,`instansi_id` varchar(4)
,`tanggal` date
,`pelanggan_name` varchar(100)
,`total` double
,`bayar` double
,`operator` varchar(50)
,`penjualan_faktur` varchar(20)
,`barang_id` varchar(20)
,`name` varchar(100)
,`satuan` varchar(20)
,`hp` double
,`hj` double
,`jumlah` int(10)
,`potongan` double
,`modal` double
,`subtotal` double
,`laba` double
);

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan_detail`
--
DROP TABLE IF EXISTS `v_penjualan_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan_detail`  AS SELECT `tb_penjualan`.`faktur` AS `faktur`, `tb_penjualan`.`instansi_id` AS `instansi_id`, `tb_penjualan`.`tanggal` AS `tanggal`, `tb_penjualan`.`pelanggan_name` AS `pelanggan_name`, `tb_penjualan`.`total` AS `total`, `tb_penjualan`.`bayar` AS `bayar`, `tb_penjualan`.`operator` AS `operator`, `tb_penjualan_detail`.`penjualan_faktur` AS `penjualan_faktur`, `tb_penjualan_detail`.`barang_id` AS `barang_id`, `tb_penjualan_detail`.`name` AS `name`, `tb_penjualan_detail`.`satuan` AS `satuan`, `tb_penjualan_detail`.`hp` AS `hp`, `tb_penjualan_detail`.`hj` AS `hj`, `tb_penjualan_detail`.`jumlah` AS `jumlah`, `tb_penjualan_detail`.`potongan` AS `potongan`, `tb_penjualan_detail`.`hp`* `tb_penjualan_detail`.`jumlah` AS `modal`, `tb_penjualan_detail`.`hj`* `tb_penjualan_detail`.`jumlah` AS `subtotal`, `tb_penjualan_detail`.`hj`* `tb_penjualan_detail`.`jumlah` - `tb_penjualan_detail`.`hp` * `tb_penjualan_detail`.`jumlah` - `tb_penjualan_detail`.`potongan` AS `laba` FROM (`tb_penjualan` join `tb_penjualan_detail`) WHERE `tb_penjualan`.`faktur` = `tb_penjualan_detail`.`penjualan_faktur` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_operasional`
--
ALTER TABLE `tb_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`faktur`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`faktur`);

--
-- Indexes for table `tb_retur_penjualan`
--
ALTER TABLE `tb_retur_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_instansi`
--
ALTER TABLE `tm_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_jenis_operasional`
--
ALTER TABLE `tm_jenis_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_kategori`
--
ALTER TABLE `tm_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_level`
--
ALTER TABLE `tm_level`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `tm_menu`
--
ALTER TABLE `tm_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_satuan`
--
ALTER TABLE `tm_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_users`
--
ALTER TABLE `tm_users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
