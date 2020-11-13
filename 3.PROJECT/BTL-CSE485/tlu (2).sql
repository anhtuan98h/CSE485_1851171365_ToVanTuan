-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2020 lúc 10:55 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tlu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Giới thiệu'),
(2, 'Khoa học'),
(3, 'Đào tạo'),
(4, 'Bộ môn'),
(5, 'Sinh viên'),
(6, 'Tin tức'),
(7, 'Thông báo'),
(8, 'Liên hệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `title`, `content`, `image`, `createdate`) VALUES
(42, 6, ' Trường Đại học Thủy lợi đã tổ chức Hội nghị Tổng kết năm học 2019 ', '<p>Trường Đại học Thủy lợi đ&atilde; tổ chức Hội nghị Tổng kết năm học 2019</p>\r\n', '124.jpg', '2020-10-25 17:34:55'),
(45, 1, ' Trường Đại học Thủy lợi đã tổ chức Hội nghị Tổng kết năm học 2019 ', '<p>sjaklfjlkasflaskflaskfl;askflasfkasfafssf</p>\r\n', '124.jpg', '2020-10-26 03:53:33'),
(46, 4, 'Giới thiệu bộ môn Công nghệ phần mềm', '<p>Bộ m&ocirc;n C&ocirc;ng nghệ phần mềm đảm nhiệm chức năng giảng dạy tin đại cương, m&ocirc;n tin cơ sở v&agrave; chuy&ecirc;n ng&agrave;nh C&ocirc;ng nghệ phần mềm.&nbsp;</p>\r\n\r\n<p><strong>Trưởng bộ m&ocirc;n: TS L&yacute; Anh Tuấn</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '1212121.jpg', '2020-11-02 05:44:10'),
(47, 8, 'KHOA CÔNG NGHỆ THÔNG TIN', '<p>TẦNG 2 NH&Agrave; C1, 175 T&Acirc;Y SƠN, QUẬN ĐỐNG ĐA TH&Agrave;NH PHỐ H&Agrave; NỘI.</p>\r\n\r\n<p>Điện thoại: (04) 35632211</p>\r\n\r\n<p>Email: vpkcntt@tlu.edu.vn</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'sdjksajdasdasf.png', '2020-11-02 07:49:51'),
(48, 5, 'Tài liệu sinh viên cần biết', '<p>Đơn đề nghị&nbsp;&nbsp;download&nbsp;<a href=\"http://cse.tlu.edu.vn/Portals/0/MauDon_DeNghi.doc\">tại đ&acirc;y</a>&nbsp;</p>\r\n\r\n<p>Đơn xin đăng k&yacute; học, download&nbsp;<a href=\"http://cse.tlu.edu.vn/Portals/0/MauDon_DKH.doc\">tại đ&acirc;y</a>&nbsp;</p>\r\n\r\n<p>Đơn xin hủy đăng k&yacute; học, download&nbsp;<a href=\"http://cse.tlu.edu.vn/Portals/0/MauDon_Huy-DKH.doc\">tại đ&acirc;y</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'ádadssdadads.jpg', '2020-11-02 07:56:00'),
(49, 3, 'Ngành Kỹ thuật phần mềm', '<p>Cung cấp c&aacute;c kiến thức chuy&ecirc;n s&acirc;u gi&uacute;p ph&aacute;t triển, sử dụng v&agrave; bảo tr&igrave; phần mềm một c&aacute;ch c&oacute; hệ thống, c&oacute; kỷ luật. Gi&uacute;p sinh vi&ecirc;n ra trường c&oacute; thể l&agrave;m h&ograve;a nhập nhanh ch&oacute;ng với m&ocirc;i trường ph&aacute;t triển phần mềm chuy&ecirc;n nghiệp tại c&aacute;c c&ocirc;ng ty, tập đo&agrave;n ph&aacute;t triển phần mềm.</p>\r\n', 'sdsda.jpg', '2020-11-02 07:59:57'),
(50, 3, 'Ngành Hệ thống thông tin', '<p>Đ&agrave;o tạo kỹ sư c&oacute; những kiến thức nền tảng trong lĩnh vực Hệ thống th&ocirc;ng tin, cập nhật c&aacute;c vấn đề mới v&agrave; hiện đại li&ecirc;n quan đến nghi&ecirc;n cứu ph&aacute;t triển c&aacute;c hệ thống th&ocirc;ng tin, gia c&ocirc;ng hay ứng dụng hệ thống phần mềm; kiến thức về mạng m&aacute;y t&iacute;nh v&agrave; truyền th&ocirc;ng; kiến thức về ph&acirc;n t&iacute;ch thiết kế khai th&aacute;c cơ sở dữ liệu, ph&acirc;n t&iacute;ch xử l&yacute; dữ liệu lớn, x&acirc;y dựng những hệ thống hỗ trợ việc ra quyết định.</p>\r\n', 'ádadssdadads.jpg', '2020-11-02 08:00:47'),
(51, 3, 'Ngành Công nghệ thông tin', '<p>Đ&agrave;o tạo kỹ sư c&oacute; những kiến thức nền tảng trong lĩnh vực C&ocirc;ng nghệ th&ocirc;ng tin, cập nhật c&aacute;c vấn đề mới v&agrave; hiện đại li&ecirc;n quan đến nghi&ecirc;n cứu ph&aacute;t triển c&aacute;c hệ thống th&ocirc;ng tin, gia c&ocirc;ng hay ứng dụng hệ thống phần mềm; kiến thức về mạng m&aacute;y t&iacute;nh v&agrave; truyền th&ocirc;ng.</p>\r\n', 'sdsdasda.jpg', '2020-11-02 08:02:17'),
(52, 2, 'hihihhiihi', '<p>hiihihi</p>\r\n', '11112.jpg', '2020-11-05 08:16:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thisinh`
--

CREATE TABLE `thisinh` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `gioitinh` varchar(20) NOT NULL,
  `ngaysinh` date NOT NULL,
  `dantoc` varchar(100) NOT NULL,
  `tongiao` varchar(50) NOT NULL,
  `noisinh` varchar(100) NOT NULL,
  `namtn` varchar(10) NOT NULL,
  `hl12` varchar(50) NOT NULL,
  `diemtk12` varchar(20) NOT NULL,
  `hk12` varchar(50) NOT NULL,
  `cmnd` varchar(50) NOT NULL,
  `ngaycap` date NOT NULL,
  `noicap` varchar(100) NOT NULL,
  `hokhau` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(80) NOT NULL,
  `sdt_ph` varchar(80) NOT NULL,
  `matinh` varchar(80) NOT NULL,
  `matruong` varchar(80) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nganhxt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thisinh`
--

INSERT INTO `thisinh` (`id`, `hoten`, `gioitinh`, `ngaysinh`, `dantoc`, `tongiao`, `noisinh`, `namtn`, `hl12`, `diemtk12`, `hk12`, `cmnd`, `ngaycap`, `noicap`, `hokhau`, `diachi`, `sdt`, `sdt_ph`, `matinh`, `matruong`, `email`, `nganhxt`) VALUES
(2, 'Tô Văn Tuấn', 'nam', '1998-06-05', 'Kinh', 'Khong', 'Hà Tây', '2016', 'Khá', '8.1', 'Tốt', '017537040', '0000-00-00', 'Hà Nội', 'Kim Quy - Minh Tân - Phú Xuyên - Hà Nội', 'Kim Quy - Minh Tân - Phú Xuyên - Hà Nội', '0395699127', '0335823470', '01', 'PX', 'giatuan@gmail.com', 'CNTT'),
(4, 'Nguyễn Thị Hiền', 'Nữ', '1998-12-10', 'Kinh', 'Không', 'Hà Tây', '2016', 'giỏi', '8.8', 'tốt', '45464555', '2016-05-06', 'Hà Nội', 'Mỹ Đức- Hà Nội', 'Hợp Thanh - Mỹ Đức', '0392014567', '0382252248', '01', 'MD', 'thanhhien@gmail.com', 'CNTT'),
(6, 'Đào Minh Khoa', 'Nam', '2000-01-01', 'Kinh', 'Không', 'Hà Tây', '2016', 'khá', '8.3', 'tốt', '012457852', '2020-05-06', 'Hà Nội', 'Chương Mỹ- Hà Nội', 'Chương Mỹ- Hà Nội', '0358890066', '0382252248', '01', 'CM', 'khoaga@gmail.com', 'CNTT'),
(8, 'Nguyễn Văn Nam', 'Nam', '2000-07-09', 'Kinh', 'Không', 'Hòa Bình', '2018', 'khá', '8.4', 'tốt', '1244343244', '2019-05-06', 'Hòa Bình', 'Hòa Bình', 'Hòa Bình', '025522132', '0231525428', '08', 'HB', 'namtlu@gmail.com', 'Công trình thủy'),
(9, 'Nguyễn Thị Tuyết Mai', 'Nữ', '2000-01-10', 'Kinh', 'Không', 'Hà Tây', '2018', 'giỏi', '9.2', 'tốt', '001123134525', '2018-04-02', 'Hà Nội', 'Mỹ Đức- Hà Nội', 'Hợp Thanh - Mỹ Đức', '0155555542', '0247225458', '01', 'MD', 'tuyetmai@gmail.com', 'QTKD'),
(11, 'Nguyễn Việt Anh', 'Nam', '2000-06-02', 'Kinh', 'Không', 'Hà Tây', '2018', 'giỏi', '8.5', 'tốt', '001123134523', '2020-05-06', 'Hà Nội', 'Thanh Oai - Hà Nội', 'Thanh Oai - Hà Nội', '011556545423', '132324442342', '01', 'TO', 'vietanh0206@gmail.com', 'CNTT'),
(12, 'Nguyễn Xuân Canh', 'Nam', '2000-10-10', 'Tày', 'Không', 'Nam định', '2018', 'khá', '8.8', 'tốt', '123123124924', '2020-12-06', 'Nam định', 'Nam Định', 'Nam Định', '0921125419', '0921458858', '04', 'TĐ', 'canh2000@gmail.com', 'HTTT'),
(15, 'Nguyễn Thu Hường', 'Nữ', '1998-04-17', 'Kinh', 'Không', 'Hà Tây', '2016', 'giỏi', '9.8', 'tốt', '1232424423535', '2020-07-13', 'Hà Nội', 'Mỹ Đức- Hà Nội', 'Hợp Thanh - Mỹ Đức', '0982123456', '0982123457', '01', 'MD', 'thuhuong@gmail.com', 'KTPM'),
(16, 'Phùng Đức Đạt', 'Nam', '2000-11-12', 'Kinh', 'Không', 'Hà Tây', '2018', 'khá', '8.5', 'tốt', '4546455512', '2020-11-05', 'Hà Nội', 'Phú Xuyen', 'Phú Xuyên', '0322802092', '0332802092', '01', 'PX', 'ducdat@gmail.com', 'HTTT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `permission` varchar(5) DEFAULT 'user',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `permission`, `username`, `password`, `email`, `createdate`) VALUES
(17, 'user', 'tuan1998', 'anhtuan1998@gmail.com', 'anhtuan1998@gmail.com', '2020-10-25 23:12:17'),
(18, 'user', 'giatuan', 'anhtuan@gmail.com', 'anhtuan@gmail.com', '2020-10-26 07:12:55'),
(20, 'user', 'tuan98', '5bb8d4fb52afcb598ea35bf794f4c8b9', 'thanhhien@gmail.com', '2020-10-26 07:14:27'),
(21, 'admin', 'tovantuan', '29356c345c3b8390a835574f5fb14df0', 'tovantuan@gmail.com', '2020-10-26 07:17:44'),
(25, 'user', 'tuandeptrai', '15f8182445bac21b05802649a8a698e7', 'tuanhien@gmail.com', '2020-11-02 05:42:55'),
(28, 'user', 'khoadao15', '97107ccb890d9ebe97016ec9120fadf0', 'khoadao15@gmail.com', '2020-11-12 07:47:24'),
(33, 'user', 'thientuan', '745ad54b4391b2506425a5a843466bbd', 'thientuan@gmail.com', NULL),
(34, 'admin', 'daominhkhoa1500', 'khoaga123@gmail.com', 'khoaga123@gmail.com', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `thisinh`
--
ALTER TABLE `thisinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `thisinh`
--
ALTER TABLE `thisinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
