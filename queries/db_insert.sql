INSERT INTO employer (employer_ID, employer_name, emp_description, emp_specialization, country, phone, email, regist_date, login_name, login_password)
VALUES (1, 'ABC plc', 'Leader in IT hardwares', '5G Network installation', 'USA', '0017215567891', 'abc@techno.com', '2001-11-15', 'abc_plc', 'abc5GNetwork'); 

INSERT INTO employer (employer_ID, employer_name, emp_description, emp_specialization, country, phone, email, regist_date, login_name, login_password)
VALUES (2, 'Canada plc', 'Geopolitical_thinktanks', 'Advice governments on geopoilics', 'Canada', '0017435567888', 'Canada_Geo@politics.com', '1990-10-10', 'Canada_Geo', '123_456_789'); 

INSERT INTO employer (employer_ID, employer_name, emp_description, emp_specialization, country, phone, email, regist_date, login_name, login_password)
VALUES (3, 'Teachers Academy', 'Part Time Teachers', 'Teach French', 'Canada', '0013231567496', 'Russian.Teacher123@gmail.com','2000-03-12', 'Russian.Teacher123', 'OT3_4W6_GFD'); 

INSERT INTO employer (employer_ID, employer_name, emp_description, emp_specialization, country, phone, email, regist_date, login_name, login_password)
VALUES (4, 'Canada General Hospital', 'Hospital', 'Treats Wounded Patients', 'Canada', '0019431867180', 'CanadaDoctor@gmail.com', '2008-01-08', 'CanadaDoctor','1V6_2AM_G32');

INSERT INTO user ()
VALUES (1, 'James', 'Alfred', 'France', '0017435567888', 'JamesAlfred@france.com', 'abc', 'welder', 'Chase Welding', '2010-05-15', '2006-01-10', 'JAlfred', 'JwelAlfred'); 

INSERT INTO user ()
VALUES (2, 'Will', 'Jeremy', 'Canada', '0013730267678', 'W.Jamie@yahoo.com', 'dvl', 'basketball coach', 'Lakers', '2001-09-25', '1997-04-03', 'JWill', 'ChilejWill'); 

INSERT INTO user ()
VALUES (3, 'Max', 'Ben', 'Canada', '0017496286259', 'MaxBen@Ghana.com', 'zts', 'Driver', 'China Motors', '2014-05-18', '2010-01-23', 'BMax123w', 'MBenGhana'); 

INSERT INTO user ()
VALUES (4, 'Jack', 'Tyler', 'Canada', '0017496286210', 'J_Tyler@Wales.com', 'fls', 'Flight Attendant', 'Emirates Airlines', '2020-01-07', '2016-12-31', 'JTyler34e', 'WalesTJack'); 

INSERT INTO user ()
VALUES (5, 'Adam', 'Kyle', 'Canada', '0015496007830', 'A_Kyle@yahoo.com', 'nxq', 'Mechanic', 'Ferrari', '2020-11-30', '2016-02-04', 'KAdam123', 'BAdamKyle');

INSERT INTO admin ()
VALUES (1, 'Franklin', 'Andrew', 'Canada', '0017437567324', 'FrankAndd@yahoo.com', 'FrankAndrew', 'FAndrewCan'); 

INSERT INTO admin ()
VALUES (2, 'Benjamin', 'Cyril', 'Canada', '0019437887398', 'BenjCy@yahoo.com', 'BenjaminC', 'BenCyrwe_011'); 

INSERT INTO admin ()
VALUES (3, 'Mohammed', 'Khan', 'England', '00449437887398', 'Mohammed2@yahoo.com', 'MohKhan', 'IsInChiUS'); 

INSERT INTO admin ()
VALUES (4, 'Charles', 'Brown', 'Canada', '0019434887398', 'CharlesBr@yahoo.com', 'CharlesBrown', 'RbChrown'); 

INSERT INTO admin ()
VALUES (5, 'Mary', 'Abram', 'Belgium', '0016439787321', 'MaryAbram@ygmail.com', 'MaryAbram', 'ABCMayAb'); 

INSERT INTO employer_category ()
VALUES ('Prime', 50); 

INSERT INTO employer_category ()
VALUES ('Gold', 100); 

INSERT INTO user_category ()
VALUES ('Basic', 0); 

INSERT INTO user_category ()
VALUES ('Prime', 10); 

INSERT INTO user_category ()
VALUES ('Gold', 20); 

INSERT INTO job_category ()
VALUES (1, 'automobile'); 

INSERT INTO job_category ()
VALUES (2, 'medical');

INSERT INTO job_category ()
VALUES (3, 'education');

INSERT INTO job_category ()
VALUES (4, 'agriculture'); 

INSERT INTO job_category ()
VALUES (5, 'technology'), (6, 'engineering'), (7, 'business'), (8, 'entertainment'), (9, 'management'), (10, 'research'), (11, 'sports');


INSERT INTO job_listing ()
VALUES (1, 'Mechanic', 'Toyota cars mechanic', 3, '2020-08-01', '2020-09-01', 60000, 'open', 1, 'Toyota'); 

INSERT INTO job_listing ()
VALUES (2, 'Electrician', 'Refinary plant electrician', 1, '2020-07-22', '2020-08-11', 54000, 'open', 2, 'Electro Co.'); 

INSERT INTO job_listing ()
VALUES (3, 'English Teacher', 'Part Time English Teacher', 1, '2020-06-29', '2020-09-05', 28000, 'open', 3, 'Concordia School'); 

INSERT INTO job_listing ()
VALUES (4, 'Welder', 'Machinery Welder', 2, '2020-07-31', '2020-08-21', 70000, 'open', 2, 'Montreal Machineries'); 

INSERT INTO user_categorized ()
VALUES (1, 'Basic'); 

INSERT INTO user_categorized ()
VALUES (2, 'Prime'); 

INSERT INTO user_categorized ()
VALUES (3, 'Gold'); 

INSERT INTO user_categorized ()
VALUES (4, 'Basic'); 

INSERT INTO application ()
VALUES (1, 2, '2020-08-05');

INSERT INTO application ()
VALUES (3, 2, '2020-08-05');

INSERT INTO application ()
VALUES (1, 1, '2020-08-05');

INSERT INTO application ()
VALUES (2, 3, '2020-08-08');

INSERT INTO application ()
VALUES (3, 3, '2020-07-22');

INSERT INTO job_offer ()
VALUES (3, 76000, '2020-09-21', '2020-09-30');

INSERT INTO job_offer ()
VALUES (2, 56000, '2020-09-01', '2020-09-22');

INSERT INTO job_offer ()
VALUES (1, 43000, '2020-10-01', '2020-09-15');

INSERT INTO offers ()
VALUES (3, 1);

INSERT INTO offers ()
VALUES (3, 2);

INSERT INTO offers ()
VALUES (2, 3);

INSERT INTO offers ()
VALUES (3, 4);

INSERT INTO posts ()
VALUES (1, 1);

INSERT INTO posts()
VALUES (2, 1);

INSERT INTO posts ()
VALUES (3, 3);