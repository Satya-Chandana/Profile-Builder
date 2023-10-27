<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "signup";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the faculty ID is provided in the request
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT * FROM facultydetails WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a matching faculty is found
    if ($result->num_rows > 0) {
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
        $redirectUrl = "../Faculty model.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&major=" . urlencode($major). "&academicachievements=" . urlencode($academicachievements). "&graduationdate=" . urlencode($graduationdate). "&certifications=" . urlencode($certifications). "&projects=" . urlencode($projects). "&workexperience=" . urlencode($workexperience). "&researchexperience=" . urlencode($researchexperience). "&technicalskills=" . urlencode($technicalskills). "&areaofinterest=" . urlencode($areaofinterest);
        header("Location: " . $redirectUrl);
        exit();
    } else {
        echo "Faculty not found";
    }
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
