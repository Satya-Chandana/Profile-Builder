<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form values
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    // $gender = $_POST['gender'];
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
        $checkQuery = "SELECT * FROM facultydetails WHERE username = '$username' OR email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);
    
        if (mysqli_num_rows($checkResult) > 0) {
            // Username or email already exists in the database
            echo "Username or email already exists. Please choose a different one.";
        } 

       else{
        $stmt = $conn->prepare("INSERT INTO facultydetails (name, username, email, major, certifications, projects, workexperience, researchexperience, technicalskills, areaofinterest) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die('Error in preparing statement: ' . $conn->error);
        }

        $stmt->bind_param("ssssssssss", $name, $username, $email, $major, $certifications, $projects, $workexperience, $researchexperience, $technicalskills, $areaofinterest);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $redirectUrl = "faculty_profile_fac.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&major=" . urlencode($major). "&certifications=" . urlencode($certifications). "&projects=" . urlencode($projects). "&workexperience=" . urlencode($workexperience). "&researchexperience=" . urlencode($researchexperience). "&technicalskills=" . urlencode($technicalskills). "&areaofinterest=" . urlencode($areaofinterest);
            header("Location: " . $redirectUrl);
        } else {
            echo "Error in saving profile.";
        }

        $stmt->close();
        $conn->close();
    }
}}
?>
