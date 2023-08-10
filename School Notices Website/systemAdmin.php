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
    </style>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<header class= "w3-border w3-green">
<img src="NCClogo.png" alt="NCC Logo" height="60" width="50">
 System Admin View
<?php
//Made using css BootStrap
echo " ---  Todays Date is the ";
date_default_timezone_set("Australia/Brisbane");
echo date("d/m/Y");
?>
</header>

<h4> Delete or view any notices </h2>
<?php
    require('dbConfig.php');
    if(isset($_POST['search'])) {
        //This code is done if the Search Button is pressed
        $ID = $_POST['ID'];
        $sql = "SELECT * FROM tnotices WHERE '$ID' = ID";
        $resultSet = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultSet);
        //Displays all information for the selected notice
        echo "<p> Notices ID: ";
        echo $row['ID'];
        echo "<p> Notices Heading: ";
        echo $row['Heading'];
        echo "<p> Notices Selected Audience: ";
        //Change from the abreviated version to a normal verision
        $yearlevel = $row['YearLevel'];
        if ($yearlevel == 'sen') {
            $yearlevel = 'Senior School';
        } else if ($yearlevel == 'mid') {
            $yearlevel = 'Middle School';
        } else if ($yearlevel == 'All') {
            $yearlevel = 'The Whole School';
        }
        echo $yearlevel;
        echo "<p> Notices Type: ";
        echo $row['Type'];
        echo "<p> Notices Message: ";
        echo $row['Message'];
        echo "<p> Notices Start Date: "; 
        echo $row['StartDate'];
        echo "<p> Notices Start Date: ";
        echo $row['EndDate'];
    }else if(isset($_POST['delete'])) {
        //This code happens if the delete button is pressed
        //Deletes the Notice in that has been selected.
        $ID = $_POST['ID'];
        $sql = "DELETE FROM `tnotices` WHERE '$ID' = ID";
        $resultSet = mysqli_query($conn, $sql);
    } 
    ?>
    <form method="POST">
        <button type="submit" name="search">Search </button>
        <button type="submit" name="delete">Delete </button>
        <p>ID:<select name="ID">
            <?php
                //Creates a drop down list of all the notices, displaying the ID as the it is the primary key
                require('dbConfig.php');
                $sql = "SELECT * FROM tnotices";
                $resultSet = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                while ($rows = $resultSet->fetch_assoc()) {
                    $noticeID = $rows['ID'];
                    echo "<option value='$noticeID'>$noticeID</option>";
                }                
            ?>
</body>

</html>