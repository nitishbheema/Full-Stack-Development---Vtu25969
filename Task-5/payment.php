<?php
$conn = new mysqli("localhost","root","","fullstack1");
$conn->autocommit(false);   // START TRANSACTION

$amount = 2000;             // payment amount
$userId = 1;                // User account_id
$merchantId = 2;            // Merchant account_id

try {
    // Deduct from user
    $deduct = $conn->query(
        "UPDATE accounts 
         SET balance = balance - $amount 
         WHERE account_id = $userId AND balance >= $amount"
    );

    if ($conn->affected_rows != 1) {
        throw new Exception("Insufficient balance");
    }

    // Add to merchant
    $add = $conn->query(
        "UPDATE accounts 
         SET balance = balance + $amount 
         WHERE account_id = $merchantId"
    );

    if ($conn->affected_rows != 1) {
        throw new Exception("Merchant update failed");
    }

    $conn->commit();   // SUCCESS
    echo "Payment Successful";

} catch (Exception $e) {
    $conn->rollback(); // FAILURE
    echo "Payment Failed: " . $e->getMessage();
}

$conn->close();
?>
