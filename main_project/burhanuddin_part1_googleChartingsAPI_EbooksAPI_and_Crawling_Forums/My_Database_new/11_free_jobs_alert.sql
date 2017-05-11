Use minor;

--
-- Table structure for table free_jobs_alert
--

CREATE TABLE IF NOT EXISTS free_jobs_alert (
  id int(11) NOT NULL AUTO_INCREMENT,
  category text NOT NULL , 
  postdate text NOT NULL,
  title1 text NOT NULL,
  title2_main text NOT NULL,
  eligiblity text NOT NULL,
  last_date text NOT NULL,
  href text NOT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT = 0 ;

-- Insertion is Auto

