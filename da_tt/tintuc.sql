-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th4 15, 2021 lúc 08:24 PM
-- Phiên bản máy phục vụ: 5.7.28
-- Phiên bản PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adID` int(50) NOT NULL,
  `adAcc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adPass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`adID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adID`, `adAcc`, `adPass`, `adTen`) VALUES
(1, 'tung', '1', 'Tùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loai`
--

DROP TABLE IF EXISTS `tbl_loai`;
CREATE TABLE IF NOT EXISTS `tbl_loai` (
  `loaiID` int(50) NOT NULL,
  `loaiTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`loaiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loai`
--

INSERT INTO `tbl_loai` (`loaiID`, `loaiTen`) VALUES
(1, 'Thể thao'),
(6312, 'Chính trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuc`
--

DROP TABLE IF EXISTS `tbl_tintuc`;
CREATE TABLE IF NOT EXISTS `tbl_tintuc` (
  `ttID` int(225) NOT NULL,
  `ttTieude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttNoidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttHinh` text COLLATE utf8mb4_unicode_ci,
  `ttNgayviet` date NOT NULL,
  `loaiID` int(50) NOT NULL,
  PRIMARY KEY (`ttID`),
  KEY `loaiID` (`loaiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`ttID`, `ttTieude`, `ttNoidung`, `ttHinh`, `ttNgayviet`, `loaiID`) VALUES
(4410, 'ok', 'ádsadadad', '2021-03-13 (4).png', '2021-04-16', 6312),
(6642, 'Chiến tranh thế giới+', 'Chiến dijnch phfogn trống trung quốc', '2021-03-13 (3).png', '2021-04-16', 6312),
(7715, 'hn', 'ásadaasđadsad', '2021-03-09 (1).png', '2021-05-02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userID` int(225) NOT NULL,
  `userEmail` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPass` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTen` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`userID`, `userEmail`, `userPass`, `userTen`) VALUES
(1, 'hai@gmail.com', '1', 'Tấn Hải');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD CONSTRAINT `loaiID` FOREIGN KEY (`loaiID`) REFERENCES `tbl_loai` (`loaiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
