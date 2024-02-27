<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $name = $_POST["name"];
    $username = $_POST["username"]; // Fix the name attribute
    $password = $_POST["password"];
    $mobileNumber = $_POST["mobileNumber"]; // Fix the name attribute

    // Validation and additional processing can be added here

    // Assume you have a database connection named $conn
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "try";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database
    $sql = "INSERT INTO user_login (name, username, password, mobileNumber, status)
            VALUES ('$name', '$username', '$password', '$mobileNumber', 'pending')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. Waiting for admin approval.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <form method="post" action="try.php">
        <table>
            <tr>
                <td colspan="2"><h2 style="color:red;">Registration form</h2></td>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="mobileNumber">Mobile Number:</label></td>
                <td><input type="text" name="mobileNumber" value="<?php echo isset($_POST['mobileNumber']) ? $_POST['mobileNumber'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>
</body>

</html>
