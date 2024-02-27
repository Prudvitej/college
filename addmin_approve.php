<?php
// Assuming you have a database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "try";

// Create a database connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "user_id" key is set in the $_POST array
    if(isset($_POST["user_id"])) {
        $user_id = $conn->real_escape_string($_POST["user_id"]);

        // Update the user status to 'approved'
        $updateSql = "UPDATE user_login SET status = 'approved' WHERE User_name = '$user_id'";

        if ($conn->query($updateSql) === TRUE) {
            echo "Approval successful!";
            header("Refresh: 5; URL=admin.php"); 
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "User ID not set in the POST data.";
    }
}

$conn->close();
?>
