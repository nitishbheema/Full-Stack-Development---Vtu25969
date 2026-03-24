-- Create Tables
CREATE TABLE customers (
    cid INT PRIMARY KEY AUTO_INCREMENT,
    cname VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE products (
    pid INT PRIMARY KEY AUTO_INCREMENT,
    pname VARCHAR(100),
    price DECIMAL(10,2)
);

CREATE TABLE orders (
    oid INT PRIMARY KEY AUTO_INCREMENT,
    cid INT,
    pid INT,
    quantity INT,
    order_date DATE,
    FOREIGN KEY (cid) REFERENCES customers(cid),
    FOREIGN KEY (pid) REFERENCES products(pid)
);

-- Insert sample data
INSERT INTO customers VALUES (1,'Ravi','ravi@mail.com'),(2,'Meena','meena@mail.com');
INSERT INTO products VALUES (1,'Laptop',55000),(2,'Phone',25000),(3,'Tablet',18000);
INSERT INTO orders VALUES (1,1,1,2,'2024-01-10'),(2,1,2,1,'2024-02-15'),(3,2,3,3,'2024-03-05');

-- Customer order history using JOIN
SELECT c.cname, p.pname, o.quantity, p.price,
       (o.quantity * p.price) AS total_amount, o.order_date
FROM orders o
JOIN customers c ON o.cid = c.cid
JOIN products p ON o.pid = p.pid
ORDER BY o.order_date DESC;

-- Highest value order (subquery)
SELECT c.cname, p.pname, (o.quantity * p.price) AS amount
FROM orders o
JOIN customers c ON o.cid = c.cid
JOIN products p ON o.pid = p.pid
WHERE (o.quantity * p.price) = (
    SELECT MAX(q.quantity * pr.price)
    FROM orders q
    JOIN products pr ON q.pid = pr.pid
);

-- Most active customer (most orders)
SELECT c.cname, COUNT(o.oid) AS order_count
FROM orders o
JOIN customers c ON o.cid = c.cid
GROUP BY c.cname
ORDER BY order_count DESC
LIMIT 1;
