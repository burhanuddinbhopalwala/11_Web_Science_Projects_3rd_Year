USE minor;

--
-- Table structure for table user
--

CREATE TABLE IF NOT EXISTS user (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) DEFAULT NULL,
  phone varchar(12) DEFAULT NULL,
  email varchar(30) DEFAULT NULL,
  pass varchar(20) default NULL,
  forum_notification enum('0','1') NOT NULL DEFAULT '1',
  image_u longblob,
  PRIMARY KEY (id)
) AUTO_INCREMENT=0;

--
-- Dumping data for table user
--

-- INSERT INTO user (id, name, phone, email, password, forum_notification, image_u) VALUES
-- (1, 'Burhanuddin Bhopal Wala', '7065168858', 'burhan2survey@gmail.com', '9826852214', '1', NULL);

