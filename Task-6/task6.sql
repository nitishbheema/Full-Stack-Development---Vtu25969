USE fullstack1;

-- LOG TABLE
DROP TABLE IF EXISTS activity_log;
CREATE TABLE activity_log (
  log_id INT AUTO_INCREMENT PRIMARY KEY,
  table_name VARCHAR(50),
  operation VARCHAR(20),
  record_id INT,
  action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- SAMPLE TABLE (if not already present)
-- Using student table from previous tasks

-- TRIGGER: AFTER INSERT
DROP TRIGGER IF EXISTS student_insert_log;
DELIMITER $$
CREATE TRIGGER student_insert_log
AFTER INSERT ON student
FOR EACH ROW
BEGIN
  INSERT INTO activity_log (table_name, operation, record_id)
  VALUES ('student', 'INSERT', NEW.id);
END$$
DELIMITER ;

-- TRIGGER: AFTER UPDATE
DROP TRIGGER IF EXISTS student_update_log;
DELIMITER $$
CREATE TRIGGER student_update_log
AFTER UPDATE ON student
FOR EACH ROW
BEGIN
  INSERT INTO activity_log (table_name, operation, record_id)
  VALUES ('student', 'UPDATE', NEW.id);
END$$
DELIMITER ;

-- VIEW: DAILY ACTIVITY REPORT
DROP VIEW IF EXISTS daily_activity_report;
CREATE VIEW daily_activity_report AS
SELECT 
  DATE(action_time) AS activity_date,
  table_name,
  operation,
  COUNT(*) AS total_actions
FROM activity_log
GROUP BY DATE(action_time), table_name, operation;
-- Test the Trigger (RUN IN SQL)
-- INSERT test
INSERT INTO student (name,email,dob,department,phone)
VALUES ('Test User','testuser@mail.com','2001-01-01','CSE','9999999999');

-- UPDATE test
UPDATE student SET phone='8888888888'
WHERE email='testuser@mail.com';
--Check Logs (SQL)
SELECT * FROM activity_log;
--4️ View Daily Report (SQL)
SELECT * FROM daily_activity_report;
