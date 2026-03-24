-- Create accounts table
CREATE TABLE accounts (
    acc_id INT PRIMARY KEY,
    holder_name VARCHAR(100),
    balance DECIMAL(10,2)
);

INSERT INTO accounts VALUES (101, 'User A', 10000.00), (202, 'Merchant B', 5000.00);

-- Payment Transaction
START TRANSACTION;

SET @user_balance = (SELECT balance FROM accounts WHERE acc_id = 101);

IF @user_balance >= 2000 THEN
    UPDATE accounts SET balance = balance - 2000 WHERE acc_id = 101;
    UPDATE accounts SET balance = balance + 2000 WHERE acc_id = 202;
    COMMIT;
    SELECT 'Payment Successful' AS status;
ELSE
    ROLLBACK;
    SELECT 'Insufficient Balance - Transaction Rolled Back' AS status;
END IF;

-- Verify
SELECT * FROM accounts;
