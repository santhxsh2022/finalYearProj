<?php
// Establish connection to MySQL database
$conn = new mysqli("localhost", "root", "", "project");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract form data
$cardholder_name = $_POST['cardholder_name'];
$card_number = $_POST['card_number'];
$expiration_date = $_POST['expiration_date'];
$cvv = $_POST['cvv'];

// Prepare and execute SQL INSERT statement
$stmt = $conn->prepare("INSERT INTO payments (cardholder_name, card_number, expiration_date, cvv) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $cardholder_name, $card_number, $expiration_date, $cvv);

if ($stmt->execute()) {
    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Payment successful, show alert box
    echo '<script>alert("Payment Successful")</script>';

    // Redirect back to the checkout page or any other page
    include 'index.html';
    exit();
} else {
    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Payment failed, show alert box
    echo "<script>alert('Payment Failed');</script>";

    // Redirect back to the checkout page or any other page
    header("Location: checkout_page.php");
    exit();
}
?>
