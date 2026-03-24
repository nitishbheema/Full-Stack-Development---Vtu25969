-- Sort by name
SELECT * FROM students ORDER BY name ASC;

-- Sort by DOB
SELECT * FROM students ORDER BY dob DESC;

-- Filter by department
SELECT * FROM students WHERE department = 'CSE';

-- Count students per department
SELECT department, COUNT(*) AS total_students
FROM students
GROUP BY department
ORDER BY total_students DESC;
