Use minor;
DROP TABLE internships ;
--
-- Table structure for table free_jobs_alert
--

CREATE TABLE IF NOT EXISTS internships (
  id int(11) NOT NULL AUTO_INCREMENT,
  category text NOT NULL,
  pincode text NOT NULL,
  link text NOT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT = 0 ;

-- Insertion 
INSERT INTO internships VALUES(1,'engineering','201309','http://www.internships.com/search/posts?Keywords=engineering%2C+architecture&Major_Other_Text=&Location=201309/');
INSERT INTO internships VALUES(2,'engineering','452014','http://www.internships.com/search/posts?Keywords=engineering%2C+architecture&Major_Other_Text=&Location=452014/');
INSERT INTO internships VALUES(3,'marketing','201309','http://www.internships.com/search/posts?Keywords=marketing%2C+architecture&Major_Other_Text=&Location=201309/');
INSERT INTO internships VALUES(4,'marketing','452014','http://www.internships.com/search/posts?Keywords=marketing%2C+architecture&Major_Other_Text=&Location=452014/');
INSERT INTO internships VALUES(5,'biology','781001','http://www.internships.com/search/posts?Keywords=biology%2C+architecture&Major_Other_Text=&Location=781001/');
