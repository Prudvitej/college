<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: staff_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Sree Chaitanya Institute of Technological Sciences | Sudent reverification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        h2 {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        form {
            margin-top: 20px;
            margin-left: 30%;
            margin-right: 20%;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        label {
            font-weight: bold;
        }
        select{
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
button {
            margin-left: 40%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            width: 10%;
        }
        button:hover {
            background-color: #45a049;
        }

        .text-left {
            text-align: left;
        }
        input[type="text"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    width: 100%;
    margin-bottom: 10px;
}
@media only screen and (max-width: 600px) {
        .container {
            width: 100%;
        }

        form {
            width: 95%;
            margin-left: 2.5%;
        }

        button {
            width: 50%;
            margin-left: 25%;
        }

        table {
            margin-left: 5%;
            margin-right: 5%;
            width: 100%;
        }

        input[type="text"] {
            width: 90%;
            margin-left: 5%;
        }

        select {
            width: 90%;
            margin-left: 5%;
        }

        nav {
            text-align: center;
            padding: 10px;
        }

        nav img {
            max-width: 80%;
            height: auto;
            margin: 10px 0;
        }
    }
    </style>
</head>

<body>
      
    <nav>
        <img src="logo.png" alt="" srcset="">
    </nav>
    <h2>EXAMINATION BRANCH REVERIFICATION</h2>
    <form method="get">
        <table>
            <tr>
                <td><label>REGULATION</label></td>
                <td>
                    <select id="regulation" name="regulation">
                        <option value="" selected disabled hidden>Select regulation</option>
                        <option value="r09">R09</option>
                        <option value="r12">R12</option>
                        <option value="r15">R15</option>
                        <option value="r16">R16</option>
                        <option value="r17">R17</option>
                        <option value="r18">R18</option>
                        <option value="r19">R19</option>
                        <option value="r22">R22</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>YEAR</label></td>
                <td>
                    <select id="year" name="year">
                        <option value="" selected disabled hidden>Select Year</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>PROGRAM</label></td>
                <td>
                    <select id="program" name="program">
                        <option value="" selected disabled hidden>Select Program</option>
                        <option value="B.Tech">B.Tech</option>
                        <option value="MBA">MBA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>SEMESTER</label></td>
                <td>
                    <select id="semester" name="semester">
                        <option value="" selected disabled hidden>Select Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>COURSE</label></td>
                <td>
                    <select id="course" name="course">
                        <option value="" selected disabled hidden>Select Course</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="MBA">MBA</option>
                        <option value="AIML">AIML</option>
                        <option value="CSM">CSM</option>
                        <option value="CIVIL">CIVIL</option>
                    </select>
                </td>
            </tr>
                <tr>
                    <td>
                        <label>HallTicket Number</label>
                    </td>
                    <td>
                       <input type="text" placeholder="Enter Hall Ticket Number" id="htno" name="htno"/>
                    </td>
                </tr>

        </table><br><br>
        <div><button type="submit" name="search">SEARCH</button></div>
    </form>
   


 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "try";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$search_error = '';

if (isset($_GET['search'])) {
    $regulation = isset($_GET['regulation']) ? $_GET['regulation'] : "";
    $year = isset($_GET['year']) ? $_GET['year'] : "";
    $program = isset($_GET['program']) ? $_GET['program'] : "";
    $semester = isset($_GET['semester']) ? $_GET['semester'] : "";
    $course = isset($_GET['course']) ? $_GET['course'] : "";
    $hallticket = isset($_GET['htno']) ? $_GET['htno'] : "";

    if (empty($regulation) && empty($year) && empty($program) && empty($semester) && empty($course) && empty($hallticket)) {
        $search_error = 'Fill in at least one field to fetch data...';
    } else {
        $sql = "SELECT * FROM reg WHERE ";
        $conditions = [];

        if (!empty($regulation)) {
            $conditions[] = "regulation = '$regulation'";
        }

        if (!empty($year)) {
            $conditions[] = "YEAR = '$year'";
        }

        if (!empty($program)) {
            $conditions[] = "program = '$program'";
        }

        if (!empty($semester)) {
            $conditions[] = "SEM = '$semester'";
        }

        if (!empty($course)) {
            $conditions[] = "course = '$course'";
        }
        if (!empty($hallticket)) {
            $conditions[] = "hallTicketNumber = '$hallticket'";
        }

        $sql .= implode(' AND ', $conditions);

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                    <th>Hall Ticket Number</th>
                    <th>Program</th>
                    <th>Course</th>
                    <th>Type of semester</th>
                    <th>Regulation</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Subject Names</th>
                    <th>Lab Names</th>
                    <th>Mobile number</th>
                    <th>Registration form Number</th>
                    <th>Submited On </th>
                    <th>No of Subjects</th>
                    <th>No of Labs</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['hallTicketNumber'] . "</td>
                        <td>" . $row['program'] . "</td>
                        <td>" . $row['course'] . "</td>
                        <td>" . $row['SEM_TYPE'] . "</td>
                        <td>" . $row['regulation'] . "</td>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['YEAR'] . "</td>
                        <td>" . $row['SEM'] . "</td>
                        <td>" . $row['subject_Name'] . "</td>
                        <td>" . $row['Lab_Names'] . "</td>
                        <td>" . $row['MOB_NO'] . "</td>
                        <td>" . $row['REG_FORM_NUMBER'] . "</td>
                        <td>" . $row['submission_time'] . "</td>
                        <td>" . $row['subapp'] . "</td>
                        <td>" . $row['lab_count'] . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo '<h1 style="color:red; text-align:center">No Data found...</h1>';
        }
    }
}
?>
</body>
<script>
        const inp=document.getElementById("htno");

        inp.addEventListener("input",()=>{
            inp.value=inp.value.toUpperCase();
        }
        );
    </script>

</html>








