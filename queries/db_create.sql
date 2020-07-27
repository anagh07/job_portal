CREATE DATABASE jobportal;

USE jobportal;

CREATE TABLE jobs (
		`id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `company` VARCHAR(255) NOT NULL,
    `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `category_id` INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE categories (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

DROP table jobs;

