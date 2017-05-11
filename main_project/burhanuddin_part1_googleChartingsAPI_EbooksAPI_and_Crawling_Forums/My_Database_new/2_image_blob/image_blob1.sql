USE minor;

--
-- Table structure for table image_blob
--

CREATE TABLE IF NOT EXISTS image_blob (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  image longblob NOT NULL,
  PRIMARY KEY (id)
) AUTO_INCREMENT=30 ;

--
-- Dumping data for table `image_blob`
--

INSERT INTO image_blob (id, name, image) VALUES
(1, 'top_button.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\top_button.png'),
(2, 'topbar_downbutton1.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar_downbutton1.png'),
(3, 'topbar_downbutton2.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar_downbutton2.png'),
(4, 'topbar_searchbar1.png','C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\topbar_searchbar1.png');
INSERT INTO `image_blob` (`id`, `name`, `image`) VALUES
(5, 'topbar_searchbar2.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\topbar_searchbar2.png'),
(6, 'topbar_questionmark1.png','C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\topbar_questionmark1.png'),
(7, 'topbar_questionmark2.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\topbar_questionmark2.png');
INSERT INTO `image_blob` (`id`, `name`, `image`) VALUES
(8, 'sidebar_logo.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\sidebar_logo.png');
INSERT INTO `image_blob` (`id`, `name`, `image`) VALUES
(9, 'cross.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\topbar\cross.png'),
(10, 'sidebar_leftarrow1.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\sidebar_leftarrow1.png'),
(11, 'sidebar_leftarrow2.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\sidebar_leftarrow2.png'),
(12, 'sidebar_rightarrow1.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\sidebar_rightarrow1.png');
INSERT INTO `image_blob` (`id`, `name`, `image`) VALUES
(13, 'sidebar_rightarrow2.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\sidebar_rightarrow2.png'),
(14, 'facebook1.png', 'C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\facebook1.png');
INSERT INTO `image_blob` (`id`, `name`, `image`) VALUES
(15, 'facebook2.png','C:\xampp\htdocs\burhanuddin-minor\new_images\sidebar\facebook2.png');
