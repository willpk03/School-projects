<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NCC - Notices</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        aside {
            width: 40%;
            padding-left: .5rem;
            margin-left: .5rem;
            float: right;
            box-shadow: inset 5px 0 5px -5px;
            font-style: italic;
            /* color: #29627e; */
        }

        table, th, td {
            border: 2px solid black;
        }
        tr {
           background-color: #ee3224; 
           color: white;
           /* color: #7C878E; */
           border: 2px solid black
        }

        .aligningleft {
            text-align: right;
        }
        .message {
            color: #7C878E;
        }
        .header {
            background-color: #00534C;
            color: #7C878E;
        }
    </style>
</head>

<body>
    <form method="POST">
        
        <div class="w3-bar w3-border w3-green header">
        
            <a href="http://localhost/IA2/Notices.php" class="w3-bar-item w3-button w3-border-right w3-mobile">Go To the Notices</a>
            <!-- <div class="title"> Teacher Page </div> -->
            <div class="aligningleft">
                <p>Your Last Name:<select name="teachers">
                        <?php
                        //Grabs all teachers
                        require('dbConfig.php');
                        $sql = "SELECT * FROM tteacher";
                        $resultSet = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
                        while ($rows = $resultSet->fetch_assoc()) {
                            //Puts there name in the select box
                            $teachername = $rows['LastName'];
                            echo "<option value='$teachername'>$teachername</option>";
                        }
                        ?>

                    </select>
                    <button type="submit" name="view">View </button>
                        
                </p>
            </div>
        </div>
    </form>
    <?php
        
    ?>
    <aside>
        <form method="POST">
            <h1> NCC Student Notices</h1>
            <p>Header: <input type="text" name="header" placeholder=""><br>
                <p>Message: <input type="text" name="message" placeholder=""><br>
                    <p>Teachers:<select name="teacher">
                            <?php
                            //Grabs all teachers
                            require('dbConfig.php');
                            $sql = "SELECT * FROM tteacher";
                            $resultSet = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            while ($rows = $resultSet->fetch_assoc()) {
                                //Puts there name in to a select box
                                $teachername = $rows['LastName'];
                                echo "<option value='$teachername'>$teachername</option>";
                            }

                            ?>
                        </select><br>
                        <p>Start Date: <input type="date" name="StartDate" placeholder=>
                            <p>End Date: <input type="date" name="EndDate" placeholder="25/02/2020">
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
                                            <option value="None">None</option>
                                            <option value="capa">Capa</option>
                                            <option value="sport">Sport</option>
                                            <option value="music">Music</option>
                                        </select>
                                        <p>Select none if none are applicable</p>
                                        <button type="submit" name="enter">Enter </button>
        </form>
        <?php
        require('dbConfig.php');
        if (isset($_POST['enter'])) {
            //Grabs the selected teachers ID
            $teacher = $_POST['teacher'];
            $sql = "SELECT * FROM tteacher WHERE '$teacher' = LastName";
            $resultSet = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($resultSet);
            //Grabs all notices information that was put in the form
            $teacherID = $row['StaffID'];
            $type = $_POST['type'];
            $year = $_POST['year'];
            $StartDate = $_POST['StartDate'];
            $EndDate = $_POST['EndDate'];
            $message = $_POST['message'];
            $heading = $_POST['header'];
            //Checks to see if anything is missing
            if ($startdate == ' ' || $message == ' ' || $heading == ' ') {
                echo '<b> Error: fill in all parts of the notice';
            } else {
                //Inserts the information in if nothing is missing
                $sql2 = "INSERT INTO `tnotices`(`Heading`, `StaffID`, `StartDate`, `EndDate`, `Message`, `YearLevel`, `Type`) VALUES ('$heading' ,'$teacherID' ,'$StartDate' ,'$EndDate' ,'$message' ,'$year' ,'$type')";
                $resultSet = mysqli_query($conn, $sql2);
            }
        }
        ?>
    </aside>
    <form method="POST">

        <!-- <div class="table-responsive-sm"> -->
        <!-- <table class="table table-sm"> -->
        <!-- <thead class="thead-dark"> -->
        <div class="w3-responsive">
            <!-- The table will then scroll horizontally on small screens. When viewing on large screens, there is no difference.-->
            <table>
                <tr>
                    <th>Heading</th>
                    <th>Message</th>
                    <th>Teacher Name</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Audience</th>
                    <th>Type</th>
                    <th>Delete?</th>

                    </thead>



                    <?php
                    
                    if (isset($_POST['view'])) {
                        //Grabs the teachers last name and finds their ID
                        $teacher = $_POST['teachers'];
                        $sql = "SELECT * FROM tteacher WHERE '$teacher' = LastName";
                        $resultSet = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($resultSet);
                        $teacherID = $row['StaffID'];
                        $teacherFullName = $row['Title'] . " " . $teacher;
                        //Grab all notices made by that staff member
                        $sql2 = "SELECT * FROM tnotices WHERE '$teacherID' = StaffID ";
                        $resultSet = mysqli_query($conn, $sql2);
                        $count = mysqli_num_rows($resultSet);
                        while ($row = mysqli_fetch_assoc($resultSet)) {
                            //Creats each row with a notices information
                            echo "<tr class='w3-white'>";
                            echo "<td>" . $row['Heading'] . "</td>";
                            echo "<td>" . $row['Message'] . "</td>";
                            echo "<td>" . $teacherFullName . "</td>";
                            echo "<td>" . $row['StartDate'] . "</td>";
                            echo "<td>" . $row['EndDate'] . "</td>";
                            echo "<td>" . $row['YearLevel'] . "</td>";
                            echo "<td>" . $row['Type'] . "</td>";
                            echo "<td>" . '<button type="submit" name="'. $row['ID'].'">Delete </button>' . "</td>";
                            echo "</tr>";
                        
                        }

                        echo "</table>";
                        echo "</div>";
                    } else {
                        echo "<h5>Select your name from the above to view all of your notices";
                    }
                    // 
                    ?>
                    </select>
                    </p>
    </form>
    <?php
    //Grabs all notices
    $sql = "SELECT * FROM tnotices";
    $conn = new mysqli("localhost", "root", "usbw", "notices");
    $resultSet = mysqli_query($conn, $sql);
    //Checks if any buttons were pressed that have the according ID number as its name
    while ($row = mysqli_fetch_assoc($resultSet)) {
        $ID = $row['ID'];
        $heading = $row['Heading'];
        if (isset($_POST[$ID])) {
            //Deletes the notice with that ID
            $sql = "DELETE FROM `tnotices` WHERE ID = '$ID'";
            mysqli_query($conn, $sql);
            echo "<div class = 'message'>Deleted notice with the ID: " . $ID ." with the heading: " . $heading . "</div>";
        }                                                                                     
    }
   
    ?>

</body>

</html>