-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2019 at 02:58 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'JAVA'),
(3, 'JAVASCRIPT'),
(4, 'PYTHON'),
(5, 'C#'),
(6, 'HTML'),
(10, 'Professional IT'),
(11, 'Graphics and Animation'),
(12, 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(250) NOT NULL,
  `comment_email` varchar(250) NOT NULL,
  `comment_content` varchar(250) NOT NULL,
  `comment_status` varchar(250) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 7, 'Charity', 'angelcharity2@gmail.com', 'i love you so very much my world', 'Approved', '2018-10-07'),
(3, 2, 'King Arthur', 'kinglyspiritdove@yahoo.com', 'I am madly in love with you Charity', '', '2007-10-18'),
(4, 2, 'King Arthur', 'kinglyspiritdove@yahoo.com', 'I am madly in love with you Charity', '', '2007-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(250) NOT NULL DEFAULT 'draft',
  `post_tags` varchar(250) NOT NULL,
  `post_comment_count` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_status`, `post_tags`, `post_comment_count`) VALUES
(2, 1, 'PHP', 'EZE SUNDAY EZE', '2018-10-04', 'images (6).jfif', 'JavaScript (/?d???v??skr?pt/),[7] often abbreviated as JS, is a high-level, interpreted programming language. It is a language which is also characterized as dynamic, weakly typed, prototype-based and multi-paradigm.\r\n\r\nAlongside HTML and CSS, JavaScript is one of the three core technologies of the World Wide Web.[8] JavaScript enables interactive web pages and thus is an essential part of web applications. The vast majority of websites use it,[9] and all major web browsers have a dedicated JavaScript engine to execute it.\r\n\r\nAs a multi-paradigm language, JavaScript supports event-driven, functional, and imperative (including object-oriented and prototype-based) programming styles. It has an API for working with text, arrays, dates, regular expressions, and basic manipulation of the DOM, but the language itself does not include any I/O, such as networking, storage, or graphics facilities, relying for these upon the host environment in which it is embedded.\r\n\r\nInitially only implemented client-side in web browsers, JavaScript engines are now embedded in many other types of host software, including server-side in web servers and databases, and in non-web programs such as word processors and PDF software, and in runtime environments that make JavaScript available for writing mobile and desktop applications, including desktop widgets. ', 'publish', 'java.javascript.eze', ''),
(7, 4, 'Python', 'King Arthur', '2018-10-03', 'images (10).jfif', 'Abstractâ€” Cloud Computing is a new type of service which provides large scale computing resource to each customer. Cloud Computing systems can be easily threatened by various cyber attacks, because most of Cloud Computing systems provide services to so many people who are not proven to be trustworthy. Therefore, a Cloud Computing system needs to contain some Intrusion Detection Systems(IDSs) for protecting each Virtual Machine(VM) against threats. In this case, there exists a trade-off between the security level of the IDS and the system performance. If the IDS provide stronger security service using more rules or patterns, then it needs much more computing resources in proportion to the strength of security. So the amount of resources allocating for customers decreases. Another problem in Cloud Computing is that, huge amount of logs makes system administrators hard to analyse them. In this paper, we propose a method that enables Cloud Computing system to achieve both effectiveness of using the system resource and strength of the security service without trade-off between them.\r\n', 'draft', 'py,python,arthur,ai', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_firstname` varchar(250) NOT NULL,
  `user_lastname` varchar(250) NOT NULL,
  `user_role` varchar(250) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_role`, `user_email`, `user_image`, `user_date`) VALUES
(1, 'Springjoy', 'dovelylove', 'Charity', 'Ani', 'Admin', 'angelcharity2@gmail.com', 'Charity 20150214_141944.jpg', '2018-10-08'),
(4, 'ifeco', '123456', 'Ifesinachi', 'Nwankwo', 'Subscriber', 'ifeco@gmail.com', 'Chisom class 20150215_171447.jpg', '2018-10-08'),
(5, 'Arthur', 'dovelylove', 'Emmanuel', 'Arinze', 'Admin', 'mailsforanih@gmail.com', 'Selection_003.png', '2018-10-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
