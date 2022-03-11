-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 06:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhngot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
-- Cấu trúc bảng danh mục

CREATE TABLE `tbl_danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_danhmuc`
-- Dữ liệu cho bảng danh mục

INSERT INTO `tbl_danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Bánh Kem Bơ'),
(2, 'Bánh Kem Sữa Tươi '),
(3, 'Bánh Cheese Mouse'),
(4, 'Bánh Đặc Biệt'),
(5, 'Bánh Khuôn Oval'),
(6, 'Bánh Sinh Nhật Phong Đăng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
-- Cấu trúc bảng sản phẩm

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) ,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sanpham`
-- Dữ liệu cho bảng sản phẩm


INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'Bánh hoa kem bơ', 'KB1', 500000, 1, 'kb1.jpg', 'Nguyên liệu: Gato. Kem bơ NewZealand. Size: 22cm.', 'Nhận đặt theo yêu cầu. Giá inbox theo mẫu.', 1, 1),
(2, 'Bánh kem bơ Pháp', 'KB2', 750000, 1, 'kb3.jpg', 'Nguyên liệu: Gato. Kem bơ NewZealand. Size: 22cm.', 'Nhận đặt theo yêu cầu. Giá inbox theo mẫu.', 1, 1),
(3, 'Bánh kem bơ Hàn Quốc', 'KB3', 350000, 1, 'kb2.jpg', 'Nguyên liệu: Kem bơ Hàn Quốc, Size: 25cm.', 'Nhận đặt theo yêu cầu. Giá inbox theo mẫu', 1, 1),
(4, 'Bánh kem sữa tươi', 'BK1', 400000, 1, 'bk1.jpg', 'Nguyên liệu: Sữa tươi, Trứng, Whipping Cream, Size: 20cm.', 'Nhận đặt theo yêu cầu. Giá inbox theo mẫu', 1, 2),
(5, 'Bánh kem sữa tươi tầng', 'BK2', 700000, 1, 'bk2.jpg', 'Nguyên liệu: Sữa tươi, Trứng, Whipping Cream, Size: 20cm.', 'Bánh sử dụng cho tiệc cưới, liên hoan,... Nhận đặt theo yêu cầu. Giá inbox theo mẫu.', 1, 2),
(6, 'Tiramisu', 'CM1', 400000, 1, 'cm1.jpg', 'Dòng Bánh lạnh kiểu Tây. Size: 20cm.', 'Dòng bánh này có thể để tủ đông, xả đông khi dùng đến. Để ngăn mát ăn ngon từ 3 đến 4 ngày.', 1, 3),
(7, 'Chanh Dây', 'CM2', 400000, 1, 'cm2.jpg', 'Dòng Bánh lạnh kiểu Tây. Size: 20cm.', 'Dòng bánh này có thể để tủ đông, xả đông khi dùng đến. Để ngăn mát ăn ngon từ 3 đến 4 ngày.', 1, 3),
(8, 'Chocolate', 'CM3', 400000, 1, 'cm3.jpg', 'Dòng Bánh lạnh kiểu Tây. Size: 20cm.', 'Dòng bánh này có thể để tủ đông, xả đông khi dùng đến. Để ngăn mát ăn ngon từ 3 đến 4 ngày.', 1, 3),
(9, 'Matcha', 'CM4', 400000, 1, 'cm4.jpg', 'Dòng Bánh lạnh kiểu Tây. Size: 20cm.', 'Dòng bánh này có thể để tủ đông, xả đông khi dùng đến. Để ngăn mát ăn ngon từ 3 đến 4 ngày.', 1, 3),
(10, 'Dâu', 'CM5', 400000, 1, 'cm5.jpg', 'Dòng Bánh lạnh kiểu Tây. Size: 20cm.','Dòng bánh này có thể để tủ đông, xả đông khi dùng đến. Để ngăn mát ăn ngon từ 3 đến 4 ngày.', 1, 3),
(11, 'Reb VelVet', 'DB1', 500000, 1, 'db1.jpg', 'Cream Cheese, Cacao & Coffee.', 'Bánh này ko để đông lạnh chỉ để ngăn mát, để được 3 đến 5 ngày.', 1, 4),
(12, 'Gato Flan', 'DB2', 400000, 1, 'db3.jpg', 'Gato Flan kiểu Sinh Nhật.', 'Bánh này ko để đông lạnh chỉ để ngăn mát, để được 3 đến 5 ngày.', 1, 4),
(13, 'Fraiser', 'DB3',  5400000, 1, 'db2.jpg', 'Dâu tươi & Vanilla Cream Pastissier.', 'Bánh này ko để đông lạnh chỉ để ngăn mát. Để được 3 đến 5 ngày.', 1, 4),
(14, 'Banana Bread Cake', 'OV1', 85000, 1, 'ov2.jpg','Khuôn oval', 'Dùng ngay hoặc để ngăn mát 3-4 ngày.', 1, 5),
(15, 'Brioche', 'OV2', 85000, 1, 'ov1.jpg','Khuôn oval', 'Dùng ngay hoặc để ngăn mát 3-4 ngày.', 1, 5),
(16, 'JP Cotton Cheese Cake', 'OV3', 95000, 1, 'ov3.jpg','Khuôn oval', 'Dùng ngay hoặc để ngăn mát 3-4 ngày.', 1, 5),
(17, 'Gato Flan', 'OV4', 90000, 1, 'ov4.jpg','Khuôn oval', 'Dùng ngay hoặc để ngăn mát 3-4 ngày.', 1, 5),
(18, 'Bánh bé trai', 'PD1', 800000, 1, 'pd1.jpg', 'Nhận theo yêu cầu. Giá inbox theo mẫu. Size 22cm.', 'Bánh này ko để đông lạnh chỉ để ngăn mát. Để được 3 đến 5 ngày.', 1, 6),
(19, 'Bánh bé gái', 'PD2', 800000, 1, 'pd2.jpg', 'Nhận theo yêu cầu. Giá inbox theo mẫu. Size 22cm.', 'Bánh này ko để đông lạnh chỉ để ngăn mát. Để được 3 đến 5 ngày.', 1, 6);

-- Indexes for dumped tables
-- Chỉ mục cho các bảng đã kết xuất

--
-- Indexes for table `tbl_danhmuc`
-- Chỉ mục cho bảng danh mục khoá chính là id
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanpham`
-- Chỉ mục cho bảng sản phẩm khoá chính là id_sanpham
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT for dumped tables
-- cho các bảng kết xuất


--
-- AUTO_INCREMENT for table `tbl_danhmuc`
-- Thiết lập id danh mục tự tăng giá trị gia tăng là 7
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
-- Thiết lập id sản phẩm tự tăng, giá trị gia tăng là 20
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
