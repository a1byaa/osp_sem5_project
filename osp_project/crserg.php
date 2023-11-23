<?php
        session_start();
        $registerNumber = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : null;
        // $id=implode($registerNumber);
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_reg";
        $port = 3306;
        // Create a connection to the MySQL database
        $conn = new mysqli($servername, $username,$password,$dbname,$port);
        // Retrieve register number

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
           
 
    $c1 = isset($_POST['chbx1']) ? $_POST['chbx1'] : "";
    $c2 = isset($_POST['chbx2']) ? $_POST['chbx2'] : "";
    $c3 = isset($_POST['chbx3']) ? $_POST['chbx3'] : "";
    $c4 = isset($_POST['chbx4']) ? $_POST['chbx4'] : "";

   

           
                $sqlin = "INSERT INTO  regcourse ( regID,c1,c2,c3,c4) VALUES ('$registerNumber','$c1','$c2','$c3','$c4')";
                // Proceed to use $variable
           
            if (mysqli_query($conn, $sqlin)) 
            {
            echo "course added";
            echo $registerNumber;
            } 
            else 
            {
            echo "Error: " . $sqlin . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        } else {
            // The string does not meet the conditions
            echo "Invalid string!";
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Course Registration</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        }

        .navbar-right {
            margin-left: auto;
        }


        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 88vh;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
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

    <main>
        <section id="registration-form">
            <h2>Course Registration</h2>
            <form method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Course Credit</th>
                            <th>Avalibale slot</th>
                            <th>Avalibale faculty</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Web Development</td>
                            <td>CSC2003</td>
                            <td>4</td>
                            <td>A1+TA1</td>
                            <td>Dr.satya</td>
                            <td><input type="checkbox" value="CSC2003" name="chbx1"></td>
                        </tr>
                        <tr>
                            <td>OSP</td>
                            <td>CSC2303</td>
                            <td>2</td>
                            <td>B2</td>
                            <td>Dr.Sumangali</td>
                            <td><input type="checkbox" value="CSC2303" name="chbx2"></td>
                        </tr>
                        <tr>
                            <td>DBMS</td>
                            <td>CSC3303</td>
                            <td>4</td>
                            <td>D1+TD1</td>
                            <td>Dr.Subhash</td>
                            <td><input type="checkbox" value="CSC3303" name="chbx3"></td>
                        </tr>
                        <tr>
                            <td>System Design</td>
                            <td>CSC4001</td>
                            <td>3</td>
                            <td>D2+TD2</td>
                            <td>Dr.prabhas</td>
                            <td><input type="checkbox" value="CSC4001" name="chbx3"></td>
                        </tr>
                    </tbody>
                </table>

                <button type="submit">Submit Registration</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Course Registration System. All rights reserved.</p>
    </footer>

    <script>
        function confirmLogout() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            return confirmLogout;
        }
    </script>

</body>
</html
