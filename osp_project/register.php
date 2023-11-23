<?php
// session_start();
// $registerNumber = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : null;
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
   
    $c1="SELECT  `c1`, `c2`, `c3` FROM `regcourse` WHERE regID='21BCE992';";
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
    $sqlin = "SELECT * FROM courselog WHERE code IN ('$crs1', '$crs2')";
    $result = $conn->query($sqlin);
    ?>

    <?php if ($result->num_rows > 0) : ?>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Room</th>
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

    <!-- Add your additional HTML content here -->

    <?php
    // Close the database connection
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Courses</title>
    <!-- Add your CSS styles here -->
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Your Registered Courses</h1>

   
   

</body>
</html>