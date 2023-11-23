<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    width: 450px;
    background-color: #fff;
    padding: 20px;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    text-align: center; /* Center align the content within the form */
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: white;
    padding: 9px 15px ;
    border:none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>New Registration</h2>
    <form  method="post">
       
        <label for="rg_num">Register Number:</label>
        <input type="text" id="rg_num" name="rg_num" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Register</button>
    </form>
</div>

<?php
// Replace these values with your actual database credentials
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
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values from the form
    $username = $_POST["username"];
    $regnum =$_POST["rg_num"];
    $name= $_POST["name"];
    $password = $_POST["password"];
    

if (strlen($password) >= 8 && !in_array($password[0], ['.', ',', '_'])) {
    // The string is 8 characters long or more and does not start with ".", "," or "_"
   
    $sqlin = "INSERT INTO  userlog ( regID,fname,UsNm,pass) VALUES ('$regnum','$name','$username','$password')";
   
    if (mysqli_query($conn, $sqlin)) 
    {
    echo "Account created";
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
    // Hash the password (you should use a more secure hashing algorithm in a real-world scenario)
    // Query to check if the provided username and password match a record in the database
}

?>


</body>
</html>
