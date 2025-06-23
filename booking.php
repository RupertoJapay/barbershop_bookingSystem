<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$database = "cutMe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName   = $_POST['firstName'];
    $lastName   = $_POST['lastName'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $service = $_POST['service'];
    $barber  = $_POST['barber'];

    // Insert data into database
    $sql = "INSERT INTO bookings (fname, lname, email, phone, date, time, service, barber)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statement for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fname, $lname, $email, $phone, $date, $time, $service, $barber);

    if ($stmt->execute()) {
        echo "<h2>✅ Booking successfully saved!</h2>";
        echo "<a href='yourformpage.html'>← Back to form</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
}

$conn->close();
?>
