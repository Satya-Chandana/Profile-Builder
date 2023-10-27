<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the updated details from the form submission
    $name = $_POST['name'];
    $username = $_POST['username']; // Assuming this is the current username
    $email = $_POST['email']; // Assuming this is the current email
    $major = $_POST['major'];
    // $academicachievements = $_POST['academicachievements'];
    // $graduationdate = $_POST['graduationdate'];
    $certifications = $_POST['certifications'];
    $projects = $_POST['projects'];
    $workexperience = $_POST['workexperience'];
    $researchexperience = $_POST['researchexperience'];
    $technicalskills = $_POST['technicalskills'];
    $areaofinterest = $_POST['areaofinterest'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'signup');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connection_error);
    } else {
        // Update faculty details in the database
        $stmt = $conn->prepare("UPDATE facultydetails SET name = ?, major = ?, certifications = ?, projects = ?, workexperience = ?, researchexperience = ?, technicalskills = ?, areaofinterest = ? WHERE username = ?");
        if (!$stmt) {
            die('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("sssssssss", $name, $major, $certifications, $projects, $workexperience, $researchexperience, $technicalskills, $areaofinterest, $username);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Faculty details updated successfully
            // echo "Faculty details updated successfully.";
                            // Redirect to the profile page with the fetched data as URL parameters
                            $redirectUrl = "faculty_profile_fac.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&major=" . "&certifications=" . urlencode($certifications). "&projects=" . urlencode($projects). "&workexperience=" . urlencode($workexperience). "&researchexperience=" . urlencode($researchexperience). "&technicalskills=" . urlencode($technicalskills). "&areaofinterest=" . urlencode($areaofinterest);
                            header("Location: " . $redirectUrl);
                            exit();
        } else {
            // No changes made to the faculty details
            echo "No changes were made to the Faculty details.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
