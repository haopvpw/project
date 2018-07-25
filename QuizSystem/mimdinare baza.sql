-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2014 at 06:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(2) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `in_course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'Freshman Autumn Semester'),
(2, 'Freshman Spring Semester'),
(3, 'Sophomore Autumn Semester'),
(5, 'Sophomore Spring Semester');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `faculty_id` int(2) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(100) NOT NULL,
  PRIMARY KEY (`faculty_id`),
  UNIQUE KEY `in_faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_name`) VALUES
(1, 'Computer technologies and engineering'),
(4, 'Business Management Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecturer_number` int(8) NOT NULL,
  `name` varchar(15) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(300) NOT NULL DEFAULT '123',
  PRIMARY KEY (`lecturer_number`),
  UNIQUE KEY `in_lecturer_number` (`lecturer_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturer_number`, `name`, `surname`, `date_of_birth`, `mobile`, `email`, `password`) VALUES
(100, 'Admin', 'Admin', '1994-12-24', '555-55-55-55', 'admin@yahoo.com', '281f11d55583b7435a2b990d86033ef2'),
(111, 'Davit', 'Gigoshvili', '1994-07-24', '551-12-13-14', 'dato_gigoshvili@yahoo.com', 'b8fa49b181fe62023406946e062f4a62'),
(112, 'Gia', 'Dvalishvili', '1970-01-20', '555-12-10-11', 'gia_dvalishvili@yahoo.com', '119548b8c802fa1ca26e11e0604d4564');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(8) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `answer_a` varchar(300) NOT NULL,
  `answer_b` varchar(300) NOT NULL,
  `answer_c` varchar(300) NOT NULL,
  `answer_d` varchar(300) NOT NULL,
  `correct_answer` varchar(300) NOT NULL,
  `point` double NOT NULL,
  `quiz_id` int(8) NOT NULL,
  PRIMARY KEY (`question_id`),
  UNIQUE KEY `in_question_id` (`question_id`),
  KEY `fk_qz_id` (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`, `point`, `quiz_id`) VALUES
(1, 'What is 5*5?', '20', '25', '10', '15', 'b', 1, 1),
(2, 'What is 2^3?', '4', '2', '16', '8', 'd', 1, 2),
(3, 'áƒ áƒáƒ“áƒ˜áƒ¡ áƒ“áƒáƒ˜áƒ‘áƒ”áƒ­áƒ“áƒ áƒžáƒ˜áƒ áƒ•áƒ”áƒšáƒ˜ áƒ¥áƒáƒ áƒ—áƒ£áƒšáƒ˜ áƒ¬áƒ˜áƒ’áƒœáƒ˜?', '1712 áƒ¬', '1629 áƒ¬', '1500 áƒ¬', '1703 áƒ¬', 'b', 1, 3),
(4, 'what is 2-3?', '-1', '2', '3', '4', 'a', 1, 1),
(5, 'whar is (2x+3) derrivative?', '0', '1', '3', '2', 'd', 1, 1),
(6, 'what is derrivative of (4x^2+5x+6)?', '2x+3', '4x+5', '8x+5', '8x', 'c', 1, 1),
(7, 'what is formula of circumference of circuit?', '2pi*r', '4pi*r', 'pi*r', 'pi*2r', 'a', 1, 1),
(8, 'what is area of circus?', 'pi*r^2', 'pi*r', 'pi^2*r', 'r*r', 'a', 1, 1),
(9, 'what is volume of sphere?', '4pi*r^3', '(4*pi*r^3)/3', '4/3*r^3', 'pi*r^3', 'b', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE IF NOT EXISTS `quizs` (
  `quiz_id` int(8) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(30) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  PRIMARY KEY (`quiz_id`),
  UNIQUE KEY `in_quiz_id` (`quiz_id`),
  KEY `fk_std_id_1` (`faculty_id`),
  KEY `fk_subj_id` (`subject_id`),
  KEY `fk_course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`quiz_id`, `quiz_name`, `subject_id`, `faculty_id`, `course_id`) VALUES
(1, 'Quiz1', 1, 1, 1),
(2, 'Quiz2', 1, 1, 1),
(3, 'Quiz1', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `score_id` int(8) NOT NULL AUTO_INCREMENT,
  `student_number` int(8) NOT NULL,
  `quiz_id` int(8) NOT NULL,
  `score` double DEFAULT NULL,
  UNIQUE KEY `in_score_id` (`score_id`),
  KEY `sc_id` (`quiz_id`),
  KEY `st_id` (`student_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `student_number`, `quiz_id`, `score`) VALUES
(1, 11100200, 1, 9),
(2, 11100200, 2, 0),
(3, 11100200, 2, 1),
(4, 11200205, 1, 9),
(5, 11200205, 1, 9.99),
(6, 11200205, 1, 10),
(7, 11200206, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_number` int(8) NOT NULL,
  `name` varchar(15) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `faculty_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  `password` varchar(300) NOT NULL DEFAULT '123',
  PRIMARY KEY (`student_number`),
  UNIQUE KEY `in_student_number` (`student_number`),
  KEY `fk_fac_id` (`faculty_id`),
  KEY `fk_crs_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_number`, `name`, `surname`, `date_of_birth`, `mobile`, `email`, `faculty_id`, `course_id`, `password`) VALUES
(11100200, 'Giorgi', 'Giorgobiani', '1994-06-06', '555-11-12-14', 'gio.giorgobiani@gmail.com', 1, 1, 'a1b3d95de84de9b31e357ae211a1c465'),
(11200204, 'Davit', 'Giorgadze', '1993-01-02', '555-12-10-12', 'dato_giorgadze@yahoo.com', 1, 1, 'b8fa49b181fe62023406946e062f4a62'),
(11200205, 'nana', 'terashvili', '1994-01-22', '599-45-23-53', 'nana_tera@yahoo.com', 1, 1, 'dbc5dba25eae55c25984bf937ae067bb'),
(11200206, 'shota', 'morchiladze', '1994-05-10', '599-22-23-35', 'shota1955@yahoo.com', 1, 1, '5dec4ee18121f1b5c5da5ca403e4779e');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(3) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `credit` int(2) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `course_id` int(2) NOT NULL,
  `lecturer_number` int(8) NOT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `in_subject_id` (`subject_id`),
  KEY `fk_std_id` (`faculty_id`),
  KEY `fk_course_id_1` (`course_id`),
  KEY `fk_lecturer_number` (`lecturer_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `credit`, `faculty_id`, `course_id`, `lecturer_number`) VALUES
(1, 'Calculus I ', 5, 1, 1, 111),
(3, 'Calculus II', 5, 1, 2, 111),
(4, 'Georgian Language I ', 5, 1, 1, 112);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_qz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`quiz_id`);

--
-- Constraints for table `quizs`
--
ALTER TABLE `quizs`
  ADD CONSTRAINT `fk_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fk_std_id_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`),
  ADD CONSTRAINT `fk_subj_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `sc_id` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`quiz_id`),
  ADD CONSTRAINT `st_id` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_crs_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fk_fac_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_course_id_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fk_lecturer_number` FOREIGN KEY (`lecturer_number`) REFERENCES `lecturers` (`lecturer_number`),
  ADD CONSTRAINT `fk_std_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`faculty_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
