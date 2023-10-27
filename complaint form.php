<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'signup';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"]; // Changed from "username"
  $email = $_POST["email"];
  $complaint = $_POST["complaint"]; // Changed from "complaint"
  $studentemail = $_POST["studentemail"]; // Added student_email field
 
  // Prepare and bind statement
  $stmt = $conn->prepare("INSERT INTO complaints (name, email, complaint, studentemail) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $complaint, $studentemail);

  // Execute statement
  if ($stmt->execute() === TRUE) {
    // Redirect to comp_sub.html
    header("Location: comp_sub.html");
    exit(); // Terminate the current script
  } else {
    echo "Error submitting complaint: " . $conn->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>