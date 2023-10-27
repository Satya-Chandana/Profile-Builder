<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "signup";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if email and password are set in $_POST
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Sanitize the input to prevent SQL injection
            $email = mysqli_real_escape_string($con, $email);
            $password = mysqli_real_escape_string($con, $password);

            $sql = "SELECT * FROM adminsignindetails WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $count = mysqli_num_rows($result);

                if ($count == 1) {
                    // Redirect to the loginas page with the fetched data as URL parameters
                    $redirectUrl = "adminloginOpt.html?name=" . urlencode($email) . "&email=" . urlencode($password);
                    header("Location: " . $redirectUrl);
                    exit();
                } else {
                    echo "<h1>Login failed. Invalid username or password.</h1>";
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "<h1>Login failed. Please provide email and password.</h1>";
        }
    }
    mysqli_close($con);
}
?>