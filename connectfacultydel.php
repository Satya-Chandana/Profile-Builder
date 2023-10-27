<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "signup";

$con = mysqli_connect($host, $user, $password, $db_name);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the username and email from the form
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Delete user details from facultydetails table
    $sql1 = "DELETE FROM facultydetails WHERE username = '$username' AND email = '$email'";

    // Delete user details from facultysignupdetails table
    $sql2 = "DELETE FROM facultysignupdetails WHERE username = '$username' AND email = '$email'";

    // Execute the queries
    if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2)) {
        // User details deleted successfully from both tables
        header("Location: submitdel.html");
        exit();
    } else {
        // Error occurred while deleting user details
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

