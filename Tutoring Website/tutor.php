<!DOCTYPE html>
<html>
<head>
    <title>Tutor Wizards Tutor Page</title>
    <style>
    body {
            background-color: rgb(0, 204, 255);

        }
        .main {
            background-color: white;
            align: center;
            text-align: center;
            align: center;
        }
        .error {
            font-weight:bold;
            color:red;
        }
        button {
          border:2px;
          height: 25px;
          width: 100px;
          font-size: 15px;
          text-align: center;
          border-color: grey;
          transition: all 0.2s linear;
        }
        table, th, td {
          border: 1px solid black;
          background-color:white;
        }
    </style>
</head>
<body>
<header><h1>Tutors</h1></header>
<form method="POST">
<p> <strong> Subjects<select name="subjects">
  <option value="English">English</option>
  <option value="Math">Math</option>
  <option value="DISO">DISO</option>
  <option value="Physics">Physics</option>
</select>




<?php
session_start();
$username = $_SESSION['userID'];
echo "<p> <strong> Times <select name='times'>";
$dat = array('2019-08-12','2019-08-19','2019-08-26','2019-09-02','2019-09-09','2019-09-16','2019-09-23','2019-09-30','2019-10-07','2019-10-14','2019-10-21','2019-10-28','2019-11-04','2019-11-11','2019-11-18','2019-11-25');
$time = array('15:30:00', '16:00:00', '16:30:00');
for($x = 0; $x < 3; $x++){
    echo "<option value=$time[$x]>$time[$x]</option> ";
    }
echo '</select>';
echo "<p> <strong> Dates: <select name='dates'>";
for($x = 0; $x < 16; $x++){
    echo "<option value=$dat[$x]>$dat[$x]</option> ";
    }
echo '</select>';    
echo "<br><br><button type='submit' name='enter' > Enter </button></td>";
$con=mysqli_connect('localhost', 'root', 'usbw', 'users');
//failure to connect will generate an error with an err number
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else if (isset($_POST['enter'])) {
    $DATETIME = $_POST['dates'] + ' ' + $_POST['time'];
    $DATE = $_POST['dates'];
    $TIME = $_POST['times'];
    $subject = $_POST['subjects'];
    echo '<br>';
    //echo $DATE, ' ', $TIME;
    //$sql2 = "UPDATE tBookings SET TutorID = 's01791' AND subject = 'English' WHERE Date = '$DATETIME'";
    $sql2 = "UPDATE tBookings SET TutorID = '$username', Subject = '$subject' WHERE Date = '$DATE, ' ', $TIME'";
    $con2=mysqli_connect('localhost', 'root', 'usbw', 'users');
    mysqli_query($con2,$sql2);
  header();
  }


$con=mysqli_connect('localhost', 'root', 'usbw', 'users');
//failure to connect will generate an error with an err number
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
    $sql="SELECT ID, Date, StudentID, Subject FROM tbookings WHERE TutorID = '$username' ";
    if ($result=mysqli_query($con,$sql)) {
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Student ID" . "</th><th>" . "Subject" . "</th>";
        echo "</tr>" ;
        // Fetch one and one row
        while($row=$result->fetch_row())  //
        {
        echo "<tr>";
        foreach ($row as $value){
                echo "<td>" . $value . "</td>";
            } 
            echo "</tr>";
        }
        echo "</table>";
        // printf(nl2br);
    mysqli_free_result($result);
    } else {
    echo ("Error Connecting to the Database - Report to Admin");
    mysqli_close($con);
  }
  
}

?>
