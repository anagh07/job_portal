select email 
from user 
where email = 'JamesAlfred@france.com';


select * 
from user 
where user_ID = 1;


-- Get all category names
SELECT * FROM job_category;


select category_name 
from job_category 
where category_id = 2;


-- Select all jobs with their catagory names
SELECT job_listing.*, job_category.category_name AS c_name 
FROM job_listing 
INNER JOIN job_category
ON job_listing.category_id = job_category.category_id
ORDER BY job_listing.post_date DESC;

-- Select jobs by a category
SELECT job_listing.*, job_category.category_name AS c_name 
FROM job_listing 
    INNER JOIN job_category
    ON job_listing.category_id = job_category.category_id
WHERE job_listing.category_id = $category
ORDER BY job_listing.post_date DESC;

-- user login
SELECT email, login_password FROM user WHERE email = :u_email;

-- user signup
INSERT INTO user (first_name, last_name, phone, email, login_password, regist_date) 
VALUES (:first_name, :last_name, :phone, :email, :login_password, CURDATE());

-- employer login
SELECT email, login_password FROM employer WHERE email = :e_email

-- employer signup
INSERT INTO employer (employer_name, emp_description, phone, email, login_password, regist_date) 
VALUES (:employer_name, :emp_description, :phone, :email, :login_password, CURDATE());

select * 
from job_listing 
where category_id = 1;


select * 
from job_listing 
where job_id = 2;


INSERT INTO  application()
VALUES (6, 2, '2020-08-04'); 

UPDATE user
SET first_name = 'Schmidt'
WHERE user_ID = 1;

UPDATE user
SET last_name = 'Joseph'
WHERE user_ID = 1;

UPDATE user
SET country = 'France'
WHERE user_ID = 1;

UPDATE user
SET phone = 0015678769856
WHERE user_ID = 1;

UPDATE user
SET email = 'Joseph@gmail.com'
WHERE user_ID = 1;

UPDATE user
SET interest = 'traveling'
WHERE user_ID = 1;

UPDATE user
SET skill = 'Diving'
WHERE user_ID = 1;

UPDATE user
SET current_employer = 'Microsoft'
WHERE user_ID = 1;

UPDATE user
SET graduation_date = '2003-12-15'
WHERE user_ID = 1;

UPDATE user
SET regist_date = '2008-10-15'
WHERE user_ID = 1;

UPDATE user
SET login_name = 'JoeFredMotors'
WHERE user_ID = 1;

UPDATE user
SET login_password = 'Joexxxzzzr'
WHERE user_ID = 1;

UPDATE user_categorized
SET user_category = 'Gold'
WHERE user_ID = 1;

select job_listing.job_ID, job_description, post_date, start_date, salary, application_date
from job_listing, application
where job_listing.job_ID = application.job_ID AND user_ID = 3;

select employer_name, job_title, job_description, job_offer.salary, offer_date
from offers, job_offer, job_listing, posts, employer
where user_ID = 4 AND offers.job_ID = job_offer.job_ID AND offers.job_ID = job_listing.job_ID AND offers.job_ID = posts.job_ID AND posts.employer_ID = employer.employer_ID;

DELETE FROM application WHERE user_ID = 1;

DELETE FROM job_offer WHERE user_ID = 1;

DELETE FROM user WHERE user_ID = 1;

DELETE FROM job_listing WHERE job_ID = 1;

INSERT INTO job_offer ()
VALUES (1, 43000, '2020-10-01', '2020-09-15');

select first_name, last_name, job_title
from user, application, job_listing
where job_listing.job_ID = 1 AND user.user_ID = application.user_ID AND application.job_ID = job_listing.job_ID;

INSERT INTO user ()
VALUES (6, 'Foreman', 'Tyson', 'Canada', 0018434067734, 'Foreman201@gmail.com', 'trial2', 'trainer', 'Boxing Federation', '1995-05-12', '1990-01-12', 'ForTyson', 'lIvEbOxInG'); 

INSERT INTO employer (employer_ID, employer_name, emp_description, emp_specialization, country, phone, email, regist_date, login_name, login_password)
VALUES (6, 'Houston Traders', 'Games dealer', 'sells latest computer games', 'Canada', 0011957463297, 'Games_dealer@gmail.com', '1980-01-20', 'Games_dealer', 'V2Pgthhy');


INSERT INTO admin ()
VALUES (6, 'Kinsley', 'Raymond', 'Canada', 0018430087363, 'Raymond@ygmail.com', 'Raybam', 'tryhyehdjud'); 



