<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);    
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "signup";  

$con = mysqli_connect($host, $user, $password, $db_name);  
if (mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: " . mysqli_connect_error());  
} else {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];  
        $password = $_POST['password'];  

        // To prevent SQL injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql = "SELECT * FROM facultysignupdetails WHERE username = '$username' AND password = '$password'";  

        $result = mysqli_query($con, $sql);  
        $count = mysqli_num_rows($result);  

        if ($count == 1) {
            // Fetch student details
            $sql2 = "SELECT * FROM facultydetails WHERE username = '$username'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

            if ($row2) {
                $name = $row2['name'];
                $email = $row2['email'];
                $major = $row2['major'];
                // $academicachievements = $row2['academicachievements'];
                // $graduationdate = $row2['graduationdate'];
                $certifications = $row2['certifications'];
                $projects = $row2['projects'];
                $workexperience = $row2['workexperience'];
                $researchexperience = $row2['researchexperience'];
                $technicalskills = $row2['technicalskills'];
                $areaofinterest = $row2['areaofinterest'];

                // Redirect to the profile page with the fetched data as URL parameters
                $redirectUrl = "faculty_profile_fac.php?name=" . urlencode($name) . "&username=" . urlencode($username) . "&email=" . urlencode($email) . "&major=" . urlencode($major). "&certifications=" . urlencode($certifications). "&projects=" . urlencode($projects). "&workexperience=" . urlencode($workexperience). "&researchexperience=" . urlencode($researchexperience). "&technicalskills=" . urlencode($technicalskills). "&areaofinterest=" . urlencode($areaofinterest);
                header("Location: " . $redirectUrl);
                exit();
            }  
        } else {  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }
    } else {
        echo "<h1> Login failed. Username and/or password not provided.</h1>";
    }
}
?>
