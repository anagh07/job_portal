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

-- # ----------------------------
INSERT INTO users (`email`, `password`)
VALUES
    ('test@test.com', '1234'),
    ('user@test.com', '1234');

-- # ----------------------------
INSERT INTO employers (`email`, `password`)
VALUES
    ('admin@test.com', '1234');
