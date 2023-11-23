
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_reg";
$port = 3306;
// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values from the form
    
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password =  mysqli_real_escape_string($conn,$_POST["password"]);

    

    // Query to check if the provided username and password match a record in the database
    $sqlin = "SELECT * FROM userlog WHERE UsNm = '$username' AND pass = '$password'";
    $pass="SELECT pass FROM userlog WHERE UsNm='$username' AND pass = '$password'";
    $id="SELECT regID FROM userlog WHERE UsNm='$username' AND pass = '$password'";
    $resultpass = $conn->query($pass);
    $result= $conn->query($id);
    if ($result) {
        // Fetch the value from the database
        $regID = $result->fetch_assoc();
        if ($regID) {
            $regID = $regID['regID'];
            $_SESSION['register_number'] = $regID;
        }

    // Check if the query was successful
    if ($resultpass) {
        // Fetch the value from the database
        $row = $resultpass->fetch_assoc();
        
        if ($row) {
            $valueFromDatabase = $row['pass']; // Replace with your actual column name
            
            // Compare the values
            if ($password== $valueFromDatabase) {
                header("Location: landing.php");
                // After successful login
            } else {
                echo "Values do not match.";
            }
        } else {
            echo "No matching record in the database.";
        }
    } 
    mysqli_close($conn);
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80%;
        }

        .login-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
            margin-top: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        label {
            margin-top: 10px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007bb5;
        }

        .register-link {
            margin-top: 15px;
            color: #333;
            font-size: 14px;
        }

        .register-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
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
        <div class="login-container">
            <h2>Login</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
    
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
    
                <button type="submit">Login</button>
            </form>
    
            <p class="register-link">New user? <a href="reg.php">Register here</a></p>
        </div>
    </section>
 <footer>
        <p>&copy; 2023 Course Registration System. All rights reserved.</p>
    </footer>

</body>

</html>
