-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse311_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `sl` int(100) NOT NULL,
  `adminuser` varchar(255) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `adminpass` varchar(255) NOT NULL,
  `adminphone` varchar(11) NOT NULL,
  `adminemail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`sl`, `adminuser`, `lname`, `adminpass`, `adminphone`, `adminemail`) VALUES
(1, 'munem', 'shahriar', 'munem', '01757941007', 'munem.shahriar07@northsouth.edu'),
(2, 'nowrin', 'islam', 'nowrin', '01785487493', 'nowrin.islam@northsouth.edu'),
(3, 'farhan', 'mutasim', 'farhan', '', ''),
(4, 'turzo', 'munim', 'turzo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `pub_date` date NOT NULL DEFAULT current_timestamp(),
  `notice` mediumtext NOT NULL,
  `added_by` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `pub_date`, `notice`, `added_by`) VALUES
(1021, '2022-04-22', 'this is a test notice\r\n', 'munem'),
(1024, '2022-04-22', 'this is a notice', 'munem');

-- --------------------------------------------------------

--
-- Table structure for table `student_user`
--

CREATE TABLE `student_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `studentphone` varchar(20) DEFAULT NULL,
  `studentemail` varchar(100) DEFAULT NULL,
  `dept` char(3) DEFAULT NULL,
  `semester` char(1) DEFAULT NULL,
  `cgpa` decimal(3,2) DEFAULT NULL,
  `blood_group` char(3) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `studentgender` varchar(6) NOT NULL,
  `studentnid` int(20) NOT NULL,
  `studentbirth_cert` int(20) NOT NULL,
  `studentuser` varchar(100) DEFAULT NULL,
  `studentpass` varchar(100) DEFAULT NULL,
  `added_by` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_user`
--

INSERT INTO `student_user` (`id`, `fname`, `lname`, `birth_date`, `studentphone`, `studentemail`, `dept`, `semester`, `cgpa`, `blood_group`, `addr`, `studentgender`, `studentnid`, `studentbirth_cert`, `studentuser`, `studentpass`, `added_by`) VALUES
(30100023, 'munem', 'shahriar', '2022-04-12', '01757941007', 'munemshahriar007@gmail.com', 'CSE', '6', '3.00', 'O+', '755', 'Male', 2147483647, 2147483647, 'munem', '01757941007', 'munem'),
(30100024, 'nowrin', 'islam', '2000-06-15', '01785487493', 'nowrin.islam@northsouth.edu', 'CSE', '7', '3.70', 'O+', 'mission road, dinajpur-5200', 'Female', 2147483647, 2147483647, 'nowrin', '01785487493', 'munem');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_user`
--

CREATE TABLE `teacher_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `teacherphone` varchar(20) DEFAULT NULL,
  `teacheremail` varchar(100) DEFAULT NULL,
  `dept` char(3) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `teacheruser` varchar(100) DEFAULT NULL,
  `teacherpass` varchar(100) DEFAULT NULL,
  `added_by` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_user`
--

INSERT INTO `teacher_user` (`id`, `fname`, `lname`, `teacherphone`, `teacheremail`, `dept`, `joining_date`, `teacheruser`, `teacherpass`, `added_by`) VALUES
(2010010, 'farhan', 'mutasim', '01970812372', 'mutasim.farhan@northsouth.edu', 'CSE', '2001-02-09', 'farhan', '123', 'munem'),
(2010016, 'javed', 'hossain', ' 12718927198', 'haved.jossain@northsouth.edu', 'CSE', '2022-04-01', 'javed', 'javed', 'munem'),
(2010018, 'tajwar', 'munim', '01773234942', 'tajwar.munim@northsouth.edu', 'EEE', '2022-04-21', 'tajwar', '1234', 'munem'),
(2010020, 'farhan', 'mutasim', '01757941008', 'farhana.mutasima@northsouth.edu', 'CSE', '2022-04-22', 'farhana', 'farhana', 'munem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_user`
--
ALTER TABLE `student_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_user`
--
ALTER TABLE `teacher_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `sl` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `student_user`
--
ALTER TABLE `student_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30100025;

--
-- AUTO_INCREMENT for table `teacher_user`
--
ALTER TABLE `teacher_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010021;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
