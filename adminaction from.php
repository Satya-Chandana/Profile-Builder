<!DOCTYPE html>
<html>
<head>
  <title>Issue Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    h1 {
      text-align: center;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #ffffff;
      border: 1px solid #dddddd;
      border-radius: 25px;
      box-shadow: 0px 24px 45px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #dddddd;
      border-radius: 5px;
      box-sizing: border-box;
      resize: vertical;
    }

    textarea {
      height: 120px;
    }

    input[type="submit"] {
      background-color: #4cadaf;
      color: #ffffff;
      padding: 15px 25px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #4582a0;
    }

    input[type="button"] {
      background-color: #4cadaf;
      color: #ffffff;
      padding: 15px 25px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="button"]:hover {
      background-color: #4582a0;
    }
  </style>
</head>
<body>
  
  <br><br>
  <br><br>
  <br><br>
  <div class="container">
    <h1>Action Form</h1>
  
    <form action="send.php" method="POST">
      <label for="name">Username of the user:</label>
      <input type="text" id="name" name="name" required><br><br>
    
      <label for="email">Mailid of the user:</label>
      <input type="email" id="email" name="email" required><br><br>
    
      <label for="issue">Specify the message that you're going to send:</label>
      <textarea id="issue" name="issue" rows="5" placeholder="Type here" required></textarea><br><br>
    
      <input type="submit" value="Mail" name="Mail">
      <input type="button" value="Back" onclick="window.location.href = 'student_profile_students.php';">

    </form>
  </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['issue'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $issue = $_POST['issue'];

        // Compose the email message
        $to = $email;
        $subject = 'Issue Submission';
        $message = "Hello $name,\n\nThank you for submitting your issue. Here is the message you provided:\n\n$issue";
        $headers = "From: your_email@example.com"; // Replace with your email address or domain

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "<p>Email sent successfully!</p>";
        } else {
            echo "<p>Failed to send email.</p>";
        }
    }
}
?>

</body>
</html>
