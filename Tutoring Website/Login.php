<!DOCTYPE html>
<html>
<head>
    <title>Tutor Wizards Login</title>
    <style>
        body {
            background-color: rgb(0, 204, 255);

        }
        .main {
            background-color: white;
            align: center;
            text-align: center;
            align: center;
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
    </style>
</head>
<body>
<div class= "banner">
<h1> Tutor Wizard</h1>
</div>
<div class="main">
<header><h1>Welcome Sign in</h1></header>

<form method="POST">
<p>Username: <input type="text" name="userID" placeholder= "Username"><br>
<p>Password: <input type="text" name="password" placeholder= "password"><br>
<button type= "submit" name="submit">Login </button>
</form>
</div>
<?php
session_start();

$con=mysqli_connect('localhost', 'root', 'usbw', 'users');
//failure to connect will generate an error with an err number
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else if (isset($_POST['submit'])) {
    //include_once '/include/dbh.inc.php';
    $username = $_POST['userID'];
    $password = $_POST['password'];
    $_SESSION['userID'] = $username;
    //$password = password_hash($password, PASSWORD_DEFAULT)
    $sql = "SELECT priority FROM students WHERE Student_ID = '$username' AND password = '$password'";
    $result = mysqli_query($con,$sql); 
    $row = mysqli_fetch_array($result);
    echo $row['priority'];   
    $count = mysqli_num_rows($result);
            $_SESSION["ID"] = $username;
            if ($row['priority'] == 1) {
                header("Location: ../tutorwizard/students.php?priority=1");
            } else if ($row['priority'] == 2) {
                header("Location: ../tutorwizard/tutor.php?priority=2");
            } else if ($row['priority'] == 3) {
                header("Location: ../tutorwizard/Teacher.php?priority=3");
            } else {
                header("http://localhost/tutorwizard/login.php?Error");
            }
        }else {
            header("http://localhost/tutorwizard/login.php?WrongPassword");
        }
?>

</body>
</html>