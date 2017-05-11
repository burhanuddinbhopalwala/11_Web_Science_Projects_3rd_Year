Use minor;

--
-- Table structure for table mainlinks
--

CREATE TABLE IF NOT EXISTS mainlinks (
  link text,
  keywords text,
  des text,
  counter int(11) DEFAULT NULL
) ;

--
-- Dumping data for table mainlinks
--

-- Insertion for popular cities... 
INSERT INTO mainlinks (link, keywords, des, counter) VALUES
('http://www.jlatest.com/current-jobs-delhi/', 'Delhi','Delhi 2015 Upcoming Govt. Jobs Delhi Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Delhi 2015 in this page; If you are passed class Current Jobs in Delhi12th Board Exam then this page is...', 1),
('http://www.jlatest.com/current-jobs-mumbai/', 'Maharashtra , Mumbai','Mumbai 2015 Upcoming Govt. Jobs Mumbai Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Mumbai 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you All engineering students in Mumbai those are trying to find latest jobs in private and govt. sector jobs in Mumbai this is the page you...', 1),
('http://www.jlatest.com/current-jobs-indore/', 'Madhya Pradesh , Indore','Indore 2015 Upcoming Govt. Jobs Indore Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Indore 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-noida/', 'Uttar Pradesh , Noida','Noida 2015 Upcoming Govt. Jobs Noida Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Noida 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you . All engineering students in Noida those are trying to find latest jobs in private and govt. sector jobs in Noida this is the page you must be looking for. All the students of Noida can get all kind of Upcoming Govt. Job Recruitment Vacancy in Noida 2015 like in banking, teaching, etc...', 1),
('http://www.jlatest.com/current-jobs-bhopal/', 'Madhya Pradesh , Bhopal ','Bhopal 2015 Upcoming Govt. Jobs Bhopal Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Bhopal 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-chennai/', 'Tamil Nadu , Chennai','Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Chennai 2015 in this page; If you are passed class 12th Tamil Nadu Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-kolkata/' , 'West Bengal , Kolkata','We are trying to put all Current Jobs in Kolkata 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you Kolkata 2015 Upcoming Govt. Jobs Kolkata Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs All engineering students in Kolkata those are trying to find latest...', 1),
('http://www.jlatest.com/current-jobs-banglore/', 'Tamil Nadu , Banglore','Bangalore 2015 Upcoming Govt. Jobs Bangalore Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Bangalore 2015 in this page; If you are passed class 12th Board Exam then this page is...', 1),
('http://www.jlatest.com/current-jobs-ahmedabad/', 'Gujarat , Ahmedabad','Ahmedabad 2015 Upcoming Govt. Jobs Ahmedabad Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Ahmedabad 2015 in this page; If you are passed class 12th Board Exam then this page...', 1),
('http://www.jlatest.com/current-jobs-hyderabad/', 'Andhra Pradesh , Hyderabad','Hyderabad 2015 Upcoming Govt. Jobs Hyderabad Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs. We are trying to put all Current Jobs in Hyderabad 2015 in this page; If you are passed class 12th Telangana Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-pune/', 'Maharashtra , Pune','Pune 2015 Upcoming Govt. Jobs Pune Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Pune 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1);

INSERT INTO mainlinks (link, keywords, des, counter) VALUES
('http://www.jlatest.com/current-jobs-gurgaon/', 'Gurgaon,North india','Gurgaon 2015 Upcoming Govt. Jobs Gurgaon Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Gurgaon 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-amritsar/', 'Amritsar,North india','Amritsar 2015 Upcoming Govt. Jobs Amritsar Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Amritsar 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-ghaziabad/', 'Ghaziabad,North india','Ghaziabad 2015 Upcoming Govt. Jobs Ghaziabad Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Ghaziabad 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-agra/', 'Agra,North india','Agra 2015 Upcoming Govt. Jobs Agra Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Agra 2015 in this page; If you are passed class 12th Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-jaipur/', 'Jaipur,North india','Jaipur 2015 Upcoming Govt. Jobs Bhopal Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Bhopal 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you...', 1),
('http://www.jlatest.com/current-jobs-meerut/', 'Meerut,North india','Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Chennai 2015 inMeerut 2015 Upcoming Govt. Jobs Meerut Recruitment 2015 Online Application Form Download Latest Notification on Private Sector Jobs We are trying to put all Current Jobs in Meerut 2015 in this page; If you are passed class 12th Board Exam then this page is valuable for you this page; If you are passed class 12th Tamil Nadu Board Exam then this page is valuable for you...', 1);
