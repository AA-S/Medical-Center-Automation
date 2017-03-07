-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2015 at 11:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE IF NOT EXISTS `appointment_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobileNo` varchar(30) NOT NULL,
  `contactTime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `residance` varchar(200) NOT NULL,
  `birthDate` varchar(30) NOT NULL,
  `visit` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `serviceDate` varchar(30) NOT NULL,
  `serviceTime` varchar(20) NOT NULL,
  `disease` varchar(300) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`id`, `firstName`, `lastName`, `mobileNo`, `contactTime`, `email`, `residance`, `birthDate`, `visit`, `department`, `doctorId`, `serviceDate`, `serviceTime`, `disease`, `date`) VALUES
(1, 'Assafuddoula', 'Golap', '01521453003', 'Both 8 am to 12 Noon and 12 Noon to 4 pm', 'golap@gmail.com', 'Rajshahi', '1994-07-16', 'yes', 'Ear Nose and Throat', 1234, '2015-03-03', '03:00 PM', 'No disease', 'Wed, 04 Mar 2015 18:50:15 PM'),
(2, 'Masum', 'Mesbah', '01770900052', 'Both 8 am to 12 Noon and 12 Noon to 4 pm', 'masum@gmail.com', 'Rangpur', '1994-01-05', 'yes', 'CT Scan Worcester', 1234, '2015-03-03', '08:00 PM', 'No Disease', 'Wed, 05 Mar 2015 18:50:15 PM'),
(3, 'Abdul', 'Aziz', '01753258105', '12 Noon to 4 pm', 'mdabdulaziz1994@gmail.com', 'Dewanganj, Jamalpur', '1994-11-15', 'yes', 'Ear Nose and Throat', 1234, '2015-03-03', '06:00 PM', 'No Disease', 'Wed, 06 Mar 2015 18:50:15 PM'),
(4, 'Masum', 'Al mesbah', '01770900052', '12 Noon to 4 pm', 'mdabdulaziz1994@gmail.com', 'Rangpur', '1994-01-05', 'yes', 'Cadiology', 1235, '2015-03-11', '10:00 AM', 'No Disease', 'Fri, 06 Mar 2015 21:56:15 PM'),
(5, 'Abdul', 'Aziz', '01753258105', '12 Noon to 4 pm', 'mdabdulaziz1994@gmail.com', 'Dewanganj, Jamalpur', '1994-11-15', 'yes', 'Ear Nose and Throat', 1235, '2015-03-19', '06:00 PM', 'I have no diease.', 'Tue, 17 Mar 2015 14:56:58 PM'),
(6, 'Asafuddol', 'Golap', '01521453003', 'Both 8 am to 12 Noon and 12 Noon to 4 pm', 'golap@gmail.com', 'Rajshahi', '1994-07-16', 'yes', 'Eye Center', 1236, '2015-03-25', '09:00 AM', 'NoDisease', 'Tue, 17 Mar 2015 16:15:54 PM'),
(7, 'Asafuddol', 'Golap', '01521453003', 'Both 8 am to 12 Noon and 12 Noon to 4 pm', 'golap@gmail.com', 'Rajshahi', '1994-07-16', 'yes', 'Eye Center', 1236, '2015-03-25', '09:00 AM', 'NoDisease', 'Tue, 17 Mar 2015 16:16:04 PM'),
(8, 'Asafuddol', 'Golap', '01521453003', 'Both 8 am to 12 Noon and 12 Noon to 4 pm', 'golap@gmail.com', 'Rajshahi', '1994-07-16', 'yes', 'Eye Center', 1236, '2015-03-25', '09:00 AM', 'NoDisease', 'Tue, 17 Mar 2015 16:16:12 PM'),
(9, 'dsfssa', 'dsadsa', '45454354354', '12 Noon to 4 pm', 'ddilsadur@yahoo.com', 'sdsadsa', '2015-03-25', 'yes', 'Diabetes', 1530, '2015-03-25', '12:00 PM', 'sadsadas', 'Wed, 18 Mar 2015 06:24:18 AM'),
(10, 'dsfs', 'df', '45454354354', '8 am to 12 Noon', 'ddilsadur@yahoo.com', 'asdas', '2015-03-25', 'yes', 'Diabetes', 1530, '2015-03-26', '01:00 PM', 'sadsa', 'Wed, 18 Mar 2015 06:25:11 AM');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE IF NOT EXISTS `comment_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userComment` varchar(1500) NOT NULL,
  `imageLink` varchar(300) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `userName`, `email`, `userComment`, `imageLink`, `date`) VALUES
(23, 'Montasir Dipto', 'diptomontasir@gmail.com', 'amar sonar bangla', 'upload/1425309981IMG_20150213_140545.jpg', 'Sun, 15 Mar 2015, 10:00:55 AM'),
(35, 'Abdul Aziz', 'mdabdulaziz1994@gmail.com', 'Amar sonar bangla ami tomay valobasiAmar sonar bangla ami tomay valobasiAmar sonar bangla ami tomay valobasiAmar sonar bangla ami tomay valobasiAmar sonar bangla ami tomay valobasi', 'upload/1425670554admin.JPG', 'Tue, 17 Mar 2015, 19:06:39 PM');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE IF NOT EXISTS `doctor_table` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `clinicalInterest` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `medicalCollege` varchar(200) NOT NULL,
  `residence` varchar(200) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `idNumber` int(11) NOT NULL,
  `speciality` varchar(100) NOT NULL,
  `appointmentPerDay` int(11) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `birthDate` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `imageLink` varchar(300) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`name`, `email`, `password`, `clinicalInterest`, `title`, `medicalCollege`, `residence`, `certification`, `idNumber`, `speciality`, `appointmentPerDay`, `mobileNo`, `birthDate`, `gender`, `imageLink`, `date`) VALUES
('Dolon', 'ddilsadur@yahoo.com', 'dolon', 'Surgery', 'Professor, Dhaka Medical College', 'Dhaka Medical College', 'Thakurgaon', 'Surgery', 1530, 'Colon and Rectal', 90, '01751389111', '1994-07-19', 'Male', 'upload/1426271921photo0199.jpg', 'Fri, 13 Mar 2015 19:38:41 PM'),
('Montasir Dipto', 'diptomontasir@gmail.com', '12345', 'medicine', 'Assistant professor, Rangpur Medical college', 'Rangpur Medical College', 'Rangpur', 'medicine', 1237, 'Medicine', 100, '01718268856', '1994-10-02', 'Male', 'upload/1425309981IMG_20150213_140545.jpg', 'Mon, 02 Mar 2015 16:26:21 PM'),
('Assafuddoula Golap ', 'golap@gmail.com', '12345', 'Medicine', 'Student,KUET', 'KUET(KMC)', 'Rajshahi', 'Medine', 1235, 'Colon and Rectal', 5, '01521453003', '1994-07-16', 'Male', 'upload/1425121761IMG_5515.JPG', 'Sat, 28 Feb 2015 12:09:21 PM'),
('Masum Al Mesabah', 'masumcpscr12@gmail.com', '12345', 'Medicine', 'Professor,Dhaka Medical College', 'Dhaka Medical College', 'Khamarpara, Rangpur', 'Medicine', 1236, 'Medicine', 15, '01770900052', '1994-01-05', 'Male', 'upload/14251429691891281_252205841625357_1792255284_n.jpg', 'Sat, 28 Feb 2015 18:02:49 PM'),
('Abdul Aziz Sorkar', 'mdabdulaziz1994@gmail.com', '123', 'surgery', 'Student', 'KUET Medical Center', 'Dewanganj, Jamalpur', 'Sugery', 1234, 'Endoscopy', 5, '01753258105', '1994-11-15', 'Male', 'upload/1425103427AAS.JPG', 'Sat, 28 Feb 2015 07:03:47 AM');

-- --------------------------------------------------------

--
-- Table structure for table `patients_table`
--

CREATE TABLE IF NOT EXISTS `patients_table` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `birthDate` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `imageLink` varchar(300) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_table`
--

