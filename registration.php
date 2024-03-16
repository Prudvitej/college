<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        td {
            padding: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
         nav {
            text-align: center;
            margin-bottom: 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 10px 0;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav img {
            max-width: 2000px;
            height: auto;
        }

        nav a {
            text-decoration: none;
            color: blue;
        }

        nav a:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <nav>
    <img src="logo.png" alt="" srcset="">
</nav>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mobileNumber = $_POST["mobileNumber"];

    // Assume you have a database connection named $conn
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "try";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $check_username_query = "SELECT * FROM user_login WHERE User_name = '$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo '<script>alert("Username already exists. Please choose a different username."); window.location.href = "registration_form.php";</script>';
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO user_login (name, User_name, password, Mob_no, status)
                         VALUES ('$name', '$username', '$password', '$mobileNumber', 'pending')";

        if ($conn->query($insert_query) === TRUE) {
            echo '<script>alert("Registration successful. Contact admin to get approval."); window.location.href = "registration.php";</script>';
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}

?>


    
    <form method="post">
        <table>
            <tr>
                <td colspan="2"><h2 style="color:red;">Registration form</h2></td>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" name="name" required></td>
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
                <td><input type="text"name="mobileNumber" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>

      <script>
        const inp=document.getElementById("name");

        inp.addEventListener("input",()=>{
            inp.value=inp.value.toUpperCase();
        }
        );
    </script>
    
</body>
</html>
