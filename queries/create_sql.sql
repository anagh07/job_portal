DROP DATABASE career_portal;
CREATE database career_portal;
USE career_portal;
CREATE TABLE employer (
    employer_ID int NOT NULL AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    last_name varchar(50),
    emp_specialization varchar(100),
    country varchar(50),
    phone VARCHAR(50),
    email varchar(50) NOT NULL,
    regist_date DATE,
    login_name varchar(50),
    login_password varchar(50) NOT NULL,
    PRIMARY KEY (employer_ID)
);

CREATE TABLE user (
    user_ID int NOT NULL AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    country varchar(50),
    phone varchar(50),
    email varchar(50) NOT NULL,
    interest varchar(50),
    skill varchar(50),
    current_employer varchar(50),
    graduation_date DATE,
    regist_date DATE,
    login_name varchar(50),
    login_password varchar(50) NOT NULL,
    PRIMARY KEY (user_ID)
);

CREATE TABLE admin (
    admin_ID int NOT NULL AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    country varchar(50),
    phone varchar(50),
    email varchar(50),
    login_name varchar(50),
    login_password varchar(50),
    PRIMARY KEY (admin_ID)
);

CREATE TABLE employer_category (
    emp_category varchar(50) NOT NULL,
    charge INT,
    PRIMARY KEY (emp_category)
);

CREATE TABLE user_category (
    user_category varchar(50) NOT NULL,
    charge INT,
    PRIMARY KEY (user_category)
);

CREATE TABLE job_category (
    category_id INT NOT NULL,
    category_name varchar(50),
    PRIMARY KEY (category_id)
);

CREATE TABLE job_listing (
    job_ID int NOT NULL AUTO_INCREMENT,
    job_title varchar(50) NOT NULL,
    job_description varchar(255) NOT NULL,
    no_of_vacancies varchar(50),
    post_date DATE,
    start_date DATE,
    salary INT,
    status varchar(50),
    category_id INT,
    company VARCHAR(255),
    PRIMARY KEY (job_ID),
    FOREIGN KEY (category_id) REFERENCES job_category(category_id)
);

CREATE TABLE job_listing_history (
    job_ID int NOT NULL,
    job_title varchar(50) NOT NULL,
    job_description varchar(50) NOT NULL,
    filling_date DATE,
    PRIMARY KEY (job_ID),
	FOREIGN KEY (job_ID) REFERENCES job_listing(job_ID)
);

CREATE TABLE job_offer (
    job_ID int NOT NULL,
    salary int,
    offer_date DATE,
    deadline DATE,
    PRIMARY KEY (job_ID),
	FOREIGN KEY (job_ID) REFERENCES job_listing(job_ID)
);

CREATE TABLE account (
    account_number int NOT NULL,
    balance int,
    manual_or_auto varchar(50),
    PRIMARY KEY (account_number)
);

CREATE TABLE credit_card_account (
    account_number int NOT NULL,
    card_number int,
    exp_date DATE,
    security_code int,
    PRIMARY KEY (account_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number)    
);

CREATE TABLE checking_account (
    account_number int NOT NULL,
    auth_number int,
    amount int,
    PRIMARY KEY (account_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number)    
);

CREATE TABLE suffering_account (
    account_number int NOT NULL,
    over_balance int,
    over_balance_date DATE,
    PRIMARY KEY (account_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number)    
);

CREATE TABLE manual_payment (
    payment_number int NOT NULL,
    payment_date DATE,
    PRIMARY KEY (payment_number) 
);

CREATE TABLE offers (
    job_ID int NOT NULL,
    user_ID int NOT NULL,
    PRIMARY KEY (job_ID, user_ID),
    FOREIGN KEY (job_ID) REFERENCES job_offer(job_ID),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE accepts (
    job_ID int NOT NULL,
    user_ID int NOT NULL,
    PRIMARY KEY (job_ID, user_ID),
    FOREIGN KEY (job_ID) REFERENCES job_offer(job_ID),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE rejects (
    job_ID int NOT NULL,
    user_ID int NOT NULL,
    PRIMARY KEY (job_ID, user_ID),
    FOREIGN KEY (job_ID) REFERENCES job_offer(job_ID),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE emp_categorized (
    employer_ID int NOT NULL,
    emp_category varchar(50) NOT NULL,
    PRIMARY KEY (employer_ID),
    FOREIGN KEY (employer_ID) REFERENCES employer(employer_ID)
);

CREATE TABLE user_categorized (
    user_ID int NOT NULL,
    user_category varchar(50) NOT NULL,
    PRIMARY KEY (user_ID),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE posts (
    job_ID int NOT NULL,
    employer_ID int NOT NULL,
    PRIMARY KEY (job_ID),
    FOREIGN KEY (job_ID) REFERENCES job_listing(job_ID),
    FOREIGN KEY (employer_ID) REFERENCES employer(employer_ID)
);

CREATE TABLE application (
    job_ID int NOT NULL,
    user_ID int NOT NULL,
    application_date DATE,
    PRIMARY KEY (job_ID, user_ID),
    FOREIGN KEY (job_ID) REFERENCES job_listing(job_ID),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE user_depositor (
    account_number int NOT NULL,
    user_ID int NOT NULL,
    access_date DATE,
    payment_interval int,
    PRIMARY KEY (account_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);

CREATE TABLE employer_depositor (
    account_number int NOT NULL,
    employer_ID int NOT NULL,
    access_date DATE,
    payment_interval int,
    PRIMARY KEY (account_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number),
    FOREIGN KEY (employer_ID) REFERENCES employer(employer_ID)
);

CREATE TABLE pays (
    payment_number int NOT NULL,
    account_number int NOT NULL,
    amount int,
    PRIMARY KEY (payment_number, account_number),
    FOREIGN KEY (payment_number) REFERENCES manual_payment(payment_number),
    FOREIGN KEY (account_number) REFERENCES account(account_number)
);

CREATE TABLE has_skills (
    user_ID int NOT NULL,
    skill varchar(50),
    PRIMARY KEY (user_ID, skill),
    FOREIGN KEY (user_ID) REFERENCES user(user_ID)
);
