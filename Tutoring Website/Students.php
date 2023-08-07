<html>
<head>
    <title>Tutor Wizards Students Page</title>
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
<div class= "banner">
<h1> Tutor Wizard - Students Page</h1>
</div>
<div class="main">
<form method="POST">
<button type='submit' name="English" > English </button>
<button type='submit' name="DISO"> DISO </button>
<button type='submit' name="Math"> Math </button>
<button type='submit' name="Physics"> Physics </button>
<?php
session_start();
$username = $_SESSION['userID'];

$con=mysqli_connect('localhost', 'root', 'usbw', 'users');
$con2=mysqli_connect('localhost', 'root', 'usbw', 'users');
$con3=mysqli_connect('localhost', 'root', 'usbw', 'users');
$con4=mysqli_connect('localhost', 'root', 'usbw', 'users');
//failure to connect will generate an error with an err number
if (mysqli_connect_errno())
  {
  echo "Failed to connect to the DataBase: " . mysqli_connect_error(); 
  } else if (isset($_POST['English'])) {
    $sql="SELECT ID, Date, TutorID, Subject FROM tbookings WHERE Subject = 'English' AND StudentID = ''";
    if ($result=mysqli_query($con,$sql))
    {
      echo "<table>";
      echo "<tr>";
      echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th><th>". "Select". "</th>";
      echo "</tr>" ;
      $x = 1;
      // Fetch one and one row
      while($row=$result->fetch_row()) {
        echo "<tr>";
        foreach ($row as $value){
            
              echo "<td>" . $value . "</td>";
            } 
            //Puts a button at the end of each row
            echo "<td><button type='submit' name=$x > $x </button></td>";
            $x = $x + 1;
          echo "</tr>";
        }
        echo "</table>";
      // printf(nl2br);
    mysqli_free_result($result);
    $_POST['subjects'] = "English";
    } else {
    echo ("Error Connecting to the Database - Report to Admin");
    }
    mysqli_close($con);
  //while($row=$result->fetch_row()) {
      // Will find the button that was pressed
 
      } else if (isset($_POST['DISO'])) {
        $sql="SELECT ID, Date, TutorID, Subject FROM tbookings WHERE Subject = 'DISO' AND StudentID = ''";
      //$sql="SELECT BookingID, Date, TutorID, FROM bookings ORDER BY TutorID";
    if ($result=mysqli_query($con,$sql)){
      $x = 1;
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th><th>". "Select". "</th>";
        echo "</tr>" ;
        // Fetch one and one row
        while($row=$result->fetch_row()){
          echo "<tr>";
          foreach ($row as $value){
              
                echo "<td>" . $value . "</td>";
              } 
              //Puts a button at the end of each row
              echo "<td><button type='submit' name=$x > $x </button></td>";
            echo "</tr>";
          }
          echo "</table>";
        // printf(nl2br);
      mysqli_free_result($result);
      $_POST['subjects'] = "DISO";
    } else {
    echo ("Error Connecting to the Database - Report to Admin");
    }
    mysqli_close($con);
    } else if (isset($_POST['Math'])) {
        $sql="SELECT ID, Date, TutorID, Subject FROM tbookings WHERE Subject = 'Math' AND StudentID = ''";
      //$sql="SELECT BookingID, Date, TutorID, FROM bookings ORDER BY TutorID";
      if ($result=mysqli_query($con,$sql))
      {
        $x = 1;
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th><th>". "Select". "</th>";
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
              //Puts a button at the end of each row
              echo "<td><button type='submit' name=$x > $x </button></td>";
              $x = $x + 1;
            echo "</tr>";
          }
          echo "</table>";
        // printf(nl2br);
      mysqli_free_result($result);
      $_POST['subjects'] = "Math";
      } else {
      echo ("Error Connecting to the Database - Report to Admin");
      }
      mysqli_close($con);   
        } else if (isset($_POST['Physics'])) {
          $sql="SELECT BookingID, Date, TutorID, Subject FROM tbookings WHERE Subject = 'Physics' AND StudentID = ''";
       
        if ($result=mysqli_query($con,$sql)) {
          $x = 1;
          echo "<table>";
          echo "<tr>";
          echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th><th>". "Select". "</th>";
          echo "</tr>" ;
          // Fetch one and one row
          while($row=$result->fetch_row())  //
            echo "<tr>";
            foreach ($row as $value){
                
                  echo "<td>" . $value . "</td>";
                } 
                //Puts a button at the end of each row
                echo "<td><button type='submit' name=$x > $x </button></td>";
                $x = $x + 1;
              echo "</tr>";
            }
            echo "</table>";
          // printf(nl2br);
        mysqli_free_result($result);
        $_POST['subjects'] = "Physics";
      } else {
        echo "<strong>Please press one of the buttons above to select a tutor</strong>";
    }

// Tutor Session Already Booked
//
//
//
//
//Code:
echo "<h1> Accepted Tutoring sessions </h1>";
$sql2="SELECT ID, Date, TutorID, Subject FROM tbookings WHERE StudentID = '$username' ";
      if ($result=mysqli_query($con2,$sql2)) {
        echo "<table>";
        echo "<tr>";
        echo "<th>" . "Session ID" . "</th><th>" . "Date" .  "</th><th>" . "Tutors ID" . "</th><th>" . "Subject" . "</th>";
        echo "</tr>" ;
        // Fetch one and one row
        while($row=$result->fetch_row()){
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
      echo ("No Data found - If wrong, Report to Admin");
      }
      mysqli_close($con2);
$subject = $_POST['subjects'];

//echo $subject;
$sql3="SELECT ID FROM tbookings WHERE Subject = '$subject' AND StudentID = ''";
$check =  mysqli_query($con3,$sql3);
$row = mysqli_fetch_array($check);
//echo $row['ID'];
//$max = mysqli_num_rows($check);
  if (isset($_POST['1'])) {
      $sql4 = "UPDATE tbookings SET StudentID = '$username' WHERE id = '1' "; 
      mysqli_query($con4,$sql4);
      echo "<br><br><strong>You've selected to join this Tutoring session. Down below are all you sessions you have.";
  }



/*$check = mysqli_query($con3,$sql3);    
$max = mysqli_num_rows($check);
for ($x = 1; $x = 2; $x++){
    if (isset($_POST[$x])) {
        $sql4 = "UPDATE `tbookings` SET `StudentID` = 's00006' WHERE id = '$x' "; 
        mysqli_query($con,$sql4);
        echo "<br><br><strong>You've selected to join this Tutoring session. Down below are all you sessions you have.";
    }
}*/


?>
</div>
</form>
</body>
</html>