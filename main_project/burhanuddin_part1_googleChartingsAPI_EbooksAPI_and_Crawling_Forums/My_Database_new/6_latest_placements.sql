Use minor;

--
-- Table structure for table latest_placements
--

CREATE TABLE IF NOT EXISTS latest_placements (
  id int(11) NOT NULL AUTO_INCREMENT,
  dates date NOT NULL,
  title1 text NOT NULL,
  title2 text NOT NULL,
  href text NOT NULL,
  image_path text NOT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT = 0 ;

-- Insertion is Auto

