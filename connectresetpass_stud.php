<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the email from the form submission
    $email = $_POST['email'];

    // Validate the email address (you can add more validation checks if required)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connect to the database
        $host = "localhost";
        $user = "root";
        $password = '';
        $db_name = "signup";

        $con = mysqli_connect($host, $user, $password, $db_name);
        if (mysqli_connect_errno()) {
            die("Failed to connect with MySQL: " . mysqli_connect_error());
        }

        // Escape the email value before using it in the SQL query
        $escapedEmail = mysqli_real_escape_string($con, $email);

        // Check if the email exists in the database
        $sql = "SELECT * FROM studentsignupdetails WHERE email = '$escapedEmail'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // Email exists in the database

            // Generate a random password reset token (e.g., using the bin2hex function)
            $token = bin2hex(random_bytes(32));

            // Store the token in the database

            // Escape the token value before storing it in the database to prevent SQL injection
            $escapedToken = mysqli_real_escape_string($con, $token);

            // Insert the token and associated email into the tokens table
            $sql = "INSERT INTO tokens (email, token) VALUES ('$escapedEmail', '$escapedToken')";
            if (mysqli_query($con, $sql)) {
                // TODO: Send an email to the user with the password reset instructions
                $subject = 'Password Reset';
                $message = 'Please click the following link to reset your password: http://localhost/project/reset_password.php?token=' . $token;
                $headers = 'From: YourWebsite <noreply@example.com>';

                // Uncomment the line below to send the email (ensure your server is properly configured to send emails)
                mail($email, $subject, $message, $headers);

                // Display a success message
                echo "Password reset instructions have been sent to your email address.";
            } else {
                // Error occurred while storing the token
                echo "Error: " . mysqli_error($con);
            }
        } else {
            // Email does not exist in the database
            echo "Email address not found.";
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        // Invalid email address
        echo "Please enter a valid email address.";
    }
}
?>
