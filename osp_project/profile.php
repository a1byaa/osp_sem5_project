<?php
session_start();
$registerNumber = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : null;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_reg";
    $port = 3306;
    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $username,$password,$dbname,$port);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT * FROM  userlog WHERE regID='$registerNumber'";
    
    // Assume $registeredCourses is an array containing registered courses
    $result = $conn->query($sql);
    if($result){
        $value=$result->fetch_assoc();
        if($value){
            $name=$value['fname'];
            $ID=$value['regID'];
            $stdUsNm=$value['UsNm'];
        }
    }
    $c1="SELECT  `c1`, `c2`, `c3` FROM `regcourse` WHERE regID='$registerNumber';";
    $result=$conn->query($c1);
    if ($result) {
        // Fetch the value from the database
        $courseID = $result->fetch_assoc();
    }

    foreach ($courseID as $courses){
        $crs1=$courseID['c1'];
        $crs2=$courseID['c2'];
        $crs3=$courseID['c3'];
    }
    echo $crs1;
    echo $crs2;
    // Assume $registeredCourses is an array containing registered courses
    $sqlin = "SELECT * FROM courselog WHERE code IN ('$crs1', '$crs2','$crs3')";
    $result = $conn->query($sqlin);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ddd;
        }

        .navbar-center {
            margin-left: 400px;
        }

        .navbar-center a {
            margin: 0 15px;
            color: #fff;
        }

        .navbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
        }
        section {
            width: 80%;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
            width: 100%;
            box-sizing: border-box;
            position: fixed;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <h1>Course Registration System</h1>
            <div class="navbar-center">
                <a href="landing.php">Home</a>
                <a href="crserg.php">Register Courses</a>
                <a href="profile.php">Profile</a>
            </div>
            <div class="navbar-right">
               
                <a href="session.php" onclick="return confirmLogout();">Logout</a>
            </div>            
        </nav>
    </header>
    <section>
        <h2>Student Details</h2>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Student ID</th>
                <td><?php echo $ID; ?></td>
            </tr>
            <tr>
                <th>UserName</th>
                <td><?php  echo $stdUsNm; ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h2>Registered Courses</h2>
        <?php if ($result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Credit</th>
                <th>Slot</th>
                <th>Course Code</th>
                <th>Faculty</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['credit'] ?></td>
                    <td><?= $row['slot'] ?></td>
                    <td><?= $row['c_name'] ?></td>
                    <td><?= $row['faculty'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <?php else : ?>
        <p>No courses registered.</p>
    <?php endif; ?>
    </section>
<footer>
        <p>&copy; 2023 Course Registration System. All rights reserved.</p>
    </footer>

    <script>
        function confirmLogout() {
            var shouldLogout = confirm("Are you sure you want to logout?");
            if (shouldLogout) {
                window.location.href = "session.php";
            }
            return shouldLogout;
        }
        </script>
</body>
</html>