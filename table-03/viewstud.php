<?php
// Create a connection to the database
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "signup"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data from the database
$sql = "SELECT * FROM studentdetails";
$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("Error: " . $conn->error);
}

// Generate the HTML table rows dynamically
$tableRows = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

        
        $tableRows .= "<tr>";
        $tableRows .= "<td>$name</td>";
        $tableRows .= "<td>$email</td>";
        $tableRows .= "<td>$major</td>";
        $tableRows .= '<td><a href="../student model.php?name=' . urlencode($name) . '&username=' . urlencode($username) . '&email=' . urlencode($email) . '&major=' . urlencode($major) . '&academicachievements=' . urlencode($academicachievements) . '&graduationdate=' . urlencode($graduationdate) . '&certifications=' . urlencode($certifications) . '&projects=' . urlencode($projects) . '&workexperience=' . urlencode($workexperience) . '&researchexperience=' . urlencode($researchexperience) . '&technicalskills=' . urlencode($technicalskills) . '&areaofinterest=' . urlencode($areaofinterest) . '" class="btn btn-primary">Profile</a></td>';

        $tableRows .= "</tr>";
    }
} else {
    $tableRows = "<tr><td colspan='4'>No data available</td></tr>";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<h2 class="heading-section" style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 400%; color: rgb(0, 186, 203);"><b>Students List</b></h2>
<a href="../optionsforadminview.html" class="btn btn-primary">BACK</a></h4>


<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Major</th>
                        <th>Profile Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    echo $tableRows;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
