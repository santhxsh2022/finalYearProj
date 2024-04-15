<?php
$first = $_POST['first'];
$last  = $_POST['last'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$phno = $_POST['phno'];
$addr = $_POST['addr'];
$cname = $_POST['cname'];
$pin = $_POST['pin'];
$country = $_POST['country'];

if (!empty($first) || !empty($last) || !empty($mail) || !empty($pass)  || !empty($phno) || !empty($addr) || !empty($cname) || !empty($pin) || !empty($country)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    } else {
        // Prepare SELECT query to check for existing records based on 'mail' column
        $SELECT = "SELECT mail FROM register WHERE mail = ? LIMIT 1";

        // Prepare INSERT query to insert new records into the 'register' table
        $INSERT = "INSERT INTO register (first, last, mail, pass, phno, addr, cname, pin, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement for SELECT query
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        // Check if the record already exists
        if ($rnum == 0) {
            // Close the SELECT statement
            $stmt->close();

            // Prepare statement for INSERT query
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssssss", $first, $last, $mail, $pass, $phno, $addr, $cname, $pin, $country);
            $stmt->execute();
            // Close statement
            $stmt->close();
            // Close connection
            $conn->close();
            // Show success alert
            echo '<script>alert("New record inserted successfully"); window.location.href = "index.html";</script>';
            exit();
        } else {
            // Show error alert
            echo '<script>alert("Someone already registered using this email"); window.location.href = "register.html";</script>';
            exit();
        }
    }
} else {
    // Show error alert if fields are empty
    echo '<script>alert("All fields are required"); window.location.href = "register.html";</script>';
    exit();
}
?>
