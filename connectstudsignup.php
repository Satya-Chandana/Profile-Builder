<?php
       $name = $_POST['name'];
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $gender = $_POST['gender'];

       //Database connection
       $conn = new mysqli('localhost', 'root', '', 'signup');
       if ($conn->connect_error) {
           die('Connection Failed: ' . $conn->connection_error);
       } else {
            $checkQuery = "SELECT * FROM studentsignupdetails WHERE username = '$username' OR email = '$email'";
            $checkResult = mysqli_query($conn, $checkQuery);
        
            if (mysqli_num_rows($checkResult) > 0) {
                // Username or email already exists in the database
                echo "Username or email already exists. Please choose a different one.";
            } 
            else{
                $stmt = $conn->prepare("INSERT INTO studentsignupdetails (name, username, email, password, gender) VALUES (?, ?, ?, ?, ?)");
                if (!$stmt) {
                    die('Error in preparing statement: ' . $conn->error);
                }
            
                $stmt->bind_param("sssss", $name, $username, $email, $password, $gender);
                $stmt->execute();
            
                if ($stmt->affected_rows > 0) {
                    if ($gender === 'female') {
                        // Redirect to female page
                        $redirectUrl = "profile_students.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&gender=" . urlencode($gender);
                        header("Location: " . $redirectUrl);
                    } else {
                        // Redirect to male page
                        $redirectUrl = "profile_students.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&gender=" . urlencode($gender);
                        header("Location: " . $redirectUrl);
                    }
                } else {
                    echo "Error in registration.";
                }
            
                $stmt->close();
                $conn->close();
       }
 
    }
?>