-- Activity log table
CREATE TABLE activity_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    table_name VARCHAR(50),
    operation VARCHAR(10),
    record_id INT,
    log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Trigger: Log every INSERT on students
CREATE TRIGGER after_student_insert
AFTER INSERT ON students
FOR EACH ROW
BEGIN
    INSERT INTO activity_log (table_name, operation, record_id)
    VALUES ('students', 'INSERT', NEW.id);
END;

-- Trigger: Log every UPDATE on students
CREATE TRIGGER after_student_update
AFTER UPDATE ON students
FOR EACH ROW
BEGIN
    INSERT INTO activity_log (table_name, operation, record_id)
    VALUES ('students', 'UPDATE', NEW.id);
END;

-- View: Daily activity report
CREATE VIEW daily_activity_report AS
SELECT DATE(log_time) AS activity_date,
       table_name,
       operation,
       COUNT(*) AS total_operations
FROM activity_log
GROUP BY DATE(log_time), table_name, operation
ORDER BY activity_date DESC;

-- Query the view
SELECT * FROM daily_activity_report;
