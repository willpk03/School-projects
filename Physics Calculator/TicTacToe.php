<?php
$winner = 'n';
$box = array('', '', '', '', '', '', '', '', '');
if (isset($_POST["submitbtn"])) {
    $box[0] = $_POST["box0"];
    $box[1] = $_POST["box1"];
    $box[2] = $_POST["box2"];
    $box[3] = $_POST["box3"];
    $box[4] = $_POST["box4"];
    $box[5] = $_POST["box5"];
    $box[6] = $_POST["box6"];
    $box[7] = $_POST["box7"];
    $box[8] = $_POST["box8"];
    //Sets all the boxes to the previous input
    if (($box[0] == 'x' && $box[1] == 'x' && $box[2] == 'x')|| ($box[3] == 'x' && $box[4] == 'x' && $box[5] == 'x')|| ($box[6] == 'x' && $box[7] == 'x' && $box[8] == 'x')|| ($box[0] == 'x' && $box[3] == 'x' && $box[6] == 'x') || ($box[1] == 'x' && $box[4] == 'x' && $box[7] == 'x') || ($box[2] == 'x' && $box[5] == 'x' && $box[8] == 'x') ||($box[0] == 'x' && $box[4] == 'x' && $box[8] == 'x') || ($box[2] == 'x' && $box[4] == 'x' && $box[6] == 'x' )) {
        $winner = 'x';
        print ("<p>Winner Winner<p>");
        
    }
    $blank = 0;
    for ($i=0; $i<=8; $i++) {
        if ($box[$i] == '' ) {
            $blank = 1;
        } // Checks if there are any blank boxes
    }
    if ($blank == 1 && $winner == 'n') {
        $i = rand() % 9; //Picks a random square
        while ($box[$i] != '') {
            $i = rand() % 9;
        } 
        $box[$i] = 'o';
        if (($box[0] == 'o' && $box[1] == 'o' && $box[2] == 'o')|| ($box[3] == 'o' && $box[4] == 'o' && $box[5] == 'o') || ($box[6] == 'o' && $box[7] == 'o' && $box[8] == 'o') || ($box[0] == 'o' && $box[3] == 'o' && $box[6] == 'o') || ($box[1] == 'o' && $box[4] == 'o' && $box[7] == 'o') || ($box[2] == 'o' && $box[5] == 'o' && $box[8] == 'o') ||($box[0] == 'o' && $box[4] == 'o' && $box[8] == 'o')|| ($box[2] == 'o' && $box[4] == 'o' && $box[6] == 'o' )) {
                print( "<p>lol you lost to a bot with trash ai <p>");
                $winner = 'o';
        } else if ($blank = 0) {
            $winner = 't';
            print("<p>Tied game<p>");
        }
    }
}

if (isset($_POST["reset"])) {
    $box[0] = '';
    $box[1] = '';
    $box[2] = '';
    $box[3] = '';
    $box[4] = '';
    $box[5] = '';
    $box[6] = '';
    $box[7] = '';
    $box[8] = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>REEEEEEEEEEEE</title>
    <style>
    <style>
            h1 {
                font-size: 42px;
                text-align: center;
                font-family: 'Comic Sans MS';
                color: white;

            }  

            h2 {
                font-size:25;
                text-align: center;
                }
            #button {
                border:2px;
                border-radius:10px;
                height: 50px;
                width: 200px;
                font-size: 30px;
                text-align: center;
                border-color: grey;
                transition: all 0.2s linear;
            }
            #button:hover {
                background: #79BAEC;
                border-color: white;
                transition: all 0.2s linear;
            }

            p {
                font-size:20px;
                text-align: center;
            }    
            body {
                background-color: #6699FF;
                text-align: center;
            }
            form {
                background-color: lightblue;
                border-radius:20px;
            }
            input {
                border:2px;
                height: 50px;
                width: 50px;
                font-size: 30px;
                text-align: center;
                border-color: coral;
                transition: all 0.2s linear;
            }

        </style>
    </style>
</head>
<body>
        <h1><u>Tic Tac Toe The Ultimate Experience</u></h1>
        <h2>Your ultimate experience for all things Tic Tac Toe</h2>

</body>
<body bgcolor="blue">
<form name="tictattoe" method="post" action="TicTacToe.php"> 
<button type = "submit" name="back">GO BACK</button><br>
    <?php
     if (isset($_POST["back"])) {
        header("Location: http://localhost/Calculators/");
        exit;
    }
    ?>
<?php
for ($i = 0; $i<=8; $i++) {
    printf('<input type = "text" name="box%s" value="%s" id="box">', $i, $box[$i]);
    if ($i== 2 || $i == 5 || $i == 8) {
        print('<br>'); // Prints 8 boxes with breaks every 3
    }

}
if ($winner = 'n') {
    print('<input type = "submit" name = "submitbtn" value = "Go" id="button">'); //Prints a submit button
    print('<input type = "submit" name = "reset" value = "Reset" id="button">'); //resets the game
}
?>

</form>

</body>
</html> 
