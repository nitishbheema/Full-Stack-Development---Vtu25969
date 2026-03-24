=============================================================
 10211CS224 - Full Stack Application Development
 XAMPP Setup Guide (root / no password)
=============================================================

STEP 1 — START XAMPP
  - Open XAMPP Control Panel
  - Start Apache  (for PHP tasks)
  - Start MySQL   (for all tasks)

STEP 2 — SETUP DATABASE
  - Open browser → http://localhost/phpmyadmin
  - Click "Import" tab
  - Choose file: db_setup.sql (in this folder)
  - Click "Go"
  - This creates the "fullstack_db" database with all tables

STEP 3 — COPY HTML/PHP FILES TO HTDOCS
  Copy these task folders into: C:\xampp\htdocs\FullStackTasks\
    - Task1_StudentRegistration
    - Task2_Dashboard
    - Task3_Login
    - Task7_FeedbackForm

  Then open in browser:
    http://localhost/FullStackTasks/Task1_StudentRegistration/index.html
    http://localhost/FullStackTasks/Task2_Dashboard/dashboard.html
    http://localhost/FullStackTasks/Task3_Login/login.html
    http://localhost/FullStackTasks/Task7_FeedbackForm/feedback.html

  Default login credentials (Task 3):
    Username: admin
    Password: admin123

STEP 4 — SPRING BOOT TASKS (Tasks 8-15)
  These connect to XAMPP MySQL directly. All application.properties
  are already set to: localhost:3306/fullstack_db, root, no password.

  Prerequisites:
    - Java 17+ installed
    - Maven installed
    - XAMPP MySQL running

  To run each Spring Boot task:
    mvn spring-boot:run
  OR import into IntelliJ IDEA / Eclipse and run the main class.

  Spring Boot app URLs:
    Task 10/11/12/13 → http://localhost:8080
    Task 14 Student  → http://localhost:8081
    Task 14 Course   → http://localhost:8082
    Task 15 Eureka   → http://localhost:8761

TASK SUMMARY
  Task1   - Student Registration Form  (.html + .php + .sql)
  Task2   - Dashboard with filter/sort (.html + .php + .sql)
  Task3   - Login with validation       (.html + .php + .sql)
  Task4   - Order Management JOINs     (.sql only)
  Task5   - Transactions COMMIT/ROLLBACK (.sql only)
  Task6   - Triggers & Views           (.sql only)
  Task7   - Feedback Form (JS events)  (.html only - no PHP needed)
  Task8   - Spring Core IoC/DI         (.java)
  Task9   - Spring MVC + Thymeleaf     (.java + .html)
  Task10  - Student CRUD REST API      (.java + application.properties)
  Task11  - JPA Pagination/Sorting     (.java + application.properties)
  Task12  - Product REST API           (.java + application.properties)
  Task13  - Exception Handling         (.java + application.properties)
  Task14  - Microservices              (.java + .properties)
  Task15  - Eureka Discovery           (.java + .properties)

NOTE: For Tasks 4, 5, 6 — run the .sql files directly in phpMyAdmin
=============================================================
