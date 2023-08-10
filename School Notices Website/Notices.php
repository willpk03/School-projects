<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>NCC - Notices</title> 
        <style>
            table, th, td {
            border: 2px solid black;
            }
            tr {
            background-color: #ee3224; 
            color: white;
            /* color: #7C878E; */
            border: 2px solid black
            }
            header {
                font-size: 18px;
                background-color: #00534C;
                color: #7C878E;
            }
            
            .message {
                color: #7C878E;
            }

        </style>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

<form method="POST">
<header class= "w3-border w3-green">
<img src="NCClogo.png" alt="NCC Logo" height="60" width="50">
Student Notices
<?php
//Made using css BootStrap
//Creates the begining of the message
echo " ---  Todays Date is the ";
//Grabs today's date
date_default_timezone_set("Australia/Brisbane");
echo date("d/m/Y");
?>
</header>
<h6>Year Level:
<select name="year">
  <option value="ALL">All</option>
  <option value="12">12</option>
  <option value="11">11</option>
  <option value="10">10</option>
  <option value="9">9</option>
  <option value="8">8</option>
  <option value="7">7</option>
</select>
Type of Notices:
<select name="type">
    <option value="None">None</option>
    <option value="capa">Capa</option>
    <option value="sport">Sport</option>
    <option value="music">Music</option>
</select>
<button type= "submit" name="enter">Enter </button>
</form>
<h4> For all of the school</h4>
<div class="table-responsive-sm">
<table class="table table-sm">
<!-- <thead class="thead-dark"> -->
    <tr>
      <th>Heading</th>
      <th>Message</th>
      <th>Teacher Title</th>
      <th>Teacher Name</th>
<?php
//Grabbing the date
require('dbConfig.php');
date_default_timezone_set("Australia/Brisbane");
$date = date("Y/m/d");
//Grabbing the notices for today for everyone
$sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'all' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
$result = mysqli_query($conn, $sql);
//Creating the table of these notices
while($row = mysqli_fetch_assoc($result)) {
    // echo "<tr class='table-info'>";
    echo "<tr class='w3-white'>";
    foreach($row as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}

?>
</table>
</div>
<div class="table-responsive-sm">
<table class="table table-sm">
<!-- <thead class="thead-dark"> -->
    <tr>
      <th>Heading</th>
      <th>Message</th>
      <th>Teacher Title</th>
      <th>Teacher Name</th>

     
      
    </tr>
  </thead>

<?php
    require('dbConfig.php');
    //This area of code is to select which two select queries will run on the website. This is determined by what value was selected in the year box.
    //$sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID";
    if (isset($_POST['enter'])) {
        $year = $_POST['year'];
        // print($_POST['year']);

        switch ($year) {
            case '12':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 12 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'sen' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $NoYearEntered = false;
                $result = mysqli_query($conn, $sql);
                break;
            case '11':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 11 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'sen' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $NoYearEntered = false;
                break;
            case '10':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 10 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'sen' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $NoYearEntered = false;
                break;
            case '9':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 9 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'mid' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $NoYearEntered = false;
                break;
            case '8':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 8 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'mid' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $NoYearEntered = false;
                break;
                
            case '7':
                $sql = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 7 AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $sql2 ="SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.YearLevel = 'mid' AND tnotices.type = 'None' AND tnotices.StartDate <= '$date' AND tnotices.EndDate >= '$date'";
                $result = mysqli_query($conn, $sql);
                $NoYearEntered = false;
                break;
            default:
                $NoYearEntered = true;
                
                break;
        }
    } 
    //This section creates the tables of the two values for the above select queries.
    // $result = mysqli_query($conn, $sql2);
    // while($row = mysqli_fetch_assoc($result)) {
    //     echo "<tr class='table-info'>.";
    //     foreach($row as $value) {
    //         echo "<td>" . $value . "</td>";
    //     }
    //     echo "</tr>";
    // }
    if ($NoYearEntered == true) {
        echo "<h3> Year Level Notices: ";
        echo "</table>";
        echo "Click your year level to display thats year levels notices";
    } else {
        $result = mysqli_query($conn, $sql2);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='w3-white'>";
            foreach($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='w3-white'>";
            foreach($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
         }
         echo "<h3> Year Level Notices: ";
        echo "</table>";
    }
   ?>
    <div class="table-responsive-sm">
    <table class="table table-sm">
    <!-- <thead class="thead-dark"> -->
        <tr>
        <th>Heading</th>
        <th>Message</th>
        <th>Teacher Title</th>
        <th>Teacher Name</th>
        </tr>
   <?php
    $type = $_POST['type'];
    if ($type != 'None') {
        $sql3 = "SELECT tnotices.Heading, tnotices.Message, tteacher.Title, tteacher.LastName FROM `tnotices`, `tteacher` WHERE tnotices.StaffID = tteacher.StaffID AND tnotices.type = '$type'";
    }
    $result = mysqli_query($conn, $sql3);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='w3-white'>";
        foreach($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    
    if ($type != 'None') {
        echo '<h3> All ';
        echo $type;
        echo ' Notices';
    } else {
        echo '<div class = "message"><h4> Select a specific type of notices to see them here:';
    }
    echo "</table>";
   ?>
   
</table>
</body>
</html>