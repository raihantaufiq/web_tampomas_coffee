-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 12:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tampomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_address`
--

CREATE TABLE `m_address` (
  `id_m_address` int(11) NOT NULL,
  `m_provinsi` varchar(50) NOT NULL,
  `m_zipcode` int(11) NOT NULL,
  `m_address` longtext NOT NULL,
  `m_kota` varchar(45) NOT NULL,
  `m_kecamatan` varchar(45) NOT NULL,
  `m_kelurahan` varchar(45) NOT NULL,
  `m_customer_id_m_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_address`
--

INSERT INTO `m_address` (`id_m_address`, `m_provinsi`, `m_zipcode`, `m_address`, `m_kota`, `m_kecamatan`, `m_kelurahan`, `m_customer_id_m_customer`) VALUES
(1, 'PROVINSI?', 0, 'a', 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `id_m_admin` int(11) NOT NULL,
  `email_admin` varchar(45) NOT NULL,
  `pass_admin` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`id_m_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'admin1@email.co', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `m_cart`
--

CREATE TABLE `m_cart` (
  `id_m_cart` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status_cart` varchar(1) NOT NULL DEFAULT '0',
  `m_customer_id_m_customer` int(11) NOT NULL,
  `m_product_id_m_product` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_content`
--

CREATE TABLE `m_content` (
  `idm_content` int(11) NOT NULL,
  `title_content` varchar(45) NOT NULL,
  `desc_content` longtext NOT NULL,
  `date_content` date NOT NULL,
  `photo_content` varchar(255) NOT NULL,
  `m_admin_id_m_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_content`
--

INSERT INTO `m_content` (`idm_content`, `title_content`, `desc_content`, `date_content`, `photo_content`, `m_admin_id_m_admin`) VALUES
(1, 'Bagaimana Coffee Tampomas dibuat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-05-28', '1.png', 1),
(2, 'Sejarah Coffee Tampomas', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-05-26', '2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `id_m_customer` int(11) NOT NULL,
  `uname_customer` varchar(45) NOT NULL,
  `email_customer` varchar(45) NOT NULL,
  `pass_customer` varchar(45) NOT NULL,
  `phone_customer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id_m_customer`, `uname_customer`, `email_customer`, `pass_customer`, `phone_customer`) VALUES
(1, 'a', 'aaa@email.co', 'aa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_fraud`
--

CREATE TABLE `m_fraud` (
  `id_m_pemesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` varchar(10) NOT NULL,
  `name_product` varchar(45) NOT NULL,
  `price_product` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `tanggal_fraud` date NOT NULL,
  `m_pemesanan_id_m_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_kurir`
--

CREATE TABLE `m_kurir` (
  `id_m_kurir` int(11) NOT NULL,
  `name_kurir` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pembelian`
--

CREATE TABLE `m_pembelian` (
  `id_m_pemesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` varchar(10) NOT NULL,
  `name_product` varchar(45) NOT NULL,
  `price_product` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `m_pemesanan_id_m_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_pemesanan`
--

CREATE TABLE `m_pemesanan` (
  `id_m_pemesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` varchar(10) NOT NULL,
  `name_product` varchar(45) NOT NULL,
  `price_product` int(11) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status_pemesanan` varchar(1) NOT NULL DEFAULT '0',
  `m_cart_id_m_cart` int(11) NOT NULL,
  `m_address_id_m_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_product`
--

CREATE TABLE `m_product` (
  `id_m_product` varchar(10) NOT NULL,
  `category_product` varchar(45) NOT NULL,
  `photo_product` varchar(255) DEFAULT NULL,
  `name_product` varchar(45) NOT NULL,
  `price_product` int(11) NOT NULL,
  `desc_product` longtext NOT NULL,
  `stock_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_product`
--

INSERT INTO `m_product` (`id_m_product`, `category_product`, `photo_product`, `name_product`, `price_product`, `desc_product`, `stock_product`) VALUES
('A01100', 'arabica', '1.png', 'tampomas arabica 100 gr', 49000, 'kopi mantap segar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `m_shipping`
--

CREATE TABLE `m_shipping` (
  `id_m_shipping` int(11) NOT NULL,
  `resi` varchar(45) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `m_kurir_id_m_kurir` int(11) NOT NULL,
  `m_pembelian_id_m_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_address`
--
ALTER TABLE `m_address`
  ADD PRIMARY KEY (`id_m_address`),
  ADD UNIQUE KEY `id_m_address_UNIQUE` (`id_m_address`),
  ADD KEY `fk_m_address_m_customer1_idx` (`m_customer_id_m_customer`);

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id_m_admin`),
  ADD UNIQUE KEY `id_m_admin_UNIQUE` (`id_m_admin`),
  ADD UNIQUE KEY `email_admin_UNIQUE` (`email_admin`),
  ADD UNIQUE KEY `pass_admin_UNIQUE` (`pass_admin`);

--
-- Indexes for table `m_cart`
--
ALTER TABLE `m_cart`
  ADD PRIMARY KEY (`id_m_cart`),
  ADD UNIQUE KEY `id_m_cart_UNIQUE` (`id_m_cart`),
  ADD KEY `fk_m_cart_m_customer_idx` (`m_customer_id_m_customer`),
  ADD KEY `fk_m_cart_m_product1_idx` (`m_product_id_m_product`);

--
-- Indexes for table `m_content`
--
ALTER TABLE `m_content`
  ADD PRIMARY KEY (`idm_content`),
  ADD UNIQUE KEY `idm_content_UNIQUE` (`idm_content`),
  ADD KEY `fk_m_content_m_admin1_idx` (`m_admin_id_m_admin`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`id_m_customer`),
  ADD UNIQUE KEY `id_m_customer_UNIQUE` (`id_m_customer`),
  ADD UNIQUE KEY `uname_customer_UNIQUE` (`uname_customer`),
  ADD UNIQUE KEY `email_customer_UNIQUE` (`email_customer`),
  ADD UNIQUE KEY `pass_customer_UNIQUE` (`pass_customer`),
  ADD UNIQUE KEY `phone_customer_UNIQUE` (`phone_customer`);

--
-- Indexes for table `m_fraud`
--
ALTER TABLE `m_fraud`
  ADD PRIMARY KEY (`id_m_pemesanan`),
  ADD UNIQUE KEY `id_m_pemesanan_UNIQUE` (`id_m_pemesanan`),
  ADD KEY `fk_m_fraud_m_pemesanan1_idx` (`m_pemesanan_id_m_pemesanan`);

--
-- Indexes for table `m_kurir`
--
ALTER TABLE `m_kurir`
  ADD PRIMARY KEY (`id_m_kurir`),
  ADD UNIQUE KEY `id_m_kurir_UNIQUE` (`id_m_kurir`);

--
-- Indexes for table `m_pembelian`
--
ALTER TABLE `m_pembelian`
  ADD PRIMARY KEY (`id_m_pemesanan`),
  ADD UNIQUE KEY `id_m_pemesanan_UNIQUE` (`id_m_pemesanan`),
  ADD KEY `fk_m_pembelian_m_pemesanan1_idx` (`m_pemesanan_id_m_pemesanan`);

--
-- Indexes for table `m_pemesanan`
--
ALTER TABLE `m_pemesanan`
  ADD PRIMARY KEY (`id_m_pemesanan`),
  ADD UNIQUE KEY `id_m_pemesanan_UNIQUE` (`id_m_pemesanan`),
  ADD KEY `fk_m_pemesanan_m_cart1_idx` (`m_cart_id_m_cart`),
  ADD KEY `fk_m_pemesanan_m_address1_idx` (`m_address_id_m_address`);

--
-- Indexes for table `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`id_m_product`),
  ADD UNIQUE KEY `id_m_product_UNIQUE` (`id_m_product`),
  ADD UNIQUE KEY `name_product_UNIQUE` (`name_product`);

--
-- Indexes for table `m_shipping`
--
ALTER TABLE `m_shipping`
  ADD PRIMARY KEY (`id_m_shipping`),
  ADD KEY `fk_m_shipping_m_kurir1_idx` (`m_kurir_id_m_kurir`),
  ADD KEY `fk_m_shipping_m_pembelian1_idx` (`m_pembelian_id_m_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_address`
--
ALTER TABLE `m_address`
  MODIFY `id_m_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id_m_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_cart`
--
ALTER TABLE `m_cart`
  MODIFY `id_m_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_content`
--
ALTER TABLE `m_content`
  MODIFY `idm_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id_m_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_fraud`
--
ALTER TABLE `m_fraud`
  MODIFY `id_m_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pembelian`
--
ALTER TABLE `m_pembelian`
  MODIFY `id_m_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pemesanan`
--
ALTER TABLE `m_pemesanan`
  MODIFY `id_m_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_shipping`
--
ALTER TABLE `m_shipping`
  MODIFY `id_m_shipping` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_address`
--
ALTER TABLE `m_address`
  ADD CONSTRAINT `fk_m_address_m_customer1` FOREIGN KEY (`m_customer_id_m_customer`) REFERENCES `m_customer` (`id_m_customer`);

--
-- Constraints for table `m_cart`
--
ALTER TABLE `m_cart`
  ADD CONSTRAINT `fk_m_cart_m_customer` FOREIGN KEY (`m_customer_id_m_customer`) REFERENCES `m_customer` (`id_m_customer`),
  ADD CONSTRAINT `fk_m_cart_m_product1` FOREIGN KEY (`m_product_id_m_product`) REFERENCES `m_product` (`id_m_product`);

--
-- Constraints for table `m_content`
--
ALTER TABLE `m_content`
  ADD CONSTRAINT `fk_m_content_m_admin1` FOREIGN KEY (`m_admin_id_m_admin`) REFERENCES `m_admin` (`id_m_admin`);

--
-- Constraints for table `m_fraud`
--
ALTER TABLE `m_fraud`
  ADD CONSTRAINT `fk_m_fraud_m_pemesanan1` FOREIGN KEY (`m_pemesanan_id_m_pemesanan`) REFERENCES `m_pemesanan` (`id_m_pemesanan`);

--
-- Constraints for table `m_pembelian`
--
ALTER TABLE `m_pembelian`
  ADD CONSTRAINT `fk_m_pembelian_m_pemesanan1` FOREIGN KEY (`m_pemesanan_id_m_pemesanan`) REFERENCES `m_pemesanan` (`id_m_pemesanan`);

--
-- Constraints for table `m_pemesanan`
--
ALTER TABLE `m_pemesanan`
  ADD CONSTRAINT `fk_m_pemesanan_m_address1` FOREIGN KEY (`m_address_id_m_address`) REFERENCES `m_address` (`id_m_address`),
  ADD CONSTRAINT `fk_m_pemesanan_m_cart1` FOREIGN KEY (`m_cart_id_m_cart`) REFERENCES `m_cart` (`id_m_cart`);

--
-- Constraints for table `m_shipping`
--
ALTER TABLE `m_shipping`
  ADD CONSTRAINT `fk_m_shipping_m_kurir1` FOREIGN KEY (`m_kurir_id_m_kurir`) REFERENCES `m_kurir` (`id_m_kurir`),
  ADD CONSTRAINT `fk_m_shipping_m_pembelian1` FOREIGN KEY (`m_pembelian_id_m_pemesanan`) REFERENCES `m_pembelian` (`id_m_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