INSERT INTO `patients_table` (`firstName`, `lastName`, `email`, `userName`, `password`, `mobileNo`, `birthDate`, `gender`, `imageLink`, `date`) VALUES
('Abdul', 'Aziz', 'admin@gmail.com', 'admin', '123', '01753258105', '1994-11-15', 'Male', 'upload/1425491415admin.JPG', 'Wed, 04 Mar 2015 18:50:15 PM'),
('Asafuddola', 'Golap', 'golap@gmail.com', 'Golap', 'asd', '01521453003', '1994-07-16', 'Male', 'upload/1426611263IMG_2845.JPG', 'Tue, 17 Mar 2015 17:54:23 PM'),
('Masum', 'Mesbah', 'masum@gmail.com', 'Masum', 'masum', '01770900052', '1994-01-05', 'Male', 'upload/1426618956IMG_3310.JPG', 'Tue, 17 Mar 2015 20:02:36 PM'),
('Abdul', 'Aziz', 'mdabdulaziz1994@gmail.com', 'Abdul Aziz Sorkar', '12345', '01753258105', '1994-11-15', 'Male', 'upload/1425670554admin.JPG', 'Fri, 06 Mar 2015 20:35:54 PM');

-- --------------------------------------------------------

--
-- Table structure for table `upload_table`
--

CREATE TABLE IF NOT EXISTS `upload_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toFile` varchar(100) NOT NULL,
  `fromFile` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `fileLink` varchar(300) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `upload_table`
--

INSERT INTO `upload_table` (`id`, `toFile`, `fromFile`, `category`, `description`, `fileLink`, `date`) VALUES
(2, 'mdabdulaziz1994@gmail.com', 'admin@gmail.com', 'prescription', 'from me', 'upload/1426413014a.docx', 'Sun, 15 Mar 2015 10:50:14 AM'),
(3, 'golap@gmail.com', 'admin@gmail.com', 'report', ' It is your Report file.', 'upload/1426623191NML_3.docx', 'Tue, 17 Mar 2015 21:13:11 PM'),
(4, 'masum@gmail.com', 'mdabdulaziz1994@gmail.com', 'prescription', ' It is a prescription.', 'upload/1426624147IMG_2863.JPG', 'Tue, 17 Mar 2015 21:29:07 PM'),
(5, 'mdabdulaziz1994@gmail.com', 'mdabdulaziz1994@gmail.com', 'prescription', ' it is a preds', 'upload/1426661223a.docx', 'Wed, 18 Mar 2015 07:47:03 AM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
