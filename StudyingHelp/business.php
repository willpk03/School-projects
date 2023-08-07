<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="style.css">
    <title>Business Flashcard</title>
</head>
<ul>
  <li><a href="index.php">English</a></li>
  <li><a href="business.php">Business</a></li>
  <li><a href="">Table Inserts</a></li>
  <li><a href="">About</a></li>
</ul>
<body>
    <?php
        if(isset($_GET["difficulty"])) {
            $diff = $_GET["difficulty"];
            $_GET['id'] = rand(1, 18);
       } 
        if (isset($_GET['next'])) {
           $diff = $_GET["difficulty"];
           $_GET['id'] = rand(1, 18);
       }
       $id = $_GET['id'];
        $difficulty = array('Easy');
        $groups = array('Forces', 'change', 'Theories and model');
        $conn = new mysqli("localhost", "root", "usbw", "study") or die(mysqli_error($con));
        echo '<br>';
        echo '<br>';
        echo '<form action="'.htmlentities($_SERVER['PHP_SELF']).'" method="get">';
        echo '';
        echo '<select id="difficulty" name="difficulty" onchange="this.form.submit()">';
        $x = 0;
        echo '<option value="0">Select difficulty</option>';
        while ($x < 4) {
            if ($_GET["difficulty"] == $difficulty[$x]) {
                echo '<option selected value="'.$difficulty[$x].'">'.$difficulty[$x].'</option>';
            } else{
                echo '<option value="'.$difficulty[$x].'">'.$difficulty[$x].'</option>';
            }
            $x++;
        }
        echo '</select>';
        
        echo '<select id="category" name="category" onchange="this.form.submit()">';
        $x = 0;
        echo '<option value="0">Select a Category</option>';
        while ($x < 4) {
            if ($_GET["category"] == $groups[$x]) {
                echo '<option selected value="'.$groups[$x].'">'.$groups[$x].'</option>';
            } else{
                echo '<option value="'.$groups[$x].'">'.$groups[$x].'</option>';
            }
            $x++;
        }
        echo '</select>';
        if($_GET["category"] != '0') {
            $category = " AND Category = '". $_GET["category"];  
        } else {
            $category = '';
        }
        if ($_GET['difficulty'] == 'Easy') {
            $query2 = mysqli_query($conn, "SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
            while(mysqli_num_rows($query2) == 0) {
                //echo mysqli_num_rows($query2);
                $id = rand(1, 18);
                $query2 = mysqli_query($conn, "SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
                echo $id;
            }
                $row2 = mysqli_fetch_array($query2);
                echo '<p> Definition: '. $row2['Definition'] ;
                echo '<p> Example: '. $row2['Example']; 
                echo '<p> Identify the word that best describe the above Definition and Example.';
                echo '<br><input type = "submit" name = "next" value ="Next Word" id="button">';
            
            
            
            echo '<strong><p>Answer:';
            echo '<select id="WordAnswer" name="WordAnswer" onchange="this.form.submit()">';
            echo '<option value="0">Click here to see answer</option>';
            echo '<option value="1">'.$row2['word'].'</option>';
            echo '</select>';
        } else if($_GET['difficulty'] == 'Normal') {
            print("SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
            $query3 = mysqli_query($conn, "SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
            
            $row3 = mysqli_fetch_array($query3);
            echo '<p> Definition: '. $row3['Definition'];
            echo '<p> Give the Definition';
            echo '<input type = "submit" name = "next" value ="Next Word" id="button">';
            
            
            
            echo '<strong><p>Answer:';
            echo '<select id="WordAnswer" name="WordAnswer" onchange="this.form.submit()">';
            echo '<option value="0">Click here to see answer</option>';
            echo '<option value="1">'.$row3['word'].'</option>';
            echo '</select>';
        } else if($_GET['difficulty'] == 'Hard'){
            $query4 = mysqli_query($conn, "SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
            $row4 = mysqli_fetch_array($query4);
            echo '<p> Example: ' . $row4['Example'];
            echo '<p> Identify whats word is being used in the above example';
            echo '<input type = "submit" name = "next" value ="Next Word" id="button">';
            
            
            
            echo '<strong><p>Answer:';
            echo '<select id="WordAnswer" name="WordAnswer" onchange="this.form.submit()">';
            echo '<option value="0">Click here to see answer</option>';
            echo '<option value="1">'.$row4['word'].'</option>';
            echo '</select>';
        } else if($_GET['difficulty'] == 'Hard v2') {
            $query5 = mysqli_query($conn, "SELECT * FROM businessflashcard WHERE wordID = ". $id .$category."'");
            $row5 = mysqli_fetch_array($query5);
            echo '<p> Word:'. $row5['Word'];
            echo '<p> Give the definition of the word above.';
            echo '<input type = "submit" name = "next" value ="Next Word" id="button">';
            
            
            
            echo '<strong><p>Answer:';
            echo '<select id="WordAnswer" name="WordAnswer" onchange="this.form.submit()">';
            echo '<option value="0">Click here to see answer</option>';
            echo '<option value="1">'.$row5['Definition'].'</option>';
            echo '</select>';
        }
       

    //     if (isset($_GET['check'])) {
    //         $id = $_GET['id'];
    //         $query5 = mysqli_query($conn, "SELECT * FROM flashcards WHERE wordID = ". $id);
    //         $row5 = mysqli_fetch_array($query2);
    //         echo '<p><strong>Answer:'. $row5['name'];
            
    //    }
    ?>
</body>
</html>