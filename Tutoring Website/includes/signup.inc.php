<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "usbw";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (isset($_REQUEST['submit'])) {
    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //Error handlers
    //if (empty($first)|| empty($last) || empty($password) ) {
        //header("Location: ../register.php?signup=empty");
        //exit();
    if (empty($first)) {
        header("Location: ../register.php?signup=emptyFirst");
        exit();
    }
    if (empty($last)) {
        header("Location: ../register.php?signup=emptyFirst");
        exit();
    }
    if (empty($password)) {
        header("Location: ../register.php?signup=emptyFirst");
        exit();
    } else {
            if (preg_match("/^[a-zA-Z]*$/", $first)|| preg_match("/^[a-zA-Z]*$/", $last) ) {
                header("Location: ../register.php?signup=empty");
                exit();     
            }else {
                $sql = "SELECT * FROM users WHERE user_uid= '$password'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if (resultCheck > 0) {
                    header('Location: ../register.php?signup=passwordused');
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user in the database
                    $sql = "INSERT INTO users (First_name, Last_name, Password, Priority, SubjectArea ) values ('$first', '$last', '$hashedPwd', '1', '');";
                    mysqli_query($conn, $sql);
                    header("Location: ../register.php?signup=success");
                    exit();
                }
                

                }
            }
    }else{
    header("Location: ../register.php?signup=nothing");
    exit();
}
?>