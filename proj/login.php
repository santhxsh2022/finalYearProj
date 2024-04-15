<?php
// Start session
session_start();

// Database connection details
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "project";

// Create connection
$conn = new mysqli($host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email and password are submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from login form
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Prepare and execute SELECT query to check user credentials
    $stmt = $conn->prepare("SELECT * FROM register WHERE mail = ? AND pass = ?");
    $stmt->bind_param("ss", $mail, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User authenticated, redirect to index.html
        $_SESSION['username'] = $mail; // Store username in session for future use
        header("Location: index.html");
        exit();
    } else {
        // Invalid credentials, redirect to login page
        header("Location: login.html");
        exit();
    }
}

// Close database connection
$conn->close();
?>
