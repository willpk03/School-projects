<!DOCTYPE html>
<html>
<head>
    <title>Tutor Wizard Register</title>
</head>
<body>
<header><h1> Student Registration</h1></header>

<h3> Welcome! <h3>
<p> Welcome Students, sign up here to get your own tutor for your subjects. Input your details into the text boxes below. Then head back to the sign up page.</p>
<strong>
<form action="" method="post">
<p>First name: <input type="text" name="first" placeholder= "firstname">
<br>
<p>Last name:<input type="text" name="last" placeholder= "lastname">
<br>
<p>Password: <input type="password" name="password" placeholder= "password"><br>
<b><button type= "submit" name="submit">Sign up</button>

<?php 

$fullURl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URL]";
if (strpos($fullURL, "signup=empty") == true) {
    echo "YOU DID NOT FILL IN ALL FIELDS"; 
}
if (strpos($fullURL, "signup=success") == true) {
        echo "Well done now head to the login page and sign in";
}
if (strpos($fullURL, "signup=error") == true) {
        echo "Error while placing your data in the database";

}
if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';
    $first = $_POST['first'];
    $last = $_POST['last'];
    $password = $_POST['password'];
    //$first = mysqli_real_escape_string($conn, $_POST['first']);
    //$last = mysqli_real_escape_string($conn, $_POST['last']);
    //$password = mysqli_real_escape_string($conn, $_POST['password']);
    //Error handlers
    //if (empty($first)|| empty($last) || empty($password) ) {
        //header("Location: ../register.php?signup=empty");
        //exit();
    if (empty($first)) {
        header("Location: ../tutorwizard/register.php?signup=emptyFirst");
        exit();
    }
    if (empty($last)) {
        header("Location: ../tutorwizard/register.php?signup=emptylast");
        exit();
    }
    if (empty($password)) {
        header("Location: ../tutorwizard/register.php?signup=emptypassword");
        exit();
    //} else {
            //if (preg_match("/^[a-zA-Z]*$/", $first)|| preg_match("/^[a-zA-Z]*$/", $last) ) {
                //header("Location: ../register.php?signup=empty");
                //exit();     
            }else {
                $sql = "SELECT * FROM users WHERE user_uid= '$password'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if (resultCheck > 0) {
                    header('Location: ../tutorwizard/register.php?signup=passwordused');
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user in the database
                    $sql = "INSERT INTO users (First_name, Last_name, Password, Priority, SubjectArea ) values ('$first', '$last', '$hashedPwd', '1', '');";
                    mysqli_query($conn, $sql);
                    
                    header("Location: ../tutorwizard/register.php?signup=success");
                    exit();
                }
                

                }
            }
    



?>
</body>
</html>
