USE minor;

--
-- Table structure for table `forum_categories`
--

CREATE TABLE IF NOT EXISTS `forum_categories` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
)AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Test Category One', 'This is the first test category', '2013-10-02 12:04:03', 'Burhanuddin Bhopal Wala'),
(2, 'Random Forum', 'This is a Random Forum category', '2013-10-02 12:09:48', 'Aryan Jadon'),
(3, 'New_category', 'Any New topic', '2013-10-03 00:00:00', 'Prachi Mem');

