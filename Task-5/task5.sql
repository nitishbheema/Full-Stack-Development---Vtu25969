USE fullstack1;

DROP TABLE IF EXISTS accounts;

CREATE TABLE accounts (
  account_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  balance DECIMAL(10,2)
);

INSERT INTO accounts (name, balance) VALUES
('User', 10000.00),
('Merchant', 5000.00);
