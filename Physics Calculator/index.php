<!DOCTYPE html>
<html>
    <head>
        <title>ATAR UNIT 3&4 Calculator</title>
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
                height: 100px;
                width: 400px;
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

        </style>
    </head>
    <body>
        <h1><u>Atar Calculator</u></h1>
        <h2>Select one of the buttons to have an calculator to do whatever you want</h2>

    </body>
    <form name="tictattoe" method="post" action="index.php"> 
        <br>
    <?php
        print('<p><strong>Select one of the categories below:</strong></p>');
        //print('<input type = "submit" name = "video1" value ="Video One" id="button"> '); 
        //print('<input type = "submit" name = "video2" value ="Video Two" id="button"> '); 
        print('<input type = "submit" name = "video3" value ="Physics" id="button"> '); 
        //print('<input type = "submit" name = "video4" value ="Video Four" id="button"> '); 
        //print('<input type = "submit" name = "video5" value ="Video Five" id="button"> ');
        //print('<input type = "submit" name = "video6" value = "Video Five" id="button"> ');
        //print('<input type = "submit" name = "video7" value ="Video Six" id="button"><br><br> '); 
        //print('<input type = "submit" name = "video8" value ="Video Eight" id="button"> '); 
        //print('<input type = "submit" name = "video9" value ="Video Seven" id="button"> '); 
        //print('<input type = "submit" name = "video10" value ="Video Eight" id="button"> '); 
        print('<input type = "submit" name = "video11" value ="Derivatives" id="button"> <br><br>');
        //print('<input type = "submit" name = "video12" value = "Video Twelve" id="button"><br><br> ');
        print('<br><br>');
       
        if (isset($_POST["video3"])) {
            header("Location: http://localhost/Calculators/physics.php");
            exit;
        }
        if (isset($_POST["video11"])) {
            header("Location: http://localhost/Calculators/");
            exit;
        }
    ?>
    </form>
    <body>
    <h1><u>Other Fun things</u></h1>
        <h2>Select one of the buttons if your looking for a way to procrastinate</h2>
    </body>
    <form name="tictattoe" method="post" action="index.php"> 
    <?php
    
        print('<p><strong>Select one of the categories below:</strong></p>');
        //print('<input type = "submit" name = "video1" value ="Video One" id="button"> '); 
        //print('<input type = "submit" name = "video2" value ="Video Two" id="button"> '); 
        print('<input type = "submit" name = "video33" value ="Tic Tac Toe" id="button"> '); 
        //print('<input type = "submit" name = "video4" value ="Video Four" id="button"> '); 
        //print('<input type = "submit" name = "video5" value ="Video Five" id="button"> ');
        //print('<input type = "submit" name = "video6" value = "Video Five" id="button"> ');
        //print('<input type = "submit" name = "video7" value ="Video Six" id="button"><br><br> '); 
        //print('<input type = "submit" name = "video8" value ="Video Eight" id="button"> '); 
        //print('<input type = "submit" name = "video9" value ="Video Seven" id="button"> '); 
        //print('<input type = "submit" name = "video10" value ="Video Eight" id="button"> '); 
        print('<input type = "submit" name = "video11" value ="Coming Soon!!" id="button"> <br><br>');
        //print('<input type = "submit" name = "video12" value = "Video Twelve" id="button"><br><br> ');
        print('<br><br>');
       
        if (isset($_POST["video33"])) {
            header("Location: http://localhost/Calculators/tictactoe.php");
            exit;
        }
        if (isset($_POST["video11"])) {
            header("Location: http://localhost/Calculators/");
            exit;
        }
    ?>
    </form>
    <h5>&copyCreated by Will Kennelly for anyone</h5> 
</html>