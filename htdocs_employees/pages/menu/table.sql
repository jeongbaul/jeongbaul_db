-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 25-07-08 17:14
-- 서버 버전: 10.4.6-MariaDB
-- PHP 버전: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `employees`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE `menu` (
  `MENU_ID` varchar(10) CHARACTER SET utf8 NOT NULL,
  `MENU_NAME` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MENU_PATH` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MENU_UPPER` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `ORDER_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`MENU_ID`, `MENU_NAME`, `MENU_PATH`, `MENU_UPPER`, `ORDER_NUM`) VALUES
('EMP_001', '사원관리', '/employees/list', 'ROOT', 2),
('EMP_101', '사원 등록', '/employees/insert', 'EMP_001', 3),
('EMP_102', '사원목록', '/employees/list', 'EMP_001', 4),
('HEI_001', '하이델베르크', '/hei/list', 'ROOT', 5),
('HEI_101', '하이델베르크 등록', '/hei/insert', 'HEI_001', 6),
('NOW_001', '금주의 하이델베르크', '/validate/week', 'ROOT', 9),
('PHO_001', '사진관리', '/photo/list', 'ROOT', 7),
('PHO_101', '사진 등록', '/photo/insert', 'PHO_001', 8),
('ROOT', 'HOME', '/', NULL, 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MENU_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;