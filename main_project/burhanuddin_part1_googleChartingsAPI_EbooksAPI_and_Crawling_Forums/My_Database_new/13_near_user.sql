USE minor;
DROP TABLE user_near;
--
-- Table structure for table user
--

CREATE TABLE IF NOT EXISTS user_near (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) DEFAULT NULL,
  gm_link varchar(100) DEFAULT NULL,
  fb_link varchar(100) DEFAULT NULL,
  twi_link varchar(100) DEFAULT NULL,
  interest enum('Vacancies','Internships','Guidance','Practice','Buy') NOT NULL DEFAULT 'Vacancies',
  PRIMARY KEY (id)
) AUTO_INCREMENT=0;

--
-- Dumping data for table user
--
INSERT INTO user_near VALUES(1,'Burhanuddin Bhopal Wala' , '','','','Internships');
INSERT INTO user_near VALUES(2,'Aryan Jadon' , '','','','Vacancies');
