USE minor;
--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` varchar(255) NOT NULL,
  `topic_last_user` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(3, 2, 'New Topic', '1', '1', '2013-09-27 23:05:51', '2013-09-29 18:34:46', 20),
(4, 1, 'IT Vacancies', '1', '1', '2013-09-29 18:34:48', '2013-09-29 18:53:52', 5),
(5, 1, 'Latest Technologies', '1', 'Burhanuddin Bhopal Wala', '2013-09-29 19:17:56', '2013-10-02 12:04:03', 17),
(6, 2, 'Our Goals', '3', 'Burhanuddin Bhopal Wala', '2013-09-29 18:35:55', '2013-10-02 12:09:48', 27),
(7, 2, 'Android vs IOs', '0', '0', '2013-10-02 11:47:18', '2013-10-02 12:20:42', 10),
(8, 2, 'Expected Freshers Salary', '', 'Burhanuddin Bhopal Wala', '2013-10-02 12:06:29', '2013-10-02 12:06:46', 4);
