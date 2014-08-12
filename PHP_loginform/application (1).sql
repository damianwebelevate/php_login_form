-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 02:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorised_users`
--

CREATE TABLE IF NOT EXISTS `authorised_users` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'if new user increment',
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `authorised_users`
--

INSERT INTO `authorised_users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'Damian', 'O''Rourke', 'damian@damian.com', '', 'Damian'),
(2, 'John', 'Gaynor', 'john@john.com', '', 'John'),
(3, 'John', 'Doe', 'john@doe.com', 'jdoe', '*973553778529CD82C3430103A4B95E9666D37DC3'),
(4, 'Jane', 'Doe', 'jane@doe.com', 'janedoe', '*FE4F2D624C07AAEBB979DA5C980D0250C37D8F63'),
(5, 'Damian', 'O''Rourke', 'damiano_rourke@hotmail.com', 'damo', '*84F2944DDF7CAC769127EB7746D37D399ED693AD'),
(10, 'John', 'Doran', 'jdoran@somewhere.com', 'jdoran', 'jdoran'),
(11, 'David', 'Johnson', 'djohnson@somewhere.com', 'djohnson', 'djohnson'),
(12, 'damian', 'redmond', 'damo@asldkfj.com', 'aklsdfj', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19'),
(14, 'work', 'work', 'work@work.com', 'work', '*27D57276AC96BEA22D05B92B91E2CDB3FD0A2226'),
(15, 'work', 'work', 'working@working.com', 'work', '*27D57276AC96BEA22D05B92B91E2CDB3FD0A2226'),
(16, 'work', 'work', 'workingorder@workingorder.com', 'work', '*27D57276AC96BEA22D05B92B91E2CDB3FD0A2226'),
(21, 'freddy', 'freddy', 'freddy@freddy.com', 'freddy', '*78C17FBE33BCD76AD5204F7521742FC2300B6A7C'),
(22, 'freddy', 'freddy', 'freddydude@freddy.com', 'freddy', '*78C17FBE33BCD76AD5204F7521742FC2300B6A7C'),
(25, 'asdfkl', 'askldfj', 'asdklfj@laskdfj.com', 'alskdf', 'asdlfkj'),
(26, 'asdfkl', 'askldfj', 'laskdfjladfkj@laskdfj.com', 'alskdf', 'asdlfkj'),
(30, 'friand', 'kasdfli', 'asdsdfklj@asldfkj.com', 'asdklfj', '*288CAC5A9F4E53A9DCEA23A3EDCE42C695CF48B9'),
(31, 'friand', 'kasdfli', 'real@asldfkj.com', 'asdklfj', '*288CAC5A9F4E53A9DCEA23A3EDCE42C695CF48B9'),
(32, 'asdfkl', 'askldfj', 'myrmsil@asldfkj.com', 'alskdf', '*4B4B0014F54FA9951CEACB11E56285669959E9AD'),
(33, 'francis', 'francis', 'francis@francis.com', 'francis', '*5093DD277DF0AC365E92232D0577F928157DE1E6'),
(34, 'granny', 'smith', 'granny@smith.com', 'granny', '*AB217C9B4D2EFC8BABED9AA32E329131AF3E42F8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
