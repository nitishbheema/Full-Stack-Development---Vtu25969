CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);

-- Check credentials (use hashed passwords in production)
SELECT id FROM users WHERE username = 'admin' AND password_hash = MD5('admin123');
