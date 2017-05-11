USE minor;

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 3, 1, 'Blah !!\r\nBlah !!\r\nBlah !!Blah !!', '2013-09-27 23:05:51'),
(2, 1, 4, 1, 'When was Latest Technologies', '2013-09-29 18:34:48'),
(3, 2, 3, 1, 'Hey, whaz up', '2013-09-29 18:52:25'),
(4, 1, 4, 1, 'My name is Burhanuddin Bhopal Wala', '2013-09-29 18:53:04'),
(5, 1, 4, 1, 'My name is Burhanuddin Bhopal Wala', '2013-09-29 18:53:52'),
(6, 2, 3, 1, 'Android vs IO ', '2013-09-29 19:15:29'),
(7, 2, 3, 1, 'Java or PHP ', '2013-09-29 19:16:08'),
(8, 2, 3, 1, 'Is Java only sufficient ? ', '2013-09-29 19:16:35'),
(9, 2, 3, 1, 'Is Php only sufficient', '2013-09-29 19:16:55'),
(10, 2, 3, 1, 'Latest cool stipends', '2013-09-29 19:17:12'),
(11, 1, 5, 1, 'dynasties', '2013-09-29 19:17:56'),
(12, 1, 5, 1, 'famous technologies', '2013-09-29 19:18:07'),
(13, 2, 6, 3, 'Need Description', '2013-09-29 18:35:55'),
(14, 2, 6, 3, 'Nothing', '2013-09-29 18:36:01'),
(15, 2, 6, 1, 'Add Description', '2013-09-29 18:36:22'),
(16, 2, 3, 1, 'Anything', '2013-09-29 18:34:46'),
(17, 2, 7, 0, 'Was found in', '2013-10-02 11:47:18'),
(18, 2, 7, 0, '1700', '2013-10-02 11:47:29'),
(19, 1, 5, 0, 'Burhanuddin Bhopal Wala', '2013-10-02 12:14:59'),
(20, 1, 5, 0, 'Burhanuddin Bhopal Wala', '2013-10-02 12:16:47'),
(21, 1, 5, 0, 'Burhanuddin Bhopal Wala', '2013-10-02 12:17:55'),
(22, 1, 5, 0, 'Burhanuddin Bhopal Wala', '2013-10-02 12:18:51'),
(23, 1, 5, 0, 'VS', '2013-10-02 12:20:33'),
(24, 1, 5, 0, 'VS', '2013-10-02 12:21:19'),
(25, 2, 7, 0, 'Java', '2013-10-02 12:20:42'),
(26, 2, 6, 0, 'Php', '2013-10-02 12:22:42'),
(27, 1, 5, 0, 'ABC', '2013-10-02 12:07:34'),
(28, 2, 8, 0, 'Main Companies', '2013-10-02 12:06:29'),
(29, 2, 8, 0, 'Google', '2013-10-02 12:06:46'),
(30, 2, 6, 0, 'Facebook', '2013-10-02 12:09:39'),
(31, 2, 6, 0, 'Amazon.in', '2013-10-02 12:09:48'),
(32, 1, 5, 0, 'flipkart', '2013-10-02 12:04:03');

