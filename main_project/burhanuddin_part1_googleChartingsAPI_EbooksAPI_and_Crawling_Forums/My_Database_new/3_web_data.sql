USE minor;

--
-- Table structure for table web_data
--
CREATE TABLE IF NOT EXISTS web_data (
  m_id int(11) DEFAULT NULL,
  name varchar(20),
  id int(11) DEFAULT NULL
) ;

--
-- Dumping data for table web_data
--

INSERT INTO web_data (m_id, name, id) VALUES
(1, 'WELCOME', 23),
(2, 'PLACEMENT', 23),
(3, 'ASSURED', 23),
(4, 'Login', 23),
(5, 'Profile', 23),
(6, 'Logout', 23),
(7, 'Home', 23),
(8, 'Today In History', 23),
(9, 'Gallery', 10),
(10, 'Images', 11),
(11, 'Videos', 11),
(12, 'Resources', 11),
(13, 'Papers', 11),
(14, 'Other Websites', 11),
(15, 'Login', 11),
(16, 'Register', 11),
(17, 'Forum by burhan', 11),
(18, 'Stay in Touch', 23),
(19, 'To get the information &amp; stuffs going within our website', 23),
(20, 'OR FOLLOW US', 16),
(21, 'Burhanuddin Bhopal Wala', 17),
(22, 'Prachi', 18),
(23, 'Shubham', 19),
(24, 'Aryan', 20),
(NULL, 'Time Line', NULL),
(NULL, 'Search Web', NULL),
(25, 'Time Line', 20),
(26, 'Search Web', 20),
(30, 'Companies', 20),
(31, 'Profile', 20),
(32, 'Edit Details', 20),
(33, 'Latest Vacancies', 20),
(34, 'Online Chat', 20),
(35, 'Today in Placements', 20),
(36, 'Burhanuddin', 20);