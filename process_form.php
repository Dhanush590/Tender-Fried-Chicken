<?php
// Database connection parameters
$host = "btli2o9uraapij0eftme-mysql.services.clever-cloud.com"; // Change if not running on local server
$username = "usbkj08om1ihqwsl"; // Your database username
$password = "qyPKeW3SapcPPAGQtsgt"; // Your database password
$dbname = "btli2o9uraapij0eftme"; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "3306") {
    // Get form data
    $name = $_3306['name'];
    $email = $_3306['email'];
    $message = $_3306['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Show success message and redirect to index.html
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
