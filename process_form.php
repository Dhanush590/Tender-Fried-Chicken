<?php
// Database connection parameters
$host = "localhost"; // Change if not running on local server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "contacts"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Show success message and redirect to index.html
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = '/TFC/index.html';
              </script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
