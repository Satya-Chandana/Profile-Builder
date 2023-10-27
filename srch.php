<!DOCTYPE html>
<html>
<head>
    <title>User Search</title>
    <link rel="stylesheet" type="text/css" href="stl.css">
    <style>
        /* Additional CSS styles for search results */
        .user-card {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .user-card h3 {
            margin-bottom: 5px;
            color: #333;
            text-decoration: underline;
            cursor: pointer;
        }

        .user-card p {
            margin: 0;
            color: #333;
        }

        .no-results {
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>User Search</h1>

        <div id="search-container">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <select name="category" id="category-select">
                    <option value="major">Search by Major</option>
                    <option value="projects">Search by Project Title</option>
                    <option value="areaofinterest">Search by Area of Interests</option>
                    <option value="username">Search by Username</option>
                </select>
                <input type="text" name="search" id="search-input" placeholder="Enter your search query">
                <button type="submit" name="submit">Search</button>
            </form>
        </div>

        <div id="search-results">
            <?php
            // Check if the search form is submitted
            if (isset($_POST['submit'])) {
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

                // Get the search category and query
                $category = $_POST['category'];
                $searchQuery = $_POST['search'];

                // Prepare the SQL query
                $sql = "SELECT *, CONCAT('Faculty model stud.php?', 
                'username=', username, 
                '&name=', name, 
                '&major=', major, 
                '&areaofinterest=', areaofinterest,
                '&email=', email,
                
                '&projects=', projects,
                '&certifications=', certifications,
                '&technicalskills=', technicalskills,
                '&researchexperience=', researchexperience,
                '&workexperience=', workexperience
                ) AS profileLink FROM facultydetails WHERE $category LIKE '%$searchQuery%'";           
                $result = $conn->query($sql);
                
                // Check if the query executed successfully
                if ($result === false) {
                    echo "Error executing the query: " . $conn->error;
                    // You can also output additional debugging information if needed
                } else {
                    // Check if records are found
                    if ($result->num_rows > 0) {
                        // Display search results
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="user-card">';
                            echo '<h3><a href="' . $row['profileLink'] . '?name=' . urlencode($row['name']) . '&major=' . urlencode($row['major']) . '&areaofinterest=' . urlencode($row['areaofinterest']) . '&username=' . urlencode($row['username']) . '&email=' . urlencode($row['email']) . '&projects=' . urlencode($row['projects']) . '&certifications=' . urlencode($row['certifications']) . '&technicalskills=' . urlencode($row['technicalskills']) . '&researchexperience=' . urlencode($row['researchexperience']) . '&workexperience=' . urlencode($row['workexperience']) . '">';


                            echo '<p>Name: ' . $row['name'] . '</p>';
                            echo '<p>Major: ' . $row['major'] . '</p>';
                            echo '<p>Skills: ' . $row['areaofinterest'] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="no-results">No results found.</p>';
                    }
                }
            }
            ?>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
