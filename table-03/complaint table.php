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
$sql = "SELECT name, email, complaint, studentemail FROM complaints";
$result = $conn->query($sql);


// Check for SQL errors
if (!$result) {
    die("Error: " . $conn->error);
}
// Generate the HTML table rows dynamically
$tableRows = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"];
        $complaint = $row["complaint"];
        $studentemail = $row["studentemail"];
        
        $tableRows .= "<tr>";
        $tableRows .= "<td>$name</td>";
        $tableRows .= "<td>$email</td>";
        $tableRows .= "<td>$complaint</td>";
        $tableRows .= "<td>$studentemail</td>";
        $tableRows .= "</tr>";
    }
} else {
    $tableRows = "<tr><td colspan='4'>No data available</td></tr>";
}

// Close the database connection
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <title>Complaints</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2 class="heading-section" style="text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: 400%; color: #005EB2;"><b>Complaint List</b></h2>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="../adminloginOpt.html" class="btn btn-primary">BACK</a></h4>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                            <th>Name</th>
					        <th>Email</th>
					         <th>Complaint</th>
					        <th>Complaint On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $tableRows; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>