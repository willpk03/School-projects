<!DOCTYPE html>
<html>
<head>
    <title>Tutor Wizards Teacher Page</title>
    <style>
        body {
            background-color: rgb(0, 204, 255);
            text-align: left;

        }
        .main {
            background-color: white;
            align: center;
            text-align: left;
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
<header><h1> Teachers</h1></header>
<form action="includes/signup.inc.php"method="POST">




<?php
session_start();
//using mysqli_connect() and mysqli_fetch_row()
//https://www.w3schools.com/Php/func_mysqli_fetch_row.asp
//connect through host localhost, for user root with password usbw to the database loginsystem
$con=mysqli_connect('localhost', 'root', 'usbw', 'users');
//failure to connect will generate an error with an err number
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql="SELECT ID, Date, StudentID, TutorID, Subject FROM tbookings WHERE TutorID != '' ORDER BY Date";
if ($result=mysqli_query($con,$sql))
  {
    echo "<table>";
    echo "<tr>";
    echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Students ID" . "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th>";
    echo "</tr>" ;
    // Fetch one and one row
    while($row=$result->fetch_row())  //
    // while ($row=mysqli_fetch_row($result))
    // $prt=sprintf("%s  %-12s  %-12s  %s \n", $row[0],$row[1],$row[2],$row[3]);
    // print(nl2br($prt));
    // echo sprintf("%s  %12s  %12s  %s <br>", $row[0],$row[1],$row[2],$row[3]);
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

?>

</body>
</html>