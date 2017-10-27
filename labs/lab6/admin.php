<?php
session_start();
//this is breaking it


function displayUsers() {
    include("../../dbConn.php");
    $sql = "SELECT firstName, lastName, universityId FROM tc_user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    foreach($records as $record){
        echo "<strong>First Name:</strong> $record[firstName] <strong>Last Name:</STRONG> $record[lastName] <strong>ID:</strong> $record[universityId]<br>";
    }
}
?>

<html>
    <head>
        <title> Admin Page </title>
    </head>
    <body>
        <h1>Admin Page</h1>
        <form action ="addUser.php">
            <input type="Submit" name="addUser" value="Add User"/>
        </form>
        <form action ="updateUser.php">
            <input type="Submit" name="updateUser" value="Update User"/>
        </form>
        
        
        
        <!--This isn't displaying the username zzz -->
        Welcome <?=$_SESSION['username'] ?>
        <br>
        <?=displayUsers()?>
        
      
</html>