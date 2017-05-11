USE minor;

-- vacancies table

CREATE TABLE vacancies (
  company_name varchar(15) , 
  vac_number varchar(5),
  PRIMARY KEY (company_name)
);

--
-- Dumping data for table vacancies
--

INSERT INTO vacancies (  company_name , vac_number ) VALUES
('Amazon', '407'),
('Flipkart', '269'),
('Snapdeal', '202'),
('Ebay', '146'),
('Shopclues', '7'),
('Myntra', '123'),
('Jabong', '60'),
('Zomato', '55'),
('Bookmyshow', '50'),
('Goibibo', '20'),
('Freshdesk', '17'),
('Freecharge', '5'),
('Paytm', '61'),
('HackerEarth', '10'),
('Hike', '827');


-- placements table

CREATE TABLE placements (
  company_name varchar(15) , 
  pla_number varchar(5),
  PRIMARY KEY (company_name)
);

--
-- Dumping data for table placements
--

INSERT INTO placements (  company_name , pla_number ) VALUES
('Amazon', '27'),
('Bookmyshow', '20'),
('Shopclues', '18'),
('Snapdeal', '5'),
('Hike', '17'),
('Myntra', '10'),
('Jabong', '16'),
('Zomato', '12'),
('Flipkart', '14'),
('Goibibo', '3'),
('Freshdesk', '7'),
('Freecharge', '5'),
('Paytm', '12'),
('HackerEarth', '9'),
('Ebay', '19');



-- average_salaries table

CREATE TABLE average_salaries (
  company_name varchar(15) , 
  sal_number varchar(5),
  PRIMARY KEY (company_name)
);

--
-- Dumping data for table average_salaries
--

INSERT INTO average_salaries (  company_name , sal_number ) VALUES
('Amazon', '20'),
('Flipkart', '17'),
('Jabong', '14'),
('Snapdeal', '5'),
('Shopclues', '17'),
('Myntra', '10'),
('Hike', '12'),
('Zomato', '9'),
('Ebay', '8'),
('Goibibo', '3'),
('Freshdesk', '7'),
('Freecharge', '5'),
('Paytm', '12'),
('HackerEarth', '9'),
('Bookmyshow', '11');

-- revenue table

CREATE TABLE revenue (
  company_name varchar(15) , 
  rev_number varchar(5),
  PRIMARY KEY (company_name)
);

--
-- Dumping data for table revenue
--

INSERT INTO revenue (  company_name , rev_number ) VALUES
('Amazon', '68.89'),
('Flipkart', '5'),
('Snapdeal', '3.5'),
('Hike', '0.3'),
('Shopclues', '0.5'),
('Myntra', '4.3'),
('Jabong', '4.5'),
('Zomato', '0.8'),
('Bookmyshow', '0.5'),
('Goibibo', '0.2'),
('Freshdesk', '1.7'),
('Freecharge', '0.7'),
('Paytm', '2.1'),
('HackerEarth', '1.0'),
('Ebay', '17.9');

CREATE TABLE location (
  country_name varchar(15) ,
  company_names varchar(30) ,
  company_name varchar(15) , 
  vac_number varchar(15),
  pla_number varchar(15),
  preferred_tech varchar(10),
  PRIMARY KEY (country_name)
);

--
-- Dumping data for table location
--

INSERT INTO location (  country_name , company_names , company_name , vac_number , pla_number , preferred_tech ) VALUES
 ('India', 'India: Amazon , Flipkart , Ebay , Hike , Snapdeal , Zomato','Amazon', '407','27','C#'),
 ('China', 'China: Ebay , Amazon , Zomato','Ebay', '146','19','C Sharp'),
 ('US', 'US: Amazon , Ebay , Paytm ','Amazon','407','27','C#'),
 ('Indonesia', 'Indonesia : Zomato , Ebay , Amazon  ','Zomato','55','12','Java'),    
 ('Brazil', 'Brazil: Paytm , Amazon , Ebay ','Paytm','61','12','php'),
 ('Pakistan', 'Pakistan: Ebay , Amazon , Zomato','Ebay','146','19','C Sharp'),
 ('Nigeria', 'Nigeria : Freshdesk , Ebay , Snapdeal','Freshdesk','17','7','.net'),
 ('Bangladesh', 'Bangladesh: Jabong , Amazon , Paytm','Jabong','60','16','python'), 
 ('Russia', 'Russia: Jabong , Amazon , Ebay , Paytm , Snapdeal','Jabong','60','16','python'),
 ('Japan', 'Japan: Freshdesk , Ebay , Paytm , Zomato','Freshdesk','17','7','.net');
     