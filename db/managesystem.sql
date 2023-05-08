-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2022 lúc 12:52 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `managesystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `decentralization` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `datetimes` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `decentralization`, `username`, `password`, `active`, `datetimes`) VALUES
('ad001', 'admin', 'namnam', 'namnam01', 1, '2023-09-09'),
('dept001', 'department', 'thienphong', '123456', 1, '2020-12-11'),
('dept002', 'department', 'quochung', 'quochung02', 0, '2020-05-06'),
('dept003', 'department', 'tuongvy', 'tuongvy03', 0, '2020-10-15'),
('dept004', 'department', 'quochuy', 'quochuy04', 0, '2021-07-18'),
('dept005', 'department', 'trungkien', 'trungkien05', 0, '2022-01-01'),
('dept006', 'department', 'ngoclinh', 'ngoclinh06', 0, '2022-01-02'),
('dept007', 'department', 'theanh', 'theanh07', 0, '2021-12-06'),
('dept008', 'department', 'huutrong', 'huutrong08', 0, '2021-07-08'),
('dept009', 'department', 'thutrang', 'thutrang09', 0, '2020-11-27'),
('dept010', 'department', 'anhvu', 'anhvu10', 0, '2021-08-06'),
('dept011', 'department', 'haohung', 'haohung11', 0, '2021-04-25'),
('dept012', 'department', 'diemmy', 'diemmy12', 0, '2022-01-03'),
('dept1000', 'department', 'fafdsa', 'fafdsa', 0, '2022-01-14'),
('emp001', 'employee', 'tritrung', 'tritrung01', 0, '0000-00-00'),
('emp002', 'employee', 'thanhnhan', 'thanhnhan02', 0, '0000-00-00'),
('emp003', 'employee', 'tiendat', 'tiendat03', 0, '0000-00-00'),
('emp004', 'employee', 'anhtai', '123456', 1, '0000-00-00'),
('emp005', 'employee', 'trucquyen', 'trucquyen05', 0, '0000-00-00'),
('emp006', 'employee', 'thuha', 'thuha06', 0, '2021-06-03'),
('emp007', 'employee', 'trangdai', 'trangdai07', 0, '2021-09-17'),
('emp008', 'employee', 'thuylinh', 'thuylinh08', 0, '2020-10-17'),
('emp009', 'employee', 'vietanh', 'vietanh09', 0, '2021-10-05'),
('emp010', 'employee', 'thiloan', 'thiloan10', 0, '2022-01-07'),
('emp011', 'employee', 'hoaivy', 'hoaivy11', 0, '2020-06-17'),
('emp012', 'employee', 'khaihoang', 'khaihoang12', 0, '2021-09-21'),
('emp013', 'employee', 'thekiet', 'thekiet13', 0, '2021-04-23'),
('emp014', 'employee', 'thienphuong', 'thienphuong14', 0, '2021-09-05'),
('emp015', 'employee', 'ngocyen', 'ngocyen15', 0, '2021-06-02'),
('emp016', 'employee', 'tranganh', 'tranganh16', 0, '2021-11-20'),
('emp017', 'employee', 'thuuyen', 'thuuyen17', 0, '2020-02-15'),
('emp018', 'employee', 'ngoctrinh', 'ngoctrinh18', 0, '2020-05-17'),
('emp019', 'employee', 'thuykieu', 'thuykieu19', 0, '2021-08-17'),
('emp020', 'employee', 'anhtien', 'anhtien20', 0, '2021-06-28'),
('emp021', 'employee', 'tanminh', 'tanminh21', 0, '2021-11-03'),
('emp200', 'employee', 'anhduc02', 'anhduc02', 0, '2022-01-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `addresses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `falculty` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `fullname`, `addresses`, `img`, `falculty`, `gender`, `phone`, `email`, `country`) VALUES
('dept001', 'Tran Thien Phong', '254 Tran Quang Dieu, district 3, Ho chi Minh City', 'avt1.jpg', 'ff1', 'male', '123456789', 'thienphong@gmail.com', 'Vietnam'),
('dept002', 'Lam Quoc Hung', '48 Tran Phu, district 5, Ho Chi Minh City', 'avt2.jpeg', 'ff2', 'male', '123456789', 'quochung@gmail.com', 'Vietnam'),
('dept003', 'Nguyen Tuong Vy', '125 Huynh Tan Phat, district 7, Ho Chi Minh City', 'avt3.jpg', 'ff3', 'male', '123456789', 'tuongvy@gmail.com', 'Vietnam'),
('dept004', 'Nguyen Quoc Huy', '56 Nguyen Chi Phuong, district 10, Ho Chi Minh City', 'avt4.jpeg', 'ff4', 'male', '123456789', 'quochuy@gmail.com', 'Vietnam'),
('dept005', 'Tran Trung Kien', '12 Tran Xuan Soan, district 8, Ho Chi Minh City', 'avt5.jpg', 'ff5', 'male', '123456789', 'trungkien@gmail.com', 'Vietnam'),
('dept006', 'Dao Thi Ngoc Linh', '207 Pham Ngoc Thach, dictrict 3, Ho Chi Minh City', 'avt6.jpg', 'ff6', 'female', '0123456456', 'ngoclinh@gmail.com', 'Vietnam'),
('dept007', 'Nguyen The Anh', '123 Nguyen Huu Canh, district 7, Ho Chi Minh City', 'avt7.jpg', 'ff7', 'male', '0123456789', 'theanh@gmail.com', 'Vietnam'),
('dept008', 'Nguyen Huu Trong', '489 Nguyen Huu Canh, district 8, Ho Chi Minh City', 'avt8.jpg', 'ff8', 'male', '0123456123', 'huutrong@gmail.com', 'Vietnam'),
('dept009', 'Nguyen Thu Trang', '206 Huynh Thuc Khang, district 3, Ho Chi Minh City', 'avt9.jpg', 'ff9', 'female', '0123789789', 'thutrang@gmail.com', 'Vietnam'),
('dept010', 'Pham Anh Vu', '45 Nguyen Gia Khiem, district 8, Ho Chi Minh City', 'avt10.jpg', 'ff10', 'male', '0456456123', 'anhvu@gmail.com', 'Vietnam'),
('dept011', 'Vu Hao Hung', '37 Quang Trung, district 1, Ho Chi Minh City', 'avt11.jpg', 'ff11', 'male', '0321159753', 'haohung@gmail.com', 'Vietnam'),
('dept012', 'Nguyen Thi Diem My', '236 Nguyen Trung Truc, district 8, Ho Chi Minh City', 'avt12.jpg', 'ff12', 'female', '0113236236', 'diemmy@gmail.com', 'Vietnam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailtask`
--

CREATE TABLE `detailtask` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `stars` date NOT NULL,
  `ends` date NOT NULL,
  `mark` int(11) NOT NULL,
  `filename` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailtask`
--

INSERT INTO `detailtask` (`id`, `description`, `stars`, `ends`, `mark`, `filename`) VALUES
('t01', 'sometext', '2021-12-01', '2021-12-25', 0, ''),
('t02', 'sometext', '2021-10-12', '2021-11-12', 0, ''),
('t03', 'sometext', '2021-10-12', '2021-11-12', 0, ''),
('t04', 'sometext', '2022-01-03', '2022-01-09', 0, ''),
('t05', 'sometext', '2021-11-15', '2021-12-30', 0, ''),
('t06', 'sometext', '2021-12-12', '2020-01-01', 0, ''),
('t07', 'sometext', '2021-11-15', '2021-12-30', 0, ''),
('t08', 'sometext', '2021-10-30', '2021-12-30', 0, ''),
('t09', 'sometext', '2021-12-29', '2022-01-01', 0, ''),
('t10', 'sometext', '2021-11-23', '2021-12-25', 0, ''),
('t11', 'sometext', '2021-10-12', '2021-11-12', 0, ''),
('t12', 'sometext', '2021-10-12', '2021-11-12', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `director`
--

CREATE TABLE `director` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `addresses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `director`
--

INSERT INTO `director` (`id`, `fullname`, `addresses`, `img`) VALUES
('ad001', 'Nguyen Huu Nam', '713 Nguyen van Linh, district 7, Ho Chi Minh City', 'avt45.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `addresses` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `departID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `fullname`, `addresses`, `img`, `gender`, `phone`, `email`, `country`, `departID`) VALUES
('emp001', 'Phu Huu Tri Trung', '25 Nguyen Van Linh, district 7, Ho Chi Minh City', 'avt13.jpg', 'male', '9876543210', 'chitrung@gmail.com', 'Vietnam', 'dept001'),
('emp002', 'Thai Thi Thanh Nhan', '246 Nguyen Van Cu, district 8, Ho Chi Minh City', 'avt19.jpg', 'male', '9876543210', 'thanhnhan@gmail.com', 'Vietnam', 'dept002'),
('emp003', 'Dat Tien yeu phong', '19 Nguyen Huu Tho', 'avt15.jpg', 'female', '123456789', 'dattien@gmail.com', 'Vietnam', 'dept003'),
('emp004', 'Nguyen Anh Tai', '36 Tran Van Khanh, district 7, Ho Chi Minh City', 'avt14.jpg', 'male', '9876543210', 'anhtai@gmail.com', 'Vietnam', 'dept002'),
('emp005', 'Nguyen Hoai Linh', '75 Ly Thai To, district 3, Ho Chi Minh City', 'avt21.jpg', 'male', '9876543210', 'hoailinh@gmail.com', 'Vietnam', 'dept001'),
('emp006', 'Nguyen Thi Thu Ha', '159 Nguyen Thai Hoc, district 6, Ho Chi Minh City', 'avt16.jpg', 'female', '0123654654', 'thuha@gmail.com', 'Vietnam', 'dept004'),
('emp007', 'Nguyen Trang Dai', '254 Nguyen Van Cu, district 3, Ho Chi Minh City', 'avt17.jpg', 'female', '0456987987', 'trangdai@gmail.com', 'Vietnam', 'dept005'),
('emp008', 'Nguyen Thuy Linh', '789 Nguyen Van Canh, district 4, Ho Chi Minh City', 'avt19.jpg', 'female', '0258258456', 'thuylinh@gmail.com', 'Vietnam', 'dept006'),
('emp009', 'Nguyen Viet Anh', '46 Kha Van Can, district 9, Ho Chi Minh City', 'avt18.jpg', 'male', '0236623459', 'vietanh@gmail.com', 'Vietnam', 'dept007'),
('emp010', 'Nguyen Thi Loan', '206 Huynh Thuc Khang, district 3, Ho Chi Minh City', 'avt24.jpg', 'female', '0456987987', 'thiloan@gmail.com', 'Vietnam', 'dept008'),
('emp011', 'Nguyen Hoai Vy', '39 Nguyen The Canh, district 8, Ho Chi Minh City', 'avt20.jpg', 'male', '0456987987', 'hoaivy@gmail.com', 'Vietnam', 'dept009'),
('emp012', 'Do Khai Hoang', '78 Pham The Hien, district 5, Ho Chi Minh City', 'avt21.jpg', 'male', '0123687687', 'khaihoang@gmail.com', 'Vietnam', 'dept010'),
('emp013', 'Nguyen The Kiet', '254 Nguyen Van Cu, district 3, Ho Chi Minh City', 'avt22.jpg', 'male', '0258258456', 'thekiet@gmail.com', 'Vietnam', 'dept011'),
('emp014', 'Laij Ngoc Thien Phuong', '254 Nguyen Van Cu, district 3, Ho Chi Minh City', 'avt25.jpg', 'female', '0234234159', 'thienphuong@gmail.com', 'Vietnam', 'dept012'),
('emp015', 'Pham Ngoc Yen', '159 Nguyen Hue, district 1, Ho Chi Minh City', 'avt27.jpg', 'female', '0126126459', 'ngocyen@gmail.com', 'Vietnam', 'dept010'),
('emp016', 'Nguyen Trang Anh', '254 Nguyen Van Cu, district 3, Ho Chi Minh City', 'avt23.jpg', 'male', '0378378159', 'tranganh@gmail.com', 'Vietnam', 'dept011'),
('emp017', 'Nguyen Thi Thu Uyen', '159 Ton Dan, district 7, Ho Chi Minh City', 'avt28.jpg', 'female', '0456987987', 'thuuyen@gmail.com', 'Vietnam', 'dept012'),
('emp018', 'Nguyen Ngoc Trinh', '215 Nguyen Van, district 3, Ho Chi Minh City', 'avt29.jpg', 'female', '0123123951', 'ngoctrinh@gmail.com', 'Vietnam', 'dept005'),
('emp019', 'Nguyen Thuy Kieu', '15 Nguyen Huu Canh, district 1, Ho Chi Minh City', 'avt30.jpg', 'female', '0456987987', 'thuykieu@gmail.com', 'Vietnam', 'dept009'),
('emp020', 'Nguyen Anh Tien', '45 Chu Trinh, district 6, Ho Chi Minh City', 'avt26.jpg', 'male', '0789987753', 'anhtien@gmail.com', 'Vietnam', 'dept007'),
('emp021', 'Nguyen Tan Minh', '35 Phan Chu Trinh, district 3, Ho Chi Minh City', 'avt42.jpg', 'female', '0321159654', 'tanminh@gmail.com', 'Vietnam', 'dept006');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `major`
--

CREATE TABLE `major` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nameMajor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `major`
--

INSERT INTO `major` (`id`, `nameMajor`, `email`) VALUES
('ff1', 'sometext1', 'sometext1@gmail.com'),
('ff10', 'sometext10', 'sometext10@gmail.com'),
('ff11', 'sometext11', 'sometext11@gmail.com'),
('ff12', 'sometext12', 'sometext12@gmail.com'),
('ff13', 'sometext13', 'sometext13@gmail.com'),
('ff14', 'sometext14', 'sometext14@gmail.com'),
('ff15', 'sometext15', 'sometext15@gmail.com'),
('ff16', 'sometext16', 'sometext16@gmail.com'),
('ff17', 'sometext17', 'sometext17@gmail.com'),
('ff18', 'sometext18', 'sometext18@gmail.com'),
('ff19', 'sometext19', 'sometext19@gmail.com'),
('ff2', 'sometext2', 'sometext2@gmail.com'),
('ff20', 'sometext20', 'sometext20@gmail.com'),
('ff3', 'sometext3', 'sometext3@gmail.com'),
('ff4', 'sometext4', 'sometext4@gmail.com'),
('ff5', 'sometext5', 'sometext5@gmail.com'),
('ff6', 'sometext6', 'sometext6@gmail.com'),
('ff7', 'sometext7', 'sometext7@gmail.com'),
('ff8', 'sometext8', 'sometext8@gmail.com'),
('ff9', 'sometext9', 'sometext9@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nametask` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `departid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `employid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `dayCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `nametask`, `departid`, `employid`, `status`, `dayCreate`) VALUES
('t0043', 'fsafsfd', 'dept001', 'emp010', 0, '0000-00-00'),
('t01', 'sometext', 'dept001', 'emp001', 0, '2021-12-12'),
('t02', 'sometask02', 'dept002', 'emp005', 0, '2021-10-12'),
('t03', 'sometask03', 'dept002', 'emp007', 0, '2021-10-12'),
('t04', 'sometask04', 'dept003', 'emp009', 0, '2022-01-03'),
('t05', 'sometask05', 'dept004', 'emp004', 0, '2021-11-15'),
('t06', 'sometask06', 'dept005', 'emp011', 0, '2021-12-12'),
('t07', 'sometask07', 'dept006', 'emp018', 0, '2021-11-25'),
('t08', 'sometask08', 'dept007', 'emp015', 0, '2021-10-30'),
('t09', 'sometask09', 'dept008', 'emp006', 0, '2021-12-29'),
('t10', 'sometask10', 'dept009', 'emp014', 0, '2021-11-23'),
('t11', 'sometask11', 'dept010', 'emp008', 0, '2021-10-12'),
('t12', 'sometask12', 'dept011', 'emp010', 0, '2021-10-12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DE_MA` (`falculty`);

--
-- Chỉ mục cho bảng `detailtask`
--
ALTER TABLE `detailtask`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EM_DE` (`departID`);

--
-- Chỉ mục cho bảng `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TA_DE` (`departid`),
  ADD KEY `FK_TA_EM` (`employid`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FK_DE_AC` FOREIGN KEY (`id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_DE_MA` FOREIGN KEY (`falculty`) REFERENCES `major` (`id`);

--
-- Các ràng buộc cho bảng `detailtask`
--
ALTER TABLE `detailtask`
  ADD CONSTRAINT `FK_DETA_TA` FOREIGN KEY (`id`) REFERENCES `task` (`id`);

--
-- Các ràng buộc cho bảng `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `FK_DI_AC` FOREIGN KEY (`id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_EM_AC` FOREIGN KEY (`id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_EM_DE` FOREIGN KEY (`departID`) REFERENCES `department` (`id`);

--
-- Các ràng buộc cho bảng `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_TA_DE` FOREIGN KEY (`departid`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `FK_TA_EM` FOREIGN KEY (`employid`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
