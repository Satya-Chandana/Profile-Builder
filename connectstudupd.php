<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the username from the form submission
    $username = $_POST['username'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'signup');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connection_error);
    } else {
        // Retrieve the user's details from the database
        $stmt = $conn->prepare("SELECT * FROM studentdetails WHERE username = ?");
        if (!$stmt) {
            die('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found in the database
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $major = $row['major'];
            $academicachievements = $row['academicachievements'];
            $graduationdate = $row['graduationdate'];
            $certifications = $row['certifications'];
            $projects = $row['projects'];
            $workexperience = $row['workexperience'];
            $researchexperience = $row['researchexperience'];
            $technicalskills = $row['technicalskills'];
            $areaofinterest = $row['areaofinterest'];

             // Redirect to the profile page with the fetched data as URL parameters
             $redirectUrl = "updstud.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&major=" . urlencode($major). "&academicachievements=" . urlencode($academicachievements). "&graduationdate=" . urlencode($graduationdate). "&certifications=" . urlencode($certifications). "&projects=" . urlencode($projects). "&workexperience=" . urlencode($workexperience). "&researchexperience=" . urlencode($researchexperience). "&technicalskills=" . urlencode($technicalskills). "&areaofinterest=" . urlencode($areaofinterest);
             header("Location: " . $redirectUrl);
             exit();

            // Display the form with the user's details filled

        } else {
            // User not found in the database
            echo "User not found.";
        }
    }
}
?>
