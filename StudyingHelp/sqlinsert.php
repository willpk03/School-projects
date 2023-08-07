<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="style.css">
    <title>English Flashcard</title>
</head>
<body>
<ul>
  <li><a href="index.php">English</a></li>
  <li><a href="business.php">Business</a></li>
  <li><a href="sqlinsert.php">Table Inserts</a></li>
  <li><a href="">About</a></li>
</ul>
<br>
<br>
<?php
    echo '<form action="'.htmlentities($_SERVER['PHP_SELF']).'" method="get">';
    echo '<input type="text" id="sql" name="sql">';
    echo '<input type = "submit" name = "insert" value ="insert" id="button">';
    $conn = new mysqli("localhost", "root", "usbw", "study") or die(mysqli_error($conn));
    if (isset($_GET['insert'])) {
        $sql = $_GET['sql'];
        if (strpos($sql, 'INSERT') !== false) {
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo 'Inserted into the databse';
        } else if (strpos($sql, 'SELECT') !== false) {
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo 'Data selected';
            print_table($query);

        } else {
            echo '<strong> This page is only used to insert new data into the database';
        }
    }


    function print_table($query) {
        
        $fields_num = mysqli_num_fields($query);
        echo '<table>';
        echo '<tr>';
        for($i=0; $i<$fields_num; $i++) {
            $field = mysqli_fetch_field($query);
            echo '<th>'.$field->name.'</th>';
        }
        echo '</tr>';
        while($row = mysqli_fetch_row($query)) {
            echo '<tr>';
            foreach($row as $cell) {
                echo '<td>'.$cell.'</td>';
            }
            echo '</tr>';
        }
            echo '</table>';
        
    }
?>
</form>
    
</body>