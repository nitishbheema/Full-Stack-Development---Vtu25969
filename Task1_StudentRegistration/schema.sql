CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    dob DATE NOT NULL,
    department VARCHAR(50),
    phone VARCHAR(15)
);

INSERT INTO students (name, email, dob, department, phone)
VALUES ('Arun Kumar', 'arun@example.com', '2002-05-12', 'CSE', '9876543210');

SELECT * FROM students;
