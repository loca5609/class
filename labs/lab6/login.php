<?php
//session_start() need to be at top of any pages using session variables
session_start();
include("../../dbConn.php");
$username = $_POST[username];
$password = sha1($_POST[password]);


$sql = "SELECT * FROM tc_admin WHERE username ='$username' AND password = '$password'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll();
//wrong user and password
if(empty($records)){
    echo "Wrong user or password";
} else {
    //redirect to admin page
    $_SESSION['username'] = $records['username'];
    $_SESSION['password'] = $records['password'];
    header("Location: admin.php");
}


?>