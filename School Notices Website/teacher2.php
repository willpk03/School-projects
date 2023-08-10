<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SQL Test</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
    <form method="POST">
    <h1> Student Notices</h1>
    <p>Header: <input type="text" name="header" placeholder= ""><br>
    <p>Message: <input type="text" name="message" placeholder= ""><br>

    <p>Teachers:<select name="teacher">
    <?php

    ?>
    </select>
    <h6>Year Level:
    <select name="year">
        <option value="All">All</option>
        <option value="12">12</option>
        <option value="11">11</option>
        <option value="10">10</option>
        <option value="9">9</option>
        <option value="8">8</option>
        <option value="7">7</option>
        <option value="sen">Senior School</option>
        <option value="mid">Middle School</option>
    </select>
    <h6>Type of notice:
    <select name="type">
        <option value="None">All</option>
        <option value="capa">Capa</option>
        <option value="sport">Sport</option>
        <option value="music">Music</option>
    </select>
    <p>Select none if none are applicable</p>
    <button type= "submit" name="enter">Enter </button>
    </form>
<?php
$conn = new mysqli("localhost", "root", "usbw", "notices");
print('Running code');
if($conn -> connect_errno()) {
    print('Error: Database connection');
}
if (isset($_POST['enter'])) {
    $year = $_POST['year'];
    $type = $_POST['type'];
    $heading = $_POST['header'];
    $message = $_POST['message'];
    $teacher = 'Tester';
    //echo $teacher;
    $sql = `SELECT * FROM tteacher WHERE 'tester' = LastName`;
    $result = mysqli_query($conn,$sql); 
    $row = mysqli_fetch_array($result);
    echo $sql;
    echo $row['StaffID']; 
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        print("ERROR #2");
    }
}else {
    print('Button not pressed');
}
?>