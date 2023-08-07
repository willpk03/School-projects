<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Physics Calculator</title> 
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
                width: 250px;
                font-size: 22px;
                text-align: left;
                border-color: grey;
                transition: all 0.2s linear;
            }
            #button:hover {
                background: #79BAEC;
                border-color: white;
                transition: all 0.2s linear;
            }
            #textbox {
                border:2px;
                border-radius:10px;
                height: 50px;
                width: 400px;
                font-size: 22px;
                text-align: left;
                border-color: grey;
                transition: all 0.2s linear;
            }

            p {
                font-size:20px;
                text-align: left;
            }    
            body {
                background-color: #6699FF;
                text-align: left
            }
            form {
                background-color: lightblue;
                border-radius:20px;
            }
            </style>
    </head>
    <body>
    <h1>
    Physics Calculator for Unit 3 & 4
    </h1>
    <h2>
    Projectiles on a 2D Plane
    </h2>
    <form method="POST">
    <button type = "submit" name="back">GO BACK</button><br>
    <?php
     if (isset($_POST["back"])) {
        header("Location: http://localhost/Calculators/");
        exit;
    }
    ?>
    <p>Initial Velocity: <br><input type="text" name="intV" placeholder= "intV" id="textbox"><br>
    <p>Angle in Degrees: <br><input type="text" name="angle" placeholder= "angle" id="textbox"><br>
    <button type= "submit" name="submit" id="button">Enter</button>
        <h4>
        <?php
        $a = 9.8;
        $angle = $_POST['angle'];
        $angle = (pi()/180) * $angle;
        $u = $_POST['intV'];
        $uVert = $u*sin($angle); 
        $uHori = $u*cos($angle);
        // V = u+at
        // S = ut + .5at^2
        $t = $uVert / $a;
        $height = $uVert * $t + .5 * $a *$t**2;
        $displacement = $uHori * ($t *2);
        print('<br> <p id="answer">');
        print("Displacement: ");
        print($displacement); 
        print(" and the Height: ");
        print($height); 
        print('<br>');
        print("Time taken to go up and down is: ");
        print($t * 2);
        ?>
    <h2>
    Finding the Force applied on a incline plane
    </h2>
    <p>Net Force: <input type="text" name="netForce" placeholder= "netForce"><br>
    <p>Angle of the Plane in Degrees: <input type="text" name="angle" placeholder= "angle"><br>
    <p>Mass: <input type="text" name="Mass" placeholder= "Mass"><br>
    <p>Friction: <input type="friction" name="friction" placeholder= "friction"><br>
    <button type= "submit" name="submit">Enter</button>
        <?php
        $Netforce = $_POST['netForce'];
        $angle = $_POST['angle'];
        $mass = $_POST['Mass'];
        $fF = $_POST['friction'];
        $angle = (pi()/180) * $angle;
        $fg = $mass * $a;
        $fp = $fg * sin($angle);
        $fa = $NetForce + $fF + $fp;
        //Net Force = Fa - fF -fp
        print($fa);
        ?>
    <h2>
    Finding the Force Applied and the Fnet on a incline plane with a pulley
    </h2>
    <p>Mass of Pulley: <input type="text" name="Mass2" placeholder= "Mass"><br>
    <p>Angle of the Plane in Degrees: <input type="text" name="anglez" placeholder= "angle"><br>
    <p>Mass of Object: <input type="text" name="Mass1" placeholder= "Mass"><br>
    <p>Friction: <input type="friction" name="frictionz" placeholder= "friction"><br>
    <button type= "submit" name="submit">Enter</button>
        <?php
        $mass2 = $_POST['Mass2'];
        $anglez = $_POST['anglez'];
        $mass1 = $_POST['Mass1'];
        $fF = $_POST['frictionz'];
        $angle = (pi()/180) * $angle;
        $fg = $mass1 * $a;
        $fg2 = $mass2 * $a;
        $fp = $fg * sin($angle);
        //Net Force = Fa - fF - fp
        //Net Force = f
        print($fa);
        ?>
    <h2>Finding the Gravitational Field Strength of a Planet</h2>
    <p>Mass of the Planet <input type="text" name="pMass" placeholder= "Planets Mass">
    <P>Radius of the Planet <input type= "text" name= "pRadius" placeholder = "Planets Radius">
    <br>
    <button type= "submit" name="submit">Enter</button>
    <?php
    $pMass = $_POST['pMass'];
    $pRadius = $_POST['pRadius'];
    $G = 6.67 * 10**-11;
    // g = Gm/r^2
    $g = $G * $pMass / ($pRadius)**2;
    print("<br>");
    print("The gravitational Field Strength is: ");
    print($g);
    ?>
    <h2>Finding the force of gravity between two objects</h2>
    <p>Mass of the Planet1 <input type="text" name="pMass1" placeholder= "Planets Mass">
    <P>Distance between the two Planets <input type= "text" name= "pRadius1" placeholder = "Distance in Metres">
    <p>Mass of the Planet2 <input type="text" name="pMass2" placeholder= "Planets Mass">
    <br>
    <button type= "submit" name="submit">Enter</button>
    <?php
    $pMass1 = $_POST['pMass1'];
    $pDistance = $_POST['pRadius1'];
    $pMass2 = $_POST['pMass2'];
    $G = 6.67 * 10**-11;
    // g = Gm*M/r**2
    $Fg = $G * $pMass1 * $pMass2/ ($pDistance)**2;
    print("<br>");
    print("The force of gravity is: ");
    print($Fg);
    ?>
    <h2>Finding the distance between two planets knowing the gravity</h2>
    <p>Mass of the Planet1 <input type="text" name="pMass3" placeholder= "Planets Mass">
    <P>Force of Gravity <input type= "text" name= "fg1" placeholder = "Distance in Metres">
    <p>Mass of the Planet2 <input type="text" name="pMass4" placeholder= "Planets Mass">
    <br>
    <button type= "submit" name="submit">Enter</button>
    <?php
    $pMass1 = $_POST['pMass3'];
    $fg1 = $_POST['fg1'];
    $pMass2 = $_POST['pMass4'];
    $G = 6.67 * 10**-11;
    // g = Gm*M/r**2
    //
    $r = $G * $pMass1 * $pMass2/ $fg1;
    $r = $r**(1/2);
    print("<br>");
    print("The distance between the two planets is: ");
    print($r);
    ?>
    <h2>Finding the time it takes for one rotation by using keplers 3rd law</h2>
    <p>Time of planet one <input type="text" name="pTime1" placeholder= "Planets Time">
    <P>Radius of planet one <input type= "text" name= "pRadius" placeholder = "Planets Radius">
    <p>Radius of the Planet2 <input type="text" name="pRadius2" placeholder= "Planets Radius">
    <br>
    <button type= "submit" name="submit">Enter</button>
    <?php
    $pTime1 = $_POST['pTime1'];
    $pRaidus1 = $_POST['pRadius'];
    $pRadius2 = $_POST['pRadius2'];
    $G = 6.67 * 10**-11;
    // T^2 / R^3 = T^2 / R^3
    $k = $pTime1 ** 2 / $pRaidus1 ** 3;
    $t = $k * ($pRadius2 ** 3);
    $t = sqrt($t);
    print("<br>");
    print("The distance between the two planets is: ");
    print($t);
    ?>
    <h2>Finding the radius it takes for one rotation by using keplers 3rd law</h2>
    <p>Time of planet one <input type="text" name="pTime3" placeholder= "Planets Time">
    <P>Radius of planet one <input type= "text" name= "pRadius3" placeholder = "Planets Radius">
    <p>Time of the Planet2 <input type="text" name="pTime4" placeholder= "Planets Radius">
    <br>
    <button type= "submit" name="submit">Enter</button>
    <?php
    $pTime1 = $_POST['pTime3'];
    $pRaidus1 = $_POST['pRadius3'];
    $pTime2 = $_POST['pTime4'];
    $G = 6.67 * 10**-11;
    // T^2 / R^3 = T^2 / R^3
    $k = $pTime1 ** 2 / $pRaidus1 ** 3;
    $r = $k / ($pTime2 ** 2);
    $r = $t**(1/3);
    print("<br>");
    print("The distance between the two planets is: ");
    print($r);
    ?>
    </form>
    </body>
    </html>