USE jobportal;

-- # ----------------------------
INSERT INTO jobs (
    `title`,
    `description`,
    `company`,
    `category_id`
)
VALUES
    ('Junior Developer', 'Build modern web applications. We use the MERN stack.', 'Dev Dreams Inc.', '1'),
    ('Manager', 'Manage a group of engineers to achieve company goals and targeets.', 'Random Company', '2');


-- # ----------------------------
INSERT INTO categories (
    `name`
)
VALUES
    ('technology'),
    ('business');



